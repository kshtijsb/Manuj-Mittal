<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no, date=no, email=no, address=no">
    <title><?php echo $page_title ?? "Manuj Mittal | Storyteller"; ?></title>
    
    <!-- Primary Meta Tags -->
    <meta name="title" content="Manuj Mittal | Storyteller, Author & Leader">
    <meta name="description" content="Explore the legacy of Manuj Mittal – Published Author, Doctorate Researcher, Financial Services Provider, and Global Community Leader.">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://manujmittal.com/">
    <meta property="og:title" content="Manuj Mittal | Storyteller, Author & Leader">
    <meta property="og:description" content="Explore the legacy of Manuj Mittal – Published Author, Doctorate Researcher, Financial Services Provider, and Global Community Leader.">
    <meta property="og:image" content="https://manujmittal.com/assets/author_main_web.jpg">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://manujmittal.com/">
    <meta property="twitter:title" content="Manuj Mittal | Storyteller, Author & Leader">
    <meta property="twitter:description" content="Explore the legacy of Manuj Mittal – Published Author, Doctorate Researcher, Financial Services Provider, and Global Community Leader.">
    <meta property="twitter:image" content="https://manujmittal.com/assets/author_main_web.jpg">

    <!-- Google Analytics 4 (Placeholder) -->
    <!-- TODO: Replace 'G-XXXXXXXXXX' with your actual GA4 Measurement ID -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-XXXXXXXXXX"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-XXXXXXXXXX');
    </script>

    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml"
        href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Crect width='100' height='100' rx='20' fill='%23000000'/%3E%3Ctext x='50%25' y='65%25' font-family='Cormorant Garamond, Georgia, serif' font-size='52' font-weight='bold' fill='%23c5a059' text-anchor='middle'%3EMJ%3C/text%3E%3C/svg%3E">
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
        style="position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; background: #000; z-index: 999999; display: flex; align-items: center; justify-content: center; transition: opacity 0.8s cubic-bezier(0.19, 1, 0.22, 1), visibility 0.8s; visibility: visible; opacity: 1;">
        <img src="assets/mnanuj%20mittal%20logo.jpg?v=<?php echo time(); ?>" alt="Manuj Mittal Logo"
            style="width: 500px; max-width: 90vw; height: auto; opacity: 0; transform: scale(0.9); animation: mmLogoFade 1.5s cubic-bezier(0.19, 1, 0.22, 1) forwards;">
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



    <header>
        <div class="container">
            <nav>
                <a href="index.php" class="logo" style="text-decoration: none; transition: none; pointer-events: auto;">MANUJ MITTAL</a>
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
                        <a href="index#about" class="dropdown-trigger">About <span style="font-family: 'Times New Roman', Times, serif; font-size: 1.2em;">MJ</span> <svg class="dropdown-arrow"
                                width="10" height="6" viewBox="0 0 10 6" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <path d="M1 1l4 4 4-4" />
                            </svg></a>
                        <ul class="nav-dropdown">
                            <li><a href="education.php">Educational Background</a></li>
                            <li><a href="professional.php">Professional Career</a></li>
                            <li><a href="social-responsibility.php">Social Responsibility</a></li>
                        </ul>
                    </li>

                    <li class="show-on-mobile" style="display: none;"><a href="biography.php">About <span style="font-family: 'Times New Roman', Times, serif; font-size: 1.2em;">MJ</span></a></li>

                    <li class="hide-on-mobile"><a href="store.php">Books</a></li>

                    <li class="hide-on-mobile"><a href="contact.php">Contact Us</a></li>

                    <li class="nav-social-icons"
                        style="display: flex; gap: 15px; align-items: center; margin-left: 15px;">
                        <style>
                            .nav-social-glow {
                                color: var(--gold);
                                display: flex;
                                align-items: center;
                                text-decoration: none !important;
                            }

                            .nav-links .nav-social-glow::after {
                                display: none !important;
                            }

                            .nav-social-glow svg {
                                transition: all 0.3s ease;
                            }

                            .nav-social-glow:hover svg {
                                filter: drop-shadow(0 0 10px rgba(197, 160, 89, 0.9));
                                transform: scale(1.15);
                            }
                        </style>
                        <a href="https://www.linkedin.com/in/manujmittal?utm_source=share_via&utm_content=profile&utm_medium=member_ios"
                            target="_blank" aria-label="LinkedIn" class="nav-social-glow">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-3.5 15.5H6.38V9.82h2.12v7.68zm-1.06-8.73h-.01c-.71 0-1.17-.49-1.17-1.1 0-.62.48-1.1 1.2-1.1.72 0 1.17.48 1.18 1.1 0 .61-.47 1.1-1.2 1.1zm9.44 8.73h-2.12v-4.11c0-1.03-.37-1.74-1.29-1.74-.71 0-1.13.48-1.32.94-.07.17-.09.41-.09.66v4.25h-2.12s.03-6.96 0-7.68h2.12v1.09c.28-.43.78-1.04 1.89-1.04 1.38 0 2.42.91 2.42 2.85v4.78z" />
                            </svg>
                        </a>
                        <a href="https://www.instagram.com/manuj523?igsh=Z3BtcTRhZDJvbXlx" target="_blank"
                            aria-label="Instagram" class="nav-social-glow">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm4.32 14.5c0 .66-.54 1.2-1.2 1.2H8.88c-.66 0-1.2-.54-1.2-1.2V9.5c0-.66.54-1.2 1.2-1.2h7.24c.66 0 1.2.54 1.2 1.2v7zM12 10.3c-1.49 0-2.7 1.21-2.7 2.7s1.21 2.7 2.7 2.7 2.7-1.21 2.7-2.7-1.21-2.7-2.7-2.7zm0 4.2c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zm2.8-3.7c-.33 0-.6-.27-.6-.6s.27-.6.6-.6.6.27.6.6-.27.6-.6.6z" />
                            </svg>
                        </a>
                    </li>
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