<!-- Page Title -->
<div class="page-title-bar">
    <div>
        <h1>Dashboard</h1>
        <p style="color:var(--text-muted);font-size:0.85rem;margin-top:2px;">Welcome back, <strong
                style="color:var(--primary-light)"><?php echo $this->session->userdata('admin_username'); ?></strong>!
            Here's what's happening.</p>
    </div>
    <a href="<?php echo base_url('admin/settings'); ?>" class="btn-ghost">
        <i class="fas fa-cog"></i> Settings
    </a>
</div>

<!-- Stat Cards -->
<div class="row g-4 mb-4">
    <div class="col-xl-3 col-md-6">
        <div class="stat-card" style="border-top:3px solid #6c63ff">
            <div class="stat-icon" style="background:linear-gradient(135deg,#6c63ff,#4facfe)">
                <i class="fas fa-images"></i>
            </div>
            <div class="stat-label">Portfolio Items</div>
            <div class="stat-value"><?php echo $total_portfolio; ?></div>
            <div class="stat-trend">
                <a href="<?php echo base_url('admin/portfolio'); ?>"
                    style="color:var(--primary-light);font-size:0.8rem;text-decoration:none;">
                    View all <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="stat-card" style="border-top:3px solid #f093fb">
            <div class="stat-icon" style="background:linear-gradient(135deg,#f093fb,#f5576c)">
                <i class="fas fa-edit"></i>
            </div>
            <div class="stat-label">Blog Posts</div>
            <div class="stat-value"><?php echo $total_blog; ?></div>
            <div class="stat-trend">
                <a href="<?php echo base_url('admin/blog'); ?>"
                    style="color:#f093fb;font-size:0.8rem;text-decoration:none;">
                    View all <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="stat-card" style="border-top:3px solid #4facfe">
            <div class="stat-icon" style="background:linear-gradient(135deg,#4facfe,#00f2fe)">
                <i class="fas fa-envelope"></i>
            </div>
            <div class="stat-label">Unread Messages</div>
            <div class="stat-value"><?php echo $total_messages; ?></div>
            <div class="stat-trend">
                <a href="<?php echo base_url('admin/messages'); ?>"
                    style="color:#4facfe;font-size:0.8rem;text-decoration:none;">
                    View all <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="stat-card" style="border-top:3px solid #43e97b">
            <div class="stat-icon" style="background:linear-gradient(135deg,#43e97b,#38f9d7)">
                <i class="fas fa-chart-bar"></i>
            </div>
            <div class="stat-label">Skills Listed</div>
            <div class="stat-value"><?php echo $total_skills; ?></div>
            <div class="stat-trend">
                <a href="<?php echo base_url('admin/skills'); ?>"
                    style="color:#43e97b;font-size:0.8rem;text-decoration:none;">
                    View all <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions + Recent Messages -->
<div class="row g-4">
    <!-- Quick Actions -->
    <div class="col-12">
        <div class="admin-card h-100">
            <div class="admin-card-header">
                <h5><i class="fas fa-bolt me-2" style="color:var(--warning)"></i>Quick Actions</h5>
            </div>
            <div class="admin-card-body" style="display:flex;flex-direction:column;gap:10px;">
                <a href="<?php echo base_url('admin/skill_add'); ?>" class="btn-ghost"
                    style="justify-content:flex-start;">
                    <i class="fas fa-plus" style="color:var(--primary)"></i> Add New Skill
                </a>
                <a href="<?php echo base_url('admin/portfolio_add'); ?>" class="btn-ghost"
                    style="justify-content:flex-start;">
                    <i class="fas fa-plus" style="color:#f093fb"></i> Add Portfolio Item
                </a>
                <a href="<?php echo base_url('admin/blog_add'); ?>" class="btn-ghost"
                    style="justify-content:flex-start;">
                    <i class="fas fa-plus" style="color:#4facfe"></i> Write Blog Post
                </a>
                <a href="<?php echo base_url('admin/settings'); ?>" class="btn-ghost"
                    style="justify-content:flex-start;">
                    <i class="fas fa-cog" style="color:#43e97b"></i> Site Settings
                </a>
                <a href="<?php echo base_url(); ?>" target="_blank" class="btn-ghost"
                    style="justify-content:flex-start;">
                    <i class="fas fa-external-link-alt" style="color:var(--warning)"></i> View Live Site
                </a>
            </div>
        </div>
    </div>

    <!-- Recent Messages -->
    <div class="col-12">
        <div class="admin-card">
            <div class="admin-card-header">
                <h5><i class="fas fa-inbox me-2" style="color:var(--info)"></i>Recent Messages</h5>
                <a href="<?php echo base_url('admin/messages'); ?>" class="btn-ghost"
                    style="padding:6px 14px;font-size:0.8rem;">View All</a>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>From</th>
                            <th>Subject</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($recent_messages)): ?>
                            <?php foreach ($recent_messages as $msg): ?>
                                <tr>
                                    <td>
                                        <div style="display:flex;align-items:center;gap:10px;">
                                            <div
                                                style="width:34px;height:34px;border-radius:50%;background:linear-gradient(135deg,#6c63ff,#4facfe);display:flex;align-items:center;justify-content:center;font-weight:700;color:#fff;font-size:0.85rem;flex-shrink:0;">
                                                <?php echo strtoupper(substr($msg->name, 0, 1)); ?>
                                            </div>
                                            <div>
                                                <div style="font-weight:600;font-size:0.88rem;color:#fff;">
                                                    <?php echo $msg->name; ?></div>
                                                <div style="font-size:0.75rem;color:var(--text-muted);">
                                                    <?php echo $msg->email; ?></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td
                                        style="max-width:180px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;color:var(--text-muted);font-size:0.88rem;">
                                        <?php echo $msg->subject; ?></td>
                                    <td style="font-size:0.82rem;color:var(--text-muted);white-space:nowrap;">
                                        <?php echo date('M d, Y', strtotime($msg->created_at)); ?></td>
                                    <td>
                                        <?php if ($msg->is_read): ?>
                                            <span class="badge-read">Read</span>
                                        <?php else: ?>
                                            <span class="badge-pending">Unread</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url('admin/message_view/' . $msg->id); ?>"
                                            class="action-btn action-btn-view" title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="<?php echo base_url('admin/message_delete/' . $msg->id); ?>"
                                            class="action-btn action-btn-delete confirm-delete" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" style="text-align:center;color:var(--text-muted);padding:30px;">No messages
                                    yet</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
