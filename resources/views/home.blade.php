<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Lowongan Kerja</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .job-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .job-card:hover {
            transform: translateY(-5px);
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.15);
        }
        .lamar-btn {
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        .lamar-btn:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body class="bg-gray-100 font-sans">
    <header class="bg-blue-600 text-white py-4 shadow-md">
        <div class="container mx-auto text-center">
            <h1 class="text-3xl font-bold">Portal Lowongan Kerja</h1>
        </div>
    </header>
    <main class="container mx-auto mt-8 p-6 bg-white shadow-lg rounded-lg max-w-3xl">
        <h2 class="text-2xl font-semibold text-gray-800 text-center">Selamat Datang di PT Subah Spinning Mills</h2>
        <p class="text-gray-600 text-center mt-2">Temukan peluang kerja yang sesuai dengan bakat dan minat Anda.</p>
        <div class="mt-6 space-y-6">
            @foreach($jobs as $job)
                <div class="p-4 border rounded-lg shadow-md bg-gray-50 flex flex-col items-center text-center job-card">
                    <h3 class="text-xl font-bold text-gray-700">{{ $job['name'] }}</h3>
                    <p class="text-gray-600">ID: {{ $job['id'] }}</p>
                    <a href="{{ route('rekrutmen') }}" class="mt-3 px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition lamar-btn" data-job-id="{{ $job['id'] }}">Lamar</a>
                </div>
            @endforeach
        </div>
    </main>
    <footer class="mt-8 py-4 bg-gray-200 text-center text-gray-600 text-sm">
        &copy; 2025 PT Subah Spinning Mills - Semua Hak Dilindungi
    </footer>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('.lamar-btn').forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    let jobId = this.getAttribute('data-job-id');
                    localStorage.setItem('selectedJobId', jobId);
                    console.log("Job ID tersimpan:", jobId);
                    window.location.href = this.getAttribute('href');
                });
            });
        });
    </script>
</body>
</html>
