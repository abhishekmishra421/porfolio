<!-- Page Title -->
<div class="page-title-bar">
    <div>
        <a href="<?php echo base_url('admin/portfolio'); ?>" class="btn-ghost" style="padding:6px 14px;font-size:0.8rem;margin-bottom:10px;">
            <i class="fas fa-arrow-left"></i> Back to Portfolio
        </a>
        <h1><?php echo $title; ?></h1>
    </div>
</div>

<?php echo form_open_multipart('admin/portfolio_add'); ?>
<div class="row">
    <div class="col-12">
        <div class="admin-card mb-4">
            <div class="admin-card-header">
                <h5><i class="fas fa-info-circle me-2" style="color:var(--primary)"></i>Project Information</h5>
            </div>
            <div class="admin-card-body">
                <div class="mb-3">
                    <label class="form-label">Project Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" value="<?php echo set_value('title'); ?>" required>
                    <?php echo form_error('title', '<div class="text-danger" style="font-size:0.8rem;margin-top:4px;">', '</div>'); ?>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" id="summernote" rows="5"><?php echo set_value('description'); ?></textarea>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Client Name</label>
                        <input type="text" name="client" class="form-control" value="<?php echo set_value('client'); ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Project Date/Year</label>
                        <input type="text" name="project_date" class="form-control" value="<?php echo set_value('project_date'); ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Live URL</label>
                        <input type="url" name="project_url" class="form-control" value="<?php echo set_value('project_url'); ?>" placeholder="https://...">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Technologies Used</label>
                        <input type="text" name="technologies" class="form-control" value="<?php echo set_value('technologies'); ?>" placeholder="HTML, CSS, PHP, React...">
                    </div>
                </div>
            </div>
        </div>

        <div class="admin-card">
            <div class="admin-card-header">
                <h5><i class="fas fa-images me-2" style="color:var(--secondary)"></i>Gallery Images</h5>
            </div>
            <div class="admin-card-body">
                <div class="mb-3">
                    <label class="form-label">Upload Additional Images</label>
                    <input type="file" name="gallery_images[]" class="form-control" accept="image/*" multiple>
                    <div style="font-size:0.75rem;color:var(--text-muted);margin-top:4px;">You can select multiple images for the project gallery.</div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-12">
        <div class="admin-card mb-4">
            <div class="admin-card-header">
                <h5><i class="fas fa-cog me-2" style="color:var(--success)"></i>Publish Settings</h5>
            </div>
            <div class="admin-card-body">
                <div class="mb-3">
                    <label class="form-label">Category <span class="text-danger">*</span></label>
                    <select name="category_id" class="form-select" required>
                        <option value="">Select Category</option>
                        <?php if(!empty($categories)): foreach($categories as $cat): ?>
                            <option value="<?php echo $cat->id; ?>"><?php echo $cat->name; ?></option>
                        <?php endforeach; endif; ?>
                    </select>
                    <?php echo form_error('category_id', '<div class="text-danger" style="font-size:0.8rem;margin-top:4px;">', '</div>'); ?>
                </div>

                <div class="mb-3">
                    <label class="form-label">Sort Order</label>
                    <input type="number" name="sort_order" class="form-control" value="<?php echo set_value('sort_order', 0); ?>">
                </div>

                <div class="mb-4 form-check form-switch custom-switch" style="padding-left:0;display:flex;align-items:center;justify-content:space-between;">
                    <label class="form-check-label" style="color:var(--text);font-weight:600;font-size:0.9rem;">Featured Project</label>
                    <input class="form-check-input" type="checkbox" name="is_featured" value="1" style="width:40px;height:20px;margin-left:auto;cursor:pointer;">
                </div>

                <div class="mb-4 form-check form-switch custom-switch" style="padding-left:0;display:flex;align-items:center;justify-content:space-between;">
                    <label class="form-check-label" style="color:var(--text);font-weight:600;font-size:0.9rem;">Status (Active/Draft)</label>
                    <input class="form-check-input" type="checkbox" name="is_active" value="1" checked style="width:40px;height:20px;margin-left:auto;cursor:pointer;">
                </div>

                <hr style="border-color:var(--card-border);margin:20px 0;">
                
                <button type="submit" class="btn-grad w-100" style="justify-content:center;padding:12px;">
                    <i class="fas fa-save"></i> Save Project
                </button>
            </div>
        </div>

        <div class="admin-card">
            <div class="admin-card-header">
                <h5><i class="fas fa-image me-2" style="color:var(--warning)"></i>Featured Image</h5>
            </div>
            <div class="admin-card-body">
                <div class="mb-3">
                    <input type="file" name="featured_image" class="form-control" accept="image/*">
                    <div style="font-size:0.75rem;color:var(--text-muted);margin-top:4px;">This image will appear on the portfolio grid.</div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo form_close(); ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Basic rich text editor initialization (fallback if summernote fails)
    if(typeof $ !== 'undefined' && $.fn.summernote) {
        $('#summernote').summernote({
            height: 250,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link']],
                ['view', ['fullscreen', 'codeview']]
            ]
        });
    }
});
</script>
