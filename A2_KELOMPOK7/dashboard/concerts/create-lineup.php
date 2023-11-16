<?php
require 'layouts/header.php';
require '../../functions.php';

$concert_id = $_GET['id'];
if (isset($_POST['submit'])) {
  $name = htmlspecialchars($_POST['name']);
  $desc = htmlspecialchars($_POST['description']);
  $img = uploadLineup();
  if (!$img) {
    header("Location:create-lineup.php?id=$concert_id");
    return;
  }

  $query = "INSERT INTO lineups(`name`, `description`, `concert`, `image`) VALUES('$name', '$desc', '$concert_id', '$img')";
  $result = mysqli_query($conn, $query);
  // var_dump($result); die;
  if ($result) {
    session_start();
    $_SESSION['pesan'] = 'Lineup added successfully';
    header("Location:view-lineup.php?id=$concert_id");
  } else {
    die('Failed');
  }
}

?>
<h1>Add lineup</h1>
<?php if (isset($_SESSION['fail'])) : ?>
  <div style="color: #ff0000;">
    <?= $_SESSION['fail']; ?>
  </div>
<?php unset($_SESSION['pesan']);
endif; ?>

<form method="post" enctype="multipart/form-data">
  <label for="name">Artist name</label>
  <input type="text" id="name" name="name" required>

  <label for="description">Description</label>
  <textarea id="description" name="description" required></textarea>

  <label for="formFile">Image</label>
  <input type="file" id="formFile" name="image" required>

  <input type="submit" value="Submit" name="submit">
</form>
<?php
require 'layouts/footer.php';
?>