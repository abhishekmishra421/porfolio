<!-- Page Title -->
<div class="page-title-bar">
    <div>
        <a href="<?php echo base_url('admin/categories'); ?>" class="btn-ghost" style="padding:6px 14px;font-size:0.8rem;margin-bottom:10px;">
            <i class="fas fa-arrow-left"></i> Back to Categories
        </a>
        <h1><?php echo $title; ?></h1>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="admin-card">
            <div class="admin-card-header">
                <h5><i class="fas fa-pen me-2" style="color:var(--primary)"></i>Edit Category</h5>
            </div>
            <div class="admin-card-body">
                <?php echo form_open('admin/category_edit/'.$category->id); ?>
                
                <div class="mb-3">
                    <label class="form-label">Category Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" value="<?php echo set_value('name', $category->name); ?>" required>
                    <?php echo form_error('name', '<div class="text-danger" style="font-size:0.8rem;margin-top:4px;">', '</div>'); ?>
                </div>


                <div class="mb-4 form-check form-switch custom-switch" style="padding-left:0;display:flex;align-items:center;justify-content:space-between;margin-top:20px;">
                    <label class="form-check-label" style="color:var(--text);font-weight:600;font-size:0.9rem;">Status (Active/Inactive)</label>
                    <input class="form-check-input" type="checkbox" name="is_active" value="1" <?php echo ($category->is_active == 1) ? 'checked' : ''; ?> style="width:40px;height:20px;margin-left:auto;cursor:pointer;">
                </div>
                
                <hr style="border-color:var(--card-border);margin:20px 0;">
                
                <button type="submit" class="btn-grad w-100" style="justify-content:center;padding:12px;">
                    <i class="fas fa-save"></i> Update Category
                </button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
