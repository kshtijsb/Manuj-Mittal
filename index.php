<?php
require_once 'includes/data.php';
$page_title = "Manuj Mittal";
include 'components/header.php';

// Check for subscriber status
$status = $_GET['status'] ?? null;
?>



<main>
    <!-- Split Hero Section -->
    <section id="home" class="hero">
        <div class="hero-split">

            <!-- LEFT: Book Side -->
            <div class="book-side">
                <div class="card-wrapper">
                    <div class="side-tag"
                        style="margin-bottom: 1rem; font-family: var(--font-serif); font-weight: bold; color: #000; font-size: 1.2rem;">
                        FEATURED WORK</div>

                    <div class="flip-card" style="margin-bottom: 1rem;">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <img src="book cover.jpeg" alt="<?php echo $books[0]['title']; ?>"
                                    style="width: 100%; height: 100%; object-fit: fill;">
                            </div>

                            <!-- BACK: Synopsis + Order Now -->
                            <div class="flip-card-back"
                                style="padding: 1.5rem; display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center; background: #fff; border: 2px solid var(--color-gold); box-shadow: 0 20px 60px rgba(0,0,0,0.08); border-radius: 12px;">
                                <div class="side-tag" style="margin-bottom: 1rem; color: var(--color-gold);">SYNOPSIS
                                </div>
                                <p style="font-size: 0.85rem; line-height: 1.6; color: #555; margin-bottom: 1.5rem;">A
                                    book on upskilling personal life management, featuring thought-provoking quotations
                                    that address four core pillars essential for success: <strong>Vision</strong>,
                                    <strong>Leadership</strong>, <strong>Growth</strong>, and
                                    <strong>Integrity</strong>.
                                </p>
                                <a href="store.php"
                                    style="background: #000; color: #fff; padding: 0.8rem 2rem; text-decoration: none; font-size: 0.75rem; letter-spacing: 2px; font-weight: 700; display: inline-block;">ORDER
                                    NOW</a>
                            </div>
                        </div>
                    </div>

                    <h2
                        style="font-size: 2.2rem; font-family: var(--font-serif); font-weight: bold; color: #000000; margin-bottom: 0; line-height: 1.1; text-transform: uppercase;">
                        <?php echo $books[0]['title']; ?>
                    </h2>

                </div>
            </div>

            <!-- RIGHT: Author Side -->
            <div class="author-side">
                <div class="card-wrapper">
                    <div class="side-tag"
                        style="margin-bottom: 1rem; font-family: var(--font-serif); font-weight: bold; color: #000; font-size: 1.2rem;">
                        THE AUTHOR</div>

                    <div class="flip-card" style="margin-bottom: 1rem;">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <img src="assets/author main.jpg" alt="Manuj Mittal"
                                    style="width: 100%; height: 100%; object-fit: cover; object-position: center;">
                            </div>

                            <!-- BACK: Bio + biography link -->
                            <div class="flip-card-back"
                                style="padding: 1.5rem; display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center; background: #fff; border: 2px solid var(--color-gold); box-shadow: 0 20px 60px rgba(0,0,0,0.08); border-radius: 12px;">
                                <div class="side-tag" style="margin-bottom: 1rem; color: var(--color-gold);">THE
                                    NARRATIVE</div>
                                <p style="font-size: 0.85rem; line-height: 1.6; color: #555; margin-bottom: 1.5rem;">
                                    Manuj Mittal (MJ) is a writer and youth leader dedicated to advancing youth
                                    development through modern management thinking. He distills complex challenges into
                                    thought-provoking narratives.</p>
                                <a href="biography.php"
                                    style="background: #000; color: #fff; padding: 0.8rem 2rem; text-decoration: none; font-size: 0.75rem; letter-spacing: 2px; font-weight: 700; display: inline-block;">FULL
                                    BIOGRAPHY</a>
                            </div>
                        </div>
                    </div>

                    <h2
                        style="font-size: 2.2rem; font-family: var(--font-serif); font-weight: bold; color: #000000; margin-bottom: 0; line-height: 1.1; text-transform: uppercase;">
                        Manuj Mittal<br>(MJ)
                    </h2>

                </div>
            </div>

        </div>

        <!-- Flipbook Viewer Overlay -->
        <div id="inlineFlipbook"
            style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(255,255,255,0.98); z-index: 10000; flex-direction: column; align-items: center; justify-content: center; gap: 3rem;">
            <div style="perspective: 2000px; width: 100%; max-width: 600px; height: 400px; position: relative;">
                <div id="mainBook"
                    style="width: 50%; height: 100%; position: absolute; left: 50%; transform-style: preserve-3d; transition: transform 1.2s ease; transform: translateZ(0);">
                    <div
                        style="position: absolute; width: 100%; height: 100%; background: #002244; border-radius: 0 5px 5px 0; z-index: 1; left: 0;">
                    </div>
                    <div class="page-leaf" id="leaf3"
                        style="position: absolute; width: 100%; height: 100%; left: 0; transform-origin: left center; transform-style: preserve-3d; transition: transform 1.2s ease; z-index: 3;">
                        <div
                            style="position: absolute; width: 100%; height: 100%; background: #fdfdfd; backface-visibility: hidden; padding: 1.5rem; border-left: 1px solid #eee; border-radius: 0 5px 5px 0;">
                            <h4 style="font-family: var(--font-serif); font-size: 1.1rem; margin-bottom: 0.5rem;">
                                Mastery</h4>
                            <p
                                style="font-family: var(--font-serif); line-height: 1.5; color: #333; font-size: 0.85rem;">
                                "The transition from student to architect is silent. It happens when you ask: What will
                                I leave behind?"</p>
                        </div>
                        <div
                            style="position: absolute; width: 100%; height: 100%; background: #fdfdfd; transform: rotateY(180deg); backface-visibility: hidden; padding: 1.5rem;">
                            <p
                                style="font-family: var(--font-serif); line-height: 1.5; color: #333; font-size: 0.85rem;">
                                "Each building is just a page, each city a book, and each life... a grand library."</p>
                        </div>
                    </div>
                    <div class="page-leaf" id="leaf2"
                        style="position: absolute; width: 100%; height: 100%; left: 0; transform-origin: left center; transform-style: preserve-3d; transition: transform 1.2s ease; z-index: 4;">
                        <div
                            style="position: absolute; width: 100%; height: 100%; background: #fdfdfd; backface-visibility: hidden; padding: 1.5rem;">
                            <h4 style="font-family: var(--font-serif); font-size: 1.1rem; margin-bottom: 0.5rem;">
                                Foundation</h4>
                            <p
                                style="font-family: var(--font-serif); line-height: 1.5; color: #333; font-size: 0.85rem;">
                                "A foundation is the education of the heart and the discipline of the mind."</p>
                        </div>
                        <div
                            style="position: absolute; width: 100%; height: 100%; background: #fdfdfd; transform: rotateY(180deg); backface-visibility: hidden; padding: 1.5rem;">
                            <p
                                style="font-family: var(--font-serif); line-height: 1.5; color: #333; font-size: 0.85rem;">
                                "In the silence of Mayo College, I heard the call of leadership. Not to command, but to
                                serve."</p>
                        </div>
                    </div>
                    <div class="page-leaf" id="leaf1"
                        style="position: absolute; width: 100%; height: 100%; left: 0; transform-origin: left center; transform-style: preserve-3d; transition: transform 1.2s ease; z-index: 5;">
                        <div
                            style="position: absolute; width: 100%; height: 100%; background: #003366; backface-visibility: hidden; display: flex; align-items: center; justify-content: center; border-radius: 0 5px 5px 0;">
                            <div
                                style="color: #fff; text-align: center; padding: 1rem; border: 1px solid var(--color-gold);">
                                <div style="font-size: 0.7rem; letter-spacing: 3px; margin-bottom: 0.5rem;">MANUJ MITTAL
                                </div>
                                <div style="font-family: var(--font-serif); font-size: 1rem;">
                                    <?php echo $books[0]['title']; ?>
                                </div>
                            </div>
                        </div>
                        <div
                            style="position: absolute; width: 100%; height: 100%; background: #fdfdfd; transform: rotateY(180deg); backface-visibility: hidden; padding: 1.5rem;">
                            <h4 style="font-family: var(--font-serif); font-size: 1.1rem; margin-bottom: 0.5rem;">
                                Blueprint</h4>
                            <p
                                style="font-family: var(--font-serif); line-height: 1.5; color: #333; font-size: 0.85rem;">
                                "Architecture is the art of how we waste space. Every arch tells a secret..."</p>
                        </div>
                    </div>
                </div>
            </div>
            <div style="display: flex; gap: 1rem;">
                <button onclick="prevPage()" id="prevBtn"
                    style="background: none; border: 1px solid #ddd; color: #333; padding: 0.8rem 1.5rem; cursor: pointer; font-size: 0.8rem; letter-spacing: 1px;">PREV</button>
                <button onclick="nextPage()" id="nextBtn"
                    style="background: #000; border: none; color: #fff; padding: 0.8rem 1.5rem; cursor: pointer; font-size: 0.8rem; letter-spacing: 1px;">NEXT</button>
                <button onclick="closeFlipbook()"
                    style="background: none; border: none; color: #999; padding: 0.8rem 1.5rem; cursor: pointer; font-size: 0.8rem; letter-spacing: 1px;">CLOSE
                    x</button>
            </div>
        </div>

        <script>
            let currentPage = 1;
            const totalPages = 3;
            function openFlipbook() {
                document.getElementById('inlineFlipbook').style.display = 'flex';
                updateControls();
            }
            function closeFlipbook() {
                document.getElementById('inlineFlipbook').style.display = 'none';
                for (let i = 1; i <= totalPages; i++) {
                    document.getElementById('leaf' + i).style.transform = 'rotateY(0deg)';
                    document.getElementById('leaf' + i).style.zIndex = (totalPages - i + 3);
                }
                currentPage = 1;
            }
            function nextPage() {
                if (currentPage <= totalPages) {
                    document.getElementById('leaf' + currentPage).style.transform = 'rotateY(-180deg)';
                    document.getElementById('leaf' + currentPage).style.zIndex = currentPage + 3;
                    currentPage++;
                    updateControls();
                }
            }
            function prevPage() {
                if (currentPage > 1) {
                    currentPage--;
                    document.getElementById('leaf' + currentPage).style.transform = 'rotateY(0deg)';
                    document.getElementById('leaf' + currentPage).style.zIndex = (totalPages - currentPage + 3);
                    updateControls();
                }
            }
            function updateControls() {
                document.getElementById('prevBtn').style.opacity = currentPage === 1 ? '0.3' : '1';
                document.getElementById('nextBtn').style.opacity = currentPage > totalPages ? '0.3' : '1';
            }
        </script>

        <!-- Apple Executive Mobile Hero -->
        <div class="hero-mobile">

            <img src="assets/author main.jpg" alt="Manuj Mittal" class="hero-mobile-portrait">
            <h1 class="hero-mobile-title">Manuj Mittal.</h1>
            <p class="hero-mobile-desc">Writer, youth leader, and visionary distilling complex challenges into
                thought-provoking narratives.</p>

            <div class="hero-mobile-buttons">
                <a href="biography.php" class="btn-apple-primary">Read Full Story</a>
                <a href="store.php" class="btn-apple-secondary">The New Book</a>
            </div>
        </div>
    </section>

    <!-- Cinematic Mobile Book Reveal (Mid-Scroll) -->

    <section id="book" class="mobile-cinematic-book reveal">
        <div class="cinematic-glow"></div>
        <img src="book cover.jpeg" alt="<?php echo $books[0]['title']; ?>" class="cinematic-book-cover">
        <h2 class="cinematic-title"><?php echo $books[0]['title']; ?></h2>
        <p class="cinematic-subtitle">Featured Work</p>
        <a href="store.php" class="btn-cinematic">Pre-Order Now</a>
    </section>

    <!-- Executive Mobile Layout Logic -->


    <!-- About Pillars Section (Color Coded) -->
    <section id="about" class="container" style="padding-top: 15vh;">
        <div class="section-header reveal">
            <h2 style="font-family: var(--font-serif); font-size: 3.5rem; margin-bottom: 2rem; color: #000;">Foundation
                of the Author.</h2>
        </div>


        <div class="about-pillars">
            <!-- Education: Blue -->
            <a href="education.php" class="pillar-card reveal pillar-edu"
                style="--theme-color: #0047AB; border-top: 6px solid #0047AB; position: relative; overflow: hidden; display: block; text-decoration: none; color: inherit;">

                <div class="pillar-tag"
                    style="color: #0047AB; font-weight: 800; letter-spacing: 3px; font-size: 0.65rem; margin-bottom: 1.5rem; text-transform: uppercase;">
                    Educational Background</div>
                <h3 style="font-size: 1.8rem; margin-bottom: 1.5rem; color: var(--text);">Educational Background
                </h3>
                <ul class="pillar-list">
                    <li>Early Life - Childhood (1996)</li>
                    <li>Mayo College (Boarding School) at Age 12 (2008)</li>
                    <li>Chess Champion @Age 15 (WazirChand Trophy)</li>
                    <li>High School: Science (PCM)</li>
                    <li>IMO (Represented India) in Kazakhstan</li>
                    <li>Pursued CA (US CPA Equivalent) from Delhi, India</li>
                    <li>IT Trainings and Soft Skills Programming</li>
                    <li>B. Com 2017 - IGNOU, India</li>
                    <li>Ms Finance 2020 - USA (Left India at age 23 in 2019)</li>
                    <li>MBA (Finance) 2021 - Simon Business School, USA</li>
                    <li>Dean’s List</li>
                    <li>Networking Coaching</li>
                    <li>Pursuing Doctor of Education (HE Administration)</li>
                    <li>Award: Education 2.0 (Las Vegas)</li>
                    <li>Graduating 2027</li>
                    <li>Co-Chair: HE Students Association</li>
                </ul>
                <div class="pillar-link"
                    style="margin-top: 1.5rem; background: rgba(0,71,171,0.1); padding: 0.75rem 1.25rem; border-radius: 4px; color: #0047AB; font-weight: 800; font-size: 0.8rem; letter-spacing: 2px; text-transform: uppercase; display: inline-flex; align-items: center; gap: 0.5rem; transition: background 0.3s ease;">
                    Read More <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </div>
            </a>

            <!-- Profession: Red -->
            <a href="professional.php" class="pillar-card reveal pillar-prof"
                style="--theme-color: #C41E3A; border-top: 6px solid #C41E3A; position: relative; overflow: hidden; display: block; text-decoration: none; color: inherit;">

                <div class="pillar-tag"
                    style="color: #C41E3A; font-weight: 800; letter-spacing: 3px; font-size: 0.65rem; margin-bottom: 1.5rem; text-transform: uppercase;">
                    Professional Career</div>
                <h3 style="font-size: 1.8rem; margin-bottom: 1.5rem; color: var(--text);">Professional Career</h3>
                <ul class="pillar-list">
                    <li>BNP Paribas - Internship</li>
                    <li>Grant Thornton - Articleship/ Externship (USA)</li>
                    <li>Boutique Investment Banking (Delhi, India)</li>
                    <li>Boutique M&amp;A (NY, USA)</li>
                    <li>Morgan Stanley (Manhattan, USA)</li>
                    <li>CPA, Firm (NY, USA)</li>
                    <li>Career Advisor /AD - UR (Rochester,USA)</li>
                    <li>Award: Education 2.0 (Las Vegas)</li>
                    <li>Leadership Programs GA - UR (Rochester,USA)</li>
                </ul>
                <div class="pillar-link"
                    style="margin-top: 1.5rem; background: rgba(196,30,58,0.1); padding: 0.75rem 1.25rem; border-radius: 4px; color: #C41E3A; font-weight: 800; font-size: 0.8rem; letter-spacing: 2px; text-transform: uppercase; display: inline-flex; align-items: center; gap: 0.5rem; transition: background 0.3s ease;">
                    Read More <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </div>
            </a>

            <!-- Social Responsibility: Green -->
            <a href="social-responsibility.php" class="pillar-card reveal pillar-social"
                style="--theme-color: #2E8B57; border-top: 6px solid #2E8B57; position: relative; overflow: hidden; display: block; text-decoration: none; color: inherit;">

                <div class="pillar-tag"
                    style="color: #2E8B57; font-weight: 800; letter-spacing: 3px; font-size: 0.65rem; margin-bottom: 1.5rem; text-transform: uppercase;">
                    Social Responsibility</div>
                <h3 style="font-size: 1.8rem; margin-bottom: 1.5rem; color: var(--text);">Social Responsibility</h3>
                <ul class="pillar-list">
                    <li>RYLA Participant - Interact 2013 (Rotary International)</li>
                    <li>Joined Rotaract in 2014 - RC MV (Rotary International)</li>
                    <li>Charter President - RC Delhi Central (2015-16)</li>
                    <li>RI Convention - Atlanta 2017</li>
                    <li>District Rotaract Representative (2016-17)</li>
                    <li>RI Convention - Toronto 2018</li>
                    <li>RI Convention - Hamburg 2019</li>
                    <li>RSA ROAR ‘Best DRR’ Award</li>
                    <li>President - Rotaract South Asia MDIO (2019-2020)</li>
                    <li>8 Countries, xDistricts, #200,000 Rotaractors</li>
                    <li>Chairman - Rotasia Delhi 2020 (Conference)</li>
                    <li><strong>At Present:</strong></li>
                    <li>RI Member and Rotaract Alumni</li>
                    <li>Mayo Alumni North America (MACANA)- Member</li>
                    <li>ICAI, NY- Member</li>
                    <li>Simon Business School, NY- Alumni</li>
                </ul>
                <div class="pillar-link"
                    style="margin-top: 1.5rem; background: rgba(46,139,87,0.1); padding: 0.75rem 1.25rem; border-radius: 4px; color: #2E8B57; font-weight: 800; font-size: 0.8rem; letter-spacing: 2px; text-transform: uppercase; display: inline-flex; align-items: center; gap: 0.5rem; transition: background 0.3s ease;">
                    Read More <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </div>
            </a>
        </div>


    </section>

    <!-- Journey Section: Dynamic Photo Timeline -->
    <section id="journey" style="padding: 15vh 0; overflow: hidden; background: transparent;">


        <div class="container journey-header">
            <div style="text-align: center; margin-bottom: 8rem;" class="reveal legacy-title-wrapper">
                <h2 style="font-family: var(--font-serif); font-size: 3.5rem; margin-bottom: 2rem; color: #000;">A
                    Legacy in the Making.</h2>
            </div>
        </div>



        <div class="timeline-container">
            <!-- Horizontal Timeline Line -->
            <div class="timeline-line-horizontal">
                <div class="timeline-progress-horizontal"></div>
            </div>

            <!-- Milestone 1: Early Life and Family -->
            <div class="timeline-card" style="--theme-color: #2E8B57;">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <div class="timeline-img">
                        <div class="timeline-marquee">
                            <div class="timeline-marquee-track">
                                <img src="assets/Early%20life%20and%20family/0_Final1.jpg" alt="Early Life">
                                <img src="assets/Early%20life%20and%20family/0_Final2.JPG" alt="Early Life">
                                <img src="assets/Early%20life%20and%20family/0_Final3.JPG" alt="Early Life">
                                <img src="assets/Early%20life%20and%20family/0_Final4.JPG" alt="Early Life">
                                <img src="assets/Early%20life%20and%20family/0_Final5.jpg" alt="Early Life">
                                <img src="assets/Early%20life%20and%20family/0_Final6.jpg" alt="Early Life">
                            </div>
                        </div>
                    </div>
                    <div class="timeline-text">
                        <h4>Early Life and Family</h4>
                        <ul class="timeline-list">
                            <li>Family members are engineers, doctors, lawyers and public sector administrators </li>
                            <li>Father early career in USA, build his own business in India and is Past District
                                Governor with Rotary International</li>
                            <li>Manuj born on Jan 10 (01.10.1996) &nbsp;<span
                                    class="numerology">〈1+1+1+9+9+6=27〉〈2+7=9〉</span></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Milestone 2: Education in India -->
            <div class="timeline-card" style="--theme-color: #C41E3A;">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <div class="timeline-img">
                        <div class="timeline-marquee">
                            <div class="timeline-marquee-track">
                                <img src="assets/Education%20in%20India/0_Final1.jpg" alt="Education">
                                <img src="assets/Education%20in%20India/0_Final2.JPG" alt="Education">
                                <img src="assets/Education%20in%20India/0_Final3.JPG" alt="Education">
                                <img src="assets/Education%20in%20India/0_Final4.jpeg" alt="Education">
                                <img src="assets/Education%20in%20India/0_Final5.jpg" alt="Education">
                                <img src="assets/Education%20in%20India/0_Final6.JPG" alt="Education">
                            </div>
                        </div>
                    </div>
                    <div class="timeline-text">
                        <h4>Education in India</h4>
                        <ul class="timeline-list">
                            <li>Early schooling from Mayo College, Ajmer</li>
                            <li>B. Commerce in Accounting & Finance, Delhi</li>
                            <li>ICAI (Chartered Accountant) — Intermediate</li>
                            <li>Honorary Doctorate in Leadership & Social Work</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Milestone 3: Professional Journey in India -->
            <div class="timeline-card" style="--theme-color: #0047AB;">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <div class="timeline-img">
                        <div class="timeline-marquee">
                            <div class="timeline-marquee-track">
                                <img src="assets/Professional%20Journey%20%20India/0_Final1.PNG" alt="Professional">
                                <img src="assets/Professional%20Journey%20%20India/0_Final2.jpg" alt="Professional">
                                <img src="assets/Professional%20Journey%20%20India/0_Final3.PNG" alt="Professional">
                                <img src="assets/Professional%20Journey%20%20India/0_Final4.jpeg" alt="Professional">
                                <img src="assets/Professional%20Journey%20%20India/0_Final5.jpg" alt="Professional">
                            </div>
                        </div>
                    </div>
                    <div class="timeline-text">
                        <h4>Professional Journey in India</h4>
                        <ul class="timeline-list">
                            <li>Risk Advisory (Internal Audit) at Grant Thornton</li>
                            <li>Consulting at Boutique Firm</li>
                            <li>M&amp;A at Boutique IB Firm</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Milestone 4: Rise in Rotaract -->
            <div class="timeline-card" style="--theme-color: #2E8B57;">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <div class="timeline-img">
                        <div class="timeline-marquee">
                            <div class="timeline-marquee-track">
                                <img src="assets/Rise%20in%20Rotaract/0_Final1.jpg" alt="Rotaract">
                                <img src="assets/Rise%20in%20Rotaract/0_Final2.JPG" alt="Rotaract">
                                <img src="assets/Rise%20in%20Rotaract/0_Final3%20(Add%20to%20top%20left%20corner).jpg"
                                    alt="Rotaract">
                                <img src="assets/Rise%20in%20Rotaract/0_Final3.JPG" alt="Rotaract">
                                <img src="assets/Rise%20in%20Rotaract/0_Final4.JPG" alt="Rotaract">
                                <img src="assets/Rise%20in%20Rotaract/0_Final5.JPG" alt="Rotaract">
                                <img src="assets/Rise%20in%20Rotaract/0_Final6.JPG" alt="Rotaract">
                                <img src="assets/Rise%20in%20Rotaract/0_Final7.jpg" alt="Rotaract">
                                <img src="assets/Rise%20in%20Rotaract/0_Final8.jpg" alt="Rotaract">
                            </div>
                        </div>
                    </div>
                    <div class="timeline-text">
                        <h4>Service through Rotaract International</h4>
                        <ul class="timeline-list">
                            <li>Charter President — Rotaract Club Delhi Central</li>
                            <li>District Rotaract Representative (DRR) — RID 3011 (2016–2017)</li>
                            <li>President — Rotaract South Asia MDIO (2019–2020)</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Milestone 5: Education in the US -->
            <div class="timeline-card" style="--theme-color: #C41E3A;">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <div class="timeline-img">
                        <div class="timeline-marquee">
                            <div class="timeline-marquee-track">
                                <img src="assets/Education%20in%20the%20US/0_Final1.jpg" alt="Education US">
                                <img src="assets/Education%20in%20the%20US/0_Final2.jpg" alt="Education US">
                                <img src="assets/Education%20in%20the%20US/0_Final3.jpg" alt="Education US">
                                <img src="assets/Education%20in%20the%20US/0_Final4.jpg" alt="Education US">
                                <img src="assets/Education%20in%20the%20US/0_Final5.JPG" alt="Education US">
                                <img src="assets/Education%20in%20the%20US/0_Final6.jpg" alt="Education US">
                            </div>
                        </div>
                    </div>
                    <div class="timeline-text">
                        <h4>Education in the US</h4>
                        <ul class="timeline-list">
                            <li>Master in Finance (MSF) — Simon Business School, NY</li>
                            <li>Master in Business Administration (MBA) — Simon Business School, NY</li>
                            <li>Doctorate in Education (Ed.D) — Warner School, University of Rochester</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Milestone 6: Rise in Rotary -->
            <div class="timeline-card" style="--theme-color: #0047AB;">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <div class="timeline-img">
                        <div class="timeline-marquee">
                            <div class="timeline-marquee-track">
                                <img src="assets/Rise%20in%20Rotary/0_Final1.JPG" alt="Rotary">
                                <img src="assets/Rise%20in%20Rotary/0_Final2.JPG" alt="Rotary">
                                <img src="assets/Rise%20in%20Rotary/0_Final3.JPG" alt="Rotary">
                                <img src="assets/Rise%20in%20Rotary/0_Final4.jpg" alt="Rotary">
                                <img src="assets/Rise%20in%20Rotary/0_Final5.JPG" alt="Rotary">
                                <img src="assets/Rise%20in%20Rotary/0_Final6.JPG" alt="Rotary">
                            </div>
                        </div>
                    </div>
                    <div class="timeline-text">
                        <h4>Service and Leadership with Rotary International</h4>
                        <ul class="timeline-list">
                            <li>Rotaract Representative at RI Assembly, USA 2020</li>
                            <li>Chairman — Rotasia Delhi 2020</li>
                            <li>Speaker at International Pre-Convention (USA 2017, Canada 2018, Germany 2019)</li>
                            <li>Rotary International — Paul Harris Fellow (PHF)</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Milestone 7: Professional Journey in the US -->
            <div class="timeline-card" style="--theme-color: #2E8B57;">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <div class="timeline-img">
                        <div class="timeline-marquee">
                            <div class="timeline-marquee-track">
                                <img src="assets/Professional%20Journey%20in%20the%20US/0_Final2.jpg"
                                    alt="Professional US">
                                <img src="assets/Professional%20Journey%20in%20the%20US/0_Final3.jpg"
                                    alt="Professional US">
                                <img src="assets/Professional%20Journey%20in%20the%20US/0_Final5.jpg"
                                    alt="Professional US">
                            </div>
                        </div>
                    </div>
                    <div class="timeline-text">
                        <h4>USA Professional Journey</h4>
                        <ul class="timeline-list">
                            <li>Finance Internships at Boutique Firms</li>
                            <li>Investor Services at Morgan Stanley, NYC</li>
                            <li>Career Consultant at Benet Career Management Center, University of Rochester</li>
                            <li>Leadership Program GA at Student Life, University of Rochester</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Milestone 8: Vision | Awards & Recognition -->
            <div class="timeline-card" style="--theme-color: #C41E3A;">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <div class="timeline-img">
                        <div class="timeline-marquee">
                            <div class="timeline-marquee-track">
                                <img src="assets/Vision%20%7C%20Awards%20%26%20Recognition./0_Final1.jpg" alt="Awards">
                                <img src="assets/Vision%20%7C%20Awards%20%26%20Recognition./0_Final2.jpg" alt="Awards">
                                <img src="assets/Vision%20%7C%20Awards%20%26%20Recognition./0_Final4.jpg" alt="Awards">
                                <img src="assets/Vision%20%7C%20Awards%20%26%20Recognition./0_Final6.JPG" alt="Awards">
                                <img src="assets/Vision%20%7C%20Awards%20%26%20Recognition./0_Final7.JPG" alt="Awards">
                                <img src="assets/Vision%20%7C%20Awards%20%26%20Recognition./0_Final8.jpg" alt="Awards">
                            </div>
                        </div>
                    </div>
                    <div class="timeline-text">
                        <h4>Awards & Recognition</h4>
                        <ul class="timeline-list">
                            <li>District Chess Champion - Rajasthan, India 2011</li>
                            <li>Represented India at International Maths Olympiad, Kazakhstan 2014</li>
                            <li>Best ‘DRR’ - South Asia 2017</li>
                            <li>Dean’s List - Simon Business School, NY 2021</li>
                            <li>Excellence in Education - 2.0 Conference USA 2026</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const cards = document.querySelectorAll('.timeline-card');
                const timelineContainer = document.querySelector('.timeline-container');
                const progressHorizontal = document.querySelector('.timeline-progress-horizontal');
                const lineHorizontal = document.querySelector('.timeline-line-horizontal');

                // Update dynamic layout properties for horizontal scroll line
                const initHorizontalLine = () => {
                    if (cards.length > 0 && lineHorizontal) {
                        const firstCard = cards[0];
                        const lastCard = cards[cards.length - 1];

                        const firstCenter = firstCard.offsetLeft + firstCard.clientWidth / 2;
                        const lastCenter = lastCard.offsetLeft + lastCard.clientWidth / 2;

                        lineHorizontal.style.left = firstCenter + 'px';
                        lineHorizontal.style.width = (lastCenter - firstCenter) + 'px';
                    }
                };

                const updateTimeline = () => {
                    if (!timelineContainer) return;

                    // Global horizontal scroll logic
                    const maxScroll = timelineContainer.scrollWidth - timelineContainer.clientWidth;
                    if (maxScroll > 0) {
                        const pct = (timelineContainer.scrollLeft / maxScroll) * 100;
                        if (progressHorizontal) {
                            progressHorizontal.style.width = pct + '%';
                        }
                    }

                    // Determine center card
                    const containerCenter = timelineContainer.scrollLeft + timelineContainer.clientWidth / 2;
                    let closestCard = null;
                    let minDistance = Infinity;

                    cards.forEach(card => {
                        const cardCenter = card.offsetLeft + card.clientWidth / 2;
                        const distance = Math.abs(containerCenter - cardCenter);
                        if (distance < minDistance) {
                            minDistance = distance;
                            closestCard = card;
                        }
                    });

                    cards.forEach(card => {
                        if (card === closestCard) {
                            card.classList.add('active-mobile');
                        } else {
                            card.classList.remove('active-mobile');
                        }
                    });
                };

                // Desktop Drag-to-Scroll Functionality
                let isDown = false;
                let startX;
                let scrollLeft;

                if (timelineContainer) {
                    timelineContainer.addEventListener('mousedown', (e) => {
                        isDown = true;
                        timelineContainer.style.cursor = 'grabbing';
                        startX = e.pageX - timelineContainer.offsetLeft;
                        scrollLeft = timelineContainer.scrollLeft;
                    });
                    timelineContainer.addEventListener('mouseleave', () => {
                        isDown = false;
                        timelineContainer.style.cursor = 'grab';
                    });
                    timelineContainer.addEventListener('mouseup', () => {
                        isDown = false;
                        timelineContainer.style.cursor = 'grab';
                    });
                    timelineContainer.addEventListener('mousemove', (e) => {
                        if (!isDown) return;
                        e.preventDefault();
                        const x = e.pageX - timelineContainer.offsetLeft;
                        const walk = (x - startX) * 2; // Scroll-fast
                        timelineContainer.scrollLeft = scrollLeft - walk;
                    });
                }

                // Setup slideshows for multi-photo cards
                const initSlideshows = () => {
                    const marquees = document.querySelectorAll('.timeline-marquee');
                    marquees.forEach(marquee => {
                        const track = marquee.querySelector('.timeline-marquee-track');
                        if (!track) return;

                        // Prevent duplicate initialization
                        if (track.dataset.slideshowInitialized) return;
                        track.dataset.slideshowInitialized = "true";

                        const images = Array.from(track.querySelectorAll('img'));
                        if (images.length <= 1) return;

                        // Clone first image for seamless looping
                        const firstClone = images[0].cloneNode(true);
                        track.appendChild(firstClone);

                        let currentIndex = 0;
                        let intervalId = null;
                        const slideCount = images.length;

                        const startSlideshow = () => {
                            if (intervalId) return;
                            intervalId = setInterval(() => {
                                currentIndex++;
                                track.style.transition = 'transform 0.6s cubic-bezier(0.25, 1, 0.5, 1)';
                                track.style.transform = `translate3d(-${currentIndex * 100}%, 0, 0)`;

                                if (currentIndex === slideCount) {
                                    // Reset to index 0 seamlessly after slide transition finishes
                                    setTimeout(() => {
                                        track.style.transition = 'none';
                                        currentIndex = 0;
                                        track.style.transform = 'translate3d(0, 0, 0)';
                                    }, 600);
                                }
                            }, 2600); // Stop for 2 seconds (2.0s pause + 0.6s transition)
                        };

                        const stopSlideshow = () => {
                            if (intervalId) {
                                clearInterval(intervalId);
                                intervalId = null;
                            }
                        };

                        // Start the cycle
                        startSlideshow();

                        // Pause slideshow when user hovers or taps the parent card
                        const card = marquee.closest('.timeline-card');
                        if (card) {
                            card.addEventListener('mouseenter', stopSlideshow);
                            card.addEventListener('mouseleave', startSlideshow);
                            // Support tap to toggle pause/play on mobile devices
                            card.addEventListener('touchstart', () => {
                                if (intervalId) stopSlideshow();
                                else startSlideshow();
                            }, { passive: true });
                        }
                    });
                };

                // Setup resize and scroll handlers
                window.addEventListener('scroll', updateTimeline);
                window.addEventListener('resize', () => {
                    initHorizontalLine();
                    updateTimeline();
                });

                if (timelineContainer) {
                    timelineContainer.addEventListener('scroll', updateTimeline);
                }

                // Initial run after layout calculations are ready
                setTimeout(() => {
                    initHorizontalLine();
                    updateTimeline();
                    initSlideshows();
                }, 100);
            });
        </script>
    </section>





    <!-- Sleek Contact CTA -->

    <section id="contact" class="container reveal contact-cta" style="text-align: center;">
        <div class="contact-cta-inner"
            style="background: rgba(255, 255, 255, 0.4); backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px); border-radius: 24px; max-width: 800px; margin: 0 auto; box-shadow: 0 10px 30px rgba(0,0,0,0.02); border: 1px solid rgba(255, 255, 255, 0.5);">
            <div class="side-tag"
                style="color: var(--gold); font-weight: 800; letter-spacing: 4px; margin-bottom: 1.5rem; display: block; text-transform: uppercase; font-size: 0.75rem;">
                Let's Connect
            </div>
            <h2
                style="font-family: var(--font-sans); font-size: clamp(2.5rem, 5vw, 4rem); font-weight: 800; letter-spacing: -2px; margin-bottom: 2rem; color: #111; line-height: 1.1;">
                Open to connecting<br>and networking forward.
            </h2>
            <p style="font-size: 1.1rem; color: #555; max-width: 500px; margin: 0 auto 3rem auto; line-height: 1.6;">
                Whether for speaking engagements, mentorship, or literary inquiries, Manuj is always open to starting a
                new conversation.
            </p>
            <a href="contact.php" class="btn-apple-primary"
                style="display: inline-block; background: #000; color: #fff; text-decoration: none; padding: 1.2rem 3rem; border-radius: 50px; font-weight: 600; font-size: 1rem;">
                Get in Touch
            </a>
        </div>
    </section>
    <!-- Impact by the Numbers -->
    <section class="stats-section container" style="padding: 8vh 0; text-align: center; border-top: 1px solid #eee;">

        <div class="stats-grid"
            style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 4rem;">
            <div class="stat-item reveal">
                <div class="stat-number plus" data-target="15"
                    style="font-size: 5.5rem; font-weight: 800; color: #000; margin-bottom: 1rem; letter-spacing: -2px;">
                    0</div>
                <div class="stat-label"
                    style="letter-spacing: 4px; font-size: 0.75rem; color: var(--gold); font-weight: 800; text-transform: uppercase;">
                    Countries Travelled</div>
            </div>
            <div class="stat-item reveal">
                <div class="stat-number plus" data-target="10000"
                    style="font-size: 5.5rem; font-weight: 800; color: #000; margin-bottom: 1rem; letter-spacing: -2px;">
                    0</div>
                <div class="stat-label"
                    style="letter-spacing: 4px; font-size: 0.75rem; color: var(--gold); font-weight: 800; text-transform: uppercase;">
                    Days Lived</div>
            </div>
            <div class="stat-item reveal">
                <div class="stat-number plus" data-target="150000"
                    style="font-size: 5.5rem; font-weight: 800; color: #000; margin-bottom: 1rem; letter-spacing: -2px;">
                    0</div>
                <div class="stat-label"
                    style="letter-spacing: 4px; font-size: 0.75rem; color: var(--gold); font-weight: 800; text-transform: uppercase;">
                    Lives Impacted</div>
            </div>
        </div>
    </section>

    <!-- Visionary Quotes -->
    <section class="quotes-section"
        style="padding: 4rem 0; background: transparent; position: relative; overflow: hidden;">
        <div
            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; opacity: 0.03; pointer-events: none; background-image: url('https://www.transparenttextures.com/patterns/cubes.png');">
        </div>
        <div class="container" style="text-align: center; max-width: 900px; position: relative; z-index: 2;">
            <div style="width: 100%;">
                <p style="font-family: var(--font-serif); font-size: 2.8rem; font-style: italic; line-height: 1.3; margin-bottom: 3rem; color: #000;">
                    "Skill Youth and Empower Communities for Better Tomorrow"</p>
            </div>
        </div>
    </section>



</main>




<?php include 'components/footer.php'; ?>