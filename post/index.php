<?php require '../global/connect.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require '../global/head.php'; ?>
    <style>
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

    <?php
        if (isset($_GET['id']) && !isValidPostID($_GET['id'], $conn)) back();

        if (isset($_GET['id']) && isValidPostID($_GET['id'], $conn) && getPostdata($_GET['id'], 'hotlink', $conn) != null)
            header("Location: " . getPostdata($_GET['id'], 'hotlink', $conn));

        if (!isset($_GET['id'])) {
            if (isset($_GET['category'])) $category = $_GET['category'];
            else header("Location: ../category/news-1");
            if ($category && !isValidCategory($category, $conn)) back();
        }
    ?>

    <div class="container" id="container" style="padding-top: 88px">
        
        <?php if(!isset($_GET['id'])) {
            if (isset($_GET['tags']) && startsWith($_GET['tags'] ,"@")) { ?>
                <div class='display-5'>โพสต์ที่เกี่ยวข้องกับ '<?php echo getUserdata(str_replace("@", "", trim($_GET['tags'])), 'firstname', $conn) . ' ' . getUserdata(str_replace("@", "", trim($_GET['tags'])), 'lastname', $conn) . " (". str_replace("@", "", trim($_GET['tags'])) .")"; ?>'
            <?php } else echo generateCategoryTitle($category); ?>
            <?php if (isLogin() && isPermission('isNewsReporter', $conn)) { ?><a href="../post/create"
                class="btn btn-sm btn-info"><i class="fas fa-plus"></i> เขียนข่าวใหม่</a><?php } ?>
                </div><hr>
        <?php } ?>
        <?php 
            $news_per_page = 10;
            $cur_page = 1;
            if (isset($_GET['page'])) $cur_page = $_GET['page'];

            $start_id = ($cur_page - 1) * $news_per_page;

            if (isset($_GET['id'])) {
                $news_ID = $_GET['id'];
                $query = "SELECT * FROM `post` WHERE id = $news_ID";
                $query_count = "SELECT `id` FROM `post` WHERE id = $news_ID";
            } else if (isset($_GET['tags'])) { //Tags case
                $t = $_GET['tags'];
                $c = $_GET['category'];
                if ($c == "~") {
                    $query = "SELECT * FROM `post` WHERE tags LIKE '%$t%' AND hide = 0 ORDER by pin DESC, time DESC limit {$start_id}, {$news_per_page}";
                    $query_count = "SELECT `id` FROM `post` WHERE tags LIKE '%$t%' AND hide = 0";
                } else if (strpos($t,"hidden") === false) {
                    $query = "SELECT * FROM `post` WHERE tags LIKE '%$t%' AND type = '$category' AND hide = 0 ORDER by pin DESC, time DESC limit {$start_id}, {$news_per_page}";
                    $query_count = "SELECT `id` FROM `post` WHERE tags LIKE '%$t%' AND hide = 0";
                } else if (startsWith($t, "@") && isValidUserID(str_replace("@", "", trim($_GET['tags'])),$conn)) {
                    $query = "SELECT * FROM `post` WHERE tags LIKE '%$t%' AND hide = 0 ORDER by pin DESC, time DESC limit {$start_id}, {$news_per_page}";
                    $query_count = "SELECT `id` FROM `post` WHERE tags LIKE '%$t%' AND hide = 0";
                } else {
                    $query = "SELECT * FROM `post` WHERE tags LIKE '%$t%' AND type = '$category' ORDER by pin DESC, time DESC limit {$start_id}, {$news_per_page}";
                    $query_count = "SELECT `id` FROM `post` WHERE tags LIKE '%$t%' AND type = '$category'";
                }
            } else { //Normal Case
                $query = "SELECT * FROM `post` WHERE hide = 0 AND type = '$category' ORDER by pin DESC, time DESC limit {$start_id}, {$news_per_page}";
                $query_count = "SELECT `id` FROM `post` WHERE hide = 0 AND type = '$category'";
            }

            $c = 0;

            $result = mysqli_query($conn, $query); ?>
        <?php if (!isset($_GET['id'])) { ?><div class="card-columns"><?php } ?>
            <?php while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { $c++; ?>
            <?php if (getPostdata($row['id'], 'hotlink', $conn) == null) { ?>
            <div class="card hoverable mb-3">
                <?php if ($row['cover'] != null) { ?><img class="card-img-top"
                    src="<?php echo $row['cover']; ?>"><?php } ?>
                <div class="card-body">
                    <p class="card-text"><i class="far fa-clock"></i>
                        <?php
                            $writer_id = $row['writer'];
                            $writer_name = getUserdata($writer_id, 'firstname', $conn) . ' ' . getUserdata($writer_id, 'lastname', $conn) . ' (' . getUserdata($writer_id, 'username', $conn) . ')';
                            echo $row['time'] . ' โดย ' . '<a href="../profile/' . $writer_id . '">' . $writer_name . '</a>'; 
                        ?>
                    </p>
                    <div class="card-title">
                        <h5 class="font-weight-bold"><a
                                href="../post/<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a>
                            <?php if (isLogin() && isPermission('isNewsReporter', $conn)) { ?><a
                                href="../post/edit-<?php echo $row['id']; ?>"><i
                                    class="fas fa-edit text-success"></i></a> <a
                                onclick='
                                    swal({title: "ลบข่าวหรือไม่ ?",text: "หลังจากที่ลบแล้ว ข่าวนี้จะไม่สามารถกู้คืนได้!",icon: "warning",buttons: true,dangerMode: true}).then((willDelete) => { if (willDelete) { window.location = "../post/delete.php?id=<?php echo $row["id"]; ?>";}});'>
                                <i class="fas fa-trash-alt text-danger"></i></a><?php } ?>
                        </h5>
                        <h6><?php foreach (explode(",", $row['tags']) as $s) { ?>
                            <a href="../category/<?php echo $row['type'] . "-1-" . $s; ?>"><span
                                    class="badge badge-smd z-depth-0"><?php echo $s; ?></span></a>
                            <?php } ?>
                        </h6>
                    </div>

                    <!-- Case post reader -->
                    <?php if (isset($_GET['id'])) { ?>
                    <?php if ($row['article'] != null) { ?>
                    <hr>
                    <p class="card-text"><?php echo $row['article']; ?></p>
                    <?php } ?>
                    <?php if ($row['attachment'] != null) { $aa = 0;?>
                    <hr>
                    <h5 class="font-weight-bold">ไฟล์แนบท้าย</h5>
                    <?php foreach (explode(",", $row['attachment']) as $a) { $aa++;?>
                    <li><a href="<?php echo $a; ?>"
                            target="_blank"><?php echo str_replace("../file/post/" . $_GET['id'] . "/" . "attachment/", "", $a); ?></a>
                    </li>
                    <?php } ?>
                    <?php if ($aa == 1 && strpos($row['attachment'], ".pdf")) { ?>
                    <iframe src="../static/pdf.js/web/viewer.html?file=<?php echo '../../' .  $row['attachment']; ?>" width="100%" height="750"></iframe>
                    <?php } ?>
                    <?php } ?>
                    <?php } ?>
                </div>
            </div>
            <?php } else { // Case post is a hotlink ?>
            <a href="<?php echo $row['hotlink']; ?>" target="_blank">
                <div class="card hoverable">
                    <?php if ($row['cover'] != null) { ?><img class="card-img-top"
                        src="<?php echo $row['cover']; ?>"><?php } ?>
                        <?php if (isLogin() && isPermission('isNewsReporter', $conn)) { ?><div class="card-body text-white p-2"><a
                    href="<?php echo $row['hotlink']; ?>" target="_blank"><?php echo $row['title']; ?></a>
                <a href="../post/edit-<?php echo $row['id']; ?>"><i class="fas fa-edit text-success"></i></a> <a
                    onclick='
                                    swal({title: "ลบข่าวหรือไม่ ?",text: "หลังจากที่ลบแล้ว ข่าวนี้จะไม่สามารถกู้คืนได้!",icon: "warning",buttons: true,dangerMode: true}).then((willDelete) => { if (willDelete) { window.location = "../post/delete.php?id=<?php echo $row["id"]; ?>";}});'>
                    <i class="fas fa-trash-alt text-danger"></i></a></div><?php } ?>
                </div>
            </a>
            <?php } ?>
            <?php } ?>
        </div>
        <div class="mb-3"></div>
        <?php if (!isset($_GET['id'])) {
            if ($c > 0) { ?>
        <hr>
        <?php
            $total = mysqli_num_rows(mysqli_query($conn, $query_count));
            $total_page = ceil($total / $news_per_page);?>
        <nav aria-label="Page navigation example">
            <ul class="pagination pagination-circle pg-amber justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="../category/<?php echo $_GET['category'] . "-1"?><?php if (isset($_GET['tags'])) echo '-' . $_GET['tags']; ?>"
                        aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php for($i=1;$i<=$total_page;$i++){ ?>
                <li class="page-item <?php if ($_GET['page'] == $i) echo 'active';?>"><a class="page-link"
                        href="../category/<?php echo $_GET['category'] . "-" . $i;?><?php if (isset($_GET['tags'])) echo '-' . $_GET['tags']; ?>"><?php echo $i; ?></a>
                </li>
                <?php } ?>
                <li class="page-item">
                    <a class="page-link"
                        href="../category/<?php echo $_GET['category'] . "-" . $total_page;?><?php if (isset($_GET['tags'])) echo '-' . $_GET['tags']; ?>"
                        aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
        <?php } else { ?>
            <h4 class="text-center"><i>ไม่พบข้อมูล</i></h4>
        <?php }
     } ?>
    </div>
    <?php require '../global/popup.php'; ?>
    <?php require '../global/footer.php'; ?>
</body>

</html>