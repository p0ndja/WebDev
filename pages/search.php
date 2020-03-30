<?php include '../global/connect.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../global/head.php'; ?>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-normal fixed-top scrolling-navbar" id="nav"
        role="navigation">
        <?php include '../global/navbar.php'; ?>
    </nav>
    <div class="container" id="container" style="padding-top: 88px">
        <h1><form method="GET">
            <div class="md-form form-lg">
                <i class="fas fa-search prefix"></i>
                <input value="<?php if (isset($_GET['search'])) echo $_GET['search']; ?>" type="text" id="search"
                    class="form-control form-control-lg" name="search">
                <label for="search">Search</label>
            </div>
        </form></h1>
        <hr>
        <?php if (isset($_GET['search'])) {
            $s = $_GET['search'];
            $q = "SELECT * FROM `user` WHERE id LIKE '%$s%' OR firstname LIKE '%$s%' OR lastname LIKE '%$s%'"; 
            $r = mysqli_query($conn, $q);

            echo '<h3>Profile: Found <b>' . mysqli_num_rows($r) . '</b> Record(s) that look like "' . $s . '"<br></h3><ul>';

            while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                echo '<li><a href="../profile/?search=' . $row['id'] . '">' .$row['firstname'] . ' ' . $row['lastname'] . ' (' . $row['id']. ')</a></li>';
            }

            echo '</ul>';

            $q = "SELECT * FROM `post` WHERE title LIKE '%$s%' OR article LIKE '%$s%' OR tags LIKE '%$s%' OR writer LIKE '%$s%'"; 
            $r = mysqli_query($conn, $q);

            echo '<h3>News: Found <b>' . mysqli_num_rows($r) . '</b> Record(s) that look like "' . $s . '"<br></h3><ul>';

            while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                echo '<li><a href="../news/?id=' . $row['id'] . '">' . $row['title'] . ' by ' . $row['writer']. '</a></li>';
            }

            echo '</ul>';
        }
        ?>
    </div>
<?php include '../global/popup.php'; ?>
<?php include '../global/footer.php'; ?>
</body>

</html>