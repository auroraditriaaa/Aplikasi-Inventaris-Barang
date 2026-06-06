<?php
include "config.php";

$query = mysqli_query($conn, "
    SELECT 
        p.id_user,
        u.username,
        b.nama_barang,
        p.jumlah_pinjam,
        p.tanggal_pinjam
    FROM peminjaman p
    LEFT JOIN user u ON p.id_user = u.id_user
    LEFT JOIN barang b ON p.id_barang = b.id_barang
");

if (!$query) {
    die("Query Error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background: linear-gradient(135deg,#ffe4ec,#fff0f5,#ffffff);
    font-family:'Segoe UI';
}

.header{
    text-align:center;
    padding:20px;
    border-radius:20px;
    background: linear-gradient(90deg,#ff4d6d,#ff85a2);
    color:white;
    margin-bottom:20px;
}

.card-glow{
    background: rgba(255,255,255,0.7);
    border-radius:20px;
    padding:20px;
    border:1px solid rgba(255,182,193,0.4);
}

.table thead{
    background: linear-gradient(90deg,#ff4d6d,#ff85a2);
    color:white;
}
</style>
</head>

<body>

<div class="container mt-4">

    <div class="header">
        <h3>📦 Data Pengembalian</h3>
        <p>Daftar barang yang dipinjam</p>
    </div>

    <div class="card-glow">

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Barang</th>
                    <th>Jumlah</th>
                    <th>Tanggal Pinjam</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
            <?php while($d = mysqli_fetch_array($query)) { ?>
                <tr>
                    <td><?= $d['username'] ?></td>
                    <td><?= $d['nama_barang'] ?></td>
                    <td><?= $d['jumlah_pinjam'] ?></td>
                    <td><?= $d['tanggal_pinjam'] ?></td>

                    <td>
                        <a href="proses_kembali.php?id_user=<?= $d['id_user'] ?>"
                           class="btn btn-success btn-sm">
                           ✔ Kembalikan
                        </a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>

        </table>

    </div>
</div>

</body>
</html>