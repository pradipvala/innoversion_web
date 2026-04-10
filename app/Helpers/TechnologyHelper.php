<?php

namespace App\Helpers;

class TechnologyHelper
{
    public static function all(): array
    {
        return [
            'react' => [
                'name' => 'React.js',
                'description' => 'Build dynamic, scalable, and high-performance user interfaces with React.js. We leverage component-based architecture for modern web applications.',
                'overview' => 'React.js is a powerful JavaScript library for building user interfaces. Maintained by Facebook, it allows developers to create large web applications that can consume data and change over time without reloading the page. Its virtual DOM ensures fast rendering and a smooth user experience.',
                'features' => ['Component-Based Architecture', 'Virtual DOM for Performance', 'Declarative Views', 'Strong Ecosystem & Community', 'Seamless Integration'],
                'why_choose' => ['Accelerated Development', 'SEO Friendly', 'Scalable & Flexible', 'Reusable Interactive Components'],
            ],
            'vue' => [
                'name' => 'Vue.js',
                'description' => 'Create progressive and highly adaptable web interfaces with Vue.js. Combining the best of both worlds for seamless frontend development.',
                'overview' => 'Vue.js is an open-source model-view-viewmodel front end JavaScript framework for building user interfaces and single-page applications. It incrementally adaptable design makes it remarkably easy to integrate into projects that use other JavaScript libraries.',
                'features' => ['Reactive Data Binding', 'Sleek & Lightweight Component System', 'Virtual DOM', 'Detailed Documentation', 'Easy Integration'],
                'why_choose' => ['Fast Learning Curve', 'High Performance', 'Flexible Architecture', 'Outstanding Community Support'],
            ],
            'angular' => [
                'name' => 'Angular',
                'description' => 'Develop enterprise-grade, robust web applications with Angular. A complete framework for ambitious frontend projects.',
                'overview' => 'Angular is a platform and framework for building single-page client applications using HTML and TypeScript. It implements core and optional functionality as a set of TypeScript libraries that you import into your apps, providing a robust toolset for enterprise development.',
                'features' => ['Two-Way Data Binding', 'Dependency Injection', 'MVC Architecture', 'Command Line Interface (CLI)', 'TypeScript Based'],
                'why_choose' => ['Enterprise-Ready Solutions', 'High Performance & Speed', 'Comprehensive Framework', 'Maintained by Google'],
            ],
            'node-js' => [
                'name' => 'Node.js',
                'description' => 'Build fast, scalable network applications with Node.js. Empowering your backend with event-driven, non-blocking I/O.',
                'overview' => 'Node.js is a back-end JavaScript runtime environment that runs on the V8 engine and executes JavaScript code outside a web browser. It is designed to build scalable network applications, capable of handling a large number of simultaneous connections with high throughput.',
                'features' => ['Asynchronous & Event-Driven', 'Fast Code Execution', 'Single-Threaded but Highly Scalable', 'No Buffering', 'Cross-Platform'],
                'why_choose' => ['High Performance Real-Time Apps', 'Microservices Architecture', 'Rich Ecosystem (NPM)', 'Fullstack JavaScript'],
            ],
            'laravel' => [
                'name' => 'Laravel',
                'description' => 'Craft elegant and secure PHP web applications with Laravel. The framework for web artisans.',
                'overview' => 'Laravel is a PHP web framework with expressive, elegant syntax. It provides a structure and starting point for creating your application, allowing you to focus on creating something amazing while routing, sessions, and caching are handled with ease.',
                'features' => ['Eloquent ORM', 'Blade Templating Engine', 'Robust Routing & Middleware', 'Built-in Security Methods', 'Artisan Console'],
                'why_choose' => ['Rapid Development Time', 'High Security Standard', 'Strong Community & Packages', 'Scalable for Large Apps'],
            ],
            'python' => [
                'name' => 'Python',
                'description' => 'Leverage the power of Python for web development, AI, and data science. Unmatched versatility and productivity.',
                'overview' => 'Python is an interpreted, high-level and general-purpose programming language. Its design philosophy emphasizes code readability, making it extremely productive for back-end web development, automation, data analytics, and machine learning.',
                'features' => ['Simple & Readable Syntax', 'Extensive Standard Library', 'Dynamically Typed', 'Multi-Paradigm Support', 'Platform Independent'],
                'why_choose' => ['Fast Prototyping', 'Top Choice for AI/ML', 'Massive Third-Party Modules', 'Highly Secure Web Frameworks'],
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
            'azure' => [
                'name' => 'Microsoft Azure',
                'description' => 'Empower your enterprise with scalable, secure, and hybrid cloud solutions using Microsoft Azure.',
                'overview' => 'Microsoft Azure is a cloud computing service for building, testing, deploying, and managing applications and services through Microsoft-managed data centers. It provides SaaS, PaaS, and IaaS and supports many different programming languages, tools, and frameworks.',
                'features' => ['Hybrid Cloud Capabilities', 'PaaS & IaaS Excellence', 'Integration with Microsoft Ecosystem', 'Advanced AI & Machine Learning', 'Robust Security & Compliance'],
                'why_choose' => ['Seamless Microsoft Integration', 'Enterprise Focused', 'Highly Reliable', 'Global Scale'],
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
