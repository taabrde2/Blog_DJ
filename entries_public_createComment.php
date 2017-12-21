<?php




if(!empty($_POST['name']) & !empty($_POST['content'])){
  // hier kommt noch die Funktion zum erfassen eines Kommentares hin.
  $title = $_POST['name'];
  $content = $_POST['content'];

  $addetComment = addComment($EntryId,$title,$content);
  header('Location: index.php?function=entries_public_details&bid='.$blogId.'&eid='.$EntryId);
  //alert('Erledigt');
}

header('Location: index.php?function=entries_public_details&bid='.$blogId.'&eid='.$EntryId);
?>
