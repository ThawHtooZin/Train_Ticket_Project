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
  .train{
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
      if(empty($_POST['train_name']) || empty($_POST['first_class_seat']) || empty($_POST['second_class_seat'])){
        if(empty($_POST['train_name'])){
          $trainerror = "The Train Name field is required";
        }
        if(empty($_POST['first_class_seat'])){
          $fccerror = "The First Class Seats field is required";
        }
        if(empty($_POST['second_class_seat'])){
          $sccerror = "The Second Class Seats field is required";
        }
      }else{
        $train_name = $_POST['train_name'];
        $first_class_seat = $_POST['first_class_seat'];
        $second_class_seat = $_POST['second_class_seat'];
        $id = $_GET['id'];
        $stmt = $pdo->prepare("UPDATE train SET train_name='$train_name', first_class_seats='$first_class_seat', second_class_seats='$second_class_seat' WHERE id=$id");
        $stmt->execute();
        if($stmt){
          echo "<script>alert('Edited Train Successfully!'); window.location.href='train.php'</script>";
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
                <a href="train.php" class="btn btn-secondary float-end">Back</a>
              </div>
            </div>
          </div>
          <?php
          $stmt = $pdo->prepare("SELECT * FROM train id=$id");
          $stmt->execute();
          $data = $stmt->fetch(PDO::FETCH_ASSOC);
          ?>
          <div class="card-body">
            <form action="" method="post">
              <label>Train Name</label>
              <input type="text" name="train_name" class="form-control" placeholder="Train Name" value="<?php echo $data['train_name']; ?>">
              <p class="text-danger"><?php if(empty($trainerror)){echo $trainerror;} ?></p>
              <label>First Class Seat</label>
              <input type="number" name="first_class_seat" class="form-control" placeholder="First Class Seat" value="<?php echo $data['first_class_seats']; ?>">
              <p class="text-danger"><?php if(empty($fccerror)){echo $fccerror;} ?></p>
              <label>Second Class Seat</label>
              <input type="number" name="second_class_seat" class="form-control" placeholder="Second Class Seat" value="<?php echo $data['second_class_seats']; ?>">
              <p class="text-danger"><?php if(empty($sccerror)){echo $sccerror;} ?></p>
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
