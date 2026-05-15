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
                                <img src="assets/author.png" alt="Manuj Mittal" style="object-position: center;">
                            </div>
                            <h2
                                style="font-size: 2.2rem; font-family: var(--font-serif); color: #111; margin-bottom: 0; line-height: 1.1;">
                                Manuj Mittal</h2>
                            <div class="author-simple-stats">
                                <div class="stat">
                                    <h4
                                        style="font-size: 0.6rem; color: var(--color-gold); letter-spacing: 3px; text-transform: uppercase; margin-bottom: 0.4rem;">
                                        Expertise</h4>
                                    <p style="font-size: 0.9rem; font-weight: 800; color: #000;">Finance & Strategy</p>
                                </div>
                                <div class="stat">
                                    <h4
                                        style="font-size: 0.6rem; color: var(--color-gold); letter-spacing: 3px; text-transform: uppercase; margin-bottom: 0.4rem;">
                                        Academic</h4>
                                    <p style="font-size: 0.9rem; font-weight: 800; color: #000;">MBA | Ed.D</p>
                                </div>
                            </div>
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
                .hero-mobile { display: none; }
                
                @media (max-width: 992px) {
                    .hero-mobile {
                        display: flex;
                        flex-direction: column;
                        align-items: flex-start;
                        padding: 4rem 2rem 5rem;
                        text-align: left;
                        width: 100%;
                        background: #f5f5f7;
                    }

                    .hero-mobile-title {
                        font-family: var(--font-sans);
                        font-size: 3.8rem;
                        font-weight: 800;
                        letter-spacing: -2px;
                        color: #111;
                        line-height: 1;
                        margin-bottom: 2rem;
                    }

                    .hero-mobile-portrait {
                        width: 100%;
                        height: 400px;
                        object-fit: cover;
                        object-position: center 20%;
                        border-radius: 24px;
                        margin-bottom: 2rem;
                        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
                    }

                    .hero-mobile-desc {
                        font-family: var(--font-sans);
                        font-size: 1.15rem;
                        color: #444;
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
                        background: #000;
                        color: #fff;
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
                        color: #000;
                        border: 2px solid #ddd;
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

            <h1 class="hero-mobile-title">Manuj<br>Mittal.</h1>
            <img src="assets/author.png" alt="Manuj Mittal" class="hero-mobile-portrait">
            <p class="hero-mobile-desc">Writer, youth leader, and visionary distilling complex challenges into thought-provoking narratives.</p>
            
            <div class="hero-mobile-buttons">
                <a href="biography.php" class="btn-apple-primary">Read Full Story</a>
                <a href="store.php" class="btn-apple-secondary">The New Book</a>
            </div>
        </div>
    </section>

    <!-- Executive Mobile Layout Logic -->
    <style>
        @media (max-width: 992px) {
            #about, #journey {
                display: none !important;
            }
        }
    </style>

    <!-- About Pillars Section (Color Coded) -->
    <section id="about" class="container" style="padding-top: 15vh;">
        <div class="section-header reveal">
            <h2 style="font-size: 3.5rem; margin-bottom: 2rem;">Foundation of<br>the Visionary.</h2>
        </div>

        <div class="about-pillars">
            <!-- Education: Blue -->
            <div class="pillar-card reveal pillar-edu"
                style="border-top: 6px solid #0047AB; position: relative; overflow: hidden;">
                <div
                    style="position: absolute; right: -20px; bottom: -20px; font-size: 10rem; font-weight: 900; color: rgba(0,71,171,0.03); font-family: var(--font-sans); pointer-events: none;">
                    01</div>
                <div class="pillar-tag"
                    style="color: #0047AB; font-weight: 800; letter-spacing: 3px; font-size: 0.65rem; margin-bottom: 1.5rem; text-transform: uppercase;">
                    Education</div>
                <h3 style="font-size: 1.8rem; margin-bottom: 1.5rem;">Academic Excellence</h3>
                <p style="color: #666; font-size: 0.95rem; line-height: 1.8;">Alumnus of Mayo College, holding a
                    Master's in Finance and an MBA from Simon Business School. Currently pursuing a Doctor of Education
                    (Ed.D.) at the University of Rochester.</p>
            </div>

            <!-- Profession: Red -->
            <div class="pillar-card reveal pillar-prof"
                style="border-top: 6px solid #C41E3A; position: relative; overflow: hidden;">
                <div
                    style="position: absolute; right: -20px; bottom: -20px; font-size: 10rem; font-weight: 900; color: rgba(196,30,58,0.03); font-family: var(--font-sans); pointer-events: none;">
                    02</div>
                <div class="pillar-tag"
                    style="color: #C41E3A; font-weight: 800; letter-spacing: 3px; font-size: 0.65rem; margin-bottom: 1.5rem; text-transform: uppercase;">
                    Professional</div>
                <h3 style="font-size: 1.8rem; margin-bottom: 1.5rem;">Strategic Leadership</h3>
                <p style="color: #666; font-size: 0.95rem; line-height: 1.8;">Expertise in finance, operations, and
                    organizational strategy. Specializing in distilling complex management challenges into actionable
                    narratives.</p>
            </div>

            <!-- Social Responsibility: Green -->
            <div class="pillar-card reveal pillar-social"
                style="border-top: 6px solid #2E8B57; position: relative; overflow: hidden;">
                <div
                    style="position: absolute; right: -20px; bottom: -20px; font-size: 10rem; font-weight: 900; color: rgba(46,139,87,0.03); font-family: var(--font-sans); pointer-events: none;">
                    03</div>
                <div class="pillar-tag"
                    style="color: #2E8B57; font-weight: 800; letter-spacing: 3px; font-size: 0.65rem; margin-bottom: 1.5rem; text-transform: uppercase;">
                    Social Responsibility</div>
                <h3 style="font-size: 1.8rem; margin-bottom: 1.5rem;">Global Impact</h3>
                <p style="color: #666; font-size: 0.95rem; line-height: 1.8;">Dedicated to empowering the next
                    generation of leaders through modern management thinking and thought-provoking storytelling.</p>
            </div>
        </div>

        <style>
            .pillar-edu:hover { box-shadow: 0 30px 60px rgba(0, 71, 171, 0.1); transform: translateY(-10px); }
            .pillar-prof:hover { box-shadow: 0 30px 60px rgba(196, 30, 58, 0.1); transform: translateY(-10px); }
            .pillar-social:hover { box-shadow: 0 30px 60px rgba(46, 139, 87, 0.1); transform: translateY(-10px); }

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
                .about-pillars::-webkit-scrollbar { display: none; }
                .pillar-card {
                    min-width: 85vw;
                    scroll-snap-align: center;
                    margin: 0 !important;
                }
            }
        </style>
    </section>

    <!-- Journey Section: Dynamic Photo Timeline -->
    <section id="journey" style="padding: 15vh 0; overflow: hidden; background: #fff;">
        <style>
            @media (max-width: 992px) {
                #journey { display: none !important; }
            }
            @media (max-width: 1024px) {
                #journey .journey-header {
                    padding: 8rem 1.5rem 4rem !important;
                    background: #000;
                }

                #journey .journey-header h2 {
                    color: #fff !important;
                }
            }
        </style>
        <div class="container journey-header">
            <div style="text-align: center; margin-bottom: 8rem;" class="reveal">
                <div class="side-tag"
                    style="color: var(--gold); letter-spacing: 5px; margin-bottom: 1.5rem; display: block;">THE
                    EVOLUTION</div>
                <h2 style="font-size: clamp(3.5rem, 7vw, 5.5rem); line-height: 1; color: #000; letter-spacing: -2px;">A
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
                box-shadow: 0 0 0 8px rgba(0, 0, 0, 0.05);
            }

            /* Card Content Styling */
            .timeline-content {
                background: #fff;
                border-radius: 12px;
                overflow: hidden;
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.05);
                border: 1px solid rgba(0, 0, 0, 0.03);
                transition: transform 0.5s ease, box-shadow 0.5s ease;
            }

            .timeline-content:hover {
                transform: translateY(-10px);
                box-shadow: 0 40px 80px rgba(0, 0, 0, 0.1);
            }

            .timeline-img {
                width: 100%;
                height: 300px;
                overflow: hidden;
                position: relative;
            }

            .timeline-img img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: transform 0.8s ease;
            }

            .timeline-content:hover .timeline-img img {
                transform: scale(1.05);
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

            /* Mobile Optimization */
            /* Mobile Optimization (Accordion Timeline) */
            @media (max-width: 992px) {
                .timeline-line { display: none; }

                .timeline-card {
                    width: 100%;
                    left: 0 !important;
                    margin-bottom: 1rem;
                }

                .timeline-dot { display: none !important; }

                .timeline-content {
                    border: 1px solid rgba(0,0,0,0.05);
                    box-shadow: 0 5px 15px rgba(0,0,0,0.02);
                    border-radius: 8px;
                    overflow: hidden;
                    background: #fff;
                    cursor: pointer;
                    position: relative;
                    transition: all 0.3s ease;
                }

                .timeline-img,
                .timeline-text p {
                    display: none;
                }

                .timeline-text {
                    padding: 1.5rem 3rem 1.5rem 1.5rem;
                    position: relative;
                }

                .timeline-text::after {
                    content: '+';
                    position: absolute;
                    right: 20px;
                    top: 50%;
                    transform: translateY(-50%);
                    font-size: 2rem;
                    color: var(--theme-color);
                    transition: 0.3s;
                }

                .timeline-card.accordion-open .timeline-text::after {
                    content: '−';
                }

                .timeline-card.accordion-open .timeline-img,
                .timeline-card.accordion-open .timeline-text p {
                    display: block;
                    animation: fadeInAccordion 0.4s ease forwards;
                }

                .timeline-year { margin-bottom: 0.5rem; font-size: 0.7rem; }
                .timeline-text h4 { margin-bottom: 0; font-size: 1.4rem; padding-right: 10px; }

                @keyframes fadeInAccordion {
                    from { opacity: 0; transform: translateY(-10px); }
                    to { opacity: 1; transform: translateY(0); }
                }
            }
        </style>

        <div class="timeline-container">
            <div class="timeline-line">
                <div class="timeline-progress"></div>
            </div>

            <div class="timeline-card" style="--theme-color: #2E8B57;">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <div class="timeline-img shimmer">
                        <img src="https://images.unsplash.com/photo-1523050335102-c32509142270?auto=format&fit=crop&q=80&w=1000"
                            alt="Foundation">
                    </div>
                    <div class="timeline-text">
                        <div class="timeline-year">1996 – 2011 · Foundation</div>
                        <h4>Early Life & Schooling</h4>
                        <p>Born in India (1996). Proud alumnus of Mayo College boarding school (2008). Chess Champion &
                            WazirChand Trophy winner (2011).</p>
                    </div>
                </div>
            </div>

            <div class="timeline-card" style="--theme-color: #C41E3A;">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <div class="timeline-img shimmer">
                        <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&q=80&w=1000"
                            alt="Global Service">
                    </div>
                    <div class="timeline-text">
                        <div class="timeline-year">2013 – 2017 · Global Service</div>
                        <h4>Rise in Rotary International</h4>
                        <p>RYLA Participant (2013). Joined Rotaract (2014). Charter President (2015). District Rotaract
                            Representative & RI Atlanta Convention (2017).</p>
                    </div>
                </div>
            </div>

            <div class="timeline-card" style="--theme-color: #0047AB;">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <div class="timeline-img shimmer">
                        <img src="https://images.unsplash.com/photo-1507679799987-c73779587ccf?auto=format&fit=crop&q=80&w=1000"
                            alt="Career Beginnings">
                    </div>
                    <div class="timeline-text">
                        <div class="timeline-year">2015 · Career Beginnings</div>
                        <h4>Early Professional Life</h4>
                        <p>Entered the workforce and began his professional journey, establishing the foundation of his
                            career alongside ongoing studies and service commitments.</p>
                    </div>
                </div>
            </div>

            <div class="timeline-card" style="--theme-color: #2E8B57;">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <div class="timeline-img shimmer">
                        <img src="https://images.unsplash.com/photo-1541339907198-e08756dedf3f?auto=format&fit=crop&q=80&w=1000"
                            alt="Global Academics">
                    </div>
                    <div class="timeline-text">
                        <div class="timeline-year">2017 – 2021 · Global Academics</div>
                        <h4>Simon Business School & MBA</h4>
                        <p>B.Com (2017). Left India at age 23 (2019). MS Finance (2020). MBA Finance (2021) — Dean's
                            List & Networking Coach.</p>
                    </div>
                </div>
            </div>

            <div class="timeline-card" style="--theme-color: #C41E3A;">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <div class="timeline-img shimmer">
                        <img src="https://images.unsplash.com/photo-1560523160-754a9e25c68f?auto=format&fit=crop&q=80&w=1000"
                            alt="Leadership Impact">
                    </div>
                    <div class="timeline-text">
                        <div class="timeline-year">2018 – 2020 · Leadership Impact</div>
                        <h4>President, Rotaract South Asia</h4>
                        <p>RI Toronto (2018). RI Hamburg & 'Best DRR' Award (2019). Led 200,000+ members across 8
                            countries. Chairman, Rotasia Delhi 2020.</p>
                    </div>
                </div>
            </div>

            <div class="timeline-card" style="--theme-color: #0047AB;">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <div class="timeline-img shimmer">
                        <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&q=80&w=1000"
                            alt="Professional Strategy">
                    </div>
                    <div class="timeline-text">
                        <div class="timeline-year">2021 Onward · Strategy</div>
                        <h4>Professional Excellence</h4>
                        <p>Experience at Grant Thornton, Morgan Stanley, and Boutique M&A firms in NY. Career Advisor &
                            AD at University of Rochester.</p>
                    </div>
                </div>
            </div>

            <div class="timeline-card" style="--theme-color: #2E8B57;">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <div class="timeline-img shimmer">
                        <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?auto=format&fit=crop&q=80&w=1000"
                            alt="The Vision">
                    </div>
                    <div class="timeline-text">
                        <div class="timeline-year">2027 · The Doctoral Vision</div>
                        <h4>Education 2.0 & Beyond</h4>
                        <p>Pursuing Ed.D. Award: Education 2.0 (Las Vegas). Co-Chair: HE Students Association. Alumni of
                            Simon & Mayo College.</p>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const cards = document.querySelectorAll('.timeline-card');
                const progress = document.querySelector('.timeline-progress');
                const timelineContainer = document.querySelector('.timeline-container');

                const updateTimeline = () => {
                    if (!timelineContainer) return;
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
                };

                window.addEventListener('scroll', updateTimeline);
                updateTimeline();

                // Mobile Accordion Logic
                if (window.innerWidth <= 992) {
                    cards.forEach(card => {
                        card.addEventListener('click', function() {
                            // Close others
                            cards.forEach(c => {
                                if(c !== this) c.classList.remove('accordion-open');
                            });
                            // Toggle current
                            this.classList.toggle('accordion-open');
                        });
                    });
                }
            });
        </script>
    </section>





    <!-- Sleek Contact CTA -->
    <section id="contact" class="container reveal" style="padding: 10vh 0; text-align: center;">
        <div style="background: #f5f5f7; border-radius: 24px; padding: 6rem 2rem; max-width: 800px; margin: 0 auto; box-shadow: 0 10px 30px rgba(0,0,0,0.02);">
            <div class="side-tag" style="color: var(--gold); font-weight: 800; letter-spacing: 4px; margin-bottom: 1.5rem; display: block; text-transform: uppercase; font-size: 0.75rem;">
                Let's Connect
            </div>
            <h2 style="font-family: var(--font-sans); font-size: clamp(2.5rem, 5vw, 4rem); font-weight: 800; letter-spacing: -2px; margin-bottom: 2rem; color: #111; line-height: 1.1;">
                Write the Next<br>Chapter Together.
            </h2>
            <p style="font-size: 1.1rem; color: #555; max-width: 500px; margin: 0 auto 3rem auto; line-height: 1.6;">
                Whether for speaking engagements, mentorship, or literary inquiries, Manuj is always open to starting a new conversation.
            </p>
            <a href="contact.php" class="btn-apple-primary" style="display: inline-block; background: #000; color: #fff; text-decoration: none; padding: 1.2rem 3rem; border-radius: 50px; font-weight: 600; font-size: 1rem;">
                Get in Touch
            </a>
        </div>
    </section>
        <!-- Impact by the Numbers -->
        <section class="stats-section container"
            style="padding: 8vh 0; text-align: center; border-top: 1px solid #eee;">
            <style>
                @media (max-width: 992px) {
                    .stats-section { display: none !important; }
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
        <section class="quotes-section"
            style="padding: 10vh 0; background: #fafafa; position: relative; overflow: hidden;">
            <div
                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; opacity: 0.03; pointer-events: none; background-image: url('https://www.transparenttextures.com/patterns/cubes.png');">
            </div>
            <div class="container" style="text-align: center; max-width: 900px; position: relative; z-index: 2;">
                <div class="quote-slider" style="position: relative; min-height: 300px;">
                    <div class="quote-slide active"
                        style="transition: all 1s ease; opacity: 1; position: absolute; width: 100%;">
                        <p
                            style="font-family: var(--font-serif); font-size: 2.8rem; font-style: italic; line-height: 1.3; margin-bottom: 3rem; color: #111;">
                            "Purpose defines strategy."</p>
                        <div class="quote-signature"
                            style="font-family: 'Mrs Saint Delafield', cursive; font-size: 3.5rem; color: var(--gold);">
                            Manuj Mittal</div>
                    </div>
                    <div class="quote-slide"
                        style="transition: all 1s ease; opacity: 0; position: absolute; width: 100%; transform: translateY(20px); pointer-events: none;">
                        <p
                            style="font-family: var(--font-serif); font-size: 2.8rem; font-style: italic; line-height: 1.3; margin-bottom: 3rem; color: #111;">
                            "Leadership is the art of giving people a platform for spread their own wings."</p>
                        <div class="quote-signature"
                            style="font-family: 'Mrs Saint Delafield', cursive; font-size: 3.5rem; color: var(--gold);">
                            Manuj Mittal</div>
                    </div>
                    <div class="quote-slide"
                        style="transition: all 1s ease; opacity: 0; position: absolute; width: 100%; transform: translateY(20px); pointer-events: none;">
                        <p
                            style="font-family: var(--font-serif); font-size: 2.8rem; font-style: italic; line-height: 1.3; margin-bottom: 3rem; color: #111;">
                            "Vision is not seeing things as they are, but as they will be."</p>
                        <div class="quote-signature"
                            style="font-family: 'Mrs Saint Delafield', cursive; font-size: 3.5rem; color: var(--gold);">
                            Manuj Mittal</div>
                    </div>
                </div>
            </div>
        </section>

        <script>
            document.addEventListener('DOMContentLoaded', () => {

                // Quote Slider Animation
                const slides = document.querySelectorAll('.quote-slide');
                let currentSlide = 0;
                setInterval(() => {
                    slides[currentSlide].style.opacity = '0';
                    slides[currentSlide].style.transform = 'translateY(-20px)';
                    slides[currentSlide].style.pointerEvents = 'none';

                    currentSlide = (currentSlide + 1) % slides.length;

                    slides[currentSlide].style.opacity = '1';
                    slides[currentSlide].style.transform = 'translateY(0)';
                    slides[currentSlide].style.pointerEvents = 'auto';
                }, 5000);
            });
        </script>

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