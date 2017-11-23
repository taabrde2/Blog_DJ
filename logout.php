// Logt den Benutzer aus
 <?php

 if(getUserIdFromSession() == 0) {
   header('Location: index.php?function=login&bid='.$blogId);
 }

 unset($_SESSION['uid']);
 session_destroy();
 header('Location: index.php?function=login&bid='.$blogId);
?>
