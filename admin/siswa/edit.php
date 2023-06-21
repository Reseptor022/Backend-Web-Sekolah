<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include_once("../../koneksi.php");
include('session.php');
define('SITE_ROOT', realpath(dirname(__FILE__)));
// Display selected user data based on id
// Getting id from url
$id_siswa = @$_GET['id_siswa'];

// Fetech user data based on id
$res_siswa = mysqli_query($mysqli, "SELECT * FROM tb_siswa WHERE 
id_siswa=$id_siswa");

while ($siswa = mysqli_fetch_array($res_siswa)) {
    $row_nisn_siswa = $siswa['nisn_siswa'];
    $row_nama_siswa = $siswa['nama_siswa'];
    $row_alamat = $siswa['alamat'];
    $row_tanggal_lahir = $siswa['tanggal_lahir'];
    $row_tempat_lahir = $siswa['tempat_lahir'];
    $row_nama_orang_tua = $siswa['nama_orang_tua'];
    $row_jenis_kelamin = $siswa['jenis_kelamin'];
    $row_foto = $siswa['foto'];
}
?>
<?php
// include config connection file
// Check if form is submitted for user update, then redirect to homepage after update
if (isset($_POST['update'])) {
    $id_siswa = $_POST['id_siswa'];
    $nisn_siswa = @$_POST['nisn_siswa'];
    $nama_siswa = @$_POST['nama_siswa'];
    $alamat = @$_POST['alamat'];
    $tanggal_lahir = @$_POST['tanggal_lahir'];
    $tempat_lahir = @$_POST['tempat_lahir'];
    $nama_orang_tua = @$_POST['nama_orang_tua'];
    $jenis_kelamin  = @$_POST['jenis_kelamin'];
    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    move_uploaded_file($file_tmp, SITE_ROOT . '/image/' . $file_name);
    $result = mysqli_query($mysqli, "UPDATE tb_siswa SET 
    foto='$file_name',
    nisn_siswa='$nisn_siswa',
    nama_siswa='$nama_siswa',
    alamat='$alamat',
    tanggal_lahir='$tanggal_lahir',
    tempat_lahir='$tempat_lahir',
    nama_orang_tua='$nama_orang_tua',
    jenis_kelamin='$jenis_kelamin'
    WHERE id_siswa=$id_siswa");

    // update user data

    // Redirect to homepage to display updated user in list
    header("Location:../dashboard.php?page=siswa");
}
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
        <?php include_once('../template/navbar.php'); ?>
        <?php include_once('../template/sidebar.php'); ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <?php include_once('content-header.php'); ?>
            <!-- /.content-header -->
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Data Siswa</h3>

                                    <div class="card-tools">
                                        <!-- This will cause the card to maximize when clicked -->
                                        <a href="../dashboard.php?page=siswa" class="btn btn-info">Kembali</a>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>

                                <div class="card-body">

                                    <form action="../../admin/siswa/edit.php?page=siswa" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="id_siswa" value="<?= $id_siswa ?>">
                                        <div class="form-group">
                                            <label for="nisn_siswa">NISN</label>
                                            <input type="text" class="form-control" value="<?= $row_nisn_siswa ?>" name="nisn_siswa" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="nama_siswa">Nama Siswa</label>
                                            <input type="text" class="form-control" value="<?= $row_nama_siswa ?>" name="nama_siswa" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                            <input type="text" class="form-control" value="<?= $row_jenis_kelamin ?>" name="jenis_kelamin" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <textarea type="text" class="form-control" name="alamat" required><?= $row_alamat ?></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="tanggal_lahir">Tanggal Lahir</label>
                                            <input type="text" class="form-control" value="<?= $row_tanggal_lahir ?>" name="tanggal_lahir" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="tempat_lahir">Tempat Lahir</label>
                                            <input type="text" class="form-control" value="<?= $row_tempat_lahir ?>" name="tempat_lahir" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="nama_orang_tua">Nama Orang Tua</label>
                                            <input type="text" class="form-control" value="<?= $row_nama_orang_tua ?>" name="nama_orang_tua" required>
                                        </div>

                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="file">Foto</label><br>
                                                <input type="file" name="file">
                                            </div>
                                        </div>

                                        <button class="btn btn-primary" type="submit" name="update">Simpan</button>

                                    </form>


                                </div>
                                <!-- /.content-wrapper -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include_once('../template/footer.php'); ?>

    </div>
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
                alert('Data berhasil dihapus');
            } else {
                //action cancelled
                alert('Data batal di hapus');
                return false;

            }
        }
    </script>
</body>

</html>