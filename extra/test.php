<?php 
    include '../global/connect.php';

    echo getConfig('global_snowEffect', 'bool', $conn);
    ?>