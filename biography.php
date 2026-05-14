<?php
require_once 'includes/data.php';
$page_title = "Biography | Manuj Mittal";
include 'components/header.php';
?>

<section class="biography-page" style="padding: 15vh 0; background: #fff;">
    <div class="container" style="max-width: 1000px;">
        
        <!-- Header Section: Two-Column Editorial -->
        <div class="bio-header-grid" style="display: grid; grid-template-columns: 1.1fr 0.9fr; gap: 6rem; align-items: center; margin-bottom: 120px;">
            
            <div class="bio-header-left">
                <div class="side-tag reveal" style="color: var(--color-gold); font-weight: 800; letter-spacing: 8px; margin-bottom: 2rem; display: block;">THE FULL NARRATIVE</div>
                <h1 class="reveal" style="font-size: clamp(4rem, 8vw, 6rem); line-height: 0.9; margin-bottom: 4rem; color: #000; letter-spacing: -3px; font-family: var(--font-serif);">Manuj<br>Mittal</h1>
                
                <div class="bio-intro-lead reveal" style="font-size: 1.4rem; font-family: var(--font-serif); color: #000; border-left: 4px solid var(--color-gold); padding-left: 3rem; font-style: italic; line-height: 1.4;">
                    "Leadership is not defined by age, but is shaped by attitude. It is not determined by titles but by the decisions one makes."
                </div>
            </div>

            <div class="bio-portrait-container reveal" style="position: relative;">
                <div class="bio-portrait-frame shimmer" style="width: 100%; height: 500px; border-radius: 4px; overflow: hidden; box-shadow: 0 40px 80px rgba(0,0,0,0.1); border: 1px solid #eee;">
                    <img src="assets/author.png" alt="Manuj Mittal" style="width: 100%; height: 100%; display: block; object-fit: cover; object-position: top center;">
                </div>
                <!-- Decorative Element -->
                <div style="position: absolute; z-index: -1; top: -20px; right: -20px; width: 100px; height: 100px; border-top: 4px solid var(--color-gold); border-right: 4px solid var(--color-gold);"></div>
            </div>
        </div>

        <div class="bio-content reveal" style="max-width: 800px; margin: 0 auto;">
            <div class="bio-text-block" style="font-size: 1.2rem; margin-bottom: 6rem; line-height: 1.8; color: #444;">
                <p style="margin-bottom: 3rem;">
                    <strong style="color: #000;">Manuj Mittal (MJ)</strong> is a writer and youth leader dedicated to advancing youth development through modern management thinking. He is deeply passionate about helping young minds understand that leadership extends far beyond textbooks and titles. For Manuj, leadership begins early, with mindset, curiosity, and the courage to think independently.
                </p>
                <p style="margin-bottom: 3rem;">
                    A keen observer of business practices, leadership, human behavior, and organizational dynamics, Manuj studies the realities of power, ambition, success, morality, and integrity. With a sharp analytical lens, he distills complex management concepts and real-world leadership challenges into thought-provoking narratives that reflect both principle and practice.
                </p>
            </div>

            <!-- Professional & Academic Pillars -->
            <div class="bio-pillars" style="display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; margin-bottom: 8rem; padding: 5rem; background: #fafafa; border-radius: 4px; position: relative; overflow: hidden;">
                <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; opacity: 0.02; pointer-events: none; background-image: url('https://www.transparenttextures.com/patterns/cubes.png');"></div>
                
                <div class="pillar" style="position: relative; z-index: 2;">
                    <h3 style="color: var(--color-gold); margin-bottom: 2rem; text-transform: uppercase; font-size: 0.75rem; font-weight: 800; letter-spacing: 4px;">Experience</h3>
                    <ul style="list-style: none; font-size: 1.05rem; color: #333; padding: 0;">
                        <li style="margin-bottom: 1.2rem; padding-left: 1.5rem; position: relative;">
                            <span style="position: absolute; left: 0; color: var(--color-gold);">•</span> Grant Thornton
                        </li>
                        <li style="margin-bottom: 1.2rem; padding-left: 1.5rem; position: relative;">
                            <span style="position: absolute; left: 0; color: var(--color-gold);">•</span> Morgan Stanley
                        </li>
                        <li style="margin-bottom: 1.2rem; padding-left: 1.5rem; position: relative;">
                            <span style="position: absolute; left: 0; color: var(--color-gold);">•</span> Rotary International
                        </li>
                        <li style="margin-bottom: 1.2rem; padding-left: 1.5rem; position: relative;">
                            <span style="position: absolute; left: 0; color: var(--color-gold);">•</span> Alumnus of Mayo College
                        </li>
                    </ul>
                </div>
                <div class="pillar" style="position: relative; z-index: 2;">
                    <h3 style="color: var(--color-gold); margin-bottom: 2rem; text-transform: uppercase; font-size: 0.75rem; font-weight: 800; letter-spacing: 4px;">Academic</h3>
                    <ul style="list-style: none; font-size: 1.05rem; color: #333; padding: 0;">
                        <li style="margin-bottom: 1.2rem; padding-left: 1.5rem; position: relative;">
                            <span style="position: absolute; left: 0; color: var(--color-gold);">•</span> Master’s in Finance
                        </li>
                        <li style="margin-bottom: 1.2rem; padding-left: 1.5rem; position: relative;">
                            <span style="position: absolute; left: 0; color: var(--color-gold);">•</span> MBA, Simon Business School (NY)
                        </li>
                        <li style="margin-bottom: 1.2rem; padding-left: 1.5rem; position: relative;">
                            <span style="position: absolute; left: 0; color: var(--color-gold);">•</span> Ed.D Candidate, University of Rochester
                        </li>
                    </ul>
                </div>
            </div>

            <div class="bio-text-block" style="font-size: 1.2rem; margin-bottom: 8rem; line-height: 1.8; color: #444;">
                <p style="margin-bottom: 3rem;">
                    Manuj has spoken at conventions around the world and has been recognized on international platforms for his contributions to the field of education. He mentors students and entrepreneurs across the United States and continues to build platforms that encourage principled leadership and strategic thinking.
                </p>
                <p>
                    Currently residing in Rochester, New York, USA, Manuj continues to bridge the gap between global business practice and academic research, fostering a global, practice-driven perspective in everything he undertakes.
                </p>
            </div>

            <!-- CTA Section -->
            <div class="bio-footer-cta reveal" style="text-align: center; border-top: 1px solid #eee; padding-top: 100px; margin-top: 100px;">
                <h4 style="font-size: 2rem; margin-bottom: 2rem; font-family: var(--font-serif);">Connect with Manuj</h4>
                <p style="margin-bottom: 4rem; color: #666; letter-spacing: 1px;">For speaking engagements, mentorship, or literary inquiries.</p>
                <div style="display: flex; justify-content: center; gap: 3rem; flex-wrap: wrap;">
                    <a href="mailto:author@manujmittal.com" class="btn btn-primary" style="background: #000; color: #fff; padding: 1.5rem 4rem; text-decoration: none; font-weight: 800; letter-spacing: 3px; font-size: 0.8rem; transition: 0.4s;">SEND AN EMAIL</a>
                    <a href="index.php" style="color: #000; text-decoration: none; font-weight: 800; letter-spacing: 3px; border-bottom: 2px solid var(--color-gold); padding-bottom: 5px; font-size: 0.8rem; transition: 0.4s;">BACK TO HOME</a>
                </div>
            </div>

        </div>
    </div>
</section>

<style>
    @media (max-width: 992px) {
        .bio-header-grid { grid-template-columns: 1fr !important; gap: 4rem !important; text-align: center; }
        .bio-header-left { order: 2; }
        .bio-portrait-container { order: 1; margin: 0 auto; width: 80%; }
        .bio-portrait-frame { height: 400px !important; }
        .bio-intro-lead { padding-left: 0 !important; border-left: none !important; }
        .bio-pillars { grid-template-columns: 1fr !important; padding: 3rem !important; gap: 3rem !important; }
    }
</style>

        </div>
    </div>
</section>

<?php include 'components/footer.php'; ?>
