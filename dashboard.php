<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

include "koneksi.php";

$data = mysqli_query($koneksi,"select * from barang");
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard SIMBAR</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

:root{
    --ungu:#cdb4db;
    --pink:#ffc8dd;
    --magenta:#ffafcc;
    --biru:#bde0fe;
    --putih:#ffffff;
}

body{
    background: linear-gradient(
        135deg,
        var(--pink),
        var(--ungu),
        var(--magenta)
    );
    min-height:100vh;
}

.card{
    border:none;
    border-radius:20px;
    backdrop-filter:blur(10px);
    box-shadow:0 8px 25px rgba(0,0,0,0.1);
}

.form-control,
.form-select{
    border-radius:12px;
    border:1px solid #ddd;
}

.form-control:focus,
.form-select:focus{
    border-color:var(--ungu);
    box-shadow:0 0 10px rgba(205,180,219,.5);
}

.btn-primary{
    background:#cdb4db;
    border:none;
}

.btn-primary:hover{
    background:#b79ac9;
}

.btn-success{
    background:#ffafcc;
    border:none;
    color:#333;
}

.btn-success:hover{
    background:#ff9cc0;
}

.btn-warning{
    background:#ffd6a5;
    border:none;
}

.btn-danger{
    background:#f08080;
    border:none;
}

.table{
    background:white;
    border-radius:15px;
    overflow:hidden;
}

.table thead{
    background:#cdb4db;
    color:white;
}

.container-box{
    background:white;
    border-radius:20px;
    padding:25px;
    box-shadow:0 8px 25px rgba(0,0,0,0.1);
}

.nav-title{
    color:#7b2cbf;
    font-weight:bold;
}

.table{
    background:white;
    border:3px solid #b48ad4;
    overflow:hidden;
    border-radius:15px;
}

.table th{
    background:#cdb4db;
    color:#4a2c63;
    font-weight:600;
    border:2px solid #b48ad4;
}

.table td{
    border:2px solid #d7bde8;
}

.table tbody tr:hover{
    background:#f8f0fc;
}
</style>

</head>
<body>

<div class="container mt-4">

<div class="d-flex justify-content-between">

<h3>
Dashboard SIMBAR
</h3>

<div>
Login sebagai :
<b><?php echo $_SESSION['username']; ?></b>

<a href="logout.php" class="btn btn-danger btn-sm">
Logout
</a>
</div>

</div>

<hr>

<a href="tambah.php" class="btn btn-primary mb-3">
Tambah Barang
</a>

<table class="table table-striped table-hover table-bordered">

<tr>
<th>No</th>
<th>Kode</th>
<th>Nama Barang</th>
<th>Kategori</th>
<th>Stok</th>
<th>Harga</th>
<th>Aksi</th>
</tr>

<?php
$no = 1;

while($row = mysqli_fetch_assoc($data)){
?>

<tr>
<td><?php echo $no++; ?></td>
<td><?php echo $row['kode_barang']; ?></td>
<td><?php echo $row['nama_barang']; ?></td>
<td><?php echo $row['kategori']; ?></td>
<td><?php echo $row['stok']; ?></td>
<td>Rp <?php echo number_format($row['harga']); ?></td>
<td>

<a href="edit.php?id=<?php echo $row['id']; ?>"
class="btn btn-warning btn-sm">
Edit
</a>

<a href="hapus.php?id=<?php echo $row['id']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">
Hapus
</a>

</td>
</tr>

<?php } ?>

</table>

</div>

</body>
</html>