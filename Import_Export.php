<button style="width:100px; height:100px;"  action="<?php echo $_SERVER['PHP_SELF']."?function=uploadToServer&bid=".$blogId;?>" type="button" name="button"></button>





 <form  action="<?php echo $_SERVER['PHP_SELF']."?function=upload&bid=".$blogId;?>" method="post" enctype="multipart/form-data">
 <input type="file" name="datei"><br>
 <input type="submit" value="Hochladen">
 </form>
