<?php
include 'koneksi.php';

$id = $_POST['id'];
$user_id = $_POST['user_id'];
$jam_booking = $_POST['jam_booking'];
$status = 'pending';
$note = $_POST['note'];

$tambah = mysqli_query($koneksi, "INSERT INTO tbl_booking (user_id, booking_datetime, status,note) VALUES ('$user_id', '$jam_booking', '$status', '$note')");

if ($tambah == true) {
    header("location:index.php?alert=berhasil");
} else {
    header("location:index.php?alert=gagal");
}
?>