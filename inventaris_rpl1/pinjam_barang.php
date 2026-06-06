<?php include "config.php"; ?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<style>
body{
    margin:0;
    font-family:'Segoe UI';
    background: linear-gradient(135deg,#ffe4ec,#fff0f5,#ffffff);
}

/* WRAPPER */
.wrapper{
    width:100%;
    max-width:1100px;
    margin:auto;
}

/* HEADER */
.header-glow{
    background: rgba(255,255,255,0.6);
    backdrop-filter: blur(12px);
    border:1px solid rgba(255,182,193,0.4);
    padding:20px;
    border-radius:20px;
    text-align:center;
    color:#6d214f;
    box-shadow:0 10px 25px rgba(255,182,193,0.2);
}

/* CARD */
.card-glow{
    background: rgba(255,255,255,0.6);
    backdrop-filter: blur(12px);
    border:1px solid rgba(255,182,193,0.4);
    border-radius:20px;
    box-shadow:0 10px 25px rgba(255,182,193,0.25);
}

/* INPUT */
.form-control, .form-select{
    border-radius:12px;
    border:1px solid rgba(255,182,193,0.4);
}

/* BUTTON */
.btn-glow{
    background: linear-gradient(135deg,#ffb6c1,#ffc0cb,#ffe4ec);
    border:none;
    color:#6d214f;
    padding:10px 14px;
    border-radius:12px;
    font-weight:600;
    transition:0.3s;
}

.btn-glow:hover{
    transform:scale(1.03);
    box-shadow:0 10px 25px rgba(255,182,193,0.4);
}

/* ITEM LIST */
.item-box{
    background: rgba(255,255,255,0.7);
    border:1px solid rgba(255,182,193,0.3);
    padding:12px;
    border-radius:15px;
    margin-bottom:10px;
    transition:0.3s;
}

.item-box:hover{
    transform:scale(1.02);
}

/* CENTER */
.center-wrap{
    width:100%;
    display:flex;
    justify-content:center;
    align-items:center;
    padding:30px;
}

@media (max-width:768px){
    .center-wrap{
        padding:15px;
    }
}
</style>

<div class="center-wrap">
<div class="wrapper">

    <!-- HEADER -->
    <div class="header-glow mb-4">
        <h3>📥 Pinjam Barang</h3>
        <p>Pilih barang dan isi data peminjaman</p>
    </div>

    <div class="row g-4">

        <!-- FORM -->
        <div class="col-md-6">
            <div class="card-glow p-4">

                <form method="POST">

                    <div class="mb-3">
                        <label>ID User</label>
                        <input name="id_user" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Barang Tersedia</label>
                        <select name="id_barang" class="form-select" required>
                            <option value="">-- Pilih Barang --</option>
                            <?php
                            $barang = mysqli_query($conn, "SELECT * FROM barang WHERE jumlah > 0");
                            while($b = mysqli_fetch_array($barang)){
                            ?>
                            <option value="<?= $b['id_barang'] ?>">
                                <?= $b['nama_barang'] ?> (Stok: <?= $b['jumlah'] ?>)
                            </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Jumlah Pinjam</label>
                        <input type="number" name="jumlah" class="form-control" required>
                    </div>

                    <!-- TANGGAL PINJAM -->
                    <div class="mb-3">
                        <label>Tanggal Mulai Pinjam</label>
                        <input type="date" name="tgl_pinjam" class="form-control" required>
                    </div>

                    <!-- TANGGAL KEMBALI -->
                    <div class="mb-3">
                        <label>Tanggal Pengembalian</label>
                        <input type="date" name="tgl_kembali" class="form-control" required>
                    </div>

                    <button type="submit" class="btn-glow w-100">
                        <i class="bi bi-send"></i> Pinjam Sekarang
                    </button>
                    <a href="admin_dashboard.php" class="btn btn-sm btn-light">Back</a>

                </form>

                <?php
                
            if($_POST)
                mysqli_query($conn,"INSERT INTO peminjaman
                (id_user,id_barang,jumlah_pinjam,tanggal_pinjam,tanggal_kembali)
                VALUES(
                '$_POST[id_user]',
                '$_POST[id_barang]',
                '$_POST[jumlah]',
                '$_POST[tgl_pinjam]',
                '$_POST[tgl_kembali]'
                )");

        if($_POST){
            mysqli_query($conn,"INSERT INTO peminjaman
            (id_user,id_barang,jumlah_pinjam,tanggal_pinjam,tanggal_kembali)
            VALUES(
            '$_POST[id_user]',
            '$_POST[id_barang]',
            '$_POST[jumlah]',
            '$_POST[tgl_pinjam]',
            '$_POST[tgl_kembali]'
            )");

            echo "<div class='alert alert-success mt-3 text-center'>
                    Berhasil dipinjam!
                </div>";
        }
                        
                ?>

            </div>
        </div>

        <!-- LIST BARANG -->
        <div class="col-md-6">
            <div class="card-glow p-4">

                <h5 class="mb-3">📦 Barang Tersedia</h5>

                <?php
                $barang2 = mysqli_query($conn, "SELECT * FROM barang WHERE jumlah > 0");
                while($b = mysqli_fetch_array($barang2)){
                ?>
                <div class="item-box">
                    <b><?= $b['nama_barang'] ?></b><br>
                    <small>Stok: <?= $b['jumlah'] ?> | Kondisi: <?= $b['kondisi_barang'] ?></small>

                </div>
                <?php } ?>

            </div>
        </div>

    </div>

</div>
</div>