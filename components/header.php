<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title ?? "Manuj Mittal | Storyteller"; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@300;400;600;800&family=Mrs+Saint+Delafield&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        :root {
            --blue: #003366;
            --gold: #c5a059;
            --yellow: #f4d03f;
            --white: #ffffff;
            --bg: #fcfcfc;
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
            --text: #F0F0F0;
            --surface: #12181F;
            --gold: #E5C07B;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        


        body { 
            font-family: var(--font-sans); 
            background: var(--bg); 
            color: var(--text);
            line-height: 1.6;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
            border: 4px solid;
            border-image: linear-gradient(to bottom, var(--blue), var(--gold)) 1;
            min-height: 100vh;
        }

        @media (max-width: 768px) {
            body { border-width: 2px; }
        }

        h1, h2, h3, h4 { font-family: var(--font-serif); font-weight: 700; }



        .container { max-width: 1200px; margin: 0 auto; padding: 0 4rem; }

        /* Responsive Container */
        @media (max-width: 768px) {
            .container { padding: 0 1.5rem; }
        }

        /* Navigation */
        header {
            position: sticky; top: 4px; z-index: 1000;
            background: #000000;
            border-bottom: 1px solid rgba(197, 160, 89, 0.2);
        }
        nav { padding: 1.5rem 0; display: flex; justify-content: space-between; align-items: center; }
        .logo { font-size: 1rem; font-weight: 800; letter-spacing: 4px; color: var(--gold); text-transform: uppercase; text-decoration: none; }
        
        .nav-links { display: flex; gap: 3rem; list-style: none; }
        .nav-links a { text-decoration: none; color: var(--gold); font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 2px; position: relative; }
        
        /* Mobile Menu Toggle */
        .menu-toggle { display: none; background: none; border: none; color: var(--gold); cursor: pointer; padding: 5px; }

        @media (max-width: 992px) {
            .nav-links { 
                position: fixed; top: 0; right: -100%; width: 80%; height: 100vh; 
                background: #000; flex-direction: column; justify-content: center; 
                align-items: center; transition: 0.5s cubic-bezier(0.19, 1, 0.22, 1); 
                z-index: 1001; 
                display: flex !important;
            }
            .nav-links.active { right: 0; }
            .menu-toggle { display: block; z-index: 1002; }
            .nav-links a { font-size: 1.2rem; }
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
            .theme-toggle { bottom: 15px !important; right: 15px !important; width: 38px !important; height: 38px !important; }
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
                <a href="index.php" class="logo">MANUJ MITTAL</a>
                <button class="menu-toggle">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </button>
                <ul class="nav-links">
                    <li><a href="index.php#home">Intro</a></li>
                    <li><a href="inkwell.php">Blogs and Articles</a></li>
                    <li><a href="store.php">Store</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <script>
        const menuToggle = document.querySelector('.menu-toggle');
        const navLinks = document.querySelector('.nav-links');
        
        if(menuToggle) {
            menuToggle.addEventListener('click', () => {
                navLinks.classList.toggle('active');
            });
        }
        
        // Close menu on link click
        document.querySelectorAll('.nav-links a').forEach(link => {
            link.addEventListener('click', () => {
                navLinks.classList.remove('active');
            });
        });
    </script>
