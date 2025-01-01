<?php
include 'koneksi.php';

$id = $_POST['id'];
$user_id = $_POST['user_id'];
$jam_booking = $_POST['jam_booking'];
$status = $_POST['status'];
$note = $_POST['note'];

$update = mysqli_query($koneksi, "UPDATE tbl_booking SET user_id='$user_id', booking_datetime='$jam_booking', status='$status', note='$note' WHERE id='$id'");


if ($update == true) {
    header("location:index.php?alert=berhasil");
} else {
    header("location:index.php?alert=gagal");
}
