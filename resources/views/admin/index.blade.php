<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin PerpusYuk</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css')}}">
    <style>
        .sidebar {
            transition: all 0.3s;
        }
        .sidebar-collapsed {
            width: 80px;
        }
        .sidebar-collapsed .sidebar-text {
            display: none;
        }
        .sidebar-collapsed .logo-text {
            display: none;
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="sidebar w-64 bg-green-700 text-white shadow-lg fixed h-full">
            <div class="flex items-center justify-between h-16 px-4 bg-green-800">
                <div class="flex items-center">
                    <i class="fas fa-book-open text-xl mr-2 text-green-300"></i>
                    <span class="logo-text text-xl font-bold">Perpus<span class="text-green-300">Yuk</span></span>
                </div>
                <button id="toggleSidebar" class="text-green-300 hover:text-white">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            <nav class="mt-6">
                <a href="{{route('admin.index')}}" class="flex items-center px-6 py-3 text-green-100 hover:bg-green-600">
                    <i class="fas fa-tachometer-alt w-5 h-5 mr-3"></i>
                    <span class="sidebar-text">Dashboard</span>
                </a>
                <a href="{{route('admin.buku')}}" class="flex items-center px-6 py-3 text-green-100 hover:bg-green-600">
                    <i class="fas fa-book w-5 h-5 mr-3"></i>
                    <span class="sidebar-text">Manajemen Buku</span>
                </a>
                <a href="#" class="flex items-center px-6 py-3 text-green-100 hover:bg-green-600">
                    <i class="fas fa-users w-5 h-5 mr-3"></i>
                    <span class="sidebar-text">Anggota</span>
                </a>
                <a href="#" class="flex items-center px-6 py-3 text-green-100 hover:bg-green-600">
                    <i class="fas fa-exchange-alt w-5 h-5 mr-3"></i>
                    <span class="sidebar-text">Transaksi</span>
                </a>
                <a href="#" class="flex items-center px-6 py-3 text-green-100 hover:bg-green-600">
                    <i class="fas fa-chart-bar w-5 h-5 mr-3"></i>
                    <span class="sidebar-text">Laporan</span>
                </a>
                <a href="#" class="flex items-center px-6 py-3 text-green-100 hover:bg-green-600">
                    <i class="fas fa-cog w-5 h-5 mr-3"></i>
                    <span class="sidebar-text">Pengaturan</span>
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="ml-64 flex-1">
            <!-- Top Navigation -->
            <header class="bg-white shadow-sm">
                <div class="flex justify-between items-center px-6 py-4">
                    <h2 class="text-xl font-semibold text-gray-800">Dashboard</h2>
                    <div class="flex items-center space-x-4">
                        <button class="p-2 text-gray-600 hover:text-green-600 relative">
                            <i class="fas fa-bell"></i>
                            <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
                        </button>
                        <div class="relative">
                            <button id="userMenuButton" class="flex items-center space-x-2 focus:outline-none">
                                <img class="w-8 h-8 rounded-full" src="https://ui-avatars.com/api/?name=Admin&background=059669&color=fff" alt="Admin">
                                <span class="text-gray-700">Admin</span>
                                <i class="fas fa-chevron-down text-xs"></i>
                            </button>
                            
                            <!-- Dropdown Menu -->
                            <div id="userMenuDropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-user-circle mr-2"></i> Profil
                                </a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-cog mr-2"></i> Pengaturan
                                </a>
                                <div class="border-t border-gray-200"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full text-left block px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Dashboard Content -->
            <main class="p-6">
                <!-- Welcome Banner -->
                <div class="bg-gradient-to-r from-green-500 to-green-600 rounded-xl shadow p-6 text-white mb-6">
                    <h3 class="text-2xl font-bold mb-2">Selamat Datang, Admin!</h3>
                    <p class="opacity-90">Anda memiliki 5 peminjaman baru dan 2 pengembalian hari ini.</p>
                </div>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                    <div class="bg-white rounded-xl shadow p-6 border-l-4 border-green-500 hover:shadow-md transition-shadow">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500">Total Buku</p>
                                <h3 class="text-2xl font-bold text-gray-800">1,245</h3>
                                <p class="text-sm text-green-600 mt-1"><i class="fas fa-arrow-up mr-1"></i> 12% dari bulan lalu</p>
                            </div>
                            <div class="p-3 rounded-full bg-green-100 text-green-600">
                                <i class="fas fa-book"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow p-6 border-l-4 border-blue-500 hover:shadow-md transition-shadow">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500">Anggota</p>
                                <h3 class="text-2xl font-bold text-gray-800">568</h3>
                                <p class="text-sm text-blue-600 mt-1"><i class="fas fa-arrow-up mr-1"></i> 8% dari bulan lalu</p>
                            </div>
                            <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow p-6 border-l-4 border-yellow-500 hover:shadow-md transition-shadow">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500">Peminjaman Aktif</p>
                                <h3 class="text-2xl font-bold text-gray-800">87</h3>
                                <p class="text-sm text-yellow-600 mt-1"><i class="fas fa-arrow-down mr-1"></i> 3% dari minggu lalu</p>
                            </div>
                            <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                                <i class="fas fa-exchange-alt"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow p-6 border-l-4 border-red-500 hover:shadow-md transition-shadow">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500">Keterlambatan</p>
                                <h3 class="text-2xl font-bold text-gray-800">12</h3>
                                <p class="text-sm text-red-600 mt-1"><i class="fas fa-arrow-up mr-1"></i> 2 dari kemarin</p>
                            </div>
                            <div class="p-3 rounded-full bg-red-100 text-red-600">
                                <i class="fas fa-clock"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts and Recent Activities -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
                    <!-- Peminjaman Chart -->
                    <div class="bg-white rounded-xl shadow p-6 lg:col-span-2">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold text-gray-800">Statistik Peminjaman</h3>
                            <select class="border border-gray-300 rounded px-3 py-1 text-sm focus:outline-none focus:ring-2 focus:ring-green-500">
                                <option>Minggu Ini</option>
                                <option>Bulan Ini</option>
                                <option>Tahun Ini</option>
                            </select>
                        </div>
                        <div class="h-64 bg-gray-100 rounded flex items-center justify-center text-gray-400">
                            [Area Chart Peminjaman]
                        </div>
                    </div>

                    <!-- Aktivitas Terkini -->
                    <div class="bg-white rounded-xl shadow overflow-hidden">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-800">Aktivitas Terkini</h3>
                        </div>
                        <div class="divide-y divide-gray-200 max-h-80 overflow-y-auto">
                            <div class="px-6 py-4">
                                <div class="flex items-start">
                                    <div class="p-2 bg-green-100 text-green-600 rounded-full mr-3">
                                        <i class="fas fa-book"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-800">Buku baru ditambahkan</p>
                                        <p class="text-sm text-gray-500">"Design Patterns" oleh Erich Gamma</p>
                                        <p class="text-xs text-gray-400 mt-1">2 jam yang lalu</p>
                                    </div>
                                </div>
                            </div>
                            <div class="px-6 py-4">
                                <div class="flex items-start">
                                    <div class="p-2 bg-blue-100 text-blue-600 rounded-full mr-3">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-800">Anggota baru</p>
                                        <p class="text-sm text-gray-500">Ani Budianto mendaftar</p>
                                        <p class="text-xs text-gray-400 mt-1">5 jam yang lalu</p>
                                    </div>
                                </div>
                            </div>
                            <div class="px-6 py-4">
                                <div class="flex items-start">
                                    <div class="p-2 bg-yellow-100 text-yellow-600 rounded-full mr-3">
                                        <i class="fas fa-exchange-alt"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-800">Peminjaman buku</p>
                                        <p class="text-sm text-gray-500">"Clean Code" oleh Budi Santoso</p>
                                        <p class="text-xs text-gray-400 mt-1">Kemarin, 14:32</p>
                                    </div>
                                </div>
                            </div>
                            <div class="px-6 py-4">
                                <div class="flex items-start">
                                    <div class="p-2 bg-purple-100 text-purple-600 rounded-full mr-3">
                                        <i class="fas fa-undo"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-800">Pengembalian buku</p>
                                        <p class="text-sm text-gray-500">"Refactoring" oleh Siti Aminah</p>
                                        <p class="text-xs text-gray-400 mt-1">Kemarin, 10:15</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Transactions and Popular Books -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Recent Transactions -->
                    <div class="bg-white rounded-xl shadow overflow-hidden">
                        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-gray-800">Transaksi Terakhir</h3>
                            <button class="text-sm text-green-600 hover:text-green-800">Lihat Semua</button>
                        </div>
                        <div class="divide-y divide-gray-200">
                            <div class="px-6 py-4 flex items-center justify-between hover:bg-gray-50">
                                <div class="flex items-center">
                                    <div class="p-3 rounded-full bg-green-100 text-green-600 mr-4">
                                        <i class="fas fa-arrow-down"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-800">Peminjaman Buku</p>
                                        <p class="text-sm text-gray-500">Buku: Clean Code - Anggota: Budi Santoso</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="font-medium text-gray-800">2 hari lalu</p>
                                    <p class="text-sm text-green-600">Aktif</p>
                                </div>
                            </div>
                            <div class="px-6 py-4 flex items-center justify-between hover:bg-gray-50">
                                <div class="flex items-center">
                                    <div class="p-3 rounded-full bg-blue-100 text-blue-600 mr-4">
                                        <i class="fas fa-arrow-up"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-800">Pengembalian Buku</p>
                                        <p class="text-sm text-gray-500">Buku: Refactoring - Anggota: Siti Aminah</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="font-medium text-gray-800">3 hari lalu</p>
                                    <p class="text-sm text-blue-600">Selesai</p>
                                </div>
                            </div>
                            <div class="px-6 py-4 flex items-center justify-between hover:bg-gray-50">
                                <div class="flex items-center">
                                    <div class="p-3 rounded-full bg-red-100 text-red-600 mr-4">
                                        <i class="fas fa-exclamation"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-800">Peminjaman Buku</p>
                                        <p class="text-sm text-gray-500">Buku: Design Patterns - Anggota: Ani Budianto</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="font-medium text-gray-800">5 hari lalu</p>
                                    <p class="text-sm text-red-600">Terlambat</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Popular Books -->
                    <div class="bg-white rounded-xl shadow overflow-hidden">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-800">Buku Populer</h3>
                        </div>
                        <div class="p-6">
                            <div class="space-y-4">
                                <div class="flex items-center p-3 hover:bg-gray-50 rounded-lg">
                                    <div class="w-12 h-16 bg-gray-200 rounded-md mr-4 flex-shrink-0"></div>
                                    <div class="flex-1">
                                        <h4 class="font-medium text-gray-800">Clean Code</h4>
                                        <p class="text-sm text-gray-500">Robert C. Martin</p>
                                        <div class="flex items-center mt-1">
                                            <div class="flex text-yellow-400">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                            </div>
                                            <span class="ml-2 text-xs text-gray-500">4.5 (120 reviews)</span>
                                        </div>
                                    </div>
                                    <span class="px-2 py-1 text-xs bg-green-100 text-green-800 rounded-full">12 dipinjam</span>
                                </div>
                                <div class="flex items-center p-3 hover:bg-gray-50 rounded-lg">
                                    <div class="w-12 h-16 bg-gray-200 rounded-md mr-4 flex-shrink-0"></div>
                                    <div class="flex-1">
                                        <h4 class="font-medium text-gray-800">Design Patterns</h4>
                                        <p class="text-sm text-gray-500">Erich Gamma</p>
                                        <div class="flex items-center mt-1">
                                            <div class="flex text-yellow-400">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <span class="ml-2 text-xs text-gray-500">4.0 (85 reviews)</span>
                                        </div>
                                    </div>
                                    <span class="px-2 py-1 text-xs bg-green-100 text-green-800 rounded-full">8 dipinjam</span>
                                </div>
                                <div class="flex items-center p-3 hover:bg-gray-50 rounded-lg">
                                    <div class="w-12 h-16 bg-gray-200 rounded-md mr-4 flex-shrink-0"></div>
                                    <div class="flex-1">
                                        <h4 class="font-medium text-gray-800">Refactoring</h4>
                                        <p class="text-sm text-gray-500">Martin Fowler</p>
                                        <div class="flex items-center mt-1">
                                            <div class="flex text-yellow-400">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                            <span class="ml-2 text-xs text-gray-500">5.0 (64 reviews)</span>
                                        </div>
                                    </div>
                                    <span class="px-2 py-1 text-xs bg-green-100 text-green-800 rounded-full">6 dipinjam</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        // Toggle sidebar collapse
        document.getElementById('toggleSidebar').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('sidebar-collapsed');
            document.querySelector('.ml-64').classList.toggle('ml-20');
        });
    </script>
</body>
</html>

    <script>
    // Toggle dropdown menu
    document.getElementById('userMenuButton').addEventListener('click', function() {
        document.getElementById('userMenuDropdown').classList.toggle('hidden');
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
        const dropdown = document.getElementById('userMenuDropdown');
        const button = document.getElementById('userMenuButton');
        if (!button.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.classList.add('hidden');
        }
    });
</script>