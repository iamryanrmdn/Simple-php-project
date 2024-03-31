<?php
include "../koneksi.php";
if (isset($_POST['submit'])) {
    $tgl_booking = $_POST['tgl_booking'];
    $waktu_booking = $_POST['kd_waktu'];
    $nama_pembooking = $_POST['nama_pembooking'];
    $no_hp_pembooking = $_POST['no_hp_pembooking'];
    $status = $_POST['status'];

    //echo "$no_booking, $tgl_booking, $waktu_booking, $nama_pembooking, $no_hp_pembooking, $status";
    $cek = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_booking WHERE tgl_booking='$tgl_booking' AND waktu_booking='$waktu_booking'"));
    if ($cek > 0) {
        echo "<script>window.alert('Booking Penuh')
    window.location='informasi.php'</script>";
    } else {
        mysqli_query($koneksi, "INSERT INTO tb_booking VALUES(null, '$tgl_booking', '$waktu_booking', '$nama_pembooking', '$no_hp_pembooking', '$status')");
        header("Location: informasi.php");
    }
}
