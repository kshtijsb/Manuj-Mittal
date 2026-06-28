<style>
    /* Footer Base Styles */
    .footer-wrapper {
        text-align: left;
        position: relative;
        z-index: 10;
        background-color: #050505;
        background-image: linear-gradient(rgba(255, 255, 255, 0.05) 1px, transparent 1px), linear-gradient(90deg, rgba(255, 255, 255, 0.05) 1px, transparent 1px);
        background-size: 40px 40px;
    }
    .footer-container {
        width: 100%;
        margin: 0 auto;
        padding: 3.5rem 4vw 1rem;
        background-color: transparent;
    }
    
    /* Layout */
    .footer-main-row {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: flex-start;
        gap: 1.5rem;
        margin-bottom: 1.5rem;
    }
    .footer-left {
        flex: 1;
        min-width: 300px;
    }
    .footer-signature {
        line-height: 1;
        margin: 0;
        font-size: clamp(3rem, 7vw, 5rem);
        font-family: 'Times New Roman', Times, serif;
        color: var(--gold);
        white-space: nowrap;
        opacity: 1 !important;
        transition: none !important;
    }
    .footer-right {
        flex: 1;
        min-width: 300px;
        max-width: 600px;
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
        margin-top: -1rem;
    }
    
    /* Buttons */
    .footer-btn-group {
        display: flex;
        gap: 1.5rem;
        width: 100%;
    }
    .footer-btn {
        flex: 1;
        background: var(--gold);
        color: #000 !important;
        border: 1px solid var(--gold);
        padding: 1.2rem 1rem;
        font-size: 0.85rem;
        border-radius: 4px;
        font-weight: bold;
        text-align: center;
        text-decoration: none;
        text-transform: uppercase;
        font-family: var(--font-sans);
        word-spacing: 0.25em;
        letter-spacing: 1px;
    }
    
    /* Meta (Location & Socials) */
    .footer-meta-row {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: flex-end;
        gap: 1.5rem;
        width: 100%;
    }
    .footer-location {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .footer-location span {
        font-family: var(--font-sans);
        font-size: 0.85rem;
        font-weight: bold;
        color: var(--gold);
        letter-spacing: 2px;
        text-transform: uppercase;
        margin: 0;
    }
    .footer-socials {
        display: flex;
        gap: 1rem;
        align-items: center;
    }
    .footer-social-glow {
        color: var(--gold) !important;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none !important;
    }
    .footer-social-glow svg {
        transition: all 0.3s ease;
    }
    .footer-social-glow:hover svg {
        filter: drop-shadow(0 0 10px rgba(197, 160, 89, 0.9));
        transform: scale(1.15);
    }
    
    /* Legal Section */
    .footer-legal-row {
        border-top: 1px solid rgba(255,255,255,0.1);
        padding-top: 1.5rem;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
        gap: 1.5rem;
    }
    .footer-copyright {
        font-size: 0.75rem;
        color: var(--muted);
        letter-spacing: 2px;
        margin: 0;
        text-transform: uppercase;
    }
    .footer-legal-links {
        display: flex;
        gap: 1.5rem;
        flex-wrap: wrap;
    }
    .footer-legal-link {
        font-size: 0.7rem;
        color: var(--muted);
        text-decoration: none;
        letter-spacing: 2px;
        text-transform: uppercase;
        transition: color 0.3s;
    }
    .footer-legal-link:hover {
        color: var(--gold);
    }

    /* Tablet Redesign */
    @media (max-width: 1100px) and (min-width: 769px) {
        .footer-main-row {
            flex-direction: column;
            align-items: center;
            text-align: center;
            gap: 2rem;
        }
        .footer-left {
            min-width: 100%;
            display: flex;
            justify-content: center;
        }
        .footer-right {
            width: 100%;
            max-width: 600px;
            margin-top: 0;
            align-items: center;
        }
        .footer-meta-row {
            justify-content: center;
        }
    }

    /* Mobile Redesign */
    @media (max-width: 768px) {
        .footer-container {
            padding-top: 4rem;
            padding-bottom: 120px; /* Spacer for mobile bottom nav so we don't scroll into empty body */
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 80vh; /* Takes up a good portion of the iPhone screen */
            justify-content: center;
        }
        .footer-main-row {
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            gap: 2.5rem;
            width: 100%;
        }
        .footer-left {
            min-width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .footer-signature {
            font-size: 2.2rem;
            margin-bottom: 0.5rem;
            text-align: center;
        }
        .footer-right {
            min-width: 100%;
            max-width: 100%;
            display: flex;
            flex-direction: column;
            margin-top: 0;
            align-items: center;
            justify-content: center;
            gap: 2rem;
        }
        .footer-btn-group {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 1.2rem;
            width: 100%;
        }
        .footer-btn {
            background: transparent !important;
            border: none !important;
            padding: 0.5rem !important;
            font-size: 1.1rem;
            text-transform: none;
            letter-spacing: 1px;
            color: #fff !important;
            width: auto;
            text-align: center;
            text-decoration: underline;
            text-underline-offset: 4px;
            text-decoration-color: var(--gold);
        }
        .footer-meta-row {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            gap: 1.5rem;
            margin-top: 1rem;
            width: 100%;
        }
        .footer-location {
            display: none;
        }
        .footer-legal-row {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            gap: 1rem;
            padding-top: 3rem;
            width: 100%;
        }
        .footer-legal-links {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            gap: 1rem;
        }
    }
</style>

    <!-- Visionary Quotes (Styled as Marquee matching Header) -->
    <div class="header-marquee" style="position: relative; z-index: 20;">
        <div class="header-marquee-inner">
            <div class="header-marquee-group">
                <span>"Let’s upskill the younger generations and empower our communities for a better and sustainable future"</span>
                <span>"Let’s upskill the younger generations and empower our communities for a better and sustainable future"</span>
            </div>
            <div class="header-marquee-group" aria-hidden="true">
                <span>"Let’s upskill the younger generations and empower our communities for a better and sustainable future"</span>
                <span>"Let’s upskill the younger generations and empower our communities for a better and sustainable future"</span>
            </div>
        </div>
    </div>

<footer class="footer-wrapper">
    <div class="footer-container">

        <!-- Main Footer Content -->
        <div class="footer-main-row">

            <!-- Left Side: Signature -->
            <div class="footer-left">
                <a href="index.php" style="text-decoration: none; display: inline-block;">
                    <div class="author-signature footer-signature">Manuj Mittal</div>
                </a>
            </div>

            <!-- Right Side: Buttons & Based In -->
            <div class="footer-right">

                <!-- Buttons (Stretched) -->
                <div class="footer-btn-group">
                    <a href="store.php" class="footer-btn">Visit our Library</a>
                    <a href="contact.php" class="footer-btn">Book a Meeting</a>
                </div>

                <!-- Based In & Socials (Under Buttons) -->
                <div class="footer-meta-row">
                    <div class="footer-location">
                        <span>Based In</span>
                        <span>New York, USA</span>
                    </div>

                    <div class="footer-socials">
                        <a href="https://www.linkedin.com/in/manujmittal?utm_source=share_via&utm_content=profile&utm_medium=member_ios" target="_blank" aria-label="LinkedIn" class="footer-social-glow">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-3.5 15.5H6.38V9.82h2.12v7.68zm-1.06-8.73h-.01c-.71 0-1.17-.49-1.17-1.1 0-.62.48-1.1 1.2-1.1.72 0 1.17.48 1.18 1.1 0 .61-.47 1.1-1.2 1.1zm9.44 8.73h-2.12v-4.11c0-1.03-.37-1.74-1.29-1.74-.71 0-1.13.48-1.32.94-.07.17-.09.41-.09.66v4.25h-2.12s.03-6.96 0-7.68h2.12v1.09c.28-.43.78-1.04 1.89-1.04 1.38 0 2.42.91 2.42 2.85v4.78z" />
                            </svg>
                        </a>
                        <a href="https://www.instagram.com/manuj523?igsh=Z3BtcTRhZDJvbXlx" target="_blank" aria-label="Instagram" class="footer-social-glow">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm4.32 14.5c0 .66-.54 1.2-1.2 1.2H8.88c-.66 0-1.2-.54-1.2-1.2V9.5c0-.66.54-1.2 1.2-1.2h7.24c.66 0 1.2.54 1.2 1.2v7zM12 10.3c-1.49 0-2.7 1.21-2.7 2.7s1.21 2.7 2.7 2.7 2.7-1.21 2.7-2.7-1.21-2.7-2.7-2.7zm0 4.2c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zm2.8-3.7c-.33 0-.6-.27-.6-.6s.27-.6.6-.6.6.27.6.6-.27.6-.6.6z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Section: Legal & Copyright -->
        <div class="footer-legal-row">
            <p class="footer-copyright">
                &copy; <?php echo date("Y"); ?> <?php echo strtoupper($author_name); ?>. ALL STORIES RESERVED.
            </p>
            <div class="footer-legal-links">
                <a href="privacy" class="footer-legal-link">Privacy Policy</a>
                <a href="terms" class="footer-legal-link">Terms of Service</a>
                <a href="cookies" class="footer-legal-link">Cookie Policy</a>
            </div>
        </div>

    </div>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', () => {


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
                // animateStats(); removed to keep static numbers
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
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
            <polyline points="9 22 9 12 15 12 15 22"></polyline>
        </svg>
        <span>Home</span>
    </a>
    <a href="biography.php" class="mobile-nav-item">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
            <circle cx="12" cy="7" r="4"></circle>
        </svg>
        <span>About MJ</span>
    </a>
    <a href="store.php" class="mobile-nav-item">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
            <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
        </svg>
        <span>Books</span>
    </a>
    <a href="contact.php" class="mobile-nav-item">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
            <polyline points="22,6 12,13 2,6"></polyline>
        </svg>
        <span>Contact</span>
    </a>
</nav>

<!-- Cookie Consent Banner -->
<style>
    #cookie-banner {
        display: none;
        position: fixed;
        bottom: 2rem;
        left: 50%;
        transform: translateX(-50%);
        background: #0a0a0a;
        border: 1px solid rgba(197, 160, 89, 0.3);
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.8);
        padding: 1.5rem 2rem;
        border-radius: 8px;
        z-index: 99999;
        align-items: center;
        gap: 2rem;
        max-width: 90vw;
        width: max-content;
        color: #ffffff;
        font-family: var(--font-sans);
    }

    @media (max-width: 600px) {
        #cookie-banner {
            flex-direction: column;
            text-align: center;
            bottom: 5rem;
            /* Above mobile nav */
            padding: 1.5rem;
            gap: 1.5rem;
        }
    }

    #cookie-banner .cookie-text {
        font-size: 0.9rem;
        opacity: 0.9;
        line-height: 1.5;
    }

    #cookie-banner .cookie-text a {
        color: var(--gold);
        text-decoration: underline;
    }

    #cookie-banner .cookie-buttons {
        display: flex;
        gap: 1rem;
        flex-shrink: 0;
    }

    #cookie-banner .btn-accept {
        background: var(--gold);
        color: #000;
        border: 1px solid var(--gold);
        padding: 0.8rem 1.5rem;
        font-weight: bold;
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        border-radius: 4px;
        cursor: pointer;
        transition: all 0.3s;
    }

    #cookie-banner .btn-accept:hover {
        background: transparent;
        color: var(--gold);
    }

    #cookie-banner .btn-decline {
        background: transparent;
        color: #fff;
        border: 1px solid rgba(255, 255, 255, 0.2);
        padding: 0.8rem 1.5rem;
        font-weight: bold;
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        border-radius: 4px;
        cursor: pointer;
        transition: all 0.3s;
    }

    #cookie-banner .btn-decline:hover {
        border-color: var(--gold);
        color: var(--gold);
    }
</style>

<div id="cookie-banner">
    <div class="cookie-text">
        We use cookies to enhance your browsing experience and analyze site traffic.<br>
        By continuing to use our site, you agree to our <a href="cookies">Cookie Policy</a>.
    </div>
    <div class="cookie-buttons">
        <button class="btn-decline" id="btn-decline">Decline</button>
        <button class="btn-accept" id="btn-accept">Accept</button>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        if (!localStorage.getItem('cookieConsent')) {
            document.getElementById('cookie-banner').style.display = 'flex';
        }

        document.getElementById('btn-accept').addEventListener('click', function () {
            localStorage.setItem('cookieConsent', 'accepted');
            document.getElementById('cookie-banner').style.display = 'none';
        });

        document.getElementById('btn-decline').addEventListener('click', function () {
            localStorage.setItem('cookieConsent', 'declined');
            document.getElementById('cookie-banner').style.display = 'none';
        });
    });
</script>

</body>

</html>