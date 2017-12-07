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
    // addUser($name,$email,$pw,1);
  }
}
fclose($fp);
 ?>





 <form action="upload.php" method="post" enctype="multipart/form-data">
     Select image to upload:
     <input type="file" name="fileToUpload" id="fileToUpload" accept=".csv">
     <!-- <input type="submit" value="Upload Image" name="submit"> -->
 </form>

 <?php
 $target_dir = "exchange/import/";
 $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
 $uploadOk = 1;
 $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
 // Check if image file is a actual image or fake image
 if(isset($_POST["submit"])) {
     $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
     if($check !== false) {
         echo "File is an image - " . $check["mime"] . ".";
         $uploadOk = 1;
     } else {
         echo "File is not an image.";
         $uploadOk = 0;
     }
 }

 ?>
