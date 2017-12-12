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

	<?php $blogs = getUserNames();
				$uidAdmin = getAdminUser();
				if(!empty($_SESSION['uid'])){
					$AdminRole = getUserRole($_SESSION['uid']);
				}
				else {
					$AdminRole = 0;
				}


	if($AdminRole == 2 && !empty($_SESSION['uid'])){
		foreach ($blogs as $blog) {
			if($uidAdmin != $blog['uid']){
				if($blog['uid'] == $blogId){
					echo '<div class="Admin-Cards"><div class="btn btn-danger btnBlogs"><a href="index.php?function=entries_public&bid=';
					echo $blog['uid'];
					echo '" title="Blog auswählen">';
					echo $blog['name'];
					echo '</a></div>';
					echo '<div class="btn btn-warning btnBlogs"><a href="index.php?function=delete_member&bid=';
					echo $blog['uid'];
					echo '" title="Blog/Benutzer löschen">Blog/Benutzer löschen</a></div></div>';
				}
				else
				{
					echo '<div class="Admin-Cards"><div class="btn btn-primary btnBlogs"><a href="index.php?function=entries_public&bid=';
					echo $blog['uid'];
					echo '" title="Blog auswählen">';
					echo $blog['name'];
					echo '</a></div>';
					echo '<div class="btn btn-warning btnBlogs"><a href="index.php?function=delete_member&bid=';
					echo $blog['uid'];
					echo '" title="Blog/Benutzer löschen">Blog/Benutzer löschen</a></div></div>';
				}
			}
	 }
	}
	else{

		 foreach ($blogs as $blog) {
			 if($uidAdmin != $blog['uid']){
				 if($blog['uid'] == $blogId){
					 echo '<div class="btn btn-danger btnBlogs"><a href="index.php?function=entries_public&bid=';
					 echo $blog['uid'];
					 echo '" title="Blog auswählen">';
					 echo $blog['name'];
					 echo '</a></div>';
				 }
				 else
				 {
					 echo '<div class="btn btn-primary btnBlogs"><a href="index.php?function=entries_public&bid=';
					 echo $blog['uid'];
					 echo '" title="Blog auswählen">';
					 echo $blog['name'];
					 echo '</a></div>';
				 }
			 }
		}
	} ?>
