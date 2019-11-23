<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Summernote - Textarea</title>

  <!-- include jquery -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>

  <!-- include libraries BS -->
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.css" />
  <script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.5/umd/popper.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.js"></script>

  <!-- include summernote -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script>

  <script type="text/javascript">
    $(function () {
      $('.summernote').summernote({
        height: 200,
      });
    });
  </script>
</head>

<body>
  <div class="container">
    <h1>Summernote using textarea</h1>
    <?php
	if (isset($_POST['contents'])) {
		echo $_POST['contents'];
}
?>
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
  </div>
</body>

</html>