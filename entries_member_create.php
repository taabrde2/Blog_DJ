<?php
if(getUserIdFromSession() == 0) {
  header('Location: index.php?function=login&bid='.$blogId);
}

$meldung = "";

if(empty($_POST['title']) & empty($_POST['content'])){
  $title = '';
  $content = '';

}
else{
$title = $_POST['title'];
$content = $_POST['content'];
$createdEntry = addEntry($_SESSION['uid'],$title,$content);
header('Location: index.php?function=entries_member&bid='.$_SESSION['uid']);
}



 ?>

 <form method="post" action="<?php echo $_SERVER['PHP_SELF']."?function=entries_member_create";?>">
   <div class="form-group">
     <label for="InputEmail1">Title</label>
     <input type="text" class="form-control" id="Inputtitle" aria-describedby="emailHelp" placeholder="Beitrags Titel" name="title">
     <small id="titleHelp" class="form-text text-muted"></small>
   </div>
   <div class="form-group">
     <label for="InputPassword1">Content</label>
     <textarea class="form-control" id="Inputcontent" placeholder="Beschreibung/Inhalt" name="content" row="50" cols="80"></textarea>
     <small id="contentHelp" class="form-text text-muted"></small>
   </div>
   <div class ="Fehlermeldung">
     <p><?php echo $meldung; ?></p>
   </div>
   <button type="submit" class="btn btn-primary">Beitrag erstellen</button>
 </form>

<?php echo "<a href=\"javascript:history.go(-1)\">zurück</a>";?>
