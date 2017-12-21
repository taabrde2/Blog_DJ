<?php $fp = @fopen("exchange/export/export.csv")or die ("Datei nicht lesbar.");
 $user =getUsers();
foreach ($user as $name) {
  // echo $name[1]."<br>";
  // echo $name[2]."<br>";
  // echo $name[3]."<br>";
  $export = $name[1].";". $name[2].";". $name[3].";"."<br>";
  echo $export;

}
  fwrite($myfile,$export);
fclose($myfile);

 ?>
