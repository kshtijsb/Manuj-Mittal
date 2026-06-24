<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no, date=no, email=no, address=no">
    <title><?php echo $page_title ?? "Manuj Mittal | Storyteller"; ?></title>
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml"
        href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Crect width='100' height='100' rx='20' fill='%23000000'/%3E%3Ctext x='50%25' y='65%25' font-family='Cormorant Garamond, Georgia, serif' font-size='52' font-weight='bold' fill='%23c5a059' text-anchor='middle'%3EMM%3C/text%3E%3C/svg%3E">
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@300;400;600;800&family=Mrs+Saint+Delafield&family=Caveat:wght@400;700&family=Rock+Salt&family=Nothing+You+Could+Do&display=swap"
        rel="stylesheet">
    <!-- Lenis Smooth Scroll -->
    <script src="https://cdn.jsdelivr.net/gh/studio-freight/lenis@1.0.19/bundled/lenis.min.js"></script>
    <!-- GSAP Core & ScrollTrigger -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <!-- SplitType -->
    <script src="https://unpkg.com/split-type"></script>
    <!-- Swup (Page Transitions) -->
    <script src="https://unpkg.com/swup@4"></script>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">

</head>

<body>
    <!-- Premium Preloader -->
    <div id="premium-preloader"
        style="position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; background: #c5a059; z-index: 999999; display: flex; align-items: center; justify-content: center; transition: opacity 0.8s cubic-bezier(0.19, 1, 0.22, 1), visibility 0.8s; visibility: visible; opacity: 1;">
        <img src="assets/manuj%20mittal%20logo.jpeg" alt="Manuj Mittal Logo"
            style="width: 300px; height: auto; opacity: 0; transform: scale(0.9); animation: mmLogoFade 1.5s cubic-bezier(0.19, 1, 0.22, 1) forwards;">
    </div>

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
    <canvas id="goldDust"
        style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none; z-index: 1; opacity: 0.6;"></canvas>

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
                    <li class="hide-on-mobile"><a href="index.php">Home</a></li>

                    <li class="nav-dropdown-wrapper hide-on-mobile">
                        <a href="index.php#about" class="dropdown-trigger">About MJ <svg class="dropdown-arrow"
                                width="10" height="6" viewBox="0 0 10 6" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <path d="M1 1l4 4 4-4" />
                            </svg></a>
                        <ul class="nav-dropdown">
                            <li><a href="education.php">Education</a></li>
                            <li><a href="professional.php">Professional</a></li>
                            <li><a href="social-responsibility.php">Social Responsibility</a></li>
                        </ul>
                    </li>

                    <li class="show-on-mobile" style="display: none;"><a href="biography.php">About MJ</a></li>

                    <li class="hide-on-mobile"><a href="store.php">Books</a></li>

                    <li class="hide-on-mobile"><a href="contact.php">Contact Us</a></li>

                </ul>
            </nav>
        </div>
        <div class="header-marquee">
            <div class="header-marquee-inner">
                <div class="header-marquee-group">
                    <span>Published Author</span>
                    <span class="separator">•</span>
                    <span>Doctorate Researcher (Higher Education)</span>
                    <span class="separator">•</span>
                    <span>Financial Services Provider</span>
                    <span class="separator">•</span>
                    <span>Career Strategy Advisor (Consultant)</span>
                    <span class="separator">•</span>
                    <span>Community Builder</span>
                    <span class="separator">•</span>
                </div>
                <div class="header-marquee-group" aria-hidden="true">
                    <span>Published Author</span>
                    <span class="separator">•</span>
                    <span>Doctorate Researcher (Higher Education)</span>
                    <span class="separator">•</span>
                    <span>Financial Services Provider</span>
                    <span class="separator">•</span>
                    <span>Career Strategy Advisor (Consultant)</span>
                    <span class="separator">•</span>
                    <span>Community Builder</span>
                    <span class="separator">•</span>
                </div>
            </div>
        </div>
    </header>

    <script>
        const menuToggle = document.querySelector('.menu-toggle');
        const navLinks = document.querySelector('.nav-links');
        const header = document.querySelector('header');

        if (menuToggle) {
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

        // Smart Header (Hide on scroll down, show on scroll up) on Mobile
        let lastScrollY = window.scrollY;

        // Add CSS transition dynamically to header
        header.style.transition = 'transform 0.4s cubic-bezier(0.25, 1, 0.5, 1)';

        window.addEventListener('scroll', () => {
            if (window.innerWidth <= 768) {
                // Ignore scroll bouncing at the top
                if (window.scrollY <= 0) {
                    header.style.transform = 'translateY(0)';
                    return;
                }

                if (window.scrollY > lastScrollY && window.scrollY > 150) {
                    // Scrolling down - hide header (including marquee)
                    header.style.transform = 'translateY(-100%)';
                } else {
                    // Scrolling up - show header
                    header.style.transform = 'translateY(0)';
                }
            } else {
                header.style.transform = 'translateY(0)'; // Always visible on desktop
            }
            lastScrollY = window.scrollY;
        }, { passive: true });
    </script>