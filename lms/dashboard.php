<?php
  session_start();
  if(!isset($_SESSION['user'])){
    header("Location: Login.php");
  }
?>
<!DOCTYPE html>
<html>

<head>
  <title>Dashboard</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="Dashboard.css">
  <script src="submitform.js"></script>
</head>

<body>
  <input type="checkbox" id="checkbox">
  <header class="header">
    <h2 class="u-name">Laundary Manamement System
      <label for="checkbox">
        <i id="navbtn" class="fa fa-bars" aria-hidden="true"></i>
      </label>
    </h2>
    <a href="profile.php" ><i class="fa fa-user" aria-hidden="true"></i></a>
  </header>
  <div class="body">
    <nav class="side-bar">

      <ul>
        <li>
          <a href="#">
            <i class="fa fa-desktop" aria-hidden="true"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="submitform.php">
            <i class="fa fa-folder" aria-hidden="true"></i>
            <span>Laundary Request</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fa fa-folder" aria-hidden="true"></i>
            <span>Request Status</span>
          </a>
        </li>

      </ul>
    </nav>
    <section class="section-1">
      <div class="main-title">
        <h2 style="padding: 20px;">DASHBOARD</h2>
      </div>
      <div class="main-cards">

        <div class="card">
          <div class="card-inner">
            <h3>New Request</h3>

          </div>
          <h1>0</h1>
        </div>

        <div class="card">
          <div class="card-inner">
            <h3>Accept</h3>

          </div>
          <h1>0</h1>
        </div>

        <div class="card">
          <div class="card-inner">
            <h3>Inprocess</h3>

          </div>
          <h1>1</h1>
        </div>

        <div class="card">
          <div class="card-inner">
            <h3>Finish</h3>
          </div>
          <h1>1</h1>
        </div>
      </div>
      <div style=" width: 100%; font-size: 45px;">
        <center>
          <h3>Laundary Price(Per Unit)</h3>
        </center>
      </div>
    </section>
  </div>

</body>

</html>