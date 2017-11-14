<?php
if(getUserIdFromSession() == 0) {
  header('Location: index.php?function=login&bid='.$blogId);
}

deleteEntry($EntryId);
header('Location: index.php?function=entries_member&bid='.$_SESSION['uid']);
?>
