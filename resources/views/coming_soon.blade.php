<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coming Soon | Innovative IT Solutions</title>
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&family=Outfit:wght@500;700&display=swap"
        rel="stylesheet">
    <!-- FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary: #00e1ff;
            --secondary: #0051ff;
            --dark-bg: #050a15;
            --text-light: #f8f9fa;
            --text-muted: #a0abbf;
            --glass-bg: rgba(255, 255, 255, 0.05);
            --glass-border: rgba(255, 255, 255, 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--dark-bg);
            color: var(--text-light);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            position: relative;
        }

        /* Animated Background Elements */
        .background-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 0;
            pointer-events: none;
        }

        .gradient-blob {
            position: absolute;
            filter: blur(100px);
            opacity: 0.5;
            border-radius: 50%;
            animation: moveBlob 15s infinite alternate ease-in-out;
        }

        .blob-1 {
            background: radial-gradient(circle, var(--primary), transparent);
            width: 600px;
            height: 600px;
            top: -200px;
            left: -200px;
        }

        .blob-2 {
            background: radial-gradient(circle, var(--secondary), transparent);
            width: 500px;
            height: 500px;
            bottom: -150px;
            right: -150px;
            animation-delay: -5s;
        }

        .blob-3 {
            background: radial-gradient(circle, #7000ff, transparent);
            width: 400px;
            height: 400px;
            top: 40%;
            left: 60%;
            animation-delay: -10s;
        }

        @keyframes moveBlob {
            0% {
                transform: translate(0, 0) scale(1);
            }

            50% {
                transform: translate(100px, 50px) scale(1.2);
            }

            100% {
                transform: translate(-50px, 150px) scale(0.9);
            }
        }

        /* Glassmorphism Grid Overlay */
        .grid-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image:
                linear-gradient(rgba(255, 255, 255, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
            background-size: 50px 50px;
            z-index: 1;
            pointer-events: none;
        }

        /* Main Content Container */
        .main-content {
            position: relative;
            z-index: 2;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            flex-grow: 1;
            padding: 2rem;
            text-align: center;
        }

        /* Header / Logo */
        header {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            padding: 2rem 4rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 10;
        }

        .logo {
            font-family: 'Outfit', sans-serif;
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--text-light);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
            animation: fadeInDown 1s ease forwards;
        }

        .logo i {
            color: var(--primary);
            font-size: 2rem;
        }

        .contact-btn {
            background: transparent;
            color: var(--text-light);
            border: 1px solid var(--glass-border);
            padding: 0.6rem 1.5rem;
            border-radius: 30px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            animation: fadeInDown 1s ease forwards;
        }

        .contact-btn:hover {
            background: var(--glass-bg);
            border-color: var(--primary);
            color: var(--primary);
        }

        /* Typography */
        .badge {
            background: rgba(0, 225, 255, 0.1);
            color: var(--primary);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 1.5rem;
            border: 1px solid rgba(0, 225, 255, 0.2);
            animation: fadeInUp 1s ease 0.2s forwards;
            opacity: 0;
        }

        h1 {
            font-family: 'Outfit', sans-serif;
            font-size: clamp(3rem, 6vw, 5.5rem);
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 1.5rem;
            background: linear-gradient(to right, #fff, var(--text-muted));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: fadeInUp 1s ease 0.4s forwards;
            opacity: 0;
            max-width: 900px;
        }

        .subtitle {
            font-size: clamp(1rem, 2vw, 1.25rem);
            color: var(--text-muted);
            max-width: 600px;
            line-height: 1.6;
            margin-bottom: 3rem;
            animation: fadeInUp 1s ease 0.6s forwards;
            opacity: 0;
        }

        /* Countdown Timer */
        .countdown {
            display: flex;
            gap: 1.5rem;
            margin-bottom: 3.5rem;
            animation: fadeInUp 1s ease 0.8s forwards;
            opacity: 0;
        }

        .time-block {
            background: var(--glass-bg);
            border: 1px solid var(--glass-border);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            padding: 1.5rem;
            border-radius: 16px;
            min-width: 100px;
            display: flex;
            flex-direction: column;
            align-items: center;
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }

        .time-block:hover {
            transform: translateY(-5px);
            border-color: rgba(255, 255, 255, 0.2);
        }

        .time-block span {
            font-family: 'Outfit', sans-serif;
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary);
            line-height: 1;
            margin-bottom: 0.5rem;
        }

        .time-block p {
            font-size: 0.85rem;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
        }

        /* Newsletter Form */
        .newsletter {
            width: 100%;
            max-width: 500px;
            display: flex;
            position: relative;
            animation: fadeInUp 1s ease 1s forwards;
            opacity: 0;
        }

        .newsletter input {
            width: 100%;
            padding: 1.2rem 1.5rem;
            padding-right: 140px;
            background: var(--glass-bg);
            border: 1px solid var(--glass-border);
            border-radius: 50px;
            color: var(--text-light);
            font-size: 1rem;
            outline: none;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .newsletter input::placeholder {
            color: var(--text-muted);
        }

        .newsletter input:focus {
            border-color: var(--primary);
            background: rgba(255, 255, 255, 0.08);
            box-shadow: 0 0 20px rgba(0, 225, 255, 0.1);
        }

        .newsletter button {
            position: absolute;
            right: 6px;
            top: 6px;
            bottom: 6px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: #fff;
            border: none;
            border-radius: 40px;
            padding: 0 1.5rem;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            font-family: 'Inter', sans-serif;
        }

        .newsletter button:hover {
            transform: scale(1.02);
            box-shadow: 0 4px 15px rgba(0, 81, 255, 0.4);
        }

        /* Footer */
        footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            padding: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 10;
            animation: fadeIn 1s ease 1.2s forwards;
            opacity: 0;
        }

        .copyright {
            color: var(--text-muted);
            font-size: 0.9rem;
        }

        .social-icons {
            display: flex;
            gap: 1rem;
        }

        .social-icons a {
            color: var(--text-muted);
            font-size: 1.2rem;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: var(--glass-bg);
            border: 1px solid var(--glass-border);
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .social-icons a:hover {
            color: var(--primary);
            border-color: var(--primary);
            transform: translateY(-3px);
            background: rgba(0, 225, 255, 0.1);
        }

        /* Animations */
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            header {
                padding: 1.5rem;
                flex-direction: column;
                gap: 1rem;
            }

            footer {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .countdown {
                flex-wrap: wrap;
                justify-content: center;
                gap: 1rem;
            }

            .time-block {
                min-width: calc(50% - 0.5rem);
                padding: 1rem;
            }
        }

        @media (max-width: 480px) {
            .newsletter input {
                padding-right: 1.5rem;
                border-radius: 20px;
            }

            .newsletter button {
                position: static;
                width: 100%;
                margin-top: 10px;
                padding: 1rem;
                border-radius: 20px;
            }

            .newsletter {
                flex-direction: column;
                background: transparent;
            }
        }
    </style>
</head>

<body>

    <!-- Background Animation -->
    <div class="background-container">
        <div class="gradient-blob blob-1"></div>
        <div class="gradient-blob blob-2"></div>
        <div class="gradient-blob blob-3"></div>
    </div>
    <div class="grid-overlay"></div>

    <!-- Header -->
    <header>
        <a href="#" class="logo">
            Innoversion Technolab
        </a>
        <a href="mailto:info@innoversiontechnolab.com" class="contact-btn">Contact Us</a>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <div class="badge">Next Generation IT</div>

        <h1>Something Extraordinary Is Coming</h1>

        <p class="subtitle">
            We are redefining digital transformation. Our team of experts is building a platform that will revolutionize
            your enterprise IT solutions. Get ready for the future.
        </p>

        <!-- Countdown -->
        <div class="countdown" id="countdown">
            <div class="time-block">
                <span id="days">00</span>
                <p>Days</p>
            </div>
            <div class="time-block">
                <span id="hours">00</span>
                <p>Hours</p>
            </div>
            <div class="time-block">
                <span id="minutes">00</span>
                <p>Minutes</p>
            </div>
            <div class="time-block">
                <span id="seconds">00</span>
                <p>Seconds</p>
            </div>
        </div>


    </main>

    <!-- Footer -->
    <footer>
        <div class="copyright">
            &copy;
            <script>
                document.write(new Date().getFullYear())
            </script> Innoversion Technolab. All rights reserved.
        </div>

    </footer>

    <script>
        // Set launch date to 30 days from now
        const launchDate = new Date();
        const today = new Date();
        launchDate.setDate(27);
        launchDate.setHours(0, 0, 0, 0);
        // Update the countdown every second
        const countdownTimer = setInterval(() => {
            const now = new Date().getTime();
            const distance = launchDate - now;

            // Calculate time left
            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Output the result
            document.getElementById("days").innerText = days.toString().padStart(2, '0');
            document.getElementById("hours").innerText = hours.toString().padStart(2, '0');
            document.getElementById("minutes").innerText = minutes.toString().padStart(2, '0');
            document.getElementById("seconds").innerText = seconds.toString().padStart(2, '0');

            // If the countdown is over
            if (distance < 0) {
                clearInterval(countdownTimer);
                document.getElementById("countdown").innerHTML =
                    "<h2 style='color: var(--primary); font-family: Outfit, sans-serif;'>We Are Live!</h2>";
            }
        }, 1000);

        // Subtle 3D tilt effect for the time blocks based on mouse movement
        document.addEventListener('mousemove', (e) => {
            const blocks = document.querySelectorAll('.time-block');
            const xAxis = (window.innerWidth / 2 - e.pageX) / 25;
            const yAxis = (window.innerHeight / 2 - e.pageY) / 25;

            blocks.forEach(block => {
                block.style.transform =
                    `perspective(1000px) rotateY(${xAxis}deg) rotateX(${yAxis}deg) translateY(-5px)`;
            });
        });

        // Reset transform when mouse leaves
        document.addEventListener('mouseleave', () => {
            const blocks = document.querySelectorAll('.time-block');
            blocks.forEach(block => {
                block.style.transform = `perspective(1000px) rotateY(0deg) rotateX(0deg) translateY(0px)`;
            });
        });
    </script>
</body>

</html>
