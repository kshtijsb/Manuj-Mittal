<?php 
require_once 'includes/data.php'; 
$page_title = "The Inkwell | Manuj Mittal";
include 'components/header.php'; 
?>

<style>
    .inkwell-hero { text-align: center; padding: 10vh 0; border-bottom: 1px solid rgba(0,0,0,0.03); margin-bottom: 5vh; }
    .inkwell-hero h1 { font-size: 4.5rem; margin-bottom: 1.5rem; }
    
    .toggle-container { display: flex; justify-content: center; gap: 2rem; margin-bottom: 8vh; position: relative; }
    .toggle-btn { padding: 1rem 3rem; border-radius: 50px; border: 1px solid rgba(0,0,0,0.1); background: white; font-weight: 800; letter-spacing: 2px; text-transform: uppercase; font-size: 0.7rem; transition: 0.5s; }
    .toggle-btn.active { background: var(--blue); color: white; border-color: var(--blue); box-shadow: 0 10px 30px rgba(0,51,102,0.2); }

    .content-area { position: relative; min-height: 60vh; }
    .content-pane { display: none; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 3rem; animation: fadeIn 0.8s forwards; }
    .content-pane.active { display: grid; }

    .article-card { background: white; padding: 3rem; border-radius: 15px; border: 1px solid rgba(0,0,0,0.03); transition: 0.5s; display: flex; flex-direction: column; justify-content: space-between; }
    .article-card:hover { transform: translateY(-10px); box-shadow: 0 30px 60px rgba(0,0,0,0.03); }
    .article-meta { font-size: 0.6rem; font-weight: 800; color: var(--gold); text-transform: uppercase; letter-spacing: 2px; margin-bottom: 1rem; }
    .article-card h3 { font-size: 2rem; margin-bottom: 1.5rem; color: var(--blue); }
    .article-excerpt { font-size: 1rem; color: var(--muted); margin-bottom: 2.5rem; font-weight: 300; }

    @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }

    @media (max-width: 768px) {
        .inkwell-hero { padding: 6vh 0; }
        .inkwell-hero h1 { font-size: 3rem; }
        .toggle-container { flex-direction: column; gap: 1rem; padding: 0 1rem; }
        .toggle-btn { width: 100%; padding: 0.8rem 2rem; }
        .content-pane { grid-template-columns: 1fr; gap: 2rem; }
        .article-card { padding: 2rem 1.5rem; }
        .article-card h3 { font-size: 1.6rem; }
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
