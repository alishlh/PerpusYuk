<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin PerpusYuk</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
                <a href="#" class="flex items-center px-6 py-3 text-green-100 hover:bg-green-600">
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
                <!-- Tambahkan kode ini di bagian Dashboard Content (dalam <main class="p-6">) setelah Stats Cards -->

<!-- Table Buku -->
<div class="bg-white rounded-xl shadow overflow-hidden mb-6">
    <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
        <h3 class="text-lg font-semibold text-gray-800">Daftar Buku</h3>
        
        <a class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition duration-200" href="{{route('admin.buku.create')}}">
            <i class="fas fa-plus mr-2"></i>Tambah Buku
        </a>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-green-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-green-700 uppercase tracking-wider">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-green-700 uppercase tracking-wider">
                        Judul Buku
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-green-700 uppercase tracking-wider">
                        Kategori
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-green-700 uppercase tracking-wider">
                        Stok
                    </th>
                   
                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-green-700 uppercase tracking-wider">
                        Aksi
                    </th>
                </tr>
            </thead>
            @foreach ($buku as $item)
                
          
            <tbody class="bg-white divide-y divide-gray-200">
                <!-- Data 1 -->
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{$loop->iteration}}
                    </td>
                   
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                            {{$item->buku}}
                        </span>
                    </td> 
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                            {{$item->kategory}}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{$item->stok}}
                    </td>
                   
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="flex justify-end space-x-2">
                            <!-- Tombol Edit -->
                            <a href="{{ route('admin.buku.edit', $item->id) }}" 
                               class="text-blue-600 hover:text-blue-900 p-1 rounded-full hover:bg-blue-50"
                               title="Edit Buku">
                               <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                            </svg>
                            </a>
                            
                            <!-- Tombol Delete -->
                            <form action="{{ route('admin.buku.delete',$item->id) }}" method="POST">
                                @csrf
                                <button  type="submit" href="" class="btn btn-danger" onclick="return confirn('Apakah anda yakin akan menghapus data')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>

    <!-- Pagination -->

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