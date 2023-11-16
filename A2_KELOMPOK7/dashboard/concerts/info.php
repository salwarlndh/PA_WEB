<?php
require 'layouts/header.php';
require '../../functions.php';

$concert_id = $_GET['id'];
$concert = query("SELECT * FROM concerts WHERE id='$concert_id'")[0];
$lineups = query("SELECT lineups.* FROM lineups INNER JOIN concerts ON lineups.concert=concerts.id WHERE concerts.id='$concert_id'");
?>

<div class="container-info">
  <a href="index.php" class="btn backbtn">Back</a>
  <?php if (isset($_SESSION['pesan'])) : ?>
    <div class="alert alert-success" role="alert">
      <?= $_SESSION['pesan']; ?>
    </div>
  <?php unset($_SESSION['pesan']);
  endif; ?>
  <div class="image">
    <img src="img/<?= $concert['image']; ?>" alt="<?= $concert['image']; ?>">
  </div>
  <h1><?= $concert['name']; ?></h1>
  <p>Category    : <?= $concert['category']; ?></p>
  <p>Description : <?= $concert['description']; ?></p>
  <p>Location    : <?= $concert['location']; ?></p>
  <p>Date        : <?= date_format(date_create($concert['date']), "j F Y"); ?></p>
  <a href="view-lineup.php?id=<?= $concert_id; ?>" class="btn view">See lineups</a>
</div>

<?php
require 'layouts/footer.php';
?>