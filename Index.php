<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Myanmar Online Train Reservation</title>
  </head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <style media="screen">
    .bg{
      background: rgb(0,0,0,0.4);
      display: inline;
    }
  </style>
  <body>
    <nav class="navbar navbar-expand-lg navbar-secondary bg-secondary justify-content-between" style="padding-left:250px; padding-right:250px">
    <a class="navbar-brand text-light" style="font-size:28px;" href="#">Myanmar Online Train Reservation</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <form>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link text-light" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="users/usersignin.php">Passenger Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="admin/adminsignin.php">Admin Login</a>
          </li>
        </ul>
    </form>
    </div>
  </nav>
  <div style="background-image:url('Images/train background.jpg'); background-size:cover; padding-top: 200px; padding-bottom: 270px;" class="text-light text-center">
    <h1 style="font-size:65px;" class="bg">Myanmar Train Ticket</h1><br><br>
    <h2 style="font-size:50px;" class="bg">Reservation System</h2><br><br>
    <p class="bg">Welcome to</p><br>
    <p class="bg">Myanmar Train Ticket Webpage</p><br>
    <a href="users/usersignin.php" class="btn btn-primary">Make Reservation</a>
  </div>
  </body>
</html>
