<?php
include "config.php";

if(!isset($_GET['id'])){
    die("ID tidak ditemukan");
}

$id = $_GET['id'];
$data = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM barang WHERE id_barang=$id"));
?>

<!DOCTYPE html>
<html>
<head>

<title>Edit Barang</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    margin:0;
    font-family:'Segoe UI',sans-serif;
    background: linear-gradient(135deg,#ffe4ec,#fff0f5,#ffffff);
    display:flex;
    justify-content:center;
    align-items:center;
    min-height:100vh;
}

/* ===== GLASS CARD ===== */
.card-glass{
    width:420px;
    background: rgba(255,255,255,0.6);
    backdrop-filter: blur(15px);
    border:1px solid rgba(255,182,193,0.4);
    border-radius:20px;
    padding:25px;
    box-shadow:0 10px 25px rgba(255,182,193,0.25);
}

/* TITLE */
h3{
    color:#6d214f;
    font-weight:700;
}

/* INPUT */
.form-control{
    border-radius:12px;
    border:1px solid rgba(255,182,193,0.4);
}

/* BUTTON PRIMARY */
.btn-primary{
    background: linear-gradient(135deg,#ffb6c1,#ffc0cb,#ffe4ec);
    border:none;
    color:#6d214f;
    font-weight:600;
    border-radius:12px;
}

.btn-primary:hover{
    transform:scale(1.03);
    box-shadow:0 10px 25px rgba(255,182,193,0.4);
}

/* SECOND BUTTON */
.btn-secondary{
    border-radius:12px;
}
</style>

</head>

<body>

<div class="card-glass">

    <h3>✏ Edit Barang</h3>

    <form method="POST">

        <input type="text" name="nama" value="<?= $data['nama_barang'] ?>" class="form-control mb-2">
        <input type="number" name="jumlah" value="<?= $data['jumlah'] ?>" class="form-control mb-2">
        <input type="text" name="kondisi" value="<?= $data['kondisi_barang'] ?>" class="form-control mb-3">

        <button class="btn btn-primary">Update</button>
        <a href="data_barang.php" class="btn btn-secondary">Kembali</a>

    </form>

</div>

<?php
if($_POST){
    mysqli_query($conn,
    "UPDATE barang SET
    nama_barang='$_POST[nama]',
    jumlah='$_POST[jumlah]',
    kondisi_barang='$_POST[kondisi]'
    WHERE id_barang=$id");

    echo "<div class='alert alert-success mt-3 text-center'>Berhasil diupdate</div>";
    
}

?>

</body>
</html>