/* public/js/sidebar.js */

(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.querySelector('.sidebar-search-box');
        const menuItems = document.querySelectorAll('.sidebar-menu-list li.menu-item');
        const subItems = document.querySelectorAll('.sidebar-menu-list li.sub-item');
        const allClickable = document.querySelectorAll('.sidebar-menu-list li.menu-item, .sidebar-menu-list li.sub-item');

        // 1. Search Filter Functionality
        if (searchInput) {
            searchInput.addEventListener('input', function (e) {
                const query = e.target.value.toLowerCase();

                menuItems.forEach(function (item) {
                    if (item.classList.contains('title')) return; 
                    
                    const text = item.textContent.toLowerCase();
                    if (text.includes(query)) {
                        item.style.display = 'flex';
                        // Open dropdown automatically if a match is found inside
                        if (item.classList.contains('has-submenu')) {
                            item.classList.add('open');
                        }
                    } else {
                        item.style.display = 'none';
                    }
                });

                subItems.forEach(function (sub) {
                    if (sub.textContent.toLowerCase().includes(query)) {
                        sub.style.display = 'flex';
                    } else {
                        sub.style.display = 'none';
                    }
                });
            });
        }

        // 2. Handle Clicks (Dropdowns + Active Highlighting)
        allClickable.forEach(function (item) {
            item.addEventListener('click', function (e) {
                // If it has a submenu, toggle the dropdown
                if (item.classList.contains('has-submenu')) {
                    // Don't toggle if we are clicking a real link inside the sub-menu
                    if (e.target.tagName.toLowerCase() === 'a') {
                        return;
                    }
                    
                    e.stopPropagation();
                    item.classList.toggle('open');
                } else {
                    // It's a regular item, make it active
                    // REMOVED: e.preventDefault(); <-- This was blocking the page from loading
                    
                    // Remove active from everything
                    allClickable.forEach(function (i) {
                        i.classList.remove('active');
                    });
                    
                    // Add active to the one clicked
                    item.classList.add('active');
                }
            });
        });
    });
})();