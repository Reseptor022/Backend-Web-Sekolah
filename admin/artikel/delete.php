<?php
// include config connection file
include_once("../../koneksi.php");
include('session.php');

// Get id from URL to delete that user
$id_artikel = @$_GET['id_artikel'];
$sql = "SELECT cover FROM tb_artikel WHERE id_artikel='$id_artikel'";
$result = mysqli_query($mysqli, $sql);
if ($result->num_rows ==  0) {
    $row = mysqli_fetch_assoc($result);
    if (file_exists('uploads/' . $filename)) {
        unlink('uploads/' . $filename);
        echo 'File ' . $row['cover'] . ' has been deleted';
    } else {
        echo 'Could not delete ' . $row['cover'] . ', file does not exist';
    }
}
// Delete user row from table based on given id

$result = mysqli_query($mysqli, "DELETE FROM tb_artikel WHERE id_artikel=$id_artikel");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:../dashboard.php?page=artikel");
