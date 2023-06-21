<?php
// include config connection file
include "../../koneksi.php";

// Get id from URL to delete that user
$id_users = $_GET['id_users'];
// Delete user row from table based on given id

$hasil = mysqli_query($mysqli, "DELETE FROM tb_users WHERE id_users = $id_users");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:../dashboard.php?page=users");
