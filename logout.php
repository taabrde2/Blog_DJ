// Logt den Benutzer aus
 <?php unset($_SESSION['uid']);
 session_destroy();
header('Location: index.php?function=login&bid='.$blogId);
?>
