<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Booking</title>
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
    <div class="content">
        <div class="container">
            <div class="sub-content mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <!-- <div class="col"></div> -->
                                    <div class="col-12">
                                        <?php
                                        include "../koneksi.php";
                                        $no_booking = $_GET['no_booking'];
                                        $data = mysqli_query($koneksi, "SELECT * FROM tb_booking WHERE no_booking = '$no_booking'");
                                        while ($row = mysqli_fetch_array($data)) {
                                        ?>
                                            <form action="edit_aksi.php" method="post">
                                                <h2 class="text-center">Form Edit Booking</h2>
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control" name="no_booking" id="no_booking" value="<?php echo $row['no_booking']; ?>">
                                                </div>

                                                <div class=" form-group">
                                                    <label for="tgl_booking">Tanggal Booking</label>
                                                    <input type="date" class="form-control" name="tgl_booking" id="tgl_booking" value="<?php echo $row['tgl_booking']; ?>">
                                                </div>

                                                <div class=" form-group">
                                                    <label for="kd_waktu">Waktu Booking</label>
                                                    <select name="kd_waktu" id="kd_waktu" class="form-control">
                                                        <?php
                                                        include "../koneksi.php";
                                                        $kd_waktu = $row['waktu_booking'];
                                                        $data1 = mysqli_query($koneksi, "SELECT * FROM tb_waktu");
                                                        while ($waktu1 = mysqli_fetch_array($data1)) {
                                                            if ($waktu1['kd_waktu'] == $kd_waktu) {
                                                        ?>
                                                                <option selected value="<?php echo $waktu1['kd_waktu']; ?>"><?php echo $waktu1['kd_waktu']; ?></option>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <option value="<?php echo $waktu1['kd_waktu']; ?>"><?php echo $waktu1['kd_waktu']; ?></option>
                                                            <?php
                                                            }
                                                            ?>

                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="nama_pembooking">Nama Pembooking</label>
                                                    <input type="text" class="form-control" name="nama_pembooking" id="nama_pembooking" value="<?php echo $row['nama_pembooking']; ?>">
                                                </div>

                                                <div class=" form-group">
                                                    <label for="nama_pembooking">Nomor HP</label>
                                                    <input type="text" class="form-control" name="no_hp_pembooking" id="no_hp_pembooking" value="<?php echo $row['no_hp_pembooking']; ?>">
                                                </div>

                                                <div class=" form-group">
                                                    <label for="status">Status</label>
                                                    <select name="status" id="status" class="form-control">
                                                        <option value="<?php echo $row['status']; ?>"><?php echo $row['status']; ?></option>
                                                    </select>
                                                </div>
                                                <button type="submit" name="submit" class="btn btn-primary">Ubah Data</button>
                                            </form>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <!-- <div class="col"></div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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