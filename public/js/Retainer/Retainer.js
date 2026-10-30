/* public/js/Retainer/Retainer.js */

document.addEventListener('DOMContentLoaded', function () {
    'use strict';

    // ==========================================
    // 1. View Toggle Logic (List/Grid)
    // ==========================================
    const viewButtons = document.querySelectorAll('.view-toggle .view-btn');
    const tableWrappers = document.querySelectorAll('.retainer-table-wrapper');
    
    viewButtons.forEach(button => {
        button.addEventListener('click', function () {
            viewButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');

            const targetView = this.dataset.view;
            tableWrappers.forEach(wrapper => {
                if (targetView === 'grid') {
                    wrapper.classList.add('grid-view');
                } else {
                    wrapper.classList.remove('grid-view');
                }
            });
        });
    });

    // ==========================================
    // 2. Tab Switching Logic
    // ==========================================
    const tabButtons = document.querySelectorAll('.retainer-tabs .tab-btn');
    const tabPanels = document.querySelectorAll('.tab-panel');
    
    tabButtons.forEach(button => {
        button.addEventListener('click', function () {
            tabButtons.forEach(btn => btn.classList.remove('active'));
            tabPanels.forEach(panel => panel.classList.remove('active'));
            
            this.classList.add('active');
            const targetTab = this.dataset.tab;
            const targetPanel = document.getElementById(`tab-${targetTab}`);
            if (targetPanel) {
                targetPanel.classList.add('active');
            }
            
            // Re-apply filters and pagination when switching tabs
            updateTable();
        });
    });

    // ==========================================
    // 3. Custom Dropdown Logic (Per Page)
    // ==========================================
    const dropdown = document.getElementById('perPageDropdown');
    const dropdownBtn = document.getElementById('perPageToggle');
    const dropdownMenu = document.getElementById('perPageMenu');
    const dropdownLabel = document.getElementById('perPageLabel');
    const dropdownItems = dropdownMenu ? dropdownMenu.querySelectorAll('.custom-dropdown-item') : [];
    
    let currentLimit = 10; // Default

    if (dropdownBtn && dropdown) {
        dropdownBtn.addEventListener('click', function (e) {
            e.stopPropagation(); 
            dropdown.classList.toggle('open');
        });
    }

    document.addEventListener('click', function (e) {
        if (dropdown && !dropdown.contains(e.target)) {
            dropdown.classList.remove('open');
        }
    });

    dropdownItems.forEach(item => {
        item.addEventListener('click', function () {
            dropdownItems.forEach(i => i.classList.remove('active'));
            this.classList.add('active');

            const value = this.dataset.value;
            const text = this.textContent;
            dropdownLabel.textContent = text;
            currentLimit = parseInt(value);

            dropdown.classList.remove('open');
            updateTable();
        });
    });

    // ==========================================
    // 4. FILTER PANEL LOGIC
    // ==========================================
    const filterToggleBtn = document.getElementById('filterToggleBtn');
    const filterPanel = document.getElementById('filterPanel');
    const filterTabs = document.querySelectorAll('.filter-tab');
    const filterPanels = document.querySelectorAll('.filter-tab-panel');
    const applyFiltersBtn = document.getElementById('applyFiltersBtn');
    const clearFiltersBtn = document.getElementById('clearFiltersBtn');

    // Toggle Panel
    if (filterToggleBtn && filterPanel) {
        filterToggleBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            filterPanel.classList.toggle('open');
        });
    }

    // Close Panel
    document.addEventListener('click', function(e) {
        if (filterPanel && !filterPanel.contains(e.target) && e.target !== filterToggleBtn) {
            filterPanel.classList.remove('open');
        }
    });

    // Switch Filter Tabs
    filterTabs.forEach(tab => {
        tab.addEventListener('click', function() {
            filterTabs.forEach(t => t.classList.remove('active'));
            filterPanels.forEach(p => p.classList.remove('active'));
            
            this.classList.add('active');
            document.getElementById(`filter-${this.dataset.filterTab}`).classList.add('active');
        });
    });

    // ==========================================
    // 5. REAL DYNAMIC CUSTOM CALENDAR
    // ==========================================
    let currentCalDate = new Date(); // Tracks the visible calendar month
    let startDate = null; // Stores JS Date object
    let endDate = null;   // Stores JS Date object

    const calMonth1 = document.getElementById('calMonth1');
    const calMonth2 = document.getElementById('calMonth2');
    const calDays1 = document.getElementById('calDays1');
    const calDays2 = document.getElementById('calDays2');
    const prevBtn = document.getElementById('calPrevBtn');
    const nextBtn = document.getElementById('calNextBtn');

    const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

    // Helper to format date as YYYY-MM-DD for comparison
    function formatDate(date) {
        if (!date) return null;
        const d = new Date(date);
        let month = '' + (d.getMonth() + 1);
        let day = '' + d.getDate();
        const year = d.getFullYear();
        if (month.length < 2) month = '0' + month;
        if (day.length < 2) day = '0' + day;
        return [year, month, day].join('-');
    }

    function renderCalendar() {
        if (!calMonth1 || !calMonth2) return; // Safety check if calendar isn't on the page

        // Render Left Month
        const year1 = currentCalDate.getFullYear();
        const month1 = currentCalDate.getMonth();
        calMonth1.textContent = `${monthNames[month1]} ${year1}`;
        calDays1.innerHTML = generateDaysForMonth(year1, month1);

        // Render Right Month
        const nextMonthDate = new Date(year1, month1 + 1, 1);
        const year2 = nextMonthDate.getFullYear();
        const month2 = nextMonthDate.getMonth();
        calMonth2.textContent = `${monthNames[month2]} ${year2}`;
        calDays2.innerHTML = generateDaysForMonth(year2, month2);

        // Re-apply highlighting
        updateCalendarUI();
    }

    function generateDaysForMonth(year, month) {
        const firstDay = new Date(year, month, 1).getDay(); // 0 is Sunday
        const daysInMonth = new Date(year, month + 1, 0).getDate();
        
        // Get today's date formatted as YYYY-MM-DD
        const today = new Date();
        const todayStr = `${today.getFullYear()}-${String(today.getMonth() + 1).padStart(2, '0')}-${String(today.getDate()).padStart(2, '0')}`;

        let html = '';

        // Add empty slots for offset
        for (let i = 0; i < firstDay; i++) {
            html += `<span class="empty"></span>`;
        }

        // Add actual days
        for (let i = 1; i <= daysInMonth; i++) {
            // Format the current looped date
            const loopDateStr = `${year}-${String(month + 1).padStart(2, '0')}-${String(i).padStart(2, '0')}`;
            
            // Check if this looped day is today
            const isToday = loopDateStr === todayStr ? 'today' : '';
            
            html += `<span class="normal ${isToday}" data-date="${loopDateStr}">${i}</span>`;
        }

        return html;
    }

    function updateCalendarUI() {
        const allDays = document.querySelectorAll('.cal-days span[data-date]');
        const startStr = formatDate(startDate);
        const endStr = formatDate(endDate);

        allDays.forEach(day => {
            day.classList.remove('active', 'in-range', 'range-start', 'range-end');
            const dateVal = day.dataset.date;

            if (startStr && dateVal === startStr && !endStr) {
                day.classList.add('active', 'range-start');
            } else if (endStr && dateVal === endStr) {
                day.classList.add('active', 'range-end');
            } else if (startStr && endStr && dateVal > startStr && dateVal < endStr) {
                day.classList.add('in-range');
            }
        });
    }

    // Event Delegation for Calendar Clicks
    const calGrid = document.querySelector('.cal-grid');
    if (calGrid) {
        calGrid.addEventListener('click', function(e) {
            if (e.target.tagName === 'SPAN' && e.target.hasAttribute('data-date')) {
                const clickedDateStr = e.target.dataset.date;
                const clickedDate = new Date(clickedDateStr + 'T00:00:00'); // Force local timezone

                if (!startDate || (startDate && endDate)) {
                    // Start new range
                    startDate = clickedDate;
                    endDate = null;
                } else {
                    // Complete the range
                    if (clickedDate < startDate) {
                        endDate = startDate;
                        startDate = clickedDate;
                    } else {
                        endDate = clickedDate;
                    }
                }
                updateCalendarUI();
            }
        });
    }

    // Navigation
    if (prevBtn) {
        prevBtn.addEventListener('click', () => {
            currentCalDate.setMonth(currentCalDate.getMonth() - 1);
            renderCalendar();
        });
    }

    if (nextBtn) {
        nextBtn.addEventListener('click', () => {
            currentCalDate.setMonth(currentCalDate.getMonth() + 1);
            renderCalendar();
        });
    }

    // Initialize calendar on load
    renderCalendar();

    // ==========================================
    // 6. APPLY / CLEAR FILTERS
    // ==========================================
    let activeCustomerFilter = '';

    if (applyFiltersBtn) {
        applyFiltersBtn.addEventListener('click', function() {
            // Get selected customer value
            const customerSelect = document.querySelector('#filter-customer select');
            if (customerSelect) {
                activeCustomerFilter = customerSelect.value.toLowerCase();
            }
            
            // Date filtering logic (startDate & endDate) can be added here
            // console.log("Filtering from", formatDate(startDate), "to", formatDate(endDate));
            
            filterPanel.classList.remove('open');
            updateTable();
        });
    }

    if (clearFiltersBtn) {
        clearFiltersBtn.addEventListener('click', function() {
            // Reset Dropdown
            const customerSelect = document.querySelector('#filter-customer select');
            if (customerSelect) customerSelect.value = '';
            activeCustomerFilter = '';

            // Reset Calendar
            startDate = null;
            endDate = null;
            updateCalendarUI();

            // Trigger table update
            updateTable();
        });
    }

    // ==========================================
    // 7. MAIN TABLE UPDATE LOGIC (Search + Filter + Pagination)
    // ==========================================
    const searchInput = document.querySelector('.search-input');

    function updateTable() {
        const activePanel = document.querySelector('.tab-panel.active');
        if (!activePanel) return;

        const query = searchInput ? searchInput.value.toLowerCase().trim() : '';
        const tableRows = activePanel.querySelectorAll('.retainer-table tbody tr');
        
        let visibleCount = 0;

        tableRows.forEach(row => {
            const rowText = row.textContent.toLowerCase();
            
            // 1. Check Search Input
            const matchesSearch = rowText.includes(query);
            
            // 2. Check Customer Filter (if one is selected)
            const matchesCustomer = activeCustomerFilter === '' || rowText.includes(activeCustomerFilter);

            // Reset display first
            row.style.display = 'none';

            // If it matches both, apply pagination limit
            if (matchesSearch && matchesCustomer) {
                if (visibleCount < currentLimit) {
                    row.style.display = ''; // Show row
                    visibleCount++;
                }
            }
        });

        // Update "Showing X results" text
        const resultsInfo = document.querySelector('.results-info');
        if (resultsInfo) {
            resultsInfo.textContent = `Showing 1 to ${visibleCount} of ${visibleCount} results`;
        }
    }

    // Listen for typing in search
    if (searchInput) {
        searchInput.addEventListener('input', updateTable);
    }

    // Initial run on load
    updateTable();

    // ==========================================
    // 8. DYNAMIC 3-DOT ACTION MENU
    // ==========================================
    
    // The reusable HTML for the dropdown menu
    const dropdownHTML = `
        <div class="action-dropdown">
            <button class="action-dropdown-item text-primary">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                Download
            </button>
            <button class="action-dropdown-item text-primary">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                Send
            </button>
            <button class="action-dropdown-item">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 2v6h-6"></path><path d="M3 12a9 9 0 0 1 15-6.7L21 8"></path><path d="M3 22v-6h6"></path><path d="M21 12a9 9 0 0 1-15 6.7L3 16"></path></svg>
                Convert
            </button>
            <button class="action-dropdown-item">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
                Duplicate
            </button>
            <button class="action-dropdown-item text-success">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                View
            </button>
            <button class="action-dropdown-item text-primary">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                Edit
            </button>
            <button class="action-dropdown-item text-danger">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                Delete
            </button>
        </div>
    `;

    // 1. Inject the HTML into every actions cell that has a 3-dot button
    const actionMenuButtons = document.querySelectorAll('.action-menu-btn');
    actionMenuButtons.forEach(btn => {
        // Append the dropdown HTML right after the button
        btn.insertAdjacentHTML('afterend', dropdownHTML);
    });

    // 2. Handle the click events (Open/Close logic)
    document.addEventListener('click', function(e) {
        const menuBtn = e.target.closest('.action-menu-btn');
        
        if (menuBtn) {
            // Find the dropdown menu next to this specific button
            const dropdown = menuBtn.nextElementSibling;
            
            // Close any other open menus first
            document.querySelectorAll('.action-dropdown.show').forEach(menu => {
                if (menu !== dropdown) menu.classList.remove('show');
            });

            // Toggle the clicked menu
            dropdown.classList.toggle('show');
            e.stopPropagation(); 
        } else {
            // If clicking anywhere else, close all menus
            document.querySelectorAll('.action-dropdown.show').forEach(menu => {
                menu.classList.remove('show');
            });
        }
    });

});