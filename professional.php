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
    .blob-2 { bottom: 10%; right: -10%; width: 40vw; height: 40vw; background: rgba(244, 63, 94, 0.1); animation-delay: -5s; }
    
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
        background: linear-gradient(135deg, var(--theme-primary) 0%, #4c0519 100%);
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
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>
                Strategic Leadership
            </div>
            <h1 class="hero-title">Professional Career</h1>
            <p class="hero-quote">
                "Strategy is not a document; it is a dynamic posture. True execution lies in translating complex financial models and corporate directives into clear, human-centered narratives."
            </p>
        </div>

        <!-- Editorial Content -->
        <div class="article-content">
            <p class="article-text" style="font-size: 1.35rem; color: #222;">
                <span class="drop-cap">I</span>n an increasingly complex global economy, leadership requires a double focus: deep technical competency and the communication skills to steer organizations through structural shifts.
            </p>
            <p class="article-text">
                Manuj Mittal has built a solid professional career specializing in corporate finance, operational strategy, and organizational architecture. His experience includes working with institutional finance and risk divisions at global giants like <strong>Morgan Stanley</strong> and strategy consulting at <strong>Grant Thornton</strong>.
            </p>
            <p class="article-text">
                Throughout his professional path in both India and the United States, Manuj has specialized in audit, financial planning, and operational modeling. He is particularly recognized for his ability to translate complex corporate challenges—ranging from asset valuation to change management—into practical roadmaps that business leaders and management teams can execute with alignment and clarity.
            </p>
        </div>

        <!-- Bento Grid -->
        <div class="bento-grid">
            
            <div class="bento-card col-span-12 card-featured">
                <h3 class="card-title" style="font-size: 2.2rem; font-style: italic; font-weight: 400; max-width: 800px; margin: 0 auto 16px;">
                    "Success is not about solving problems in isolation; it is about building structures where teams solve them collaboratively."
                </h3>
                <p style="text-transform: uppercase; letter-spacing: 3px; opacity: 0.7; font-size: 0.85rem; font-weight: 600;">Management Philosophy</p>
            </div>
            
            <div class="bento-card col-span-6">
                <div class="card-icon">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                        <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                    </svg>
                </div>
                <h3 class="card-title">Strategic Advisory</h3>
                <p class="card-text" style="margin-bottom: 8px;"><strong>Grant Thornton</strong></p>
                <p class="card-text" style="font-size: 1rem;">Advised organizations on strategy, change management, audit preparation, and corporate financial structures.</p>
            </div>

            <div class="bento-card col-span-6">
                <div class="card-icon">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="4" y="10" width="4" height="10"></rect>
                        <rect x="10" y="10" width="4" height="10"></rect>
                        <rect x="16" y="10" width="4" height="10"></rect>
                        <polygon points="12 2 2 8 22 8"></polygon>
                    </svg>
                </div>
                <h3 class="card-title">Institutional Finance</h3>
                <p class="card-text" style="margin-bottom: 8px;"><strong>Morgan Stanley</strong></p>
                <p class="card-text" style="font-size: 1rem;">Analyzed financial data, structured reporting metrics, and supported operations inside major global markets divisions.</p>
            </div>

            <div class="bento-card col-span-12" style="flex-direction: column;">
                <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 32px;">
                    <div class="card-icon" style="margin-bottom: 0;">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                            <polyline points="2 17 12 22 22 17"></polyline>
                            <polyline points="2 12 12 17 22 12"></polyline>
                        </svg>
                    </div>
                    <h3 class="card-title" style="margin-bottom: 0;">Core Competencies</h3>
                </div>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 24px;">
                    <div style="padding: 32px; background: rgba(255,255,255,0.4); border-radius: 24px; border: 1px solid rgba(255,255,255,0.6); transition: all 0.3s;">
                        <strong style="display: block; margin-bottom: 12px; color: var(--text-main); font-size: 1.15rem;">Financial Strategy & Modeling</strong>
                        <p class="card-text" style="font-size: 1rem;">Designing robust financial frameworks to map institutional growth and risk profiles.</p>
                    </div>
                    <div style="padding: 32px; background: rgba(255,255,255,0.4); border-radius: 24px; border: 1px solid rgba(255,255,255,0.6); transition: all 0.3s;">
                        <strong style="display: block; margin-bottom: 12px; color: var(--text-main); font-size: 1.15rem;">Operational Consulting</strong>
                        <p class="card-text" style="font-size: 1rem;">Auditing operational systems to streamline processes and maximize corporate agility.</p>
                    </div>
                    <div style="padding: 32px; background: rgba(255,255,255,0.4); border-radius: 24px; border: 1px solid rgba(255,255,255,0.6); transition: all 0.3s;">
                        <strong style="display: block; margin-bottom: 12px; color: var(--text-main); font-size: 1.15rem;">Change Management</strong>
                        <p class="card-text" style="font-size: 1rem;">Leading cross-functional teams through mergers, technological transitions, and strategic re-alignments.</p>
                    </div>
                </div>
            </div>

        </div>

        <!-- CTA -->
        <div class="cta-container">
            <a href="index.php#about" class="btn-back">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M19 12H5M12 19l-7-7 7-7"/>
                </svg>
                Back to Foundation
            </a>
        </div>

    </div>
</section>

<?php include 'components/footer.php'; ?>