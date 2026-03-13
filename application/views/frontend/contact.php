<!-- Page Header -->
<div
    style="padding:140px 0 60px;background:radial-gradient(ellipse at 80% 50%,rgba(79,172,254,0.15) 0%,transparent 60%),var(--dark);border-bottom:1px solid var(--border);text-align:center;">
    <div class="container">
        <div class="section-label">Contact</div>
        <h1 class="section-title-main">Get In <span class="gradient-text">Touch</span></h1>
        <p class="section-subtitle mx-auto">Have a project in mind? Let's talk about it</p>
    </div>
</div>

<!-- Contact Section -->
<section class="section">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-5" data-aos="fade-right">
                <div class="section-label">Contact Details</div>
                <h2 class="section-title-main mb-3">Let's <span class="gradient-text">Connect</span></h2>
                <p style="color:var(--text-muted);margin-bottom:2.5rem;line-height:1.8;">I'm always open to new
                    opportunities and interesting projects. Feel free to reach out!</p>

                <?php if ($settings->site_email): ?>
                    <div class="contact-info-card">
                        <div class="contact-icon"><i class="fas fa-envelope"></i></div>
                        <div>
                            <div class="contact-info-label">Email Address</div>
                            <div class="contact-info-value">
                                <?php echo $settings->site_email; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ($settings->site_phone): ?>
                    <div class="contact-info-card">
                        <div class="contact-icon"><i class="fas fa-phone"></i></div>
                        <div>
                            <div class="contact-info-label">Phone Number</div>
                            <div class="contact-info-value">
                                <?php echo $settings->site_phone; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ($settings->site_address): ?>
                    <div class="contact-info-card">
                        <div class="contact-icon"><i class="fas fa-map-marker-alt"></i></div>
                        <div>
                            <div class="contact-info-label">Location</div>
                            <div class="contact-info-value">
                                <?php echo $settings->site_address; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Social Links -->
                <div class="mt-4">
                    <p
                        style="color:var(--text-muted);font-size:0.85rem;margin-bottom:1rem;text-transform:uppercase;letter-spacing:2px;font-weight:600;">
                        Follow Me</p>
                    <div class="footer-social">
                        <?php if ($settings->facebook_url): ?><a href="<?php echo $settings->facebook_url; ?>"
                                target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <?php endif; ?>
                        <?php if ($settings->twitter_url): ?><a href="<?php echo $settings->twitter_url; ?>"
                                target="_blank"><i class="fab fa-twitter"></i></a>
                        <?php endif; ?>
                        <?php if ($settings->linkedin_url): ?><a href="<?php echo $settings->linkedin_url; ?>"
                                target="_blank"><i class="fab fa-linkedin-in"></i></a>
                        <?php endif; ?>
                        <?php if ($settings->instagram_url): ?><a href="<?php echo $settings->instagram_url; ?>"
                                target="_blank"><i class="fab fa-instagram"></i></a>
                        <?php endif; ?>
                        <?php if ($settings->github_url): ?><a href="<?php echo $settings->github_url; ?>"
                                target="_blank"><i class="fab fa-github"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-7" data-aos="fade-left">
                <div class="glass-card p-4 p-lg-5">
                    <h3 style="font-weight:700;margin-bottom:0.5rem;">Send a Message</h3>
                    <p style="color:var(--text-muted);font-size:0.9rem;margin-bottom:2rem;">Fill out the form below and
                        I'll get back to you as soon as possible.</p>

                    <?php if ($this->session->flashdata('success')): ?>
                        <div
                            style="background:rgba(34,197,94,0.1);border:1px solid rgba(34,197,94,0.3);color:#22c55e;padding:12px 18px;border-radius:10px;margin-bottom:1.5rem;font-size:0.9rem;">
                            <i class="fas fa-check-circle me-2"></i>
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('error')): ?>
                        <div
                            style="background:rgba(239,68,68,0.1);border:1px solid rgba(239,68,68,0.3);color:#ef4444;padding:12px 18px;border-radius:10px;margin-bottom:1.5rem;font-size:0.9rem;">
                            <i class="fas fa-exclamation-circle me-2"></i>
                            <?php echo $this->session->flashdata('error'); ?>
                        </div>
                    <?php endif; ?>

                    <form action="<?php echo base_url('send_message'); ?>" method="POST">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating-custom">
                                    <label>Your Name *</label>
                                    <input type="text" name="name" placeholder="John Doe" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating-custom">
                                    <label>Email Address *</label>
                                    <input type="email" name="email" placeholder="john@example.com" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating-custom">
                                    <label>Subject *</label>
                                    <input type="text" name="subject" placeholder="Project inquiry" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating-custom">
                                    <label>Your Message *</label>
                                    <textarea name="message" rows="5" placeholder="Tell me about your project..."
                                        required></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn-primary-grad w-100"
                                    style="justify-content:center;font-size:1rem;padding:1rem;">
                                    <i class="fas fa-paper-plane"></i> Send Message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>