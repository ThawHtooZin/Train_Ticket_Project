<div class="d-flex flex-column p-3 text-white bg-dark" style="width: 100%; height:232.8%;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <i class="bi bi-house-door-fill" style="font-size:25px; margin-right:10px;"></i>
      <span class="fs-4">Sidebar</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="userdashboard.php" class="nav-link home" aria-current="page">
          <i class="bi bi-speedometer2"></i>
          Home
        </a>
      </li>
      <li>
        <a href="booking_add.php" class="nav-link text-white newbooking">
          <i class="bi bi-plus"></i>
          New Booklng
        </a>
      </li>
      <li>
        <a href="booking.php" class="nav-link text-white viewbooking">
          <i class="bi bi-journal-text"></i>
          View Booking
        </a>
      </li>
      <li>
        <a href="feedback.php" class="nav-link text-white feedback">
          <i class="bi bi-envelope-paper"></i>
          Feedback
        </a>
      </li>
      <li>
        <a href="signout.php" class="nav-link text-white">
          <i class="bi bi-power"></i>
          Logout
        </a>
      </li>
    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <strong><?php echo $_SESSION['username']; ?></strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
        <li><a class="dropdown-item" href="signout.php">Sign out</a></li>
      </ul>
    </div>
  </div>
