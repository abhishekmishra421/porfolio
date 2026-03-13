<!-- Page Header -->
<div
    style="padding:140px 0 60px;background:radial-gradient(ellipse at 20% 50%,rgba(108,99,255,0.15) 0%,transparent 60%),var(--dark);border-bottom:1px solid var(--border);text-align:center;">
    <div class="container">
        <div class="section-label">About</div>
        <h1 class="section-title-main">About <span class="gradient-text">Me</span></h1>
        <p class="section-subtitle mx-auto">Get to know who I am and what drives me</p>
    </div>
</div>

<!-- About Section -->
<?php if ($about): ?>
    <section class="section">
        <div class="container">
            <div class="row align-items-center gx-lg-5 gy-5">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="about-img-wrap">
                        <div class="about-img">
                            <?php if (isset($about->profile_image) && $about->profile_image): ?>
                                <img src="<?php echo base_url('uploads/about/' . $about->profile_image); ?>" alt="About">
                            <?php else: ?>
                                <div
                                    style="height:600px;background:var(--gradient-glow);display:flex;align-items:center;justify-content:center;font-size:10rem;color:var(--primary);">
                                    <i class="fas fa-user-tie"></i></div>
                            <?php endif; ?>
                        </div>
                        <?php if ($about->years_experience): ?>
                            <div class="about-exp-badge">
                                <div class="num">
                                    <?php echo $about->years_experience; ?>
                                </div>
                                <div class="label">Years of<br>Experience</div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="section-label">My Story</div>
                    <h2 class="section-title-main">Who <span class="gradient-text">I Am</span></h2>
                    <div class="divider"></div>
                    <p style="color:var(--text-muted);line-height:1.9;margin-bottom:1.5rem;">
                        <?php echo $about->bio ? nl2br($about->bio) : nl2br($about->description); ?>
                    </p>
                    <p style="color:var(--text-muted);line-height:1.9;margin-bottom:2rem;">
                        <?php echo $about->description; ?>
                    </p>

                    <div class="row g-3 mb-4">
                        <?php if ($about->name): ?>
                            <div class="col-md-6">
                                <div class="about-meta-item"><i class="fas fa-user"></i>
                                    <div><span>Name</span><br><strong>
                                            <?php echo $about->name; ?>
                                        </strong></div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if ($about->email): ?>
                            <div class="col-md-6">
                                <div class="about-meta-item"><i class="fas fa-envelope"></i>
                                    <div><span>Email</span><br><strong>
                                            <?php echo $about->email; ?>
                                        </strong></div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if ($about->phone): ?>
                            <div class="col-md-6">
                                <div class="about-meta-item"><i class="fas fa-phone"></i>
                                    <div><span>Phone</span><br><strong>
                                            <?php echo $about->phone; ?>
                                        </strong></div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if ($about->location): ?>
                            <div class="col-md-6">
                                <div class="about-meta-item"><i class="fas fa-map-marker-alt"></i>
                                    <div><span>Location</span><br><strong>
                                            <?php echo $about->location; ?>
                                        </strong></div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if ($about->degree): ?>
                            <div class="col-md-6">
                                <div class="about-meta-item"><i class="fas fa-graduation-cap"></i>
                                    <div><span>Degree</span><br><strong>
                                            <?php echo $about->degree; ?>
                                        </strong></div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if ($about->dob): ?>
                            <div class="col-md-6">
                                <div class="about-meta-item"><i class="fas fa-birthday-cake"></i>
                                    <div><span>Birthday</span><br><strong>
                                            <?php echo date('d M Y', strtotime($about->dob)); ?>
                                        </strong></div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="col-md-6">
                            <div class="about-meta-item"><i class="fas fa-briefcase"></i>
                                <div><span>Freelance</span><br><strong style="color:#22c55e">
                                        <?php echo $about->freelance ? $about->freelance : 'Available'; ?>
                                    </strong></div>
                            </div>
                        </div>
                    </div>

                    <?php if (isset($about->resume_file) && $about->resume_file): ?>
                        <a href="<?php echo base_url('uploads/about/' . $about->resume_file); ?>" class="btn-primary-grad"
                            download style="display:inline-flex;max-width:200px;">
                            <i class="fas fa-download"></i> Download CV
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats -->
    <?php if ($about->years_experience || $about->projects_completed || $about->happy_clients): ?>
        <section
            style="padding:60px 0;background:linear-gradient(135deg,rgba(108,99,255,0.1),rgba(79,172,254,0.05));border-top:1px solid var(--border);border-bottom:1px solid var(--border);">
            <div class="container counter-section">
                <div class="row g-4 text-center">
                    <?php if ($about->years_experience): ?>
                        <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="0">
                            <div class="hero-stat-value" data-count="<?php echo $about->years_experience; ?>" data-suffix="+">0+
                            </div>
                            <div class="hero-stat-label mt-1">Years Experience</div>
                        </div>
                    <?php endif; ?>
                    <?php if ($about->projects_completed): ?>
                        <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="hero-stat-value" data-count="<?php echo $about->projects_completed; ?>" data-suffix="+">0+
                            </div>
                            <div class="hero-stat-label mt-1">Projects Completed</div>
                        </div>
                    <?php endif; ?>
                    <?php if ($about->happy_clients): ?>
                        <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="200">
                            <div class="hero-stat-value" data-count="<?php echo $about->happy_clients; ?>" data-suffix="+">0+</div>
                            <div class="hero-stat-label mt-1">Happy Clients</div>
                        </div>
                    <?php endif; ?>
                    <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="hero-stat-value" data-count="100" data-suffix="%">0%</div>
                        <div class="hero-stat-label mt-1">Client Satisfaction</div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php endif; ?>

<!-- Skills Section -->
<?php if (!empty($skills)): ?>
    <section class="section skills-section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-6 text-center" data-aos="fade-up">
                    <div class="section-label">My Skills</div>
                    <h2 class="section-title-main">Technical <span class="gradient-text">Expertise</span></h2>
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
                                    <?php if ($skill->icon): ?><i class="<?php echo $skill->icon; ?> me-2"
                                            style="color:var(--primary)"></i>
                                    <?php endif; ?>
                                    <?php echo $skill->name; ?>
                                </span>
                                <span class="skill-pct">
                                    <?php echo $skill->percentage; ?>%
                                </span>
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