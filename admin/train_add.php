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
          $usererror = "The Train Name field is required";
        }
        if(empty($_POST['first_class_seat'])){
          $passerror = "The First Class Seats field is required";
        }
        if(empty($_POST['second_class_seat'])){
          $passerror = "The Second Class Seats field is required";
        }
      }else{
        $train_name = $_POST['train_name'];
        $first_class_seat = $_POST['first_class_seat'];
        $second_class_seat = $_POST['second_class_seat'];
        $stmt = $pdo->prepare("INSERT INTO train(train_name, first_class_seats, second_class_seats) VALUES('$train_name', '$first_class_seat', '$second_class_seat')");
        $stmt->execute();
        if($stmt){
          echo "<script>alert('Add Train Successfully!'); window.location.href='train.php'</script>";
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
                <h3>Add Train</h3>
              </div>
              <div class="col">
                <a href="train.php" class="btn btn-secondary float-end">Back</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form action="train_add.php" method="post">
              <label>Train Name</label>
              <input type="text" name="train_name" class="form-control" placeholder="Train Name">
              <label>First Class Seat</label>
              <input type="number" name="first_class_seat" class="form-control" placeholder="First Class Seat">
              <label>Second Class Seat</label>
              <input type="number" name="second_class_seat" class="form-control" placeholder="Second Class Seat">
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
