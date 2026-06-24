<?php
include 'includes/data.php';
$page_title = "Cookie Policy | " . $author_name;
include 'components/header.php';
?>

<main style="font-family: var(--font-sans); padding-top: 120px; min-height: 80vh; max-width: 800px; margin: 0 auto; padding-left: 2rem; padding-right: 2rem;">
    <h1 style="font-family: var(--font-serif); font-size: 3rem; margin-bottom: 2rem;">Cookie Policy</h1>
    <p style="color: var(--muted); line-height: 1.8; margin-bottom: 1.5rem;">
        Last updated: <?php echo date("F d, Y"); ?>
    </p>
    
    <h3 style="font-family: var(--font-serif); font-size: 1.5rem; margin-top: 2rem; margin-bottom: 1rem;">1. What Are Cookies</h3>
    <p style="color: var(--text); line-height: 1.8; margin-bottom: 1.5rem;">
        Cookies are small pieces of data stored on your device (computer or mobile device) when you visit a website. They are widely used to make websites work more efficiently and to provide information to the owners of the site.
    </p>

    <h3 style="font-family: var(--font-serif); font-size: 1.5rem; margin-top: 2rem; margin-bottom: 1rem;">2. How We Use Cookies</h3>
    <p style="color: var(--text); line-height: 1.8; margin-bottom: 1.5rem;">
        We use essential cookies to ensure the basic functionality of our website and to improve your browsing experience. We may also use analytics cookies to understand how visitors interact with our site.
    </p>

    <h3 style="font-family: var(--font-serif); font-size: 1.5rem; margin-top: 2rem; margin-bottom: 1rem;">3. Managing Cookies</h3>
    <p style="color: var(--text); line-height: 1.8; margin-bottom: 1.5rem;">
        You can instruct your browser to refuse all cookies or to indicate when a cookie is being sent. However, if you do not accept cookies, you may not be able to use some portions of our website.
    </p>
</main>

<?php include 'components/footer.php'; ?>
