<?php
include 'conf.php';
$targetfolder = "../uploads/";
$filename = time() . "_" . basename(str_replace(' ', '_', strtolower($_FILES['fileToUpload']['name'])));
$targetfolder = $targetfolder . $filename;
$ok=1;
$file_type=$_FILES['fileToUpload']['type'];

$title_of_file=$_POST['titleOfFile'];
$author_of_file=$_POST['authorOfFile'];
$provider_of_file=$_POST['providerOfFile'];

if ($file_type == "application/pdf") {
  if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $targetfolder))
  {
    $filesize = filesize($targetfolder);

    $sql = "INSERT INTO sheets (title, author, provider, filesize, path) VALUES ('$title_of_file', '$author_of_file', '$provider_of_file', '$filesize', '$targetfolder')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        header("Location: index.php?status=0&filename=" . $filename . "&msg=" . $conn->error);

    }

    $conn->close();
    header("Location: index.php?status=1&filename=" . $filename);
  } else {
    echo "Problem uploading file";
    header("Location: index.php?status=0&filename=" . $filename);

  }
} else {
  echo "You may only upload PDFs.<br>";
  header("Location: index.php?status=3");

}
?>
