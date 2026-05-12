<?php
require_once 'includes/data.php';
$page_title = "Biography | Manuj Mittal";
include 'components/header.php';
?>

<section class="biography-page" style="padding: 120px 0; background: #fff;">
    <div class="container" style="max-width: 900px;">
        
        <!-- Header Section: Two-Column Editorial -->
        <div class="bio-header-grid" style="display: grid; grid-template-columns: 1.2fr 0.8fr; gap: 5rem; align-items: start; margin-bottom: 80px;">
            
            <div class="bio-header-left">
                <div class="side-tag" style="color: var(--gold); font-weight: 800; letter-spacing: 8px; margin-bottom: 2rem; display: block;">THE FULL NARRATIVE</div>
                <h1 style="font-size: 5.5rem; line-height: 0.9; margin-bottom: 4rem; color: #000; letter-spacing: -3px;">Manuj<br>Mittal</h1>
                
                <div class="bio-intro-lead" style="font-size: 1.6rem; font-family: var(--font-serif); color: #000; border-left: 4px solid var(--gold); padding-left: 3rem; font-style: italic; line-height: 1.4;">
                    "Leadership is not defined by age, but is shaped by attitude. It is not determined by titles but by the decisions one makes."
                </div>
            </div>

            <div class="bio-portrait-container" style="position: relative;">
                <div class="bio-portrait-frame" style="width: 100%; border-radius: 15px; overflow: hidden; box-shadow: 0 40px 80px rgba(0,0,0,0.1); border: 1px solid #eee;">
                    <img src="assets/author.png" alt="Manuj Mittal" style="width: 100%; height: auto; display: block; object-fit: contain;">
                </div>
                <!-- Decorative Element -->
                <div style="position: absolute; -z-index: 1; top: -30px; right: -30px; width: 100px; height: 100px; border-top: 5px solid var(--gold); border-right: 5px solid var(--gold);"></div>
            </div>
        </div>

            <div class="bio-text-block" style="font-size: 1.15rem; margin-bottom: 4rem;">
                <p style="margin-bottom: 2rem;">
                    <strong>Manuj Mittal (MJ)</strong> is a writer and youth leader dedicated to advancing youth development through modern management thinking. He is deeply passionate about helping young minds understand that leadership extends far beyond textbooks and titles. For Manuj, leadership begins early, with mindset, curiosity, and the courage to think independently. He works to help youth build confidence, clarity, and leadership awareness from an early age.
                </p>
                <p style="margin-bottom: 2rem;">
                    A keen observer of business practices, leadership, human behavior, and organizational dynamics, Manuj studies the realities of power, ambition, success, morality, and integrity. With a sharp analytical lens, he distills complex management concepts and real-world leadership challenges into thought-provoking quotations that reflect both principle and practice.
                </p>
            </div>

            <!-- Professional & Academic Pillars -->
            <div class="bio-pillars" style="display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; margin-bottom: 6rem; padding: 4rem; background: #f9f9f9; border-radius: 10px;">
                <div class="pillar">
                    <h3 style="color: var(--gold); margin-bottom: 1.5rem; text-transform: uppercase; font-size: 0.8rem; letter-spacing: 3px;">Experience</h3>
                    <ul style="list-style: none; font-size: 1rem; color: #444;">
                        <li style="margin-bottom: 1rem;">• Grant Thornton</li>
                        <li style="margin-bottom: 1rem;">• Morgan Stanley</li>
                        <li style="margin-bottom: 1rem;">• Rotary International</li>
                        <li style="margin-bottom: 1rem;">• Alumnus of Mayo College</li>
                    </ul>
                </div>
                <div class="pillar">
                    <h3 style="color: var(--gold); margin-bottom: 1.5rem; text-transform: uppercase; font-size: 0.8rem; letter-spacing: 3px;">Academic</h3>
                    <ul style="list-style: none; font-size: 1rem; color: #444;">
                        <li style="margin-bottom: 1rem;">• Master’s in Finance</li>
                        <li style="margin-bottom: 1rem;">• MBA, Simon Business School (NY)</li>
                        <li style="margin-bottom: 1rem;">• Ed.D Candidate, University of Rochester</li>
                    </ul>
                </div>
            </div>

            <div class="bio-text-block" style="font-size: 1.15rem; margin-bottom: 4rem;">
                <p style="margin-bottom: 2rem;">
                    Manuj has spoken at conventions around the world and has been recognized on international platforms for his contributions to the field of education. He mentors students and entrepreneurs across the United States and continues to build platforms that encourage principled leadership and strategic thinking.
                </p>
                <p>
                    Currently residing in Rochester, New York, USA, Manuj continues to bridge the gap between global business practice and academic research, fostering a global, practice-driven perspective in everything he undertakes.
                </p>
            </div>

            <!-- CTA Section -->
            <div class="bio-footer-cta" style="text-align: center; border-top: 1px solid #eee; padding-top: 60px; margin-top: 80px;">
                <h4 style="font-size: 1.5rem; margin-bottom: 2rem;">Connect with Manuj</h4>
                <p style="margin-bottom: 3rem; color: #666;">For speaking engagements, mentorship, or literary inquiries.</p>
                <div style="display: flex; justify-content: center; gap: 3rem;">
                    <a href="mailto:author@manujmittal.com" class="btn btn-primary" style="background: #000; color: #fff; padding: 1.2rem 4rem; text-decoration: none; border-radius: 0; font-weight: 800; letter-spacing: 2px;">SEND AN EMAIL</a>
                    <a href="index.php" style="color: #000; text-decoration: none; font-weight: 800; letter-spacing: 2px; border-bottom: 2px solid var(--gold); padding-bottom: 5px;">BACK TO HOME</a>
                </div>
            </div>

        </div>
    </div>
</section>

<?php include 'components/footer.php'; ?>
