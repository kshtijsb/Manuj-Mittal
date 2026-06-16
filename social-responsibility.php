<?php
require_once 'includes/data.php';
$page_title = "Social Responsibility | Manuj Mittal";
include 'components/header.php';
?>

<section class="pillar-detail-page social-responsibility-page" style="padding: 15vh 0; background: #ffffff; min-height: 100vh;">
    <div class="container" style="max-width: 1000px;">
        
        <!-- Header: Two-Column Editorial Grid -->
        <div class="editorial-grid" style="display: grid; grid-template-columns: 1.15fr 0.85fr; gap: 5rem; align-items: center; margin-bottom: 100px;">
            <div class="editorial-left">
                <div class="side-tag reveal" style="color: #2E8B57; font-weight: 800; letter-spacing: 8px; margin-bottom: 2rem; display: block; text-transform: uppercase;">03 / Global Impact</div>
                <h1 class="reveal" style="font-size: clamp(3.5rem, 7vw, 5.5rem); line-height: 0.95; margin-bottom: 4rem; color: #000; letter-spacing: -2px; font-family: var(--font-serif);">Civic Duty &<br>Youth Empowerment</h1>
                <div class="lead-quote reveal" style="font-size: 1.3rem; font-family: var(--font-serif); color: #333; border-left: 4px solid #2E8B57; padding-left: 2.5rem; font-style: italic; line-height: 1.5; margin-top: 2rem;">
                    "Leadership is not a privilege of position; it is a debt we pay to our communities. Inspiring and building the next generation is the ultimate standard of service."
                </div>
            </div>
            
            <div class="portrait-container reveal" style="position: relative;">
                <div class="portrait-frame shimmer" style="width: 100%; height: 480px; border-radius: 8px; overflow: hidden; box-shadow: 0 30px 60px rgba(46,139,87,0.08); border: 1px solid rgba(46,139,87,0.05);">
                    <img src="assets/Rise in Rotary/1.JPG" alt="Manuj Mittal Social Responsibility" style="width: 100%; height: 100%; display: block; object-fit: cover; object-position: center;">
                </div>
                <!-- Bevel Corner Styling -->
                <div style="position: absolute; z-index: -1; top: -15px; right: -15px; width: 80px; height: 80px; border-top: 4px solid #2E8B57; border-right: 4px solid #2E8B57;"></div>
            </div>
        </div>

        <div class="editorial-content reveal" style="max-width: 800px; margin: 0 auto;">
            <div class="text-block" style="font-size: 1.15rem; margin-bottom: 5rem; line-height: 1.85; color: #444;">
                <p style="margin-bottom: 2.5rem;">
                    True leadership is measured by its service to society. Beyond professional accomplishments, Manuj Mittal's journey is defined by a deep-seated commitment to civic responsibility, youth mentorship, and community-driven impact.
                </p>
                <p style="margin-bottom: 2.5rem;">
                    Through his extensive association with <strong style="color: #000;">Rotary International</strong> and <strong style="color: #000;">Rotaract</strong>, Manuj has initiated, directed, and completed numerous community development projects across India and the United States. His work focus centers on leveraging structured organization and administrative efficiency to maximize social outcomes, whether building local educational pathways or orchestrating regional collaboration programs.
                </p>
                <p style="margin-bottom: 2.5rem;">
                    Manuj is particularly dedicated to bridging mentorship gaps for aspiring young leaders. Through speaking, writing, and direct coaching, he helps students and early-career professionals develop a principled approach to power, ambition, and ethical leadership, encouraging independent critical thinking in civic and personal contexts.
                </p>
            </div>

            <!-- Bento Layout for Milestones -->
            <style>
                .bento-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 1.5rem; margin-bottom: 5rem; }
                .bento-item { background: #f8f9fa; border-radius: 20px; padding: 2.5rem; display: flex; flex-direction: column; justify-content: center; position: relative; overflow: hidden; border: 1px solid rgba(0,0,0,0.02); }
                .bento-wide { grid-column: span 2; }
                .bento-title { font-size: 0.75rem; font-weight: 800; letter-spacing: 2px; text-transform: uppercase; color: #2E8B57; margin-bottom: 1.2rem; }
                .bento-text { font-size: 1.15rem; color: #111; line-height: 1.6; font-weight: 600; }
                .bento-list { list-style: none; padding: 0; margin: 0; }
                .bento-list li { font-size: 1.05rem; color: #444; margin-bottom: 0.8rem; display: flex; align-items: center; gap: 0.6rem; }
                .bento-list li::before { content: ''; display: inline-block; width: 6px; height: 6px; background: #2E8B57; border-radius: 50%; }
                
                @media (max-width: 768px) {
                    .editorial-grid { grid-template-columns: 1fr; gap: 3rem; margin-bottom: 60px; }
                    .portrait-container { order: -1; }
                    .portrait-frame { height: auto !important; aspect-ratio: 4/3; max-height: 350px; }
                    .portrait-frame img { object-position: top center !important; }
                    .bento-grid { grid-template-columns: 1fr; gap: 1rem; }
                    .bento-wide { grid-column: span 1; }
                    .bento-item { padding: 2rem; border-radius: 16px; }
                }
            </style>

            <div class="bento-grid reveal">
                <!-- Civic Philosophy -->
                <div class="bento-item bento-wide" style="background: #2E8B57; color: #ffffff;">
                    <div class="bento-title" style="color: #ffffff; opacity: 0.6;">Service Philosophy</div>
                    <div class="bento-text" style="color: #ffffff; font-family: var(--font-serif); font-size: 1.7rem; font-style: italic; font-weight: 400;">
                        "The most durable change starts from the ground up, built on a foundation of trust, empathy, and collaborative effort."
                    </div>
                </div>

                <!-- Rotary Leadership -->
                <div class="bento-item">
                    <div class="bento-title">Civic Leadership</div>
                    <div class="bento-text" style="margin-bottom: 0.8rem;">Rotary & Rotaract</div>
                    <p style="font-size: 0.95rem; color: #666; line-height: 1.5;">Served in various leadership roles to coordinate service campaigns, foster global understanding, and fund community initiatives.</p>
                </div>

                <!-- Youth Mentorship -->
                <div class="bento-item">
                    <div class="bento-title">Development</div>
                    <div class="bento-text" style="margin-bottom: 0.8rem;">Youth Mentorship</div>
                    <p style="font-size: 0.95rem; color: #666; line-height: 1.5;">Leading workshops and personal strategy sessions to empower students with critical management and leadership thinking.</p>
                </div>

                <!-- Key Campaigns -->
                <div class="bento-item bento-wide">
                    <div class="bento-title">Areas of Action</div>
                    <ul class="bento-list" style="margin-top: 0.5rem;">
                        <li><strong>Next-Gen Leadership Training:</strong> Establishing frameworks that nurture moral leadership and integrity among students.</li>
                        <li><strong>Community Outreach:</strong> Structuring sustainable service campaigns in educational development and economic literacy.</li>
                        <li><strong>Global Collaborations:</strong> Connecting youth leaders across borders to collaborate on solving regional development issues.</li>
                    </ul>
                </div>
            </div>

            <!-- CTA Back to Home -->
            <div style="text-align: center; margin-top: 60px;">
                <a href="index.php#about" class="btn-text" style="color: #2E8B57; border-color: rgba(46,139,87,0.3); font-size: 0.85rem;">← Back to Pillars</a>
            </div>

        </div>
    </div>
</section>

<?php include 'components/footer.php'; ?>
