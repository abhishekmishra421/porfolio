<!-- Page Title -->
<div class="page-title-bar">
    <div>
        <a href="<?php echo base_url('admin/messages'); ?>" class="btn-ghost" style="padding:6px 14px;font-size:0.8rem;margin-bottom:10px;">
            <i class="fas fa-arrow-left"></i> Back to Inbox
        </a>
        <h1>Message Details</h1>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="admin-card">
            <div class="admin-card-header" style="justify-content:flex-start;gap:15px;">
                <div style="width:40px;height:40px;border-radius:50%;background:var(--gradient);display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;font-size:1.2rem;">
                    <?php echo strtoupper(substr($message->name, 0, 1)); ?>
                </div>
                <div>
                    <h5 style="margin:0;font-size:1.1rem;"><?php echo $message->subject ?: 'No Subject'; ?></h5>
                    <div style="font-size:0.8rem;color:var(--text-muted);margin-top:2px;">
                        From: <strong style="color:var(--text);"><?php echo $message->name; ?></strong> &lt;<a href="mailto:<?php echo $message->email; ?>" style="color:var(--primary-light);"><?php echo $message->email; ?></a>&gt;
                    </div>
                </div>
                <div style="margin-left:auto;font-size:0.8rem;color:var(--text-muted);">
                    <?php echo date('F d, Y \a\t h:i A', strtotime($message->created_at)); ?>
                </div>
            </div>
            
            <div class="admin-card-body" style="padding:30px;">
                <div style="background:rgba(255,255,255,0.03);border:1px solid var(--card-border);border-radius:12px;padding:25px;font-size:0.95rem;line-height:1.7;color:var(--text);min-height:200px;">
                    <?php echo nl2br(htmlspecialchars($message->message)); ?>
                </div>
                
                <div class="mt-4" style="display:flex;gap:10px;">
                    <a href="mailto:<?php echo $message->email; ?>" class="btn-grad">
                        <i class="fas fa-reply"></i> Reply via Email
                    </a>
                    <a href="<?php echo base_url('admin/message_delete/'.$message->id); ?>" class="btn-danger-soft confirm-delete" onclick="return confirm('Are you sure you want to delete this message?');">
                        <i class="fas fa-trash"></i> Delete Message
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-12">
        <div class="admin-card">
            <div class="admin-card-header">
                <h5><i class="fas fa-user-circle me-2" style="color:var(--info)"></i>Sender Info</h5>
            </div>
            <div class="admin-card-body">
                <ul style="list-style:none;padding:0;margin:0;">
                    <li style="padding:12px 0;border-bottom:1px solid var(--card-border);display:flex;justify-content:space-between;">
                        <span style="color:var(--text-muted);font-size:0.85rem;">Name</span>
                        <span style="font-weight:600;"><?php echo $message->name; ?></span>
                    </li>
                    <li style="padding:12px 0;border-bottom:1px solid var(--card-border);display:flex;justify-content:space-between;">
                        <span style="color:var(--text-muted);font-size:0.85rem;">Email</span>
                        <span style="font-weight:600;"><a href="mailto:<?php echo $message->email; ?>" style="color:var(--primary-light);"><?php echo $message->email; ?></a></span>
                    </li>
                    <li style="padding:12px 0;border-bottom:1px solid var(--card-border);display:flex;justify-content:space-between;">
                        <span style="color:var(--text-muted);font-size:0.85rem;">Date Received</span>
                        <span style="font-weight:600;"><?php echo date('M d, Y', strtotime($message->created_at)); ?></span>
                    </li>
                    <li style="padding:12px 0;display:flex;justify-content:space-between;">
                        <span style="color:var(--text-muted);font-size:0.85rem;">Status</span>
                        <?php if($message->is_read): ?>
                            <span class="badge-read">Read</span>
                        <?php else: ?>
                            <span class="badge-pending">New</span>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
