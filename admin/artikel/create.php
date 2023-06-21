<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include_once "../../koneksi.php";
include 'session.php';

if (isset($_POST['submit'])) {
    $judul_artikel = @$_POST['judul_artikel'];
    $slug = preg_replace('/[^a-z0-9]+/i', '-', trim(strtolower($_POST["judul_artikel"])));
    $created_time = date("Y-m-d H:i:s");
    $id_users = $_SESSION['id_users'] = '1';
    $content  = @$_POST['content'];
    $sql = "SELECT * FROM tb_artikel WHERE judul_artikel='$judul_artikel'";
    $file_name = $_FILES['cover']['name'];
    $file_tmp = $_FILES['cover']['tmp_name'];
    move_uploaded_file($file_tmp, 'image/' . $file_name);
    $result = mysqli_query($mysqli, "INSERT INTO tb_artikel(judul_artikel,waktu_artikel,id_users,content,cover)
         VALUES('$judul_artikel','$created_time','$id_users','$content','$file_name')");
    header("Location:../dashboard.php?page=artikel");
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
                                    <h3 class="card-title">Data artikel
                                    </h3>

                                    <div class="card-tools">
                                        <!-- This will cause the card to maximize when clicked -->
                                        <a href="<?= $base_url_admin ?>/dashboard.php?page=artikel" class="btn btn-info">Kembali</a>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <form action="../artikel/create.php?page=artikel" method="post" enctype="multipart/form-data">

                                    <div class="card-body">

                                        <div class="form-group">
                                            <label for="judul_artikel">Judul artikel</label>
                                            <input type="text" class="form-control" name="judul_artikel" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="content">Content</label>
                                            <textarea type="text" class="form-control" name="content" required></textarea>
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