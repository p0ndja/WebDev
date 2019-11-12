<html>

<body>
    <?php
               if(isset($_GET['action'])) {
                   $s = 0;
               if ($_GET['action'] == "Upload")
               	{
               		for($i=0;$i<count($_FILES["filUpload"]["name"]);$i++)
               		{
               			if($_FILES["filUpload"]["name"][$i] != "")
               			{
               				if(move_uploaded_file($_FILES["filUpload"]["tmp_name"][$i],"../cache/".$_FILES["filUpload"]["name"][$i]))
               				{
               					$s++;
                               } else {
                                   die("Could not move file: ");
                               }
               			}
               		}
               		if ($s) {
               			echo "Upload Completed";
                   }
                }
            }
               ?>
    <form name="form1" method="post" action="?action=Upload" enctype="multipart/form-data">
        <input class="input" type="file" style="width:200px" name="filUpload[]" multiple="multiple" required>
        <button class="button">Upload !</button>
    </form>
</body>

</html>