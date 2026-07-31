const fs = require('fs');
const path = require('path');

const map = {
    '\\[#0048AE\\]': 'raksa-primary',
    '\\[#003B8F\\]': 'raksa-primary-hover',
    '\\[#001D48\\]': 'raksa-secondary',
    '\\[#FF8A00\\]': 'raksa-accent',
    '\\[#191C1E\\]': 'raksa-text',
    '\\[#424654\\]': 'raksa-neutral',
    '\\[#C2C6D6\\]': 'raksa-border',
    '\\[#F2F4F7\\]': 'raksa-background',
    '\\[#F7F9FC\\]': 'raksa-surface',
    '\\[#DAE2FF\\]': 'raksa-primary-light',
    '\\[#FFF3E0\\]': 'raksa-warning',
    '\\[#ECEEF1\\]': 'raksa-surface-alt',
    '\\[#E5E3DF\\]': 'raksa-neutral-200',
    '\\[#D8D6D1\\]': 'raksa-neutral-300',
    '\\[#1A73E8\\]': 'raksa-info',
    '\\[#FFDDB8\\]': 'raksa-accent-light',
    '\\[#A65300\\]': 'raksa-accent-dark'
};

function replaceInDir(dir) {
    if (!fs.existsSync(dir)) return;
    const files = fs.readdirSync(dir);
    for (const file of files) {
        const fullPath = path.join(dir, file);
        if (fs.statSync(fullPath).isDirectory()) {
            replaceInDir(fullPath);
        } else if (fullPath.endsWith('.blade.php')) {
            let content = fs.readFileSync(fullPath, 'utf8');
            let modified = false;
            for (const [hex, cls] of Object.entries(map)) {
                const regex = new RegExp(hex, 'gi');
                if (regex.test(content)) {
                    content = content.replace(regex, cls);
                    modified = true;
                }
            }
            if (modified) {
                fs.writeFileSync(fullPath, content, 'utf8');
                console.log(`Updated ${fullPath}`);
            }
        }
    }
}

replaceInDir('d:/User/Documents/KP/SISTEM RAKSA/Raksa/resources/views/landing');
replaceInDir('d:/User/Documents/KP/SISTEM RAKSA/Raksa/resources/views/components/raksa/landing');
