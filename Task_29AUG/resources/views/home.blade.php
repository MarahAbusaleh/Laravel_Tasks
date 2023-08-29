<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
            border-bottom: 1px solid lightcoral;
        }

        .logo {
            font-size: 24px;
            color: #333;
            text-decoration: none;
        }

        .nav a {
            color: #555;
            margin-right: 20px;
            text-decoration: none;
            transition: color 0.3s ease-in-out;
        }

        .nav a:hover {
            color: lightcoral;
        }

        .hero {
            text-align: center;
            padding: 60px 0;
        }

        .hero-title {
            font-size: 36px;
            color: lightcoral;
            margin-bottom: 20px;
        }

        .hero-text {
            font-size: 18px;
            color: #555;
            line-height: 1.6;
        }

    </style>
</head>
<body>
    <div class="container">
        <header class="header">
            <h1 class="logo">Hello</h1>
            <nav class="nav">
                <a href="#">Home</a>
                <a href="#">About</a>
                <a href="#">Services</a>
                <a href="#">Contact</a>
            </nav>
        </header>
        <section class="hero">
            <h1 class="hero-title">Welcome to Our Website</h1>
            <p class="hero-text">Thank you for visiting! Feel free to explore and enjoy our content.</p>
        </section>
    </div>

</body>
</html>
