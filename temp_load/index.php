<?php 
    include '../global/connect.php';
    include '../global/popup.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../global/head.php';?>
</head>

<body style="background-color: #ededed">
    <?php include '../global/login.php' ?>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-normal fixed-top scrolling-navbar" id="nav"
        role="navigation">
        <?php include '../global/navbar.php'; ?>
    </nav>
    <div class="container" id="container" style="padding-top: 88px">
    <div class="card">
      <div class="card-header">
        Textarea
      </div>
      <div class="card-body">
        <form action="#" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="input">Text</label>
            <input type="text" class="form-control" id="input" value="Title">
          </div>
          <div class="form-group">
            <label for="contents">Contents</label>
            <textarea name="contents" class="summernote" id="contents" title="Contents"></textarea>
          </div>
          <input type="submit" class="btn btn-primary" value="Submit">
        </form>
      </div>
    </div>

        <div class="row text-center">
            <?php echo '<img src="' . $_GET['img'] . '" width="100%" height="100%">'; ?>
        </div>
    </div>
    <?php include '../global/footer.php' ?>
</body>

</html>