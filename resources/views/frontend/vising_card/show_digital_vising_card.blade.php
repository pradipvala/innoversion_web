@php
    $website = !empty($card->website) ? $card->website : null;
    $websiteLink = $website ? (preg_match('/^https?:\/\//i', $website) ? $website : 'https://' . $website) : null;
    $phone = !empty($card->phone_no) ? preg_replace('/\s+/', '', $card->phone_no) : null;
    $email = !empty($card->email) ? $card->email : null;
    $mapSearch = !empty($card->address)
        ? 'https://www.google.com/maps/search/?api=1&query=' . urlencode($card->address)
        : null;
@endphp

<style>
    @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap');

    :root {
        --theme-ink: #14213d;
        --theme-brand: #0a9396;
        --theme-accent: #ee9b00;
        --theme-soft: #e9f6f6;
        --theme-white: #ffffff;
        --theme-muted: #607080;
        --theme-shadow: 0 24px 54px rgba(10, 26, 45, 0.16);
        --theme-radius: 24px;
    }

    .vcard-theme-wrap {
        min-height: 100vh;
        font-family: 'Manrope', sans-serif;
        background:
            radial-gradient(circle at 18% 20%, #f4fef0 0%, rgba(244, 254, 240, 0) 46%),
            radial-gradient(circle at 84% 78%, #ffe9d1 0%, rgba(255, 233, 209, 0) 43%),
            linear-gradient(130deg, #f8fffc 0%, #eef7ff 100%);
        padding: 24px 14px;
    }

    .vcard-frame {
        max-width: 700px;
        margin: 0 auto;
    }

    {{--  .vcard-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 14px;
        border-radius: 999px;
        background: rgba(10, 147, 150, 0.1);
        color: var(--theme-brand);
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 0.4px;
        text-transform: uppercase;
        margin-bottom: 14px;
    }  --}} .vcard-main {
        background: var(--theme-white);
        border: 1px solid #dce9f5;
        border-radius: var(--theme-radius);
        box-shadow: var(--theme-shadow);
        overflow: hidden;
        animation: liftIn 0.5s ease;
    }

    .vcard-head {
        background: linear-gradient(135deg, var(--theme-brand), #27b8bb 64%, #77d8da 100%);
        padding: 34px 24px 92px;
        color: var(--theme-white);
        text-align: center;
        position: relative;
    }

    .vcard-head::after {
        content: '';
        position: absolute;
        left: -20%;
        right: -20%;
        bottom: -62px;
        height: 130px;
        background: var(--theme-white);
        border-radius: 50%;
    }

    .vcard-title {
        margin: 0;
        font-size: 26px;
        font-weight: 800;
        position: relative;
        z-index: 2;
    }

    .vcard-subtitle {
        margin: 8px 0 0;
        font-size: 14px;
        opacity: 0.95;
        position: relative;
        z-index: 2;
    }

    .vcard-logo {
        width: 156px;
        height: 156px;
        border-radius: 50%;
        object-fit: cover;
        border: 8px solid var(--theme-white);
        box-shadow: 0 14px 30px rgba(0, 0, 0, 0.2);
        margin: -78px auto 16px;
        display: block;
        position: relative;
        z-index: 4;
        background: #f6f6f6;
    }

    .vcard-body {
        padding: 8px 26px 28px;
        text-align: center;
    }

    .vcard-name {
        color: var(--theme-ink);
        margin: 0;
        font-size: 34px;
        font-weight: 800;
        line-height: 1.12;
    }

    .vcard-role,
    .vcard-company {
        margin: 8px 0 0;
        color: var(--theme-muted);
        font-size: 16px;
        font-weight: 600;
    }

    .vcard-company {
        color: var(--theme-brand);
    }

    .vcard-section {
        margin-top: 22px;
        background: #fbfdff;
        border: 1px solid #e3edf8;
        border-radius: 18px;
        padding: 18px;
    }

    .vcard-section-title {
        margin: 0 0 12px;
        color: var(--theme-ink);
        font-size: 15px;
        font-weight: 800;
        letter-spacing: 0.3px;
        text-transform: uppercase;
    }

    .vcard-desc {
        margin: 0;
        color: #435466;
        font-size: 15px;
        line-height: 1.65;
        word-break: break-word;
    }

    .vcard-quick-actions {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 10px;
    }

    .vcard-icon-btn {
        width: 46px;
        height: 46px;
        border-radius: 50%;
        border: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        color: var(--theme-white);
        background: linear-gradient(145deg, var(--theme-brand), #138083);
        box-shadow: 0 10px 18px rgba(10, 147, 150, 0.32);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .vcard-icon-btn svg {
        width: 20px;
        height: 20px;
        stroke: currentColor;
        fill: none;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
    }

    .vcard-icon-btn:hover {
        color: var(--theme-white);
        transform: translateY(-2px);
        box-shadow: 0 14px 22px rgba(10, 147, 150, 0.38);
    }

    .vcard-socials {
        display: flex;
        justify-content: center;
        gap: 12px;
        flex-wrap: wrap;
    }

    .vcard-social-link img {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        object-fit: cover;
        box-shadow: 0 7px 14px rgba(31, 41, 55, 0.18);
        transition: transform 0.2s ease;
    }

    .vcard-social-link:hover img {
        transform: translateY(-3px);
    }

    .vcard-qr {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 12px;
        background: var(--theme-soft);
        border-radius: 14px;
        overflow-x: auto;
    }

    .vcard-payment-qr {
        max-width: 260px;
        width: 100%;
        border-radius: 16px;
        border: 4px solid #ccebec;
    }

    .vcard-footer-logo {
        max-width: 170px;
        opacity: 0.9;
        margin: 18px auto 0;
        display: block;
    }

    @keyframes liftIn {
        from {
            opacity: 0;
            transform: translateY(12px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @media (max-width: 767px) {
        .vcard-head {
            padding: 26px 16px 86px;
        }

        .vcard-title {
            font-size: 22px;
        }

        .vcard-logo {
            width: 124px;
            height: 124px;
            margin-top: -62px;
        }

        .vcard-body {
            padding: 10px 14px 20px;
        }

        .vcard-name {
            font-size: 28px;
        }

        .vcard-role,
        .vcard-company {
            font-size: 14px;
        }

        .vcard-section {
            margin-top: 14px;
            padding: 14px;
        }
    }
</style>

<div class="vcard-theme-wrap">
    <div class="vcard-frame">
        {{--  <div class="vcard-badge">
            <i class="fa fa-id-card-o" aria-hidden="true"></i>
            Digital Visiting Card
        </div>  --}}

        <div class="vcard-main">
            <div class="vcard-head">
                <h1 class="vcard-title">Digital Card</h1>
                <p class="vcard-subtitle">Professional profile and contact details</p>
            </div>

            @if (isset($card->company_logo) && !empty($card->company_logo))
                <img src="{{ \Storage::url($card->company_logo) }}" alt="Company Logo" class="vcard-logo" />
            @endif

            <div class="vcard-body">
                <h2 class="vcard-name">{{ !empty($card->name) ? $card->name : 'Your Name' }}</h2>

                @if (!empty($card->designation))
                    <p class="vcard-role">{{ $card->designation }}</p>
                @endif

                @if (!empty($card->company_name))
                    <p class="vcard-company">{{ $card->company_name }}</p>
                @endif

                @if (!empty($card->company_description))
                    <div class="vcard-section">
                        <h3 class="vcard-section-title">About Company</h3>
                        <p class="vcard-desc">{{ $card->company_description }}</p>
                    </div>
                @endif

                @if (!empty($website))
                    <div class="vcard-section">
                        <h3 class="vcard-section-title">Website QR</h3>
                        <div class="vcard-qr">
                            {{ QrCode::size(180)->generate($websiteLink) }}
                        </div>
                    </div>
                @endif

                <div class="vcard-section">
                    <h3 class="vcard-section-title">Quick Actions</h3>
                    <div class="vcard-quick-actions">
                        @if (!empty($phone))
                            <a href="tel:{{ $phone }}" class="vcard-icon-btn" title="Call">
                                <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                                    <path
                                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.8 19.8 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.12 4.18 2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.12.89.34 1.76.64 2.6a2 2 0 0 1-.45 2.11L8.01 9.99a16 16 0 0 0 6 6l1.56-1.29a2 2 0 0 1 2.11-.45c.84.3 1.71.52 2.6.64A2 2 0 0 1 22 16.92z" />
                                </svg>
                            </a>
                        @endif

                        @if (!empty($email))
                            <a href="mailto:{{ $email }}" class="vcard-icon-btn" title="Email">
                                <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                                    <rect x="3" y="5" width="18" height="14" rx="2" ry="2" />
                                    <path d="M3 7l9 6 9-6" />
                                </svg>
                            </a>
                        @endif

                        @if (!empty($websiteLink))
                            <a href="{{ $websiteLink }}" class="vcard-icon-btn" target="_blank" rel="noopener"
                                title="Website">
                                <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                                    <circle cx="12" cy="12" r="10" />
                                    <path d="M2 12h20" />
                                    <path
                                        d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z" />
                                </svg>
                            </a>
                        @endif

                        @if (!empty($mapSearch))
                            <a href="{{ $mapSearch }}" class="vcard-icon-btn" target="_blank" rel="noopener"
                                title="Address">
                                <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                                    <path d="M21 10c0 7-9 13-9 13S3 17 3 10a9 9 0 1 1 18 0z" />
                                    <circle cx="12" cy="10" r="3" />
                                </svg>
                            </a>
                        @endif

                        @if (!empty($card->location))
                            <a href="{{ $card->location }}" class="vcard-icon-btn" target="_blank" rel="noopener"
                                title="Location Link">
                                <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                                    <path d="M22 2L11 13" />
                                    <path d="M22 2l-7 20-4-9-9-4z" />
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>

                <div class="vcard-section">
                    <h3 class="vcard-section-title">Social Connect</h3>
                    <div class="vcard-socials">
                        @if (!empty($card->whatsapp_no))
                            <a href="{{ $card->whatsapp_no }}" target="_blank" rel="noopener"
                                class="vcard-social-link">
                                <img src="{{ url('images/social_icons/whatsapp_logo.png') }}" alt="WhatsApp" />
                            </a>
                        @endif

                        @if (!empty($card->facebook))
                            <a href="{{ $card->facebook }}" target="_blank" rel="noopener" class="vcard-social-link">
                                <img src="{{ url('images/social_icons/facebook_logo.png') }}" alt="Facebook" />
                            </a>
                        @endif

                        @if (!empty($card->x_link))
                            <a href="{{ $card->x_link }}" target="_blank" rel="noopener" class="vcard-social-link">
                                <img src="{{ url('images/social_icons/x_twt.png') }}" alt="X" />
                            </a>
                        @endif

                        @if (!empty($card->linkedin))
                            <a href="{{ $card->linkedin }}" target="_blank" rel="noopener" class="vcard-social-link">
                                <img src="{{ url('images/social_icons/linkedin_logo.png') }}" alt="LinkedIn" />
                            </a>
                        @endif

                        @if (!empty($card->instagram))
                            <a href="{{ $card->instagram }}" target="_blank" rel="noopener" class="vcard-social-link">
                                <img src="{{ url('images/social_icons/instagram_logo.png') }}" alt="Instagram" />
                            </a>
                        @endif
                    </div>
                </div>

                @if (isset($card->wallet_pay_qr_code) && !empty($card->wallet_pay_qr_code))
                    <div class="vcard-section">
                        <h3 class="vcard-section-title">Wallet / UPI QR</h3>
                        <img src="{{ \Storage::url($card->wallet_pay_qr_code) }}" alt="Payment QR"
                            class="vcard-payment-qr" />
                    </div>
                @endif

                <img src="{{ asset('image/marko-logo-dark.png') }}" alt="Brand Logo" class="vcard-footer-logo" />
            </div>
        </div>
    </div>
</div>
