<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal - Activity Logs</title>
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
                <a href="{{ route('admin.logs') }}" class="flex items-center space-x-3 bg-white/10 text-white px-4 py-3 rounded-lg font-medium text-sm">
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
                    <input type="text" placeholder="Search logs..." class="w-full bg-[#F1F3F5] text-sm text-gray-700 pl-10 pr-4 py-2 rounded-full focus:outline-none">
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

            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 space-y-4 md:space-y-0">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900">Activity Logs</h2>
                    <p class="text-sm text-gray-500">Real-time audit trail of system events and administrative actions.</p>
                </div>

                <div class="flex flex-wrap items-end space-x-3">
                    <div class="flex flex-col">
                        <span class="text-[10px] font-bold text-gray-400 uppercase mb-1">Date Range</span>
                        <button class="flex items-center space-x-2 bg-white border border-gray-200 text-xs font-medium px-3 py-2 rounded-lg text-gray-700 shadow-sm">
                            <i data-lucide="calendar" class="w-3.5 h-3.5 text-gray-400"></i>
                            <span>{{ date('M d, Y') }} - Real-time</span>
                        </button>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-[10px] font-bold text-gray-400 uppercase mb-1">Severity</span>
                        <select class="bg-white border border-gray-200 text-xs font-medium px-3 py-2 rounded-lg text-gray-700 shadow-sm focus:outline-none min-w-[120px]">
                            <option>All Levels</option>
                            <option>Critical</option>
                            <option>Warning</option>
                            <option>Info</option>
                        </select>
                    </div>
                    <button class="flex items-center space-x-2 bg-black text-white text-xs font-medium px-4 py-2 rounded-lg hover:bg-gray-900 transition h-[34px]">
                        <i data-lucide="download" class="w-3.5 h-3.5"></i>
                        <span>Export</span>
                    </button>
                </div>
            </div>

            <div class="bg-white border border-gray-200/80 rounded-2xl shadow-sm overflow-hidden flex flex-col justify-between min-h-[600px]">

                <div class="p-4 border-b border-gray-100 bg-white flex justify-between items-center text-xs">
                    <div class="flex items-center space-x-2">
                        <span class="font-bold text-gray-900">Event Stream</span>
                        <span class="bg-black text-white text-[9px] font-bold px-1.5 py-0.5 rounded-full uppercase tracking-wider flex items-center">
                            <span class="w-1 h-1 bg-red-500 rounded-full animate-pulse mr-1"></span>Live
                        </span>
                    </div>
                    <span class="text-gray-400 font-medium">{{ $totalEvents }} events found</span>
                </div>

                <div class="flex-1 p-6 space-y-6 relative">
                    <div class="absolute top-16 bottom-24 left-[38px] w-0.5 bg-gray-100 z-0"></div>

                    <div>
                        <div class="flex items-center space-x-3 mb-6 relative z-10">
                            <span class="bg-white text-gray-500 text-[10px] font-bold tracking-widest uppercase px-3 py-1 rounded-full border border-gray-200">
                                Today, {{ date('F d') }}
                            </span>
                            <div class="flex-1 h-px bg-gray-100"></div>
                        </div>

                        <div class="space-y-4">
                            @forelse ($logs_today as $log)
                            @php
                            $icon = 'info'; $bg_card = 'bg-white'; $icon_color = 'text-blue-500'; $bg_icon = 'bg-blue-50'; $border_card = 'border-gray-100';
                            if ($log['type'] === 'critical') {
                            $icon = 'alert-circle'; $bg_card = 'bg-[#FFF5F5]'; $icon_color = 'text-red-500'; $bg_icon = 'bg-red-100'; $border_card = 'border-red-100/60';
                            } elseif ($log['type'] === 'warning') {
                            $icon = 'alert-triangle'; $icon_color = 'text-amber-500'; $bg_icon = 'bg-amber-50'; $border_card = 'border-gray-200/80';
                            }
                            @endphp
                            <div class="flex items-start space-x-4 relative z-10">
                                <div class="{{ $bg_icon }} {{ $icon_color }} w-7 h-7 rounded-full flex items-center justify-center border border-white shadow-sm flex-shrink-0 mt-2">
                                    <i data-lucide="{{ $icon }}" class="w-4 h-4"></i>
                                </div>

                                <div class="{{ $bg_card }} border {{ $border_card }} rounded-2xl p-4 flex-1 shadow-sm flex flex-col justify-between space-y-3">
                                    <div class="flex justify-between items-start">
                                        <h4 class="text-sm font-bold text-gray-900">{{ $log['title'] }}</h4>
                                        <span class="font-mono text-[11px] text-gray-400">{{ $log['time'] }}</span>
                                    </div>
                                    <p class="text-xs text-gray-500 leading-relaxed">{!! $log['desc'] !!}</p>

                                    <div class="flex justify-between items-center pt-1 border-t border-gray-50">
                                        <div class="flex items-center space-x-2">
                                            <img src="{{ $log['user_avatar'] }}" alt="Avatar" class="w-5 h-5 rounded-full object-cover">
                                            <span class="text-xs font-bold text-gray-700">{{ $log['user'] }}</span>
                                        </div>
                                        <button class="text-xs font-bold text-gray-900 hover:underline flex items-center space-x-1">
                                            <span>{{ $log['action_text'] }}</span>
                                            @if(!empty($log['action_icon']))
                                            <i data-lucide="{{ $log['action_icon'] }}" class="w-3 h-3"></i>
                                            @endif
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="text-center py-12 text-xs text-gray-400 font-medium">
                                No search parameters logged inside database table today.
                            </div>
                            @endforelse
                        </div>
                    </div>

                    <div class="pt-2">
                        <div class="flex items-center space-x-3 mb-6 relative z-10">
                            <span class="bg-[#F1F3F5] text-gray-500 text-[10px] font-bold tracking-widest uppercase px-3 py-1 rounded-full border border-gray-200">
                                Database Migrations State
                            </span>
                            <div class="flex-1 h-px bg-gray-100"></div>
                        </div>

                        <div class="flex flex-col lg:flex-row items-stretch gap-4 relative z-10">

                            <div class="flex items-start space-x-4 flex-1">
                                <div class="bg-emerald-50 text-emerald-500 w-7 h-7 rounded-full flex items-center justify-center border border-white shadow-sm flex-shrink-0 mt-2">
                                    <i data-lucide="check-circle" class="w-4 h-4"></i>
                                </div>
                                <div class="bg-white border border-gray-200 rounded-2xl p-5 flex-1 shadow-sm flex flex-col justify-between space-y-4">
                                    <div class="flex justify-between items-start">
                                        <h4 class="text-sm font-bold text-gray-900">Database Schema Intact</h4>
                                        <span class="font-mono text-[11px] text-gray-400">System Core</span>
                                    </div>
                                    <p class="text-xs text-gray-500 leading-relaxed">
                                        Struktur tabel internal postgres Supabase sinkron sempurna dengan model skema lokal. Ditemukan sebanyak <span class="font-bold text-gray-900">{{ $totalMigrations }} batch riwayat migrasi berkas</span> terdaftar aktif di dalam sistem log.
                                    </p>
                                    <div class="flex items-center space-x-2 pt-1">
                                        <div class="w-5 h-5 rounded-full bg-slate-900 text-white flex items-center justify-center text-[9px] font-bold font-mono">S</div>
                                        <span class="text-xs font-bold text-gray-700">System Schema Tracking</span>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-[#C4C7C7] border border-gray-300 p-5 rounded-2xl w-full lg:w-64 flex flex-col justify-between relative overflow-hidden shadow-sm min-h-[140px]">
                                <div class="flex justify-between items-start z-10">
                                    <span class="text-[10px] font-bold text-gray-600 uppercase tracking-wider">Cluster Health</span>
                                    <i data-lucide="gauge" class="w-16 h-16 text-gray-400/25 absolute -right-2 -top-2 rotate-45 pointer-events-none"></i>
                                </div>
                                <div class="z-10 mt-2">
                                    <h3 class="text-3xl font-bold text-gray-900 tracking-tight leading-none mb-2">99.98%</h3>
                                    <p class="text-xs text-[#2E7D32] font-semibold flex items-center">
                                        <span class="w-1.5 h-1.5 bg-[#4CAF50] rounded-full mr-1.5"></span>Stable
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="p-4 bg-white border-t border-gray-100 flex justify-between items-center text-xs font-medium text-gray-500 flex-shrink-0">
                    @if ($rawLogsPaginator->onFirstPage())
                    <button class="flex items-center space-x-1 border border-gray-200 px-3 py-1.5 rounded-lg bg-gray-50/50 hover:bg-gray-50 cursor-not-allowed text-gray-300">
                        <i data-lucide="chevron-left" class="w-3.5 h-3.5"></i> <span>Previous</span>
                    </button>
                    @else
                    <a href="{{ $rawLogsPaginator->previousPageUrl() }}" class="flex items-center space-x-1 border border-gray-200 px-3 py-1.5 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                        <i data-lucide="chevron-left" class="w-3.5 h-3.5"></i> <span>Previous</span>
                    </a>
                    @endif

                    <div class="flex items-center space-x-1">
                        @foreach ($rawLogsPaginator->getUrlRange(1, $rawLogsPaginator->lastPage()) as $page => $url)
                        @if ($page == $rawLogsPaginator->currentPage())
                        <button class="w-6 h-6 rounded bg-black text-white flex items-center justify-center text-[11px] font-bold">{{ $page }}</button>
                        @elseif (abs($page - $rawLogsPaginator->currentPage()) < 2 || $page==$rawLogsPaginator->lastPage())
                            <a href="{{ $url }}" class="w-6 h-6 rounded text-gray-600 hover:bg-gray-100 flex items-center justify-center">{{ $page }}</a>
                            @elseif ($page == $rawLogsPaginator->currentPage() + 2 && $page < $rawLogsPaginator->lastPage())
                                <span class="px-1 text-gray-300">...</span>
                                @endif
                                @endforeach
                    </div>

                    @if ($rawLogsPaginator->hasMorePages())
                    <a href="{{ $rawLogsPaginator->nextPageUrl() }}" class="flex items-center space-x-1 border border-gray-200 px-3 py-1.5 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                        <span>Next</span> <i data-lucide="chevron-right" class="w-3.5 h-3.5"></i>
                    </a>
                    @else
                    <button class="flex items-center space-x-1 border border-gray-200 px-3 py-1.5 rounded-lg bg-gray-50/50 hover:bg-gray-50 cursor-not-allowed text-gray-300">
                        <span>Next</span> <i data-lucide="chevron-right" class="w-3.5 h-3.5"></i>
                    </button>
                    @endif
                </div>

            </div>

        </main>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>

</html>