<?php
$myfile = @fopen("exchange/export/export.csv","w")or die ("Datei nicht lesbar.");
 $user =getUsers();
foreach ($user as $name) {
  $export = $name[1].";". $name[2].";". $name[3].";"."\n";
  fwrite($myfile,$export);
}

 fclose($myfile);

  ?>
