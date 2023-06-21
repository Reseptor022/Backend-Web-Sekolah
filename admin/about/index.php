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
                        <h3 class="card-title">Data About</h3>

                        <div class="card-tools">
                            <!-- This will cause the card to maximize when clicked -->
                            <a href='about/create.php?page=about' class="btn btn-info"><i class="fas fa-plus"></i>Tambah Data</a>
                        </div>
                        <!-- /.card-tools -->
                    </div>

                    <div class="card-body">

                        <table width='100%' id='tabel-simpel' class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $result = mysqli_query($mysqli, "SELECT * FROM tb_about ORDER BY id_about DESC");
                                while ($data = mysqli_fetch_array($result)) {
                                ?>

                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $data['judul'] ?></td>
                                        <td>
                                            <a class="btn btn-success" href='about/edit.php?id_about=<?= $data['id_about'] ?>&page=about'>Edit</a>
                                            <a class="btn btn-danger" onclick='return confirmDelete()' href='about/delete.php?id_about=<?= $data['id_about'] ?>&page=about'>Hapus</a>
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