<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    margin:0;
    height:100vh;
    display:flex;
    align-items:center;
    justify-content:center;
    font-family:'Segoe UI', sans-serif;
    background: linear-gradient(135deg,#ffe4ec,#fff0f5,#ffffff);
}

/* ===== CARD GLASS ===== */
.card{
    width:360px;
    border-radius:20px;
    background: rgba(255,255,255,0.6);
    backdrop-filter: blur(15px);
    border:1px solid rgba(255,182,193,0.4);
    box-shadow:0 10px 25px rgba(255,182,193,0.25);
    animation: fadeIn 0.8s ease-in-out;
}

/* FADE IN */
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

/* ===== LOGO ANIMATION (KEEP) ===== */
.logo{
    width:70px;
    height:70px;
    margin: 0 auto 10px;
    display:flex;
    align-items:center;
    justify-content:center;
    border-radius:50%;
    background: linear-gradient(135deg,#ffb6c1,#ffc0cb);
    color:#6d214f;
    font-weight:bold;
    font-size:26px;
    box-shadow: 0 0 20px rgba(255,182,193,0.6);
    animation: bounce 2s infinite, glow 1.5s infinite alternate;
}

/* bounce */
@keyframes bounce{
    0%,100%{ transform: translateY(0); }
    50%{ transform: translateY(-10px); }
}

/* glow */
@keyframes glow{
    from{ box-shadow: 0 0 10px rgba(255,182,193,0.4); }
    to{ box-shadow: 0 0 25px rgba(255,182,193,0.9); }
}

/* TITLE */
h3{
    font-weight:700;
    color:#6d214f;
}

/* INPUT */
.form-control{
    border-radius:12px;
    padding:10px;
    border:1px solid rgba(255,182,193,0.4);
    background: rgba(255,255,255,0.7);
}

/* BUTTON */
.btn-pink{
    background: linear-gradient(135deg,#ffb6c1,#ffc0cb,#ffe4ec);
    border:none;
    color:#6d214f;
    font-weight:600;
    border-radius:12px;
    padding:10px;
    transition:0.3s;
}

.btn-pink:hover{
    transform: scale(1.05);
    box-shadow: 0 8px 20px rgba(255,182,193,0.4);
}
</style>
</head>

<body>

<div class="card p-4">

    <!-- LOGO -->
    <div class="logo">👤</div>

    <h3 class="text-center mb-3">Inventaris Login</h3>

    <form method="POST" action="cek_login.php">
        <input class="form-control mb-2" name="username" placeholder="Username" required>
        <input class="form-control mb-3" name="password" type="password" placeholder="Password" required>

        <button class="btn btn-pink w-100">Login</button>
    </form>

</div>

</body>
</html>