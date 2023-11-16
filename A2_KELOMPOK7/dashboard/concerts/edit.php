<?php
include 'layouts/header.php';
require "../../functions.php";
$id = $_GET['id'];

$concert = query("SELECT*FROM concerts where id = '$id'")[0];

if (isset($_POST['submit'])) {
    $name = htmlspecialchars($_POST['name']);
    $category = htmlspecialchars($_POST['category']);
    $description = htmlspecialchars($_POST['description']);
    $loc = htmlspecialchars($_POST['location']);
    $date = htmlspecialchars($_POST['date']);

    if ($_FILES['image']['error'] === 4) {
      $img = $_POST['oldimg'];
    } else {
      $img = uploadConcert();
      unlink('img/'.$_POST['oldimg']);
      if(!$img) {
        header('Location:edit.php?id='.$id);
        return;
      }
    }
  
    $result = mysqli_query($conn, "UPDATE concerts SET `name` = '$name', `category` = '$category', `description` = '$description', `location` = '$loc', `image` = '$img', `date` = '$date' WHERE `id` = '$id' ");

    if ($result) {
      $_SESSION['pesan'] = 'Data updated successfully';
      header("Location:index.php");
    } else {
      $_SESSION['fail'] = 'Failed to update';
      header("Location:index.php");
    }
}

?>
<h1>Update concert</h1>

<?php if(isset($_SESSION['fail'])): ?>
  <div class="alert">
    <?= $_SESSION['fail']; ?>
  </div>
  <?php unset($_SESSION['fail']); endif; ?>

<form method="post" enctype="multipart/form-data">
  <input type="hidden" name="oldimg" value="<?= $concert['image']; ?>">

  <label for="name">Concert name</label>
  <input type="text" id="name" name="name" value="<?= $concert['name']; ?>" required>

  <label for="category">Category</label>
  <select id="category" name="category" required>
    <option value="religi" <?php if($concert['category'] == 'religi') echo 'selected'; ?>>religi</option>
    <option value="festival" <?php if($concert['category'] == 'festival') echo 'selected'; ?>>festival</option>
    <option value="rock" <?php if($concert['category'] == 'rock') echo 'selected'; ?>>rock</option>
  </select>

  <label for="location">Location</label>
  <input type="text" id="location" name="location" value="<?= $concert['location']; ?>" required>

  <label for="date">Date</label>
  <input type="date" id="date" name="date" value="<?= $concert['date']; ?>" required>

  <label for="description">Description</label>
  <textarea id="description" name="description" required><?= $concert['description']; ?></textarea>

  <label for="formFile">Image</label>
  <input type="file" id="formFile" name="image">

  <input type="submit" value="Submit" name="submit">
</form>
<?php
require 'layouts/footer.php';
?>