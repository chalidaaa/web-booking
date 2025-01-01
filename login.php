<?php
include 'admin/koneksi.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query untuk mendapatkan data pengguna berdasarkan email
    $result = mysqli_query($koneksi, "SELECT * FROM users WHERE email='$email'");
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        // Set session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_role'] = $user['role'];

        // Redirect berdasarkan peran pengguna
        if ($user['role'] == 'admin') {
            header("Location: admin/index.php");
        } else {
            header("Location: index.php?alert=berhasil_login");
        }
        exit();
    } else {
        // Jika login gagal
        header("Location: index.php?alert=gagal_login");
        exit();
    }
}
