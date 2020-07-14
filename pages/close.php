<?php require('../global/connect.php'); ?>
<!DOCTYPE html>
<html lang="th">

<head>
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../static/bootstrap/bootstrap.min.css">
    <script src="../static/js/1.16.0-popper.min.js"></script>
    <script src="../static/js/jquery-3.5.1.min.js"></script>
    <script src="../static/bootstrap/bootstrap.min.js"></script>
    <style>
        .center {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }
        body {
            background: url('../static/images/background/bg_dark.jpg') no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            background-size: cover;
            -o-background-size: cover;
            color: white;
            font-family: 'Kanit', sans-serif;
        }
    </style>
    <?php if (!getConfig('global_temporaryClose', 'bool', $conn)) home(); ?>
</head>

<body>
    <div class="container" id="container" style="padding-top: 88px">
        <div class="center" align="center">
            <div class="text-center text-white">
                <h3>ปิดปรับปรุงชั่วคราว</h3>
                <h1>(╯°□°）╯︵ ┻━┻</h1>
                <img src="https://media3.giphy.com/media/l4FGpa3DuEFMrghKE/giphy.gif?cid=ecf05e478e26e9f7a7a0fb42e6b1257b96fbed4006b3922b&rid=giphy.gif" class="w-100">
            </div>
        </div> 
    </div>
</body>

</html>