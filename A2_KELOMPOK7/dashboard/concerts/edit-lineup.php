<?php
require 'layouts/header.php';
require '../../functions.php';

$id = $_GET['id'];
$lineup = query("SELECT * FROM lineups WHERE id='$id'")[0];
$concert_id = $lineup['concert'];

if(isset($_POST['submit'])) {
    $name = htmlspecialchars($_POST['name']);
    $desc = htmlspecialchars($_POST['description']);

    if ($_FILES['image']['error'] === 4) {
      $img = $_POST['oldimg'];
    } else {
      $img = uploadLineup();
      unlink('img-lineup/'.$_POST['oldimg']);
      if (!$img) {
          header("Location:edit-lineup.php?id=$id");
          return;
      }
    }

    $result = mysqli_query($conn, "UPDATE lineups SET `name` = '$name', `description` = '$desc',`image` = '$img' WHERE `id` = '$id' ");
    if ($result) {
        $_SESSION['pesan'] = 'Lineup updated successfully';
        header("Location:view-lineup.php?id=$concert_id");
      } else {
      $_SESSION['fail'] = 'Failed to update';
      header("Location:view-lineup.php?id=$concert_id");
    }
}

?>
<h1>Update lineup</h1>

<?php if(isset($_SESSION['fail'])): ?>
  <div class="alert">
    <?= $_SESSION['fail']; ?>
  </div>
  <?php unset($_SESSION['fail']); endif; ?>

<form method="post" enctype="multipart/form-data">
  <input type="hidden" name="oldimg" value="<?= $lineup['image']; ?>">

  <label for="name">Artist name</label>
  <input type="text" id="name" value="<?= $lineup['name']; ?>" name="name" required>

  <label for="description">Description</label>
  <textarea id="description" name="description" required><?= $lineup['description']; ?></textarea>

  <label for="formFile">Image</label>
  <input type="file" id="formFile" name="image">

  <input type="submit" value="Submit" name="submit">
</form>
<?php
require 'layouts/footer.php';
?>