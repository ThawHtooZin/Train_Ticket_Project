<?php
session_start();
include 'config/connect.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <style media="screen">
  .container{
    margin-left: -25px !important;
    margin-right: -25px !important;
  }
  .routes{
    background: #0d6efd !important;
    color: white;
    text-decoration: none;
  }
  .home{
    color:white;
  }
  </style>
  <body>
    <?php
    if($_POST){
      if(empty($_POST['trainfrom']) || empty($_POST['trainto'])){
        if(empty($_POST['trainfrom'])){
          $usererror = "The From field is required";
        }
        if(empty($_POST['trainto'])){
          $passerror = "The To Seats field is required";
        }
      }else{
        $trainfrom = $_POST['trainfrom'];
        $trainto = $_POST['trainto'];
        $stmt = $pdo->prepare("INSERT INTO route(trainfrom, trainto) VALUES('$trainfrom', '$trainto')");
        $stmt->execute();
        if($stmt){
          echo "<script>alert('Add Route Successfully!'); window.location.href='route.php'</script>";
        }
      }
    }
    ?>
    <div class="row container">
      <div class="col-3">
        <?php
        include 'adminsidebar.php';
        ?>
      </div>
      <div class="col-9 mt-5">
        <h1>Admin's Dashboard</h1>
        <br>
        <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="col">
                <h3>Add Route</h3>
              </div>
              <div class="col">
                <a href="train.php" class="btn btn-secondary float-end">Back</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form action="route_add.php" method="post">
              <label>From</label>
              <input type="text" name="trainfrom" class="form-control" placeholder="From">
              <label>To</label>
              <input type="text" name="trainto" class="form-control" placeholder="To">
              <br>
              <button type="submit" class="btn btn-success"> ADD </button>
            </form>
          </div>
        </div>
      </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>
