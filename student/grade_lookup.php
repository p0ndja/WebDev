<?php require '../global/connect.php'; ?>

<!DOCTYPE html>
<html lang="th">

<head>
    <?php require '../global/head.php'; ?>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-normal fixed-top scrolling-navbar" id="nav" role="navigation">
        <?php require '../global/navbar.php'; ?>
    </nav>
    <div class="container" id="container" style="padding-top: 88px">
    <div class="center"><div class="card mb-3">
                    <div class="card-body">
                        <div class="container justify-content-center">
                            <center>
                                <h1>การตรวจสอบสอบผลการเรียน</h1>
                                <form method="POST" action="https://smd-s.kku.ac.th/report/search-01.php">
                                    <label for="stidcard">เลขบัตรประชาชน</label>
                                    <input type="text" id="stidcard" name="stidcard" value="<?php if (isLogin()) echo getUserdata($_SESSION['id'], 'citizen_id', $conn);?>" class="form-control mb-3" required></input>
                                    <input type="submit" class="btn btn-success" value="Submit" name="submit"></input>
                                </form>
                            </center>
                        </div>
                    </div>
                </div>
    </div>
                                </div>
<?php require '../global/popup.php'; ?>
<footer class="d-none">
<?php require '../global/footer.php'; ?>
                                </footer>
</body>

</html>