<?php require '../global/connect.php'; ?>

<!DOCTYPE html>
<html lang="th">

<head>
    <?php require '../global/head.php'; ?>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-normal fixed-top scrolling-navbar" id="nav"
        role="navigation">
        <?php require '../global/navbar.php'; ?>
    </nav>
    <div class="container" id="container" style="padding-top: 88px">
        <h1><form method="POST">
            <div class="md-form form-lg">
                <i class="fas fa-search prefix"></i>
                <input value="<?php if (isset($_POST['search'])) echo $_POST['search']; ?>" type="text" id="search"
                    class="form-control form-control-lg" name="search">
                <label for="search">Search</label>
            </div>
        </form></h1>
        <hr>
        <?php if (isset($_POST['search'])) {
            $s = $_POST['search'];
            $q = "SELECT * FROM `user` WHERE id LIKE '%$s%' OR firstname LIKE '%$s%' OR lastname LIKE '%$s%'"; 
            $r = mysqli_query($conn, $q);

            echo '<h3>Profile: Found <b>' . mysqli_num_rows($r) . '</b> Record(s) that look like "' . $s . '"<br></h3><ul>';

            while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                echo '<li><a href="../profile/' . $row['id'] . '">' .$row['firstname'] . ' ' . $row['lastname'] . ' (' . $row['id']. ')</a></li>';
            }

            echo '</ul>';

            $q = "SELECT * FROM `post` WHERE title LIKE '%$s%' OR article LIKE '%$s%' OR tags LIKE '%$s%' OR writer LIKE '%$s%' OR attachment LIKE '%$s%'"; 
            $r = mysqli_query($conn, $q);

            echo '<h3>News: Found <b>' . mysqli_num_rows($r) . '</b> Record(s) that look like "' . $s . '"<br></h3><ul>';

            while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                echo '<li><a href="../post/' . $row['id'] . '">' . $row['title'] . ' by ' . $row['writer']. '</a></li>';
            }

            if (isValidUserID($s, $conn)) {
                $n_th = getUserdata($s, 'firstname', $conn);
                $n_en = getUserdata($s, 'firstname_en', $conn);

                $q = "SELECT * FROM `post` WHERE title LIKE '%$n_th%' OR article LIKE '%$n_th%' OR tags LIKE '%$n_th%' OR writer LIKE '%$n_th%' OR title LIKE '%$n_en%' OR article LIKE '%$n_en%' OR tags LIKE '%$n_en%' OR writer LIKE '%$n_en%'"; 
                $r = mysqli_query($conn, $q);

                while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                    echo '<li><a href="../post/' . $row['id'] . '">' . $row['title'] . ' by ' . $row['writer']. '</a></li>';
                }
            }

            echo '</ul>';
        }
        ?>
    </div>
<?php require '../global/popup.php'; ?>
<?php require '../global/footer.php'; ?>
</body>

</html>