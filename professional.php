<?php
require_once 'includes/data.php';
$page_title = "Professional | Manuj Mittal";
include 'components/header.php';
?>

<section class="pillar-detail-page professional-page" style="padding: 15vh 0; background: #ffffff; min-height: 100vh;">
    <div class="container" style="max-width: 1000px;">
        
        <!-- Header: Two-Column Editorial Grid -->
        <div class="editorial-grid" style="display: grid; grid-template-columns: 1.15fr 0.85fr; gap: 5rem; align-items: center; margin-bottom: 100px;">
            <div class="editorial-left">
                <div class="side-tag reveal" style="color: #C41E3A; font-weight: 800; letter-spacing: 8px; margin-bottom: 2rem; display: block; text-transform: uppercase;">02 / Strategic Leadership</div>
                <h1 class="reveal" style="font-size: clamp(3.5rem, 7vw, 5.5rem); line-height: 0.95; margin-bottom: 4rem; color: #000; letter-spacing: -2px; font-family: var(--font-serif);">Corporate &<br>Operational Vision</h1>
                <div class="lead-quote reveal" style="font-size: 1.3rem; font-family: var(--font-serif); color: #333; border-left: 4px solid #C41E3A; padding-left: 2.5rem; font-style: italic; line-height: 1.5; margin-top: 2rem;">
                    "Strategy is not a document; it is a dynamic posture. True execution lies in translating complex financial models and corporate directives into clear, human-centered narratives."
                </div>
            </div>
            
            <div class="portrait-container reveal" style="position: relative;">
                <div class="portrait-frame shimmer" style="width: 100%; height: 480px; border-radius: 8px; overflow: hidden; box-shadow: 0 30px 60px rgba(196,30,58,0.08); border: 1px solid rgba(196,30,58,0.05);">
                    <img src="assets/Professional Journey  India/5.JPG" alt="Manuj Mittal Professional" style="width: 100%; height: 100%; display: block; object-fit: cover; object-position: center;">
                </div>
                <!-- Bevel Corner Styling -->
                <div style="position: absolute; z-index: -1; top: -15px; right: -15px; width: 80px; height: 80px; border-top: 4px solid #C41E3A; border-right: 4px solid #C41E3A;"></div>
            </div>
        </div>

        <div class="editorial-content reveal" style="max-width: 800px; margin: 0 auto;">
            <div class="text-block" style="font-size: 1.15rem; margin-bottom: 5rem; line-height: 1.85; color: #444;">
                <p style="margin-bottom: 2.5rem;">
                    In an increasingly complex global economy, leadership requires a double focus: deep technical competency and the communication skills to steer organizations through structural shifts. 
                </p>
                <p style="margin-bottom: 2.5rem;">
                    Manuj Mittal has built a solid professional career specializing in corporate finance, operational strategy, and organizational architecture. His experience includes working with institutional finance and risk divisions at global giants like <strong style="color: #000;">Morgan Stanley</strong> and strategy consulting at <strong style="color: #000;">Grant Thornton</strong>.
                </p>
                <p style="margin-bottom: 2.5rem;">
                    Throughout his professional path in both India and the United States, Manuj has specialized in audit, financial planning, and operational modeling. He is particularly recognized for his ability to translate complex corporate challenges—ranging from asset valuation to change management—into practical roadmaps that business leaders and management teams can execute with alignment and clarity.
                </p>
            </div>

            <!-- Bento Layout for Milestones -->
            <style>
                .bento-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 1.5rem; margin-bottom: 5rem; }
                .bento-item { background: #f8f9fa; border-radius: 20px; padding: 2.5rem; display: flex; flex-direction: column; justify-content: center; position: relative; overflow: hidden; border: 1px solid rgba(0,0,0,0.02); }
                .bento-wide { grid-column: span 2; }
                .bento-title { font-size: 0.75rem; font-weight: 800; letter-spacing: 2px; text-transform: uppercase; color: #C41E3A; margin-bottom: 1.2rem; }
                .bento-text { font-size: 1.15rem; color: #111; line-height: 1.6; font-weight: 600; }
                .bento-list { list-style: none; padding: 0; margin: 0; }
                .bento-list li { font-size: 1.05rem; color: #444; margin-bottom: 0.8rem; display: flex; align-items: center; gap: 0.6rem; }
                .bento-list li::before { content: ''; display: inline-block; width: 6px; height: 6px; background: #C41E3A; border-radius: 50%; }
                
                @media (max-width: 768px) {
                    .editorial-grid { grid-template-columns: 1fr; gap: 3rem; margin-bottom: 60px; }
                    .portrait-container { order: -1; }
                    .bento-grid { grid-template-columns: 1fr; gap: 1rem; }
                    .bento-wide { grid-column: span 1; }
                    .bento-item { padding: 2rem; border-radius: 16px; }
                }
            </style>

            <div class="bento-grid reveal">
                <!-- Professional Philosophy -->
                <div class="bento-item bento-wide" style="background: #C41E3A; color: #ffffff;">
                    <div class="bento-title" style="color: #ffffff; opacity: 0.6;">Management Philosophy</div>
                    <div class="bento-text" style="color: #ffffff; font-family: var(--font-serif); font-size: 1.7rem; font-style: italic; font-weight: 400;">
                        "Success is not about solving problems in isolation; it is about building structures where teams solve them collaboratively."
                    </div>
                </div>

                <!-- Strategic Advisory -->
                <div class="bento-item">
                    <div class="bento-title">Strategic Advisory</div>
                    <div class="bento-text" style="margin-bottom: 0.8rem;">Grant Thornton</div>
                    <p style="font-size: 0.95rem; color: #666; line-height: 1.5;">Advised organizations on strategy, change management, audit preparation, and corporate financial structures.</p>
                </div>

                <!-- Institutional Finance -->
                <div class="bento-item">
                    <div class="bento-title">Institutional Finance</div>
                    <div class="bento-text" style="margin-bottom: 0.8rem;">Morgan Stanley</div>
                    <p style="font-size: 0.95rem; color: #666; line-height: 1.5;">Analyzed financial data, structured reporting metrics, and supported operations inside major global markets divisions.</p>
                </div>

                <!-- Strategic Capabilities -->
                <div class="bento-item bento-wide">
                    <div class="bento-title">Core Competencies</div>
                    <ul class="bento-list" style="margin-top: 0.5rem;">
                        <li><strong>Financial Strategy & Modeling:</strong> Designing robust financial frameworks to map institutional growth and risk profiles.</li>
                        <li><strong>Operational Consulting:</strong> Auditing operational systems to streamline processes and maximize corporate agility.</li>
                        <li><strong>Change Management & Communication:</strong> Leading cross-functional teams through mergers, technological transitions, and strategic re-alignments.</li>
                    </ul>
                </div>
            </div>

            <!-- CTA Back to Home -->
            <div style="text-align: center; margin-top: 60px;">
                <a href="index.php#about" class="btn-text" style="color: #C41E3A; border-color: rgba(196,30,58,0.3); font-size: 0.85rem;">← Back to Pillars</a>
            </div>

        </div>
    </div>
</section>

<?php include 'components/footer.php'; ?>
