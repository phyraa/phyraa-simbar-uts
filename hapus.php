<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

include "koneksi.php";

$id = $_GET['id'];

mysqli_query($koneksi,"
delete from barang
where id='$id'
");

header("Location: dashboard.php");
exit;
?>