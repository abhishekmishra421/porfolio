<!-- Page Title -->
<div class="page-title-bar">
    <div>
        <h1><?php echo $title; ?></h1>
        <p style="color:var(--text-muted);font-size:0.85rem;margin-top:2px;">Manage showcase projects in your portfolio.</p>
    </div>
    <a href="<?php echo base_url('admin/portfolio_add'); ?>" class="btn-grad">
        <i class="fas fa-plus"></i> Add Portfolio Item
    </a>
</div>

<div class="row">
    <div class="col-12">
        <div class="admin-card">
            <div class="admin-card-header">
                <h5><i class="fas fa-images me-2" style="color:var(--primary)"></i>All Projects</h5>
            </div>
            <div class="admin-card-body">
                <?php if(empty($portfolio)): ?>
                    <div style="text-align:center;padding:40px;color:var(--text-muted);">
                        <i class="fas fa-folder-open" style="font-size:3rem;margin-bottom:15px;color:rgba(108,99,255,0.5);"></i>
                        <p>No portfolio items found. Click "Add Portfolio Item" to create one.</p>
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-hover" id="dataTable">
                            <thead>
                                <tr>
                                    <th width="80">Image</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Client / Date</th>
                                    <th>Featured</th>
                                    <th>Status</th>
                                    <th width="100">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($portfolio as $item): ?>
                                <tr>
                                    <td>
                                        <?php if($item->featured_image): ?>
                                            <div style="width:60px;height:45px;border-radius:8px;overflow:hidden;border:1px solid var(--card-border);">
                                                <img src="<?php echo base_url('uploads/portfolio/'.$item->featured_image); ?>" alt="<?php echo $item->title; ?>" style="width:100%;height:100%;object-fit:cover;">
                                            </div>
                                        <?php else: ?>
                                            <div style="width:60px;height:45px;border-radius:8px;background:var(--card-border);display:flex;align-items:center;justify-content:center;color:var(--text-muted);">
                                                <i class="fas fa-image"></i>
                                            </div>
                                        <?php endif; ?>
                                    </td>
                                    <td style="font-weight:600;color:#fff;">
                                        <?php echo $item->title; ?>
                                        <?php if($item->project_url): ?>
                                            <a href="<?php echo $item->project_url; ?>" target="_blank" style="color:var(--primary-light);margin-left:5px;font-size:0.75rem;"><i class="fas fa-external-link-alt"></i></a>
                                        <?php endif; ?>
                                    </td>
                                    <td style="color:var(--text-muted);"><?php echo isset($item->category_name) ? $item->category_name : 'Uncategorized'; ?></td>
                                    <td>
                                        <div style="font-size:0.85rem;color:var(--text);"><?php echo $item->client ?: '-'; ?></div>
                                        <div style="font-size:0.75rem;color:var(--text-muted);"><?php echo $item->project_date ?: '-'; ?></div>
                                    </td>
                                    <td>
                                        <?php if($item->is_featured): ?>
                                            <i class="fas fa-star" style="color:var(--warning);"></i>
                                        <?php else: ?>
                                            <i class="far fa-star" style="color:var(--text-muted);"></i>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($item->is_active): ?>
                                            <span class="badge-active">Active</span>
                                        <?php else: ?>
                                            <span class="badge-inactive">Draft</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div style="display:flex;gap:6px;">
                                            <a href="<?php echo base_url('admin/portfolio_edit/'.$item->id); ?>" class="action-btn action-btn-edit" title="Edit">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            <a href="<?php echo base_url('admin/portfolio_delete/'.$item->id); ?>" class="action-btn action-btn-delete confirm-delete" title="Delete" onclick="return confirm('Are you sure you want to delete this portfolio item?');">
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
