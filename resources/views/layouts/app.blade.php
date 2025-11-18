<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmtár</title>
    <style>
        /* Alap stílusok */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        header {
            background-color: #007BFF;
            color: white;
            padding: 15px 20px;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
        }

        header h1 {
            margin: 0;
            font-size: 24px;
        }

        nav {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        nav a {
            text-decoration: none;
            color: white;
            font-weight: bold;
            padding: 8px 12px;
            border-radius: 5px;
            transition: background 0.2s;
        }

        nav a:hover {
            background-color: rgba(255,255,255,0.2);
        }

        main {
            padding: 20px;
        }

        footer {
            background-color: #007BFF;
            color: white;
            text-align: center;
            padding: 15px;
            margin-top: 30px;
        }

        /* Table stílus (CRUD listákhoz) */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        table th, table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        table th {
            background-color: #007BFF;
            color: white;
        }

        button {
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            opacity: 0.9;
        }

        /* Reszponzív */
        @media (max-width: 768px) {
            header {
                flex-direction: column;
                align-items: flex-start;
            }
            nav {
                width: 100%;
                justify-content: flex-start;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <h1>Filmtár</h1>
        <nav>
            <a href="{{ route('dashboard') }}">Adatok</a>
            <a href="{{ route('movies.index') }}">Filmek</a>
            <a href="{{ route('directors.index') }}">Rendezők</a>
            <a href="{{ route('actors.index') }}">Színészek</a>
        </nav>
    </header>

    <!-- Main tartalom -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        &copy; {{ date('Y') }} Movie Database. All rights reserved.
    </footer>
</body>
</html>
