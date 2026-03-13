<!-- Page Title -->
<div class="page-title-bar">
    <div>
        <h1><?php echo $title; ?></h1>
        <p style="color:var(--text-muted);font-size:0.85rem;margin-top:2px;">Manage your professional skills and expertise.</p>
    </div>
    <a href="<?php echo base_url('admin/skill_add'); ?>" class="btn-grad">
        <i class="fas fa-plus"></i> Add New Skill
    </a>
</div>

<div class="row">
    <div class="col-12">
        <div class="admin-card">
            <div class="admin-card-header">
                <h5><i class="fas fa-chart-bar me-2" style="color:#43e97b"></i>All Skills</h5>
            </div>
            <div class="admin-card-body">
                <?php if(empty($skills)): ?>
                    <div style="text-align:center;padding:40px;color:var(--text-muted);">
                        <i class="fas fa-laptop-code" style="font-size:3rem;margin-bottom:15px;color:rgba(108,99,255,0.5);"></i>
                        <p>No skills added yet. Click "Add New Skill" to create one.</p>
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-hover" id="dataTable">
                            <thead>
                                <tr>
                                    <th width="50">Icon</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Proficiency</th>
                                    <th>Status</th>
                                    <th width="100">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($skills as $skill): ?>
                                <tr>
                                    <td class="text-center" style="font-size:1.4rem;color:var(--primary-light);">
                                        <i class="<?php echo $skill->icon ?: 'fas fa-code'; ?>"></i>
                                    </td>
                                    <td style="font-weight:600;color:#fff;"><?php echo $skill->name; ?></td>
                                    <td style="color:var(--text-muted);"><?php echo $skill->category ?: 'General'; ?></td>
                                    <td>
                                        <div style="display:flex;align-items:center;gap:10px;">
                                            <div style="flex:1;height:6px;background:rgba(255,255,255,0.1);border-radius:10px;overflow:hidden;">
                                                <div style="height:100%;width:<?php echo $skill->percentage; ?>%;background:var(--gradient);border-radius:10px;"></div>
                                            </div>
                                            <span style="font-size:0.75rem;font-weight:700;color:var(--primary-light);width:30px;"><?php echo $skill->percentage; ?>%</span>
                                        </div>
                                    </td>
                                    <td>
                                        <?php if($skill->is_active): ?>
                                            <span class="badge-active">Active</span>
                                        <?php else: ?>
                                            <span class="badge-inactive">Inactive</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div style="display:flex;gap:6px;">
                                            <a href="<?php echo base_url('admin/skill_edit/'.$skill->id); ?>" class="action-btn action-btn-edit" title="Edit">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            <a href="<?php echo base_url('admin/skill_delete/'.$skill->id); ?>" class="action-btn action-btn-delete confirm-delete" title="Delete" onclick="return confirm('Are you sure you want to delete this skill?');">
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
