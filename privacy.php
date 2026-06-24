<?php
include 'includes/data.php';
$page_title = "Privacy Policy | " . $author_name;
include 'components/header.php';
?>

<main style="font-family: var(--font-sans); padding-top: 120px; min-height: 80vh; max-width: 800px; margin: 0 auto; padding-left: 2rem; padding-right: 2rem;">
    <h1 style="font-family: var(--font-serif); font-size: 3rem; margin-bottom: 2rem;">Privacy Policy</h1>
    <p style="color: var(--muted); line-height: 1.8; margin-bottom: 1.5rem;">
        Last updated: <?php echo date("F d, Y"); ?>
    </p>
    
    <h3 style="font-family: var(--font-serif); font-size: 1.5rem; margin-top: 2rem; margin-bottom: 1rem;">1. Information We Collect</h3>
    <p style="color: var(--text); line-height: 1.8; margin-bottom: 1.5rem;">
        We may collect personal information such as your name and email address when you voluntarily submit it through our contact forms or newsletter subscriptions.
    </p>

    <h3 style="font-family: var(--font-serif); font-size: 1.5rem; margin-top: 2rem; margin-bottom: 1rem;">2. How We Use Your Information</h3>
    <p style="color: var(--text); line-height: 1.8; margin-bottom: 1.5rem;">
        The information we collect is used to respond to your inquiries, provide services you request, and send periodic emails regarding updates or relevant news.
    </p>

    <h3 style="font-family: var(--font-serif); font-size: 1.5rem; margin-top: 2rem; margin-bottom: 1rem;">3. Data Protection</h3>
    <p style="color: var(--text); line-height: 1.8; margin-bottom: 1.5rem;">
        We implement a variety of security measures to maintain the safety of your personal information. Your personal data is contained behind secured networks.
    </p>
</main>

<?php include 'components/footer.php'; ?>
