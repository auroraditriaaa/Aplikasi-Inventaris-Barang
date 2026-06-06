<?php
include "config.php";

include "config.php";

$data = mysqli_query($conn,"
    SELECT peminjaman.*, 
           barang.nama_barang,
           user.nama
    FROM peminjaman
    INNER JOIN barang ON peminjaman.id_barang = barang.id_barang
    INNER JOIN user ON peminjaman.id_user = user.id_user
");
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<style>
body{
    margin:0;
    font-family:'Segoe UI',sans-serif;
    background: linear-gradient(135deg,#ffe4ec,#fff0f5,#ffffff);
}

/* ===== CONTENT WRAP ===== */
.content{
    padding:25px;
}

/* ===== TITLE ===== */
h2{
    color:#6d214f;
    font-weight:700;
    margin-bottom:20px;
}

/* ===== CARD STYLE ===== */
.card-glow{
    background: rgba(255,255,255,0.6);
    backdrop-filter: blur(12px);
    border:1px solid rgba(255,182,193,0.4);
    border-radius:20px;
    box-shadow:0 10px 25px rgba(255,182,193,0.25);
    padding:20px;
}

/* ===== TABLE STYLE ===== */
.table{
    color:#6d214f;
}

.table thead{
    background:#ffc0cb;
    color:#6d214f;
}

.table tbody tr{
    background: rgba(255,255,255,0.4);
    transition:0.3s;
}

.table tbody tr:hover{
    background: rgba(255,182,193,0.2);
    transform:scale(1.01);
}
</style>

<div class="content">

<h2>📥 Data Peminjaman</h2>

<div class="card-glow">

<table class="table table-hover align-middle">
<tr>
    <th>Nama Peminjam</th>
    <th>Nama Barang</th>
    <th>Jumlah</th>
    <th>Tanggal</th>
</tr>

<?php while($d = mysqli_fetch_array($data)) { ?>
<tr>
    <td><?= $d['nama'] ?></td>
    <td><?= $d['nama_barang'] ?></td>
    <td><?= $d['jumlah_pinjam'] ?></td>
    <td><?= $d['tanggal_pinjam'] ?></td>
    
</tr>
<?php } ?>

</table>

</div>

</div>