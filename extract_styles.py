import re

def extract_styles(filepath, css_filepath):
    with open(filepath, 'r') as f:
        content = f.read()
    
    # Find all <style> blocks
    styles = re.findall(r'<style>(.*?)</style>', content, re.DOTALL)
    
    # Remove all <style> blocks from HTML
    new_content = re.sub(r'<style>.*?</style>', '', content, flags=re.DOTALL)
    
    with open(filepath, 'w') as f:
        f.write(new_content)
        
    # Append styles to CSS
    if styles:
        with open(css_filepath, 'a') as f:
            f.write('\n\n/* --- Extracted from ' + filepath.split('/')[-1] + ' --- */\n')
            for style in styles:
                f.write(style + '\n')
                
extract_styles('index.php', 'style.css')
extract_styles('components/header.php', 'style.css')
extract_styles('components/footer.php', 'style.css')
