<?php
require "../../functions.php";
$id = $_GET['id'];

$query = query("SELECT * FROM lineups WHERE id=$id")[0];
$concert_id = $query['concert'];
unlink('img-lineup/'.$query['image']);

$result = mysqli_query($conn,"DELETE FROM lineups WHERE id = '$id'");

if ($result) {
    session_start();
    $_SESSION['pesan'] = 'Data successfully deleted';
    header("Location:view-lineup.php?id=$concert_id");
} else {
    session_start();
    $_SESSION['fail'] = 'Data failed to delete';
    header("Location:view-lineup.php?id=$concert_id");
}
?>