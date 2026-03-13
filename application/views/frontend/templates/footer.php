</main>

<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="footer-brand"><?php echo $settings->site_title; ?></div>
                <p class="footer-desc"><?php echo $settings->site_description; ?></p>
                <div class="footer-social">
                    <?php if ($settings->facebook_url): ?>
                        <a href="<?php echo $settings->facebook_url; ?>" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <?php endif; ?>
                    <?php if ($settings->twitter_url): ?>
                        <a href="<?php echo $settings->twitter_url; ?>" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a>
                    <?php endif; ?>
                    <?php if ($settings->linkedin_url): ?>
                        <a href="<?php echo $settings->linkedin_url; ?>" target="_blank" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    <?php endif; ?>
                    <?php if ($settings->instagram_url): ?>
                        <a href="<?php echo $settings->instagram_url; ?>" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
                    <?php endif; ?>
                    <?php if ($settings->github_url): ?>
                        <a href="<?php echo $settings->github_url; ?>" target="_blank" title="GitHub"><i class="fab fa-github"></i></a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-2 col-6">
                <p class="footer-heading">Navigation</p>
                <ul class="footer-links">
                    <li><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li><a href="<?php echo base_url('about'); ?>">About</a></li>
                    <li><a href="<?php echo base_url('portfolio'); ?>">Portfolio</a></li>
                    <li><a href="<?php echo base_url('blog'); ?>">Blog</a></li>
                    <li><a href="<?php echo base_url('contact'); ?>">Contact</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-6">
                <p class="footer-heading">Services</p>
                <ul class="footer-links">
                    <li><a href="#">Web Development</a></li>
                    <li><a href="#">UI/UX Design</a></li>
                    <li><a href="#">Mobile Apps</a></li>
                    <li><a href="#">Consulting</a></li>
                </ul>
            </div>
            <div class="col-lg-3">
                <p class="footer-heading">Get In Touch</p>
                <?php if ($settings->site_email): ?>
                    <p style="color:var(--text-muted);font-size:0.88rem;margin-bottom:0.6rem;"><i class="fas fa-envelope me-2" style="color:var(--primary)"></i><?php echo $settings->site_email; ?></p>
                <?php endif; ?>
                <?php if ($settings->site_phone): ?>
                    <p style="color:var(--text-muted);font-size:0.88rem;margin-bottom:0.6rem;"><i class="fas fa-phone me-2" style="color:var(--primary)"></i><?php echo $settings->site_phone; ?></p>
                <?php endif; ?>
                <?php if ($settings->site_address): ?>
                    <p style="color:var(--text-muted);font-size:0.88rem;"><i class="fas fa-map-marker-alt me-2" style="color:var(--primary)"></i><?php echo $settings->site_address; ?></p>
                <?php endif; ?>
            </div>
        </div>
        <div class="footer-bottom">
            <p class="footer-copy">
                <?php echo $settings->copyright_text ? $settings->copyright_text : '&copy; ' . date('Y') . ' ' . $settings->site_title . '. All rights reserved.'; ?>
            </p>
            <!-- <p class="footer-copy">Crafted with <i class="fas fa-heart" style="color:#f857a6"></i> &amp; CodeIgniter 3</p> -->
        </div>
    </div>
</footer>

<!-- ============================================================
     JavaScript Libraries
============================================================ -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<!-- Three.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
<!-- GSAP + ScrollTrigger -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
<!-- VanillaTilt -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.8.1/vanilla-tilt.min.js"></script>

<script>
/* =============================================================
   AOS (fallback scroll animations)
============================================================= */
AOS.init({ duration: 800, once: true, offset: 60 });

/* =============================================================
   GSAP REGISTER
============================================================= */
gsap.registerPlugin(ScrollTrigger);

/* =============================================================
   NAVBAR SCROLL
============================================================= */
const nav = document.getElementById('mainNav');
const backToTop = document.getElementById('backToTop');
window.addEventListener('scroll', () => {
    nav.classList.toggle('scrolled', window.scrollY > 60);
    backToTop.classList.toggle('visible', window.scrollY > 400);
});

/* =============================================================
   MOBILE DRAWER — right-to-left slide
============================================================= */
(function() {
    const toggler  = document.getElementById('drawerToggler');
    const drawer   = document.getElementById('navDrawer');
    const overlay  = document.getElementById('drawerOverlay');
    const closeBtn = document.getElementById('drawerClose');

    if (!toggler || !drawer) return;

    function openDrawer() {
        drawer.classList.add('open');
        overlay.classList.add('active');
        toggler.classList.add('is-open');
        document.body.style.overflow = 'hidden';
    }

    function closeDrawer() {
        drawer.classList.remove('open');
        overlay.classList.remove('active');
        toggler.classList.remove('is-open');
        document.body.style.overflow = '';
    }

    toggler.addEventListener('click', () => {
        drawer.classList.contains('open') ? closeDrawer() : openDrawer();
    });

    if (closeBtn) closeBtn.addEventListener('click', closeDrawer);
    overlay.addEventListener('click', closeDrawer);

    // Close on Escape key
    document.addEventListener('keydown', e => {
        if (e.key === 'Escape' && drawer.classList.contains('open')) closeDrawer();
    });

    // Close drawer when a link inside is clicked (navigation)
    drawer.querySelectorAll('.nav-drawer-link, .btn-primary-grad').forEach(link => {
        link.addEventListener('click', closeDrawer);
    });
})();
backToTop.addEventListener('click', e => {
    e.preventDefault();
    window.scrollTo({ top: 0, behavior: 'smooth' });
});

/* =============================================================
   THREE.JS HERO PARTICLE FIELD
============================================================= */
(function() {
    const canvas = document.getElementById('hero-canvas');
    if (!canvas || typeof THREE === 'undefined') return;

    const renderer = new THREE.WebGLRenderer({ canvas, antialias: true, alpha: true });
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
    renderer.setSize(canvas.offsetWidth, canvas.offsetHeight);
    renderer.setClearColor(0x000000, 0);

    const scene  = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(60, canvas.offsetWidth / canvas.offsetHeight, 0.1, 2000);
    camera.position.z = 600;

    // --- Particles ---
    const PARTICLE_COUNT = 120;
    const positions = new Float32Array(PARTICLE_COUNT * 3);
    const colors    = new Float32Array(PARTICLE_COUNT * 3);
    const velocities = [];

    const palette = [
        new THREE.Color(0x7c6cff),
        new THREE.Color(0x4facfe),
        new THREE.Color(0xf857a6),
        new THREE.Color(0x00f2fe),
        new THREE.Color(0xa59bff),
    ];

    for (let i = 0; i < PARTICLE_COUNT; i++) {
        const x = (Math.random() - 0.5) * 1200;
        const y = (Math.random() - 0.5) * 800;
        const z = (Math.random() - 0.5) * 600;
        positions[i * 3]     = x;
        positions[i * 3 + 1] = y;
        positions[i * 3 + 2] = z;

        const col = palette[Math.floor(Math.random() * palette.length)];
        colors[i * 3]     = col.r;
        colors[i * 3 + 1] = col.g;
        colors[i * 3 + 2] = col.b;

        velocities.push({
            x: (Math.random() - 0.5) * 1.6,
            y: (Math.random() - 0.5) * 1.3,
            z: (Math.random() - 0.5) * 0.9,
        });
    }

    const geom = new THREE.BufferGeometry();
    geom.setAttribute('position', new THREE.BufferAttribute(positions, 3));
    geom.setAttribute('color',    new THREE.BufferAttribute(colors, 3));

    const mat = new THREE.PointsMaterial({
        size: 7.5,
        vertexColors: true,
        transparent: true,
        opacity: 0.75,
        sizeAttenuation: true,
    });

    const particles = new THREE.Points(geom, mat);
    scene.add(particles);

    // --- Connection lines ---
    const lineMat = new THREE.LineBasicMaterial({
        color: 0x7c6cff, transparent: true, opacity: 0.12
    });
    const lineGroup = new THREE.Group();
    scene.add(lineGroup);

    function updateLines() {
        lineGroup.clear();
        const pos = geom.attributes.position.array;
        const MAX_DIST = 170;
        for (let a = 0; a < PARTICLE_COUNT; a++) {
            for (let b = a + 1; b < PARTICLE_COUNT; b++) {
                const dx = pos[a*3]   - pos[b*3];
                const dy = pos[a*3+1] - pos[b*3+1];
                const dz = pos[a*3+2] - pos[b*3+2];
                const dist = Math.sqrt(dx*dx + dy*dy + dz*dz);
                if (dist < MAX_DIST) {
                    const pts = [
                        new THREE.Vector3(pos[a*3], pos[a*3+1], pos[a*3+2]),
                        new THREE.Vector3(pos[b*3], pos[b*3+1], pos[b*3+2]),
                    ];
                    const lg = new THREE.BufferGeometry().setFromPoints(pts);
                    lineGroup.add(new THREE.Line(lg, lineMat));
                }
            }
        }
    }

    // Mouse parallax
    let mx = 0, my = 0;
    window.addEventListener('mousemove', e => {
        mx = (e.clientX / window.innerWidth  - 0.5) * 2;
        my = (e.clientY / window.innerHeight - 0.5) * 2;
    });

    let lineUpdateCounter = 0;
    function animate() {
        requestAnimationFrame(animate);
        const pos = geom.attributes.position.array;

        for (let i = 0; i < PARTICLE_COUNT; i++) {
            pos[i*3]     += velocities[i].x;
            pos[i*3 + 1] += velocities[i].y;
            pos[i*3 + 2] += velocities[i].z;

            // Wrap around
            if (pos[i*3]     >  700) pos[i*3]     = -700;
            if (pos[i*3]     < -700) pos[i*3]     =  700;
            if (pos[i*3 + 1] >  500) pos[i*3 + 1] = -500;
            if (pos[i*3 + 1] < -500) pos[i*3 + 1] =  500;
        }

        geom.attributes.position.needsUpdate = true;

        // Update lines every 4 frames for perf
        lineUpdateCounter++;
        if (lineUpdateCounter % 4 === 0) updateLines();

        // Camera parallax
        camera.position.x += (mx * 60 - camera.position.x) * 0.04;
        camera.position.y += (-my * 40 - camera.position.y) * 0.04;
        camera.lookAt(scene.position);

        particles.rotation.y += 0.0003;

        renderer.render(scene, camera);
    }
    animate();

    // Resize
    window.addEventListener('resize', () => {
        const hero = document.querySelector('.hero');
        if (!hero) return;
        renderer.setSize(hero.offsetWidth, hero.offsetHeight);
        camera.aspect = hero.offsetWidth / hero.offsetHeight;
        camera.updateProjectionMatrix();
    });
})();



/* =============================================================
   VANILLA TILT — 3D Card Effect
============================================================= */
if (typeof VanillaTilt !== 'undefined') {
    VanillaTilt.init(document.querySelectorAll('.service-card'), {
        max: 12, speed: 400, glare: true, 'max-glare': 0.18,
    });
    VanillaTilt.init(document.querySelectorAll('.hero-3d-orb'), {
        max: 15, speed: 400, glare: true, 'max-glare': 0.25,
    });
    VanillaTilt.init(document.querySelectorAll('.portfolio-card'), {
        max: 10, speed: 400, glare: true, 'max-glare': 0.12,
    });
    VanillaTilt.init(document.querySelectorAll('.testimonial-card'), {
        max: 8, speed: 500, glare: false,
    });
    VanillaTilt.init(document.querySelectorAll('.blog-card'), {
        max: 8, speed: 500, glare: true, 'max-glare': 0.1,
    });
}

/* =============================================================
   GSAP SCROLL REVEAL ANIMATIONS
============================================================= */
// Sections
gsap.utils.toArray('.section').forEach(sec => {
    const heading = sec.querySelector('.section-title-main');
    const label   = sec.querySelector('.section-label');
    const subtitle= sec.querySelector('.section-subtitle');

    if (label) gsap.from(label, {
        scrollTrigger:{ trigger: label, start:'top 88%', toggleActions:'play none none none' },
        opacity:0, y:25, duration:0.7, ease:'power3.out'
    });
    if (heading) gsap.from(heading, {
        scrollTrigger:{ trigger: heading, start:'top 88%', toggleActions:'play none none none' },
        opacity:0, y:35, duration:0.85, delay:0.1, ease:'power3.out'
    });
    if (subtitle) gsap.from(subtitle, {
        scrollTrigger:{ trigger: subtitle, start:'top 90%', toggleActions:'play none none none' },
        opacity:0, y:30, duration:0.8, delay:0.2, ease:'power3.out'
    });
});

// Cards stagger (Disabled: Handled by AOS data-aos="fade-up" in the HTML)
// function staggerReveal(selector, delay=0.1) {
//     const els = document.querySelectorAll(selector);
//     if (!els.length) return;
//     gsap.from(els, {
//         scrollTrigger:{ trigger: els[0].closest('.row') || els[0], start:'top 85%', toggleActions:'play none none none' },
//         opacity:0, y:50, stagger: delay, duration:0.85, ease:'power3.out'
//     });
// }
// staggerReveal('.service-card',     0.12);
// staggerReveal('.portfolio-card',   0.1);
// staggerReveal('.testimonial-card', 0.1);
// staggerReveal('.blog-card',        0.1);
// staggerReveal('.skill-item',       0.07);

// About section
const aboutImg = document.querySelector('.about-img-wrap');
if (aboutImg) {
    gsap.from(aboutImg, {
        scrollTrigger:{ trigger: aboutImg, start:'top 80%' },
        opacity:0, x:-60, duration:1, ease:'power3.out'
    });
}

/* =============================================================
   SKILL BAR ANIMATION
============================================================= */
const skillObserver = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.querySelectorAll('.skill-fill[data-width]').forEach(fill => {
                setTimeout(() => { fill.style.width = fill.dataset.width + '%'; }, 200);
            });
            skillObserver.unobserve(entry.target);
        }
    });
}, { threshold: 0.25 });
document.querySelectorAll('.skills-section').forEach(el => skillObserver.observe(el));

/* =============================================================
   COUNTER ANIMATION
============================================================= */
function animateCounter(el) {
    const target = parseInt(el.dataset.count);
    const suffix = el.dataset.suffix || '';
    const duration = 2000;
    const start = performance.now();
    function update(now) {
        const elapsed = Math.min((now - start) / duration, 1);
        const ease = 1 - Math.pow(1 - elapsed, 3);
        el.textContent = Math.floor(ease * target) + suffix;
        if (elapsed < 1) requestAnimationFrame(update);
    }
    requestAnimationFrame(update);
}
const counterObs = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.querySelectorAll('[data-count]').forEach(animateCounter);
            counterObs.unobserve(entry.target);
        }
    });
}, { threshold: 0.5 });
document.querySelectorAll('.counter-section').forEach(el => counterObs.observe(el));

/* =============================================================
   TYPEWRITER EFFECT
============================================================= */
(function() {
    const el = document.getElementById('typewriter');
    if (!el) return;
    const roles = el.dataset.roles ? JSON.parse(el.dataset.roles) : [];
    if (!roles.length) return;

    let roleIdx = 0, charIdx = 0, deleting = false;

    function tick() {
        const current = roles[roleIdx];
        if (!deleting) {
            el.textContent = current.slice(0, ++charIdx);
            if (charIdx === current.length) {
                deleting = true;
                setTimeout(tick, 2000);
                return;
            }
        } else {
            el.textContent = current.slice(0, --charIdx);
            if (charIdx === 0) {
                deleting = false;
                roleIdx  = (roleIdx + 1) % roles.length;
            }
        }
        setTimeout(tick, deleting ? 55 : 100);
    }
    tick();
})();

/* =============================================================
   MAGNETIC BUTTON EFFECT
============================================================= */
document.querySelectorAll('.btn-primary-grad').forEach(btn => {
    btn.addEventListener('mousemove', e => {
        const r   = btn.getBoundingClientRect();
        const cx  = r.left + r.width  / 2;
        const cy  = r.top  + r.height / 2;
        const dx  = (e.clientX - cx) * 0.35;
        const dy  = (e.clientY - cy) * 0.35;
        btn.style.transform = `translateY(-4px) translate(${dx}px, ${dy}px) scale(1.02)`;
    });
    btn.addEventListener('mouseleave', () => {
        btn.style.transform = '';
    });
});

/* =============================================================
   AUTO-DISMISS FLASH MESSAGES
============================================================= */
setTimeout(() => {
    document.querySelectorAll('div[style*="position:fixed"][style*="top:88px"]').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateX(20px)';
        el.style.transition = 'all 0.4s ease';
        setTimeout(() => el.remove(), 400);
    });
}, 4500);

</script>
</body>
</html>