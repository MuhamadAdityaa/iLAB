<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        /* Reset */
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
            background: var(--bg);
            font-family: Arial, sans-serif;
            color: #111827;
        }

        /* Navbar */
        .navbar {
            background: var(--card) !important;
            border-bottom: 2px solid var(--blk);
            margin-left: 260px;
        }

        /* Sidebar */
        .sidebar {
            width: 260px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background: var(--card);
            border-right: 2px solid var(--blk);
            padding-top: 70px;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 18px;
            text-decoration: none;
            color: var(--blk);
            font-weight: 600;
            border-radius: 10px;
            margin: 6px 12px;
            transition: background .15s ease, transform .1s ease;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: var(--primary);
            transform: translateY(-1px);
        }

        .sidebar form {
            padding: 12px 24px;
        }

        /* Main content */
        .content {
            margin-left: 260px;
            padding: 100px 24px 24px;
        }

        /* Card wrapper for content */
        .page-card {
            background: var(--card);
            border: 2px solid var(--blk);
            border-radius: 14px;
            padding: 20px;
            box-shadow: 0 8px 24px rgba(11, 99, 167, 0.15);
        }

        /* Header */
        .content-header h4 {
            font-weight: 700;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
                border-right: none;
                border-bottom: 2px solid var(--blk);
            }

            .navbar,
            .content {
                margin-left: 0;
            }

            .content {
                padding-top: 120px;
            }
        }
    </style>
</head>

<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand fixed-top shadow-sm">
        <div class="container-fluid">
            <span class="navbar-brand fw-bold">@yield('title', 'Dashboard')</span>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-search"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-expand"></i></a>
                </li>
            </ul>
        </div>
    </nav>

    {{-- Sidebar --}}
    <div class="sidebar">
        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="fas fa-tachometer-alt"></i> Dashboard
        </a>
        <a href="{{ route('guru.index') }}" class="{{ request()->routeIs('guru.*') ? 'active' : '' }}">
            <i class="fas fa-users"></i> Guru
        </a>
        <a href="{{ route('mapel.index') }}" class="{{ request()->routeIs('mapel.*') ? 'active' : '' }}">
            <i class="fas fa-book"></i> Mata Pelajaran
        </a>
        <a href="{{ route('kelas.index') }}" class="{{ request()->routeIs('kelas.*') ? 'active' : '' }}">
            <i class="fas fa-school"></i> Kelas
        </a>
        <a href="{{ route('ruangan.index') }}" class="{{ request()->routeIs('ruangan.*') ? 'active' : '' }}">
            <i class="fas fa-door-open"></i> Ruangan
        </a>
        <a href="{{ route('jadwal.index') }}" class="{{ request()->routeIs('jadwal.*') ? 'active' : '' }}">
            <i class="fas fa-clock"></i> Jadwal
        </a>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn btn-danger w-100 fw-bold">Logout</button>
        </form>
    </div>

    {{-- Content --}}
    <div class="content">
        <div class="page-card">
            <section class="content-header mb-3">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="m-0">@yield('header', 'Page Header')</h4>
                    </div>
                    <div class="col-sm-6 text-end">
                        <ol class="breadcrumb mb-0 justify-content-end">
                            @yield('breadcrumb')
                        </ol>
                    </div>
                </div>
            </section>

            {{-- Page Content --}}
            @yield('content')
        </div>
    </div>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
