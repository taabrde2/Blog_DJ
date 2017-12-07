<?php
if(getUserIdFromSession() == 0) {
  header('Location: index.php?function=login&bid='.$blogId);
}
elseif($UserRole != 2){
  header('Location: index.php?function=login&bid='.$blogId);
}
 ?>

<button style="width:100px; height:100px;" action="<?php "index.php?function=uploadToServer&bid=".$blogId;?>" type="button" name="button"></button>





 <form  action="<?php echo $_SERVER['PHP_SELF']."?function=upload&bid=".$blogId;?>" method="post" enctype="multipart/form-data">
 <input type="file" name="datei"><br>
 <input type="submit" value="Hochladen">
 </form>
