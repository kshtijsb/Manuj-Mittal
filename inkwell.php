<?php 
require_once 'includes/data.php'; 
$page_title = "The Inkwell | Manuj Mittal";
include 'components/header.php'; 
?>

<style>
    .inkwell-hero { text-align: center; padding: 15vh 0; position: relative; overflow: hidden; }
    .inkwell-hero h1 { font-size: clamp(3.5rem, 8vw, 5.5rem); margin-bottom: 1.5rem; letter-spacing: -3px; color: #000; }
    
    .toggle-container { display: flex; justify-content: center; gap: 1rem; margin-bottom: 10vh; }
    .toggle-btn { 
        padding: 1.2rem 3rem; 
        border: 1px solid #eee; 
        background: white; 
        font-weight: 800; 
        letter-spacing: 2px; 
        text-transform: uppercase; 
        font-size: 0.7rem; 
        transition: 0.5s; 
        cursor: pointer;
    }
    .toggle-btn.active { 
        background: #000; 
        color: white; 
        border-color: #000; 
    }

    .content-area { position: relative; min-height: 60vh; padding-bottom: 10vh; }
    .content-pane { display: none; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 3rem; animation: fadeIn 0.8s forwards; }
    .content-pane.active { display: grid; }

    .article-card { 
        background: white; 
        padding: 4rem; 
        border-radius: 4px; 
        border: 1px solid #eee; 
        transition: 0.8s cubic-bezier(0.19, 1, 0.22, 1); 
        display: flex; 
        flex-direction: column; 
        justify-content: space-between; 
        position: relative;
        overflow: hidden;
    }
    .article-card::after {
        content: '';
        position: absolute;
        top: 0; left: 0; width: 4px; height: 0;
        background: var(--color-gold);
        transition: 0.5s;
    }
    .article-card:hover { 
        transform: translateY(-15px); 
        box-shadow: 0 40px 80px rgba(0,0,0,0.06); 
    }
    .article-card:hover::after { height: 100%; }

    .article-meta { font-size: 0.65rem; font-weight: 800; color: var(--color-gold); text-transform: uppercase; letter-spacing: 3px; margin-bottom: 2rem; }
    .article-card h3 { font-size: 2.2rem; margin-bottom: 2rem; color: #000; font-family: var(--font-serif); line-height: 1.1; }
    .article-excerpt { font-size: 1.05rem; color: #666; margin-bottom: 3rem; line-height: 1.8; }
    
    .btn-text {
        font-size: 0.75rem;
        font-weight: 800;
        letter-spacing: 3px;
        color: #000;
        text-decoration: none;
        border-bottom: 1px solid #000;
        padding-bottom: 5px;
        display: inline-block;
        transition: 0.3s;
    }
    .btn-text:hover { color: var(--color-gold); border-color: var(--color-gold); }

    @keyframes fadeIn { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }

    @media (max-width: 768px) {
        .inkwell-hero { padding: 10vh 0; }
        .toggle-container { flex-direction: column; }
        .toggle-btn { width: 100%; }
        .article-card { padding: 2.5rem; }
        .article-card h3 { font-size: 1.8rem; }
    }
</style>

<main class="container">
    <div class="inkwell-hero">
        <h1 class="reveal">The Inkwell.</h1>
        <p class="reveal" style="letter-spacing: 2px; color: var(--muted);">Explore manuscripts, journals, and the architect's notes.</p>
    </div>

    <div class="toggle-container reveal" id="toggle-container">
        <button class="toggle-btn active" onclick="switchPane('blogs')">Journals</button>
        <button class="toggle-btn" onclick="switchPane('articles')">Manuscripts</button>
    </div>

    <div class="content-area">
        <!-- Journals -->
        <div class="content-pane active" id="pane-blogs">
            <div class="article-card reveal">
                <div>
                    <div class="article-meta">Journal • May 2024</div>
                    <h3>The Architecture of Silence</h3>
                    <p class="article-excerpt">Exploring how the gaps between words define the weight of a story...</p>
                </div>
                <a href="#" class="btn-text">READ JOURNAL →</a>
            </div>
            <div class="article-card reveal">
                <div>
                    <div class="article-meta">Journal • April 2024</div>
                    <h3>Echoes of the Past</h3>
                    <p class="article-excerpt">Why nostalgia is the most powerful tool in a writer's arsenal...</p>
                </div>
                <a href="#" class="btn-text">READ JOURNAL →</a>
            </div>
        </div>

        <!-- Manuscripts -->
        <div class="content-pane" id="pane-articles">
            <div class="article-card reveal">
                <div>
                    <div class="article-meta">Manuscript • Preview</div>
                    <h3>Project: Echo (Draft 1)</h3>
                    <p class="article-excerpt">An exclusive look at the opening chapter of the upcoming thriller...</p>
                </div>
                <a href="#" class="btn-text">OPEN MANUSCRIPT →</a>
            </div>
        </div>
    </div>
</main>

<script>
    function switchPane(type) {
        const btns = document.querySelectorAll('.toggle-btn');
        const panes = document.querySelectorAll('.content-pane');
        
        btns.forEach(btn => btn.classList.remove('active'));
        panes.forEach(pane => pane.classList.remove('active'));

        if (type === 'blogs') {
            btns[0].classList.add('active');
            panes[0].classList.add('active');
        } else {
            btns[1].classList.add('active');
            panes[1].classList.add('active');
        }
    }
</script>

<?php include 'components/footer.php'; ?>
