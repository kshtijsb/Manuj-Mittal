// --- 1. Initialize Lenis Smooth Scrolling ---
const lenis = new Lenis({
    duration: 1.2,
    easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)), // standard ease-out
    direction: 'vertical',
    gestureDirection: 'vertical',
    smooth: true,
    mouseMultiplier: 1,
    smoothTouch: false,
    touchMultiplier: 2,
    infinite: false,
})

function raf(time) {
    lenis.raf(time)
    requestAnimationFrame(raf)
}
requestAnimationFrame(raf)

// --- 2. GSAP ScrollTrigger Integration ---
gsap.registerPlugin(ScrollTrigger);

// Sync ScrollTrigger with Lenis
lenis.on('scroll', ScrollTrigger.update);
gsap.ticker.add((time) => { lenis.raf(time * 1000) });
gsap.ticker.lagSmoothing(0, 0);

// --- 3. Cinematic Typography (SplitType) & Reveal ---
document.addEventListener("DOMContentLoaded", () => {
    // Reveal simple fade-up elements
    gsap.utils.toArray('.fade-up').forEach(el => {
        gsap.to(el, {
            scrollTrigger: {
                trigger: el,
                start: "top 85%",
            },
            opacity: 1,
            y: 0,
            duration: 1,
            ease: "power3.out"
        });
    });

    // Split and animate H1 and H2
    const headings = document.querySelectorAll('h1:not(.no-split), h2:not(.no-split)');
    headings.forEach(heading => {
        // Only split if not already split
        if (!heading.classList.contains('split-processed')) {
            heading.classList.add('split-processed');
            const splitText = new SplitType(heading, { types: 'words, chars' });
            
            gsap.from(splitText.chars, {
                scrollTrigger: {
                    trigger: heading,
                    start: "top 90%",
                },
                opacity: 0,
                y: 20,
                rotationX: 90,
                stagger: 0.02,
                duration: 0.8,
                ease: "back.out(1.7)"
            });
        }
    });
});

// Smooth scroll for navigation links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const targetId = this.getAttribute('href');
        const targetElement = document.querySelector(targetId);
        
        if (targetElement) {
            window.scrollTo({
                top: targetElement.offsetTop - 80,
                behavior: 'smooth'
            });
        }
    });
});

// Header scroll effect
const header = document.querySelector('header');
window.addEventListener('scroll', () => {
    if (window.scrollY > 50) {
        header.classList.add('scrolled');
    } else {
        header.classList.remove('scrolled');
    }
});

// Mouse Parallax for Hero Section
const hero = document.querySelector('.hero');
if (hero) {
    hero.addEventListener('mousemove', (e) => {
        const { clientX, clientY } = e;
        const moveX = (clientX - window.innerWidth / 2) * 0.01;
        const moveY = (clientY - window.innerHeight / 2) * 0.01;
        
        const content = hero.querySelector('.hero-content');
        if (content) {
            content.style.transform = `translate(${moveX}px, ${moveY}px)`;
        }
    });
}

// Magnetic Buttons
const buttons = document.querySelectorAll('.btn');
buttons.forEach(btn => {
    btn.addEventListener('mousemove', (e) => {
        const position = btn.getBoundingClientRect();
        const x = e.pageX - position.left - position.width / 2;
        const y = e.pageY - position.top - position.height / 2;
        
        btn.style.transform = `translate(${x * 0.3}px, ${y * 0.5}px) scale(1.05)`;
    });
    
    btn.addEventListener('mouseout', () => {
        btn.style.transform = 'translate(0, 0) scale(1)';
    });
});



// Newsletter form handling
const newsletterForm = document.querySelector('.newsletter-form');
if (newsletterForm) {
    newsletterForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const email = newsletterForm.querySelector('input').value;
        const btn = newsletterForm.querySelector('button');
        
        btn.textContent = 'Awesome! 🚀';
        btn.style.background = '#fff';
        btn.style.color = '#000';
        
        setTimeout(() => {
            newsletterForm.reset();
            btn.textContent = 'Subscribe';
            btn.style.background = '';
            btn.style.color = '';
        }, 3000);
    });
}

// --- 4. Image Parallax & Cinematic Reveals ---
document.addEventListener("DOMContentLoaded", () => {
    // Elegant Image Reveal
    gsap.utils.toArray('img:not(.no-reveal)').forEach(img => {
        gsap.fromTo(img, 
            { clipPath: "polygon(0 0, 100% 0, 100% 0, 0 0)", filter: "grayscale(100%) blur(10px)", scale: 1.1 },
            { 
                clipPath: "polygon(0 0, 100% 0, 100% 100%, 0 100%)", 
                filter: "grayscale(0%) blur(0px)",
                scale: 1,
                duration: 1.5, 
                ease: "power4.inOut",
                scrollTrigger: {
                    trigger: img,
                    start: "top 85%"
                }
            }
        );
    });

    // Subtly Parallax Backgrounds/Elements
    gsap.utils.toArray('.parallax').forEach(elem => {
        gsap.to(elem, {
            yPercent: 20,
            ease: "none",
            scrollTrigger: {
                trigger: elem,
                start: "top bottom", 
                end: "bottom top",
                scrub: true
            }
        });
    });
});

console.log('Immersive Features Loaded! ✨');
