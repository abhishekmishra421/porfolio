<!-- Page Title -->
<div class="page-title-bar">
    <div>
        <a href="<?php echo base_url('admin/skills'); ?>" class="btn-ghost" style="padding:6px 14px;font-size:0.8rem;margin-bottom:10px;">
            <i class="fas fa-arrow-left"></i> Back to Skills
        </a>
        <h1><?php echo $title; ?></h1>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="admin-card">
            <div class="admin-card-header">
                <h5><i class="fas fa-plus me-2" style="color:#43e97b"></i>Skill Details</h5>
            </div>
            <div class="admin-card-body">
                <?php echo form_open('admin/skill_add'); ?>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Skill Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" value="<?php echo set_value('name'); ?>" required placeholder="e.g. JavaScript, PHP, Figma">
                        <?php echo form_error('name', '<div class="text-danger" style="font-size:0.8rem;margin-top:4px;">', '</div>'); ?>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Proficiency Percentage (1-100) <span class="text-danger">*</span></label>
                        <input type="number" name="percentage" class="form-control" value="<?php echo set_value('percentage'); ?>" required min="1" max="100">
                        <?php echo form_error('percentage', '<div class="text-danger" style="font-size:0.8rem;margin-top:4px;">', '</div>'); ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Category</label>
                        <select name="category" class="form-select">
                            <option value="Frontend">Frontend</option>
                            <option value="Backend">Backend</option>
                            <option value="Database">Database</option>
                            <option value="Design">Design</option>
                            <option value="Tools">Tools/Other</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">FontAwesome Icon Class</label>
                        <input type="text" name="icon" class="form-control" value="<?php echo set_value('icon', 'fas fa-code'); ?>" placeholder="e.g. fab fa-js">
                        <div style="font-size:0.75rem;color:var(--text-muted);margin-top:4px;">
                            Find icons at <a href="https://fontawesome.com/search?o=r&m=free" target="_blank" style="color:var(--primary-light);">FontAwesome</a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Sort Order</label>
                        <input type="number" name="sort_order" class="form-control" value="<?php echo set_value('sort_order', 0); ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-12">
        <div class="admin-card">
            <div class="admin-card-header">
                <h5><i class="fas fa-cog me-2" style="color:var(--success)"></i>Publish</h5>
            </div>
            <div class="admin-card-body">
                <div class="mb-4 form-check form-switch custom-switch" style="padding-left:0;display:flex;align-items:center;justify-content:space-between;">
                    <label class="form-check-label" style="color:var(--text);font-weight:600;font-size:0.9rem;">Status (Active/Draft)</label>
                    <input class="form-check-input" type="checkbox" name="is_active" value="1" checked style="width:40px;height:20px;margin-left:auto;cursor:pointer;">
                </div>
                
                <hr style="border-color:var(--card-border);margin:20px 0;">
                
                <button type="submit" class="btn-grad w-100" style="justify-content:center;padding:12px;">
                    <i class="fas fa-save"></i> Save Skill
                </button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
