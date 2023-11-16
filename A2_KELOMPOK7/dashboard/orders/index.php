<?php
require 'layouts/header.php';
session_start();

if(!isset($_SESSION['adminLoggedIn'])){
    header("Location: ../../user-admin/login.php");
    exit;
}

require '../../functions.php';

$orders = query("SELECT * FROM orders");
?>

<div class="concerts">
  <h1>Orders</h1>
  <a href="../index.php" style="color:white">
    <div class="btn backbtn">Back</div>
  </a>
  <table>
    <thead>
      <tr>
        <th>#</th>
        <th>Order id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Category</th>
        <th>Payment</th>
      </tr>
    </thead>
    <tbody>
      <?php if(sizeof($orders) == 0): ?>
        <tr>
          <td colspan="6" style="text-align: center;">No data yet</td>
        </tr>
      <?php else: ?>
        <?php $i=1; foreach($orders as $order): ?>
          <tr>
            <th scope="row"><?= $i++; ?></th>
            <td><?= $order['id']; ?></td>
            <td><?= $order['name']; ?></td>
            <td><?= $order['email']; ?></td>
            <td><?= $order['category']; ?></td>
            <td><?= $order['payment']; ?></td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>
</div>
<?php
require 'layouts/footer.php';
?>