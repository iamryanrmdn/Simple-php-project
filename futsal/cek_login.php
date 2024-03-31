<?php
//mengaktifkan sesi pada php
session_start();
//menghubungkan dengan file koneksi.php
include "koneksi.php";
//menangkap nilai atau isi yag ada pada form login
$username = $_POST['username'];
$password = $_POST['password'];

$data = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username' AND password = '$password' ");
if (mysqli_num_rows($data) > 0) {
    echo "Benar";
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    header("Location: admin/index.php");
} else {
    echo "Salah";
    header("Location: login.php");
}
