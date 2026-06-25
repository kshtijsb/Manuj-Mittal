<?php
require_once 'includes/data.php';
$page_title = "Education | Manuj Mittal";
include 'components/header.php';
?>

<style>
    :root {
        --theme-primary: #2563eb;
        --theme-secondary: #3b82f6;
        --theme-glow: rgba(37, 99, 235, 0.15);
        --theme-glow-strong: rgba(37, 99, 235, 0.4);
        --bg-main: #f8fafc;
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
    }
    .blob-1 { top: -10%; left: -10%; width: 50vw; height: 50vw; background: var(--theme-glow); }
    .blob-2 { bottom: 10%; right: -10%; width: 40vw; height: 40vw; background: rgba(59, 130, 246, 0.1); animation-delay: -5s; }
    
    @keyframes floatBlob {
        0% { transform: translate(0, 0) scale(1); }
        100% { transform: translate(5%, 5%) scale(1.1); }
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
        opacity: 0;
        animation: slideUpFade 1s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }
    .hero-tagline {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 20px;
        background: rgba(37, 99, 235, 0.08);
        border: 1px solid rgba(37, 99, 235, 0.2);
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
        font-size: clamp(3rem, 8vw, 5rem);
        font-weight: 800;
        color: var(--text-main);
        line-height: 1.05;
        letter-spacing: -0.03em;
        margin-bottom: 32px;
        font-family: 'Times New Roman', Times, serif;
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
        opacity: 0;
        animation: slideUpFade 1s cubic-bezier(0.16, 1, 0.3, 1) 0.2s forwards;
    }
    .article-text {
        font-size: 1.15rem;
        line-height: 1.8;
        color: var(--text-muted);
        margin-bottom: 2rem;
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
        opacity: 0;
        animation: slideUpFade 1s cubic-bezier(0.16, 1, 0.3, 1) 0.4s forwards;
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
        top: 0; left: -100%;
        width: 50%; height: 100%;
        background: linear-gradient(to right, rgba(255,255,255,0) 0%, rgba(255,255,255,0.4) 50%, rgba(255,255,255,0) 100%);
        transform: skewX(-20deg);
        transition: 0.7s ease;
    }
    .bento-card:hover::after {
        left: 200%;
    }

    .col-span-12 { grid-column: span 12; }
    .col-span-8 { grid-column: span 8; }
    .col-span-5 { grid-column: span 5; }
    .col-span-7 { grid-column: span 7; }

    @media (max-width: 900px) {
        .col-span-8, .col-span-5, .col-span-7 { grid-column: span 12; }
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
        background: linear-gradient(135deg, var(--theme-primary) 0%, #0f172a 100%);
        color: white;
        text-align: center;
        border: none;
    }
    .card-featured::after { display: none; } /* Disable shine on dark card */
    .card-featured .card-title, .card-featured .card-text {
        color: white;
    }

    /* Back Button */
    .cta-container {
        text-align: center;
        margin-top: 80px;
        opacity: 0;
        animation: slideUpFade 1s cubic-bezier(0.16, 1, 0.3, 1) 0.6s forwards;
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
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
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

    @keyframes slideUpFade {
        from { opacity: 0; transform: translateY(50px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<section class="pillar-detail-page">
    <div class="ambient-blob blob-1"></div>
    <div class="ambient-blob blob-2"></div>
    
    <div class="glass-container">
        
        <!-- Hero Section -->
        <div class="hero-wrapper">
            <div class="hero-tagline">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
                Academic Excellence
            </div>
            <h1 class="hero-title">Intellectual Foundations</h1>
            <p class="hero-quote">
                "True education is not the learning of facts, but the training of the mind to think critically, lead ethically, and execute strategically."
            </p>
        </div>

        <!-- Editorial Content -->
        <div class="article-content">
            <p class="article-text" style="font-size: 1.35rem; color: #222;">
                <span class="drop-cap">A</span>cademic training is the bedrock of strategic foresight. Manuj Mittal's educational journey combines the rigorous, structured heritage of premier Indian institutions with the analytical, market-driven business perspective of top-tier American business schools.
            </p>
            <p class="article-text">
                As an alumnus of <strong>Mayo College</strong> (Ajmer, India), Manuj imbibed early lessons in character, discipline, and cooperative leadership. This foundation set the stage for advanced quantitative specialization, earning a Master's degree in Finance and subsequently an MBA from the renowned <strong>Simon Business School</strong> at the University of Rochester—an institution famous for its rigorous economics-based curriculum.
            </p>
            <p class="article-text">
                Believing that learning is an active, lifelong endeavor, Manuj is currently pursuing a <strong>Doctor of Education (Ed.D.)</strong> at the University of Rochester. His doctoral work centers on bridging the gap between management thinking and next-generation leadership development, examining how educational frameworks can evolve to meet the complex demands of a modern global landscape.
            </p>
        </div>

        <!-- Bento Grid -->
        <div class="bento-grid">
            
            <div class="bento-card col-span-12 card-featured">
                <h3 class="card-title" style="font-size: 2.2rem; font-style: italic; font-weight: 400; max-width: 800px; margin: 0 auto 16px;">
                    "Academic credentials are keys, but true education is measured by the ability to unlock potential in others."
                </h3>
                <p style="text-transform: uppercase; letter-spacing: 3px; opacity: 0.7; font-size: 0.85rem; font-weight: 600;">Educational Philosophy</p>
            </div>
            
            <div class="bento-card col-span-5">
                <div class="card-icon">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M3 21h18M5 21V7l7-4 7 4v14M9 21v-5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v5" />
                    </svg>
                </div>
                <h3 class="card-title">Secondary Education</h3>
                <p class="card-text" style="margin-bottom: 8px;"><strong>Mayo College, Ajmer</strong></p>
                <p class="card-text" style="font-size: 1rem;">Learned the values of self-governance, athletic discipline, and cultural depth in India's leading heritage school.</p>
            </div>

            <div class="bento-card col-span-7">
                <div class="card-icon">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                    </svg>
                </div>
                <h3 class="card-title">Business & Finance</h3>
                <p class="card-text" style="margin-bottom: 8px;"><strong>MBA, Simon Business School</strong></p>
                <p class="card-text" style="font-size: 1rem;">Specialized in finance, analytical decision models, and economic strategy at the University of Rochester. Mastered the intersection of economic theory and practical financial application.</p>
            </div>

            <div class="bento-card col-span-12" style="flex-direction: row; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 32px;">
                <div style="flex: 1; min-width: 300px;">
                    <div class="card-icon">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 10v6M2 10l10-5 10 5-10 5z"></path>
                            <path d="M6 12v5c3 3 9 3 12 0v-5"></path>
                        </svg>
                    </div>
                    <h3 class="card-title">Advanced Research</h3>
                    <p class="card-text"><strong>Doctor of Education (Ed.D.) Candidate</strong></p>
                </div>
                <div style="flex: 2; min-width: 300px;">
                    <p class="card-text" style="font-size: 1.1rem; border-left: 2px solid var(--theme-primary); padding-left: 24px;">
                        Currently focusing doctoral studies at the University of Rochester on organizational leadership, executive training models, and pedagogical methods that prepare young leaders for modern operational realities.
                    </p>
                </div>
            </div>

        </div>

        <!-- CTA -->
        <div class="cta-container">
            <a href="index.php#about" class="btn-back">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M19 12H5M12 19l-7-7 7-7"/>
                </svg>
                Back to Pillars
            </a>
        </div>

    </div>
</section>

<?php include 'components/footer.php'; ?>
