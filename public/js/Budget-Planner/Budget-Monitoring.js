document.addEventListener('DOMContentLoaded', function () {
    
    // ==========================================
    // 1. TOGGLE FILTER PANEL
    // ==========================================
    const filterToggle = document.getElementById('filterToggle');
    const filterPanel = document.getElementById('filterPanel');

    if (filterToggle && filterPanel) {
        filterToggle.addEventListener('click', function() {
            filterPanel.classList.toggle('show');
        });
    }

        // ==========================================
    // 2. VIEW TOGGLE (List / Grid)
    // ==========================================
    const listViewBtn = document.getElementById('listViewBtn');
    const gridViewBtn = document.getElementById('gridViewBtn');
    const listContainer = document.getElementById('listViewContainer');
    const gridContainer = document.getElementById('gridViewContainer');

    if (listViewBtn && gridViewBtn && listContainer && gridContainer) {
        
        listViewBtn.addEventListener('click', function() {
            listViewBtn.classList.add('active');
            gridViewBtn.classList.remove('active');
            
            // Show List, Hide Grid
            listContainer.style.display = 'block';
            gridContainer.style.display = 'none';
        });

        gridViewBtn.addEventListener('click', function() {
            gridViewBtn.classList.add('active');
            listViewBtn.classList.remove('active');
            
            // Hide List, Show Grid
            listContainer.style.display = 'none';
            gridContainer.style.display = 'grid';
        });
    }

    // ==========================================
    // 3. CUSTOM DROPDOWNS
    // ==========================================
    const dropdowns = document.querySelectorAll('.custom-dropdown');

    dropdowns.forEach(dropdown => {
        const btn = dropdown.querySelector('.custom-dropdown-btn');
        
        if(btn) {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                document.querySelectorAll('.custom-dropdown').forEach(d => {
                    if (d !== dropdown) d.classList.remove('open');
                });
                dropdown.classList.toggle('open');
            });
        }

        const items = dropdown.querySelectorAll('.custom-dropdown-item');
        items.forEach(item => {
            item.addEventListener('click', function() {
                const labelSpan = btn.querySelector('span');
                if(labelSpan) labelSpan.textContent = this.textContent;
                
                items.forEach(i => i.classList.remove('active'));
                this.classList.add('active');
                dropdown.classList.remove('open');
            });
        });
    });

    document.addEventListener('click', function(e) {
        if (!e.target.closest('.custom-dropdown')) {
            document.querySelectorAll('.custom-dropdown').forEach(d => d.classList.remove('open'));
        }
    });

    // ==========================================
    // 4. 3-DOT ACTION MENU INJECTION & TOGGLE
    // ==========================================
    const menuTemplate = document.getElementById('action-menu-template');
    
    // Inject menu
    document.querySelectorAll('.action-menu-btn').forEach(btn => {
        if (menuTemplate) {
            const clone = menuTemplate.content.cloneNode(true);
            btn.parentNode.insertBefore(clone, btn.nextSibling);
        }
    });

    // Toggle Logic
    document.addEventListener('click', function(e) {
        const menuBtn = e.target.closest('.action-menu-btn');
        
        if (menuBtn) {
            e.stopPropagation();
            const dropdown = menuBtn.nextElementSibling;
            
            document.querySelectorAll('.action-dropdown').forEach(menu => {
                if (menu !== dropdown) menu.style.display = 'none';
            });

            if (dropdown && dropdown.classList.contains('action-dropdown')) {
                dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
            }
        } else {
            document.querySelectorAll('.action-dropdown').forEach(menu => {
                menu.style.display = 'none';
            });
        }
    });
});