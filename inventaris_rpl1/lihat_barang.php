<?php
include "config.php";

// FUNCTION PHP (TETAP SAMA - TIDAK DIUBAH)
function status_barang($jumlah) {
    if ($jumlah <= 0) {
        return "Habis";
    } else {
        return "Tersedia";
    }
}

// AMBIL DATA BARANG
$data = mysqli_query($conn, "SELECT * FROM barang");
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    margin:0;
    font-family:'Segoe UI';
    background: linear-gradient(135deg,#ffe4ec,#fff0f5,#ffffff);
}

/* ===== CONTENT ===== */
.content{
    padding:25px;
}

/* TITLE */
h2{
    color:#6d214f;
    font-weight:700;
}

/* ===== CARD ===== */
.card-glass{
    background: rgba(255,255,255,0.6);
    backdrop-filter: blur(12px);
    border:1px solid rgba(255,182,193,0.4);
    border-radius:20px;
    padding:20px;
    box-shadow:0 10px 25px rgba(255,182,193,0.25);
}

/* ===== TABLE ===== */
.table{
    color:#6d214f;
    border-radius:12px;
    overflow:hidden;
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
    transform: scale(1.01);
}

/* STATUS LABEL */
.badge-status{
    padding:6px 10px;
    border-radius:12px;
    font-size:12px;
    font-weight:600;
}

.tersedia{
    background:#c8f7c5;
    color:#1e7e34;
}

.habis{
    background:#ffd6d6;
    color:#c0392b;
}
</style>

<div class="content">

<h2>📦 Daftar Barang</h2>

<div class="card-glass">

<table class="table table-hover align-middle">
<tr>
    <th>Nama</th>
    <th>Jumlah</th>
    <th>Kondisi</th>
    <th>Status</th>
</tr>
<a href="admin_dashboard.php" class="btn btn-sm btn-light">Back</a>

<?php while($d = mysqli_fetch_array($data)) { ?>
<tr>
    <td><?= $d['nama_barang'] ?></td>
    <td><?= $d['jumlah'] ?></td>
    <td><?= $d['kondisi_barang'] ?></td>

    <td>
        <?php if(status_barang($d['jumlah']) == "Tersedia") { ?>
            <span class="badge-status tersedia">Tersedia</span>
        <?php } else { ?>
            <span class="badge-status habis">Habis</span>
        <?php } ?>
    </td>
</tr>
<?php } ?>

</table>

</div>

</div>