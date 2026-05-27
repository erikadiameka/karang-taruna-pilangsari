<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 — Halaman Tidak Ditemukan</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
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
            overflow: hidden;
            position: relative;
        }

        body::before {
            content: '';
            position: fixed;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(212, 175, 55, 0.06) 0%, transparent 70%);
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

        .container {
            text-align: center;
            position: relative;
            z-index: 1;
            max-width: 500px;
        }

        .error-number {
            font-size: clamp(6rem, 20vw, 10rem);
            font-weight: 900;
            background: linear-gradient(135deg, #D4AF37, #E8C84A);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            line-height: 1;
            margin-bottom: 8px;
        }

        .error-title {
            font-size: 1.5rem;
            font-weight: 800;
            color: #fff;
            margin-bottom: 12px;
        }

        .error-desc {
            color: rgba(255, 255, 255, 0.4);
            font-size: 14px;
            line-height: 1.7;
            margin-bottom: 40px;
        }

        .btn-home {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(135deg, #D4AF37, #E8C84A);
            color: #07112B;
            font-weight: 700;
            font-size: 14px;
            padding: 14px 32px;
            border-radius: 14px;
            text-decoration: none;
            transition: all 0.3s;
            margin-right: 12px;
        }

        .btn-home:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(212, 175, 55, 0.4);
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.7);
            font-weight: 500;
            font-size: 14px;
            padding: 14px 32px;
            border-radius: 14px;
            text-decoration: none;
            transition: all 0.3s;
            cursor: pointer;
            font-family: inherit;
        }

        .btn-back:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
        }

        .logo {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-bottom: 48px;
        }

        .logo-box {
            width: 44px;
            height: 44px;
            background: linear-gradient(135deg, #D4AF37, #E8C84A);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo-text {
            font-size: 14px;
            font-weight: 700;
            color: #fff;
        }

        .logo-sub {
            font-size: 10px;
            color: #D4AF37;
        }

        .emoji {
            font-size: 4rem;
            margin-bottom: 16px;
            display: block;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-12px);
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="logo">
            <div class="logo-box">
                <svg width="24" height="24" viewBox="0 0 100 100" fill="none">
                    <path d="M50 10 L60 35 L88 35 L66 52 L74 78 L50 62 L26 78 L34 52 L12 35 L40 35 Z" fill="#07112B" />
                </svg>
            </div>
            <div>
                <div class="logo-text">Karang Taruna</div>
                <div class="logo-sub">Desa Pilangsari</div>
            </div>
        </div>

        <span class="emoji">🔍</span>
        <div class="error-number">404</div>
        <div class="error-title">Halaman Tidak Ditemukan</div>
        <div class="error-desc">
            Maaf, halaman yang kamu cari tidak ada atau telah dipindahkan.<br>
            Coba kembali ke halaman utama.
        </div>

        <div>
            <a href="/" class="btn-home">🏠 Kembali ke Beranda</a>
            <button onclick="history.back()" class="btn-back">← Kembali</button>
        </div>
    </div>
</body>

</html>