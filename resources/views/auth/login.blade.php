<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sign In &mdash; Amazing Laundry Qatar</title>

    <!-- Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --bg-deep:       #040c18;
            --bg-card:       rgba(255,255,255,0.04);
            --border-card:   rgba(255,255,255,0.08);
            --teal:          #0d9488;
            --teal-light:    #14b8a6;
            --teal-glow:     rgba(13,148,136,0.35);
            --cyan:          #06b6d4;
            --gold:          #f59e0b;
            --gold-light:    #fbbf24;
            --text-white:    #f9fafb;
            --text-muted:    #9ca3af;
            --text-dim:      #64748b;
            --success:       #10b981;
            --danger:        #f43f5e;
            --info:          #38bdf8;
        }

        html, body {
            height: 100%;
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--bg-deep);
            color: var(--text-white);
            overflow-x: hidden;
        }

        /* ============================================================
           LAYOUT
        ============================================================ */
        .auth-wrapper {
            display: flex;
            min-height: 100vh;
            width: 100%;
        }

        /* ============================================================
           LEFT BRAND PANEL
        ============================================================ */
        .brand-panel {
            position: relative;
            width: 60%;
            flex-shrink: 0;
            background: linear-gradient(135deg, #030d1e 0%, #050f22 50%, #040c1a 100%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            padding: 60px 48px;
        }

        /* Animated floating orbs */
        .orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(70px);
            animation: floatOrb var(--dur, 12s) ease-in-out infinite alternate;
            pointer-events: none;
        }
        .orb-1 {
            width: 420px; height: 420px;
            background: radial-gradient(circle, rgba(13,148,136,0.22) 0%, transparent 70%);
            top: -120px; left: -100px;
            --dur: 14s;
        }
        .orb-2 {
            width: 320px; height: 320px;
            background: radial-gradient(circle, rgba(6,182,212,0.15) 0%, transparent 70%);
            bottom: -80px; right: -80px;
            --dur: 18s;
            animation-delay: -6s;
        }
        .orb-3 {
            width: 200px; height: 200px;
            background: radial-gradient(circle, rgba(245,158,11,0.12) 0%, transparent 70%);
            bottom: 120px; left: 60px;
            --dur: 10s;
            animation-delay: -3s;
        }
        .orb-4 {
            width: 160px; height: 160px;
            background: radial-gradient(circle, rgba(13,148,136,0.18) 0%, transparent 70%);
            top: 40%; right: 15%;
            --dur: 16s;
            animation-delay: -9s;
        }

        @keyframes floatOrb {
            0%   { transform: translate(0, 0) scale(1); }
            50%  { transform: translate(30px, -40px) scale(1.08); }
            100% { transform: translate(-20px, 20px) scale(0.95); }
        }

        /* Decorative circles */
        .deco-circle {
            position: absolute;
            border-radius: 50%;
            border: 1px solid rgba(13,148,136,0.18);
            animation: spinSlow var(--sp, 30s) linear infinite;
            pointer-events: none;
        }
        .deco-circle-1 { width: 480px; height: 480px; top: 50%; left: 50%; transform: translate(-50%,-50%); --sp: 40s; }
        .deco-circle-2 { width: 340px; height: 340px; top: 50%; left: 50%; transform: translate(-50%,-50%); border-color: rgba(6,182,212,0.12); --sp: 28s; animation-direction: reverse; }
        .deco-circle-3 { width: 200px; height: 200px; top: 50%; left: 50%; transform: translate(-50%,-50%); border-color: rgba(245,158,11,0.10); --sp: 18s; }

        .deco-dot {
            position: absolute;
            width: 6px; height: 6px;
            border-radius: 50%;
            background: var(--teal-light);
            box-shadow: 0 0 12px var(--teal-light);
            animation: dotPulse 3s ease-in-out infinite;
        }
        .deco-dot-1 { top: 18%; left: 22%; animation-delay: 0s; }
        .deco-dot-2 { top: 72%; right: 20%; animation-delay: 1s; background: var(--gold); box-shadow: 0 0 12px var(--gold); }
        .deco-dot-3 { top: 45%; left: 10%; animation-delay: 2s; background: var(--cyan); box-shadow: 0 0 12px var(--cyan); }

        @keyframes spinSlow   { to { transform: translate(-50%,-50%) rotate(360deg); } }
        @keyframes dotPulse   { 0%,100% { transform: scale(1); opacity: 0.7; } 50% { transform: scale(1.8); opacity: 1; } }

        /* Brand content */
        .brand-content {
            position: relative;
            z-index: 2;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            gap: 32px;
        }

        /* Logo circle */
        .brand-logo-ring {
            position: relative;
            width: 130px; height: 130px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--teal) 0%, var(--cyan) 100%);
            display: flex; align-items: center; justify-content: center;
            box-shadow:
                0 0 0 12px rgba(13,148,136,0.10),
                0 0 0 24px rgba(13,148,136,0.05),
                0 0 60px rgba(13,148,136,0.40),
                0 0 120px rgba(6,182,212,0.20);
            animation: logoPulse 4s ease-in-out infinite;
        }
        .brand-logo-ring svg {
            width: 68px; height: 68px;
            color: #fff;
            filter: drop-shadow(0 2px 8px rgba(0,0,0,0.5));
        }
        @keyframes logoPulse {
            0%,100% { box-shadow: 0 0 0 12px rgba(13,148,136,0.10), 0 0 0 24px rgba(13,148,136,0.05), 0 0 60px rgba(13,148,136,0.40), 0 0 120px rgba(6,182,212,0.20); }
            50%      { box-shadow: 0 0 0 16px rgba(13,148,136,0.14), 0 0 0 32px rgba(13,148,136,0.07), 0 0 80px rgba(13,148,136,0.55), 0 0 150px rgba(6,182,212,0.28); }
        }

        .brand-name {
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: var(--teal-light);
            margin-bottom: 4px;
        }
        .brand-tagline {
            font-size: 36px;
            font-weight: 800;
            line-height: 1.15;
            color: var(--text-white);
            text-shadow: 0 2px 20px rgba(0,0,0,0.6);
        }
        .brand-tagline span {
            background: linear-gradient(90deg, var(--teal-light), var(--cyan));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .brand-desc {
            font-size: 15px;
            color: var(--text-muted);
            line-height: 1.7;
            max-width: 380px;
        }

        /* Feature pills */
        .brand-features {
            display: flex;
            flex-direction: column;
            gap: 14px;
            width: 100%;
            max-width: 360px;
        }
        .feature-pill {
            display: flex;
            align-items: center;
            gap: 14px;
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.07);
            border-radius: 14px;
            padding: 14px 18px;
            backdrop-filter: blur(10px);
        }
        .feature-icon {
            width: 38px; height: 38px;
            border-radius: 10px;
            background: linear-gradient(135deg, rgba(13,148,136,0.25), rgba(6,182,212,0.15));
            border: 1px solid rgba(13,148,136,0.30);
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }
        .feature-icon svg { width: 18px; height: 18px; color: var(--teal-light); }
        .feature-text strong { display: block; font-size: 13px; font-weight: 700; color: var(--text-white); }
        .feature-text span  { font-size: 12px; color: var(--text-dim); }

        /* Contact strip */
        .brand-contact {
            display: flex;
            flex-direction: column;
            gap: 8px;
            border-top: 1px solid rgba(255,255,255,0.07);
            padding-top: 24px;
            width: 100%;
            max-width: 360px;
        }
        .contact-row {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 13px;
            color: var(--text-dim);
        }
        .contact-row svg { width: 14px; height: 14px; color: var(--teal); flex-shrink: 0; }
        .contact-row a  { color: var(--text-muted); text-decoration: none; transition: color .2s; }
        .contact-row a:hover { color: var(--teal-light); }

        /* ============================================================
           RIGHT FORM PANEL
        ============================================================ */
        .form-panel {
            flex: 1;
            background: #040c18;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 48px 32px;
            position: relative;
            overflow: hidden;
        }

        /* Subtle radial glow behind form */
        .form-panel::before {
            content: '';
            position: absolute;
            width: 500px; height: 500px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(13,148,136,0.07) 0%, transparent 65%);
            top: 50%; left: 50%;
            transform: translate(-50%,-50%);
            pointer-events: none;
        }

        .form-container {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 440px;
        }

        /* Mobile logo (hidden on desktop) */
        .mobile-logo {
            display: none;
            flex-direction: column;
            align-items: center;
            gap: 12px;
            margin-bottom: 32px;
        }
        .mobile-logo-ring {
            width: 72px; height: 72px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--teal) 0%, var(--cyan) 100%);
            display: flex; align-items: center; justify-content: center;
            box-shadow: 0 0 32px rgba(13,148,136,0.40);
        }
        .mobile-logo-ring svg { width: 36px; height: 36px; color: #fff; }
        .mobile-logo h1 { font-size: 20px; font-weight: 800; color: var(--text-white); }
        .mobile-logo p  { font-size: 12px; color: var(--text-dim); letter-spacing: 1px; }

        /* Form card */
        .form-card {
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 24px;
            padding: 40px;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            box-shadow:
                0 8px 32px rgba(0,0,0,0.4),
                0 0 0 1px rgba(255,255,255,0.03) inset,
                0 1px 0 rgba(255,255,255,0.06) inset;
        }

        .form-header {
            margin-bottom: 32px;
        }
        .form-header h2 {
            font-size: 28px;
            font-weight: 800;
            color: var(--text-white);
            line-height: 1.2;
        }
        .form-header p {
            font-size: 14px;
            color: var(--text-muted);
            margin-top: 8px;
            line-height: 1.6;
        }

        /* Status / Error alerts */
        .alert-box {
            border-radius: 12px;
            padding: 14px 16px;
            font-size: 13.5px;
            line-height: 1.55;
            margin-bottom: 20px;
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }
        .alert-box svg { width: 16px; height: 16px; flex-shrink: 0; margin-top: 1px; }
        .alert-success-box {
            background: rgba(16,185,129,0.10);
            border: 1px solid rgba(16,185,129,0.30);
            color: #6ee7b7;
        }
        .alert-error-box {
            background: rgba(244,63,94,0.10);
            border: 1px solid rgba(244,63,94,0.30);
            color: #fda4af;
        }
        .alert-error-box ul { list-style: none; padding: 0; }
        .alert-error-box ul li::before { content: '• '; }

        /* Form groups */
        .form-group {
            margin-bottom: 20px;
        }
        .form-label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: var(--text-muted);
            margin-bottom: 8px;
            letter-spacing: 0.3px;
        }

        /* Input wrapper with icon */
        .input-wrapper {
            position: relative;
        }
        .input-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            width: 18px; height: 18px;
            color: var(--text-dim);
            pointer-events: none;
            transition: color .25s;
        }
        .input-dark-field {
            width: 100%;
            padding: 13px 16px 13px 44px;
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(255,255,255,0.10);
            border-radius: 12px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 14px;
            color: var(--text-white);
            outline: none;
            transition: border-color .25s, box-shadow .25s, background .25s;
        }
        .input-dark-field::placeholder { color: var(--text-dim); }
        .input-dark-field:focus {
            border-color: var(--teal);
            background: rgba(13,148,136,0.07);
            box-shadow: 0 0 0 3px rgba(13,148,136,0.18);
        }
        .input-dark-field:focus + .input-icon,
        .input-wrapper:focus-within .input-icon { color: var(--teal-light); }

        /* Password toggle */
        .pw-toggle {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            padding: 4px;
            color: var(--text-dim);
            transition: color .2s;
            display: flex; align-items: center; justify-content: center;
        }
        .pw-toggle:hover { color: var(--teal-light); }
        .pw-toggle svg { width: 18px; height: 18px; }
        /* shift padding when toggle is present */
        .has-toggle .input-dark-field { padding-right: 44px; }

        /* Remember me */
        .remember-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 28px;
        }
        .checkbox-label {
            display: flex;
            align-items: center;
            gap: 9px;
            cursor: pointer;
            user-select: none;
        }
        .custom-checkbox {
            width: 18px; height: 18px;
            border: 2px solid rgba(255,255,255,0.20);
            border-radius: 5px;
            background: rgba(255,255,255,0.05);
            appearance: none;
            -webkit-appearance: none;
            cursor: pointer;
            position: relative;
            transition: border-color .2s, background .2s;
            flex-shrink: 0;
        }
        .custom-checkbox:checked {
            background: var(--teal);
            border-color: var(--teal);
        }
        .custom-checkbox:checked::after {
            content: '';
            position: absolute;
            left: 4px; top: 1px;
            width: 6px; height: 10px;
            border: 2px solid #fff;
            border-top: none; border-left: none;
            transform: rotate(45deg);
        }
        .custom-checkbox:focus { box-shadow: 0 0 0 3px rgba(13,148,136,0.25); outline: none; }
        .checkbox-label span { font-size: 13.5px; color: var(--text-muted); }

        .forgot-link {
            font-size: 13px;
            color: var(--teal-light);
            text-decoration: none;
            font-weight: 600;
            transition: color .2s;
        }
        .forgot-link:hover { color: var(--cyan); }

        /* Submit button */
        .btn-signin {
            width: 100%;
            padding: 14px 24px;
            border: none;
            border-radius: 12px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 15px;
            font-weight: 700;
            color: #fff;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, var(--teal) 0%, #0891b2 100%);
            box-shadow: 0 4px 24px rgba(13,148,136,0.35), 0 2px 8px rgba(0,0,0,0.3);
            transition: transform .2s, box-shadow .2s;
            letter-spacing: 0.3px;
        }
        .btn-signin:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 32px rgba(13,148,136,0.50), 0 4px 16px rgba(0,0,0,0.4);
        }
        .btn-signin:active { transform: translateY(0); }

        /* Gold shimmer on hover */
        .btn-signin::before {
            content: '';
            position: absolute;
            top: 0; left: -120%;
            width: 80%; height: 100%;
            background: linear-gradient(90deg, transparent, rgba(245,158,11,0.30), transparent);
            transform: skewX(-20deg);
            transition: left .6s ease;
        }
        .btn-signin:hover::before { left: 160%; }

        .btn-signin-inner {
            position: relative;
            z-index: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        .btn-signin-inner svg { width: 18px; height: 18px; }

        /* Divider */
        .form-divider {
            height: 1px;
            background: rgba(255,255,255,0.07);
            margin: 28px 0;
        }

        /* Footer text */
        .form-footer {
            text-align: center;
            font-size: 13px;
            color: var(--text-dim);
            margin-top: 24px;
        }
        .form-footer a {
            color: var(--teal-light);
            font-weight: 600;
            text-decoration: none;
        }
        .form-footer a:hover { color: var(--cyan); }

        /* Powered by */
        .powered-by {
            text-align: center;
            font-size: 11.5px;
            color: var(--text-dim);
            margin-top: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }
        .powered-dot {
            width: 4px; height: 4px;
            border-radius: 50%;
            background: var(--teal);
            display: inline-block;
        }

        /* ============================================================
           RESPONSIVE
        ============================================================ */
        @media (max-width: 1024px) {
            .brand-panel { width: 50%; padding: 48px 32px; }
            .brand-tagline { font-size: 28px; }
        }

        @media (max-width: 768px) {
            .auth-wrapper { flex-direction: column-reverse; }
            .brand-panel  { width: 100%; padding: 40px 24px; }
            .form-panel   { width: 100%; padding: 32px 20px; }
            .brand-tagline { font-size: 26px; }
            .brand-features { display: none; }
            .form-card { padding: 28px 22px; }
            .mobile-logo { display: flex; }
            .brand-content { gap: 20px; }
        }

        @media (max-width: 480px) {
            .brand-panel  { padding: 32px 16px; }
            .form-card    { padding: 24px 18px; border-radius: 20px; }
            .form-header h2 { font-size: 22px; }
            .btn-signin   { padding: 13px 20px; font-size: 14px; }
        }

        /* Scroll-fade in animations */
        .fade-up {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeUp .6s ease forwards;
        }
        .fade-up-1 { animation-delay: .1s; }
        .fade-up-2 { animation-delay: .2s; }
        .fade-up-3 { animation-delay: .3s; }
        .fade-up-4 { animation-delay: .4s; }
        .fade-up-5 { animation-delay: .55s; }
        .fade-up-6 { animation-delay: .7s; }
        @keyframes fadeUp {
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

<div class="auth-wrapper">

    <!-- ====================================================
         LEFT  —  BRAND PANEL
    ==================================================== -->
    <aside class="brand-panel">

        <!-- Orbs -->
        <div class="orb orb-1"></div>
        <div class="orb orb-2"></div>
        <div class="orb orb-3"></div>
        <div class="orb orb-4"></div>

        <!-- Decorative rings -->
        <div class="deco-circle deco-circle-1"></div>
        <div class="deco-circle deco-circle-2"></div>
        <div class="deco-circle deco-circle-3"></div>

        <!-- Decorative dots -->
        <div class="deco-dot deco-dot-1"></div>
        <div class="deco-dot deco-dot-2"></div>
        <div class="deco-dot deco-dot-3"></div>

        <div class="brand-content">

            <!-- Logo -->
            <div class="brand-logo-ring fade-up fade-up-1">
                <!-- Washing Machine SVG -->
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <!-- Body -->
                    <rect x="8" y="4" width="48" height="56" rx="6" fill="rgba(255,255,255,0.08)" stroke="currentColor"/>
                    <!-- Top control panel -->
                    <rect x="8" y="4" width="48" height="14" rx="6" fill="rgba(255,255,255,0.10)" stroke="currentColor"/>
                    <!-- Power dot -->
                    <circle cx="20" cy="11" r="2.5" fill="#10b981" stroke="none"/>
                    <!-- Control dots -->
                    <circle cx="38" cy="11" r="1.5" fill="rgba(255,255,255,0.5)" stroke="none"/>
                    <circle cx="44" cy="11" r="1.5" fill="rgba(255,255,255,0.5)" stroke="none"/>
                    <!-- Door ring outer -->
                    <circle cx="32" cy="38" r="16" stroke="currentColor" stroke-width="2"/>
                    <!-- Door ring inner -->
                    <circle cx="32" cy="38" r="12" stroke="currentColor" stroke-width="1.5" stroke-dasharray="4 2"/>
                    <!-- Door glass -->
                    <circle cx="32" cy="38" r="9" fill="rgba(13,148,136,0.15)" stroke="currentColor" stroke-width="1"/>
                    <!-- Water waves inside -->
                    <path d="M24 38 Q27 35 30 38 Q33 41 36 38 Q39 35 40 38" stroke="#14b8a6" stroke-width="1.5" fill="none" stroke-linecap="round"/>
                    <!-- Drum holes -->
                    <circle cx="27" cy="33" r="1" fill="rgba(255,255,255,0.3)" stroke="none"/>
                    <circle cx="37" cy="33" r="1" fill="rgba(255,255,255,0.3)" stroke="none"/>
                    <circle cx="32" cy="43" r="1" fill="rgba(255,255,255,0.3)" stroke="none"/>
                    <!-- Handle -->
                    <path d="M30 55 Q32 53 34 55" stroke="currentColor" stroke-width="2" fill="none"/>
                </svg>
            </div>

            <div class="fade-up fade-up-2">
                <p class="brand-name">Amazing Laundry Qatar</p>
                <h1 class="brand-tagline">
                    Premium <span>Laundry</span><br>Management
                </h1>
            </div>

            <p class="brand-desc fade-up fade-up-3">
                Streamline your laundry operations with our all-in-one POS platform —
                orders, billing, delivery & analytics in one powerful dashboard.
            </p>

            <!-- Feature pills -->
            <div class="brand-features fade-up fade-up-4">

                <div class="feature-pill">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg>
                    </div>
                    <div class="feature-text">
                        <strong>Real-Time Order Tracking</strong>
                        <span>Monitor every order from drop-off to delivery</span>
                    </div>
                </div>

                <div class="feature-pill">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z"/>
                        </svg>
                    </div>
                    <div class="feature-text">
                        <strong>Smart Analytics Dashboard</strong>
                        <span>Revenue trends, daily stats & KPIs at a glance</span>
                    </div>
                </div>

                <div class="feature-pill">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z"/>
                        </svg>
                    </div>
                    <div class="feature-text">
                        <strong>Integrated Billing & Payments</strong>
                        <span>Invoice generation, payment logs & receipts</span>
                    </div>
                </div>

            </div>

            <!-- Contact / Address -->
            <div class="brand-contact fade-up fade-up-5">
                <div class="contact-row">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z"/>
                    </svg>
                    <span>Al Sadd, Doha, Qatar &mdash; P.O. Box 12345</span>
                </div>
                <div class="contact-row">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z"/>
                    </svg>
                    <a href="tel:+97444001234">+974 4400 1234</a>
                </div>
                <div class="contact-row">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/>
                    </svg>
                    <a href="mailto:info@amazinglaundry.qa">info@amazinglaundry.qa</a>
                </div>
            </div>

        </div>
    </aside>

    <!-- ====================================================
         RIGHT  —  FORM PANEL
    ==================================================== -->
    <main class="form-panel">
        <div class="form-container">

            <!-- Mobile-only logo -->
            <div class="mobile-logo fade-up fade-up-1">
                <div class="mobile-logo-ring">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="8" y="4" width="48" height="56" rx="6" fill="rgba(255,255,255,0.08)" stroke="currentColor"/>
                        <rect x="8" y="4" width="48" height="14" rx="6" fill="rgba(255,255,255,0.10)" stroke="currentColor"/>
                        <circle cx="20" cy="11" r="2.5" fill="#10b981" stroke="none"/>
                        <circle cx="32" cy="38" r="16" stroke="currentColor"/>
                        <circle cx="32" cy="38" r="9" fill="rgba(13,148,136,0.15)" stroke="currentColor" stroke-width="1"/>
                        <path d="M24 38 Q27 35 30 38 Q33 41 36 38 Q39 35 40 38" stroke="#14b8a6" stroke-width="1.5" fill="none" stroke-linecap="round"/>
                    </svg>
                </div>
                <h1>Amazing Laundry Qatar</h1>
                <p>Premium Management System</p>
            </div>

            <!-- Form Card -->
            <div class="form-card fade-up fade-up-2">

                <!-- Header -->
                <div class="form-header">
                    <h2>Welcome Back 👋</h2>
                    <p>Sign in to your account to access the laundry management dashboard.</p>
                </div>

                <!-- Session Status -->
                @if (session('status'))
                    <div class="alert-box alert-success-box" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg>
                        <span>{{ session('status') }}</span>
                    </div>
                @endif

                <!-- Validation Errors -->
                @if ($errors->any())
                    <div class="alert-box alert-error-box" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z"/>
                        </svg>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Login Form -->
                <form method="POST" action="{{ route('login') }}" novalidate>
                    @csrf

                    <!-- Email -->
                    <div class="form-group fade-up fade-up-3">
                        <label for="email" class="form-label">Email Address</label>
                        <div class="input-wrapper">
                            <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/>
                            </svg>
                            <input
                                id="email"
                                type="email"
                                name="email"
                                class="input-dark-field"
                                placeholder="you@example.com"
                                value="{{ old('email') }}"
                                autocomplete="email"
                                required
                                autofocus
                            >
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="form-group fade-up fade-up-4">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-wrapper has-toggle">
                            <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z"/>
                            </svg>
                            <input
                                id="password"
                                type="password"
                                name="password"
                                class="input-dark-field"
                                placeholder="••••••••••"
                                autocomplete="current-password"
                                required
                            >
                            <button type="button" class="pw-toggle" id="pwToggle" aria-label="Toggle password visibility">
                                <!-- Eye icon (show) -->
                                <svg id="eyeShow" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                </svg>
                                <!-- Eye-slash icon (hide) -->
                                <svg id="eyeHide" style="display:none;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Remember Me + Forgot -->
                    <div class="remember-row fade-up fade-up-5">
                        <label class="checkbox-label">
                            <input type="checkbox" name="remember" class="custom-checkbox" id="remember">
                            <span>Remember me</span>
                        </label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="forgot-link">Forgot password?</a>
                        @endif
                    </div>

                    <!-- Submit -->
                    <div class="fade-up fade-up-6">
                        <button type="submit" class="btn-signin">
                            <span class="btn-signin-inner">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9"/>
                                </svg>
                                Sign In
                            </span>
                        </button>
                    </div>

                </form>

                <div class="form-divider"></div>

                <div class="form-footer">
                    &copy; {{ date('Y') }} Amazing Laundry Qatar. All rights reserved.
                </div>

            </div><!-- /.form-card -->

            <div class="powered-by">
                <span class="powered-dot"></span>
                <span>Secure &middot; Encrypted &middot; Enterprise-grade</span>
                <span class="powered-dot"></span>
            </div>

        </div><!-- /.form-container -->
    </main>

</div><!-- /.auth-wrapper -->

<script>
    // Password toggle
    (function () {
        const toggle  = document.getElementById('pwToggle');
        const pwField = document.getElementById('password');
        const eyeShow = document.getElementById('eyeShow');
        const eyeHide = document.getElementById('eyeHide');

        if (!toggle || !pwField) return;

        toggle.addEventListener('click', function () {
            const isHidden = pwField.type === 'password';
            pwField.type   = isHidden ? 'text' : 'password';
            eyeShow.style.display = isHidden ? 'none'  : 'block';
            eyeHide.style.display = isHidden ? 'block' : 'none';
        });
    })();
</script>

</body>
</html>