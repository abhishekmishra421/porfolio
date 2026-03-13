<!-- Page Title -->
<div class="page-title-bar">
    <div>
        <a href="<?php echo base_url('admin/testimonials'); ?>" class="btn-ghost" style="padding:6px 14px;font-size:0.8rem;margin-bottom:10px;">
            <i class="fas fa-arrow-left"></i> Back to Testimonials
        </a>
        <h1><?php echo $title; ?></h1>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="admin-card">
            <div class="admin-card-header">
                <h5><i class="fas fa-pen me-2" style="color:var(--info)"></i>Edit Testimonial Details</h5>
            </div>
            <div class="admin-card-body">
                <?php echo form_open_multipart('admin/testimonial_edit/'.$testimonial->id); ?>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Client Name <span class="text-danger">*</span></label>
                        <input type="text" name="client_name" class="form-control" value="<?php echo set_value('client_name', $testimonial->client_name); ?>" required>
                        <?php echo form_error('client_name', '<div class="text-danger" style="font-size:0.8rem;margin-top:4px;">', '</div>'); ?>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Company</label>
                        <input type="text" name="company" class="form-control" value="<?php echo set_value('company', $testimonial->client_company); ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Position / Role</label>
                        <input type="text" name="position" class="form-control" value="<?php echo set_value('position', $testimonial->client_position); ?>">
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Rating (out of 5)</label>
                        <select name="rating" class="form-select">
                            <option value="5" <?php echo ($testimonial->rating == 5) ? 'selected' : ''; ?>>5 Stars - Excellent</option>
                            <option value="4" <?php echo ($testimonial->rating == 4) ? 'selected' : ''; ?>>4 Stars - Great</option>
                            <option value="3" <?php echo ($testimonial->rating == 3) ? 'selected' : ''; ?>>3 Stars - Good</option>
                            <option value="2" <?php echo ($testimonial->rating == 2) ? 'selected' : ''; ?>>2 Stars - Fair</option>
                            <option value="1" <?php echo ($testimonial->rating == 1) ? 'selected' : ''; ?>>1 Star - Poor</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Feedback / Testimonial Content <span class="text-danger">*</span></label>
                    <textarea name="content" class="form-control" rows="5" required><?php echo set_value('content', $testimonial->testimonial_text); ?></textarea>
                    <?php echo form_error('content', '<div class="text-danger" style="font-size:0.8rem;margin-top:4px;">', '</div>'); ?>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-12">
        <div class="admin-card mb-4">
            <div class="admin-card-header">
                <h5><i class="fas fa-image me-2" style="color:var(--secondary)"></i>Client Image</h5>
            </div>
            <div class="admin-card-body">
                <div class="mb-3">
                    <input type="file" name="image" class="form-control" accept="image/*">
                    <div style="font-size:0.75rem;color:var(--text-muted);margin-top:4px;">Leave blank to keep existing image.</div>
                </div>

                <?php if($testimonial->client_image): ?>
                    <div class="mt-3 text-center" style="background:rgba(255,255,255,0.05);padding:10px;border-radius:8px;">
                        <img src="<?php echo base_url('uploads/testimonials/'.$testimonial->client_image); ?>" alt="Preview" style="max-width:100px;height:100px;border-radius:50%;object-fit:cover;border:2px solid var(--card-border);">
                    </div>
                <?php endif; ?>
            </div>
        </div>
        
        <div class="admin-card">
            <div class="admin-card-header">
                <h5><i class="fas fa-cog me-2" style="color:var(--success)"></i>Publish</h5>
            </div>
            <div class="admin-card-body">
                <div class="mb-4 form-check form-switch custom-switch" style="padding-left:0;display:flex;align-items:center;justify-content:space-between;">
                    <label class="form-check-label" style="color:var(--text);font-weight:600;font-size:0.9rem;">Status (Active/Draft)</label>
                    <input class="form-check-input" type="checkbox" name="is_active" value="1" <?php echo ($testimonial->is_active == 1) ? 'checked' : ''; ?> style="width:40px;height:20px;margin-left:auto;cursor:pointer;">
                </div>
                
                <hr style="border-color:var(--card-border);margin:20px 0;">
                
                <button type="submit" class="btn-grad w-100" style="justify-content:center;padding:12px;">
                    <i class="fas fa-save"></i> Update Testimonial
                </button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
