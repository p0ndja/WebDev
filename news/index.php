<?php 
    include '../global/connect.php';
    include '../global/popup.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../global/head.php';?>
</head>

<body">
    <?php include '../global/login.php' ?>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-normal fixed-top sticky" id="nav" role="navigation">
        <?php include '../global/navbar.php'; ?>
    </nav>
    <div class="content"></div>
    <div class="container">
        <h1 id="news" name="news">NEWS <a href="../news/post.php" class="btn btn-dark">add news</a></h1>
        <div class="row">
            <?php
            $query = "SELECT * FROM `post` ORDER by time DESC limit 6";
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
            <div class="col-12 col-md-12">
                <div class="card z-depth-0">
                    <div class="hoverable view">
                        <img class="card-img-top" src="<?php echo $row['cover']; ?>" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text"><span class="oi" data-glyph="calendar"></span>
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
                            <h5 class="card-title"><?php echo $row['title']; ?></h5>
                            <p class="card-text">
                                <p class="d-none d-md-block">
                                    <?php echo $row['article']; ?>
                                    <span
                                        class="badge badge-secondary z-depth-0"><?php if ($row['tags'] != null) echo $row['tags']; ?></span>
                                </p>
                            </p>
                        </div>
                        <div class="card-footer text-right"><a href="#news" class="card-link">อ่านเพิ่มเติม</a>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
            <?php }
        ?>
        </div>
    </div>
    <?php include '../global/footer.php' ?>
</body>

</html>