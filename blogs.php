<?php
  // Alle Blogs bzw. Benutzernamen holen und falls Blog bereits ausgewählt, entsprechenden Namen markieren
  // Hier Code....

  // Schlaufe über alle Blogs bzw. Benutzer
  // Hier Code....

  // Nachfolgend das Beispiel einer Ausgabe in HTML, dieser Teil muss mit einer Schlaufe über alle Blogs und der Ausgabe mit PHP ersetzt werden
	// $blogs = getUsers();
	// foreach ($blogs as $blog) {
	// 	echo $blog['name'];
	// 	echo $blog['uid'];
	// }
// ?>

	<?php $blogs= getUserNames();

	 foreach ($blogs as $blog) {
		echo '<div class="btn btn-primary"><a href="index.php?function=entries_public&bid=';
		echo $blog['uid'];
		echo '" title="Blog auswählen">';
		echo $blog['name'];
		echo '</a></div>';
	} ?>
