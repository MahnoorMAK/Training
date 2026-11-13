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
        
        // Switch to List View
        listViewBtn.addEventListener('click', function() {
            listViewBtn.classList.add('active');
            gridViewBtn.classList.remove('active');
            
            listContainer.style.display = 'block'; // Show table
            gridContainer.style.display = 'none';  // Hide grid
        });

        // Switch to Grid View
        gridViewBtn.addEventListener('click', function() {
            gridViewBtn.classList.add('active');
            listViewBtn.classList.remove('active');
            
            listContainer.style.display = 'none'; // Hide table
            gridContainer.style.display = 'grid'; // Show grid
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
                // Close other dropdowns
                document.querySelectorAll('.custom-dropdown').forEach(d => {
                    if (d !== dropdown) d.classList.remove('open');
                });
                dropdown.classList.toggle('open');
            });
        }

        // Handle option selection
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

    // Close dropdowns when clicking outside
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.custom-dropdown')) {
            document.querySelectorAll('.custom-dropdown').forEach(d => d.classList.remove('open'));
        }
    });

    // ==========================================
    // 4. 3-DOT ACTION MENU INJECTION & TOGGLE
    // ==========================================
    const menuTemplate = document.getElementById('action-menu-template');
    
    // Inject menu into every action cell
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
            
            // Close all other action menus
            document.querySelectorAll('.action-dropdown').forEach(menu => {
                if (menu !== dropdown) menu.style.display = 'none';
            });

            // Toggle current
            if (dropdown && dropdown.classList.contains('action-dropdown')) {
                dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
            }
        } else {
            // Clicking outside closes all
            document.querySelectorAll('.action-dropdown').forEach(menu => {
                menu.style.display = 'none';
            });
        }
    });

    // ==========================================
    // 5. DYNAMIC STATS CALCULATION
    // ==========================================
    function calculateDynamicStats() {
        const rows = document.querySelectorAll('.data-table tbody tr');
        
        let totalAllocations = rows.length;
        let totalAllocatedAmount = 0;
        let totalSpentAmount = 0;

        rows.forEach(row => {
            // Extract Total from "Total: $20,000.00"
            const totalText = row.querySelector('.util-header span:first-child').innerText;
            const totalMatch = totalText.match(/\$?([\d,]+\.?\d*)/);
            if (totalMatch) {
                totalAllocatedAmount += parseFloat(totalMatch[1].replace(/,/g, ''));
            }

            // Extract Spent from "Spent: $5,000.00"
            const spentText = row.querySelector('.util-footer span:first-child').innerText;
            const spentMatch = spentText.match(/\$?([\d,]+\.?\d*)/);
            if (spentMatch) {
                totalSpentAmount += parseFloat(spentMatch[1].replace(/,/g, ''));
            }
        });

        // Calculate Remaining & Percentage
        const remainingAmount = totalAllocatedAmount - totalSpentAmount;
        const spendingPercentage = totalAllocatedAmount > 0 ? ((totalSpentAmount / totalAllocatedAmount) * 100).toFixed(1) : 0;

        // Format Numbers to Currency
        const formatCurrency = (num) => {
            return '$' + num.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
        };

        // Update DOM Elements
        document.getElementById('totalAllocationsCount').textContent = totalAllocations;
        document.getElementById('totalAllocatedAmount').textContent = formatCurrency(totalAllocatedAmount);
        
        document.getElementById('totalSpentAmount').textContent = formatCurrency(totalSpentAmount);
        document.getElementById('spentText').textContent = `Spent: ${formatCurrency(totalSpentAmount)}`;
        document.getElementById('remainingText').textContent = `Remaining: ${formatCurrency(remainingAmount)}`;
        
        document.getElementById('spendingPercentage').textContent = `${spendingPercentage}%`;
        document.getElementById('spendingProgressBar').style.width = `${spendingPercentage}%`;
    }

    // Run calculation on page load
    calculateDynamicStats();
});