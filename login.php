

<?php
  $meldung = "";
  if(empty($_POST['email']) & empty($_POST['passwort'])){
    $email = '';
    $passwort = '';
  }
  else{
  $email = $_POST['email'];
  $passwort = $_POST['password'];
  $userID = getUserIdFromDb($email,$passwort);

  if (!empty($userID)){
    $_SESSION['uid'] = $userID;
    header('Location: index.php?function=entries_member&bid='.$userID);
  }
  else{
    $meldung = "Login Daten sind nicht Korrekt!";
  }
}
  // $_SESSION['uid'] = $uid;
  // if (isset($_SESSION['uid'])){
  //
  // header('Location: index.php?function=entries_member');
  // }
  // $_SERVER['PHP_SELF'] = login.php in diesem Fall (also die PHP-Datei, die gerade ausgeführt wird).
  // Mit andern Worten: Nach Senden des Formulars wird wieder login.php aufgerufen.
  // Die Funktionen zur Überprüfung, ob die Login-Daten gültig sind, muss also hier oben im PHP-Teil stehen!
  // Wenn Login-Daten korrekt sind:
  // Session-Variable mit Benutzer-ID setzen und Wechsel in Memberbereich
  // $_SESSION['uid'] = $uid;
  // header('Location: index.php?function=entries_member');
  // Wenn Formular gesendet worden ist, die Login-Daten aber nicht korrekt sind:
  // Unten auf der Seite Anzeige der Fehlermeldung.
?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']."?function=login"; ?>">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
    <small id="emailHelp" class="form-text text-muted">We'll never share your password with anyone else.</small>
  </div>
  <div class ="Fehlermeldung">
    <p><?php echo $meldung; ?></p>
  </div>
  <div class="form-check">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input">
      Check me out
    </label>
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
</form>
