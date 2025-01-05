<?php
include 'koneksi.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query untuk mendapatkan data pengguna berdasarkan email
    $result = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE email='$email'");
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        // Set session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['nama'];
        $_SESSION['user_role'] = $user['role'];

        // Redirect berdasarkan peran pengguna
        if ($user['role'] == 'admin') {
            header("Location: ../admin/dashboard.php");
        } else {
            header("Location: ../user/account.php");
        }
        exit();
    } else {
        // Jika login gagal
        header("Location: ../account.php?alert=gagal");
        exit();
    }
}
