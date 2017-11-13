<?php
  // Alle Blogeinträge holen, die Blog-ID ist in der Variablen $blogId gespeichert (wird in index.php gesetzt)
  // Hier Code... (Schlaufe über alle Einträge dieses Blogs)

  $beitraege = getEntries($blogId);

  foreach($beitraege as $beitraeg) {
    echo '<div class="card" style="width: 20rem; float:left;">
          <img class="card-img-top" src="./images/martin.jpg" alt="Card image cap" style="width:50px;">
          <div class="card-body"><h4 "card-title">';
    echo $beitraeg['title'];
    echo '</h4><p class="card-text">';

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

  // Nachfolgend das Beispiel einer Ausgabe in HTML, dieser Teil muss mit einer Schlaufe über alle Blog-Beiträge und der Ausgabe mit PHP ersetzt werden
?>
