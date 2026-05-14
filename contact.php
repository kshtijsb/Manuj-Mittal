<?php
require_once 'includes/data.php';
$page_title = "Contact | Manuj Mittal";
include 'components/header.php';
?>

<style>
    .contact-page-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 8rem;
        align-items: start;
    }
    .contact-page-h1 {
        font-size: clamp(3rem, 10vw, 5rem);
        line-height: 0.9;
        margin-bottom: 4rem;
        color: #000;
        letter-spacing: -3px;
    }
    .contact-form-box {
        padding: 0;
    }

    @media (max-width: 992px) {
        .contact-page {
            padding: 60px 0 !important;
        }
        .contact-page-grid {
            grid-template-columns: 1fr;
            gap: 3rem;
        }
        .contact-form-box {
            padding: 2.5rem 1.5rem;
        }
        .contact-page-h1 {
            margin-bottom: 2rem;
        }
    }
</style>

<section class="contact-page" style="padding: 120px 0; background: #fff; min-height: 100vh;">
    <div class="container" style="max-width: 1000px;">

        <div class="contact-page-grid">

            <!-- Left Side: Info -->
            <div class="contact-info reveal">
                <div class="side-tag"
                    style="color: var(--gold); font-weight: 800; letter-spacing: 8px; margin-bottom: 2rem; display: block;">
                    GET IN TOUCH</div>
                <h1 class="contact-page-h1">Let's Write<br>the Next<br>Chapter.</h1>

                <div class="contact-details" style="margin-top: 6rem;">
                    <div class="contact-item" style="margin-bottom: 3rem;">
                        <h4
                            style="font-size: 0.7rem; color: var(--gold); letter-spacing: 3px; text-transform: uppercase; margin-bottom: 1rem;">
                            Direct Correspondence</h4>
                        <a href="mailto:author@manujmittal.com"
                            style="font-size: 1.5rem; color: #000; text-decoration: none; font-family: var(--font-serif); border-bottom: 1px solid #eee; padding-bottom: 5px;">author@manujmittal.com</a>
                    </div>

                    <div class="contact-item" style="margin-bottom: 3rem;">
                        <h4
                            style="font-size: 0.7rem; color: var(--gold); letter-spacing: 3px; text-transform: uppercase; margin-bottom: 1rem;">
                            Based In</h4>
                        <p style="font-size: 1.2rem; color: #333;">Rochester, New York, USA</p>
                    </div>

                    <div class="contact-item">
                        <h4
                            style="font-size: 0.7rem; color: var(--gold); letter-spacing: 3px; text-transform: uppercase; margin-bottom: 1rem;">
                            Social Narrative</h4>
                        <div style="display: flex; gap: 2rem;">
                            <a href="#"
                                style="color: #000; font-weight: 800; text-decoration: none; font-size: 0.8rem; letter-spacing: 2px; border-bottom: 2px solid var(--gold); padding-bottom: 4px;">LINKEDIN</a>
                            <a href="#"
                                style="color: #000; font-weight: 800; text-decoration: none; font-size: 0.8rem; letter-spacing: 2px; border-bottom: 2px solid var(--gold); padding-bottom: 4px;">INSTAGRAM</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side: Form -->
            <div class="contact-form-box reveal">
                <?php if (isset($_GET['status']) && $_GET['status'] === 'success'): ?>
                    <div
                        style="background: #d4edda; color: #155724; padding: 1.5rem; border-radius: 5px; margin-bottom: 2rem; font-weight: 600;">
                        Message sent successfully! We will get back to you soon.
                    </div>
                <?php endif; ?>

                <form action="https://api.web3forms.com/submit" method="POST"
                    style="display: flex; flex-direction: column; gap: 2.5rem;">
                    <input type="hidden" name="access_key" value="64485f2f-6a99-4da8-8e58-ce77d9357983">
                    <input type="hidden" name="subject" value="New Inquiry from Contact Page">
                    <input type="hidden" name="_captcha" value="false">
                    <div class="input-group" style="display: flex; flex-direction: column; gap: 0.8rem;">
                        <label
                            style="font-size: 0.7rem; font-weight: 800; letter-spacing: 2px; color: #999; text-transform: uppercase;">Full
                            Name</label>
                        <input type="text" name="name" placeholder="John Doe"
                            style="padding: 1.2rem; border: none; border-bottom: 1px solid #ddd; background: transparent; font-size: 1.1rem; outline: none; transition: 0.3s;"
                            required>
                    </div>

                    <div class="input-group" style="display: flex; flex-direction: column; gap: 0.8rem;">
                        <label
                            style="font-size: 0.7rem; font-weight: 800; letter-spacing: 2px; color: #999; text-transform: uppercase;">Email
                            Address</label>
                        <input type="email" name="email" placeholder="john@example.com"
                            style="padding: 1.2rem; border: none; border-bottom: 1px solid #ddd; background: transparent; font-size: 1.1rem; outline: none; transition: 0.3s;"
                            required>
                    </div>

                    <div class="input-group" style="display: flex; flex-direction: column; gap: 0.8rem;">
                        <label
                            style="font-size: 0.7rem; font-weight: 800; letter-spacing: 2px; color: #999; text-transform: uppercase;">Inquiry
                            Type</label>
                        <select name="type"
                            style="padding: 1.2rem; border: none; border-bottom: 1px solid #ddd; background: transparent; font-size: 1.1rem; outline: none; appearance: none; color: #333;">
                            <option value="Speaking">Speaking Engagement</option>
                            <option value="Mentorship">Mentorship Inquiry</option>
                            <option value="Business">Book Order / Business</option>
                            <option value="General">General Message</option>
                        </select>
                    </div>

                    <div class="input-group" style="display: flex; flex-direction: column; gap: 0.8rem;">
                        <label
                            style="font-size: 0.7rem; font-weight: 800; letter-spacing: 2px; color: #999; text-transform: uppercase;">Your
                            Message</label>
                        <textarea name="message" rows="4" placeholder="How can we collaborate?"
                            style="padding: 1.2rem; border: none; border-bottom: 1px solid #ddd; background: transparent; font-size: 1.1rem; outline: none; resize: none; transition: 0.3s;"
                            required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary"
                        style="background: #000; color: #fff; border: none; padding: 1.5rem; font-weight: 800; letter-spacing: 3px; cursor: pointer; transition: 0.3s; margin-top: 1rem;">SEND
                        MESSAGE</button>
                </form>
            </div>

        </div>
    </div>
</section>

<?php include 'components/footer.php'; ?>