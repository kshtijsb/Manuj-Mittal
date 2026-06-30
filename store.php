<?php
require_once 'includes/data.php';
$page_title = "The Library Store | Manuj Mittal";
include 'components/header.php';
?>



<style>
    .store-hero {
        position: relative;
        text-align: center;
        padding: 2vh 0 0vh;
        background: #fff;
        overflow: hidden;
    }

    .store-hero::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 600px;
        height: 600px;
        background: radial-gradient(circle, rgba(197, 160, 89, 0.08) 0%, transparent 70%);
        filter: blur(40px);
        z-index: 0;
    }

    .store-hero h1,
    .store-hero p {
        position: relative;
        z-index: 1;
    }

    .store-hero h1 {
        font-family: 'Times New Roman', Times, serif;
        font-size: clamp(2.5rem, 5vw, 4rem);
        margin-bottom: 1rem;
        color: #000;
        text-transform: none;
        line-height: 1.1;
    }

    .store-hero p {
        font-family: var(--font-sans);
        color: #555;
        letter-spacing: 2px;
        text-transform: uppercase;
        font-size: 0.9rem;
        font-weight: bold;
    }

    .product-grid {
        display: flex;
        flex-direction: column;
        gap: 10vh;
        padding-bottom: 15vh;
    }

    .product-item {
        display: grid;
        grid-template-columns: minmax(0, 4fr) minmax(0, 6fr);
        gap: 6rem;
        align-items: center;
        padding: 5rem;
        background: #fff;
        border-radius: 16px;
        border: 1px solid rgba(0, 0, 0, 0.06);
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.04);
        transition: 0.8s cubic-bezier(0.19, 1, 0.22, 1);
    }

    .product-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 40px 100px rgba(0, 0, 0, 0.08);
    }

    .book-spotlight {
        position: relative;
        width: 100%;
        max-width: 380px;
        margin: 0;
        box-shadow: 0 30px 60px rgba(0, 0, 0, 0.15);
        border-radius: 6px;
        overflow: hidden;
    }

    .book-art {
        width: 100%;
        height: auto;
        display: block;
        border: 2px solid var(--color-gold);
    }

    .product-info h2 {
        font-size: clamp(1.8rem, 3.5vw, 2.8rem);
        margin-bottom: 1.5rem;
        color: #000;
        font-family: 'Times New Roman', Times, serif;
        line-height: 1.1;
        white-space: nowrap;
        letter-spacing: -1px;
    }

    .product-meta {
        font-size: 0.8rem;
        font-weight: 800;
        color: var(--color-gold);
        letter-spacing: 4px;
        text-transform: uppercase;
        margin-bottom: 2rem;
        font-family: var(--font-sans);
    }

    .product-desc {
        font-size: 1.15rem;
        color: #555;
        margin-bottom: 1.5rem;
        line-height: 1.8;
        font-family: var(--font-sans);
    }

    .btn-buy {
        background: #000;
        color: #fff;
        padding: 1rem 2rem;
        border: none;
        border-radius: 0;
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase;
        font-size: 0.8rem;
        cursor: pointer;
        transition: 0.4s;
        display: inline-block;
        font-family: var(--font-sans);
    }

    .btn-buy:hover {
        background: var(--color-gold);
        color: #000;
    }

    .buy-action {
        display: flex;
        flex-direction: column;
        gap: 1rem;
        padding-top: 1.5rem;
        border-top: 1px solid rgba(0, 0, 0, 0.08);
    }

    .price-tag {
        display: flex;
        align-items: baseline;
        justify-content: center;
        gap: 1rem;
        margin-bottom: 0.5rem;
    }

    .price {
        font-size: 2.8rem;
        font-weight: bold;
        font-family: 'Times New Roman', Times, serif;
        color: #000;
        line-height: 1;
    }

    .format-btn-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
        margin-bottom: 1rem;
    }

    .format-btn:nth-child(3):last-child {
        grid-column: 1 / -1;
    }

    .format-btn {
        background: #fafafa;
        border: 1px solid #eaeaea;
        padding: 0.8rem 0.5rem; /* Smaller padding */
        border-radius: 8px;
        text-align: center;
        cursor: pointer;
        transition: all 0.2s ease;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 0.2rem;
        user-select: none;
        box-shadow: 0 4px 6px rgba(0,0,0,0.02);
    }

    .format-btn:hover:not(.disabled) {
        background: #fdfdfd;
        border-color: #ddd;
    }
    
    .format-btn:active:not(.disabled) {
        transform: translateY(2px);
        box-shadow: inset 0 2px 4px rgba(0,0,0,0.05);
    }

    .format-btn.active {
        background: #fff;
        border-color: #000;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.08);
    }

    .format-btn.active .format-title {
        color: #000;
    }

    .format-btn.active .format-price {
        color: #000;
        font-weight: bold;
    }

    .format-title {
        font-family: var(--font-sans);
        font-weight: 700;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #777;
        transition: color 0.3s;
    }

    @media (max-width: 768px) {
        .ibook-fix {
            text-transform: none;
            display: inline-block;
        }
    }

    .format-price {
        font-family: var(--font-sans);
        font-weight: 500;
        font-size: 0.95rem;
        color: #999;
        transition: color 0.3s;
    }

    .format-btn.disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }

    .join-waitlist-btn {
        background: #000;
        color: #fff;
        padding: 1rem 2rem;
        border: none;
        border-radius: 0;
        font-weight: 700;
        letter-spacing: 2px;
        font-size: 0.8rem;
        cursor: pointer;
        transition: 0.4s;
        display: inline-block;
        text-decoration: none;
        font-family: var(--font-sans);
        text-transform: uppercase;
    }

    .join-waitlist-btn:hover {
        background: var(--color-gold);
        transform: translateY(-3px);
        color: #fff;
    }

    @media (max-width: 1024px) {
        .product-item {
            grid-template-columns: 1fr;
            gap: 4rem;
            padding: 3rem;
            text-align: center;
        }

        .book-spotlight {
            max-width: 320px;
        }

        .buy-action {
            align-items: center;
        }

        .price-tag {
            justify-content: center;
        }

        .format-btn-grid {
            width: 100%;
            max-width: 400px;
        }
    }

    @media (max-width: 768px) {
        .store-hero {
            padding: 2vh 1.5rem 0vh;
        }

        .store-hero h1 {
            text-decoration: underline;
            text-underline-offset: 4px;
            text-decoration-thickness: 2px;
        }

        .product-desc {
            font-size: 0.85rem;
            white-space: normal;
            text-align: center;
        }

        .product-grid {
            gap: 6vh;
            padding-bottom: 8vh;
        }

        .product-item {
            padding: 2rem;
            border-radius: 12px;
        }

        .format-btn-grid {
            grid-template-columns: 1fr 1fr;
            gap: 0.8rem;
        }
    }
</style>

<main class="container">
    <div class="store-hero">
        <h1>LIBRARY</h1>
    </div>

    <div class="product-grid">
        <?php foreach ($books as $book): ?>
            <div class="product-item reveal">
                <div class="book-spotlight">
                    <?php if ($book['status'] === 'coming-soon'): ?>
                        <div
                            style="background: linear-gradient(135deg, #fdfdfd 0%, #e6e6e6 100%); height: 450px; display: flex; flex-direction: column; align-items: center; justify-content: center; border: 1px solid #ccc; border-radius: 5px 15px 15px 5px; position: relative; padding: 2rem; text-align: center; box-sizing: border-box; box-shadow: inset 20px 0 30px rgba(0,0,0,0.08), inset 2px 0 5px rgba(255,255,255,1), 1px 0 0 #eee, 2px 0 0 #e5e5e5, 3px 0 0 #ddd, 4px 0 0 #d5d5d5, 5px 0 0 #ccc, 6px 0 0 #c5c5c5, 20px 20px 40px rgba(0,0,0,0.2);">

                            <!-- Premium Spine effect -->
                            <div
                                style="position: absolute; left: 0; top: 0; bottom: 0; width: 35px; background: linear-gradient(to right, rgba(0,0,0,0.1) 0%, rgba(0,0,0,0.0) 40%, rgba(255,255,255,0.6) 70%, rgba(0,0,0,0.08) 100%); border-right: 1px solid rgba(0,0,0,0.05); border-radius: 4px 0 0 4px; z-index: 1;">
                            </div>

                            <!-- Gold border inset framing -->
                            <div
                                style="position: absolute; left: 45px; top: 15px; right: 15px; bottom: 15px; border: 2px solid var(--color-gold); opacity: 0.6; pointer-events: none; border-radius: 4px; z-index: 1;">
                            </div>

                            <h3
                                style="position: relative; left: 15px; z-index: 2; font-family: 'Times New Roman', Times, serif; font-size: 1.8rem; color: #111; margin-bottom: 4rem; margin-top: -6rem; line-height: 1.2; text-shadow: 1px 1px 0 rgba(255,255,255,0.8); max-width: 80%; text-align: center; word-wrap: break-word;">
                                <?php echo isset($book['cover_title']) ? $book['cover_title'] : $book['title']; ?>
                            </h3>

                            <!-- Original styled coming soon, just moved lower -->
                            <div
                                style="position: absolute; z-index: 3; bottom: 8.5rem; left: calc(50% + 15px); font-family: var(--font-serif); font-size: 1.3rem; color: #000; font-weight: bold; letter-spacing: 4px; padding: 0.5rem 1rem; border: 2px solid #000; transform: translateX(-50%) rotate(-10deg); white-space: nowrap;">
                                COMING SOON</div>
                        </div>
                    <?php else: ?>
                        <img src="<?php echo $book['image']; ?>" alt="<?php echo $book['title']; ?>" class="book-art">
                    <?php endif; ?>
                </div>
                <div class="product-info">
                    <div class="product-meta"><?php echo $book['tag']; ?></div>
                    <h2><?php echo $book['title']; ?></h2>
                    <p class="product-desc"><?php echo $book['desc']; ?></p>
                    <div class="buy-action">
                        <?php if ($book['status'] === 'available' && isset($book['formats'])): ?>
                            <div class="format-selection">
                                <label
                                    style="display: block; font-size: 0.75rem; font-weight: 800; letter-spacing: 2px; color: #999; margin-bottom: 1.5rem; text-transform: uppercase;">Choose
                                    Edition</label>
                                <div class="format-btn-grid" id="format-grid-<?php echo $book['id']; ?>">
                                    <?php
                                    $first = true;
                                    $count = 0;
                                    foreach ($book['formats'] as $key => $f):
                                        $count++;
                                        $activeClass = $first ? 'active' : '';
                                        ?>
                                        <div class="format-btn <?php echo $activeClass; ?>"
                                            onclick="selectFormat('<?php echo $book['id']; ?>', this, '<?php echo $f['price']; ?>', '<?php echo htmlspecialchars($f['label'], ENT_QUOTES); ?>', '<?php echo isset($f['url']) ? $f['url'] : (isset($book['amazon_url']) ? $book['amazon_url'] : ''); ?>')">
                                            <span class="format-title">
                                                <?php 
                                                    $title_str = ucfirst($key);
                                                    $title_str = str_replace('iBOOK', '<span class="ibook-fix">iBOOK</span>', $title_str);
                                                    echo $title_str; 
                                                ?>
                                            </span>
                                            <span class="format-price">$<?php echo $f['price']; ?></span>
                                        </div>
                                        <?php
                                        $first = false;
                                    endforeach;
                                    ?>
                                </div>
                                <p id="format-label-<?php echo $book['id']; ?>"
                                    style="font-size: 0.8rem; color: #888; font-style: italic; margin-top: 0.5rem; min-height: 1.5rem;">
                                    <?php
                                    $firstKey = array_key_first($book['formats']);
                                    echo $book['formats'][$firstKey]['label'];
                                    ?>
                                </p>
                            </div>

                            <!-- Buy Button -->
                            <?php if (isset($book['amazon_url'])): ?>
                                <?php $initialUrl = isset($book['formats'][$firstKey]['url']) ? $book['formats'][$firstKey]['url'] : $book['amazon_url']; ?>
                                <a href="<?php echo $initialUrl; ?>" target="_blank" class="btn-buy"
                                    id="buy-btn-<?php echo $book['id']; ?>"
                                    style="display: block; width: 100%; text-align: center; text-decoration: none; box-sizing: border-box;">ORDER
                                    NOW</a>
                            <?php endif; ?>

                            <script>
                                function selectFormat(bookId, btnElement, price, label, url) {
                                    // Remove active class from all buttons in this grid
                                    const grid = document.getElementById('format-grid-' + bookId);
                                    const buttons = grid.querySelectorAll('.format-btn');
                                    buttons.forEach(btn => btn.classList.remove('active'));

                                    // Add active class to clicked button
                                    btnElement.classList.add('active');

                                    // Update label
                                    const labelElement = document.getElementById('format-label-' + bookId);
                                    if (labelElement) {
                                        labelElement.innerText = label;
                                    }

                                    // Update Buy button URL
                                    const buyBtn = document.getElementById('buy-btn-' + bookId);
                                    if (buyBtn && url) {
                                        buyBtn.href = url;
                                    }
                                }
                            </script>
                        <?php elseif ($book['status'] === 'available'): ?>

                            <?php if (isset($book['amazon_url'])): ?>
                                <a href="<?php echo $book['amazon_url']; ?>" target="_blank" class="btn-buy"
                                    style="display: block; width: 100%; max-width: 400px; text-align: center; text-decoration: none; box-sizing: border-box;">BUY
                                    ON AMAZON</a>
                            <?php endif; ?>
                        <?php else: ?>
                            <a href="contact" class="join-waitlist-btn"
                                style="display: block; width: 100%; text-align: center; text-decoration: none; box-sizing: border-box;">STAY
                                TUNED FOR MORE INFORMATION</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<?php include 'components/footer.php'; ?>