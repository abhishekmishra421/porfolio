<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($title) ? $title : $settings->site_title; ?></title>
    <meta name="description" content="<?php echo $settings->site_description; ?>">
    <meta name="keywords" content="<?php echo $settings->site_keywords; ?>">
    <?php if ($settings->site_favicon): ?>
        <link rel="icon" type="image/png" href="<?php echo base_url('uploads/settings/' . $settings->site_favicon); ?>">
    <?php
endif; ?>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        /* ============================================================
           CSS CUSTOM PROPERTIES
        ============================================================ */
        :root {
            --primary:        #7c6cff;
            --primary-light:  #a59bff;
            --secondary:      #4facfe;
            --accent:         #00f2fe;
            --pink:           #f857a6;
            --cyan:           #43e9f5;
            --dark:           #070b18;
            --dark2:          #0d1225;
            --dark3:          #121830;
            --card-bg:        rgba(255,255,255,0.03);
            --text:           #e4eaf5;
            --text-muted:     #8a9bbf;
            --border:         rgba(255,255,255,0.07);
            --border-glow:    rgba(124,108,255,0.35);
            --gradient:       linear-gradient(135deg, #7c6cff 0%, #4facfe 100%);
            --gradient-alt:   linear-gradient(135deg, #f857a6 0%, #7c6cff 100%);
            --gradient-glow:  linear-gradient(135deg, rgba(124,108,255,0.25) 0%, rgba(79,172,254,0.25) 100%);
            --shadow-lg:      0 25px 80px rgba(0,0,0,0.6);
            --shadow-glow:    0 0 40px rgba(124,108,255,0.3);
        }

        *, *::before, *::after { margin:0; padding:0; box-sizing:border-box; }
        html { scroll-behavior: smooth; }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--dark);
            color: var(--text);
            line-height: 1.7;
            overflow-x: hidden;
            cursor: auto;
        }



        /* ============================================================
           SCROLLBAR
        ============================================================ */
        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-track { background: var(--dark2); }
        ::-webkit-scrollbar-thumb { background: var(--primary); border-radius: 4px; }

        /* ============================================================
           NOISE TEXTURE OVERLAY
        ============================================================ */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            z-index: 0;
            opacity: 0.025;
            pointer-events: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='300' height='300'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4'/%3E%3C/filter%3E%3Crect width='300' height='300' filter='url(%23n)' opacity='1'/%3E%3C/svg%3E");
        }

        /* ============================================================
           NAVBAR
        ============================================================ */
        .navbar {
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 9999;
            padding: 0.9rem 0;
            background: rgba(7, 11, 24, 0.7) !important;
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border-bottom: 1px solid rgba(255,255,255,0.06);
            box-shadow: 0 4px 30px rgba(0,0,0,0.3);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1000;
        }
        .navbar.scrolled {
            padding: 0.7rem 0;
            background: rgba(7, 11, 24, 0.95) !important;
            box-shadow: 0 10px 40px rgba(0,0,0,0.5);
            border-bottom-color: rgba(124,108,255,0.15);
        }
        .navbar-brand {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 1.45rem;
            font-weight: 800;
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-decoration: none;
            display: flex;
            align-items: center;
        }
        .navbar-brand img { height: 40px; width: auto; }

        /* Desktop nav links - Dark Theme & One Row */
        .nav-link {
            font-size: 0.95rem;
            font-weight: 600;
            color: rgba(228, 234, 245, 0.85) !important;
            margin: 0 1.2rem;
            padding: 0.5rem 0 !important;
            transition: all 0.25s ease;
            letter-spacing: 0.3px;
            position: relative;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -4px; left: 0;
            width: 100%; height: 3.5px;
            background: var(--gradient);
            border-radius: 10px;
            transform: scaleX(0);
            transform-origin: center;
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .nav-link:hover, .nav-link.active {
            color: #fff !important;
        }
        .nav-link:hover::after, .nav-link.active::after { transform: scaleX(1); }

        /* Contact CTA button - Specific Blue Gradient Pill */
        .nav-contact-btn {
            background: linear-gradient(135deg, #7c6cff 0%, #4facfe 100%) !important;
            color: #fff !important;
            padding: 0.75rem 2.2rem !important;
            font-size: 0.95rem !important;
            font-weight: 700 !important;
            border-radius: 50px !important;
            border: none !important;
            box-shadow: 0 8px 25px rgba(124, 108, 255, 0.3);
            transition: all 0.3s ease !important;
            white-space: nowrap;
        }
        .nav-contact-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(124, 108, 255, 0.45);
        }
        /* ============================================================
           MOBILE DRAWER (right-to-left slide)
        ============================================================ */

        /* Hide Bootstrap collapse on mobile; we use drawer instead */
        @media (max-width: 991px) {
            /* Completely remove the collapse element from flow */
            #navbarNav {
                display: none !important;
            }
        }

        /* Overlay backdrop */
        .drawer-overlay {
            display: none;
            position: fixed;
            inset: 0;
            z-index: 10000;
            background: rgba(0,0,0,0.65);
            backdrop-filter: blur(4px);
            -webkit-backdrop-filter: blur(4px);
            opacity: 0;
            transition: opacity 0.35s ease;
        }
        .drawer-overlay.active {
            display: block;
            opacity: 1;
        }

        /* Drawer panel - Premium Dark Theme */
        .nav-drawer {
            position: fixed;
            top: 0; right: 0; bottom: 0;
            z-index: 10001;
            width: 300px;
            max-width: 85vw;
            background: rgba(13, 18, 37, 0.98);
            border-left: 1px solid rgba(255,255,255,0.08);
            box-shadow: -20px 0 80px rgba(0,0,0,0.6);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            transform: translateX(100%);
            transition: transform 0.38s cubic-bezier(0.4,0,0.2,1);
            display: flex;
            flex-direction: column;
            padding: 0;
            overflow-y: auto;
        }
        .nav-drawer.open {
            transform: translateX(0);
        }

        /* Drawer header */
        .nav-drawer-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1.2rem 1.4rem;
            border-bottom: 1px solid rgba(255,255,255,0.06);
        }
        .nav-drawer-brand {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 1.3rem; font-weight: 700;
            background: var(--gradient);
            -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
        }
        .nav-drawer-close {
            width: 38px; height: 38px;
            border: 1px solid rgba(255,255,255,0.15);
            border-radius: 10px;
            background: rgba(255,255,255,0.05);
            color: #fff;
            display: flex; align-items: center; justify-content: center;
            cursor: pointer;
            font-size: 1.1rem;
            transition: all 0.25s ease;
        }
        .nav-drawer-close:hover {
            background: rgba(124,108,255,0.15);
            border-color: rgba(124,108,255,0.4);
            color: var(--primary-light);
            transform: rotate(90deg);
        }

        /* Drawer nav links */
        .nav-drawer-body {
            flex: 1;
            padding: 1.2rem 1rem;
            display: flex;
            flex-direction: column;
            gap: 0.3rem;
        }
        .nav-drawer-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.85rem 1rem;
            border-radius: 12px;
            color: rgba(228, 234, 245, 0.8);
            text-decoration: none;
            font-size: 1rem; font-weight: 600;
            transition: all 0.25s ease;
            border: 1px solid transparent;
            position: relative;
            overflow: hidden;
        }
        .nav-drawer-link .dicon {
            width: 34px; height: 34px;
            border-radius: 9px;
            background: rgba(124,108,255,0.12);
            display: flex; align-items: center; justify-content: center;
            font-size: 0.88rem; color: var(--primary-light);
            flex-shrink: 0;
            transition: all 0.25s ease;
        }
        .nav-drawer-link:hover {
            color: #fff;
            background: rgba(255,255,255,0.05);
            border-color: rgba(124,108,255,0.2);
            padding-left: 1.3rem;
        }
        .nav-drawer-link:hover .dicon {
            background: var(--gradient);
            color: #fff;
        }
        .nav-drawer-link.active {
            color: #fff;
            background: rgba(124,108,255,0.12);
            border-color: rgba(124,108,255,0.25);
        }
        .nav-drawer-link.active .dicon {
            background: var(--gradient); color: #fff;
        }

        /* Drawer footer CTA */
        .nav-drawer-footer {
            padding: 1rem 1.2rem 1.4rem;
            border-top: 1px solid rgba(255,255,255,0.08);
        }
        .nav-drawer-footer .btn-primary-grad {
            width: 100%; justify-content: center;
            border-radius: 14px !important;
            padding: 0.85rem 1rem;
        }

        /* Toggler button — standard hamburger, animates to X when open */
        #drawerToggler {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 42px;
            height: 42px;
            padding: 0;
            position: relative;
        }
        #drawerToggler .toggler-ham,
        #drawerToggler .toggler-x {
            position: absolute;
            font-size: 1.25rem;
            transition: opacity 0.25s ease, transform 0.3s ease;
        }
        #drawerToggler .toggler-ham { opacity: 1; transform: rotate(0deg); color: #fff; }
        #drawerToggler .toggler-x  { opacity: 0; transform: rotate(-90deg); color: #fff; }
        #drawerToggler.is-open .toggler-ham { opacity: 0; transform: rotate(90deg); }
        #drawerToggler.is-open .toggler-x  { opacity: 1; transform: rotate(0deg); }

        /* ============================================================
           HERO
        ============================================================ */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
            padding: 100px 0 80px;
        }
        #hero-canvas {
            position: absolute;
            inset: 0;
            z-index: 0;
            width: 100%;
            height: 100%;
        }
        .hero-bg {
            position: absolute;
            inset: 0;
            z-index: 1;
            background:
                radial-gradient(ellipse 80% 80% at 15% 50%, rgba(124,108,255,0.18) 0%, transparent 60%),
                radial-gradient(ellipse 60% 60% at 85% 15%, rgba(79,172,254,0.14) 0%, transparent 55%),
                radial-gradient(ellipse 50% 50% at 65% 85%, rgba(248,87,166,0.1) 0%, transparent 50%);
        }
        .hero-bg-img {
            position: absolute;
            inset: 0; z-index: 1;
        }
        .hero-bg-img img {
            width:100%; height:100%;
            object-fit: cover;
            opacity: 0.08;
        }
        .hero-bg-img::after {
            content:'';
            position:absolute;
            inset:0;
            background: linear-gradient(to right, rgba(7,11,24,0.97) 35%, rgba(7,11,24,0.6));
        }
        .hero-content-wrap {
            position: relative;
            z-index: 2;
        }

        /* Floating shapes */
        .hero-shapes {
            position: absolute;
            inset: 0;
            z-index: 1;
            pointer-events: none;
            overflow: hidden;
        }
        .shape {
            position: absolute;
            border-radius: 50%;
            filter: blur(60px);
            opacity: 0.35;
            animation: shape-float 8s ease-in-out infinite;
        }
        .shape-1 {
            width: 350px; height: 350px;
            background: radial-gradient(circle, rgba(124,108,255,0.6), transparent);
            top: -80px; left: -80px;
            animation-delay: 0s;
        }
        .shape-2 {
            width: 250px; height: 250px;
            background: radial-gradient(circle, rgba(79,172,254,0.55), transparent);
            top: 30%; right: -50px;
            animation-delay: -3s;
        }
        .shape-3 {
            width: 200px; height: 200px;
            background: radial-gradient(circle, rgba(248,87,166,0.5), transparent);
            bottom: 10%; left: 40%;
            animation-delay: -5s;
        }
        @keyframes shape-float {
            0%,100% { transform: translateY(0) scale(1); }
            50%      { transform: translateY(-30px) scale(1.05); }
        }

        /* Hero badge */
        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(124,108,255,0.12);
            border: 1px solid rgba(124,108,255,0.3);
            padding: 6px 18px;
            border-radius: 50px;
            font-size: 0.78rem;
            font-weight: 700;
            color: var(--primary-light);
            margin-bottom: 1.8rem;
            letter-spacing: 2px;
            text-transform: uppercase;
        }
        .hero-badge .pulse-dot {
            width: 7px; height: 7px;
            background: #22c55e;
            border-radius: 50%;
            box-shadow: 0 0 0 0 rgba(34,197,94,0.5);
            animation: pulse-green 1.8s ease-in-out infinite;
        }
        @keyframes pulse-green {
            0%   { box-shadow: 0 0 0 0 rgba(34,197,94,0.5); }
            70%  { box-shadow: 0 0 0 10px rgba(34,197,94,0); }
            100% { box-shadow: 0 0 0 0 rgba(34,197,94,0); }
        }

        /* Hero title */
        .hero-title {
            font-family: 'Space Grotesk', sans-serif;
            font-size: clamp(2.8rem, 6.5vw, 5.5rem);
            font-weight: 700;
            line-height: 1.05;
            letter-spacing: -2.5px;
            margin-bottom: 1.2rem;
        }
        .gradient-text {
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            filter: drop-shadow(0 0 24px rgba(124,108,255,0.4));
        }
        .gradient-text-alt {
            background: var(--gradient-alt);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Typewriter */
        .hero-subtitle {
            font-size: clamp(1rem, 2.5vw, 1.3rem);
            color: var(--text-muted);
            margin-bottom: 1.8rem;
            font-weight: 400;
        }
        .hero-subtitle strong { color: var(--secondary); font-weight: 600; }
        .typewriter-text {
            color: var(--secondary);
            font-weight: 700;
            border-right: 2px solid var(--secondary);
            padding-right: 3px;
            animation: blink-caret 0.8s step-end infinite;
        }
        @keyframes blink-caret {
            from,to { border-color: var(--secondary); }
            50%     { border-color: transparent; }
        }
        .hero-description {
            font-size: 1.05rem;
            color: var(--text-muted);
            max-width: 540px;
            margin-bottom: 2.5rem;
            line-height: 1.8;
        }

        /* Hero buttons */
        .hero-btns { display: flex; gap: 1rem; flex-wrap: wrap; }

        .btn-primary-grad {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 0.9rem 2.4rem;
            background: var(--gradient);
            color: #fff;
            border: none;
            border-radius: 50px;
            font-weight: 700;
            font-size: 0.93rem;
            text-decoration: none;
            transition: all 0.35s cubic-bezier(0.4,0,0.2,1);
            box-shadow: 0 6px 30px rgba(124,108,255,0.45);
            position: relative;
            overflow: hidden;
            cursor: pointer;
            letter-spacing: 0.3px;
        }
        .btn-primary-grad::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(255,255,255,0.22) 0%, transparent 100%);
            opacity: 0;
            transition: opacity 0.3s;
        }
        .btn-primary-grad::after {
            content: '';
            position: absolute;
            inset: -2px;
            border-radius: 50px;
            background: var(--gradient);
            z-index: -1;
            opacity: 0;
            filter: blur(15px);
            transition: opacity 0.4s;
        }
        .btn-primary-grad:hover {
            color: #fff;
            transform: translateY(-4px) scale(1.02);
            box-shadow: 0 12px 40px rgba(124,108,255,0.6);
        }
        .btn-primary-grad:hover::before { opacity: 1; }
        .btn-primary-grad:hover::after  { opacity: 0.6; }

        .btn-outline-grad {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 0.9rem 2.4rem;
            background: transparent;
            color: var(--text);
            border: 1px solid var(--border);
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.93rem;
            text-decoration: none;
            transition: all 0.35s ease;
            cursor: pointer;
        }
        .btn-outline-grad:hover {
            color: #fff;
            border-color: var(--primary);
            background: rgba(124,108,255,0.12);
            transform: translateY(-4px);
            box-shadow: 0 8px 30px rgba(124,108,255,0.25);
        }

        /* Hero profile */
        .hero-profile-wrap {
            position: relative;
            display: inline-block;
        }
        .hero-3d-orb {
            width: 300px;
            height: 300px;
            margin: 0 auto;
            position: relative;
        }
        .hero-profile-ring {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            padding: 3px;
            background: conic-gradient(from 0deg, #7c6cff, #4facfe, #f857a6, #00f2fe, #7c6cff);
            animation: spin-ring 6s linear infinite;
        }
        @keyframes spin-ring {
            to { transform: rotate(0deg); }
        }
        .hero-profile-inner {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            overflow: hidden;
            border: 5px solid var(--dark);
        }
        .hero-profile-inner img {
            width: 100%; height: 100%; object-fit: cover;
        }
        .hero-profile-icon {
            position: absolute;
            bottom: 12px; right: 12px;
            width: 56px; height: 56px;
            background: var(--gradient);
            border-radius: 50%;
            border: 3px solid var(--dark);
            display: flex; align-items: center; justify-content: center;
            font-size: 1.3rem; color: #fff;
            animation: spin-ring 6s linear infinite reverse;
            box-shadow: 0 0 20px rgba(124,108,255,0.6);
        }

        /* Floating tech badges around profile */
        .tech-badge {
            position: absolute;
            background: rgba(13,18,37,0.9);
            border: 1px solid var(--border-glow);
            border-radius: 12px;
            padding: 8px 14px;
            font-size: 0.78rem;
            font-weight: 700;
            color: var(--text);
            display: flex; align-items: center; gap: 6px;
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 24px rgba(0,0,0,0.4), 0 0 0 1px rgba(124,108,255,0.15);
            animation: badge-float 4s ease-in-out infinite;
            white-space: nowrap;
        }
        .tech-badge i { font-size: 1rem; }
        .tb-1 { top: -10px; left: -60px; animation-delay: 0s; }
        .tb-2 { top: 50%; right: -70px; transform: translateY(-50%); animation-delay: -1.5s; }
        .tb-3 { bottom: -5px; left: -50px; animation-delay: -3s; }
        @keyframes badge-float {
            0%,100% { transform: translateY(0); }
            50%      { transform: translateY(-8px); }
        }
        .tb-2 { animation-name: badge-float-right; }
        @keyframes badge-float-right {
            0%,100% { transform: translateY(-50%); }
            50%      { transform: translateY(calc(-50% - 8px)); }
        }

        /* Hero stats */
        .hero-stats {
            display: flex; gap: 2.5rem; margin-top: 2.8rem; flex-wrap: wrap;
        }
        .hero-stat-item { text-align: center; }
        .hero-stat-value {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 2.2rem; font-weight: 800;
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1.1;
        }
        .hero-stat-label {
            font-size: 0.72rem; color: var(--text-muted);
            text-transform: uppercase; letter-spacing: 1.5px;
        }

        /* Scroll indicator */
        .scroll-indicator {
            position: absolute;
            bottom: 32px; left: 50%;
            transform: translateX(-50%);
            z-index: 2;
            display: flex; flex-direction: column; align-items: center; gap: 8px;
            color: var(--text-muted); font-size: 0.7rem;
            letter-spacing: 2px; text-transform: uppercase;
        }
        .scroll-mouse {
            width: 22px; height: 36px;
            border: 2px solid rgba(255,255,255,0.2);
            border-radius: 12px;
            display: flex; justify-content: center;
        }
        .scroll-mouse::before {
            content: '';
            width: 4px; height: 8px;
            background: var(--primary);
            border-radius: 2px;
            margin-top: 6px;
            animation: scroll-wheel 1.8s ease-in-out infinite;
        }
        @keyframes scroll-wheel {
            0%   { transform: translateY(0); opacity: 1; }
            100% { transform: translateY(10px); opacity: 0; }
        }

        /* ============================================================
           SECTIONS
        ============================================================ */
        .section { padding: 110px 0; }
        .section-alt { background: rgba(255,255,255,0.015); }

        .section-label {
            display: inline-flex; align-items: center; gap: 10px;
            font-size: 0.72rem; font-weight: 800;
            letter-spacing: 3.5px; text-transform: uppercase;
            color: var(--primary); margin-bottom: 1rem;
        }
        .section-label::before, .section-label::after {
            content: ''; height: 1px; background: var(--primary); width: 28px;
        }
        .section-title-main {
            font-family: 'Space Grotesk', sans-serif;
            font-size: clamp(2rem, 4.5vw, 3.2rem);
            font-weight: 700;
            letter-spacing: -1.5px;
            margin-bottom: 1rem;
            line-height: 1.15;
        }
        .section-title-main .gradient-text { filter: drop-shadow(0 0 16px rgba(124,108,255,0.35)); }
        .section-subtitle {
            color: var(--text-muted); font-size: 1.05rem; max-width: 600px;
        }

        /* ============================================================
           GLASS / TILT CARDS
        ============================================================ */
        .glass-card {
            background: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: 20px;
            backdrop-filter: blur(12px);
            transition: all 0.35s ease;
        }
        .glass-card:hover {
            background: rgba(255,255,255,0.05);
            border-color: var(--border-glow);
            box-shadow: 0 20px 60px rgba(124,108,255,0.18);
        }
        /* VanillaTilt perspective wrapper */
        [data-tilt] { transform-style: preserve-3d; }
        [data-tilt] .tilt-inner { transform: translateZ(20px); }

        /* ============================================================
           SERVICE CARDS
        ============================================================ */
        .service-card {
            padding: 2.5rem 2rem 3rem;
            border-radius: 22px;
            background: rgba(255,255,255,0.028);
            border: 1px solid var(--border);
            transition: all 0.4s cubic-bezier(0.4,0,0.2,1);
            position: relative;
            overflow: hidden;
            height: 100%;
            transform-style: preserve-3d;
        }
        .service-card::before {
            content: '';
            position: absolute; inset: 0;
            opacity: 0;
            background: var(--gradient-glow);
            transition: opacity 0.4s;
        }
        .service-card::after {
            content: '';
            position: absolute;
            inset: -1px;
            border-radius: 22px;
            background: var(--gradient);
            z-index: -1;
            opacity: 0;
            transition: opacity 0.4s;
        }
        .service-card:hover {
            transform: translateY(-10px);
            border-color: transparent;
            box-shadow: 0 30px 80px rgba(124,108,255,0.25);
        }
        .service-card:hover::before { opacity: 1; }
        .service-card:hover::after  { opacity: 1; }
        .service-icon-wrap {
            width: 72px; height: 72px;
            border-radius: 20px;
            background: var(--gradient);
            display: flex; align-items: center; justify-content: center;
            font-size: 1.9rem; color: #fff;
            margin-bottom: 1.6rem;
            box-shadow: 0 10px 30px rgba(124,108,255,0.45);
            transition: transform 0.4s ease;
            position: relative; z-index: 1;
        }
        .service-card:hover .service-icon-wrap { transform: scale(1.12) rotate(8deg) translateZ(30px); }
        .service-card h4 {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 1.15rem; font-weight: 700;
            margin-bottom: 0.8rem; color: #fff; position: relative; z-index:1;
        }
        .service-card p {
            color: var(--text-muted); font-size: 0.92rem;
            line-height: 1.75; margin: 0; position: relative; z-index:1;
        }
        .service-arrow {
            position: absolute; bottom: 1.5rem; right: 1.5rem;
            width: 38px; height: 38px; border-radius: 50%;
            background: rgba(124,108,255,0.1);
            border: 1px solid rgba(124,108,255,0.3);
            display: flex; align-items: center; justify-content: center;
            color: var(--primary); font-size: 0.9rem;
            transition: all 0.35s ease; z-index:1;
        }
        .service-card:hover .service-arrow {
            background: var(--gradient);
            border-color: transparent; color: #fff;
            transform: rotate(45deg) scale(1.1);
        }

        /* ============================================================
           SKILL BARS
        ============================================================ */
        .skill-item { margin-bottom: 1.8rem; }
        .skill-header {
            display: flex; justify-content: space-between; align-items: center;
            margin-bottom: 0.6rem;
        }
        .skill-name { font-weight: 700; font-size: 0.92rem; color: #fff; }
        .skill-pct {
            font-size: 0.85rem; font-weight: 800;
            background: var(--gradient);
            -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
        }
        .skill-track {
            height: 7px; background: rgba(255,255,255,0.06);
            border-radius: 10px; overflow: hidden; position: relative;
        }
        .skill-track::before {
            content: '';
            position: absolute; inset: 0;
            background: linear-gradient(90deg, transparent 50%, rgba(255,255,255,0.03) 50%);
            background-size: 20px 100%;
        }
        .skill-fill {
            height: 100%; border-radius: 10px;
            background: var(--gradient);
            position: relative;
            transition: width 1.8s cubic-bezier(0.4,0,0.2,1);
            box-shadow: 0 0 12px rgba(124,108,255,0.6);
        }
        .skill-fill::after {
            content: '';
            position: absolute; right: 0; top: 50%;
            transform: translateY(-50%);
            width: 12px; height: 12px; border-radius: 50%;
            background: #fff;
            box-shadow: 0 0 10px rgba(124,108,255,0.9), 0 0 4px #fff;
        }

        /* ============================================================
           PORTFOLIO CARDS
        ============================================================ */
        .portfolio-card {
            border-radius: 18px; overflow: hidden;
            border: 1px solid var(--border);
            transition: all 0.4s cubic-bezier(0.4,0,0.2,1);
            transform-style: preserve-3d;
            background: var(--card-bg);
        }
        .portfolio-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 30px 80px rgba(0,0,0,0.5), 0 0 0 1px rgba(124,108,255,0.3);
        }
        .portfolio-img {
            height: 240px; overflow: hidden; position: relative;
        }
        .portfolio-img img {
            width:100%; height:100%; object-fit:cover;
            transition: transform 0.7s cubic-bezier(0.4,0,0.2,1);
        }
        .portfolio-card:hover .portfolio-img img { transform: scale(1.12); }
        .portfolio-overlay {
            position: absolute; inset: 0;
            background: linear-gradient(to top, rgba(7,11,24,0.97) 0%, rgba(124,108,255,0.55) 100%);
            display: flex; align-items: center; justify-content: center; gap: 1rem;
            opacity: 0; transition: opacity 0.4s;
        }
        .portfolio-card:hover .portfolio-overlay { opacity: 1; }
        .portfolio-overlay a {
            width: 50px; height: 50px; border-radius: 50%;
            background: rgba(255,255,255,0.12);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.25);
            display: flex; align-items: center; justify-content: center;
            color: #fff; text-decoration: none; font-size: 1.1rem;
            transition: all 0.35s; transform: translateY(24px);
        }
        .portfolio-card:hover .portfolio-overlay a { transform: translateY(0); }
        .portfolio-overlay a:hover { background: var(--gradient); border-color: transparent; }
        .portfolio-body {
            padding: 1.5rem;
            background: rgba(255,255,255,0.02);
        }
        .portfolio-category {
            font-size: 0.7rem; font-weight: 800; letter-spacing: 2.5px;
            text-transform: uppercase; color: var(--primary); margin-bottom: 0.4rem;
        }
        .portfolio-title { font-family:'Space Grotesk',sans-serif; font-size:1rem; font-weight:700; color:#fff; margin:0; }

        /* ============================================================
           TESTIMONIAL CARDS
        ============================================================ */
        .testimonial-card {
            padding: 2.2rem;
            border-radius: 22px;
            background: rgba(255,255,255,0.025);
            border: 1px solid var(--border);
            height: 100%; position: relative;
            transition: all 0.35s ease;
            transform-style: preserve-3d;
        }
        .testimonial-card:hover {
            border-color: var(--border-glow);
            box-shadow: 0 20px 60px rgba(124,108,255,0.18);
            transform: translateY(-6px);
        }
        .testimonial-card::before {
            content: '\201C';
            position: absolute; top: 1.2rem; right: 1.8rem;
            font-size: 5.5rem; color: rgba(124,108,255,0.18);
            line-height: 1; font-family: Georgia, serif;
        }
        .testimonial-stars { color: #fbbf24; margin-bottom: 1rem; font-size: 0.88rem; }
        .testimonial-text {
            color: var(--text-muted); font-size: 0.95rem;
            line-height: 1.85; margin-bottom: 1.6rem; font-style: italic;
        }
        .testimonial-author { display: flex; align-items: center; gap: 1rem; }
        .testimonial-avatar {
            width: 52px; height: 52px; border-radius: 50%; overflow: hidden;
            border: 2px solid rgba(124,108,255,0.45); flex-shrink: 0;
        }
        .testimonial-avatar img { width:100%; height:100%; object-fit: cover; }
        .testimonial-avatar-placeholder {
            width: 52px; height: 52px; border-radius: 50%;
            background: var(--gradient);
            display: flex; align-items: center; justify-content: center;
            font-weight: 800; font-size: 1.2rem; color: #fff;
            border: 2px solid rgba(124,108,255,0.45);
        }
        .testimonial-name { font-weight: 700; font-size: 0.95rem; color: #fff; margin-bottom: 0.2rem; }
        .testimonial-role { font-size: 0.78rem; color: var(--text-muted); }

        /* ============================================================
           BLOG CARDS
        ============================================================ */
        .blog-card {
            border-radius: 18px; overflow: hidden;
            border: 1px solid var(--border);
            background: rgba(255,255,255,0.025);
            transition: all 0.4s ease; height: 100%;
            transform-style: preserve-3d;
        }
        .blog-card:hover {
            transform: translateY(-8px);
            border-color: rgba(124,108,255,0.3);
            box-shadow: 0 25px 60px rgba(0,0,0,0.35);
        }
        .blog-img { height: 210px; overflow: hidden; position: relative; }
        .blog-img img {
            width:100%; height:100%; object-fit:cover;
            transition: transform 0.55s ease;
        }
        .blog-card:hover .blog-img img { transform: scale(1.08); }
        .blog-date-badge {
            position: absolute; top: 1rem; left: 1rem;
            background: var(--gradient); padding: 4px 14px;
            border-radius: 50px; font-size: 0.7rem; font-weight: 800; color: #fff;
        }
        .blog-body { padding: 1.5rem; }
        .blog-title {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 1rem; font-weight: 700; color: #fff;
            margin-bottom: 0.6rem; text-decoration: none;
            display: block; line-height: 1.4;
        }
        .blog-title:hover { color: var(--primary-light); }
        .blog-excerpt { font-size: 0.88rem; color: var(--text-muted); margin-bottom: 1rem; }
        .blog-meta {
            display: flex; align-items: center; gap: 1rem;
            font-size: 0.8rem; color: var(--text-muted);
        }
        .blog-meta i { color: var(--primary); }

        /* ============================================================
           ABOUT SECTION
        ============================================================ */
        .about-img-wrap { position: relative; display: block; width: 100%; }
        .about-img {
            border-radius: 30px; overflow: hidden;
            border: 1px solid var(--border);
            box-shadow: 0 40px 100px rgba(0,0,0,0.5);
            width: 100%;
        }
        .about-img img { width:100%; height:600px; object-fit:cover; }
        .about-exp-badge {
            position: absolute; bottom: -20px; right: -20px;
            background: var(--gradient);
            border-radius: 18px; padding: 1.3rem 1.6rem; text-align: center;
            box-shadow: 0 10px 35px rgba(124,108,255,0.5);
        }
        .about-exp-badge .num {
            font-family: 'Space Grotesk',sans-serif;
            font-size: 2.7rem; font-weight: 800; color: #fff; line-height:1;
        }
        .about-exp-badge .label {
            font-size: 0.72rem; color: rgba(255,255,255,0.82);
            text-transform: uppercase; letter-spacing: 1.5px;
        }
        .about-meta-item {
            display: flex; gap: 0.6rem; margin-bottom: 0.9rem; font-size:0.92rem;
        }
        .about-meta-item i { color: var(--primary); width:20px; margin-top:3px; flex-shrink:0; }
        .about-meta-item span { color: var(--text-muted); }
        .about-meta-item strong { color: #fff; }

        /* ============================================================
           CONTACT FORM
        ============================================================ */
        .contact-info-card {
            padding: 2rem; border-radius: 18px;
            background: rgba(255,255,255,0.028); border: 1px solid var(--border);
            margin-bottom: 1rem; display: flex; gap: 1rem; align-items: flex-start;
            transition: all 0.3s ease;
        }
        .contact-info-card:hover { border-color: var(--border-glow); background: rgba(255,255,255,0.04); }
        .contact-icon {
            width: 50px; height: 50px; border-radius: 14px;
            background: var(--gradient); display: flex; align-items:center; justify-content:center;
            font-size: 1.15rem; color:#fff; flex-shrink:0;
            box-shadow: 0 6px 20px rgba(124,108,255,0.4);
        }
        .contact-info-label { font-size:0.72rem; text-transform:uppercase; letter-spacing:1.5px; color:var(--text-muted); margin-bottom:0.2rem; }
        .contact-info-value { font-weight:700; color:#fff; font-size:0.95rem; }
        .form-floating-custom { position: relative; margin-bottom: 1.3rem; }
        .form-floating-custom input,
        .form-floating-custom textarea,
        .form-floating-custom select {
            width:100%; background: rgba(255,255,255,0.04);
            border: 1px solid var(--border); border-radius: 14px;
            color: #fff; padding: 1rem 1.3rem;
            font-family: 'Inter', sans-serif; font-size: 0.95rem;
            transition: all 0.3s ease; outline: none;
        }
        .form-floating-custom input::placeholder,
        .form-floating-custom textarea::placeholder { color: var(--text-muted); }
        .form-floating-custom input:focus,
        .form-floating-custom textarea:focus {
            border-color: var(--primary);
            background: rgba(124,108,255,0.07);
            box-shadow: 0 0 0 4px rgba(124,108,255,0.12);
        }
        .form-floating-custom label {
            display:block; font-size:0.82rem; font-weight:700;
            color:var(--text-muted); margin-bottom:0.5rem;
        }

        /* ============================================================
           FOOTER
        ============================================================ */
        .footer { background: var(--dark2); border-top: 1px solid var(--border); padding: 80px 0 32px; }
        .footer-brand {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 1.65rem; font-weight: 700;
            background: var(--gradient);
            -webkit-background-clip: text; -webkit-text-fill-color:transparent; background-clip:text;
            margin-bottom: 1rem;
        }
        .footer-desc { color:var(--text-muted); font-size:0.9rem; max-width:280px; }
        .footer-social { display:flex; gap:0.7rem; margin-top:1.6rem; }
        .footer-social a {
            width: 42px; height:42px; border-radius:12px;
            background: rgba(255,255,255,0.04); border:1px solid var(--border);
            display:flex; align-items:center; justify-content:center;
            color:var(--text-muted); font-size:1.05rem;
            transition: all 0.3s ease; text-decoration:none;
        }
        .footer-social a:hover {
            background: var(--gradient); border-color:transparent;
            color:#fff; transform:translateY(-4px);
            box-shadow: 0 8px 20px rgba(124,108,255,0.4);
        }
        .footer-heading { font-size:0.82rem; font-weight:800; text-transform:uppercase; letter-spacing:2.5px; color:#fff; margin-bottom:1.3rem; }
        .footer-links { list-style:none; padding:0; margin:0; }
        .footer-links li { margin-bottom:0.75rem; }
        .footer-links a {
            color:var(--text-muted); text-decoration:none; font-size:0.9rem;
            transition: color 0.3s ease; display:flex; align-items:center; gap:6px;
        }
        .footer-links a::before { content:'→'; opacity:0; transition:all 0.3s; margin-left:-14px; }
        .footer-links a:hover { color:var(--primary-light); }
        .footer-links a:hover::before { opacity:1; margin-left:0; }
        .footer-bottom {
            border-top:1px solid var(--border); margin-top:55px; padding-top:28px;
            display:flex; justify-content:space-between; align-items:center;
            flex-wrap:wrap; gap:1rem;
        }
        .footer-copy { color:var(--text-muted); font-size:0.85rem; }

        /* ============================================================
           ANIMATIONS
        ============================================================ */
        @keyframes fadeInUp {
            from { opacity:0; transform:translateY(40px); }
            to   { opacity:1; transform:translateY(0); }
        }
        .animate-1 { animation: fadeInUp 0.8s cubic-bezier(0.4,0,0.2,1) 0.1s both; }
        .animate-2 { animation: fadeInUp 0.8s cubic-bezier(0.4,0,0.2,1) 0.2s both; }
        .animate-3 { animation: fadeInUp 0.8s cubic-bezier(0.4,0,0.2,1) 0.3s both; }
        .animate-4 { animation: fadeInUp 0.8s cubic-bezier(0.4,0,0.2,1) 0.4s both; }
        .animate-5 { animation: fadeInUp 0.8s cubic-bezier(0.4,0,0.2,1) 0.55s both; }

        /* GSAP reveal classes */
        .reveal-up   { opacity:0; transform: translateY(50px); }
        .reveal-left { opacity:0; transform: translateX(-50px); }
        .reveal-right{ opacity:0; transform: translateX(50px); }
        .reveal-scale { opacity:0; transform: scale(0.85); }

        /* ============================================================
           MISC UTILITIES
        ============================================================ */
        .divider {
            width: 50px; height: 3px;
            background: var(--gradient); border-radius: 3px; margin: 1rem 0;
        }
        .tag-chip {
            display: inline-flex; align-items: center; gap: 5px;
            background: rgba(124,108,255,0.12); border: 1px solid rgba(124,108,255,0.25);
            color: var(--primary-light); padding: 4px 14px;
            border-radius: 50px; font-size: 0.78rem; font-weight: 700;
        }
        .back-to-top {
            position: fixed; bottom: 30px; right: 30px;
            width: 48px; height: 48px;
            background: var(--gradient); color: #fff; border: none;
            border-radius: 14px; font-size: 1rem; cursor: pointer;
            z-index: 9999; opacity: 0; transform: translateY(20px);
            transition: all 0.4s cubic-bezier(0.4,0,0.2,1);
            box-shadow: 0 6px 24px rgba(124,108,255,0.45);
            display: flex; align-items: center; justify-content: center;
            text-decoration: none;
        }
        .back-to-top.visible { opacity:1; transform:translateY(0); }
        .back-to-top:hover { color:#fff; transform:translateY(-4px); box-shadow:0 12px 32px rgba(124,108,255,0.6); }

        /* Glow line decorators for sections */
        .glow-line {
            width: 100%; height: 1px;
            background: linear-gradient(90deg, transparent, rgba(124,108,255,0.4), rgba(79,172,254,0.4), transparent);
        }

        /* ============================================================
           RESPONSIVE
        ============================================================ */
        @media (max-width:991px) {
            .hero { text-align: center; }
            .hero-btns { justify-content: center; }
            .hero-stats { justify-content: center; }
            .hero-3d-orb { width:240px; height:240px; }
            .tb-1,.tb-2,.tb-3 { display:none; }
            .about-exp-badge { right:0; bottom:-15px; }
        }
        @media (max-width:576px) {
            .section { padding: 75px 0; }
            .hero { padding: 110px 0 70px; }
            #hero-canvas { display:none; }
        }

        /* Pages without hero: push content below fixed navbar */
        .page-top-offset {
            padding-top: 100px;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="<?php echo base_url(); ?>">
                <?php if ($settings->site_logo): ?>
                    <img src="<?php echo base_url('uploads/settings/' . $settings->site_logo); ?>" alt="<?php echo $settings->site_title; ?>">
                <?php
else: ?>
                    <?php echo $settings->site_title; ?>
                <?php
endif; ?>
            </a>
            <!-- Desktop: hidden on mobile, drawer handles mobile -->
            <button class="navbar-toggler d-lg-none" id="drawerToggler" type="button" aria-label="Toggle navigation">
                <i class="fas fa-bars toggler-ham"></i>
                <i class="fas fa-times toggler-x"></i>
            </button>

            <!-- Desktop nav (hidden on mobile) -->
            <div class="collapse navbar-collapse d-none d-lg-flex justify-content-center" id="navbarNav">
                <ul class="navbar-nav mx-auto align-items-center">
                    <li class="nav-item"><a class="nav-link <?php echo current_url() == base_url() ? 'active' : ''; ?>" href="<?php echo base_url(); ?>">Home</a></li>
                    <li class="nav-item"><a class="nav-link <?php echo current_url() == base_url('about') ? 'active' : ''; ?>" href="<?php echo base_url('about'); ?>">About</a></li>
                    <li class="nav-item"><a class="nav-link <?php echo current_url() == base_url('portfolio') ? 'active' : ''; ?>" href="<?php echo base_url('portfolio'); ?>">Portfolio</a></li>
                    <li class="nav-item"><a class="nav-link <?php echo current_url() == base_url('blog') ? 'active' : ''; ?>" href="<?php echo base_url('blog'); ?>">Blog</a></li>
                </ul>
            </div>

            <div class="d-none d-lg-block">
                <a class="btn-primary-grad nav-contact-btn" href="<?php echo base_url('contact'); ?>">
                    Contact <i class="fas fa-arrow-right ms-1" style="font-size:0.8em"></i>
                </a>
            </div>
        </div>
    </nav>

    <!-- ============================================================
         RIGHT-TO-LEFT MOBILE DRAWER
    ============================================================ -->
    <div class="drawer-overlay" id="drawerOverlay"></div>
    <div class="nav-drawer" id="navDrawer">
        <!-- Drawer Header -->
        <div class="nav-drawer-header">
            <span class="nav-drawer-brand"><?php echo $settings->site_title; ?></span>
            <button class="nav-drawer-close" id="drawerClose" aria-label="Close menu">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <!-- Drawer Links -->
        <div class="nav-drawer-body">
            <a href="<?php echo base_url(); ?>" class="nav-drawer-link <?php echo current_url() == base_url() ? 'active' : ''; ?>">
                <span class="dicon"><i class="fas fa-home"></i></span> Home
            </a>
            <a href="<?php echo base_url('about'); ?>" class="nav-drawer-link <?php echo current_url() == base_url('about') ? 'active' : ''; ?>">
                <span class="dicon"><i class="fas fa-user"></i></span> About
            </a>
            <a href="<?php echo base_url('portfolio'); ?>" class="nav-drawer-link <?php echo current_url() == base_url('portfolio') ? 'active' : ''; ?>">
                <span class="dicon"><i class="fas fa-briefcase"></i></span> Portfolio
            </a>
            <a href="<?php echo base_url('blog'); ?>" class="nav-drawer-link <?php echo current_url() == base_url('blog') ? 'active' : ''; ?>">
                <span class="dicon"><i class="fas fa-newspaper"></i></span> Blog
            </a>
        </div>
        <!-- Drawer Footer CTA -->
        <div class="nav-drawer-footer">
            <a href="<?php echo base_url('contact'); ?>" class="btn-primary-grad">
                <i class="fas fa-envelope"></i> Get In Touch
            </a>
        </div>
    </div>

    <!-- Back to top -->
    <a href="#" class="back-to-top" id="backToTop"><i class="fas fa-chevron-up"></i></a>

    <!-- Flash messages -->
    <?php if ($this->session->flashdata('success')): ?>
        <div style="position:fixed;top:88px;right:20px;z-index:99999;max-width:360px;animation:fadeInUp 0.5s ease both;">
            <div style="background:linear-gradient(135deg,#7c6cff,#4facfe);color:#fff;padding:15px 22px;border-radius:14px;font-size:0.9rem;font-weight:700;box-shadow:0 10px 40px rgba(124,108,255,0.5);">
                <i class="fas fa-check-circle me-2"></i><?php echo $this->session->flashdata('success'); ?>
            </div>
        </div>
    <?php
endif; ?>
    <?php if ($this->session->flashdata('error')): ?>
        <div style="position:fixed;top:88px;right:20px;z-index:99999;max-width:360px;animation:fadeInUp 0.5s ease both;">
            <div style="background:linear-gradient(135deg,#ff4757,#ff6b81);color:#fff;padding:15px 22px;border-radius:14px;font-size:0.9rem;font-weight:700;box-shadow:0 10px 40px rgba(255,71,87,0.5);">
                <i class="fas fa-exclamation-circle me-2"></i><?php echo $this->session->flashdata('error'); ?>
            </div>
        </div>
    <?php
endif; ?>

    <main>