<?php include '../global/connect.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../global/head.php'; ?>
    <style>
    @media (min-width: 960px)
        {
        .card-columns {
            -webkit-column-count: 2;
            -moz-column-count: 2;
            column-count: 2;
        }
    }

    @media (max-width: 960px)
        {
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
        <?php include '../global/navbar.php'; ?>
    </nav>

    <?php if (isset($_GET['id']) && !isValidPostID($_GET['id'], $conn)) back(); ?>

    <div class="<?php if (!isset($_GET['id'])) echo 'container-fluid'; else echo 'container'; ?>" id="container" style="padding-top: 88px">
    <?php if (!isset($_GET['id'])) { ?>
    <div class="row">
    <div class="col-xl-1 d-none d-md-block"></div>
    <div class="col-xl-10 col-12">
    <?php } ?>
        <?php if(!isset($_GET['id'])) { ?><h1 id="news" name="news" class="font-weight-bold">NEWS
        <?php if (isLogin() && isPermission('isNewsReporter', $conn)) { ?><a href="../post/post.php" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> เขียนข่าวใหม่</a><?php } ?>
        </h1>
        <?php } ?>
        <?php 
            $news_per_page = 6;
            $cur_page = 1;
            if (isset($_GET['page'])) $cur_page = $_GET['page'];

            $start_id = ($cur_page - 1) * $news_per_page;

            if (isset($_GET['id'])) {
                $news_ID = $_GET['id'];
                $query = "SELECT * FROM `post` WHERE id = $news_ID";
                $query_count = "SELECT `id` FROM `post` WHERE id = $news_ID";
            } else if (isset($_GET['tags'])) { //Tags case
                $t = $_GET['tags'];
                if (strpos($t,"hidden") === false) {
                    $query = "SELECT * FROM `post` WHERE tags LIKE '%$t%' AND hide = 0 ORDER by time DESC limit {$start_id}, {$news_per_page}";
                    $query_count = "SELECT `id` FROM `post` WHERE tags LIKE '%$t%' AND hide = 0";
                } else {
                    $query = "SELECT * FROM `post` WHERE tags LIKE '%$t%' ORDER by time DESC limit {$start_id}, {$news_per_page}";
                    $query_count = "SELECT `id` FROM `post` WHERE tags LIKE '%$t%'";
                }
            } else { //Normal Case
                $query = "SELECT * FROM `post` WHERE hide = 0 ORDER by time DESC limit {$start_id}, {$news_per_page}";
                $query_count = "SELECT `id` FROM `post` WHERE hide = 0";
            }

            $result = mysqli_query($conn, $query); ?>
            <?php if (!isset($_GET['id'])) { ?><div class="card-columns"><?php } ?>
            <?php while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
                <?php if (getPostdata($row['id'], 'hotlink', $conn) == null) { ?>
            <div class="card hoverable mb-3">
                <?php if ($row['cover'] != null) { ?><img class="card-img-top" src="<?php echo $row['cover']; ?>"><?php } ?>
                <div class="card-body">
                    <p class="card-text"><i class="far fa-clock"></i>
                        <?php
                            $writer_id = $row['writer'];
                            $writer_name = getUserdata($writer_id, 'firstname', $conn) . ' ' . getUserdata($writer_id, 'lastname', $conn) . ' (' . getUserdata($writer_id, 'username', $conn) . ')';
                            echo $row['time'] . ' โดย ' . '<a href="../profile/' . $writer_id . '">' . $writer_name . '</a>'; 
                        ?>
                    </p>
                    <div class="card-title">
                        <h5 class="font-weight-bold"><a href="../post/<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a>
                        <?php if (isLogin() && isPermission('isNewsReporter', $conn)) { ?><a href="../post/post.php?id=<?php echo $row['id']; ?>"><i class="fas fa-edit text-success"></i></a> <a onclick='
                                    swal({title: "ลบข่าวหรือไม่ ?",text: "หลังจากที่ลบแล้ว ข่าวนี้จะไม่สามารถกู้คืนได้!",icon: "warning",buttons: true,dangerMode: true}).then((willDelete) => { if (willDelete) { window.location = "../post/delete.php?id=<?php echo $row["id"]; ?>";}});'>
                                    <i class="fas fa-trash-alt text-danger"></i></a><?php } ?>
                        </h5>
                        <h6><?php foreach (explode(",", $row['tags']) as $s) { ?>
                            <a href="../post/?tags=<?php echo $s; ?>"><span class="badge badge-smd z-depth-0"><?php echo $s; ?></span></a>
                            <?php } ?>
                        </h6>
                    </div>
                    <?php if (isset($_GET['id'])) { ?>
                        <?php if ($row['article'] != null) { ?><hr>
                        <p class="card-text"><?php echo $row['article']; ?></p>
                        <?php } ?>
                        <?php if ($row['attachment'] != null) { $aa = 0;?>
                        <hr>
                        <h5 class="font-weight-bold">ไฟล์แนบท้าย</h5>
                            <?php foreach (explode(",", $row['attachment']) as $a) { $aa++;?>
                                <li><a href="<?php echo $a; ?>" target="_blank"><?php echo str_replace("../file/post/attachment/" . $_GET['id'] . "/", "", $a); ?></a></li>
                            <?php } ?>
                            <?php if ($aa == 1 && strpos($row['attachment'], ".pdf")) { ?>
                                <iframe src="https://docs.google.com/viewer?url=<?php echo str_replace("../" , "https://smd.pondja.com/" , $row['attachment']); ?>&embedded=true" width="100%" height="750"></iframe>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
            <?php } else { // Case post is a hotlink ?>
                <a href="<?php echo $row['hotlink']; ?>" target="_blank">
                <div class="card hoverable">
                    <?php if ($row['cover'] != null) { ?><img class="card-img-top" src="<?php echo $row['cover']; ?>"><?php } ?>
                </div>
                </a>
                <p class="mb-3"><?php if (isLogin() && isPermission('isNewsReporter', $conn)) { ?><a href="<?php echo $row['hotlink']; ?>" target="_blank"><?php echo $row['title']; ?></a>
                                <a href="../post/post.php?id=<?php echo $row['id']; ?>"><i class="fas fa-edit text-success"></i></a> <a onclick='
                                    swal({title: "ลบข่าวหรือไม่ ?",text: "หลังจากที่ลบแล้ว ข่าวนี้จะไม่สามารถกู้คืนได้!",icon: "warning",buttons: true,dangerMode: true}).then((willDelete) => { if (willDelete) { window.location = "../post/delete.php?id=<?php echo $row["id"]; ?>";}});'>
                                    <i class="fas fa-trash-alt text-danger"></i></a><?php } ?>
                                    </p>
                    <?php } ?>
            <?php } ?>
            </div>
            <?php if (!isset($_GET['id'])) { ?>
        </div>
    <div class="col-xl-1 d-none d-md-block"></div>
    </div>
    <?php } ?>
    <div class="mb-3"></div>
    <?php if (!isset($_GET['id'])) { ?>
    <hr>
        <?php
            $total = mysqli_num_rows(mysqli_query($conn, $query_count));
            $total_page = ceil($total / $news_per_page);?>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="?page=1<?php if (isset($_GET['tags'])) echo '&tags=' . $_GET['tags']; ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php for($i=1;$i<=$total_page;$i++){ ?>
                <li class="page-item"><a class="page-link" href="?page=<?php echo $i;?><?php if (isset($_GET['tags'])) echo '&tags=' . $_GET['tags']; ?>"><?php echo $i; ?></a></li>
                <?php } ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?php echo $total_page;?><?php if (isset($_GET['tags'])) echo '&tags=' . $_GET['tags']; ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    <?php } ?>
    </div>
    <?php include '../global/popup.php'; ?>
    <?php include '../global/footer.php'; ?>
</body>
</html>