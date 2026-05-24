<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — Karang Taruna Desa Pilangsari</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            background: #07112B;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            position: relative;
            overflow: hidden;
        }

        /* Background decorations */
        body::before {
            content: '';
            position: fixed;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(212, 175, 55, 0.08) 0%, transparent 70%);
            top: -200px;
            right: -200px;
            border-radius: 50%;
        }

        body::after {
            content: '';
            position: fixed;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(11, 42, 120, 0.4) 0%, transparent 70%);
            bottom: -100px;
            left: -100px;
            border-radius: 50%;
        }

        .login-card {
            width: 100%;
            max-width: 440px;
            background: rgba(8, 31, 92, 0.3);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(212, 175, 55, 0.15);
            border-radius: 28px;
            padding: 48px 40px;
            position: relative;
            z-index: 1;
        }

        .logo-wrap {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 36px;
        }

        .logo-box {
            width: 72px;
            height: 72px;
            background: linear-gradient(135deg, #D4AF37, #E8C84A);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 16px 40px rgba(212, 175, 55, 0.35);
            margin-bottom: 16px;
        }

        .logo-title {
            font-size: 20px;
            font-weight: 800;
            color: #fff;
        }

        .logo-sub {
            font-size: 11px;
            color: #D4AF37;
            font-weight: 600;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            margin-top: 2px;
        }

        .divider {
            width: 32px;
            height: 2px;
            background: #D4AF37;
            margin: 12px auto 0;
            border-radius: 2px;
        }

        .form-heading {
            font-size: 22px;
            font-weight: 800;
            color: #fff;
            margin-bottom: 6px;
        }

        .form-sub {
            font-size: 13px;
            color: rgba(255, 255, 255, 0.4);
            margin-bottom: 28px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.5);
            margin-bottom: 8px;
            letter-spacing: 0.05em;
            text-transform: uppercase;
        }

        .form-input {
            width: 100%;
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 13px 16px;
            color: #fff;
            font-size: 14px;
            font-family: inherit;
            outline: none;
            transition: border-color 0.2s, background 0.2s;
        }

        .form-input:focus {
            border-color: rgba(212, 175, 55, 0.6);
            background: rgba(255, 255, 255, 0.09);
        }

        .form-input::placeholder {
            color: rgba(255, 255, 255, 0.2);
        }

        .form-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 18px;
        }

        .remember-label {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: rgba(255, 255, 255, 0.4);
            cursor: pointer;
        }

        .forgot-link {
            font-size: 12px;
            color: #D4AF37;
            text-decoration: none;
        }

        .forgot-link:hover {
            text-decoration: underline;
        }

        .btn-login {
            width: 100%;
            background: linear-gradient(135deg, #D4AF37, #E8C84A);
            color: #07112B;
            font-weight: 800;
            font-size: 15px;
            padding: 14px;
            border-radius: 12px;
            border: none;
            cursor: pointer;
            font-family: inherit;
            transition: all 0.3s;
            letter-spacing: 0.02em;
            margin-top: 8px;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(212, 175, 55, 0.4);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .back-link {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            color: rgba(255, 255, 255, 0.3);
            font-size: 12px;
            text-decoration: none;
            margin-top: 28px;
            transition: color 0.2s;
        }

        .back-link:hover {
            color: #D4AF37;
        }

        .error-msg {
            color: #EF4444;
            font-size: 12px;
            margin-top: 6px;
        }

        .success-msg {
            background: rgba(16, 185, 129, 0.1);
            border: 1px solid rgba(16, 185, 129, 0.3);
            color: #10B981;
            padding: 12px 16px;
            border-radius: 10px;
            font-size: 13px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="login-card">

        {{-- Logo --}}
        <div class="logo-wrap">
            <div class="logo-box">
                <svg width="38" height="38" viewBox="0 0 100 100" fill="none">
                    <path d="M50 10 L60 35 L88 35 L66 52 L74 78 L50 62 L26 78 L34 52 L12 35 L40 35 Z" fill="#07112B" />
                    <circle cx="50" cy="50" r="10" fill="#07112B" />
                    <circle cx="50" cy="50" r="5" fill="#D4AF37" />
                </svg>
            </div>
            <div class="logo-title">Karang Taruna</div>
            <div class="logo-sub">Desa Pilangsari</div>
            <div class="divider"></div>
        </div>

        {{-- Heading --}}
        <div class="form-heading">Selamat Datang 👋</div>
        <div class="form-sub">Masuk ke panel admin untuk mengelola website</div>

        {{-- Status --}}
        @if(session('status'))
        <div class="success-msg">{{ session('status') }}</div>
        @endif

        {{-- Form --}}
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label class="form-label">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                    class="form-input" placeholder="admin@karangtaruna.com" required autofocus>
                @error('email')<p class="error-msg">{{ $message }}</p>@enderror
            </div>

            <div class="form-group">
                <label class="form-label">Password</label>
                <input type="password" name="password"
                    class="form-input" placeholder="••••••••" required>
                @error('password')<p class="error-msg">{{ $message }}</p>@enderror
            </div>

            <div class="form-row">
                <label class="remember-label">
                    <input type="checkbox" name="remember" style="accent-color:#D4AF37;">
                    Ingat saya
                </label>
                @if(Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="forgot-link">Lupa password?</a>
                @endif
            </div>

            <button type="submit" class="btn-login">
                Masuk ke Dashboard →
            </button>
        </form>

        <div style="text-align:center; margin-top:20px;">
            <p style="color:rgba(255,255,255,0.3); font-size:13px;">
                Belum punya akun?
                <a href="{{ route('register') }}" style="color:#D4AF37; text-decoration:none; font-weight:600;">
                    Daftar sekarang
                </a>
            </p>
        </div>

        <a href="{{ route('beranda') }}" class="back-link">
            ← Kembali ke halaman utama
        </a>

        <p style="color:rgba(255,255,255,0.15); font-size:11px; text-align:center; margin-top:20px;">
            © {{ date('Y') }} Karang Taruna Desa Pilangsari
        </p>
    </div>
</body>

</html>