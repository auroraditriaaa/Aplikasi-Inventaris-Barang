<?php
include "config.php";

$id_user = $_GET['id_user'];

/* ambil SEMUA peminjaman user */
$cek = mysqli_query($conn, "
    SELECT * FROM peminjaman 
    WHERE id_user='$id_user'
");

if (!$cek) {
    die("Query error: " . mysqli_error($conn));
}

if (mysqli_num_rows($cek) == 0) {
    die("❌ Tidak ada data peminjaman untuk user ini");
}

while($data = mysqli_fetch_assoc($cek)){

    $id_barang = $data['id_barang'];
    $jumlah = $data['jumlah_pinjam'];

    /* update stok */
    mysqli_query($conn,"
        UPDATE barang 
        SET jumlah = jumlah + $jumlah 
        WHERE id_barang='$id_barang'
    ");

    /* update status kalau ada kolom status */
    mysqli_query($conn,"
        UPDATE peminjaman 
        SET status='kembali',
            tanggal_kembali=CURDATE()
        WHERE id_user='$id_user'
        AND id_barang='$id_barang'
    ");
}
?>

<!-- =================== DESAIN =================== -->
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
    background: radial-gradient(circle at top,#ffe4f3,#ffffff);
}

.card-glow{
    width:380px;
    padding:30px;
    border-radius:20px;
    background: rgba(255,255,255,0.7);
    backdrop-filter: blur(12px);
    border:1px solid rgba(255,182,193,0.4);
    text-align:center;
    box-shadow:0 10px 30px rgba(255,182,193,0.25);
    animation:fadeIn 0.6s ease-in-out;
}

@keyframes fadeIn{
    from{opacity:0; transform:translateY(20px);}
    to{opacity:1; transform:translateY(0);}
}

.icon{
    font-size:55px;
    margin-bottom:10px;
    animation:bounce 1.5s infinite;
}

@keyframes bounce{
    0%,100%{transform:translateY(0);}
    50%{transform:translateY(-8px);}
}

h4{
    color:#6d214f;
    font-weight:700;
}

p{
    color:#6d214f;
    opacity:0.8;
}

.btn-glow{
    background: linear-gradient(135deg,#ff4d6d,#ff85a2);
    border:none;
    color:white;
    padding:10px;
    border-radius:12px;
    width:100%;
    font-weight:600;
    transition:0.3s;
}

.btn-glow:hover{
    transform:scale(1.05);
    box-shadow:0 10px 20px rgba(255,77,109,0.3);
}
</style>
</head>

<body>

<div class="card-glow">

    <div class="icon">📦</div>

    <h4>Pengembalian Berhasil</h4>
    <p>Barang sudah dikembalikan ke inventaris</p>

    <a href="data_barang.php" class="btn btn-glow mt-2">
        Kembali ke Data Barang
    </a>

</div>

</body>
</html>