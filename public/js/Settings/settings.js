document.addEventListener('DOMContentLoaded', function () {
    
    // ==========================================
    // 0. PENDING CHANGES STATE
    // ==========================================
    let pendingChanges = {};

    function markAsDirty() {
        const saveBtn = document.getElementById('brandSave');
        if (saveBtn) saveBtn.textContent = 'Save Changes *'; 
    }

    function clearDirty() {
        const saveBtn = document.getElementById('brandSave');
        if (saveBtn) saveBtn.textContent = 'Save Changes';
    }

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
    // 2. Inner Tabs
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
    
    const savedThemeName = localStorage.getItem('apexbooks-theme-color');
    if (savedThemeName && savedThemeName !== 'custom') {
        colorBoxes.forEach(b => {
            if (b.dataset.theme === savedThemeName) b.classList.add('active');
            else b.classList.remove('active');
        });
    }

    colorBoxes.forEach(box => {
        box.addEventListener('click', function() {
            colorBoxes.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            const themeName = this.dataset.theme;
            pendingChanges.color = themeName;
            pendingChanges.isCustom = false;
            markAsDirty();

            // Preview: Apply CSS variables immediately
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
            
            // Added: Update custom color preview and input to match the selected preset
            const customText = document.querySelector('.custom-color-input');
            const customPreview = document.querySelector('.custom-color-preview');
            if (customText) customText.value = selected.main;
            if (customPreview) customPreview.style.backgroundColor = selected.main;
        });
    });

    // ==========================================
    // 4. Custom Color Input (Updated for new HTML)
    // ==========================================
    // Target the new elements based on the updated HTML structure
    const applyCustomBtn = document.querySelector('.custom-color-row .btn-primary');
    const customText = document.querySelector('.custom-color-input');
    const customPreview = document.querySelector('.custom-color-preview');

    const savedCustomHex = localStorage.getItem('apexbooks-custom-color');
    
    // Load saved custom color on page load
    if (savedThemeName === 'custom' && savedCustomHex) {
        colorBoxes.forEach(b => b.classList.remove('active'));
        if (customText) customText.value = savedCustomHex;
        if (customPreview) customPreview.style.backgroundColor = savedCustomHex;
    }

    if (applyCustomBtn && customText && customPreview) {
        applyCustomBtn.addEventListener('click', function(e) {
            e.preventDefault(); // Prevent form submission if inside a form
            let hex = customText.value.trim();
            
            // Basic validation to ensure it's a hex code
            if (hex && !hex.startsWith('#')) hex = '#' + hex;
            if (!/^#[0-9A-F]{6}$/i.test(hex)) {
                alert('Please enter a valid 6-digit HEX code (e.g., #FF0000)');
                return;
            }
            
            // 1. Update Pending Changes
            pendingChanges.color = 'custom';
            pendingChanges.isCustom = true;
            pendingChanges.customHex = hex;
            markAsDirty();

            // 2. Live Preview: Apply variables instantly
            document.documentElement.style.setProperty('--primary', hex);
            document.documentElement.style.setProperty('--accent-color', hex);
            document.documentElement.style.setProperty('--primary-hover', hex);
            // Create a light version by appending 20 (12.5% opacity) to the hex code
            document.documentElement.style.setProperty('--primary-light', hex + '20');

            // 3. Update UI Elements
            customPreview.style.backgroundColor = hex;
            customText.value = hex; // Ensure it has the # prefix
            colorBoxes.forEach(b => b.classList.remove('active')); // Deselect presets
        });

        // Live update the preview box as the user types
        customText.addEventListener('input', function() {
            let hex = this.value.trim();
            if (hex && !hex.startsWith('#')) hex = '#' + hex;
            if (/^#[0-9A-F]{6}$/i.test(hex)) {
                customPreview.style.backgroundColor = hex;
            }
        });
    }

    // ==========================================
    // 5. Font Selection
    // ==========================================
    const fontButtons = document.querySelectorAll('.font-row .font-btn'); 
    
    const savedFontName = localStorage.getItem('apexbooks-font');
    if (savedFontName) {
        fontButtons.forEach(btn => {
            if (btn.getAttribute('data-font') === savedFontName) btn.classList.add('active');
            else btn.classList.remove('active');
        });
    }

    fontButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            fontButtons.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            const fontName = this.dataset.font;
            pendingChanges.font = fontName;
            markAsDirty();
            
            // Preview: Apply font immediately
            document.documentElement.style.setProperty('--app-font', fontName);
            document.body.style.fontFamily = fontName;
        });
    });

    // ==========================================
    // 6. Appearance Mode Toggle
    // ==========================================
    const settingsThemeBtn = document.getElementById('settingsThemeToggle');
    const settingsThemeText = document.getElementById('settingsThemeText');
    const settingsIconSun = document.getElementById('settingsIconSun');
    const settingsIconMoon = document.getElementById('settingsIconMoon');

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

    updateSettingsButtonUI();

    if (settingsThemeBtn) {
        settingsThemeBtn.addEventListener('click', function() {
            const currentTheme = document.documentElement.getAttribute('data-theme') || 'light';
            const nextTheme = currentTheme === 'dark' ? 'light' : 'dark';
            
            pendingChanges.theme = nextTheme;
            markAsDirty();

            // Preview: Toggle theme immediately
            if (typeof window.toggleSiteTheme === 'function') {
                window.toggleSiteTheme();
            }
            updateSettingsButtonUI();
        });
    }

    // ==========================================
    // 7. Title Text Input
    // ==========================================
    const titleInput = document.getElementById('titleText');
    
    const savedTitle = localStorage.getItem('apexbooks-title');
    if (savedTitle && titleInput) {
        titleInput.value = savedTitle;
    }

    if (titleInput) {
        titleInput.addEventListener('input', function() {
            // Store pending only. Do NOT update navbar here.
            pendingChanges.title = this.value.trim();
            markAsDirty();
        });
    }

    // ==========================================
    // 8. LOGO UPLOAD (Preview & Pending)
    // ==========================================
    const lgChoose = document.getElementById('lgChoose');
    const lgDelete = document.getElementById('lgDelete');
    const lgFile = document.getElementById('lgFile');
    const logoPreviewImg = document.getElementById('logoPreviewImg');
    const logoEmptyText = document.getElementById('logoEmptyText');

    // Load saved logo on page load
    const savedLogo = localStorage.getItem('apexbooks-logo');
    if (savedLogo) {
        logoPreviewImg.src = savedLogo;
        logoPreviewImg.style.display = 'block';
        logoEmptyText.style.display = 'none';
        document.querySelectorAll('.db-logo-icon, .logo-icon, .footer-logo-icon').forEach(el => {
            el.innerHTML = `<img src="${savedLogo}" style="width:100%; height:100%; object-fit:contain; border-radius:inherit;">`;
        });
    }

    if (lgChoose) {
        lgChoose.addEventListener('click', () => lgFile.click());
    }

    if (lgFile) {
        lgFile.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    const base64 = event.target.result;
                    
                    // Store pending
                    pendingChanges.logo = base64;
                    markAsDirty();

                    // Preview instantly in the box
                    logoPreviewImg.src = base64;
                    logoPreviewImg.style.display = 'block';
                    logoEmptyText.style.display = 'none';
                    
                    // Preview instantly in the navbar
                    document.querySelectorAll('.db-logo-icon, .logo-icon, .footer-logo-icon').forEach(el => {
                        el.innerHTML = `<img src="${base64}" style="width:100%; height:100%; object-fit:contain; border-radius:inherit;">`;
                    });
                };
                reader.readAsDataURL(file);
            }
        });
    }

    if (lgDelete) {
        lgDelete.addEventListener('click', function() {
            // Store pending delete
            pendingChanges.logo = null;
            markAsDirty();

            // Preview instantly in the box
            logoPreviewImg.src = '';
            logoPreviewImg.style.display = 'none';
            logoEmptyText.style.display = 'block';
            lgFile.value = '';

            // Preview instantly in the navbar (reset to default SVG)
            document.querySelectorAll('.db-logo-icon, .logo-icon, .footer-logo-icon').forEach(el => {
                el.innerHTML = `<svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M12 2L21 7.5L12 13L3 7.5L12 2Z" fill="#FFFFFF"/></svg>`;
            });
        });
    }

    // ==========================================
    // 9. SAVE CHANGES BUTTON (Commit Everything)
    // ==========================================
    const brandSaveBtn = document.getElementById('brandSave');

    if (brandSaveBtn) {
        brandSaveBtn.addEventListener('click', function() {
            
            // Commit Color
            if (pendingChanges.color) {
                localStorage.setItem('apexbooks-theme-color', pendingChanges.color);
                if (pendingChanges.isCustom && pendingChanges.customHex) {
                    localStorage.setItem('apexbooks-custom-color', pendingChanges.customHex);
                }
            }

            // Commit Font
            if (pendingChanges.font) {
                localStorage.setItem('apexbooks-font', pendingChanges.font);
            }

            // Commit Title
            if (pendingChanges.title !== undefined) {
                const newTitle = pendingChanges.title || 'Apexbooks';
                localStorage.setItem('apexbooks-title', newTitle);
                
                document.querySelectorAll('.site-logo-text').forEach(el => {
                    el.textContent = newTitle;
                });

                if (document.title.includes('Apexbooks')) {
                    document.title = document.title.replace('Apexbooks', newTitle);
                }
            }

            // Commit Theme
            if (pendingChanges.theme) {
                localStorage.setItem('apexbooks-theme', pendingChanges.theme);
            }

            // Commit Logo
            if (pendingChanges.logo !== undefined) {
                if (pendingChanges.logo === null) {
                    localStorage.removeItem('apexbooks-logo');
                } else {
                    localStorage.setItem('apexbooks-logo', pendingChanges.logo);
                }
            }

            // Clear Pending
            pendingChanges = {}; 

            // Button Feedback
            brandSaveBtn.textContent = '✅ Saved!';
            
            setTimeout(() => {
                clearDirty();
            }, 1000);
        });
    }
        // ==========================================
    // 10. GENERIC FORM HANDLERS WITH PATTERN VALIDATION
    // ==========================================
    
    // RegEx patterns
    const patterns = {
        email: /^[A-Za-z0-9._%+\-]+@[A-Za-z0-9\-]+(\.[A-Za-z0-9\-]+)*\.[A-Za-z]{2,}$/,
        phone: /^(\+92|0)3\d{9}$/, // Pakistani mobile format (03001234567)
        name: /^[A-Za-z0-9][A-Za-z0-9 .,&'()\-]*$/, // Letters, numbers, basic punctuation
        url: /^(https?:\/\/)?(www\.)?[A-Za-z0-9\-]+(\.[A-Za-z0-9\-]+)*\.[A-Za-z]{2,}(\/\S*)?$/
    };

    // Function to validate a single input
    function validateInput(input) {
        const errorMsg = input.parentElement.querySelector('.field-error');
        const rule = input.getAttribute('data-validation');
        const value = input.value.trim();
        
        // Reset state
        input.style.borderColor = '';
        if (errorMsg) {
            errorMsg.style.display = 'none';
            errorMsg.textContent = '';
        }

        // 1. Check required
        if (input.hasAttribute('required') && value === '') {
            input.style.borderColor = '#EF4444';
            if (errorMsg) {
                errorMsg.style.display = 'block';
                errorMsg.textContent = 'This field is required';
            }
            return false;
        }

        // 2. Check pattern (only if not empty)
        if (value !== '' && rule && patterns[rule]) {
            if (!patterns[rule].test(value)) {
                input.style.borderColor = '#EF4444';
                if (errorMsg) {
                    errorMsg.style.display = 'block';
                    
                    // Custom messages per rule
                    if (rule === 'email') errorMsg.textContent = 'Invalid email format (e.g. name@example.com)';
                    if (rule === 'phone') errorMsg.textContent = 'Invalid phone format (e.g. There should be 11 digits starting with 03)';
                    if (rule === 'name') errorMsg.textContent = 'Can only contain letters, numbers, and basic punctuation';
                    if (rule === 'url') errorMsg.textContent = 'Invalid URL (e.g. www.example.com)';
                }
                return false;
            }
        }

        return true; // Valid
    }

    // Add live validation on inputs
    document.querySelectorAll('input[data-validation]').forEach(input => {
        input.addEventListener('input', function() {
            validateInput(this);
        });
    });

    // Save Form function (blocks if invalid)
    function saveFormData(formId, storageKey) {
        const form = document.getElementById(formId);
        if (!form) return false;

        let isValid = true;
        
        // Validate all inputs in the form
        form.querySelectorAll('input[data-validation]').forEach(input => {
            if (!validateInput(input)) {
                isValid = false;
            }
        });

        if (!isValid) {
            return false; // Stop save
        }

        // Save to localStorage
        const formData = new FormData(form);
        const data = {};
        formData.forEach((value, key) => {
            data[key] = value;
        });
        localStorage.setItem(storageKey, JSON.stringify(data));
        
        return true; // Save successful
    }

    // Load Form data (unchanged)
    function loadFormData(formId, storageKey) {
        const form = document.getElementById(formId);
        if (!form) return;
        const savedData = localStorage.getItem(storageKey);
        if (savedData) {
            const data = JSON.parse(savedData);
            Object.keys(data).forEach(key => {
                const input = form.elements[key];
                if (input) input.value = data[key];
            });
        }
    }

    // Load saved data on page load
    loadFormData('systemSettingsForm', 'apexbooks-system-settings');
    loadFormData('companySettingsForm', 'apexbooks-company-settings');
    loadFormData('contactSettingsForm', 'apexbooks-contact-settings');

    // Handle System Settings Save (No complex validation needed here usually)
    const systemForm = document.getElementById('systemSettingsForm');
    if (systemForm) {
        systemForm.addEventListener('submit', function(e) {
            e.preventDefault();
            // Simple save for System
            const formData = new FormData(systemForm);
            const data = {};
            formData.forEach((value, key) => data[key] = value);
            localStorage.setItem('apexbooks-system-settings', JSON.stringify(data));
            
            const btn = document.getElementById('systemSaveBtn');
            const originalText = btn.textContent;
            btn.textContent = '✅ Saved!';
            setTimeout(() => btn.textContent = originalText, 1000);
        });
    }

    // Handle Company Settings Save
    const companyForm = document.getElementById('companySettingsForm');
    if (companyForm) {
        companyForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const success = saveFormData('companySettingsForm', 'apexbooks-company-settings');
            
            if (success) {
                const btn = document.getElementById('companySaveBtn');
                const originalText = btn.textContent;
                btn.textContent = '✅ Saved!';
                setTimeout(() => btn.textContent = originalText, 1000);
            }
        });
    }

    // Handle Contact Settings Save
    const contactForm = document.getElementById('contactSettingsForm');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const success = saveFormData('contactSettingsForm', 'apexbooks-contact-settings');
            
            if (success) {
                const btn = document.getElementById('contactSaveBtn');
                const originalText = btn.textContent;
                btn.textContent = '✅ Saved!';
                setTimeout(() => btn.textContent = originalText, 1000);
            }
        });
    }
});