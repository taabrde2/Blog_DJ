<?php

if(getUserIdFromSession() == 0) {
  header('Location: index.php?function=login&bid='.$blogId);
}

$Comments = getComments($EntryId);

if($blodId != $_SESSION['uid']){
  header('Location: index.php?function=entries_public_details&bid='.$_SESSION['uid'].'&eid='.$EntryId);
}

?>

<?php
  deleteComment($CommentId);

  header('Location: index.php?function=entries_public_details&bid='.$_SESSION['uid'].'&eid='.$EntryId);
?>
