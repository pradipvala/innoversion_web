<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Submission</title>
</head>

<body style="margin:0; padding:24px; background:#f5f7fb; font-family:Arial, Helvetica, sans-serif; color:#111827;">
    <table role="presentation" cellspacing="0" cellpadding="0" width="100%"
        style="max-width:680px; margin:0 auto; background:#ffffff; border:1px solid #e5e7eb; border-radius:8px;">
        <tr>
            <td
                style="padding:20px 24px; border-bottom:1px solid #e5e7eb; background:#111827; color:#ffffff; border-top-left-radius:8px; border-top-right-radius:8px;">
                <h2 style="margin:0; font-size:20px; line-height:1.3;">Contact Form Submission</h2>
            </td>
        </tr>
        <tr>
            <td style="padding:20px 24px;">
                <p style="margin:0 0 16px 0; font-size:14px; color:#374151;">A new user has submitted the contact form.
                </p>
                <table role="presentation" cellspacing="0" cellpadding="0" width="100%"
                    style="border-collapse:collapse;">
                    <tr>
                        <td
                            style="padding:10px 0; border-bottom:1px solid #f3f4f6; width:180px; font-size:13px; color:#6b7280;">
                            First Name</td>
                        <td style="padding:10px 0; border-bottom:1px solid #f3f4f6; font-size:14px;">
                            {{ $details['first_name'] ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td
                            style="padding:10px 0; border-bottom:1px solid #f3f4f6; width:180px; font-size:13px; color:#6b7280;">
                            Last Name</td>
                        <td style="padding:10px 0; border-bottom:1px solid #f3f4f6; font-size:14px;">
                            {{ $details['last_name'] ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td
                            style="padding:10px 0; border-bottom:1px solid #f3f4f6; width:180px; font-size:13px; color:#6b7280;">
                            Contact Email</td>
                        <td style="padding:10px 0; border-bottom:1px solid #f3f4f6; font-size:14px;">
                            {{ $details['contact_email'] ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td
                            style="padding:10px 0; border-bottom:1px solid #f3f4f6; width:180px; font-size:13px; color:#6b7280;">
                            Country Code</td>
                        <td style="padding:10px 0; border-bottom:1px solid #f3f4f6; font-size:14px;">
                            {{ $details['countryCode'] ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td style="padding:10px 0; width:180px; font-size:13px; color:#6b7280;">Phone Number</td>
                        <td style="padding:10px 0; font-size:14px;">{{ $details['phone_number'] ?? '-' }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
