{{-- resources/views/Pages/Contact.blade.php --}}
@extends('Layout.app')

@section('title', 'Contact Us - Apexbooks')

@section('styles')
    {{-- Contact page styles --}}
    
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

@section('content')

{{-- ============================================
     HERO
     ============================================ --}}
<section class="contact-hero">
    <div class="hero-scene" aria-hidden="true">
        <div class="cube c1"></div>
        <div class="cube c2"></div>
        <div class="cube c3"></div>
        <div class="cube c4"></div>
    </div>

    <div class="hero-inner">
        <span class="hero-eyebrow">
            <i class="fa-solid fa-paper-plane"></i>
            Contact Us
        </span>
        <h1 class="hero-title">
            Let's talk about <span class="accent">your books.</span>
        </h1>
        <p class="hero-subtitle">
            Questions about pricing, onboarding, or integrations? Our team typically
            replies within one business day. Choose whichever channel works best for you.
        </p>
    </div>
</section>

@include('Component.contact-block')
@include('Component.support-hours')
@include('Component.location-map')
@include('Component.self-service')

{{-- ============================================
     FAQ / QUICK LINKS
     ============================================ --}}
<section class="bottom-section">
    <div class="section-head">
        <span class="section-eyebrow">Other ways to reach us</span>
        <h2 class="section-title">Find answers faster.</h2>
        <p class="section-subtitle">
            Many questions are already answered in our docs and community. Take a look before reaching out.
        </p>
    </div>

    <div class="faq-grid">
        <div class="faq-card">
            <i class="fa-solid fa-book-open"></i>
            <h4>Documentation</h4>
            <p>Guides, tutorials, and API references to get you set up quickly.</p>
            <a href="#">Browse docs <i class="fa-solid fa-arrow-right"></i></a>
        </div>
        <div class="faq-card">
            <i class="fa-solid fa-circle-question"></i>
            <h4>Help Center</h4>
            <p>Answers to the most common questions from customers and prospects.</p>
            <a href="#">Visit help center <i class="fa-solid fa-arrow-right"></i></a>
        </div>
        <div class="faq-card">
            <i class="fa-solid fa-comments"></i>
            <h4>Community</h4>
            <p>Join other finance teams and accountants sharing tips and best practices.</p>
            <a href="#">Join community <i class="fa-solid fa-arrow-right"></i></a>
        </div>
        <div class="faq-card">
            <i class="fa-solid fa-calendar-check"></i>
            <h4>Book a Demo</h4>
            <p>See Apexbooks in action with a guided walkthrough from our team.</p>
            <a href="/register">Request a demo <i class="fa-solid fa-arrow-right"></i></a>
        </div>
    </div>
</section>

@endsection

@section('scripts')
    <script src="{{ asset('js/contact.js') }}"></script>
@endsection