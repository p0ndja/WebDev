<?php require '../global/connect.php'; ?>

<!DOCTYPE html>
<html lang="th">

<head>
    <?php require '../global/head.php'; ?>
</head>

<body>
    <div class="container" id="container">
        <div class="_df_book" webgl="true" backgroundcolor="transparent" source="<?php echo $_GET['file']?>" id="df_manual_book" height="1080" weight="1920"></div>
    </div>
    <div class="d-none">
<?php require '../global/popup.php'; ?>
<?php require '../global/footer.php'; ?>
</div>
</body>

</html>