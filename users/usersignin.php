<?php
include 'config/connect.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>User Signin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <?php
    if($_POST){
      if(empty($_POST['email']) || empty($_POST['password'])){
        if(empty($_POST['email'])){
          $emailerror = "The Email field is required";
        }
        if(empty($_POST['password'])){
          $passworderror = "The Password field is required";
        }
      }else{
        $email = $_POST['email'];
        $password = $_POST['password'];

        $stmt = $pdo->prepare("SELECT * FROM users WHERE email='$email'");
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if($data){
          if($data['password'] == $password){
            echo "<script>alert('SignIn Successful!'); window.location.href='index.php';</script>";
          }else{
            echo "<script>alert('Invalid Cridential!');</script>";
          }
        }else{
          echo "<script>alert('Invalid Cridential!');</script>";
        }
      }
    }
    ?>
    <div>
      <div class="card">
        <div class="card-header">
          <a href="usersignup.php" class="btn btn-secondary">Sing Up</a>
          <a href="usersignin.php" class="btn btn-secondary">Sing In</a>
          <a href="../Index.php" class="btn btn-secondary">Back</a>
        </div>
        <div class="card-body" style="padding:250px; padding-top:200px; padding-bottom:200px;">
          <div class="card w-75 ms-auto me-auto">
            <div class="card-body">
              <form action="usersignin.php" method="post">
                <h1 class="text-center">Sign In</h1>
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email">
                <p class="text-danger"><?php if(!empty($emailerror)){ echo $emailerror; } ?></p>
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password">
                <p class="text-danger"><?php if(!empty($passworderror)){ echo $passworderror; } ?></p>
                <br>
                <div class="row container ms-auto me-auto">
                  <button type="submit" class="btn btn-primary">SignIn</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
