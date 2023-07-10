<div class="d-flex flex-column p-3 text-white bg-dark" style="width: 100%; height:148.7%;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <i class="bi bi-house-door-fill" style="font-size:25px; margin-right:10px;"></i>
      <span class="fs-4">Sidebar</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="admindashboard.php" class="nav-link home" aria-current="page">
          <i class="bi bi-speedometer2"></i>
          Home
        </a>
      </li>
      <li>
        <a href="user.php" class="nav-link text-white users">
          <i class="bi bi-person-fill"></i>
          Users
        </a>
      </li>
      <li>
        <a href="schduel.php" class="nav-link text-white schduels">
          <i class="bi bi-calendar-event-fill"></i>
          Schduels
        </a>
      </li>
      <li>
        <a href="route.php" class="nav-link text-white routes">
          <i class="bi bi-bezier2"></i>
          Routes
        </a>
      </li>
      <li>
        <a href="train.php" class="nav-link text-white train">
          <i class="bi bi-train-front-fill"></i>
          Train
        </a>
      </li>
      <li>
        <a href="report.php" class="nav-link text-white report">
          <i class="bi bi-file-earmark"></i>
          Report
        </a>
      </li>
      <li>
        <a href="payment.php" class="nav-link text-white payment">
          <i class="bi bi-currency-dollar"></i>
          Payment
        </a>
      </li>
      <li>
        <a href="feedback.php" class="nav-link text-white feedback">
          <i class="bi bi-envelope-paper"></i>
          Feedback
        </a>
      </li>
      <li>
        <a href="search.php" class="nav-link text-white search">
          <i class="bi bi-search"></i>
          Search
        </a>
      </li>
    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <strong><?php echo $_SESSION['adminusername']; ?></strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
        <li><a class="dropdown-item" href="signout.php">Sign out</a></li>
      </ul>
    </div>
  </div>
