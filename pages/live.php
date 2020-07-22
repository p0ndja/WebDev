<?php require '../global/connect.php'; ?>

<!DOCTYPE html>
<html lang="th">

<head>
    <?php require '../global/head.php'; ?>
    <style>
        .fix {
            position:fixed;
            bottom: 0px;
            left: 0%;
            width: 100%;
        }
        body {
            background-color:#000000 !important;
            background-image: url('https://cdn.discordapp.com/attachments/636478500206936094/702438313549758514/movie-theater-04.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: bottom center;
        }
        [data-theme="dark"] body {
            background-color: #000000 !important;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-normal" id="nav"
        role="navigation">
        <?php require '../global/navbar.php'; ?>
    </nav>
    <div class="container" id="container">
        <div class="card mb-3">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://embed.restream.io/player/index.html?token=ab24145b90666a9196b7228c31ff3520" width="100%" height="100%" frameborder="0" allowfullscreen></iframe><p>Powered by <a href="https://restream.io">Restream.io</a></p>
            </div>
        </div>
    </div>
<?php require '../global/popup.php'; ?>
<div class="d-none">
<?php require '../global/footer.php'; ?>
</div>
</body>

</html>