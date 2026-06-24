import os
import re
import urllib.parse

# Mapping of folder names to alt text
folders = {
    "Early life and family": "Early Life",
    "Education in India": "Education",
    "Professional Journey  India": "Professional",
    "Rise in Rotaract": "Rotaract",
    "Education in the US": "Education US",
    "Rise in Rotary": "Rotary",
    "Professional Journey in the US": "Professional US",
    "Vision | Awards & Recognition.": "Awards"
}

with open('index.php', 'r', encoding='utf-8') as f:
    content = f.read()

for folder, alt_text in folders.items():
    folder_path = os.path.join('assets', folder)
    if os.path.exists(folder_path):
        # get image files
        valid_exts = {'.jpg', '.jpeg', '.png', '.gif'}
        images = [f for f in os.listdir(folder_path) if os.path.splitext(f)[1].lower() in valid_exts]
        images.sort() # Sort alphabetically to maintain order
        
        # build replacement html
        img_tags = []
        for img in images:
            # url encode the folder and image name
            encoded_folder = urllib.parse.quote(folder)
            encoded_img = urllib.parse.quote(img)
            img_tags.append(f'                                <img src="assets/{encoded_folder}/{encoded_img}" alt="{alt_text}">')
        
        replacement_html = '\n'.join(img_tags)
        
        # Regex to find the track block that contains images from this folder (or previously contained them)
        # We look for the <div class="timeline-marquee-track"> followed by anything, until </div>
        # But wait, it's safer to find the specific block for the folder.
        # Let's search for an img tag that has the encoded folder name.
        encoded_folder_search = urllib.parse.quote(folder).replace('%20', '(?:%20| )')
        # We find the track block by looking for the comment before it
        
        # Example: <!-- Milestone 1: Early Life and Family -->
        # We can find this, then the next <div class="timeline-marquee-track"> ... </div>
        
        # The regex pattern will match the milestone comment, then capture everything up to <div class="timeline-marquee-track">,
        # then replace the contents inside it.
        # But folder name might not perfectly match the milestone comment.
        pass

# Actually, let's use a simpler approach. We will just find all track divs, and replace them in order.
# The order in the HTML is:
# 1. Early Life and Family
# 2. Education in India
# 3. Professional Journey  India
# 4. Rise in Rotaract
# 5. Education in the US
# 6. Rise in Rotary
# 7. Professional Journey in the US
# 8. Vision | Awards & Recognition.

order = [
    "Early life and family",
    "Education in India",
    "Professional Journey  India",
    "Rise in Rotaract",
    "Education in the US",
    "Rise in Rotary",
    "Professional Journey in the US",
    "Vision | Awards & Recognition."
]

def replacer(match, idx=[0]):
    if idx[0] >= len(order):
        return match.group(0)
    
    folder = order[idx[0]]
    alt_text = folders[folder]
    folder_path = os.path.join('assets', folder)
    
    if os.path.exists(folder_path):
        valid_exts = {'.jpg', '.jpeg', '.png', '.gif'}
        images = [f for f in os.listdir(folder_path) if os.path.splitext(f)[1].lower() in valid_exts]
        images.sort()
        
        img_tags = []
        for img in images:
            encoded_folder = urllib.parse.quote(folder)
            encoded_img = urllib.parse.quote(img)
            img_tags.append(f'                                <img src="assets/{encoded_folder}/{encoded_img}" alt="{alt_text}">')
        
        replacement_html = '\n'.join(img_tags)
        idx[0] += 1
        return f'<div class="timeline-marquee-track">\n{replacement_html}\n                            </div>'
    else:
        idx[0] += 1
        return match.group(0)

# Replace all <div class="timeline-marquee-track"> ... </div> blocks
new_content = re.sub(r'<div class="timeline-marquee-track">.*?</div>', replacer, content, flags=re.DOTALL)

with open('index.php', 'w', encoding='utf-8') as f:
    f.write(new_content)
    
print("Updated index.php successfully.")
