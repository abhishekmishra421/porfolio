<!-- Page Title -->
<div class="page-title-bar">
    <div>
        <h1><?php echo $title; ?></h1>
        <p style="color:var(--text-muted);font-size:0.85rem;margin-top:2px;">View and manage contact messages from your website.</p>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="admin-card">
            <div class="admin-card-header">
                <h5><i class="fas fa-envelope me-2" style="color:var(--primary)"></i>Inbox</h5>
            </div>
            <div class="admin-card-body">
                <?php if(empty($messages)): ?>
                    <div style="text-align:center;padding:40px;color:var(--text-muted);">
                        <i class="fas fa-inbox" style="font-size:3rem;margin-bottom:15px;color:rgba(108,99,255,0.5);"></i>
                        <p>Your inbox is empty. No messages yet.</p>
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-hover" id="dataTable">
                            <thead>
                                <tr>
                                    <th>Status</th>
                                    <th>Sender Name</th>
                                    <th>Email Address</th>
                                    <th>Subject</th>
                                    <th>Date Received</th>
                                    <th width="100">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($messages as $msg): ?>
                                <tr style="<?php echo (!$msg->is_read) ? 'background:rgba(108,99,255,0.05);' : ''; ?>">
                                    <td>
                                        <?php if(!$msg->is_read): ?>
                                            <span class="badge-pending">New</span>
                                        <?php else: ?>
                                            <span class="badge-read">Read</span>
                                        <?php endif; ?>
                                    </td>
                                    <td style="font-weight:<?php echo (!$msg->is_read) ? '700' : '500'; ?>;color:#fff;">
                                        <?php echo $msg->name; ?>
                                    </td>
                                    <td style="color:var(--text-muted);">
                                        <a href="mailto:<?php echo $msg->email; ?>" style="color:var(--primary-light);text-decoration:none;">
                                            <?php echo $msg->email; ?>
                                        </a>
                                    </td>
                                    <td style="font-weight:<?php echo (!$msg->is_read) ? '600' : '400'; ?>;">
                                        <div style="max-width:250px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">
                                            <?php echo $msg->subject ?: 'No Subject'; ?>
                                        </div>
                                    </td>
                                    <td style="font-size:0.85rem;color:var(--text-muted);">
                                        <?php echo date('M d, Y', strtotime($msg->created_at)); ?>
                                    </td>
                                    <td>
                                        <div style="display:flex;gap:6px;">
                                            <a href="<?php echo base_url('admin/message_view/'.$msg->id); ?>" class="action-btn action-btn-view" title="Read Message">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="<?php echo base_url('admin/message_delete/'.$msg->id); ?>" class="action-btn action-btn-delete confirm-delete" title="Delete" onclick="return confirm('Are you sure you want to delete this message?');">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
