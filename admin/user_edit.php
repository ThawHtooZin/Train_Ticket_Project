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
      if(empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])){
        if(empty($_POST['username'])){
          $usererror = "The Username field is required";
        }
        if(empty($_POST['password'])){
          $passerror = "The Password field is required";
        }
        if(empty($_POST['email'])){
          $passerror = "The Email field is required";
        }
      }else{
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $id = $_GET['id'];
        $stmt = $pdo->prepare("UPDATE users SET username='$username', password='$password', email='$email' WHERE id=$id");
        $stmt->execute();
        if($stmt){
          echo "<script>alert('Edited User Successfully!'); window.location.href='user.php'</script>";
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
                <h3>Update User</h3>
              </div>
              <div class="col">
                <a href="train.php" class="btn btn-secondary float-end">Back</a>
              </div>
            </div>
          </div>
          <?php
          $id = $_GET['id'];
          $stmt = $pdo->prepare("SELECT * FROM users WHERE id=$id");
          $stmt->execute();
          $data = $stmt->fetch(PDO::FETCH_ASSOC);
          ?>
          <div class="card-body">
            <form action="" method="post">
              <label>Username</label>
              <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $data['username']; ?>">
              <label>Password</label>
              <input type="password" name="password" class="form-control" placeholder="password" value="<?php echo $data['password']; ?>">
              <label>Email</label>
              <input type="email" name="email" class="form-control" placeholder="email" value="<?php echo $data['email']; ?>">
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
