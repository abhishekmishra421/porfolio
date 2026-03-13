<!-- Page Title -->
<div class="page-title-bar">
    <div>
        <h1><?php echo $title; ?></h1>
        <p style="color:var(--text-muted);font-size:0.85rem;margin-top:2px;">Manage what services you offer.</p>
    </div>
    <a href="<?php echo base_url('admin/service_add'); ?>" class="btn-grad">
        <i class="fas fa-plus"></i> Add Service
    </a>
</div>

<div class="row">
    <div class="col-12">
        <div class="admin-card">
            <div class="admin-card-header">
                <h5><i class="fas fa-concierge-bell me-2" style="color:var(--warning)"></i>All Services</h5>
            </div>
            <div class="admin-card-body">
                <?php if(empty($services)): ?>
                    <div style="text-align:center;padding:40px;color:var(--text-muted);">
                        <i class="fas fa-concierge-bell" style="font-size:3rem;margin-bottom:15px;color:rgba(245,158,11,0.5);"></i>
                        <p>No services added yet. Click "Add Service" to create one.</p>
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-hover" id="dataTable">
                            <thead>
                                <tr>
                                    <th width="50">Icon</th>
                                    <th>Service Name</th>
                                    <th>Description</th>
                                    <th>Order</th>
                                    <th>Status</th>
                                    <th width="100">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($services as $service): ?>
                                <tr>
                                    <td class="text-center" style="font-size:1.4rem;color:var(--primary-light);">
                                        <i class="<?php echo $service->icon ?: 'fas fa-cog'; ?>"></i>
                                    </td>
                                    <td style="font-weight:600;color:#fff;"><?php echo $service->title; ?></td>
                                    <td style="color:var(--text-muted);max-width:300px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">
                                        <?php echo $service->description; ?>
                                    </td>
                                    <td><?php echo $service->sort_order; ?></td>
                                    <td>
                                        <?php if($service->is_active): ?>
                                            <span class="badge-active">Active</span>
                                        <?php else: ?>
                                            <span class="badge-inactive">Inactive</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div style="display:flex;gap:6px;">
                                            <a href="<?php echo base_url('admin/service_edit/'.$service->id); ?>" class="action-btn action-btn-edit" title="Edit">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            <a href="<?php echo base_url('admin/service_delete/'.$service->id); ?>" class="action-btn action-btn-delete confirm-delete" title="Delete" onclick="return confirm('Are you sure you want to delete this service?');">
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
