<?php

namespace App\Helpers;

class TechnologyHelper
{
    public static function all(): array
    {
        return [
            'react' => [
                'name' => 'React.js',
                'hero_title' => 'Engineering Modern Web Experiences with React.js',
                'description' => 'We harness the power of React.js to build fast, scalable, and high-performance web applications with exceptional user experiences.',
                'overview' => 'At Innoversion Technolab, we utilize React.js to develop dynamic, enterprise-grade front-end solutions tailored to modern business needs. Its component-driven architecture enables us to build highly maintainable and scalable applications while ensuring rapid development cycles. With features like virtual DOM and efficient rendering, React.js allows us to deliver seamless, responsive, and interactive user interfaces that enhance engagement and performance.',
                'features' => ['Component-Driven Architecture', 'High-Performance Virtual DOM', 'Reusable & Maintainable Components', 'Robust Ecosystem & Community Support', 'Seamless API & Backend Integration'],
                'why_choose' => ['Accelerated Development & Time-to-Market', 'Highly Scalable & Flexible Solutions', 'Optimized Performance & Speed', 'Rich, Interactive User Interfaces'],
            ],
            'vue' => [
                'name' => 'Vue.js',
                'hero_title' => 'Building Modern & Scalable Applications with Vue.js',
                'description' => 'We leverage Vue.js to develop fast, lightweight, and highly interactive user interfaces for modern web applications.',
                'overview' => 'At Innoversion Technolab, we utilize Vue.js to create dynamic and performance-driven web applications. Known for its simplicity and flexibility, Vue.js enables us to build scalable front-end solutions with clean architecture and efficient state management. Its reactive data binding and component-based structure allow us to deliver seamless user experiences while ensuring faster development and easy maintenance.',
                'features' => ['Reactive Data Binding', 'Component-Based Architecture', 'Lightweight & High Performance', 'Flexible Integration Capabilities', 'Strong Ecosystem & Tooling'],
                'why_choose' => ['Fast Development & Easy Maintenance', 'Scalable & Flexible Architecture', 'Smooth User Experience', 'Cost-Effective Development'],
            ],
            'angular' => [
                'name' => 'Angular',
                'hero_title' => 'Engineering Scalable & Enterprise-Grade Applications with Angular',
                'description' => 'We leverage Angular to build robust, high-performance, and scalable web applications tailored for complex business environments.',
                'overview' => 'At Innoversion Technolab, we specialize in developing enterprise-grade web applications using Angular - a powerful and structured front-end framework. Angular enables us to build large-scale applications with clean architecture, high maintainability, and consistent performance. With its TypeScript-based development and built-in features, we create secure, scalable, and future-ready solutions that meet modern business demands. Our approach ensures seamless user experiences, efficient data handling, and long-term scalability.',
                'included' => ['Custom Angular Application Development', 'Single Page Application (SPA) Development', 'Enterprise Web Application Solutions', 'REST API Integration', 'Performance Optimization & Testing'],
                'features' => ['Component-Based Architecture', 'Two-Way Data Binding', 'Dependency Injection System', 'TypeScript for Strong Typing', 'Modular & Maintainable Code Structure'],
                'why_choose' => ['Ideal for Enterprise-Level Applications', 'High Scalability & Code Maintainability', 'Faster Development with Angular CLI', 'Secure & Structured Framework'],
            ],
            'node-js' => [
                'name' => 'Node.js',
                'hero_title' => 'Building High-Performance Backend Solutions with Node.js',
                'description' => 'We develop fast, scalable, and reliable backend systems using Node.js to power modern applications and handle real-time data efficiently.',
                'overview' => 'At Innoversion Technolab, we leverage Node.js to build high-performance server-side applications that support modern business needs. Its event-driven, non-blocking architecture allows us to handle multiple requests simultaneously with speed and efficiency. Whether it is real-time applications, APIs, or scalable platforms, our Node.js solutions ensure seamless performance, flexibility, and long-term reliability.',
                'features' => ['Asynchronous & Event-Driven Architecture', 'Fast Code Execution & High Performance', 'Highly Scalable & Lightweight', 'Cross-Platform Compatibility', 'Efficient Data Handling (No Buffering)'],
                'why_choose' => ['High-Performance Real-Time Applications', 'Scalable Microservices Architecture', 'Rich Ecosystem (NPM Packages)', 'Full-Stack JavaScript Development'],
            ],
            'laravel' => [
                'name' => 'Laravel',
                'hero_title' => 'Building Secure & Scalable Web Applications with Laravel',
                'description' => 'We develop modern, high-performance web applications using Laravel, ensuring clean architecture, security, and faster development.',
                'overview' => 'At Innoversion Technolab, we use Laravel - a powerful open-source PHP framework based on the MVC architecture - to build robust and scalable web applications. It allows us to write clean, structured, and maintainable code, making development faster and more efficient. Laravel provides advanced features and flexibility to create customized solutions tailored to your business needs. From startups to enterprise-level platforms, we deliver secure, high-quality applications with seamless performance and user experience.',
                'features' => ['MVC Architecture for Structured Development', 'Clean, Readable & Maintainable Code', 'Built-in Security & Authentication', 'Faster Development & Reduced Time', 'Scalable & Customizable Solutions'],
                'why_choose' => ['Rapid Development with Elegant Syntax', 'Secure & Reliable Framework', 'Ideal for Custom Business Applications', 'High Performance & Flexibility'],
            ],
            'python' => [
                'name' => 'Python',
                'hero_title' => 'Building Scalable & Intelligent Solutions with Python',
                'description' => 'We leverage Python to develop powerful, flexible, and data-driven applications that support modern business needs.',
                'overview' => 'At Innoversion Technolab, we use Python to build scalable web applications, automation tools, and data-driven solutions. Known for its simplicity and versatility, Python enables faster development while maintaining high performance and reliability. From backend systems to advanced integrations, Python allows us to deliver efficient and customized solutions tailored to your business goals.',
                'features' => ['Simple & Readable Syntax', 'Rapid Development & Flexibility', 'Scalable & High-Performance Solutions', 'Strong Library & Framework Support', 'Multi-Purpose Development Capabilities'],
                'why_choose' => ['Faster Development & Deployment', 'Ideal for Data-Driven Applications', 'Highly Scalable & Versatile', 'Strong Community & Ecosystem'],
            ],
            'codeigniter' => [
                'name' => 'CodeIgniter',
                'hero_title' => 'Building Fast & Lightweight Web Applications with CodeIgniter',
                'description' => 'We develop high-performance, scalable, and secure web applications using CodeIgniter for faster delivery and efficient performance.',
                'overview' => 'At Innoversion Technolab, we use CodeIgniter - a robust and open-source PHP framework based on the MVC architecture - to build dynamic and efficient web applications. Its lightweight structure and flexibility allow us to deliver fast, reliable, and easy-to-manage solutions. With built-in libraries for validation, security, database handling, and error management, CodeIgniter enables us to create feature-rich applications with minimal complexity and maximum performance.',
                'features' => ['Lightweight & High-Performance Framework', 'MVC Architecture for Structured Development', 'Built-in Security & Validation Tools', 'Database Abstraction & Error Handling', 'Easy Configuration & Fast Development'],
                'why_choose' => ['Faster Development with Minimal Coding', 'Ideal for Dynamic Web Applications', 'Flexible & Easy to Manage', 'Cost-Effective Development Solution'],
            ],
            'flutter' => [
                'name' => 'Flutter',
                'description' => 'Create beautiful, natively compiled cross-platform applications from a single codebase with Flutter.',
                'overview' => 'Flutter is Google\'s open-source UI software development kit. It is used to develop cross-platform applications for Android, iOS, Linux, macOS, Windows, Google Fuchsia, and the web from a single codebase, drastically reducing time-to-market.',
                'features' => ['Hot Reload', 'Expressive & Flexible UI', 'Native Performance', 'Custom Widgets', 'Single Codebase'],
                'why_choose' => ['Faster App Development', 'Stunning User Interfaces', 'Cost-Effective Cross-Platform', 'Backed by Google'],
            ],
            'react-native' => [
                'name' => 'React Native',
                'description' => 'Build native mobile apps using JavaScript and React. Reach both iOS and Android users swiftly.',
                'overview' => 'React Native is an open-source UI software framework created by Meta Platforms. It is used to develop applications for Android, iOS, and Web by enabling developers to use the React framework along with native platform capabilities.',
                'features' => ['Write Once, Use Anywhere', 'Live Reload', 'Third-Party Plugin Support', 'Component-Based UI', 'Strong Community'],
                'why_choose' => ['Time and Cost Efficiency', 'Native Look and Feel', 'Shared Codebase with Web', 'Large Ecosystem'],
            ],
            'android' => [
                'name' => 'Android (Native)',
                'description' => 'Develop high-performance, robust, and scalable native applications for the Android ecosystem.',
                'overview' => 'Native Android development involves creating applications specifically for the Android operating system using Kotlin or Java. It provides the highest level of performance, direct access to device hardware, and the best integration with OS features.',
                'features' => ['High Performance & Fluidity', 'Direct Hardware Access', 'Latest OS Feature Support', 'Kotlin Modern Syntax', 'Robust Security'],
                'why_choose' => ['Unmatched App Performance', 'Best User Experience', 'Full Access to Android APIs', 'High Scalability'],
            ],
            'ios' => [
                'name' => 'iOS (Native)',
                'description' => 'Craft premium, high-quality native applications for iPhones and iPads using Swift or Objective-C.',
                'overview' => 'Native iOS development ensures you build the most responsive, secure, and user-friendly applications for Apple devices. Utilizing Swift provides powerful typing, memory management, and blazing fast performance within the Apple ecosystem.',
                'features' => ['Uncompromised Performance', 'Immersive UI/UX Standards', 'High Security & Privacy', 'Deep Apple Ecosystem Integration', 'Swift Modern Syntax'],
                'why_choose' => ['Premium User Base', 'Exceptional Quality Standards', 'Highest Security', 'Seamless Apple Integration'],
            ],
            'shopify' => [
                'name' => 'Shopify',
                'description' => 'Build scalable and customizable eCommerce platforms that drive sales with Shopify.',
                'overview' => 'Shopify is a complete commerce platform that lets you start, grow, and manage a business. It provides everything you need to create an online store, manage inventory, process payments, and launch successful marketing campaigns.',
                'features' => ['Secure Checkout', 'Extensive App Ecosystem', 'Customizable Themes', 'Inventory Management', 'Built-in Marketing Tools'],
                'why_choose' => ['Quick Go-To-Market', 'Reliable Hosting & Security', 'Scalable from Startup to Enterprise', 'Ease of Use for Merchants'],
            ],
            'magento' => [
                'name' => 'Magento',
                'description' => 'Deliver powerful, flexible, and enterprise-grade eCommerce experiences with Magento.',
                'overview' => 'Magento is an open-source e-commerce platform written in PHP. It provides online merchants with an exceptionally flexible shopping cart system, as well as control over the look, content, and functionality of their online store.',
                'features' => ['Advanced Catalog Management', 'Powerful SEO Features', 'Highly Customizable Architecture', 'Multi-Store Functionality', 'Robust Integrations'],
                'why_choose' => ['Enterprise E-commerce Capabilities', 'Limitless Customization', 'Scalability for Massive Inventories', 'Strong Global Community'],
            ],
            'wordpress' => [
                'name' => 'WordPress',
                'description' => 'Power your digital presence with the world\'s most popular, versatile, and user-friendly CMS.',
                'overview' => 'WordPress is a free and open-source content management system written in PHP. It features a plugin architecture and a template system, enabling you to build anything from flexible blogs and portfolios to complex corporate sites and WooCommerce stores.',
                'features' => ['User-Friendly Dashboard', 'Massive Plugin Directory', 'Extensive Theme Ecosystem', 'SEO Optimizer Friendly', 'Strong Media Management'],
                'why_choose' => ['Cost-Effective Solution', 'Easy to Update & Manage', 'Highly Versatile', 'Great for SEO & Content Marketing'],
            ],
            'aws' => [
                'name' => 'AWS (Amazon Web Services)',
                'description' => 'Scale innovate rapidly using the world\'s most comprehensive and broadly adopted cloud platform.',
                'overview' => 'Amazon Web Services (AWS) is a secure cloud services platform, offering compute power, database storage, content delivery and other functionality to help businesses scale and grow. It provides reliable and scalable cloud computing services.',
                'features' => ['High Availability & Scalability', 'Advanced Security Protocols', 'Serverless Computing (Lambda)', 'Extensive Data Analytics', 'Global Infrastructure'],
                'why_choose' => ['Industry-Leading Cloud Capabilities', 'Cost-Effective Pay-As-You-Go', 'Elastic & Flexible', 'Enterprise-Grade Security'],
            ],
            'ui-ux-design' => [
                'name' => 'UI/UX Design',
                'description' => 'Craft beautiful, user-centered designs that enhance user engagement and deliver exceptional digital experiences.',
                'overview' => 'User Interface (UI) and User Experience (UX) design focus on the aesthetics, usability, and architecture of digital products. Our design team creates intuitive, user-friendly, and beautiful interfaces that not only look stunning but drive conversions and improve customer satisfaction.',
                'features' => ['Wireframing & Prototyping', 'User Research & Personas', 'Visual & Interaction Design', 'Usability Testing', 'Responsive & Mobile-First Design'],
                'why_choose' => ['Higher User Engagement', 'Increased Conversion Rates', 'Brand Consistency', 'Intuitive User Journeys'],
            ],
            'seo' => [
                'name' => 'SEO (Search Engine Optimization)',
                'description' => 'Boost your online visibility and drive organic traffic through expert Search Engine Optimization strategies.',
                'overview' => 'Search Engine Optimization (SEO) involves optimizing your website to rank higher in search engine results pages. Our comprehensive SEO services cover on-page optimization, technical SEO, content strategy, and link building to ensure sustainable organic growth.',
                'features' => ['Keyword Research', 'Technical Site Audits', 'On-Page Optimization', 'High-Quality Backlinking', 'Performance Tracking'],
                'why_choose' => ['Sustainable Traffic Growth', 'Higher Search Rankings', 'Improved Brand Authority', 'Cost-Effective Lead Gen'],
            ],
            'devops' => [
                'name' => 'DevOps',
                'description' => 'Accelerate delivery, improve reliability, and streamline collaboration with expert DevOps practices.',
                'overview' => 'DevOps is a set of practices that combines software development (Dev) and IT operations (Ops). It aims to shorten the systems development life cycle and provide continuous delivery with high software quality by automating pipelines and infrastructure.',
                'features' => ['Continuous Integration/Deployment (CI/CD)', 'Infrastructure as Code (IaC)', 'Automated Testing', 'Performance Monitoring', 'Containerization (Docker/Kubernetes)'],
                'why_choose' => ['Faster Time-to-Market', 'Increased Deployment Frequency', 'Lower Failure Rates', 'Improved Collaboration'],
            ],
            'zoho' => [
                'name' => 'Zoho',
                'description' => 'Streamline your business operations with comprehensive Zoho ERP and CRM implementations.',
                'overview' => 'Zoho offers a unique and powerful suite of software designed to transform the way you work. Designed for businesses of all sizes, it covers CRM, HR, Finance, and Marketing seamlessly connected on one platform.',
                'features' => ['Unified Business Suite', 'Customizable Workflows', 'Advanced Reporting & Analytics', 'Third-Party Integrations', 'High Security'],
                'why_choose' => ['Cost-Effective Licensing', 'All-in-One Operating System for Business', 'High Customizability', 'Easy to Use'],
            ],
            'odoo' => [
                'name' => 'Odoo',
                'description' => 'Integrate and manage your entire business effortlessly with Odoo\'s modular ERP solutions.',
                'overview' => 'Odoo is a suite of open source business apps that cover all your company needs: CRM, eCommerce, accounting, inventory, point of sale, project management, etc. Odoo\'s unique value proposition is to be at the same time very easy to use and fully integrated.',
                'features' => ['Modular App Architecture', 'Complete ERP Solution', 'Intuitive User Interface', 'Open-Source Flexibility', 'Seamless Integration'],
                'why_choose' => ['Highly Scalable', 'No More Data Silos', 'Cost Effective ERP', 'Customizable for Any Industry'],
            ],
        ];
    }
}
