<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin PerpusYuk</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <!-- Logo Header -->
        <div class="sm:mx-auto sm:w-full sm:max-w-md text-center">
            <div class="flex items-center justify-center space-x-2">
                <i class="fas fa-book-open text-3xl text-green-600"></i>
                <h2 class="text-3xl font-extrabold text-gray-900">
                    Perpus<span class="text-green-600">Yuk</span>
                </h2>
            </div>
            <h2 class="mt-6 text-2xl font-bold text-gray-900">
                Masuk ke akun admin Anda
            </h2>
            <p class="mt-2 text-sm text-gray-600 max-w">
                Sistem Manajemen Perpustakaan Digital
            </p>
        </div>

        <!-- Login Card -->
        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-6 shadow-lg rounded-xl sm:px-10 border border-green-100">
                <form class="mb-0 space-y-6" method="POST" action="{{ route('login') }}">
                    @csrf
                    
                    <!-- Email Input -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">
                            Alamat Email
                        </label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            <input id="email" name="email" type="email" autocomplete="email" required
                                   value="{{ old('email') }}"
                                   class="py-3 pl-10 block w-full border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500 @error('email') border-red-500 @enderror"
                                   placeholder="email@example.com">
                        </div>
                        @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password Input -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">
                            Password
                        </label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <input id="password" name="password" type="password" autocomplete="current-password" required
                                   class="py-3 pl-10 block w-full border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500 @error('password') border-red-500 @enderror"
                                   placeholder="••••••••">
                        </div>
                        @error('password')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Remember & Forgot Password -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember-me" name="remember" type="checkbox"
                                   class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded"
                                   {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember-me" class="ml-2 block text-sm text-gray-700">
                                Ingat saya
                            </label>
                        </div>

                        @if (Route::has('password.request'))
                            <div class="text-sm">
                                <a href="{{ route('password.request') }}" class="font-medium text-green-600 hover:text-green-500">
                                    Lupa password?
                                </a>
                            </div>
                        @endif
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit"
                                class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition duration-150 ease-in-out">
                            <i class="fas fa-sign-in-alt mr-2"></i> Masuk
                        </button>
                    </div>
                </form>

                <!-- Register Link -->
                @if (Route::has('register'))
                    <div class="mt-6">
                        <div class="relative">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-300"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-2 bg-white text-gray-500">
                                    Atau
                                </span>
                            </div>
                        </div>

                        <div class="mt-6 text-center">
                            <p class="text-sm text-gray-600">
                                Belum punya akun?
                                <a href="{{ route('register') }}" class="font-medium text-green-600 hover:text-green-500">
                                    Daftar sekarang
                                </a>
                            </p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</body>
</html>