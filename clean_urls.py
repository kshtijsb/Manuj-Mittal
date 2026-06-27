import os, re

for root, dirs, files in os.walk('.'):
    # Ignore vendor and hidden directories
    if 'vendor' in root or '/.' in root:
        continue
    for f in files:
        if f.endswith('.php'):
            path = os.path.join(root, f)
            with open(path, 'r', encoding='utf-8') as file:
                content = file.read()
            
            # Replace href="filename.php" with href="filename"
            # Replace href="filename.php#anchor" with href="filename#anchor"
            # Ignore absolute URLs (http://)
            new_content = re.sub(r'href="(?!http)([^"]+)\.php(#.*)?"', r'href="\1\2"', content)
            
            if new_content != content:
                with open(path, 'w', encoding='utf-8') as file:
                    file.write(new_content)
                print(f"Updated {path}")
