<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin — <?php echo isset($title) ? $title : 'Dashboard'; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs5.min.css" rel="stylesheet">

    <style>
        :root {
            --sidebar-w: 260px;
            --topbar-h: 64px;
            --primary: #6c63ff;
            --primary-light: #8b85ff;
            --secondary: #4facfe;
            --success: #22c55e;
            --danger: #ef4444;
            --warning: #f59e0b;
            --info: #06b6d4;
            --dark: #0f0c29;
            --sidebar-bg: #1a1a2e;
            --sidebar-bg2: #16213e;
            --body-bg: #0d1117;
            --card-bg: #161b27;
            --card-border: rgba(255, 255, 255, 0.07);
            --text: #e2e8f0;
            --text-muted: #64748b;
            --gradient: linear-gradient(135deg, #6c63ff 0%, #4facfe 100%);
        }

        *,
        *::before,
        *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
            overflow-x: hidden;
            width: 100%;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--body-bg);
            color: var(--text);
            overflow-x: hidden;
            width: 100%;
            position: relative;
        }

        ::-webkit-scrollbar {
            width: 5px;
            height: 5px;
        }

        ::-webkit-scrollbar-track {
            background: var(--sidebar-bg);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary);
            border-radius: 3px;
        }

        /* ====== SIDEBAR ====== */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-w);
            height: 100vh;
            background: linear-gradient(180deg, var(--sidebar-bg) 0%, var(--sidebar-bg2) 100%);
            border-right: 1px solid rgba(255, 255, 255, 0.05);
            z-index: 1050;
            overflow-y: auto;
            overflow-x: hidden;
            transition: transform 0.3s ease, width 0.3s ease;
            display: flex;
            flex-direction: column;
        }

        .sidebar.collapsed {
            width: 72px;
        }

        .sidebar-logo {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 22px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
            text-decoration: none;
            min-height: var(--topbar-h);
        }

        .sidebar-logo-icon {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background: var(--gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            color: #fff;
            flex-shrink: 0;
            box-shadow: 0 4px 15px rgba(108, 99, 255, 0.4);
        }

        .sidebar-logo-text {
            font-size: 1.1rem;
            font-weight: 800;
            letter-spacing: -0.5px;
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            white-space: nowrap;
            overflow: hidden;
            transition: opacity 0.3s ease, width 0.3s ease;
        }

        .sidebar.collapsed .sidebar-logo-text {
            opacity: 0;
            width: 0;
        }

        .sidebar-nav {
            padding: 16px 12px;
            flex: 1;
        }

        .sidebar-section-label {
            font-size: 0.65rem;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--text-muted);
            padding: 0 10px 8px;
            margin-top: 16px;
            white-space: nowrap;
            overflow: hidden;
            transition: opacity 0.3s;
        }

        .sidebar.collapsed .sidebar-section-label {
            opacity: 0;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 12px;
            border-radius: 10px;
            color: var(--text-muted);
            text-decoration: none;
            transition: all 0.2s ease;
            margin-bottom: 3px;
            position: relative;
            white-space: nowrap;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .sidebar-link i {
            font-size: 1rem;
            width: 20px;
            text-align: center;
            flex-shrink: 0;
        }

        .sidebar-link-text {
            overflow: hidden;
            transition: opacity 0.3s, width 0.3s;
        }

        .sidebar.collapsed .sidebar-link-text {
            opacity: 0;
            width: 0;
        }

        .sidebar-link:hover {
            background: rgba(108, 99, 255, 0.12);
            color: #fff;
        }

        .sidebar-link.active {
            background: rgba(108, 99, 255, 0.18);
            color: var(--primary-light);
            border: 1px solid rgba(108, 99, 255, 0.2);
        }

        .sidebar-link.active::before {
            content: '';
            position: absolute;
            left: 0;
            top: 20%;
            bottom: 20%;
            width: 3px;
            background: var(--gradient);
            border-radius: 0 3px 3px 0;
        }

        .sidebar-badge {
            margin-left: auto;
            background: var(--danger);
            color: #fff;
            font-size: 0.65rem;
            font-weight: 700;
            padding: 2px 7px;
            border-radius: 20px;
            flex-shrink: 0;
            transition: opacity 0.3s;
        }

        .sidebar.collapsed .sidebar-badge {
            opacity: 0;
        }

        .sidebar-footer {
            padding: 16px;
            border-top: 1px solid rgba(255, 255, 255, 0.06);
        }

        .sidebar-user {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.04);
            text-decoration: none;
            transition: background 0.2s;
        }

        .sidebar-user:hover {
            background: rgba(255, 255, 255, 0.08);
        }

        .sidebar-user-avatar {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: var(--gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            color: #fff;
            font-size: 0.85rem;
            flex-shrink: 0;
            overflow: hidden;
        }

        .sidebar-user-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .sidebar-user-name {
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--text);
            white-space: nowrap;
            overflow: hidden;
            transition: opacity 0.3s;
        }

        .sidebar-user-role {
            font-size: 0.72rem;
            color: var(--text-muted);
            white-space: nowrap;
            overflow: hidden;
            transition: opacity 0.3s;
        }

        .sidebar.collapsed .sidebar-user-name,
        .sidebar.collapsed .sidebar-user-role {
            opacity: 0;
        }

        /* ====== MAIN LAYOUT ====== */
        .main-wrapper {
            margin-left: var(--sidebar-w);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            transition: margin-left 0.3s ease, width 0.3s ease;
            width: calc(100% - var(--sidebar-w));
            box-sizing: border-box;
            overflow-x: hidden;
            min-width: 0;
            max-width: 100%;
        }

        .main-wrapper.expanded {
            margin-left: 72px;
            width: calc(100% - 72px);
        }

        /* ====== TOPBAR ====== */
        .topbar {
            height: var(--topbar-h);
            background: var(--card-bg);
            border-bottom: 1px solid var(--card-border);
            display: flex;
            align-items: center;
            padding: 0 24px;
            gap: 16px;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .topbar-toggle {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            border: 1px solid var(--card-border);
            background: rgba(255, 255, 255, 0.04);
            color: var(--text);
            font-size: 1rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
            flex-shrink: 0;
        }

        .topbar-toggle:hover {
            background: rgba(108, 99, 255, 0.15);
            border-color: rgba(108, 99, 255, 0.3);
            color: var(--primary-light);
        }

        .topbar-breadcrumb {
            flex: 1;
            font-size: 0.85rem;
            color: var(--text-muted);
        }

        .topbar-breadcrumb strong {
            color: var(--text);
        }

        .topbar-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .topbar-btn {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            border: 1px solid var(--card-border);
            background: rgba(255, 255, 255, 0.04);
            color: var(--text-muted);
            font-size: 0.9rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
            text-decoration: none;
            position: relative;
        }

        .topbar-btn:hover {
            color: var(--text);
            background: rgba(255, 255, 255, 0.08);
        }

        .topbar-avatar {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            background: var(--gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            color: #fff;
            font-size: 0.85rem;
            cursor: pointer;
            overflow: hidden;
            border: 2px solid rgba(108, 99, 255, 0.3);
            text-decoration: none;
        }

        .topbar-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* ====== CONTENT ====== */
        .container, .container-fluid, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {
            max-width: 100% !important;
            padding-left: 0 !important;
            padding-right: 0 !important;
        }

        .content-wrap {
            padding: 24px;
            flex: 1;
            width: 100%;
            overflow-x: hidden;
            box-sizing: border-box;
            min-width: 0;
            max-width: 100%;
        }

        .row {
            margin-right: 0;
            margin-left: 0;
            width: 100%;
        }

        /* ====== PAGE HEADER ====== */
        .page-title-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 28px;
            flex-wrap: wrap;
            gap: 12px;
        }

        .page-title-bar h1 {
            font-size: 1.4rem;
            font-weight: 700;
            margin: 0;
        }

        .breadcrumb {
            background: none;
            padding: 0;
            margin: 0;
            font-size: 0.8rem;
        }

        .breadcrumb-item {
            color: var(--text-muted);
        }

        .breadcrumb-item a {
            color: var(--text-muted);
            text-decoration: none;
            transition: color 0.2s;
        }

        .breadcrumb-item a:hover {
            color: var(--primary-light);
        }

        .breadcrumb-item.active {
            color: var(--primary-light);
        }

        .breadcrumb-item+.breadcrumb-item::before {
            color: var(--text-muted);
        }

        /* ====== STAT CARDS ====== */
        .stat-card {
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            border-radius: 16px;
            padding: 22px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: -30%;
            right: -10%;
            width: 120px;
            height: 120px;
            border-radius: 50%;
            opacity: 0.08;
            transition: opacity 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            border-color: rgba(108, 99, 255, 0.2);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.3);
        }

        .stat-card:hover::before {
            opacity: 0.14;
        }

        .stat-icon {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            color: #fff;
            margin-bottom: 16px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
        }

        .stat-label {
            font-size: 0.78rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--text-muted);
            margin-bottom: 6px;
            font-weight: 600;
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 800;
            color: #fff;
            margin-bottom: 8px;
            letter-spacing: -1px;
        }

        .stat-trend {
            font-size: 0.78rem;
            color: var(--text-muted);
        }

        .stat-trend .up {
            color: var(--success);
        }

        .stat-trend .down {
            color: var(--danger);
        }

        /* ====== CARDS ====== */
        .admin-card {
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            border-radius: 16px;
            overflow: hidden;
        }

        .admin-card-header {
            padding: 18px 22px;
            border-bottom: 1px solid var(--card-border);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .admin-card-header h5 {
            font-size: 1rem;
            font-weight: 700;
            margin: 0;
        }

        .admin-card-body {
            padding: 22px;
        }

        .table {
            color: var(--text);
            margin: 0;
            background: transparent;
        }

        .table th {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--text-muted);
            border-color: var(--card-border);
            padding: 12px 16px;
            font-weight: 600;
            background: rgba(255, 255, 255, 0.02);
            border-bottom: 2px solid var(--card-border);
        }

        .table td {
            border-color: var(--card-border);
            padding: 12px 16px;
            vertical-align: middle;
            font-size: 0.9rem;
            color: var(--text);
            background: transparent;
        }

        .table-responsive {
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .table tbody tr:hover {
            background: rgba(255, 255, 255, 0.02);
        }

        .table-hover>tbody>tr:hover>* {
            background: rgba(108, 99, 255, 0.05);
            color: var(--text);
        }

        /* ====== FORMS ====== */
        .form-label {
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--text);
            margin-bottom: 6px;
        }

        .form-control,
        .form-select {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid var(--card-border);
            color: var(--text);
            border-radius: 10px;
            padding: 10px 14px;
            font-family: 'Inter', sans-serif;
            font-size: 0.9rem;
            transition: all 0.2s ease;
        }

        .form-control:focus,
        .form-select:focus {
            background: rgba(108, 99, 255, 0.08);
            border-color: rgba(108, 99, 255, 0.5);
            color: var(--text);
            box-shadow: 0 0 0 3px rgba(108, 99, 255, 0.15);
        }

        .form-control::placeholder {
            color: var(--text-muted);
        }

        .form-select option {
            background: var(--card-bg);
            color: var(--text);
        }

        /* ====== BUTTONS ====== */
        .btn-grad {
            background: var(--gradient);
            color: #fff;
            border: none;
            padding: 9px 20px;
            border-radius: 10px;
            font-size: 0.88rem;
            font-weight: 600;
            transition: all 0.3s;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            text-decoration: none;
            box-shadow: 0 4px 15px rgba(108, 99, 255, 0.3);
        }

        .btn-grad:hover {
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(108, 99, 255, 0.4);
        }

        .btn-ghost {
            background: rgba(255, 255, 255, 0.05);
            color: var(--text);
            border: 1px solid var(--card-border);
            padding: 9px 20px;
            border-radius: 10px;
            font-size: 0.88rem;
            font-weight: 600;
            transition: all 0.2s;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            text-decoration: none;
        }

        .btn-ghost:hover {
            background: rgba(255, 255, 255, 0.1);
            color: var(--text);
        }

        .btn-danger-soft {
            background: rgba(239, 68, 68, 0.12);
            color: var(--danger);
            border: 1px solid rgba(239, 68, 68, 0.2);
            padding: 9px 20px;
            border-radius: 10px;
            font-size: 0.88rem;
            font-weight: 600;
            transition: all 0.2s;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            text-decoration: none;
        }

        .btn-danger-soft:hover {
            background: rgba(239, 68, 68, 0.2);
            color: var(--danger);
        }

        .action-btn {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 0.85rem;
            border: 1px solid;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
        }

        .action-btn-edit {
            background: rgba(108, 99, 255, 0.12);
            color: var(--primary);
            border-color: rgba(108, 99, 255, 0.2);
        }

        .action-btn-edit:hover {
            background: rgba(108, 99, 255, 0.25);
            color: var(--primary);
        }

        .action-btn-delete {
            background: rgba(239, 68, 68, 0.12);
            color: var(--danger);
            border-color: rgba(239, 68, 68, 0.2);
        }

        .action-btn-delete:hover {
            background: rgba(239, 68, 68, 0.25);
            color: var(--danger);
        }

        .action-btn-view {
            background: rgba(6, 182, 212, 0.12);
            color: var(--info);
            border-color: rgba(6, 182, 212, 0.2);
        }

        .action-btn-view:hover {
            background: rgba(6, 182, 212, 0.25);
            color: var(--info);
        }

        /* ====== BADGES ====== */
        .badge-active {
            background: rgba(34, 197, 94, 0.15);
            color: var(--success);
            border: 1px solid rgba(34, 197, 94, 0.2);
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .badge-inactive {
            background: rgba(239, 68, 68, 0.15);
            color: var(--danger);
            border: 1px solid rgba(239, 68, 68, 0.2);
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .badge-pending {
            background: rgba(245, 158, 11, 0.15);
            color: var(--warning);
            border: 1px solid rgba(245, 158, 11, 0.2);
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .badge-read {
            background: rgba(6, 182, 212, 0.12);
            color: var(--info);
            border: 1px solid rgba(6, 182, 212, 0.2);
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        /* ====== ALERTS ====== */
        .alert {
            border-radius: 12px;
            border: 1px solid;
            font-size: 0.9rem;
        }

        .alert-success {
            background: rgba(34, 197, 94, 0.1);
            border-color: rgba(34, 197, 94, 0.25);
            color: var(--success);
        }

        .alert-danger {
            background: rgba(239, 68, 68, 0.1);
            border-color: rgba(239, 68, 68, 0.25);
            color: var(--danger);
        }

        .alert-warning {
            background: rgba(245, 158, 11, 0.1);
            border-color: rgba(245, 158, 11, 0.25);
            color: var(--warning);
        }

        .alert-info {
            background: rgba(6, 182, 212, 0.1);
            border-color: rgba(6, 182, 212, 0.25);
            color: var(--info);
        }

        /* ====== CHECKBOX / TOGGLE ====== */
        .form-check-input:checked {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .form-check-input {
            background-color: rgba(255, 255, 255, 0.08);
            border-color: var(--card-border);
        }

        /* ====== IMAGE PREVIEW ====== */
        .img-preview {
            width: 80px;
            height: 80px;
            border-radius: 10px;
            object-fit: cover;
            border: 2px solid var(--card-border);
        }

        /* ====== RESPONSIVE ====== */
        @media (max-width: 991px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.mobile-open {
                transform: translateX(0);
            }

            .main-wrapper {
                margin-left: 0 !important;
                width: 100% !important;
                max-width: 100% !important;
                overflow-x: hidden !important;
            }

            .content-wrap {
                padding: 15px;
                overflow-x: hidden;
                width: 100% !important;
                max-width: 100% !important;
                box-sizing: border-box;
            }

            .topbar {
                padding: 0 15px;
                width: 100% !important;
                max-width: 100% !important;
                overflow-x: hidden;
                box-sizing: border-box;
            }
        }

        .sidebar-overlay {
            display: none;
            position: fixed;
            inset: 0;
            z-index: 1049;
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(4px);
        }

        /* DataTables dark overrides */
        .dataTables_wrapper .dataTables_length select,
        .dataTables_wrapper .dataTables_filter input {
            background: rgba(255, 255, 255, 0.05);
            border-color: var(--card-border);
            color: var(--text);
            border-radius: 8px;
            padding: 5px 10px;
        }

        .dataTables_wrapper .dataTables_info,
        .dataTables_wrapper .dataTables_length label,
        .dataTables_wrapper .dataTables_filter label {
            color: var(--text-muted);
            font-size: 0.85rem;
        }

        .dataTables_wrapper .dataTables_paginate .page-link {
            background: rgba(255, 255, 255, 0.05);
            border-color: var(--card-border);
            color: var(--text);
            border-radius: 8px;
            margin: 0 2px;
        }

        .dataTables_wrapper .dataTables_paginate .page-item.active .page-link {
            background: var(--gradient);
            border-color: transparent;
        }

        /* ====== DROPDOWN ====== */
        .dropdown-menu-dark-custom {
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            border-radius: 12px;
            padding: 8px 0;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
            margin-top: 10px !important;
        }
        .dropdown-menu-dark-custom .dropdown-item {
            color: var(--text);
            padding: 10px 20px;
            font-size: 0.9rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.2s;
        }
        .dropdown-menu-dark-custom .dropdown-item i {
            color: var(--text-muted);
            font-size: 1rem;
            width: 20px;
            text-align: center;
            transition: color 0.2s;
        }
        .dropdown-menu-dark-custom .dropdown-item:hover {
            background: rgba(255, 255, 255, 0.05);
            color: #fff;
        }
        .dropdown-menu-dark-custom .dropdown-item:hover i {
            color: var(--primary-light);
        }
        .dropdown-menu-dark-custom .dropdown-divider {
            border-top-color: var(--card-border);
            margin: 8px 0;
        }
        
    </style>
</head>

<body>
    <div class="sidebar-overlay" id="sidebarOverlay" onclick="closeSidebar()"></div>
    <div class="d-flex">
