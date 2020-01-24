<?php include '../global/connect.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../global/head.php'; ?>
</head>

<body">
    <nav class="navbar navbar-expand-lg navbar-dark navbar-normal fixed-top scrolling-navbar" id="nav" role="navigation">
        <?php include '../global/navbar.php'; ?>
    </nav>
    <div class="container" id="container" style="padding-top: 88px">
    <?php if (!isset($_GET['news'])) { ?>
        <h1 id="news" name="news">NEWS
            <?php if (isset($_SESSION['id'])) { ?>
            <a href="../news/post.php" class="btn btn-dark">add news</a>
        <?php }  ?> </h1>
            <?php } ?>
        <div class="row">
            <?php
            if (isset($_GET['news'])) {
                $postID = $_GET['news'];
                $query = "SELECT * FROM `post` WHERE id = $postID";
            } else {
                $query = "SELECT * FROM `post` ORDER by time DESC";//limit 6
            }
            
            $result = mysqli_query($conn, $query);
            $count = 0;
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
            <?php
                $tags_bool = false;
                $tags_split = explode(",", $row['tags']);
                if (isset($_GET['tags'])) {
                    foreach ($tags_split as $s) {
                        if ($s == $_GET['tags']) $tags_bool = true;
                    }
                }
            ?>
            <?php if ((isset($_GET['tags']) && $tags_bool) || !isset($_GET['tags'])) { 
                    $count++;
            ?>
            <div class="col-12 col-md-12">
                <div class="card mb-4">
                    <div class="hoverable view">
                    <?php if ($row['cover'] != null) { ?>
                        <img class="card-img-top" src="<?php echo $row['cover']; ?>">
                    <?php } ?>
                        <div class="card-body">
                            <p class="card-text"><i class="far fa-clock"></i>
                                <?php
                                $writer = null;
                                $writer_id = $row['writer'];
                                $query_final = "SELECT * FROM `user` WHERE id = '$writer_id'";
                                $result_final = mysqli_query($conn, $query_final);
                                while($row2 = mysqli_fetch_array($result_final, MYSQLI_ASSOC)) {
                                    $writer = $row2['firstname'] . ' ' . $row2['lastname'] . ' (' . $row2['username'] . ')';
                                }
                                if ($writer != null)
                                echo $row['time'] . ' โดย ' . '<a href="../profile/?search=' . $writer_id . '">' . $writer . '</a>'; 
                            ?>
                            </p>
                            <div class="card-title">
                            <h2 class="font-weight-bold">
                                <?php 
                                    echo '<a href="../news/?news=' . $row['id'] . '">' . $row['title'] . '</a> ';
                                    if (isset($_SESSION['id'])) echo '<a href="../news/post.php?news=' . $row['id'] . '"><i class="fas fa-pen-square"></i></a>'; 
                                    echo '</h2><h4>';
                                    foreach ($tags_split as $s) { ?>
                                        <a href="../news/?tags=<?php echo $s; ?>">
                                        <span class="badge badge-secondary z-depth-0"><?php echo $s; ?></span>
                                        </a>
                                    <?php } ?>
                                </h4>
                                    </div>
                                    <hr>
                            <p class="card-text">
                                <p class="d-none d-md-block">
                                    <?php echo $row['article']; ?>
                                </p>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <?php }?>
        </div>
        <?php if ($count == 0) { ?>
                <center><h3>ไม่พบแท็กสำหรับ</h3>
            <h1>'<?php echo $_GET['tags']; ?>'</h1>
                <img src="https://images.pondja.com/capoo_sad.gif" class="img-fluid mb-5">
                </center>
            <?php } ?>
    </div>

</body>

<?php include '../global/footer.php'; ?>
<?php include '../global/popup.php'; ?>

</html>