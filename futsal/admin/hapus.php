<?php

include '../koneksi.php';

$no_booking = $_GET['no_booking'];
mysqli_query($koneksi, "DELETE FROM tb_booking WHERE no_booking = '$no_booking' ");
header("Location: informasi.php");
