<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<style>
body{
    margin:0;
    font-family:'Segoe UI',sans-serif;
    background: linear-gradient(135deg,#ffe4ec,#fff0f5,#ffffff);
}

/* ===== SIDEBAR ===== */
.sidebar{
    width:260px;
    height:100vh;
    position:fixed;
    top:0;
    left:0;
    background: rgba(255,255,255,0.45);
    backdrop-filter: blur(18px);
    border-right:1px solid rgba(255,182,193,0.4);
    padding:20px;
    color:#d63384;
}

.sidebar a{
    display:block;
    color:#d63384;
    text-decoration:none;
    padding:10px;
    margin-top:6px;
    border-radius:12px;
    transition:0.3s;
}

.sidebar a:hover{
    background: rgba(255,182,193,0.25);
    transform: translateX(6px);
}

/* ===== CONTENT ===== */
.content{
    margin-left:280px;
    padding:20px;
}

/* ===== NAVBAR ===== */
.navbar{
    background: rgba(255,255,255,0.55);
    backdrop-filter: blur(12px);
    border-bottom:1px solid rgba(255,182,193,0.4);
    color:#6d214f;
}

/* ===== CARD ===== */
.card{
    background: rgba(255,255,255,0.6);
    backdrop-filter: blur(12px);
    border:1px solid rgba(255,182,193,0.4);
    border-radius:20px;
    box-shadow:0 10px 25px rgba(255,182,193,0.25);
}

/* ===== BUTTON ===== */
.btn-success{
    background: linear-gradient(135deg,#ffb6c1,#ffc0cb,#ffe4ec);
    border:none;
    color:#6d214f;
    font-weight:500;
}

.btn-success:hover{
    transform:scale(1.05);
    box-shadow:0 10px 25px rgba(255,182,193,0.4);
}

/* ===== TABLE ===== */
.table{
    color:#6d214f;
}

.table thead{
    background:#ffc0cb;
    color:#6d214f;
}

.table tbody tr:hover{
    background: rgba(255,182,193,0.15);
}

</style>

<?php
include "config.php";
$data = mysqli_query($conn,"SELECT * FROM barang");
?>

<!-- SIDEBAR -->
<div class="sidebar">
    <h4>DATA BARANG</h4>

    <a href="admin_dashboard.php"><i class="bi bi-house"></i> Dashboard</a>
    <a href="data_barang.php"><i class="bi bi-box"></i> Barang</a>
    <a href="tambah_barang.php"><i class="bi bi-plus-circle"></i> Tambah</a>
    <a href="data_peminjaman.php"><i class="bi bi-arrow-down-circle"></i> Peminjaman</a>
    <a href="logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a>
</div>

<!-- CONTENT -->
<div class="content">

<nav class="navbar p-3">
    <span class="fw-bold">Data Barang</span>
    <a href="admin_dashboard.php" class="btn btn-sm btn-light">Back</a>
</nav>

<div class="container mt-4">

<div class="card p-3">

<a href="tambah_barang.php" class="btn btn-success mb-3">+ Tambah</a>

<table class="table table-hover align-middle">
<tr>
    <th>Nama</th>
    <th>Jumlah</th>
    <th>Kondisi</th>
    <th>Aksi</th>
</tr>

<?php while($d=mysqli_fetch_array($data)){ ?>
<tr>
<td><?= $d['nama_barang'] ?></td>
<td><?= $d['jumlah'] ?></td>
<td><?= $d['kondisi_barang'] ?></td>

<td>
<a href="edit_barang.php?id=<?= $d['id_barang'] ?>" 
   class="btn btn-sm btn-light border shadow-sm text-dark">
   ✏ Edit
</a>
<a href="hapus_barang.php?id=<?= $d['id_barang'] ?>" 
   class="btn btn-sm text-white border"
   style="background: linear-gradient(135deg,#ff8fa3,#ffb3c6);">
   Hapus
</a>
</td>

</tr>
<?php } ?>

</table>

</div>

</div>

</div>