<?php
$koneksi = mysqli_connect("localhost", "root", "", "futsal");

//cek koneksi ke database
if (mysqli_connect_errno()) {
    echo "Koneksi Database Gagal!" . mysqli_connect_error();
}
