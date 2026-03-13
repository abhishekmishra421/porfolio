<!-- Page Header -->
<div style="padding:140px 0 60px;background:radial-gradient(ellipse at 20% 50%,rgba(108,99,255,0.15) 0%,transparent 60%),var(--dark);border-bottom:1px solid var(--border);text-align:center;">
    <div class="container">
        <div class="section-label">Journal</div>
        <h1 class="section-title-main">My <span class="gradient-text">Blog</span></h1>
        <p class="section-subtitle mx-auto">Read my latest thoughts, tutorials, and insights on development, design, and tech.</p>
    </div>
</div>

<!-- Blog Section -->
<section class="section">
    <div class="container">
        <?php if (!empty($posts)): ?>
            <div class="row g-4">
                <?php $i = 0; foreach ($posts as $post): $i++; ?>
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?php echo ($i % 3) * 100; ?>">
                        <div class="blog-card" data-tilt data-tilt-max="7" data-tilt-speed="500" data-tilt-glare="true" data-tilt-max-glare="0.1">
                            <div class="blog-img">
                                <?php if ($post->featured_image): ?>
                                    <img src="<?php echo base_url('uploads/blog/' . $post->featured_image); ?>" alt="<?php echo $post->title; ?>">
                                <?php else: ?>
                                    <div style="height:210px;background:var(--gradient-glow);display:flex;align-items:center;justify-content:center;font-size:3rem;color:var(--primary);">
                                        <i class="fas fa-newspaper"></i>
                                    </div>
                                <?php endif; ?>
                                <div class="blog-date-badge"><?php echo date('M d, Y', strtotime($post->created_at)); ?></div>
                            </div>
                            <div class="blog-body">
                                <a class="blog-title" href="<?php echo base_url('blog/' . $post->slug); ?>"><?php echo $post->title; ?></a>
                                <p class="blog-excerpt">
                                    <?php echo $post->excerpt ? substr($post->excerpt, 0, 110) . '...' : (strlen(strip_tags($post->content)) > 110 ? substr(strip_tags($post->content), 0, 110) . '...' : strip_tags($post->content)); ?>
                                </p>
                                <div class="blog-meta">
                                    <span><i class="far fa-user" style="color:var(--primary);"></i> <?php echo $post->author ? $post->author : 'Admin'; ?></span>
                                    <span><i class="far fa-eye" style="color:var(--primary);"></i> <?php echo isset($post->views) ? $post->views : 0; ?> views</span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <!-- Optional Pagination (if implemented in controller) -->
            <?php if(isset($pagination) && $pagination): ?>
                <div class="row mt-5">
                    <div class="col-12 text-center">
                        <?php echo $pagination; ?>
                    </div>
                </div>
            <?php endif; ?>

        <?php else: ?>
            <div class="text-center py-5">
                <div style="font-size:4rem;color:var(--text-muted);margin-bottom:1rem;"><i class="fas fa-pen-nib"></i></div>
                <h3 style="color:#fff;">No Posts Yet</h3>
                <p style="color:var(--text-muted);">I haven't published any articles yet. Check back soon!</p>
            </div>
        <?php endif; ?>
    </div>
</section>
