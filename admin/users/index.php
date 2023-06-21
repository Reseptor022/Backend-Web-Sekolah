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
                        <h3 class="card-title">Data users</h3>

                        <div class="card-tools">
                            <!-- This will cause the card to maximize when clicked -->
                            <a href='users/create.php?page=users' class="btn btn-info"><i class="fas fa-plus"></i>Tambah users</a>
                        </div>
                        <!-- /.card-tools -->
                    </div>

                    <div class="card-body">

                        <table width='100%' id='tabel-simpel' class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $result = mysqli_query($mysqli, "SELECT * FROM tb_users ORDER BY id_users DESC");
                                while ($data = mysqli_fetch_array($result)) {
                                ?>

                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $data['nama'] ?></td>
                                        <td><?= $data['username'] ?></td>
                                        <td>
                                            <a class="btn btn-success" href='users/edit.php?id_users=<?= $data['id_users'] ?>&page=users'>Edit</a>
                                            <a class="btn btn-danger" onclick='return confirmDelete()' href='users/delete.php?id_users=<?= $data['id_users'] ?>&page=users'>Hapus</a>
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