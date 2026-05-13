<x-guest-layout>
    <style>
        html, body {
            background: #0f0f0f !important;
            min-height: 100vh;
        }

        /* Override Tailwind guest wrapper */
        .min-h-screen { background: #0f0f0f !important; }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        .register-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #0f0f0f;
            font-family: 'Space Mono', monospace;
            padding: 24px;
            position: relative;
        }

        /* Grid bg */
        .register-wrapper::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image:
                linear-gradient(rgba(200,255,0,0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(200,255,0,0.03) 1px, transparent 1px);
            background-size: 40px 40px;
            pointer-events: none;
            z-index: 0;
        }

        .register-wrapper::after {
            content: '';
            position: fixed;
            bottom: -80px;
            left: 50%;
            transform: translateX(-50%);
            width: 500px;
            height: 300px;
            background: radial-gradient(ellipse, rgba(200,255,0,0.03) 0%, transparent 70%);
            pointer-events: none;
            z-index: 0;
        }

        .register-card {
            background: #1a1a1a;
            border: 2px solid #2e2e2e;
            border-top: 3px solid #c8ff00;
            border-radius: 4px;
            padding: 40px 36px;
            width: 100%;
            max-width: 400px;
            position: relative;
            z-index: 1;
            animation: fadeUp 0.4s ease forwards;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(12px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* Corner brackets */
        .corner { position: absolute; width: 12px; height: 12px; }
        .corner.bl { bottom: 10px; left: 10px;  border-bottom: 2px solid #2e2e2e; border-left:  2px solid #2e2e2e; }
        .corner.br { bottom: 10px; right: 10px; border-bottom: 2px solid #2e2e2e; border-right: 2px solid #2e2e2e; }

        /* Brand */
        .register-brand { margin-bottom: 24px; }

        .register-brand-logo {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 18px;
        }

        .brand-icon {
            width: 32px; height: 32px;
            background: #c8ff00;
            border-radius: 2px;
            display: flex; align-items: center; justify-content: center;
        }

        .brand-icon span {
            font-family: 'Syne', sans-serif;
            font-weight: 800;
            font-size: 13px;
            color: #0f0f0f;
            letter-spacing: -0.5px;
        }

        .brand-name {
            font-family: 'Syne', sans-serif;
            font-weight: 800;
            font-size: 16px;
            color: #fff;
            letter-spacing: -0.3px;
        }

        .brand-name span { color: #c8ff00; }

        .register-tag {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            font-size: 9px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: #555;
            margin-bottom: 10px;
        }

        .register-tag::before {
            content: '';
            width: 5px; height: 5px;
            background: #c8ff00;
            border-radius: 50%;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50%       { opacity: 0.2; }
        }

        .register-title {
            font-family: 'Syne', sans-serif;
            font-weight: 800;
            font-size: 22px;
            color: #fff;
            letter-spacing: -0.5px;
            line-height: 1.25;
        }

        .register-title span { color: #c8ff00; }

        .register-subtitle {
            font-size: 11px;
            color: #444;
            margin-top: 6px;
            letter-spacing: 0.3px;
        }

        /* Step pills */
        .step-pills {
            display: flex;
            gap: 5px;
            margin-bottom: 24px;
        }

        .step-pill {
            height: 2px;
            border-radius: 99px;
            flex: 1;
            background: #c8ff00;
        }

        .step-pill.inactive { background: #252525; }

        /* Form */
        .form-group { margin-bottom: 14px; }

        .form-label {
            display: block;
            font-size: 9px;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            color: #666;
            margin-bottom: 7px;
        }

        .form-input {
            width: 100%;
            padding: 10px 14px;
            background: #111;
            border: 1.5px solid #2e2e2e;
            border-radius: 3px;
            font-size: 13px;
            color: #e8e8e8;
            font-family: 'Space Mono', monospace;
            outline: none;
            transition: border-color 0.15s ease, box-shadow 0.15s ease;
        }

        .form-input:focus {
            border-color: #c8ff00;
            box-shadow: 0 0 0 3px rgba(200,255,0,0.07);
        }

        .form-input::placeholder { color: #333; }

        .form-error {
            font-size: 11px;
            color: #ff6060;
            margin-top: 5px;
            letter-spacing: 0.2px;
        }

        .password-divider {
            height: 1px;
            background: #222;
            margin: 6px 0 14px;
        }

        .form-actions {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-top: 24px;
        }

        .login-link {
            font-size: 11px;
            letter-spacing: 0.3px;
            color: #444;
            text-decoration: none;
            transition: color 0.15s;
        }

        .login-link:hover { color: #c8ff00; }

        .btn-register {
            background: #c8ff00;
            color: #0f0f0f;
            border: 2px solid #c8ff00;
            padding: 10px 22px;
            border-radius: 3px;
            font-size: 11px;
            font-weight: 700;
            font-family: 'Space Mono', monospace;
            letter-spacing: 0.5px;
            cursor: pointer;
            transition: all 0.15s ease;
        }

        .btn-register:hover {
            background: transparent;
            color: #c8ff00;
        }

        .footer-note {
            text-align: center;
            margin-top: 24px;
            padding-top: 20px;
            border-top: 1px solid #1e1e1e;
            font-size: 10px;
            letter-spacing: 0.5px;
            color: #333;
        }
    </style>

    <script>
        document.documentElement.style.background = '#0f0f0f';
        document.body && (document.body.style.background = '#0f0f0f');
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.min-h-screen, .bg-gray-100, .bg-white').forEach(function (el) {
                el.style.background = '#0f0f0f';
            });
        });
    </script>

    <div class="register-wrapper">
        <div class="register-card">
            <div class="corner bl"></div>
            <div class="corner br"></div>

            <!-- Brand -->
            <div class="register-brand">
                <div class="register-brand-logo">
                    <div class="brand-icon"><span>SM</span></div>
                    <span class="brand-name">Stock<span>MGR</span></span>
                </div>
                <div class="register-tag">Buat Akun Baru</div>
                <h1 class="register-title">Daftar &amp; <span>mulai</span><br>kelola stok</h1>
                <p class="register-subtitle">Isi data di bawah untuk memulai</p>
            </div>

            <!-- Step pills -->
            <div class="step-pills">
                <div class="step-pill"></div>
                <div class="step-pill"></div>
                <div class="step-pill inactive"></div>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="form-group">
                    <label class="form-label" for="name">Nama Lengkap</label>
                    <input id="name" class="form-input" type="text" name="name"
                        value="{{ old('name') }}" placeholder="Nama kamu"
                        required autofocus autocomplete="name" />
                    @error('name')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label class="form-label" for="email">Alamat Email</label>
                    <input id="email" class="form-input" type="email" name="email"
                        value="{{ old('email') }}" placeholder="nama@email.com"
                        required autocomplete="username" />
                    @error('email')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="password-divider"></div>

                <!-- Password -->
                <div class="form-group">
                    <label class="form-label" for="password">Kata Sandi</label>
                    <input id="password" class="form-input" type="password" name="password"
                        placeholder="Min. 8 karakter" required autocomplete="new-password" />
                    @error('password')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="form-group">
                    <label class="form-label" for="password_confirmation">Konfirmasi Kata Sandi</label>
                    <input id="password_confirmation" class="form-input" type="password"
                        name="password_confirmation" placeholder="Ulangi kata sandi"
                        required autocomplete="new-password" />
                    @error('password_confirmation')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Actions -->
                <div class="form-actions">
                    <a class="login-link" href="{{ route('login') }}">
                        Sudah punya akun?
                    </a>
                    <button type="submit" class="btn-register">Daftar →</button>
                </div>
            </form>

            <p class="footer-note">Dengan mendaftar, Anda menyetujui syarat &amp; ketentuan kami.</p>
        </div>
    </div>
</x-guest-layout>
