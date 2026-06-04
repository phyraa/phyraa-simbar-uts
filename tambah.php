<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

include "koneksi.php";

if(isset($_POST['simpan'])){

    $kode_barang = htmlspecialchars($_POST['kode_barang']);
    $nama_barang = htmlspecialchars($_POST['nama_barang']);
    $kategori = htmlspecialchars($_POST['kategori']);
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];

    mysqli_query($koneksi,"
    insert into barang
    (kode_barang,nama_barang,kategori,stok,harga)
    values
    ('$kode_barang','$nama_barang','$kategori','$stok','$harga')
    ");

    header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Tambah Barang</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

<h3>Tambah Barang</h3>

<form method="POST">

<div class="mb-3">
<label>Kode Barang</label>
<input type="text" name="kode_barang" class="form-control" required>
</div>

<div class="mb-3">
<label>Nama Barang</label>
<input type="text" name="nama_barang" class="form-control" required>
</div>

<div class="mb-3">
<label>Kategori</label>

<select name="kategori" class="form-select">

<option>Elektronik</option>
<option>Pakaian</option>
<option>Makanan</option>

</select>
</div>

<div class="mb-3">
<label>Stok</label>
<input type="number" name="stok" class="form-control" required>
</div>

<div class="mb-3">
<label>Harga</label>
<input type="number" name="harga" class="form-control" required>
</div>

<button class="btn btn-success" name="simpan">
Simpan
</button>

<a href="dashboard.php" class="btn btn-secondary">
Kembali
</a>

</form>

</div>

</body>
</html>