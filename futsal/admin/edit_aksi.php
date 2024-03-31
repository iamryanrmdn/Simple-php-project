<?php
include "../koneksi.php";
if (isset($_POST['submit'])) {

    $no_booking = $_POST['no_booking'];
    $tgl_booking = $_POST['tgl_booking'];
    $waktu_booking = $_POST['kd_waktu'];
    $nama_pembooking = $_POST['nama_pembooking'];
    $no_hp_pembooking = $_POST['no_hp_pembooking'];
    $status = $_POST['status'];

    //echo "$no_booking, $tgl_booking, $waktu_booking, $nama_pembooking, $no_hp_pembooking, $status";
    $cek = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_booking WHERE tgl_booking='$tgl_booking' AND waktu_booking='$waktu_booking'"));
    if ($cek > 0) {
        echo "<script>window.alert('Booking tidak bisa di edit dikarenakan tanggal & waktu booking sudah ada')
    window.location='informasi.php'</script>";
    } else {
        mysqli_query($koneksi, "UPDATE `tb_booking` SET `tgl_booking` = '$tgl_booking', `waktu_booking` = '$waktu_booking', `nama_pembooking` = '$nama_pembooking', `no_hp_pembooking` = '$no_hp_pembooking', `status` = '$status' WHERE `tb_booking`.`no_booking` = '$no_booking'");
        header("Location: informasi.php");
    }
}
