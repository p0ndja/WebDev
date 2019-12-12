<?php 
    include '../global/connect.php';
    include '../global/popup.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../global/head.php';?>
</head>

<body style="background-color: #ededed">
    <?php include '../global/login.php' ?>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-normal fixed-top sticky" id="nav" role="navigation">
        <?php include '../global/navbar.php'; ?>
    </nav>
    <div class="content"></div>
    <div class="container">
        <div id="summernote"></div>
        <script>
            $('#summernote').summernote({
                placeholder: 'Hello bootstrap 4',
                tabsize: 2,
                height: 100
            });
        </script>
    </div>
    <?php include '../global/footer.php' ?>
</body>

</html>