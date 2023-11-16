<?php
    require 'functions.php';
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $id = $_POST['id'];
        $email = $_POST['email'];
        $category = $_POST['category'];
        $payment = $_POST['payment'];
        $concert_id = $_POST['concert_id'];

        $query = "INSERT INTO orders VALUES('$id', '$name', '$email', '$category', '$payment', '$concert_id')";
        mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="ticket2">
        <p>Ticket booked!</p>
        <table>
            <tr>
                <th>Name</th>
                <td><?php echo $name; ?></td>
            </tr>
            <tr>
                <th>Id number</th>
                <td><?php echo $id; ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo $email; ?></td>
            </tr>
            <tr>
                <th>Category</th>
                <td><?php echo $category; ?></td>
            </tr>
            <tr>
                <th>Payment method</th>
                <td><?php echo $payment; ?></td>
            </tr>
        </table>
        <p>Continue to payment in (10) minutes...</p>
        <a href="<?= ($concert_id==1) ? 'index.php' : 'detail.php?id='.$concert_id ?>">Back</a>
    </div>
</body>
</html>
<?php
    } else {
        header("Location:index.php");
    }
?>