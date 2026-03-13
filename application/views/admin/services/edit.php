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
                <h5><i class="fas fa-pen me-2" style="color:var(--warning)"></i>Edit Service</h5>
            </div>
            <div class="admin-card-body">
                <?php echo form_open('admin/service_edit/'.$service->id); ?>
                
                <div class="mb-3">
                    <label class="form-label">Service Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" value="<?php echo set_value('title', $service->title); ?>" required>
                    <?php echo form_error('title', '<div class="text-danger" style="font-size:0.8rem;margin-top:4px;">', '</div>'); ?>
                </div>

                <div class="mb-3">
                    <label class="form-label">Service Description</label>
                    <textarea name="description" class="form-control" rows="5"><?php echo set_value('description', $service->description); ?></textarea>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">FontAwesome Icon Class</label>
                        <input type="text" name="icon" class="form-control" value="<?php echo set_value('icon', $service->icon); ?>">
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Display Order</label>
                        <input type="number" name="sort_order" class="form-control" value="<?php echo set_value('sort_order', $service->sort_order); ?>">
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
                    <input class="form-check-input" type="checkbox" name="is_active" value="1" <?php echo ($service->is_active == 1) ? 'checked' : ''; ?> style="width:40px;height:20px;margin-left:auto;cursor:pointer;">
                </div>
                
                <hr style="border-color:var(--card-border);margin:20px 0;">
                
                <button type="submit" class="btn-grad w-100" style="justify-content:center;padding:12px;">
                    <i class="fas fa-save"></i> Update Service
                </button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
