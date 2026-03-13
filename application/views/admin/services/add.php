<!-- Page Title -->
<div class="page-title-bar">
    <div>
        <a href="<?php echo base_url('admin/services'); ?>" class="btn-ghost" style="padding:6px 14px;font-size:0.8rem;margin-bottom:10px;">
            <i class="fas fa-arrow-left"></i> Back to Services
        </a>
        <h1><?php echo $title; ?></h1>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="admin-card">
            <div class="admin-card-header">
                <h5><i class="fas fa-plus me-2" style="color:var(--warning)"></i>Service Details</h5>
            </div>
            <div class="admin-card-body">
                <?php echo form_open('admin/service_add'); ?>
                
                <div class="mb-3">
                    <label class="form-label">Service Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" value="<?php echo set_value('title'); ?>" required placeholder="e.g. Web Development, UI/UX Design">
                    <?php echo form_error('title', '<div class="text-danger" style="font-size:0.8rem;margin-top:4px;">', '</div>'); ?>
                </div>

                <div class="mb-3">
                    <label class="form-label">Service Description</label>
                    <textarea name="description" class="form-control" rows="5" placeholder="Describe what the service entails..."><?php echo set_value('description'); ?></textarea>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">FontAwesome Icon Class</label>
                        <input type="text" name="icon" class="form-control" value="<?php echo set_value('icon', 'fas fa-cog'); ?>" placeholder="e.g. fas fa-laptop-code">
                        <div style="font-size:0.75rem;color:var(--text-muted);margin-top:4px;">
                            Find icons at <a href="https://fontawesome.com/search?o=r&m=free" target="_blank" style="color:var(--primary-light);">FontAwesome</a>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Display Order</label>
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
                    <i class="fas fa-save"></i> Save Service
                </button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
