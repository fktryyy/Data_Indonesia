<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Lowongan Kerja</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
        }
        p {
            color: #666;
        }
        .button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .button:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <header class="bg-blue-600">
        <div class="mx-auto max-w-7xl px-4 py-2 sm:px-6 lg:px-8">
          <h1 class="text-3xl font-bold tracking-tight text-gray-900">Lowongan</h1>
        </div>
    </header>
    <div class="container">
        <h1>Selamat Datang di Portal Lowongan Kerja PT Subah Spinning Mils</h1>
        <p>Rekrutmen Karyawan.</p>
    
        @foreach($jobs as $job)
            <div class="container">
                <h2>{{ $job['id'] }}</h2>
                <p>{{ $job['name'] }}</p>
                <a href="{{ route('rekrutmen', ['id' => $job['id']]) }}" class="button">Lamar</a>
            </div>
        @endforeach
    </div>
</body>
</html>
