<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unsubscribe Status</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f7fb;
            color: #1f2937;
        }

        .wrap {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .card {
            width: 100%;
            max-width: 520px;
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 28px 24px;
            box-shadow: 0 10px 25px rgba(15, 23, 42, 0.06);
            text-align: center;
        }

        .card h1 {
            margin: 0 0 12px;
            font-size: 24px;
            color: #E2010F;
        }

        .card p {
            margin: 0;
            font-size: 16px;
            line-height: 1.6;
        }

        .card a {
            display: inline-block;
            margin-top: 18px;
            color: #E2010F;
            text-decoration: none;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <div class="wrap">
        <div class="card">
            <h1>Email Preferences Updated</h1>
            <p>{{ $message ?? 'You have been unsubscribed.' }}</p>
            <a href="{{ url('/') }}">Back to Website</a>
        </div>
    </div>
</body>

</html>
