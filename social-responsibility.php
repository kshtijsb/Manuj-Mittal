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

<style>
/* ═══════════════════════════════════════
   OPTION 4 — Mobile: Compact Single-Column
   Minimal spacing, maximum content density
═══════════════════════════════════════ */
@media (max-width: 768px) {

    /* ── Page top/bottom padding ── */
    .biography-page,
    .pillar-detail-page {
        padding-top: 70px !important;
        padding-bottom: 40px !important;
    }

    /* ── Container side padding ── */
    .container {
        padding-left: 1rem !important;
        padding-right: 1rem !important;
        max-width: 100% !important;
    }

    /* ── Biography: single column hero ── */
    .bio-header-grid {
        display: flex !important;
        flex-direction: column !important;
        gap: 1rem !important;
        margin-bottom: 1.5rem !important;
    }

    /* Biography photo: full width, taller crop */
    .bio-header-grid img {
        width: 100% !important;
        max-width: 100% !important;
        height: 55vw !important;
        object-fit: cover !important;
        object-position: top center !important;
        border-radius: 6px !important;
    }

    /* Biography title alignment */
    .bio-header-left h1,
    .bio-header-left .side-tag {
        text-align: left !important;
    }

    /* Biography quote/lead text */
    .bio-intro-lead {
        font-size: 1rem !important;
        padding-left: 0.8rem !important;
        line-height: 1.65 !important;
        margin-bottom: 0.8rem !important;
    }

    /* Biography body text */
    .biography-page p,
    .bio-body p {
        font-size: 0.95rem !important;
        line-height: 1.75 !important;
        margin-bottom: 0.9rem !important;
    }

    /* ── Pillar pages: glass card ── */
    .glass-container {
        padding: 0.9rem !important;
        border-radius: 6px !important;
        margin-bottom: 1.2rem !important;
    }

    /* ── Pillar page title section ── */
    .page-title-section,
    .pillar-detail-page .container > div:first-child {
        margin-bottom: 1rem !important;
        padding-bottom: 0.8rem !important;
    }

    /* ── Article text ── */
    .article-text {
        font-size: 0.95rem !important;
        line-height: 1.75 !important;
        margin-bottom: 0.9rem !important;
        color: #222 !important;
    }

    /* ── Article content wrapper ── */
    .article-content {
        margin-bottom: 1rem !important;
    }

    /* ── Section headings ── */
    .pillar-detail-page h1,
    .pillar-detail-page h2,
    .pillar-detail-page h3 {
        font-size: clamp(1.3rem, 5vw, 1.8rem) !important;
        line-height: 1.2 !important;
        margin-bottom: 0.6rem !important;
    }

    /* ── Biography headings ── */
    .biography-page h1,
    .biography-page h2 {
        font-size: clamp(1.4rem, 5.5vw, 1.9rem) !important;
        margin-bottom: 0.6rem !important;
    }

    /* ── Tags / labels ── */
    .section-tag,
    .page-tag {
        font-size: 0.7rem !important;
        letter-spacing: 1.5px !important;
        margin-bottom: 0.5rem !important;
    }

    /* ── Timeline / cards ── */
    .timeline-section,
    .cards-section {
        gap: 1rem !important;
    }

    /* ── Stat/highlight blocks ── */
    .stat-row,
    .highlights-row {
        gap: 0.8rem !important;
        margin: 1rem 0 !important;
    }

    /* ── CTA / back button ── */
    .cta-container {
        margin-top: 1.2rem !important;
        margin-bottom: 1.2rem !important;
    }

    .btn-back {
        width: 100% !important;
        justify-content: center !important;
        padding: 12px 1rem !important;
        font-size: 0.82rem !important;
    }

    /* ── Gallery section ── */
    .bio-gallery-section,
    .page-gallery-section {
        margin-top: 2rem !important;
        padding-top: 1.5rem !important;
    }

    /* ── Pillar hero area ── */
    .pillar-detail-page > .container {
        padding-top: 0 !important;
    }

    /* ── General margin resets ── */
    section + section {
        margin-top: 0 !important;
    }

    /* ── Ambient blobs: hide on mobile ── */
    .ambient-blob { display: none !important; }
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



        <!-- Social Responsibility Photo Gallery -->
        <div class="page-gallery-section">
            <div class="page-gallery-header">
                <h2 class="page-gallery-title">Photo Library</h2>
                <p class="page-gallery-sub">Service, Leadership &amp; Recognition</p>
            </div>
            <div class="gallery-filter-bar">
                <button class="gallery-filter-btn active" data-filter="all">All</button>
                <button class="gallery-filter-btn" data-filter="rotaract">Rise in Rotaract</button>
                <button class="gallery-filter-btn" data-filter="rotary">Rise in Rotary</button>
                <button class="gallery-filter-btn" data-filter="awards">Awards &amp; Recognition</button>
            </div>
            <div class="gallery-masonry">
                <div class="gallery-item" data-category="rotaract" data-caption="Rise in Rotaract">
                    <img src="assets/Rise in Rotaract/0_Final1.jpg" alt="Rotaract" loading="lazy">
                    <div class="gallery-item-overlay"><span>Rise in Rotaract</span></div>
                </div>                <div class="gallery-item" data-category="rotaract" data-caption="Rise in Rotaract">
                    <img src="assets/Rise in Rotaract/0_Final2.JPG" alt="Rotaract" loading="lazy">
                    <div class="gallery-item-overlay"><span>Rise in Rotaract</span></div>
                </div>                <div class="gallery-item" data-category="rotaract" data-caption="Rise in Rotaract">
                    <img src="assets/Rise in Rotaract/0_FInal3.jpg" alt="Rotaract" loading="lazy">
                    <div class="gallery-item-overlay"><span>Rise in Rotaract</span></div>
                </div>                <div class="gallery-item" data-category="rotaract" data-caption="Rise in Rotaract">
                    <img src="assets/Rise in Rotaract/0_Final4.JPG" alt="Rotaract" loading="lazy">
                    <div class="gallery-item-overlay"><span>Rise in Rotaract</span></div>
                </div>                <div class="gallery-item" data-category="rotaract" data-caption="Rise in Rotaract">
                    <img src="assets/Rise in Rotaract/0_Final5.JPG" alt="Rotaract" loading="lazy">
                    <div class="gallery-item-overlay"><span>Rise in Rotaract</span></div>
                </div>                <div class="gallery-item" data-category="rotaract" data-caption="Rise in Rotaract">
                    <img src="assets/Rise in Rotaract/0_Final6.JPG" alt="Rotaract" loading="lazy">
                    <div class="gallery-item-overlay"><span>Rise in Rotaract</span></div>
                </div>                <div class="gallery-item" data-category="rotaract" data-caption="Rise in Rotaract">
                    <img src="assets/Rise in Rotaract/0_Final7.jpg" alt="Rotaract" loading="lazy">
                    <div class="gallery-item-overlay"><span>Rise in Rotaract</span></div>
                </div>                <div class="gallery-item" data-category="rotaract" data-caption="Rise in Rotaract">
                    <img src="assets/Rise in Rotaract/0_Final8.jpg" alt="Rotaract" loading="lazy">
                    <div class="gallery-item-overlay"><span>Rise in Rotaract</span></div>
                </div>                <div class="gallery-item" data-category="rotary" data-caption="Rise in Rotary">
                    <img src="assets/Rise in Rotary/0_Final1.JPG" alt="Rotary" loading="lazy">
                    <div class="gallery-item-overlay"><span>Rise in Rotary</span></div>
                </div>                <div class="gallery-item" data-category="rotary" data-caption="Rise in Rotary">
                    <img src="assets/Rise in Rotary/0_Final2.JPG" alt="Rotary" loading="lazy">
                    <div class="gallery-item-overlay"><span>Rise in Rotary</span></div>
                </div>                <div class="gallery-item" data-category="rotary" data-caption="Rise in Rotary">
                    <img src="assets/Rise in Rotary/0_Final3.JPG" alt="Rotary" loading="lazy">
                    <div class="gallery-item-overlay"><span>Rise in Rotary</span></div>
                </div>                <div class="gallery-item" data-category="rotary" data-caption="Rise in Rotary">
                    <img src="assets/Rise in Rotary/0_Final4 - Edited.jpg" alt="Rotary" loading="lazy">
                    <div class="gallery-item-overlay"><span>Rise in Rotary</span></div>
                </div>                <div class="gallery-item" data-category="rotary" data-caption="Rise in Rotary">
                    <img src="assets/Rise in Rotary/0_Final5.JPG" alt="Rotary" loading="lazy">
                    <div class="gallery-item-overlay"><span>Rise in Rotary</span></div>
                </div>                <div class="gallery-item" data-category="rotary" data-caption="Rise in Rotary">
                    <img src="assets/Rise in Rotary/0_Final6.JPG" alt="Rotary" loading="lazy">
                    <div class="gallery-item-overlay"><span>Rise in Rotary</span></div>
                </div>                <div class="gallery-item" data-category="awards" data-caption="Vision &amp; Recognition">
                    <img src="assets/Vision | Awards & Recognition./0_Final1.jpg" alt="Awards" loading="lazy">
                    <div class="gallery-item-overlay"><span>Vision &amp; Recognition</span></div>
                </div>                <div class="gallery-item" data-category="awards" data-caption="Vision &amp; Recognition">
                    <img src="assets/Vision | Awards & Recognition./0_Final2.jpg" alt="Awards" loading="lazy">
                    <div class="gallery-item-overlay"><span>Vision &amp; Recognition</span></div>
                </div>                <div class="gallery-item" data-category="awards" data-caption="Vision &amp; Recognition">
                    <img src="assets/Vision | Awards & Recognition./0_Final4.jpg" alt="Awards" loading="lazy">
                    <div class="gallery-item-overlay"><span>Vision &amp; Recognition</span></div>
                </div>                <div class="gallery-item" data-category="awards" data-caption="Vision &amp; Recognition">
                    <img src="assets/Vision | Awards & Recognition./0_Final6.JPG" alt="Awards" loading="lazy">
                    <div class="gallery-item-overlay"><span>Vision &amp; Recognition</span></div>
                </div>                <div class="gallery-item" data-category="awards" data-caption="Vision &amp; Recognition">
                    <img src="assets/Vision | Awards & Recognition./0_Final7.JPG" alt="Awards" loading="lazy">
                    <div class="gallery-item-overlay"><span>Vision &amp; Recognition</span></div>
                </div>                <div class="gallery-item" data-category="awards" data-caption="Vision &amp; Recognition">
                    <img src="assets/Vision | Awards & Recognition./0_Final8.jpg" alt="Awards" loading="lazy">
                    <div class="gallery-item-overlay"><span>Vision &amp; Recognition</span></div>
                </div>
            </div>
            <!-- Mobile Swipeable Card Deck -->
            <div class="mobile-deck" id="mobileDeck">
                <div class="mobile-deck-track">
                <div class="mobile-deck-slide" data-category="rotaract" data-caption="Rise in Rotaract">
                    <img src="assets/Rise in Rotaract/0_Final1.jpg" alt="Rise in Rotaract" loading="lazy">
                    <div class="mobile-deck-info">
                        <span class="mobile-deck-category">Rise in Rotaract</span>
                        <span class="mobile-deck-counter"></span>
                    </div>
                </div>
                <div class="mobile-deck-slide" data-category="rotaract" data-caption="Rise in Rotaract">
                    <img src="assets/Rise in Rotaract/0_Final2.JPG" alt="Rise in Rotaract" loading="lazy">
                    <div class="mobile-deck-info">
                        <span class="mobile-deck-category">Rise in Rotaract</span>
                        <span class="mobile-deck-counter"></span>
                    </div>
                </div>
                <div class="mobile-deck-slide" data-category="rotaract" data-caption="Rise in Rotaract">
                    <img src="assets/Rise in Rotaract/0_FInal3.jpg" alt="Rise in Rotaract" loading="lazy">
                    <div class="mobile-deck-info">
                        <span class="mobile-deck-category">Rise in Rotaract</span>
                        <span class="mobile-deck-counter"></span>
                    </div>
                </div>
                <div class="mobile-deck-slide" data-category="rotaract" data-caption="Rise in Rotaract">
                    <img src="assets/Rise in Rotaract/0_Final4.JPG" alt="Rise in Rotaract" loading="lazy">
                    <div class="mobile-deck-info">
                        <span class="mobile-deck-category">Rise in Rotaract</span>
                        <span class="mobile-deck-counter"></span>
                    </div>
                </div>
                <div class="mobile-deck-slide" data-category="rotaract" data-caption="Rise in Rotaract">
                    <img src="assets/Rise in Rotaract/0_Final5.JPG" alt="Rise in Rotaract" loading="lazy">
                    <div class="mobile-deck-info">
                        <span class="mobile-deck-category">Rise in Rotaract</span>
                        <span class="mobile-deck-counter"></span>
                    </div>
                </div>
                <div class="mobile-deck-slide" data-category="rotaract" data-caption="Rise in Rotaract">
                    <img src="assets/Rise in Rotaract/0_Final6.JPG" alt="Rise in Rotaract" loading="lazy">
                    <div class="mobile-deck-info">
                        <span class="mobile-deck-category">Rise in Rotaract</span>
                        <span class="mobile-deck-counter"></span>
                    </div>
                </div>
                <div class="mobile-deck-slide" data-category="rotaract" data-caption="Rise in Rotaract">
                    <img src="assets/Rise in Rotaract/0_Final7.jpg" alt="Rise in Rotaract" loading="lazy">
                    <div class="mobile-deck-info">
                        <span class="mobile-deck-category">Rise in Rotaract</span>
                        <span class="mobile-deck-counter"></span>
                    </div>
                </div>
                <div class="mobile-deck-slide" data-category="rotaract" data-caption="Rise in Rotaract">
                    <img src="assets/Rise in Rotaract/0_Final8.jpg" alt="Rise in Rotaract" loading="lazy">
                    <div class="mobile-deck-info">
                        <span class="mobile-deck-category">Rise in Rotaract</span>
                        <span class="mobile-deck-counter"></span>
                    </div>
                </div>
                <div class="mobile-deck-slide" data-category="rotary" data-caption="Rise in Rotary">
                    <img src="assets/Rise in Rotary/0_Final1.JPG" alt="Rise in Rotary" loading="lazy">
                    <div class="mobile-deck-info">
                        <span class="mobile-deck-category">Rise in Rotary</span>
                        <span class="mobile-deck-counter"></span>
                    </div>
                </div>
                <div class="mobile-deck-slide" data-category="rotary" data-caption="Rise in Rotary">
                    <img src="assets/Rise in Rotary/0_Final2.JPG" alt="Rise in Rotary" loading="lazy">
                    <div class="mobile-deck-info">
                        <span class="mobile-deck-category">Rise in Rotary</span>
                        <span class="mobile-deck-counter"></span>
                    </div>
                </div>
                <div class="mobile-deck-slide" data-category="rotary" data-caption="Rise in Rotary">
                    <img src="assets/Rise in Rotary/0_Final3.JPG" alt="Rise in Rotary" loading="lazy">
                    <div class="mobile-deck-info">
                        <span class="mobile-deck-category">Rise in Rotary</span>
                        <span class="mobile-deck-counter"></span>
                    </div>
                </div>
                <div class="mobile-deck-slide" data-category="rotary" data-caption="Rise in Rotary">
                    <img src="assets/Rise in Rotary/0_Final4 - Edited.jpg" alt="Rise in Rotary" loading="lazy">
                    <div class="mobile-deck-info">
                        <span class="mobile-deck-category">Rise in Rotary</span>
                        <span class="mobile-deck-counter"></span>
                    </div>
                </div>
                <div class="mobile-deck-slide" data-category="rotary" data-caption="Rise in Rotary">
                    <img src="assets/Rise in Rotary/0_Final5.JPG" alt="Rise in Rotary" loading="lazy">
                    <div class="mobile-deck-info">
                        <span class="mobile-deck-category">Rise in Rotary</span>
                        <span class="mobile-deck-counter"></span>
                    </div>
                </div>
                <div class="mobile-deck-slide" data-category="rotary" data-caption="Rise in Rotary">
                    <img src="assets/Rise in Rotary/0_Final6.JPG" alt="Rise in Rotary" loading="lazy">
                    <div class="mobile-deck-info">
                        <span class="mobile-deck-category">Rise in Rotary</span>
                        <span class="mobile-deck-counter"></span>
                    </div>
                </div>
                <div class="mobile-deck-slide" data-category="awards" data-caption="Vision &amp; Recognition">
                    <img src="assets/Vision | Awards & Recognition./0_Final1.jpg" alt="Vision &amp; Recognition" loading="lazy">
                    <div class="mobile-deck-info">
                        <span class="mobile-deck-category">Vision &amp; Recognition</span>
                        <span class="mobile-deck-counter"></span>
                    </div>
                </div>
                <div class="mobile-deck-slide" data-category="awards" data-caption="Vision &amp; Recognition">
                    <img src="assets/Vision | Awards & Recognition./0_Final2.jpg" alt="Vision &amp; Recognition" loading="lazy">
                    <div class="mobile-deck-info">
                        <span class="mobile-deck-category">Vision &amp; Recognition</span>
                        <span class="mobile-deck-counter"></span>
                    </div>
                </div>
                <div class="mobile-deck-slide" data-category="awards" data-caption="Vision &amp; Recognition">
                    <img src="assets/Vision | Awards & Recognition./0_Final4.jpg" alt="Vision &amp; Recognition" loading="lazy">
                    <div class="mobile-deck-info">
                        <span class="mobile-deck-category">Vision &amp; Recognition</span>
                        <span class="mobile-deck-counter"></span>
                    </div>
                </div>
                <div class="mobile-deck-slide" data-category="awards" data-caption="Vision &amp; Recognition">
                    <img src="assets/Vision | Awards & Recognition./0_Final6.JPG" alt="Vision &amp; Recognition" loading="lazy">
                    <div class="mobile-deck-info">
                        <span class="mobile-deck-category">Vision &amp; Recognition</span>
                        <span class="mobile-deck-counter"></span>
                    </div>
                </div>
                <div class="mobile-deck-slide" data-category="awards" data-caption="Vision &amp; Recognition">
                    <img src="assets/Vision | Awards & Recognition./0_Final7.JPG" alt="Vision &amp; Recognition" loading="lazy">
                    <div class="mobile-deck-info">
                        <span class="mobile-deck-category">Vision &amp; Recognition</span>
                        <span class="mobile-deck-counter"></span>
                    </div>
                </div>
                <div class="mobile-deck-slide" data-category="awards" data-caption="Vision &amp; Recognition">
                    <img src="assets/Vision | Awards & Recognition./0_Final8.jpg" alt="Vision &amp; Recognition" loading="lazy">
                    <div class="mobile-deck-info">
                        <span class="mobile-deck-category">Vision &amp; Recognition</span>
                        <span class="mobile-deck-counter"></span>
                    </div>
                </div>
                </div>
                <div class="mobile-deck-nav">
                    <button class="mobile-deck-btn" id="mobileDeckPrev" aria-label="Previous">&#8592;</button>
                    <div class="mobile-deck-dots" id="mobileDeckDots"></div>
                    <button class="mobile-deck-btn" id="mobileDeckNext" aria-label="Next">&#8594;</button>
                </div>
            </div>

        </div>

        <!-- Gallery CSS -->
        <style>
            .page-gallery-section {
                margin-top: 6rem;
                padding-top: 4rem;
                border-top: 1px solid rgba(0,0,0,0.08);
            }
            .page-gallery-header { text-align: center; margin-bottom: 2.5rem; }
            .page-gallery-title {
                font-family: 'Times New Roman', Times, serif;
                font-size: clamp(1.8rem, 3.5vw, 2.5rem);
                color: #000;
                font-weight: bold;
                text-decoration: underline;
                text-underline-offset: 6px;
                text-decoration-thickness: 2px;
                text-transform: uppercase;
                margin-bottom: 0.4rem;
            }
            .page-gallery-sub {
                font-family: var(--font-sans);
                font-size: 0.85rem;
                color: #888;
                letter-spacing: 2px;
                text-transform: uppercase;
            }
            .gallery-filter-bar {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                gap: 0.6rem;
                margin-bottom: 2.5rem;
            }
            .gallery-filter-btn {
                background: transparent;
                border: 1px solid rgba(0,0,0,0.15);
                color: #555;
                padding: 0.45rem 1.1rem;
                border-radius: 50px;
                font-family: var(--font-sans);
                font-size: 0.78rem;
                font-weight: 600;
                letter-spacing: 1px;
                text-transform: uppercase;
                cursor: pointer;
                transition: all 0.2s ease;
            }
            .gallery-filter-btn:hover,
            .gallery-filter-btn.active {
                background: #000;
                color: var(--gold);
                border-color: #000;
            }
            .gallery-masonry {
                columns: 3;
                column-gap: 12px;
            }
            @media (max-width: 900px) { .gallery-masonry { columns: 2; } }
            @media (max-width: 540px) { .gallery-masonry { columns: 2; column-gap: 8px; } }
            .gallery-item {
                break-inside: avoid;
                position: relative;
                margin-bottom: 12px;
                border-radius: 8px;
                overflow: hidden;
                cursor: pointer;
                background: #f0f0f0;
            }
            .gallery-item img {
                width: 100%;
                height: auto;
                display: block;
                transition: transform 0.4s ease;
            }
            .gallery-item:hover img { transform: scale(1.04); }
            .gallery-item-overlay {
                position: absolute;
                inset: 0;
                background: linear-gradient(to top, rgba(0,0,0,0.65) 0%, transparent 55%);
                opacity: 0;
                transition: opacity 0.3s ease;
                display: flex;
                align-items: flex-end;
                padding: 0.8rem;
            }
            .gallery-item:hover .gallery-item-overlay { opacity: 1; }
            .gallery-item-overlay span {
                font-family: var(--font-sans);
                font-size: 0.72rem;
                font-weight: 700;
                color: #fff;
                text-transform: uppercase;
                letter-spacing: 1px;
            }
            .gallery-item.g-hidden { display: none; }
            .gallery-lightbox {
                display: none;
                position: fixed;
                inset: 0;
                background: rgba(0,0,0,0.92);
                z-index: 9999;
                justify-content: center;
                align-items: center;
            }
            .gallery-lightbox.open { display: flex; }
            .lightbox-inner {
                max-width: 90vw;
                max-height: 88vh;
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 1rem;
            }
            #lightboxImg {
                max-width: 90vw;
                max-height: 80vh;
                object-fit: contain;
                border-radius: 6px;
                box-shadow: 0 30px 80px rgba(0,0,0,0.6);
            }
            .lightbox-caption {
                font-family: var(--font-sans);
                font-size: 0.78rem;
                color: rgba(255,255,255,0.55);
                letter-spacing: 2px;
                text-transform: uppercase;
                text-align: center;
                margin: 0;
            }
            .lightbox-close {
                position: fixed; top: 1.2rem; right: 1.5rem;
                background: none; border: none; color: #fff;
                font-size: 2.2rem; cursor: pointer; line-height: 1;
                opacity: 0.7; transition: opacity 0.2s; z-index: 10000;
            }
            .lightbox-close:hover { opacity: 1; }
            .lightbox-prev, .lightbox-next {
                position: fixed; top: 50%; transform: translateY(-50%);
                background: rgba(255,255,255,0.1);
                border: 1px solid rgba(255,255,255,0.2);
                color: #fff; font-size: 1.5rem;
                padding: 0.8rem 1rem; cursor: pointer;
                border-radius: 6px; transition: background 0.2s; z-index: 10000;
            }
            .lightbox-prev { left: 1rem; }
            .lightbox-next { right: 1rem; }
            .lightbox-prev:hover, .lightbox-next:hover { background: rgba(255,255,255,0.2); }
            @media (max-width: 600px) {
                .lightbox-prev { left: 0.3rem; padding: 0.5rem 0.7rem; }
                .lightbox-next { right: 0.3rem; padding: 0.5rem 0.7rem; }
            }

            /* ── Mobile: Instagram-style grid ── */
@media (max-width: 768px) {
    .gallery-masonry { 
        display: grid !important; 
        grid-template-columns: repeat(2, 1fr) !important;
        gap: 4px !important;
        columns: auto !important;
    }
    .gallery-item {
        margin-bottom: 0 !important;
        aspect-ratio: 1/1 !important;
        overflow: hidden;
    }
    .gallery-item img {
        width: 100% !important;
        height: 100% !important;
        object-fit: cover !important;
    }
    .gallery-filter-bar { display: none !important; }
    .mobile-deck { display: none !important; }
    .gallery-item-overlay { display: none !important; }
    .page-gallery-title { font-size: 1.6rem; }
}
@media (min-width: 769px) {
    .mobile-deck { display: none !important; }
}
        </style>

        <!-- Lightbox HTML -->
        <div class="gallery-lightbox" id="galleryLightbox" role="dialog" aria-modal="true">
            <button class="lightbox-close" id="lightboxClose" aria-label="Close">&times;</button>
            <button class="lightbox-prev" id="lightboxPrev" aria-label="Previous">&#8592;</button>
            <button class="lightbox-next" id="lightboxNext" aria-label="Next">&#8594;</button>
            <div class="lightbox-inner">
                <img src="" alt="" id="lightboxImg">
                <p class="lightbox-caption" id="lightboxCaption"></p>
            </div>
        </div>

        <!-- Gallery JS -->
        <script>
        (function() {
            var items = [], currentIdx = 0;
            function getVisible() { return Array.from(document.querySelectorAll('.gallery-item:not(.g-hidden)')); }
            function openLightbox(idx) {
                items = getVisible(); currentIdx = idx;
                showSlide(currentIdx);
                document.getElementById('galleryLightbox').classList.add('open');
                document.body.style.overflow = 'hidden';
            }
            function closeLightbox() {
                document.getElementById('galleryLightbox').classList.remove('open');
                document.body.style.overflow = '';
            }
            function showSlide(idx) {
                var item = items[idx];
                var img = item.querySelector('img');
                document.getElementById('lightboxImg').src = img.src;
                document.getElementById('lightboxImg').alt = img.alt;
                document.getElementById('lightboxCaption').textContent = item.getAttribute('data-caption') || '';
            }
            document.querySelectorAll('.gallery-item').forEach(function(el) {
                el.addEventListener('click', function() { openLightbox(getVisible().indexOf(el)); });
            });
            document.getElementById('lightboxClose').addEventListener('click', closeLightbox);
            document.getElementById('lightboxPrev').addEventListener('click', function() {
                currentIdx = (currentIdx - 1 + items.length) % items.length; showSlide(currentIdx);
            });
            document.getElementById('lightboxNext').addEventListener('click', function() {
                currentIdx = (currentIdx + 1) % items.length; showSlide(currentIdx);
            });
            document.getElementById('galleryLightbox').addEventListener('click', function(e) {
                if (e.target === this) closeLightbox();
            });
            document.addEventListener('keydown', function(e) {
                if (!document.getElementById('galleryLightbox').classList.contains('open')) return;
                if (e.key === 'Escape') closeLightbox();
                if (e.key === 'ArrowLeft') { currentIdx = (currentIdx - 1 + items.length) % items.length; showSlide(currentIdx); }
                if (e.key === 'ArrowRight') { currentIdx = (currentIdx + 1) % items.length; showSlide(currentIdx); }
            });
            document.querySelectorAll('.gallery-filter-btn').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    document.querySelectorAll('.gallery-filter-btn').forEach(function(b) { b.classList.remove('active'); });
                    btn.classList.add('active');
                    var filter = btn.getAttribute('data-filter');
                    document.querySelectorAll('.gallery-item').forEach(function(item) {
                        item.classList.toggle('g-hidden', filter !== 'all' && item.getAttribute('data-category') !== filter);
                    });
                });
            });
        })();

            // ── Mobile swipeable card deck ──
            (function() {
                var allSlides = Array.from(document.querySelectorAll('.mobile-deck-slide'));
                var visibleSlides = allSlides.slice();
                var current = 0;

                function update() {
                    visibleSlides.forEach(function(s, i) {
                        s.classList.toggle('active', i === current);
                    });
                    // Dots
                    var dots = document.querySelectorAll('.mobile-deck-dot');
                    dots.forEach(function(d, i) { d.classList.toggle('active', i === current); });
                    // Counter
                    var counterEl = document.getElementById('mobileDeckCounter');
                    if (counterEl) counterEl.textContent = (current + 1) + ' / ' + visibleSlides.length;
                    // Buttons
                    var prev = document.getElementById('mobileDeckPrev');
                    var next = document.getElementById('mobileDeckNext');
                    if (prev) prev.disabled = current === 0;
                    if (next) next.disabled = current >= visibleSlides.length - 1;
                }

                function buildDots() {
                    var container = document.getElementById('mobileDeckDots');
                    if (!container) return;
                    container.innerHTML = '';
                    var max = Math.min(visibleSlides.length, 12);
                    for (var i = 0; i < max; i++) {
                        var d = document.createElement('div');
                        d.className = 'mobile-deck-dot' + (i === current ? ' active' : '');
                        (function(idx) {
                            d.addEventListener('click', function() { current = idx; update(); });
                        })(i);
                        container.appendChild(d);
                    }
                }

                var prev = document.getElementById('mobileDeckPrev');
                var next = document.getElementById('mobileDeckNext');
                if (prev) prev.addEventListener('click', function() { if (current > 0) { current--; update(); } });
                if (next) next.addEventListener('click', function() { if (current < visibleSlides.length - 1) { current++; update(); } });

                // Touch swipe
                var deck = document.getElementById('mobileDeck');
                if (deck) {
                    var startX = 0, startY = 0, isH = null;
                    deck.addEventListener('touchstart', function(e) {
                        startX = e.touches[0].clientX;
                        startY = e.touches[0].clientY;
                        isH = null;
                    }, {passive: true});
                    deck.addEventListener('touchmove', function(e) {
                        var dx = e.touches[0].clientX - startX;
                        var dy = e.touches[0].clientY - startY;
                        if (isH === null) isH = Math.abs(dx) > Math.abs(dy);
                        if (isH) e.preventDefault();
                    }, {passive: false});
                    deck.addEventListener('touchend', function(e) {
                        if (!isH) return;
                        var dx = e.changedTouches[0].clientX - startX;
                        if (dx < -40 && current < visibleSlides.length - 1) { current++; update(); }
                        else if (dx > 40 && current > 0) { current--; update(); }
                    }, {passive: true});

                    // Tap to open lightbox
                    deck.addEventListener('click', function(e) {
                        if (Math.abs(e.changedTouches ? 0 : 0) < 5) {
                            var slide = visibleSlides[current];
                            if (!slide) return;
                            var img = slide.querySelector('img');
                            var caption = slide.getAttribute('data-caption') || '';
                            var lb = document.getElementById('galleryLightbox');
                            if (lb) {
                                document.getElementById('lightboxImg').src = img.src;
                                document.getElementById('lightboxImg').alt = img.alt;
                                document.getElementById('lightboxCaption').textContent = caption;
                                lb.classList.add('open');
                                document.body.style.overflow = 'hidden';
                            }
                        }
                    });
                }

                // Sync filter with deck
                document.querySelectorAll('.gallery-filter-btn').forEach(function(btn) {
                    btn.addEventListener('click', function() {
                        var filter = btn.getAttribute('data-filter');
                        allSlides.forEach(function(s) {
                            var show = filter === 'all' || s.getAttribute('data-category') === filter;
                            s.style.display = show ? '' : 'none';
                        });
                        visibleSlides = allSlides.filter(function(s) { return s.style.display !== 'none'; });
                        current = 0;
                        buildDots();
                        update();
                    });
                });

                buildDots();
                update();
            })();
        </script>

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
