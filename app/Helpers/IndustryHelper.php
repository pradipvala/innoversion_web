<?php

namespace App\Helpers;

class IndustryHelper
{
    public static function all(): array
    {
        return [
            'healthcare' => [
                'name' => 'Healthcare',
                'description' => 'Advanced digital solutions for clinics, hospitals & healthtech startups to improve patient care and operations.',
                'overview' => 'The healthcare industry demands highly secure, reliable, and user-friendly technology. We deliver HIPAA-compliant digital solutions including telemedicine platforms, hospital management systems (HMS), and patient portals that streamline medical operations and augment patient experiences.',
                'features' => ['Telemedicine Solutions', 'Electronic Health Records (EHR)', 'Hospital Management Systems (HMS)', 'Patient Scheduling Portals', 'Health Tracking Mobile Apps'],
                'why_choose' => ['HIPAA Compliance', 'Enhanced Data Security', 'Improved Patient Outcomes', 'Seamless Systems Integration'],
            ],
            'education' => [
                'name' => 'Education',
                'description' => 'Innovative EdTech solutions, LMS platforms, and school systems to empower the next generation of learners.',
                'overview' => 'Education is evolving rapidly with digital transformation. We build custom Learning Management Systems (LMS), virtual classrooms, and interactive educational apps that make learning accessible, engaging, and highly effective for both educators and students.',
                'features' => ['Learning Management Systems (LMS)', 'Virtual Classrooms Integration', 'Student Information Systems (SIS)', 'Interactive E-learning Apps', 'Online Assessment Tools'],
                'why_choose' => ['Scalable Learning Platforms', 'Engaging UI/UX for Students', 'Robust Data Analytics', 'Cross-Device Compatibility'],
            ],
            'finance-banking' => [
                'name' => 'Finance & Banking',
                'description' => 'Highly secure Fintech applications and banking software designed for modern financial institutions.',
                'overview' => 'In the fast-paced world of finance and banking, security and performance are paramount. We develop cutting-edge Fintech solutions, secure payment gateways, and banking portals that ensure compliance, mitigate risks, and enhance user trust.',
                'features' => ['Custom Fintech Solutions', 'Secure Payment Gateways', 'Mobile Banking Applications', 'Blockchain & Smart Contracts', 'Financial Dashboard Analytics'],
                'why_choose' => ['Bank-Grade Security', 'Regulatory Compliance Tools', 'High Transaction Throughput', 'Fraud Detection Mechanisms'],
            ],
            'manufacturing' => [
                'name' => 'Manufacturing',
                'description' => 'Digital optimization for production lines, supply chain management, and industry 4.0 applications.',
                'overview' => 'Manufacturing requires precision and efficiency. We provide software solutions that optimize supply chains, integrate IoT devices for smart factories, and manage production lifecycles to boost overall operational efficiency and reduce costs.',
                'features' => ['Supply Chain Management Systems', 'IoT & Smart Factory Integration', 'Production Lifecycle Tracking', 'Inventory & Warehouse Automation', 'Predictive Maintenance Software'],
                'why_choose' => ['Increased Operational Efficiency', 'Reduced Downtime', 'Real-Time Tracking & Analytics', 'Custom ERP Integrations'],
            ],
            'textile' => [
                'name' => 'Textile',
                'description' => 'Technological solutions tailored for the fabric & garment industry to streamline logistics and manufacturing.',
                'overview' => 'The textile industry benefits massively from digitalization. We build specialized ERP solutions, inventory trackers, and B2B portals for the garment sector, allowing businesses to seamlessly scale from raw fabric sourcing to retail distribution.',
                'features' => ['Textile ERP Systems', 'B2B/B2C E-commerce Portals', 'Supply & Vendor Management', 'Fabric Inventory Tracking', 'Quality Control Modules'],
                'why_choose' => ['Industry-Specific Workflows', 'End-to-End Traceability', 'Optimized Supply Chain', 'Scalable Architecture'],
            ],
            'retail-ecommerce' => [
                'name' => 'Retail & E-commerce',
                'description' => 'Omnichannel technological solutions for online platforms and offline retail environments.',
                'overview' => 'We empower retail brands by bridging the gap between physical stores and the digital realm. By developing scalable E-commerce platforms, POS integrations, and loyalty applications, we help you deliver personalized shopping experiences to your customers.',
                'features' => ['Custom E-commerce Platforms', 'Point of Sale (POS) Integration', 'Customer Loyalty Applications', 'Omnichannel Strategy Implementation', 'AR/VR Shopping Experiences'],
                'why_choose' => ['Increased Sales Conversion', 'Seamless Customer Journeys', 'Robust Inventory Syncing', 'High-Traffic Capability'],
            ],
            'real-estate' => [
                'name' => 'Real Estate',
                'description' => 'Dynamic property portals, listing platforms, and broker management tools for real estate professionals.',
                'overview' => 'The real estate sector thrives on connectivity and visual appeal. We design intuitive property listing platforms, virtual tour apps, and CRM systems for brokers that streamline property management and enhance buyer engagement.',
                'features' => ['Property Listing Portals', 'Broker CRM Systems', '3D & Virtual Reality Tours', 'Lease & Tenant Management', 'Automated Valuation Models'],
                'why_choose' => ['High-Quality IDX/MLS Integrations', 'Lead Generation Focus', 'Mobile-Optimized Experiences', 'Streamlined Operations'],
            ],
            'startups' => [
                'name' => 'Startups',
                'description' => 'From agile MVPs to robust scale-up solutions, we build technology foundations for emerging businesses.',
                'overview' => 'Startups need speed, flexibility, and scalability. We act as your technical co-founder, developing Minimum Viable Products (MVPs) rapidly to test the market, and then scaling the architecture robustly as your user base and funding grows.',
                'features' => ['Rapid MVP Development', 'Product-Market Fit Analytics', 'Scalable Cloud Architecture', 'Agile & Iterative Development', 'Investor-Ready Prototypes'],
                'why_choose' => ['Fast Time-to-Market', 'Cost-Effective Lean Teams', 'Future-Proof Scalability', 'Strategic Tech Consulting'],
            ],
        ];
    }
}
