<html>
    <body>
<?php
    $host = "remotemysql.com:3306";
    $user = "9SksUB0FHK";
    $pass = "DnvUqpwKb0";
    $conn = mysqli_connect($host,$user,$pass);

    if(! $conn ) {
        die('Could not connect: ' . mysqli_error());
    }
    echo 'Connected successfully<br />';

    mysqli_select_db($conn , '9SksUB0FHK');

    mysqli_close($conn);
?>
</body>
</html>