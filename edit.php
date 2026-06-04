<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

include "koneksi.php";

$id = $_GET['id'];

$data = mysqli_query($koneksi,"
select * from barang where id='$id'
");

$row = mysqli_fetch_assoc($data);

if(isset($_POST['update'])){

    $kode_barang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $kategori = $_POST['kategori'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];

    mysqli_query($koneksi,"
    update barang
    set
    kode_barang='$kode_barang',
    nama_barang='$nama_barang',
    kategori='$kategori',
    stok='$stok',
    harga='$harga'
    where id='$id'
    ");

    header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Barang</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

<h3>Edit Barang</h3>

<form method="POST">

<div class="mb-3">
<label>Kode Barang</label>
<input type="text"
name="kode_barang"
class="form-control"
value="<?php echo $row['kode_barang']; ?>">
</div>

<div class="mb-3">
<label>Nama Barang</label>
<input type="text"
name="nama_barang"
class="form-control"
value="<?php echo $row['nama_barang']; ?>">
</div>

<div class="mb-3">
<label>Kategori</label>
<input type="text"
name="kategori"
class="form-control"
value="<?php echo $row['kategori']; ?>">
</div>

<div class="mb-3">
<label>Stok</label>
<input type="number"
name="stok"
class="form-control"
value="<?php echo $row['stok']; ?>">
</div>

<div class="mb-3">
<label>Harga</label>
<input type="number"
name="harga"
class="form-control"
value="<?php echo $row['harga']; ?>">
</div>

<button class="btn btn-warning" name="update">
Update
</button>

<a href="dashboard.php" class="btn btn-secondary">
Kembali
</a>

</form>

</div>

</body>
</html>