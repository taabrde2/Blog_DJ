<?php $fp = @fopen("exchange/import/import.csv", "r") or die ("Datei nicht lesbar.");
while($zeile = fgets($fp, 1024)){
  $spalten = explode(";", $zeile);
  // echo '<a href=" '.$spalten[0].' ">'.$spalten[0].'</a><br>';
  // echo '<a href=" '.$spalten[1].' ">'.$spalten[1].'</a><br>';
  // echo '<a href=" '.$spalten[2].' ">'.$spalten[2].'</a><br>';
  $name = $spalten[0];
  $email = $spalten[1];
  $pw = $spalten[2];

  if (!empty($name) || !empty($email) || !empty($pw)){
    addUser($name,$email,$pw,1);
  }
}
fclose($fp);
 ?>
