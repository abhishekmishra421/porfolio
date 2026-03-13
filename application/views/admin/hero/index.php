<!-- Page Title -->
<div class="page-title-bar">
    <div>
        <h1><?php echo $title; ?></h1>
        <p style="color:var(--text-muted);font-size:0.85rem;margin-top:2px;">Manage the hero (first impression) section of your website.</p>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="admin-card">
            <div class="admin-card-header">
                <h5><i class="fas fa-home me-2" style="color:#f093fb"></i>Hero Section Content</h5>
            </div>
            <div class="admin-card-body">
                <?php if(empty($hero)): ?>
                    <div style="text-align:center;padding:40px;color:var(--text-muted);">
                        <i class="fas fa-exclamation-triangle" style="font-size:3rem;margin-bottom:15px;color:var(--warning);"></i>
                        <p>No hero content found. Please add a record to the database.</p>
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Subtitle</th>
                                    <th>Status</th>
                                    <th width="100">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($hero as $h): ?>
                                <tr>
                                    <td>
                                        <?php if($h->profile_image): ?>
                                            <div style="width:50px;height:50px;border-radius:10px;overflow:hidden;border:1px solid var(--card-border);">
                                                <img src="<?php echo base_url('uploads/hero/'.$h->profile_image); ?>" alt="Profile" style="width:100%;height:100%;object-fit:cover;">
                                            </div>
                                        <?php else: ?>
                                            <div style="width:50px;height:50px;border-radius:10px;background:var(--card-border);display:flex;align-items:center;justify-content:center;color:var(--text-muted);">
                                                <i class="fas fa-image"></i>
                                            </div>
                                        <?php endif; ?>
                                    </td>
                                    <td style="font-weight:600;"><?php echo $h->title; ?></td>
                                    <td style="max-width:300px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;color:var(--text-muted);"><?php echo $h->subtitle; ?></td>
                                    <td>
                                        <?php if($h->is_active): ?>
                                            <span class="badge-active">Active</span>
                                        <?php else: ?>
                                            <span class="badge-inactive">Inactive</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url('admin/hero_edit/'.$h->id); ?>" class="action-btn action-btn-edit" title="Edit">
                                            <i class="fas fa-pen"></i>
                                        </a>
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
