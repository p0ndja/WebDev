<?php include '../global/connect.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../global/head.php'; ?>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-normal fixed-top scrolling-navbar" id="nav"
        role="navigation">
        <?php include '../global/navbar.php'; ?>
    </nav>
    <div class="container" id="container" style="padding-top: 88px">
    <div id="summernote"><p>Hello Summernote</p>
</div>
    </div>

</body>
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
  </script>
<?php include '../global/footer.php'; ?>
<?php include '../global/popup.php'; ?>

</html>