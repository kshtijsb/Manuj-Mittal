<?php
require_once 'includes/data.php';
$page_title = "Education | Manuj Mittal";
include 'components/header.php';
?>

<section class="pillar-detail-page education-page" style="padding: 15vh 0; background: #ffffff; min-height: 100vh;">
    <div class="container" style="max-width: 1000px;">
        
        <!-- Header: Two-Column Editorial Grid -->
        <div class="editorial-grid" style="display: grid; grid-template-columns: 1.15fr 0.85fr; gap: 5rem; align-items: center; margin-bottom: 100px;">
            <div class="editorial-left">
                <div class="side-tag reveal" style="color: #0047AB; font-weight: 800; letter-spacing: 8px; margin-bottom: 2rem; display: block; text-transform: uppercase;">01 / Academic Excellence</div>
                <h1 class="reveal" style="font-size: clamp(3.5rem, 7vw, 5.5rem); line-height: 0.95; margin-bottom: 4rem; color: #000; letter-spacing: -2px; font-family: var(--font-serif);">Intellectual<br>Foundations</h1>
                <div class="lead-quote reveal" style="font-size: 1.3rem; font-family: var(--font-serif); color: #333; border-left: 4px solid #0047AB; padding-left: 2.5rem; font-style: italic; line-height: 1.5; margin-top: 2rem;">
                    "True education is not the learning of facts, but the training of the mind to think critically, lead ethically, and execute strategically."
                </div>
            </div>
            
            <div class="portrait-container reveal" style="position: relative;">
                <div class="portrait-frame shimmer" style="width: 100%; height: 480px; border-radius: 8px; overflow: hidden; box-shadow: 0 30px 60px rgba(0,71,171,0.08); border: 1px solid rgba(0,71,171,0.05);">
                    <img src="assets/Education in India/1.JPG" alt="Manuj Mittal Education" style="width: 100%; height: 100%; display: block; object-fit: cover; object-position: center;">
                </div>
                <!-- Bevel Corner Styling -->
                <div style="position: absolute; z-index: -1; top: -15px; right: -15px; width: 80px; height: 80px; border-top: 4px solid #0047AB; border-right: 4px solid #0047AB;"></div>
            </div>
        </div>

        <div class="editorial-content reveal" style="max-width: 800px; margin: 0 auto;">
            <div class="text-block" style="font-size: 1.15rem; margin-bottom: 5rem; line-height: 1.85; color: #444;">
                <p style="margin-bottom: 2.5rem;">
                    Academic training is the bedrock of strategic foresight. Manuj Mittal's educational journey combines the rigorous, structured heritage of premier Indian institutions with the analytical, market-driven business perspective of top-tier American business schools. 
                </p>
                <p style="margin-bottom: 2.5rem;">
                    As an alumnus of <strong style="color: #000;">Mayo College</strong> (Ajmer, India), Manuj imbibed early lessons in character, discipline, and cooperative leadership. This foundation set the stage for advanced quantitative specialization, earning a Master's degree in Finance and subsequently an MBA from the renowned <strong style="color: #000;">Simon Business School</strong> at the University of Rochester—an institution famous for its rigorous economics-based curriculum.
                </p>
                <p style="margin-bottom: 2.5rem;">
                    Believing that learning is an active, lifelong endeavor, Manuj is currently pursuing a <strong style="color: #000;">Doctor of Education (Ed.D.)</strong> at the University of Rochester. His doctoral work centers on bridging the gap between management thinking and next-generation leadership development, examining how educational frameworks can evolve to meet the complex demands of a modern global landscape.
                </p>
            </div>

            <!-- Bento Layout for Milestones -->
            <style>
                .bento-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 1.5rem; margin-bottom: 5rem; }
                .bento-item { background: #f8f9fa; border-radius: 20px; padding: 2.5rem; display: flex; flex-direction: column; justify-content: center; position: relative; overflow: hidden; border: 1px solid rgba(0,0,0,0.02); }
                .bento-wide { grid-column: span 2; }
                .bento-title { font-size: 0.75rem; font-weight: 800; letter-spacing: 2px; text-transform: uppercase; color: #0047AB; margin-bottom: 1.2rem; }
                .bento-text { font-size: 1.15rem; color: #111; line-height: 1.6; font-weight: 600; }
                .bento-list { list-style: none; padding: 0; margin: 0; }
                .bento-list li { font-size: 1.05rem; color: #444; margin-bottom: 0.8rem; display: flex; align-items: center; gap: 0.6rem; }
                .bento-list li::before { content: ''; display: inline-block; width: 6px; height: 6px; background: #0047AB; border-radius: 50%; }
                
                @media (max-width: 768px) {
                    .editorial-grid { grid-template-columns: 1fr; gap: 3rem; margin-bottom: 40px; }
                    .portrait-container { display: none !important; }
                    .bento-grid { grid-template-columns: 1fr; gap: 1rem; }
                    .bento-wide { grid-column: span 1; }
                    .bento-item { padding: 2rem; border-radius: 16px; }
                }
            </style>

            <div class="bento-grid reveal">
                <!-- Academic Philosophy -->
                <div class="bento-item bento-wide" style="background: #0047AB; color: #ffffff;">
                    <div class="bento-title" style="color: #ffffff; opacity: 0.6;">Educational Philosophy</div>
                    <div class="bento-text" style="color: #ffffff; font-family: var(--font-serif); font-size: 1.7rem; font-style: italic; font-weight: 400;">
                        "Academic credentials are keys, but true education is measured by the ability to unlock potential in others."
                    </div>
                </div>

                <!-- Mayo College -->
                <div class="bento-item">
                    <div class="bento-title">Secondary Education</div>
                    <div class="bento-text" style="margin-bottom: 0.8rem;">Mayo College, Ajmer</div>
                    <p style="font-size: 0.95rem; color: #666; line-height: 1.5;">Learned the values of self-governance, athletic discipline, and cultural depth in India's leading heritage school.</p>
                </div>

                <!-- Master's & MBA -->
                <div class="bento-item">
                    <div class="bento-title">Business & Finance</div>
                    <div class="bento-text" style="margin-bottom: 0.8rem;">MBA, Simon Business School</div>
                    <p style="font-size: 0.95rem; color: #666; line-height: 1.5;">Specialized in finance, analytical decision models, and economic strategy at the University of Rochester.</p>
                </div>

                <!-- Doctorate -->
                <div class="bento-item bento-wide">
                    <div class="bento-title">Advanced Research</div>
                    <div class="bento-text" style="margin-bottom: 0.8rem;">Doctor of Education (Ed.D.) Candidate</div>
                    <p style="font-size: 0.95rem; color: #666; line-height: 1.6;">Currently focusing doctoral studies at the University of Rochester on organizational leadership, executive training models, and pedagogical methods that prepare young leaders for modern operational realities.</p>
                </div>
            </div>

            <!-- CTA Back to Home -->
            <div style="text-align: center; margin-top: 60px;">
                <a href="index.php#about" class="btn-text" style="color: #0047AB; border-color: rgba(0,71,171,0.3); font-size: 0.85rem;">← Back to Pillars</a>
            </div>

        </div>
    </div>
</section>

<?php include 'components/footer.php'; ?>
