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
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
            <div class="col-12 col-md-12">
                <div class="card mb-3">
                    <div class="hoverable view">
                    <?php if ($row['cover'] != null) { ?>
                        <img class="card-img-top" src="<?php echo $row['cover']; ?>">
                    <?php } ?>
                        <div class="card-body">
                            <p class="card-text"><i class="far fa-clock"></i>
                                <?php
                                $writer = null;
                                $writer_id = $row['writer'];
                                $query_final = "SELECT * FROM `userdatabase` WHERE id = '$writer_id'";
                                $result_final = mysqli_query($conn, $query_final);
                                while($row2 = mysqli_fetch_array($result_final, MYSQLI_ASSOC)) {
                                    $writer = $row2['firstname'] . ' ' . $row2['lastname'] . ' (' . $row2['username'] . ')';
                                }
                                if ($writer != null)
                                echo $row['time'] . ' โดย ' . '<a href="../profile/?search=' . $writer_id . '">' . $writer . '</a>'; 
                            ?>
                            </p>
                            <div class="card-title">
                            <h1>
                                <?php 
                                    echo '<a href="../news/?news=' . $row['id'] . '">' . $row['title'] . '</a></h1><h4>'; 
                                    $split = explode(",", $row['tags']);
                                    foreach ($split as $s) { ?>
                                        <span class="badge badge-secondary z-depth-0"><?php echo $s; ?></span>
                                    <?php }
                                ?>
                                </h4>
                                    </div>
                            <p class="card-text">
                                <p class="d-none d-md-block">
                                    <?php echo $row['article']; ?>
                                </p>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <?php }?>
        </div>
    </div>

</body>

<?php include '../global/footer.php'; ?>
<?php include '../global/popup.php'; ?>

</html>