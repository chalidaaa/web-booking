<?php
include 'koneksi.php';

$nama  = $_POST['nama'];
$email  = $_POST['email'];
$no_hp  = $_POST['no_hp'];
$role  = $_POST['role'];
$password  = $_POST['password'];

// Hash password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$tambah = mysqli_query($koneksi, "INSERT INTO users (name, email,no_hp, password,role) VALUES ('$nama', '$email','$no_hp', '$hashed_password','$role')");

if ($tambah == true) {
    header("location:user.php?alert=berhasil");
} else {
    header("location:user.php?alert=gagal");
}
