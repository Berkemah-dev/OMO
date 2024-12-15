<!DOCTYPE html>
<html>

<head>
    <title>OMO! Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: "Poppins", sans-serif;
        }
    </style>
</head>

<body class="bg-white flex items-center justify-center min-h-screen">
    <div class="flex flex-col lg:flex-row w-full h-auto lg:h-full">
        <div class="hidden lg:block lg:w-1/2 h-full">
            <img class="w-full h-full object-cover" src="C:\Kelompok1\OMO\public\image\LOOK1.jpg" />
        </div>

        <div class="w-full lg:w-1/2 p-8 flex items-center justify-center">
            <div class="w-full max-w-md">
                <h1 class="text-4xl font-bold mb-4 text-center lg:text-left">
                    OMO !
                </h1>
                <h2 class="text-xl mb-6 text-center lg:text-left">
                    Buat Akun
                </h2>
                <form method="POST" action="{{ route('auth.register') }}">
                    @csrf
                    <div class="mb-4">
                        <input type="text" placeholder="Nama" name="name"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-200"
                            required />
                        @error('name')
                        <p>{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <input type="email" placeholder="Email" name="email"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-200"
                            required />
                        @error('email')
                        <p>{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4 relative">
                        <input id="password" type="password" placeholder="Password" name="password"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-200" />
                        <i id="togglePassword"
                            class="fas fa-eye absolute right-4 top-2.5 text-gray-500 cursor-pointer"></i>
                        @error('password')
                        <p>{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4 relative">
                        <input id="confirmPassword" type="password" placeholder="Confirm Password" name="password2"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-200"
                            required />
                        <i id="toggleConfirmPassword"
                            class="fas fa-eye absolute right-4 top-2.5 text-gray-500 cursor-pointer"></i>
                        @error('password2')
                        <p>{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <button type="submit"
                            class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition duration-300">
                            Buat Akun
                        </button>
                    </div>

                    <div class="text-center">
                        <p>
                            Sudah punya akun?
                            <a href="#" class="text-blue-500 underline">Masuk</a>
                        </p>
                    </div>
                </form>
                <div class="text-center mt-6">
                    <p class="mt-8 text-gray-500 text-center">
                        OhMyOutfit! | Copyright 2024
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        const togglePassword = document.getElementById("togglePassword");
            const password = document.getElementById("password");
            const toggleConfirmPassword = document.getElementById(
                "toggleConfirmPassword"
            );
            const confirmPassword = document.getElementById("confirmPassword");

            togglePassword.addEventListener("click", function () {
                const type =
                    password.getAttribute("type") === "password"
                        ? "text"
                        : "password";
                password.setAttribute("type", type);
                this.classList.toggle("fa-eye-slash");
            });

            toggleConfirmPassword.addEventListener("click", function () {
                const type =
                    confirmPassword.getAttribute("type") === "password"
                        ? "text"
                        : "password";
                confirmPassword.setAttribute("type", type);
                this.classList.toggle("fa-eye-slash");
            });
    </script>
</body>

</html>