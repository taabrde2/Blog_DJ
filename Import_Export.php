<?php $fp = @fopen("exchange/import.csv", "r") or die ("Datei nicht lesbar.");
while($zeile = fgets($fp, 1024)){
$spalten = explode(";", $zeile);
echo '<a href="'.$spalten[1].'">'.$spalten[1].'</a>';
}
fclose($fp);
 ?>
