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
            background:
                radial-gradient(ellipse at 12% 90%, rgba(8, 31, 92, 0.08), transparent 34%),
                radial-gradient(ellipse at 90% 8%, rgba(212, 175, 55, 0.12), transparent 30%),
                #f3f5f9;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            position: relative;
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: fixed;
            width: 420px;
            height: 420px;
            top: -300px;
            left: -180px;
            border: 1px solid rgba(7, 17, 43, 0.04);
            border-radius: 50%;
            pointer-events: none;
        }

        body::after {
            content: '';
            position: fixed;
            width: 280px;
            height: 280px;
            right: -120px;
            bottom: -150px;
            border: 1px solid rgba(212, 175, 55, 0.16);
            border-radius: 50%;
            pointer-events: none;
        }

        .login-card {
            width: 100%;
            max-width: 440px;
            background: rgba(255, 255, 255, 0.76);
            backdrop-filter: blur(22px);
            -webkit-backdrop-filter: blur(22px);
            border: 1px solid rgba(255, 255, 255, 0.9);
            border-radius: 24px;
            padding: 40px;
            position: relative;
            z-index: 1;
            box-shadow: 0 24px 70px rgba(7, 17, 43, 0.1);
            animation: loginCardIn 0.65s cubic-bezier(0.2, 0.7, 0.2, 1) both;
        }

        @keyframes loginCardIn {
            from {
                opacity: 0;
                transform: translateY(14px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .logo-wrap {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 30px;
        }

        .logo-box {
            width: 58px;
            height: 58px;
            background: rgba(212, 175, 55, 0.1);
            border: 1px solid rgba(212, 175, 55, 0.2);
            border-radius: 17px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 12px;
        }

        .logo-box img {
            width: 42px;
            height: 42px;
            object-fit: contain;
        }

        .logo-title {
            font-size: 18px;
            font-weight: 800;
            color: #07112B;
        }

        .logo-sub {
            font-size: 11px;
            color: #9a7a15;
            font-weight: 600;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            margin-top: 2px;
        }

        .divider {
            width: 28px;
            height: 2px;
            background: rgba(212, 175, 55, 0.7);
            margin: 10px auto 0;
            border-radius: 2px;
        }

        .form-heading {
            font-size: 21px;
            font-weight: 700;
            color: #07112B;
            margin-bottom: 5px;
        }

        .form-sub {
            font-size: 13px;
            color: #778198;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            color: #34415b;
            margin-bottom: 7px;
        }

        .form-input {
            width: 100%;
            background: rgba(255, 255, 255, 0.84);
            border: 1px solid #dfe4ed;
            border-radius: 11px;
            padding: 12px 14px;
            color: #07112B;
            font-size: 14px;
            font-family: inherit;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
        }

        .form-input:focus {
            border-color: rgba(184, 150, 30, 0.75);
            background: #fff;
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.12);
        }

        .form-input::placeholder {
            color: #a0a8b8;
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
            color: #68748a;
            cursor: pointer;
        }

        .forgot-link {
            font-size: 12px;
            color: #8b6d10;
            text-decoration: none;
        }

        .forgot-link:hover {
            text-decoration: underline;
        }

        .btn-login {
            width: 100%;
            background: #10224b;
            color: #fff;
            font-weight: 600;
            font-size: 14px;
            padding: 13px 16px;
            border-radius: 11px;
            border: none;
            cursor: pointer;
            font-family: inherit;
            transition: background-color 0.2s, transform 0.2s;
            margin-top: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
        }

        .btn-login:hover {
            background: #07112B;
            transform: translateY(-1px);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .btn-login:focus-visible,
        .back-link:focus-visible,
        .forgot-link:focus-visible {
            outline: 3px solid rgba(184, 150, 30, 0.45);
            outline-offset: 3px;
            border-radius: 5px;
        }

        .back-link {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            color: #7d8799;
            font-size: 12px;
            text-decoration: none;
            margin-top: 24px;
            transition: color 0.2s;
        }

        .back-link:hover {
            color: #07112B;
        }

        .error-msg {
            display: inline-block;
            color: #a42b32;
            background: rgba(164, 43, 50, 0.06);
            border-radius: 7px;
            font-size: 12px;
            margin-top: 7px;
            padding: 5px 8px;
        }

        .success-msg {
            background: rgba(22, 101, 52, 0.06);
            border: 1px solid rgba(22, 101, 52, 0.15);
            color: #166534;
            padding: 11px 14px;
            border-radius: 9px;
            font-size: 13px;
            margin-bottom: 20px;
        }

        .info-msg {
            background: rgba(8, 31, 92, 0.045);
            border: 1px solid rgba(8, 31, 92, 0.1);
            color: #34415b;
            padding: 11px 14px;
            border-radius: 9px;
            font-size: 13px;
            line-height: 1.5;
            margin-bottom: 20px;
        }

        @media (max-width: 480px) {
            body {
                padding: 16px;
            }

            .login-card {
                padding: 28px 22px;
                border-radius: 20px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .login-card {
                animation: none;
            }
        }
    </style>
</head>

<body>
    <div class="login-card">

        {{-- Logo --}}
        <div class="logo-wrap">
            <div class="logo-box">
                <img src="{{ asset('images/ikkapii-logo.png') }}" alt="Logo IKAPPI Pilangsari">
            </div>
            <div class="logo-title">Karang Taruna</div>
            <div class="logo-sub">Desa Pilangsari</div>
            <div class="divider"></div>
        </div>

        {{-- Heading --}}
        <div class="form-heading">Selamat datang kembali</div>
        <div class="form-sub">Masuk ke panel admin untuk mengelola website</div>

        {{-- Status --}}
        @if(session('status'))
        <div class="success-msg">{{ session('status') }}</div>
        @endif
        @if(session('registration_closed'))
        <div class="info-msg" role="status">{{ session('registration_closed') }}</div>
        @endif

        {{-- Form --}}
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label class="form-label" for="email">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                    id="email" class="form-input" placeholder="admin@karangtaruna.com" required autofocus autocomplete="username">
                @error('email')<p class="error-msg">{{ $message }}</p>@enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="password">Password</label>
                <input type="password" name="password" id="password"
                    class="form-input" placeholder="Masukkan password" required autocomplete="current-password">
                @error('password')<p class="error-msg">{{ $message }}</p>@enderror
            </div>

            <div class="form-row">
                <label class="remember-label">
                    <input type="checkbox" name="remember" style="accent-color:#10224b;">
                    Ingat saya
                </label>
                @if(Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="forgot-link">Lupa password?</a>
                @endif
            </div>

            <button type="submit" class="btn-login">
                Masuk ke Dashboard
                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-7-7 7 7-7 7" />
                </svg>
            </button>
        </form>

        <div style="text-align:center; margin-top:20px;">
            <p style="color:#7d8799; font-size:12px;">
                Akun admin hanya dibuat oleh pengelola.
            </p>
        </div>

        <a href="{{ route('beranda') }}" class="back-link">
            ← Kembali ke halaman utama
        </a>

        <p style="color:#a0a8b8; font-size:11px; text-align:center; margin-top:20px;">
            © {{ date('Y') }} Karang Taruna Desa Pilangsari
        </p>
    </div>
</body>

</html>