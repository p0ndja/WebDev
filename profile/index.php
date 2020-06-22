<?php require '../global/connect.php'; ?>
<?php if (!getConfig('global_userProfile', 'bool', $conn)) { back(); } ?>

<!DOCTYPE html>
<html lang="th">

<head>
    <?php require '../global/head.php'; ?>
    <?php
        $id;
        if (isset($_GET['id'])) $id = $_GET['id'];
        else if (isset($_SESSION['id'])) $id = $_SESSION['id'];
        else needLogin();

        if (!isValidUserID($id, $conn)) back();

        $profile_background = getProfileData($id, 'background', $conn);
        $profile_image = getProfilePicture($id, $conn);
        $profile_greets = getProfileData($id, 'greetings', $conn);
        $_SESSION['isDarkProfile'] = getProfileData($id, 'isDark', $conn);
        
        if (getProfileData($id, 'background', $conn) == null) {
            if (!$_SESSION['dark_mode']) $profile_background = "../static/images/background/bg_light_pastel.jpg";
            else { 
                $profile_background = "../static/images/background/bg_dark_resize.jpg";
                $_SESSION['isDarkProfile'] = true;
            }
        }
    ?>
    <style>
        body {
            background: url(<?php echo $profile_background ?>) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            background-size: cover;
            -o-background-size: cover;
        }
        
        @media (min-width: 960px) {
            .card-columns {
                -webkit-column-count: 2;
                -moz-column-count: 2;
                column-count: 2;
            }
        }

        @media (max-width: 960px) {
            .card-columns {
                -webkit-column-count: 1;
                -moz-column-count: 1;
                column-count: 1;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-normal fixed-top scrolling-navbar" id="nav"
        role="navigation">
        <?php require '../global/navbar.php'; ?>
    </nav>
    <div class="container" id="container" style="padding-top: 88px">
        <div class="row">
            <div class="col mb-3">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <img src="<?php echo $profile_image; ?>" class="thumb-post img-fluid" alt="Profile">
                    </div>
                    <div class="col-12 col-md-9">
                        <?php echo generateInfoCard($id, $conn); ?>
                        <?php echo generateAchievementCard($id, $conn); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
            <div class="card-columns">
                <?php if ($profile_greets != null) { ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <p><?php echo $profile_greets ?></p>
                    </div>
                </div>
                <?php } ?>
                <?php if (1) { ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <h2>ประวัติการศึกษา</h2>
                        <!-- 1 -->
                        <div class="d-flex flex-nowrap">
                            <div class="flex-grow-1"><h5>Undefined</h5></div>
                            <div class="text-nowrap">Undefined</div>
                        </div>
                        <h6><span class="badge badge-primary">ระดับประถมศึกษา</span></h6>
                        <!-- 2 -->
                        <div class="d-flex flex-nowrap">
                            <div class="flex-grow-1"><h5>Undefined</h5></div>
                            <div class="text-nowrap">Undefined</div>
                        </div>
                        <h6><span class="badge badge-primary">ระดับมัธยศึกษาตอนต้น</span></h6>
                        <!-- 3 -->
                        <div class="d-flex flex-nowrap">
                            <div class="flex-grow-1"><h5>Undefined</h5></div>
                            <div class="text-nowrap">Undefined</div>
                        </div>
                        <h6><span class="badge badge-primary">ระดับมัธยมศึกษาตอนปลาย</span></h6>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-body">
                        <h2>ประสบการณ์</h2>
                        <?php
                            $tagPostNoSplit = getProfiledata($id, 'tagPostID', $conn);
                            $i = 0;
                            foreach (explode("|", $tagPostNoSplit) as $s) { 
                                if ($s != null) { $i++; ?>
                                    <hr>
                                    <div class="d-flex flex-nowrap">
                                        <div class="flex-grow-1"><h5><a href="../post/<?php echo "$s"?>"><?php echo getPostdata($s, 'title', $conn); ?></a></h5></div>
                                        <div class="text-nowrap"><?php echo str_replace("-", "/", substr(getPostdata($s, 'time', $conn), 0, -9)); ?></div>
                                    </div>
                                    <?php if (getPostdata($s, 'cover', $conn) != null) {?><img src="<?php echo getPostdata($s, 'cover', $conn); ?>" class="img-fluid"/><?php } ?>
                            <?php }
                            } if ($i == 0) echo "<i>No Information</i>";
                        ?>
                    </div>
                </div>
                <?php } ?>
                </div>
            </div>
        </div>
        <?php if(isThisMyID($id, $conn)) { ?>
            <div class="fixed-action-btn" style="bottom: 40px; right: 30px;">
                <a class="btn btn-warning" align="left" href="./edit">แก้ไข</a>
            </div>
        <?php } ?>
    </div>
    <?php require '../global/popup.php'; ?>
    <?php require '../global/footer.php'; ?>
</body>

</html>