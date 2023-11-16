<?php

include 'layouts/header.php';
require '../../functions.php';

date_default_timezone_set("Asia/Makassar");

if (isset($_POST['submit'])) {
  $id = date('ymdHi') . rand(10, 99);
  $name = htmlspecialchars($_POST['name']);
  $category = htmlspecialchars($_POST['category']);
  $description = htmlspecialchars($_POST['description']);
  $loc = htmlspecialchars($_POST['location']);
  $date = htmlspecialchars($_POST['date']);

  // upload gambar
  $img = uploadConcert();
  if (!$img) {
    header('Location: create.php');
    return;
  }

  $query = "INSERT INTO concerts VALUES('$id', '$name', '$category', '$description', '$loc', '$img', '$date')";
  $result = mysqli_query($conn, $query);
  if ($result) {
    session_start();
    $_SESSION['pesan'] = 'berhasil menambahkan konser';
    header('Location:info.php?id=' . $id);
  } else {
    die('gagal');
  }
}
?>
<h1>Add new concert</h1>
<?php if (isset($_SESSION['fail'])) : ?>
  <div class="alert">
    <?= $_SESSION['fail']; ?>
  </div>
<?php unset($_SESSION['fail']);
endif; ?>

<form method="post" enctype="multipart/form-data">
  <label for="name">Concert name</label>
  <input type="text" id="name" name="name" required>

  <label for="category">Category</label>
  <select id="category" name="category" required>
    <option value="religi">Religi</option>
    <option value="festival">Festival</option>
    <option value="rock">Rock</option>
  </select>

  <label for="location">Location</label>
  <input type="text" id="location" name="location" required>

  <label for="date">Date</label>
  <input type="date" id="date" name="date" min=<?= date("Y-m-d") ?> required>

  <label for="description">Description</label>
  <textarea id="description" name="description" required></textarea>

  <label for="formFile">Image</label>
  <input type="file" id="formFile" name="image" required>

  <input type="submit" value="Submit" name="submit">
</form>
<?php
include 'layouts/footer.php';
?>