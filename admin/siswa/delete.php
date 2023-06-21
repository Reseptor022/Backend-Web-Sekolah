<?php
// include config connection file
include_once("../../koneksi.php");
include('session.php');

// Get id from URL to delete that user
$id_siswa = @$_GET['id_siswa'];
$sql = "SELECT foto FROM tb_siswa WHERE id_siswa='$id_siswa'";
$result = mysqli_query($mysqli, $sql);
if ($result->num_rows ==  0) {
    $row = mysqli_fetch_assoc($result);
    if (file_exists('image/' . $filename)) {
        unlink('image/' . $filename);
        echo 'File ' . $row['foto'] . ' has been deleted';
    } else {
        echo 'Could not delete ' . $row['foto'] . ', file does not exist';
    }
}
// Delete user row from table based on given id

$result = mysqli_query($mysqli, "DELETE FROM tb_siswa WHERE id_siswa=$id_siswa");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:../dashboard.php?page=siswa");
