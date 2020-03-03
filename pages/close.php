<!DOCTYPE html>
<html lang="th">

<head>
    <?php include '../global/head.php'; ?>
    <?php
        include '../global/config.php';
        if(!$close) header("Location: ../home/");
    ?>
    <style>
        .center {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
</head>

<body class="admin">
    <div class="container" id="container" style="padding-top: 88px">
        <div class="center">
                <div class="text-center text-white">
                    <h3>ปิดปรับปรุงชั่วคราว</h3>
                    <h1>(╯°□°）╯︵ ┻━┻</h1>
                    <img src="https://images.pondja.com/capoo_lazy_dev.gif">
                </div>
            
        </div> 
    </div>
</body>
</html>