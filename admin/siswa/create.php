<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include_once "../../koneksi.php";
include 'session.php';

if (isset($_POST['submit'])) {
    $nisn_siswa = @$_POST['nisn_siswa'];
    $slug = preg_replace('/[^a-z0-9]+/i', '-', trim(strtolower($_POST["nisn_siswa"])));
    $nama_siswa  = @$_POST['nama_siswa'];
    $alamat  = @$_POST['alamat'];
    $tanggal_lahir = @$_POST['tanggal_lahir'];
    $tempat_lahir  = @$_POST['tempat_lahir'];
    $nama_orang_tua  = @$_POST['nama_orang_tua'];
    $jenis_kelamin  = @$_POST['jenis_kelamin'];
    $sql = "SELECT * FROM tb_siswa WHERE nisn_siswa='$nisn_siswa'";

    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    move_uploaded_file($file_tmp, 'image/' . $file_name);
    $result = mysqli_query($mysqli, "INSERT INTO tb_siswa(nisn_siswa,nama_siswa,alamat,tanggal_lahir,tempat_lahir,nama_orang_tua,jenis_kelamin,foto)
         VALUES('$nisn_siswa','$nama_siswa','$alamat','$tanggal_lahir','$tempat_lahir','$nama_orang_tua','$jenis_kelamin','$file_name')");
    header("Location:../dashboard.php?page=siswa");
}
// 
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php include('../template/navbar.php'); ?>
        <?php include('../template/sidebar.php'); ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <?php include('content-header.php'); ?>
            <!-- /.content-header -->
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="card">

                                <div class="card-header">
                                    <h3 class="card-title">Data siswa
                                    </h3>

                                    <div class="card-tools">
                                        <!-- This will cause the card to maximize when clicked -->
                                        <a href="<?= $base_url_admin ?>/dashboard.php?page=siswa" class="btn btn-info">Kembali</a>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <form action="../siswa/create.php?page=siswa" method="post" enctype="multipart/form-data">

                                    <div class="card-body">

                                        <div class="form-group">
                                            <label for="nisn_siswa">NISN</label>
                                            <input type="text" class="form-control" name="nisn_siswa" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_siswa">Nama Siswa</label>
                                            <input type="text" class="form-control" name="nama_siswa" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                            <input type="text" class="form-control" name="jenis_kelamin" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" class="form-control" name="alamat" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal_lahir">Tanggal Lahir</label>
                                            <input type="text" class="form-control" name="tanggal_lahir" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="tempat_lahir">Tempat Lahir</label>
                                            <input type="text" class="form-control" name="tempat_lahir" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_orang_tua">Nama Orang Tua</label>
                                            <input type="text" class="form-control" name="nama_orang_tua" required>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="file">Foto</label><br>
                                                <input type="file" name="file">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-wrapper -->



    </div>
</body>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<script>
    function confirmDelete() {
        if (confirm('Anda yakin menghapus data?')) {
            //action confirmed
        } else {
            //action cancelled
            alert('Data batal di hapus');
            return false;

        }
    }
</script>
</body>

</html>