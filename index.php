<?php
  session_start();
  require_once("include/functions.php");
  require_once("include/functions_db.php");
  require_once("include/functions_db_plus.php");
  define("DBNAME", "db/blog.db");
  // Datenbankverbindung herstellen, diesen Teil nicht ändern!
  if (!file_exists(DBNAME)) exit("Die Datenbank 'blog.db' konnte nicht gefunden werden!");
  $db = new SQLite3(DBNAME);
  setValue("cfg_db", $db);
  // Einfacher Dispatcher: Aufruf der Funktionen via index.php?function=xy
  if (isset($_GET['function'])) $function = $_GET['function'];
  else $function = "";
  // Prüfung, ob bereits ein Blog ausgewählt worden ist
  if (isset($_GET['bid'])) $blogId = $_GET['bid'];
  else $blogId = 0;

  if (isset($_GET['eid'])) $EntryId = $_GET['eid'];
  else $EntryId = 0;

  if (isset($_GET['cid'])) $CommentId = $_GET['cid'];
  else $CommentId = 0;


  // Administrator
  if (isset($_SESSION['uid']) || !empty($_SESSION['uid'])){
    $UserRole = getUserRole($_SESSION['uid']);
  }


  // Variablen Definierung
  $updateValues = array();

?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="utf-8">
<!--
  Die nächsten 4 Zeilen sind Bootstrap, falls nicht gewünscht entfernen.
-->
  <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet" />
  <link href="css/custom_style.css" rel="stylesheet" />
  <script src="js/jquery-3.1.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="include/functions.js"></script>
  <title>Blog-Projekt</title>
</head>

<body class="ganzeSeite">
<!--
  nav, div und ul class="..." ist Bootstrap, falls nicht gewünscht entfernen oder anpassen.
  Die Einteilung der Website in verschiedene Bereiche (Menü-, Content-Bereich, usw.) kann auch selber mit div realisiert werden.
-->
  <nav class="navbar navbar-inverse bg-inverse">
	<div class="container">
      <div class="navbar-header">
		<a <?php echo 'href="index.php?function=blogs&bid='.$blogId.'"'; ?> class="navbar-brand"><?php echo "Blog ".getUserName($blogId); ?></a>
      </div>
      <ul class="nav navbar-nav">
		<?php

      if(!isset($_SESSION['uid'])){
		  echo "<li><a href='index.php?function=login&bid=$blogId'>Login</a></li>";
      }
      echo "<li><a href='index.php?function=blogs&bid=$blogId'>Blog wählen</a></li>";
      if(!isset($blogId) || $blogId == 0){
      echo "<li class='nav-Disable'>Beiträge anzeigen</li>";
      }else{
      echo "<li><a href='index.php?function=entries_public&bid=$blogId'>Beiträge anzeigen</a></li>";
      }
      if(isset($_SESSION['uid'])){
      echo "<li><a href='index.php?function=entries_member&bid=".$_SESSION['uid']."'>Meine Blogs</a></li>";
      echo "<li><a href='index.php?function=entries_member_create&bid=".$_SESSION['uid']."'>Blog Eintrag erfassen</a></li>";
      echo "<li><a href='index.php?function=Import_Export&bid=".$_SESSION['uid']."'>Import/Export</a></li>";
      echo "<li><div class='dropdown'><span>Eingeloggt als: ".getUserName($_SESSION['uid'])."</span><div class='dropdown-content'><a href='index.php?function=logout&bid=$blogId'>Logout</a></div></li>";
      echo "<li>";
      switch ($function) {
        case 'entries_public':
            echo '<a class="btn btn-default btnZurueck" href="index.php?function=blogs&bid='.$blogId.'&eid='.$EntryId.'">zurück</a>';
          break;
        case 'entries_public_details':
            echo '<a class="btn btn-default btnZurueck" href="index.php?function=entries_public&bid='.$blogId.'&eid='.$EntryId.'">zurück</a>';
          break;
        case 'entries_member_details':
            echo '<a class="btn btn-default btnZurueck" href="index.php?function=entries_member&bid='.$_SESSION['uid'].'&eid='.$EntryId.'">zurück</a>';
          break;
          case 'entries_member_create':
            echo '<a class="btn btn-default btnZurueck" href="index.php?function=entries_member&bid='.$_SESSION['uid'].'&eid='.$EntryId.'">zurück</a>';
          break;
          case 'entries_member_edit':
            echo '<a class="btn btn-default btnZurueck" href="index.php?function=entries_member&bid='.$_SESSION['uid'].'&eid='.$EntryId.'">zurück</a>';
          break;
        default:
          # code...
          break;
      }
      echo "</li>";

      }

		?>
      </ul>

	</div>

  </nav>
  <div class="container" style="margin-top:80px">
  <?php
    // Für jede Funktion, die mit ?function=xy in der URL übergeben wird, muss eine Datei (in diesem Fall xy.php) existieren.
	// Diese Datei wird aufgerufen, um den Content der Seite aufzubereiten und anzuzeigen.
	if (!file_exists("$function.php")) exit("Die Datei '$function.php' konnte nicht gefunden werden!");
	require_once("$function.php");
  ?>
  </div>
</body>
</html>
<?php
  // Datenbankverbindung schliessen, diesen Teil nicht ändern!
  $db = getValue('cfg_db');
  $db->close();
?>
