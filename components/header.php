<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title ?? "Manuj Mittal | Storyteller"; ?></title>
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Crect width='100' height='100' rx='20' fill='%23000000'/%3E%3Ctext x='50%25' y='65%25' font-family='Cormorant Garamond, Georgia, serif' font-size='52' font-weight='bold' fill='%23c5a059' text-anchor='middle'%3EMM%3C/text%3E%3C/svg%3E">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@300;400;600;800&family=Mrs+Saint+Delafield&family=Caveat:wght@400;700&family=Rock+Salt&family=Nothing+You+Could+Do&display=swap" rel="stylesheet">
    <!-- Lenis Smooth Scroll -->
    <script src="https://cdn.jsdelivr.net/gh/studio-freight/lenis@1.0.19/bundled/lenis.min.js"></script>
    <!-- GSAP Core & ScrollTrigger -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <!-- SplitType -->
    <script src="https://unpkg.com/split-type"></script>
    <!-- Swup (Page Transitions) -->
    <script src="https://unpkg.com/swup@4"></script>
    <link rel="stylesheet" href="style.css">
    <style>
        :root {
            --blue: #003366;
            --gold: #c5a059;
            --yellow: #f4d03f;
            --white: #ffffff;
            --bg: #F8F6F0;
            --bg-gradient: radial-gradient(circle at 50% 0%, #FFFFFF 0%, #F8F6F0 60%, #EFEBE0 100%);
            --text: #111111;
            --muted: #666666;
            --green: #2E8B57;
            --font-serif: 'Cormorant Garamond', serif;
            --font-sans: 'Plus Jakarta Sans', sans-serif;
            --transition: all 1s cubic-bezier(0.19, 1, 0.22, 1);
            --mood-bg: transparent;
        }

        /* Ambient Mood Engine */
        #ambient-canvas {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            pointer-events: none;
            transition: background 2s ease;
            opacity: 0.15;
            filter: blur(100px);
        }

        [data-theme="dark"] #ambient-canvas {
            opacity: 0.1;
        }

        [data-theme="dark"] {
            --bg: #0A0F14;
            --bg-gradient: radial-gradient(circle at 50% 0%, #151A22 0%, #0A0F14 60%, #05080A 100%);
            --text: #F0F0F0;
            --surface: #12181F;
            --gold: #E5C07B;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        


        body { 
            font-family: var(--font-sans); 
            background: var(--bg); 
            background-image: var(--bg-gradient);
            color: var(--text);
            line-height: 1.6;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
            min-height: 100vh;
        }

        h1 { font-family: var(--font-serif); font-weight: 700; font-size: clamp(2.5rem, 6vw, 4.5rem); line-height: 1.1; }
        h2 { font-family: var(--font-serif); font-weight: 700; font-size: clamp(2rem, 4vw, 3.5rem); line-height: 1.2; }
        h3 { font-family: var(--font-serif); font-weight: 700; font-size: clamp(1.5rem, 3vw, 2.5rem); }
        h4 { font-family: var(--font-serif); font-weight: 700; }



        .gradient-text-gold {
            background: linear-gradient(135deg, var(--gold) 0%, #F9E596 50%, #B6862C 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            display: inline-block;
        }

        .container { max-width: 1200px; margin: 0 auto; padding: 0 4rem; }

        /* Responsive Container */
        @media (max-width: 768px) {
            .container { padding: 0 1.5rem; }
        }

        /* Navigation */
        header {
            position: sticky; top: 0; z-index: 1000;
            background: #000000;
            border-bottom: 1px solid rgba(197, 160, 89, 0.2);
            padding: 0 !important;
        }
        nav { padding: 1rem 0; display: flex; justify-content: space-between; align-items: center; }

        /* Marquee style banner */
        .header-marquee {
            width: 100%;
            background: var(--gold);
            padding: 0.4rem 0;
            overflow: hidden;
            display: flex;
            align-items: center;
        }

        .header-marquee-inner {
            display: flex;
            width: max-content;
            animation: marquee-scroll 25s linear infinite;
        }

        .header-marquee-group {
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: space-around;
            min-width: 100vw;
        }

        .header-marquee-group span {
            font-family: var(--font-sans);
            font-size: 0.7rem;
            font-weight: 700;
            color: #000000;
            text-transform: uppercase;
            letter-spacing: 2px;
            padding: 0 3rem;
            white-space: nowrap;
        }

        .header-marquee-group .separator {
            color: #000000;
            opacity: 0.5;
            padding: 0;
            font-size: 0.8rem;
        }

        .header-marquee:hover .header-marquee-inner {
            animation-play-state: paused;
        }

        @keyframes marquee-scroll {
            0% {
                transform: translate3d(0, 0, 0);
            }
            100% {
                transform: translate3d(-50%, 0, 0);
            }
        }
        .logo { font-size: 1.6rem; font-weight: 900; letter-spacing: 4px; color: var(--gold); text-transform: uppercase; text-decoration: none; transition: var(--transition); font-family: var(--font-serif); }
        .nav-book-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            background: #000;
            color: #fff !important;
            padding: 0.55rem 1.2rem;
            border-radius: 50px;
            font-weight: 800 !important;
            font-size: 0.75rem !important;
            letter-spacing: 1px;
            transition: all 0.25s ease !important;
            white-space: nowrap;
        }
        .nav-book-btn:hover {
            background: var(--gold) !important;
            color: #000 !important;
            transform: translateY(-1px);
        }
        [data-theme="dark"] .nav-book-btn {
            background: var(--gold);
            color: #000 !important;
        }
        [data-theme="dark"] .nav-book-btn:hover {
            background: #fff !important;
            color: #000 !important;
        }
        .logo:hover { color: #ffffff; }
        
        .nav-links { display: flex; gap: 2.5rem; list-style: none; align-items: center; }
        .nav-links a { text-decoration: none; color: var(--gold); font-size: 0.95rem; font-weight: 600; text-transform: uppercase; letter-spacing: 2px; position: relative; transition: color 0.3s ease; }
        .nav-links a:hover { color: #ffffff; }

        /* Dropdown Menu Styles */
        .nav-dropdown-wrapper {
            position: relative;
        }
        .nav-dropdown {
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%) translateY(15px);
            background: #000000;
            border: 1px solid rgba(197, 160, 89, 0.25);
            border-radius: 4px;
            padding: 0.8rem 0;
            list-style: none;
            min-width: 240px;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s cubic-bezier(0.25, 1, 0.5, 1);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.8);
            z-index: 1000;
        }
        .nav-dropdown::before {
            content: '';
            position: absolute;
            top: -6px;
            left: 50%;
            transform: translateX(-50%) rotate(45deg);
            width: 10px;
            height: 10px;
            background: #000000;
            border-top: 1px solid rgba(197, 160, 89, 0.25);
            border-left: 1px solid rgba(197, 160, 89, 0.25);
        }
        .nav-dropdown-wrapper:hover .nav-dropdown {
            opacity: 1;
            visibility: visible;
            transform: translateX(-50%) translateY(0);
        }
        .nav-dropdown li {
            width: 100%;
            margin: 0 !important;
            padding: 0;
            opacity: 1 !important;
            transform: none !important;
        }
        .nav-dropdown a {
            display: block;
            padding: 0.6rem 1.5rem;
            color: var(--gold);
            font-size: 0.8rem !important;
            font-family: var(--font-sans) !important;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            transition: all 0.2s ease;
            text-decoration: none;
            white-space: nowrap;
        }
        .nav-dropdown a:hover {
            background: rgba(197, 160, 89, 0.1);
            color: #ffffff !important;
            padding-left: 1.8rem;
        }
        .dropdown-arrow {
            display: inline-block;
            margin-left: 6px;
            vertical-align: middle;
            transition: transform 0.3s ease;
            stroke-width: 2.5px;
        }
        .nav-dropdown-wrapper:hover .dropdown-arrow {
            transform: rotate(180deg);
        }
        
        /* Neomorphic Embossed Social Links in Nav Bar */
        .nav-social-item {
            display: flex;
            gap: 0.8rem;
            align-items: center;
        }

        .nav-social-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: #161616;
            color: var(--gold) !important;
            border: 1px solid rgba(197, 160, 89, 0.2);
            /* Enhanced 3D Embossed (tactile raised) look */
            box-shadow: -2px -2px 5px rgba(255, 255, 255, 0.06), 
                        2px 2px 5px rgba(0, 0, 0, 0.8), 
                        inset 1px 1px 0px rgba(255, 255, 255, 0.1);
            transition: all 0.3s cubic-bezier(0.25, 1, 0.5, 1);
            cursor: pointer;
            text-decoration: none !important;
        }

        .nav-social-btn:hover {
            color: #ffffff !important;
            border-color: rgba(197, 160, 89, 0.4);
            transform: translateY(-2px);
            /* Stronger emboss on hover */
            box-shadow: -3px -3px 8px rgba(255, 255, 255, 0.08), 
                        3px 3px 8px rgba(0, 0, 0, 0.9), 
                        inset 1px 1px 0px rgba(255, 255, 255, 0.15);
        }

        .nav-social-btn:active {
            transform: translateY(0.5px);
            /* Tactile pressed (debossed/sunken) look */
            box-shadow: inset -2px -2px 5px rgba(255, 255, 255, 0.04), 
                        inset 2px 2px 5px rgba(0, 0, 0, 0.8);
        }

        .nav-social-btn svg {
            display: block;
            stroke-width: 2px;
        }
        
        /* Mobile Menu Toggle */
        .menu-toggle { display: none; background: none; border: none; color: var(--gold); cursor: pointer; padding: 5px; }

        @media (max-width: 992px) {
            .nav-links { 
                position: fixed; top: 0; left: 0; width: 100%; height: 100vh; 
                background: rgba(0, 0, 0, 0.7); 
                backdrop-filter: blur(25px);
                -webkit-backdrop-filter: blur(25px);
                flex-direction: column; justify-content: center; 
                align-items: center; transition: opacity 0.4s ease; 
                z-index: 1001; 
                display: flex !important;
                opacity: 0;
                pointer-events: none;
            }
            .nav-links.active { 
                opacity: 1;
                pointer-events: auto;
            }
            .nav-links > li {
                margin: 1.2rem 0;
                transform: translateY(20px);
                opacity: 0;
                transition: all 0.4s cubic-bezier(0.19, 1, 0.22, 1);
            }
            .nav-links.active > li {
                transform: translateY(0);
                opacity: 1;
            }
            .nav-links.active > li:nth-child(1) { transition-delay: 0.1s; }
            .nav-links.active > li:nth-child(2) { transition-delay: 0.2s; }
            .nav-links.active > li:nth-child(3) { transition-delay: 0.3s; }
            .nav-links.active > li:nth-child(4) { transition-delay: 0.4s; }

            .nav-dropdown {
                position: static !important;
                transform: none !important;
                opacity: 1 !important;
                visibility: visible !important;
                background: transparent !important;
                border: none !important;
                box-shadow: none !important;
                padding: 0.5rem 0 0 0 !important;
                min-width: auto !important;
                text-align: center !important;
                display: flex !important;
                flex-direction: column !important;
                gap: 0.5rem !important;
            }
            .nav-dropdown::before { display: none !important; }
            .nav-dropdown li {
                margin: 0 !important;
                padding: 0 !important;
                opacity: 1 !important;
                transform: none !important;
            }
            .nav-dropdown a {
                font-size: 1.1rem !important;
                font-family: var(--font-sans) !important;
                text-transform: uppercase !important;
                letter-spacing: 2px !important;
                color: rgba(197, 160, 89, 0.7) !important;
                padding: 0.3rem 0 !important;
                transition: color 0.3s ease !important;
            }
            .nav-dropdown a:hover {
                color: #ffffff !important;
                background: transparent !important;
                padding-left: 0 !important;
            }
            .dropdown-arrow { display: none !important; }

            .menu-toggle { display: none !important; }
            .menu-toggle.active svg { stroke: #fff; }
            .nav-links a { font-size: 2.2rem; font-family: var(--font-serif); text-transform: none; letter-spacing: 0px; color: #fff; font-weight: 400; }
        }

        /* Common Book Components */
        .book-aura { position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: var(--gold); filter: blur(80px); opacity: 0; transition: 0.8s; z-index: -1; }
        .book-cover-main { width: 100%; height: 100%; background-size: cover; background-position: center; border-radius: 5px; position: relative; overflow: hidden; box-shadow: 0 20px 40px rgba(0,0,0,0.2); border: 1px solid rgba(255,255,255,0.1); }
        .book-coming-soon { background: #111 !important; display: flex; align-items: center; justify-content: center; text-align: center; color: var(--gold); }
        .coming-soon-text { font-family: var(--font-serif); font-size: 1.5rem; text-transform: uppercase; letter-spacing: 5px; transform: rotate(-15deg); border: 2px solid var(--gold); padding: 1rem; }
        
        .btn-text { font-size: 0.75rem; font-weight: 800; letter-spacing: 2px; color: var(--blue); text-decoration: none; border-bottom: 1px solid var(--gold); padding-bottom: 8px; transition: 0.3s; }
        .reveal { opacity: 0; transform: translateY(50px); transition: var(--transition); }
        .reveal.active { opacity: 1; transform: translateY(0); }

        /* Theme Toggle Fix */
        .theme-toggle {
            position: fixed !important;
            bottom: 20px !important;
            right: 20px !important;
            width: 44px !important;
            height: 44px !important;
            background: #000 !important;
            color: #fff !important;
            border-radius: 50% !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            cursor: pointer !important;
            z-index: 9999 !important;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2) !important;
            transition: all 0.3s ease !important;
            border: 1px solid rgba(255,255,255,0.1) !important;
        }

        @media (max-width: 768px) {
            .theme-toggle { bottom: 90px !important; right: 15px !important; width: 38px !important; height: 38px !important; }
            h1 { font-size: 2.5rem !important; }
            h2 { font-size: 2rem !important; }
        }

        .theme-toggle:hover {
            transform: scale(1.1) !important;
            background: var(--gold) !important;
        }

        .theme-toggle svg {
            width: 20px !important;
            height: 20px !important;
            display: block !important;
        }

        [data-theme="dark"] .theme-toggle {
            background: var(--gold) !important;
            color: #000 !important;
        }
    </style>
</head>
<body>
    <!-- Premium Preloader -->
    <div id="premium-preloader" style="position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; background: #0A0F14; z-index: 999999; display: flex; align-items: center; justify-content: center; transition: opacity 0.8s cubic-bezier(0.19, 1, 0.22, 1), visibility 0.8s; visibility: visible; opacity: 1;">
        <h1 style="color: var(--gold); font-size: 5rem; letter-spacing: 10px; font-weight: 900; margin: 0; padding-left: 10px; opacity: 0; transform: scale(0.9); animation: mmLogoFade 1.5s cubic-bezier(0.19, 1, 0.22, 1) forwards;">
            MM
        </h1>
    </div>
    <style>
        @keyframes mmLogoFade {
            0% { opacity: 0; transform: scale(0.95) translateY(10px); filter: blur(10px); }
            40% { opacity: 1; transform: scale(1) translateY(0); filter: blur(0); }
            80% { opacity: 1; transform: scale(1) translateY(0); filter: blur(0); }
            100% { opacity: 0; transform: scale(1.05) translateY(-5px); filter: blur(5px); }
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            setTimeout(() => {
                const preloader = document.getElementById('premium-preloader');
                if (preloader) {
                    preloader.style.opacity = '0';
                    preloader.style.visibility = 'hidden';
                    setTimeout(() => preloader.remove(), 800);
                }
            }, 1500);
        });
    </script>
    <div id="ambient-canvas"></div>


    <!-- Gold Dust Particles Canvas -->
    <canvas id="goldDust" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none; z-index: 1; opacity: 0.6;"></canvas>

    <script>
        const canvas = document.getElementById('goldDust');
        const ctx = canvas.getContext('2d');
        let particles = [];
        let mouse = { x: -100, y: -100 };

        window.addEventListener('mousemove', (e) => {
            mouse.x = e.clientX;
            mouse.y = e.clientY;
        });
        
        function resize() {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        }
        window.addEventListener('resize', resize);
        resize();

        class Particle {
            constructor() {
                this.reset();
            }
            reset() {
                this.x = Math.random() * canvas.width;
                this.y = Math.random() * canvas.height;
                this.size = Math.random() * 2;
                this.baseX = this.x;
                this.baseY = this.y;
                this.density = (Math.random() * 30) + 1;
                this.opacity = Math.random() * 0.5;
            }
            update() {
                let dx = mouse.x - this.x;
                let dy = mouse.y - this.y;
                let distance = Math.sqrt(dx * dx + dy * dy);
                let forceDirectionX = dx / distance;
                let forceDirectionY = dy / distance;
                let maxDistance = 150;
                let force = (maxDistance - distance) / maxDistance;
                let directionX = forceDirectionX * force * this.density;
                let directionY = forceDirectionY * force * this.density;

                if (distance < maxDistance) {
                    this.x += directionX;
                    this.y += directionY;
                } else {
                    if (this.x !== this.baseX) {
                        let dx = this.x - this.baseX;
                        this.x -= dx / 20;
                    }
                    if (this.y !== this.baseY) {
                        let dy = this.y - this.baseY;
                        this.y -= dy / 20;
                    }
                }
            }
            draw() {
                ctx.fillStyle = `rgba(197, 160, 89, ${this.opacity})`;
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                ctx.fill();
            }
        }

        for (let i = 0; i < 150; i++) particles.push(new Particle());

        function animate() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            particles.forEach(p => {
                p.update();
                p.draw();
            });
            requestAnimationFrame(animate);
        }
        animate();
    </script>

    <header>
        <div class="container">
            <nav>
                <span class="logo" style="cursor: default;">MANUJ MITTAL</span>
                <button class="menu-toggle">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </button>
                <ul class="nav-links">
                    <li><a href="index.php">Home</a></li>
                    <li class="nav-dropdown-wrapper">
                        <a href="index.php#about" class="dropdown-trigger">About MJ <svg class="dropdown-arrow" width="10" height="6" viewBox="0 0 10 6" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 1l4 4 4-4"/></svg></a>
                        <ul class="nav-dropdown">
                            <li><a href="education.php">Education</a></li>
                            <li><a href="professional.php">Professional</a></li>
                            <li><a href="social-responsibility.php">Social Responsibility</a></li>
                        </ul>
                    </li>

                    <li><a href="contact.php">Contact</a></li>
                    <li class="nav-social-item">
                        <a href="https://www.instagram.com/manuj523?igsh=Z3BtcTRhZDJvbXlx" target="_blank" class="nav-social-btn" aria-label="Instagram">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                        </a>
                        <a href="https://www.linkedin.com/in/manujmittal?utm_source=share_via&utm_content=profile&utm_medium=member_ios" target="_blank" class="nav-social-btn" aria-label="LinkedIn">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="header-marquee">
            <div class="header-marquee-inner">
                <div class="header-marquee-group">
                    <span>Doctorate Researcher</span>
                    <span class="separator">•</span>
                    <span>Global Education Representative</span>
                    <span class="separator">•</span>
                    <span>Career Strategy Expert</span>
                    <span class="separator">•</span>
                </div>
                <div class="header-marquee-group" aria-hidden="true">
                    <span>Doctorate Researcher</span>
                    <span class="separator">•</span>
                    <span>Global Education Representative</span>
                    <span class="separator">•</span>
                    <span>Career Strategy Expert</span>
                    <span class="separator">•</span>
                </div>
            </div>
        </div>
    </header>

    <script>
        const menuToggle = document.querySelector('.menu-toggle');
        const navLinks = document.querySelector('.nav-links');
        
        if(menuToggle) {
            menuToggle.addEventListener('click', () => {
                navLinks.classList.toggle('active');
                menuToggle.classList.toggle('active');
            });
        }
        
        // Close menu on link click
        document.querySelectorAll('.nav-links a').forEach(link => {
            link.addEventListener('click', () => {
                navLinks.classList.remove('active');
                menuToggle.classList.remove('active');
            });
        });
    </script>
