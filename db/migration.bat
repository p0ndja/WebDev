@echo off

:: Install Python dependencies and run migrations
docker exec -it lca_grader_service bash -c "apt-get update && apt-get install -y python3 python3-pip python3-venv libpq-dev && rm -rf /var/lib/apt/lists/* && python3 -m venv /app/venv && . /app/venv/bin/activate && pip3 install --no-cache-dir --upgrade pip && pip3 install --no-cache-dir mysql-connector-python python-dotenv && python3 /db/migration.py"
