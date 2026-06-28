<?php
require_once 'includes/data.php';
$page_title = "Contact | Manuj Mittal";
include 'components/header.php';
?>

<style>
    /* ============================================================
       CONTACT PAGE — MERGED WITH MEETING SCHEDULER
    ============================================================ */
    .contact-page {
        padding: 120px 0 80px;
        min-height: 100vh;
    }



    /* ─── SEND MESSAGE PANEL ─── */
    .contact-page-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 8rem;
        align-items: start;
        max-width: 1000px;
        margin: 0 auto;
        padding: 0 1rem;
    }

    .contact-page-h1 {
        font-size: clamp(3rem, 10vw, 5rem);
        line-height: 0.9;
        margin-bottom: 4rem;
        color: #000;
        letter-spacing: -3px;
    }

    [data-theme="dark"] .contact-page-h1 {
        color: #fff;
    }

    @media (max-width: 992px) {
        .contact-page {
            padding: 80px 0 60px;
        }

        .contact-page-grid {
            grid-template-columns: 1fr;
            gap: 3rem;
        }

        .contact-page-h1 {
            margin-bottom: 2rem;
        }

        .contact-tabs {
            margin-bottom: 2.5rem;
        }
    }

    /* Input styling */
    .input-group {
        display: flex;
        flex-direction: column;
        gap: 0.8rem;
    }

    .input-group label {
        font-size: 0.7rem;
        font-weight: 800;
        letter-spacing: 2px;
        color: #999;
        text-transform: uppercase;
    }

    .input-group input,
    .input-group select,
    .input-group textarea {
        padding: 1.2rem 0;
        border: none;
        border-bottom: 1px solid #ddd;
        background: transparent;
        font-family: var(--font-sans);
        font-size: 1.1rem;
        outline: none;
        transition: 0.3s;
        color: var(--text, #000);
        width: 100%;
    }

    .input-group textarea {
        padding: 0.5rem 0;
    }

    [data-theme="dark"] .input-group input,
    [data-theme="dark"] .input-group select,
    [data-theme="dark"] .input-group textarea {
        border-color: rgba(255, 255, 255, 0.1);
        color: #fff;
    }

    .input-group input:focus,
    .input-group select:focus,
    .input-group textarea:focus {
        border-bottom-color: #000;
    }

    [data-theme="dark"] .input-group input:focus,
    [data-theme="dark"] .input-group select:focus,
    [data-theme="dark"] .input-group textarea:focus {
        border-bottom-color: var(--gold);
    }

    /* ─── BOOK MEETING PANEL ─── */
    .scheduler-grid {
        display: grid;
        grid-template-columns: 1fr 1.15fr;
        gap: 3rem;
        max-width: 1000px;
        margin: 0 auto;
        padding: 0 1rem;
        align-items: start;
    }

    @media (max-width: 860px) {
        .scheduler-grid {
            grid-template-columns: 1fr;
            gap: 2rem;
        }
    }

    /* Host Panel */
    .host-panel {
        background: rgba(255, 255, 255, 0.55);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.7);
        border-radius: 20px;
        padding: 2.5rem 2rem;
        box-shadow: 0 6px 28px rgba(0, 0, 0, 0.04);
        position: sticky;
        top: 110px;
    }

    [data-theme="dark"] .host-panel {
        background: rgba(18, 24, 31, 0.65);
        border-color: rgba(255, 255, 255, 0.06);
    }

    .host-avatar {
        width: 64px;
        height: 64px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--gold), #B6862C);
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: var(--font-serif);
        font-size: 1.5rem;
        font-weight: 900;
        color: #fff;
        margin-bottom: 1.2rem;
        box-shadow: 0 6px 18px rgba(197, 160, 89, 0.35);
    }

    .host-name {
        font-family: 'Times New Roman', Times, serif;
        font-size: 1.5rem;
        font-weight: 900;
        color: #000;
        letter-spacing: -0.5px;
        margin-bottom: 0.2rem;
    }

    [data-theme="dark"] .host-name {
        color: #fff;
    }

    .host-title {
        font-size: 0.72rem;
        font-weight: 700;
        letter-spacing: 2px;
        color: var(--gold);
        text-transform: uppercase;
        margin-bottom: 1.8rem;
    }

    .meeting-meta {
        display: flex;
        flex-direction: column;
        gap: 1rem;
        margin-bottom: 2rem;
    }

    .meeting-meta-item {
        display: flex;
        align-items: center;
        gap: 0.9rem;
        font-size: 0.88rem;
        color: #555;
    }

    [data-theme="dark"] .meeting-meta-item {
        color: #aaa;
    }

    .meeting-meta-item svg {
        flex-shrink: 0;
        color: var(--gold);
    }

    .meeting-types {
        display: flex;
        flex-direction: column;
        gap: 0.6rem;
    }

    .meeting-type-btn {
        padding: 0.85rem 1.2rem;
        border: 1.5px solid #eee;
        border-radius: 10px;
        background: transparent;
        font-family: var(--font-sans);
        font-size: 0.85rem;
        font-weight: 700;
        color: #444;
        cursor: pointer;
        text-align: left;
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: all 0.22s ease;
    }

    [data-theme="dark"] .meeting-type-btn {
        border-color: rgba(255, 255, 255, 0.08);
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

    .mt-badge {
        font-size: 0.65rem;
        font-weight: 800;
        letter-spacing: 1.5px;
        padding: 0.25rem 0.6rem;
        border-radius: 20px;
        background: rgba(197, 160, 89, 0.12);
        color: var(--gold);
    }

    .meeting-type-btn.active .mt-badge {
        background: rgba(255, 255, 255, 0.15);
        color: #fff;
    }

    [data-theme="dark"] .meeting-type-btn.active .mt-badge {
        background: rgba(0, 0, 0, 0.15);
        color: #000;
    }

    /* Booking Panel */
    .booking-panel {
        background: rgba(255, 255, 255, 0.55);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.7);
        border-radius: 20px;
        padding: 2.5rem 2rem;
        box-shadow: 0 6px 28px rgba(0, 0, 0, 0.04);
    }

    [data-theme="dark"] .booking-panel {
        background: rgba(18, 24, 31, 0.65);
        border-color: rgba(255, 255, 255, 0.06);
    }

    /* Booking steps */
    .booking-steps {
        display: flex;
        gap: 0;
        border-bottom: 1px solid #eee;
        margin-bottom: 2rem;
    }

    [data-theme="dark"] .booking-steps {
        border-color: rgba(255, 255, 255, 0.07);
    }

    .booking-step {
        padding: 0.7rem 0;
        margin-right: 1.8rem;
        font-size: 0.65rem;
        font-weight: 800;
        letter-spacing: 2px;
        text-transform: uppercase;
        color: #ccc;
        border-bottom: 2px solid transparent;
        margin-bottom: -1px;
        transition: all 0.25s ease;
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
        margin-bottom: 1.2rem;
    }

    .calendar-month {
        font-family: var(--font-serif);
        font-size: 1.3rem;
        font-weight: 900;
        color: #000;
        letter-spacing: -0.5px;
    }

    [data-theme="dark"] .calendar-month {
        color: #fff;
    }

    .cal-nav-btn {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        border: 1.5px solid #eee;
        background: transparent;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.22s ease;
        color: #333;
    }

    [data-theme="dark"] .cal-nav-btn {
        border-color: rgba(255, 255, 255, 0.1);
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
        pointer-events: none;
    }

    .calendar-weekdays {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 3px;
        margin-bottom: 0.3rem;
    }

    .cal-weekday {
        text-align: center;
        font-size: 0.6rem;
        font-weight: 800;
        letter-spacing: 1.5px;
        color: #bbb;
        text-transform: uppercase;
        padding: 0.3rem 0;
    }

    .calendar-grid {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 3px;
    }

    .cal-day {
        aspect-ratio: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        font-size: 0.85rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.18s ease;
        position: relative;
        color: #222;
    }

    [data-theme="dark"] .cal-day {
        color: #ddd;
    }

    .cal-day.empty {
        cursor: default;
    }

    .cal-day.past {
        color: #ccc;
        cursor: not-allowed;
    }

    [data-theme="dark"] .cal-day.past {
        color: #444;
    }

    .cal-day.today::after {
        content: '';
        position: absolute;
        bottom: 3px;
        width: 4px;
        height: 4px;
        border-radius: 50%;
        background: var(--gold);
    }

    .cal-day.available:hover {
        background: #f0f0f0;
    }

    [data-theme="dark"] .cal-day.available:hover {
        background: rgba(255, 255, 255, 0.06);
    }

    .cal-day.selected {
        background: #000 !important;
        color: #fff !important;
    }

    [data-theme="dark"] .cal-day.selected {
        background: var(--gold) !important;
        color: #000 !important;
    }

    /* Time slots sub-panel */
    #sch-time-panel {
        display: none;
        flex-direction: column;
        gap: 1.2rem;
        margin-top: 1.5rem;
        padding-top: 1.5rem;
        border-top: 1px solid #eee;
        animation: schSlideUp 0.35s cubic-bezier(0.25, 1, 0.5, 1);
    }

    [data-theme="dark"] #sch-time-panel {
        border-color: rgba(255, 255, 255, 0.07);
    }

    @keyframes schSlideUp {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .sch-time-label {
        font-size: 0.65rem;
        font-weight: 800;
        letter-spacing: 2.5px;
        color: #999;
        text-transform: uppercase;
    }

    .sch-time-slots-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 0.5rem;
    }

    @media (max-width: 600px) {
        .sch-time-slots-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    .sch-time-slot {
        padding: 0.75rem 0.4rem;
        text-align: center;
        border: 1.5px solid #eee;
        border-radius: 8px;
        font-size: 0.78rem;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.18s ease;
        color: #333;
        background: #fff;
    }

    [data-theme="dark"] .sch-time-slot {
        background: rgba(255, 255, 255, 0.03);
        border-color: rgba(255, 255, 255, 0.08);
        color: #ccc;
    }

    .sch-time-slot:hover {
        border-color: var(--gold);
        background: rgba(197, 160, 89, 0.05);
        transform: translateY(-1px);
    }

    .sch-time-slot.selected {
        background: #000;
        color: #fff;
        border-color: #000;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.14);
    }

    [data-theme="dark"] .sch-time-slot.selected {
        background: var(--gold);
        color: #000;
        border-color: var(--gold);
        box-shadow: 0 4px 12px rgba(197, 160, 89, 0.22);
    }

    /* Details form panel */
    #sch-details-panel {
        display: none;
        flex-direction: column;
        gap: 1.5rem;
        margin-top: 1.5rem;
        padding-top: 1.5rem;
        border-top: 1px solid #eee;
        animation: schSlideUp 0.35s cubic-bezier(0.25, 1, 0.5, 1);
    }

    [data-theme="dark"] #sch-details-panel {
        border-color: rgba(255, 255, 255, 0.07);
    }

    .booking-summary-bar {
        background: #000;
        color: #fff;
        border-radius: 10px;
        padding: 1rem 1.3rem;
        display: flex;
        align-items: center;
        gap: 0.8rem;
        font-size: 0.85rem;
        font-weight: 700;
    }

    [data-theme="dark"] .booking-summary-bar {
        background: var(--gold);
        color: #000;
    }

    .booking-summary-bar svg {
        flex-shrink: 0;
    }

    .sch-form-field {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .sch-form-label {
        font-size: 0.65rem;
        font-weight: 800;
        letter-spacing: 2.5px;
        color: #999;
        text-transform: uppercase;
    }

    .sch-form-input {
        padding: 0.9rem 0;
        border: none;
        border-bottom: 1.5px solid #ddd;
        background: transparent;
        font-family: var(--font-sans);
        font-size: 1rem;
        color: #000;
        outline: none;
        transition: border-color 0.25s ease;
    }

    [data-theme="dark"] .sch-form-input {
        border-color: rgba(255, 255, 255, 0.1);
        color: #fff;
    }

    .sch-form-input:focus {
        border-bottom-color: #000;
    }

    [data-theme="dark"] .sch-form-input:focus {
        border-bottom-color: var(--gold);
    }

    .sch-form-input::placeholder {
        color: #bbb;
    }

    .sch-form-textarea {
        padding: 0.9rem 0;
        border: none;
        border-bottom: 1.5px solid #ddd;
        background: transparent;
        font-family: var(--font-sans);
        font-size: 1rem;
        color: #000;
        outline: none;
        resize: none;
        transition: border-color 0.25s ease;
    }

    [data-theme="dark"] .sch-form-textarea {
        border-color: rgba(255, 255, 255, 0.1);
        color: #fff;
    }

    .sch-form-textarea:focus {
        border-bottom-color: #000;
    }

    [data-theme="dark"] .sch-form-textarea:focus {
        border-bottom-color: var(--gold);
    }

    .sch-form-textarea::placeholder {
        color: #bbb;
    }

    /* Confirm button */
    .btn-confirm {
        width: 100%;
        padding: 1.2rem;
        background: #000;
        color: #fff;
        border: none;
        border-radius: 12px;
        font-family: var(--font-sans);
        font-size: 0.95rem;
        font-weight: 800;
        letter-spacing: 2px;
        cursor: pointer;
        transition: all 0.25s ease;
        text-transform: uppercase;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.7rem;
    }

    [data-theme="dark"] .btn-confirm {
        background: var(--gold);
        color: #000;
    }

    .btn-confirm:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 22px rgba(0, 0, 0, 0.18);
    }

    [data-theme="dark"] .btn-confirm:hover {
        box-shadow: 0 8px 22px rgba(197, 160, 89, 0.28);
    }

    .btn-confirm:active {
        transform: translateY(0);
    }

    /* Back link */
    .sch-back-link {
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 1px;
        color: #aaa;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        transition: color 0.2s;
        background: none;
        border: none;
        font-family: var(--font-sans);
        padding: 0;
    }

    .sch-back-link:hover {
        color: #000;
    }

    [data-theme="dark"] .sch-back-link:hover {
        color: var(--gold);
    }

    /* Success screen */
    #sch-success-panel {
        display: none;
        flex-direction: column;
        align-items: center;
        text-align: center;
        gap: 1.3rem;
        padding: 2rem 0.5rem;
        animation: schSlideUp 0.5s cubic-bezier(0.25, 1, 0.5, 1);
    }

    .success-icon {
        width: 68px;
        height: 68px;
        border-radius: 50%;
        background: linear-gradient(135deg, #000, #333);
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 10px 28px rgba(0, 0, 0, 0.18);
    }

    [data-theme="dark"] .success-icon {
        background: linear-gradient(135deg, var(--gold), #B6862C);
    }

    .success-title {
        font-family: var(--font-serif);
        font-size: 1.8rem;
        font-weight: 900;
        color: #000;
        letter-spacing: -0.5px;
    }

    [data-theme="dark"] .success-title {
        color: #fff;
    }

    .success-detail {
        font-size: 0.95rem;
        color: #666;
        line-height: 1.7;
        max-width: 320px;
    }

    [data-theme="dark"] .success-detail {
        color: #aaa;
    }

    .success-box {
        background: #f8f8f8;
        border-radius: 12px;
        padding: 1.2rem 1.6rem;
        width: 100%;
        text-align: left;
    }

    [data-theme="dark"] .success-box {
        background: rgba(255, 255, 255, 0.04);
    }

    .conf-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.6rem 0;
        border-bottom: 1px solid #eee;
        font-size: 0.88rem;
    }

    [data-theme="dark"] .conf-row {
        border-color: rgba(255, 255, 255, 0.06);
    }

    .conf-row:last-child {
        border-bottom: none;
    }

    .conf-row span:first-child {
        font-weight: 800;
        letter-spacing: 1px;
        color: #999;
        font-size: 0.65rem;
        text-transform: uppercase;
    }

    .conf-row span:last-child {
        font-weight: 700;
        color: #000;
    }

    [data-theme="dark"] .conf-row span:last-child {
        color: #fff;
    }

    .btn-back-contact {
        display: inline-flex;
        align-items: center;
        gap: 0.6rem;
        padding: 0.9rem 2.2rem;
        background: #000;
        color: #fff;
        border-radius: 0;
        font-weight: 700;
        font-size: 0.85rem;
        letter-spacing: 1px;
        transition: all 0.25s ease;
        cursor: pointer;
        border: 1px solid var(--gold);
        font-family: var(--font-sans);
    }

    [data-theme="dark"] .btn-back-contact {
        background: var(--gold);
        color: #000;
    }

    .btn-back-contact:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 18px rgba(0, 0, 0, 0.18);
    }
</style>

<section class="contact-page">



    <!-- ══════════════════════════════════════════════
         BOOK A MEETING (SCHEDULER)
    ══════════════════════════════════════════════ -->
    <div id="panel-mtg" style="max-width: 1000px; margin: 0 auto; padding: 0 1rem;">
        <div class="side-tag"
            style="color: #000; margin-bottom: 3rem; display: block; font-size: clamp(2.5rem, 5vw, 4rem); font-family: 'Times New Roman', Times, serif; text-align: center;">
            Let's connect</div>
        <div class="scheduler-grid">

            <!-- Left: Host info + meeting types -->
            <aside class="host-panel">
                <img src="assets/author meeting.jpg" class="host-avatar" alt="Manuj Mittal" style="object-fit: cover;">
                <div class="host-name">Manuj Mittal (MJ)</div>
                <div class="host-title">Doctorate Researcher · <br>Community Builder</div>

                <div class="meeting-meta">
                    <div class="meeting-meta-item">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <circle cx="12" cy="12" r="10" />
                            <polyline points="12 6 12 12 16 14" />
                        </svg>
                        <span id="meta-duration">15 minutes</span>
                    </div>
                    <div class="meeting-meta-item">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                            <circle cx="12" cy="10" r="3" />
                        </svg>
                        <span>Virtual</span>
                    </div>
                    <div class="meeting-meta-item">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <rect x="3" y="4" width="18" height="18" rx="2" />
                            <line x1="16" y1="2" x2="16" y2="6" />
                            <line x1="8" y1="2" x2="8" y2="6" />
                            <line x1="3" y1="10" x2="21" y2="10" />
                        </svg>
                        <span>Mon – Fri, 10 AM – 4 PM EST</span>
                    </div>
                    <div class="meeting-meta-item">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                            <polyline points="22,6 12,13 2,6" />
                        </svg>
                        <span>Confimation and Zoom link to be sent on you email</span>
                    </div>
                </div>

                <div class="meeting-types">
                    <button class="meeting-type-btn" data-duration="15" data-label="Intro Call"
                        onclick="selectMeetingType(this)">Intro Call <span class="mt-badge">15 MIN</span></button>
                    <button class="meeting-type-btn" data-duration="15" data-label="Speaker Inquiry"
                        onclick="selectMeetingType(this)">Speaker Inquiry <span class="mt-badge">15 MIN</span></button>
                    <button class="meeting-type-btn" data-duration="30" data-label="General Discussion"
                        onclick="selectMeetingType(this)">General Discussion <span class="mt-badge">30
                            MIN</span></button>
                    <button class="meeting-type-btn" data-duration="60" data-label="Advisor Session"
                        onclick="selectMeetingType(this)">Advisory Session <span class="mt-badge">60
                            MIN</span></button>
                    <button id="btn-send-msg" class="meeting-type-btn" type="button" onclick="showMsgForm()"
                        style="display: flex; align-items: center; justify-content: space-between;">
                        Write a Message <span class="mt-badge" style="background: transparent; color: inherit;"><svg
                                width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                </path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg></span>
                    </button>
                </div>
            </aside>

            <!-- Right: Calendar + steps -->
            <div class="booking-panel">
                <!-- Step indicator -->
                <div class="booking-steps">
                    <div class="booking-step active" id="sch-step-1">01 · Date</div>
                    <div class="booking-step" id="sch-step-2">02 · Time</div>
                    <div class="booking-step" id="sch-step-3">03 · Details</div>
                </div>

                <!-- Step 1: Calendar -->
                <div id="sch-cal-panel">
                    <div class="calendar-header">
                        <button class="cal-nav-btn" id="sch-prev-month" onclick="schChangeMonth(-1)"
                            aria-label="Previous month">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2.5">
                                <polyline points="15 18 9 12 15 6" />
                            </svg>
                        </button>
                        <div class="calendar-month" id="sch-month-label">June 2026</div>
                        <button class="cal-nav-btn" id="sch-next-month" onclick="schChangeMonth(1)"
                            aria-label="Next month">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2.5">
                                <polyline points="9 18 15 12 9 6" />
                            </svg>
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
                    <div class="calendar-grid" id="sch-cal-grid"></div>


                </div>

                <!-- Step 2: Time slots -->
                <div id="sch-time-panel">
                    <button class="sch-back-link" onclick="schGoToStep(1)">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5">
                            <polyline points="15 18 9 12 15 6" />
                        </svg>
                        Change date
                    </button>
                    <div class="sch-time-label" id="sch-date-label">Choose a time</div>
                    <div class="sch-time-slots-grid" id="sch-slots-container"></div>
                </div>

                <!-- General Message Form -->
                <div id="sch-msg-form">
                    <h2
                        style="font-family: var(--font-serif); font-size: 2.5rem; margin-bottom: 2rem; color: var(--text);">
                        Write a Message</h2>

                    <div id="general-msg-success"
                        style="display: none; background: #d4edda; color: #155724; padding: 1.5rem; border-radius: 5px; margin-bottom: 2rem; font-weight: 600;">
                        Message sent successfully! We will get back to you soon.
                    </div>

                    <form id="general-message-form" action="https://api.web3forms.com/submit" method="POST"
                        style="display: flex; flex-direction: column; gap: 2rem;">
                        <input type="hidden" name="access_key" value="768f4eff-35e7-4e1a-b6ec-d84d0862a4a0">
                        <input type="hidden" name="subject" value="New Inquiry from Contact Page">
                        <input type="hidden" name="_captcha" value="false">
                        <input type="checkbox" name="botcheck" class="hidden" style="display: none;">

                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
                            <div class="input-group">
                                <label>Full Name</label>
                                <input type="text" name="name" placeholder="John Doe" required>
                            </div>
                            <div class="input-group">
                                <label>Email Address</label>
                                <input type="email" name="email" placeholder="john@example.com" required>
                            </div>
                        </div>

                        <div class="input-group">
                            <label>Subject</label>
                            <select name="type" style="appearance: none;">
                                <option value="Speaking">Speaking Engagement</option>
                                <option value="Mentorship">Mentorship Inquiry</option>
                                <option value="Business">Book Order / Business</option>
                                <option value="General">General Message</option>
                            </select>
                        </div>

                        <div class="input-group">
                            <label>Your Message</label>
                            <textarea name="message" rows="4" placeholder="How can we collaborate?"
                                style="resize: none;" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary"
                            style="background: #000; color: #fff; border: none; padding: 1.5rem; font-weight: 800; letter-spacing: 3px; cursor: pointer; transition: 0.3s; margin-top: 1rem; font-family: var(--font-sans); width: 100%; border-radius: 0;">
                            SEND
                        </button>
                    </form>
                </div>

                <!-- Step 3: Details form -->
                <div id="sch-details-panel">
                    <button class="sch-back-link" onclick="schGoToStep(2)">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5">
                            <polyline points="15 18 9 12 15 6" />
                        </svg>
                        Change time
                    </button>

                    <div class="booking-summary-bar">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <rect x="3" y="4" width="18" height="18" rx="2" />
                            <line x1="16" y1="2" x2="16" y2="6" />
                            <line x1="8" y1="2" x2="8" y2="6" />
                            <line x1="3" y1="10" x2="21" y2="10" />
                        </svg>
                        <span id="sch-summary-text">—</span>
                    </div>

                    <form id="sch-booking-form" action="https://api.web3forms.com/submit" method="POST"
                        style="display:flex;flex-direction:column;gap:1.5rem;">
                        <input type="hidden" name="access_key" value="768f4eff-35e7-4e1a-b6ec-d84d0862a4a0">
                        <input type="hidden" name="_captcha" value="false">
                        <input type="checkbox" name="botcheck" class="hidden" style="display: none;">
                        <input type="hidden" name="subject" id="sch-form-subject" value="New Meeting Booking">
                        <input type="hidden" name="meeting_date" id="sch-form-date">
                        <input type="hidden" name="meeting_time" id="sch-form-time">
                        <input type="hidden" name="meeting_type" id="sch-form-type" value="Intro Call">
                        <input type="hidden" name="meeting_duration" id="sch-form-duration" value="30 minutes">

                        <div class="sch-form-field">
                            <label class="sch-form-label">Full Name</label>
                            <input type="text" name="name" class="sch-form-input" placeholder="Your full name" required>
                        </div>
                        <div class="sch-form-field">
                            <label class="sch-form-label">Email Address</label>
                            <input type="email" name="email" class="sch-form-input" placeholder="your@email.com"
                                required>
                        </div>
                        <div class="sch-form-field">
                            <label class="sch-form-label">Brief Agenda</label>
                            <textarea name="message" class="sch-form-textarea" rows="2"
                                placeholder="What would you like to discuss?"></textarea>
                        </div>
                        <button type="submit" class="btn-confirm" id="sch-submit-btn">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2.5">
                                <polyline points="20 6 9 17 4 12" />
                            </svg>
                            Confirm Booking
                        </button>
                    </form>
                </div>

                <!-- Success screen -->
                <div id="sch-success-panel">
                    <div class="success-icon">
                        <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5">
                            <polyline points="20 6 9 17 4 12" />
                        </svg>
                    </div>
                    <div class="success-title">You're booked!</div>
                    <p class="success-detail">A confirmation has been sent to your email. Manuj looks forward to
                        speaking with you.</p>

                    <div class="success-box">
                        <div class="conf-row"><span>Meeting Type</span><span id="conf-type">—</span></div>
                        <div class="conf-row"><span>Date</span> <span id="conf-date">—</span></div>
                        <div class="conf-row"><span>Time</span> <span id="conf-time">—</span></div>
                        <div class="conf-row"><span>Duration</span> <span id="conf-duration">—</span></div>
                    </div>

                    <button class="btn-back-contact" onclick="resetScheduler()">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <polyline points="15 18 9 12 15 6" />
                        </svg>
                        Book Another
                    </button>
                </div>
            </div><!-- /booking-panel -->
        </div><!-- /scheduler-grid -->
    </div><!-- /panel-mtg -->
</section>

<script>
    /* ============================================================
       SCHEDULER
    ============================================================ */
    (function () {
        const MONTH_NAMES = ['January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'];
        const TIME_SLOTS = ['10:00 AM', '11:00 AM', '12:00 PM',
            '02:00 PM', '03:00 PM', '04:00 PM'];

        let curYear = new Date().getFullYear();
        let curMonth = new Date().getMonth();
        let selDate = null;
        let selTime = null;
        let selType = null;
        let selDur = null;

        const today = new Date();
        today.setHours(0, 0, 0, 0);

        /* ── Meeting type picker ──────────────────────────────── */

        window.selectMeetingType = function (btn) {
            document.querySelectorAll('.meeting-type-btn').forEach(b => b.classList.remove('active'));

            btn.classList.add('active');
            selType = btn.dataset.label;
            selDur = btn.dataset.duration + ' minutes';
            document.getElementById('meta-duration').textContent = selDur;
            schGoToStep(1);
        };


        /* ── Calendar render ──────────────────────────────────── */
        function renderCal() {
            document.getElementById('sch-month-label').textContent =
                MONTH_NAMES[curMonth] + ' ' + curYear;

            const isCurrentMonth = (curYear === today.getFullYear() && curMonth === today.getMonth());
            document.getElementById('sch-prev-month').disabled = isCurrentMonth;

            const grid = document.getElementById('sch-cal-grid');
            grid.innerHTML = '';

            const firstDay = new Date(curYear, curMonth, 1).getDay();
            const daysInMonth = new Date(curYear, curMonth + 1, 0).getDate();

            for (let i = 0; i < firstDay; i++) {
                const e = document.createElement('div');
                e.className = 'cal-day empty';
                grid.appendChild(e);
            }

            for (let d = 1; d <= daysInMonth; d++) {
                const cell = document.createElement('div');
                cell.textContent = d;
                cell.className = 'cal-day';

                const thisDate = new Date(curYear, curMonth, d);
                const dow = thisDate.getDay();
                const isPast = thisDate < today;
                const isWknd = dow === 0 || dow === 6;
                const isToday = thisDate.getTime() === today.getTime();

                if (isPast || isWknd) {
                    cell.classList.add('past');
                } else {
                    cell.classList.add('available');
                    cell.addEventListener('click', () => selectDate(thisDate, cell));
                }

                if (isToday) cell.classList.add('today');

                if (selDate && thisDate.getTime() === selDate.getTime()) {
                    cell.classList.add('selected');
                }

                grid.appendChild(cell);
            }
        }

        window.schChangeMonth = function (delta) {
            curMonth += delta;
            if (curMonth > 11) { curMonth = 0; curYear++; }
            if (curMonth < 0) { curMonth = 11; curYear--; }
            renderCal();
        };

        /* ── Date selection ───────────────────────────────────── */
        function selectDate(date, cell) {
            document.querySelectorAll('#sch-cal-grid .cal-day.selected').forEach(c => c.classList.remove('selected'));
            cell.classList.add('selected');
            selDate = date;
            selTime = null;
            schGoToStep(2, date);
        }

        /* ── Time slots ───────────────────────────────────────── */
        function renderSlots(date) {
            document.getElementById('sch-date-label').textContent =
                'Available slots for ' + fmtDate(date);
            const cont = document.getElementById('sch-slots-container');
            cont.innerHTML = '';
            TIME_SLOTS.forEach(slot => {
                const el = document.createElement('div');
                el.className = 'sch-time-slot';
                el.textContent = slot;
                el.addEventListener('click', () => {
                    document.querySelectorAll('.sch-time-slot').forEach(s => s.classList.remove('selected'));
                    el.classList.add('selected');
                    selTime = slot;
                    setTimeout(() => schGoToStep(3), 260);
                });
                cont.appendChild(el);
            });
        }

        /* ── Step navigation ──────────────────────────────────── */

        window.schGoToStep = function (step, date) {
            // Step indicators
            document.querySelectorAll('.booking-step').forEach((s, i) => {
                s.classList.toggle('active', i < step);
            });

            const calPanel = document.getElementById('sch-cal-panel');
            const timePanel = document.getElementById('sch-time-panel');
            const msgPanel = document.getElementById('sch-msg-form');
            const detPanel = document.getElementById('sch-details-panel');
            const sucPanel = document.getElementById('sch-success-panel');
            const stepIndicator = document.querySelector('.booking-steps');

            [calPanel, timePanel, detPanel, sucPanel, msgPanel].forEach(p => { if (p) p.style.display = 'none'; });

            const btnSendMsg = document.getElementById('btn-send-msg');
            if (!selType) {
                if (stepIndicator) stepIndicator.style.display = 'none';
                if (msgPanel) msgPanel.style.display = 'block';
                if (btnSendMsg) btnSendMsg.style.display = 'none';
                return;
            } else {
                if (stepIndicator) stepIndicator.style.display = 'flex';
                if (btnSendMsg) btnSendMsg.style.display = 'flex';
            }

            if (step === 1) {
                calPanel.style.display = 'block';
            } else if (step === 2) {
                calPanel.style.display = 'block';
                timePanel.style.display = 'flex';
                renderSlots(date || selDate);
            } else if (step === 3) {

                detPanel.style.display = 'flex';
                // fill summary & hidden fields
                document.getElementById('sch-summary-text').textContent =
                    selType + ' · ' + fmtDate(selDate) + ' at ' + selTime;
                document.getElementById('sch-form-date').value = fmtDate(selDate);
                document.getElementById('sch-form-time').value = selTime;
                document.getElementById('sch-form-type').value = selType;
                document.getElementById('sch-form-duration').value = selDur;
                document.getElementById('sch-form-subject').value =
                    'Meeting Booking — ' + selType + ' · ' + fmtDate(selDate) + ' at ' + selTime;
            }
        };

        /* ── Form submit ──────────────────────────────────────── */
        document.getElementById('general-message-form')?.addEventListener('submit', function (e) {
            e.preventDefault();
            const btn = this.querySelector('button[type="submit"]');
            const originalBtnText = btn.innerHTML;
            btn.innerHTML = 'SENDING...';
            btn.disabled = true;

            fetch('https://api.web3forms.com/submit', {
                method: 'POST',
                headers: { 'Accept': 'application/json' },
                body: new FormData(this)
            })
                .then(r => r.json())
                .then(r => {
                    if (r.success) {
                        this.style.display = 'none';
                        document.getElementById('general-msg-success').style.display = 'block';
                    } else {
                        btn.innerHTML = '✕ ' + (r.message || 'ERROR. TRY AGAIN');
                        btn.disabled = false;
                    }
                })
                .catch(() => {
                    btn.innerHTML = '✕ NETWORK ERROR';
                    btn.disabled = false;
                });
        });

        document.getElementById('sch-booking-form').addEventListener('submit', function (e) {
            e.preventDefault();
            const btn = document.getElementById('sch-submit-btn');
            btn.innerHTML = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="animation:schSpin 1s linear infinite"><path d="M21 12a9 9 0 1 1-6.219-8.56"/></svg> Confirming…';
            btn.disabled = true;

            fetch('https://api.web3forms.com/submit', {
                method: 'POST',
                headers: { 'Accept': 'application/json' },
                body: new FormData(this)
            })
                .then(r => r.json())
                .then(r => {
                    if (r.success) {
                        showSuccess();
                    } else {
                        btn.textContent = '✕ ' + (r.message || 'Something went wrong. Try again.');
                        btn.disabled = false;
                    }
                })
                .catch(() => {
                    btn.textContent = '✕ Network error. Try again.';
                    btn.disabled = false;
                });
        });

        function showSuccess() {
            document.getElementById('sch-details-panel').style.display = 'none';
            const suc = document.getElementById('sch-success-panel');
            suc.style.display = 'flex';
            document.getElementById('conf-type').textContent = selType;
            document.getElementById('conf-date').textContent = fmtDate(selDate);
            document.getElementById('conf-time').textContent = selTime;
            document.getElementById('conf-duration').textContent = selDur;
            document.querySelectorAll('.booking-step').forEach(s => s.classList.add('active'));
        }




        window.showMsgForm = function () {
            selDate = null; selTime = null;
            selType = null; selDur = null;
            document.querySelectorAll('.meeting-type-btn').forEach(b => b.classList.remove('active'));
            document.getElementById('meta-duration').textContent = '—';
            document.getElementById('sch-success-panel').style.display = 'none';
            schGoToStep(1);
            renderCal();
        };

        window.resetScheduler = function () {
            selDate = null; selTime = null;
            document.getElementById('sch-success-panel').style.display = 'none';
            const introBtn = document.querySelector('.meeting-type-btn[data-label="Intro Call"]');
            if (introBtn) {
                selectMeetingType(introBtn);
            } else {
                selType = null; selDur = null;
                document.querySelectorAll('.meeting-type-btn').forEach(b => b.classList.remove('active'));
                document.getElementById('meta-duration').textContent = '—';
                schGoToStep(1);
            }
            renderCal();
        };



        /* ── Helpers ──────────────────────────────────────────── */
        function fmtDate(d) {
            const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
            const mos = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            return days[d.getDay()] + ', ' + mos[d.getMonth()] + ' ' + d.getDate() + ' ' + d.getFullYear();
        }

        /* Spinner keyframe */
        const s = document.createElement('style');
        s.textContent = '@keyframes schSpin { to { transform: rotate(360deg); } }';
        document.head.appendChild(s);


        /* Public init */
        window.schInit = function () {
            renderCal();
            const introBtn = document.querySelector('.meeting-type-btn[data-label="Intro Call"]');
            if (introBtn) {
                selectMeetingType(introBtn);
            } else {
                schGoToStep(1);
            }
        };


        // Initialize immediately
        schInit();
        if (window.location.hash === '#book') {
            document.getElementById('panel-mtg').scrollIntoView({ behavior: 'smooth' });
        }
    })();
</script>

<?php include 'components/footer.php'; ?>