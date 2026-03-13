<!-- Page Title -->
<div class="page-title-bar">
    <div>
        <h1><?php echo $title; ?></h1>
        <p style="color:var(--text-muted);font-size:0.85rem;margin-top:2px;">Manage your "About Me" profile section.</p>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="admin-card">
            <div class="admin-card-header">
                <h5><i class="fas fa-user mb-0 me-2" style="color:var(--primary)"></i>Profile Information</h5>
            </div>
            <div class="admin-card-body">
                <?php echo form_open_multipart('admin/about'); ?>
                
                <h6 class="mb-3" style="color:var(--primary-light);border-bottom:1px solid var(--card-border);padding-bottom:10px;">Personal Details</h6>
                <div class="row custom-form">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control" name="name" value="<?php echo isset($about->name) ? $about->name : ''; ?>">
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Email Address</label>
                        <input type="email" class="form-control" name="email" value="<?php echo isset($about->email) ? $about->email : ''; ?>">
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Phone Number</label>
                        <input type="text" class="form-control" name="phone" value="<?php echo isset($about->phone) ? $about->phone : ''; ?>">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Location / Address</label>
                        <input type="text" class="form-control" name="location" value="<?php echo isset($about->location) ? $about->location : ''; ?>">
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Degree / Education</label>
                        <input type="text" class="form-control" name="degree" value="<?php echo isset($about->degree) ? $about->degree : ''; ?>">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Freelance Availability</label>
                        <input type="text" class="form-control" name="freelance" value="<?php echo isset($about->freelance) ? $about->freelance : 'Available'; ?>">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" name="dob" value="<?php echo isset($about->dob) ? $about->dob : ''; ?>">
                    </div>
                </div>

                <h6 class="mb-3 mt-4" style="color:var(--primary-light);border-bottom:1px solid var(--card-border);padding-bottom:10px;">Professional Biography</h6>
                <div class="custom-form mb-4">
                    <label class="form-label">Short Tagline (Description)</label>
                    <input type="text" class="form-control" name="description" value="<?php echo isset($about->description) ? $about->description : ''; ?>">
                    
                    <label class="form-label mt-3">Full Bio details</label>
                    <textarea class="form-control" name="bio" id="summernote" rows="5"><?php echo isset($about->bio) ? $about->bio : ''; ?></textarea>
                </div>

                <h6 class="mb-3 mt-4" style="color:var(--primary-light);border-bottom:1px solid var(--card-border);padding-bottom:10px;">Career Statistics</h6>
                <div class="row custom-form mb-4">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Years of Experience</label>
                        <input type="number" class="form-control" name="years_experience" value="<?php echo isset($about->years_experience) ? $about->years_experience : 0; ?>">
                    </div>
                    
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Projects Completed</label>
                        <input type="number" class="form-control" name="projects_completed" value="<?php echo isset($about->projects_completed) ? $about->projects_completed : 0; ?>">
                    </div>
                    
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Happy Clients</label>
                        <input type="number" class="form-control" name="happy_clients" value="<?php echo isset($about->happy_clients) ? $about->happy_clients : 0; ?>">
                    </div>
                </div>

                <h6 class="mb-3 mt-4" style="color:var(--primary-light);border-bottom:1px solid var(--card-border);padding-bottom:10px;">Media & Documents</h6>
                <div class="row custom-form mb-4">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Profile Image</label>
                        <input type="file" class="form-control" name="profile_image" accept="image/*">
                        <small class="text-muted">Upload a high-quality headshot or picture for the 'About' section.</small>
                        <?php if(isset($about->profile_image) && $about->profile_image): ?>
                            <div class="mt-2">
                                <img src="<?php echo base_url('uploads/about/'.$about->profile_image); ?>" alt="Profile" style="max-height: 80px; border-radius: 8px;">
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Downloadable Resume (PDF/DOC)</label>
                        <input type="file" class="form-control" name="resume_file" accept=".pdf,.doc,.docx">
                        <small class="text-muted">Provide a file for visitors to download your CV.</small>
                        <?php if(isset($about->resume_file) && $about->resume_file): ?>
                            <div class="mt-2 text-success">
                                <i class="fas fa-file-pdf"></i> Current CV is uploaded.
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn-grad"><i class="fas fa-save me-2"></i> Save Profile Content</button>
                    <a href="<?php echo base_url('admin/dashboard'); ?>" class="btn-outline-custom">Cancel</a>
                </div>
                
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 200,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['view', ['fullscreen', 'codeview']]
            ],
            callbacks: {
                onPaste: function (e) {
                    var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
                    e.preventDefault();
                    document.execCommand('insertText', false, bufferText);
                }
            }
        });
        
        $('span.note-icon-caret').remove();
        $('.note-editable').css({
            'background': 'rgba(255, 255, 255, 0.02)',
            'color': 'var(--text)'
        });
        $('.note-toolbar').css({
            'background': 'rgba(255, 255, 255, 0.05)',
            'border-bottom': '1px solid var(--card-border)'
        });
    });
</script>
