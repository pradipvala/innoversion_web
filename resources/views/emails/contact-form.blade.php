<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            background-color: transparent;
            background-image: linear-gradient(180deg, #E2010F 0%, #00000000 100%);
            color: white;
            padding: 30px 20px;
            text-align: center;
        }

        .header h2 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
        }

        .brand-logo {
            max-width: 180px;
            width: 100%;
            height: auto;
            display: block;
            margin: 0 auto 14px;
        }

        .content {
            padding: 30px 20px;
            color: #333;
        }

        .content p {
            margin: 15px 0;
            line-height: 1.6;
            font-size: 16px;
        }

        .cta-wrap {
            margin-top: 24px;
            text-align: center;
        }

        .cta-btn {
            display: inline-block;
            background: #E2010F;
            color: #ffffff !important;
            text-decoration: none;
            font-weight: 600;
            border-radius: 6px;
            padding: 12px 22px;
        }

        .contact-meta {
            margin-top: 22px;
            padding: 14px;
            background-color: #fafafa;
            border: 1px solid #efefef;
            border-radius: 6px;
            font-size: 14px;
            line-height: 1.8;
        }

        .contact-meta a {
            color: #E2010F;
            text-decoration: none;
        }

        .footer {
            background-color: #f9f9f9;
            padding: 20px;
            text-align: center;
            border-top: 1px solid #eee;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="{{ asset('image/marko-logo.png') }}" alt="Innoversion Technolab" class="brand-logo">
            <h2>Thank You for Contacting Innoversion Technolab</h2>
        </div>
        <div class="content">
            <p>Thank you for connecting with Innoversion Technolab.</p>
            <p>We are happy to have you with us. Please feel free to connect if anything is required.</p>

            <div class="cta-wrap">
                <a class="cta-btn" href="https://innoversiontechnolab.com" target="_blank"
                    rel="noopener noreferrer">Visit Our Website</a>
            </div>

            <div class="contact-meta">
                <strong>Need immediate assistance?</strong><br>
                Phone: <a href="tel:+919687350999">+91 9687350999</a><br>
                Email: <a href="mailto:info@innoversiontechnolab.com">info@innoversiontechnolab.com</a>
            </div>
        </div>
        <div class="footer">
            @if (!empty($details['contact_email']))
                <p>
                    If you no longer want to receive these emails,
                    <a
                        href="{{ \Illuminate\Support\Facades\URL::temporarySignedRoute('newsletter.unsubscribe', now()->addDays(30), ['email' => $details['contact_email']]) }}">
                        unsubscribe here
                    </a>.
                </p>
            @else
                <p>If you no longer want to receive these emails, please contact our support team.</p>
            @endif
            <p>&copy; 2026 Innoversion. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
