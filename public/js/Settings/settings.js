document.addEventListener('DOMContentLoaded', function () {
    
    // ==========================================
    // 1. Left Menu Navigation
    // ==========================================
    const menuLinks = document.querySelectorAll('.settings-link');
    const sections = document.querySelectorAll('.section');

    menuLinks.forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            menuLinks.forEach(l => l.classList.remove('active'));
            sections.forEach(s => s.classList.remove('active'));

            this.classList.add('active');
            document.getElementById(this.dataset.section).classList.add('active');
        });
    });

    // ==========================================
    // 2. Inner Tabs (Font, Text, Theme, Logo)
    // ==========================================
    const tabButtons = document.querySelectorAll('.tab-btn');
    const tabPanels = document.querySelectorAll('.tab-panel');

    tabButtons.forEach(button => {
        button.addEventListener('click', function () {
            tabButtons.forEach(b => b.classList.remove('active'));
            tabPanels.forEach(p => p.classList.remove('active'));

            this.classList.add('active');
            document.getElementById(this.dataset.tab).classList.add('active');
        });
    });

    // ==========================================
    // 3. Theme Color Selection (Presets)
    // ==========================================
    const colorBoxes = document.querySelectorAll('.color-box[data-theme]');
    
    colorBoxes.forEach(box => {
        box.addEventListener('click', function() {
            colorBoxes.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            const themeName = this.dataset.theme;
            localStorage.setItem('apexbooks-theme-color', themeName);
            
            const colorMap = {
                'purple': { main: '#7E6BB5', light: '#F0EDF7', hover: '#6A589D' },
                'ocean':  { main: '#3B82F6', light: '#EFF6FF', hover: '#2563EB' },
                'emerald':{ main: '#10B981', light: '#ECFDF5', hover: '#059669' },
                'sunset': { main: '#F59E0B', light: '#FFFBEB', hover: '#D97706' },
                'rose':   { main: '#F43F5E', light: '#FFF1F2', hover: '#E11D48' },
                'sky':    { main: '#0EA5E9', light: '#F0F9FF', hover: '#0284C7' }
            };
            const selected = colorMap[themeName];
            document.documentElement.style.setProperty('--primary', selected.main);
            document.documentElement.style.setProperty('--accent-color', selected.main);
            document.documentElement.style.setProperty('--primary-hover', selected.hover);
            document.documentElement.style.setProperty('--primary-light', selected.light);
        });
    });

        // ==========================================
    // 4. Custom Color Input
    // ==========================================

    const applyCustomBtn = document.getElementById('applyCustomColor');
    const customText = document.getElementById('customColorText');
    const customPicker = document.getElementById('customColorInput');

    // Check if the current saved theme is "custom"
    const savedThemeName = localStorage.getItem('apexbooks-theme-color');
    const savedCustomHex = localStorage.getItem('apexbooks-custom-color');

    // If theme is custom, remove the active state from all preset color boxes on load
    if (savedThemeName === 'custom' && savedCustomHex) {
        colorBoxes.forEach(b => b.classList.remove('active')); // Remove purple highlight
        if (customText) customText.value = savedCustomHex;
        if (customPicker) customPicker.value = savedCustomHex;
    }

    if (applyCustomBtn) {
        applyCustomBtn.addEventListener('click', function() {
            let hex = customText.value.trim();
            if (hex && !hex.startsWith('#')) hex = '#' + hex;
            
            // Apply the custom color variables
            document.documentElement.style.setProperty('--primary', hex);
            document.documentElement.style.setProperty('--accent-color', hex);
            document.documentElement.style.setProperty('--primary-hover', hex);
            document.documentElement.style.setProperty('--primary-light', hex + '20'); // Hex transparency

            // Save to localStorage
            localStorage.setItem('apexbooks-theme-color', 'custom');
            localStorage.setItem('apexbooks-custom-color', hex);

            // Ensure the color picker matches the new hex
            if (customPicker) customPicker.value = hex;

            // Remove the active state from ALL preset color boxes so none are highlighted
            colorBoxes.forEach(b => b.classList.remove('active'));
        });
    }

    // Sync the custom picker input with the text input
    if (customPicker && customText) {
        customPicker.addEventListener('input', function() {
            customText.value = this.value;
        });

        customText.addEventListener('input', function() {
            const hex = this.value.trim();
            if (/^#[0-9A-F]{6}$/i.test(hex)) {
                customPicker.value = hex;
            }
        });
    }

        // ==========================================
    // 5. Font Selection
    // ==========================================
    // Look specifically for font buttons inside the .font-row
    const fontButtons = document.querySelectorAll('.font-row .font-btn'); 
    
    fontButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            fontButtons.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            const fontName = this.dataset.font;
            localStorage.setItem('apexbooks-font', fontName);
            
            document.documentElement.style.setProperty('--app-font', fontName);
            document.body.style.fontFamily = fontName;
        });
    });

    // ==========================================
    // 6. Appearance Mode Toggle (Settings Page)
    // ==========================================
    const settingsThemeBtn = document.getElementById('settingsThemeToggle');
    const settingsThemeText = document.getElementById('settingsThemeText');
    const settingsIconSun = document.getElementById('settingsIconSun');
    const settingsIconMoon = document.getElementById('settingsIconMoon');

    // Function to update the Settings button's UI (reads directly from HTML tag)
    function updateSettingsButtonUI() {
        if (!settingsThemeText) return;
        
        const currentTheme = document.documentElement.getAttribute('data-theme') || 'light';

        if (currentTheme === 'dark') {
            settingsThemeText.textContent = 'Switch to Light Mode';
            settingsIconSun.style.display = 'block';
            settingsIconMoon.style.display = 'none';
        } else {
            settingsThemeText.textContent = 'Switch to Dark Mode';
            settingsIconSun.style.display = 'none';
            settingsIconMoon.style.display = 'block';
        }
    }

    // Set initial state on load
    updateSettingsButtonUI();

    // Wire up the click event
    if (settingsThemeBtn) {
        settingsThemeBtn.addEventListener('click', function() {
            // 1. Trigger the global theme toggle (changes data-theme on html tag)
            if (typeof window.toggleSiteTheme === 'function') {
                window.toggleSiteTheme();
            }
            
            // 2. Immediately update the button UI
            updateSettingsButtonUI();
        });
    }
});

    // ==========================================
    // 7. Load Saved Font on Page Load
    // ==========================================
    // Check localStorage for the saved font
    const savedFontName = localStorage.getItem('apexbooks-font');
    
    if (savedFontName) {
        // Find all font buttons (using the specific selector we set up earlier)
        const fontButtons = document.querySelectorAll('.font-row .font-btn');
        
        fontButtons.forEach(btn => {
            // Remove 'active' from all buttons
            btn.classList.remove('active');
            
            // Add 'active' to the one that matches the saved font
            if (btn.getAttribute('data-font') === savedFontName) {
                btn.classList.add('active');
            }
        });
    }