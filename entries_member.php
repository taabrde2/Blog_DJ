<?php
if(getUserIdFromSession() == 0) {
  header('Location: index.php?function=login&bid='.$blogId);
}

$beitraege = getEntries($_SESSION['uid']);

foreach($beitraege as $beitraeg) {
  echo '<div class="card" style="width: 20rem; float:left;">
        <div class="card-body"><h4 "card-title">';
        // <img class="card-img-top" src="./images/martin.jpg" alt="Card image cap" style="width:50px;">
  echo $beitraeg['title'];
  echo '</h4><p class="card-text"><p>';
  echo date('d.m.Y',$beitraeg['datetime']);
  echo '</p>';

  $string = preg_replace("/[^ ]*$/", '', substr($beitraeg['content'], 0, 200));
  $punktpunktpunkt = '...';
  $string .= $punktpunktpunkt;
  echo $string;
  echo '</p>';
  echo '<a href="index.php?function=entries_member_details&bid='.$_SESSION['uid'].'&eid='.$beitraeg['eid'].'"><div class="btn btn-primary">Go to the Description</div></a></div>';
  echo '<a href="index.php?function=entries_member_delete&bid='.$_SESSION['uid'].'&eid='.$beitraeg['eid'].'" onclick="return confirmDeleteEntry();" class="btn btn-primary">Delete Entry</a>';
  echo '<a href="index.php?function=entries_member_edit&bid='.$_SESSION['uid'].'&eid='.$beitraeg['eid'].'" class="btn btn-primary">Edit Entry</a>'.'</div>';
}

?>
