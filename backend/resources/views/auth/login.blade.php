<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Serene Admin Console</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #B8C2B6 0%, #FFFFFF 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .brand-container {
            text-align: center;
            margin-bottom: 24px;
        }

        .brand-title {
            color: #060607;
            font-size: 24px;
            font-weight: 600;
            letter-spacing: -0.5px;
        }

        .brand-subtitle {
            color: #747878;
            font-size: 11px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-top: 4px;
        }

        .login-card {
            background: #ffffff;
            width: 100%;
            max-width: 420px;
            border-radius: 16px;
            padding: 36px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.03);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            color: #747878;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            margin-bottom: 8px;
        }

        .input-container {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-container i.input-icon {
            position: absolute;
            left: 14px;
            color: #747878;
            font-size: 14px;
            opacity: 0.7;
        }

        .input-container i.toggle-password {
            position: absolute;
            right: 14px;
            color: #747878;
            font-size: 14px;
            cursor: pointer;
        }

        .form-control {
            width: 100%;
            padding: 12px 14px 12px 40px;
            border: 1px solid #f3f4f6;
            background-color: #ffffff;
            border-radius: 8px;
            font-size: 14px;
            color: #1f2937;
            transition: all 0.2s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: #747878;
        }

        .form-control::placeholder {
            color: #747878;
            opacity: 0.40;
        }

        .remember-me {
            display: flex;
            align-items: center;
            margin-bottom: 24px;
        }

        .remember-me input {
            margin-right: 8px;
            accent-color: #1F1F1F;
        }

        .remember-me label {
            color: #444748;
            font-size: 13px;
            user-select: none;
        }

        .btn-login {
            width: 100%;
            /* REVISI: Menggunakan gradasi linear tombol sesuai data Figma terbaru */
            background: linear-gradient(180deg, #545454 0%, #1F1F1F 100%);
            color: #ffffff;
            border: none;
            padding: 14px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            transition: opacity 0.2s ease;
        }

        .btn-login:hover {
            /* Memberikan efek feedback sedikit lebih terang saat diarahkan kursor */
            opacity: 0.9;
        }

        .card-footer-links {
            display: flex;
            justify-content: space-between;
            margin-top: 24px;
            font-size: 12px;
        }

        .card-footer-links a {
            color: #444748;
            text-decoration: none;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .card-footer-links a:hover {
            text-decoration: underline;
        }

        .page-footer {
            margin-top: 32px;
            text-align: center;
            font-size: 11px;
            color: #747878;
            opacity: 0.7;
            line-height: 1.6;
        }

        .page-footer i {
            margin-right: 4px;
        }
    </style>
</head>

<body>

    <div class="brand-container">
        <img src="/images/Logo.svg" style="height: 48px; margin-bottom: 12px; width: auto;">
        <div class="brand-title">System Console</div>
        <div class="brand-subtitle">Enterprise Management Suite</div>
    </div>

    <div class="login-card">
        @if ($errors->any())
        <div style="background:#fee2e2; color:#991b1b; padding:10px; border-radius:8px; margin-bottom:16px; font-size:13px;">
            {{ $errors->first() }}
        </div>
        @endif
        <form action="{{ route('login.submit') }}" method="POST">
            @csrf

            <div class="form-group">
                <label class="form-label">Username</label>
                <div class="input-container">
                    <i class="fa-regular fa-user input-icon"></i>
                    <input type="text" name="username" class="form-control" placeholder="Enter your administrator ID" required>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Password</label>
                <div class="input-container">
                    <i class="fa-solid fa-lock input-icon"></i>
                    <input type="password" id="password" name="password" class="form-control" placeholder="••••••••" required>
                    <i class="fa-regular fa-eye toggle-password" onclick="togglePasswordView()"></i>
                </div>
            </div>

            <div class="remember-me">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Keep me signed in</label>
            </div>

            <button type="submit" class="btn-login">
                Login
            </button>
        </form>

        <div class="card-footer-links">
            <a href="#"><i class="fa-regular fa-circle-question"></i> Forgot Password?</a>
            <a href="#"><i class="fa-solid fa-headset"></i> Contact Support</a>
        </div>
    </div>

    <script>
        function togglePasswordView() {
            const passwordInput = document.getElementById('password');
            const icon = document.querySelector('.toggle-password');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-regular', 'fa-eye');
                icon.classList.add('fa-solid', 'fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-solid', 'fa-eye-slash');
                icon.classList.add('fa-regular', 'fa-eye');
            }
        }
    </script>
</body>

</html>