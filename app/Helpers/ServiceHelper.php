<?php

namespace App\Helpers;

class ServiceHelper
{
    public static function all(): array
    {
        return [
            'custom-software-development' => [
                'name' => 'Custom Software Development',
                'hero_title' => 'Transforming Businesses with Custom Software Solutions',
                'image' => 'services/custom-software-development.jpg',
                'description' => 'Transforming Businesses with Custom Software Solutions',
                'overview' => 'At Innoversion Technolab, we provide custom software development services designed to solve real business challenges. Our solutions are built from scratch to align perfectly with your workflows, ensuring flexibility, scalability, and high performance. We help businesses automate processes, improve efficiency, and build powerful digital products using modern technologies.',
                'features' => ['Bespoke Architecture', 'High Scalability', 'Advanced Security', 'Seamless Integration', 'Automated Workflows'],
                'why_choose' => ['Perfect Fit for Your Business', 'Better Support & Maintenance', 'Higher ROI', 'Enhanced Productivity'],
            ],
            'web-application-development' => [
                'name' => 'Web Application Development',
                'hero_title' => 'Building Scalable & High-Performance Web Applications',
                'image' => 'services/web-application-development.jpg',
                'description' => 'We create fast, secure, and user-friendly web applications that deliver seamless digital experiences and drive business growth.',
                'overview' => 'At Innoversion Technolab, we develop powerful web applications tailored to your business needs. Our solutions are designed to be scalable, secure, and accessible across all devices without installation. We leverage modern technologies to build web apps that enhance user engagement, streamline operations, and support your digital transformation journey.',
                'features' => ['Responsive Design', 'Cross-Browser Compatibility', 'Rich User Interface', 'Cloud Scalability', 'High Performance'],
                'why_choose' => ['Wider Audience Reach', 'Easy to Update', 'No Installation Required', 'Cost-Effective Development'],
            ],
            'mobile-app-development' => [
                'name' => 'Mobile App Development',
                'hero_title' => 'Driving Business Growth Through Mobile App Development',
                'image' => 'services/app-development.png',
                'description' => 'Custom-built Android and iOS applications designed to improve customer engagement, simplify operations, and support long-term business growth.',
                'overview' => 'At Innoversion Technolab, we develop innovative mobile applications that help businesses stay connected with their customers anytime and anywhere. Our team creates native and cross-platform apps that are fast, secure, and easy to use. From startup ideas to enterprise-grade applications, we build mobile solutions that match your business objectives and deliver a seamless user experience across all devices.',
                'features' => ['Android App Development', 'iOS App Development', 'Cross-Platform App Development', 'Custom UI/UX Design', 'API & Third-Party Integration'],
                'why_choose' => ['Reach Customers Anytime, Anywhere', 'Improve User Engagement', 'Increase Brand Visibility', 'Generate New Business Opportunities'],
            ],
            'saas-development' => [
                'name' => 'SaaS Development',
                'hero_title' => 'Building Scalable & Secure SaaS Applications',
                'description' => 'We develop powerful cloud-based SaaS solutions that help businesses streamline operations, scale efficiently, and deliver seamless user experiences.',
                'overview' => 'At Innoversion Technolab, we specialize in SaaS (Software as a Service) development, creating cloud-based applications that are accessible anytime, anywhere. Our solutions are designed for scalability, security, and performance, enabling businesses to serve multiple users with ease. We build SaaS platforms that simplify processes, reduce infrastructure costs, and support long-term business growth.',
                'features' => ['Multi-Tenant Architecture', 'Cloud-Based Infrastructure', 'Subscription & Billing Integration', 'Secure Data Management', 'API & Third-Party Integrations'],
                'why_choose' => ['Scalable Business Model', 'Cost-Effective Solution', 'Easy Access & Maintenance', 'Faster Time to Market'],
            ],
            'api-integration-services' => [
                'name' => 'API Integration Services',
                'hero_title' => 'Seamless API Integration for Connected Systems',
                'description' => 'We integrate your applications, platforms, and third-party services to ensure smooth data flow, improved efficiency, and better business performance.',
                'overview' => 'At Innoversion Technolab, we provide reliable API integration services that connect your software with external systems, tools, and platforms. Our solutions help businesses automate workflows, enhance functionality, and eliminate manual processes. We ensure secure, scalable, and high-performance integrations that allow your systems to communicate efficiently and work as one unified solution.',
                'features' => ['Third-Party API Integration', 'Payment Gateway Integration', 'CRM & ERP Integration', 'REST & SOAP API Development', 'Secure Data Exchange'],
                'why_choose' => ['Streamlined Business Processes', 'Improved Data Accuracy', 'Faster Operations & Automation', 'Enhanced System Connectivity'],
            ],
            'workflow-automation' => [
                'name' => 'Workflow Automation',
                'hero_title' => 'Streamlining Business Processes with Workflow Automation',
                'description' => 'We automate repetitive tasks and workflows to improve efficiency, reduce errors, and accelerate business operations.',
                'overview' => 'At Innoversion Technolab, we help businesses automate their daily operations by designing smart workflow automation solutions. Our systems eliminate manual processes, improve accuracy, and ensure faster execution of tasks across departments. From simple task automation to complex business workflows, we create solutions that enhance productivity and operational efficiency.',
                'features' => ['Business Process Automation', 'Task & Approval Workflows', 'CRM & ERP Automation', 'Data Synchronization', 'Custom Workflow Solutions'],
                'why_choose' => ['Increased Operational Efficiency', 'Reduced Manual Errors', 'Faster Decision Making', 'Cost & Time Savings'],
            ],
            'ui-ux-design' => [
                'name' => 'UI/UX Design',
                'hero_title' => 'Designing Intuitive & Engaging User Experiences',
                'description' => 'We design modern, user-friendly interfaces that enhance usability, improve engagement, and deliver seamless digital experiences.',
                'overview' => 'At Innoversion Technolab, we focus on crafting visually appealing and highly functional UI/UX designs that align with user behavior and business goals. Our design approach ensures that every interaction is smooth, intuitive, and impactful. We combine creativity with usability to deliver designs that not only look great but also perform exceptionally across web and mobile platforms.',
                'features' => ['User Research & Analysis', 'Wireframing & Prototyping', 'Web & Mobile UI Design', 'UX Optimization', 'Interactive Design Solutions'],
                'why_choose' => ['Improved User Engagement', 'Better User Satisfaction', 'Higher Conversion Rates', 'Strong Brand Experience'],
            ],
            'digital-marketing-seo' => [
                'name' => 'Digital Marketing & SEO',
                'hero_title' => 'Driving Growth with Data-Driven Digital Marketing & SEO',
                'description' => 'Boost your online presence, attract the right audience, and dominate search rankings with result-oriented marketing strategies.',
                'overview' => 'At Innoversion Technolab, we provide end-to-end digital marketing and SEO services designed to increase your visibility, traffic, and conversions. Today, over 90% of users start their journey through search engines, making SEO a critical factor for business success. Our expert team handles everything from technical SEO, content strategy, keyword optimization, and link building to ensure your website ranks higher and performs better. We focus on delivering measurable results that directly impact your business growth.',
                'features' => ['On-Page SEO Optimization (Meta tags, content, structure)', 'Off-Page SEO & Link Building (Backlinks, authority growth)', 'Keyword Research & Competitor Analysis', 'Content Marketing Strategy', 'Social Media Marketing', 'PPC Campaign Management'],
                'why_choose' => ['Targeted Audience Reach', 'Improved Brand Visibility', 'Measurable & Data-Driven Results', 'High ROI & Business Growth'],
            ],
        ];
    }
}
