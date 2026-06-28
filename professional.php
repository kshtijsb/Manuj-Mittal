<?php
require_once 'includes/data.php';
$page_title = "Professional | Manuj Mittal";
include 'components/header.php';
?>

<style>
    :root {
        --theme-primary: #e11d48;
        --theme-secondary: #f43f5e;
        --theme-glow: rgba(225, 29, 72, 0.15);
        --theme-glow-strong: rgba(225, 29, 72, 0.4);
        --bg-main: #ffffff;
        --card-bg: rgba(255, 255, 255, 0.7);
        --text-main: #0f172a;
        --text-muted: #475569;
    }

    body {
        background-color: var(--bg-main);
    }

    .pillar-detail-page {
        position: relative;
        min-height: 100vh;
        overflow-x: hidden;
        padding: 150px 0 120px 0;
    }

    /* Ambient Blobs */
    .ambient-blob {
        position: absolute;
        border-radius: 50%;
        filter: blur(100px);
        z-index: 0;
        animation: floatBlob 15s infinite alternate cubic-bezier(0.4, 0, 0.2, 1);
        pointer-events: none;
        display: none !important;
    }

    .blob-1 {
        top: -10%;
        left: -10%;
        width: 50vw;
        height: 50vw;
        background: var(--theme-glow);
    }

    .blob-2 {
        bottom: 10%;
        right: -10%;
        width: 40vw;
        height: 40vw;
        background: rgba(244, 63, 94, 0.1);
        animation-delay: -5s;
    }

    @keyframes floatBlob {
        0% {
            transform: translate(0, 0) scale(1);
        }

        100% {
            transform: translate(5%, 5%) scale(1.1);
        }
    }

    .glass-container {
        position: relative;
        z-index: 1;
        max-width: 1100px;
        margin: 0 auto;
        padding: 0 24px;
    }

    /* Hero Section */
    .hero-wrapper {
        text-align: center;
        margin-bottom: 80px;
    }

    .hero-tagline {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 20px;
        background: rgba(225, 29, 72, 0.08);
        border: 1px solid rgba(225, 29, 72, 0.2);
        color: var(--theme-primary);
        border-radius: 50px;
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase;
        font-size: 0.8rem;
        margin-bottom: 24px;
        backdrop-filter: blur(10px);
    }

    .hero-title {
        font-size: clamp(1.5rem, 5vw, 3rem);
        font-weight: 800;
        color: var(--text-main);
        line-height: 1.05;
        letter-spacing: 8px;
        margin-bottom: 32px;
        font-family: 'Times New Roman', Times, serif;
        text-transform: uppercase;
        white-space: nowrap;
    }

    .hero-quote {
        font-size: 1.4rem;
        color: var(--text-muted);
        font-style: italic;
        max-width: 800px;
        margin: 0 auto;
        line-height: 1.6;
        font-family: 'Times New Roman', Times, serif;
    }

    /* Content Area */
    .article-content {
        max-width: 800px;
        margin: 0 auto 80px;
    }

    .article-text {
        font-size: 1.15rem;
        line-height: 1.8;
        color: var(--text-muted);
        margin-bottom: 2rem;
        text-align: justify;
    }

    .article-content p:not(:first-child) {
        text-indent: 3rem;
    }

    .article-text strong {
        color: var(--text-main);
    }

    .drop-cap {
        float: left;
        font-family: 'Times New Roman', Times, serif;
        font-size: 4.5rem;
        font-weight: 800;
        color: var(--theme-primary);
        line-height: 0.8;
        margin-right: 16px;
        margin-top: 8px;
        text-shadow: 0 4px 12px var(--theme-glow);
    }

    /* Modern Bento Grid */
    .bento-grid {
        display: grid;
        grid-template-columns: repeat(12, 1fr);
        gap: 24px;
    }

    .bento-card {
        background: var(--card-bg);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.8);
        border-radius: 32px;
        padding: 48px;
        transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
        box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.05);
        position: relative;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .bento-card:hover {
        transform: translateY(-8px) scale(1.01);
        box-shadow: 0 20px 40px var(--theme-glow);
        border-color: rgba(255, 255, 255, 1);
    }

    /* Shine effect on hover */
    .bento-card::after {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 50%;
        height: 100%;
        background: linear-gradient(to right, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.4) 50%, rgba(255, 255, 255, 0) 100%);
        transform: skewX(-20deg);
        transition: 0.7s ease;
    }

    .bento-card:hover::after {
        left: 200%;
    }

    .col-span-12 {
        grid-column: span 12;
    }

    .col-span-6 {
        grid-column: span 6;
    }

    @media (max-width: 900px) {
        .col-span-6 {
            grid-column: span 12;
        }
    }

    .card-icon {
        width: 56px;
        height: 56px;
        border-radius: 16px;
        background: var(--theme-glow);
        color: var(--theme-primary);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 24px;
        transition: transform 0.3s ease;
    }

    .bento-card:hover .card-icon {
        transform: scale(1.1) rotate(5deg);
    }

    .card-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--text-main);
        margin-bottom: 12px;
        font-family: 'Times New Roman', Times, serif;
        letter-spacing: -0.01em;
    }

    .card-text {
        font-size: 1.1rem;
        color: var(--text-muted);
        line-height: 1.6;
    }

    .card-featured {
        background: linear-gradient(135deg, var(--theme-primary) 0%, #4c0519 100%);
        color: white;
        text-align: center;
        border: none;
    }

    .card-featured::after {
        display: none;
    }

    .card-featured .card-title,
    .card-featured .card-text {
        color: white;
    }

    /* Back Button */
    .cta-container {
        text-align: center;
        margin-top: 80px;
    }

    .btn-back {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        padding: 16px 36px;
        background: #000;
        color: var(--gold);
        text-decoration: none;
        border-radius: 0;
        font-weight: 600;
        font-size: 1rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid var(--gold);
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .btn-back:hover {
        background: var(--gold);
        color: #000;
        transform: translateY(-4px);
        box-shadow: 0 15px 30px rgba(197, 160, 89, 0.3);
    }

    .btn-back svg {
        transition: transform 0.3s ease;
    }

    .btn-back:hover svg {
        transform: translateX(-4px);
    }

    

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<section class="pillar-detail-page">
    <div class="ambient-blob blob-1"></div>
    <div class="ambient-blob blob-2"></div>

    <div class="glass-container">

        <!-- Hero Section -->
        <div class="hero-wrapper">
            <div class="hero-tagline">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z" />
                </svg>
                Strategic Leadership
            </div>
            <h1 class="hero-title">PROFESSIONAL CAREER</h1>
        </div>

        <!-- Editorial Content -->
        <div class="article-content">
            <p class="article-text" style="font-size: 1.25rem; color: #222;">
                <span class="drop-cap">MJ's</span> professional journey demonstrates a unique combination of financial
                expertise, leadership development, and higher education practice. His early career was rooted in
                finance, accounting, and consulting, where he gained experience across investment banking, valuations,
                mergers and acquisitions, auditing, and financial advisory services. These roles provided exposure to
                complex business environments while strengthening his analytical thinking, problem-solving abilities,
                and commitment to client service.
            </p>
            <p class="article-text">
                His professional experience spans both India and the United States, including positions with globally
                recognized organizations such as Morgan Stanley and Grant Thornton. Working across international markets
                broadened his understanding of organizational strategy, financial decision-making, and stakeholder
                engagement.
            </p>
            <p class="article-text">
                Driven by a passion for mentoring and developing future leaders, Manuj transitioned into higher
                education, where he found a meaningful intersection between leadership, coaching, and student success.
                As a Career Advisor at the University of Rochester, he has guided graduate students in career planning,
                employer engagement, networking strategies, and professional development. He also helped design and
                co-instructed the graduate course ‘Career Strategy and Professional Readiness’ (14-week, 1-credit
                course), equipping students with practical skills to successfully navigate today's evolving employment
                landscape.
            </p>
            <p class="article-text">
                His professional journey continues to expand through leadership roles within Residential Life and
                Housing and as a boys’ summer soccer camp coach, allowing him to support students both inside and
                outside the classroom. Across every position, Manuj has remained committed to empowering individuals,
                building meaningful relationships, and creating environments where people can achieve their fullest
                potential.
            </p>
        </div>


        <!-- CTA -->
        <div class="cta-container">
            <a href="index#about" class="btn-back">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M19 12H5M12 19l-7-7 7-7" />
                </svg>
                Back to Pillars
            </a>
        </div>

    </div>
</section>

<?php include 'components/footer.php'; ?>