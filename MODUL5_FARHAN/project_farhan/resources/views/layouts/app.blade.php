<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dosen & Mahasiswa Management - Cyberpunk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Body and General Styling */
        body {
            background: linear-gradient(180deg, #1a1a2e, #162447);
            color: #e4e4e4;
            font-family: 'Orbitron', sans-serif;
        }

        /* Navbar Styling */
        .navbar {
            background: #0f0f1a;
            border-bottom: 3px solid #1cb3f3;
        }

        .navbar-brand {
            color: #1cb3f3 !important;
            font-weight: bold;
        }

        .navbar-nav .nav-link {
            color: #e4e4e4 !important;
            transition: color 0.3s;
        }

        .navbar-nav .nav-link:hover {
            color: #1cb3f3 !important;
        }

        /* Alert Styling */
        .alert {
            background: #162447;
            color: #e4e4e4;
            border: 1px solid #1cb3f3;
        }

        /* Button Styling */
        button {
            background: #1cb3f3;
            border: none;
            color: #0f0f1a;
        }

        button:hover {
            background: #148bd0;
        }

        /* Custom Container Style */
        .container {
            border: 2px solid #1cb3f3;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0px 4px 15px rgba(28, 179, 243, 0.4);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/">Campus Management</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dosen.index') }}">Dosen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('mahasiswa.index') }}">Mahasiswa</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
