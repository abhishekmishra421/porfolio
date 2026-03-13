<!-- Page Title -->
<div class="page-title-bar">
    <div>
        <h1><?php echo $title; ?></h1>
        <p style="color:var(--text-muted);font-size:0.85rem;margin-top:2px;">Manage client testimonials and feedback.</p>
    </div>
    <a href="<?php echo base_url('admin/testimonial_add'); ?>" class="btn-grad">
        <i class="fas fa-plus"></i> Add Testimonial
    </a>
</div>

<div class="row">
    <div class="col-12">
        <div class="admin-card">
            <div class="admin-card-header">
                <h5><i class="fas fa-quote-left me-2" style="color:var(--info)"></i>All Testimonials</h5>
            </div>
            <div class="admin-card-body">
                <?php if(empty($testimonials)): ?>
                    <div style="text-align:center;padding:40px;color:var(--text-muted);">
                        <i class="fas fa-comment-dots" style="font-size:3rem;margin-bottom:15px;color:rgba(56,189,248,0.5);"></i>
                        <p>No testimonials added yet. Click "Add Testimonial" to feature one.</p>
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-hover" id="dataTable">
                            <thead>
                                <tr>
                                    <th width="70">Image</th>
                                    <th>Client Details</th>
                                    <th>Feedback preview</th>
                                    <th>Rating</th>
                                    <th>Status</th>
                                    <th width="100">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($testimonials as $test): ?>
                                <tr>
                                    <td>
                                        <?php if($test->client_image): ?>
                                            <div style="width:50px;height:50px;border-radius:50%;overflow:hidden;border:2px solid var(--card-border);">
                                                <img src="<?php echo base_url('uploads/testimonials/'.$test->client_image); ?>" alt="<?php echo $test->client_name; ?>" style="width:100%;height:100%;object-fit:cover;">
                                            </div>
                                        <?php else: ?>
                                            <div style="width:50px;height:50px;border-radius:50%;background:var(--card-border);display:flex;align-items:center;justify-content:center;color:var(--text-muted);font-size:1.2rem;">
                                                <i class="fas fa-user"></i>
                                            </div>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div style="font-weight:600;color:#fff;"><?php echo $test->client_name; ?></div>
                                        <div style="font-size:0.8rem;color:var(--text-muted);">
                                            <?php echo $test->client_position ? $test->client_position . ($test->client_company ? ' at ' : '') : ''; ?>
                                            <?php echo $test->client_company; ?>
                                        </div>
                                    </td>
                                    <td style="color:var(--text-muted);font-size:0.9rem;">
                                        <div style="max-width:250px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;font-style:italic;">
                                            "<?php echo strip_tags($test->testimonial_text); ?>"
                                        </div>
                                    </td>
                                    <td>
                                        <div style="color:var(--warning);font-size:0.8rem;">
                                            <?php for($i=1; $i<=5; $i++): ?>
                                                <?php if($i <= $test->rating): ?>
                                                    <i class="fas fa-star"></i>
                                                <?php else: ?>
                                                    <i class="far fa-star"></i>
                                                <?php endif; ?>
                                            <?php endfor; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <?php if($test->is_active): ?>
                                            <span class="badge-active">Active</span>
                                        <?php else: ?>
                                            <span class="badge-inactive">Inactive</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div style="display:flex;gap:6px;">
                                            <a href="<?php echo base_url('admin/testimonial_edit/'.$test->id); ?>" class="action-btn action-btn-edit" title="Edit">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            <a href="<?php echo base_url('admin/testimonial_delete/'.$test->id); ?>" class="action-btn action-btn-delete confirm-delete" title="Delete" onclick="return confirm('Are you sure you want to delete this testimonial?');">
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
