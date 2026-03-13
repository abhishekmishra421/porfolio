<!-- Page Header -->
<div style="padding:160px 0 80px;background:radial-gradient(ellipse at 50% 100%,rgba(108,99,255,0.1) 0%,transparent 60%),var(--dark);border-bottom:1px solid var(--border);position:relative;">
    <div class="container position-relative" style="z-index: 2;">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <a href="<?php echo base_url('blog'); ?>" class="btn-outline-grad" style="padding: 0.5rem 1.2rem; font-size: 0.8rem; margin-bottom: 2rem;">
                    <i class="fas fa-arrow-left me-2"></i> Back to Blog
                </a>
                <h1 class="section-title-main" style="font-size: clamp(2.2rem, 5vw, 4rem); margin-bottom: 1.5rem; line-height: 1.2;"><?php echo $post->title; ?></h1>
                
                <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 2rem; color: var(--text-muted); font-size: 0.95rem;">
                    <div><i class="far fa-calendar-alt text-primary me-2"></i> <?php echo date('F j, Y', strtotime($post->created_at)); ?></div>
                    <div><i class="far fa-user text-primary me-2"></i> <?php echo $post->author ? $post->author : 'Admin'; ?></div>
                    <div><i class="far fa-eye text-primary me-2"></i> <?php echo isset($post->views) ? $post->views : 0; ?> Views</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Blog Content -->
<!-- Applied min-height: 60vh to push the footer down and remove the extra space below it -->
<section class="section" style="min-height: 60vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Featured Image -->
                <?php if ($post->featured_image): ?>
                    <div style="border-radius: 20px; overflow: hidden; margin-bottom: 3rem; box-shadow: 0 20px 60px rgba(0,0,0,0.5); border: 1px solid var(--border);">
                        <img src="<?php echo base_url('uploads/blog/' . $post->featured_image); ?>" alt="<?php echo $post->title; ?>" style="width: 100%; height: auto; max-height: 500px; object-fit: cover;">
                    </div>
                <?php endif; ?>

                <!-- Content -->
                <div class="blog-content" style="color: var(--text); font-size: 1.05rem; line-height: 1.8;">
                    <?php echo $post->content; ?>
                </div>

                <!-- Footer / Share (Optional) -->
                <div style="margin-top: 4rem; padding-top: 2rem; border-top: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem;">
                    <div>
                        <span style="color: var(--text-muted); font-weight: 600; margin-right: 1rem;">Share this article:</span>
                        <a href="#" style="color: var(--text); background: rgba(255,255,255,0.05); width: 40px; height: 40px; display: inline-flex; align-items: center; justify-content: center; border-radius: 50%; border: 1px solid var(--border); transition: all 0.3s; margin-right: 0.5rem;"><i class="fab fa-twitter"></i></a>
                        <a href="#" style="color: var(--text); background: rgba(255,255,255,0.05); width: 40px; height: 40px; display: inline-flex; align-items: center; justify-content: center; border-radius: 50%; border: 1px solid var(--border); transition: all 0.3s; margin-right: 0.5rem;"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" style="color: var(--text); background: rgba(255,255,255,0.05); width: 40px; height: 40px; display: inline-flex; align-items: center; justify-content: center; border-radius: 50%; border: 1px solid var(--border); transition: all 0.3s;"><i class="fab fa-facebook-f"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Posts (if provided by controller) -->
        <?php if (!empty($recent_posts)): ?>
            <div style="margin-top: 6rem; padding-top: 4rem; border-top: 1px solid var(--border);">
                <div class="d-flex justify-content-between align-items-end mb-4">
                    <h3 style="font-family: 'Space Grotesk', sans-serif; font-weight: 700;">Continue <span class="text-primary">Reading</span></h3>
                    <a href="<?php echo base_url('blog'); ?>" class="btn-outline-grad" style="padding: 0.5rem 1.2rem; font-size: 0.8rem;">View All Posts</a>
                </div>
                
                <div class="row g-4">
                    <?php foreach ($recent_posts as $recent): ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="blog-card" style="height: 100%; border-radius: 18px; overflow: hidden; border: 1px solid var(--border); background: rgba(255,255,255,0.025); transition: all 0.4s ease;">
                                <div style="height: 180px; overflow: hidden; position: relative;">
                                    <?php if ($recent->featured_image): ?>
                                        <img src="<?php echo base_url('uploads/blog/' . $recent->featured_image); ?>" alt="<?php echo $recent->title; ?>" style="width: 100%; height: 100%; object-fit: cover;">
                                    <?php else: ?>
                                        <div style="height:100%;background:var(--gradient-glow);display:flex;align-items:center;justify-content:center;font-size:2rem;color:var(--primary);">
                                            <i class="fas fa-newspaper"></i>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div style="padding: 1.2rem;">
                                    <h4 style="font-family: 'Space Grotesk', sans-serif; font-size: 1rem; font-weight: 700; margin-bottom: 0.5rem;">
                                        <a href="<?php echo base_url('blog/' . $recent->slug); ?>" style="color: #fff; text-decoration: none;"><?php echo $recent->title; ?></a>
                                    </h4>
                                    <div style="font-size: 0.8rem; color: var(--text-muted);">
                                        <i class="far fa-calendar-alt text-primary me-1"></i> <?php echo date('M d, Y', strtotime($recent->created_at)); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Add some basic styling for blog content output -->
<style>
    .blog-content h2, .blog-content h3, .blog-content h4 {
        color: #fff;
        font-family: 'Space Grotesk', sans-serif;
        margin-top: 2rem;
        margin-bottom: 1rem;
        font-weight: 700;
    }
    .blog-content p {
        margin-bottom: 1.5rem;
    }
    .blog-content img {
        max-width: 100%;
        height: auto;
        border-radius: 10px;
        margin: 1.5rem 0;
    }
    .blog-content a {
        color: var(--secondary);
        text-decoration: none;
    }
    .blog-content a:hover {
        text-decoration: underline;
    }
    .blog-content blockquote {
        border-left: 4px solid var(--primary);
        padding-left: 1.5rem;
        margin: 2rem 0;
        font-style: italic;
        color: var(--text-muted);
        background: rgba(255,255,255,0.02);
        padding: 1.5rem;
        border-radius: 0 12px 12px 0;
    }
</style>
