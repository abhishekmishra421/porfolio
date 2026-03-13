<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login — Portfolio</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        *,
        *::before,
        *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #0d1117;
            min-height: 100vh;
            display: flex;
            align-items: stretch;
            overflow: hidden;
        }

        .login-left {
            width: 55%;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 60px;
            position: relative;
            overflow: hidden;
        }

        .login-left::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(ellipse at 30% 40%, rgba(108, 99, 255, 0.25) 0%, transparent 60%),
                radial-gradient(ellipse at 70% 70%, rgba(79, 172, 254, 0.15) 0%, transparent 50%);
        }

        .login-left-content {
            position: relative;
            z-index: 1;
            text-align: center;
            max-width: 480px;
        }

        .login-brand {
            font-size: 2rem;
            font-weight: 800;
            background: linear-gradient(135deg, #6c63ff, #4facfe);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
            letter-spacing: -1px;
        }

        .login-tagline {
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.9rem;
            margin-bottom: 3rem;
        }

        .login-illustration {
            width: 280px;
            height: 280px;
            border-radius: 50%;
            background: rgba(108, 99, 255, 0.08);
            border: 1px solid rgba(108, 99, 255, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem;
            position: relative;
            animation: float 4s ease-in-out infinite;
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

        .login-illustration i {
            font-size: 6rem;
            background: linear-gradient(135deg, #6c63ff, #4facfe);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .login-illustration::before {
            content: '';
            position: absolute;
            inset: -20px;
            border-radius: 50%;
            border: 1px dashed rgba(108, 99, 255, 0.2);
            animation: spin 15s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        .login-feature {
            display: flex;
            align-items: center;
            gap: 12px;
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.88rem;
            margin-bottom: 1rem;
            text-align: left;
        }

        .login-feature-icon {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            background: rgba(108, 99, 255, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #8b85ff;
            font-size: 0.85rem;
            flex-shrink: 0;
        }

        .login-right {
            flex: 1;
            background: #0d1117;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
        }

        .login-card {
            width: 100%;
            max-width: 420px;
        }

        .login-title {
            font-size: 1.8rem;
            font-weight: 800;
            color: #fff;
            margin-bottom: 0.5rem;
            letter-spacing: -0.5px;
        }

        .login-subtitle {
            color: #64748b;
            font-size: 0.9rem;
            margin-bottom: 2.5rem;
        }

        .login-label {
            font-size: 0.82rem;
            font-weight: 600;
            color: #94a3b8;
            margin-bottom: 6px;
            display: block;
        }

        .login-input-wrap {
            position: relative;
            margin-bottom: 1.2rem;
        }

        .login-input-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c63ff;
            font-size: 0.95rem;
            z-index: 1;
        }

        .login-input {
            width: 100%;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.07);
            border-radius: 12px;
            padding: 13px 14px 13px 44px;
            color: #e2e8f0;
            font-family: 'Inter', sans-serif;
            font-size: 0.92rem;
            transition: all 0.25s;
            outline: none;
        }

        .login-input::placeholder {
            color: #475569;
        }

        .login-input:focus {
            border-color: rgba(108, 99, 255, 0.5);
            background: rgba(108, 99, 255, 0.07);
            box-shadow: 0 0 0 3px rgba(108, 99, 255, 0.12);
        }

        .login-input-pass-toggle {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #475569;
            cursor: pointer;
            font-size: 0.95rem;
            background: none;
            border: none;
            padding: 0;
        }

        .login-btn {
            width: 100%;
            padding: 13px;
            background: linear-gradient(135deg, #6c63ff, #4facfe);
            border: none;
            border-radius: 12px;
            color: #fff;
            font-family: 'Inter', sans-serif;
            font-size: 0.95rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 4px 20px rgba(108, 99, 255, 0.35);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(108, 99, 255, 0.5);
        }

        .login-btn:active {
            transform: translateY(0);
        }

        .login-divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 1.5rem 0;
        }

        .login-divider::before,
        .login-divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: rgba(255, 255, 255, 0.06);
        }

        .login-divider span {
            color: #475569;
            font-size: 0.78rem;
        }

        .login-back {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: #64748b;
            font-size: 0.82rem;
            text-decoration: none;
            margin-top: 1.5rem;
            transition: color 0.2s;
        }

        .login-back:hover {
            color: #8b85ff;
        }

        .error-msg {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.25);
            color: #ef4444;
            padding: 12px 16px;
            border-radius: 10px;
            font-size: 0.88rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* Floating particles */
        .particle {
            position: absolute;
            border-radius: 50%;
            background: linear-gradient(135deg, #6c63ff, #4facfe);
            opacity: 0.12;
            animation: float-p linear infinite;
        }

        @keyframes float-p {
            0% {
                transform: translateY(100%) scale(0);
                opacity: 0;
            }

            10% {
                opacity: 0.12;
            }

            90% {
                opacity: 0.12;
            }

            100% {
                transform: translateY(-100px) scale(1);
                opacity: 0;
            }
        }

        @media (max-width: 768px) {
            .login-left {
                display: none;
            }

            .login-right {
                padding: 30px 20px;
            }
        }
    </style>
</head>

<body>
    <!-- Left Panel -->
    <div class="login-left">
        <!-- Particles -->
        <div id="lParticles" style="position:absolute;inset:0;overflow:hidden;"></div>
        <div class="login-left-content">
            <div class="login-brand"><i class="fas fa-layer-group me-2"></i>PortfolioAdmin</div>
            <div class="login-tagline">Your creative control center</div>
            <div class="login-illustration"><i class="fas fa-shield-alt"></i></div>
            <div class="login-feature">
                <div class="login-feature-icon"><i class="fas fa-tachometer-alt"></i></div>Full dashboard control over
                your portfolio content
            </div>
            <div class="login-feature">
                <div class="login-feature-icon"><i class="fas fa-images"></i></div>Manage portfolio, blog, testimonials
                & services
            </div>
            <div class="login-feature">
                <div class="login-feature-icon"><i class="fas fa-envelope"></i></div>View and respond to contact
                messages
            </div>
        </div>
    </div>

    <!-- Right Panel -->
    <div class="login-right">
        <div class="login-card">
            <p
                style="color:#6c63ff;font-size:0.78rem;font-weight:700;letter-spacing:3px;text-transform:uppercase;margin-bottom:1rem;">
                Welcome Back</p>
            <h1 class="login-title">Sign In</h1>
            <p class="login-subtitle">Enter your credentials to access the admin panel</p>

            <?php if ($this->session->flashdata('error')): ?>
                <div class="error-msg"><i class="fas fa-exclamation-circle"></i>
                    <?php echo $this->session->flashdata('error'); ?></div>
            <?php endif; ?>

            <form action="<?php echo base_url('admin/login'); ?>" method="POST">
                <div>
                    <label class="login-label">Username</label>
                    <div class="login-input-wrap">
                        <i class="fas fa-user login-input-icon"></i>
                        <input type="text" name="username" class="login-input" placeholder="Enter your username"
                            required autocomplete="username">
                    </div>
                </div>
                <div>
                    <label class="login-label">Password</label>
                    <div class="login-input-wrap">
                        <i class="fas fa-lock login-input-icon"></i>
                        <input type="password" name="password" id="passInput" class="login-input"
                            placeholder="Enter your password" required autocomplete="current-password">
                        <button type="button" class="login-input-pass-toggle" onclick="togglePass()">
                            <i class="fas fa-eye" id="passIcon"></i>
                        </button>
                    </div>
                </div>
                <button type="submit" class="login-btn mt-2">
                    <i class="fas fa-sign-in-alt"></i> Sign In to Dashboard
                </button>
            </form>

            <div class="login-divider"><span>or</span></div>
            <a href="<?php echo base_url(); ?>" class="login-back">
                <i class="fas fa-arrow-left"></i> Back to Website
            </a>
        </div>
    </div>

    <script>
        function togglePass() {
            const inp = document.getElementById('passInput');
            const ico = document.getElementById('passIcon');
            if (inp.type === 'password') { inp.type = 'text'; ico.className = 'fas fa-eye-slash'; }
            else { inp.type = 'password'; ico.className = 'fas fa-eye'; }
        }
        // Particles
        const pc = document.getElementById('lParticles');
        for (let i = 0; i < 12; i++) {
            const p = document.createElement('div');
            const s = Math.random() * 8 + 3;
            p.className = 'particle';
            p.style.cssText = `width:${s}px;height:${s}px;left:${Math.random() * 100}%;animation-duration:${Math.random() * 12 + 8}s;animation-delay:${Math.random() * 8}s;`;
            pc.appendChild(p);
        }
    </script>
</body>

</html>
