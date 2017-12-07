
 <?php
 $upload_folder = 'exchange/import/'; //Das Upload-Verzeichnis
 $filename = pathinfo($_FILES['datei']['name'], PATHINFO_FILENAME);
  $extension = strtolower(pathinfo($_FILES['datei']['name'], PATHINFO_EXTENSION));
 //Pfad zum Upload
 $new_path = $upload_folder.$filename.'.'.$extension;
 var_dump($new_path);

 //Neuer Dateiname falls die Datei bereits existiert
 if(file_exists($new_path)) { //Falls Datei existiert, hänge eine Zahl an den Dateinamen
  $id = 1;
  do {
  $new_path = $upload_folder.$filename.'_'.$id.'.'.$extension;
  $id++;
  } while(file_exists($new_path));
 }

 //Alles okay, verschiebe Datei an neuen Pfad
 move_uploaded_file($_FILES['datei']['tmp_name'], $new_path);
 echo 'Bild erfolgreich hochgeladen: <a href="'.$new_path.'">'.$new_path.'</a>';
 ?>
<form class="" action="index.html" method="post">

</form>
