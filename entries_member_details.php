<?php
  // Alle Blogeinträge holen, die Blog-ID ist in der Variablen $blogId gespeichert (wird in index.php gesetzt)
  // Hier Code... (Schlaufe über alle Einträge dieses Blogs)

  if(getUserIdFromSession() == 0) {
    header('Location: index.php?function=login&bid='.$blogId);
  }

$Entry = getEntry($EntryId);
$Comments = getComments($EntryId);

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
    <div class="content">
      <p>';

echo $Entry['content'];

echo '<p/>
    </div>
  </div>';



  // Nachfolgend das Beispiel einer Ausgabe in HTML, dieser Teil muss mit einer Schlaufe über alle Blog-Beiträge und der Ausgabe mit PHP ersetzt werden
?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']."?function=entries_member_createComment&bid=".$_SESSION['uid']."&eid=".$EntryId;?>">
  <div class="Kommentare">
    <h4>Kommentare</h4>
  <ul>
    <?php
    foreach($Comments as $Comment){
      echo '<li class="commentsCardLi"><div class="commentsCard"><p>'.$Comment['content'].'</p><small>'.date('d.m.Y',$Comment['datetime']).' '.$Comment['name'].'</small><br/>';
      if($_SESSION['uid'] == $blogId){
        echo '<a class="btn btn-primary" href="index.php?function=entries_member_deleteComment&bid='.$_SESSION['uid']."&eid=".$EntryId."&cid=".$Comment['cid'].'">Delete Comment</a>';
      }
      echo '</div></li><br/>';
    }
    ?>
  </ul>
  <div class="addComment">
    <h4>Neuer Kommentar</h4>
    <label id="labelTitle" for="commentTitle">Titel</label>
    <input type="text" id="commentTitle" name="name"><br/>
    <label id="labelContent" for="commentContent">Kommentar</label>
    <input type="text" id="commentCreate" name="content">
    <a></a>
  </div>
  <div class="btnComment">
    <button type="submit" class="btn btn-primary">Kommentar erfassen</button>
  </div>
</form>

<?php echo "<a href=\"javascript:history.go(-1)\">zurück</a>";?>
