<?php
// include config connection file
include "../../koneksi.php";

// Get id from URL to delete that user
$id_about = $_GET['id_about'];
// Delete user row from table based on given id

$hasil = mysqli_query($mysqli, "DELETE FROM tb_about WHERE id_about = $id_about");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:../dashboard.php?page=about");
