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
                        <h3 class="card-title">Data Agenda</h3>

                        <div class="card-tools">
                            <!-- link yang akan menghubungkan dengan file create.php -->
                            <a href='agenda/create.php?page=agenda' class="btn btn-info"><i class="fas fa-plus"></i>Tambah Agenda</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <!-- membuat table -->
                        <table width='100%' id='tabel-simpel' class="table table-bordered">
                            <!--  table head -->
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Acara</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <!--  table body -->
                            <tbody>
                                <?php
                                $no = 1;
                                $result = mysqli_query($mysqli, "SELECT tb_agenda.* FROM tb_agenda ORDER BY id_agenda DESC");
                                while ($data = mysqli_fetch_array($result)) {
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $data['nama_acara'] ?></td>
                                        <td><?= $data['deskripsi'] ?></td>
                                        <td>
                                            <!--membuat button edit dan delete-->
                                            <a class="btn btn-success" href='agenda/edit.php?id_agenda=<?= $data['id_agenda'] ?>&page=agenda'>Edit</a>
                                            <a class="btn btn-danger" onclick='return confirmDelete()' href='agenda/delete.php?id_agenda=<?= $data['id_agenda'] ?>&page=agenda'>Hapus</a>
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