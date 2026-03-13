<!-- Sidebar -->
<nav class="sidebar" id="sidebar">
    <a class="sidebar-logo" href="<?php echo base_url('admin/dashboard'); ?>">
        <div class="sidebar-logo-icon"><i class="fas fa-layer-group"></i></div>
        <span class="sidebar-logo-text">PortfolioAdmin</span>
    </a>

    <div class="sidebar-nav">
        <div class="sidebar-section-label">Main</div>
        <a href="<?php echo base_url('admin/dashboard'); ?>"
            class="sidebar-link <?php echo $title == 'Dashboard' ? 'active' : ''; ?>">
            <i class="fas fa-th-large"></i>
            <span class="sidebar-link-text">Dashboard</span>
        </a>

        <div class="sidebar-section-label">Content</div>
        <a href="<?php echo base_url('admin/hero'); ?>"
            class="sidebar-link <?php echo strpos($title, 'Hero') !== false ? 'active' : ''; ?>">
            <i class="fas fa-home"></i>
            <span class="sidebar-link-text">Hero Section</span>
        </a>
        <a href="<?php echo base_url('admin/about'); ?>"
            class="sidebar-link <?php echo strpos($title, 'About') !== false ? 'active' : ''; ?>">
            <i class="fas fa-user"></i>
            <span class="sidebar-link-text">About Section</span>
        </a>
        <a href="<?php echo base_url('admin/skills'); ?>"
            class="sidebar-link <?php echo strpos($title, 'Skill') !== false ? 'active' : ''; ?>">
            <i class="fas fa-chart-bar"></i>
            <span class="sidebar-link-text">Skills</span>
        </a>
        <a href="<?php echo base_url('admin/services'); ?>"
            class="sidebar-link <?php echo strpos($title, 'Service') !== false ? 'active' : ''; ?>">
            <i class="fas fa-concierge-bell"></i>
            <span class="sidebar-link-text">Services</span>
        </a>

        <div class="sidebar-section-label">Portfolio</div>
        <a href="<?php echo base_url('admin/categories'); ?>"
            class="sidebar-link <?php echo strpos($title, 'Categor') !== false ? 'active' : ''; ?>">
            <i class="fas fa-folder"></i>
            <span class="sidebar-link-text">Categories</span>
        </a>
        <a href="<?php echo base_url('admin/portfolio'); ?>"
            class="sidebar-link <?php echo strpos($title, 'Portfolio') !== false && $title !== 'Dashboard' ? 'active' : ''; ?>">
            <i class="fas fa-images"></i>
            <span class="sidebar-link-text">Portfolio</span>
        </a>
        <a href="<?php echo base_url('admin/testimonials'); ?>"
            class="sidebar-link <?php echo strpos($title, 'Testimonial') !== false ? 'active' : ''; ?>">
            <i class="fas fa-quote-right"></i>
            <span class="sidebar-link-text">Testimonials</span>
        </a>

        <div class="sidebar-section-label">Blog & Inbox</div>
        <a href="<?php echo base_url('admin/blog'); ?>"
            class="sidebar-link <?php echo strpos($title, 'Blog') !== false ? 'active' : ''; ?>">
            <i class="fas fa-edit"></i>
            <span class="sidebar-link-text">Blog Posts</span>
        </a>
        <a href="<?php echo base_url('admin/messages'); ?>"
            class="sidebar-link <?php echo strpos($title, 'Message') !== false ? 'active' : ''; ?>">
            <i class="fas fa-envelope"></i>
            <span class="sidebar-link-text">Messages</span>
            <?php $unread = $this->Contact_model->count_unread();
            if ($unread > 0): ?>
                <span class="sidebar-badge"><?php echo $unread; ?></span>
            <?php endif; ?>
        </a>

        <div class="sidebar-section-label">System</div>
        <a href="<?php echo base_url('admin/settings'); ?>"
            class="sidebar-link <?php echo strpos($title, 'Setting') !== false ? 'active' : ''; ?>">
            <i class="fas fa-cog"></i>
            <span class="sidebar-link-text">Settings</span>
        </a>
        <a href="<?php echo base_url(); ?>" target="_blank" class="sidebar-link">
            <i class="fas fa-external-link-alt"></i>
            <span class="sidebar-link-text">View Website</span>
        </a>
    </div>

    <div class="sidebar-footer">
        <div class="sidebar-user">
            <div class="sidebar-user-avatar">
                <?php if ($this->session->userdata('admin_profile_image')): ?>
                    <img src="<?php echo base_url('uploads/admin/' . $this->session->userdata('admin_profile_image')); ?>"
                        alt="">
                <?php else: ?>
                    <?php echo strtoupper(substr($this->session->userdata('admin_username'), 0, 1)); ?>
                <?php endif; ?>
            </div>
            <div style="overflow:hidden;flex:1;">
                <div class="sidebar-user-name"><?php echo $this->session->userdata('admin_username'); ?></div>
                <div class="sidebar-user-role">Administrator</div>
            </div>
            <a href="<?php echo base_url('admin/logout'); ?>"
                style="color:var(--text-muted);font-size:0.85rem;transition:color 0.2s;" title="Logout"><i
                    class="fas fa-sign-out-alt"></i></a>
        </div>
    </div>
</nav>

<!-- Main Wrapper -->
<div class="main-wrapper" id="mainWrapper">
    <!-- Topbar -->
    <div class="topbar">
        <button class="topbar-toggle" id="sidebarToggle" onclick="toggleSidebar()">
            <i class="fas fa-bars"></i>
        </button>
        <div class="topbar-breadcrumb">
            <span style="color:var(--text-muted)">Admin /</span>
            <strong><?php echo isset($title) ? $title : 'Dashboard'; ?></strong>
        </div>
        <div class="topbar-actions">
            <a href="<?php echo base_url(); ?>" target="_blank" class="topbar-btn" title="View Website">
                <i class="fas fa-external-link-alt"></i>
            </a>
            <a href="<?php echo base_url('admin/messages'); ?>" class="topbar-btn" title="Messages">
                <i class="fas fa-envelope"></i>
                <?php $unread = $this->Contact_model->count_unread();
                if ($unread > 0): ?>
                    <span
                        style="position:absolute;top:-4px;right:-4px;width:16px;height:16px;border-radius:50%;background:var(--danger);color:#fff;font-size:0.6rem;display:flex;align-items:center;justify-content:center;font-weight:700;"><?php echo $unread; ?></span>
                <?php endif; ?>
            </a>
            <div class="dropdown">
                <a class="topbar-avatar dropdown-toggle" href="#" role="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false" title="<?php echo $this->session->userdata('admin_username'); ?>" style="text-decoration: none;">
                    <?php if ($this->session->userdata('admin_profile_image')): ?>
                        <img src="<?php echo base_url('uploads/admin/' . $this->session->userdata('admin_profile_image')); ?>"
                            alt="">
                    <?php else: ?>
                        <?php echo strtoupper(substr($this->session->userdata('admin_username'), 0, 1)); ?>
                    <?php endif; ?>
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark-custom" aria-labelledby="profileDropdown">
                    <li>
                        <div class="px-3 py-2 text-center mb-2" style="border-bottom: 1px solid var(--card-border);">
                            <h6 class="mb-0 text-white"><?php echo $this->session->userdata('admin_username'); ?></h6>
                            <small class="text-muted" style="font-size: 0.75rem;">Administrator</small>
                        </div>
                    </li>
                    <li><a class="dropdown-item" href="<?php echo base_url('admin/settings'); ?>"><i class="fas fa-cog"></i> Account Settings</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-danger" href="<?php echo base_url('admin/logout'); ?>"><i class="fas fa-sign-out-alt text-danger"></i> Logout</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Flash messages -->
    <?php if ($this->session->flashdata('success')): ?>
        <div
            style="margin:16px 28px 0;background:rgba(34,197,94,0.12);border:1px solid rgba(34,197,94,0.25);color:var(--success);padding:12px 18px;border-radius:12px;font-size:0.9rem;display:flex;align-items:center;gap:8px;">
            <i class="fas fa-check-circle"></i> <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')): ?>
        <div
            style="margin:16px 28px 0;background:rgba(239,68,68,0.12);border:1px solid rgba(239,68,68,0.25);color:var(--danger);padding:12px 18px;border-radius:12px;font-size:0.9rem;display:flex;align-items:center;gap:8px;">
            <i class="fas fa-exclamation-circle"></i> <?php echo $this->session->flashdata('error'); ?>
        </div>
    <?php endif; ?>

    <!-- Content Area -->
    <div class="content-wrap">
