<?php
include 'admin/koneksi.php';

$nama  = $_POST['nama'];
$email  = $_POST['email'];
$no_hp  = $_POST['no_hp'];
$role  = 'user';
$password  = $_POST['password'];

// Hash password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$tambah = mysqli_query($koneksi, "INSERT INTO users (name, email,no_hp, password,role) VALUES ('$nama', '$email','$no_hp', '$hashed_password','$role')");

if ($tambah == true) {
    header("location:index.php?alert=berhasil_register");
} else {
    header("location:index.php?alert=gagal_register");
}
