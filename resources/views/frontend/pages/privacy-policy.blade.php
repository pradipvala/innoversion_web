@extends('frontend.layouts.app')

@section('title', 'Privacy Policy')

@section('content')
    <main>
        <div class="section-banner">
            <div class="banner-layout-wrapper">
                <div class="banner-layout">
                    <div class="d-flex flex-column text-center align-items-center gspace-2">
                        <h2 class="title-heading animate-box animated animate__animated" data-animate="animate__fadeInRight">
                            Privacy Policy
                        </h2>
                        <nav class="breadcrumb">
                            <a href="{{ route('home') }}" class="gspace-2">Home</a>
                            <span class="separator-link">/</span>
                            <p class="current-page">Privacy Policy</p>
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
                            <span>Privacy Policy</span>
                        </div>
                        <h3 class="title-heading">How We Use & Protect Data</h3>
                        <p><strong>Effective Date:</strong> April 10, 2026</p>
                        <p>
                            Innoversion Technolab respects your privacy and is committed to protecting your personal data.
                            This Privacy Policy explains how we collect, use, and protect your information when you use
                            <a href="https://innoversiontechnolab.com/" target="_blank" rel="noopener noreferrer">innoversiontechnolab.com</a>
                            and related services.
                        </p>
                    </div>

                    <div class="d-flex flex-column gspace-2">
                        <h4>1. Information We Collect</h4>
                        <ul class="list-icon">
                            <li>Contact details such as name, email address, phone number, and company name.</li>
                            <li>Inquiry and project details shared through forms, email, or direct communication.</li>
                            <li>Recruitment information such as CV/resume and related application details.</li>
                            <li>Technical data such as IP address, browser type, device details, and usage logs.</li>
                            <li>Media data you voluntarily submit, including files, images, and documents.</li>
                        </ul>

                        <h4>2. How We Use Information</h4>
                        <ul class="list-icon">
                            <li>Respond to inquiries and provide requested services.</li>
                            <li>Process project onboarding, communication, billing, and support.</li>
                            <li>Improve website performance, user experience, and security monitoring.</li>
                            <li>Comply with legal obligations and resolve disputes.</li>
                        </ul>

                        <h4>3. Cookies and Tracking Technologies</h4>
                        <p>We use session and persistent cookies for website functionality, analytics, and performance. Third-party tools may also set cookies as part of embedded services or analytics. You can control cookies through browser settings.</p>

                        <h4>4. Information Sharing</h4>
                        <p>We do not sell or rent your personal data. We may share information with trusted service providers (such as hosting, analytics, communication, or payment processors) only to the extent needed to provide services. We may also disclose information where required by law or to protect legal rights.</p>

                        <h4>5. Third-Party Links</h4>
                        <p>Our website may include links to external websites. We are not responsible for the content, security, or privacy practices of those websites.</p>

                        <h4>6. Data Retention</h4>
                        <p>We retain personal information only as long as necessary for business purposes, contractual obligations, compliance requirements, and dispute resolution.</p>

                        <h4>7. Data Security</h4>
                        <p>We implement reasonable administrative, technical, and organizational safeguards to protect data. However, no internet transmission or storage system is fully secure.</p>

                        <h4>8. Your Rights</h4>
                        <p>Subject to applicable law, you may request access, correction, or deletion of your personal information, or object to specific processing activities. To exercise your rights, contact us using the details below.</p>

                        <h4>9. Children’s Privacy</h4>
                        <p>Our website and services are not directed to children under 13 years of age, and we do not knowingly collect personal information from children.</p>

                        <h4>10. Changes to This Policy</h4>
                        <p>We may update this Privacy Policy from time to time. Any updates will be posted on this page with the revised effective date.</p>

                        <h4>11. Contact Us</h4>
                        <p>
                            For privacy-related requests or questions, contact:<br>
                            Innoversion Technolab<br>
                            Email: info@innoversiontechnolab.com<br>
                            Phone: +91 9687350999<br>
                            Address: 1304 RK World Tower, Brts Stop, 613, 150 Feet Ring Rd, near Shital Park,
                            Sheetal Park, Shastri Nagar, Dharam Nagar, Rajkot, Gujarat 360006, India
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
