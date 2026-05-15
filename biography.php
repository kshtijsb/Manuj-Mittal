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

            <!-- Apple Bento Box Layout -->
            <style>
                .bento-grid {
                    display: grid;
                    grid-template-columns: repeat(2, 1fr);
                    gap: 1.5rem;
                    margin-bottom: 6rem;
                }
                .bento-item {
                    background: #f5f5f7;
                    border-radius: 24px;
                    padding: 2.5rem;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    position: relative;
                    overflow: hidden;
                }
                .bento-wide { grid-column: span 2; }
                .bento-title {
                    font-size: 0.8rem;
                    font-weight: 800;
                    letter-spacing: 2px;
                    text-transform: uppercase;
                    color: var(--gold);
                    margin-bottom: 1.5rem;
                }
                .bento-text {
                    font-size: 1.15rem;
                    color: #111;
                    line-height: 1.6;
                    font-weight: 600;
                }
                .bento-list { list-style: none; padding: 0; margin: 0; }
                .bento-list li {
                    font-size: 1.05rem;
                    color: #444;
                    margin-bottom: 0.8rem;
                    display: flex;
                    align-items: center;
                    gap: 0.5rem;
                }
                .bento-list li::before {
                    content: '';
                    display: inline-block;
                    width: 6px;
                    height: 6px;
                    background: var(--gold);
                    border-radius: 50%;
                }
                
                @media (max-width: 768px) {
                    .bento-grid { grid-template-columns: 1fr; gap: 1rem; }
                    .bento-wide { grid-column: span 1; }
                    .bento-item { padding: 2rem; border-radius: 20px; }
                }
            </style>

            <div class="bento-grid reveal">
                <!-- Quote Box (Wide) -->
                <div class="bento-item bento-wide" style="background: #000; color: #fff;">
                    <div class="bento-title" style="color: #fff; opacity: 0.5;">The Philosophy</div>
                    <div class="bento-text" style="color: #fff; font-family: var(--font-serif); font-size: 1.8rem; font-style: italic; font-weight: 400;">
                        "Leadership is not defined by age, but is shaped by attitude. It is not determined by titles but by the decisions one makes."
                    </div>
                </div>

                <!-- Experience Box -->
                <div class="bento-item">
                    <div class="bento-title">Experience</div>
                    <ul class="bento-list">
                        <li>Grant Thornton</li>
                        <li>Morgan Stanley</li>
                        <li>Rotary International</li>
                        <li>Alumnus of Mayo College</li>
                    </ul>
                </div>

                <!-- Academic Box -->
                <div class="bento-item">
                    <div class="bento-title">Academic</div>
                    <ul class="bento-list">
                        <li>Master’s in Finance</li>
                        <li>MBA, Simon Business School</li>
                        <li>Ed.D Candidate, Univ of Rochester</li>
                    </ul>
                </div>

                <!-- Global Reach Box (Wide) -->
                <div class="bento-item bento-wide">
                    <div class="bento-title">Global Impact</div>
                    <div class="bento-text" style="font-weight: 400;">
                        Recognized on international platforms for contributions to education. Mentors students and entrepreneurs across the United States, fostering principled leadership.
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<?php include 'components/footer.php'; ?>
