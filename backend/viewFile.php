<?php
  $fileID = $_GET['fileID'];
  $fileID = urldecode($fileID);
  include 'conf.php';

  $sql = "SELECT * FROM sheets WHERE id = $fileID";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          $filepath = $row['path'];
          ?>
          <object data="<?php echo $filepath ?>" type="application/pdf" width="100%" height="100%">
            <p>Alternative text - include a link <a href="<?php echo $filepath ?>">to the PDF!</a></p>
          </object>
          <?php
      }
  } else {
      echo "0 results";
  }
  $conn->close();


?>
