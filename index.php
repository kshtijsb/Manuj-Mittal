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
        background: transparent;
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
        height: 780px;
        /* Increased height to give breathing room */
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
        justify-content: flex-start;
        text-align: center;
        padding: 2.5rem;
        border-radius: 16px;
    }

    .flip-card-front {
        background: #fff;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.08);
        border: 1px solid rgba(0, 0, 0, 0.06);
    }

    /* Standardized Hero Images */
    .hero-image-box {
        width: 320px !important;
        height: 450px !important;
        border-radius: 12px;
        overflow: hidden;
        margin-bottom: 2rem;
        position: relative;
        flex-shrink: 0;
        /* Prevents shrinking if content exceeds card height */
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
    }

    .hero-image-box img {
        width: 100% !important;
        height: 100% !important;
        object-fit: cover !important;
    }

    .book-side .flip-card-front {
        background: #fff;
    }

    .author-side .flip-card-front {
        background: #fff;
    }

    .flip-card-back {
        background: #fff;
        transform: rotateY(180deg);
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.08);
        border: 2px solid var(--color-gold);
    }

    .author-simple-stats {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
        margin-top: 2rem;
        padding-top: 1.5rem;
        border-top: 1px solid rgba(0, 0, 0, 0.07);
        width: 100%;
    }

    .stat {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
    }

    .author-actions {
        display: flex;
        justify-content: center;
        gap: 2rem;
        align-items: center;
        width: 100%;
    }

    .about-pillars {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 3rem;
        margin-top: 5rem;
    }

    .pillar-card {
        padding: 3rem;
        background: #fff;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        transition: var(--transition);
        border-top: 6px solid;
    }

    .journey-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 8rem;
        align-items: start;
    }

    .contact-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 8rem;
        align-items: start;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 4rem;
    }

    @media (max-width: 992px) {
        .hero {
            height: auto !important;
            min-height: auto;
            padding: 0;
            display: block;
        }

        .hero-split {
            display: none !important;
        }

        .side {
            padding: 4rem 1.5rem !important;
            width: 100% !important;
            text-align: center;
        }

        .author-side {
            padding: 5rem 1.5rem !important;
        }

        .floating-accent {
            display: none !important;
        }

        .author-simple-stats {
            flex-direction: column;
            gap: 1.5rem;
        }

        .author-actions {
            flex-direction: column;
            gap: 1.5rem;
        }

        .author-actions .btn {
            width: 100%;
            text-align: center;
        }

        .about-pillars,
        .journey-grid,
        .contact-grid,
        .stats-grid {
            grid-template-columns: 1fr !important;
            gap: 2.5rem !important;
            width: 100% !important;
        }

        .pillar-card {
            padding: 2rem 1.5rem !important;
        }

        #about,
        #journey,
        #contact,
        .stats-section {
            padding: 4rem 0 !important;
        }

        .side-tag {
            text-align: center;
            margin: 0 auto 2rem auto;
        }

        h1 {
            font-size: 3rem !important;
            text-align: center;
        }

        h2 {
            font-size: 2.2rem !important;
            text-align: center;
        }

        .book-main-visual {
            width: 220px !important;
            margin: 0 auto;
        }

        .book-hero-info {
            text-align: center !important;
            max-height: none !important;
            opacity: 1 !important;
            margin-top: 2rem;
            pointer-events: auto !important;
        }

        .author-content-simple {
            max-height: none !important;
            opacity: 1 !important;
            margin-top: 2rem;
            pointer-events: auto !important;
        }

        .book-hero-info div {
            flex-direction: column !important;
            gap: 1rem !important;
        }

        .book-hero-info .btn {
            width: 100%;
        }

        .artifact-viewer {
            position: relative;
            top: 0;
            height: auto;
            margin-bottom: 2rem;
            overflow: hidden;
        }

        .artifact-stack {
            height: 35vh !important;
        }

        .journey-timeline {
            padding-left: 1.5rem !important;
            border-left: 1px solid #eee !important;
            text-align: left;
        }

        .milestone {
            margin-bottom: 4rem !important;
        }

        .contact-form-container {
            padding: 2.5rem 1.5rem !important;
            margin-top: 3rem;
        }
    }

    @keyframes shimmer {
        0% {
            background-position: -468px 0;
        }

        100% {
            background-position: 468px 0;
        }
    }

    .shimmer {
        position: relative;
        overflow: hidden;
    }

    .shimmer::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to right, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.2) 50%, rgba(255, 255, 255, 0) 100%);
        background-size: 468px 100%;
        animation: shimmer 2s infinite linear;
        z-index: 1;
        pointer-events: none;
    }

    @keyframes breathe {

        0%,
        100% {
            transform: scale(1);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        }

        50% {
            transform: scale(1.02);
            box-shadow: 0 35px 70px rgba(0, 0, 0, 0.2);
        }
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

                        <div class="flip-card-front">
                            <div class="side-tag" style="margin-bottom: 2rem;">FEATURED WORK</div>
                            <div class="hero-image-box" style="animation: breathe 4s ease-in-out infinite;">
                                <img src="book cover.jpeg" alt="<?php echo $books[0]['title']; ?>">
                            </div>
                            <h2
                                style="font-size: 2.2rem; font-family: var(--font-serif); margin-bottom: 0; color: #111; line-height: 1.1;">
                                <?php echo $books[0]['title']; ?>
                            </h2>
                            <p
                                style="margin-top: auto; font-size: 0.65rem; letter-spacing: 3px; color: #bbb; padding-top: 2rem;">
                                HOVER TO READ MORE</p>
                        </div>

                        <!-- BACK: Synopsis + Order Now -->
                        <div class="flip-card-back">
                            <div class="side-tag" style="margin-bottom: 1.5rem; color: var(--color-gold);">SYNOPSIS
                            </div>
                            <p style="font-size: 1rem; line-height: 1.8; color: #555; margin-bottom: 2.5rem;">A book on
                                upskilling personal life management, featuring thought-provoking quotations that address
                                four core pillars essential for success: <strong>Vision</strong>,
                                <strong>Leadership</strong>, <strong>Growth</strong>, and <strong>Integrity</strong>.
                            </p>
                            <a href="store.php"
                                style="background: #000; color: #fff; padding: 1rem 2.5rem; text-decoration: none; font-size: 0.8rem; letter-spacing: 3px; font-weight: 700; display: inline-block;">ORDER
                                NOW</a>
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
                            <div class="side-tag" style="margin-bottom: 2rem;">THE AUTHOR</div>
                            <div class="hero-image-box">
                                <img src="assets/author main.jpg" alt="Manuj Mittal" style="object-position: center;">
                            </div>
                            <h2
                                style="font-size: 2.2rem; font-family: var(--font-serif); color: #111; margin-bottom: 0; line-height: 1.1;">
                                Manuj Mittal</h2>

                            <p
                                style="margin-top: auto; font-size: 0.65rem; letter-spacing: 3px; color: #bbb; padding-top: 0.1rem;">
                                HOVER TO DISCOVER</p>
                        </div>

                        <!-- BACK: Bio + biography link -->
                        <div class="flip-card-back">
                            <div class="side-tag" style="margin-bottom: 1.5rem; color: var(--color-gold);">THE NARRATIVE
                            </div>
                            <p style="font-size: 1rem; line-height: 1.8; color: #555; margin-bottom: 2.5rem;">Manuj
                                Mittal (MJ) is a writer and youth leader dedicated to advancing youth development
                                through modern management thinking. He distills complex challenges into
                                thought-provoking narratives.</p>
                            <a href="biography.php"
                                style="background: #000; color: #fff; padding: 1rem 2.5rem; text-decoration: none; font-size: 0.8rem; letter-spacing: 3px; font-weight: 700; display: inline-block;">FULL
                                BIOGRAPHY</a>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <!-- Flipbook Viewer Overlay -->
        <div id="inlineFlipbook"
            style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(255,255,255,0.98); z-index: 10000; flex-direction: column; align-items: center; justify-content: center; gap: 3rem;">
            <div style="perspective: 2000px; width: 100%; max-width: 600px; height: 400px; position: relative;">
                <div id="mainBook"
                    style="width: 50%; height: 100%; position: absolute; left: 50%; transform-style: preserve-3d; transition: transform 1.2s ease; transform: translateZ(0);">
                    <div
                        style="position: absolute; width: 100%; height: 100%; background: #002244; border-radius: 0 5px 5px 0; z-index: 1; left: 0;">
                    </div>
                    <div class="page-leaf" id="leaf3"
                        style="position: absolute; width: 100%; height: 100%; left: 0; transform-origin: left center; transform-style: preserve-3d; transition: transform 1.2s ease; z-index: 3;">
                        <div
                            style="position: absolute; width: 100%; height: 100%; background: #fdfdfd; backface-visibility: hidden; padding: 1.5rem; border-left: 1px solid #eee; border-radius: 0 5px 5px 0;">
                            <h4 style="font-family: var(--font-serif); font-size: 1.1rem; margin-bottom: 0.5rem;">
                                Mastery</h4>
                            <p
                                style="font-family: var(--font-serif); line-height: 1.5; color: #333; font-size: 0.85rem;">
                                "The transition from student to architect is silent. It happens when you ask: What will
                                I leave behind?"</p>
                        </div>
                        <div
                            style="position: absolute; width: 100%; height: 100%; background: #fdfdfd; transform: rotateY(180deg); backface-visibility: hidden; padding: 1.5rem;">
                            <p
                                style="font-family: var(--font-serif); line-height: 1.5; color: #333; font-size: 0.85rem;">
                                "Each building is just a page, each city a book, and each life... a grand library."</p>
                        </div>
                    </div>
                    <div class="page-leaf" id="leaf2"
                        style="position: absolute; width: 100%; height: 100%; left: 0; transform-origin: left center; transform-style: preserve-3d; transition: transform 1.2s ease; z-index: 4;">
                        <div
                            style="position: absolute; width: 100%; height: 100%; background: #fdfdfd; backface-visibility: hidden; padding: 1.5rem;">
                            <h4 style="font-family: var(--font-serif); font-size: 1.1rem; margin-bottom: 0.5rem;">
                                Foundation</h4>
                            <p
                                style="font-family: var(--font-serif); line-height: 1.5; color: #333; font-size: 0.85rem;">
                                "A foundation is the education of the heart and the discipline of the mind."</p>
                        </div>
                        <div
                            style="position: absolute; width: 100%; height: 100%; background: #fdfdfd; transform: rotateY(180deg); backface-visibility: hidden; padding: 1.5rem;">
                            <p
                                style="font-family: var(--font-serif); line-height: 1.5; color: #333; font-size: 0.85rem;">
                                "In the silence of Mayo College, I heard the call of leadership. Not to command, but to
                                serve."</p>
                        </div>
                    </div>
                    <div class="page-leaf" id="leaf1"
                        style="position: absolute; width: 100%; height: 100%; left: 0; transform-origin: left center; transform-style: preserve-3d; transition: transform 1.2s ease; z-index: 5;">
                        <div
                            style="position: absolute; width: 100%; height: 100%; background: #003366; backface-visibility: hidden; display: flex; align-items: center; justify-content: center; border-radius: 0 5px 5px 0;">
                            <div
                                style="color: #fff; text-align: center; padding: 1rem; border: 1px solid var(--color-gold);">
                                <div style="font-size: 0.7rem; letter-spacing: 3px; margin-bottom: 0.5rem;">MANUJ MITTAL
                                </div>
                                <div style="font-family: var(--font-serif); font-size: 1rem;">
                                    <?php echo $books[0]['title']; ?>
                                </div>
                            </div>
                        </div>
                        <div
                            style="position: absolute; width: 100%; height: 100%; background: #fdfdfd; transform: rotateY(180deg); backface-visibility: hidden; padding: 1.5rem;">
                            <h4 style="font-family: var(--font-serif); font-size: 1.1rem; margin-bottom: 0.5rem;">
                                Blueprint</h4>
                            <p
                                style="font-family: var(--font-serif); line-height: 1.5; color: #333; font-size: 0.85rem;">
                                "Architecture is the art of how we waste space. Every arch tells a secret..."</p>
                        </div>
                    </div>
                </div>
            </div>
            <div style="display: flex; gap: 1rem;">
                <button onclick="prevPage()" id="prevBtn"
                    style="background: none; border: 1px solid #ddd; color: #333; padding: 0.8rem 1.5rem; cursor: pointer; font-size: 0.8rem; letter-spacing: 1px;">PREV</button>
                <button onclick="nextPage()" id="nextBtn"
                    style="background: #000; border: none; color: #fff; padding: 0.8rem 1.5rem; cursor: pointer; font-size: 0.8rem; letter-spacing: 1px;">NEXT</button>
                <button onclick="closeFlipbook()"
                    style="background: none; border: none; color: #999; padding: 0.8rem 1.5rem; cursor: pointer; font-size: 0.8rem; letter-spacing: 1px;">CLOSE
                    x</button>
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
                for (let i = 1; i <= totalPages; i++) {
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

        <!-- Apple Executive Mobile Hero -->
        <div class="hero-mobile">
            <style>
                .hero-mobile {
                    display: none;
                }

                @media (max-width: 992px) {
                    .hero-mobile {
                        display: flex;
                        flex-direction: column;
                        align-items: center;
                        padding: 4rem 2rem 5rem;
                        text-align: center;
                        width: 100%;
                        background: transparent;
                    }

                    .hero-mobile-title {
                        font-family: var(--font-sans);
                        font-size: 3.8rem;
                        font-weight: 800;
                        letter-spacing: -2px;
                        color: var(--color-text);
                        line-height: 1;
                        margin-bottom: 2rem;
                    }

                    .hero-mobile-portrait {
                        width: 220px;
                        height: 280px;
                        object-fit: cover;
                        object-position: center;
                        border-radius: 20px;
                        margin-bottom: 2rem;
                        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
                    }

                    .hero-mobile-desc {
                        font-family: var(--font-sans);
                        font-size: 1.15rem;
                        color: var(--color-text-muted);
                        font-weight: 400;
                        line-height: 1.6;
                        margin-bottom: 3rem;
                    }

                    .hero-mobile-buttons {
                        display: flex;
                        flex-direction: column;
                        width: 100%;
                        gap: 1rem;
                    }

                    .btn-apple-primary {
                        background: var(--color-text);
                        color: var(--color-bg);
                        text-align: center;
                        padding: 1.2rem;
                        border-radius: 50px;
                        font-size: 1rem;
                        font-weight: 600;
                        text-decoration: none;
                        width: 100%;
                        letter-spacing: 0;
                    }

                    .btn-apple-secondary {
                        background: transparent;
                        color: var(--color-text);
                        border: 2px solid var(--color-text-muted);
                        text-align: center;
                        padding: 1.2rem;
                        border-radius: 50px;
                        font-size: 1rem;
                        font-weight: 600;
                        text-decoration: none;
                        width: 100%;
                        letter-spacing: 0;
                    }
                }
            </style>

            <h1 class="hero-mobile-title">Manuj Mittal.</h1>
            <img src="assets/author main.jpg" alt="Manuj Mittal" class="hero-mobile-portrait">
            <p class="hero-mobile-desc">Writer, youth leader, and visionary distilling complex challenges into
                thought-provoking narratives.</p>

            <div class="hero-mobile-buttons">
                <a href="biography.php" class="btn-apple-primary">Read Full Story</a>
                <a href="store.php" class="btn-apple-secondary">The New Book</a>
            </div>
        </div>
    </section>

    <!-- Cinematic Mobile Book Reveal (Mid-Scroll) -->
    <style>
        .mobile-cinematic-book {
            display: none;
        }

        @media (max-width: 992px) {
            .mobile-cinematic-book {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                background: transparent;
                padding: 6rem 2rem;
                text-align: center;
                width: 100%;
                position: relative;
                overflow: hidden;
            }

            .cinematic-glow {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 300px;
                height: 400px;
                background: radial-gradient(circle, rgba(197, 160, 89, 0.2) 0%, transparent 70%);
                filter: blur(40px);
                z-index: 1;
            }

            .cinematic-book-cover {
                width: 100%;
                max-width: 260px;
                height: auto;
                aspect-ratio: 2/3;
                object-fit: cover;
                border-radius: 4px;
                box-shadow: 0 20px 50px rgba(0, 0, 0, 0.5), 0 0 0 1px rgba(255, 255, 255, 0.1);
                position: relative;
                z-index: 2;
                margin-bottom: 2.5rem;
            }

            .cinematic-title {
                color: var(--color-text);
                font-family: var(--font-serif);
                font-size: 2.4rem;
                line-height: 1.1;
                margin-bottom: 1rem;
                position: relative;
                z-index: 2;
            }

            .cinematic-subtitle {
                color: var(--color-text-muted);
                font-size: 0.85rem;
                margin-bottom: 3rem;
                position: relative;
                z-index: 2;
                letter-spacing: 3px;
                text-transform: uppercase;
                font-weight: 800;
            }

            .btn-cinematic {
                background: var(--color-text);
                color: var(--color-bg);
                text-align: center;
                padding: 1.2rem;
                border-radius: 50px;
                font-size: 1rem;
                font-weight: 700;
                text-decoration: none;
                width: 100%;
                max-width: 260px;
                position: relative;
                z-index: 2;
            }
        }
    </style>
    <section class="mobile-cinematic-book reveal">
        <div class="cinematic-glow"></div>
        <img src="book cover.jpeg" alt="<?php echo $books[0]['title']; ?>" class="cinematic-book-cover">
        <h2 class="cinematic-title"><?php echo $books[0]['title']; ?></h2>
        <p class="cinematic-subtitle">Featured Work</p>
        <a href="store.php" class="btn-cinematic">Pre-Order Now</a>
    </section>

    <!-- Executive Mobile Layout Logic -->
    <style>
        @media (max-width: 992px) {

            #about {
                display: none !important;
            }
        }
    </style>

    <!-- About Pillars Section (Color Coded) -->
    <section id="about" class="container" style="padding-top: 15vh;">
        <div class="section-header reveal">
            <h2 class="gradient-text-gold" style="font-size: 3.5rem; margin-bottom: 2rem;">Foundation of<br>the Visionary.</h2>
        </div>

        <style>
            .pillar-list {
                list-style: none;
                padding: 0;
                margin: 0;
                max-height: 200px;
                overflow: hidden;
                -webkit-mask-image: linear-gradient(to bottom, black 60%, transparent 100%);
                mask-image: linear-gradient(to bottom, black 60%, transparent 100%);
                transition: max-height 0.5s ease;
            }
            .pillar-list li {
                font-size: 0.9rem;
                color: #555;
                line-height: 1.5;
                padding: 0.35rem 0 0.35rem 1.2rem;
                position: relative;
                border-bottom: 1px solid rgba(0,0,0,0.05);
            }
            .pillar-list li:last-child {
                border-bottom: none;
            }
            .pillar-list li::before {
                content: '';
                position: absolute;
                left: 0;
                top: 50%;
                transform: translateY(-50%);
                width: 5px;
                height: 5px;
                border-radius: 50%;
                background: var(--theme-color);
            }
        </style>
        <div class="about-pillars">
            <!-- Education: Blue -->
            <a href="education.php" class="pillar-card reveal pillar-edu"
                style="--theme-color: #0047AB; border-top: 6px solid #0047AB; position: relative; overflow: hidden; display: block; text-decoration: none; color: inherit;">
                <div
                    style="position: absolute; right: -20px; bottom: -20px; font-size: 10rem; font-weight: 900; color: transparent; -webkit-text-stroke: 2px rgba(0,71,171,0.15); font-family: var(--font-serif); pointer-events: none;">
                    01</div>
                <div class="pillar-tag"
                    style="color: #0047AB; font-weight: 800; letter-spacing: 3px; font-size: 0.65rem; margin-bottom: 1.5rem; text-transform: uppercase;">
                    Education</div>
                <h3 style="font-size: 1.8rem; margin-bottom: 1.5rem; color: var(--text);">Education &amp; Early Life</h3>
                <ul class="pillar-list">
                    <li>Early Life - Childhood (1996)</li>
                    <li>Pictures (TBD)</li>
                    <li>Mayo College (Boarding School) at Age 12 (2008)</li>
                    <li>Chess Champion @Age 15 (WazirChand Trophy)</li>
                    <li>High School: Science (PCM)</li>
                    <li>IMO (Represented India) in Kazakhstan</li>
                    <li>Pursued CA (US CPA Equivalent) from Delhi, India</li>
                    <li>IT Trainings and Soft Skills Programming</li>
                    <li>B. Com 2017 - IGNOU, India</li>
                    <li>Ms Finance 2020 - USA (Left India at age 23 in 2019)</li>
                    <li>MBA (Finance) 2021 - Simon Business School, USA</li>
                    <li>Dean’s List</li>
                    <li>Networking Coaching</li>
                    <li>Pursuing Doctor of Education (HE Administration)</li>
                    <li>Award: Education 2.0 (Las Vegas)</li>
                    <li>Graduating 2027</li>
                    <li>Co-Chair: HE Students Association</li>
                </ul>
                <div class="pillar-link" style="margin-top: 1.5rem; background: rgba(0,71,171,0.1); padding: 0.75rem 1.25rem; border-radius: 4px; color: #0047AB; font-weight: 800; font-size: 0.8rem; letter-spacing: 2px; text-transform: uppercase; display: inline-flex; align-items: center; gap: 0.5rem; transition: background 0.3s ease;">
                    Read More <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                </div>
            </a>

            <!-- Profession: Red -->
            <a href="professional.php" class="pillar-card reveal pillar-prof"
                style="--theme-color: #C41E3A; border-top: 6px solid #C41E3A; position: relative; overflow: hidden; display: block; text-decoration: none; color: inherit;">
                <div
                    style="position: absolute; right: -20px; bottom: -20px; font-size: 10rem; font-weight: 900; color: transparent; -webkit-text-stroke: 2px rgba(196,30,58,0.15); font-family: var(--font-serif); pointer-events: none;">
                    02</div>
                <div class="pillar-tag"
                    style="color: #C41E3A; font-weight: 800; letter-spacing: 3px; font-size: 0.65rem; margin-bottom: 1.5rem; text-transform: uppercase;">
                    Professional</div>
                <h3 style="font-size: 1.8rem; margin-bottom: 1.5rem; color: var(--text);">Professional Career</h3>
                <ul class="pillar-list">
                    <li>BNP Paribas - Internship</li>
                    <li>Grant Thornton - Articleship/ Externship (USA)</li>
                    <li>Boutique Investment Banking (Delhi, India)</li>
                    <li>Boutique M&amp;A (NY, USA)</li>
                    <li>Morgan Stanley (Manhattan, USA)</li>
                    <li>CPA, Firm (NY, USA)</li>
                    <li>Career Advisor /AD - UR (Rochester,USA)</li>
                    <li>Award: Education 2.0 (Las Vegas)</li>
                    <li>Leadership Programs GA - UR (Rochester,USA)</li>
                </ul>
                <div class="pillar-link" style="margin-top: 1.5rem; background: rgba(196,30,58,0.1); padding: 0.75rem 1.25rem; border-radius: 4px; color: #C41E3A; font-weight: 800; font-size: 0.8rem; letter-spacing: 2px; text-transform: uppercase; display: inline-flex; align-items: center; gap: 0.5rem; transition: background 0.3s ease;">
                    Read More <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                </div>
            </a>

            <!-- Social Responsibility: Green -->
            <a href="social-responsibility.php" class="pillar-card reveal pillar-social"
                style="--theme-color: #2E8B57; border-top: 6px solid #2E8B57; position: relative; overflow: hidden; display: block; text-decoration: none; color: inherit;">
                <div
                    style="position: absolute; right: -20px; bottom: -20px; font-size: 10rem; font-weight: 900; color: transparent; -webkit-text-stroke: 2px rgba(46,139,87,0.15); font-family: var(--font-serif); pointer-events: none;">
                    03</div>
                <div class="pillar-tag"
                    style="color: #2E8B57; font-weight: 800; letter-spacing: 3px; font-size: 0.65rem; margin-bottom: 1.5rem; text-transform: uppercase;">
                    Social Responsibility</div>
                <h3 style="font-size: 1.8rem; margin-bottom: 1.5rem; color: var(--text);">Social Responsibility</h3>
                <ul class="pillar-list">
                    <li>RYLA Participant - Interact 2013 (Rotary International)</li>
                    <li>Joined Rotaract in 2014 - RC MV (Rotary International)</li>
                    <li>Charter President - RC Delhi Central (2015-16)</li>
                    <li>RI Convention - Atlanta 2017</li>
                    <li>District Rotaract Representative (2016-17)</li>
                    <li>RI Convention - Toronto 2018</li>
                    <li>RI Convention - Hamburg 2019</li>
                    <li>RSA ROAR ‘Best DRR’ Award</li>
                    <li>President - Rotaract South Asia MDIO (2019-2020)</li>
                    <li>8 Countries, xDistricts, #200,000 Rotaractors</li>
                    <li>Chairman - Rotasia Delhi 2020 (Conference)</li>
                    <li><strong>At Present:</strong></li>
                    <li>RI Member and Rotaract Alumni</li>
                    <li>Mayo Alumni North America (MACANA)- Member</li>
                    <li>ICAI, NY- Member</li>
                    <li>Simon Business School, NY- Alumni</li>
                </ul>
                <div class="pillar-link" style="margin-top: 1.5rem; background: rgba(46,139,87,0.1); padding: 0.75rem 1.25rem; border-radius: 4px; color: #2E8B57; font-weight: 800; font-size: 0.8rem; letter-spacing: 2px; text-transform: uppercase; display: inline-flex; align-items: center; gap: 0.5rem; transition: background 0.3s ease;">
                    Read More <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                </div>
            </a>
        </div>

        <style>
            .pillar-card svg {
                transition: transform 0.3s cubic-bezier(0.25, 1, 0.5, 1);
            }
            .pillar-card:hover svg {
                transform: translateX(5px);
            }

            .pillar-edu:hover {
                box-shadow: 0 30px 60px rgba(0, 71, 171, 0.1);
                transform: translateY(-10px);
            }

            .pillar-prof:hover {
                box-shadow: 0 30px 60px rgba(196, 30, 58, 0.1);
                transform: translateY(-10px);
            }

            .pillar-social:hover {
                box-shadow: 0 30px 60px rgba(46, 139, 87, 0.1);
                transform: translateY(-10px);
            }

            @media (max-width: 992px) {
                .about-pillars {
                    display: flex !important;
                    flex-wrap: nowrap;
                    overflow-x: auto;
                    scroll-snap-type: x mandatory;
                    gap: 1.5rem !important;
                    padding-bottom: 2rem;
                    -webkit-overflow-scrolling: touch;
                    scrollbar-width: none;
                }

                .about-pillars::-webkit-scrollbar {
                    display: none;
                }

                .pillar-card {
                    min-width: 85vw;
                    scroll-snap-align: center;
                    margin: 0 !important;
                }
            }
        </style>
    </section>

    <!-- Journey Section: Dynamic Photo Timeline -->
    <section id="journey" style="padding: 15vh 0; overflow: hidden; background: transparent;">

        <style>
            @media (max-width: 1024px) {
                #journey .journey-header {
                    padding: 8rem 1.5rem 4rem !important;
                    background: transparent;
                }

                #journey .journey-header h2 {
                    color: var(--color-text) !important;
                }
            }
        </style>
        <div class="container journey-header">
            <div style="text-align: center; margin-bottom: 8rem;" class="reveal">
                <h2 class="gradient-text-gold" style="font-size: clamp(3.5rem, 7vw, 5.5rem); line-height: 1; letter-spacing: -2px;">A
                    Legacy in<br>the Making.</h2>
            </div>
        </div>

        <style>
            .timeline-container {
                position: relative;
                max-width: 1200px;
                margin: 0 auto;
                padding: 4rem 2rem;
            }

            /* Central Line */
            .timeline-line {
                position: absolute;
                left: 50%;
                top: 0;
                bottom: 0;
                width: 2px;
                background: rgba(0, 0, 0, 0.1);
                transform: translateX(-50%);
                z-index: 1;
            }

            .timeline-progress {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                background: var(--gold);
                height: 0%;
                transition: height 0.3s ease-out;
            }

            /* Milestone Card */
            .timeline-card {
                position: relative;
                width: 45%;
                margin-bottom: 6rem;
                opacity: 0;
                transform: translateY(50px);
                transition: all 0.8s cubic-bezier(0.19, 1, 0.22, 1);
                z-index: 2;
            }

            .timeline-card.active {
                opacity: 1;
                transform: translateY(0);
            }

            /* Left Side Cards */
            .timeline-card:nth-child(odd) {
                left: 0;
            }

            /* Right Side Cards */
            .timeline-card:nth-child(even) {
                left: 55%;
            }

            /* The Dot on the Line */
            .timeline-dot {
                position: absolute;
                top: 40px;
                width: 20px;
                height: 20px;
                background: #fff;
                border: 3px solid #ddd;
                border-radius: 50%;
                z-index: 3;
                transition: all 0.4s ease;
            }

            .timeline-card:nth-child(odd) .timeline-dot {
                right: -11.5%;
                /* Position exactly on the center line */
                transform: translateX(50%);
            }

            .timeline-card:nth-child(even) .timeline-dot {
                left: -11.5%;
                /* Position exactly on the center line */
                transform: translateX(-50%);
            }

            .timeline-card.active .timeline-dot {
                border-color: var(--theme-color, var(--gold));
                background: var(--theme-color, var(--gold));
                box-shadow: 0 0 20px var(--theme-color, var(--gold)), 0 0 0 8px rgba(197, 160, 89, 0.2);
            }

            /* Card Content Styling */
            .timeline-content {
                background: rgba(255, 255, 255, 0.5); /* Glassmorphism */
                backdrop-filter: blur(24px);
                -webkit-backdrop-filter: blur(24px);
                border-radius: 12px;
                overflow: hidden;
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.05), inset 0 1px 0 rgba(255, 255, 255, 0.8);
                border: 1px solid rgba(255, 255, 255, 0.3);
                transition: transform 0.5s ease, box-shadow 0.5s ease;
            }

            .timeline-content:hover {
                transform: translateY(-10px);
                box-shadow: 0 40px 80px rgba(0, 0, 0, 0.1), inset 0 1px 0 rgba(255, 255, 255, 0.9);
                border: 1px solid rgba(255, 255, 255, 0.5);
            }

            .timeline-img {
                width: 100%;
                height: 350px;
                overflow: hidden;
                position: relative;
                container-type: inline-size;
                background-color: #0c0c0e; /* Deep cinematic black background to frame images */
            }

            .timeline-img img {
                width: 100%;
                height: 100%;
                object-fit: contain; /* Prevent faces/contents from being cropped */
                transition: transform 0.8s ease;
            }

            .timeline-content:hover .timeline-img img {
                transform: scale(1.03); /* Subtle scale effect that works nicely with contained layouts */
            }

            /* Timeline Photo Slideshow Marquee */
            .timeline-marquee {
                width: 100%;
                height: 100%;
                overflow: hidden;
                position: relative;
            }

            .timeline-marquee-track {
                display: flex;
                width: max-content;
                height: 100%;
                will-change: transform;
                transition: transform 0.6s cubic-bezier(0.25, 1, 0.5, 1);
            }

            .timeline-marquee-track img {
                width: 100cqw !important;
                height: 100% !important;
                object-fit: contain !important; /* Prevent faces/contents from being cropped */
                flex-shrink: 0 !important; 
                transition: none !important;
                transform: none !important;
            }

            .timeline-text {
                padding: 3rem;
            }

            .timeline-year {
                font-size: 0.8rem;
                font-weight: 800;
                letter-spacing: 4px;
                text-transform: uppercase;
                color: var(--theme-color, var(--gold));
                margin-bottom: 1rem;
            }

            .timeline-text h4 {
                font-size: 2.2rem;
                color: #000;
                margin-bottom: 1.5rem;
                font-family: var(--font-serif);
                line-height: 1.2;
            }

            .timeline-text p {
                font-size: 1.1rem;
                color: #666;
                line-height: 1.8;
                margin: 0;
            }

            .timeline-list {
                list-style: none;
                padding: 0;
                margin: 0;
            }

            .timeline-list li {
                font-size: 1rem;
                color: #555;
                line-height: 1.7;
                padding: 0.45rem 0 0.45rem 1.4rem;
                position: relative;
                border-bottom: 1px solid rgba(0,0,0,0.05);
            }

            .timeline-list li:last-child {
                border-bottom: none;
            }

            .timeline-list li::before {
                content: '';
                position: absolute;
                left: 0;
                top: 50%;
                transform: translateY(-50%);
                width: 6px;
                height: 6px;
                border-radius: 50%;
                background: var(--theme-color, var(--gold));
            }

            .numerology {
                font-size: 0.78rem;
                color: var(--gold);
                font-weight: 700;
                letter-spacing: 1px;
                opacity: 0.85;
            }

            /* Mobile Optimization (Horizontal Scroll Timeline) */
            @media (max-width: 992px) {
                .timeline-container {
                    display: flex;
                    flex-direction: row;
                    overflow-x: auto;
                    scroll-snap-type: x mandatory;
                    gap: 1.5rem;
                    padding: 3rem 1.5rem 1.5rem 1.5rem;
                    scrollbar-width: none;
                    -webkit-overflow-scrolling: touch;
                    position: relative;
                    scroll-padding: 0 1.5rem;
                }

                .timeline-container::-webkit-scrollbar {
                    display: none;
                }

                .timeline-line {
                    display: none !important;
                }

                .timeline-line-horizontal {
                    display: block;
                    position: absolute;
                    top: 2.2rem;
                    height: 3px;
                    background: rgba(0, 0, 0, 0.08);
                    z-index: 1;
                    border-radius: 2px;
                }

                .timeline-progress-horizontal {
                    height: 100%;
                    width: 0%;
                    background: var(--gold);
                    border-radius: 2px;
                    transition: width 0.1s ease-out;
                }

                .timeline-card {
                    flex: 0 0 85vw;
                    max-width: 340px;
                    scroll-snap-align: center;
                    margin-bottom: 0 !important;
                    left: auto !important;
                    position: relative;
                    opacity: 0.5 !important;
                    transform: scale(0.95) !important;
                    transition: all 0.4s cubic-bezier(0.19, 1, 0.22, 1) !important;
                    z-index: 2;
                    margin-top: 2rem;
                }

                .timeline-card.active-mobile {
                    opacity: 1 !important;
                    transform: scale(1) !important;
                }

                .timeline-dot {
                    display: block !important;
                    position: absolute !important;
                    top: -2.35rem !important;
                    left: 50% !important;
                    transform: translateX(-50%) scale(0.8) !important;
                    z-index: 3;
                    transition: all 0.4s cubic-bezier(0.19, 1, 0.22, 1);
                }

                .timeline-card.active-mobile .timeline-dot {
                    border-color: var(--theme-color, var(--gold)) !important;
                    background: var(--theme-color, var(--gold)) !important;
                    box-shadow: 0 0 0 6px rgba(0, 0, 0, 0.04) !important;
                    transform: translateX(-50%) scale(1.15) !important;
                }

                .timeline-content {
                    border: 1px solid rgba(0, 0, 0, 0.04);
                    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.03);
                    border-radius: 12px;
                    overflow: hidden;
                    background: #fff;
                    cursor: grab;
                    height: 100%;
                    display: flex;
                    flex-direction: column;
                }

                .timeline-content:active {
                    cursor: grabbing;
                }

                .timeline-img {
                    display: block !important;
                    height: 180px !important;
                    width: 100%;
                }

                .timeline-text {
                    padding: 1.5rem !important;
                    flex-grow: 1;
                    display: flex;
                    flex-direction: column;
                }

                .timeline-list li {
                    display: block !important;
                    font-size: 0.95rem !important;
                    line-height: 1.6 !important;
                    color: #555 !important;
                    padding: 0.35rem 0 0.35rem 1.2rem !important;
                }

                .timeline-year {
                    margin-bottom: 0.5rem !important;
                    font-size: 0.75rem !important;
                }

                .timeline-text h4 {
                    margin-bottom: 0.8rem !important;
                    font-size: 1.5rem !important;
                    line-height: 1.3 !important;
                }
            }
        </style>

        <div class="timeline-container">
            <div class="timeline-line">
                <div class="timeline-progress"></div>
            </div>
            <!-- Horizontal Timeline Line for Mobile -->
            <div class="timeline-line-horizontal">
                <div class="timeline-progress-horizontal"></div>
            </div>

            <!-- Milestone 1: Early Life and Family -->
            <div class="timeline-card" style="--theme-color: #2E8B57;">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <div class="timeline-img shimmer">
                        <div class="timeline-marquee">
                            <div class="timeline-marquee-track">
                                <img src="assets/Early%20life%20and%20family/0.jpg" alt="Early Life">
                                <img src="assets/Early%20life%20and%20family/1.JPG" alt="Childhood">
                                <img src="assets/Early%20life%20and%20family/3.JPG" alt="Family Outing 1">
                                <img src="assets/Early%20life%20and%20family/3.1.JPG" alt="Family Outing 2">
                                <img src="assets/Early%20life%20and%20family/4.JPG" alt="Growing Up">
                                <img src="assets/Early%20life%20and%20family/7.JPG" alt="Family Moments">
                                <img src="assets/Early%20life%20and%20family/early%20life%20and%20schooling.JPG" alt="Early Schooling">
                            </div>
                        </div>
                    </div>
                    <div class="timeline-text">
                        <h4>Early Life and Family</h4>
                        <ul class="timeline-list">
                            <li>Family members are engineers, doctors, lawyers and civil services/ public sector/administrators</li>
                            <li>Father early career in USA, build his own business in India and is Rotary International - Past District Governor</li>
                            <li>Manuj born on Jan 10 (01.10.1996) &nbsp;<span class="numerology">〈1+1+1+9+9+6=27〉〈2+7=9〉</span></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Milestone 2: Education in India -->
            <div class="timeline-card" style="--theme-color: #C41E3A;">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <div class="timeline-img shimmer">
                        <div class="timeline-marquee">
                            <div class="timeline-marquee-track">
                                <img src="assets/Education%20in%20India/1%20copy.JPG" alt="Mayo Classmates">
                                <img src="assets/Education%20in%20India/6.JPG" alt="Chess Champion">
                                <img src="assets/Education%20in%20India/10.JPG" alt="Graduation Day">
                            </div>
                        </div>
                    </div>
                    <div class="timeline-text">
                        <h4>Education in India</h4>
                        <ul class="timeline-list">
                            <li>Early schooling from Mayo College, Ajmer</li>
                            <li>B. Commerce (Accounting &amp; Finance)</li>
                            <li>ICAI (Chartered Accountant) — Intermediate</li>
                            <li>Doctorate in Leadership &amp; Social Work (Honoris Causa)</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Milestone 3: Professional Journey in India -->
            <div class="timeline-card" style="--theme-color: #0047AB;">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <div class="timeline-img shimmer">
                        <img src="assets/Professional%20Journey%20%20India/5.JPG" alt="Early Professional Life">
                    </div>
                    <div class="timeline-text">
                        <h4>Professional Journey in India</h4>
                        <ul class="timeline-list">
                            <li>Risk Advisory (Internal Audit) at Grant Thornton</li>
                            <li>Consulting at Boutique Firm</li>
                            <li>M&amp;A at Boutique IB Firm</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Milestone 4: Rise in Rotaract -->
            <div class="timeline-card" style="--theme-color: #2E8B57;">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <div class="timeline-img shimmer">
                        <div class="timeline-marquee">
                            <div class="timeline-marquee-track">
                                <img src="assets/Rise%20in%20Rotaract/1.JPG" alt="Rotaract Event 1">
                                <img src="assets/Rise%20in%20Rotaract/2.JPG" alt="Rotaract Summit">
                                <img src="assets/Rise%20in%20Rotaract/3.JPG" alt="Rotaract Members">
                                <img src="assets/Rise%20in%20Rotaract/4.JPG" alt="Community Project">
                                <img src="assets/Rise%20in%20Rotaract/5.JPG" alt="Rotaract Action">
                                <img src="assets/Rise%20in%20Rotaract/6.JPG" alt="Award Ceremony">
                                <img src="assets/Rise%20in%20Rotaract/7.JPG" alt="Rotaract Group">
                            </div>
                        </div>
                    </div>
                    <div class="timeline-text">
                        <h4>Service through Rotaract International</h4>
                        <ul class="timeline-list">
                            <li>Charter President — Rotaract Club Delhi Central</li>
                            <li>District Rotaract Representative (DRR) — RID 3011 (2016–2017)</li>
                            <li>President — Rotaract South Asia MDIO (2019–2020)</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Milestone 5: Education in the US -->
            <div class="timeline-card" style="--theme-color: #C41E3A;">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <div class="timeline-img shimmer">
                        <div class="timeline-marquee">
                            <div class="timeline-marquee-track">
                                <img src="assets/Education%20in%20the%20US/2.JPG" alt="MSF Class">
                                <img src="assets/Education%20in%20the%20US/3.JPG" alt="U of R Presentation">
                                <img src="assets/Education%20in%20the%20US/5.jpg" alt="Networking Coaching">
                                <img src="assets/Education%20in%20the%20US/IMG_1105.JPG" alt="Campus Life">
                                <img src="assets/Education%20in%20the%20US/simon%20business%20school.jpg" alt="Simon Business School Graduation">
                            </div>
                        </div>
                    </div>
                    <div class="timeline-text">
                        <h4>Education in the US</h4>
                        <ul class="timeline-list">
                            <li>Master in Finance (MSF) — Simon Business School, NY</li>
                            <li>Master in Business Administration (MBA) — Simon Business School, NY</li>
                            <li>Doctorate in Education (Ed.D) — Warner School, University of Rochester</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Milestone 6: Rise in Rotary -->
            <div class="timeline-card" style="--theme-color: #0047AB;">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <div class="timeline-img shimmer">
                        <div class="timeline-marquee">
                            <div class="timeline-marquee-track">
                                <img src="assets/Rise%20in%20Rotary/rotary..JPG" alt="Rotary International">
                                <img src="assets/Rise%20in%20Rotary/1.JPG" alt="Rotary Summit Group">
                                <img src="assets/Rise%20in%20Rotary/1%20copy.JPG" alt="District Rotaract Representative">
                                <img src="assets/Rise%20in%20Rotary/2.JPG" alt="Atlanta Convention">
                                <img src="assets/Rise%20in%20Rotary/3.JPG" alt="Hamburg Convention">
                                <img src="assets/Rise%20in%20Rotary/4.JPG" alt="Service Event 1">
                                <img src="assets/Rise%20in%20Rotary/4%20copy.JPG" alt="Service Event 2">
                                <img src="assets/Rise%20in%20Rotary/5.JPG" alt="Global Fellowship">
                                <img src="assets/Rise%20in%20Rotary/6.JPG" alt="DRR Award Presentation">
                                <img src="assets/Rise%20in%20Rotary/6.1.JPG" alt="Best DRR Ceremony">
                                <img src="assets/Rise%20in%20Rotary/7.JPG" alt="Leadership Conference">
                                <img src="assets/Rise%20in%20Rotary/8.JPG" alt="Youth Exchange Support">
                                <img src="assets/Rise%20in%20Rotary/9.JPG" alt="Community Outreach">
                                <img src="assets/Rise%20in%20Rotary/10.jpg" alt="Atlanta Project">
                                <img src="assets/Rise%20in%20Rotary/12.JPG" alt="Rotary International Board Meeting">
                            </div>
                        </div>
                    </div>
                    <div class="timeline-text">
                        <h4>Rise in Rotary</h4>
                        <ul class="timeline-list">
                            <li>Indian Representative at RI Assembly, USA 2020</li>
                            <li>Chairman — Rotasia Delhi 2020</li>
                            <li>Speaker at International Pre-Convention (USA, Canada, Germany)</li>
                            <li>Rotary International — Paul Harris Fellow (PHF)</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Milestone 7: Professional Journey in the US -->
            <div class="timeline-card" style="--theme-color: #2E8B57;">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <div class="timeline-img shimmer">
                        <div class="timeline-marquee">
                            <div class="timeline-marquee-track">
                                <img src="assets/Professional%20Journey%20in%20the%20US/IMG_8300.jpeg" alt="Morgan Stanley NY Office">
                                <img src="assets/Professional%20Journey%20in%20the%20US/IMG_1046.JPG" alt="Advising at U of R">
                                <img src="assets/Professional%20Journey%20in%20the%20US/IMG_8750.JPG" alt="Assistant Director Presentation">
                            </div>
                        </div>
                    </div>
                    <div class="timeline-text">
                        <h4>Professional Journey in the US</h4>
                        <ul class="timeline-list">
                            <li>Finance Internships at Boutique Firms</li>
                            <li>Investor Services at Morgan Stanley, NYC</li>
                            <li>Career Consultant at Benet Career Management Center, University of Rochester</li>
                            <li>Leadership Program GA at Student Life, University of Rochester</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Milestone 8: Vision | Awards & Recognition -->
            <div class="timeline-card" style="--theme-color: #C41E3A;">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <div class="timeline-img shimmer">
                        <div class="timeline-marquee">
                            <div class="timeline-marquee-track">
                                <img src="assets/Vision%20%7C%20Awards%20%26%20Recognition./0.JPG" alt="Las Vegas Education 2.0 Award">
                                <img src="assets/Vision%20%7C%20Awards%20%26%20Recognition./1.JPG" alt="Education 2.0 Trophy">
                                <img src="assets/Vision%20%7C%20Awards%20%26%20Recognition./1.1.JPG" alt="Education Leadership Recognition">
                                <img src="assets/Vision%20%7C%20Awards%20%26%20Recognition./2.JPG" alt="University of Rochester Ed.D Study">
                                <img src="assets/Vision%20%7C%20Awards%20%26%20Recognition./2.1.JPG" alt="High Education Student Association Co-Chair">
                                <img src="assets/Vision%20%7C%20Awards%20%26%20Recognition./3.JPG" alt="Vision 2027 Speech">
                                <img src="assets/Vision%20%7C%20Awards%20%26%20Recognition./4.JPG" alt="Higher Education Leadership Forum">
                                <img src="assets/Vision%20%7C%20Awards%20%26%20Recognition./6.1.jpg" alt="Rochester Doctoral Presentation">
                                <img src="assets/Vision%20%7C%20Awards%20%26%20Recognition./6.2.jpg" alt="Rochester Seminar Panel">
                                <img src="assets/Vision%20%7C%20Awards%20%26%20Recognition./10.jpg" alt="Outstanding Leadership Certificate">
                                <img src="assets/Vision%20%7C%20Awards%20%26%20Recognition./10.1.JPG" alt="Academic Research Session">
                            </div>
                        </div>
                    </div>
                    <div class="timeline-text">
                        <h4>Vision | Awards & Recognition</h4>
                        <ul class="timeline-list">
                            <li>District Chess Champion - Rajasthan, India 2011</li>
                            <li>Represented India at International Maths Olympiad, Kazakhstan 2014</li>
                            <li>Best ‘DRR’ - India 2017</li>
                            <li>Dean’s List - Simon Business School 2021</li>
                            <li>Excellence in Education - 2.0 Conference USA 2026</li>
                            <li>Continue contributing towards designing the future of our futures</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const cards = document.querySelectorAll('.timeline-card');
                const progress = document.querySelector('.timeline-progress');
                const timelineContainer = document.querySelector('.timeline-container');
                const progressHorizontal = document.querySelector('.timeline-progress-horizontal');
                const lineHorizontal = document.querySelector('.timeline-line-horizontal');

                // Update dynamic layout properties for horizontal scroll line on mobile
                const initHorizontalLine = () => {
                    if (window.innerWidth <= 992 && cards.length > 0 && lineHorizontal) {
                        const firstCard = cards[0];
                        const lastCard = cards[cards.length - 1];
                        
                        const firstCenter = firstCard.offsetLeft + firstCard.clientWidth / 2;
                        const lastCenter = lastCard.offsetLeft + lastCard.clientWidth / 2;
                        
                        lineHorizontal.style.left = firstCenter + 'px';
                        lineHorizontal.style.width = (lastCenter - firstCenter) + 'px';
                    }
                };

                const updateTimeline = () => {
                    if (!timelineContainer) return;

                    if (window.innerWidth > 992) {
                        // Desktop scroll logic
                        const scrollPos = window.scrollY + window.innerHeight * 0.8;
                        const containerRect = timelineContainer.getBoundingClientRect();
                        const absoluteTop = containerRect.top + window.scrollY;

                        cards.forEach(card => {
                            const cardTop = card.getBoundingClientRect().top + window.scrollY;
                            if (scrollPos > cardTop + 100) {
                                card.classList.add('active');
                            }
                        });

                        const relativeScroll = window.scrollY + window.innerHeight / 2 - absoluteTop;
                        let pct = (relativeScroll / containerRect.height) * 100;
                        pct = Math.max(0, Math.min(100, pct));
                        if (progress) {
                            progress.style.height = pct + '%';
                        }
                    } else {
                        // Mobile horizontal scroll logic
                        const maxScroll = timelineContainer.scrollWidth - timelineContainer.clientWidth;
                        if (maxScroll > 0) {
                            const pct = (timelineContainer.scrollLeft / maxScroll) * 100;
                            if (progressHorizontal) {
                                progressHorizontal.style.width = pct + '%';
                            }
                        }

                        // Determine center card
                        const containerCenter = timelineContainer.scrollLeft + timelineContainer.clientWidth / 2;
                        let closestCard = null;
                        let minDistance = Infinity;

                        cards.forEach(card => {
                            const cardCenter = card.offsetLeft + card.clientWidth / 2;
                            const distance = Math.abs(containerCenter - cardCenter);
                            if (distance < minDistance) {
                                minDistance = distance;
                                closestCard = card;
                            }
                        });

                        cards.forEach(card => {
                            if (card === closestCard) {
                                card.classList.add('active-mobile');
                            } else {
                                card.classList.remove('active-mobile');
                            }
                        });
                    }
                };

                // Setup slideshows for multi-photo cards
                const initSlideshows = () => {
                    const marquees = document.querySelectorAll('.timeline-marquee');
                    marquees.forEach(marquee => {
                        const track = marquee.querySelector('.timeline-marquee-track');
                        if (!track) return;
                        
                        // Prevent duplicate initialization
                        if (track.dataset.slideshowInitialized) return;
                        track.dataset.slideshowInitialized = "true";

                        const images = Array.from(track.querySelectorAll('img'));
                        if (images.length <= 1) return;

                        // Clone first image for seamless looping
                        const firstClone = images[0].cloneNode(true);
                        track.appendChild(firstClone);

                        let currentIndex = 0;
                        let intervalId = null;
                        const slideCount = images.length;

                        const startSlideshow = () => {
                            if (intervalId) return;
                            intervalId = setInterval(() => {
                                currentIndex++;
                                track.style.transition = 'transform 0.6s cubic-bezier(0.25, 1, 0.5, 1)';
                                track.style.transform = `translate3d(-${currentIndex * 100}cqw, 0, 0)`;

                                if (currentIndex === slideCount) {
                                    // Reset to index 0 seamlessly after slide transition finishes
                                    setTimeout(() => {
                                        track.style.transition = 'none';
                                        currentIndex = 0;
                                        track.style.transform = 'translate3d(0, 0, 0)';
                                    }, 600);
                                }
                            }, 2600); // Stop for 2 seconds (2.0s pause + 0.6s transition)
                        };

                        const stopSlideshow = () => {
                            if (intervalId) {
                                clearInterval(intervalId);
                                intervalId = null;
                            }
                        };

                        // Start the cycle
                        startSlideshow();

                        // Pause slideshow when user hovers or taps the parent card
                        const card = marquee.closest('.timeline-card');
                        if (card) {
                            card.addEventListener('mouseenter', stopSlideshow);
                            card.addEventListener('mouseleave', startSlideshow);
                            // Support tap to toggle pause/play on mobile devices
                            card.addEventListener('touchstart', () => {
                                if (intervalId) stopSlideshow();
                                else startSlideshow();
                            }, {passive: true});
                        }
                    });
                };

                // Setup resize and scroll handlers
                window.addEventListener('scroll', updateTimeline);
                window.addEventListener('resize', () => {
                    initHorizontalLine();
                    updateTimeline();
                });
                
                if (timelineContainer) {
                    timelineContainer.addEventListener('scroll', updateTimeline);
                }

                // Initial run after layout calculations are ready
                setTimeout(() => {
                    initHorizontalLine();
                    updateTimeline();
                    initSlideshows();
                }, 100);
            });
        </script>
    </section>





    <!-- Sleek Contact CTA -->
    <style>
        .contact-cta {
            padding: 8rem 0;
        }

        .contact-cta-inner {
            padding: 6rem 2rem;
        }

        @media (max-width: 768px) {
            .contact-cta {
                padding: 4rem 0;
            }

            .contact-cta-inner {
                padding: 3rem 1.5rem;
            }
        }
    </style>
    <section id="contact" class="container reveal contact-cta" style="text-align: center;">
        <div class="contact-cta-inner" style="background: rgba(255, 255, 255, 0.4); backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px); border-radius: 24px; max-width: 800px; margin: 0 auto; box-shadow: 0 10px 30px rgba(0,0,0,0.02); border: 1px solid rgba(255, 255, 255, 0.5);">
            <div class="side-tag"
                style="color: var(--gold); font-weight: 800; letter-spacing: 4px; margin-bottom: 1.5rem; display: block; text-transform: uppercase; font-size: 0.75rem;">
                Let's Connect
            </div>
            <h2
                style="font-family: var(--font-sans); font-size: clamp(2.5rem, 5vw, 4rem); font-weight: 800; letter-spacing: -2px; margin-bottom: 2rem; color: #111; line-height: 1.1;">
                Write the Next<br>Chapter Together.
            </h2>
            <p style="font-size: 1.1rem; color: #555; max-width: 500px; margin: 0 auto 3rem auto; line-height: 1.6;">
                Whether for speaking engagements, mentorship, or literary inquiries, Manuj is always open to starting a
                new conversation.
            </p>
            <a href="contact.php" class="btn-apple-primary"
                style="display: inline-block; background: #000; color: #fff; text-decoration: none; padding: 1.2rem 3rem; border-radius: 50px; font-weight: 600; font-size: 1rem;">
                Get in Touch
            </a>
        </div>
    </section>
    <!-- Impact by the Numbers -->
    <section class="stats-section container" style="padding: 8vh 0; text-align: center; border-top: 1px solid #eee;">
        <style>
            @media (max-width: 992px) {
                .stats-section {
                    display: none !important;
                }
            }
        </style>
        <div class="stats-grid"
            style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 4rem;">
            <div class="stat-item reveal">
                <div class="stat-number plus" data-target="200000"
                    style="font-size: 5.5rem; font-weight: 800; color: #000; margin-bottom: 1rem; letter-spacing: -2px;">
                    0</div>
                <div class="stat-label"
                    style="letter-spacing: 4px; font-size: 0.75rem; color: var(--gold); font-weight: 800; text-transform: uppercase;">
                    Global Members Led</div>
            </div>
            <div class="stat-item reveal">
                <div class="stat-number" data-target="8"
                    style="font-size: 5.5rem; font-weight: 800; color: #000; margin-bottom: 1rem; letter-spacing: -2px;">
                    0</div>
                <div class="stat-label"
                    style="letter-spacing: 4px; font-size: 0.75rem; color: var(--gold); font-weight: 800; text-transform: uppercase;">
                    Countries Impacted</div>
            </div>
            <div class="stat-item reveal">
                <div class="stat-number" data-target="27"
                    style="font-size: 5.5rem; font-weight: 800; color: #000; margin-bottom: 1rem; letter-spacing: -2px;">
                    0</div>
                <div class="stat-label"
                    style="letter-spacing: 4px; font-size: 0.75rem; color: var(--gold); font-weight: 800; text-transform: uppercase;">
                    Years of Evolution</div>
            </div>
        </div>
    </section>

    <!-- Visionary Quotes -->
    <section class="quotes-section" style="padding: 4rem 0; background: transparent; position: relative; overflow: hidden;">
        <div
            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; opacity: 0.03; pointer-events: none; background-image: url('https://www.transparenttextures.com/patterns/cubes.png');">
        </div>
        <div class="container" style="text-align: center; max-width: 900px; position: relative; z-index: 2;">
            <div style="width: 100%;">
                <p
                    style="font-family: var(--font-serif); font-size: 2.8rem; font-style: italic; line-height: 1.3; margin-bottom: 3rem; color: #111;">
                    "Purpose defines strategy."</p>
            </div>
        </div>
    </section>

    <style>
        .stat-number.plus::after {
            content: '+';
            font-size: 3rem;
            vertical-align: top;
            margin-left: 5px;
            color: var(--gold);
        }
    </style>

</main>




<?php include 'components/footer.php'; ?>