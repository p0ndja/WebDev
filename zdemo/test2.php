<?php require '../global/connect.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require '../global/head.php'; ?>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-normal fixed-top scrolling-navbar" id="nav"
        role="navigation">
        <?php require '../global/navbar.php'; ?>
    </nav>
    <div class="container" id="container" style="padding-top: 88px">
        <div class="panel panel-default">
            <div class="panel-heading">Select Profile Image</div>
            <div class="panel-body" align="center">
                <input type="file" name="upload_image" id="upload_image" />
                <br />
                <div id="uploaded_image"></div>
            </div>
        </div>
        <div id="uploadimageModal" class="modal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Upload & Crop Image</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-8 text-center">
                                <div id="image_demo" style="width:350px; margin-top:30px"></div>
                            </div>
                            <div class="col-md-4" style="padding-top:30px;">
                                <br />
                                <br />
                                <br />
                                <button class="btn btn-success crop_image">Crop & Upload Image</button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
            $(document).ready(function () {

                $image_crop = $('#image_demo').croppie({
                    enableExif: true,
                    viewport: {
                        width: 200,
                        height: 200,
                        type: 'square' //circle
                    },
                    boundary: {
                        width: 300,
                        height: 300
                    }
                });

                $('#upload_image').on('change', function () {
                    var reader = new FileReader();
                    reader.onload = function (event) {
                        $image_crop.croppie('bind', {
                            url: event.target.result
                        }).then(function () {
                            console.log('jQuery bind complete');
                        });
                    }
                    reader.readAsDataURL(this.files[0]);
                    $('#uploadimageModal').modal('show');
                });

                $('.crop_image').click(function (event) {
                    $image_crop.croppie('result', {
                        type: 'canvas',
                        size: 'viewport'
                    }).then(function (response) {
                        $.ajax({
                            url: "upload.php",
                            type: "POST",
                            data: {
                                "image": response
                            },
                            success: function (data) {
                                $('#uploadimageModal').modal('hide');
                                $('#uploaded_image').html(data);
                            }
                        });
                    })
                });

            });
        </script>
    <?php require '../global/popup.php'; ?>
    <?php require '../global/footer.php'; ?>
</body>

</html>