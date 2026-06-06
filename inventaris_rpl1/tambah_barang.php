<?php include "config.php"; ?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<style>
body{
    margin:0;
    font-family:'Segoe UI';
    background: linear-gradient(135deg,#ffe4ec,#fff0f5,#ffffff);
}

/* SIDEBAR (biar konsisten kalau file ini dipanggil langsung) */
.sidebar{
    width:260px;
    height:100vh;
    position:fixed;
    background: linear-gradient(180deg,#ff4fd8,#ff8de1,#ffd1f0);
    color:white;
    padding:20px;
    box-shadow:0 0 25px rgba(255,77,216,0.4);
}

.sidebar a{
    display:block;
    color:white;
    text-decoration:none;
    padding:10px;
    margin-top:6px;
    border-radius:12px;
    transition:0.3s;
}

.sidebar a:hover{
    background:rgba(255,255,255,0.3);
    transform:translateX(6px);
}

/* CENTER AREA */
.center-wrap{
    margin-left:80px;
    min-height:90vh;
    display:flex;
    justify-content:center;
    align-items:center;
    padding:30px;
}

/* CARD STYLE */
.card-glow{
    width:100%;
    max-width:500px;
    background: rgba(255,255,255,0.6);
    backdrop-filter: blur(12px);
    border:1px solid rgba(255,182,193,0.4);
    border-radius:20px;
    box-shadow:0 10px 25px rgba(255,182,193,0.25);
    padding:25px;
}

/* HEADER */
h3{
    color:#6d214f;
    font-weight:700;
    text-align:center;
    margin-bottom:20px;
}

/* INPUT */
.form-control, select{
    border-radius:12px;
    border:1px solid rgba(255,182,193,0.4);
    padding:10px;
}

/* BUTTON */
.btn-glow{
    background: linear-gradient(135deg,#ffb6c1,#ffc0cb,#ffe4ec);
    border:none;
    color:#6d214f;
    padding:10px;
    border-radius:12px;
    font-weight:600;
    width:100%;
    transition:0.3s;
    text-decoration:none;
    display:block;
    text-align:center;
}

.btn-glow:hover{
    transform:scale(1.03);
    box-shadow:0 10px 25px rgba(255,182,193,0.4);
}

/* RESPONSIVE */
@media (max-width:768px){
    .center-wrap{
        margin-left:0;
    }
}
</style>

<div class="center-wrap">

<div class="card-glow">

<h3>Tambah Barang</h3>

<form method="POST">
    <input name="nama" class="form-control mb-2" placeholder="Nama Barang">
    <input name="jumlah" class="form-control mb-2" placeholder="Jumlah">

    <select name="kondisi" class="form-control mb-3">
        <option>Baik</option>
        <option>Rusak</option>
    </select>

    <button class="btn-glow">Simpan</button>
</form>

<?php
if($_POST){
    mysqli_query($conn,"INSERT INTO barang VALUES(NULL,'$_POST[nama]','$_POST[jumlah]','$_POST[kondisi]')");
    echo "<div class='alert alert-success mt-3 text-center'>✨ Berhasil ditambahkan</div>";
}
?>

<!-- BUTTON KEMBALI -->
<a href="admin_dashboard.php" class="btn btn-sm btn-light">Back</a>

</div>

</div>