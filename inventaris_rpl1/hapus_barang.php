<?php
include "config.php";

$id = $_GET['id'];

if(isset($_GET['hapus'])){
    mysqli_query($conn,"DELETE FROM barang WHERE id_barang='$id'");

    echo "<script>
            alert('Barang berhasil dihapus');
            window.location='data_barang.php';
          </script>";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    margin:0;
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    font-family:'Segoe UI';
    background: linear-gradient(135deg,#ffe4ec,#fff0f5,#ffffff);
}

.card{
    width:360px;
    padding:25px;
    border-radius:20px;
    background: rgba(255,255,255,0.6);
    backdrop-filter: blur(12px);
    border:1px solid rgba(255,182,193,0.4);
    text-align:center;
}

.btn-danger{
    background: linear-gradient(135deg,#ff6b81,#ff9aa2);
    border:none;
}
</style>
</head>

<body>

<div class="card">

    <h4>⚠ Hapus Barang?</h4>

    <a href="?id=<?= $id ?>&hapus=1" class="btn btn-danger w-100 mb-2">Ya, Hapus</a>
    <a href="data_barang.php" class="btn btn-light w-100">Batal</a>

    <a href="data_barang.php" class="btn btn-light w-100">⬅ Kembali ke Data Barang</a>
</a>
</div>

</body>
</html>