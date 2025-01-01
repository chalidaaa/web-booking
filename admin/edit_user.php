<?php
include 'koneksi.php';

$id = $_POST['id'];
$nama  = $_POST['nama'];
$email  = $_POST['email'];
$no_hp  = $_POST['no_hp'];
$password  = $_POST['password'];
$role  = $_POST['role'];
// Hash password jika diubah
if (!empty($password)) {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
} else {
    // Ambil password lama dari database jika tidak diubah
    $result = mysqli_query($koneksi, "SELECT password FROM users WHERE id='$id'");
    $row = mysqli_fetch_assoc($result);
    $hashed_password = $row['password'];
}


$update = mysqli_query($koneksi, "UPDATE users SET name='$nama', email='$email',no_hp='$no_hp', password='$hashed_password', role='$role' WHERE id='$id'");


if ($update == true) {
    header("location:user.php?alert=berhasil");
} else {
    header("location:user.php?alert=gagal");
}
