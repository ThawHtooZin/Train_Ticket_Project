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
  .users{
    background: #0d6efd !important;
    color: white;
    text-decoration: none;
  }
  .home{
    color:white;
  }
  </style>
  <body>
    <div class="row container">
      <div class="col-3">
        <?php
        include 'adminsidebar.php';
        ?>
      </div>
      <div class="col-9 mt-5">
        <h1>Admin's Dashboard</h1>
        <br>
        <a href="user_add.php" class="btn btn-success">Add</a>
        <table class="table table-primary">
          <thead>
            <tr>
              <th>Id</th>
              <th>Username</th>
              <th>Password</th>
              <th>Email</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $stmt = $pdo->prepare("SELECT * FROM users");
            $stmt->execute();
            $datas = $stmt->fetchall();
            foreach ($datas as $data) {
              ?>
              <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['username']; ?></td>
                <td><?php echo $data['password']; ?></td>
                <td><?php echo $data['email']; ?></td>
                <td>
                  <a href="user_edit.php?id=<?php echo $data['id']; ?>" class="btn btn-warning">Edit</a>
                  <a href="user_delete.php?id=<?php echo $data['id']; ?>" class="btn btn-danger">Delete</a>
                </td>
              </tr>
              <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>
