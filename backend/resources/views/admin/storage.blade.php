<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal - Storage Information</title>
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
                <a href="{{ route('admin.tables') }}" class="flex items-center space-x-3 text-gray-400 hover:bg-white/5 hover:text-white px-4 py-3 rounded-lg font-medium text-sm transition">
                    <i data-lucide="table" class="w-4 h-4"></i>
                    <span>Tables</span>
                </a>
                <a href="{{ route('admin.logs') }}" class="flex items-center space-x-3 text-gray-400 hover:bg-white/5 hover:text-white px-4 py-3 rounded-lg font-medium text-sm transition">
                    <i data-lucide="history" class="w-4 h-4"></i>
                    <span>Logs</span>
                </a>
                <a href="{{ route('admin.storage') }}" class="flex items-center space-x-3 bg-white/10 text-white px-4 py-3 rounded-lg font-medium text-sm">
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
                    <input type="text" placeholder="Search resources..." class="w-full bg-[#F1F3F5] text-sm text-gray-700 pl-10 pr-4 py-2 rounded-full focus:outline-none">
                </div>
            </div>

            <div class="flex items-center space-x-4">
                <button class="text-gray-500 hover:text-gray-700"><i data-lucide="bell" class="w-5 h-5"></i></button>
                <button class="text-gray-500 hover:text-gray-700"><i data-lucide="settings" class="w-5 h-5"></i></button>
                <button class="text-gray-500 hover:text-gray-700"><i data-lucide="help-circle" class="w-5 h-5"></i></button>
                <div class="h-6 w-px bg-gray-200 mx-2"></div>
                <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=100&q=80" alt="Profile" class="w-8 h-8 rounded-full object-cover">
            </div>
        </header>

        <main class="flex-1 overflow-y-auto p-8">

            <div class="mb-6">
                <h2 class="text-2xl font-bold text-gray-900">Storage Information</h2>
                <p class="text-sm text-gray-500">Monitor and manage your global infrastructure storage footprint.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-6">
                <div class="bg-gradient-to-br from-[#B8C2B6]/40 to-white border border-gray-100 p-5 rounded-2xl shadow-sm flex flex-col justify-between h-36">
                    <div class="flex justify-between items-start">
                        <div>
                            <span class="text-[10px] font-bold text-gray-400 tracking-wider block mb-1">Disk Usage</span>
                            <h3 class="text-xl font-bold text-gray-900 tracking-tight">{{ $diskUsageGB }} GB / 0.5 GB</h3>
                        </div>
                        <div class="bg-white/80 p-2 rounded-lg border border-gray-100 shadow-sm text-gray-700">
                            <i data-lucide="hard-drive" class="w-4 h-4"></i>
                        </div>
                    </div>
                    <div>
                        <div class="w-full bg-gray-200 h-2 rounded-full mb-3 overflow-hidden">
                            <div class="bg-[#545454] h-full" style="width: {{ $diskPercent }}%"></div>
                        </div>
                        <div class="flex justify-between items-center text-xs">
                            <span class="font-medium text-gray-500">{{ $diskPercent }}% capacity used</span>
                            <button class="font-bold text-gray-900 hover:underline flex items-center">Manage <i data-lucide="chevron-right" class="w-3.5 h-3.5 ml-0.5"></i></button>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-[#D4B8B4]/30 to-white border border-gray-100 p-5 rounded-2xl shadow-sm flex flex-col justify-between h-36">
                    <div class="flex justify-between items-start">
                        <div>
                            <span class="text-[10px] font-bold text-gray-400 tracking-wider block mb-1">Database Size</span>
                            <h3 class="text-xl font-bold text-gray-900 tracking-tight">{{ $databaseSizeMB }} MB</h3>
                        </div>
                        <div class="bg-white/80 p-2 rounded-lg border border-gray-100 shadow-sm text-gray-700">
                            <i data-lucide="database" class="w-4 h-4"></i>
                        </div>
                    </div>
                    <div>
                        <div class="w-full bg-gradient-to-r from-[#D4B8B4] to-[#B8C2B6] h-2 rounded-full mb-3"></div>
                        <div class="flex justify-between items-center text-xs">
                            <span class="font-medium text-gray-500">Metadata footprint volume</span>
                            <button class="font-bold text-gray-900 hover:underline flex items-center">Optimize <i data-lucide="sliders" class="w-3.5 h-3.5 ml-1"></i></button>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-[#B8C2B6]/40 to-white border border-gray-100 p-5 rounded-2xl shadow-sm flex flex-col justify-between h-36">
                    <div class="flex justify-between items-start">
                        <div>
                            <span class="text-[10px] font-bold text-gray-400 tracking-wider block mb-1">Cloud Assets</span>
                            <h3 class="text-xl font-bold text-gray-900 tracking-tight">{{ $cloudAssetsMB }} MB / 500 MB</h3>
                        </div>
                        <div class="bg-white/80 p-2 rounded-lg border border-gray-100 shadow-sm text-gray-700">
                            <i data-lucide="cloud" class="w-4 h-4"></i>
                        </div>
                    </div>
                    <div>
                        <div class="w-full bg-gray-200 h-2 rounded-full mb-3 overflow-hidden">
                            <div class="bg-black h-full" style="width: {{ $cloudPercent }}%"></div>
                        </div>
                        <div class="flex justify-between items-center text-xs">
                            <span class="font-medium text-gray-500">{{ $cloudPercent }}% cloud storage full</span>
                            <button class="font-bold text-gray-900 hover:underline flex items-center">Upgrade <i data-lucide="chevrons-up" class="w-3.5 h-3.5 ml-0.5"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-stretch">

                <div class="bg-white border border-gray-100 rounded-2xl p-6 shadow-sm flex flex-col justify-between min-h-[420px]">
                    <div class="flex justify-between items-center">
                        <h3 class="text-base font-bold text-gray-900">File Type Breakdown</h3>
                        <button class="text-gray-400 hover:text-gray-600"><i data-lucide="more-vertical" class="w-4 h-4"></i></button>
                    </div>

                    <div class="relative flex items-center justify-center my-4">
                        <div class="w-40 h-40 rounded-full border-[14px] border-gray-100 flex items-center justify-center relative">
                            <div class="absolute inset-0 rounded-full border-[14px] border-transparent border-t-[#1F1F1F] border-r-gray-400/40 rotate-45"></div>
                            <div class="absolute inset-0 rounded-full border-[14px] border-transparent border-b-[#D4B8B4]/80 -rotate-45"></div>

                            <div class="text-center">
                                <span class="text-2xl font-bold text-gray-900 block leading-none">
                                    {{ $totalNotes + $totalDownloads + $totalBookmarks + $totalLikes }}
                                </span>
                                <span class="text-[9px] font-bold text-gray-400 uppercase tracking-wider mt-1 block">Total Items</span>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-y-2.5 text-xs font-medium text-gray-700 px-2">
                        <div class="flex justify-between items-center">
                            <span class="flex items-center"><span class="w-2.5 h-2.5 rounded-full bg-black mr-2"></span>Text Notes</span>
                            <span class="font-bold text-gray-900 font-mono">{{ $totalNotes }} docs</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="flex items-center"><span class="w-2.5 h-2.5 rounded-full bg-gray-400 mr-2"></span>Downloads Log</span>
                            <span class="font-bold text-gray-900 font-mono">{{ $totalDownloads }} lines</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="flex items-center"><span class="w-2.5 h-2.5 rounded-full bg-[#D4B8B4] mr-2"></span>Bookmarks</span>
                            <span class="font-bold text-gray-900 font-mono">{{ $totalBookmarks }} saved</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="flex items-center"><span class="w-2.5 h-2.5 rounded-full bg-amber-500 mr-2"></span>Likes Tracker</span>
                            <span class="font-bold text-gray-900 font-mono">{{ $totalLikes }} reactions</span>
                        </div>
                    </div>

                    <button class="w-full mt-5 text-white text-xs font-semibold py-2.5 rounded-lg flex items-center justify-center space-x-2 transition" style="background: linear-gradient(135deg, #545454 0%, #1F1F1F 100%);">
                        <i data-lucide="trash-2" class="w-4 h-4"></i>
                        <span>Clean up Old Files</span>
                    </button>
                </div>

                <div class="lg:col-span-2 bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden flex flex-col justify-between min-h-[420px]">

                    <div class="p-4 border-b border-gray-100 flex justify-between items-center bg-white">
                        <div>
                            <h3 class="text-base font-bold text-gray-900">Recent Uploaded Files</h3>
                            <p class="text-[11px] text-gray-400 mt-0.5">Real-time object tracking inside notes table</p>
                        </div>
                        <div class="flex space-x-2">
                            <button class="border border-gray-200 text-xs font-semibold px-3 py-1.5 rounded-lg text-gray-600 hover:bg-gray-50 flex items-center space-x-1">
                                <i data-lucide="file-text" class="w-3.5 h-3.5"></i>
                                <span>Export Logs</span>
                            </button>
                        </div>
                    </div>

                    <div class="flex-1 overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="border-b border-gray-100 bg-[#F8F9FA] text-[10px] font-bold text-gray-400 uppercase tracking-wider">
                                    <th class="py-3.5 px-6">Document Title</th>
                                    <th class="py-3.5 px-6">File Size</th>
                                    <th class="py-3.5 px-6">Storage Path</th>
                                    <th class="py-3.5 px-6">Upload Date</th>
                                    <th class="py-3.5 px-6 text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 text-xs text-gray-700">
                                @forelse ($recentUploads as $file)
                                <tr class="hover:bg-[#F8F9FA]/50 transition">
                                    <td class="py-4 px-6">
                                        <div class="font-bold text-gray-900 truncate max-w-[180px] tracking-wide leading-tight">{{ $file->title }}</div>
                                        <div class="text-[10px] text-gray-400 mt-0.5 truncate max-w-[180px]">{{ $file->description ?? 'No description' }}</div>
                                    </td>
                                    <td class="py-4 px-6 font-mono text-gray-900 font-semibold">
                                        {{ $file->formatted_size }}
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold tracking-wide bg-[#EBF5EE] text-[#2E7D32]">
                                            <i data-lucide="file" class="w-3 h-3 mr-1"></i>
                                            supabase-bucket/materi
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 text-gray-500 font-medium">
                                        {{ \Carbon\Carbon::parse($file->createdAt)->diffForHumans() }}
                                    </td>
                                    <td class="py-4 px-6 text-right text-gray-400">
                                        <button class="hover:text-red-600 transition"><i data-lucide="trash-2" class="w-4 h-4"></i></button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="py-8 text-center text-gray-400 font-medium">
                                        Belum ada file materi kuliah yang diunggah mahasiswa.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
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