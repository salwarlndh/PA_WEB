<?php

$conn = mysqli_connect("localhost", "root", "", "pa_web");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function uploadConcert() {
    $fileName = $_FILES['image']['name'];
    $fileSize = $_FILES['image']['size'];
    $error = $_FILES['image']['error'];
    $tempName = $_FILES['image']['tmp_name'];

    // cek apakah tidak ada gambar yg diupload
    if ($error === 4) {
        // echo "<script>alert('choose file first');</script>";
        // session_start();
        $_SESSION['fail'] = 'Choose file first';
        // return $_SESSION['pesan'];
        return false;
    }

    // cek apakah yg diupload adalah gambar
    $validExtension = ['jpg', 'jpeg', 'png'];
    $imgExtension = explode('.', $fileName);
    $imgExtension = strtolower(end($imgExtension));
    if (!in_array($imgExtension, $validExtension)) {
        // echo "<script>alert('please upload img');</script>";
        // session_start();
        $_SESSION['fail'] = 'please upload img';
        // return $_SESSION['pesan'];
        return false;
    }

    // cek jika ukurannya terlalu besar
    if ($fileSize > 5000000) {
        // echo "<script>alert('file size is too big');</script>";
        // session_start();
        $_SESSION['fail'] = 'file is too big';
        // return $_SESSION['pesan'];
        return false;
    }

    // generate namafile
    $newfilename = uniqid();
    $newfilename .= '.';
    $newfilename .= $imgExtension;

    // lolos
    move_uploaded_file($tempName, 'img/' . $newfilename);
    return $newfilename;
}

function uploadLineup() {
    $fileName = $_FILES['image']['name'];
    $fileSize = $_FILES['image']['size'];
    $error = $_FILES['image']['error'];
    $tempName = $_FILES['image']['tmp_name'];

    if ($error === 4) {
        $_SESSION['fail'] = 'choose file first';
        return false;
    }

    $validExtension = ['jpg', 'jpeg', 'png'];
    $imgExtension = explode('.', $fileName);
    $imgExtension = strtolower(end($imgExtension));
    if (!in_array($imgExtension, $validExtension)) {
        $_SESSION['fail'] = 'please upload img';
        return false;
    }

    if ($fileSize > 5000000) {
        $_SESSION['fail'] = 'file is too big';
        return false;
    }

    $newfilename = uniqid();
    $newfilename .= '.';
    $newfilename .= $imgExtension;

    // lolos
    move_uploaded_file($tempName, 'img-lineup/' . $newfilename);
    return $newfilename;
}
?>