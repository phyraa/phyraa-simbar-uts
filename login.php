<?php
session_start();
include "koneksi.php";

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($koneksi,"select * from users
    where username='$username'
    and password='$password'");

    if(mysqli_num_rows($query) > 0){

        $data = mysqli_fetch_assoc($query);

        $_SESSION['login'] = true;
        $_SESSION['username'] = $data['username'];

        header("Location: dashboard.php");
        exit;

    }else{
        $error = "Username atau Password salah";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login SIMBAR</title>

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

</style>
</head>
<body class="bg-light">

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-md-4">

<div class="card shadow">

<div class="card-header text-center">
<h4>LOGIN SIMBAR</h4>
</div>

<div class="card-body">

<?php
if(isset($error)){
    echo "<div class='alert alert-danger'>$error</div>";
}
?>

<form method="POST">

<div class="mb-3">
<label>Username</label>
<input type="text" name="username" class="form-control" required>
</div>

<div class="mb-3">
<label>Password</label>
<input type="password" name="password" class="form-control" required>
</div>

<button type="submit" name="login" class="btn btn-primary w-100">
Login
</button>

</form>

</div>
</div>

</div>
</div>

</div>

</body>
</html>