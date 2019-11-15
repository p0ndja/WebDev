<?php 
    include '../global/connect.php';
    include '../global/popup.php';
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <?php include'../global/head.php'?>
</head>

<body>
    <?php include'../global/login.php'?>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-normal fixed-top sticky" id="nav" role="navigation">
        <?php include '../global/navbar.php'; ?>
    </nav>
    <div class="content"></div>
    <div class="container">
        <div class="card mb-12">
            <div class="card-header bg-dark text-white">
                <h5 style="color: #ffffff">รับสมัครผู้ช่วยพัฒนาเว็บไซด์ <span
                        class="badge badge-success z-depth-0">รับสมัครงาน</span></h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <div class="row">
                            <div class="col-4 col-md-12">
                                <img src="https://tcas.pondja.com/31959055_1480846662024353_4037302681675497472_n.jpg"
                                    alt="Profile" class="img-fluid rounded-circle">
                            </div>
                            <div class="col-8 col-md-12">
                                <p>
                                    <a href="../profile/?id=604019">
                                        <center>พลภณ สุนทรภาส</center>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tit">Title:</label>
                            <input type="text" class="form-control" id="tit">
                    </div>
                    <div class="form-group">
                        <label for="arti">Article:</label>
                            <textarea class="form-control" rows="5" id="arti"></textarea>
                    </div>
                    <h5>Hidden:</h5>
                    <div class="radio">
                        <label><input type="radio" name="optradio" checked>false</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="optradio">true</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <?php include'../global/footer.php'?>
</body>

</html>