<!-- Page Title -->
<div class="page-title-bar">
    <div>
        <h1><?php echo $title; ?></h1>
        <p style="color:var(--text-muted);font-size:0.85rem;margin-top:2px;">Manage global website settings and contact information.</p>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="admin-card">
            <div class="admin-card-header">
                <h5><i class="fas fa-cog me-2" style="color:var(--primary)"></i>Global Configurations</h5>
            </div>
            <div class="admin-card-body">
                <?php echo form_open_multipart('admin/settings'); ?>
                
                <div class="row">
                    <!-- General Settings -->
                    <div class="col-md-6">
                        <h6 style="color:var(--primary-light);margin-bottom:15px;font-size:0.9rem;text-transform:uppercase;letter-spacing:1px;">General Information</h6>
                        
                        <div class="mb-3">
                            <label class="form-label">Site Title (Name)</label>
                            <input type="text" name="site_title" class="form-control" value="<?php echo set_value('site_title', $settings->site_title); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Site Description (SEO)</label>
                            <textarea name="site_description" class="form-control" rows="3"><?php echo set_value('site_description', $settings->site_description); ?></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Site Keywords (SEO)</label>
                            <input type="text" name="site_keywords" class="form-control" value="<?php echo set_value('site_keywords', $settings->site_keywords); ?>" placeholder="e.g. portfolio, developer, designer">
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Copyright Text</label>
                            <input type="text" name="copyright_text" class="form-control" value="<?php echo set_value('copyright_text', $settings->copyright_text); ?>">
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Site Logo</label>
                                <input type="file" name="site_logo" class="form-control" accept="image/*">
                                <?php if($settings->site_logo): ?>
                                    <div class="mt-2 text-center" style="background:rgba(255,255,255,0.05);padding:10px;border-radius:8px;">
                                        <img src="<?php echo base_url('uploads/settings/'.$settings->site_logo); ?>" alt="Logo" style="max-height: 40px;">
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Favicon</label>
                                <input type="file" name="site_favicon" class="form-control" accept=".ico,.png">
                                <?php if($settings->site_favicon): ?>
                                    <div class="mt-2 text-center" style="background:rgba(255,255,255,0.05);padding:10px;border-radius:8px;">
                                        <img src="<?php echo base_url('uploads/settings/'.$settings->site_favicon); ?>" alt="Favicon" style="max-height: 24px;">
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <!-- Contact & Social Settings -->
                    <div class="col-md-6">
                        <h6 style="color:#4facfe;margin-bottom:15px;font-size:0.9rem;text-transform:uppercase;letter-spacing:1px;margin-top:20px;margin-top:0;">Contact & Social Links</h6>
                        
                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="site_email" class="form-control" value="<?php echo set_value('site_email', $settings->site_email); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Phone Number</label>
                            <input type="text" name="site_phone" class="form-control" value="<?php echo set_value('site_phone', $settings->site_phone); ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Physical Address</label>
                            <textarea name="site_address" class="form-control" rows="2"><?php echo set_value('site_address', $settings->site_address); ?></textarea>
                        </div>
                        
                        <hr style="border-color:var(--card-border);margin:20px 0;">
                        
                        <div class="mb-3">
                            <label class="form-label"><i class="fab fa-github me-1"></i> GitHub URL</label>
                            <input type="url" name="github_url" class="form-control" value="<?php echo set_value('github_url', $settings->github_url); ?>">
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label"><i class="fab fa-linkedin me-1"></i> LinkedIn URL</label>
                            <input type="url" name="linkedin_url" class="form-control" value="<?php echo set_value('linkedin_url', $settings->linkedin_url); ?>">
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><i class="fab fa-twitter me-1"></i> Twitter URL</label>
                                <input type="url" name="twitter_url" class="form-control" value="<?php echo set_value('twitter_url', $settings->twitter_url); ?>">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><i class="fab fa-facebook me-1"></i> Facebook URL</label>
                                <input type="url" name="facebook_url" class="form-control" value="<?php echo set_value('facebook_url', $settings->facebook_url); ?>">
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label"><i class="fab fa-instagram me-1"></i> Instagram URL</label>
                            <input type="url" name="instagram_url" class="form-control" value="<?php echo set_value('instagram_url', $settings->instagram_url); ?>">
                        </div>
                    </div>
                </div>

                <hr style="border-color:var(--card-border);margin:30px 0;">

                <div class="text-end">
                    <button type="submit" class="btn-grad">
                        <i class="fas fa-save"></i> Save Settings
                    </button>
                </div>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
