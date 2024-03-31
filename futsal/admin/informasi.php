<?php
include '../koneksi.php';
date_default_timezone_set('Asia/Jakarta');

$deleteTime = strtotime('-1 days');

// Membentuk query untuk menghapus data berdasarkan waktu
$hapusData = "DELETE FROM tb_booking WHERE tgl_booking < '" . date('Y-m-d H:i:s', $deleteTime) . "'";

// Menjalankan query untuk menghapus data
if ($koneksi->query($hapusData) === TRUE) {
    echo "";
} else {
    echo "Error: " . $hapusData . "<br>" . $koneksi->error;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chamber Futsal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">Chamber Futsal</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <ul class="navbar-nav mr-sm-2">
                    <li class="nav-item active">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="container">
        <div class="row justify-content-md-center mt-5">
            <div class="col-md-auto">
                <h2 class="text-center">Informasi Booking Lapangan Futsal</h2>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-md">
                <a href="tambah.php" class="btn btn-primary"><i class="bi bi-person-plus-fill"></i>&nbsp;Booking Lapangan</a>
                <a href="index.php" class="btn btn-danger"><i class="bi bi-person-plus-fill"></i>&nbsp;Kembali</a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-md-center">
            <table class="table table-bordered col-sm-12 text-center">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">No Booking</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Waktu Booking</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Nomor HP</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <?php
                include '../koneksi.php';
                $data = mysqli_query($koneksi, "SELECT * FROM tb_booking INNER JOIN tb_waktu ON tb_waktu.kd_waktu = tb_booking.waktu_booking");
                while ($row = mysqli_fetch_array($data)) {
                ?>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($data as $row) : ?>
                            <tr>
                                <td class="text-center"><?= $i; ?></td>
                                <td>BOOK<?php echo $row['no_booking']; ?></td>
                                <td><?php echo $row['tgl_booking']; ?></td>
                                <td><?php echo $row['kd_waktu']; ?></td>
                                <td><?php echo $row['nama_pembooking']; ?></td>
                                <td><?php echo $row['no_hp_pembooking']; ?></td>
                                <td><?php echo $row['status']; ?></td>
                                <td class="text-center">
                                    <a class="btn btn-primary btn-sm" href="edit.php?no_booking=<?= $row['no_booking']; ?>">Edit</a>
                                    <a class="btn btn-danger btn-sm" href="hapus.php?no_booking=<?= $row['no_booking']; ?>" onclick="return confirm('Apakah benar Admin akan menghapus data ini?');">Hapus</a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    <?php
                }
                    ?>
                    </tbody>
            </table>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center text-lg-start fixed-bottom">
        <div class="container">
            <div class="text-center p-3">
                © 2023 Copyright : Tugas Akhir Pemweb
            </div>
    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</html>