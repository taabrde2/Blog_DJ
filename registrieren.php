
<?php
$meldung = "";
if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['passwort']) || empty($_POST['RPpasswort'])){

  if(empty($_POST['name']) & empty($_POST['email']) & empty($_POST['passwort']) & empty($_POST['RPpasswort'])){
    $name = '';
    $email = '';
    $passwort = '';
    $RPpasswort = '';
  }
  else{
    $meldung = 'Bitte fühlen Sie alle Felder aus!';
  }
}
else{
  $name = $_POST['name'];
  $email = $_POST['email'];
  $passwort = $_POST['passwort'];
  $RPpasswort = $_POST['RPpasswort'];
  $role = 1;

    if($passwort == $RPpasswort){

      $passwort = md5($passwort);
      addUser($name,$email,$passwort,$role);

      header('Location: index.php?function=login&bid='.$blogId);
    }
    else
    {
      $meldung = "Bitte geben Sie zweimal das gleiche Passwort ein!";
    }
}
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']."?function=registrieren&bid=".$blogId; ?>">
  <div class="form-group">
    <label for="exampleInputEmail1">Vor- und Nachname</label>
    <input type="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name" name="name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Passwort</label>
    <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Passwort setzen" name="passwort">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Passwort wiederholen</label>
    <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Passwort wiederholen" name="RPpasswort">
  </div>
  <div class ="Fehlermeldung">
    <p><?php echo $meldung; ?></p>
  </div>
  <div class="form-check">
  </div>
  <button type="submit" class="btn btn-primary">Registrieren</button>
</form>
