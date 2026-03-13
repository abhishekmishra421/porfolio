<!-- Page Title -->
<div class="page-title-bar">
    <div>
        <a href="<?php echo base_url('admin/hero'); ?>" class="btn-ghost" style="padding:6px 14px;font-size:0.8rem;margin-bottom:10px;">
            <i class="fas fa-arrow-left"></i> Back to Hero
        </a>
        <h1><?php echo $title; ?></h1>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="admin-card">
            <div class="admin-card-header">
                <h5><i class="fas fa-pen me-2" style="color:#f093fb"></i>Edit Content</h5>
            </div>
            <div class="admin-card-body">
                <?php echo form_open_multipart('admin/hero_edit/'.$hero->id); ?>
                
                <div class="mb-3">
                    <label class="form-label">Main Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" value="<?php echo set_value('title', $hero->title); ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Subtitle (Typewriter Effect)</label>
                    <input type="text" name="subtitle" class="form-control" value="<?php echo set_value('subtitle', $hero->subtitle); ?>" placeholder="e.g. Developer, Designer, Freelancer">
                    <div style="font-size:0.75rem;color:var(--text-muted);margin-top:4px;">Comma separate values for the typewriter effect.</div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="4"><?php echo set_value('description', $hero->description); ?></textarea>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Button Text</label>
                        <input type="text" name="button_text" class="form-control" value="<?php echo set_value('button_text', $hero->button_text); ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Button Link</label>
                        <input type="text" name="button_link" class="form-control" value="<?php echo set_value('button_link', $hero->button_link); ?>" placeholder="#contact or https://...">
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-12">
        <div class="admin-card mb-4">
            <div class="admin-card-header">
                <h5><i class="fas fa-image me-2" style="color:var(--secondary)"></i>Images</h5>
            </div>
            <div class="admin-card-body">
                <div class="mb-4">
                    <label class="form-label">Profile Image / 3D Element</label>
                    <input type="file" name="profile_image" class="form-control" accept="image/*">
                    <?php if($hero->profile_image): ?>
                        <div class="mt-2 text-center" style="background:rgba(255,255,255,0.05);padding:10px;border-radius:8px;">
                            <img src="<?php echo base_url('uploads/hero/'.$hero->profile_image); ?>" alt="Profile" style="max-width:100%;height:auto;max-height:150px;border-radius:8px;">
                        </div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label class="form-label">Background Image (Fallback)</label>
                    <input type="file" name="background_image" class="form-control" accept="image/*">
                    <?php if($hero->background_image): ?>
                        <div class="mt-2 text-center" style="background:rgba(255,255,255,0.05);padding:10px;border-radius:8px;">
                            <img src="<?php echo base_url('uploads/hero/'.$hero->background_image); ?>" alt="Background" style="max-width:100%;height:auto;max-height:100px;border-radius:8px;">
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
        <div class="admin-card">
            <div class="admin-card-header">
                <h5><i class="fas fa-cog me-2" style="color:var(--success)"></i>Publish</h5>
            </div>
            <div class="admin-card-body">
                <div class="mb-4 form-check form-switch custom-switch" style="padding-left:0;display:flex;align-items:center;justify-content:space-between;">
                    <label class="form-check-label" style="color:var(--text);font-weight:600;font-size:0.9rem;">Status (Active/Draft)</label>
                    <input class="form-check-input" type="checkbox" name="is_active" value="1" <?php echo ($hero->is_active == 1) ? 'checked' : ''; ?> style="width:40px;height:20px;margin-left:auto;cursor:pointer;">
                </div>
                
                <hr style="border-color:var(--card-border);margin:20px 0;">
                
                <button type="submit" class="btn-grad w-100" style="justify-content:center;padding:12px;">
                    <i class="fas fa-save"></i> Update Hero Section
                </button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
