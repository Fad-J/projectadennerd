<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Perpustakaan Madani</title>

<link rel="stylesheet" href="{{ asset('/css/bootstrap-5.3.8-dist/css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('/css/app.css') }}">

<style>
body{
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;

    background:
    linear-gradient(-45deg,
    #0f172a,
    #1e293b,
    #0f766e,
    #14532d);

    background-size:400% 400%;

    animation:bgMove 15s ease infinite;

    overflow:hidden;
}

/* Animasi background */
@keyframes bgMove{
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

/* Efek lingkaran blur */
body::before{
    content:'';
    position:absolute;
    width:350px;
    height:350px;
    background:#20c997;
    border-radius:50%;
    filter:blur(120px);
    top:-80px;
    left:-80px;
}

body::after{
    content:'';
    position:absolute;
    width:300px;
    height:300px;
    background:#ffc107;
    border-radius:50%;
    filter:blur(120px);
    bottom:-80px;
    right:-80px;
}

/* Card utama */
.card{
    position:relative;
    z-index:2;

    border:none;
    border-radius:25px;

    background:rgba(255,255,255,0.12);

    backdrop-filter:blur(15px);

    box-shadow:
    0 8px 32px rgba(0,0,0,.25);

    animation:fadeIn .8s ease, floatCard 3s ease-in-out infinite;
}

/* Card melayang */
@keyframes floatCard{
    0%,100%{
        transform:translateY(0);
    }

    50%{
        transform:translateY(-10px);
    }
}

.card-header{
    border-radius:25px 25px 0 0 !important;

    background:
    linear-gradient(135deg,
    #198754,
    #20c997) !important;
}

/* Logo */
.logo{
    font-size:70px;

    animation:pulse 2s infinite;
}

@keyframes pulse{
    0%{
        transform:scale(1);
    }

    50%{
        transform:scale(1.1);
    }

    100%{
        transform:scale(1);
    }
}

/* Input */
.form-control{
    border-radius:12px;
    border:none;

    background:rgba(255,255,255,.85);

    transition:.3s;
}

.form-control:focus{
    transform:scale(1.02);

    box-shadow:
    0 0 15px rgba(32,201,151,.5);
}

/* Tombol */
.btn-success{
    background:
    linear-gradient(135deg,
    #198754,
    #20c997);

    border:none;

    font-weight:bold;

    transition:.3s;
}

.btn-success:hover{
    transform:translateY(-3px);

    box-shadow:
    0 10px 25px rgba(32,201,151,.4);
}

.btn-outline-secondary:hover{
    transform:scale(1.05);
}

/* Link */
a{
    text-decoration:none;
    font-weight:600;
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

a:hover{
    color:#20c997;
}
</style>

</head>

<body>

<div class="container vh-100 d-flex justify-content-center align-items-center">

<div class="card shadow-lg border-0" style="width:500px;">

<div class="card-header bg-success text-white text-center">
    <div class="logo">📚</div>
    <h3>Library Management System</h3>
    <small>Halaman Login</small>
</div>

<div class="card-body p-4">

<form action="/login" method="POST">
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

@if ($message = Session::get('success'))
<div class="alert alert-success">
    ✅ {{ $message }}
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger">
    ❌ {{ $message }}
</div>
@endif

<button type="submit" class="btn btn-success w-100">
    🚪 Login
</button>

</form>

<hr>

<p class="text-center">
Belum punya akun?
<a href="/signin">📝 Sign In</a>
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
