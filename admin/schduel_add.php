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
  .schduels{
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
      function formatDate($date){
        return date('d-m-Y', strtotime($date));
      }
      if(empty($_POST['first_class_charge']) || empty($_POST['second_class_charge']) || empty($_POST['fromdate']) || empty($_POST['enddate'])){
        if(empty($_POST['first_class_charge'])){
          $fccerror = "The First Class Charge field is required";
        }
        if(empty($_POST['second_class_charge'])){
          $sccerror = "The Second Class Charge field is required";
        }
        if(empty($_POST['fromdate'])){
          $fromdateerror = "The From Date field is required";
        }
        if(empty($_POST['enddate'])){
          $todateerror = "The End Date field is required";
        }
      }else{
        $route_id = $_POST['route'];
        $train_id = $_POST['train'];
        $first_fee = $_POST['first_class_charge'];
        $second_fee = $_POST['second_class_charge'];
        $from_date = $_POST['fromdate'];
        $to_date = $_POST['enddate'];
        $seatstmt = $pdo->prepare("SELECT * FROM train WHERE id = $train_id");
        $seatstmt->execute();
        $seatdata = $seatstmt->fetch(PDO::FETCH_ASSOC);
        $first_seat = $seatdata['first_class_seats'];
        $second_seat = $seatdata['second_class_seats'];
        $every = $_POST['every'];
        $time = $_POST['time'];

        $from_date = formatDate($from_date);
        $to_date = formatDate($to_date);
        $startDate = $from_date;
        $endDate = $to_date;

        if ($every == 'Day') {
            for ($i = strtotime($startDate); $i <= strtotime($endDate); $i = strtotime('+1 day', $i)) {
                $date = date('Y-m-d', $i);
                $stmt = $pdo->prepare("INSERT INTO schduel(`train`, `route`, `first_class_charge`, `second_class_charge`, `first_seat_ava`, `second_seat_ava`, `date`, `time`) VALUES ('$train_id', '$route_id', '$first_fee', '$second_fee', '$first_seat', '$second_seat', '$date', '$time')");
                $stmt->execute();
                if($stmt){
                  echo "<script>alert('Schduel Added Successfully!'); window.location.href='schduel.php';</script>";
                }
            }
        } else {
            for ($i = strtotime($every, strtotime($startDate)); $i <= strtotime($endDate); $i = strtotime('+1 week', $i)) {
                $date = date('Y-m-d', $i);
                $stmt = $pdo->prepare("INSERT INTO schduel(`train`, `route`, `first_class_charge`, `second_class_charge`, `first_seat_ava`, `second_seat_ava`, `date`, `time`) VALUES ('$train_id', '$route_id', '$first_fee', '$second_fee', '$first_seat', '$second_seat', '$date', '$time')");
                $stmt->execute();
                if($stmt){
                  echo "<script>alert('Schduel Added Successfully!'); window.location.href='schduel.php';</script>";
                }
            }
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
                <h3>Add Schduel</h3>
              </div>
              <div class="col">
                <a href="schduel.php" class="btn btn-secondary float-end">Back</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form action="schduel_add.php" method="post">
              <div class="row">
                <div class="col">
                  <label>Train</label>
                  <?php
                  $trainstmt = $pdo->prepare("SELECT * FROM train");
                  $trainstmt->execute();
                  $traindatas = $trainstmt->fetchall();
                  ?>
                  <select class="form-control" name="train">
                    <?php
                    foreach ($traindatas as $traindata) {
                      ?>
                      <option value="<?php echo $traindata['id']; ?>"><?php echo $traindata['train_name']; ?></option>
                      <?php
                    }
                    ?>
                  </select>
                </div>
                <div class="col">
                  <label>Route</label>
                  <?php
                  $routestmt = $pdo->prepare("SELECT * FROM route");
                  $routestmt->execute();
                  $routedatas = $routestmt->fetchall();
                  ?>
                  <select class="form-control" name="route">
                    <?php
                    foreach ($routedatas as $routedata) {
                      ?>
                      <option value="<?php echo $routedata['id']; ?>"><?php echo $routedata['trainfrom'] . ' to ' . $routedata['trainto']; ?></option>
                      <?php
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <label>First Class Charge</label>
                  <input type="number" name="first_class_charge" class="form-control" placeholder="First Class Charge">
                  <p class="text-danger"><?php if(!empty($fccerror)){echo $fccerror;} ?></p>
                </div>
                <div class="col">
                  <label>Second Class Charge</label>
                  <input type="number" name="second_class_charge" class="form-control" placeholder="Second Class Charge">
                  <p class="text-danger"><?php if(!empty($sccerror)){echo $sccerror;} ?></p>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <label>From Date</label>
                  <input type="date" name="fromdate" class="form-control">
                  <p class="text-danger"><?php if(!empty($fromdateerror)){echo $fromdateerror;} ?></p>
                </div>
                <div class="col">
                  <label>End Date</label>
                  <input type="date" name="enddate" class="form-control">
                  <p class="text-danger"><?php if(!empty($todateerror)){echo $todateerror;} ?></p>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <label>Every</label>
                  <select class="form-control" name="every">
                    <option value="Day">Day</option>
                    <option value="Sunday">Sunday</option>
                    <option value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thuesday">Thursday</option>
                    <option value="Friday">Friday</option>
                    <option value="Saturday">Saturday</option>
                  </select>
                </div>
                <div class="col">
                  <label>Time</label>
                  <input type="time" name="time" class="form-control">
                </div>
              </div>
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
