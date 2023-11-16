<?php
require 'layouts/header.php';
require '../../functions.php';

$concerts = query("SELECT * FROM concerts");
$i = 1;
?>

<div class="concerts">
  <h1>Concerts</h1>
  <a href="create.php" style="color:white; text-decoration:none;">
    <div class="btn createbtn">Create</div>
  </a>
  <a href="../index.php" style="color:white">
    <div class="btn backbtn">Back</div>
  </a>
  <?php if (isset($_SESSION['pesan'])) : ?>
    <div style="background-color: #28a745; color: white; padding: 10px; margin-bottom: 10px;">
      <?= $_SESSION['pesan']; ?>
    </div>
  <?php unset($_SESSION['pesan']);
  endif; ?>
  <?php if (isset($_SESSION['fail'])) : ?>
    <div style="background-color: #dc3545; color: white; padding: 10px; margin-bottom: 10px;">
      <?= $_SESSION['fail']; ?>
    </div>
  <?php unset($_SESSION['fail']);
  endif; ?>
  <table>
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Category</th>
        <th>Location</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php if (sizeof($concerts) == 0) : ?>
        <tr>
          <td colspan="5" style="text-align: center; padding: 10px; border: 1px solid #dee2e6;">no data yet</td>
        </tr>
      <?php else : ?>
        <?php foreach ($concerts as $concert) : ?>
          <tr>
            <td><?= $i++; ?></td>
            <td><?= $concert["name"]; ?></td>
            <td><?= $concert['category']; ?></td>
            <td><?= $concert["location"]; ?></td>
            <td>
              <a href="info.php?id=<?= $concert['id']; ?>" class="btn view"><i class="fa-solid fa-eye"></i></a>
              <a href="edit.php?id=<?= $concert['id']; ?>" class="btn edit"><i class="fa-solid fa-pen-to-square"></i></a>
              <a href="delete.php?id=<?= $concert['id']; ?>" onclick="return confirm('Are you sure to delete this data?')" class="btn delete"><i class="fa-solid fa-trash"></i></a>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<?php require 'layouts/footer.php' ?>