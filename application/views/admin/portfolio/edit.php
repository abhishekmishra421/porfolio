<!-- Page Title -->
<div class="page-title-bar">
    <div>
        <a href="<?php echo base_url('admin/portfolio'); ?>" class="btn-ghost" style="padding:6px 14px;font-size:0.8rem;margin-bottom:10px;">
            <i class="fas fa-arrow-left"></i> Back to Portfolio
        </a>
        <h1><?php echo $title; ?></h1>
    </div>
</div>

<?php echo form_open_multipart('admin/portfolio_edit/'.$portfolio->id); ?>
<div class="row">
    <div class="col-12">
        <div class="admin-card mb-4">
            <div class="admin-card-header">
                <h5><i class="fas fa-pen me-2" style="color:var(--primary)"></i>Edit Project</h5>
            </div>
            <div class="admin-card-body">
                <div class="mb-3">
                    <label class="form-label">Project Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" value="<?php echo set_value('title', $portfolio->title); ?>" required>
                    <?php echo form_error('title', '<div class="text-danger" style="font-size:0.8rem;margin-top:4px;">', '</div>'); ?>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" id="summernote" rows="5"><?php echo set_value('description', $portfolio->description); ?></textarea>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Client Name</label>
                        <input type="text" name="client" class="form-control" value="<?php echo set_value('client', $portfolio->client); ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Project Date/Year</label>
                        <input type="text" name="project_date" class="form-control" value="<?php echo set_value('project_date', $portfolio->project_date); ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Live URL</label>
                        <input type="url" name="project_url" class="form-control" value="<?php echo set_value('project_url', $portfolio->project_url); ?>" placeholder="https://...">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Technologies Used</label>
                        <input type="text" name="technologies" class="form-control" value="<?php echo set_value('technologies', $portfolio->technologies); ?>" placeholder="HTML, CSS, PHP, React...">
                    </div>
                </div>
            </div>
        </div>

        <div class="admin-card">
            <div class="admin-card-header">
                <h5><i class="fas fa-images me-2" style="color:var(--secondary)"></i>Gallery Images</h5>
            </div>
            <div class="admin-card-body">
                <?php 
                $gallery = json_decode($portfolio->gallery_images); 
                if(!empty($gallery)): 
                ?>
                <div class="mb-4">
                    <label class="form-label">Current Gallery Images</label>
                    <div style="display:flex;flex-wrap:wrap;gap:10px;">
                        <?php foreach($gallery as $img): ?>
                        <div style="width:80px;height:60px;border-radius:6px;overflow:hidden;border:1px solid var(--card-border);position:relative;">
                            <img src="<?php echo base_url('uploads/portfolio/gallery/'.$img); ?>" alt="Gallery" style="width:100%;height:100%;object-fit:cover;">
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>

                <div class="mb-3">
                    <label class="form-label">Add More Images</label>
                    <input type="file" name="gallery_images[]" class="form-control" accept="image/*" multiple>
                    <div style="font-size:0.75rem;color:var(--text-muted);margin-top:4px;">You can select multiple images to append to the gallery.</div>
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
                            <option value="<?php echo $cat->id; ?>" <?php echo ($portfolio->category_id == $cat->id) ? 'selected' : ''; ?>><?php echo $cat->name; ?></option>
                        <?php endforeach; endif; ?>
                    </select>
                    <?php echo form_error('category_id', '<div class="text-danger" style="font-size:0.8rem;margin-top:4px;">', '</div>'); ?>
                </div>

                <div class="mb-3">
                    <label class="form-label">Sort Order</label>
                    <input type="number" name="sort_order" class="form-control" value="<?php echo set_value('sort_order', $portfolio->sort_order); ?>">
                </div>

                <div class="mb-4 form-check form-switch custom-switch" style="padding-left:0;display:flex;align-items:center;justify-content:space-between;">
                    <label class="form-check-label" style="color:var(--text);font-weight:600;font-size:0.9rem;">Featured Project</label>
                    <input class="form-check-input" type="checkbox" name="is_featured" value="1" <?php echo ($portfolio->is_featured == 1) ? 'checked' : ''; ?> style="width:40px;height:20px;margin-left:auto;cursor:pointer;">
                </div>

                <div class="mb-4 form-check form-switch custom-switch" style="padding-left:0;display:flex;align-items:center;justify-content:space-between;">
                    <label class="form-check-label" style="color:var(--text);font-weight:600;font-size:0.9rem;">Status (Active/Draft)</label>
                    <input class="form-check-input" type="checkbox" name="is_active" value="1" <?php echo ($portfolio->is_active == 1) ? 'checked' : ''; ?> style="width:40px;height:20px;margin-left:auto;cursor:pointer;">
                </div>

                <hr style="border-color:var(--card-border);margin:20px 0;">
                
                <button type="submit" class="btn-grad w-100" style="justify-content:center;padding:12px;">
                    <i class="fas fa-save"></i> Update Project
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
                    <div style="font-size:0.75rem;color:var(--text-muted);margin-top:4px;">Leave blank to keep existing image.</div>
                </div>

                <?php if($portfolio->featured_image): ?>
                    <div class="mt-3 text-center" style="background:rgba(255,255,255,0.05);padding:10px;border-radius:8px;">
                        <img src="<?php echo base_url('uploads/portfolio/'.$portfolio->featured_image); ?>" alt="Preview" style="max-width:100%;height:auto;border-radius:6px;">
                    </div>
                <?php endif; ?>
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
