<!-- Page Title -->
<div class="page-title-bar">
    <div>
        <h1><?php echo $title; ?></h1>
        <p style="color:var(--text-muted);font-size:0.85rem;margin-top:2px;">Manage the "About Me" section content.</p>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="admin-card">
            <div class="admin-card-header">
                <h5><i class="fas fa-user-tie me-2" style="color:var(--success)"></i>About Details</h5>
            </div>
            <div class="admin-card-body">
                <?php if(empty($about)): ?>
                    <div style="text-align:center;padding:40px;color:var(--text-muted);">
                        <i class="fas fa-exclamation-triangle" style="font-size:3rem;margin-bottom:15px;color:var(--warning);"></i>
                        <p>No about content found. Please add a record to the database.</p>
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Experience / Projects</th>
                                    <th>Status</th>
                                    <th width="100">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($about as $a): ?>
                                <tr>
                                    <td>
                                        <?php if($a->image): ?>
                                            <div style="width:50px;height:50px;border-radius:10px;overflow:hidden;border:1px solid var(--card-border);">
                                                <img src="<?php echo base_url('uploads/about/'.$a->image); ?>" alt="About" style="width:100%;height:100%;object-fit:cover;">
                                            </div>
                                        <?php else: ?>
                                            <div style="width:50px;height:50px;border-radius:10px;background:var(--card-border);display:flex;align-items:center;justify-content:center;color:var(--text-muted);">
                                                <i class="fas fa-image"></i>
                                            </div>
                                        <?php endif; ?>
                                    </td>
                                    <td style="font-weight:600;"><?php echo $a->title; ?></td>
                                    <td>
                                        <div style="font-size:0.85rem;color:var(--text);"><?php echo $a->years_experience; ?>+ Years Experience</div>
                                        <div style="font-size:0.75rem;color:var(--text-muted);"><?php echo $a->completed_projects; ?>+ Completed Projects</div>
                                    </td>
                                    <td>
                                        <?php if($a->is_active): ?>
                                            <span class="badge-active">Active</span>
                                        <?php else: ?>
                                            <span class="badge-inactive">Inactive</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url('admin/about_edit'); ?>" class="action-btn action-btn-edit" title="Edit">
                                            <i class="fas fa-pen"></i>
                                        </a>
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
