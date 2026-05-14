<?php
require_once 'includes/data.php';
$page_title = "The Library Store | Manuj Mittal";
include 'components/header.php';
?>

<!-- PayPal SDK (Replace 'test' with your real Client ID later) -->
<script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>

<style>
    .store-hero { text-align: center; padding: 15vh 0; background: #fff; }
    .store-hero h1 { font-size: clamp(3.5rem, 8vw, 5.5rem); margin-bottom: 1.5rem; letter-spacing: -3px; color: #000; }
    
    .product-grid { display: flex; flex-direction: column; gap: 10vh; padding-bottom: 15vh; }
    .product-item { 
        display: grid; 
        grid-template-columns: 0.8fr 1.2fr; 
        gap: 8rem; 
        align-items: center; 
        padding: 6rem;
        background: #fafafa;
        border-radius: 4px;
        transition: 0.8s cubic-bezier(0.19, 1, 0.22, 1);
    }
    .product-item:hover { transform: scale(1.01); background: #fff; box-shadow: 0 40px 100px rgba(0,0,0,0.05); }

    .book-spotlight { 
        position: relative; 
        width: 100%; 
        max-width: 320px;
        margin: 0 auto;
        box-shadow: 0 30px 60px rgba(0,0,0,0.2);
        border-radius: 4px;
        overflow: hidden;
    }
    .book-art { width: 100%; height: auto; display: block; }

    .product-info h2 { font-size: 3.5rem; margin-bottom: 1.5rem; color: #000; font-family: var(--font-serif); letter-spacing: -1px; }
    .product-meta { font-size: 0.75rem; font-weight: 800; color: var(--color-gold); letter-spacing: 4px; text-transform: uppercase; margin-bottom: 2rem; }
    .product-desc { font-size: 1.1rem; color: #666; margin-bottom: 3.5rem; line-height: 1.8; }

    .btn-buy { 
        background: #000; 
        color: #fff; 
        padding: 1.5rem 4rem; 
        border: none; 
        font-weight: 800; 
        letter-spacing: 3px; 
        text-transform: uppercase; 
        font-size: 0.85rem; 
        cursor: pointer; 
        transition: 0.4s;
        display: inline-block;
    }
    .btn-buy:hover { background: var(--color-gold); transform: translateY(-5px); }

    @media (max-width: 1024px) {
        .product-item { grid-template-columns: 1fr; gap: 4rem; padding: 3rem; text-align: center; }
        .book-spotlight { max-width: 250px; }
        .product-info h2 { font-size: 2.5rem; }
    }
</style>

    .buy-action {
        display: flex;
        flex-direction: column;
        gap: 2rem;
        padding-top: 2rem;
        border-top: 1px solid rgba(0, 0, 0, 0.05);
    }

    .price-tag {
        display: flex;
        align-items: center;
        gap: 2rem;
    }

    .price {
        font-size: 2.2rem;
        font-weight: 700;
        font-family: var(--font-serif);
        color: var(--blue);
    }

    /* PayPal Container Styling */
    .paypal-button-container {
        width: 100%;
        max-width: 400px;
    }

    .join-waitlist-btn {
        background: var(--blue);
        color: white;
        padding: 1.5rem 4rem;
        border-radius: 5px;
        font-weight: 800;
        text-decoration: none;
        font-size: 0.8rem;
        letter-spacing: 2px;
        transition: 0.3s;
        text-align: center;
    }

    .join-waitlist-btn:hover {
        background: var(--gold);
        transform: translateY(-3px);
    }

    @media (max-width: 992px) {
        .store-hero { padding: 6vh 0; }
        .store-hero h1 { font-size: 2.5rem; }
        .product-grid { gap: 8vh; padding-bottom: 8vh; }
        .product-item { grid-template-columns: 1fr; gap: 3rem; text-align: center; }
        .product-info h2 { font-size: 2.5rem; }
        .product-desc { margin-bottom: 2rem; font-size: 1rem; }
        .buy-action { align-items: center; border-top: 1px solid rgba(0,0,0,0.05); padding-top: 2rem; }
        .price-tag { justify-content: center; margin-bottom: 2rem !important; }
        .paypal-button-container { max-width: 100%; }
        .book-spotlight { max-width: 300px; margin: 0 auto; }
    }
</style>

<main class="container">
    <div class="store-hero">
        <h1>The Literary Store</h1>
        <p>Acquire your own piece of the legend.</p>
    </div>

    <div class="product-grid">
        <?php foreach ($books as $book): ?>
            <div class="product-item reveal">
                <div class="book-spotlight shimmer">
                    <?php if ($book['status'] === 'coming-soon'): ?>
                        <div style="background: #000; height: 450px; display: flex; align-items: center; justify-content: center;">
                            <div style="font-family: var(--font-serif); font-size: 1.5rem; color: var(--color-gold); letter-spacing: 4px; border: 2px solid var(--color-gold); padding: 1.5rem; transform: rotate(-10deg);">COMING SOON</div>
                        </div>
                    <?php else: ?>
                        <img src="<?php echo $book['image']; ?>" alt="<?php echo $book['title']; ?>" class="book-art" style="width: 100%; height: 450px; object-fit: cover;">
                    <?php endif; ?>
                </div>
                <div class="product-info">
                    <div class="product-meta"><?php echo $book['tag']; ?> • <?php echo $book['meta']; ?></div>
                    <h2><?php echo $book['title']; ?></h2>
                    <p class="product-desc"><?php echo $book['desc']; ?></p>
                    <div class="buy-action">
                        <?php if ($book['status'] === 'available' && isset($book['formats'])): ?>
                            <div class="format-selection" style="margin-bottom: 2rem;">
                                <label style="display: block; font-size: 0.7rem; font-weight: 800; letter-spacing: 2px; color: #999; margin-bottom: 1rem; text-transform: uppercase;">Choose Edition</label>
                                <select id="format-<?php echo $book['id']; ?>" onchange="updatePrice('<?php echo $book['id']; ?>')" style="width: 100%; padding: 1.2rem; border: 1px solid #eee; background: #fff; color: #000; font-family: var(--font-sans); outline: none; cursor: pointer; font-size: 0.9rem;">
                                    <?php foreach($book['formats'] as $key => $f): ?>
                                        <option value="<?php echo $f['price']; ?>"><?php echo ucfirst($key); ?> — $<?php echo $f['price']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <p id="format-label-<?php echo $book['id']; ?>" style="font-size: 0.75rem; color: var(--gold); margin-top: 0.5rem; font-style: italic;">
                                    <?php echo $book['formats']['ebook']['label']; ?>
                                </p>
                            </div>

                            <div class="price-tag" style="margin-bottom: 2.5rem;">
                                <span class="price" id="display-price-<?php echo $book['id']; ?>">$<?php echo $book['price_start']; ?></span>
                            </div>

                            <!-- PayPal Button (Checkout) -->
                            <div id="paypal-button-<?php echo $book['id']; ?>" class="paypal-button-container"></div>
                            
                            <!-- Amazon Alternative -->
                            <?php if(isset($book['amazon_url'])): ?>
                                <a href="<?php echo $book['amazon_url']; ?>" target="_blank" style="display: block; width: 100%; max-width: 400px; text-align: center; padding: 1.2rem; border: 1px solid #000; color: #000; text-decoration: none; font-size: 0.7rem; font-weight: 800; letter-spacing: 2px; margin-top: 1rem; transition: 0.3s; background: transparent;">ORDER VIA AMAZON</a>
                            <?php endif; ?>

                            <script>
                                function updatePrice(id) {
                                    const select = document.getElementById('format-' + id);
                                    document.getElementById('display-price-' + id).innerText = '$' + select.value;
                                }

                                paypal.Buttons({
                                    style: {
                                        layout: 'vertical',
                                        color:  'black',
                                        shape:  'rect',
                                        label:  'buynow'
                                    },
                                    createOrder: function (data, actions) {
                                        const price = document.getElementById('format-<?php echo $book['id']; ?>').value;
                                        return actions.order.create({
                                            purchase_units: [{
                                                amount: { value: price },
                                                description: '<?php echo $book["title"]; ?>'
                                            }]
                                        });
                                    },
                                    onApprove: function (data, actions) {
                                        return actions.order.capture().then(function (details) {
                                            window.location.href = 'thankyou.php?orderID=' + details.id;
                                        });
                                    }
                                }).render('#paypal-button-<?php echo $book['id']; ?>');
                            </script>
                        <?php elseif ($book['status'] === 'available'): ?>
                            <div class="price-tag">
                                <span class="price"><?php echo $book['price'] ?? "TBD"; ?></span>
                            </div>
                            <div id="paypal-button-<?php echo $book['id']; ?>" class="paypal-button-container"></div>
                        <?php else: ?>
                            <a href="index.php#contact" class="join-waitlist-btn">INQUIRE FOR RELEASE</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<?php include 'components/footer.php'; ?>