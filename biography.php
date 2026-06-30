<?php
require_once 'includes/data.php';
$page_title = "Biography | Manuj Mittal";
include 'components/header.php';
?>

<style>
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
        color: var(--color-gold, #c5a059);
        text-decoration: none;
        border-radius: 0;
        font-weight: 600;
        font-size: 1rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid var(--color-gold, #c5a059);
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .btn-back:hover {
        background: var(--color-gold, #c5a059);
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

        /* Biography title alignment — center on mobile */
        .bio-header-left h1,
        .bio-header-left .side-tag,
        .bio-title-mobile {
            text-align: center !important;
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
        .pillar-detail-page .container>div:first-child {
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
        .pillar-detail-page>.container {
            padding-top: 0 !important;
        }

        /* ── General margin resets ── */
        section+section {
            margin-top: 0 !important;
        }

        /* ── Ambient blobs: hide on mobile ── */
        .ambient-blob {
            display: none !important;
        }
    }
</style>

<section class="biography-page" style="padding: 15vh 0; background: #fff;">
    <div class="container" style="max-width: 1000px;">

        <!-- Header Section: Two-Column Editorial -->
        <div class="bio-header-grid"
            style="display: grid; grid-template-columns: 1.1fr 0.9fr; gap: 6rem; align-items: center; margin-bottom: 120px;">

            <div class="bio-header-left">
                <style>
                    @media (max-width: 992px) {
                        .bio-header-left .bio-title-mobile {
                            font-family: 'Times New Roman', Times, serif !important;
                            font-size: clamp(1.2rem, 7vw, 1.6rem) !important;
                            white-space: nowrap !important;
                            color: #000 !important;
                            font-weight: bold !important;
                            letter-spacing: 0px !important;
                            margin-top: -5vh !important;
                            text-decoration: underline !important;
                            text-underline-offset: 4px !important;
                            text-decoration-thickness: 2px !important;
                            text-transform: uppercase !important;
                        }
                    }

                    @media (max-width: 768px) {
                        .bio-title-mobile {
                            text-align: center !important;
                            letter-spacing: 3px !important;
                            margin-bottom: 1rem !important;
                        }

                        .bio-header-left h1 {
                            text-align: center !important;
                        }
                    }
                </style>
                <div class="side-tag reveal bio-title-mobile"
                    style="color: var(--color-gold); font-weight: bold; letter-spacing: 8px; margin-bottom: 2rem; display: block;">
                    ABOUT THE AUTHOR</div>
                <h1 class="reveal bio-name-mobile-hide"
                    style="font-size: clamp(3rem, 5vw, 4.2rem); line-height: 1.05; margin-bottom: 4rem; color: #000; letter-spacing: -2px; font-family: 'Times New Roman', Times, serif; white-space: nowrap;">
                    Manuj Mittal
                </h1>

                <div class="bio-intro-lead reveal"
                    style="font-size: 1.6rem; font-family: var(--font-serif); color: #000; border-left: 4px solid var(--color-gold); padding-left: 3rem; font-style: italic; line-height: 1.8;">
                    <span style="display: block;">"Leadership is not defined by age,</span>
                    <span class="quote-indent" style="display: block;"><br>but is shaped by our attitude.</span>
                    <span style="display: block;"><br>It is not determined by titles,</span>
                    <span class="quote-indent" style="display: block;"><br>but by the decisions we make."</span>
                </div>
            </div>

            <div class="bio-portrait-container reveal" style="position: relative;">
                <style>
                    @media (max-width: 768px) {
                        .bio-portrait-frame {
                            height: auto !important;
                        }

                        .bio-portrait-img {
                            height: auto !important;
                            width: 100% !important;
                            aspect-ratio: 3/4;
                            object-fit: cover !important;
                            object-position: top center !important;
                            display: block !important;
                        }
                    }
                </style>
                <div class="bio-portrait-frame"
                    style="width: 100%; height: 500px; border-radius: 4px; overflow: hidden; box-shadow: 0 40px 80px rgba(0,0,0,0.1); border: 2px solid var(--color-gold);">
                    <img src="assets/author_main_web.jpg" alt="Manuj Mittal" class="bio-portrait-img"
                        style="width: 100%; height: 100%; display: block; object-fit: cover; object-position: top center;">
                </div>
                <!-- Decorative Element -->
                <div
                    style="position: absolute; z-index: -1; top: -20px; right: -20px; width: 100px; height: 100px; border-top: 4px solid var(--color-gold); border-right: 4px solid var(--color-gold);">
                </div>
            </div>
        </div>

        <div class="bio-content" style="max-width: 800px; margin: 0 auto;">
            <style>
                .drop-cap {
                    float: left;
                    font-family: 'Times New Roman', Times, serif;
                    font-size: 4.5rem;
                    font-weight: 800;
                    color: var(--color-gold);
                    line-height: 0.8;
                    margin-right: 16px;
                    margin-top: 8px;
                    text-shadow: 0 4px 12px rgba(197, 160, 89, 0.3);
                }

                .bio-text-block p:not(:first-child) {
                    text-indent: 3rem;
                }
            </style>
            <div class="bio-text-block"
                style="font-size: 1.2rem; margin-bottom: 6rem; line-height: 1.8; color: #444; text-align: justify;">
                <p style="margin-bottom: 2rem;">
                    <span class="drop-cap">MJ</span> is a writer
                    and youth leader dedicated to advancing youth development through modern management thinking. He is
                    deeply passionate about helping young minds understand that leadership extends far beyond textbooks
                    and titles. For Manuj, leadership begins early, with mindset, curiosity, and the courage to think
                    independently. He works to help youth build confidence, clarity, and leadership awareness from an
                    early age.
                </p>
                <p style="margin-bottom: 2rem;">
                    A keen observer of business practices, leadership, human behavior, and organizational dynamics,
                    Manuj studies the realities of power, ambition, success, morality, and integrity. With a sharp
                    analytical lens, he distills complex management concepts and real-world leadership challenges into
                    thought-provoking quotations that reflect both principle and practice.
                </p>
                <p style="margin-bottom: 2rem;">
                    Manuj believes leadership is not defined by age, but is shaped by our attitude. It is not determined
                    by
                    titles but by the decisions we make.
                </p>
                <p style="margin-bottom: 2rem;">
                    With professional experience at Grant Thornton and Morgan Stanley, leadership involvement with
                    Rotary International, and as an alumnus of Mayo College, he brings a global, practice-driven
                    perspective to his work and research. He holds a Master’s degree in Finance (MsF) and an MBA from
                    the
                    Simon Business School in New York and is currently pursuing a Doctorate in Education at the
                    University of Rochester, USA.
                </p>
                <p style="margin-bottom: 2rem;">
                    Manuj has spoken at conventions around the world and has been recognized on international platforms
                    for his contributions to the field of education. He mentors students and entrepreneurs across the
                    United States and continues to build platforms that encourage principled leadership and strategic
                    thinking. He lives in New York, USA, and can be reached at <a href="mailto:author@manujmittal.com"
                        style="color: var(--color-gold); font-weight: bold; text-decoration: none;">author@manujmittal.com</a>.
                </p>

            </div>


        </div>


        <!-- CTA -->
        <div class="cta-container">
            <a href="index" class="btn-back">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M19 12H5M12 19l-7-7 7-7" />
                </svg>
                Back to Home
            </a>
        </div>

    </div>
</section>

<?php include 'components/footer.php'; ?>