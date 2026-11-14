@extends('Layout.Dashboard')

@section('title', 'Budget Monitoring - Apexbooks')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/Budget-Planner/Budget-Monitoring.css') }}">
@endsection

@section('content')
<div class="budget-page-wrapper">
    
    <!-- Header Section -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Budget Monitoring</h1>
            <p class="page-subtitle">Monitor budget allocations, real-time spending, and variance percentages across all active budgets.</p>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="stats-grid">
        <!-- Monitored Budgets -->
        <div class="stat-card border-blue">
           <div class="stat-content">
                <span class="stat-label text-blue">Monitored Budgets</span>
                <h2 class="stat-value text-blue">10</h2> <!-- Changed from 5 to 10 -->
                <span class="stat-desc text-blue">Budgets with activity logs</span>
            </div>
            <div class="stat-icon bg-blue-light text-blue">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
            </div>
        </div>

        <!-- Total Allocated -->
        <div class="stat-card border-green">
            <div class="stat-content">
                <span class="stat-label text-green">Total Allocated</span>
                <h2 class="stat-value text-green">$500,000.00</h2> <!-- Updated sum -->
                <span class="stat-desc text-green">Total amount planned</span>
            </div>
            <div class="stat-icon bg-green-light text-green">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="20" x2="12" y2="10"></line><line x1="18" y1="20" x2="18" y2="4"></line><line x1="6" y1="20" x2="6" y2="16"></line></svg>
            </div>
        </div>

        <!-- Spending Status -->
        <div class="stat-card border-orange">
            <div class="spending-card-content">
                <div class="spending-header">
                    <span class="stat-label text-orange">Spending Status</span>
                    <span class="badge-orange">52%</span> <!-- Updated percentage -->
                </div>
                
                <h2 class="stat-value text-orange">$260,000.00</h2>
                
                <div class="progress-bar-bg">
                    <div class="progress-bar-fill bg-orange" style="width: 52%;"></div>
                </div>
                
                <div class="spending-footer">
                    <span class="text-orange">Spent: $260,000.00</span>
                    <span class="remaining-text">Remaining: $240,000.00</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Card -->
    <div class="main-card">
        
        <!-- Controls -->
        <div class="controls-row">
            <div class="search-group">
                <div class="search-wrapper">
                    <svg class="search-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    <input type="text" class="search-input" placeholder="Search Budget Monitoring...">
                </div>
                <button class="btn-search">Search</button>
            </div>

            <div class="action-group">
                <!-- View Toggle -->
                <div class="view-toggle">
                    <button class="view-btn active" id="listViewBtn" title="List View">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>
                    </button>
                    <button class="view-btn" id="gridViewBtn" title="Grid View">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                    </button>
                </div>

                <!-- Custom Per Page Dropdown -->
                <div class="custom-dropdown" id="perPageDropdown">
                    <button class="custom-dropdown-btn" id="perPageToggle">
                        <span>10 per page</span>
                        <svg class="caret" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </button>
                    <ul class="custom-dropdown-menu">
                        <li class="custom-dropdown-item active">10 per page</li>
                        <li class="custom-dropdown-item">25 per page</li>
                        <li class="custom-dropdown-item">50 per page</li>
                    </ul>
                </div>

                <!-- Filter Toggle -->
                <button class="btn-filter" id="filterToggle">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon></svg>
                    Filters
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </button>
            </div>
        </div>

        <!-- Filter Panel -->
        <div class="filter-panel" id="filterPanel">
            <div class="filter-row">
                <div class="filter-group">
                    <label>Budget</label>
                    <div class="custom-dropdown">
                        <button class="custom-dropdown-btn">
                            <span>Filter by Budget</span>
                            <svg class="caret" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
                        </button>
                    </div>
                </div>
                <div class="filter-group">
                    <label>Date Range</label>
                    <div class="custom-dropdown">
                        <button class="custom-dropdown-btn">
                            <span>Select date range</span>
                            <svg class="caret" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
                        </button>
                    </div>
                </div>
                <div class="filter-actions">
                    <button class="btn-search">Apply</button>
                    <button class="btn-clear">Clear</button>
                </div>
            </div>
        </div>

        <!-- Table Container (List View) -->
        <div class="table-container" id="listViewContainer">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Budget <span class="sort-icon">↕</span></th>
                        <th>Date <span class="sort-icon">↕</span></th>
                        <th>Utilization</th>
                        <th>Variance <span class="sort-icon">↕</span></th>
                        <th>Variance Percentage <span class="sort-icon">↕</span></th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Row 1 -->
                    <tr>
                        <td class="col-budget" data-label="Budget">Marketing Budget</td>
                        <td class="col-date" data-label="Date">
                            <span class="date-badge"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2024-05-30</span>
                        </td>
                        <td class="col-utilization" data-label="Utilization">
                            <div class="util-header">
                                <span>Total: $50,000.00</span>
                                <span class="text-muted">(100%)</span>
                            </div>
                            <div class="progress-bar-bg">
                                <div class="progress-bar-fill bg-red" style="width: 100%;"></div>
                            </div>
                            <div class="util-footer">
                                <span class="text-red">Spent: $50,000.00</span>
                                <span class="text-green">Left: $0.00</span>
                            </div>
                        </td>
                        <td class="col-variance" data-label="Variance">$0.00</td>
                        <td class="col-variance-perc" data-label="Variance Percentage">0.00%</td>
                        <td class="text-right actions-cell" data-label="Actions">
                            <button class="action-menu-btn">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                            </button>
                        </td>
                    </tr>

                    <!-- Row 2 -->
                    <tr>
                        <td class="col-budget" data-label="Budget">Marketing Budget</td>
                        <td class="col-date" data-label="Date">
                            <span class="date-badge"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2024-04-29</span>
                        </td>
                        <td class="col-utilization" data-label="Utilization">
                            <div class="util-header">
                                <span>Total: $50,000.00</span>
                                <span class="text-muted">(97%)</span>
                            </div>
                            <div class="progress-bar-bg">
                                <div class="progress-bar-fill bg-red" style="width: 97%;"></div>
                            </div>
                            <div class="util-footer">
                                <span class="text-red">Spent: $48,500.00</span>
                                <span class="text-green">Left: $1,500.00</span>
                            </div>
                        </td>
                        <td class="col-variance" data-label="Variance">$1,500.00</td>
                        <td class="col-variance-perc" data-label="Variance Percentage">3.00%</td>
                        <td class="text-right actions-cell" data-label="Actions">
                            <button class="action-menu-btn">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                            </button>
                        </td>
                    </tr>

                    <!-- Row 3 -->
                    <tr>
                        <td class="col-budget" data-label="Budget">Marketing Budget</td>
                        <td class="col-date" data-label="Date">
                            <span class="date-badge"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2024-03-30</span>
                        </td>
                        <td class="col-utilization" data-label="Utilization">
                            <div class="util-header">
                                <span>Total: $50,000.00</span>
                                <span class="text-muted">(84%)</span>
                            </div>
                            <div class="progress-bar-bg">
                                <div class="progress-bar-fill bg-orange" style="width: 84%;"></div>
                            </div>
                            <div class="util-footer">
                                <span class="text-red">Spent: $42,000.00</span>
                                <span class="text-green">Left: $8,000.00</span>
                            </div>
                        </td>
                        <td class="col-variance" data-label="Variance">$5,000.00</td>
                        <td class="col-variance-perc" data-label="Variance Percentage">10.00%</td>
                        <td class="text-right actions-cell" data-label="Actions">
                            <button class="action-menu-btn">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                            </button>
                        </td>
                    </tr>

                    <!-- Row 4 -->
                    <tr>
                        <td class="col-budget" data-label="Budget">Marketing Budget</td>
                        <td class="col-date" data-label="Date">
                            <span class="date-badge"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2024-02-28</span>
                        </td>
                        <td class="col-utilization" data-label="Utilization">
                            <div class="util-header">
                                <span>Total: $50,000.00</span>
                                <span class="text-muted">(50%)</span>
                            </div>
                            <div class="progress-bar-bg">
                                <div class="progress-bar-fill bg-green" style="width: 50%;"></div>
                            </div>
                            <div class="util-footer">
                                <span class="text-red">Spent: $25,000.00</span>
                                <span class="text-green">Left: $25,000.00</span>
                            </div>
                        </td>
                        <td class="col-variance" data-label="Variance">$0.00</td>
                        <td class="col-variance-perc" data-label="Variance Percentage">0.00%</td>
                        <td class="text-right actions-cell" data-label="Actions">
                            <button class="action-menu-btn">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                            </button>
                        </td>
                    </tr>

                    <!-- Row 5 -->
                    <tr>
                        <td class="col-budget" data-label="Budget">Marketing Budget</td>
                        <td class="col-date" data-label="Date">
                            <span class="date-badge"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2024-01-28</span>
                        </td>
                        <td class="col-utilization" data-label="Utilization">
                            <div class="util-header">
                                <span>Total: $50,000.00</span>
                                <span class="text-muted">(43%)</span>
                            </div>
                            <div class="progress-bar-bg">
                                <div class="progress-bar-fill bg-green" style="width: 43%;"></div>
                            </div>
                            <div class="util-footer">
                                <span class="text-red">Spent: $21,500.00</span>
                                <span class="text-green">Left: $28,500.00</span>
                            </div>
                        </td>
                        <td class="col-variance" data-label="Variance">$0.00</td>
                        <td class="col-variance-perc" data-label="Variance Percentage">0.00%</td>
                        <td class="text-right actions-cell" data-label="Actions">
                            <button class="action-menu-btn">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                            </button>
                        </td>
                    </tr>

                    <!-- Row 6 -->
                    <tr>
                        <td class="col-budget" data-label="Budget">Marketing Budget</td>
                        <td class="col-date" data-label="Date">
                            <span class="date-badge"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2023-12-28</span>
                        </td>
                        <td class="col-utilization" data-label="Utilization">
                            <div class="util-header">
                                <span>Total: $50,000.00</span>
                                <span class="text-muted">(38%)</span>
                            </div>
                            <div class="progress-bar-bg">
                                <div class="progress-bar-fill bg-green" style="width: 38%;"></div>
                            </div>
                            <div class="util-footer">
                                <span class="text-red">Spent: $19,000.00</span>
                                <span class="text-green">Left: $31,000.00</span>
                            </div>
                        </td>
                        <td class="col-variance" data-label="Variance">$0.00</td>
                        <td class="col-variance-perc" data-label="Variance Percentage">0.00%</td>
                        <td class="text-right actions-cell" data-label="Actions">
                            <button class="action-menu-btn">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                            </button>
                        </td>
                    </tr>

                    <!-- Row 7 -->
                    <tr>
                        <td class="col-budget" data-label="Budget">Marketing Budget</td>
                        <td class="col-date" data-label="Date">
                            <span class="date-badge"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2023-11-28</span>
                        </td>
                        <td class="col-utilization" data-label="Utilization">
                            <div class="util-header">
                                <span>Total: $50,000.00</span>
                                <span class="text-muted">(32%)</span>
                            </div>
                            <div class="progress-bar-bg">
                                <div class="progress-bar-fill bg-green" style="width: 32%;"></div>
                            </div>
                            <div class="util-footer">
                                <span class="text-red">Spent: $16,000.00</span>
                                <span class="text-green">Left: $34,000.00</span>
                            </div>
                        </td>
                        <td class="col-variance" data-label="Variance">$0.00</td>
                        <td class="col-variance-perc" data-label="Variance Percentage">0.00%</td>
                        <td class="text-right actions-cell" data-label="Actions">
                            <button class="action-menu-btn">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                            </button>
                        </td>
                    </tr>

                    <!-- Row 8 -->
                    <tr>
                        <td class="col-budget" data-label="Budget">Marketing Budget</td>
                        <td class="col-date" data-label="Date">
                            <span class="date-badge"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2023-10-28</span>
                        </td>
                        <td class="col-utilization" data-label="Utilization">
                            <div class="util-header">
                                <span>Total: $50,000.00</span>
                                <span class="text-muted">(27%)</span>
                            </div>
                            <div class="progress-bar-bg">
                                <div class="progress-bar-fill bg-green" style="width: 27%;"></div>
                            </div>
                            <div class="util-footer">
                                <span class="text-red">Spent: $13,500.00</span>
                                <span class="text-green">Left: $36,500.00</span>
                            </div>
                        </td>
                        <td class="col-variance" data-label="Variance">$0.00</td>
                        <td class="col-variance-perc" data-label="Variance Percentage">0.00%</td>
                        <td class="text-right actions-cell" data-label="Actions">
                            <button class="action-menu-btn">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                            </button>
                        </td>
                    </tr>

                    <!-- Row 9 -->
                    <tr>
                        <td class="col-budget" data-label="Budget">Marketing Budget</td>
                        <td class="col-date" data-label="Date">
                            <span class="date-badge"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2023-09-28</span>
                        </td>
                        <td class="col-utilization" data-label="Utilization">
                            <div class="util-header">
                                <span>Total: $50,000.00</span>
                                <span class="text-muted">(20%)</span>
                            </div>
                            <div class="progress-bar-bg">
                                <div class="progress-bar-fill bg-green" style="width: 20%;"></div>
                            </div>
                            <div class="util-footer">
                                <span class="text-red">Spent: $10,000.00</span>
                                <span class="text-green">Left: $40,000.00</span>
                            </div>
                        </td>
                        <td class="col-variance" data-label="Variance">$0.00</td>
                        <td class="col-variance-perc" data-label="Variance Percentage">0.00%</td>
                        <td class="text-right actions-cell" data-label="Actions">
                            <button class="action-menu-btn">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                            </button>
                        </td>
                    </tr>

                    <!-- Row 10 -->
                    <tr>
                        <td class="col-budget" data-label="Budget">Marketing Budget</td>
                        <td class="col-date" data-label="Date">
                            <span class="date-badge"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 2023-08-28</span>
                        </td>
                        <td class="col-utilization" data-label="Utilization">
                            <div class="util-header">
                                <span>Total: $50,000.00</span>
                                <span class="text-muted">(15%)</span>
                            </div>
                            <div class="progress-bar-bg">
                                <div class="progress-bar-fill bg-green" style="width: 15%;"></div>
                            </div>
                            <div class="util-footer">
                                <span class="text-red">Spent: $7,500.00</span>
                                <span class="text-green">Left: $42,500.00</span>
                            </div>
                        </td>
                        <td class="col-variance" data-label="Variance">$0.00</td>
                        <td class="col-variance-perc" data-label="Variance Percentage">0.00%</td>
                        <td class="text-right actions-cell" data-label="Actions">
                            <button class="action-menu-btn">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- GRID VIEW CONTAINER (Hidden by default) -->
        <div class="grid-view-container" id="gridViewContainer" style="display: none;">
            
            <!-- Card 1 -->
            <div class="budget-card">
                <div class="card-header">
                    <div class="card-title-group">
                        <h4 class="card-title">Marketing Budget</h4>
                        <span class="card-subtitle">2024-05-30</span>
                    </div>
                    <button class="action-menu-btn">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                    </button>
                </div>
                
                <div class="card-data-rows">
                    <div class="card-data-row">
                        <span class="data-label">Total:</span>
                        <span class="data-value">$50,000.00</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label">Percentage:</span>
                        <span class="data-value text-muted">(100%)</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label text-red">Spent:</span>
                        <span class="data-value text-red">$50,000.00</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label text-green">Left:</span>
                        <span class="data-value text-green">$0.00</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label">Variance:</span>
                        <span class="data-value">$0.00</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label">Variance %:</span>
                        <span class="data-value">0.00%</span>
                    </div>
                </div>

                <div class="card-footer">
                    <span class="badge badge-green">Active</span>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="budget-card">
                <div class="card-header">
                    <div class="card-title-group">
                        <h4 class="card-title">Marketing Budget</h4>
                        <span class="card-subtitle">2024-04-29</span>
                    </div>
                    <button class="action-menu-btn">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                    </button>
                </div>
                
                <div class="card-data-rows">
                    <div class="card-data-row">
                        <span class="data-label">Total:</span>
                        <span class="data-value">$50,000.00</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label">Percentage:</span>
                        <span class="data-value text-muted">(97%)</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label text-red">Spent:</span>
                        <span class="data-value text-red">$48,500.00</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label text-green">Left:</span>
                        <span class="data-value text-green">$1,500.00</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label">Variance:</span>
                        <span class="data-value">$1,500.00</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label">Variance %:</span>
                        <span class="data-value">3.00%</span>
                    </div>
                </div>

                <div class="card-footer">
                    <span class="badge badge-green">Active</span>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="budget-card">
                <div class="card-header">
                    <div class="card-title-group">
                        <h4 class="card-title">Marketing Budget</h4>
                        <span class="card-subtitle">2024-03-30</span>
                    </div>
                    <button class="action-menu-btn">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                    </button>
                </div>
                
                <div class="card-data-rows">
                    <div class="card-data-row">
                        <span class="data-label">Total:</span>
                        <span class="data-value">$50,000.00</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label">Percentage:</span>
                        <span class="data-value text-muted">(84%)</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label text-red">Spent:</span>
                        <span class="data-value text-red">$42,000.00</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label text-green">Left:</span>
                        <span class="data-value text-green">$8,000.00</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label">Variance:</span>
                        <span class="data-value">$5,000.00</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label">Variance %:</span>
                        <span class="data-value">10.00%</span>
                    </div>
                </div>

                <div class="card-footer">
                    <span class="badge badge-green">Active</span>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="budget-card">
                <div class="card-header">
                    <div class="card-title-group">
                        <h4 class="card-title">Marketing Budget</h4>
                        <span class="card-subtitle">2024-02-28</span>
                    </div>
                    <button class="action-menu-btn">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                    </button>
                </div>
                
                <div class="card-data-rows">
                    <div class="card-data-row">
                        <span class="data-label">Total:</span>
                        <span class="data-value">$50,000.00</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label">Percentage:</span>
                        <span class="data-value text-muted">(50%)</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label text-red">Spent:</span>
                        <span class="data-value text-red">$25,000.00</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label text-green">Left:</span>
                        <span class="data-value text-green">$25,000.00</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label">Variance:</span>
                        <span class="data-value">$0.00</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label">Variance %:</span>
                        <span class="data-value">0.00%</span>
                    </div>
                </div>

                <div class="card-footer">
                    <span class="badge badge-green">Active</span>
                </div>
            </div>

            <!-- Card 5 -->
            <div class="budget-card">
                <div class="card-header">
                    <div class="card-title-group">
                        <h4 class="card-title">Marketing Budget</h4>
                        <span class="card-subtitle">2024-01-28</span>
                    </div>
                    <button class="action-menu-btn">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                    </button>
                </div>
                
                <div class="card-data-rows">
                    <div class="card-data-row">
                        <span class="data-label">Total:</span>
                        <span class="data-value">$50,000.00</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label">Percentage:</span>
                        <span class="data-value text-muted">(43%)</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label text-red">Spent:</span>
                        <span class="data-value text-red">$21,500.00</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label text-green">Left:</span>
                        <span class="data-value text-green">$28,500.00</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label">Variance:</span>
                        <span class="data-value">$0.00</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label">Variance %:</span>
                        <span class="data-value">0.00%</span>
                    </div>
                </div>

                <div class="card-footer">
                    <span class="badge badge-green">Active</span>
                </div>
            </div>

            <!-- Card 6 -->
            <div class="budget-card">
                <div class="card-header">
                    <div class="card-title-group">
                        <h4 class="card-title">Marketing Budget</h4>
                        <span class="card-subtitle">2023-12-28</span>
                    </div>
                    <button class="action-menu-btn">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                    </button>
                </div>
                
                <div class="card-data-rows">
                    <div class="card-data-row">
                        <span class="data-label">Total:</span>
                        <span class="data-value">$50,000.00</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label">Percentage:</span>
                        <span class="data-value text-muted">(38%)</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label text-red">Spent:</span>
                        <span class="data-value text-red">$19,000.00</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label text-green">Left:</span>
                        <span class="data-value text-green">$31,000.00</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label">Variance:</span>
                        <span class="data-value">$0.00</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label">Variance %:</span>
                        <span class="data-value">0.00%</span>
                    </div>
                </div>

                <div class="card-footer">
                    <span class="badge badge-green">Active</span>
                </div>
            </div>

            <!-- Card 7 -->
            <div class="budget-card">
                <div class="card-header">
                    <div class="card-title-group">
                        <h4 class="card-title">Marketing Budget</h4>
                        <span class="card-subtitle">2023-11-28</span>
                    </div>
                    <button class="action-menu-btn">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                    </button>
                </div>
                
                <div class="card-data-rows">
                    <div class="card-data-row">
                        <span class="data-label">Total:</span>
                        <span class="data-value">$50,000.00</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label">Percentage:</span>
                        <span class="data-value text-muted">(32%)</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label text-red">Spent:</span>
                        <span class="data-value text-red">$16,000.00</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label text-green">Left:</span>
                        <span class="data-value text-green">$34,000.00</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label">Variance:</span>
                        <span class="data-value">$0.00</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label">Variance %:</span>
                        <span class="data-value">0.00%</span>
                    </div>
                </div>

                <div class="card-footer">
                    <span class="badge badge-green">Active</span>
                </div>
            </div>

            <!-- Card 8 -->
            <div class="budget-card">
                <div class="card-header">
                    <div class="card-title-group">
                        <h4 class="card-title">Marketing Budget</h4>
                        <span class="card-subtitle">2023-10-28</span>
                    </div>
                    <button class="action-menu-btn">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                    </button>
                </div>
                
                <div class="card-data-rows">
                    <div class="card-data-row">
                        <span class="data-label">Total:</span>
                        <span class="data-value">$50,000.00</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label">Percentage:</span>
                        <span class="data-value text-muted">(27%)</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label text-red">Spent:</span>
                        <span class="data-value text-red">$13,500.00</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label text-green">Left:</span>
                        <span class="data-value text-green">$36,500.00</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label">Variance:</span>
                        <span class="data-value">$0.00</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label">Variance %:</span>
                        <span class="data-value">0.00%</span>
                    </div>
                </div>

                <div class="card-footer">
                    <span class="badge badge-green">Active</span>
                </div>
            </div>

            <!-- Card 9 -->
            <div class="budget-card">
                <div class="card-header">
                    <div class="card-title-group">
                        <h4 class="card-title">Marketing Budget</h4>
                        <span class="card-subtitle">2023-09-28</span>
                    </div>
                    <button class="action-menu-btn">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                    </button>
                </div>
                
                <div class="card-data-rows">
                    <div class="card-data-row">
                        <span class="data-label">Total:</span>
                        <span class="data-value">$50,000.00</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label">Percentage:</span>
                        <span class="data-value text-muted">(20%)</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label text-red">Spent:</span>
                        <span class="data-value text-red">$10,000.00</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label text-green">Left:</span>
                        <span class="data-value text-green">$40,000.00</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label">Variance:</span>
                        <span class="data-value">$0.00</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label">Variance %:</span>
                        <span class="data-value">0.00%</span>
                    </div>
                </div>

                <div class="card-footer">
                    <span class="badge badge-green">Active</span>
                </div>
            </div>

            <!-- Card 10 -->
            <div class="budget-card">
                <div class="card-header">
                    <div class="card-title-group">
                        <h4 class="card-title">Marketing Budget</h4>
                        <span class="card-subtitle">2023-08-28</span>
                    </div>
                    <button class="action-menu-btn">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                    </button>
                </div>
                
                <div class="card-data-rows">
                    <div class="card-data-row">
                        <span class="data-label">Total:</span>
                        <span class="data-value">$50,000.00</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label">Percentage:</span>
                        <span class="data-value text-muted">(15%)</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label text-red">Spent:</span>
                        <span class="data-value text-red">$7,500.00</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label text-green">Left:</span>
                        <span class="data-value text-green">$42,500.00</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label">Variance:</span>
                        <span class="data-value">$0.00</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label">Variance %:</span>
                        <span class="data-value">0.00%</span>
                    </div>
                </div>

                <div class="card-footer">
                    <span class="badge badge-green">Active</span>
                </div>
            </div>

        </div>

        <!-- Footer Pagination -->
        <div class="table-footer">
            <div class="results-info">Showing 1 to 10 of 10 results</div>
            <div class="pagination">
                <button class="page-btn disabled">Previous</button>
                <button class="page-btn active">1</button>
                <button class="page-btn disabled">Next</button>
            </div>
        </div>
    </div>
</div>

<!-- TEMPLATE FOR 3-DOT ACTION MENU -->
<template id="action-menu-template">
    <div class="action-dropdown">
        <button class="action-dropdown-item">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
            Edit
        </button>
        <button class="action-dropdown-item text-danger">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
            Delete
        </button>
    </div>
</template>

@endsection

@section('scripts')
    <script src="{{ asset('js/Budget-Planner/Budget-Monitoring.js') }}"></script>
@endsection