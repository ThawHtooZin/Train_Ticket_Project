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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
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
            <a class="nav-link text-light" href="#about">About</a>
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
  <div style="background-image:url('Images/train background.jpg'); background-size:cover; padding-top: 200px; padding-bottom: 230px;" class="text-light text-center">
    <h1 style="font-size:65px;" class="bg">Myanmar Train Ticket</h1><br><br>
    <h2 style="font-size:50px;" class="bg">Reservation System</h2><br><br>
    <p class="bg">Welcome to</p><br>
    <p class="bg">Myanmar Train Ticket Webpage</p><br>
    <a href="users/usersignin.php" class="btn btn-primary">Make Reservation</a>
  </div>
  <div id="about" class="mt-5 mb-5">
    <h2 class="text-center">About Us</h2>
    <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br>labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud </p>
    <br>
    <div class="container row text-center ms-auto me-auto">
      <div class="col">
        <h1><i class="bi bi-train-front"></i></h1>
        <h4>We Greanteed the safety of all the passengers</h4>
        <br>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.</p>
      </div>
      <div class="col">
        <h1><i class="bi bi-cup-hot"></i></h1>
        <h4>We provide the best servies for all the passengers as possible</h4>
        <br>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.</p>
      </div>
      <div class="col">
        <h1><i class="bi bi-currency-dollar"></i></h1>
        <h4>Safety payment and normal pricing for all passengers</h4>
        <br>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.</p>
      </div>
    </div>
  </div>
  <div class="footer pb-5 pt-5 bg-dark text-light">
    <div class="row container">
      <div class="col-4">
        <h3 class="text-center">Myanmar <br>Online <br>Train <br>Reservation</h3>
      </div>
      <div class="col-8">
        <ul class="list-group">
          <a style="text-decoration:none;" class="text-light" href="#"><li class="list-group-item text-light bg-dark">Home</li></a>
          <a style="text-decoration:none;" class="text-light" href="#about"><li class="list-group-item text-light bg-dark">Abut</li></a>
          <a style="text-decoration:none;" class="text-light" href="users/usersignin.php"><li class="list-group-item text-light bg-dark">Passenger Login</li></a>
          <a style="text-decoration:none;" class="text-light" href="admin/adminsignin.php"><li class="list-group-item text-light bg-dark">Admin Login</li></a>
        </ul>
      </div>
    </div>
  </div>
  </body>
</html>
