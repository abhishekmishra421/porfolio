<!-- Page Header -->
<div style="padding:160px 0 80px;background:radial-gradient(ellipse at 50% 100%,rgba(108,99,255,0.1) 0%,transparent 60%),var(--dark);border-bottom:1px solid var(--border);position:relative;">
    <div class="container position-relative" style="z-index: 2;">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <a href="<?php echo base_url('portfolio'); ?>" class="btn-outline-grad" style="padding: 0.5rem 1.2rem; font-size: 0.8rem; margin-bottom: 2rem;">
                    <i class="fas fa-arrow-left me-2"></i> Back to Portfolio
                </a>
                
                <div class="section-label mb-3"><?php echo $portfolio->category_name; ?></div>
                <h1 class="section-title-main" style="font-size: clamp(2.2rem, 5vw, 4rem); margin-bottom: 1.5rem; line-height: 1.2;"><?php echo $portfolio->title; ?></h1>
                
                <?php if ($portfolio->project_url): ?>
                    <a href="<?php echo $portfolio->project_url; ?>" target="_blank" class="btn-primary-grad mt-3">
                        Visit Live Project <i class="fas fa-external-link-alt ms-2"></i>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Project Details Section -->
<!-- Applied min-height: 60vh to push the footer down and remove the extra space below it -->
<section class="section" style="min-height: 60vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Featured Image Showcase -->
                <?php if ($portfolio->featured_image): ?>
                    <div style="border-radius: 20px; overflow: hidden; margin-bottom: 4rem; box-shadow: 0 30px 80px rgba(0,0,0,0.6); border: 1px solid var(--border);" data-aos="fade-up">
                        <img src="<?php echo base_url('uploads/portfolio/' . $portfolio->featured_image); ?>" alt="<?php echo $portfolio->title; ?>" style="width: 100%; height: auto;">
                    </div>
                <?php endif; ?>

                <div class="row">
                    <!-- Project Description -->
                    <div class="col-lg-8 pe-lg-5" data-aos="fade-right">
                        <h3 style="font-family: 'Space Grotesk', sans-serif; font-weight: 700; margin-bottom: 1.5rem; color: #fff;">Project Overview</h3>
                        <div class="portfolio-content" style="color: var(--text-muted); font-size: 1.05rem; line-height: 1.8;">
                            <?php echo $portfolio->description; ?>
                        </div>
                    </div>
                    
                    <!-- Sidebar Details -->
                    <div class="col-lg-4 mt-5 mt-lg-0" data-aos="fade-left">
                        <div style="background: rgba(255,255,255,0.02); border: 1px solid var(--border); border-radius: 18px; padding: 2rem;">
                            <h4 style="font-family: 'Space Grotesk', sans-serif; font-weight: 700; margin-bottom: 1.5rem; color: #fff; border-bottom: 1px solid var(--border); padding-bottom: 1rem;">Project Info</h4>
                            
                            <div style="margin-bottom: 1.2rem;">
                                <div style="font-size: 0.8rem; color: var(--text-muted); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 0.3rem;">Category</div>
                                <div style="font-weight: 600; color: #fff;"><?php echo $portfolio->category_name; ?></div>
                            </div>
                            
                            <?php if(isset($portfolio->client_name) && !empty($portfolio->client_name)): ?>
                            <div style="margin-bottom: 1.2rem;">
                                <div style="font-size: 0.8rem; color: var(--text-muted); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 0.3rem;">Client</div>
                                <div style="font-weight: 600; color: #fff;"><?php echo $portfolio->client_name; ?></div>
                            </div>
                            <?php endif; ?>
                            
                            <div style="margin-bottom: 1.2rem;">
                                <div style="font-size: 0.8rem; color: var(--text-muted); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 0.3rem;">Date</div>
                                <div style="font-weight: 600; color: #fff;"><?php echo date('M Y', strtotime($portfolio->created_at)); ?></div>
                            </div>
                            
                            <!-- Share -->
                            <div style="margin-top: 2rem; padding-top: 1.5rem; border-top: 1px solid var(--border);">
                                <div style="font-size: 0.8rem; color: var(--text-muted); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 0.8rem;">Share Project</div>
                                <div>
                                    <a href="#" style="color: var(--text); background: rgba(255,255,255,0.05); width: 36px; height: 36px; display: inline-flex; align-items: center; justify-content: center; border-radius: 10px; border: 1px solid var(--border); transition: all 0.3s; margin-right: 0.4rem;"><i class="fab fa-twitter"></i></a>
                                    <a href="#" style="color: var(--text); background: rgba(255,255,255,0.05); width: 36px; height: 36px; display: inline-flex; align-items: center; justify-content: center; border-radius: 10px; border: 1px solid var(--border); transition: all 0.3s; margin-right: 0.4rem;"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="#" style="color: var(--text); background: rgba(255,255,255,0.05); width: 36px; height: 36px; display: inline-flex; align-items: center; justify-content: center; border-radius: 10px; border: 1px solid var(--border); transition: all 0.3s;"><i class="fab fa-facebook-f"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Projects (if provided by controller) -->
        <?php if (!empty($related_portfolio)): ?>
            <div style="margin-top: 6rem; padding-top: 4rem; border-top: 1px solid var(--border);">
                <div class="d-flex justify-content-between align-items-end mb-4">
                    <h3 style="font-family: 'Space Grotesk', sans-serif; font-weight: 700;">Related <span class="text-primary">Projects</span></h3>
                </div>
                
                <div class="row g-4">
                    <?php foreach ($related_portfolio as $item): ?>
                        <div class="col-lg-4 col-md-6">
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
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Add some basic styling for content output -->
<style>
    .portfolio-content h2, .portfolio-content h3, .portfolio-content h4 {
        color: #fff;
        font-family: 'Space Grotesk', sans-serif;
        margin-top: 1.5rem;
        margin-bottom: 1rem;
        font-weight: 700;
    }
    .portfolio-content p {
        margin-bottom: 1.2rem;
    }
    .portfolio-content ul, .portfolio-content ol {
        margin-bottom: 1.5rem;
        padding-left: 1.2rem;
    }
    .portfolio-content li {
        margin-bottom: 0.5rem;
    }
    .portfolio-content img {
        max-width: 100%;
        height: auto;
        border-radius: 10px;
        margin: 1.5rem 0;
    }
    .portfolio-content a {
        color: var(--secondary);
        text-decoration: none;
    }
    .portfolio-content a:hover {
        text-decoration: underline;
    }
</style>
