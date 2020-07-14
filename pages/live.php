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
    <nav class="navbar navbar-expand-lg navbar-dark navbar-normal fixed-top scrolling-navbar" id="nav"
        role="navigation">
        <?php require '../global/navbar.php'; ?>
    </nav>
    <div class="container" id="container" style="padding-top: 88px">
        <div class="card mb-3">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/eKJa2K7ehBo" allowfullscreen></iframe>
            </div>
        </div>
    </div>
<?php require '../global/popup.php'; ?>
<div class="d-none">
<?php require '../global/footer.php'; ?>
</div>
</body>

</html>