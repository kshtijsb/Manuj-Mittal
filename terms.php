<?php
include 'includes/data.php';
$page_title = "Terms of Service | " . $author_name;
include 'components/header.php';
?>

<main style="font-family: var(--font-sans); padding-top: 120px; min-height: 80vh; max-width: 800px; margin: 0 auto; padding-left: 2rem; padding-right: 2rem;">
    <h1 style="font-family: var(--font-serif); font-size: 3rem; margin-bottom: 2rem;">Terms of Service</h1>
    <p style="color: var(--muted); line-height: 1.8; margin-bottom: 1.5rem;">
        Last updated: <?php echo date("F d, Y"); ?>
    </p>
    
    <h3 style="font-family: var(--font-serif); font-size: 1.5rem; margin-top: 2rem; margin-bottom: 1rem;">1. Acceptance of Terms</h3>
    <p style="color: var(--text); line-height: 1.8; margin-bottom: 1.5rem;">
        By accessing and using this website, you accept and agree to be bound by the terms and provision of this agreement.
    </p>

    <h3 style="font-family: var(--font-serif); font-size: 1.5rem; margin-top: 2rem; margin-bottom: 1rem;">2. Intellectual Property</h3>
    <p style="color: var(--text); line-height: 1.8; margin-bottom: 1.5rem;">
        All content included on this site, such as text, graphics, logos, and images, is the property of <?php echo $author_name; ?> and protected by international copyright laws.
    </p>

    <h3 style="font-family: var(--font-serif); font-size: 1.5rem; margin-top: 2rem; margin-bottom: 1rem;">3. User Conduct</h3>
    <p style="color: var(--text); line-height: 1.8; margin-bottom: 1.5rem;">
        Users agree to use this website only for lawful purposes and in a way that does not infringe the rights of, restrict or inhibit anyone else's use and enjoyment of the website.
    </p>
</main>

<?php include 'components/footer.php'; ?>
