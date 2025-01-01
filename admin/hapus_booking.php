<?php
include 'koneksi.php';
$id  = $_GET['id'];

$hapus = mysqli_query($koneksi, "delete from tbl_booking where id='$id'");
if ($hapus) {
    header("location:index.php?alert=berhasilhapus");
} else {
    header("location:index.php?alert=gagal");
}
