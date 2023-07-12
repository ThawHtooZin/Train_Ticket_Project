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
  .edit{
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
      if(empty($_POST['first_class_fee']) || empty($_POST['second_class_fee']) || empty($_POST['date']) || empty($_POST['time'])){
        if(empty($_POST['first_class_fee'])){
          $fccerror = "The First Class Charge field is required";
        }
        if(empty($_POST['second_class_fee'])){
          $sccerror = "The Second Class Charge field is required";
        }
        if(empty($_POST['date'])){
          $dateerror = "The Date field is required";
        }
        if(empty($_POST['time'])){
          $timeerror = "The Time field is required";
        }
      }else{
        $train = $_POST['train'];
        $route = $_POST['route'];
        $first_class_charge = $_POST['first_class_fee'];
        $second_class_charge = $_POST['second_class_fee'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $id = $_GET['id'];
        $stmt = $pdo->prepare("UPDATE schduel SET train='$train', route='$route', first_class_charge='$first_class_charge', second_class_charge='$second_class_charge', date='$date', time='$time' WHERE id=$id");
        $stmt->execute();
        if($stmt){
          echo "<script>alert('Edited Schduel Successfully!'); window.location.href='schduel.php'</script>";
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
          $stmt = $pdo->prepare("SELECT * FROM schduel");
          $stmt->execute();
          $data = $stmt->fetch(PDO::FETCH_ASSOC);
          ?>
          <div class="card-body">
            <form action="" method="post">
              <label>Train</label>
              <select class="form-control" name="train">
                <?php
                $trainid = $_GET['train_id'];
                $trainstmt = $pdo->prepare("SELECT * FROM train");
                $trainstmt->execute();
                $traindatas = $trainstmt->fetchall();
                foreach ($traindatas as $traindata) {
                ?>
                <option value="<?php echo $traindata['id']; ?>" <?php if($trainid == $traindata['id']){ echo "selected";} ?>><?php echo $traindata['train_name']; ?></option>
                <?php
                }
                ?>
              </select>
              <label>Route</label>
              <select class="form-control" name="route">
                <?php
                $routeid = $_GET['route_id'];
                $routestmt = $pdo->prepare("SELECT * FROM route");
                $routestmt->execute();
                $routedatas = $routestmt->fetchall();
                foreach ($routedatas as $routedata) {
                ?>
                <option value="<?php echo $routedata['id']; ?>" <?php if($routeid == $routedata['id']){ echo "selected";} ?>><?php echo $routedata['trainfrom'] . " to " . $routedata['trainto']; ?></option>
                <?php
                }
                ?>
              </select>
              <label>First Class Charge</label>
              <input type="number" name="first_class_fee" class="form-control" placeholder="First Class Charge" value="<?php echo $data['first_class_charge']; ?>">
              <p class="text-danger"><?php if(!empty($fccerror)){echo $fccerror;} ?></p>
              <label>Second Class Charge</label>
              <input type="number" name="second_class_fee" class="form-control" placeholder="Second Class Charge" value="<?php echo $data['second_class_charge']; ?>">
              <p class="text-danger"><?php if(!empty($sccerror)){echo $sccerror;} ?></p>
              <label>Date</label>
              <input type="date" name="date" value="<?php echo $data['date']; ?>" class="form-control">
              <p class="text-danger"><?php if(!empty($dateerror)){echo $dateerror;} ?></p>
              <label>Time</label>
              <input type="time" name="time" value="<?php echo $data['time']; ?>" class="form-control">
              <p class="text-danger"><?php if(!empty($timeerror)){echo $timeerror;} ?></p>
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
