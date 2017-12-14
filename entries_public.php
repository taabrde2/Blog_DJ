<?php
  // Alle Blogeinträge holen, die Blog-ID ist in der Variablen $blogId gespeichert (wird in index.php gesetzt)
  // Hier Code... (Schlaufe über alle Einträge dieses Blogs)

  $beitraege = getEntries($blogId);
  if(!empty($_SESSION['uid'])){
    $AdminRole = getUserRole($_SESSION['uid']);
  }
  else {
    $AdminRole = 0;
  }

if($AdminRole == 2 && !empty($_SESSION['uid'])){
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
    echo '<a href="index.php?function=entries_public_details&bid=';
    echo $blogId;
    echo '&eid=';
    echo $beitraeg['eid'];
    echo '" class="btn btn-primary">Go to the Description</a>';
    echo '<a href="index.php?function=delete_member_entry&bid=';
    echo $blogId;
    echo '&eid=';
    echo $beitraeg['eid'];
    echo '" class="btn btn-danger">Delete Entry</a>
            </div>
            </div>';
  }
}
else{
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
    echo '<a href="index.php?function=entries_public_details&bid=';
    echo $blogId;
    echo '&eid=';
    echo $beitraeg['eid'];
    echo '" class="btn btn-primary">Go to the Description</a>
            </div>
            </div>';
  }
}


?>
