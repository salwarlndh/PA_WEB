<?php
require '../functions.php';

session_start();
if (!isset($_SESSION['adminLoggedIn'])) {
  header("Location: ../user-admin/login.php");
  exit;
}

require 'header.php';
$concerts = query("SELECT * FROM concerts");
$orders = query("SELECT * FROM orders");
?>

<div class="container">
  <div class="sidebar">
    <ul>
      <li><a href=""><span><i class="fa-solid fa-house"></i></span> dashboard</a></li>
      <li><a href="concerts"><span><i class="fa-brands fa-itunes-note"></i></span> concerts</a></li>
      <li><a href="orders"><span><i class="fa-regular fa-note-sticky"></i></span> orders</a></li>
      <hr>
      <a href="../user-admin/logout.php" class="logout"><span><i class="fa-solid fa-right-from-bracket"></i></span> sign out</a>
  </div>

  <div class="content">
    <div class="row">
      <div id="dash-concerts">
        <h2 style="text-align: center; color: white;">Concerts</h2>
        <hr>
        <br>
        <div class="content">
          <?php if (sizeof($concerts) == 0) : ?>
            <h4 style="text-align: center;">Data Tidak Ditemukan</h4>
          <?php else : ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="white" class="bi bi-music-note" viewBox="0 0 16 16" style="margin-left: 80px;">
              <path d="M9 13c0 1.105-1.12 2-2.5 2S4 14.105 4 13s1.12-2 2.5-2 2.5.895 2.5 2z" />
              <path fill-rule="evenodd" d="M9 3v10H8V3h1z" />
              <path d="M8 2.82a1 1 0 0 1 .804-.98l3-.6A1 1 0 0 1 13 2.22V4L8 5V2.82z" />
            </svg>
            <!-- <h4 style="text-align: end; margin-right: 6.8rem; margin-top: -100px;font-size: 50px;"> Concerts</h4> -->
            <h4 style="text-align: end; margin-right: 3rem; font-size: 35px;"><?= sizeof($concerts) ?> Concerts</h4>
          <?php endif ?>
        </div>
      </div>
      <div class="col" id="dash-orders">
        <h2 style="text-align: center; color: white;">Orders</h2>
        <hr>
        <br>
        <div class="content">
          <?php if (sizeof($orders) == 0) : ?>
            <h4 style="text-align: center;">Data Tidak Ditemukan</h4>
          <?php else : ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="white" class="bi bi-journal-arrow-down" viewBox="0 0 16 16" style="margin-left: 120px;">
              <path fill-rule="evenodd" d="M8 5a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5A.5.5 0 0 1 8 5z" />
              <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
              <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
            </svg>
            <!-- <h4 style="text-align: end; margin-right: 7rem; margin-top: -100px;font-size: 50px;"></h4> -->
            <h4 style="text-align: end; margin-right: 4.5rem; font-size: 35px;"><?= sizeof($orders) ?> Orders</h4>
          <?php endif ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
require 'footer.php';
?>