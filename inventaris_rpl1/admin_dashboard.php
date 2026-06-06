<?php include "config.php"; ?>

<!DOCTYPE html>
<html>
<head>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<style>
body{
    margin:0;
    font-family:'Segoe UI',sans-serif;
    background: linear-gradient(135deg,#ffe4ec,#fff0f5,#ffffff);
    min-height:100vh;
    display:flex;
}

/* SIDEBAR */
.sidebar{
    width:260px;
    background: rgba(255,255,255,0.45);
    backdrop-filter: blur(18px);
    border-right:1px solid rgba(255,182,193,0.4);
    padding:20px;
    color:#d63384;
}

.sidebar h4{
    font-weight:700;
    margin-bottom:20px;
    color:#d63384;
}

.sidebar a{
    display:block;
    color:#d63384;
    text-decoration:none;
    padding:10px;
    margin-bottom:8px;
    border-radius:12px;
    transition:0.3s;
    font-weight:500;
}

.sidebar a:hover{
    background: rgba(255,182,193,0.25);
    transform: translateX(5px);
}

/* CONTENT */
.content{
    flex:1;
    padding:25px;
}

/* HEADER */
.header-glow{
    background: rgba(255,255,255,0.55);
    backdrop-filter: blur(14px);
    border:1px solid rgba(255,182,193,0.4);
    padding:20px;
    border-radius:20px;
    color:#6d214f;
    box-shadow:0 10px 25px rgba(255,182,193,0.2);
}

/* CARD */
.card-glow{
    background: rgba(255,255,255,0.6);
    backdrop-filter: blur(14px);
    border:1px solid rgba(255,182,193,0.4);
    border-radius:20px;
    color:#6d214f;
    text-align:center;
    box-shadow:0 10px 25px rgba(255,182,193,0.25);
    transition:0.3s;
}

.card-glow:hover{
    transform: translateY(-5px);
    box-shadow:0 15px 35px rgba(255,182,193,0.35);
}

/* BUTTON */
.btn-glow{
    background: linear-gradient(135deg,#ffb6c1,#ffc0cb,#ffe4ec);
    border:none;
    color:#6d214f;
    border-radius:12px;
    padding:10px 15px;
    margin-right:10px;
    font-weight:500;
    transition:0.3s;
}

.btn-glow:hover{
    transform: scale(1.05);
    box-shadow:0 10px 25px rgba(255,182,193,0.4);
}

</style>

</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h4>ADMIN DASHBOARD</h4>

    <a href="admin_dashboard.php"><i class="bi bi-house"></i> Dashboard</a>
    <a href="data_barang.php"><i class="bi bi-box"></i> Barang</a>
    <a href="tambah_barang.php"><i class="bi bi-plus-circle"></i> Tambah</a>
    <a href="data_peminjaman.php"><i class="bi bi-arrow-down-circle"></i> Laporan Peminjaman</a>
    <a href="pengembalian.php"><i class="bi bi-box-seam"></i> Pengembalian Barang</a>
    <a href="logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a>
</div>

<!-- CONTENT -->
<div class="content">

<br>

<?php
$barang = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) AS total FROM barang"))['total'];
$peminjaman = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) AS total FROM peminjaman"))['total'];
$user = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) AS total FROM user"))['total'];
?>

<div class="row g-3">

<div class="col-md-4">
<div class="card-glow p-3">
<h6>📦 Barang</h6>
<h3><?= $barang ?></h3>
</div>
</div>

<div class="col-md-4">
<div class="card-glow p-3">
<h6>📥 Peminjaman</h6>
<h3><?= $peminjaman ?></h3>
</div>
</div>

<div class="col-md-4">
<div class="card-glow p-3">
<h6>👤 User</h6>
<h3><?= $user ?></h3>
</div>
</div>

</div>

<br>

<div class="card-glow p-4">
<h5>QUICK ACTION</h5>
<br>

<a href="data_barang.php" class="btn btn-glow">Kelola Barang</a>
<a href="tambah_barang.php" class="btn btn-glow">Tambah Barang</a>

</div>

</div>

</body>
</html>