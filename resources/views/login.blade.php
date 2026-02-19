<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - Notepad</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
            min-height: 100vh;
            background: linear-gradient(135deg, #00a8d6, #0bbcd6);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            background: white;
            width: 360px;
            padding: 32px 28px;
            border-radius: 16px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
            text-align: center;
        }

        .logo {
            width: 80px;
            height: 80px;
            object-fit: contain;
            margin-bottom: 16px;
        }

        h1 {
            margin: 0;
            font-size: 24px;
            color: #111827;
        }

        .subtitle {
            margin: 8px 0 20px;
            color: #6b7280;
            font-size: 14px;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 12px;
            border-radius: 8px;
            border: 1px solid #d1d5db;
            font-size: 14px;
        }

        input:focus {
            outline: none;
            border-color: #2563eb;
        }

        button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            background: #2563eb;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #1d4ed8;
        }

        .guest {
            display: block;
            margin-top: 14px;
            font-size: 13px;
            color: #2563eb;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <div class="card">
        <!-- LOGO -->
        <img src="{{ asset('images/logo.png') }}" class="logo" alt="Logo">

        <h1>Selamat Datang 👋</h1>
        <div class="subtitle">Login untuk mulai mencatat</div>

        <!-- FORM LOGIN (sementara, tanpa database) -->
        <form method="GET" action="/app">
            <input type="text" placeholder="Username" required>
            <input type="password" placeholder="Password" required>
            <button type="submit">Masuk</button>
        </form>

        <a href="/app" class="guest">atau login sebagai tamu</a>
    </div>

</body>
</html>
