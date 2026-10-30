@extends('Layout.dashboard')

@section('title', 'Manage Retainers - Apexbooks')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/Retainer/retainer.css') }}">
@endsection

@section('content')
<div class="retainer-page-wrapper">
    
    <!-- Page Header -->
    <div class="retainer-header">
        <div>
            <h1 class="retainer-title">Manage Retainers</h1>
            <p class="retainer-subtitle">Manage and track all customer retainers, statuses, invoices, and billing details.</p>
        </div>
        <a href="#" class="retainer-add-btn">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
            <span>Add Retainer</span>
        </a>
    </div>

    <!-- Main Card -->
    <div class="retainer-card">
        
        <!-- Controls Row -->
        <div class="retainer-controls">
            <div class="retainer-search-group">
                <div class="search-input-wrapper">
                    <svg class="search-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    <input type="text" class="search-input" placeholder="Search by retainer number...">
                </div>
                <button class="search-btn">Search</button>
            </div>

            <div class="retainer-action-group">
                <div class="view-toggle">
                    <button class="view-btn active" data-view="list" title="List View">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>
                    </button>
                    <button class="view-btn" data-view="grid" title="Grid View">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                    </button>
                </div>

                <!-- Custom Dropdown Component -->
                <div class="custom-dropdown" id="perPageDropdown">
                    <button type="button" class="custom-dropdown-btn" id="perPageToggle">
                        <span id="perPageLabel">10 per page</span>
                        <svg class="custom-select-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </button>
                    
                    <ul class="custom-dropdown-menu" id="perPageMenu">
                        <li class="custom-dropdown-item active" data-value="10">10 per page</li>
                        <li class="custom-dropdown-item" data-value="25">25 per page</li>
                        <li class="custom-dropdown-item" data-value="50">50 per page</li>
                    </ul>
                </div>

                <!-- Filter Wrapper -->
                <div class="filter-wrapper">
                    <button class="filter-btn" id="filterToggleBtn">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon></svg>
                        Filters
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-left: 4px;"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </button>

                    <!-- The Filter Panel -->
                    <div class="filter-panel" id="filterPanel">
                        
                        <!-- Filter Tabs -->
                        <div class="filter-tabs">
                            <button class="filter-tab active" data-filter-tab="customer">Customer</button>
                            <button class="filter-tab" data-filter-tab="date">Date Range</button>
                        </div>

                        <!-- Filter Content -->
                        <div class="filter-content">
                            
                            <!-- Tab: Customer -->
                            <div class="filter-tab-panel active" id="filter-customer">
                                <select class="filter-input">
                                    <option value="">Filter by customer</option>
                                    <option value="Sarah Johnson">Sarah Johnson</option>
                                    <option value="Emily Davis">Emily Davis</option>
                                    <option value="Lisa Anderson">Lisa Anderson</option>
                                    <option value="Jennifer Martinez">Jennifer Martinez</option>
                                    <option value="Maria Rodriguez">Maria Rodriguez</option>
                                    <option value="Amanda White">Amanda White</option>
                                    <option value="Jessica Harris">Jessica Harris</option>
                                    <option value="Ashley Lewis">Ashley Lewis</option>
                                    <option value="Michelle Hall">Michelle Hall</option>
                                </select>
                            </div>

                          <!-- Tab: Date Range (Custom Calendar) -->
    <div class="filter-tab-panel" id="filter-date">
    <div class="custom-calendar">
        <!-- Calendar Header -->
        <div class="cal-header">
            <button class="cal-nav-btn" id="calPrevBtn">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="15 18 9 12 15 6"></polyline></svg>
            </button>
            <div class="cal-months">
                <span class="cal-month-title" id="calMonth1"></span>
                <span class="cal-month-title" id="calMonth2"></span>
            </div>
            <button class="cal-nav-btn" id="calNextBtn">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </button>
        </div>

        <div class="cal-grid">
    <!-- Left Month -->
    <div class="cal-month">
        <div class="cal-days-header">
            <span>Su</span><span>Mo</span><span>Tu</span><span>We</span><span>Th</span><span>Fr</span><span>Sa</span>
        </div>
        <div class="cal-days" id="calDays1"></div>
    </div>
    
    <!-- Right Month -->
    <div class="cal-month">
        <div class="cal-days-header">
            <span>Su</span><span>Mo</span><span>Tu</span><span>We</span><span>Th</span><span>Fr</span><span>Sa</span>
        </div>
        <div class="cal-days" id="calDays2"></div>
    </div>
</div>
    </div>
</div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="filter-actions">
                            <button class="btn-clear" id="clearFiltersBtn">Clear</button>
                            <button class="btn-apply" id="applyFiltersBtn">Apply</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabs -->
        <div class="retainer-tabs">
            <button class="tab-btn" data-tab="all">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                All <span class="tab-badge">24</span>
            </button>
            <button class="tab-btn" data-tab="draft">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline></svg>
                Draft <span class="tab-badge">6</span>
            </button>
            <button class="tab-btn" data-tab="sent">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                Sent <span class="tab-badge">6</span>
            </button>
            <button class="tab-btn" data-tab="accepted">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
                Accepted <span class="tab-badge">5</span>
            </button>
            <button class="tab-btn" data-tab="rejected">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                Rejected <span class="tab-badge">0</span>
            </button>
            <button class="tab-btn" data-tab="partial">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 12a9 9 0 1 1-9-9c2.52 0 4.93 1 6.74 2.74L21 8"></path><path d="M21 3v5h-5"></path></svg>
                Partial <span class="tab-badge">7</span>
            </button>
            <button class="tab-btn" data-tab="paid">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                Paid <span class="tab-badge">0</span>
            </button>
            <button class="tab-btn" data-tab="converted">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                Converted <span class="tab-badge">0</span>
            </button>
        </div>

        <!-- Tab Content: All -->
        <div class="tab-panel active" id="tab-all">
            <div class="retainer-table-wrapper">
                <table class="retainer-table">
                    <thead>
                        <tr>
                            <th>Retainer Number <span class="sort-icon">▲<br>▼</span></th>
                            <th>Customer</th>
                            <th>Retainer Date <span class="sort-icon">▲<br>▼</span></th>
                            <th>Due Date <span class="sort-icon">▲<br>▼</span></th>
                            <th>Subtotal <span class="sort-icon">▲<br>▼</span></th>
                            <th>Tax <span class="sort-icon">▲<br>▼</span></th>
                            <th>Total <br>Amount <span class="sort-icon">▲<br>▼</span></th>
                            <th>Status <span class="sort-icon">▲<br>▼</span></th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Row 1 -->
                        <tr>
                            <td><span class="badge badge-blue">RET-2026-02-026</span></td>
                            <td>
                                <div class="user-cell">
                                    <img src="https://i.pravatar.cc/150?u=sarah" alt="Sarah" class="user-avatar">
                                    <div class="user-info">
                                        <span class="user-name">Sarah Johnson</span>
                                        <span class="user-email">sarah.johnson@client.com</span>
                                    </div>
                                </div>
                            </td>
                            <td><span class="date-text"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-02-14</span></td>
                            <td><span class="date-text text-danger"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-06-22 <span class="overdue-text">Overdue</span></span></td>
                            <td>$1,479.98</td>
                            <td>$105.97</td>
                            <td class="fw-bold">$1,389.55</td>
                            <td><span class="status-pill status-draft">Draft</span></td>
                            <td class="text-right actions-cell">
    <!-- The 3-Dot Menu Button -->
    <button class="action-menu-btn" title="Actions">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="1"></circle>
            <circle cx="12" cy="5" r="1"></circle>
            <circle cx="12" cy="19" r="1"></circle>
        </svg>
    </button>
</td>
                        </tr>
                        
                        <!-- Row 2 -->
                        <tr>
                            <td><span class="badge badge-blue">RET-2026-02-024</span></td>
                            <td>
                                <div class="user-cell">
                                    <img src="https://i.pravatar.cc/150?u=michelle" alt="Michelle" class="user-avatar">
                                    <div class="user-info">
                                        <span class="user-name">Michelle Hall</span>
                                        <span class="user-email">michelle.hall@client.com</span>
                                    </div>
                                </div>
                            </td>
                            <td><span class="date-text"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-02-06</span></td>
                            <td><span class="date-text text-danger"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-07-20 <span class="overdue-text">Overdue</span></span></td>
                            <td>$45.00</td>
                            <td>$5.27</td>
                            <td class="fw-bold">$45.77</td>
                            <td><span class="status-pill status-accepted">Accepted</span></td>
                             <td class="text-right actions-cell">
    <!-- The 3-Dot Menu Button -->
    <button class="action-menu-btn" title="Actions">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="1"></circle>
            <circle cx="12" cy="5" r="1"></circle>
            <circle cx="12" cy="19" r="1"></circle>
        </svg>
    </button>
</td>
                        </tr>

                        <!-- Row 3 -->
                        <tr>
                            <td><span class="badge badge-blue">RET-2026-01-023</span></td>
                            <td>
                                <div class="user-cell">
                                    <img src="https://i.pravatar.cc/150?u=smart" alt="Smart Systems" class="user-avatar">
                                    <div class="user-info">
                                        <span class="user-name">Smart Systems Corp</span>
                                        <span class="user-email">contact@smartsys.com</span>
                                    </div>
                                </div>
                            </td>
                            <td><span class="date-text"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-01-27</span></td>
                            <td><span class="date-text text-danger"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-07-04 <span class="overdue-text">Overdue</span></span></td>
                            <td>$75.97</td>
                            <td>$9.81</td>
                            <td class="fw-bold">$82.95</td>
                            <td><span class="status-pill status-draft">Draft</span></td>
                             <td class="text-right actions-cell">
    <!-- The 3-Dot Menu Button -->
    <button class="action-menu-btn" title="Actions">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="1"></circle>
            <circle cx="12" cy="5" r="1"></circle>
            <circle cx="12" cy="19" r="1"></circle>
        </svg>
    </button>
</td>
                        </tr>

                        <!-- Row 4 -->
                        <tr>
                            <td><span class="badge badge-blue">RET-2026-01-022</span></td>
                            <td>
                                <div class="user-cell">
                                    <img src="https://i.pravatar.cc/150?u=dynamic" alt="Dynamic" class="user-avatar">
                                    <div class="user-info">
                                        <span class="user-name">Dynamic Solutions</span>
                                        <span class="user-email">info@dynsol.com</span>
                                    </div>
                                </div>
                            </td>
                            <td><span class="date-text"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-01-17</span></td>
                            <td><span class="date-text text-danger"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-06-29 <span class="overdue-text">Overdue</span></span></td>
                            <td>$189.99</td>
                            <td>$17.79</td>
                            <td class="fw-bold">$189.58</td>
                            <td><span class="status-pill status-sent">Sent</span></td>
                             <td class="text-right actions-cell">
    <!-- The 3-Dot Menu Button -->
    <button class="action-menu-btn" title="Actions">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="1"></circle>
            <circle cx="12" cy="5" r="1"></circle>
            <circle cx="12" cy="19" r="1"></circle>
        </svg>
    </button>
</td>
                        </tr>

                        <!-- Row 5 -->
                        <tr>
                            <td><span class="badge badge-blue">RET-2025-11-021</span></td>
                            <td>
                                <div class="user-cell">
                                    <img src="https://i.pravatar.cc/150?u=emily" alt="Emily" class="user-avatar">
                                    <div class="user-info">
                                        <span class="user-name">Emily Davis</span>
                                        <span class="user-email">emily.davis@client.com</span>
                                    </div>
                                </div>
                            </td>
                            <td><span class="date-text"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2025-11-28</span></td>
                            <td><span class="date-text text-danger"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-07-08 <span class="overdue-text">Overdue</span></span></td>
                            <td>$469.97</td>
                            <td>$44.81</td>
                            <td class="fw-bold">$469.83</td>
                            <td><span class="status-pill status-accepted">Accepted</span></td>
                             <td class="text-right actions-cell">
    <!-- The 3-Dot Menu Button -->
    <button class="action-menu-btn" title="Actions">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="1"></circle>
            <circle cx="12" cy="5" r="1"></circle>
            <circle cx="12" cy="19" r="1"></circle>
        </svg>
    </button>
</td>
                        </tr>
                        
                        <!-- Row 6 -->
                        <tr>
                            <td><span class="badge badge-blue">RET-2025-11-020</span></td>
                            <td>
                                <div class="user-cell">
                                    <img src="https://i.pravatar.cc/150?u=prof" alt="Professional" class="user-avatar">
                                    <div class="user-info">
                                        <span class="user-name">Professional Services</span>
                                        <span class="user-email">info@proserv.com</span>
                                    </div>
                                </div>
                            </td>
                            <td><span class="date-text"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2025-11-23</span></td>
                            <td><span class="date-text text-danger"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-06-12 <span class="overdue-text">Overdue</span></span></td>
                            <td>$123.99</td>
                            <td>$14.78</td>
                            <td class="fw-bold">$121.69</td>
                            <td><span class="status-pill status-accepted">Accepted</span></td>
                             <td class="text-right actions-cell">
    <!-- The 3-Dot Menu Button -->
    <button class="action-menu-btn" title="Actions">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="1"></circle>
            <circle cx="12" cy="5" r="1"></circle>
            <circle cx="12" cy="19" r="1"></circle>
        </svg>
    </button>
</td>
                        </tr>

                        <!-- Row 7 -->
                        <tr>
                            <td><span class="badge badge-blue">RET-2025-11-019</span></td>
                            <td>
                                <div class="user-cell">
                                    <img src="https://i.pravatar.cc/150?u=tech" alt="Tech Innovations" class="user-avatar">
                                    <div class="user-info">
                                        <span class="user-name">Tech Innovations Inc</span>
                                        <span class="user-email">hello@techinno.com</span>
                                    </div>
                                </div>
                            </td>
                            <td><span class="date-text"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2025-11-18</span></td>
                            <td><span class="date-text text-danger"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-05-24 <span class="overdue-text">Overdue</span></span></td>
                            <td>$461.91</td>
                            <td>$68.59</td>
                            <td class="fw-bold">$486.41</td>
                            <td><span class="status-pill status-accepted">Accepted</span></td>
                             <td class="text-right actions-cell">
    <!-- The 3-Dot Menu Button -->
    <button class="action-menu-btn" title="Actions">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="1"></circle>
            <circle cx="12" cy="5" r="1"></circle>
            <circle cx="12" cy="19" r="1"></circle>
        </svg>
    </button>
</td>
                        </tr>

                        <!-- Row 8 -->
                        <tr>
                            <td><span class="badge badge-blue">RET-2025-11-018</span></td>
                            <td>
                                <div class="user-cell">
                                    <img src="https://i.pravatar.cc/150?u=ashley" alt="Ashley" class="user-avatar">
                                    <div class="user-info">
                                        <span class="user-name">Ashley Lewis</span>
                                        <span class="user-email">ashley.lewis@client.com</span>
                                    </div>
                                </div>
                            </td>
                            <td><span class="date-text"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2025-11-13</span></td>
                            <td><span class="date-text text-danger"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-04-09 <span class="overdue-text">Overdue</span></span></td>
                            <td>$148.97</td>
                            <td>$15.95</td>
                            <td class="fw-bold">$143.23</td>
                            <td><span class="status-pill status-accepted">Accepted</span></td>
                             <td class="text-right actions-cell">
    <!-- The 3-Dot Menu Button -->
    <button class="action-menu-btn" title="Actions">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="1"></circle>
            <circle cx="12" cy="5" r="1"></circle>
            <circle cx="12" cy="19" r="1"></circle>
        </svg>
    </button>
</td>
                        </tr>

                        <!-- Row 9 -->
                        <tr>
                            <td><span class="badge badge-blue">RET-2025-10-017</span></td>
                            <td>
                                <div class="user-cell">
                                    <img src="https://i.pravatar.cc/150?u=future" alt="Future Tech" class="user-avatar">
                                    <div class="user-info">
                                        <span class="user-name">Future Tech Ltd</span>
                                        <span class="user-email">hello@futuretech.com</span>
                                    </div>
                                </div>
                            </td>
                            <td><span class="date-text"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2025-10-24</span></td>
                            <td><span class="date-text text-danger"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-08-17 <span class="overdue-text">Overdue</span></span></td>
                            <td>$399.98</td>
                            <td>$40.92</td>
                            <td class="fw-bold">$412.90</td>
                            <td><span class="status-pill status-draft">Draft</span></td>
                            <td class="text-right actions-cell">
    <button class="action-menu-btn" title="Actions">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="1"></circle>
            <circle cx="12" cy="5" r="1"></circle>
            <circle cx="12" cy="19" r="1"></circle>
        </svg>
    </button>
</td>
                        </tr>

                        <!-- Row 10 -->
                        <tr>
                            <td><span class="badge badge-blue">RET-2025-10-016</span></td>
                            <td>
                                <div class="user-cell">
                                    <img src="https://i.pravatar.cc/150?u=lisa" alt="Lisa" class="user-avatar">
                                    <div class="user-info">
                                        <span class="user-name">Lisa Anderson</span>
                                        <span class="user-email">lisa.anderson@client.com</span>
                                    </div>
                                </div>
                            </td>
                            <td><span class="date-text"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2025-10-09</span></td>
                            <td><span class="date-text text-danger"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-07-14 <span class="overdue-text">Overdue</span></span></td>
                            <td>$130.96</td>
                            <td>$14.87</td>
                            <td class="fw-bold">$140.42</td>
                            <td><span class="status-pill status-sent">Sent</span></td>
                            <td class="text-right actions-cell">
                                <button class="action-menu-btn" title="Actions">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="1"></circle>
                                        <circle cx="12" cy="5" r="1"></circle>
                                        <circle cx="12" cy="19" r="1"></circle>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Tab Content: Draft -->
        <div class="tab-panel" id="tab-draft">
            <div class="retainer-table-wrapper">
                <table class="retainer-table">
                    <thead>
                        <tr>
                            <th>Retainer Number <span class="sort-icon">▲<br>▼</span></th>
                            <th>Customer</th>
                            <th>Retainer Date <span class="sort-icon">▲<br>▼</span></th>
                            <th>Due Date <span class="sort-icon">▲<br>▼</span></th>
                            <th>Subtotal <span class="sort-icon">▲<br>▼</span></th>
                            <th>Tax <span class="sort-icon">▲<br>▼</span></th>
                            <th>Total Amount <span class="sort-icon">▲<br>▼</span></th>
                            <th>Status <span class="sort-icon">▲<br>▼</span></th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Draft Row 1 -->
                        <tr>
                            <td><span class="badge badge-blue">RET-2025-09-004</span></td>
                            <td>
                                <div class="user-cell">
                                    <img src="https://i.pravatar.cc/150?u=elite" alt="Elite" class="user-avatar">
                                    <div class="user-info">
                                        <span class="user-name">Elite Enterprises</span>
                                        <span class="user-email">admin@eliteent.com</span>
                                    </div>
                                </div>
                            </td>
                            <td><span class="date-text"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2025-09-04</span></td>
                            <td><span class="date-text text-danger"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-05-01 <span class="overdue-text">Overdue</span></span></td>
                            <td>$898.96</td>
                            <td>$82.87</td>
                            <td class="fw-bold">$919.87</td>
                            <td><span class="status-pill status-draft">Draft</span></td>
                            <td class="text-right actions-cell">
                                <button class="action-icon text-primary"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg></button>
                                <button class="action-icon text-primary"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg></button>
                                <button class="action-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 2v6h-6"></path><path d="M3 12a9 9 0 0 1 15-6.7L21 8"></path><path d="M3 22v-6h6"></path><path d="M21 12a9 9 0 0 1-15 6.7L3 16"></path></svg></button>
                                <button class="action-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                                <button class="action-icon text-success"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></button>
                                <button class="action-icon text-primary"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></button>
                                <button class="action-icon text-danger"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></button>
                            </td>
                        </tr>
                        
                        <!-- Draft Row 2 -->
                        <tr>
                            <td><span class="badge badge-blue">RET-2025-09-009</span></td>
                            <td>
                                <div class="user-cell">
                                    <img src="https://i.pravatar.cc/150?u=quality" alt="Quality" class="user-avatar">
                                    <div class="user-info">
                                        <span class="user-name">Quality Solutions Inc</span>
                                        <span class="user-email">sales@qualsol.com</span>
                                    </div>
                                </div>
                            </td>
                            <td><span class="date-text"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2025-09-29</span></td>
                            <td><span class="date-text text-danger"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-04-08 <span class="overdue-text">Overdue</span></span></td>
                            <td>$434.99</td>
                            <td>$65.37</td>
                            <td class="fw-bold">$475.77</td>
                            <td><span class="status-pill status-draft">Draft</span></td>
                            <td class="text-right actions-cell">
                                <button class="action-icon text-primary"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg></button>
                                <button class="action-icon text-primary"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg></button>
                                <button class="action-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 2v6h-6"></path><path d="M3 12a9 9 0 0 1 15-6.7L21 8"></path><path d="M3 22v-6h6"></path><path d="M21 12a9 9 0 0 1-15 6.7L3 16"></path></svg></button>
                                <button class="action-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                                <button class="action-icon text-success"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></button>
                                <button class="action-icon text-primary"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></button>
                                <button class="action-icon text-danger"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></button>
                            </td>
                        </tr>

                        <!-- Draft Row 3 -->
                        <tr>
                            <td><span class="badge badge-blue">RET-2025-10-013</span></td>
                            <td>
                                <div class="user-cell">
                                    <img src="https://i.pravatar.cc/150?u=ashley" alt="Ashley" class="user-avatar">
                                    <div class="user-info">
                                        <span class="user-name">Ashley Lewis</span>
                                        <span class="user-email">ashley.lewis@client.com</span>
                                    </div>
                                </div>
                            </td>
                            <td><span class="date-text"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2025-10-19</span></td>
                            <td><span class="date-text text-danger"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-07-29 <span class="overdue-text">Overdue</span></span></td>
                            <td>$314.98</td>
                            <td>$42.26</td>
                            <td class="fw-bold">$350.04</td>
                            <td><span class="status-pill status-draft">Draft</span></td>
                            <td class="text-right actions-cell">
                                <button class="action-icon text-primary"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg></button>
                                <button class="action-icon text-primary"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg></button>
                                <button class="action-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 2v6h-6"></path><path d="M3 12a9 9 0 0 1 15-6.7L21 8"></path><path d="M3 22v-6h6"></path><path d="M21 12a9 9 0 0 1-15 6.7L3 16"></path></svg></button>
                                <button class="action-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                                <button class="action-icon text-success"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></button>
                                <button class="action-icon text-primary"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></button>
                                <button class="action-icon text-danger"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></button>
                            </td>
                        </tr>

                        <!-- Draft Row 4 -->
                        <tr>
                            <td><span class="badge badge-blue">RET-2025-11-018</span></td>
                            <td>
                                <div class="user-cell">
                                    <img src="https://i.pravatar.cc/150?u=ashley" alt="Ashley" class="user-avatar">
                                    <div class="user-info">
                                        <span class="user-name">Ashley Lewis</span>
                                        <span class="user-email">ashley.lewis@client.com</span>
                                    </div>
                                </div>
                            </td>
                            <td><span class="date-text"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2025-11-13</span></td>
                            <td><span class="date-text text-danger"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-04-09 <span class="overdue-text">Overdue</span></span></td>
                            <td>$148.97</td>
                            <td>$15.95</td>
                            <td class="fw-bold">$143.23</td>
                            <td><span class="status-pill status-draft">Draft</span></td>
                            <td class="text-right actions-cell">
                                <button class="action-icon text-primary"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg></button>
                                <button class="action-icon text-primary"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg></button>
                                <button class="action-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 2v6h-6"></path><path d="M3 12a9 9 0 0 1 15-6.7L21 8"></path><path d="M3 22v-6h6"></path><path d="M21 12a9 9 0 0 1-15 6.7L3 16"></path></svg></button>
                                <button class="action-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                                <button class="action-icon text-success"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></button>
                                <button class="action-icon text-primary"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></button>
                                <button class="action-icon text-danger"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></button>
                            </td>
                        </tr>

                        <!-- Draft Row 5 -->
                        <tr>
                            <td><span class="badge badge-blue">RET-2026-01-023</span></td>
                            <td>
                                <div class="user-cell">
                                    <img src="https://i.pravatar.cc/150?u=smart" alt="Smart Systems" class="user-avatar">
                                    <div class="user-info">
                                        <span class="user-name">Smart Systems Corp</span>
                                        <span class="user-email">contact@smartsys.com</span>
                                    </div>
                                </div>
                            </td>
                            <td><span class="date-text"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-01-27</span></td>
                            <td><span class="date-text text-danger"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-07-04 <span class="overdue-text">Overdue</span></span></td>
                            <td>$75.97</td>
                            <td>$9.81</td>
                            <td class="fw-bold">$82.95</td>
                            <td><span class="status-pill status-draft">Draft</span></td>
                            <td class="text-right actions-cell">
                                <button class="action-icon text-primary"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg></button>
                                <button class="action-icon text-primary"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg></button>
                                <button class="action-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 2v6h-6"></path><path d="M3 12a9 9 0 0 1 15-6.7L21 8"></path><path d="M3 22v-6h6"></path><path d="M21 12a9 9 0 0 1-15 6.7L3 16"></path></svg></button>
                                <button class="action-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                                <button class="action-icon text-success"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></button>
                                <button class="action-icon text-primary"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></button>
                                <button class="action-icon text-danger"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Tab Content: Sent -->
        <div class="tab-panel" id="tab-sent">
            <div class="retainer-table-wrapper">
                <table class="retainer-table">
                    <thead>
                        <tr>
                            <th>Retainer Number <span class="sort-icon">▲<br>▼</span></th>
                            <th>Customer</th>
                            <th>Retainer Date <span class="sort-icon">▲<br>▼</span></th>
                            <th>Due Date <span class="sort-icon">▲<br>▼</span></th>
                            <th>Subtotal <span class="sort-icon">▲<br>▼</span></th>
                            <th>Tax <span class="sort-icon">▲<br>▼</span></th>
                            <th>Total Amount <span class="sort-icon">▲<br>▼</span></th>
                            <th>Status <span class="sort-icon">▲<br>▼</span></th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Sent Row 1 -->
                        <tr>
                            <td><span class="badge badge-blue">RET-2025-09-008</span></td>
                            <td>
                                <div class="user-cell">
                                    <img src="https://i.pravatar.cc/150?u=jennifer" alt="Jennifer" class="user-avatar">
                                    <div class="user-info">
                                        <span class="user-name">Jennifer Martinez</span>
                                        <span class="user-email">jennifer.martinez@client.com</span>
                                    </div>
                                </div>
                            </td>
                            <td><span class="date-text"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2025-09-24</span></td>
                            <td><span class="date-text text-danger"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-05-04 <span class="overdue-text">Overdue</span></span></td>
                            <td>$15.99</td>
                            <td>$2.56</td>
                            <td class="fw-bold">$16.79</td>
                            <td><span class="status-pill status-sent">Sent</span></td>
                            <td class="text-right actions-cell">
                                <button class="action-icon text-primary"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg></button>
                                <button class="action-icon text-success"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg></button>
                                <button class="action-icon text-danger"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                                <button class="action-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 2v6h-6"></path><path d="M3 12a9 9 0 0 1 15-6.7L21 8"></path><path d="M3 22v-6h6"></path><path d="M21 12a9 9 0 0 1-15 6.7L3 16"></path></svg></button>
                                <button class="action-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                                <button class="action-icon text-success"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></button>
                            </td>
                        </tr>
                        
                        <!-- Sent Row 2 -->
                        <tr>
                            <td><span class="badge badge-blue">RET-2025-10-011</span></td>
                            <td>
                                <div class="user-cell">
                                    <img src="https://i.pravatar.cc/150?u=lisa" alt="Lisa" class="user-avatar">
                                    <div class="user-info">
                                        <span class="user-name">Lisa Anderson</span>
                                        <span class="user-email">lisa.anderson@client.com</span>
                                    </div>
                                </div>
                            </td>
                            <td><span class="date-text"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2025-10-09</span></td>
                            <td><span class="date-text text-danger"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-07-14 <span class="overdue-text">Overdue</span></span></td>
                            <td>$130.96</td>
                            <td>$14.87</td>
                            <td class="fw-bold">$140.42</td>
                            <td><span class="status-pill status-sent">Sent</span></td>
                            <td class="text-right actions-cell">
                                <button class="action-icon text-primary"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg></button>
                                <button class="action-icon text-success"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg></button>
                                <button class="action-icon text-danger"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                                <button class="action-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 2v6h-6"></path><path d="M3 12a9 9 0 0 1 15-6.7L21 8"></path><path d="M3 22v-6h6"></path><path d="M21 12a9 9 0 0 1-15 6.7L3 16"></path></svg></button>
                                <button class="action-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                                <button class="action-icon text-success"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></button>
                            </td>
                        </tr>

                        <!-- Sent Row 3 -->
                        <tr>
                            <td><span class="badge badge-blue">RET-2025-10-014</span></td>
                            <td>
                                <div class="user-cell">
                                    <img src="https://i.pravatar.cc/150?u=future" alt="Future Tech" class="user-avatar">
                                    <div class="user-info">
                                        <span class="user-name">Future Tech Ltd</span>
                                        <span class="user-email">hello@futuretech.com</span>
                                    </div>
                                </div>
                            </td>
                            <td><span class="date-text"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2025-10-24</span></td>
                            <td><span class="date-text text-danger"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-08-17 <span class="overdue-text">Overdue</span></span></td>
                            <td>$399.98</td>
                            <td>$40.92</td>
                            <td class="fw-bold">$412.90</td>
                            <td><span class="status-pill status-sent">Sent</span></td>
                            <td class="text-right actions-cell">
                                <button class="action-icon text-primary"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg></button>
                                <button class="action-icon text-success"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg></button>
                                <button class="action-icon text-danger"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                                <button class="action-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 2v6h-6"></path><path d="M3 12a9 9 0 0 1 15-6.7L21 8"></path><path d="M3 22v-6h6"></path><path d="M21 12a9 9 0 0 1-15 6.7L3 16"></path></svg></button>
                                <button class="action-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                                <button class="action-icon text-success"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></button>
                            </td>
                        </tr>

                        <!-- Sent Row 4 -->
                        <tr>
                            <td><span class="badge badge-blue">RET-2025-11-017</span></td>
                            <td>
                                <div class="user-cell">
                                    <img src="https://i.pravatar.cc/150?u=smart" alt="Smart Systems" class="user-avatar">
                                    <div class="user-info">
                                        <span class="user-name">Smart Systems Corp</span>
                                        <span class="user-email">contact@smartsys.com</span>
                                    </div>
                                </div>
                            </td>
                            <td><span class="date-text"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2025-11-08</span></td>
                            <td><span class="date-text text-danger"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-07-21 <span class="overdue-text">Overdue</span></span></td>
                            <td>$217.98</td>
                            <td>$24.69</td>
                            <td class="fw-bold">$228.23</td>
                            <td><span class="status-pill status-sent">Sent</span></td>
                            <td class="text-right actions-cell">
                                <button class="action-icon text-primary"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg></button>
                                <button class="action-icon text-success"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg></button>
                                <button class="action-icon text-danger"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                                <button class="action-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 2v6h-6"></path><path d="M3 12a9 9 0 0 1 15-6.7L21 8"></path><path d="M3 22v-6h6"></path><path d="M21 12a9 9 0 0 1-15 6.7L3 16"></path></svg></button>
                                <button class="action-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                                <button class="action-icon text-success"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></button>
                            </td>
                        </tr>

                        <!-- Sent Row 5 -->
                        <tr>
                            <td><span class="badge badge-blue">RET-2025-11-020</span></td>
                            <td>
                                <div class="user-cell">
                                    <img src="https://i.pravatar.cc/150?u=prof" alt="Professional" class="user-avatar">
                                    <div class="user-info">
                                        <span class="user-name">Professional Services</span>
                                        <span class="user-email">info@proserv.com</span>
                                    </div>
                                </div>
                            </td>
                            <td><span class="date-text"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2025-11-23</span></td>
                            <td><span class="date-text text-danger"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-06-12 <span class="overdue-text">Overdue</span></span></td>
                            <td>$123.99</td>
                            <td>$14.78</td>
                            <td class="fw-bold">$121.69</td>
                            <td><span class="status-pill status-sent">Sent</span></td>
                            <td class="text-right actions-cell">
                                <button class="action-icon text-primary"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg></button>
                                <button class="action-icon text-success"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg></button>
                                <button class="action-icon text-danger"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                                <button class="action-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 2v6h-6"></path><path d="M3 12a9 9 0 0 1 15-6.7L21 8"></path><path d="M3 22v-6h6"></path><path d="M21 12a9 9 0 0 1-15 6.7L3 16"></path></svg></button>
                                <button class="action-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                                <button class="action-icon text-success"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></button>
                            </td>
                        </tr>

                        <!-- Sent Row 6 -->
                        <tr>
                            <td><span class="badge badge-blue">RET-2026-01-022</span></td>
                            <td>
                                <div class="user-cell">
                                    <img src="https://i.pravatar.cc/150?u=dynamic" alt="Dynamic" class="user-avatar">
                                    <div class="user-info">
                                        <span class="user-name">Dynamic Solutions</span>
                                        <span class="user-email">info@dynsol.com</span>
                                    </div>
                                </div>
                            </td>
                            <td><span class="date-text"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-01-17</span></td>
                            <td><span class="date-text text-danger"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-06-29 <span class="overdue-text">Overdue</span></span></td>
                            <td>$189.99</td>
                            <td>$17.79</td>
                            <td class="fw-bold">$189.58</td>
                            <td><span class="status-pill status-sent">Sent</span></td>
                            <td class="text-right actions-cell">
                                <button class="action-icon text-primary"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg></button>
                                <button class="action-icon text-success"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg></button>
                                <button class="action-icon text-danger"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                                <button class="action-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 2v6h-6"></path><path d="M3 12a9 9 0 0 1 15-6.7L21 8"></path><path d="M3 22v-6h6"></path><path d="M21 12a9 9 0 0 1-15 6.7L3 16"></path></svg></button>
                                <button class="action-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                                <button class="action-icon text-success"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Tab Content: Accepted -->
        <div class="tab-panel" id="tab-accepted">
            <div class="retainer-table-wrapper">
                <table class="retainer-table">
                    <thead>
                        <tr>
                            <th>Retainer Number <span class="sort-icon">▲<br>▼</span></th>
                            <th>Customer</th>
                            <th>Retainer Date <span class="sort-icon">▲<br>▼</span></th>
                            <th>Due Date <span class="sort-icon">▲<br>▼</span></th>
                            <th>Subtotal <span class="sort-icon">▲<br>▼</span></th>
                            <th>Tax <span class="sort-icon">▲<br>▼</span></th>
                            <th>Total Amount <span class="sort-icon">▲<br>▼</span></th>
                            <th>Status <span class="sort-icon">▲<br>▼</span></th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Accepted Row 1 -->
                        <tr>
                            <td><span class="badge badge-blue">RET-2025-10-015</span></td>
                            <td>
                                <div class="user-cell">
                                    <img src="https://i.pravatar.cc/150?u=jennifer" alt="Jennifer" class="user-avatar">
                                    <div class="user-info">
                                        <span class="user-name">Jennifer Martinez</span>
                                        <span class="user-email">jennifer.martinez@client.com</span>
                                    </div>
                                </div>
                            </td>
                            <td><span class="date-text"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2025-10-29</span></td>
                            <td><span class="date-text text-danger"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-06-17 <span class="overdue-text">Overdue</span></span></td>
                            <td>$279.92</td>
                            <td>$43.56</td>
                            <td class="fw-bold">$313.72</td>
                            <td><span class="status-pill status-accepted">Accepted</span></td>
                            <td class="text-right actions-cell">
                                <button class="action-icon text-primary"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg></button>
                                <button class="action-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 2v6h-6"></path><path d="M3 12a9 9 0 0 1 15-6.7L21 8"></path><path d="M3 22v-6h6"></path><path d="M21 12a9 9 0 0 1-15 6.7L3 16"></path></svg></button>
                                <button class="action-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                                <button class="action-icon text-success"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></button>
                            </td>
                        </tr>
                        
                        <!-- Accepted Row 2 -->
                        <tr>
                            <td><span class="badge badge-blue">RET-2025-11-016</span></td>
                            <td>
                                <div class="user-cell">
                                    <img src="https://i.pravatar.cc/150?u=maria" alt="Maria" class="user-avatar">
                                    <div class="user-info">
                                        <span class="user-name">Maria Rodriguez</span>
                                        <span class="user-email">maria.rodriguez@client.com</span>
                                    </div>
                                </div>
                            </td>
                            <td><span class="date-text"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2025-11-03</span></td>
                            <td><span class="date-text text-danger"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-05-25 <span class="overdue-text">Overdue</span></span></td>
                            <td>$59.99</td>
                            <td>$5.04</td>
                            <td class="fw-bold">$55.43</td>
                            <td><span class="status-pill status-accepted">Accepted</span></td>
                            <td class="text-right actions-cell">
                                <button class="action-icon text-primary"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg></button>
                                <button class="action-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 2v6h-6"></path><path d="M3 12a9 9 0 0 1 15-6.7L21 8"></path><path d="M3 22v-6h6"></path><path d="M21 12a9 9 0 0 1-15 6.7L3 16"></path></svg></button>
                                <button class="action-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                                <button class="action-icon text-success"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></button>
                            </td>
                        </tr>

                        <!-- Accepted Row 3 -->
                        <tr>
                            <td><span class="badge badge-blue">RET-2025-11-019</span></td>
                            <td>
                                <div class="user-cell">
                                    <img src="https://i.pravatar.cc/150?u=tech" alt="Tech Innovations" class="user-avatar">
                                    <div class="user-info">
                                        <span class="user-name">Tech Innovations Inc</span>
                                        <span class="user-email">hello@techinno.com</span>
                                    </div>
                                </div>
                            </td>
                            <td><span class="date-text"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2025-11-18</span></td>
                            <td><span class="date-text text-danger"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-05-24 <span class="overdue-text">Overdue</span></span></td>
                            <td>$461.91</td>
                            <td>$68.59</td>
                            <td class="fw-bold">$486.41</td>
                            <td><span class="status-pill status-accepted">Accepted</span></td>
                            <td class="text-right actions-cell">
                                <button class="action-icon text-primary"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg></button>
                                <button class="action-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 2v6h-6"></path><path d="M3 12a9 9 0 0 1 15-6.7L21 8"></path><path d="M3 22v-6h6"></path><path d="M21 12a9 9 0 0 1-15 6.7L3 16"></path></svg></button>
                                <button class="action-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                                <button class="action-icon text-success"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></button>
                            </td>
                        </tr>

                        <!-- Accepted Row 4 -->
                        <tr>
                            <td><span class="badge badge-blue">RET-2025-11-021</span></td>
                            <td>
                                <div class="user-cell">
                                    <img src="https://i.pravatar.cc/150?u=emily" alt="Emily" class="user-avatar">
                                    <div class="user-info">
                                        <span class="user-name">Emily Davis</span>
                                        <span class="user-email">emily.davis@client.com</span>
                                    </div>
                                </div>
                            </td>
                            <td><span class="date-text"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2025-11-28</span></td>
                            <td><span class="date-text text-danger"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-07-08 <span class="overdue-text">Overdue</span></span></td>
                            <td>$469.97</td>
                            <td>$44.81</td>
                            <td class="fw-bold">$469.83</td>
                            <td><span class="status-pill status-accepted">Accepted</span></td>
                            <td class="text-right actions-cell">
                                <button class="action-icon text-primary"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg></button>
                                <button class="action-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 2v6h-6"></path><path d="M3 12a9 9 0 0 1 15-6.7L21 8"></path><path d="M3 22v-6h6"></path><path d="M21 12a9 9 0 0 1-15 6.7L3 16"></path></svg></button>
                                <button class="action-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                                <button class="action-icon text-success"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></button>
                            </td>
                        </tr>

                        <!-- Accepted Row 5 -->
                        <tr>
                            <td><span class="badge badge-blue">RET-2026-02-024</span></td>
                            <td>
                                <div class="user-cell">
                                    <img src="https://i.pravatar.cc/150?u=michelle" alt="Michelle" class="user-avatar">
                                    <div class="user-info">
                                        <span class="user-name">Michelle Hall</span>
                                        <span class="user-email">michelle.hall@client.com</span>
                                    </div>
                                </div>
                            </td>
                            <td><span class="date-text"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-02-06</span></td>
                            <td><span class="date-text text-danger"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2026-07-20 <span class="overdue-text">Overdue</span></span></td>
                            <td>$45.00</td>
                            <td>$5.27</td>
                            <td class="fw-bold">$45.77</td>
                            <td><span class="status-pill status-accepted">Accepted</span></td>
                            <td class="text-right actions-cell">
                                <button class="action-icon text-primary"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg></button>
                                <button class="action-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 2v6h-6"></path><path d="M3 12a9 9 0 0 1 15-6.7L21 8"></path><path d="M3 22v-6h6"></path><path d="M21 12a9 9 0 0 1-15 6.7L3 16"></path></svg></button>
                                <button class="action-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                                <button class="action-icon text-success"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination Footer -->
        <div class="retainer-footer">
            <div class="results-info">Showing 1 to 10 of 24 results</div>
            <div class="pagination">
                <button class="page-btn disabled">&lt; Previous</button>
                <button class="page-btn active">1</button>
                <button class="page-btn">2</button>
                <button class="page-btn">3</button>
                <button class="page-btn">Next &gt;</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/Retainer/Retainer.js') }}?v={{ time() }}" defer></script>
@endsection