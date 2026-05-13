<?php
require_once 'includes/data.php';
$page_title = "Manuj Mittal | Narrative Architect";
include 'components/header.php';

// Check for subscriber status
$status = $_GET['status'] ?? null;
?>

<style>
    /* Split Hero Redesign */
    .hero {
        min-height: 100vh;
        padding: 0;
        display: flex;
        align-items: stretch;
        overflow: hidden;
    }

    .hero-split {
        display: grid;
        grid-template-columns: 1fr 1fr;
        width: 100%;
        min-height: 100vh;
    }

    .side {
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: 10% 8%;
        position: relative;
        transition: all 0.8s cubic-bezier(0.19, 1, 0.22, 1);
    }

    .book-side {
        background: var(--color-surface);
        border-right: 1px solid rgba(0, 0, 0, 0.05);
        z-index: 2;
    }

    .author-side {
        background: #fff;
        z-index: 1;
    }

    .book-visual {
        position: relative;
        margin-bottom: 3rem;
        transform: perspective(1000px);
        transition: transform 0.8s cubic-bezier(0.19, 1, 0.22, 1);
    }

    .book-visual:hover {
        transform: translateY(-5px);
    }

    .hero-book-img {
        width: 300px;
        height: auto;
        border-radius: 5px;
        box-shadow: 0 30px 60px rgba(0, 0, 0, 0.1);
    }

    .author-visual {
        position: absolute;
        bottom: 0;
        right: 0;
        width: 80%;
        opacity: 0.15;
        pointer-events: none;
        mask-image: linear-gradient(to top, black 50%, transparent 100%);
    }

    .hero-author-img {
        width: 100%;
        height: auto;
        object-fit: contain;
    }

    .side-tag {
        font-size: 0.7rem;
        font-weight: 800;
        color: var(--color-gold);
        letter-spacing: 3px;
        margin-bottom: 1.5rem;
        text-transform: uppercase;
    }

    .side h1,
    .side h2 {
        font-size: clamp(2.5rem, 5vw, 4.5rem);
        margin-bottom: 1.5rem;
        line-height: 1.1;
    }

    .side p {
        font-size: 1.1rem;
        color: var(--color-text-muted);
        max-width: 450px;
        margin-bottom: 2.5rem;
    }

    .floating-accent {
        position: absolute;
        font-size: 12rem;
        font-weight: 900;
        color: rgba(0, 0, 0, 0.03);
        z-index: -1;
        pointer-events: none;
        font-family: var(--font-serif);
    }

    .book-side .floating-accent {
        top: 10%;
        left: -5%;
    }

    .author-side .floating-accent {
        bottom: 10%;
        right: -5%;
    }

    /* Pillars Section */
    .about-pillars {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2rem;
        margin: 8vh 0;
    }

    .pillar-card {
        background: white;
        padding: 3rem;
        border-radius: 20px;
        transition: var(--transition-smooth);
        border: 1px solid transparent;
        background-image: linear-gradient(white, white), linear-gradient(to right, var(--color-primary), var(--color-gold));
        background-origin: border-box;
        background-clip: padding-box, border-box;
    }

    .pillar-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 30px 60px rgba(0, 0, 0, 0.03);
    }

    .pillar-tag {
        font-size: 0.6rem;
        font-weight: 800;
        color: var(--color-gold);
        letter-spacing: 2px;
        text-transform: uppercase;
        margin-bottom: 1.5rem;
    }

    .pillar-card h3 {
        font-size: 2rem;
        margin-bottom: 1rem;
        color: var(--color-primary);
    }

    .pillar-card p {
        font-size: 1rem;
        color: var(--color-text-muted);
        font-weight: 300;
    }

    .journey-section {
        padding: 15vh 0;
        position: relative;
    }

    .journey-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 8rem;
        align-items: start;
    }

    .artifact-viewer {
        position: sticky;
        top: 150px;
        height: 60vh;
        display: flex;
        align-items: center;
        justify-content: center;
        perspective: 1000px;
    }

    .artifact-stack {
        width: 100%;
        height: 100%;
        position: relative;
    }

    .artifact-image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 10px;
        opacity: 0;
        transform: translateZ(-100px);
        transition: all 1s cubic-bezier(0.19, 1, 0.22, 1);
    }

    .artifact-image.active {
        opacity: 1;
        transform: translateZ(0);
    }

    .journey-timeline {
        position: relative;
        padding-left: 4rem;
    }

    .ink-trail {
        position: absolute;
        left: 0;
        top: 0;
        width: 2px;
        height: 100%;
        background: rgba(0, 0, 0, 0.05);
    }

    .ink-progress {
        position: absolute;
        left: 0;
        top: 0;
        width: 3px;
        height: 0%;
        background: var(--color-gold);
        transition: height 0.5s ease-out;
    }

    .milestone {
        margin-bottom: 30vh;
        position: relative;
    }

    .milestone-year {
        font-size: 1rem;
        font-weight: 800;
        color: var(--color-gold);
        letter-spacing: 4px;
        margin-bottom: 1.5rem;
    }

    .books-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 5rem;
        padding-top: 10vh;
    }

    .book-card {
        position: relative;
        perspective: 1000px;
        width: 100%;
        aspect-ratio: 3/4.5;
    }

    .book-inner {
        position: relative;
        width: 100%;
        height: 100%;
        transition: transform 0.1s ease-out;
        transform-style: preserve-3d;
    }

    .book-info-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        padding: 2rem;
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(20px);
        transform: translateY(20px);
        opacity: 0;
        transition: 0.6s;
        border-radius: 0 0 5px 5px;
    }

    .book-card:hover .book-info-overlay {
        opacity: 1;
        transform: translateY(0);
    }

    /* Custom Alert */
    .status-alert {
        padding: 1.5rem;
        border-radius: 5px;
        margin-bottom: 2rem;
        font-weight: 800;
        letter-spacing: 1px;
        font-size: 0.8rem;
        text-transform: uppercase;
    }

    .alert-success {
        background: rgba(197, 160, 89, 0.1);
        color: var(--color-gold);
        border: 1px solid var(--color-gold);
    }

    .alert-error {
        background: rgba(255, 0, 0, 0.05);
        color: #cc0000;
        border: 1px solid #cc0000;
    }

    /* ===== SPLIT HERO ===== */
    .hero {
        width: 100%;
        min-height: 100vh;
    }
    .hero-split {
        display: grid;
        grid-template-columns: 1fr 1fr;
        min-height: 100vh;
    }
    .book-side {
        background: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 5rem 4rem;
    }
    .author-side {
        background: var(--bg);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 5rem 4rem;
    }

    /* Flip Card */
    .flip-card {
        width: 100%;
        max-width: 480px;
        height: 700px;
        perspective: 1200px;
        cursor: pointer;
    }
    .flip-card-inner {
        position: relative;
        width: 100%;
        height: 100%;
        transition: transform 0.75s ease;
        transform-style: preserve-3d;
    }
    .flip-card:hover .flip-card-inner {
        transform: rotateY(180deg);
    }
    .flip-card-front,
    .flip-card-back {
        position: absolute;
        inset: 0;
        backface-visibility: hidden;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 2.5rem;
        border-radius: 16px;
    }
    .flip-card-front {
        background: #fff;
        box-shadow: 0 20px 60px rgba(0,0,0,0.08);
        border: 1px solid rgba(0,0,0,0.06);
    }
    .book-side .flip-card-front { background: #fff; }
    .author-side .flip-card-front { background: #fff; }
    .flip-card-back {
        background: #fff;
        transform: rotateY(180deg);
        box-shadow: 0 20px 60px rgba(0,0,0,0.08);
        border: 2px solid var(--color-gold);
    }

    .author-simple-stats { 
        display: flex; justify-content: center; gap: 2.5rem; margin-top: 2rem;
        padding-top: 2rem; border-top: 1px solid rgba(0,0,0,0.07); width: 100%;
    }
    .author-actions { display: flex; justify-content: center; gap: 2rem; align-items: center; width: 100%; }

    .about-pillars { display: grid; grid-template-columns: repeat(3, 1fr); gap: 3rem; margin-top: 5rem; }
    .pillar-card { padding: 3rem; background: #fff; box-shadow: 0 10px 30px rgba(0,0,0,0.05); transition: var(--transition); border-top: 6px solid; }

    .journey-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 8rem; align-items: start; }
    .contact-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 8rem; align-items: start; }
    .stats-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 4rem; }

    @media (max-width: 992px) {
        .hero { height: auto !important; min-height: auto; padding: 0; display: block; }
        .hero-split { display: none !important; }
        .side { padding: 4rem 1.5rem !important; width: 100% !important; text-align: center; }
        .author-side { padding: 5rem 1.5rem !important; }
        .floating-accent { display: none !important; }
        
        .author-simple-stats { flex-direction: column; gap: 1.5rem; }
        .author-actions { flex-direction: column; gap: 1.5rem; }
        .author-actions .btn { width: 100%; text-align: center; }

        .about-pillars, .journey-grid, .contact-grid, .stats-grid { 
            grid-template-columns: 1fr !important; 
            gap: 2.5rem !important; 
            width: 100% !important;
        }
        .pillar-card { padding: 2rem 1.5rem !important; }
        
        #about, #journey, #contact, .stats-section { padding: 4rem 0 !important; }
        .side-tag { text-align: center; margin: 0 auto 2rem auto; }
        h1 { font-size: 3rem !important; text-align: center; }
        h2 { font-size: 2.2rem !important; text-align: center; }
        
        .book-main-visual { width: 220px !important; margin: 0 auto; }
        .book-hero-info { text-align: center !important; max-height: none !important; opacity: 1 !important; margin-top: 2rem; pointer-events: auto !important; }
        .author-content-simple { max-height: none !important; opacity: 1 !important; margin-top: 2rem; pointer-events: auto !important; }
        .book-hero-info div { flex-direction: column !important; gap: 1rem !important; }
        .book-hero-info .btn { width: 100%; }
        
        .artifact-viewer { position: relative; top: 0; height: auto; margin-bottom: 2rem; overflow: hidden; }
        .artifact-stack { height: 35vh !important; }
        .journey-timeline { padding-left: 1.5rem !important; border-left: 1px solid #eee !important; text-align: left; }
        .milestone { margin-bottom: 4rem !important; }
        .contact-form-container { padding: 2.5rem 1.5rem !important; margin-top: 3rem; }
    }

    @keyframes slideInUp {
        from {
            transform: translateY(50px);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .animate-up {
        animation: slideInUp 1s cubic-bezier(0.19, 1, 0.22, 1) forwards;
    }
</style>

<main>
    <!-- Split Hero Section -->
    <section id="home" class="hero">
        <div class="hero-split">

            <!-- LEFT: Book Side -->
            <div class="book-side">
                <div class="flip-card">
                    <div class="flip-card-inner">

                        <!-- FRONT: Book cover + title + order -->
                        <div class="flip-card-front">
                            <div class="side-tag" style="margin-bottom: 1.5rem;">FEATURED WORK</div>
                            <div style="width: 260px; border-radius: 6px; overflow: hidden; box-shadow: 0 25px 50px rgba(0,0,0,0.15); margin-bottom: 2rem; animation: breathe 4s ease-in-out infinite;">
                                <img src="book cover.jpeg" alt="<?php echo $books[0]['title']; ?>" style="width: 100%; height: auto; display: block;">
                            </div>
                            <h2 style="font-size: 2rem; font-family: var(--font-serif); margin-bottom: 2rem; color: #111;"><?php echo $books[0]['title']; ?></h2>
                            <a href="store.php" style="background: #000; color: #fff; padding: 1rem 2.5rem; text-decoration: none; font-size: 0.8rem; letter-spacing: 3px; font-weight: 700; display: inline-block;">PRE-ORDER NOW</a>
                            <p style="margin-top: 2rem; font-size: 0.65rem; letter-spacing: 3px; color: #bbb;">HOVER TO READ MORE</p>
                        </div>

                        <!-- BACK: Synopsis + Peek Inside -->
                        <div class="flip-card-back">
                            <div class="side-tag" style="margin-bottom: 1.5rem; color: var(--color-gold);">SYNOPSIS</div>
                            <p style="font-size: 1rem; line-height: 1.8; color: #555; margin-bottom: 2.5rem;">A book on upskilling personal life management, featuring thought-provoking quotations that address four core pillars essential for success: <strong>Vision</strong>, <strong>Leadership</strong>, <strong>Growth</strong>, and <strong>Integrity</strong>.</p>
                            <button onclick="openFlipbook()" style="background: none; border: 1px solid var(--color-gold); color: var(--color-gold); padding: 1rem 2rem; cursor: pointer; font-size: 0.75rem; letter-spacing: 2px; font-weight: 700;">PEEK INSIDE →</button>
                        </div>

                    </div>
                </div>
            </div>

            <!-- RIGHT: Author Side -->
            <div class="author-side">
                <div class="flip-card">
                    <div class="flip-card-inner">

                        <!-- FRONT: Photo + name + stats -->
                        <div class="flip-card-front">
                            <div class="side-tag" style="margin-bottom: 1.5rem;">THE AUTHOR</div>
                            <div style="width: 240px; height: 310px; border-radius: 10px; overflow: hidden; box-shadow: 0 20px 50px rgba(0,0,0,0.1); margin-bottom: 2rem;">
                                <img src="assets/author.png" alt="Manuj Mittal" style="width: 100%; height: 100%; object-fit: cover; object-position: top center;">
                            </div>
                            <h1 style="font-size: 2.4rem; font-family: var(--font-serif); color: #111; margin-bottom: 0.5rem;">Manuj Mittal</h1>
                            <div class="author-simple-stats">
                                <div class="stat">
                                    <h4 style="font-size: 0.6rem; color: var(--color-gold); letter-spacing: 3px; text-transform: uppercase; margin-bottom: 0.4rem;">Expertise</h4>
                                    <p style="font-size: 0.9rem; font-weight: 800; color: #000;">Finance & Strategy</p>
                                </div>
                                <div class="stat">
                                    <h4 style="font-size: 0.6rem; color: var(--color-gold); letter-spacing: 3px; text-transform: uppercase; margin-bottom: 0.4rem;">Academic</h4>
                                    <p style="font-size: 0.9rem; font-weight: 800; color: #000;">MBA | Ed.D</p>
                                </div>
                            </div>
                            <p style="margin-top: 2rem; font-size: 0.65rem; letter-spacing: 3px; color: #bbb;">HOVER TO DISCOVER</p>
                        </div>

                        <!-- BACK: Bio + biography link -->
                        <div class="flip-card-back">
                            <div class="side-tag" style="margin-bottom: 1.5rem; color: var(--color-gold);">THE NARRATIVE</div>
                            <p style="font-size: 1rem; line-height: 1.8; color: #555; margin-bottom: 2.5rem;">Manuj Mittal (MJ) is a writer and youth leader dedicated to advancing youth development through modern management thinking. He distills complex challenges into thought-provoking narratives.</p>
                            <a href="biography.php" style="background: #000; color: #fff; padding: 1rem 2.5rem; text-decoration: none; font-size: 0.8rem; letter-spacing: 3px; font-weight: 700; display: inline-block;">FULL BIOGRAPHY</a>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <!-- Flipbook Viewer Overlay -->
        <div id="inlineFlipbook" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(255,255,255,0.98); z-index: 10000; flex-direction: column; align-items: center; justify-content: center; gap: 3rem;">
            <div style="perspective: 2000px; width: 100%; max-width: 600px; height: 400px; position: relative;">
                <div id="mainBook" style="width: 50%; height: 100%; position: absolute; left: 50%; transform-style: preserve-3d; transition: transform 1.2s ease; transform: translateZ(0);">
                    <div style="position: absolute; width: 100%; height: 100%; background: #002244; border-radius: 0 5px 5px 0; z-index: 1; left: 0;"></div>
                    <div class="page-leaf" id="leaf3" style="position: absolute; width: 100%; height: 100%; left: 0; transform-origin: left center; transform-style: preserve-3d; transition: transform 1.2s ease; z-index: 3;">
                        <div style="position: absolute; width: 100%; height: 100%; background: #fdfdfd; backface-visibility: hidden; padding: 1.5rem; border-left: 1px solid #eee; border-radius: 0 5px 5px 0;">
                            <h4 style="font-family: var(--font-serif); font-size: 1.1rem; margin-bottom: 0.5rem;">Mastery</h4>
                            <p style="font-family: var(--font-serif); line-height: 1.5; color: #333; font-size: 0.85rem;">"The transition from student to architect is silent. It happens when you ask: What will I leave behind?"</p>
                        </div>
                        <div style="position: absolute; width: 100%; height: 100%; background: #fdfdfd; transform: rotateY(180deg); backface-visibility: hidden; padding: 1.5rem;">
                            <p style="font-family: var(--font-serif); line-height: 1.5; color: #333; font-size: 0.85rem;">"Each building is just a page, each city a book, and each life... a grand library."</p>
                        </div>
                    </div>
                    <div class="page-leaf" id="leaf2" style="position: absolute; width: 100%; height: 100%; left: 0; transform-origin: left center; transform-style: preserve-3d; transition: transform 1.2s ease; z-index: 4;">
                        <div style="position: absolute; width: 100%; height: 100%; background: #fdfdfd; backface-visibility: hidden; padding: 1.5rem;">
                            <h4 style="font-family: var(--font-serif); font-size: 1.1rem; margin-bottom: 0.5rem;">Foundation</h4>
                            <p style="font-family: var(--font-serif); line-height: 1.5; color: #333; font-size: 0.85rem;">"A foundation is the education of the heart and the discipline of the mind."</p>
                        </div>
                        <div style="position: absolute; width: 100%; height: 100%; background: #fdfdfd; transform: rotateY(180deg); backface-visibility: hidden; padding: 1.5rem;">
                            <p style="font-family: var(--font-serif); line-height: 1.5; color: #333; font-size: 0.85rem;">"In the silence of Mayo College, I heard the call of leadership. Not to command, but to serve."</p>
                        </div>
                    </div>
                    <div class="page-leaf" id="leaf1" style="position: absolute; width: 100%; height: 100%; left: 0; transform-origin: left center; transform-style: preserve-3d; transition: transform 1.2s ease; z-index: 5;">
                        <div style="position: absolute; width: 100%; height: 100%; background: #003366; backface-visibility: hidden; display: flex; align-items: center; justify-content: center; border-radius: 0 5px 5px 0;">
                            <div style="color: #fff; text-align: center; padding: 1rem; border: 1px solid var(--color-gold);">
                                <div style="font-size: 0.7rem; letter-spacing: 3px; margin-bottom: 0.5rem;">MANUJ MITTAL</div>
                                <div style="font-family: var(--font-serif); font-size: 1rem;"><?php echo $books[0]['title']; ?></div>
                            </div>
                        </div>
                        <div style="position: absolute; width: 100%; height: 100%; background: #fdfdfd; transform: rotateY(180deg); backface-visibility: hidden; padding: 1.5rem;">
                            <h4 style="font-family: var(--font-serif); font-size: 1.1rem; margin-bottom: 0.5rem;">Blueprint</h4>
                            <p style="font-family: var(--font-serif); line-height: 1.5; color: #333; font-size: 0.85rem;">"Architecture is the art of how we waste space. Every arch tells a secret..."</p>
                        </div>
                    </div>
                </div>
            </div>
            <div style="display: flex; gap: 1rem;">
                <button onclick="prevPage()" id="prevBtn" style="background: none; border: 1px solid #ddd; color: #333; padding: 0.8rem 1.5rem; cursor: pointer; font-size: 0.8rem; letter-spacing: 1px;">PREV</button>
                <button onclick="nextPage()" id="nextBtn" style="background: #000; border: none; color: #fff; padding: 0.8rem 1.5rem; cursor: pointer; font-size: 0.8rem; letter-spacing: 1px;">NEXT</button>
                <button onclick="closeFlipbook()" style="background: none; border: none; color: #999; padding: 0.8rem 1.5rem; cursor: pointer; font-size: 0.8rem; letter-spacing: 1px;">CLOSE x</button>
            </div>
        </div>

        <script>
            let currentPage = 1;
            const totalPages = 3;
            function openFlipbook() {
                document.getElementById('inlineFlipbook').style.display = 'flex';
                updateControls();
            }
            function closeFlipbook() {
                document.getElementById('inlineFlipbook').style.display = 'none';
                for(let i = 1; i <= totalPages; i++) {
                    document.getElementById('leaf' + i).style.transform = 'rotateY(0deg)';
                    document.getElementById('leaf' + i).style.zIndex = (totalPages - i + 3);
                }
                currentPage = 1;
            }
            function nextPage() {
                if (currentPage <= totalPages) {
                    document.getElementById('leaf' + currentPage).style.transform = 'rotateY(-180deg)';
                    document.getElementById('leaf' + currentPage).style.zIndex = currentPage + 3;
                    currentPage++;
                    updateControls();
                }
            }
            function prevPage() {
                if (currentPage > 1) {
                    currentPage--;
                    document.getElementById('leaf' + currentPage).style.transform = 'rotateY(0deg)';
                    document.getElementById('leaf' + currentPage).style.zIndex = (totalPages - currentPage + 3);
                    updateControls();
                }
            }
            function updateControls() {
                document.getElementById('prevBtn').style.opacity = currentPage === 1 ? '0.3' : '1';
                document.getElementById('nextBtn').style.opacity = currentPage > totalPages ? '0.3' : '1';
            }
        </script>

        <!-- Mobile Hero -->
        <div class="hero-mobile" onclick="this.classList.toggle('revealed')">
            <style>
                .hero-mobile { display: none; }
                @media (max-width: 992px) {
                    .hero-mobile { display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 6rem 1.5rem 4rem; text-align: center; width: 100%; min-height: 100vh; background: var(--bg); }
                    .hero-mobile .author-portrait { width: 150px; height: 180px; border-radius: 8px; overflow: hidden; border: 1px solid rgba(0,0,0,0.05); box-shadow: 0 10px 30px rgba(0,0,0,0.1); margin-bottom: 1.5rem; }
                    .hero-mobile h1 { font-size: 3.2rem !important; line-height: 1.1; margin-bottom: 0.5rem; color: #000; font-family: var(--font-serif); }
                    .hero-mobile p { font-size: 1rem; color: #555; margin-bottom: 3rem; max-width: 90%; }
                    .hero-mobile .book-cover { width: 200px; box-shadow: 0 20px 40px rgba(0,0,0,0.15); border-radius: 4px; margin-bottom: 2rem; }
                    .hero-mobile .actions { display: flex; flex-direction: column; gap: 1rem; width: 100%; max-width: 300px; }
                    .hero-mobile .btn { width: 100%; text-align: center; padding: 1.2rem; }
                    .hero-mobile h1, .hero-mobile p, .hero-mobile .actions { max-height: 0; opacity: 0; overflow: hidden; transition: all 0.8s ease; }
                    .hero-mobile.revealed h1, .hero-mobile.revealed p, .hero-mobile.revealed .actions { max-height: 500px; opacity: 1; margin-top: 1rem; }
                }
            </style>

            <div class="author-portrait">
                <img src="assets/author.png" alt="Manuj Mittal" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            
            <h1>Manuj Mittal</h1>
            <p>Writer, youth leader, and visionary distilling complex challenges into thought-provoking narratives.</p>
            
            <img src="book cover.jpeg" alt="<?php echo $books[0]['title']; ?>" class="book-cover">
            
            <div class="actions">
                <a href="store.php" class="btn btn-primary" style="background: #000; color: #fff; font-size: 0.9rem; letter-spacing: 2px; text-decoration: none;">PRE-ORDER NOW</a>
                <a href="biography.php" class="btn" style="background: transparent; color: #000; border: 1px solid var(--gold); font-size: 0.9rem; letter-spacing: 2px; text-decoration: none;">FULL BIOGRAPHY</a>
            </div>
        </div>
    </section>

    <!-- About Pillars Section (Color Coded) -->
    <section id="about" class="container" style="padding-top: 15vh;">
        <div class="section-header reveal">
            <h2 style="font-size: 3.5rem; margin-bottom: 2rem;">Foundation of<br>the Visionary.</h2>
        </div>

        <div class="about-pillars">
            <!-- Education: Blue -->
            <div class="pillar-card reveal pillar-edu" style="border-top: 6px solid #0047AB;">
                <div class="pillar-tag" style="color: #0047AB; font-weight: 800; letter-spacing: 3px; font-size: 0.65rem; margin-bottom: 1.5rem; text-transform: uppercase;">Education</div>
                <h3 style="font-size: 1.8rem; margin-bottom: 1.5rem;">Academic Excellence</h3>
                <p style="color: #666; font-size: 0.95rem; line-height: 1.8;">Alumnus of Mayo College, holding a Master's in Finance and an MBA from Simon Business School. Currently pursuing a Doctor of Education (Ed.D.) at the University of Rochester.</p>
            </div>

            <!-- Profession: Red -->
            <div class="pillar-card reveal pillar-prof" style="border-top: 6px solid #C41E3A;">
                <div class="pillar-tag" style="color: #C41E3A; font-weight: 800; letter-spacing: 3px; font-size: 0.65rem; margin-bottom: 1.5rem; text-transform: uppercase;">Professional</div>
                <h3 style="font-size: 1.8rem; margin-bottom: 1.5rem;">Strategic Leadership</h3>
                <p style="color: #666; font-size: 0.95rem; line-height: 1.8;">Expertise in finance, operations, and organizational strategy. Specializing in distilling complex management challenges into actionable narratives.</p>
            </div>

            <!-- Social Responsibility: Green -->
            <div class="pillar-card reveal pillar-social" style="border-top: 6px solid var(--green);">
                <div class="pillar-tag" style="color: var(--green); font-weight: 800; letter-spacing: 3px; font-size: 0.65rem; margin-bottom: 1.5rem; text-transform: uppercase;">Social Responsibility</div>
                <h3 style="font-size: 1.8rem; margin-bottom: 1.5rem;">Global Impact</h3>
                <p style="color: #666; font-size: 0.95rem; line-height: 1.8;">Dedicated to empowering the next generation of leaders through modern management thinking and thought-provoking storytelling.</p>
            </div>
        </div>

        <style>
            .pillar-edu:hover { box-shadow: 0 30px 60px rgba(0, 71, 171, 0.1); transform: translateY(-10px); }
            .pillar-prof:hover { box-shadow: 0 30px 60px rgba(196, 30, 58, 0.1); transform: translateY(-10px); }
            .pillar-social:hover { box-shadow: 0 30px 60px rgba(46, 139, 87, 0.1); transform: translateY(-10px); }
        </style>
    </section>

    <!-- Journey Section (Synced Timeline + Photo Stack) -->
    <section id="journey" class="journey-section container" style="padding: 15vh 0;">
        <div class="section-header reveal" style="margin-bottom: 8rem;">
            <div class="side-tag" style="color: var(--gold); letter-spacing: 5px; margin-bottom: 2rem; display: block;">THE EVOLUTION</div>
            <h2 style="font-size: clamp(3.5rem, 6vw, 5rem); line-height: 1; color: #000;">A Legacy in<br>the Making.</h2>
        </div>

        <div class="journey-grid">
            
            <!-- Left: Artifact Viewer (Photo Stack) -->
            <div class="artifact-viewer" style="position: sticky; top: 15vh;">
                <div class="artifact-stack" style="position: relative; height: 600px; width: 100%; border-radius: 10px; overflow: hidden; box-shadow: 0 40px 100px rgba(0,0,0,0.1);">
                    <!-- Education Images (Blue) -->
                    <img src="https://images.unsplash.com/photo-1523050335102-c32509142270?auto=format&fit=crop&q=80&w=1000" 
                         alt="Foundation" class="artifact-image active" data-phase="foundation" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; opacity: 0; transition: opacity 0.8s ease;">
                    
                    <!-- Social Images (Green) -->
                    <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&q=80&w=1000" 
                         alt="Leadership" class="artifact-image" data-phase="leadership" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; opacity: 0; transition: opacity 0.8s ease;">
                    
                    <!-- Corporate Images (Red) -->
                    <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&q=80&w=1000" 
                         alt="Corporate" class="artifact-image" data-phase="corporate" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; opacity: 0; transition: opacity 0.8s ease;">
                    
                    <!-- Mastery/Future Images (Blue) -->
                    <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?auto=format&fit=crop&q=80&w=1000" 
                         alt="Vision" class="artifact-image" data-phase="vision" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; opacity: 0; transition: opacity 0.8s ease;">

                    <style>
                        .artifact-image.active { opacity: 1 !important; }
                    </style>
                </div>
            </div>

            <!-- Right: Color-Coded Timeline -->
            <div class="journey-timeline" style="position: relative; padding-left: 4rem; border-left: 2px solid #eee;">
                
                <!-- Education Phase -->
                <div class="milestone-group" data-phase="foundation" style="margin-bottom: 10rem;">
                    <div class="milestone reveal" style="margin-bottom: 6rem; border-top: 4px solid #0047AB; padding-top: 2rem;">
                        <div class="m-year" style="color: #0047AB; font-weight: 800; letter-spacing: 2px; font-size: 0.75rem; margin-bottom: 1rem;">1996 - 2011 • FOUNDATION</div>
                        <h4 style="font-size: 1.8rem; margin-bottom: 1rem;">Early life and schooling</h4>
                        <p style="color: #666; line-height: 1.8;">Childhood in India (1996). Proud Mayo Heritage at Mayo College Boarding School (2008). Chess Champion & WazirChand Trophy winner (2011).</p>
                    </div>
                </div>

                <!-- Social Phase Part 1 -->
                <div class="milestone-group" data-phase="leadership" style="margin-bottom: 10rem;">
                    <div class="milestone reveal" style="margin-bottom: 6rem; border-top: 4px solid #2E8B57; padding-top: 2rem;">
                        <div class="m-year" style="color: #2E8B57; font-weight: 800; letter-spacing: 2px; font-size: 0.75rem; margin-bottom: 1rem;">2013 - 2017 • GLOBAL SERVICE</div>
                        <h4 style="font-size: 1.8rem; margin-bottom: 1rem;">Rise in Rotary International</h4>
                        <p style="color: #666; line-height: 1.8;">RYLA Participant (2013). Joined Rotaract (2014). Charter President (2015). District Rotaract Representative & RI Atlanta Convention (2017).</p>
                    </div>
                </div>

                <!-- Early Career Phase -->
                <div class="milestone-group" data-phase="corporate" style="margin-bottom: 10rem;">
                    <div class="milestone reveal" style="margin-bottom: 6rem; border-top: 4px solid #C41E3A; padding-top: 2rem;">
                        <div class="m-year" style="color: #C41E3A; font-weight: 800; letter-spacing: 2px; font-size: 0.75rem; margin-bottom: 1rem;">2015 • CAREER BEGINNINGS</div>
                        <h4 style="font-size: 1.8rem; margin-bottom: 1rem;">Early Professional Life</h4>
                        <p style="color: #666; line-height: 1.8;">Entered the workforce and began his professional journey, establishing the foundation of his career alongside his ongoing studies and service.</p>
                    </div>
                </div>

                <!-- Academic/Mastery Phase -->
                <div class="milestone-group" data-phase="vision" style="margin-bottom: 10rem;">
                    <div class="milestone reveal" style="margin-bottom: 6rem; border-top: 4px solid #0047AB; padding-top: 2rem;">
                        <div class="m-year" style="color: #0047AB; font-weight: 800; letter-spacing: 2px; font-size: 0.75rem; margin-bottom: 1rem;">2017 - 2021 • GLOBAL ACADEMICS</div>
                        <h4 style="font-size: 1.8rem; margin-bottom: 1rem;">Simon Business School & MBA</h4>
                        <p style="color: #666; line-height: 1.8;">B.Com (2017). Left India at age 23 (2019). MS Finance (2020). MBA Finance (2021) - Dean's List & Networking Coach.</p>
                    </div>
                </div>

                <!-- Social Phase Part 2 -->
                <div class="milestone-group" data-phase="leadership" style="margin-bottom: 10rem;">
                    <div class="milestone reveal" style="margin-bottom: 6rem; border-top: 4px solid #2E8B57; padding-top: 2rem;">
                        <div class="m-year" style="color: #2E8B57; font-weight: 800; letter-spacing: 2px; font-size: 0.75rem; margin-bottom: 1rem;">2018 - 2020 • LEADERSHIP IMPACT</div>
                        <h4 style="font-size: 1.8rem; margin-bottom: 1rem;">President, Rotaract South Asia</h4>
                        <p style="color: #666; line-height: 1.8;">RI Toronto (2018). RI Hamburg & 'Best DRR' Award (2019). Led 200,000+ members across 8 countries. Chairman, Rotasia Delhi 2020.</p>
                    </div>
                </div>

                <!-- Corporate Phase -->
                <div class="milestone-group" data-phase="corporate" style="margin-bottom: 10rem;">
                    <div class="milestone reveal" style="margin-bottom: 6rem; border-top: 4px solid #C41E3A; padding-top: 2rem;">
                        <div class="m-year" style="color: #C41E3A; font-weight: 800; letter-spacing: 2px; font-size: 0.75rem; margin-bottom: 1rem;">2021 ONWARD • STRATEGY</div>
                        <h4 style="font-size: 1.8rem; margin-bottom: 1rem;">Professional Excellence</h4>
                        <p style="color: #666; line-height: 1.8;">Experience at Grant Thornton, Morgan Stanley (Manhattan), and Boutique M&A firms in NY. Career Advisor & AD at University of Rochester.</p>
                    </div>
                </div>

                <!-- Future Phase -->
                <div class="milestone-group" data-phase="vision" style="margin-bottom: 10rem;">
                    <div class="milestone reveal" style="margin-bottom: 6rem; border-top: 4px solid #0047AB; padding-top: 2rem;">
                        <div class="m-year" style="color: #0047AB; font-weight: 800; letter-spacing: 2px; font-size: 0.75rem; margin-bottom: 1rem;">2027 • THE DOCTORAL VISION</div>
                        <h4 style="font-size: 1.8rem; margin-bottom: 1rem;">Education 2.0 & Beyond</h4>
                        <p style="color: #666; line-height: 1.8;">Pursuing Ed.D. Award: Education 2.0 (Las Vegas). Co-Chair: HE Students Association. Alumni of Simon & Mayo College.</p>
                    </div>
                </div>

            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const milestones = document.querySelectorAll('.milestone');
                const images = document.querySelectorAll('.artifact-image');
                
                const syncImages = () => {
                    let activePhase = 'foundation';
                    milestones.forEach(m => {
                        const rect = m.getBoundingClientRect();
                        if (rect.top < window.innerHeight * 0.6) {
                            activePhase = m.closest('.milestone-group').dataset.phase;
                        }
                    });
                    
                    images.forEach(img => {
                        if (img.dataset.phase === activePhase) {
                            img.classList.add('active');
                        } else {
                            img.classList.remove('active');
                        }
                    });
                };
                
                window.addEventListener('scroll', syncImages);
            });
        </script>
    </section>



    <!-- Contact Section -->
    <section id="contact" class="container reveal" style="padding: 15vh 0;">
        <div class="contact-grid">
            <!-- Left Side: Info -->
            <div class="contact-info">
                <div class="side-tag" style="color: var(--gold); font-weight: 800; letter-spacing: 8px; margin-bottom: 2rem; display: block;">GET IN TOUCH</div>
                <h2 style="font-size: clamp(3rem, 5vw, 5rem); line-height: 0.9; margin-bottom: 4rem; color: #000; letter-spacing: -3px;">Let's Write<br>the Next<br>Chapter.</h2>
                <div class="contact-details" style="margin-top: 6rem;">
                    <div class="contact-item" style="margin-bottom: 3rem;">
                        <h4 style="font-size: 0.7rem; color: var(--gold); letter-spacing: 3px; text-transform: uppercase; margin-bottom: 1rem;">Direct Correspondence</h4>
                        <a href="mailto:author@manujmittal.com" style="font-size: 1.5rem; color: #000; text-decoration: none; font-family: var(--font-serif); border-bottom: 1px solid #eee; padding-bottom: 5px;">author@manujmittal.com</a>
                    </div>
                </div>
            </div>
            <!-- Right Side: Form -->
            <div class="contact-form-container" style="background: #f9f9f9; padding: 5rem; border-radius: 10px; box-shadow: 0 40px 80px rgba(0,0,0,0.05); border-top: 6px solid var(--gold);">
                <?php if (isset($_GET['status']) && $_GET['status'] === 'success'): ?>
                    <div style="background: #d4edda; color: #155724; padding: 1.5rem; border-radius: 5px; margin-bottom: 2rem; font-weight: 600;">
                        Request sent successfully! We will get back to you soon.
                    </div>
                <?php endif; ?>

                <div class="contact-tabs" style="display: flex; gap: 2rem; margin-bottom: 3rem; border-bottom: 1px solid #ddd;">
                    <button class="tab-btn active" data-tab="message" style="background: none; border: none; padding: 1rem 0; font-weight: 800; letter-spacing: 2px; cursor: pointer; border-bottom: 2px solid var(--gold); color: #000; transition: 0.3s;">SEND MESSAGE</button>
                    <button class="tab-btn" data-tab="meeting" style="background: none; border: none; padding: 1rem 0; font-weight: 800; letter-spacing: 2px; cursor: pointer; border-bottom: 2px solid transparent; color: #999; transition: 0.3s;">REQUEST MEETING</button>
                </div>

                <!-- Message Form -->
                <div id="message-tab" class="tab-content active">
                    <form action="process-contact.php" method="POST" style="display: flex; flex-direction: column; gap: 2.5rem;">
                        <input type="hidden" name="type" value="Message">
                        <input type="text" name="name" placeholder="Full Name" style="padding: 1.2rem; border: none; border-bottom: 1px solid #ddd; background: transparent; font-size: 1.1rem; outline: none;" required>
                        <input type="email" name="email" placeholder="Email Address" style="padding: 1.2rem; border: none; border-bottom: 1px solid #ddd; background: transparent; font-size: 1.1rem; outline: none;" required>
                        <textarea name="message" rows="4" placeholder="Your Message" style="padding: 1.2rem; border: none; border-bottom: 1px solid #ddd; background: transparent; font-size: 1.1rem; outline: none; resize: none;" required></textarea>
                        <button type="submit" class="btn btn-primary" style="background: #000; color: #fff; border: none; padding: 1.5rem; font-weight: 800; letter-spacing: 2px; cursor: pointer; transition: 0.3s;">SEND MESSAGE</button>
                    </form>
                </div>

                <!-- Meeting Form -->
                <div id="meeting-tab" class="tab-content" style="display: none;">
                    <form action="process-contact.php" method="POST" style="display: flex; flex-direction: column; gap: 2rem;">
                        <input type="hidden" name="type" value="Meeting Request">
                        <input type="text" name="name" placeholder="Full Name" style="padding: 1.2rem; border: none; border-bottom: 1px solid #ddd; background: transparent; font-size: 1.1rem; outline: none;" required>
                        <input type="email" name="email" placeholder="Email Address" style="padding: 1.2rem; border: none; border-bottom: 1px solid #ddd; background: transparent; font-size: 1.1rem; outline: none;" required>
                        
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
                            <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                                <label style="font-size: 0.7rem; color: var(--gold); font-weight: 800; letter-spacing: 1px;">PREFERRED DATE</label>
                                <input type="date" name="meeting_date" style="padding: 1.2rem; border: none; border-bottom: 1px solid #ddd; background: transparent; font-size: 1.1rem; outline: none;" required>
                            </div>
                            <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                                <label style="font-size: 0.7rem; color: var(--gold); font-weight: 800; letter-spacing: 1px;">PREFERRED TIME</label>
                                <input type="time" name="meeting_time" style="padding: 1.2rem; border: none; border-bottom: 1px solid #ddd; background: transparent; font-size: 1.1rem; outline: none;" required>
                            </div>
                        </div>

                        <textarea name="message" rows="3" placeholder="What would you like to discuss?" style="padding: 1.2rem; border: none; border-bottom: 1px solid #ddd; background: transparent; font-size: 1.1rem; outline: none; resize: none;" required></textarea>
                        <button type="submit" class="btn btn-primary" style="background: var(--gold); color: #fff; border: none; padding: 1.5rem; font-weight: 800; letter-spacing: 2px; cursor: pointer; transition: 0.3s;">REQUEST MEETING</button>
                    </form>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', () => {
                        const tabs = document.querySelectorAll('.tab-btn');
                        const contents = document.querySelectorAll('.tab-content');

                        tabs.forEach(tab => {
                            tab.addEventListener('click', () => {
                                const target = tab.dataset.tab;
                                
                                tabs.forEach(t => {
                                    t.classList.remove('active');
                                    t.style.borderBottom = '2px solid transparent';
                                    t.style.color = '#999';
                                });
                                tab.classList.add('active');
                                tab.style.borderBottom = '2px solid var(--gold)';
                                tab.style.color = '#000';

                                contents.forEach(c => {
                                    c.style.display = 'none';
                                    if(c.id === target + '-tab') c.style.display = 'block';
                                });
                            });
                        });
                    });
                </script>
            </div>
        </div>
    <!-- Impact by the Numbers -->
    <section class="stats-section container" style="padding: 15vh 0; text-align: center; border-top: 1px solid var(--border);">
        <div class="stats-grid">
            <div class="stat-item reveal">
                <div class="stat-number" data-target="200000" style="font-size: 5rem; font-weight: 800; color: var(--gold); margin-bottom: 1rem;">0</div>
                <div class="stat-label" style="letter-spacing: 3px; font-size: 0.8rem; color: #999; text-transform: uppercase;">Global Members Led</div>
            </div>
            <div class="stat-item reveal">
                <div class="stat-number" data-target="8" style="font-size: 5rem; font-weight: 800; color: var(--gold); margin-bottom: 1rem;">0</div>
                <div class="stat-label" style="letter-spacing: 3px; font-size: 0.8rem; color: #999; text-transform: uppercase;">Countries Impacted</div>
            </div>
            <div class="stat-item reveal">
                <div class="stat-number" data-target="27" style="font-size: 5rem; font-weight: 800; color: var(--gold); margin-bottom: 1rem;">0</div>
                <div class="stat-label" style="letter-spacing: 3px; font-size: 0.8rem; color: #999; text-transform: uppercase;">Years of Evolution</div>
            </div>
        </div>
    </section>

    <!-- Visionary Quotes -->
    <section class="quotes-section" style="padding: 15vh 0; background: var(--surface); overflow: hidden;">
        <div class="container" style="text-align: center; max-width: 800px;">
            <div class="quote-slider">
                <div class="quote-slide active">
                    <p style="font-family: var(--font-serif); font-size: 2.5rem; font-style: italic; line-height: 1.4; margin-bottom: 3rem;">"Purpose defines strategy."</p>
                    <div class="quote-signature" style="font-family: 'Mrs Saint Delafield', cursive; font-size: 3rem; color: var(--gold);">Manuj Mittal</div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .stat-number.plus::after { content: '+'; }
    </style>
</main>

<script>
    // Page-specific scroll sync
    window.addEventListener('scroll', () => {
        const timeline = document.querySelector('.journey-timeline');
        if (timeline) {
            const rect = timeline.getBoundingClientRect();
            const progress = Math.max(0, Math.min(100, ((window.innerHeight / 2 - rect.top) / rect.height) * 100));
            const inkProgress = document.querySelector('.ink-progress');
            if (inkProgress) inkProgress.style.height = progress + '%';

            document.querySelectorAll('.milestone').forEach(m => {
                const mRect = m.getBoundingClientRect();
                if (mRect.top < window.innerHeight / 2 && mRect.bottom > window.innerHeight / 2) {
                    const year = m.getAttribute('data-year');
                    document.querySelectorAll('.artifact-image').forEach(img => {
                        img.classList.toggle('active', img.getAttribute('data-year') === year);
                    });
                }
            });
        }
    });
</script>

<?php include 'components/footer.php'; ?>