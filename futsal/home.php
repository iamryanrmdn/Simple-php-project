<?php
//mengaktifkan sesi pada php
session_start();
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
                        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <ul class="navbar-nav mr-sm-2">
                    <li class="nav-item active">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <br>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-auto">
                <h2 class="text-center">Booking Lapangan Futsal</h2>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-md-auto">
                <!-- Menampilkan Waktu (LiveTime) -->
                <?php
                date_default_timezone_set("Asia/jakarta");
                ?>
                <p>Time : <?= date('l, d-m-Y'); ?> | <b><span id="jam" style="font-size:24"></span></b></p>

                <script type="text/javascript">
                    window.onload = function() {
                        jam();
                    }

                    function jam() {
                        var e = document.getElementById('jam'),
                            d = new Date(),
                            h, m, s;
                        h = d.getHours();
                        m = set(d.getMinutes());
                        s = set(d.getSeconds());

                        e.innerHTML = h + ':' + m + ':' + s;

                        setTimeout('jam()', 1000);
                    }

                    function set(e) {
                        e = e < 10 ? '0' + e : e;
                        return e;
                    }
                </script>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-md-center">
            <table class="table table-bordered col-sm-12 text-center">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode Waktu</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Jam</th>
                        <th scope="col">Lapangan</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <?php
                include 'koneksi.php';
                $data = mysqli_query($koneksi, "SELECT * FROM view_informasi_booking");
                while ($row = mysqli_fetch_array($data)) {
                ?>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($data as $row) : ?>
                            <tr>
                                <td class="text-center"><?= $i; ?></td>
                                <td><?php echo $row['kd_waktu']; ?></td>
                                <td><?php echo $row['tgl_booking']; ?></td>
                                <td><?php echo $row['nama_waktu']; ?></td>
                                <td><?php echo $row['nama_lapangan']; ?></td>
                                <td><?php echo $row['status']; ?></td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                <?php
                }
                ?>
            </table>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center text-lg-start">
        <div class="container">
            <div class="text-center p-3">
                © 2023 Copyright : Tugas Akhir Pemweb
            </div>
    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</html>