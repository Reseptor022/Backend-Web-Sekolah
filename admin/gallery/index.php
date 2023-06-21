<?php
include_once("../koneksi.php");

?>
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Gallery</h3>

                        <div class="card-tools">
                            <!-- link yang akan menghubungkan dengan file create.php -->
                            <a href='gallery/create.php?page=gallery' class="btn btn-info"><i class="fas fa-plus"></i>Tambah Data</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <!-- membuat table -->
                        <table width='100%' id='tabel-simpel' class="table table-bordered">
                            <!--  table head -->
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Waktu</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <!--  table body -->
                            <tbody>
                                <?php
                                $no = 1;
                                $result = mysqli_query($mysqli, "SELECT tb_gallery.* FROM tb_gallery ORDER BY id_gallery DESC");
                                while ($data = mysqli_fetch_array($result)) {
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $data['waktu_gallery'] ?></td>
                                        <td><?= $data['gambar'] ?></td>
                                        <td>
                                            <!--membuat button edit dan delete-->
                                            <a class="btn btn-success" href='gallery/edit.php?id_gallery=<?= $data['id_gallery'] ?>&page=gallery'>Edit</a>
                                            <a class="btn btn-danger" onclick='return confirmDelete()' href='gallery/delete.php?id_gallery=<?= $data['id_gallery'] ?>&page=gallery'>Hapus</a>
                                        </td>
                                    </tr><?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div><!-- /.card -->
            </div>

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>