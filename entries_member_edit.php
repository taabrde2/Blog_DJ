<?php
if(getUserIdFromSession() == 0) {
  header('Location: index.php?function=login&bid='.$blogId);
}

// Update noch realisieren!!

$updateValues['title'] = '';
$updateValues['content'] = '';

 $Entry = getEntry($EntryId);

    //var_dump(getEntry($EntryId));

   if(isset($_POST['title']) & isset($_POST['content'])){
   $updateValues['title'] = $_POST['title'];
   $updateValues['content'] = $_POST['content'];
   $updateValues['eid'] = $_POST['eid'];



   // var_dump($updateValues['title']);
   // var_dump($updateValues['content']);
   // var_dump($EntryId);


   $EditedEntry = updateEntry($updateValues['eid'],$updateValues['title'],$updateValues['content']);
   header('Location: index.php?function=entries_member&bid='.$_SESSION['uid']);
   }

 ?>

 <form method="post" action="<?php echo $_SERVER['PHP_SELF']."?function=entries_member_edit";?>">
   <div class="form-group">
      <input type="hidden" class="form-control" id="Inputid" name="eid" value="<?php echo $Entry['eid']; ?>">
     <label for="Inputtitle">Title</label>
     <input type="text" class="form-control" id="Inputtitle" aria-describedby="emailHelp" placeholder="Beitrags Titel" name="title" value="<?php echo $Entry['title']; ?>">
     <small id="titleHelp" class="form-text text-muted"></small>
   </div>
   <div class="form-group">
     <label for="InputPassword1">Content</label>
     <textarea class="form-control" id="Inputcontent" placeholder="Beschreibung/Inhalt" name="content" row="50" cols="80"><?php echo $Entry['content']; ?></textarea>
     <small id="contentHelp" class="form-text text-muted"></small>
   </div>
   <button type="submit" class="btn btn-primary">Beitrag ändern</button>
 </form>

 
