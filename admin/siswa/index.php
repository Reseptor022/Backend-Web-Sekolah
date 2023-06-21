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
                        <h3 class="card-title">Data Siswa</h3>

                        <div class="card-tools">
                            <!-- This will cause the card to maximize when clicked -->
                            <a href='siswa/create.php?page=siswa' class="btn btn-info"><i class="fas fa-plus"></i>Tambah Siswa</a>
                        </div>
                        <!-- /.card-tools -->
                    </div>

                    <div class="card-body">

                        <table width='100%' id='tabel-simpel' class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NISN</th>
                                    <th>Nama Siswa</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Tempat Lahir</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $result = mysqli_query($mysqli, "SELECT * FROM tb_siswa ORDER BY id_siswa DESC");

                                while ($data = mysqli_fetch_array($result)) {
                                ?>

                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $data['nisn_siswa'] ?></td>
                                        <td><?= $data['nama_siswa'] ?></td>
                                        <td><?= $data['jenis_kelamin'] ?></td>
                                        <td><?= $data['alamat'] ?></td>
                                        <td><?= $data['tanggal_lahir'] ?></td>
                                        <td><?= $data['tempat_lahir'] ?></td>
                                        <td>
                                            <a class="btn btn-success" href='siswa/edit.php?id_siswa=<?= $data['id_siswa'] ?>&page=siswa'>Edit</a>
                                            <a class="btn btn-danger" onclick='return confirmDelete()' href='siswa/delete.php?id_siswa=<?= $data['id_siswa'] ?>&page=siswa'>Hapus</a>
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