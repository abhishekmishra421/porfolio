<!-- Page Title -->
<div class="page-title-bar">
    <div>
        <a href="<?php echo base_url('admin/blog'); ?>" class="btn-ghost" style="padding:6px 14px;font-size:0.8rem;margin-bottom:10px;">
            <i class="fas fa-arrow-left"></i> Back to Blog
        </a>
        <h1><?php echo $title; ?></h1>
    </div>
</div>

<?php echo form_open_multipart('admin/blog_add'); ?>
<div class="row">
    <div class="col-12">
        <div class="admin-card mb-4">
            <div class="admin-card-header">
                <h5><i class="fas fa-pencil-alt me-2" style="color:var(--primary)"></i>Write Post</h5>
            </div>
            <div class="admin-card-body">
                <div class="mb-3">
                    <label class="form-label">Post Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" value="<?php echo set_value('title'); ?>" required placeholder="Enter a catchy title...">
                    <?php echo form_error('title', '<div class="text-danger" style="font-size:0.8rem;margin-top:4px;">', '</div>'); ?>
                </div>

                <div class="mb-3">
                    <label class="form-label">Excerpt / Short Description</label>
                    <textarea name="excerpt" class="form-control" rows="3" placeholder="A short summary for the blog listing page..."><?php echo set_value('excerpt'); ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Main Content <span class="text-danger">*</span></label>
                    <textarea name="content" class="form-control" id="summernote" rows="15" required><?php echo set_value('content'); ?></textarea>
                    <?php echo form_error('content', '<div class="text-danger" style="font-size:0.8rem;margin-top:4px;">', '</div>'); ?>
                </div>

                <div class="mb-3">
                    <label class="form-label">Author Name</label>
                    <input type="text" name="author" class="form-control" value="<?php echo set_value('author', $this->session->userdata('admin_username')); ?>">
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-12">
        <div class="admin-card mb-4">
            <div class="admin-card-header">
                <h5><i class="fas fa-cog me-2" style="color:var(--success)"></i>Publish</h5>
            </div>
            <div class="admin-card-body">
                <div class="mb-4 form-check form-switch custom-switch" style="padding-left:0;display:flex;align-items:center;justify-content:space-between;">
                    <label class="form-check-label" style="color:var(--text);font-weight:600;font-size:0.9rem;">Featured Post</label>
                    <input class="form-check-input" type="checkbox" name="is_featured" value="1" style="width:40px;height:20px;margin-left:auto;cursor:pointer;">
                </div>

                <div class="mb-4 form-check form-switch custom-switch" style="padding-left:0;display:flex;align-items:center;justify-content:space-between;">
                    <label class="form-check-label" style="color:var(--text);font-weight:600;font-size:0.9rem;">Status (Published/Draft)</label>
                    <input class="form-check-input" type="checkbox" name="is_active" value="1" checked style="width:40px;height:20px;margin-left:auto;cursor:pointer;">
                </div>

                <hr style="border-color:var(--card-border);margin:20px 0;">
                
                <button type="submit" class="btn-grad w-100" style="justify-content:center;padding:12px;">
                    <i class="fas fa-paper-plane"></i> Publish Post
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
                    <div style="font-size:0.75rem;color:var(--text-muted);margin-top:4px;">This image appears at the top of the post and in listings.</div>
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
            height: 400,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview']]
            ]
        });
    }
});
</script>
