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
                        <h3 class="card-title">Data artikel</h3>

                        <div class="card-tools">
                            <!-- This will cause the card to maximize when clicked -->
                            <a href='artikel/create.php?page=artikel' class="btn btn-info"><i class="fas fa-plus"></i>Tambah artikel</a>
                        </div>
                        <!-- /.card-tools -->
                    </div>

                    <div class="card-body">

                        <table width='100%' id='tabel-simpel' class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul Artikel</th>
                                    <th>Penulis</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $result = mysqli_query($mysqli, "SELECT tb_artikel.*,
                            tb_users.nama
                            FROM tb_artikel
                            INNER JOIN tb_users ON tb_artikel.id_users = tb_users.id_users
                            ORDER BY id_artikel DESC");

                                while ($data = mysqli_fetch_array($result)) {
                                ?>

                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $data['judul_artikel'] ?></td>
                                        <td><?= $data['nama'] ?></td>
                                        <td>
                                            <a class="btn btn-success" href='artikel/edit.php?id_artikel=<?= $data['id_artikel'] ?>&page=artikel'>Edit</a>
                                            <a class="btn btn-danger" onclick='return confirmDelete()' href='artikel/delete.php?id_artikel=<?= $data['id_artikel'] ?>&page=artikel'>Hapus</a>
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