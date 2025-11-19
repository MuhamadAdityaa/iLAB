<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>
    <style>
        /* Reset */
        * { box-sizing: border-box; }

        :root{
            /* Color palette (soft blue background with deep-blue primary and warm accent) */
            --bg: #add8e6; /* existing page background */
            --card: #ffffff;
            --primary: #7ec8f5; /* deep blue */
            --primary-600: #095486;
            --accent: #504f4e; /* coral accent */
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

        /* Centered card */
        .card {
            width: 420px;
            max-width: 92vw;
            background: var(--card);
            border: 2px solid var(--blk);
            border-radius: 14px;
            box-shadow: 0 8px 24px rgba(11,99,167,0.12);
            padding: 24px;
            display: flex;
            flex-direction: column;
            gap: 18px;
            align-items: center;
        }

        .card h1{
            margin: 0;
            font-size: 20px;
            letter-spacing: 0.2px;
            color: var(--blk);
        }

        /* 3 rows x 2 columns button grid */
        .btn-grid {
            width: 100%;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-auto-rows: 56px;
            gap: 12px;
        }

        .option-btn{
            appearance: none;
            border: 0;
            background: var(--primary);
            color: var(--blk);
            border-radius: 10px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: transform .12s ease, box-shadow .12s ease, opacity .12s ease;
            display:flex;
            align-items:center;
            justify-content:center;
            gap:8px;
            border: 2px solid var(--blk);
        }

        .option-btn:active{ transform: translateY(1px); }
        .option-btn:focus{ outline: 3px solid rgba(11,99,167,0.16); }

        /* Login button spanning both columns */
        .login-wrap{
            width: 100%;
            display:flex;
            justify-content:center;
        }

        .login-btn{
            width: calc(100%); /* spans both columns inside card */
            max-width: 100%;
            padding: 14px 18px;
            border-radius: 10px;
            border: 2px solid var(--blk);
            background: var(--accent);
            color: white;
            font-weight: 700;
            font-size: 15px;
            cursor: pointer;
            box-shadow: 0 6px 18px rgba(255,127,80,0.18);
            transition: transform .12s ease, opacity .12s ease;

        }

        .login-btn:hover{ transform: translateY(-2px); }

        /* Small screens: stack buttons to single column */
        @media (max-width:420px){
            .btn-grid{ grid-template-columns: 1fr; }
            .card{ padding: 18px; }
        }

        /* utility for subtle captions */
        .muted{ color: var(--muted); font-size: 13px; }
    </style>
</head>

<body>
    <div class="card" role="region" aria-label="Login options">
        <h1>Pilih Opsi  </h1>

        <div class="btn-grid" aria-hidden="false">
            @foreach($ruangan as $r)
                <a class="option-btn" type="button" href="{{ route("jadwal", $r->id) }}">{{ $r->nama_ruangan }}</a>
            @endforeach

            {{-- <button class="option-btn" type="button">Lab 3</button>
            <button class="option-btn" type="button">Lab 4</button>
            <button class="option-btn" type="button">Lab 5</button>
            <button class="option-btn" type="button" href="">Lab 6</button> --}}
        </div>

        <div class="login-wrap">
            <button class="login-btn" type="button">Login</button>
        </div>

        <div class="muted">Butuh bantuan? Hubungi admin.</div>
    </div>
</body>

</html>
