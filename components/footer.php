<footer
    style="text-align: left; position: relative; z-index: 10; background-color: #050505; background-image: linear-gradient(rgba(255, 255, 255, 0.05) 1px, transparent 1px), linear-gradient(90deg, rgba(255, 255, 255, 0.05) 1px, transparent 1px); background-size: 40px 40px;">
    <div class="container-fluid"
        style="width: 100%; max-width: 1200px; margin: 0 auto; padding: 4rem 4vw 2rem; background-color: transparent;">

        <!-- Top Section: Signature -->
        <div style="text-align: center; margin-bottom: 3rem;">
            <div class="author-signature"
                style="line-height: 1; margin: 0; font-size: clamp(3rem, 8vw, 8rem); white-space: nowrap; color: var(--gold);">
                Manuj Mittal</div>
        </div>

        <!-- Middle Section: Columns -->
        <div style="display: flex; flex-wrap: wrap; gap: 2rem; justify-content: space-between; margin-bottom: 3rem;">

            <!-- Links Column -->
            <div style="flex: 1; min-width: 150px;">
                <h4
                    style="font-family: 'Times New Roman', Times, serif; font-size: 0.9rem; color: var(--gold); letter-spacing: 4px; text-transform: uppercase; margin-top: 0; margin-bottom: 1rem;">
                    Explore</h4>
                <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 1rem;">
                    <li><a href="index.php"
                            style="color: var(--text); text-decoration: none; font-size: 0.95rem; letter-spacing: 1px; transition: color 0.3s;"
                            onmouseover="this.style.color='var(--gold)';"
                            onmouseout="this.style.color='var(--text)';">Home</a></li>
                    <li><a href="store.php"
                            style="color: var(--text); text-decoration: none; font-size: 0.95rem; letter-spacing: 1px; transition: color 0.3s;"
                            onmouseover="this.style.color='var(--gold)';"
                            onmouseout="this.style.color='var(--text)';">Books</a></li>
                    <li><a href="biography.php"
                            style="color: var(--text); text-decoration: none; font-size: 0.95rem; letter-spacing: 1px; transition: color 0.3s;"
                            onmouseover="this.style.color='var(--gold)';"
                            onmouseout="this.style.color='var(--text)';">About MJ</a></li>
                    <li><a href="contact.php"
                            style="color: var(--text); text-decoration: none; font-size: 0.95rem; letter-spacing: 1px; transition: color 0.3s;"
                            onmouseover="this.style.color='var(--gold)';"
                            onmouseout="this.style.color='var(--text)';">Contact Us</a></li>
                </ul>
            </div>

            <!-- Based In Column -->
            <div style="flex: 1; min-width: 150px;">
                <h4
                    style="font-family: 'Times New Roman', Times, serif; font-size: 0.9rem; color: var(--gold); letter-spacing: 4px; text-transform: uppercase; margin-top: 0; margin-bottom: 1rem;">
                    Based In</h4>
                <p
                    style="font-size: 1.1rem; color: var(--text); opacity: 0.9; margin: 0; font-family: var(--font-sans); line-height: 1.6;">
                    New York, USA
                </p>
            </div>

            <!-- Socials Column -->
            <div style="flex: 1; min-width: 150px;">
                <h4
                    style="font-family: 'Times New Roman', Times, serif; font-size: 0.9rem; color: var(--gold); letter-spacing: 4px; text-transform: uppercase; margin-top: 0; margin-bottom: 1rem;">
                    Connect On</h4>
                <div style="display: flex; flex-direction: column; gap: 1.2rem;">
                    <a href="https://www.linkedin.com/in/manujmittal?utm_source=share_via&utm_content=profile&utm_medium=member_ios"
                        target="_blank"
                        style="color: var(--text); text-decoration: none; display: flex; align-items: center; gap: 12px; font-size: 0.95rem; letter-spacing: 1px; transition: color 0.3s;"
                        onmouseover="this.style.color='var(--gold)';" onmouseout="this.style.color='var(--text)';">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z">
                            </path>
                            <rect x="2" y="9" width="4" height="12"></rect>
                            <circle cx="4" cy="4" r="2"></circle>
                        </svg>
                        LinkedIn
                    </a>
                    <a href="https://www.instagram.com/manuj523?igsh=Z3BtcTRhZDJvbXlx" target="_blank"
                        style="color: var(--text); text-decoration: none; display: flex; align-items: center; gap: 12px; font-size: 0.95rem; letter-spacing: 1px; transition: color 0.3s;"
                        onmouseover="this.style.color='var(--gold)';" onmouseout="this.style.color='var(--text)';">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                        </svg>
                        Instagram
                    </a>
                </div>
            </div>

            <!-- Action Column -->
            <div
                style="flex: 1.5; min-width: 220px; display: flex; flex-direction: column; align-items: flex-start; gap: 1rem;">
                <?php if (basename($_SERVER['PHP_SELF']) == 'index.php' || basename($_SERVER['PHP_SELF']) == ''): ?>
                    <a href="contact.php" class="btn-editorial-library"
                        style="background: var(--gold); color: #000; padding: 1.2rem 2rem; font-size: 0.85rem; border-radius: 4px; font-weight: bold; width: 100%; text-align: center; display: inline-block;">BOOK
                        AN APPOINTMENT</a>
                <?php endif; ?>
                <a href="store.php" class="btn-editorial-library"
                    style="background: transparent; color: #fff; border: 1px solid rgba(255,255,255,0.2); padding: 1.2rem 2rem; font-size: 0.85rem; border-radius: 4px; font-weight: bold; width: 100%; text-align: center; display: inline-block; transition: all 0.3s;"
                    onmouseover="this.style.borderColor='var(--gold)'; this.style.color='var(--gold)';"
                    onmouseout="this.style.borderColor='rgba(255,255,255,0.2)'; this.style.color='#fff';">VISIT OUR
                    LIBRARY</a>
            </div>

        </div>

        <!-- Bottom Section: Legal & Copyright -->
        <div
            style="border-top: 1px solid rgba(255,255,255,0.1); padding-top: 1.5rem; display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center; gap: 1.5rem;">
            <p
                style="font-size: 0.75rem; color: var(--muted); letter-spacing: 2px; margin: 0; text-transform: uppercase;">
                &copy; <?php echo date("Y"); ?> <?php echo strtoupper($author_name); ?>. ALL STORIES RESERVED.
            </p>
            <div style="display: flex; gap: 1.5rem; flex-wrap: wrap;">
                <a href="privacy.php"
                    style="font-size: 0.7rem; color: var(--muted); text-decoration: none; letter-spacing: 2px; text-transform: uppercase; transition: color 0.3s;"
                    onmouseover="this.style.color='var(--gold)';" onmouseout="this.style.color='var(--muted)';">Privacy
                    Policy</a>
                <a href="terms.php"
                    style="font-size: 0.7rem; color: var(--muted); text-decoration: none; letter-spacing: 2px; text-transform: uppercase; transition: color 0.3s;"
                    onmouseover="this.style.color='var(--gold)';" onmouseout="this.style.color='var(--muted)';">Terms of
                    Service</a>
                <a href="cookies.php"
                    style="font-size: 0.7rem; color: var(--muted); text-decoration: none; letter-spacing: 2px; text-transform: uppercase; transition: color 0.3s;"
                    onmouseover="this.style.color='var(--gold)';" onmouseout="this.style.color='var(--muted)';">Cookie
                    Policy</a>
            </div>
        </div>

    </div>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', () => {


        // Theme Toggle Logic
        const themeBtn = document.createElement('div');
        themeBtn.className = 'theme-toggle';
        themeBtn.innerHTML = '<svg viewBox="0 0 24 24"><path d="M12,18c-3.3,0-6-2.7-6-6s2.7-6,6-6s6,2.7,6,6S15.3,18,12,18z M12,8c-2.2,0-4,1.8-4,4s1.8,4,4,4s4-1.8,4-4S14.2,8,12,8z M12,4V2 M12,22v-2 M17.7,6.3l1.4-1.4 M4.9,19.1l1.4-1.4 M20,12h2 M2,12h2 M17.7,17.7l1.4,1.4 M4.9,4.9l1.4,1.4" fill="none" stroke="currentColor" stroke-width="2"/></svg>';
        document.body.appendChild(themeBtn);

        themeBtn.onclick = () => {
            const body = document.documentElement;
            const newTheme = body.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
            body.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);
        };

        // Stat Counter Animation
        const animateStats = () => {
            document.querySelectorAll('.stat-number').forEach(stat => {
                const target = parseInt(stat.dataset.target);
                const duration = 2000;
                const startTime = performance.now();

                const update = (now) => {
                    const progress = Math.min((now - startTime) / duration, 1);
                    const current = Math.floor(progress * target);
                    stat.innerText = current.toLocaleString();
                    if (progress < 1) requestAnimationFrame(update);
                    else stat.classList.add('plus');
                };
                requestAnimationFrame(update);
            });
        };

        const statObserver = new IntersectionObserver((entries) => {
            if (entries[0].isIntersecting) {
                animateStats();
                statObserver.disconnect();
            }
        }, { threshold: 0.5 });

        const statsSection = document.querySelector('.stats-section');
        if (statsSection) statObserver.observe(statsSection);

        // Ambient Mood Transitions
        const moodCanvas = document.getElementById('ambient-canvas');
        const moodMap = {
            'pillar-edu': '#0047AB', // Royal Blue
            'pillar-prof': '#C41E3A', // Executive Red
            'pillar-social': '#2E8B57', // Emerald Green
            'contact': '#c5a059' // Gold
        };

        const moodObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const moodClass = [...entry.target.classList].find(cls => moodMap[cls]);
                    const id = entry.target.id;
                    const color = moodMap[moodClass] || moodMap[id];
                    if (color) {
                        moodCanvas.style.background = `radial-gradient(circle at 50% 50%, ${color} 0%, transparent 70%)`;
                    }
                }
            });
        }, { threshold: 0.3 });

        document.querySelectorAll('.pillar-card, #contact').forEach(el => moodObserver.observe(el));

        // Universal Reveal Logic
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');

                }
            });
        }, { threshold: 0.2 });

        document.querySelectorAll('.reveal, h1, h2, .author-signature').forEach(el => {
            if (el.classList.contains('author-signature')) {
                const sigObserver = new IntersectionObserver((entries) => {
                    if (entries[0].isIntersecting) el.style.opacity = '1';
                }, { threshold: 0.5 });
                sigObserver.observe(el);
            } else {
                revealObserver.observe(el);
            }
        });

        // Page Flip Simulation on Click
        document.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', (e) => {
                if (link.href.includes(window.location.origin) && !link.href.includes('#')) {
                    e.preventDefault();
                    document.body.style.transition = 'transform 1s cubic-bezier(0.19, 1, 0.22, 1), opacity 1s';
                    document.body.style.transformOrigin = 'left center';
                    document.body.style.transform = 'rotateY(-20deg) scale(0.9)';
                    document.body.style.opacity = '0';
                    setTimeout(() => window.location.href = link.href, 800);
                }
            });
        });

        // Developer Easter Egg
        let secretKeys = [];
        const secretCode = 'kshitij';
        window.addEventListener('keydown', (e) => {
            secretKeys.push(e.key.toLowerCase());
            secretKeys.splice(-secretCode.length - 1, secretKeys.length - secretCode.length);
            if (secretKeys.join('').includes(secretCode)) {
                const toast = document.createElement('div');
                toast.innerText = '✨ Designed & Developed by Kshitij Bhilare ✨';
                Object.assign(toast.style, {
                    position: 'fixed',
                    bottom: '30px',
                    left: '50%',
                    transform: 'translateX(-50%) translateY(50px)',
                    background: 'rgba(0, 0, 0, 0.9)',
                    color: 'var(--gold)',
                    padding: '1rem 2.5rem',
                    borderRadius: '50px',
                    fontFamily: 'var(--font-sans)',
                    fontSize: '0.85rem',
                    fontWeight: '800',
                    letterSpacing: '3px',
                    textTransform: 'uppercase',
                    boxShadow: '0 20px 40px rgba(0,0,0,0.4)',
                    border: '1px solid rgba(197, 160, 89, 0.5)',
                    zIndex: '9999999',
                    opacity: '0',
                    transition: 'all 0.6s cubic-bezier(0.19, 1, 0.22, 1)'
                });
                document.body.appendChild(toast);

                setTimeout(() => {
                    toast.style.transform = 'translateX(-50%) translateY(0)';
                    toast.style.opacity = '1';
                }, 50);

                setTimeout(() => {
                    toast.style.transform = 'translateX(-50%) translateY(50px)';
                    toast.style.opacity = '0';
                    setTimeout(() => toast.remove(), 600);
                }, 4000);

                secretKeys = [];
            }
        });

    });
</script>
<nav class="mobile-bottom-nav">
    <a href="index.php" class="mobile-nav-item">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
            <polyline points="9 22 9 12 15 12 15 22"></polyline>
        </svg>
        <span>Home</span>
    </a>
    <a href="index.php#about" class="mobile-nav-item">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
            <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
            <polyline points="2 17 12 22 22 17"></polyline>
            <polyline points="2 12 12 17 22 12"></polyline>
        </svg>
        <span>About MJ</span>
    </a>
    <a href="contact.php" class="mobile-nav-item">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
            <polyline points="22,6 12,13 2,6"></polyline>
        </svg>
        <span>Contact</span>
    </a>
</nav>
</body>

</html>