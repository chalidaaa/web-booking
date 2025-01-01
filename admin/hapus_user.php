<?php
include 'koneksi.php';
$id  = $_GET['id'];

$hapus = mysqli_query($koneksi, "delete from users where id='$id'");
if ($hapus) {
    header("location:user.php?alert=berhasilhapus");
} else {
    header("location:user.php?alert=gagal");
}
