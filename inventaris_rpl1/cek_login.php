<?php
session_start();
include "config.php";

// cek input aman
if (!isset($_POST['username']) || !isset($_POST['password'])) {
    header("Location: index.php");
    exit;
}

$username = $_POST['username'];
$password = $_POST['password'];

// prepared statement (lebih aman)
$stmt = $conn->prepare("SELECT * FROM user WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();

$data = $result->fetch_assoc();

if ($data) {

    $_SESSION['id_user'] = $data['id_user'];
    $_SESSION['role'] = $data['role'];
    $_SESSION['username'] = $data['username'];

    if ($data['role'] == 'admin') {
        header("Location: admin_dashboard.php");
        exit;
    } else {
        header("Location: user_dashboard.php");
        exit;
    }

} else {
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
    font-family:'Segoe UI',sans-serif;
    background: linear-gradient(135deg,#ffe4ec,#fff0f5,#ffffff);
}

/* GLASS CARD */
.card{
    width:360px;
    border-radius:20px;
    padding:25px;
    text-align:center;
    color:#6d214f;
    background: rgba(255,255,255,0.55);
    backdrop-filter: blur(15px);
    border:1px solid rgba(255,182,193,0.4);
    box-shadow:0 10px 25px rgba(255,182,193,0.25);
    animation: fadeIn 0.6s ease-in-out;
}

/* ANIMATION */
@keyframes fadeIn{
    from{
        opacity:0;
        transform: translateY(20px);
    }
    to{
        opacity:1;
        transform: translateY(0);
    }
}

/* BUTTON PASTEL */
.btn-pastel{
    background: linear-gradient(135deg,#ffb6c1,#ffc0cb,#ffe4ec);
    border:none;
    color:#6d214f;
    font-weight:600;
    border-radius:12px;
    padding:10px;
    width:100%;
    transition:0.3s;
}

.btn-pastel:hover{
    transform:scale(1.03);
    box-shadow:0 10px 25px rgba(255,182,193,0.4);
}

h4{
    font-weight:700;
}
</style>

</head>

<body>

<div class="card">
    <h4>❌ Login Gagal</h4>
    <p>Username atau password salah</p>

    <a href="index.php" class="btn btn-pastel">Coba Lagi</a>
</div>

</body>
</html>

<?php
}
?>