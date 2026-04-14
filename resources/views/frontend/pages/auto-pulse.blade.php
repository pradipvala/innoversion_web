@extends('frontend.layouts.app')

@section('title', 'Auto Pulse - Automobile Dealer Principal ERP')

@section('content')
    <link
        href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@700;900&family=Barlow:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <style>
        .ap-main {
            --red: #E2010F;
            --red-dark: #96281b;
            --dark: #0a0a0f;
            --dark2: #12121a;
            --dark3: #1a1a26;
            --card-bg: rgba(255, 255, 255, 0.04);
            --border: rgba(255, 255, 255, 0.1);
            --text: #f0f0f0;
            --muted: #a0a0b0;
            --accent: #E2010F;
            font-family: 'Barlow', sans-serif;
            background: var(--dark);
            color: var(--text);
        }

        body.lightmode .ap-main {
            --dark: #f5f7fb;
            --dark2: #ffffff;
            --dark3: #eef1f8;
            --card-bg: rgba(12, 18, 38, 0.04);
            --border: rgba(12, 18, 38, 0.12);
            --text: #161a26;
            --muted: #5a6073;
            --accent: #E2010F;
            background: var(--dark);
            color: var(--text);
        }

        .ap-main p {
            margin-bottom: 0;
        }

        .ap-main,
        .ap-main * {
            box-sizing: border-box;
        }

        .ap-main a {
            text-decoration: none;
        }

        /* HERO */
        .ap-main .hero {
            padding-top: 100px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding-bottom: 4rem;
            padding-left: 2rem;
            padding-right: 2rem;
            position: relative;
            overflow: hidden;
        }

        .ap-main .hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(ellipse at center, rgba(192, 57, 43, 0.15) 0%, transparent 70%);
        }

        .ap-main .hero-badge {
            background: rgba(192, 57, 43, 0.15);
            border: 1px solid rgba(192, 57, 43, 0.4);
            font-size: 0.78rem;
            letter-spacing: 3px;
            text-transform: uppercase;
            padding: 0.4rem 1.2rem;
            border-radius: 2px;
            margin-bottom: 2rem;
            display: inline-block;
        }

        .ap-main .hero h1 {
            font-family: 'Barlow Condensed', sans-serif;
            font-size: clamp(4rem, 12vw, 9rem);
            font-weight: 900;
            line-height: 0.9;
            letter-spacing: -2px;
            text-transform: uppercase;
            position: relative;
            margin: 0;
        }

        .ap-main .hero h1 .pulse {
            color: var(--accent);
        }

        .ap-main .hero-sub {
            font-size: 1.1rem;
            color: var(--muted);
            margin: 1.5rem 0 0.5rem;
            letter-spacing: 4px;
            text-transform: uppercase;
        }

        .ap-main .hero-tagline {
            font-size: 1.4rem;
            color: rgba(255, 255, 255, 0.85);
            margin: 1rem 0 2.5rem;
            font-weight: 300;
            max-width: 600px;
            line-height: 1.4;
        }

        .ap-main .hero-tagline strong {
            color: white;
            font-weight: 600;
        }

        .ap-main .hero-btns {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            justify-content: center;
            z-index: 2;
            position: relative;
        }

        .ap-main .btn-primary {
            background: var(--red);
            color: white;
            padding: 0.85rem 2.5rem;
            border-radius: 4px;
            font-weight: 600;
            letter-spacing: 2px;
            text-transform: uppercase;
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.2s;
            border: 2px solid var(--red);
        }

        .ap-main .btn-primary:hover {
            background: var(--red-dark);
            border-color: var(--red-dark);
            color: white;
        }

        .ap-main .btn-outline {
            padding: 0.85rem 2.5rem;
            border-radius: 4px;
            font-weight: 600;
            letter-spacing: 2px;
            text-transform: uppercase;
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.2s;
        }

        .ap-main .btn-outline:hover {
            border-color: red;
            color: red;
        }

        .ap-main .hero-stats {
            margin-top: 4rem;
            display: flex;
            gap: 3rem;
            flex-wrap: wrap;
            justify-content: center;
            position: relative;
            z-index: 2;
        }

        .ap-main .stat {
            text-align: center;
        }

        .ap-main .stat-num {
            font-family: 'Barlow Condensed', sans-serif;
            font-size: 2.5rem;
            font-weight: 900;
            color: var(--accent);
            line-height: 1;
        }

        .ap-main .stat-label {
            font-size: 0.78rem;
            color: var(--muted);
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-top: 0.5rem;
        }

        /* SECTIONS */
        .ap-main .section-full {
            max-width: 100%;
            padding: 5rem 2rem;
        }

        .ap-main .section-dark {
            background: var(--dark2);
        }

        .ap-main .section-label {
            font-size: 0.72rem;
            letter-spacing: 4px;
            text-transform: uppercase;
            color: var(--accent);
            margin-bottom: 0.75rem;
            font-family: 'Barlow', sans-serif;
            font-weight: 600;
        }

        .ap-main .section-title {
            font-family: 'Barlow Condensed', sans-serif;
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 900;
            text-transform: uppercase;
            line-height: 1;
            margin-bottom: 1.2rem;
            margin-top: 0;
        }

        .ap-main .section-desc {
            color: var(--muted);
            font-size: 1.05rem;
            max-width: 600px;
            line-height: 1.7;
            margin-bottom: 0;
        }

        .ap-main .section-header {
            margin-bottom: 3rem;
        }

        .ap-main .section-header.center {
            text-align: center;
        }

        .ap-main .section-header.center .section-desc {
            margin: 0 auto;
        }

        /* BRAND STRIP */
        .ap-main .brand-section {
            background: var(--dark2);
            padding: 4rem 2rem;
            text-align: center;
        }

        .ap-main .brand-strip-title {
            font-size: 0.78rem;
            letter-spacing: 4px;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: 2rem;
            font-weight: 600;
        }

        .ap-main .brands-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            justify-content: center;
            align-items: center;
            max-width: 900px;
            margin: 0 auto;
        }

        .ap-main .brand-pill {
            background: rgba(255, 255, 255, 0.96);
            border: 1px solid rgba(255, 255, 255, 0.35);
            width: 94px;
            height: 94px;
            border-radius: 999px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #1f2937;
            transition: all 0.2s;
            padding: 14px;
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.15);
        }

        .ap-main .brand-pill:hover {
            border-color: rgba(226, 1, 15, 0.35);
            background: #ffffff;
            transform: translateY(-2px);
        }

        .ap-main .brand-pill i {
            font-size: 1.15rem;
        }

        .ap-main .brand-logo {
            width: 64px;
            height: 64px;
            object-fit: contain;
            filter: none;
            opacity: 1;
        }

        @media (max-width: 768px) {
            .ap-main .brand-pill {
                width: 76px;
                height: 76px;
                padding: 10px;
            }

            .ap-main .brand-logo {
                width: 50px;
                height: 50px;
            }
        }

        /* FEATURES GRID */
        .ap-main .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1rem;
            background: transparent;
            border: none;
        }

        .ap-main .feature-card {
            background: var(--dark2);
            padding: 2rem 1.75rem;
            cursor: pointer;
            transition: background 0.2s, transform 0.2s, border-color 0.2s;
            position: relative;
            text-align: left;
            border: none;
            border-radius: 16px;
            box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.04);
        }

        .ap-main .feature-card:hover {
            background: var(--dark3);
            transform: translateY(-3px);
        }

        .ap-main .feature-card.active {
            background: linear-gradient(180deg, rgba(226, 1, 15, 0.14), rgba(226, 1, 15, 0.03));
            box-shadow: inset 0 0 0 1px rgba(226, 1, 15, 0.45), 0 8px 24px rgba(0, 0, 0, 0.2);
        }

        body.lightmode .ap-main .feature-card.active {
            background: linear-gradient(180deg, rgba(226, 1, 15, 0.08), rgba(226, 1, 15, 0.02));
        }

        .ap-main .feature-icon {
            width: 48px;
            height: 48px;
            background: rgba(192, 57, 43, 0.15);
            border: none;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            margin-bottom: 1rem;
        }

        .ap-main .feature-title {
            font-family: 'Barlow Condensed', sans-serif;
            font-size: 1.2rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 0.5rem;
            margin-top: 0;
        }

        .ap-main .feature-desc {
            font-size: 0.88rem;
            color: var(--muted);
            line-height: 1.6;
            margin: 0;
        }

        /* PROCESS FLOW */
        .ap-main .flow-strip {
            background: var(--dark2);
            padding: 4rem 2rem;
        }

        .ap-main .flow-inner {
            max-width: 1100px;
            margin: 0 auto;
        }

        .ap-main .flow-steps {
            display: flex;
            align-items: center;
            gap: 0;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 2.5rem;
        }

        .ap-main .flow-step {
            text-align: center;
            padding: 1.5rem 1.2rem;
            background: var(--dark3);
            border: none;
            border-radius: 14px;
            box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.05);
            min-width: 150px;
            position: relative;
            flex: 1;
        }

        .ap-main .flow-step-num {
            font-family: 'Barlow Condensed', sans-serif;
            font-size: 2rem;
            font-weight: 900;
            color: var(--accent);
            line-height: 1;
        }

        .ap-main .flow-step-name {
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 0.3rem;
        }

        .ap-main .flow-arrow {
            color: var(--accent);
            font-size: 1.5rem;
            padding: 0 0.5rem;
            flex-shrink: 0;
        }

        /* MODULES TABS */
        .ap-main .modules-wrap {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .ap-main .module-tabs {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-bottom: 2rem;
        }

        .ap-main .mod-tab {
            background: transparent;
            border: 1px solid var(--border);
            color: var(--muted);
            padding: 0.45rem 1rem;
            font-size: 0.8rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            cursor: pointer;
            border-radius: 3px;
            transition: all 0.2s;
            font-family: 'Barlow', sans-serif;
        }

        .ap-main .mod-tab.active,
        .ap-main .mod-tab:hover {
            background: var(--red);
            border-color: var(--red);
            color: white;
        }

        .ap-main .mod-content {
            display: none;
        }

        .ap-main .mod-content.active {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
        }

        .ap-main .mod-desc {
            color: var(--muted);
            line-height: 1.8;
            font-size: 0.95rem;
        }

        .ap-main .mod-desc h3 {
            margin-top: 0;
        }

        .ap-main .mod-desc p {
            margin-bottom: 1rem;
        }

        .ap-main .mod-title {
            font-family: 'Barlow Condensed', sans-serif;
            font-size: 1.8rem;
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: 1rem;
            color: white;
        }

        body.lightmode .ap-main .mod-title {
            color: var(--text);
        }

        .ap-main .mod-subnote {
            margin-top: 1rem;
            font-size: 0.9rem;
            color: var(--muted);
        }

        .ap-main .mod-points {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            padding-left: 0;
            margin-bottom: 0;
        }

        .ap-main .mod-points li {
            background: rgba(255, 255, 255, 0.03);
            border: none;
            padding: 0.6rem 1rem;
            border-radius: 12px;
            font-size: 0.88rem;
            color: var(--muted);
            box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.04);
        }

        body.lightmode .ap-main .mod-points li {
            background: rgba(12, 18, 38, 0.025);
        }

        /* REPORTS */
        .ap-main .reports-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 1rem;
        }

        .ap-main .report-card {
            background: var(--dark3);
            border: none;
            padding: 1.2rem 1rem;
            border-radius: 14px;
            text-align: center;
            box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.05);
        }

        .ap-main .report-icon {
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
            line-height: 1;
        }

        .ap-main .report-name {
            font-size: 0.88rem;
            font-weight: 600;
            margin: 0;
        }

        /* CTA */
        .ap-main .cta-section {
            padding: 6rem 2rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .ap-main .cta-section::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(ellipse at center, rgba(192, 57, 43, 0.2) 0%, transparent 70%);
        }

        .ap-main .cta-title {
            font-family: 'Barlow Condensed', sans-serif;
            font-size: clamp(2.5rem, 6vw, 5rem);
            font-weight: 900;
            text-transform: uppercase;
            position: relative;
            margin-top: 1rem;
            margin-bottom: 0.5rem;
            line-height: 1.1;
        }

        .ap-main .contact-grid {
            display: flex;
            gap: 2rem;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 2rem;
            position: relative;
        }

        .ap-main .contact-item {
            background: var(--card-bg);
            border: none;
            padding: 1rem 2rem;
            border-radius: 14px;
            text-align: center;
            min-width: 200px;
            box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.07);
        }

        .ap-main .contact-label {
            font-size: 0.72rem;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: var(--muted);
        }

        .ap-main .contact-val {
            font-size: 1.05rem;
            font-weight: 600;
            color: white;
            margin-top: 0.3rem;
        }

        @media (max-width: 768px) {
            .ap-main .mod-content.active {
                grid-template-columns: 1fr;
            }

            .ap-main .flow-steps {
                flex-direction: column;
            }

            .ap-main .flow-arrow {
                transform: rotate(90deg);
                margin: 0.5rem 0;
            }
        }
    </style>

    <div class="ap-main">
        <!-- HERO -->
        <div class="hero">
            <div class="hero-badge">Automobile Dealer Principal ERP</div>
            <h1>AUTO <span class="pulse">PULSE</span></h1>
            <p class="hero-sub">Innoversion Technolab · Enabling Technologies</p>
            <p class="hero-tagline">Simplify dealership workflow <strong>by enabling technologies</strong></p>
            <div class="hero-btns">
                <a href="{{ route('contact') }}" class="btn-primary">Get Free Demo</a>
                <a href="#features" class="btn-outline">Explore Features</a>
            </div>
            <div class="hero-stats">
                <div class="stat">
                    <div class="stat-num">18+</div>
                    <div class="stat-label">Core Modules</div>
                </div>
                <div class="stat">
                    <div class="stat-num">14+</div>
                    <div class="stat-label">Report Types</div>
                </div>
                <div class="stat">
                    <div class="stat-num">20+</div>
                    <div class="stat-label">Brands Supported</div>
                </div>
                <div class="stat">
                    <div class="stat-num">1</div>
                    <div class="stat-label">Platform · Full Control</div>
                </div>
            </div>
        </div>

        <!-- FROM ORDER TO DELIVERY -->
        <div class="flow-strip">
            <div class="flow-inner">
                <div class="section-header center">
                    <div class="section-label">End-to-End Platform</div>
                    <div class="section-title">From Order to Delivery</div>
                    <div class="section-desc">One Platform · Every Process · Complete Control</div>
                </div>
                <div class="flow-steps">
                    <div class="flow-step">
                        <div class="flow-step-num">01</div>
                        <div class="flow-step-name">Order Booking</div>
                    </div>
                    <div class="flow-arrow">→</div>
                    <div class="flow-step">
                        <div class="flow-step-num">02</div>
                        <div class="flow-step-name">Approval</div>
                    </div>
                    <div class="flow-arrow">→</div>
                    <div class="flow-step">
                        <div class="flow-step-num">03</div>
                        <div class="flow-step-name">RTO & Insurance & Finance </div>
                    </div>
                    <div class="flow-arrow">→</div>
                    <div class="flow-step">
                        <div class="flow-step-num">04</div>
                        <div class="flow-step-name">Invoice & Delivery</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- BRAND COMPATIBILITY -->
        <div class="brand-section">
            <div class="brand-strip-title">Works Seamlessly with Top Brands</div>
            <div class="brands-grid">
                <span class="brand-pill" title="ISUZU" aria-label="ISUZU"><img class="brand-logo"
                        src="{{ asset('image/brands/isuzu.svg') }}" alt="ISUZU logo" loading="lazy"></span>
                <span class="brand-pill" title="NISSAN" aria-label="NISSAN"><img class="brand-logo"
                        src="{{ asset('image/brands/nissan.svg') }}" alt="NISSAN logo" loading="lazy"></span>
                <span class="brand-pill" title="BMW" aria-label="BMW"><img class="brand-logo"
                        src="{{ asset('image/brands/bmw.svg') }}" alt="BMW logo" loading="lazy"></span>
                <span class="brand-pill" title="LAND ROVER" aria-label="LAND ROVER"><img class="brand-logo"
                        src="{{ asset('image/brands/land-rover.svg') }}" alt="LAND ROVER logo" loading="lazy"></span>
                <span class="brand-pill" title="CITROEN" aria-label="CITROEN"><img class="brand-logo"
                        src="{{ asset('image/brands/citroen.svg') }}" alt="CITROEN logo" loading="lazy"></span>
                <span class="brand-pill" title="HYUNDAI" aria-label="HYUNDAI"><img class="brand-logo"
                        src="{{ asset('image/brands/hyundai.svg') }}" alt="HYUNDAI logo" loading="lazy"></span>
                <span class="brand-pill" title="JEEP" aria-label="JEEP"><img class="brand-logo"
                        src="{{ asset('image/brands/jeep.svg') }}" alt="JEEP logo" loading="lazy"></span>
                <span class="brand-pill" title="VOLVO" aria-label="VOLVO"><img class="brand-logo"
                        src="{{ asset('image/brands/volvo.svg') }}" alt="VOLVO logo" loading="lazy"></span>
                <span class="brand-pill" title="JAGUAR" aria-label="JAGUAR"><img class="brand-logo"
                        src="{{ asset('image/brands/jaguar.svg') }}" alt="JAGUAR logo" loading="lazy"></span>
                <span class="brand-pill" title="MG" aria-label="MG"><img class="brand-logo"
                        src="{{ asset('image/brands/mg.svg') }}" alt="MG logo" loading="lazy"></span>
                <span class="brand-pill" title="AUDI" aria-label="AUDI"><img class="brand-logo"
                        src="{{ asset('image/brands/audi.svg') }}" alt="AUDI logo" loading="lazy"></span>
                <span class="brand-pill" title="HONDA" aria-label="HONDA"><img class="brand-logo"
                        src="{{ asset('image/brands/honda.svg') }}" alt="HONDA logo" loading="lazy"></span>
                <span class="brand-pill" title="RENAULT" aria-label="RENAULT"><img class="brand-logo"
                        src="{{ asset('image/brands/renault.svg') }}" alt="RENAULT logo" loading="lazy"></span>
                <span class="brand-pill" title="MARUTI SUZUKI" aria-label="MARUTI SUZUKI"><img class="brand-logo"
                        src="{{ asset('image/brands/maruti-suzuki.svg') }}" alt="MARUTI SUZUKI logo"
                        loading="lazy"></span>
                <span class="brand-pill" title="KIA" aria-label="KIA"><img class="brand-logo"
                        src="{{ asset('image/brands/kia.svg') }}" alt="KIA logo" loading="lazy"></span>
                <span class="brand-pill" title="TATA" aria-label="TATA"><img class="brand-logo"
                        src="{{ asset('image/brands/tata.svg') }}" alt="TATA logo" loading="lazy"></span>
                <span class="brand-pill" title="HERO" aria-label="HERO"><img class="brand-logo"
                        src="{{ asset('image/brands/hero.png') }}" alt="HERO logo" loading="lazy"></span>
                <span class="brand-pill" title="TVS" aria-label="TVS"><img class="brand-logo"
                        src="{{ asset('image/brands/tvs.svg') }}" alt="TVS logo" loading="lazy"></span>
                <span class="brand-pill" title="BAJAJ" aria-label="BAJAJ"><img class="brand-logo"
                        src="{{ asset('image/brands/bajaj.png') }}" alt="BAJAJ logo" loading="lazy"></span>
                <span class="brand-pill" title="ROYAL ENFIELD" aria-label="ROYAL ENFIELD"><img class="brand-logo"
                        src="{{ asset('image/brands/royal-enfield.svg') }}" alt="ROYAL ENFIELD logo"
                        loading="lazy"></span>
                <span class="brand-pill" title="Mahindra Private Vehicles" aria-label="Mahindra Private Vehicles"><img
                        class="brand-logo" src="{{ asset('image/brands/mahindra-private.svg') }}"
                        alt="Mahindra private vehicles logo" loading="lazy"></span>
                <span class="brand-pill" title="Mahindra EV" aria-label="Mahindra EV"><img class="brand-logo"
                        src="{{ asset('image/brands/mahindra-ev.svg') }}" alt="Mahindra EV logo" loading="lazy"></span>
                <span class="brand-pill" title="Mahindra Commercial" aria-label="Mahindra Commercial"><img
                        class="brand-logo" src="{{ asset('image/brands/mahindra-commercial.svg') }}"
                        alt="Mahindra commercial logo" loading="lazy"></span>
            </div>
        </div>

        <!-- ERP FEATURES GRID -->
        <div class="section-full section-dark" id="features">
            <div style="max-width:1200px;margin:0 auto;padding:0 2rem;">
                <div class="section-header center" style="margin-bottom:3rem;">
                    <div class="section-title">ERP Features & Details</div>
                    <div class="section-desc">Complete suite of tools to manage every aspect of your automobile dealership
                    </div>
                </div>
            </div>
            <div style="max-width:1200px;margin:0 auto;padding:0 2rem;">
                <div class="features-grid">
                    <!-- ALL FEATURE CARDS -->
                    <div class="feature-card active" data-mod="access">
                        <div class="feature-icon">🔐</div>
                        <div class="feature-title">Access Control</div>
                        <div class="feature-desc">Role-Based Access Control (RBAC) for data security, operational
                            efficiency, and regulatory compliance.</div>
                    </div>
                    <div class="feature-card" data-mod="order">
                        <div class="feature-icon">📋</div>
                        <div class="feature-title">Order Booking System</div>
                        <div class="feature-desc">Complete vehicle booking process — from customer interest to final
                            delivery with approval hierarchy.</div>
                    </div>
                    <div class="feature-card" data-mod="finance">
                        <div class="feature-icon">💰</div>
                        <div class="feature-title">Finance System</div>
                        <div class="feature-desc">Manage loan details, disbursements, payout, repo rates, and financer
                            management with accounting entries.</div>
                    </div>
                    <div class="feature-card" data-mod="insurance">
                        <div class="feature-icon">🛡️</div>
                        <div class="feature-title">Insurance Details</div>
                        <div class="feature-desc">Streamline vehicle insurance policies — issuing, managing, and tracking
                            for every new vehicle sale.</div>
                    </div>
                    <div class="feature-card" data-mod="rto">
                        <div class="feature-icon">🚗</div>
                        <div class="feature-title">RTO Details</div>
                        <div class="feature-desc">Handle entire legal and regulatory vehicle registration, tax payments,
                            and documentation with RTO module.</div>
                    </div>
                    <div class="feature-card" data-mod="ordermgmt">
                        <div class="feature-icon">📄</div>
                        <div class="feature-title">Order Summary</div>
                        <div class="feature-desc">View complete order summary including customer, finance, vehicle, offers,
                            and discount details.</div>
                    </div>
                    <div class="feature-card" data-mod="exchange">
                        <div class="feature-icon">🔄</div>
                        <div class="feature-title">Exchange / Old Cars</div>
                        <div class="feature-desc">Manage trade-in vehicles, valuation, and exchange bonuses — critical in
                            the Indian automotive market.</div>
                    </div>
                    <div class="feature-card" data-mod="offers">
                        <div class="feature-icon">🎁</div>
                        <div class="feature-title">Offers & Discounts</div>
                        <div class="feature-desc">Manage promotional schemes, exchange bonuses, and seasonal discounts
                            across variants and VINs.</div>
                    </div>
                    <div class="feature-card" data-mod="masters">
                        <div class="feature-icon">⚙️</div>
                        <div class="feature-title">Masters – ERP Heart</div>
                        <div class="feature-desc">Foundational setup data: departments, insurance, finance, accessories,
                            variants, fuel, and more.</div>
                    </div>
                    <div class="feature-card" data-mod="ordermgmt">
                        <div class="feature-icon">📦</div>
                        <div class="feature-title">Order Management</div>
                        <div class="feature-desc">Track every step from inquiry and booking through delivery, invoicing,
                            PDI approval, and gate-pass.</div>
                    </div>
                    <div class="feature-card" data-mod="transfer">
                        <div class="feature-icon">🚚</div>
                        <div class="feature-title">Vehicle Transfer</div>
                        <div class="feature-desc">Inter-branch vehicle transfer with driver KYC, car images, health kit,
                            tool kit, and condition tracking.</div>
                    </div>
                    <div class="feature-card" data-mod="dealer">
                        <div class="feature-icon">🏢</div>
                        <div class="feature-title">Dealer Management</div>
                        <div class="feature-desc">Track sub-dealers, channel partners, inter-dealer transfers, commissions,
                            and performance.</div>
                    </div>
                    <div class="feature-card" data-mod="price">
                        <div class="feature-icon">💲</div>
                        <div class="feature-title">Price List Manager</div>
                        <div class="feature-desc">Centralize pricing with GST calculations, branch-wise price lists,
                            ex-showroom, and on-road prices.</div>
                    </div>
                    <div class="feature-card" data-mod="vendor">
                        <div class="feature-icon">🤝</div>
                        <div class="feature-title">Vendor Management</div>
                        <div class="feature-desc">Manage all third-party suppliers with TAN, GST, bank details, UDYAM, and
                            vendor login access.</div>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">📊</div>
                        <div class="feature-title">Reports</div>
                        <div class="feature-desc">Real-time insights into sales, inventory, finance, insurance, transfers,
                            RSA, MCP, and EW reports.</div>
                    </div>
                    <div class="feature-card" data-mod="rsa">
                        <div class="feature-icon">🛣️</div>
                        <div class="feature-title">RSA – Roadside Assistance</div>
                        <div class="feature-desc">Manage roadside assistance service with timely response, accurate
                            tracking, and service delivery.</div>
                    </div>
                    <div class="feature-card" data-mod="mcp">
                        <div class="feature-icon">🌟</div>
                        <div class="feature-title">MCP – My Convenience Program</div>
                        <div class="feature-desc">Service packages, extended warranties, loyalty rewards, and exclusive
                            offers for vehicle buyers.</div>
                    </div>
                    <div class="feature-card" data-mod="ew">
                        <div class="feature-icon">🔧</div>
                        <div class="feature-title">Extended Warranty</div>
                        <div class="feature-desc">Manage, track, and offer extended warranty packages beyond standard
                            manufacturer warranty.</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- DETAILED MODULES -->
        <div id="modules" class="section-full" style="background: var(--dark3);">
            <div class="modules-wrap">
                <div class="section-header" style="margin-bottom:2.5rem;">
                    <div class="section-label">Deep Dive</div>
                    <div class="section-title">Module Details</div>
                </div>
                <div class="module-tabs">
                    <button class="mod-tab active" onclick="showMod('access', event)">Access Control</button>
                    <button class="mod-tab" onclick="showMod('order', event)">Order Booking</button>
                    <button class="mod-tab" onclick="showMod('finance', event)">Finance</button>
                    <button class="mod-tab" onclick="showMod('insurance', event)">Insurance</button>
                    <button class="mod-tab" onclick="showMod('rto', event)">RTO</button>
                    <button class="mod-tab" onclick="showMod('exchange', event)">Exchange Cars</button>
                    <button class="mod-tab" onclick="showMod('offers', event)">Offers</button>
                    <button class="mod-tab" onclick="showMod('masters', event)">Masters</button>
                    <button class="mod-tab" onclick="showMod('ordermgmt', event)">Order Mgmt</button>
                    <button class="mod-tab" onclick="showMod('transfer', event)">Vehicle Transfer</button>
                    <button class="mod-tab" onclick="showMod('dealer', event)">Dealer Mgmt</button>
                    <button class="mod-tab" onclick="showMod('price', event)">Price List</button>
                    <button class="mod-tab" onclick="showMod('vendor', event)">Vendor</button>
                    <button class="mod-tab" onclick="showMod('rsa', event)">RSA</button>
                    <button class="mod-tab" onclick="showMod('mcp', event)">MCP</button>
                    <button class="mod-tab" onclick="showMod('ew', event)">Extended Warranty</button>
                </div>

                <div id="mod-access" class="mod-content active">
                    <div class="mod-desc">
                        <h3 class="mod-title">Access Control</h3>
                        <p>Implementing Role-Based Access Control (RBAC) in the vehicle showroom ERP is critical for data
                            security, operational efficiency, and regulatory compliance. Only authorised users can access
                            sensitive information, and every user action is traceable based on role assignments.</p>
                    </div>
                    <ul class="mod-points">
                        <li>All user management with permissions by role</li>
                        <li>Cash receipt limitation to generate cash receipts</li>
                        <li>Field-level validations for OBF form</li>
                        <li>Only authorised users can access sensitive information</li>
                        <li>User actions traced based on role assignments</li>
                        <li>Employees only see tools relevant to their responsibilities</li>
                    </ul>
                </div>

                <div id="mod-order" class="mod-content">
                    <div class="mod-desc">
                        <h3 class="mod-title">Order Booking System</h3>
                        <p>The core module managing entire vehicle booking — from customer interest to final delivery.
                            Bottom-to-top approval approach: sales executive submits → higher-level authorities view,
                            approve, or reject with remarks.</p>
                        <p class="mod-subnote">Covers: Personal Details, Car Details,
                            Finance Details, Insurance Details, RTO Details, Fast-Tag, and more.</p>
                    </div>
                    <ul class="mod-points">
                        <li><strong>A. Personal Details</strong> – Customer info, KYC docs, document upload</li>
                        <li><strong>B. Car Details</strong> – Vehicle, price list, RTO, insurance, accessories, MCP/RSA/EW
                        </li>
                        <li><strong>C. Finance Details</strong> – Financer, loan, payout, pay booster</li>
                        <li><strong>D. Insurance Details</strong> – NCB, policy details, reverse calculation</li>
                        <li><strong>E. RTO Details</strong> – Number plate, application no., final amount</li>
                        <li><strong>F. Fast Tag</strong> – Tag number, company, brand</li>
                    </ul>
                </div>

                <div id="mod-finance" class="mod-content">
                    <div class="mod-desc">
                        <h3 class="mod-title">Finance System</h3>
                        <p>Complete finance management integrated with accounting modules. Record journal entries for loan
                            receipts, bank commissions, and customer payments. Manage all financer relationships and payout
                            structures.</p>
                    </div>
                    <ul class="mod-points">
                        <li>Finance Y/N selection per order</li>
                        <li>Disbursement fields and financer name/type</li>
                        <li>Repo rate management</li>
                        <li>Loan amount and EMI details</li>
                        <li>Payout and pay booster details</li>
                        <li>Journal entries: loan receive, bank commission, customer payments</li>
                    </ul>
                </div>

                <div id="mod-insurance" class="mod-content">
                    <div class="mod-desc">
                        <h3 class="mod-title">Insurance Details</h3>
                        <p>Streamline the process of offering, issuing, and managing vehicle insurance policies — a crucial
                            aspect of every new vehicle sale in India. Full NCB, tyre, and policy tracking.</p>
                    </div>
                    <ul class="mod-points">
                        <li>No Claim Bonus (NCB) details</li>
                        <li>Date and time of insurance</li>
                        <li>Insurance plans and company name/amount</li>
                        <li>Policy details and RC Book upload</li>
                        <li>NCB Certificate management</li>
                        <li>Tyre details and reverse calculation</li>
                    </ul>
                </div>

                <div id="mod-rto" class="mod-content">
                    <div class="mod-desc">
                        <h3 class="mod-title">RTO Details</h3>
                        <p>The RTO module handles the entire legal and regulatory process for vehicle registration, tax
                            payments, and documentation. Critical in the Indian automotive retail environment — ensures
                            compliance and reduces human error.</p>
                    </div>
                    <ul class="mod-points">
                        <li>RTO type selection</li>
                        <li>Number plate with registration date</li>
                        <li>Application number tracking</li>
                        <li>Final RTO amount calculation</li>
                        <li>Vehicle number assignment</li>
                        <li>Reverse calculation support</li>
                    </ul>
                </div>

                <div id="mod-exchange" class="mod-content">
                    <div class="mod-desc">
                        <h3 class="mod-title">Exchange / Old Cars</h3>
                        <p>Manage customers trading in their old vehicles when purchasing new ones. Exchange bonuses and
                            valuation offers play a big role in closing sales in the Indian market.</p>
                    </div>
                    <ul class="mod-points">
                        <li>Select OBF for exchange</li>
                        <li>Seller details capture</li>
                        <li>Car name, model and variant</li>
                        <li>Chassis No. + Registration No.</li>
                        <li>HPA details management</li>
                        <li>KYC documents and insurance details</li>
                    </ul>
                </div>

                <div id="mod-offers" class="mod-content">
                    <div class="mod-desc">
                        <h3 class="mod-title">Offers & Discounts</h3>
                        <p>Manage and apply promotional schemes, exchange bonuses, and seasonal discounts efficiently. A
                            vital sales tool in the Indian automotive market where deals significantly influence buyer
                            decisions.</p>
                    </div>
                    <ul class="mod-points">
                        <li>Multiple offer types management</li>
                        <li>Offer with branch targeting</li>
                        <li>Model-specific offers</li>
                        <li>Variant-wise offers</li>
                        <li>VIN-wise offers for specific vehicles</li>
                    </ul>
                </div>

                <div id="mod-masters" class="mod-content">
                    <div class="mod-desc">
                        <h3 class="mod-title">Masters – Heart of ERP</h3>
                        <p>Foundational one-time setup data powering the entire workflow. Proper configuration ensures the
                            system runs smoothly, avoids duplication, and enforces data consistency across all departments.
                        </p>
                    </div>
                    <ul class="mod-points">
                        <li>Departments and designations</li>
                        <li>Insurance, Finance, Accessories masters</li>
                        <li>Leads and sub-lead master</li>
                        <li>Color tone masters</li>
                        <li>RSA and EW masters</li>
                        <li>Transmission, Car variant, MCP, RTO, Fuel masters</li>
                    </ul>
                </div>

                <div id="mod-ordermgmt" class="mod-content">
                    <div class="mod-desc">
                        <h3 class="mod-title">Order Management</h3>
                        <p>The backbone tracking every step of a customer's vehicle purchase — from inquiry and booking
                            through delivery and invoicing. Ensures visibility, accountability, and timely execution across
                            all departments.</p>
                    </div>
                    <ul class="mod-points">
                        <li>Car allocation and management</li>
                        <li>Multi-level approvals workflow</li>
                        <li>Waiting and finance orders</li>
                        <li>Complete payment tracking</li>
                        <li>Invoice generation</li>
                        <li>PDI Approve → Gate-Pass → Ready to Deliver</li>
                    </ul>
                </div>

                <div id="mod-transfer" class="mod-content">
                    <div class="mod-desc">
                        <h3 class="mod-title">Vehicle Transfer</h3>
                        <p>Inter-branch vehicle transfer management with full documentation, driver KYC, and vehicle
                            condition tracking. Ensures smooth inventory movement across your dealer network.</p>
                    </div>
                    <ul class="mod-points">
                        <li>From Branch to To Branch selection</li>
                        <li>Car model with VIN and variant</li>
                        <li>Driver details with KYC</li>
                        <li>Car images (5 photos)</li>
                        <li>Tool kit, health kit, spare bulb tracking</li>
                        <li>Vehicle condition check and transfer remarks</li>
                    </ul>
                </div>

                <div id="mod-dealer" class="mod-content">
                    <div class="mod-desc">
                        <h3 class="mod-title">Dealer Management</h3>
                        <p>Track and coordinate all operations related to sub-dealers, dealer networks, and channel
                            partners. Essential for managing relationships, inventory, commissions, performance, and
                            compliance in multi-tier structures.</p>
                    </div>
                    <ul class="mod-points">
                        <li>Dealer name and basic details with GST number</li>
                        <li>Inter-dealer transfer of cars</li>
                        <li>Interdealer flow chart management</li>
                        <li>Performance and compliance tracking</li>
                    </ul>
                </div>

                <div id="mod-price" class="mod-content">
                    <div class="mod-desc">
                        <h3 class="mod-title">Price List Manager</h3>
                        <p>Centralise and control pricing of vehicles, accessories, services, and insurance. In the dynamic
                            Indian auto market with frequent GST changes and OEM updates, this module ensures consistent
                            real-time pricing.</p>
                    </div>
                    <ul class="mod-points">
                        <li>CSD-wise price list management</li>
                        <li>RTO type selection for pricing</li>
                        <li>Branch-wise price list generation</li>
                        <li>GST calculation and ex-showroom price with TCS</li>
                        <li>On-road price calculations</li>
                        <li>Final price – Individual/Corporate</li>
                    </ul>
                </div>

                <div id="mod-vendor" class="mod-content">
                    <div class="mod-desc">
                        <h3 class="mod-title">Vendor Management</h3>
                        <p>Efficiently manage all third-party suppliers and service providers — including parts,
                            accessories, insurance, finance partners, service contractors, and more.</p>
                    </div>
                    <ul class="mod-points">
                        <li>TAN number and tally heading</li>
                        <li>Contact and business type details</li>
                        <li>UDYAM details and legal structure</li>
                        <li>Bank details with GST</li>
                        <li>Other information and vendor login</li>
                    </ul>
                </div>

                <div id="mod-rsa" class="mod-content">
                    <div class="mod-desc">
                        <h3 class="mod-title">RSA – Roadside Assistance</h3>
                        <p>Essential service to enhance customer satisfaction and offer peace of mind. The RSA Module
                            manages all aspects of roadside assistance, ensuring timely response, accurate tracking, and
                            proper service delivery.</p>
                    </div>
                    <ul class="mod-points">
                        <li>RSA service package management</li>
                        <li>Customer service request tracking</li>
                        <li>Timely response coordination</li>
                        <li>Service delivery confirmation</li>
                        <li>RSA reporting and analytics</li>
                    </ul>
                </div>

                <div id="mod-mcp" class="mod-content">
                    <div class="mod-desc">
                        <h3 class="mod-title">MCP – My Convenience Program</h3>
                        <p>A customer-centric initiative to enhance customer experience and streamline the ownership
                            journey. Tailored services including service packages, extended warranties, loyalty rewards, and
                            exclusive offers for improved customer retention.</p>
                    </div>
                    <ul class="mod-points">
                        <li>Service packages management</li>
                        <li>Extended warranty coordination</li>
                        <li>Loyalty rewards tracking</li>
                        <li>Exclusive offers for buyers</li>
                        <li>Customer retention analytics</li>
                        <li>MCP master configuration</li>
                    </ul>
                </div>

                <div id="mod-ew" class="mod-content">
                    <div class="mod-desc">
                        <h3 class="mod-title">Extended Warranty</h3>
                        <p>Additional service offering providing customers with extended coverage beyond standard
                            manufacturer warranty. Includes repairs and services for various vehicle components, ensuring
                            peace of mind after standard warranty ends.</p>
                    </div>
                    <ul class="mod-points">
                        <li>Extended warranty package management</li>
                        <li>Coverage tracking beyond standard warranty</li>
                        <li>Warranty sales and renewal tracking</li>
                        <li>Claims management</li>
                        <li>Customer notification and renewal reminders</li>
                        <li>EW reporting and analytics</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- REPORTS -->
        <div id="reports" style="background: var(--dark2); padding: 5rem 0;">
            <div style="max-width:1200px;margin:0 auto;padding:0 2rem;">
                <div class="section-header center" style="margin-bottom:3rem;">
                    <div class="section-label">Business Intelligence</div>
                    <div class="section-title">Reports Module</div>
                    <div class="section-desc">Real-time insights into every aspect of your dealership operations</div>
                </div>
                <div class="reports-grid">
                    <div class="report-card">
                        <div class="report-icon">📈</div>
                        <div class="report-name">Sales Report</div>
                    </div>
                    <div class="report-card">
                        <div class="report-icon">👤</div>
                        <div class="report-name">User Report</div>
                    </div>
                    <div class="report-card">
                        <div class="report-icon">🏭</div>
                        <div class="report-name">Inventory Report</div>
                    </div>
                    <div class="report-card">
                        <div class="report-icon">🛣️</div>
                        <div class="report-name">RSA Report</div>
                    </div>
                    <div class="report-card">
                        <div class="report-icon">🌟</div>
                        <div class="report-name">MCP Report</div>
                    </div>
                    <div class="report-card">
                        <div class="report-icon">🔧</div>
                        <div class="report-name">EW Report</div>
                    </div>
                    <div class="report-card">
                        <div class="report-icon">🚘</div>
                        <div class="report-name">Model Wise Report</div>
                    </div>
                    <div class="report-card">
                        <div class="report-icon">🔢</div>
                        <div class="report-name">VIN Report</div>
                    </div>
                    <div class="report-card">
                        <div class="report-icon">🛒</div>
                        <div class="report-name">Purchase Report</div>
                    </div>
                    <div class="report-card">
                        <div class="report-icon">📊</div>
                        <div class="report-name">Status Wise Report</div>
                    </div>
                    <div class="report-card">
                        <div class="report-icon">💳</div>
                        <div class="report-name">Finance Report</div>
                    </div>
                    <div class="report-card">
                        <div class="report-icon">🚚</div>
                        <div class="report-name">Transfer Report</div>
                    </div>
                    <div class="report-card">
                        <div class="report-icon">🛡️</div>
                        <div class="report-name">Insurance Report</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA / CONTACT -->
        <div class="cta-section" id="contact">
            <div class="section-label" style="position:relative;">Contact Us</div>
            <div class="cta-title" style="margin:1rem 0 0.5rem;">Ready to Transform<br>Your Dealership?</div>
            <p style="color:var(--muted);font-size:1.1rem;margin:1rem auto 2rem;max-width:500px;position:relative;">Contact
                us today for a free demo and see Auto Pulse in action</p>
            <div class="contact-grid">
                <div class="contact-item">
                    <div class="contact-label">Email</div>
                    <div class="contact-val">
                        <a href="mailto:info@innoversiontechnolab.com">info@innoversiontechnolab.com</a>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="contact-label">Phone</div>
                    <div class="contact-val">
                        <a href="tel:+919687350999">+91 96873 50999</a>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="contact-label">Website</div>
                    <div class="contact-val">
                        <a href="https://innoversiontechnolab.com" target="_blank">https://innoversiontechnolab.com</a>
                    </div>
                </div>
            </div>
            <div style="margin-top:2.5rem;position:relative;">
                <a href="{{ route('contact') }}" class="btn-primary">📞 Request a Demo</a>
            </div>
        </div>

    </div>

    <script>
        function setActiveFeatureCard(id) {
            document.querySelectorAll('.feature-card[data-mod]').forEach(el => {
                el.classList.toggle('active', el.dataset.mod === id);
            });
        }

        function showMod(id, event) {
            document.querySelectorAll('.mod-content').forEach(el => el.classList.remove('active'));
            document.querySelectorAll('.mod-tab').forEach(el => el.classList.remove('active'));
            document.getElementById('mod-' + id).classList.add('active');
            if (event && event.target) {
                event.target.classList.add('active');
            } else {
                const tab = document.querySelector('.mod-tab[onclick*="\'' + id + '\'"]');
                if (tab) tab.classList.add('active');
            }

            setActiveFeatureCard(id);
        }

        document.querySelectorAll('.feature-card[data-mod]').forEach(card => {
            const id = card.dataset.mod;

            card.addEventListener('mouseenter', function() {
                showMod(id);
            });

            card.addEventListener('focus', function() {
                showMod(id);
            });

            card.addEventListener('click', function() {
                showMod(id);
                const modulesSection = document.getElementById('modules');
                if (modulesSection) {
                    modulesSection.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
@endsection
