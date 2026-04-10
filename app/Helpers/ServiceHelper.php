<?php

namespace App\Helpers;

class ServiceHelper
{
    public static function all(): array
    {
        return [
            'custom-software-development' => [
                'name' => 'Custom Software Development',
                'description' => 'Tailored solutions designed specifically for your unique business needs and operations.',
                'overview' => 'Custom software development involves designing, creating, and deploying software for a specific set of users, functions, or organizations. In contrast to commercial off-the-shelf software, custom software development targets exact requirements, scaling perfectly as your business grows.',
                'features' => ['Bespoke Architecture', 'High Scalability', 'Advanced Security', 'Seamless Integration', 'Automated Workflows'],
                'why_choose' => ['Perfect Fit for Your Business', 'Higher ROI', 'Better Support & Maintenance', 'Enhanced Productivity'],
            ],
            'web-application-development' => [
                'name' => 'Web Application Development',
                'description' => 'Scalable, secure, and responsive web apps that provide seamless experiences across all devices.',
                'overview' => 'Web application development is the creation of application programs that reside on remote servers and are delivered to the user\'s device over the Internet. A web application does not need to be downloaded and is accessed through a network.',
                'features' => ['Responsive Design', 'Cross-Browser Variability', 'Rich User Interface', 'Cloud Scalability', 'High Performance'],
                'why_choose' => ['Wider Audience Reach', 'No Installation Required', 'Easy to Update', 'Cost-Effective Development'],
            ],
            'mobile-app-development' => [
                'name' => 'Mobile App Development',
                'description' => 'High-performance native and cross-platform mobile apps for iOS and Android devices.',
                'overview' => 'Mobile application development is the process of creating software applications that run on a mobile device. We build powerful apps using native components or cross-platform technologies to deliver engaging experiences right on your users\' smartphones.',
                'features' => ['Native App Development', 'Cross-Platform Frameworks', 'Fluid UI/UX', 'Offline Capabilities', 'Hardware Integration'],
                'why_choose' => ['Direct Customer Engagement', 'Enhanced Brand Loyalty', 'Competitive Advantage', 'New Revenue Channels'],
            ],
            'saas-development' => [
                'name' => 'SaaS Development',
                'description' => 'Robust, reliable, and scalable Software as a Service platforms optimized for high availability.',
                'overview' => 'Software as a service (SaaS) is a software distribution model in which a cloud provider hosts applications and makes them available to end users over the internet. We help build multitenant SaaS ecosystems that grow with your user base.',
                'features' => ['Multi-Tenant Architecture', 'Subscription Management', 'Automated Provisioning', 'High Availability & SLA', 'Dynamic Resource Allocation'],
                'why_choose' => ['Recurring Revenue Model', 'Rapid Global Scaling', 'Easy Maintenance', 'Lower Friction Onboarding'],
            ],
            'api-integration-services' => [
                'name' => 'API Integration Services',
                'description' => 'Connect your systems seamlessly to improve data flow and operational efficiency.',
                'overview' => 'API integration is the connection between two or more applications, via their APIs, that lets those systems exchange data. API integrations power processes throughout many high-performing businesses that keep data in sync, enhance productivity, and drive revenue.',
                'features' => ['REST/GraphQL Services', 'Third-Party Integration', 'Data Synchronization', 'Microservices Architecture', 'Secure Data Transfer'],
                'why_choose' => ['Streamlined Operations', 'Real-Time Updates', 'Better User Context', 'Eliminate Redundancy'],
            ],
            'workflow-automation' => [
                'name' => 'Workflow Automation',
                'description' => 'Automate repetitive processes to save time, reduce errors, and focus on growth.',
                'overview' => 'Workflow automation is the design, execution, and automation of processes based on business rules where human tasks, data, or files are routed between people or systems based on pre-defined corporate regulations.',
                'features' => ['Process Mapping', 'Task Automation', 'Trigger-Based Actions', 'Real-Time Monitoring', 'Custom Dashboards'],
                'why_choose' => ['Reduced Human Error', 'Increased Efficiency', 'Significant Cost Savings', 'Improved Compliance'],
            ],
            'ui-ux-design' => [
                'name' => 'UI/UX Design',
                'description' => 'Beautiful, user-centered interface designs that boost engagement and satisfaction.',
                'overview' => 'User Interface (UI) and User Experience (UX) Design focus on the look, feel, and usability of your product. Our goal is to create interfaces that are not only visually appealing but also strategically structured to provide an intuitive and satisfying journey for the user.',
                'features' => ['Wireframing & Prototyping', 'User Research', 'Usability Testing', 'Interactive Design', 'Visual Hierarchy'],
                'why_choose' => ['Higher Conversion Rates', 'Increased Customer Loyalty', 'Lower Support Costs', 'Strong Brand Identity'],
            ],
            'digital-marketing-seo' => [
                'name' => 'Digital Marketing & SEO',
                'description' => 'Grow your online presence and dominate search results with data-driven marketing.',
                'overview' => 'Digital marketing encompasses all marketing efforts that use an electronic device or the internet. SEO is the practice of increasing the quantity and quality of traffic to your website through organic search engine results.',
                'features' => ['On-Page/Off-Page SEO', 'Keyword Research', 'Content Strategy', 'Social Media Marketing', 'PPC Campaigns'],
                'why_choose' => ['Targeted Audience Reach', 'Measurable Results', 'Improved Brand Awareness', 'High ROI'],
            ],
        ];
    }
}
