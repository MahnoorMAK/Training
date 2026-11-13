@extends('Layout.Dashboard')

@section('title', 'Budget Allocations - Apexbooks')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/Budget-Allocations/Budget-Allocations.css') }}">
@endsection

@section('content')
<div class="budget-page-wrapper">
    
    <!-- Header Section -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Budget Allocations</h1>
            <p class="page-subtitle">Allocate and track budget distributions across different accounts and monitor real-time consumption.</p>
        </div>
        <a href="#" class="btn-add">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
        </a>
    </div>

    <!-- Stats Cards -->
    <div class="stats-grid">
        <!-- Total Allocations -->
        <div class="stat-card border-blue">
            <div class="stat-content">
                <span class="stat-label text-blue">Total Allocations</span>
                <h2 class="stat-value text-blue" id="totalAllocationsCount">0</h2>
                <span class="stat-desc text-blue">Active account allocations</span>
            </div>
            <div class="stat-icon bg-blue-light text-blue">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
            </div>
        </div>

        <!-- Total Allocated -->
        <div class="stat-card border-green">
            <div class="stat-content">
                <span class="stat-label text-green">Total Allocated</span>
                <h2 class="stat-value text-green" id="totalAllocatedAmount">$0.00</h2>
                <span class="stat-desc text-green">Allocated to accounts</span>
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
                    <span class="badge-orange" id="spendingPercentage">0%</span>
                </div>
                
                <h2 class="stat-value text-orange" id="totalSpentAmount">$0.00</h2>
                
                <div class="progress-bar-bg">
                    <div class="progress-bar-fill bg-orange" id="spendingProgressBar" style="width: 0%;"></div>
                </div>
                
                <div class="spending-footer">
                    <span class="text-orange" id="spentText">Spent: $0.00</span>
                    <span class="remaining-text" id="remainingText">Remaining: $0.00</span>
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
                    <input type="text" class="search-input" placeholder="Search Budget Allocations...">
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
                    <label>Account</label>
                    <div class="custom-dropdown">
                        <button class="custom-dropdown-btn">
                            <span>Filter by Account</span>
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

        <!-- Table Container (Toggles to Grid) -->
        <div class="table-container" id="viewContainer">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Budget</th>
                        <th>Account</th>
                        <th>Utilization</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Row 1 -->
                    <tr>
                        <td class="col-budget" data-label="Budget">Marketing Budget</td>
                        <td class="col-account" data-label="Account"><span class="badge badge-green">Cash</span></td>
                        <td class="col-utilization" data-label="Utilization">
                            <div class="util-header">
                                <span>Total: $20,000.00</span>
                                <span class="text-muted">(25%)</span>
                            </div>
                            <div class="progress-bar-bg">
                                <div class="progress-bar-fill bg-green" style="width: 25%;"></div>
                            </div>
                            <div class="util-footer">
                                <span class="text-red">Spent: $5,000.00</span>
                                <span class="text-green">Left: $15,000.00</span>
                            </div>
                        </td>
                        <td class="text-right actions-cell" data-label="Actions">
                            <button class="action-menu-btn">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                            </button>
                        </td>
                    </tr>

                    <!-- Row 2 -->
                    <tr>
                        <td class="col-budget" data-label="Budget">Marketing Budget</td>
                        <td class="col-account" data-label="Account"><span class="badge badge-orange">Petty Cash</span></td>
                        <td class="col-utilization" data-label="Utilization">
                            <div class="util-header">
                                <span>Total: $15,000.00</span>
                                <span class="text-muted">(17%)</span>
                            </div>
                            <div class="progress-bar-bg">
                                <div class="progress-bar-fill bg-green" style="width: 17%;"></div>
                            </div>
                            <div class="util-footer">
                                <span class="text-red">Spent: $2,500.00</span>
                                <span class="text-green">Left: $12,500.00</span>
                            </div>
                        </td>
                        <td class="text-right actions-cell" data-label="Actions">
                            <button class="action-menu-btn">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                            </button>
                        </td>
                    </tr>

                    <!-- Row 3 -->
                    <tr>
                        <td class="col-budget" data-label="Budget">Marketing Budget</td>
                        <td class="col-account" data-label="Account"><span class="badge badge-purple">Bank Account - Main</span></td>
                        <td class="col-utilization" data-label="Utilization">
                            <div class="util-header">
                                <span>Total: $10,000.00</span>
                                <span class="text-muted">(0%)</span>
                            </div>
                            <div class="progress-bar-bg">
                                <div class="progress-bar-fill bg-green" style="width: 0%;"></div>
                            </div>
                            <div class="util-footer">
                                <span class="text-red">Spent: $0.00</span>
                                <span class="text-green">Left: $10,000.00</span>
                            </div>
                        </td>
                        <td class="text-right actions-cell" data-label="Actions">
                            <button class="action-menu-btn">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                            </button>
                        </td>
                    </tr>

                    <!-- Row 4 -->
                    <tr>
                        <td class="col-budget" data-label="Budget">Marketing Budget</td>
                        <td class="col-account" data-label="Account"><span class="badge badge-red">Bank Account - Savings</span></td>
                                                <td class="col-utilization" data-label="Utilization">
                            <!-- Total Row -->
                            <div class="util-row">
                                <span class="util-label">Total</span>
                                <span class="util-value">$20,000.00</span>
                            </div>
                            
                            <!-- Percentage Row -->
                            <div class="util-row util-percentage-row">
                                <span class="text-muted">(25%)</span>
                            </div>

                            <!-- Spent Row -->
                            <div class="util-row">
                                <span class="text-red">Spent</span>
                                <span class="text-red font-bold">$5,000.00</span>
                            </div>

                            <!-- Left Row -->
                            <div class="util-row">
                                <span class="text-green">Left</span>
                                <span class="text-green font-bold">$15,000.00</span>
                            </div>
                        </td>
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
                        <span class="card-subtitle">Cash Account</span>
                    </div>
                    <button class="action-menu-btn">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                    </button>
                </div>
                
                <div class="card-data-rows">
                    <div class="card-data-row">
                        <span class="data-label">Total:</span>
                        <span class="data-value">$20,000.00</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label">Percentage:</span>
                        <span class="data-value text-muted">(25%)</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label text-red">Spent:</span>
                        <span class="data-value text-red">$5,000.00</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label text-green">Left:</span>
                        <span class="data-value text-green">$15,000.00</span>
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
                        <span class="card-subtitle">Petty Cash</span>
                    </div>
                    <button class="action-menu-btn">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                    </button>
                </div>
                
                <div class="card-data-rows">
                    <div class="card-data-row">
                        <span class="data-label">Total:</span>
                        <span class="data-value">$15,000.00</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label">Percentage:</span>
                        <span class="data-value text-muted">(17%)</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label text-red">Spent:</span>
                        <span class="data-value text-red">$2,500.00</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label text-green">Left:</span>
                        <span class="data-value text-green">$12,500.00</span>
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
                        <span class="card-subtitle">Bank Account - Main</span>
                    </div>
                    <button class="action-menu-btn">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                    </button>
                </div>
                
                <div class="card-data-rows">
                    <div class="card-data-row">
                        <span class="data-label">Total:</span>
                        <span class="data-value">$10,000.00</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label">Percentage:</span>
                        <span class="data-value text-muted">(0%)</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label text-red">Spent:</span>
                        <span class="data-value text-red">$0.00</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label text-green">Left:</span>
                        <span class="data-value text-green">$10,000.00</span>
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
                        <span class="card-subtitle">Bank Account - Savings</span>
                    </div>
                    <button class="action-menu-btn">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                    </button>
                </div>
                
                <div class="card-data-rows">
                    <div class="card-data-row">
                        <span class="data-label">Total:</span>
                        <span class="data-value">$8,000.00</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label">Percentage:</span>
                        <span class="data-value text-muted">(15%)</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label text-red">Spent:</span>
                        <span class="data-value text-red">$1,200.00</span>
                    </div>
                    <div class="card-data-row">
                        <span class="data-label text-green">Left:</span>
                        <span class="data-value text-green">$6,800.00</span>
                    </div>
                </div>

                <div class="card-footer">
                    <span class="badge badge-green">Active</span>
                </div>
            </div>

        </div>
        <!-- Footer Pagination -->
        <div class="table-footer">
            <div class="results-info">Showing 1 to 4 of 4 results</div>
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
    <script src="{{ asset('js/Budget-Allocations/Budget-Allocations.js') }}"></script>
@endsection