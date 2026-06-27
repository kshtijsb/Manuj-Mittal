<?php
require_once 'includes/data.php';
$page_title = "Book a Meeting | Manuj Mittal";
include 'components/header.php';
?>

<style>
    /* ========================
       MEETING SCHEDULER PAGE
    ======================== */
    .scheduler-hero {
        padding: 7rem 0 3rem;
        text-align: center;
    }

    .scheduler-eyebrow {
        font-size: 0.7rem;
        font-weight: 800;
        letter-spacing: 5px;
        color: var(--gold);
        text-transform: uppercase;
        margin-bottom: 1.5rem;
        display: block;
    }

    .scheduler-hero h1 {
        font-family: var(--font-serif);
        font-size: clamp(3rem, 8vw, 5.5rem);
        font-weight: 900;
        letter-spacing: -3px;
        color: #000;
        line-height: 1;
        margin-bottom: 1.5rem;
    }

    [data-theme="dark"] .scheduler-hero h1 {
        color: #fff;
    }

    .scheduler-hero p {
        font-size: 1.1rem;
        color: #666;
        max-width: 500px;
        margin: 0 auto;
        line-height: 1.7;
    }

    [data-theme="dark"] .scheduler-hero p { color: #aaa; }

    /* ========================
       MAIN SCHEDULER LAYOUT
    ======================== */
    .scheduler-wrapper {
        display: grid;
        grid-template-columns: 1fr 1.1fr;
        gap: 3rem;
        max-width: 1100px;
        margin: 0 auto 8rem;
        padding: 0 1.5rem;
        align-items: start;
    }

    @media (max-width: 900px) {
        .scheduler-wrapper {
            grid-template-columns: 1fr;
            gap: 2rem;
        }
    }

    /* ========================
       LEFT PANEL — HOST INFO
    ======================== */
    .host-panel {
        background: rgba(255, 255, 255, 0.6);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.7);
        border-radius: 24px;
        padding: 3rem 2.5rem;
        box-shadow: 0 8px 32px rgba(0,0,0,0.04);
        position: sticky;
        top: 120px;
    }

    [data-theme="dark"] .host-panel {
        background: rgba(18, 24, 31, 0.7);
        border-color: rgba(255,255,255,0.06);
    }

    .host-avatar {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--gold), #B6862C);
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: var(--font-serif);
        font-size: 2rem;
        font-weight: 900;
        color: #fff;
        margin-bottom: 1.5rem;
        box-shadow: 0 8px 24px rgba(197, 160, 89, 0.4);
    }

    .host-name {
        font-family: var(--font-serif);
        font-size: 1.8rem;
        font-weight: 900;
        color: #000;
        letter-spacing: -1px;
        margin-bottom: 0.3rem;
    }

    [data-theme="dark"] .host-name { color: #fff; }

    .host-title {
        font-size: 0.8rem;
        font-weight: 700;
        letter-spacing: 3px;
        color: var(--gold);
        text-transform: uppercase;
        margin-bottom: 2rem;
    }

    .meeting-meta {
        display: flex;
        flex-direction: column;
        gap: 1.2rem;
        margin-bottom: 2.5rem;
    }

    .meeting-meta-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        font-size: 0.95rem;
        color: #555;
    }

    [data-theme="dark"] .meeting-meta-item { color: #aaa; }

    .meeting-meta-item svg {
        flex-shrink: 0;
        color: var(--gold);
    }

    .meeting-types {
        display: flex;
        flex-direction: column;
        gap: 0.8rem;
    }

    .meeting-type-btn {
        padding: 1rem 1.5rem;
        border: 1.5px solid #eee;
        border-radius: 12px;
        background: transparent;
        font-family: var(--font-sans);
        font-size: 0.9rem;
        font-weight: 700;
        color: #444;
        cursor: pointer;
        text-align: left;
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: all 0.25s ease;
    }

    [data-theme="dark"] .meeting-type-btn {
        border-color: rgba(255,255,255,0.08);
        color: #ccc;
    }

    .meeting-type-btn:hover {
        border-color: var(--gold);
        background: rgba(197, 160, 89, 0.04);
    }

    .meeting-type-btn.active {
        border-color: #000;
        background: #000;
        color: #fff;
    }

    [data-theme="dark"] .meeting-type-btn.active {
        border-color: var(--gold);
        background: var(--gold);
        color: #000;
    }

    .meeting-type-badge {
        font-size: 0.7rem;
        font-weight: 800;
        letter-spacing: 2px;
        padding: 0.3rem 0.7rem;
        border-radius: 20px;
        background: rgba(197, 160, 89, 0.1);
        color: var(--gold);
    }

    .meeting-type-btn.active .meeting-type-badge {
        background: rgba(255,255,255,0.15);
        color: #fff;
    }

    [data-theme="dark"] .meeting-type-btn.active .meeting-type-badge {
        background: rgba(0,0,0,0.15);
        color: #000;
    }

    /* ========================
       RIGHT PANEL — CALENDAR
    ======================== */
    .booking-panel {
        background: rgba(255, 255, 255, 0.6);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.7);
        border-radius: 24px;
        padding: 3rem 2.5rem;
        box-shadow: 0 8px 32px rgba(0,0,0,0.04);
    }

    [data-theme="dark"] .booking-panel {
        background: rgba(18, 24, 31, 0.7);
        border-color: rgba(255,255,255,0.06);
    }

    /* Steps */
    .booking-steps {
        display: flex;
        gap: 0;
        margin-bottom: 2.5rem;
        border-bottom: 1px solid #eee;
    }

    [data-theme="dark"] .booking-steps { border-color: rgba(255,255,255,0.07); }

    .booking-step {
        padding: 0.8rem 0;
        margin-right: 2rem;
        font-size: 0.7rem;
        font-weight: 800;
        letter-spacing: 2px;
        text-transform: uppercase;
        color: #bbb;
        border-bottom: 2px solid transparent;
        margin-bottom: -1px;
        cursor: default;
        transition: all 0.3s ease;
    }

    .booking-step.active {
        color: #000;
        border-bottom-color: #000;
    }

    [data-theme="dark"] .booking-step.active {
        color: var(--gold);
        border-bottom-color: var(--gold);
    }

    /* Calendar */
    .calendar-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 1.5rem;
    }

    .calendar-month {
        font-family: var(--font-serif);
        font-size: 1.5rem;
        font-weight: 900;
        color: #000;
        letter-spacing: -1px;
    }

    [data-theme="dark"] .calendar-month { color: #fff; }

    .cal-nav-btn {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        border: 1.5px solid #eee;
        background: transparent;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.25s ease;
        color: #333;
    }

    [data-theme="dark"] .cal-nav-btn {
        border-color: rgba(255,255,255,0.1);
        color: #ccc;
    }

    .cal-nav-btn:hover {
        border-color: #000;
        background: #000;
        color: #fff;
    }

    [data-theme="dark"] .cal-nav-btn:hover {
        border-color: var(--gold);
        background: var(--gold);
        color: #000;
    }

    .cal-nav-btn:disabled {
        opacity: 0.3;
        cursor: not-allowed;
    }

    .cal-nav-btn:disabled:hover {
        border-color: #eee;
        background: transparent;
        color: #333;
    }

    .calendar-weekdays {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 4px;
        margin-bottom: 0.5rem;
    }

    .cal-weekday {
        text-align: center;
        font-size: 0.65rem;
        font-weight: 800;
        letter-spacing: 2px;
        color: #999;
        text-transform: uppercase;
        padding: 0.4rem 0;
    }

    .calendar-grid {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 4px;
    }

    .cal-day {
        aspect-ratio: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        font-size: 0.9rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s ease;
        position: relative;
        color: #222;
    }

    [data-theme="dark"] .cal-day { color: #ddd; }

    .cal-day.empty {
        cursor: default;
    }

    .cal-day.past {
        color: #ccc;
        cursor: not-allowed;
    }

    [data-theme="dark"] .cal-day.past { color: #444; }

    .cal-day.today::after {
        content: '';
        position: absolute;
        bottom: 4px;
        width: 4px;
        height: 4px;
        border-radius: 50%;
        background: var(--gold);
    }

    .cal-day.available:hover {
        background: #f0f0f0;
    }

    [data-theme="dark"] .cal-day.available:hover { background: rgba(255,255,255,0.05); }

    .cal-day.selected {
        background: #000 !important;
        color: #fff !important;
    }

    [data-theme="dark"] .cal-day.selected {
        background: var(--gold) !important;
        color: #000 !important;
    }

    /* Time Slots Panel */
    #time-panel {
        display: none;
        flex-direction: column;
        gap: 1.5rem;
        margin-top: 2rem;
        padding-top: 2rem;
        border-top: 1px solid #eee;
        animation: slideUp 0.4s cubic-bezier(0.25, 1, 0.5, 1);
    }

    [data-theme="dark"] #time-panel { border-color: rgba(255,255,255,0.07); }

    @keyframes slideUp {
        from { opacity: 0; transform: translateY(12px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    .time-panel-label {
        font-size: 0.7rem;
        font-weight: 800;
        letter-spacing: 3px;
        color: #999;
        text-transform: uppercase;
    }

    .time-slots-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 0.7rem;
    }

    @media (max-width: 500px) {
        .time-slots-grid { grid-template-columns: repeat(2, 1fr); }
    }

    .time-slot {
        padding: 0.9rem 0.5rem;
        text-align: center;
        border: 1.5px solid #eee;
        border-radius: 10px;
        font-size: 0.85rem;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.2s ease;
        color: #333;
        background: #fff;
    }

    [data-theme="dark"] .time-slot {
        background: rgba(255,255,255,0.03);
        border-color: rgba(255,255,255,0.08);
        color: #ccc;
    }

    .time-slot:hover {
        border-color: var(--gold);
        background: rgba(197, 160, 89, 0.05);
        transform: translateY(-1px);
    }

    .time-slot.selected {
        background: #000;
        color: #fff;
        border-color: #000;
        box-shadow: 0 4px 14px rgba(0,0,0,0.15);
    }

    [data-theme="dark"] .time-slot.selected {
        background: var(--gold);
        color: #000;
        border-color: var(--gold);
        box-shadow: 0 4px 14px rgba(197,160,89,0.25);
    }

    /* Details Form */
    #details-panel {
        display: none;
        flex-direction: column;
        gap: 1.8rem;
        margin-top: 2rem;
        padding-top: 2rem;
        border-top: 1px solid #eee;
        animation: slideUp 0.4s cubic-bezier(0.25, 1, 0.5, 1);
    }

    [data-theme="dark"] #details-panel { border-color: rgba(255,255,255,0.07); }

    .booking-summary-bar {
        background: #000;
        color: #fff;
        border-radius: 12px;
        padding: 1.2rem 1.5rem;
        display: flex;
        align-items: center;
        gap: 1rem;
        font-size: 0.9rem;
        font-weight: 700;
    }

    [data-theme="dark"] .booking-summary-bar {
        background: var(--gold);
        color: #000;
    }

    .booking-summary-bar svg { flex-shrink: 0; }

    .form-field {
        display: flex;
        flex-direction: column;
        gap: 0.6rem;
    }

    .form-label {
        font-size: 0.65rem;
        font-weight: 800;
        letter-spacing: 3px;
        color: #999;
        text-transform: uppercase;
    }

    .form-input {
        padding: 1rem 0;
        border: none;
        border-bottom: 1.5px solid #ddd;
        background: transparent;
        font-family: var(--font-sans);
        font-size: 1rem;
        color: #000;
        outline: none;
        transition: border-color 0.3s ease;
    }

    [data-theme="dark"] .form-input {
        border-color: rgba(255,255,255,0.1);
        color: #fff;
    }

    .form-input:focus {
        border-bottom-color: #000;
    }

    [data-theme="dark"] .form-input:focus { border-bottom-color: var(--gold); }

    .form-input::placeholder { color: #bbb; }

    .form-textarea {
        padding: 1rem 0;
        border: none;
        border-bottom: 1.5px solid #ddd;
        background: transparent;
        font-family: var(--font-sans);
        font-size: 1rem;
        color: #000;
        outline: none;
        resize: none;
        transition: border-color 0.3s ease;
    }

    [data-theme="dark"] .form-textarea {
        border-color: rgba(255,255,255,0.1);
        color: #fff;
    }

    .form-textarea:focus { border-bottom-color: #000; }
    [data-theme="dark"] .form-textarea:focus { border-bottom-color: var(--gold); }
    .form-textarea::placeholder { color: #bbb; }

    /* Confirm Button */
    .btn-confirm {
        width: 100%;
        padding: 1.4rem;
        background: #000;
        color: #fff;
        border: none;
        border-radius: 14px;
        font-family: var(--font-sans);
        font-size: 1rem;
        font-weight: 800;
        letter-spacing: 2px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-transform: uppercase;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.8rem;
    }

    [data-theme="dark"] .btn-confirm {
        background: var(--gold);
        color: #000;
    }

    .btn-confirm:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(0,0,0,0.2);
    }

    [data-theme="dark"] .btn-confirm:hover {
        box-shadow: 0 8px 24px rgba(197,160,89,0.3);
    }

    .btn-confirm:active { transform: translateY(0); }

    /* Back link */
    .back-link {
        font-size: 0.8rem;
        font-weight: 700;
        letter-spacing: 1px;
        color: #999;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: color 0.2s;
        background: none;
        border: none;
        font-family: var(--font-sans);
        padding: 0;
    }

    .back-link:hover { color: #000; }
    [data-theme="dark"] .back-link:hover { color: var(--gold); }

    /* Success Screen */
    #success-panel {
        display: none;
        flex-direction: column;
        align-items: center;
        text-align: center;
        gap: 1.5rem;
        padding: 3rem 1rem;
        animation: slideUp 0.6s cubic-bezier(0.25, 1, 0.5, 1);
    }

    .success-icon {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: linear-gradient(135deg, #000, #333);
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 12px 32px rgba(0,0,0,0.2);
    }

    [data-theme="dark"] .success-icon {
        background: linear-gradient(135deg, var(--gold), #B6862C);
    }

    .success-title {
        font-family: var(--font-serif);
        font-size: 2rem;
        font-weight: 900;
        color: #000;
        letter-spacing: -1px;
    }

    [data-theme="dark"] .success-title { color: #fff; }

    .success-detail {
        font-size: 1rem;
        color: #666;
        line-height: 1.7;
        max-width: 340px;
    }

    [data-theme="dark"] .success-detail { color: #aaa; }

    .success-confirmed-box {
        background: #f9f9f9;
        border-radius: 14px;
        padding: 1.5rem 2rem;
        width: 100%;
        text-align: left;
    }

    [data-theme="dark"] .success-confirmed-box {
        background: rgba(255,255,255,0.04);
    }

    .confirmed-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.7rem 0;
        border-bottom: 1px solid #eee;
        font-size: 0.9rem;
    }

    [data-theme="dark"] .confirmed-row { border-color: rgba(255,255,255,0.06); }

    .confirmed-row:last-child { border-bottom: none; }

    .confirmed-row span:first-child {
        font-weight: 800;
        letter-spacing: 1px;
        color: #999;
        font-size: 0.7rem;
        text-transform: uppercase;
    }

    .confirmed-row span:last-child {
        font-weight: 700;
        color: #000;
    }

    [data-theme="dark"] .confirmed-row span:last-child { color: #fff; }

    .btn-back-home {
        display: inline-flex;
        align-items: center;
        gap: 0.7rem;
        padding: 1rem 2.5rem;
        background: #000;
        color: #fff;
        border-radius: 50px;
        font-weight: 700;
        font-size: 0.9rem;
        letter-spacing: 1px;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    [data-theme="dark"] .btn-back-home {
        background: var(--gold);
        color: #000;
    }

    .btn-back-home:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    }
</style>

<main>
    <!-- Hero -->
    <section class="scheduler-hero container reveal">
        <span class="scheduler-eyebrow">Schedule a Session</span>
        <h1>Book Time<br>with Manuj</h1>
        <p>Reserve a focused 1-on-1 session — whether it's mentorship, speaking, or a new collaboration.</p>
    </section>

    <!-- Scheduler Layout -->
    <div class="scheduler-wrapper">

        <!-- LEFT: Host Info -->
        <aside class="host-panel reveal">
            <div class="host-avatar">MM</div>
            <div class="host-name">Manuj Mittal</div>
            <div class="host-title">Doctorate Researcher · Global Leader</div>

            <div class="meeting-meta">
                <div class="meeting-meta-item">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    <span id="meta-duration">30 minutes</span>
                </div>
                <div class="meeting-meta-item">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                    <span>Virtual (Zoom / Google Meet)</span>
                </div>
                <div class="meeting-meta-item">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                    <span>Mon – Fri, 9 AM – 5 PM IST</span>
                </div>
                <div class="meeting-meta-item">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                    <span>Confirmation sent to your email</span>
                </div>
            </div>

            <div class="meeting-types">
                <button class="meeting-type-btn active" data-duration="30" onclick="selectMeetingType(this)" id="type-intro">
                    Intro Call
                    <span class="meeting-type-badge">30 MIN</span>
                </button>
                <button class="meeting-type-btn" data-duration="60" onclick="selectMeetingType(this)" id="type-mentorship">
                    Mentorship Session
                    <span class="meeting-type-badge">60 MIN</span>
                </button>
                <button class="meeting-type-btn" data-duration="45" onclick="selectMeetingType(this)" id="type-speaking">
                    Speaking Inquiry
                    <span class="meeting-type-badge">45 MIN</span>
                </button>
                <button class="meeting-type-btn" data-duration="30" onclick="selectMeetingType(this)" id="type-general">
                    General Discussion
                    <span class="meeting-type-badge">30 MIN</span>
                </button>
            </div>
        </aside>

        <!-- RIGHT: Booking Panel -->
        <div class="booking-panel">
            <!-- Step Indicator -->
            <div class="booking-steps">
                <div class="booking-step active" id="step-1">01 · Date</div>
                <div class="booking-step" id="step-2">02 · Time</div>
                <div class="booking-step" id="step-3">03 · Details</div>
            </div>

            <!-- Calendar -->
            <div id="calendar-panel">
                <div class="calendar-header">
                    <button class="cal-nav-btn" id="prev-month" onclick="changeMonth(-1)" aria-label="Previous month">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="15 18 9 12 15 6"/></svg>
                    </button>
                    <div class="calendar-month" id="cal-month-label">June 2026</div>
                    <button class="cal-nav-btn" id="next-month" onclick="changeMonth(1)" aria-label="Next month">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"/></svg>
                    </button>
                </div>
                <div class="calendar-weekdays">
                    <div class="cal-weekday">Su</div>
                    <div class="cal-weekday">Mo</div>
                    <div class="cal-weekday">Tu</div>
                    <div class="cal-weekday">We</div>
                    <div class="cal-weekday">Th</div>
                    <div class="cal-weekday">Fr</div>
                    <div class="cal-weekday">Sa</div>
                </div>
                <div class="calendar-grid" id="cal-grid"></div>
            </div>

            <!-- Time Slots (Step 2) -->
            <div id="time-panel">
                <button class="back-link" onclick="goToStep(1)">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="15 18 9 12 15 6"/></svg>
                    Change date
                </button>
                <div class="time-panel-label" id="selected-date-label">Loading slots…</div>
                <div class="time-slots-grid" id="time-slots-container"></div>
            </div>

            <!-- Details Form (Step 3) -->
            <div id="details-panel">
                <button class="back-link" onclick="goToStep(2)">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="15 18 9 12 15 6"/></svg>
                    Change time
                </button>

                <div class="booking-summary-bar" id="booking-summary-bar">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                    <span id="booking-summary-text">Loading…</span>
                </div>

                <form id="booking-form" action="https://api.web3forms.com/submit" method="POST">
                    <input type="hidden" name="access_key" value="64485f2f-6a99-4da8-8e58-ce77d9357983">
                    <input type="hidden" name="subject" id="form-subject" value="New Meeting Booking">
                    <input type="hidden" name="_captcha" value="false">
                    <input type="hidden" name="meeting_date" id="form-date">
                    <input type="hidden" name="meeting_time" id="form-time">
                    <input type="hidden" name="meeting_type" id="form-meeting-type" value="Intro Call">
                    <input type="hidden" name="meeting_duration" id="form-duration" value="30 minutes">

                    <div style="display:flex;flex-direction:column;gap:1.8rem;">
                        <div class="form-field">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="name" class="form-input" placeholder="Your full name" required>
                        </div>
                        <div class="form-field">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-input" placeholder="your@email.com" required>
                        </div>
                        <div class="form-field">
                            <label class="form-label">What would you like to discuss?</label>
                            <textarea name="message" class="form-textarea" rows="3" placeholder="Brief agenda or topic…"></textarea>
                        </div>
                        <button type="submit" class="btn-confirm" id="submit-btn">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            Confirm Booking
                        </button>
                    </div>
                </form>
            </div>

            <!-- Success Screen -->
            <div id="success-panel">
                <div class="success-icon">
                    <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                </div>
                <div class="success-title">You're booked!</div>
                <p class="success-detail">A confirmation has been sent to your email. Manuj looks forward to speaking with you.</p>

                <div class="success-confirmed-box">
                    <div class="confirmed-row">
                        <span>Meeting Type</span>
                        <span id="conf-type">—</span>
                    </div>
                    <div class="confirmed-row">
                        <span>Date</span>
                        <span id="conf-date">—</span>
                    </div>
                    <div class="confirmed-row">
                        <span>Time</span>
                        <span id="conf-time">—</span>
                    </div>
                    <div class="confirmed-row">
                        <span>Duration</span>
                        <span id="conf-duration">—</span>
                    </div>
                </div>

                <a href="index" class="btn-back-home">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                    Back to Home
                </a>
            </div>
        </div>
    </div>
</main>

<script>
(function() {
    /* =====================================================
       STATE
    ===================================================== */
    let currentYear  = new Date().getFullYear();
    let currentMonth = new Date().getMonth();
    let selectedDate = null;
    let selectedTime = null;
    let selectedMeetingType = 'Intro Call';
    let selectedDuration    = '30 minutes';

    const today = new Date();
    today.setHours(0, 0, 0, 0);

    /* Available time slots (Mon–Fri only) */
    const TIME_SLOTS = [
        '09:00 AM', '10:00 AM', '11:00 AM',
        '12:00 PM', '02:00 PM', '03:00 PM',
        '04:00 PM', '05:00 PM'
    ];

    const MONTH_NAMES = [
        'January','February','March','April','May','June',
        'July','August','September','October','November','December'
    ];

    /* =====================================================
       MEETING TYPE SELECTION
    ===================================================== */
    window.selectMeetingType = function(btn) {
        document.querySelectorAll('.meeting-type-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        selectedMeetingType = btn.querySelector('span') ? btn.textContent.replace(btn.querySelector('span').textContent, '').trim() : btn.textContent.trim();
        // Extract label from text before badge
        selectedMeetingType = btn.id === 'type-intro'       ? 'Intro Call'
                            : btn.id === 'type-mentorship'  ? 'Mentorship Session'
                            : btn.id === 'type-speaking'    ? 'Speaking Inquiry'
                            : 'General Discussion';
        const dur = btn.dataset.duration;
        selectedDuration = dur + ' minutes';
        document.getElementById('meta-duration').textContent = selectedDuration;
    };

    /* =====================================================
       CALENDAR RENDERING
    ===================================================== */
    function renderCalendar() {
        const label = document.getElementById('cal-month-label');
        label.textContent = MONTH_NAMES[currentMonth] + ' ' + currentYear;

        // Prev button: disable if we're already in the current month
        const prevBtn = document.getElementById('prev-month');
        const isCurrentMonth = (currentYear === today.getFullYear() && currentMonth === today.getMonth());
        prevBtn.disabled = isCurrentMonth;

        const grid = document.getElementById('cal-grid');
        grid.innerHTML = '';

        const firstDay = new Date(currentYear, currentMonth, 1).getDay();
        const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();

        // Empty cells before first day
        for (let i = 0; i < firstDay; i++) {
            const empty = document.createElement('div');
            empty.className = 'cal-day empty';
            grid.appendChild(empty);
        }

        for (let d = 1; d <= daysInMonth; d++) {
            const cell = document.createElement('div');
            cell.textContent = d;
            cell.className = 'cal-day';

            const thisDate = new Date(currentYear, currentMonth, d);
            const dayOfWeek = thisDate.getDay(); // 0=Sun, 6=Sat

            const isPast    = thisDate < today;
            const isWeekend = dayOfWeek === 0 || dayOfWeek === 6;
            const isTodayDate = thisDate.getTime() === today.getTime();

            if (isPast || isWeekend) {
                cell.classList.add('past');
            } else {
                cell.classList.add('available');
                cell.addEventListener('click', () => selectDate(thisDate, cell, d));
            }

            if (isTodayDate) cell.classList.add('today');

            // Re-apply selected style
            if (selectedDate && thisDate.getTime() === selectedDate.getTime()) {
                cell.classList.add('selected');
            }

            grid.appendChild(cell);
        }
    }

    window.changeMonth = function(delta) {
        currentMonth += delta;
        if (currentMonth > 11) { currentMonth = 0; currentYear++; }
        if (currentMonth < 0)  { currentMonth = 11; currentYear--; }
        renderCalendar();
    };

    /* =====================================================
       DATE SELECTION
    ===================================================== */
    function selectDate(date, cell, dayNum) {
        // Remove old selection
        document.querySelectorAll('.cal-day.selected').forEach(c => c.classList.remove('selected'));
        cell.classList.add('selected');
        selectedDate = date;
        selectedTime = null;

        // Show time panel
        goToStep(2, date);
    }

    /* =====================================================
       TIME SLOTS
    ===================================================== */
    function renderTimeSlots(date) {
        const container = document.getElementById('time-slots-container');
        container.innerHTML = '';

        const label = document.getElementById('selected-date-label');
        label.textContent = 'Available slots for ' + formatDate(date);

        TIME_SLOTS.forEach(slot => {
            const el = document.createElement('div');
            el.className = 'time-slot';
            el.textContent = slot;
            el.addEventListener('click', () => selectTime(slot, el));
            container.appendChild(el);
        });
    }

    function selectTime(time, el) {
        document.querySelectorAll('.time-slot').forEach(s => s.classList.remove('selected'));
        el.classList.add('selected');
        selectedTime = time;
        setTimeout(() => goToStep(3), 300);
    }

    /* =====================================================
       STEP NAVIGATION
    ===================================================== */
    window.goToStep = function(step, date) {
        // Update step indicators
        document.querySelectorAll('.booking-step').forEach((s, i) => {
            s.classList.toggle('active', i < step);
        });

        // Show/hide panels
        const calPanel   = document.getElementById('calendar-panel');
        const timePanel  = document.getElementById('time-panel');
        const detPanel   = document.getElementById('details-panel');
        const succPanel  = document.getElementById('success-panel');

        [calPanel, timePanel, detPanel, succPanel].forEach(p => p.style.display = 'none');

        if (step === 1) {
            calPanel.style.display = 'block';
            timePanel.style.display = 'none';
        } else if (step === 2) {
            calPanel.style.display = 'block';
            timePanel.style.display = 'flex';
            renderTimeSlots(date || selectedDate);
        } else if (step === 3) {
            calPanel.style.display = 'none';
            detPanel.style.display = 'flex';
            updateDetailsPanel();
        }
    };

    function updateDetailsPanel() {
        const summaryText = document.getElementById('booking-summary-text');
        summaryText.textContent = selectedMeetingType + ' · ' + formatDate(selectedDate) + ' at ' + selectedTime;

        // Fill hidden form fields
        document.getElementById('form-date').value = formatDate(selectedDate);
        document.getElementById('form-time').value = selectedTime;
        document.getElementById('form-meeting-type').value = selectedMeetingType;
        document.getElementById('form-duration').value = selectedDuration;
        document.getElementById('form-subject').value = 'New Meeting Booking — ' + selectedMeetingType + ' on ' + formatDate(selectedDate) + ' at ' + selectedTime;
    }

    /* =====================================================
       FORM SUBMISSION
    ===================================================== */
    document.getElementById('booking-form').addEventListener('submit', function(e) {
        e.preventDefault();

        const btn = document.getElementById('submit-btn');
        btn.innerHTML = '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="animation:spin 1s linear infinite"><path d="M21 12a9 9 0 1 1-6.219-8.56"/></svg> Confirming…';
        btn.disabled = true;

        const data = new FormData(this);

        fetch('https://api.web3forms.com/submit', {
            method: 'POST',
            body: data
        })
        .then(res => res.json())
        .then(res => {
            if (res.success) {
                showSuccess();
            } else {
                btn.innerHTML = '✕ Something went wrong. Try again.';
                btn.disabled = false;
            }
        })
        .catch(() => {
            btn.innerHTML = '✕ Network error. Try again.';
            btn.disabled = false;
        });
    });

    function showSuccess() {
        document.getElementById('details-panel').style.display = 'none';
        const succPanel = document.getElementById('success-panel');
        succPanel.style.display = 'flex';

        document.getElementById('conf-type').textContent     = selectedMeetingType;
        document.getElementById('conf-date').textContent     = formatDate(selectedDate);
        document.getElementById('conf-time').textContent     = selectedTime;
        document.getElementById('conf-duration').textContent = selectedDuration;

        // Update steps: all done
        document.querySelectorAll('.booking-step').forEach(s => s.classList.add('active'));
    }

    /* =====================================================
       HELPERS
    ===================================================== */
    function formatDate(d) {
        const days   = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
        const months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
        return days[d.getDay()] + ', ' + months[d.getMonth()] + ' ' + d.getDate() + ' ' + d.getFullYear();
    }

    /* Spinner animation */
    const style = document.createElement('style');
    style.textContent = '@keyframes spin { to { transform: rotate(360deg); } }';
    document.head.appendChild(style);

    /* =====================================================
       INIT
    ===================================================== */
    renderCalendar();
    goToStep(1);
})();
</script>

<?php include 'components/footer.php'; ?>
