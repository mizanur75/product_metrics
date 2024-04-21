<?php
  session_start();
  require 'db.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Grab Excel Data</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <h1 class="text-center m-5">Excel to Database</h1>
      <?php
        if(isset($_SESSION['success'])){
        ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['success']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
       
       <?php 
       }
        unset($_SESSION['success']);
        
      ?>
      <?php
        if(isset($_SESSION['error'])){
        ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['error']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
       
       <?php 
       }
         unset($_SESSION['error']);
      ?>
      <form action="process.php" method="POST" enctype="multipart/form-data" class="mb-5">
        <div class="row">
          <input type="submit" name="submit" class="btn btn-success" value="Generate Score">
        </div>
      </form>

    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>