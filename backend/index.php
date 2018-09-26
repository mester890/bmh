<?php
$status = 0;
$filename = "";
$msg = "";
  if (isset($_GET['status'])) {
    $status = $_GET['status'];
  }
  if (isset($_GET['filename'])) {
    $filename = $_GET['filename'];
  }
  if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
  }
  echo "<input type='text' style='display:none;' id='statusField' value='" . $status . "'>";
  echo "<input type='text' style='display:none;' id='filenameField' value='" . $filename . "'>";
  echo "<input type='text' style='display:none;' id='msgField' value='" . $msg . "'>";
?>
<!DOCTYPE html>
<html>
<head>
  <title>Budal Musikkhistorielag</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-4">
      <h3>Last opp nytt dokument:</h3>
      <form action="upload.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="fileToUpload">Fil til opplasting</label>
          <input class="form-control-file" type="file" name="fileToUpload" id="fileToUpload">
        </div>
        <div class="form-group">
          <label for="titleOfFile">Tittel</label>
          <input class="form-control" type="text" name="titleOfFile" id="titleOfFile">
        </div>
        <div class="form-group">
          <label for="authorOfFile">Forfatter</label>
          <input class="form-control" type="text" name="authorOfFile" id="authorOfFile">
        </div>
        <div class="form-group">
          <label for="providerOfFile">Innsender</label>
          <input class="form-control" type="text" name="providerOfFile" id="providerOfFile">
        </div>
          <button type="submit" name="submit">Last opp</button>
      </form>
      <div class="alert" role="alert" id="outputField">
      </div>
      <script type="text/javascript">
        let status = $('#statusField').val();
        let filename = $('#filenameField').val();
        let msg = $('#msgField').val();
        if(status == "1") {
          $('#outputField').html(filename + ' har blitt lastet opp.').addClass('alert-success');
        } else if(status == "0" && filename) {
          $('#outputField').html(filename + ' kunne ikke lastes opp.').addClass('alert-danger');
        }
        else if(status == "3" && msg) {
          $('#outputField').html('Oops... ' + msg + '<br><br>Ta kontakt med utvikler. Tlf. 97115711').addClass('alert-warning');
        }
      </script>
    </div>
    <div class="col-8">
      <?php include 'lastUploads.php'; ?>
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
