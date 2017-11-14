<?php
  // Alle Blogeinträge holen, die Blog-ID ist in der Variablen $blogId gespeichert (wird in index.php gesetzt)
  // Hier Code... (Schlaufe über alle Einträge dieses Blogs)

  if(getUserIdFromSession() == 0) {
    header('Location: index.php?function=login&bid='.$blogId);
  }

$Comments = getComments($EntryId);

$Entry = getEntry($EntryId);


echo ' <div class="Entry">
    <div class="title">
      <h1>';

      echo $Entry['title'];

echo '</h1>
    </div>
    <div class="created_on">
      <p>';

      echo date('d.m.Y',$Entry['datetime']);

echo '</p>
    </div>
    <div class="clontent">
      <p>';

echo $Entry['content'];

echo '<p/>
    </div>
  </div>';

if(!empty($_POST['title']) & !empty($_POST['content'])){
  // hier kommt noch die Funktion zum erfassen eines Kommentares hin. 



}

  // Nachfolgend das Beispiel einer Ausgabe in HTML, dieser Teil muss mit einer Schlaufe über alle Blog-Beiträge und der Ausgabe mit PHP ersetzt werden
?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']."?function=entries_member_create&bid=".$_SESSION['uid']."&eid=".$EntryId;?>">
  <div class="Kommentare">
    <h4>Kommentare</h4>
  <ul>
    <?php
    foreach($Comments as $Comment){
      echo '<li><p>'.$Comment['content'].'</p><small>'.date('d.m.Y',$Comment['datetime']).'</small>';
    }
    ?>
  </ul>
  <div class="addComment">
    <label for="commentTitle">Titel</label>
    <input type="text" id="commentTitle" name="title"><br/>
    <label for="commentContent">Kommentar</label>
    <input type="text" id="commentCreate" name="content">
  </div>
  <div class="btnComment">
    <button type="submit" class="btn btn-primary">Kommentar erfassen</button>
  </div>
</form>
