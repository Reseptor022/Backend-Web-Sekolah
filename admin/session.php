<?php
include_once("../koneksi.php");

$user_check = $_SESSION['username'];
if (!isset($user_check)) {
  header("Location: ../admin/signout.php");
}
$sql = "SELECT username FROM tb_users WHERE username='$user_check'";
$result = mysqli_query($mysqli, $sql);
if ($result->num_rows > 0) {
  $row = mysqli_fetch_assoc($result);
  $login_session = $row['username'];
  if (!isset($login_session)) {
    header("Location: ../admin/signout.php");
  }
}
