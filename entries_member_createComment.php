<?php

if(getUserIdFromSession() == 0) {
  header('Location: index.php?function=login&bid='.$blogId);
}

$Comments = getComments($EntryId);

if(!empty($_POST['name']) & !empty($_POST['content'])){
  // hier kommt noch die Funktion zum erfassen eines Kommentares hin.

  $title = $_POST['name'];
  $content = $_POST['content'];

  $addetComment = addComment($EntryId,$title,$content);
  header('Location: index.php?function=entries_member_details&bid='.$_SESSION['uid'].'&eid='.$EntryId);
  //alert('Erledigt');
}
  header('Location: index.php?function=entries_member_details&bid='.$_SESSION['uid'].'&eid='.$EntryId);
?>
