@extends('Layout.dashboard')

@section('title', 'Settings - Apexbooks')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/Settings/settings.css') }}">
@endsection

@section('content')
<div class="settings-page-wrapper">
    
    <h1 class="settings-title">Settings</h1>
    <p class="settings-text">Manage your system settings.</p>

    <div class="settings-layout">

        <!-- LEFT MENU -->
        <div class="settings-menu">
            <p class="settings-group">Core Configuration</p>
            
            <a href="#" class="settings-link active" data-section="section-brand">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="13.5" cy="6.5" r=".5"/><circle cx="17.5" cy="10.5" r=".5"/><circle cx="8.5" cy="7.5" r=".5"/><circle cx="6.5" cy="12.5" r=".5"/><path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10c.926 0 1.648-.746 1.648-1.688 0-.437-.18-.835-.437-1.125-.29-.289-.438-.652-.438-1.125a1.64 1.64 0 0 1 1.668-1.668h1.996c3.051 0 5.555-2.503 5.555-5.554C21.965 6.012 17.461 2 12 2z"/></svg>
                Brand Settings
            </a>
            <a href="#" class="settings-link" data-section="section-system">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
                System Settings
            </a>
            <a href="#" class="settings-link" data-section="section-company">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="4" y="2" width="16" height="20" rx="2" ry="2"/><path d="M9 22v-4h6v4"/><path d="M8 6h.01"/><path d="M16 6h.01"/><path d="M12 6h.01"/></svg>
                Company Settings
            </a>
            
            <p class="settings-group">Integrations & Contact</p>
            <a href="#" class="settings-link" data-section="section-contact">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                Contact Settings
            </a>
        </div>

        <!-- MAIN CONTENT -->
        <div class="settings-main">

            <!-- 1. BRAND SETTINGS -->
            <div class="section active" id="section-brand">
                <div class="settings-card">
                    <div class="settings-top">
                        <div>
                            <h3 class="settings-heading" id="brandHeading">Brand Settings</h3>
                            <p class="settings-small">Customize your application's branding and appearance</p>
                        </div>
                        <button class="save-btn" id="brandSave">Save Changes</button>
                    </div>

                    <div class="tabs">
                        <button class="tab-btn active" data-tab="tab-font">Font</button>
                        <button class="tab-btn" data-tab="tab-text">Text</button>
                        <button class="tab-btn" data-tab="tab-theme">Theme</button>
                        <button class="tab-btn" data-tab="tab-logo">Logo</button>
                    </div>

                    <!-- Tab: Font -->
                    <div class="tab-panel active" id="tab-font">
                        <div class="form-group">
                            <label class="label">Website Font</label>
                            <p class="settings-small">Select your primary font.</p>
                            
                            <div class="font-row">
                                <button type="button" class="font-btn active font-inter" data-font="'Inter', sans-serif">Inter</button>
                                <button type="button" class="font-btn font-segoe" data-font="'Segoe UI', sans-serif">Segoe UI</button>
                                <button type="button" class="font-btn font-poppins" data-font="'Poppins', sans-serif">Poppins</button>
                                <button type="button" class="font-btn font-roboto" data-font="'Roboto', sans-serif">Roboto</button>
                                <button type="button" class="font-btn font-noto" data-font="'Noto Serif', serif">Noto Serif</button>
                            </div>
                        </div>
                    </div>

                    <!-- Tab: Text -->
                    <div class="tab-panel" id="tab-text">
                        <div class="form-group">
                            <label class="label">Title Text</label>
                            <input type="text" class="text-input" id="titleText" value="Apexbooks">
                            <p class="settings-small">Application title displayed in the browser tab</p>
                        </div>
                    </div>

                    <!-- Tab: Theme -->
                    <div class="tab-panel" id="tab-theme">
                        <div class="form-group">
                            <label class="label">Theme Color</label>
                            <p class="settings-small">Select the main brand color for the whole site.</p>
                            
                            <div class="color-grid">
                                <button class="color-box active" data-theme="purple"><span class="color-dot dot-purple"></span><span class="color-name">Purple</span></button>
                                <button class="color-box" data-theme="ocean"><span class="color-dot dot-ocean"></span><span class="color-name">Ocean</span></button>
                                <button class="color-box" data-theme="emerald"><span class="color-dot dot-emerald"></span><span class="color-name">Emerald</span></button>
                                <button class="color-box" data-theme="sunset"><span class="color-dot dot-sunset"></span><span class="color-name">Sunset</span></button>
                                <button class="color-box" data-theme="rose"><span class="color-dot dot-rose"></span><span class="color-name">Rose</span></button>
                                <button class="color-box" data-theme="sky"><span class="color-dot dot-sky"></span><span class="color-name">Sky</span></button>
                            </div>
                        </div>

                        <div class="form-group form-divider">
                            <label class="label">Custom Color</label>
                            <p class="settings-small">Enter a HEX code (e.g. #FF0000) to apply a custom theme.</p>
                            <div class="custom-color-row">
    <div class="custom-color-preview" id="colorPreview"></div>
    <input type="text" class="custom-color-input" value="#7E6BB5" placeholder="#000000">
    <button class="btn-primary">Apply</button>
</div>
                        </div>

                        <div class="form-group form-divider">
                            <label class="label">Appearance Mode</label>
                            <p class="settings-small">Toggle between Light and Dark theme.</p>
                            
                            <button type="button" class="theme-toggle-btn" id="settingsThemeToggle">
                                <span id="settingsThemeText">Switch to Dark Mode</span>
                                <svg id="settingsIconSun" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg>
                                <svg id="settingsIconMoon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>
                            </button>
                        </div>  
                    </div>

                    <!-- Tab: Logo -->
                    <div class="tab-panel" id="tab-logo">
                        <div class="form-group">
                            <label class="label">Company Logo</label>
                            <p class="settings-small">Upload a custom logo for your application.</p>
                            
                            <div class="logo-preview-box" id="logoPreviewBox">
                                <span class="logo-empty-text" id="logoEmptyText">No logo selected</span>
                                <img id="logoPreviewImg" src="" alt="Logo Preview">
                            </div>

                            <input type="file" id="lgFile" accept="image/*" hidden>

                            <div class="logo-actions">
                                <button type="button" class="btn-primary" id="lgChoose">Choose Image</button>
                                <button type="button" class="btn-danger" id="lgDelete">Delete Logo</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 2. SYSTEM SETTINGS -->
            <div class="section" id="section-system">
                <div class="settings-card">
                    <form id="systemSettingsForm" novalidate>
                        <div class="settings-top">
                            <div>
                                <h3 class="settings-heading">System Settings</h3>
                                <p class="settings-small">Configure system-wide settings.</p>
                            </div>
                            <button type="submit" class="save-btn" id="systemSaveBtn">Save Changes</button>
                        </div>
                        
                        <div class="two-cols">
                            <div class="form-group">
                                <label class="label">Time Zone</label>
                                <select class="text-input" name="timezone">
                                    <option>Asia/Karachi</option>
                                    <option>UTC</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="label">Date Format</label>
                                <select class="text-input" name="date_format">
                                    <option>DD-MM-YYYY</option>
                                    <option>MM/DD/YYYY</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="label">Time Format</label>
                                <select class="text-input" name="time_format">
                                    <option>12 Hour (02:30 PM)</option>
                                    <option>24 Hour (14:30)</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="label">Currency</label>
                                <select class="text-input" name="currency">
                                    <option>USD - US Dollar</option>
                                    <option>PKR - Pakistani Rupee</option>
                                </select>
                            </div>
                            <div class="form-group full-width">
                                <label class="label">Symbol Position</label>
                                <select class="text-input" name="symbol_position">
                                    <option>Before amount (Rs 100)</option>
                                    <option>After amount (100 Rs)</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- 3. COMPANY SETTINGS -->
            <div class="section" id="section-company">
                <div class="settings-card">
                    <form id="companySettingsForm" novalidate>
                        <div class="settings-top">
                            <div>
                                <h3 class="settings-heading">Company Settings</h3>
                                <p class="settings-small">Your company details shown on invoices</p>
                            </div>
                            <button type="submit" class="save-btn" id="companySaveBtn">Save Changes</button>
                        </div>
                        <div class="two-cols">
                            <div class="form-group">
                                <label class="label">Company Name <span class="required">*</span></label>
                                <input type="text" class="text-input" name="company_name" value="nestle" required data-validation="name">
                                <small class="field-error"></small>
                            </div>
                            <div class="form-group">
                                <label class="label">Registration Number</label>
                                <input type="text" class="text-input" name="registration_number" value="254189786">
                            </div>
                            <div class="form-group">
                                <label class="label">Phone Number <span class="required">*</span></label>
                                <input type="tel" class="text-input" name="phone" value="03001234567" required data-validation="phone">
                                <small class="field-error"></small>
                            </div>
                            <div class="form-group">
                                <label class="label">Company Email <span class="required">*</span></label>
                                <input type="email" class="text-input" name="email" value="test@gmail.com" required data-validation="email">
                                <small class="field-error"></small>
                            </div>
                            <div class="form-group">
                                <label class="label">Invoice Date Format</label>
                                <select class="text-input" name="invoice_date_format">
                                    <option>DD-MM-YYYY</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="label">Invoice Time Format</label>
                                <select class="text-input" name="invoice_time_format">
                                    <option>24 Hour (14:30)</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- 4. CONTACT SETTINGS -->
            <div class="section" id="section-contact">
                <div class="settings-card">
                    <form id="contactSettingsForm" novalidate>
                        <div class="settings-top">
                            <div>
                                <h3 class="settings-heading">Contact Settings</h3>
                                <p class="settings-small">How your clients can reach you</p>
                            </div>
                            <button type="submit" class="save-btn" id="contactSaveBtn">Save Changes</button>
                        </div>
                        <div class="two-cols">
                            <div class="form-group">
                                <label class="label">Phone <span class="required">*</span></label>
                                <input type="tel" class="text-input" name="contact_phone" value="03002182880" required data-validation="phone">
                                <small class="field-error"></small>
                            </div>
                            <div class="form-group">
                                <label class="label">WhatsApp <span class="required">*</span></label>
                                <input type="tel" class="text-input" name="whatsapp" value="03008678901" required data-validation="phone">
                                <small class="field-error"></small>
                            </div>
                            <div class="form-group">
                                <label class="label">Email <span class="required">*</span></label>
                                <input type="email" class="text-input" name="contact_email" value="abc@gmail.com" required data-validation="email">
                                <small class="field-error"></small>
                            </div>
                            <div class="form-group">
                                <label class="label">Website</label>
                                <input type="text" class="text-input" name="website" value="www.abc.com" data-validation="url">
                                <small class="field-error"></small>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/Settings/settings.js') }}"></script>
@endsection