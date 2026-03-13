<!-- Page Title -->
<div class="page-title-bar">
    <div>
        <h1><?php echo $title; ?></h1>
        <p style="color:var(--text-muted);font-size:0.85rem;margin-top:2px;">Manage categories for your portfolio and blog.</p>
    </div>
    <a href="<?php echo base_url('admin/category_add'); ?>" class="btn-grad">
        <i class="fas fa-plus"></i> Add Category
    </a>
</div>

<div class="row">
    <div class="col-12">
        <div class="admin-card">
            <div class="admin-card-header">
                <h5><i class="fas fa-tags me-2" style="color:var(--primary)"></i>All Categories</h5>
            </div>
            <div class="admin-card-body">
                <?php if(empty($categories)): ?>
                    <div style="text-align:center;padding:40px;color:var(--text-muted);">
                        <i class="fas fa-tags" style="font-size:3rem;margin-bottom:15px;color:rgba(108,99,255,0.5);"></i>
                        <p>No categories added yet. Click "Add Category" to create one.</p>
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-hover" id="dataTable">
                            <thead>
                                <tr>
                                    <th>Category Name</th>
                                    <th>Slug</th>
                                    <th>Status</th>
                                    <th width="100">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($categories as $category): ?>
                                <tr>
                                    <td style="font-weight:600;color:#fff;"><?php echo $category->name; ?></td>
                                    <td style="color:var(--text-muted);"><?php echo $category->slug; ?></td>
                                    <td>
                                        <?php if($category->is_active): ?>
                                            <span class="badge-active">Active</span>
                                        <?php else: ?>
                                            <span class="badge-inactive">Inactive</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div style="display:flex;gap:6px;">
                                            <a href="<?php echo base_url('admin/category_edit/'.$category->id); ?>" class="action-btn action-btn-edit" title="Edit">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            <a href="<?php echo base_url('admin/category_delete/'.$category->id); ?>" class="action-btn action-btn-delete confirm-delete" title="Delete" onclick="return confirm('Are you sure you want to delete this category?');">
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
