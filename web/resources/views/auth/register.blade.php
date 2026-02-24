<!DOCTYPE html>
<html>
<head>
    <title>Daftar</title>
    <style>
        body {
            margin: 0;
            height: 100vh;
            background: linear-gradient(120deg, #e0e7ff, #f8fafc);
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
        }

        .box {
            width: 700px;
            height: 400px;
            background: white;
            border-radius: 16px;
            display: flex;
            box-shadow: 0 25px 60px rgba(0,0,0,.15);
            overflow: hidden;
        }

        .left {
            width: 50%;
            padding: 50px;
        }

        .right {
            width: 50%;
            padding: 50px;
            background: #f9fafb;
        }

        h1 {
            margin-top: 0;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="box">
    <div class="left">
        <h1>Welcome 👋</h1>
        <p>Daftar untuk mulai mencatat</p>
    </div>

    <div class="right">
        <form method="POST" action="/daftar">
            @csrf

            <label>Username</label>
            <input type="text" name="username">

            <label>Password</label>
            <input type="password" name="password">

            <button type="submit">Daftar</button>
        </form>
    </div>
</div>

</body>
</html>
