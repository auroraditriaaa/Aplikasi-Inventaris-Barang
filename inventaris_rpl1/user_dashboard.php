<!DOCTYPE html>
<html>
<head>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<style>
body{
    margin:0;
    font-family:'Segoe UI';
    background: linear-gradient(135deg,#ffe4ec,#fff0f5,#ffffff);
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

/* MAIN WRAPPER */
.wrapper{
    width:100%;
    max-width:1000px;
    padding:30px;
}

/* HEADER */
.header-box{
    background: rgba(255,255,255,0.65);
    backdrop-filter: blur(12px);
    border:1px solid rgba(255,182,193,0.4);
    padding:25px;
    border-radius:20px;
    text-align:center;
    color:#6d214f;
    box-shadow:0 10px 25px rgba(255,182,193,0.25);
    margin-bottom:25px;
}

/* CARD */
.card-saas{
    border:none;
    border-radius:20px;
    background: rgba(255,255,255,0.7);
    backdrop-filter: blur(12px);
    box-shadow:0 10px 25px rgba(255,182,193,0.2);
    transition:0.3s;
    height:100%;
}

.card-saas:hover{
    transform:translateY(-8px);
}

/* ICON */
.icon{
    font-size:45px;
    color:#ff4d6d;
    margin-bottom:10px;
}

/* BUTTON */
.btn-pink{
    background: linear-gradient(135deg,#ff4d6d,#ff85a2);
    border:none;
    color:white;
    padding:12px;
    border-radius:12px;
    font-weight:600;
    width:100%;
    transition:0.3s;
}

.btn-pink:hover{
    transform:scale(1.03);
}

.btn-outline-pink{
    border:2px solid #ff4d6d;
    color:#ff4d6d;
    padding:12px;
    border-radius:12px;
    width:100%;
    transition:0.3s;
}

.btn-outline-pink:hover{
    background:#ff4d6d;
    color:white;
}
</style>

</head>

<body>

<div class="wrapper">

    <!-- HEADER -->
    <div class="header-box">
        <i class="bi bi-person-circle" style="font-size:40px;color:#ff4d6d;"></i>
        <h3 class="mt-2">Dashboard User</h3>
    </div>

    <!-- MENU -->
    <div class="row g-4">

        <div class="col-md-6">
            <div class="card card-saas p-4 text-center">

                <div class="icon">
                    <i class="bi bi-box-seam"></i>
                </div>

                <h5>Lihat Barang</h5>
                <p class="text-muted">Melihat daftar barang yang tersedia</p>

                <a href="lihat_barang.php" class="btn btn-outline-pink">
                    <i class="bi bi-eye"></i> Lihat
                </a>

            </div>
        </div>

        <div class="col-md-6">
            <div class="card card-saas p-4 text-center">

                <div class="icon">
                    <i class="bi bi-arrow-down-circle"></i>
                </div>

                <h5>Pinjam Barang</h5>
                <p class="text-muted">Ajukan peminjaman barang</p>

                <a href="pinjam_barang.php" class="btn btn-pink">
                    <i class="bi bi-send"></i> Pinjam
                </a>

            </div>
        </div>

    </div>

</div>

</body>
</html>