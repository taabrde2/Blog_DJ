<?php
if(getUserIdFromSession() == 0) {
  header('Location: index.php?function=login&bid='.$blogId);
}
elseif($UserRole == 1){
  header('Location: index.php?function=login&bid='.$blogId);
}
 ?>

<button style="width:100px; height:100px;" action="uploadToServer.php" type="button" name="button"></button>





 <form action="upload.php" method="post" enctype="multipart/form-data">
 <input type="file" name="datei"><br>
 <input type="submit" value="Hochladen">
 </form>
