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
    const listContainer = document.getElementById('viewContainer');
    const gridContainer = document.getElementById('gridViewContainer');

    if (listViewBtn && gridViewBtn && listContainer && gridContainer) {
        listViewBtn.addEventListener('click', function() {
            listViewBtn.classList.add('active');
            gridViewBtn.classList.remove('active');
            listContainer.style.display = 'block';
            gridContainer.style.display = 'none';
        });

        gridViewBtn.addEventListener('click', function() {
            gridViewBtn.classList.add('active');
            listViewBtn.classList.remove('active');
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
    
    document.querySelectorAll('.action-menu-btn').forEach(btn => {
        if (menuTemplate) {
            const clone = menuTemplate.content.cloneNode(true);
            btn.parentNode.insertBefore(clone, btn.nextSibling);
        }
    });

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

    // ==========================================
    // 5. DYNAMIC STATS CALCULATION (FIXED)
    // ==========================================
    function calculateDynamicStats() {
        const rows = document.querySelectorAll('.data-table tbody tr');
        
        let totalAllocations = rows.length;
        let totalAllocatedAmount = 0;
        let totalSpentAmount = 0;

        rows.forEach(row => {
            // Find the Total amount text in the table header part
            const utilHeader = row.querySelector('.util-header');
            if (utilHeader) {
                const totalText = utilHeader.innerText;
                const totalMatch = totalText.match(/\$?([\d,]+\.?\d*)/); // Extracts the number
                if (totalMatch) {
                    totalAllocatedAmount += parseFloat(totalMatch[1].replace(/,/g, ''));
                }
            }

            // Find the Spent amount text in the table footer part
            const utilFooter = row.querySelector('.util-footer');
            if (utilFooter) {
                // The first span inside util-footer contains the "Spent" text
                const spentSpan = utilFooter.querySelector('span:first-child');
                if (spentSpan) {
                    const spentText = spentSpan.innerText;
                    const spentMatch = spentText.match(/\$?([\d,]+\.?\d*)/);
                    if (spentMatch) {
                        totalSpentAmount += parseFloat(spentMatch[1].replace(/,/g, ''));
                    }
                }
            }
        });

        // Calculate Remaining & Percentage
        const remainingAmount = totalAllocatedAmount - totalSpentAmount;
        const spendingPercentage = totalAllocatedAmount > 0 ? ((totalSpentAmount / totalAllocatedAmount) * 100).toFixed(1) : 0;

        // Format Numbers to Currency
        const formatCurrency = (num) => {
            return '$' + num.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
        };

        // Update Top Cards
        const countEl = document.getElementById('totalAllocationsCount');
        if (countEl) countEl.textContent = totalAllocations;
        
        const allocEl = document.getElementById('totalAllocatedAmount');
        if (allocEl) allocEl.textContent = formatCurrency(totalAllocatedAmount);
        
        const spentEl = document.getElementById('totalSpentAmount');
        if (spentEl) spentEl.textContent = formatCurrency(totalSpentAmount);
        
        const spentTextEl = document.getElementById('spentText');
        if (spentTextEl) spentTextEl.textContent = `Spent: ${formatCurrency(totalSpentAmount)}`;
        
        const remainEl = document.getElementById('remainingText');
        if (remainEl) remainEl.textContent = `Remaining: ${formatCurrency(remainingAmount)}`;
        
        const percEl = document.getElementById('spendingPercentage');
        if (percEl) percEl.textContent = `${spendingPercentage}%`;
        
        const barEl = document.getElementById('spendingProgressBar');
        if (barEl) barEl.style.width = `${spendingPercentage}%`;
    }

    // Run calculation on page load
    calculateDynamicStats();
});