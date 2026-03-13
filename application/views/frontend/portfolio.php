<!-- Page Header -->
<div style="padding:140px 0 60px;background:radial-gradient(ellipse at 20% 50%,rgba(108,99,255,0.15) 0%,transparent 60%),var(--dark);border-bottom:1px solid var(--border);text-align:center;">
    <div class="container">
        <div class="section-label">My Work</div>
        <h1 class="section-title-main">My <span class="gradient-text">Portfolio</span></h1>
        <p class="section-subtitle mx-auto">Explore a collection of my recent projects and creations.</p>
    </div>
</div>

<!-- Portfolio Section -->
<section class="section">
    <div class="container">
        
        <!-- Filters (if Categories exist) -->
        <?php if (!empty($categories)): ?>
            <div class="row mb-5 text-center">
                <div class="col-12">
                    <div class="filter-wrap" style="display:inline-flex; flex-wrap:wrap; gap:10px; justify-content:center;">
                        <button class="btn-outline-grad filter-btn active" data-filter="all">All Projects</button>
                        <?php foreach($categories as $cat): ?>
                            <button class="btn-outline-grad filter-btn" data-filter="<?php echo strtolower(str_replace(' ', '-', $cat->name)); ?>">
                                <?php echo $cat->name; ?> <span class="badge bg-primary ms-2"><?php echo $cat->portfolio_count; ?></span>
                            </button>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const btns = document.querySelectorAll('.filter-btn');
                    const items = document.querySelectorAll('.portfolio-item-wrap');
                    
                    btns.forEach(btn => {
                        btn.addEventListener('click', () => {
                            btns.forEach(b => b.classList.remove('active'));
                            btn.classList.add('active');
                            const f = btn.getAttribute('data-filter');
                            
                            items.forEach(item => {
                                if(f === 'all' || item.getAttribute('data-category') === f) {
                                    item.style.display = 'block';
                                    setTimeout(() => { item.style.opacity = '1'; item.style.transform = 'scale(1)'; }, 50);
                                } else {
                                    item.style.opacity = '0';
                                    item.style.transform = 'scale(0.8)';
                                    setTimeout(() => { item.style.display = 'none'; }, 300);
                                }
                            });
                        });
                    });
                });
            </script>
        <?php endif; ?>

        <!-- Portfolio Grid -->
        <?php if (!empty($portfolio_items)): ?>
            <div class="row g-4" id="portfolio-grid">
                <?php foreach ($portfolio_items as $item): 
                    $catClass = strtolower(str_replace(' ', '-', $item->category_name));
                ?>
                    <div class="col-lg-4 col-md-6 portfolio-item-wrap" data-category="<?php echo $catClass; ?>" style="transition: all 0.4s ease;">
                        <div class="portfolio-card" data-tilt data-tilt-max="8" data-tilt-speed="400" data-tilt-glare="true" data-tilt-max-glare="0.12">
                            <div class="portfolio-img">
                                <?php if ($item->featured_image): ?>
                                    <img src="<?php echo base_url('uploads/portfolio/' . $item->featured_image); ?>" alt="<?php echo $item->title; ?>">
                                <?php else: ?>
                                    <div style="height:240px;background:var(--gradient-glow);display:flex;align-items:center;justify-content:center;font-size:3rem;color:var(--primary);">
                                        <i class="fas fa-image"></i>
                                    </div>
                                <?php endif; ?>
                                <div class="portfolio-overlay">
                                    <a href="<?php echo base_url('portfolio/' . $item->slug); ?>"><i class="fas fa-link"></i></a>
                                    <?php if ($item->project_url): ?>
                                        <a href="<?php echo $item->project_url; ?>" target="_blank"><i class="fas fa-external-link-alt"></i></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="portfolio-body">
                                <p class="portfolio-category"><?php echo $item->category_name; ?></p>
                                <h3 class="portfolio-title"><?php echo $item->title; ?></h3>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="text-center py-5">
                <div style="font-size:4rem;color:var(--text-muted);margin-bottom:1rem;"><i class="fas fa-folder-open"></i></div>
                <h3 style="color:#fff;">No Projects Found</h3>
                <p style="color:var(--text-muted);">Check back later for new updates to my portfolio.</p>
            </div>
        <?php endif; ?>

    </div>
</section>
