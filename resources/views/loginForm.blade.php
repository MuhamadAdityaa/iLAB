<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>
    <style>
        * {
            box-sizing: border-box;
        }

        :root {
            --bg: #add8e6;
            --card: #ffffff;
            --primary: #7ec8f5;
            --accent: #504f4e;
            --muted: #6b7280;
            --blk: #000000;
        }

        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--bg);
            font-family: 'Arial Black', Arial, sans-serif;
            color: #111827;
            padding: 32px;
        }

        .card {
            width: 420px;
            max-width: 92vw;
            background: var(--card);
            border: 2px solid var(--blk);
            border-radius: 14px;
            box-shadow: 0 8px 24px rgba(11, 99, 167, 0.12);
            padding: 24px;
            display: flex;
            flex-direction: column;
            gap: 18px;
            align-items: center;
        }

        h1 {
            margin: 0;
            font-size: 22px;
            color: var(--blk);
        }

        .form-group {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        label {
            font-size: 14px;
            font-weight: 700;
            color: var(--blk);
        }

        input {
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            border: 2px solid var(--blk);
            font-size: 14px;
            background: var(--primary);
            color: var(--blk);
            font-weight: 600;
        }

        .login-btn {
            width: 100%;
            padding: 14px 18px;
            border-radius: 10px;
            border: 2px solid var(--blk);
            background: var(--accent);
            color: white;
            font-weight: 700;
            font-size: 15px;
            cursor: pointer;
            box-shadow: 0 6px 18px rgba(255, 127, 80, 0.18);
            transition: transform .12s ease;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            background: var(--primary);
        }

        
        .back-btn {
            width: calc(100%); /* spans both columns inside card */
            max-width: 100%;
            padding: 10px 18px;
            border-radius: 10px;
            border: 2px solid var(--blk);
            background: var(--accent);
            color: white;
            font-weight: 700;
            font-size: 15px;
            cursor: pointer;
            box-shadow: 0 6px 18px rgba(255,127,80,0.18);
            transition: transform .12s ease, opacity .12s ease;
            display:flex;
            align-items:center;
            justify-content:center;
            text-decoration: none;
        }

        .back-btn:hover {
            transform: translateY(-2px);
            background: var(--primary);
        }

        .muted {
            color: var(--muted);
            font-size: 13px;
        }
    </style>
</head>

<body>
    <div class="card">
        <h1>Login</h1>

        <form action="{{ Route('login.submit') }}" method="POST"
            style="width:100%; display:flex; flex-direction:column; gap:16px;">
            @csrf
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button class="login-btn" type="submit">Masuk</button>
        </form>

        <!-- Tombol Kembali -->
        <a href="{{ route('index') }}" class="back-btn">Kembali</a>
    </div>
</body>

</html>
