<!-- Page Title -->
<div class="page-title-bar">
    <div>
        <h1><?php echo $title; ?></h1>
        <p style="color:var(--text-muted);font-size:0.85rem;margin-top:2px;">Set up your "About Me" profile for the first time.</p>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="admin-card">
            <div class="admin-card-header">
                <h5><i class="fas fa-user-plus mb-0 me-2" style="color:var(--success)"></i>Create Profile Information</h5>
            </div>
            <div class="admin-card-body">
                <?php echo form_open_multipart('admin/about'); ?>
                
                <h6 class="mb-3" style="color:var(--primary-light);border-bottom:1px solid var(--card-border);padding-bottom:10px;">Personal Details</h6>
                <div class="row custom-form">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control" name="name" placeholder="John Doe">
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Email Address</label>
                        <input type="email" class="form-control" name="email" placeholder="john@example.com">
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Phone Number</label>
                        <input type="text" class="form-control" name="phone" placeholder="+1 234 567 8900">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Location / Address</label>
                        <input type="text" class="form-control" name="location" placeholder="New York, USA">
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Degree / Education</label>
                        <input type="text" class="form-control" name="degree" placeholder="BSc in Computer Science">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Freelance Availability</label>
                        <input type="text" class="form-control" name="freelance" value="Available">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" name="dob">
                    </div>
                </div>

                <h6 class="mb-3 mt-4" style="color:var(--primary-light);border-bottom:1px solid var(--card-border);padding-bottom:10px;">Professional Biography</h6>
                <div class="custom-form mb-4">
                    <label class="form-label">Short Tagline (Description)</label>
                    <input type="text" class="form-control" name="description" placeholder="A short catchphrase or description">
                    
                    <label class="form-label mt-3">Full Bio details</label>
                    <textarea class="form-control" name="bio" id="summernote" rows="5"></textarea>
                </div>

                <h6 class="mb-3 mt-4" style="color:var(--primary-light);border-bottom:1px solid var(--card-border);padding-bottom:10px;">Career Statistics</h6>
                <div class="row custom-form mb-4">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Years of Experience</label>
                        <input type="number" class="form-control" name="years_experience" value="0">
                    </div>
                    
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Projects Completed</label>
                        <input type="number" class="form-control" name="projects_completed" value="0">
                    </div>
                    
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Happy Clients</label>
                        <input type="number" class="form-control" name="happy_clients" value="0">
                    </div>
                </div>

                <h6 class="mb-3 mt-4" style="color:var(--primary-light);border-bottom:1px solid var(--card-border);padding-bottom:10px;">Media & Documents</h6>
                <div class="row custom-form mb-4">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Profile Image</label>
                        <input type="file" class="form-control" name="profile_image" accept="image/*">
                        <small class="text-muted">Upload a high-quality headshot or picture for the 'About' section.</small>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Downloadable Resume (PDF/DOC)</label>
                        <input type="file" class="form-control" name="resume_file" accept=".pdf,.doc,.docx">
                        <small class="text-muted">Provide a file for visitors to download your CV.</small>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn-grad"><i class="fas fa-plus me-2"></i> Create Profile Content</button>
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
