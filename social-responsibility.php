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
        opacity: 0;
        animation: slideUpFade 1s cubic-bezier(0.16, 1, 0.3, 1) forwards;
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
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
                Global Impact
            </div>
            <h1 class="hero-title">Civic Duty & Youth Empowerment</h1>
            <p class="hero-quote">
                "Leadership is not a privilege of position; it is a debt we pay to our communities. Inspiring and building the next generation is the ultimate standard of service."
            </p>
        </div>

        <!-- Editorial Content -->
        <div class="article-content">
            <p class="article-text" style="font-size: 1.35rem; color: #222;">
                <span class="drop-cap">T</span>rue leadership is measured by its service to society. Beyond professional accomplishments, Manuj Mittal's journey is defined by a deep-seated commitment to civic responsibility, youth mentorship, and community-driven impact.
            </p>
            <p class="article-text">
                Through his extensive association with <strong>Rotary International</strong> and <strong>Rotaract</strong>, Manuj has initiated, directed, and completed numerous community development projects across India and the United States. His work focus centers on leveraging structured organization and administrative efficiency to maximize social outcomes, whether building local educational pathways or orchestrating regional collaboration programs.
            </p>
            <p class="article-text">
                Manuj is particularly dedicated to bridging mentorship gaps for aspiring young leaders. Through speaking, writing, and direct coaching, he helps students and early-career professionals develop a principled approach to power, ambition, and ethical leadership, encouraging independent critical thinking in civic and personal contexts.
            </p>
        </div>

        <!-- Bento Grid -->
        <div class="bento-grid">
            
            <div class="bento-card col-span-12 card-featured">
                <h3 class="card-title" style="font-size: 2.2rem; font-style: italic; font-weight: 400; max-width: 800px; margin: 0 auto 16px;">
                    "The most durable change starts from the ground up, built on a foundation of trust, empathy, and collaborative effort."
                </h3>
                <p style="text-transform: uppercase; letter-spacing: 3px; opacity: 0.7; font-size: 0.85rem; font-weight: 600;">Service Philosophy</p>
            </div>
            
            <div class="bento-card col-span-6">
                <div class="card-icon">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="2" y1="12" x2="22" y2="12"></line>
                        <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                    </svg>
                </div>
                <h3 class="card-title">Civic Leadership</h3>
                <p class="card-text" style="margin-bottom: 8px;"><strong>Rotary & Rotaract</strong></p>
                <p class="card-text" style="font-size: 1rem;">Served in various leadership roles to coordinate service campaigns, foster global understanding, and fund community initiatives.</p>
            </div>

            <div class="bento-card col-span-6">
                <div class="card-icon">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                </div>
                <h3 class="card-title">Development</h3>
                <p class="card-text" style="margin-bottom: 8px;"><strong>Youth Mentorship</strong></p>
                <p class="card-text" style="font-size: 1rem;">Leading workshops and personal strategy sessions to empower students with critical management and leadership thinking.</p>
            </div>

            <div class="bento-card col-span-12" style="flex-direction: column;">
                <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 32px;">
                    <div class="card-icon" style="margin-bottom: 0;">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="5"></circle>
                            <line x1="12" y1="1" x2="12" y2="3"></line>
                            <line x1="12" y1="21" x2="12" y2="23"></line>
                            <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                            <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                            <line x1="1" y1="12" x2="3" y2="12"></line>
                            <line x1="21" y1="12" x2="23" y2="12"></line>
                            <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                            <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                        </svg>
                    </div>
                    <h3 class="card-title" style="margin-bottom: 0;">Areas of Action</h3>
                </div>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 24px;">
                    <div style="padding: 32px; background: rgba(255,255,255,0.4); border-radius: 24px; border: 1px solid rgba(255,255,255,0.6); transition: all 0.3s;">
                        <strong style="display: block; margin-bottom: 12px; color: var(--text-main); font-size: 1.15rem;">Next-Gen Leadership Training</strong>
                        <p class="card-text" style="font-size: 1rem;">Establishing frameworks that nurture moral leadership and integrity among students.</p>
                    </div>
                    <div style="padding: 32px; background: rgba(255,255,255,0.4); border-radius: 24px; border: 1px solid rgba(255,255,255,0.6); transition: all 0.3s;">
                        <strong style="display: block; margin-bottom: 12px; color: var(--text-main); font-size: 1.15rem;">Community Outreach</strong>
                        <p class="card-text" style="font-size: 1rem;">Structuring sustainable service campaigns in educational development and economic literacy.</p>
                    </div>
                    <div style="padding: 32px; background: rgba(255,255,255,0.4); border-radius: 24px; border: 1px solid rgba(255,255,255,0.6); transition: all 0.3s;">
                        <strong style="display: block; margin-bottom: 12px; color: var(--text-main); font-size: 1.15rem;">Global Collaborations</strong>
                        <p class="card-text" style="font-size: 1rem;">Connecting youth leaders across borders to collaborate on solving regional development issues.</p>
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
                Back to Pillars
            </a>
        </div>

    </div>
</section>

<?php include 'components/footer.php'; ?>
