<?php
require_once 'includes/data.php';
$page_title = "Thank You | Manuj Mittal";
include 'components/header.php';

// Simulate order data (in a real app, you'd fetch this from the DB using the order ID)
$order_id = $_GET['orderID'] ?? 'MNJ-' . strtoupper(bin2hex(random_bytes(4)));
?>

<style>
    .thankyou-section {
        min-height: 80vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 10vh 0;
        text-align: center;
    }
    .success-card {
        max-width: 600px;
        width: 100%;
        background: var(--surface);
        padding: 4rem;
        border: 1px solid rgba(0,0,0,0.05);
        box-shadow: 0 40px 100px rgba(0,0,0,0.05);
    }
    .success-icon {
        width: 80px;
        height: 80px;
        background: var(--gold);
        color: #fff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 2.5rem;
        font-size: 2rem;
    }
    .order-number {
        font-family: var(--font-sans);
        font-size: 0.7rem;
        font-weight: 800;
        letter-spacing: 3px;
        color: var(--muted);
        text-transform: uppercase;
        margin-bottom: 1rem;
    }
    .thankyou-title {
        font-size: 3rem;
        margin-bottom: 1.5rem;
        color: var(--blue);
    }
    .thankyou-msg {
        font-size: 1.1rem;
        line-height: 1.8;
        color: var(--muted);
        margin-bottom: 3rem;
    }
    .download-zone {
        background: #fdfdfd;
        border: 1px dashed #ddd;
        padding: 2rem;
        margin-bottom: 3rem;
    }
    .download-btn {
        display: inline-flex;
        align-items: center;
        gap: 1rem;
        background: #000;
        color: #fff;
        padding: 1.2rem 2.5rem;
        text-decoration: none;
        font-size: 0.8rem;
        font-weight: 700;
        letter-spacing: 2px;
        margin: 0.5rem;
        transition: 0.3s;
    }
    .download-btn:hover {
        background: var(--gold);
        transform: translateY(-3px);
    }
    .return-link {
        color: var(--blue);
        text-decoration: none;
        font-weight: 800;
        font-size: 0.7rem;
        letter-spacing: 2px;
        text-transform: uppercase;
        border-bottom: 2px solid var(--gold);
    }
</style>

<main class="thankyou-section container">
    <div class="success-card reveal">
        <div class="success-icon">✓</div>
        <div class="order-number">Order #<?php echo $order_id; ?></div>
        <h1 class="thankyou-title">Your journey begins.</h1>
        <p class="thankyou-msg">Thank you for your purchase. A confirmation email has been sent to your inbox. You can access your digital editions below.</p>

        <div class="download-zone">
            <h4 style="font-size: 0.7rem; letter-spacing: 2px; margin-bottom: 1.5rem; text-transform: uppercase;">Download Digital Editions</h4>
            <div style="display: flex; flex-wrap: wrap; justify-content: center;">
                <a href="assets/manuscript-placeholder.epub" class="download-btn" download>DOWNLOAD EPUB</a>
                <a href="assets/manuscript-placeholder.pdf" class="download-btn" download>DOWNLOAD PDF</a>
            </div>
        </div>

        <a href="index.php" class="return-link">Return to Home</a>
    </div>
</main>

<?php include 'components/footer.php'; ?>
