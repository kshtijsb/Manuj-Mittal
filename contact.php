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

    /* Dynamic Appointment / Calendar Styling */
    #appointment-fields {
        display: none;
        flex-direction: column;
        gap: 1.5rem;
        border-left: 2px solid var(--gold);
        padding-left: 2rem;
        margin: 1rem 0;
        transition: all 0.4s cubic-bezier(0.25, 1, 0.5, 1);
        opacity: 0;
        transform: translateY(-10px);
    }
    .time-slots-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 0.8rem;
        margin-top: 0.5rem;
    }
    .time-slot {
        padding: 0.9rem;
        text-align: center;
        border: 1px solid #ddd;
        border-radius: 6px;
        font-size: 0.85rem;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s ease;
        color: #333;
        background: #fcfcfc;
    }
    .time-slot:hover {
        border-color: var(--gold);
        background: rgba(197, 160, 89, 0.05);
    }
    .time-slot.selected {
        background: #000;
        color: #fff;
        border-color: #000;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
    }
    [data-theme="dark"] .time-slot {
        background: #12181F;
        border-color: rgba(255,255,255,0.08);
        color: #ccc;
    }
    [data-theme="dark"] .time-slot:hover {
        border-color: var(--gold);
        background: rgba(229, 192, 123, 0.1);
    }
    [data-theme="dark"] .time-slot.selected {
        background: var(--gold);
        color: #000;
        border-color: var(--gold);
        box-shadow: 0 4px 12px rgba(229, 192, 123, 0.2);
    }

    @media (max-width: 576px) {
        .time-slots-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
</style>

<section class="contact-page" style="padding: 120px 0; background: var(--bg); color: var(--text); min-height: 100vh; transition: background 0.5s ease, color 0.5s ease;">
    <div class="container" style="max-width: 1000px;">

        <div class="contact-page-grid">

            <!-- Left Side: Info -->
            <div class="contact-info reveal">
                <div class="side-tag"
                    style="color: var(--gold); font-weight: 800; letter-spacing: 8px; margin-bottom: 2rem; display: block;">
                    GET IN TOUCH</div>
                <h1 class="contact-page-h1" style="color: var(--text);">Let's Write<br>the Next<br>Chapter.</h1>

                <div class="contact-details" style="margin-top: 6rem;">
                    <div class="contact-item" style="margin-bottom: 3rem;">
                        <h4
                            style="font-size: 0.7rem; color: var(--gold); letter-spacing: 3px; text-transform: uppercase; margin-bottom: 1rem;">
                            Direct Correspondence</h4>
                        <a href="mailto:author@manujmittal.com"
                            style="font-size: 1.5rem; color: var(--text); text-decoration: none; font-family: var(--font-serif); border-bottom: 1px solid rgba(197, 160, 89, 0.2); padding-bottom: 5px;">author@manujmittal.com</a>
                    </div>

                    <div class="contact-item" style="margin-bottom: 3rem;">
                        <h4
                            style="font-size: 0.7rem; color: var(--gold); letter-spacing: 3px; text-transform: uppercase; margin-bottom: 1rem;">
                            Based In</h4>
                        <p style="font-size: 1.2rem; color: var(--text); opacity: 0.85;">Rochester, New York, USA</p>
                    </div>

                    <div class="contact-item">
                        <h4
                            style="font-size: 0.7rem; color: var(--gold); letter-spacing: 3px; text-transform: uppercase; margin-bottom: 1rem;">
                            Social Narrative</h4>
                        <div style="display: flex; gap: 2rem;">
                            <a href="https://www.linkedin.com/in/manujmittal" target="_blank"
                                style="color: var(--text); font-weight: 800; text-decoration: none; font-size: 0.8rem; letter-spacing: 2px; border-bottom: 2px solid var(--gold); padding-bottom: 4px;">LINKEDIN</a>
                            <a href="https://www.instagram.com/manujmittal" target="_blank"
                                style="color: var(--text); font-weight: 800; text-decoration: none; font-size: 0.8rem; letter-spacing: 2px; border-bottom: 2px solid var(--gold); padding-bottom: 4px;">INSTAGRAM</a>
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
                            style="padding: 1.2rem; border: none; border-bottom: 1px solid #ddd; background: transparent; font-size: 1.1rem; outline: none; appearance: none; color: var(--text);">
                            <option value="Speaking">Speaking Engagement</option>
                            <option value="Mentorship">Mentorship Inquiry</option>
                            <option value="Business">Book Order / Business</option>
                            <option value="General">General Message</option>
                            <option value="Meeting Request">Book Appointment / Meeting</option>
                        </select>
                    </div>

                    <!-- Dynamic Appointment Booking Fields -->
                    <div id="appointment-fields">
                        <div class="input-group" style="display: flex; flex-direction: column; gap: 0.8rem;">
                            <label style="font-size: 0.7rem; font-weight: 800; letter-spacing: 2px; color: #999; text-transform: uppercase;">Select Appointment Date</label>
                            <input type="date" name="meeting_date" id="meeting_date"
                                style="padding: 1.2rem; border: none; border-bottom: 1px solid #ddd; background: transparent; font-size: 1.1rem; outline: none; transition: 0.3s; color: var(--text);"
                                required disabled>
                        </div>

                        <div class="input-group" style="display: flex; flex-direction: column; gap: 0.8rem;">
                            <label style="font-size: 0.7rem; font-weight: 800; letter-spacing: 2px; color: #999; text-transform: uppercase;">Available Time Slots</label>
                            <input type="hidden" name="meeting_time" id="meeting_time" required disabled>
                            <div class="time-slots-grid">
                                <div class="time-slot" data-time="09:00 AM">09:00 AM</div>
                                <div class="time-slot" data-time="10:00 AM">10:00 AM</div>
                                <div class="time-slot" data-time="11:00 AM">11:00 AM</div>
                                <div class="time-slot" data-time="02:00 PM">02:00 PM</div>
                                <div class="time-slot" data-time="03:00 PM">03:00 PM</div>
                                <div class="time-slot" data-time="04:00 PM">04:00 PM</div>
                            </div>
                        </div>
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

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const typeSelect = document.querySelector('select[name="type"]');
        const appointmentFields = document.getElementById('appointment-fields');
        const dateInput = document.getElementById('meeting_date');
        const timeInput = document.getElementById('meeting_time');
        const timeSlots = document.querySelectorAll('.time-slot');

        // Set minimum date to today (past dates are disabled)
        const today = new Date().toISOString().split('T')[0];
        dateInput.setAttribute('min', today);

        function handleTypeChange() {
            if (typeSelect.value === 'Meeting Request') {
                appointmentFields.style.display = 'flex';
                setTimeout(() => {
                    appointmentFields.style.opacity = '1';
                    appointmentFields.style.transform = 'translateY(0)';
                }, 10);
                dateInput.removeAttribute('disabled');
                timeInput.removeAttribute('disabled');
            } else {
                appointmentFields.style.opacity = '0';
                appointmentFields.style.transform = 'translateY(-10px)';
                setTimeout(() => {
                    appointmentFields.style.display = 'none';
                }, 400);
                dateInput.setAttribute('disabled', 'true');
                timeInput.setAttribute('disabled', 'true');
                
                // Clear state when hidden
                timeSlots.forEach(s => s.classList.remove('selected'));
                timeInput.value = '';
            }
        }

        typeSelect.addEventListener('change', handleTypeChange);
        
        // Initial check on page load
        handleTypeChange();

        // Handle time slot grid clicks
        timeSlots.forEach(slot => {
            slot.addEventListener('click', () => {
                timeSlots.forEach(s => s.classList.remove('selected'));
                slot.classList.add('selected');
                timeInput.value = slot.getAttribute('data-time');
            });
        });
    });
</script>

<?php include 'components/footer.php'; ?>