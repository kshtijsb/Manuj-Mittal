<?php
require_once 'includes/data.php';
$page_title = "Social Responsibility | Manuj Mittal";
include 'components/header.php';
?>

<style>
    :root {
        --theme-primary: #10b981;
        --theme-secondary: #34d399;
        --theme-glow: rgba(16, 185, 129, 0.15);
        --theme-glow-strong: rgba(16, 185, 129, 0.4);
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
    .blob-2 { bottom: 10%; right: -10%; width: 40vw; height: 40vw; background: rgba(52, 211, 153, 0.1); animation-delay: -5s; }
    
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
    }
    .hero-tagline {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 20px;
        background: rgba(16, 185, 129, 0.08);
        border: 1px solid rgba(16, 185, 129, 0.2);
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
        letter-spacing: 4px;
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
    .col-span-6 { grid-column: span 6; }

    @media (max-width: 900px) {
        .col-span-6 { grid-column: span 12; }
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
        background: linear-gradient(135deg, var(--theme-primary) 0%, #064e3b 100%);
        color: white;
        text-align: center;
        border: none;
    }
    .card-featured::after { display: none; }
    .card-featured .card-title, .card-featured .card-text {
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
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
                Global Impact
            </div>
            <h1 class="hero-title">SOCIAL RESPONSIBILITY</h1>
        </div>

        <!-- Editorial Content -->
        <div class="article-content">
            <p class="article-text" style="font-size: 1.25rem; color: #222;">
                <span class="drop-cap">MJ's</span> journey has been defined by a lifelong commitment to serving our communities. Guided by Rotary International's philosophy of ‘Service Above Self’, he began serving through Interact before joining Rotaract in 2014. Over the following decade, he assumed progressively larger leadership responsibilities while working to empower young leaders, strengthen communities, and foster international collaboration.
            </p>
            <p class="article-text">
                His leadership journey included serving as Charter President of a Rotaract club, District Rotaract Representative, and ultimately President of the Rotaract South Asia Multi-District Information Organization. In these capacities, he collaborated with leaders across eight countries, supporting one of the world’s largest youth volunteer networks and contributing to initiatives that impacted nearly 200,000 Rotaractors throughout South Asia.
            </p>
            <p class="article-text">
                MJ's leadership also extended onto the global stage, where he represented India as a youth speaker at Rotary International Conventions (Rotaract Pre-Conventions) in Atlanta 2017, Toronto 2018, and Hamburg 2019, as well as at the Rotary International Assembly in San Diego 2020. These international experiences strengthened his commitment to cross-cultural collaboration, ethical leadership, and sustainable community development. His contributions have been recognized through the ‘ROAR’ Best District Rotaract Representative (DRR) Award, features in Rotary publications, and recognition as a Paul Harris Fellow (RI).
            </p>
            <p class="article-text">
                Today, his vision of service continues beyond volunteer leadership. Through mentoring students, contributing to higher education, authoring books, and advocating for experiential learning, he seeks to inspire individuals to unlock their potential and create lasting social impact. His leadership philosophy centers on empowering others, fostering lifelong learning, and building communities where leadership is measured not by titles held, but by the positive difference created in the lives of others.
            </p>
        </div>


        <!-- CTA -->
        <div class="cta-container">
            <a href="index#about" class="btn-back">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M19 12H5M12 19l-7-7 7-7"/>
                </svg>
                Back to Pillars
            </a>
        </div>

    </div>
</section>

<?php include 'components/footer.php'; ?>
