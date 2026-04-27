@extends('frontend.layouts.app')

@section('title', 'Terms And Conditions')

@section('content')
    <main>
        <div class="section-banner">
            <div class="banner-layout-wrapper">
                <div class="banner-layout">
                    <div class="d-flex flex-column text-center align-items-center gspace-2">
                        <h2 class="title-heading animate-box animated animate__animated" data-animate="animate__fadeInRight">
                            Terms & Conditions
                        </h2>
                        <nav class="breadcrumb">
                            <a href="{{ route('home') }}" class="gspace-2">Home</a>
                            <span class="separator-link">/</span>
                            <p class="current-page">Terms & Conditions</p>
                        </nav>
                    </div>
                    <div class="spacer"></div>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="hero-container">
                <div class="card card-case-studies">
                    <div class="d-flex flex-column gspace-2">
                        <div class="sub-heading">
                            <i class="fa-regular fa-circle-dot"></i>
                            <span>Terms & Conditions</span>
                        </div>
                        <h3 class="title-heading">Website Usage Terms</h3>
                        <p><strong>Effective Date:</strong> April 10, 2026</p>
                        <p>
                            These Terms & Conditions govern your access to and use of
                            <a href="https://innoversiontechnolab.com/" target="_blank"
                                rel="noopener noreferrer">innoversiontechnolab.com</a>
                            and related services provided by Innoversion Technolab.
                        </p>
                    </div>

                    <div class="d-flex flex-column gspace-2">
                        <h4 class="title-heading">1. Acceptance of Terms</h4>
                        <p>By using our website, submitting an inquiry, requesting services, or entering into a project
                            agreement, you agree to these Terms & Conditions and our Privacy Policy.</p>

                        <h4 class="title-heading">2. Website Usage</h4>
                        <p>You agree to use this website only for lawful purposes and in a way that does not infringe the
                            rights of, restrict, or inhibit any other user.</p>

                        <h4 class="title-heading">3. Log Files</h4>
                        <p>We may automatically collect standard access information such as IP address, browser type, device
                            details, referring URL, requested pages, and access timestamps for analytics, security, and
                            website administration. This data is used internally on a need-to-know basis.</p>

                        <h4 class="title-heading">4. Cookies</h4>
                        <p>We use cookies and similar technologies to improve site functionality, remember preferences,
                            measure performance, and improve user experience. You can manage cookie preferences in your
                            browser settings.</p>

                        <h4 class="title-heading">5. Intellectual Property</h4>
                        <p>All content on this website, including text, graphics, logos, design, and software elements, is
                            owned by or licensed to Innoversion Technolab and protected by applicable intellectual property
                            laws. Unauthorized use, reproduction, or distribution is prohibited.</p>

                        <h4 class="title-heading">6. Links to and from Our Website</h4>
                        <p>You may not create links to our website in a misleading, unlawful, or damaging manner. Our
                            website may contain links to third-party sites. We do not control and are not responsible for
                            third-party content, terms, or privacy practices.</p>

                        <h4 class="title-heading">7. Service Scope and Payments</h4>
                        <p>Service deliverables, timelines, revisions, and payment schedules are governed by project
                            proposals, invoices, statements of work, or separate client agreements. Unless agreed otherwise
                            in writing, invoices are payable within the timeline mentioned on the invoice.</p>

                        <h4 class="title-heading">8. Cancellation</h4>
                        <p>Cancellation and refund terms (if any) are governed by the service agreement or proposal specific
                            to your engagement. Administrative or processing fees may apply where communicated in advance.
                        </p>

                        <h4 class="title-heading">9. Limitation of Liability</h4>
                        <p>To the maximum extent permitted by law, Innoversion Technolab shall not be liable for any
                            indirect, incidental, special, or consequential damages arising from use of this website or
                            services. Nothing in these terms excludes liability that cannot legally be excluded.</p>

                        <h4 class="title-heading">10. Force Majeure</h4>
                        <p>Neither party is liable for delay or failure to perform obligations due to events beyond
                            reasonable control, including natural disasters, internet outages, war, civil disturbance,
                            governmental actions, or similar events.</p>

                        <h4 class="title-heading">11. Waiver</h4>
                        <p>Failure to enforce any provision of these terms shall not constitute a waiver of that provision
                            or any other right.</p>

                        <h4 class="title-heading">12. Changes to Terms</h4>
                        <p>We may update these Terms & Conditions at any time. Updated versions will be posted on this page,
                            and continued use of the website after changes constitutes acceptance of the revised terms.</p>

                        <h4 class="title-heading">13. Governing Law</h4>
                        <p>These terms are governed by the laws of India. Any disputes are subject to the jurisdiction of
                            competent courts in Rajkot, Gujarat, India, unless otherwise agreed in writing.</p>

                        <h4 class="title-heading">14. Contact Information</h4>
                        <p>
                            Innoversion Technolab<br>
                            Email: info@innoversiontechnolab.com<br>
                            Phone: +91 6359131135<br>
                            Address: Office no.1304, Rk World Tower, 150 Feet Ring Rd, near Sheetal Park, Shastri Nagar,
                            Dharam Nagar Society, Rajkot, Gujarat 360006, India
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
