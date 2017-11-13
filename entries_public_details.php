<?php
  // Alle Blogeinträge holen, die Blog-ID ist in der Variablen $blogId gespeichert (wird in index.php gesetzt)
  // Hier Code... (Schlaufe über alle Einträge dieses Blogs)
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
  // Nachfolgend das Beispiel einer Ausgabe in HTML, dieser Teil muss mit einer Schlaufe über alle Blog-Beiträge und der Ausgabe mit PHP ersetzt werden
?>
