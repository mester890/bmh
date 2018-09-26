<h3>Siste opplastede dokumenter</h3>
<table class="table table-bordered table-striped">
<tr>
  <th>Tittel</th>
  <th>Innsender</th>
  <th>Dato</th>
  <th>PATH</th>
</tr>
<?php
  include 'conf.php';

  $sql = "SELECT * FROM sheets LIMIT 10";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          echo "<tr><td>" . $row['title'] . "</td><td>" . $row['provider'] . "</td><td>" . $row['date'] . "</td><td><a href=viewFile.php?fileID='" . $row['id'] . "'>Se fil</a></td></tr>";
      }
  } else {
      echo "0 results";
  }
  $conn->close();
?>
</table>
