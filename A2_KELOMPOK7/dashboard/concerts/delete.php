<?php
require "../../functions.php";
$id = $_GET['id'];
$concert = query("SELECT * FROM concerts WHERE id=$id")[0];
$lineups = query("SELECT * FROM lineups WHERE concert=$id");
unlink('img/'.$concert['image']);
foreach($lineups as $lineup) {
    unlink('img-lineup/'.$lineup['image']);
}
$result = mysqli_query($conn,"DELETE FROM concerts WHERE id = '$id'");
$result2 = mysqli_query($conn, "DELETE FROM lineups WHERE concert='$id'");

if ($result && $result2) {
    session_start();
    $_SESSION['pesan'] = 'Data successfully deleted';
    header("Location:index.php");
} else {
    session_start();
    $_SESSION['fail'] = 'Data failed to delete';
    header("Location:index.php");
}
?>