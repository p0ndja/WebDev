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

    <div class="container-fluid" id="container" style="padding-top: 88px">
    <div class="row">
    <div class="col-xl-1 d-none d-md-block"></div>
    <div class="col-xl-10 col-12">
        <?php if (!isset($_GET['id'])) { ?><h1 id="news" name="news">NEWS <?php if (isLogin()) { ?><a href="../news/post.php" class="btn btn-dark">add news</a><?php }} ?></h1>

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
                    $query = "SELECT * FROM `post` WHERE tags LIKE '%$t%' AND tags NOT LIKE '%hidden%' ORDER by time DESC limit {$start_id}, {$news_per_page}";
                    $query_count = "SELECT `id` FROM `post` WHERE tags LIKE '%$t%' AND tags NOT LIKE '%hidden%'";
                } else {
                    $query = "SELECT * FROM `post` WHERE tags LIKE '%$t%' ORDER by time DESC limit {$start_id}, {$news_per_page}";
                    $query_count = "SELECT `id` FROM `post` WHERE tags LIKE '%$t%'";
                }
            } else { //Normal Case
                $query = "SELECT * FROM `post` WHERE tags NOT LIKE '%hidden%' ORDER by time DESC limit {$start_id}, {$news_per_page}";
                $query_count = "SELECT `id` FROM `post` WHERE tags NOT LIKE '%hidden%'";
            }

            $result = mysqli_query($conn, $query); ?>
            <?php if (!isset($_GET['id'])) { ?><div class="card-columns"><?php } ?>
            <?php while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
                
            <div class="card hoverable mb-3">
                <?php if ($row['cover'] != null) { ?><img class="card-img-top" src="<?php echo $row['cover']; ?>"><?php } ?>
                <div class="card-body">
                    <p class="card-text"><i class="far fa-clock"></i>
                        <?php
                            $writer_id = $row['writer'];
                            $writer_name = getUserdata($writer_id, 'firstname', $conn) . ' ' . getUserdata($writer_id, 'lastname', $conn) . ' (' . getUserdata($writer_id, 'username', $conn) . ')';
                            echo $row['time'] . ' โดย ' . '<a href="../profile/?search=' . $writer_id . '">' . $writer_name . '</a>'; 
                        ?>
                    </p>
                    <div class="card-title">
                        <h5 class="font-weight-bold"><a href="../news/?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a>
                        <?php if (isLogin() && needPermission('isNewsReporter', $conn)) { ?><a href="../news/post.php?id=<?php echo $row['id']; ?>"><i class="fas fa-edit text-success"></i></a> <a onclick='
                                    swal({title: "ลบข่าวหรือไม่ ?",text: "หลังจากที่ลบแล้ว ข่าวนี้จะไม่สามารถกู้คืนได้!",icon: "warning",buttons: true,dangerMode: true}).then((willDelete) => { if (willDelete) { window.location = "../news/delete.php?id=<?php echo $row["id"]; ?>";}});'>
                                    <i class="fas fa-trash-alt text-danger"></i></a><?php } ?>
                        </h5>
                        <h6><?php foreach (explode(",", $row['tags']) as $s) { ?>
                            <a href="../news/?tags=<?php echo $s; ?>"><span class="badge badge-secondary z-depth-0"><?php echo $s; ?></span></a>
                            <?php } ?>
                        </h6>
                    </div>
                    <?php if (isset($_GET['id'])) { ?>
                        <hr>
                        <p class="card-text"><?php echo $row['article']; ?></p>
                    <?php } ?>
                </div>
            </div>
            <?php } ?>
            </div>
        </div>
    <div class="col-xl-1 d-none d-md-block"></div>
    </div>
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
</body>
    <?php include '../global/footer.php'; ?>
    <?php include '../global/popup.php'; ?>
</html>