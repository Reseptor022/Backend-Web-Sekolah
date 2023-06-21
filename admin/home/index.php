<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include("../koneksi.php");
include('session.php');
$base_url = "http://localhost/web-sekolah/admin";

$agenda = mysqli_query($mysqli, 'SELECT count(*) jml FROM tb_agenda');
$row_agenda = mysqli_fetch_assoc($agenda);
$artikel = mysqli_query($mysqli, 'SELECT count(*) jml FROM tb_artikel');
$row_artikel = mysqli_fetch_assoc($artikel);
$users = mysqli_query($mysqli, 'SELECT count(*) jml FROM tb_users');
$row_users = mysqli_fetch_assoc($users);
$about = mysqli_query($mysqli, 'SELECT count(*) jml FROM tb_about');
$row_about = mysqli_fetch_assoc($about);
$gallery = mysqli_query($mysqli, 'SELECT count(*) jml FROM tb_gallery');
$row_gallery = mysqli_fetch_assoc($gallery);
$menu = mysqli_query($mysqli, 'SELECT count(*) jml FROM tb_menu');
$row_menu = mysqli_fetch_assoc($menu);
$siswa = mysqli_query($mysqli, 'SELECT count(*) jml FROM tb_siswa');
$row_siswa = mysqli_fetch_assoc($siswa);
?>
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">

                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?= $row_users['jml'] ?></h3>
                        <p>Users</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person"></i>
                    </div>
                    <a href="<?= $base_url ?>/dashboard.php?page=users" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?= $row_artikel['jml'] ?><sup style="font-size: 20px"></sup></h3>
                        <p>Artikel</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-pen"></i>
                    </div>
                    <a href="<?= $base_url ?>/dashboard.php?page=artikel" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-purple">
                    <div class="inner">
                        <h3>
                            <?= $row_about['jml'] ?>
                        </h3>
                        <p>About</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-tags"></i>
                    </div>
                    <a href="<?= $base_url ?>/dashboard.php?page=about" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>
                            <?= $row_agenda['jml'] ?><sup style="font-size: 20px"></sup>
                        </h3>
                        <p>Agenda</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-tags"></i>
                    </div>
                    <a href="<?= $base_url ?>/dashboard.php?page=agenda" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3>
                            <?= $row_menu['jml'] ?>
                        </h3>
                        <p>Menu</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-th"></i>
                    </div>
                    <a href="<?= $base_url ?>/dashboard.php?page=menu" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>
                            <?= $row_gallery['jml'] ?>
                        </h3>
                        <p>Gallery</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-tags"></i>
                    </div>
                    <a href="<?= $base_url ?>/dashboard.php?page=gallery" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-gray">
                    <div class="inner">
                        <h3>
                            <?= $row_siswa['jml'] ?>
                        </h3>
                        <p>Siswa</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="<?= $base_url ?>/dashboard.php?page=siswa" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>