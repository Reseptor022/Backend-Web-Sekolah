<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include_once("../../koneksi.php");
include('session.php');
define('SITE_ROOT', realpath(dirname(__FILE__)));
// Display selected user data based on id
// Getting id from url
$id_artikel = @$_GET['id_artikel'];

// Fetech user data based on id
$res_artikel = mysqli_query($mysqli, "SELECT * FROM tb_artikel WHERE 
id_artikel=$id_artikel");

while ($artikel = mysqli_fetch_array($res_artikel)) {
    $row_judul_artikel = $artikel['judul_artikel'];
    $row_content = $artikel['content'];
    $row_cover = $artikel['cover'];
}
?>
<?php
// include config connection file
// Check if form is submitted for user update, then redirect to homepage after update
if (isset($_POST['update'])) {
    $id_artikel = $_POST['id_artikel'];
    $created_time = date("Y-m-d H:i:s");
    $id_users = $_SESSION['id_users'];
    $slug = preg_replace('/[^a-z0-9]+/i', '-', trim(strtolower($_POST["judul_artikel"])));
    $judul_artikel = @$_POST['judul_artikel'];
    $content  = @$_POST['content'];
    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    move_uploaded_file($file_tmp, SITE_ROOT . '/image/' . $file_name);
    $result = mysqli_query($mysqli, "UPDATE tb_artikel SET 
    cover='$file_name',
    judul_artikel='$judul_artikel',
    content='$content',
    id_users='$id_users',
    waktu_artikel='$created_time'
    WHERE id_artikel=$id_artikel");
    // update user data

    // Redirect to homepage to display updated user in list
    header("Location:../dashboard.php?page=artikel");
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
                                    <h3 class="card-title">Data Artikel</h3>

                                    <div class="card-tools">
                                        <!-- This will cause the card to maximize when clicked -->
                                        <a href="../dashboard.php?page=artikel" class="btn btn-info">Kembali</a>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>

                                <div class="card-body">

                                    <form action="../../admin/artikel/edit.php?page=artikel" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="id_artikel" value="<?= $id_artikel ?>">
                                        <div class="form-group">
                                            <label for="judul_artikel">Judul Artikel</label>
                                            <input type="text" class="form-control" value="<?= $row_judul_artikel ?>" name="judul_artikel" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="content">Content</label>
                                            <textarea type="text" class="form-control" name="content" required><?= $row_content ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Pilih Gambar</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="cover" class="custom-file-input">
                                                    <label class="custom-file-label">Pilih File Gambar</label>
                                                </div>
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