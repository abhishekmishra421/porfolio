<!-- Page Title -->
<div class="page-title-bar">
    <div>
        <h1><?php echo $title; ?></h1>
        <p style="color:var(--text-muted);font-size:0.85rem;margin-top:2px;">Manage articles and publications for your blog.</p>
    </div>
    <a href="<?php echo base_url('admin/blog_add'); ?>" class="btn-grad">
        <i class="fas fa-plus"></i> Write Blog Post
    </a>
</div>

<div class="row">
    <div class="col-12">
        <div class="admin-card">
            <div class="admin-card-header">
                <h5><i class="fas fa-edit me-2" style="color:var(--info)"></i>All Posts</h5>
            </div>
            <div class="admin-card-body">
                <?php if(empty($posts)): ?>
                    <div style="text-align:center;padding:40px;color:var(--text-muted);">
                        <i class="fas fa-newspaper" style="font-size:3rem;margin-bottom:15px;color:rgba(108,99,255,0.5);"></i>
                        <p>No blog posts found. Click "Write Blog Post" to publish something.</p>
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-hover" id="dataTable">
                            <thead>
                                <tr>
                                    <th width="80">Image</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Date</th>
                                    <th>Featured</th>
                                    <th>Status</th>
                                    <th width="100">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($posts as $post): ?>
                                <tr>
                                    <td>
                                        <?php if($post->featured_image): ?>
                                            <div style="width:60px;height:45px;border-radius:8px;overflow:hidden;border:1px solid var(--card-border);">
                                                <img src="<?php echo base_url('uploads/blog/'.$post->featured_image); ?>" alt="<?php echo $post->title; ?>" style="width:100%;height:100%;object-fit:cover;">
                                            </div>
                                        <?php else: ?>
                                            <div style="width:60px;height:45px;border-radius:8px;background:var(--card-border);display:flex;align-items:center;justify-content:center;color:var(--text-muted);">
                                                <i class="fas fa-image"></i>
                                            </div>
                                        <?php endif; ?>
                                    </td>
                                    <td style="font-weight:600;color:#fff;">
                                        <div style="max-width:300px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">
                                            <?php echo $post->title; ?>
                                        </div>
                                    </td>
                                    <td style="color:var(--text-muted);"><?php echo $post->author ?: 'Admin'; ?></td>
                                    <td style="font-size:0.85rem;color:var(--text-muted);">
                                        <?php echo date('M d, Y', strtotime($post->created_at)); ?>
                                    </td>
                                    <td>
                                        <?php if($post->is_featured): ?>
                                            <i class="fas fa-star" style="color:var(--warning);"></i>
                                        <?php else: ?>
                                            <i class="far fa-star" style="color:var(--text-muted);"></i>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($post->is_active): ?>
                                            <span class="badge-active">Published</span>
                                        <?php else: ?>
                                            <span class="badge-inactive">Draft</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div style="display:flex;gap:6px;">
                                            <a href="<?php echo base_url('admin/blog_edit/'.$post->id); ?>" class="action-btn action-btn-edit" title="Edit">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            <a href="<?php echo base_url('admin/blog_delete/'.$post->id); ?>" class="action-btn action-btn-delete confirm-delete" title="Delete" onclick="return confirm('Are you sure you want to delete this post?');">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
