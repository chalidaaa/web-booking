<?php
include 'koneksi.php';

$id = $_POST['id'];
$user_id = $_POST['user_id'];
$jam_booking = $_POST['jam_booking'];
$status = $_POST['status'];
$note = $_POST['note'];

$tambah = mysqli_query($koneksi, "INSERT INTO tbl_product (nama, harga, rating, foto,deskripsi, ukuran, stok) VALUES ('$nama', '$harga', '$rating', '$foto', '$deskripsi', '$ukuran', '$stok')");

if ($tambah == true) {
    header("location:index.php?alert=berhasil");
} else {
    header("location:index.php?alert=gagal");
}
?>