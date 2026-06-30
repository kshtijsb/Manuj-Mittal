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
        border-top: 1px solid rgba(255, 255, 255, 0.1);
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

    /* Mobile Redesign — Ultra-Compact Sleek Strip */
    @media (max-width: 768px) {

        .footer-wrapper {
            background-image: none;
            background-color: #000;
        }

        .footer-container {
            padding: 1.2rem 1.5rem 90px;
            display: flex;
            flex-direction: column;
            align-items: stretch;
            min-height: auto;
            gap: 0;
        }

        /* Row 1: Signature left, socials right */
        .footer-main-row {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            flex-wrap: nowrap;
            gap: 0;
            width: 100%;
            margin-bottom: 0;
            padding-bottom: 0.9rem;
            border-bottom: 1px solid rgba(197, 160, 89, 0.2);
        }

        .footer-left {
            display: flex;
            align-items: center;
            min-width: auto;
            flex: 1;
        }

        .footer-signature {
            font-size: 1.4rem;
            margin: 0;
            line-height: 1;
            white-space: nowrap;
        }

        /* Right: collapse to just socials inline */
        .footer-right {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: flex-end;
            gap: 1rem;
            min-width: auto;
            max-width: none;
            flex: 1;
            margin-top: 0;
        }

        /* Hide the buttons from the main row — show in row 2 */
        .footer-btn-group {
            display: none;
        }

        .footer-meta-row {
            display: flex;
            flex-direction: row;
            justify-content: flex-end;
            align-items: center;
            gap: 0.8rem;
            margin-top: 0;
            width: auto;
        }

        .footer-location {
            display: none;
        }

        .footer-social-glow svg {
            width: 20px;
            height: 20px;
        }

        /* Row 2: Links side by side */
        .footer-legal-row {
            display: flex;
            flex-direction: column;
            align-items: stretch;
            border-top: none;
            padding-top: 0;
            gap: 0;
            width: 100%;
        }

        /* Inject the action links as a row */
        .footer-legal-row::before {
            content: '';
            display: block;
        }

        .footer-copyright {
            font-size: 0.6rem;
            color: rgba(255, 255, 255, 0.3);
            letter-spacing: 1.5px;
            text-align: center;
            padding-top: 0.7rem;
            margin: 0;
        }

        .footer-legal-links {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            gap: 1.2rem;
            padding: 0.7rem 0 0;
            border-top: none;
            flex-wrap: nowrap;
        }

        .footer-legal-link {
            font-size: 0.6rem;
            color: rgba(255, 255, 255, 0.35);
            letter-spacing: 1px;
        }

        .mobile-break-copyright {
            display: none;
        }
    }

    /* Mobile action links row — injected between footer rows */
    @media (max-width: 768px) {
        .footer-action-links-mobile {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            gap: 2rem;
            padding: 0.8rem 0;
            border-bottom: 1px solid rgba(197, 160, 89, 0.2);
            width: 100%;
        }

        .footer-action-link-mobile {
            font-family: var(--font-sans);
            font-size: 0.85rem;
            color: #fff;
            text-decoration: underline;
            text-underline-offset: 4px;
            text-decoration-color: var(--gold);
            text-decoration-thickness: 1px;
            letter-spacing: 0.5px;
        }
    }

    @media (min-width: 769px) {
        .footer-action-links-mobile {
            display: none;
        }
    }
</style>

<!-- Visionary Quotes Marquee -->
<style>
    .quote-bar-desktop {
        display: block;
    }

    .quote-bar-mobile {
        display: none;
    }

    @media (max-width: 768px) {
        .quote-bar-desktop {
            display: none !important;
        }

        .quote-bar-mobile {
            display: block !important;
        }
    }

    .quote-marquee-inner {
        display: flex;
        width: max-content;
        animation: marquee-scroll 30s linear infinite;
    }

    .quote-marquee-group {
        flex-shrink: 0;
        display: flex;
        align-items: center;
    }

    .quote-marquee-group span {
        font-family: var(--font-sans);
        font-size: 0.85rem;
        font-weight: 800;
        color: #000;
        text-transform: uppercase;
        letter-spacing: 2px;
        white-space: nowrap;
        padding: 0 2.5rem;
    }

    .quote-bar-desktop:hover .quote-marquee-inner {
        animation-play-state: paused;
    }
</style>

<!-- Desktop: Scrolling marquee -->
<div class="quote-bar quote-bar-desktop"
    style="background: var(--gold); padding: 0.6rem 0; width: 100%; position: relative; z-index: 20; overflow: hidden;">
    <div class="quote-marquee-inner">
        <div class="quote-marquee-group">
            <span>&ldquo;Let&rsquo;s upskill the younger generations and empower our communities for a better and
                sustainable future&rdquo;</span>
            <span style="opacity:0.4;">&bull;</span>
            <span>&ldquo;Let&rsquo;s upskill the younger generations and empower our communities for a better and
                sustainable future&rdquo;</span>
            <span style="opacity:0.4;">&bull;</span>
        </div>
        <div class="quote-marquee-group" aria-hidden="true">
            <span>&ldquo;Let&rsquo;s upskill the younger generations and empower our communities for a better and
                sustainable future&rdquo;</span>
            <span style="opacity:0.4;">&bull;</span>
            <span>&ldquo;Let&rsquo;s upskill the younger generations and empower our communities for a better and
                sustainable future&rdquo;</span>
            <span style="opacity:0.4;">&bull;</span>
        </div>
    </div>
</div>

<!-- Mobile: Static centered -->
<div class="quote-bar quote-bar-mobile"
    style="background: var(--gold); padding: 1.5rem; text-align: center; width: 100%; position: relative; z-index: 20;">
    <span
        style="color: #000; font-family: var(--font-sans); font-size: 0.85rem; font-weight: 800; letter-spacing: 1px; line-height: 1.6; display: inline-block; text-transform: uppercase; max-width: 500px; margin: 0 auto;">
        "Let's upskill the younger generations and empower our communities for a better and sustainable future"
    </span>
</div>

<footer class="footer-wrapper">
    <div class="footer-container">

        <!-- Main Footer Content -->
        <div class="footer-main-row">

            <!-- Left Side: Signature -->
            <div class="footer-left">
                <a href="index" style="text-decoration: none; display: inline-block;">
                    <div class="author-signature footer-signature">Manuj Mittal</div>
                </a>
            </div>

            <!-- Right Side: Buttons & Based In -->
            <div class="footer-right">

                <!-- Buttons (Stretched) -->
                <div class="footer-btn-group">
                    <a href="store" class="footer-btn">Visit our Library</a>
                    <a href="contact" class="footer-btn">Book a Meeting</a>
                </div>

                <!-- Based In & Socials (Under Buttons) -->
                <div class="footer-meta-row">
                    <div class="footer-location">
                        <span>Based In</span>
                        <span>New York, USA</span>
                    </div>

                    <div class="footer-socials">
                        <a href="https://www.linkedin.com/in/manujmittal?utm_source=share_via&utm_content=profile&utm_medium=member_ios"
                            target="_blank" aria-label="LinkedIn" class="footer-social-glow">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-3.5 15.5H6.38V9.82h2.12v7.68zm-1.06-8.73h-.01c-.71 0-1.17-.49-1.17-1.1 0-.62.48-1.1 1.2-1.1.72 0 1.17.48 1.18 1.1 0 .61-.47 1.1-1.2 1.1zm9.44 8.73h-2.12v-4.11c0-1.03-.37-1.74-1.29-1.74-.71 0-1.13.48-1.32.94-.07.17-.09.41-.09.66v4.25h-2.12s.03-6.96 0-7.68h2.12v1.09c.28-.43.78-1.04 1.89-1.04 1.38 0 2.42.91 2.42 2.85v4.78z" />
                            </svg>
                        </a>
                        <a href="https://www.instagram.com/manuj523?igsh=Z3BtcTRhZDJvbXlx" target="_blank"
                            aria-label="Instagram" class="footer-social-glow">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm4.32 14.5c0 .66-.54 1.2-1.2 1.2H8.88c-.66 0-1.2-.54-1.2-1.2V9.5c0-.66.54-1.2 1.2-1.2h7.24c.66 0 1.2.54 1.2 1.2v7zM12 10.3c-1.49 0-2.7 1.21-2.7 2.7s1.21 2.7 2.7 2.7 2.7-1.21 2.7-2.7-1.21-2.7-2.7-2.7zm0 4.2c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zm2.8-3.7c-.33 0-.6-.27-.6-.6s.27-.6.6-.6.6.27.6.6-.27.6-.6.6z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile-only action links row -->
        <div class="footer-action-links-mobile">
            <a href="store" class="footer-action-link-mobile">Visit our Library</a>
            <a href="contact" class="footer-action-link-mobile">Book a Meeting</a>
        </div>

        <!-- Bottom Section: Legal & Copyright -->
        <div class="footer-legal-row">
            <p class="footer-copyright">
                <?php echo date("Y"); ?><sup style="font-size:0.6em; vertical-align:super; line-height:0;">&copy;</sup>
                <?php echo strtoupper($author_name); ?>.<span class="mobile-break-copyright"> </span><br>ALL STORIES
                RESERVED.
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
<!-- About MJ Pillar Tray -->
<div class="about-pillar-tray" id="aboutPillarTray" aria-hidden="true">
    <div class="apt-header">
        <span class="apt-title">About MJ</span>
        <button class="apt-close" id="aptClose" aria-label="Close">&times;</button>
    </div>
    <a href="biography" class="apt-link apt-link-bio">
        <div class="apt-link-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                <circle cx="12" cy="7" r="4"></circle>
            </svg>
        </div>
        <div class="apt-link-text">
            <span class="apt-link-label">Biography</span>

        </div>
        <svg class="apt-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <polyline points="9 18 15 12 9 6"></polyline>
        </svg>
    </a>
    <a href="education" class="apt-link">
        <div class="apt-link-icon apt-icon-blue">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round">
                <path d="M22 10v6M2 10l10-5 10 5-10 5z"></path>
                <path d="M6 12v5c3 3 9 3 12 0v-5"></path>
            </svg>
        </div>
        <div class="apt-link-text">
            <span class="apt-link-label">Educational Background</span>

        </div>
        <svg class="apt-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <polyline points="9 18 15 12 9 6"></polyline>
        </svg>
    </a>
    <a href="professional" class="apt-link">
        <div class="apt-link-icon apt-icon-green">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round">
                <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                <path d="M16 7V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2"></path>
            </svg>
        </div>
        <div class="apt-link-text">
            <span class="apt-link-label">Professional Career</span>

        </div>
        <svg class="apt-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <polyline points="9 18 15 12 9 6"></polyline>
        </svg>
    </a>
    <a href="social-responsibility" class="apt-link">
        <div class="apt-link-icon apt-icon-purple">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round">
                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                <circle cx="9" cy="7" r="4"></circle>
                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
            </svg>
        </div>
        <div class="apt-link-text">
            <span class="apt-link-label">Social Responsibility</span>

        </div>
        <svg class="apt-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <polyline points="9 18 15 12 9 6"></polyline>
        </svg>
    </a>
</div>
<!-- Tray Backdrop -->
<div class="apt-backdrop" id="aptBackdrop"></div>

<style>
    /* ── Button reset for nav item ── */
    .mobile-nav-about-btn {
        background: none;
        border: none;
        padding: 0;
        cursor: pointer;
        font: inherit;
    }

    /* ── Backdrop ── */
    .apt-backdrop {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.45);
        z-index: 9998;
        backdrop-filter: blur(2px);
    }

    .apt-backdrop.open {
        display: block;
    }

    /* ── Tray ── */
    .about-pillar-tray {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        background: #fff;
        border-radius: 20px 20px 0 0;
        padding: 0 0 calc(env(safe-area-inset-bottom, 0px) + 80px);
        z-index: 9999;
        transform: translateY(110%);
        transition: transform 0.38s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 -8px 40px rgba(0, 0, 0, 0.15);
        will-change: transform;
    }

    .about-pillar-tray.open {
        transform: translateY(0);
    }

    /* ── Tray header ── */
    .apt-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1.2rem 1.5rem 0.8rem;
        border-bottom: 1px solid rgba(0, 0, 0, 0.07);
    }

    .apt-title {
        font-family: 'Times New Roman', Times, serif;
        font-size: 1.2rem;
        font-weight: bold;
        color: #000;
        letter-spacing: 0.5px;
    }

    .apt-close {
        background: rgba(0, 0, 0, 0.06);
        border: none;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        font-size: 1.1rem;
        color: #555;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        line-height: 1;
    }

    /* ── Links ── */
    .apt-link {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem 1.5rem;
        text-decoration: none;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        transition: background 0.15s;
    }

    .apt-link:last-child {
        border-bottom: none;
    }

    .apt-link:active {
        background: rgba(0, 0, 0, 0.03);
    }

    /* ── Icon circle ── */
    .apt-link-icon {
        width: 42px;
        height: 42px;
        border-radius: 12px;
        background: rgba(197, 160, 89, 0.12);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .apt-link-icon svg {
        width: 20px;
        height: 20px;
        stroke: var(--gold);
    }

    .apt-icon-blue {
        background: rgba(0, 71, 171, 0.1);
    }

    .apt-icon-blue svg {
        stroke: #0047AB;
    }

    .apt-icon-green {
        background: rgba(0, 128, 64, 0.1);
    }

    .apt-icon-green svg {
        stroke: #008040;
    }

    .apt-icon-purple {
        background: rgba(100, 60, 160, 0.1);
    }

    .apt-icon-purple svg {
        stroke: #643CA0;
    }

    /* ── Text ── */
    .apt-link-text {
        display: flex;
        flex-direction: column;
        gap: 2px;
        flex: 1;
    }

    .apt-link-label {
        font-family: var(--font-sans);
        font-size: 0.9rem;
        font-weight: 700;
        color: #111;
        letter-spacing: 0.2px;
    }

    .apt-link-sub {
        font-family: var(--font-sans);
        font-size: 0.72rem;
        color: #888;
        letter-spacing: 0.3px;
    }

    /* ── Chevron ── */
    .apt-arrow {
        width: 16px;
        height: 16px;
        stroke: #ccc;
        flex-shrink: 0;
    }

    /* Active state highlight for the nav button */
    .mobile-nav-about-btn.tray-open {
        color: var(--gold) !important;
    }

    .mobile-nav-about-btn.tray-open svg {
        stroke: var(--gold);
    }

    .mobile-nav-about-btn.tray-open span {
        color: var(--gold);
    }

    /* ── Only show on mobile ── */
    @media (min-width: 769px) {

        .about-pillar-tray,
        .apt-backdrop {
            display: none !important;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var btn = document.getElementById('mobileAboutBtn');
        var tray = document.getElementById('aboutPillarTray');
        var backdrop = document.getElementById('aptBackdrop');
        var closeBtn = document.getElementById('aptClose');
        if (!btn || !tray) return;

        function openTray() {
            tray.classList.add('open');
            backdrop.classList.add('open');
            btn.classList.add('tray-open');
            btn.setAttribute('aria-expanded', 'true');
            tray.setAttribute('aria-hidden', 'false');
            document.body.style.overflow = 'hidden';
        }

        function closeTray() {
            tray.classList.remove('open');
            backdrop.classList.remove('open');
            btn.classList.remove('tray-open');
            btn.setAttribute('aria-expanded', 'false');
            tray.setAttribute('aria-hidden', 'true');
            document.body.style.overflow = '';
        }

        btn.addEventListener('click', function () {
            tray.classList.contains('open') ? closeTray() : openTray();
        });

        closeBtn.addEventListener('click', closeTray);
        backdrop.addEventListener('click', closeTray);

        // Close on swipe down
        var startY = 0;
        tray.addEventListener('touchstart', function (e) { startY = e.touches[0].clientY; }, { passive: true });
        tray.addEventListener('touchend', function (e) {
            if (e.changedTouches[0].clientY - startY > 60) closeTray();
        }, { passive: true });
    });
</script>

<nav class="mobile-bottom-nav">
    <a href="index" class="mobile-nav-item">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round">
            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
            <polyline points="9 22 9 12 15 12 15 22"></polyline>
        </svg>
        <span>Home</span>
    </a>
    <button class="mobile-nav-item mobile-nav-about-btn" id="mobileAboutBtn" aria-expanded="false"
        aria-controls="aboutPillarTray">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round">
            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
            <circle cx="12" cy="7" r="4"></circle>
        </svg>
        <span>About MJ</span>
    </button>
    <a href="store" class="mobile-nav-item">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round">
            <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
            <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
        </svg>
        <span>Books</span>
    </a>
    <a href="contact" class="mobile-nav-item">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round">
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