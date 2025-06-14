#!/usr/bin/env python3
"""
Simple database migration script for LCA Grader application.
Run this script to apply pending migrations to the database.
"""

import os
import sys
import re
import mysql.connector
from datetime import datetime
import dotenv

# Load environment variables from .env file
dotenv.load_dotenv(dotenv_path=os.path.join(os.path.dirname(__file__), '.env'))

# Database connection parameters from environment variables
DB_HOST = os.getenv('DB_HOST', 'localhost')
DB_PORT = os.getenv('DB_PORT', 3306)
DB_NAME = os.getenv('DB_SCHEMA')
DB_USER = os.getenv('DB_USERNAME')
DB_PASSWORD = os.getenv('DB_PASSWORD')

# Directory containing migration files
MIGRATIONS_DIR = os.path.join(os.path.dirname(os.path.abspath(__file__)), 'migration', 'structure')
MIGRATIONS_DATA_DIR = os.path.join(os.path.dirname(os.path.abspath(__file__)), 'migration', 'data')

def connect_to_database():
    """
    Connects to the MySQL database.
    """
    try:
        conn = mysql.connector.connect(
            host=DB_HOST,
            port=DB_PORT,
            database=DB_NAME,
            user=DB_USER,
            password=DB_PASSWORD
        )
        conn.autocommit = True
        return conn
    except mysql.connector.Error as e:
        print(f"Error connecting to the database: {e}")
        sys.exit(1)

def get_migration_files():
    """
    Gets a sorted list of migration files from the migrations directory.
    """
    if not os.path.exists(MIGRATIONS_DIR):
        print(f"Migrations directory not found: {MIGRATIONS_DIR}")
        sys.exit(1)
        
    files = [f for f in os.listdir(MIGRATIONS_DIR) if f.endswith('.sql')]
    
    # Sort by migration number (extracted from filename)
    def get_migration_number(filename):
        match = re.match(r'^(\d+)_', filename)
        return int(match.group(1)) if match else 0
        
    return sorted(files, key=get_migration_number)

def get_applied_migrations(conn):
    """
    Gets a list of migrations that have already been applied.
    """
    cursor = conn.cursor()
    try:
        # Check if migrations table exists
        cursor.execute("""
            SELECT COUNT(*)
            FROM information_schema.tables
            WHERE table_schema = %s AND table_name = 'migrations';
        """, (DB_NAME,))
        table_exists = cursor.fetchone()[0] > 0
        
        if not table_exists:
            # First migration is to create the migrations table
            return []
            
        cursor.execute("SELECT name FROM migrations ORDER BY id;")
        return [row[0] for row in cursor.fetchall()]
    finally:
        cursor.close()

def apply_migration(conn, migration_file):
    """
    Applies a single migration file to the database.
    """
    print(f"Applying migration: {migration_file}")
    
    migration_path = os.path.join(MIGRATIONS_DIR, migration_file)
    
    try:
        # Read the migration SQL
        with open(migration_path, 'r') as f:
            sql = f.read()
            
        cursor = conn.cursor()
        try:
            # Execute the migration - MySQL requires each statement to be executed separately
            for statement in sql.split(';'):
                if statement.strip():
                    cursor.execute(statement)
            
            # Record the migration in the migrations table if it's not the first migration
            # (which creates the migrations table itself)
            if migration_file != '001_create_migrations_table.sql':
                cursor.execute(
                    "INSERT INTO migrations (name, applied_at) VALUES (%s, %s);",
                    (migration_file, datetime.now())
                )
            else:
                # For the first migration, we need to record it after creating the table
                cursor.execute(
                    "INSERT INTO migrations (name, applied_at) VALUES (%s, %s);",
                    (migration_file, datetime.now())
                )
                
            conn.commit()
        finally:
            cursor.close()
                
        print(f"✅ Migration applied: {migration_file}")
        return True
    except Exception as e:
        print(f"❌ Error applying migration {migration_file}: {e}")
        conn.rollback()
        return False

def run_migrations():
    """
    Runs all pending migrations.
    """
    conn = connect_to_database()
    
    try:
        migration_files = get_migration_files()
        applied_migrations = get_applied_migrations(conn)
        
        pending_migrations = [f for f in migration_files if f not in applied_migrations]
        
        if not pending_migrations:
            print("No pending migrations to apply.")
            return
            
        print(f"Found {len(pending_migrations)} pending migrations:")
        for migration in pending_migrations:
            print(f"  - {migration}")
            
        for migration in pending_migrations:
            if not apply_migration(conn, migration):
                print("Migration failed. Stopping.")
                sys.exit(1)
                
        print("✅ All migrations completed successfully!")
    finally:
        conn.close()

def get_data_migration_files():
    """
    Gets a sorted list of data migration files from the data migrations directory.
    """
    if not os.path.exists(MIGRATIONS_DATA_DIR):
        print(f"Data migrations directory not found: {MIGRATIONS_DATA_DIR}")
        sys.exit(1)
        
    files = [f for f in os.listdir(MIGRATIONS_DATA_DIR) if f.endswith('.sql')]
    
    # Sort by migration number (extracted from filename)
    def get_migration_number(filename):
        match = re.match(r'^(\d+)_', filename)
        return int(match.group(1)) if match else 0
        
    return sorted(files, key=get_migration_number)

def get_applied_data_migrations(conn):
    """
    Gets a list of data migrations that have already been applied.
    """
    cursor = conn.cursor()
    try:
        # Check if migrations table exists
        cursor.execute("""
            SELECT COUNT(*)
            FROM information_schema.tables
            WHERE table_schema = %s AND table_name = 'data_migrations';
        """, (DB_NAME,))
        table_exists = cursor.fetchone()[0] > 0
        
        if not table_exists:
            # Create the data_migrations table if it doesn't exist
            cursor.execute("""
                CREATE TABLE data_migrations (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    name VARCHAR(255) NOT NULL,
                    applied_at DATETIME NOT NULL
                );
            """)
            conn.commit()
            return []
            
        cursor.execute("SELECT name FROM data_migrations ORDER BY id;")
        return [row[0] for row in cursor.fetchall()]
    finally:
        cursor.close()

def apply_data_migration(conn, migration_file):
    """
    Applies a single data migration file to the database.
    """
    print(f"Applying data migration: {migration_file}")
    
    migration_path = os.path.join(MIGRATIONS_DATA_DIR, migration_file)
    
    try:
        # Read the migration SQL
        with open(migration_path, 'r') as f:
            sql = f.read()
            
        cursor = conn.cursor()
        try:
            # Execute the migration - MySQL requires each statement to be executed separately
            for statement in sql.split(';'):
                if statement.strip():
                    cursor.execute(statement)
            
            # Record the migration in the data_migrations table
            cursor.execute(
                "INSERT INTO data_migrations (name, applied_at) VALUES (%s, %s);",
                (migration_file, datetime.now())
            )
                
            conn.commit()
        finally:
            cursor.close()
                
        print(f"✅ Data migration applied: {migration_file}")
        return True
    except Exception as e:
        print(f"❌ Error applying data migration {migration_file}: {e}")
        conn.rollback()
        return False

def run_data_migrations():
    """
    Runs all pending data migrations.
    """
    conn = connect_to_database()
    
    try:
        migration_files = get_data_migration_files()
        applied_migrations = get_applied_data_migrations(conn)
        
        pending_migrations = [f for f in migration_files if f not in applied_migrations]
        
        if not pending_migrations:
            print("No pending data migrations to apply.")
            return
            
        print(f"Found {len(pending_migrations)} pending data migrations:")
        for migration in pending_migrations:
            print(f"  - {migration}")
            
        for migration in pending_migrations:
            if not apply_data_migration(conn, migration):
                print("Data migration failed. Stopping.")
                sys.exit(1)
                
        print("✅ All data migrations completed successfully!")
    finally:
        conn.close()

if __name__ == "__main__":
    run_migrations()
    run_data_migrations()