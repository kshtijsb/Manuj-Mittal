    <footer style="padding: 8rem 0; text-align: center; border-top: 1px solid rgba(0,0,0,0.05); position: relative; z-index: 10;">
        <div class="container">
            <!-- Self-Writing Signature -->
            <div class="signature-container" style="margin-bottom: 4rem;">
                <style>
                    .author-signature { font-family: 'Mrs Saint Delafield', cursive; font-size: 5rem; color: var(--gold); opacity: 0; transition: opacity 2s ease; }
                    @media (max-width: 768px) { .author-signature { font-size: 3rem; } }
                </style>
                <div class="author-signature">Manuj Mittal</div>
            </div>

            <div class="logo" style="margin-bottom: 2rem;">M. MITTAL</div>
            <div style="margin-bottom: 3rem;">
                <a href="store.php" style="color: var(--gold); text-decoration: none; font-size: 0.8rem; font-weight: 800; letter-spacing: 3px; border: 1px solid var(--gold); padding: 1rem 3rem; transition: 0.3s; display: inline-block;">THE LIBRARY</a>
            </div>
            <p style="font-size: 0.7rem; color: var(--muted); letter-spacing: 3px; margin-bottom: 1rem;">&copy; <?php echo date("Y"); ?> <?php echo strtoupper($author_name); ?>. ALL STORIES RESERVED.</p>
            <p style="font-size: 0.6rem; color: var(--muted); opacity: 0.6; letter-spacing: 2px;">Developed with Imagination by <span style="color: var(--blue); font-weight: 800;"><?php echo $developer_name; ?></span></p>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const cursor = document.querySelector('.cursor');

            document.addEventListener('mousemove', (e) => {
                cursor.style.left = e.clientX + 'px';
                cursor.style.top = e.clientY + 'px';
            });

            // Cursor Hover Effect
            document.querySelectorAll('a, button, .pillar-card, .book-simple-wrapper, .interactive').forEach(el => {
                el.addEventListener('mouseenter', () => cursor.classList.add('hovering'));
                el.addEventListener('mouseleave', () => cursor.classList.remove('hovering'));
            });

            // Self-Writing Headlines
            const writeText = (el) => {
                const text = el.innerText;
                el.innerHTML = '';
                [...text].forEach((char, i) => {
                    const span = document.createElement('span');
                    span.innerText = char;
                    span.style.opacity = '0';
                    span.style.transition = `opacity 0.1s ease ${i * 0.05}s`;
                    el.appendChild(span);
                    setTimeout(() => span.style.opacity = '1', 10);
                });
            };

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
                if(entries[0].isIntersecting) {
                    animateStats();
                    statObserver.disconnect();
                }
            }, { threshold: 0.5 });

            const statsSection = document.querySelector('.stats-section');
            if(statsSection) statObserver.observe(statsSection);

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
                        if ((entry.target.tagName === 'H2' || entry.target.tagName === 'H1') && !entry.target.classList.contains('written')) {
                            writeText(entry.target);
                            entry.target.classList.add('written');
                        }
                    }
                });
            }, { threshold: 0.2 });

            document.querySelectorAll('.reveal, h1, h2, .author-signature').forEach(el => {
                if (el.classList.contains('author-signature')) {
                    const sigObserver = new IntersectionObserver((entries) => {
                        if(entries[0].isIntersecting) el.style.opacity = '1';
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
        });
    </script>
</body>
</html>
