<?php
require 'layouts/header.php';
require '../../functions.php';

$concert_id = $_GET['id'];
$lineups = query("SELECT * FROM lineups WHERE concert='$concert_id'");
?>
<div class="container-lineup">
    <h1>Line up</h1>
    <a href="create-lineup.php?id=<?= $concert_id; ?>" class="btn createbtn">Create</a>
    <a href="info.php?id=<?= $concert_id; ?>" class="btn backbtn">Back</a>
    <?php if (isset($_SESSION['pesan'])) : ?>
        <div class="alert alert-success" role="alert">
            <?= $_SESSION['pesan']; ?>
        </div>
    <?php unset($_SESSION['pesan']);
    endif; ?>
    <?php if (isset($_SESSION['fail'])) : ?>
        <div class="alert alert-danger" role="alert">
            <?= $_SESSION['fail']; ?>
        </div>
    <?php unset($_SESSION['fail']);
    endif; ?>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (sizeof($lineups) == 0) : ?>
                <tr>
                    <td colspan="4" style="text-align:center">No data yet</td>
                </tr>
            <?php else : ?>
                <?php $i = 1;
                foreach ($lineups as $lineup) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $lineup["name"]; ?></td>
                        <td><?= $lineup['description']; ?></td>
                        <td>
                            <a href="edit-lineup.php?id=<?= $lineup['id'] ?>"><button class="btn edit"><i class="fa-solid fa-pen-to-square"></i></button></a>
                            <a href="delete-lineup.php?id=<?= $lineup['id'] ?>" onclick="return confirm('Are you sure to delete this data?')"><button class="btn delete"><i class="fa-solid fa-trash"></i></button></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php
require 'layouts/footer.php';
?>