<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Lupa Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white rounded-lg shadow-lg overflow-hidden flex flex-col md:flex-row w-full max-w-4xl">
        <div class="w-full md:w-1/2">
            <img class="w-full h-full object-cover rounded-t-lg md:rounded-l-lg md:rounded-t-none"
                src="C:\OMO\img\LOOK3.jpg" alt="" />
        </div>
        <div class="w-full md:w-1/2 p-8">
            <h1 class="text-4xl font-bold mb-4">OMO !</h1>
            <h2 class="text-lg mb-6">Lupa Password</h2>

            @if(session()->has('success'))
            <p>{{ session('success') }}</p>
            @endif
            <form method="POST" action="{{ route('auth.forget') }}">
                @csrf
                <div class="flex flex-col md:flex-row md:space-x-4 mb-4">
                    <input
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Email Address" type="email" name="email" required />
                    @error('email')
                    <p>{{ $message }}</p>
                    @enderror
                </div>
                <button class="w-full py-2 px-4 bg-black text-white rounded-md shadow-md hover:bg-gray-800"
                    type="submit">
                    Kirim Email
                </button>
            </form>
            <p class="mt-4 text-center">
                Sudah punya akun?
                <a class="text-blue-500 hover:underline" href="#">Masuk</a>
            </p>
        </div>
    </div>
</body>

</html>