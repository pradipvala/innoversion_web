@extends('frontend.layouts.app')

@section('content')
    <main>
        <div class="section-banner">
            <div class="banner-layout-wrapper">
                <div class="banner-layout">
                    <div class="d-flex flex-column text-center align-items-center gspace-2">
                        <h2 class="title-heading animate-box animated animate__animated" data-animate="animate__fadeInRight">
                            AutoPlus</h2>
                        <nav class="breadcrumb">
                            <a href="{{ route('home') }}" class="gspace-2">Home</a>
                            <span class="separator-link">/</span>
                            <p class="current-page">AutoPlus</p>
                        </nav>
                    </div>
                    <div class="spacer"></div>
                </div>
            </div>
        </div>

        <div class="section pb-4">
            <div class="hero-container">
                <div class="d-flex flex-column gspace-4">
                    <div class="card service-included">
                        <div class="sub-heading animate-box animated slow animate__animated"
                            data-animate="animate__fadeInRight">
                            <i class="fa-regular fa-circle-dot"></i>
                            <span>Platform Features</span>
                        </div>
                        <h3 class="title-heading animate-box animated animate__animated"
                            data-animate="animate__fadeInRight">
                            Everything a Dealership Needs. In One Place.
                        </h3>
                        <p>
                            AutoPulse brings together all critical dealership operations - from customer booking to
                            vehicle delivery - into a single, powerful ERP ecosystem.
                        </p>
                        <div class="d-flex flex-wrap gspace-2 mt-3">
                            <a href="{{ route('contact') }}" class="link-wrapper">
                                <span>Book a Free Demo</span>
                                <i class="fa-solid fa-circle-arrow-right"></i>
                            </a>
                            <a href="{{ route('contact') }}" class="link-wrapper">
                                <span>Get Started Today</span>
                                <i class="fa-solid fa-circle-arrow-right"></i>
                            </a>
                        </div>
                    </div>

                    <div class="card service-included">
                        <h4>Why Choose AutoPulse?</h4>
                        <div class="underline-accent-short"></div>
                        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 grid-spacer-2 mt-3">
                            <div class="col">
                                <div class="d-flex align-items-start gspace-2"><i
                                        class="fa-solid fa-file-circle-check accent-color fa-lg"></i>
                                    <p class="mb-0">End-to-End Dealership Management</p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex align-items-start gspace-2"><i
                                        class="fa-solid fa-chart-line accent-color fa-lg"></i>
                                    <p class="mb-0">Real-Time Data & Reporting</p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex align-items-start gspace-2"><i
                                        class="fa-solid fa-user-shield accent-color fa-lg"></i>
                                    <p class="mb-0">Role-Based Access Control (RBAC)</p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex align-items-start gspace-2"><i
                                        class="fa-solid fa-indian-rupee-sign accent-color fa-lg"></i>
                                    <p class="mb-0">GST & Finance Integration</p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex align-items-start gspace-2"><i
                                        class="fa-solid fa-people-arrows accent-color fa-lg"></i>
                                    <p class="mb-0">Multi-Branch & Dealer Management</p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex align-items-start gspace-2"><i
                                        class="fa-solid fa-sliders accent-color fa-lg"></i>
                                    <p class="mb-0">Scalable & Customizable</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card service-included">
                        <h4>About AutoPulse</h4>
                        <div class="underline-accent-short"></div>
                        <p class="mt-3 mb-0">
                            AutoPulse is a powerful <strong>Automobile Dealer Management ERP System</strong> developed by
                            Innoversion Technolab, designed to streamline dealership operations, improve efficiency, and
                            ensure complete process control.
                        </p>
                        <p class="mb-0 mt-2">
                            From customer inquiry to final delivery, AutoPulse connects every department -
                            <strong>Sales, Finance, Insurance, RTO, Inventory, and Management</strong> - into one unified
                            system.
                        </p>
                    </div>

                    <div class="card service-included">
                        <h4>Trusted by Dealerships & Businesses</h4>
                        <div class="underline-accent-short"></div>
                        <p class="mt-3 mb-0">
                            Serving automobile dealerships, consultants, and enterprise clients with reliable and scalable
                            ERP
                            solutions.
                        </p>
                        <div class="row row-cols-2 row-cols-md-4 grid-spacer-2 mt-3 text-center">
                            <div class="col"><i class="fa-solid fa-users fa-2x accent-color"></i>
                                <h5 class="mt-2 mb-0">2,500+ Happy Users</h5>
                            </div>
                            <div class="col"><i class="fa-solid fa-face-smile fa-2x accent-color"></i>
                                <h5 class="mt-2 mb-0">98% Client Satisfaction</h5>
                            </div>
                            <div class="col"><i class="fa-solid fa-car fa-2x accent-color"></i>
                                <h5 class="mt-2 mb-0">Multi-Brand Compatibility</h5>
                            </div>
                            <div class="col"><i class="fa-solid fa-award fa-2x accent-color"></i>
                                <h5 class="mt-2 mb-0">Proven Industry Experience</h5>
                            </div>
                        </div>
                    </div>

                    <div class="row row-cols-xl-2 row-cols-1 grid-spacer-5">
                        <div class="col col-xl-8">
                            <div class="d-flex flex-column gspace-4">
                                <div class="card service-included">
                                    <h4>Order Booking System</h4>
                                    <div class="underline-accent-short"></div>
                                    <p class="mt-3">End-to-end OBF management with customer details, KYC, vehicle
                                        selection, finance, insurance, RTO, and accessories - all in a bottom-to-top
                                        approval workflow. Sales executives submit; authorities approve.</p>
                                    <div class="row row-cols-1 row-cols-md-2 grid-spacer-2 mt-3">
                                        <div class="col">
                                            <ul class="check-list">
                                                <li>Personal Details</li>
                                                <li>Car Details</li>
                                                <li>Finance Details</li>
                                            </ul>
                                        </div>
                                        <div class="col">
                                            <ul class="check-list">
                                                <li>Insurance</li>
                                                <li>RTO</li>
                                                <li>Fast Tag</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="card service-included">
                                    <h4>Access Control (RBAC)</h4>
                                    <div class="underline-accent-short"></div>
                                    <p class="mt-3">Role-Based Access Control ensures every user sees only what's
                                        relevant. Full user management with permission-level controls, cash receipt limits,
                                        and field-level OBF validation.</p>
                                    <ul class="check-list mt-3">
                                        <li>Role-Based User Permissions</li>
                                        <li>Secure Data Access</li>
                                        <li>Activity Tracking & Logs</li>
                                        <li>Restricted Financial Controls</li>
                                    </ul>
                                </div>

                                <div class="card service-included">
                                    <h4>Finance System</h4>
                                    <div class="underline-accent-short"></div>
                                    <p class="mt-3">Integrated bank and NBFC loan management with GST auto-apply,
                                        Tally/Zoho sync, journal entries, and payout tracking.</p>
                                    <ul class="check-list mt-3">
                                        <li>Loan Processing & Tracking</li>
                                        <li>Bank & NBFC Integration</li>
                                        <li>GST Compliance</li>
                                        <li>Accounting Sync (Tally, Zoho)</li>
                                        <li>Financial Reports</li>
                                    </ul>
                                </div>

                                <div class="card service-included">
                                    <h4>Exchange / Old Cars</h4>
                                    <div class="underline-accent-short"></div>
                                    <p class="mt-3">Trade-in management with seller KYC, HPA details, valuation, exchange
                                        bonus calculation - a vital tool for closing sales in the Indian market.</p>
                                    <ul class="check-list mt-3">
                                        <li>Old Vehicle Evaluation</li>
                                        <li>Exchange Offers Management</li>
                                        <li>Customer & Vehicle Details</li>
                                        <li>Document Verification</li>
                                    </ul>
                                </div>

                                <div class="card service-included">
                                    <h4>Order Management</h4>
                                    <div class="underline-accent-short"></div>
                                    <p class="mt-3">Full order lifecycle tracking: car allocation → approvals → invoice
                                        generation → PDI → gate-pass → ready to deliver.</p>
                                    <ul class="check-list mt-3">
                                        <li>Booking → Approval → Allocation</li>
                                        <li>Finance → Invoice → Delivery</li>
                                        <li>Status Tracking & Workflow</li>
                                    </ul>
                                </div>

                                <div class="card service-included">
                                    <h4>Dealer Management</h4>
                                    <div class="underline-accent-short"></div>
                                    <p class="mt-3">Manage sub-dealer networks, inter-dealer car transfers, GST details,
                                        and inter-dealer flow charts for multi-tier OEM structures.</p>
                                    <ul class="check-list mt-3">
                                        <li>Sub-Dealer Tracking</li>
                                        <li>Commission Management</li>
                                        <li>Dealer Performance Monitoring</li>
                                        <li>GST & Compliance</li>
                                    </ul>
                                </div>

                                <div class="card service-included">
                                    <h4>Price List Manager</h4>
                                    <div class="underline-accent-short"></div>
                                    <p class="mt-3">CSD-wise, branch-wise, RTO-type price lists with auto GST
                                        calculation, Ex-Showroom + TCS, on-road pricing, and individual/corporate final
                                        price.</p>
                                    <ul class="check-list mt-3">
                                        <li>Ex-Showroom & On-Road Pricing</li>
                                        <li>GST & Tax Calculation</li>
                                        <li>Branch-wise Pricing</li>
                                        <li>Corporate / Individual Pricing</li>
                                    </ul>
                                </div>

                                <div class="card service-included">
                                    <h4>Masters - Heart of the ERP</h4>
                                    <div class="underline-accent-short"></div>
                                    <p class="mt-3">All foundational configuration in one place. Departments, insurance
                                        masters, finance masters, accessories, lead sources, color tones, RSA/EW,
                                        transmission types, car variants, MCP, RTO, and fuel masters - ensuring data
                                        consistency across the entire platform.</p>
                                    <div class="row row-cols-1 row-cols-md-2 grid-spacer-2 mt-3">
                                        <div class="col">
                                            <ul class="check-list">
                                                <li>12 Master Categories</li>
                                                <li>One-time Setup</li>
                                                <li>Enforces Data Consistency</li>
                                            </ul>
                                        </div>
                                        <div class="col">
                                            <ul class="check-list">
                                                <li>Departments & Lead Sources</li>
                                                <li>Variants, MCP, RSA/EW</li>
                                                <li>RTO, Fuel, Accessories Masters</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="card service-included">
                                    <h4>Module Details</h4>
                                    <div class="underline-accent-short"></div>
                                    <div class="row row-cols-1 row-cols-md-2 grid-spacer-2 mt-3">
                                        <div class="col">
                                            <h5>Insurance Module</h5>
                                            <ul class="check-list">
                                                <li>No Claim Bonus (NCB) certificate handling</li>
                                                <li>Date and time of insurance capture</li>
                                                <li>Multiple insurance plans & company comparison</li>
                                                <li>Policy details with RC Book upload</li>
                                                <li>Tyre insurance details</li>
                                                <li>Reverse calculation support</li>
                                            </ul>
                                        </div>
                                        <div class="col">
                                            <h5>RTO Module</h5>
                                            <ul class="check-list">
                                                <li>RTO type selection</li>
                                                <li>Number plate with registration date</li>
                                                <li>Application number tracking</li>
                                                <li>Final amount calculation</li>
                                                <li>Vehicle number assignment</li>
                                                <li>Reverse calculation details</li>
                                            </ul>
                                        </div>
                                        <div class="col">
                                            <h5>Vendor Management</h5>
                                            <ul class="check-list">
                                                <li>TAN number and Tally heading</li>
                                                <li>UDYAM / MSME details</li>
                                                <li>Legal structure and business type</li>
                                                <li>Bank details with GST linkage</li>
                                                <li>Vendor login portal access</li>
                                                <li>Complete contact management</li>
                                            </ul>
                                        </div>
                                        <div class="col">
                                            <h5>Vehicle Transfer</h5>
                                            <ul class="check-list">
                                                <li>Branch-to-branch transfer workflow</li>
                                                <li>Car model with VIN and variant</li>
                                                <li>Driver details with KYC documents</li>
                                                <li>5 car images mandatory</li>
                                                <li>Tool Kit & Health Kit checklist</li>
                                                <li>Condition sign-off approval</li>
                                            </ul>
                                        </div>
                                        <div class="col">
                                            <h5>RSA / MCP / Extended Warranty</h5>
                                            <ul class="check-list">
                                                <li>RSA: Timely response & service tracking</li>
                                                <li>MCP: Service packages & loyalty rewards</li>
                                                <li>EW: Extended coverage beyond manufacturer warranty</li>
                                                <li>Tailored exclusive offers per customer</li>
                                                <li>Renewal tracking and claims management</li>
                                                <li>Integrated with Order Booking Form</li>
                                            </ul>
                                        </div>
                                        <div class="col">
                                            <h5>Reports & Analytics</h5>
                                            <ul class="check-list">
                                                <li>Sales Report</li>
                                                <li>Finance Report</li>
                                                <li>Inventory Report</li>
                                                <li>Insurance Report</li>
                                                <li>RSA / MCP / EW Reports</li>
                                                <li>VIN / Status / User Reports</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="card service-included">
                                    <h4>Order Lifecycle</h4>
                                    <div class="underline-accent-short"></div>
                                    <p class="mt-3">From Order to Delivery - Every step of the vehicle purchase tracked,
                                        approved, and completed - with full visibility at every stage.</p>
                                    <div class="row row-cols-2 row-cols-md-5 grid-spacer-2 mt-3 text-center">
                                        <div class="col"><span class="badge bg-dark">01</span>
                                            <p class="mt-2 mb-0">Customer Booking</p>
                                        </div>
                                        <div class="col"><span class="badge bg-dark">02</span>
                                            <p class="mt-2 mb-0">Authority Approval</p>
                                        </div>
                                        <div class="col"><span class="badge bg-dark">03</span>
                                            <p class="mt-2 mb-0">Finance & Allocation</p>
                                        </div>
                                        <div class="col"><span class="badge bg-dark">04</span>
                                            <p class="mt-2 mb-0">RTO & Insurance</p>
                                        </div>
                                        <div class="col"><span class="badge bg-dark">05</span>
                                            <p class="mt-2 mb-0">PDI → Delivery</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="card service-included">
                                    <h4>Why AutoPulse</h4>
                                    <div class="underline-accent-short"></div>
                                    <div class="row row-cols-1 row-cols-md-3 grid-spacer-2 mt-3">
                                        <div class="col">
                                            <h5>01 GST & Regulatory Ready</h5>
                                            <p>Built-in GST auto-apply, TCS calculations, RTO compliance, and NBFC
                                                integration - designed from the ground up for the Indian automotive
                                                regulatory environment.</p>
                                        </div>
                                        <div class="col">
                                            <h5>02 Multi-Branch, Multi-Role</h5>
                                            <p>Powerful RBAC controls, branch-wise price lists, inter-dealer transfers, and
                                                sub-dealer network management for dealerships of any size.</p>
                                        </div>
                                        <div class="col">
                                            <h5>03 Complete Workflow Automation</h5>
                                            <p>From first customer inquiry to final delivery gate-pass - every step is
                                                tracked, approved, and auditable. Zero paperwork. Zero gaps.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col col-xl-4">
                            <div class="d-flex flex-column gspace-5">
                                <div class="card service-recent">
                                    <h4>Quick Links</h4>
                                    <div class="underline-accent-short"></div>
                                    <ul class="single-service-list">
                                        <li><a href="{{ route('contact') }}">Book a Free Demo</a></li>
                                        <li><a href="{{ route('contact') }}">Contact Our Experts</a></li>
                                        <li><a href="javascript:void(0)">Order Booking System</a></li>
                                        <li><a href="javascript:void(0)">Finance & Insurance</a></li>
                                        <li><a href="javascript:void(0)">Reports & Analytics</a></li>
                                    </ul>
                                </div>

                                <div class="card service-recent">
                                    <h4>Platform Highlights</h4>
                                    <div class="underline-accent-short"></div>
                                    <ul class="single-service-list">
                                        <li><a href="javascript:void(0)">OBF workflow with bottom-to-top approval</a></li>
                                        <li><a href="javascript:void(0)">Cash receipt limits and field-level validation</a>
                                        </li>
                                        <li><a href="javascript:void(0)">Tally / Zoho sync with journal entries</a></li>
                                        <li><a href="javascript:void(0)">VIN-wise reports and dashboard insights</a></li>
                                    </ul>
                                </div>

                                <div class="card service-recent">
                                    <h4>Brand Logos</h4>
                                    <div class="underline-accent-short"></div>
                                    <div
                                        class="row row-cols-2 row-cols-md-3 grid-spacer-2 mt-3 text-center align-items-center">
                                        <div class="col"><img src="{{ asset('image/client-1.png') }}" alt="Brand logo"
                                                class="img-fluid"></div>
                                        <div class="col"><img src="{{ asset('image/client-2.png') }}" alt="Brand logo"
                                                class="img-fluid"></div>
                                        <div class="col"><img src="{{ asset('image/client-3.png') }}" alt="Brand logo"
                                                class="img-fluid"></div>
                                        <div class="col"><img src="{{ asset('image/client-4.png') }}" alt="Brand logo"
                                                class="img-fluid"></div>
                                        <div class="col"><img src="{{ asset('image/client-5.png') }}" alt="Brand logo"
                                                class="img-fluid"></div>
                                        <div class="col"><img src="{{ asset('image/client-6.png') }}"
                                                alt="Brand logo" class="img-fluid"></div>
                                    </div>
                                </div>

                                <div class="cta-service-banner">
                                    <div class="spacer"></div>
                                    <h3 class="title-heading">Ready to Transform Your Dealership?</h3>
                                    <p>Get complete control of your operations with AutoPulse ERP.</p>
                                    <div class="link-wrapper">
                                        <a href="{{ route('contact') }}">Schedule a Free Demo</a>
                                        <i class="fa-solid fa-circle-arrow-right"></i>
                                    </div>
                                    <div class="mt-3">
                                        <p class="mb-1"><i
                                                class="fa-solid fa-envelope accent-color me-2"></i>info@innoversiontechnolab.com
                                        </p>
                                        <p class="mb-1"><i class="fa-solid fa-phone accent-color me-2"></i>+91 96873
                                            50999</p>
                                        <p class="mb-0"><i
                                                class="fa-solid fa-globe accent-color me-2"></i>InnoversionTechnolab.com
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>
@endsection
