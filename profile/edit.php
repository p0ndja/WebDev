<?php 
    include '../global/connect.php';
    include '../global/popup.php';
    if (!isset($_SESSION['id'])) {
        header("Location: ../");
    }
?>

<!DOCTYPE html>
<html lang="th">

<head>
    
    <?php include '../global/head.php'; ?>
    <?php
        $id = $_SESSION['id'];

        $query = "SELECT * FROM `userdatabase` WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
     
        if (!$result) {
            die('Could not get data: ' . mysqli_error($conn));
        }
        $profile_background = "https://storage.pondja.com/bg%20pastel%20mode.jpg";

        $query_profile = "SELECT * FROM `profile` WHERE id = '$id'";
        $result_profile = mysqli_query($conn, $query_profile);

        $profile_displayText = "";

        while ($row = mysqli_fetch_array($result_profile, MYSQLI_ASSOC)) {
            if ($row['background'] != null) $profile_background = $row['background'];
            if ($row['greetings'] != null) $profile_displayText = $row['greetings'];
        }
        
    ?>

  <script type="text/javascript">
    $(function () {
      $('.summernote').summernote({
        height: 500,
      });
      $('.summernote').summernote('code', '<?php echo $profile_displayText; ?>');
    });
  </script>

    <style>
        body {
            font-family: 'Kanit', sans-serif !important;
            background: url(<?php echo $profile_background ?>) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            background-size: cover;
            -o-background-size: cover;
        }
    </style>
</head>

<body style="background-color: #ededed">
    <?php include '../global/login.php' ?>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-normal fixed-top scrolling-navbar" id="nav" role="navigation">
        <?php include '../global/navbar.php'; ?>
    </nav>
    <?php

        $query = "SELECT * FROM `userdatabase` WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
        $query_profile = "SELECT * FROM `profile` WHERE id = '$id'";
        $result_profile = mysqli_query($conn, $query_profile);

        if (mysqli_num_rows($result) == 0) {
            die('<center><h1>Profile Not Found</h1></center>');
        }

        $undefined = "<i>Undefined</i>";
        $profile_name = "<i>Undefined Thai Name</i>";
        $profile_name_en = "<i>Undefined English Name</i>";
        $profile_id = $undefined;
        $profile_grade = $undefined;
        $profile_class = $undefined;
        $profile_room = $undefined;
        $profile_email = $undefined;
        $profile_image = "https://d3ipks40p8ekbx.cloudfront.net/dam/jcr:3a4e5787-d665-4331-bfa2-76dd0c006c1b/user_icon.png";
       
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $profile_name = $row['firstname'] . ' ' . $row['lastname'];
            $profile_id = $row['id'];
            $profile_email = $row['email'];
        }
        
        while ($row = mysqli_fetch_array($result_profile, MYSQLI_ASSOC)) {
            if ($row['profile'] != null)
                $profile_image = $row['profile'];
        }  
    ?>
    <div class="container" id="container" style="padding-top: 88px">
        <form method="post" action="../profile/save.php" enctype="multipart/form-data">
            <div class="card w-100">
                <div class="card-body">
                    <h6><b>Background Image: </b>
                    <input type="file" name="background_upload" id="background_upload"
                    class="form-control-file validate" accept="image/png, image/jpeg"></h6>
                </div>
            </div>
            <hr>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-11">
                            <h1> <?php echo $profile_name; ?></h1>
                            <h5> <?php echo $profile_name_en; ?></h5>
                        </div>
                        <div class="col-1">
                            <input type="submit" class="btn btn-success float-right" name="edit_submit"
                                value="บันทึก"></input>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <img src="<?php echo $profile_image; ?>" class="img-fluid w-100" alt="Profile">
                            <br>
                            <input type="file" name="profile_upload" id="profile_upload" class="form-control-file validate" accept="image/png, image/jpeg">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-left">
                            <hr>
                            <div class="card">
                                <div class="card-body">
                                    <strong>รหัสนักเรียน</strong> <?php echo $profile_id ?><br>
                                    <strong>ระดับชั้น</strong> <?php echo $profile_grade ?><br>
                                    <strong>ห้อง</strong> <?php echo $profile_room ?> (<?php echo $profile_class ?>)<br>
                                    <strong>อีเมล</strong>
                                    <a href="<?php echo $profile_email ?>"><?php echo $profile_email ?></a>
                                </div>
                            </div>
                            <hr>
                            <div class="card">
                                <div class="card-body">
                                    <h2>Achievement</h2>
                                    <hr>
                                    <p>-----</p>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">

                            <div class="form-group">
          <label for="contents">Contents</label>
          <textarea name="text" class="summernote" id="contents" name="contents" title="Contents"></textarea>
        </div>
                        </div>
                    </div>
                    <hr>
                    <?php if ($_SESSION['id'] == '604019') { ?>
                    <div class="card">
                        <div class="card-body">
                            <h2>ประวัติการศึกษา</h2>
                            <hr>
                            <div class="row">
                                <div class="col-8">
                                    <input type="text" class="form-control" id="primary" rows="1"
                                        value="โรงเรียนสาธิตมหาวิทยาลัยขอนแก่น (มอดินแดง)"></input>
                                    <h5><span class="badge badge-secondary">ระดับประถมศึกษา</span></h5>
                                </div>
                                <div class="col-4">
                                    <div class="form-row">
                                        <p class="text-center">
                                            <div class="col-md-5 mb-2"><input type="number" class="form-control"
                                                    id="primary1" rows="1" value="2008"></input>
                                            </div> -
                                            <div class="col-md-5 mb-2"><input type="number" class="form-control"
                                                    id="primary2" rows="1" value="2014"></input>
                                            </div>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <input type="text" class="form-control" id="secondary1" rows="1"
                                        value="โรงเรียนสาธิตมหาวิทยาลัยขอนแก่น (มอดินแดง)"></input>
                                    <h5><span class="badge badge-secondary">ระดับมัธยมศึกษาตอนต้น</span></h5>
                                </div>
                                <div class="col-4">
                                    <div class="form-row">
                                        <p class="text-center">
                                            <div class="col-md-5 mb-2"><input type="number" class="form-control"
                                                    id="secondary11" rows="1" value="2014"></input>
                                            </div> -
                                            <div class="col-md-5 mb-2"><input type="number" class="form-control"
                                                    id="secondary12" rows="1" value="2017"></input>
                                            </div>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <input type="text" class="form-control" id="secondary2" rows="1"
                                        value="โรงเรียนสาธิตมหาวิทยาลัยขอนแก่น (มอดินแดง)"></input>
                                    <h5><span class="badge badge-secondary">ระดับมัธยมศึกษาตอนปลาย</span></h5>
                                </div>
                                <div class="col-4">
                                    <div class="form-row">
                                        <p class="text-center">
                                            <div class="col-md-5 mb-2"><input type="number" class="form-control"
                                                    id="secondary21" rows="1" value="2017"></input>
                                            </div> -
                                            <div class="col-md-5 mb-2">ปัจจุบัน</div>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="card">
                        <div class="card-body">
                            <h2>ประสบการณ์</h2>
                            <hr>
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-9">
                                            <h4><a class="btn btn-danger"><i class="fas fa-eye-slash"></i></a>
                                                รางวัล GISTDA Top Vote </h4>
                                        </div>
                                        <div class="col-3">
                                            <h5 class="text-right"><span aria-hidden="true"></span>28/08/2562</h5>
                                        </div>
                                    </div>
                                    <h5><span class="badge badge-secondary">การแข่งขันการประกวดสื่อภูมิสารสนเทศ</span>
                                    </h5>
                                    <p><i>No Info</i>
                                    </p>
                                    <img src="https://scontent.fbkk10-1.fna.fbcdn.net/v/t1.0-9/69420032_10157202432506265_8378946234844446720_o.jpg?_nc_cat=109&_nc_eui2=AeEpYjiY-CG34GeofuDFrbfd7duuWMb0NKuda2Q9dWi_Dn50-zKULAmZkkL8prEx4FYTwRiuTOcZfee495g3xhGioTNYY0cNW8pHP_rvc2X6sA&_nc_oc=AQmE0fa2qcnOmV8A--26FEro_Xv2AHdfp3B7NugbkqmY7z3iKOEOtJcwofsaVq5Nx98&_nc_ht=scontent.fbkk10-1.fna&oh=38f8945aba3d8945f58a71533af9467d&oe=5E258E9F"
                                        width=100%>
                                    <a href="https://www.facebook.com/gistda/posts/10157202433771265">[1]</a>
                                    <hr>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-9">

                                            <h4><a class="btn btn-success"><i class="fas fa-eye"></i></a>
                                                รางวัลรองชนะเลิศอันดับ 1 การแข่งขัน Web Programming Competition
                                                ระดับมัธยมศึกษาตอนปลาย </h4>
                                        </div>
                                        <div class="col-3">
                                            <h5 class="text-right"><span aria-hidden="true"></span>19/08/2562</h5>
                                        </div>
                                    </div>
                                    <h5><span class="badge badge-secondary">การแข่งขันในงานสัปดาห์วิทยาศาสตร์</span>
                                    </h5>
                                    <p>ขอแสดงความยินดีกับนายพลภณ สุนทรภาส ชั้นมัธยมศึกษาปีที่ 6 อาจารย์ที่ปรึกษา
                                        อาจารย์จุฬารัตน์ สียา ได้รับรางวัลที่ 2 จากการแข่งขัน Web Programming
                                        Competition
                                        ระดับมัธยมศึกษาตอนปลาย ในกิจกรรมสัปดาห์วันวิทยาศาสตร์แห่งชาติ ประจำปี
                                        พ.ศ. 2562 วันที่ 18-20 สิงหาคม 2562 ณ คณะวิทยาศาสตร์ มหาวิทยาลัยขอนแก่น
                                    </p>
                                    <img src="https://webcontest.cs.kku.ac.th/2562/photo/award.jpg" width=100%>
                                    <br><a href="https://webcontest.cs.kku.ac.th/index.php?page=result&y=2562"
                                        target="_blank">[1]</a> <a
                                        href="https://www.facebook.com/SMD.KKU/posts/2215982308531509"
                                        target="_blank">[2]</a>
                                    <hr>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-9">
                                            <h4><a class="btn btn-success"><i class="fas fa-eye"></i></a>
                                                รางวัลชนะเลิศการแข่งขันสร้างเว็บเพจ (Web editor) ระดับมัธยมศึกษาตอนปลาย
                                            </h4>
                                        </div>
                                        <div class="col-3">
                                            <h5 class="text-right"><span aria-hidden="true"></span>14/02/2562</h5>
                                        </div>
                                    </div>
                                    <h5><span class="badge badge-secondary">Computer Education Open House 2018</span>
                                    </h5>
                                    <p>โรงเรียนสาธิตมหาวิทยาลัยขอนแก่น ฝ่ายมัธยมศึกษา (มอดินแดง)
                                        ขอแสดงความยินดีกับนักเรียนที่ได้รับรางวัลจากการเข้าร่วมกิจกรรม Computer
                                        Education
                                        Open House 2018 สาขาคอมพิวเตอร์ศึกษา คณะศึกษาศาสตร์ มหาวิทยาลัยขอนแก่น
                                        เมื่อวันที่
                                        14 กุมภาพันธ์ 2562 ที่ผ่านมา ซึ่งนักเรียนที่ได้รับรางวัลมีดังต่อไปนี้
                                        นายวิชยุตม์
                                        สุรินทร์ชมพู และนายธนภัทร เครือน้ำคำ ได้รับรางวัลชนะเลิศการแข่งขันสร้าง
                                        Infographics
                                        ระดับมัธยมศึกษาตอนต้น นายรณกร ศรีพอ นายพลภณ สุนทรภาส
                                        และนายสหัสวัต สุดาพรรัตน์ ได้รับรางวัลชนะเลิศการแข่งขันสร้างเว็บเพจ (Web editor)
                                        ระดับมัธยมศึกษาตอนปลาย โดยมี นางสาวจุฬารัตน์ สียา เป็นอาจารย์ที่ปรึกษา
                                    </p>
                                    <img src="http://smd-s.kku.ac.th/home/images/smd-62/Computer_Education_Open_House_2018.jpg"
                                        width=100%>
                                    <a
                                        href="https://www.facebook.com/SMD.KKU/photos/?tab=album&album_id=1936354579827618">[1]</a>
                                    <a
                                        href="http://smd-s.kku.ac.th/home/index.php/component/content/article/80-2012-09-14-02-08-54/421-computer-education-open-house-2018">[2]</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <?php } ?>
                </div>
            </div>
        </form>
    </div>
    <?php include '../global/footer.php' ?>

</body>

</html>