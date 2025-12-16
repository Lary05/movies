<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Filmek export</title>
    <style>
        header { text-align: center; margin-bottom: 20px; }
        footer { position: fixed; bottom: 0; text-align: center; font-size: 12px; }
        .logo { width: 120px; }
        table { width:100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 6px; }
    </style>
</head>
<body>
    <header>
        <img src="{{ public_path('images/logo.png') }}" class="logo" alt="Logo"/>
        <h2>Filmek listája</h2>
    </header>

    <main>
        <table>
            <thead><tr><th>Cím</th><th>Rendező</th><th>Év</th></tr></thead>
            <tbody>
            @foreach($movies as $m)
                <tr>
                    <td>{{ $m['title'] ?? ($m['name'] ?? '-') }}</td>
                    <td>{{ $m['director']['name'] ?? ($m['director_name'] ?? '-') }}</td>
                    <td>{{ $m['release_year'] ?? ($m['year'] ?? '-') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </main>

    <footer>
        <div>Oldal: <span class="page"></span></div>
        <div>© {{ date('Y') }} My App</div>
    </footer>
</body>
</html>
