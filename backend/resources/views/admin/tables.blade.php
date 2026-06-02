<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal - User Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-[#F8F9FA] text-[#1F1F1F] flex h-screen overflow-hidden">

    <aside class="w-64 bg-[#1F1F1F] text-white flex flex-col justify-between p-6 flex-shrink-0 h-full">
        <div>
            <div class="flex items-center space-x-3 mb-8">
                <img src="{{ asset('images/Logo 2.svg') }}" alt="Logo" class="w-9 h-9 object-contain">

                <div>
                    <h2 class="font-bold text-base tracking-wide leading-none">Admin Portal</h2>
                    <span class="text-[10px] text-gray-400 tracking-widest uppercase">Management Suite</span>
                </div>
            </div>

            <nav class="space-y-1">
                <a href="{{ route('admin.overview') }}" class="flex items-center space-x-3 text-gray-400 hover:bg-white/5 hover:text-white px-4 py-3 rounded-lg font-medium text-sm transition">
                    <i data-lucide="layout-dashboard" class="w-4 h-4"></i>
                    <span>Overview</span>
                </a>
                <a href="{{ route('admin.tables') }}" class="flex items-center space-x-3 bg-white/10 text-white px-4 py-3 rounded-lg font-medium text-sm">
                    <i data-lucide="table" class="w-4 h-4"></i>
                    <span>Tables</span>
                </a>
                <a href="{{ route('admin.logs') }}" class="flex items-center space-x-3 text-gray-400 hover:bg-white/5 hover:text-white px-4 py-3 rounded-lg font-medium text-sm transition">
                    <i data-lucide="history" class="w-4 h-4"></i>
                    <span>Logs</span>
                </a>
                <a href="{{ route('admin.storage') }}" class="flex items-center space-x-3 text-gray-400 hover:bg-white/5 hover:text-white px-4 py-3 rounded-lg font-medium text-sm transition">
                    <i data-lucide="database" class="w-4 h-4"></i>
                    <span>Storage</span>
                </a>
            </nav>
        </div>

        <div class="border-t border-white/10 pt-4 space-y-3">
            <div class="flex items-center space-x-3">
                <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=100&q=80" alt="Avatar" class="w-10 h-10 rounded-full border border-white/20 object-cover">
                <div class="overflow-hidden">
                    <h4 class="text-sm font-semibold leading-none mb-1">{{ $admin_name }}</h4>
                    <p class="text-xs text-gray-400 truncate font-mono">{{ $admin_email }}</p>
                </div>
            </div>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="w-full flex items-center justify-center space-x-2 px-4 py-2.5 rounded-lg bg-white/10 hover:bg-red-500/90 text-gray-300 hover:text-white text-xs font-semibold transition">
                    <i data-lucide="log-out" class="w-4 h-4"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <div class="flex-1 flex flex-col overflow-hidden h-full">

        <header class="h-16 bg-white border-b border-gray-100 flex items-center justify-between px-8 z-10 flex-shrink-0">
            <div class="flex items-center space-x-6 w-1/2">
                <h1 class="text-lg font-bold text-gray-800 whitespace-nowrap">System Console</h1>
                <div class="relative w-full max-w-md">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-400">
                        <i data-lucide="search" class="w-4 h-4"></i>
                    </span>
                    <input type="text" placeholder="Global search..." class="w-full bg-[#F1F3F5] text-sm text-gray-700 pl-10 pr-4 py-2 rounded-full focus:outline-none">
                </div>
            </div>

            <div class="flex items-center space-x-4">
                <button class="relative text-gray-500 hover:text-gray-700">
                    <i data-lucide="bell" class="w-5 h-5"></i>
                    <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full border-2 border-white"></span>
                </button>
                <button class="text-gray-500 hover:text-gray-700"><i data-lucide="settings" class="w-5 h-5"></i></button>
                <button class="text-gray-500 hover:text-gray-700"><i data-lucide="help-circle" class="w-5 h-5"></i></button>
                <div class="h-6 w-px bg-gray-200 mx-2"></div>
                <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=100&q=80" alt="Profile" class="w-8 h-8 rounded-full object-cover">
            </div>
        </header>

        <main class="flex-1 overflow-y-auto p-8">

            <div class="flex justify-between items-center mb-6">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900">User Management</h2>
                    <p class="text-sm text-gray-500">Monitor and manage system access and user permissions.</p>
                </div>

                <button class="flex items-center space-x-2 text-white text-sm font-medium px-4 py-2.5 rounded-lg hover:shadow-md transition duration-200" style="background: linear-gradient(135deg, #545454 0%, #1F1F1F 100%);">
                    <i data-lucide="user-plus" class="w-4 h-4"></i>
                    <span>Add New User</span>
                </button>
            </div>

            <div class="bg-white border border-gray-100 rounded-2xl shadow-sm mb-6 overflow-hidden">

                <div class="p-4 border-b border-gray-100 flex justify-between items-center bg-white">
                    <div class="flex items-center space-x-3 w-1/3">
                        <div class="relative w-full">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-400">
                                <i data-lucide="search" class="w-4 h-4"></i>
                            </span>
                            <input type="text" placeholder="Search by name or email..." class="w-full bg-white border border-gray-200 text-xs text-gray-700 pl-9 pr-4 py-2 rounded-lg focus:outline-none focus:ring-1 focus:ring-gray-300">
                        </div>
                        <button class="flex items-center space-x-1 border border-gray-200 text-xs font-semibold px-3 py-2 rounded-lg text-gray-600 hover:bg-gray-50">
                            <i data-lucide="sliders-horizontal" class="w-3.5 h-3.5"></i>
                            <span>Filter</span>
                        </button>
                    </div>

                    <div class="flex items-center space-x-4 text-xs font-medium text-gray-400">
                        <button class="hover:text-gray-600"><i data-lucide="download" class="w-4 h-4"></i></button>
                        <button class="hover:text-gray-600"><i data-lucide="printer" class="w-4 h-4"></i></button>
                        <span class="h-4 w-px bg-gray-200"></span>
                        <span>Total Records: {{ $totalUsers }}</span>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-gray-100 bg-[#F8F9FA] text-[10px] font-bold text-gray-400 uppercase tracking-wider">
                                <th class="py-3.5 px-6">ID</th>
                                <th class="py-3.5 px-6">User Name</th>
                                <th class="py-3.5 px-6">Role</th>
                                <th class="py-3.5 px-6">Status</th>
                                <th class="py-3.5 px-6">Joined At</th>
                                <th class="py-3.5 px-6 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-xs text-gray-700">
                            @if($usersPaginator->isEmpty())
                            <tr>
                                <td colspan="6" class="text-center py-8 text-gray-400 font-medium">No users recorded in database.</td>
                            </tr>
                            @else
                            @foreach ($users as $user)
                            <tr class="hover:bg-[#F8F9FA]/50 transition">
                                <td class="py-4 px-6 font-mono text-gray-400">{{ $user['id'] }}</td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-8 h-8 rounded-full bg-[#E9ECEF] flex items-center justify-center font-bold text-[11px] text-gray-600 uppercase shadow-sm">
                                            {{ $user['initials'] }}
                                        </div>
                                        <div>
                                            <div class="font-semibold text-gray-900">{{ $user['name'] }}</div>
                                            <div class="text-[11px] text-gray-400 font-mono">{{ $user['email'] }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="px-2 py-0.5 rounded text-[10px] font-bold tracking-wide {{ $user['role'] === 'ADMIN' ? 'bg-[#EBF5EE] text-[#2E7D32] border border-[#D3EDE0]' : 'bg-[#F1F3F5] text-gray-600' }}">
                                        {{ $user['role'] }}
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center space-x-1.5">
                                        <span class="w-1.5 h-1.5 rounded-full {{ $user['status'] === 'Active' ? 'bg-[#4CAF50] animate-pulse' : 'bg-gray-400' }}"></span>
                                        <span class="font-medium">{{ $user['status'] }}</span>
                                    </div>
                                </td>
                                <td class="py-4 px-6 text-gray-500 font-mono">{{ $user['last_login'] }}</td>
                                <td class="py-4 px-6 text-right text-gray-400">
                                    <div class="flex items-center justify-end space-x-2">
                                        <button class="p-1 hover:text-gray-900 transition" title="Edit Profile"><i data-lucide="edit-2" class="w-4 h-4"></i></button>
                                        <button class="p-1 hover:text-red-600 transition" title="Revoke Access"><i data-lucide="trash-2" class="w-4 h-4"></i></button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>

                <div class="p-4 bg-white border-t border-gray-100 flex justify-between items-center text-xs text-gray-500 font-medium">
                    <div class="flex items-center space-x-2">
                        <span>Rows per page:</span>
                        <span class="font-bold text-gray-800">10</span>
                    </div>

                    <div class="flex items-center space-x-1">
                        @if ($usersPaginator->onFirstPage())
                        <button class="p-1 rounded text-gray-300 cursor-not-allowed"><i data-lucide="chevron-left" class="w-4 h-4"></i></button>
                        @else
                        <a href="{{ $usersPaginator->previousPageUrl() }}" class="p-1 rounded text-gray-600 hover:bg-gray-100"><i data-lucide="chevron-left" class="w-4 h-4"></i></a>
                        @endif

                        @foreach ($usersPaginator->getUrlRange(1, $usersPaginator->lastPage()) as $page => $url)
                        @if ($page == $usersPaginator->currentPage())
                        <button class="w-6 h-6 rounded bg-[#1F1F1F] text-white flex items-center justify-center font-bold text-[11px]">{{ $page }}</button>
                        @elseif (abs($page - $usersPaginator->currentPage()) < 2 || $page==$usersPaginator->lastPage())
                            <a href="{{ $url }}" class="w-6 h-6 rounded text-gray-600 hover:bg-gray-100 flex items-center justify-center">{{ $page }}</a>
                            @elseif ($page == $usersPaginator->currentPage() + 2 && $page < $usersPaginator->lastPage())
                                <span class="px-1 text-gray-300">...</span>
                                @endif
                                @endforeach

                                @if ($usersPaginator->hasMorePages())
                                <a href="{{ $usersPaginator->nextPageUrl() }}" class="p-1 rounded text-gray-600 hover:bg-gray-100"><i data-lucide="chevron-right" class="w-4 h-4"></i></a>
                                @else
                                <button class="p-1 rounded text-gray-300 cursor-not-allowed"><i data-lucide="chevron-right" class="w-4 h-4"></i></button>
                                @endif
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                <div class="bg-white border border-gray-100 p-5 rounded-2xl shadow-sm flex flex-col justify-between h-32">
                    <div class="flex justify-between items-start">
                        <div class="bg-[#F8F9FA] p-2 rounded-lg text-gray-600"><i data-lucide="users" class="w-4 h-4"></i></div>
                        <span class="text-[11px] font-bold text-[#4CAF50] bg-[#EBF5EE] px-1.5 py-0.5 rounded flex items-center">Live <span class="w-1.5 h-1.5 bg-[#4CAF50] rounded-full ml-1 animate-ping"></span></span>
                    </div>
                    <div>
                        <span class="text-[10px] font-bold text-gray-400 tracking-wider block mb-0.5">TOTAL USERS</span>
                        <h3 class="text-2xl font-bold text-gray-900 tracking-tight">{{ number_format($totalUsers) }}</h3>
                    </div>
                </div>

                <div class="bg-white border border-gray-100 p-5 rounded-2xl shadow-sm flex flex-col justify-between h-32">
                    <div class="flex justify-between items-start">
                        <div class="bg-[#F8F9FA] p-2 rounded-lg text-gray-600"><i data-lucide="shield-check" class="w-4 h-4"></i></div>
                        <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wide">Stable</span>
                    </div>
                    <div>
                        <span class="text-[10px] font-bold text-gray-400 tracking-wider block mb-0.5">ACTIVE INTEGRATION</span>
                        <h3 class="text-2xl font-bold text-gray-900 tracking-tight">Supabase PG</h3>
                    </div>
                </div>

                <div class="bg-[#FFF5F5] border border-red-100 p-5 rounded-2xl shadow-sm flex flex-col justify-between h-32">
                    <div class="flex justify-between items-start">
                        <div class="bg-white p-2 rounded-lg text-red-500 border border-red-50 shadow-sm">
                            <i data-lucide="shield-alert" class="w-4 h-4"></i>
                        </div>
                        <span class="text-[10px] font-bold text-red-600 bg-red-100/50 px-1.5 py-0.5 rounded flex items-center">
                            Secured
                        </span>
                    </div>
                    <div>
                        <span class="text-[10px] font-bold text-red-400 tracking-wider block mb-0.5">RLS STATUS</span>
                        <h3 class="text-2xl font-bold text-red-600 tracking-tight">Enforced</h3>
                    </div>
                </div>
            </div>

        </main>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>

</html>