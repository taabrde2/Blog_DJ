<?php
if(getUserIdFromSession() == 0) {
  header('Location: index.php?function=login&bid='.$blogId);
}
elseif($UserRole != 2){
  header('Location: index.php?function=login&bid='.$blogId);
}

delUser($blogId);
header('Location: index.php?function=blogs');
 ?>
