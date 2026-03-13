<!-- Hero Section -->
<?php if ($hero): ?>
    <section class="hero" id="home">
        <!-- Three.js Canvas -->
        <canvas id="hero-canvas"></canvas>

        <!-- Gradient Bg -->
        <div class="hero-bg"></div>
        <?php if ($hero->background_image): ?>
            <div class="hero-bg-img">
                <img src="<?php echo base_url('uploads/hero/' . $hero->background_image); ?>" alt="Hero Background">
            </div>
        <?php endif; ?>

        <!-- Floating blob shapes -->
        <div class="hero-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
            <div class="shape shape-3"></div>
        </div>

        <div class="container hero-content-wrap">
            <div class="row align-items-center gy-5">
                <!-- Left: Text -->
                <div class="col-lg-7 order-2 order-lg-1">
                    <div class="hero-badge animate-1">
                        <span class="pulse-dot"></span>Available for Freelance
                    </div>

                    <h1 class="hero-title animate-2">
                        <?php
                        $titleParts = explode(' ', $hero->title, 3);
                        if (count($titleParts) >= 2) {
                            echo $titleParts[0] . ' ' . $titleParts[1];
                            if (isset($titleParts[2]))
                                echo ' <span class="gradient-text">' . $titleParts[2] . '</span>';
                        } else {
                            echo '<span class="gradient-text">' . $hero->title . '</span>';
                        }
                        ?>
                    </h1>

                    <?php if ($hero->subtitle): ?>
                        <p class="hero-subtitle animate-3">
                            I'm a <span id="typewriter" class="typewriter-text"
                                data-roles='["<?php echo $hero->subtitle; ?>","Web Developer","UI/UX Designer","Problem Solver"]'
                            ><?php echo $hero->subtitle; ?></span>
                        </p>
                    <?php endif; ?>

                    <?php if ($hero->description): ?>
                        <p class="hero-description animate-4"><?php echo $hero->description; ?></p>
                    <?php endif; ?>

                    <div class="hero-btns animate-5">
                        <?php if ($hero->button_text && $hero->button_link): ?>
                            <a href="<?php echo $hero->button_link; ?>" class="btn-primary-grad">
                                <?php echo $hero->button_text; ?> <i class="fas fa-arrow-right"></i>
                            </a>
                        <?php endif; ?>
                        <a href="<?php echo base_url('contact'); ?>" class="btn-outline-grad">
                            <i class="fas fa-envelope"></i> Hire Me
                        </a>
                    </div>

                    <?php if ($about): ?>
                        <div class="hero-stats counter-section">
                            <?php if ($about->years_experience): ?>
                                <div class="hero-stat-item">
                                    <div class="hero-stat-value" data-count="<?php echo $about->years_experience; ?>" data-suffix="+">0+</div>
                                    <div class="hero-stat-label">Years Exp.</div>
                                </div>
                            <?php endif; ?>
                            <?php if ($about->projects_completed): ?>
                                <div class="hero-stat-item">
                                    <div class="hero-stat-value" data-count="<?php echo $about->projects_completed; ?>" data-suffix="+">0+</div>
                                    <div class="hero-stat-label">Projects Done</div>
                                </div>
                            <?php endif; ?>
                            <?php if ($about->happy_clients): ?>
                                <div class="hero-stat-item">
                                    <div class="hero-stat-value" data-count="<?php echo $about->happy_clients; ?>" data-suffix="+">0+</div>
                                    <div class="hero-stat-label">Happy Clients</div>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Right: Profile 3D Orb -->
                <div class="col-lg-5 order-1 order-lg-2 text-center animate-2">
                    <?php if ($hero->profile_image): ?>
                        <div class="hero-profile-wrap" style="display:inline-block; position:relative;">
                            <div class="hero-3d-orb" data-tilt data-tilt-max="15" data-tilt-speed="400" data-tilt-glare="true" data-tilt-max-glare="0.25">
                                <div class="hero-profile-ring">
                                    <div class="hero-profile-inner">
                                        <img src="<?php echo base_url('uploads/hero/' . $hero->profile_image); ?>" alt="Profile">
                                    </div>
                                </div>
                                <div class="hero-profile-icon"><i class="fas fa-code"></i></div>
                            </div>
                            <!-- Floating tech badges -->
                            <div class="tech-badge tb-1">
                                <i class="fab fa-react" style="color:#61dafb"></i> React
                            </div>
                            <div class="tech-badge tb-2">
                                <i class="fab fa-node-js" style="color:#68a063"></i> Node.js
                            </div>
                            <div class="tech-badge tb-3">
                                <i class="fas fa-database" style="color:#7c6cff"></i> MySQL
                            </div>
                        </div>
                    <?php else: ?>
                        <div style="width:280px;height:280px;border-radius:50%;background:var(--gradient);display:flex;align-items:center;justify-content:center;margin:0 auto;font-size:6rem;color:#fff;box-shadow:0 20px 80px rgba(124,108,255,0.5);">
                            <i class="fas fa-user"></i>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Scroll indicator -->
        <div class="scroll-indicator">
            <span>Scroll</span>
            <div class="scroll-mouse"></div>
        </div>
    </section>
<?php endif; ?>

<!-- ============================================================ -->
<!-- About Section                                                  -->
<!-- ============================================================ -->
<?php if ($about): ?>
    <section class="section section-alt" id="about">
        <div class="container">
            <div class="row align-items-center gy-5">
                <div class="col-lg-5">
                    <div class="about-img-wrap">
                        <div class="about-img">
                            <?php if (isset($about->profile_image) && $about->profile_image): ?>
                                <img src="<?php echo base_url('uploads/about/' . $about->profile_image); ?>" alt="About">
                            <?php else: ?>
                                <div style="height:460px;background:var(--gradient-glow);display:flex;align-items:center;justify-content:center;font-size:8rem;color:var(--primary);">
                                    <i class="fas fa-user-tie"></i>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php if ($about->years_experience): ?>
                            <div class="about-exp-badge">
                                <div class="num"><?php echo $about->years_experience; ?></div>
                                <div class="label">Years of<br>Experience</div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-lg-7" data-aos="fade-left">
                    <div class="section-label">About Me</div>
                    <h2 class="section-title-main">Who Am <span class="gradient-text">I?</span></h2>
                    <div class="divider"></div>
                    <p style="color:var(--text-muted);margin-bottom:1.5rem;line-height:1.85;">
                        <?php echo isset($about->description) ? $about->description : (isset($about->bio) ? $about->bio : ''); ?>
                    </p>
                    <div class="row g-3 mb-2">
                        <?php $aboutName = isset($about->title) ? $about->title : (isset($about->name) ? $about->name : ''); ?>
                        <?php if ($aboutName): ?>
                            <div class="col-sm-6">
                                <div class="about-meta-item"><i class="fas fa-user"></i>
                                    <div><span>Name</span><br><strong><?php echo $aboutName; ?></strong></div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if ($about->email): ?>
                            <div class="col-sm-6">
                                <div class="about-meta-item"><i class="fas fa-envelope"></i>
                                    <div><span>Email</span><br><strong><?php echo $about->email; ?></strong></div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php $location = isset($about->city) ? $about->city : (isset($about->location) ? $about->location : ''); ?>
                        <?php if ($location): ?>
                            <div class="col-sm-6">
                                <div class="about-meta-item"><i class="fas fa-map-marker-alt"></i>
                                    <div><span>Location</span><br><strong><?php echo $location; ?></strong></div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if ($about->degree): ?>
                            <div class="col-sm-6">
                                <div class="about-meta-item"><i class="fas fa-graduation-cap"></i>
                                    <div><span>Degree</span><br><strong><?php echo $about->degree; ?></strong></div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if ($about->phone): ?>
                            <div class="col-sm-6">
                                <div class="about-meta-item"><i class="fas fa-phone"></i>
                                    <div><span>Phone</span><br><strong><?php echo $about->phone; ?></strong></div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="col-sm-6">
                            <div class="about-meta-item"><i class="fas fa-briefcase"></i>
                                <div><span>Freelance</span><br>
                                    <strong style="color:#22c55e;">Available</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $resume = isset($about->resume_file) ? $about->resume_file : null; ?>
                    <?php if ($resume): ?>
                        <a href="<?php echo base_url('uploads/about/' . $resume); ?>" class="btn-primary-grad mt-3" download style="display:inline-flex;max-width:220px;">
                            <i class="fas fa-download"></i> Download CV
                        </a>
                    <?php else: ?>
                        <a href="Abhishek_Mishra_Resume.pdf" class="btn-primary-grad mt-3" target="_blank" style="display:inline-flex;max-width:220px;">
                            <i class="fas fa-download"></i> Download CV
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<!-- ============================================================ -->
<!-- Skills Section                                                 -->
<!-- ============================================================ -->
<?php if (!empty($skills)): ?>
    <section class="section skills-section" id="skills">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-6 text-center">
                    <div class="section-label">My Skills</div>
                    <h2 class="section-title-main">Technical <span class="gradient-text">Expertise</span></h2>
                    <p class="section-subtitle mx-auto">Technologies and tools I work with to craft outstanding digital experiences.</p>
                </div>
            </div>
            <div class="row g-4">
                <?php $i = 0;
                foreach ($skills as $skill):
                    $i++; ?>
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="<?php echo ($i % 4) * 80; ?>">
                        <div class="skill-item">
                            <div class="skill-header">
                                <span class="skill-name">
                                    <?php if ($skill->icon): ?><i class="<?php echo $skill->icon; ?> me-2" style="color:var(--primary)"></i><?php endif; ?>
                                    <?php echo $skill->name; ?>
                                </span>
                                <span class="skill-pct"><?php echo $skill->percentage; ?>%</span>
                            </div>
                            <div class="skill-track">
                                <div class="skill-fill" data-width="<?php echo $skill->percentage; ?>" style="width:0%"></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<!-- ============================================================ -->
<!-- Services Section                                               -->
<!-- ============================================================ -->
<?php if (!empty($services)): ?>
    <section class="section section-alt" id="services">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-6 text-center">
                    <div class="section-label">What I Do</div>
                    <h2 class="section-title-main">My <span class="gradient-text">Services</span></h2>
                    <p class="section-subtitle mx-auto">Expert solutions tailored to bring your digital vision to life.</p>
                </div>
            </div>
            <div class="row g-4">
                <?php $i = 0;
                foreach ($services as $service):
                    $i++; ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="service-card" data-tilt data-tilt-max="10" data-tilt-speed="400" data-tilt-glare="true" data-tilt-max-glare="0.18">
                            <div class="service-icon-wrap">
                                <i class="<?php echo $service->icon ? $service->icon : 'fas fa-star'; ?>"></i>
                            </div>
                            <h4><?php echo $service->title; ?></h4>
                            <p><?php echo $service->description; ?></p>
                            <div class="service-arrow"><i class="fas fa-arrow-right"></i></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<!-- ============================================================ -->
<!-- Portfolio Section                                              -->
<!-- ============================================================ -->
<?php if (!empty($featured_portfolio)): ?>
    <section class="section" id="portfolio">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-6 text-center">
                    <div class="section-label">My Work</div>
                    <h2 class="section-title-main">Featured <span class="gradient-text">Portfolio</span></h2>
                    <p class="section-subtitle mx-auto">A curated showcase of my finest recent projects.</p>
                </div>
            </div>
            <div class="row g-4">
                <?php $i = 0;
                foreach ($featured_portfolio as $item):
                    $i++; ?>
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
            <div class="text-center mt-5" data-aos="fade-up">
                <a href="<?php echo base_url('portfolio'); ?>" class="btn-primary-grad">
                    View All Projects <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>
<?php endif; ?>

<!-- ============================================================ -->
<!-- Testimonials Section                                           -->
<!-- ============================================================ -->
<?php if (!empty($testimonials)): ?>
    <section class="section section-alt" id="testimonials">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-6 text-center">
                    <div class="section-label">Testimonials</div>
                    <h2 class="section-title-main">What Clients <span class="gradient-text">Say</span></h2>
                    <p class="section-subtitle mx-auto">Real feedback from people I've had the pleasure to collaborate with.</p>
                </div>
            </div>
            <div class="row g-4">
                <?php $i = 0;
                foreach ($testimonials as $t):
                    $i++; ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="testimonial-card" data-tilt data-tilt-max="6" data-tilt-speed="500">
                            <?php
                            // Support both old and new column naming conventions
                            $tName    = isset($t->client_name)     ? $t->client_name     : (isset($t->name)        ? $t->name        : '');
                            $tDesig   = isset($t->client_position) ? $t->client_position : (isset($t->designation) ? $t->designation : '');
                            $tCompany = isset($t->client_company)  ? $t->client_company  : (isset($t->company)     ? $t->company     : '');
                            $tMsg     = isset($t->testimonial_text)? $t->testimonial_text: (isset($t->message)     ? $t->message     : '');
                            $tPhoto   = isset($t->client_image)    ? $t->client_image    : (isset($t->photo)       ? $t->photo       : '');
                            $tRating  = isset($t->rating)          ? $t->rating          : 5;
                            ?>
                            <div class="testimonial-stars">
                                <?php for ($s = 1; $s <= 5; $s++): ?>
                                    <i class="<?php echo $s <= $tRating ? 'fas' : 'far'; ?> fa-star"></i>
                                <?php endfor; ?>
                            </div>
                            <p class="testimonial-text">"<?php echo $tMsg; ?>"</p>
                            <div class="testimonial-author">
                                <?php if ($tPhoto): ?>
                                    <div class="testimonial-avatar"><img src="<?php echo base_url('uploads/testimonials/' . $tPhoto); ?>" alt="<?php echo $tName; ?>"></div>
                                <?php else: ?>
                                    <div class="testimonial-avatar-placeholder"><?php echo strtoupper(substr($tName, 0, 1)); ?></div>
                                <?php endif; ?>
                                <div>
                                    <div class="testimonial-name"><?php echo $tName; ?></div>
                                    <div class="testimonial-role"><?php echo $tDesig; ?><?php echo $tCompany ? ', ' . $tCompany : ''; ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<!-- ============================================================ -->
<!-- Blog Section                                                   -->
<!-- ============================================================ -->
<?php if (!empty($latest_blog)): ?>
    <section class="section" id="blog">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-6 text-center">
                    <div class="section-label">Latest Posts</div>
                    <h2 class="section-title-main">From the <span class="gradient-text">Blog</span></h2>
                    <p class="section-subtitle mx-auto">Thoughts, insights, and stories from my journey.</p>
                </div>
            </div>
            <div class="row g-4">
                <?php $i = 0;
                foreach ($latest_blog as $post):
                    $i++; ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-card" data-tilt data-tilt-max="7" data-tilt-speed="500" data-tilt-glare="true" data-tilt-max-glare="0.1">
                            <div class="blog-img">
                                <?php if ($post->featured_image): ?>
                                    <img src="<?php echo base_url('uploads/blog/' . $post->featured_image); ?>" alt="<?php echo $post->title; ?>">
                                <?php else: ?>
                                    <div style="height:210px;background:var(--gradient-glow);display:flex;align-items:center;justify-content:center;font-size:3rem;color:var(--primary);">
                                        <i class="fas fa-newspaper"></i>
                                    </div>
                                <?php endif; ?>
                                <div class="blog-date-badge"><?php echo date('M d', strtotime($post->created_at)); ?></div>
                            </div>
                            <div class="blog-body">
                                <a class="blog-title" href="<?php echo base_url('blog/' . $post->slug); ?>"><?php echo $post->title; ?></a>
                                <p class="blog-excerpt">
                                    <?php echo $post->excerpt ? substr($post->excerpt, 0, 110) . '...' : substr(strip_tags($post->content), 0, 110) . '...'; ?>
                                </p>
                                <div class="blog-meta">
                                    <span><i class="far fa-user"></i> <?php echo $post->author ? $post->author : 'Admin'; ?></span>
                                    <span><i class="far fa-eye"></i> <?php echo $post->views ??0; ?> views</span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="text-center mt-5" data-aos="fade-up">
                <a href="<?php echo base_url('blog'); ?>" class="btn-outline-grad">Read All Posts <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </section>
<?php endif; ?>

<!-- ============================================================ -->
<!-- CTA Section                                                    -->
<!-- ============================================================ -->
<section class="section" style="background:linear-gradient(135deg,rgba(124,108,255,0.12) 0%,rgba(79,172,254,0.08) 100%);border-top:1px solid var(--border);border-bottom:1px solid var(--border);position:relative;overflow:hidden;">
    <!-- Glow blob -->
    <div style="position:absolute;width:600px;height:600px;border-radius:50%;background:radial-gradient(circle,rgba(124,108,255,0.15),transparent 70%);top:50%;left:50%;transform:translate(-50%,-50%);pointer-events:none;"></div>
    <div class="container" style="position:relative;z-index:1;">
        <div class="row justify-content-center">
            <div class="col-lg-7 text-center" data-aos="fade-up">
                <div class="section-label">Let's Connect</div>
                <h2 class="section-title-main">Have a Project in <span class="gradient-text">Mind?</span></h2>
                <p class="section-subtitle mx-auto mb-4">I'm always open to discussing new projects, creative ideas, or opportunities to be part of your vision.</p>
                <a href="<?php echo base_url('contact'); ?>" class="btn-primary-grad" style="font-size:1rem;padding:1.05rem 2.8rem;">
                    Start a Conversation <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>
</section>