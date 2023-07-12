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
          $fromerror = "The From field is required";
        }
        if(empty($_POST['trainto'])){
          $toerror = "The First Class Seats field is required";
        }
      }else{
        $trainfrom = $_POST['trainfrom'];
        $trainto = $_POST['trainto'];
        $id = $_GET['id'];
        $stmt = $pdo->prepare("UPDATE route SET trainfrom='$trainfrom', trainto='$trainto' WHERE id=$id");
        $stmt->execute();
        if($stmt){
          echo "<script>alert('Edited Route Successfully!'); window.location.href='route.php'</script>";
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
                <h3>Update Train</h3>
              </div>
              <div class="col">
                <a href="route.php" class="btn btn-secondary float-end">Back</a>
              </div>
            </div>
          </div>
          <?php
          $stmt = $pdo->prepare("SELECT * FROM route");
          $stmt->execute();
          $data = $stmt->fetch(PDO::FETCH_ASSOC);
          ?>
          <div class="card-body">
            <form action="" method="post">
              <label>From</label>
              <input type="text" name="trainfrom" class="form-control" placeholder="From" value="<?php echo $data['trainfrom']; ?>">
              <p class="text-danger"><?php if(empty($fromerror)){echo $fromerror;} ?></p>
              <label>To</label>
              <input type="text" name="trainto" class="form-control" placeholder="To" value="<?php echo $data['trainto']; ?>">
              <p class="text-danger"><?php if(empty($toerror)){echo $toerror;} ?></p>
              <br>
              <button type="submit" class="btn btn-warning"> Update </button>
            </form>
          </div>
        </div>
      </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>
