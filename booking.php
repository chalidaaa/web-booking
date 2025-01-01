<?php
include 'admin/koneksi.php';

// $id = $_POST['id'];
$user_id = (int)$_POST['user_id'];
$jam_booking = $_POST['date'];
// $status = $_POST['status'];
$note = $_POST['note'];

$tambah = mysqli_query($koneksi, "INSERT INTO tbl_booking (user_id, booking_datetime, status, note) VALUES ('$user_id', '$jam_booking', 'pending', '$note')");

if ($tambah == true) {
    header("location:index.php?alert=berhasil");
} else {
    header("location:index.php?alert=gagal");
}
