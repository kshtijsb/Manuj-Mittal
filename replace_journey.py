with open('index.php', 'r') as f:
    lines = f.readlines()

start_idx = 689
end_idx = 1028

new_content = """    <!-- Journey Section: Alternating Timeline -->
    <section id="journey" style="padding: 15vh 0; overflow: hidden; background: #fafafa; position: relative;">
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; opacity: 0.03; pointer-events: none; background-image: url('https://www.transparenttextures.com/patterns/cubes.png');"></div>
        
        <div class="container journey-header" style="position: relative; z-index: 2;">
            <div style="text-align: center; margin-bottom: 8rem;" class="reveal">
                <div class="side-tag" style="color: var(--gold); letter-spacing: 5px; margin-bottom: 1.5rem; display: block;">THE EVOLUTION</div>
                <h2 style="font-size: clamp(3.5rem, 7vw, 5.5rem); line-height: 1; color: #000; letter-spacing: -2px; font-family: var(--font-serif);">A Legacy in<br>the Making.</h2>
            </div>
        </div>

        <style>
            .timeline-container {
                position: relative;
                max-width: 1200px;
                margin: 0 auto;
                padding: 4rem 2rem;
            }

            /* Central Line */
            .timeline-line {
                position: absolute;
                left: 50%;
                top: 0;
                bottom: 0;
                width: 2px;
                background: rgba(0,0,0,0.1);
                transform: translateX(-50%);
                z-index: 1;
            }
            .timeline-progress {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                background: var(--gold);
                height: 0%;
                transition: height 0.3s ease-out;
            }

            /* Milestone Card */
            .timeline-card {
                position: relative;
                width: 45%;
                margin-bottom: 6rem;
                opacity: 0;
                transform: translateY(50px);
                transition: all 0.8s cubic-bezier(0.19, 1, 0.22, 1);
                z-index: 2;
            }
            .timeline-card.active {
                opacity: 1;
                transform: translateY(0);
            }

            /* Left Side Cards */
            .timeline-card:nth-child(odd) {
                left: 0;
            }
            /* Right Side Cards */
            .timeline-card:nth-child(even) {
                left: 55%;
            }

            /* The Dot on the Line */
            .timeline-dot {
                position: absolute;
                top: 40px;
                width: 20px;
                height: 20px;
                background: #fff;
                border: 3px solid #ddd;
                border-radius: 50%;
                z-index: 3;
                transition: all 0.4s ease;
            }
            .timeline-card:nth-child(odd) .timeline-dot {
                right: -11.5%; /* Position exactly on the center line */
                transform: translateX(50%);
            }
            .timeline-card:nth-child(even) .timeline-dot {
                left: -11.5%; /* Position exactly on the center line */
                transform: translateX(-50%);
            }

            .timeline-card.active .timeline-dot {
                border-color: var(--gold);
                background: var(--gold);
                box-shadow: 0 0 0 8px rgba(212, 175, 55, 0.2);
            }

            /* Card Content Styling */
            .timeline-content {
                background: #fff;
                border-radius: 12px;
                overflow: hidden;
                box-shadow: 0 20px 40px rgba(0,0,0,0.05);
                border: 1px solid rgba(0,0,0,0.03);
                transition: transform 0.5s ease, box-shadow 0.5s ease;
            }
            .timeline-content:hover {
                transform: translateY(-10px);
                box-shadow: 0 40px 80px rgba(0,0,0,0.1);
            }

            .timeline-img {
                width: 100%;
                height: 300px;
                overflow: hidden;
                position: relative;
            }
            .timeline-img img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: transform 0.8s ease;
            }
            .timeline-content:hover .timeline-img img {
                transform: scale(1.05);
            }

            .timeline-text {
                padding: 3rem;
            }
            .timeline-year {
                font-size: 0.8rem;
                font-weight: 800;
                letter-spacing: 4px;
                text-transform: uppercase;
                color: var(--gold);
                margin-bottom: 1rem;
            }
            .timeline-text h4 {
                font-size: 2.2rem;
                color: #000;
                margin-bottom: 1.5rem;
                font-family: var(--font-serif);
                line-height: 1.2;
            }
            .timeline-text p {
                font-size: 1.1rem;
                color: #666;
                line-height: 1.8;
                margin: 0;
            }

            /* Mobile Optimization */
            @media (max-width: 992px) {
                .timeline-line {
                    left: 20px;
                    transform: none;
                }
                .timeline-card {
                    width: calc(100% - 60px);
                    left: 60px !important;
                    margin-bottom: 4rem;
                }
                .timeline-dot {
                    left: -50px !important;
                    transform: none !important;
                }
                .timeline-img {
                    height: 250px;
                }
                .timeline-text {
                    padding: 2rem;
                }
                .timeline-text h4 {
                    font-size: 1.8rem;
                }
            }
        </style>

        <div class="timeline-container">
            <div class="timeline-line">
                <div class="timeline-progress"></div>
            </div>

            <!-- Milestone 1 -->
            <div class="timeline-card">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <div class="timeline-img shimmer">
                        <img src="https://images.unsplash.com/photo-1523050335102-c32509142270?auto=format&fit=crop&q=80&w=1000" alt="Foundation">
                    </div>
                    <div class="timeline-text">
                        <div class="timeline-year">1996 – 2011 · Foundation</div>
                        <h4>Early Life & Schooling</h4>
                        <p>Born in India (1996). Proud alumnus of Mayo College boarding school (2008) — one of India's most prestigious institutions. Chess Champion & WazirChand Trophy winner (2011).</p>
                    </div>
                </div>
            </div>

            <!-- Milestone 2 -->
            <div class="timeline-card">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <div class="timeline-img shimmer">
                        <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&q=80&w=1000" alt="Global Service">
                    </div>
                    <div class="timeline-text">
                        <div class="timeline-year">2013 – 2017 · Global Service</div>
                        <h4>Rise in Rotary International</h4>
                        <p>RYLA Participant (2013). Joined Rotaract (2014). Charter President (2015). District Rotaract Representative & RI Atlanta Convention (2017).</p>
                    </div>
                </div>
            </div>

            <!-- Milestone 3 -->
            <div class="timeline-card">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <div class="timeline-img shimmer">
                        <img src="https://images.unsplash.com/photo-1507679799987-c73779587ccf?auto=format&fit=crop&q=80&w=1000" alt="Career Beginnings">
                    </div>
                    <div class="timeline-text">
                        <div class="timeline-year">2015 · Career Beginnings</div>
                        <h4>Early Professional Life</h4>
                        <p>Entered the workforce and began his professional journey, establishing the foundation of his career alongside ongoing studies and service commitments.</p>
                    </div>
                </div>
            </div>

            <!-- Milestone 4 -->
            <div class="timeline-card">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <div class="timeline-img shimmer">
                        <img src="https://images.unsplash.com/photo-1541339907198-e08756dedf3f?auto=format&fit=crop&q=80&w=1000" alt="Global Academics">
                    </div>
                    <div class="timeline-text">
                        <div class="timeline-year">2017 – 2021 · Global Academics</div>
                        <h4>Simon Business School & MBA</h4>
                        <p>B.Com (2017). Left India at age 23 (2019). MS Finance (2020). MBA Finance (2021) — Dean's List & Networking Coach.</p>
                    </div>
                </div>
            </div>

            <!-- Milestone 5 -->
            <div class="timeline-card">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <div class="timeline-img shimmer">
                        <img src="https://images.unsplash.com/photo-1560523160-754a9e25c68f?auto=format&fit=crop&q=80&w=1000" alt="Leadership Impact">
                    </div>
                    <div class="timeline-text">
                        <div class="timeline-year">2018 – 2020 · Leadership Impact</div>
                        <h4>President, Rotaract South Asia</h4>
                        <p>RI Toronto (2018). RI Hamburg & 'Best DRR' Award (2019). Led 200,000+ members across 8 countries. Chairman, Rotasia Delhi 2020.</p>
                    </div>
                </div>
            </div>

            <!-- Milestone 6 -->
            <div class="timeline-card">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <div class="timeline-img shimmer">
                        <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&q=80&w=1000" alt="Professional Strategy">
                    </div>
                    <div class="timeline-text">
                        <div class="timeline-year">2021 Onward · Strategy</div>
                        <h4>Professional Excellence</h4>
                        <p>Experience at Grant Thornton, Morgan Stanley (Manhattan), and Boutique M&A firms in NY. Career Advisor & AD at University of Rochester.</p>
                    </div>
                </div>
            </div>

            <!-- Milestone 7 -->
            <div class="timeline-card">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <div class="timeline-img shimmer">
                        <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?auto=format&fit=crop&q=80&w=1000" alt="The Vision">
                    </div>
                    <div class="timeline-text">
                        <div class="timeline-year">2027 · The Doctoral Vision</div>
                        <h4>Education 2.0 & Beyond</h4>
                        <p>Pursuing Ed.D. Award: Education 2.0 (Las Vegas). Co-Chair: HE Students Association. Alumni of Simon & Mayo College.</p>
                    </div>
                </div>
            </div>
        </div>

        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.timeline-card');
            const progress = document.querySelector('.timeline-progress');
            const timelineContainer = document.querySelector('.timeline-container');
            
            const updateTimeline = () => {
                const scrollPos = window.scrollY + window.innerHeight * 0.75; // Trigger point
                const containerRect = timelineContainer.getBoundingClientRect();
                const absoluteTop = containerRect.top + window.scrollY;
                
                // Animate Cards
                cards.forEach(card => {
                    const cardTop = card.getBoundingClientRect().top + window.scrollY;
                    if (scrollPos > cardTop + 100) {
                        card.classList.add('active');
                    }
                });

                // Animate Line
                const relativeScroll = window.scrollY + window.innerHeight / 2 - absoluteTop;
                let pct = (relativeScroll / containerRect.height) * 100;
                pct = Math.max(0, Math.min(100, pct));
                if (progress) {
                    progress.style.height = pct + '%';
                }
            };

            window.addEventListener('scroll', updateTimeline);
            updateTimeline();
        });
        </script>
    </section>
"""

lines = lines[:start_idx] + [new_content + "\n"] + lines[end_idx:]

with open('index.php', 'w') as f:
    f.writelines(lines)
