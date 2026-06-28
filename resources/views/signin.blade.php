<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registrasi Perpustakaan Madani</title>

<link rel="stylesheet" href="{{ asset('/css/bootstrap-5.3.8-dist/css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('/css/app.css') }}">

<style>
body{
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;

    background:
    linear-gradient(
    -45deg,
    #0f172a,
    #312e81,
    #7c3aed,
    #ec4899,
    #f59e0b);

    background-size:500% 500%;

    animation:bgMove 12s ease infinite;

    overflow:hidden;
}

/* Background bergerak */
@keyframes bgMove{
    0%{background-position:0% 50%;}
    50%{background-position:100% 50%;}
    100%{background-position:0% 50%;}
}

/* Cahaya blur */
body::before{
    content:'';
    position:absolute;

    width:450px;
    height:450px;

    background:#ec4899;

    border-radius:50%;

    filter:blur(140px);

    top:-150px;
    left:-100px;

    opacity:.6;
}

body::after{
    content:'';
    position:absolute;

    width:450px;
    height:450px;

    background:#f59e0b;

    border-radius:50%;

    filter:blur(140px);

    bottom:-150px;
    right:-100px;

    opacity:.6;
}

/* Card */
.card{
    position:relative;
    z-index:2;

    border:none;
    border-radius:25px;

    background:
    linear-gradient(
    135deg,
    rgba(255,255,255,.25),
    rgba(255,255,255,.08));

    border:1px solid rgba(255,255,255,.2);

    backdrop-filter:blur(20px);

    box-shadow:
    0 10px 35px rgba(0,0,0,.25);

    animation:
    fadeIn .8s ease,
    floatCard 3s ease-in-out infinite;
}

@keyframes fadeIn{
    from{
        opacity:0;
        transform:translateY(40px);
    }

    to{
        opacity:1;
        transform:translateY(0);
    }
}

@keyframes floatCard{
    0%,100%{
        transform:translateY(0);
    }

    50%{
        transform:translateY(-8px);
    }
}

/* Header */
.card-header{
    background:
    linear-gradient(
    135deg,
    #4f46e5,
    #7c3aed,
    #ec4899) !important;
}

/* Logo */
.logo{
    font-size:70px;
    animation:pulse 2s infinite;
}

@keyframes pulse{
    0%{transform:scale(1);}
    50%{transform:scale(1.1);}
    100%{transform:scale(1);}
}

/* Input */
.form-control{
    border:none;
    border-radius:12px;

    background:rgba(255,255,255,.9);

    transition:.3s;
}

.form-control:focus{
    transform:scale(1.02);

    box-shadow:
    0 0 15px rgba(99,102,241,.5);
}

/* Tombol utama */
.btn-primary{
    background:
    linear-gradient(
    135deg,
    #4f46e5,
    #7c3aed,
    #ec4899);

    background-size:200% 200%;

    animation:buttonMove 4s ease infinite;
}

@keyframes buttonMove{

    0%{
        background-position:0% 50%;
    }

    50%{
        background-position:100% 50%;
    }

    100%{
        background-position:0% 50%;
    }

}

.btn-primary:hover{
    transform:translateY(-3px);

    box-shadow:
    0 10px 25px rgba(99,102,241,.4);
}

/* Tombol mata */
.btn-outline-secondary{
    transition:.3s;
}

.btn-outline-secondary:hover{
    transform:scale(1.05);
}

/* Link */
a{
    text-decoration:none;
    font-weight:600;
    color:#2563eb;
}

a:hover{
    color:#6366f1;
}
</style>

</head>

<body>

<div class="container vh-100 d-flex justify-content-center align-items-center">

<div class="card shadow-lg border-0" style="width:500px;">

<div class="card-header bg-primary text-white text-center">
    <div class="logo">📚</div>
    <h3>Library Management System</h3>
    <small>Registrasi Pengguna</small>
</div>

<div class="card-body p-4">

<form action="/registrasi" method="POST">
{{ csrf_field() }}

<div class="mb-3">
    <label class="fw-bold">👤 Username</label>
    <input type="text"
           name="username"
           class="form-control"
           maxlength="50"
           autocomplete="off"
           placeholder="Masukkan username"
           required>
</div>

<div class="mb-3">
    <label class="fw-bold">🔒 Password</label>

    <div class="input-group">
        <input type="password"
               name="password"
               id="password"
               class="form-control"
               placeholder="Masukkan password"
               required>

        <button type="button"
                class="btn btn-outline-secondary"
                id="eyeBtn"
                onclick="showPassword()">
            👁️
        </button>
    </div>
</div>

<button type="submit" class="btn btn-primary w-100">
    📝 Sign In
</button>

</form>

<hr>

<p class="text-center">
Sudah punya akun?
<a href="/login">🚪 Login</a>
</p>

</div>
</div>
</div>

<script>
function showPassword(){

    let x=document.getElementById("password");
    let eye=document.getElementById("eyeBtn");

    if(x.type==="password"){
        x.type="text";
        eye.innerHTML="🙈";
    }else{
        x.type="password";
        eye.innerHTML="👁️";
    }
}
</script>

</body>
</html>
