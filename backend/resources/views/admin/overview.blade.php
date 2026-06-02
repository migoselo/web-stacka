<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal - System Console</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
        }

        /* Date range dropdown */
        #date-dropdown {
            display: none;
        }

        #date-dropdown.open {
            display: block;
        }

        /* Chart bar transition */
        .bar-col {
            transition: height 0.35s cubic-bezier(.4, 0, .2, 1), background 0.2s;
        }

        /* Activity item hidden by search */
        .activity-item.hidden-by-search {
            display: none;
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
                <a href="{{ route('admin.overview') }}" class="flex items-center space-x-3 bg-white/10 text-white px-4 py-3 rounded-lg font-medium text-sm">
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
                    {{--
                        Global search — memfilter Recent Search Activity secara real-time.
                        Ketik nama user atau keyword untuk menyaring aktivitas.
                    --}}
                    <input
                        id="global-search"
                        type="text"
                        placeholder="Search activity by user or keyword..."
                        class="w-full bg-[#F1F3F5] text-sm text-gray-700 pl-10 pr-4 py-2 rounded-full focus:outline-none focus:ring-2 focus:ring-gray-300 transition">
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
                    <h2 class="text-2xl font-bold text-gray-900">System Overview</h2>
                    <p class="text-sm text-gray-500">Real-time infrastructure and user analytics dashboard.</p>
                </div>
                <div class="flex space-x-3 relative">

                    {{-- DATE RANGE PICKER --}}
                    <div class="relative">
                        <button
                            id="date-range-btn"
                            class="flex items-center space-x-2 bg-white border border-gray-200 text-sm font-medium px-4 py-2 rounded-lg hover:bg-gray-50 transition shadow-sm text-gray-700">
                            <i data-lucide="calendar" class="w-4 h-4"></i>
                            <span id="date-range-label">Last 30 Days</span>
                            <i data-lucide="chevron-down" class="w-3 h-3 ml-1 text-gray-400"></i>
                        </button>

                        <div id="date-dropdown" class="absolute right-0 top-full mt-2 bg-white border border-gray-200 rounded-xl shadow-lg z-50 py-1 w-48">
                            <button class="date-range-option w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 font-medium" data-label="Today" data-days="1">Today</button>
                            <button class="date-range-option w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 font-medium" data-label="Last 7 Days" data-days="7">Last 7 Days</button>
                            <button class="date-range-option w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 font-medium bg-gray-50" data-label="Last 30 Days" data-days="30">Last 30 Days</button>
                            <button class="date-range-option w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 font-medium" data-label="Last 90 Days" data-days="90">Last 90 Days</button>
                            <button class="date-range-option w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 font-medium" data-label="This Year" data-days="365">This Year</button>
                        </div>
                    </div>

                    {{-- EXPORT REPORT --}}
                    <button
                        id="export-btn"
                        class="flex items-center space-x-2 bg-[#1F1F1F] text-white text-sm font-medium px-4 py-2 rounded-lg hover:bg-black transition shadow-sm">
                        <i data-lucide="download" class="w-4 h-4"></i>
                        <span>Export Report</span>
                    </button>
                </div>
            </div>

            {{-- METRIC CARDS --}}
            <div class="grid grid-cols-1 md:grid-cols-4 gap-5 mb-6">
                <div class="p-5 rounded-2xl border border-gray-100 shadow-sm flex flex-col justify-between h-36" style="background: linear-gradient(135deg, #D4B8B4 0%, #FFFFFF 100%);">
                    <div class="flex justify-between items-start">
                        <span class="text-[11px] font-bold tracking-wider text-gray-500 uppercase">TOTAL USERS</span>
                        <div class="bg-white/80 p-1.5 rounded-lg border border-gray-100 shadow-sm text-gray-700">
                            <i data-lucide="user" class="w-4 h-4"></i>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 tracking-tight mb-1">{{ number_format($totalUsers) }}</h3>
                        <p class="text-xs text-gray-500 font-medium">Registered students</p>
                    </div>
                </div>

                <div class="p-5 rounded-2xl border border-gray-100 shadow-sm flex flex-col justify-between h-36" style="background: linear-gradient(135deg, #B8C2B6 0%, #FFFFFF 100%);">
                    <div class="flex justify-between items-start">
                        <span class="text-[11px] font-bold tracking-wider text-gray-500 uppercase">SHARED NOTES</span>
                        <div class="bg-white/80 p-1.5 rounded-lg border border-gray-100 shadow-sm text-gray-700">
                            <i data-lucide="file-text" class="w-4 h-4"></i>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 tracking-tight mb-1">{{ number_format($totalNotes) }}</h3>
                        <p class="text-xs text-gray-500 font-medium">Active study materials</p>
                    </div>
                </div>

                <div class="p-5 rounded-2xl border border-gray-100 shadow-sm flex flex-col justify-between h-36" style="background: linear-gradient(135deg, #D4B8B4 0%, #FFFFFF 100%);">
                    <div class="flex justify-between items-start">
                        <span class="text-[11px] font-bold tracking-wider text-gray-500 uppercase">ACTIVE SESSIONS</span>
                        <div class="bg-white/80 p-1.5 rounded-lg border border-gray-100 shadow-sm text-gray-700">
                            <i data-lucide="radio" class="w-4 h-4"></i>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 tracking-tight mb-1">{{ number_format($activeSessions) }}</h3>
                        <p class="text-xs text-gray-500 font-medium">Concurrent online users</p>
                    </div>
                </div>

                <div class="p-5 rounded-2xl border border-gray-100 shadow-sm flex flex-col justify-between h-36" style="background: linear-gradient(135deg, #B8C2B6 0%, #FFFFFF 100%);">
                    <div class="flex justify-between items-start">
                        <span class="text-[11px] font-bold tracking-wider text-gray-500 uppercase">SYSTEM HEALTH</span>
                        <div class="bg-white/80 p-1.5 rounded-lg border border-gray-100 shadow-sm text-gray-700">
                            <i data-lucide="check-circle" class="w-4 h-4"></i>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 tracking-tight mb-1">{{ $systemHealth }}%</h3>
                        <p class="text-xs text-[#10B981] font-semibold">● Operational Cluster</p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                {{-- CHART PANEL --}}
                <div class="lg:col-span-2 bg-white border border-gray-100 rounded-2xl p-6 shadow-sm flex flex-col justify-between">
                    <div class="flex justify-between items-start mb-6">
                        <div>
                            <h3 class="text-base font-bold text-gray-900">System Traffic</h3>
                            {{-- Subtitle berubah sesuai tab aktif --}}
                            <p id="chart-subtitle" class="text-xs text-gray-500">Real-time request processing volume</p>
                        </div>
                        {{-- TAB SWITCHER --}}
                        <div class="bg-[#F1F3F5] p-1 rounded-lg flex space-x-1 text-xs font-semibold text-gray-500">
                            <button class="chart-tab bg-white text-gray-900 px-3 py-1 rounded-md shadow-sm" data-tab="queries">Queries</button>
                            <button class="chart-tab px-3 py-1 hover:text-gray-900 transition" data-tab="errors">Errors</button>
                            <button class="chart-tab px-3 py-1 hover:text-gray-900 transition" data-tab="latency">Latency</button>
                        </div>
                    </div>

                    {{-- CHART BODY --}}
                    <div class="relative h-48 w-full flex items-end justify-between px-4 border-b border-gray-100 pb-2" id="chart-bars">
                        {{-- Bar-bar dirender via JS --}}
                    </div>

                    {{-- CHART Y-AXIS LABEL --}}
                    <div class="flex justify-between px-4 pt-1 pb-0 text-[10px] font-bold text-gray-400 uppercase tracking-wider" id="chart-y-label">
                        <!-- diisi JS -->
                    </div>

                    <div class="flex justify-between px-4 pt-2 text-[10px] font-bold text-gray-400 uppercase tracking-wider" id="chart-x-labels">
                        <!-- diisi JS -->
                    </div>
                </div>

                {{-- RECENT ACTIVITY PANEL --}}
                <div class="bg-white border border-gray-100 rounded-2xl p-6 shadow-sm flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-base font-bold text-gray-900">Recent Search Activity</h3>
                            <a href="{{ route('admin.logs') }}" class="text-xs font-semibold text-gray-400 hover:text-gray-600 transition">View All</a>
                        </div>

                        <div id="activity-list" class="space-y-5">
                            @if(isset($recent_activities) && !$recent_activities->isEmpty())
                            @foreach ($recent_activities as $activity)
                            <div
                                class="activity-item flex items-start space-x-4"
                                data-name="{{ strtolower($activity->name) }}"
                                data-query="{{ strtolower($activity->query) }}">
                                <div class="bg-[#F1F3F5] p-2.5 rounded-full text-gray-600 flex-shrink-0">
                                    <i data-lucide="search" class="w-4 h-4"></i>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h4 class="text-sm font-bold text-gray-900 truncate mb-0.5">Keyword Searched</h4>
                                    <p class="text-xs text-gray-500 leading-snug mb-1">
                                        <strong>{{ $activity->name }}</strong> searched for "{{ $activity->query }}".
                                    </p>
                                    <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider block">
                                        {{ date('d M, H:i', strtotime($activity->createdAt)) }}
                                    </span>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <div id="no-activities" class="text-center py-12 text-xs text-gray-400 font-medium">
                                No queries executed recently.
                            </div>
                            @endif
                        </div>

                        {{-- Empty state saat search tidak cocok --}}
                        <div id="no-search-result" class="hidden text-center py-12 text-xs text-gray-400 font-medium">
                            No matching activity found.
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>

    <script>
        lucide.createIcons();

        /* ===================================================
           1. CHART DATA PER TAB
           Setiap tab punya dataset bar heights + label sumbu Y + subtitle
        =================================================== */
        const chartData = {
            queries: {
                subtitle: 'Real-time request processing volume',
                yLabel: ['0', '25k', '50k', '75k', '100k'],
                bars: {
                    7: [38, 52, 44, 60, 55, 70, 65],
                    30: [35, 45, 60, 50, 75, 70, 80, 65, 90],
                    90: [42, 55, 67, 48, 78, 60, 85, 70, 92, 58, 76, 88],
                    365: [30, 48, 55, 62, 70, 58, 65, 72, 80, 68, 74, 88],
                    1: [20, 40, 55, 70, 60, 75, 80, 68, 72],
                }
            },
            errors: {
                subtitle: 'HTTP errors & failed request rate',
                yLabel: ['0', '50', '100', '150', '200'],
                bars: {
                    7: [5, 12, 8, 20, 15, 10, 18],
                    30: [8, 15, 22, 10, 30, 25, 18, 12, 35],
                    90: [10, 20, 28, 15, 35, 22, 40, 18, 32, 25, 38, 45],
                    365: [12, 22, 18, 30, 25, 20, 35, 28, 40, 32, 38, 50],
                    1: [3, 8, 5, 15, 10, 6, 12, 9, 7],
                }
            },
            latency: {
                subtitle: 'Average response time in milliseconds',
                yLabel: ['0ms', '100ms', '200ms', '300ms', '400ms'],
                bars: {
                    7: [22, 40, 35, 55, 48, 62, 45],
                    30: [30, 42, 55, 38, 68, 60, 72, 50, 80],
                    90: [35, 48, 60, 42, 72, 55, 80, 65, 85, 52, 70, 78],
                    365: [28, 45, 52, 60, 65, 55, 62, 70, 75, 65, 72, 85],
                    1: [18, 35, 45, 60, 52, 68, 72, 58, 64],
                }
            }
        };

        // Warna per tab
        const tabColors = {
            queries: '#B8C2B6',
            errors: '#E0A0A0',
            latency: '#A0B8C8'
        };

        const tabHoverColors = {
            queries: '#9EAD9B',
            errors: '#C88080',
            latency: '#7A9DB8'
        };

        let activeTab = 'queries';
        let activeDays = 30;

        /* Render bar chart */
        function renderChart() {
            const data = chartData[activeTab];
            const bars = data.bars[activeDays] || data.bars[30];
            const max = Math.max(...bars);
            const color = tabColors[activeTab];
            const hover = tabHoverColors[activeTab];

            // Bars
            const barsEl = document.getElementById('chart-bars');
            barsEl.innerHTML = bars.map((val, i) => {
                const heightPct = Math.round((val / max) * 100);
                return `
                    <div class="flex flex-col items-center flex-1 group cursor-pointer relative" title="${val}">
                        <div 
                            class="bar-col w-full max-w-[40px] rounded-t"
                            style="height:${heightPct}%; background:${color};"
                            onmouseover="this.style.background='${hover}'"
                            onmouseout="this.style.background='${color}'"
                        ></div>
                        <span class="absolute bottom-full mb-1 text-[9px] font-bold text-gray-500 opacity-0 group-hover:opacity-100 transition">${val}</span>
                    </div>
                `;
            }).join('');

            // X labels — bagi rata ke 5 titik
            const step = Math.max(1, Math.floor(bars.length / 4));
            const xLabels = document.getElementById('chart-x-labels');
            const labelMap = {
                1: ['00:00', '06:00', '12:00', '18:00', 'Now'],
                7: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'].slice(0, bars.length),
                30: ['May 01', 'May 08', 'May 15', 'May 22', 'May 29'],
                90: ['Mar 01', 'Mar 22', 'Apr 12', 'May 02', 'May 29'],
                365: ['Jan', 'Mar', 'May', 'Aug', 'Dec'],
            };
            const labels = labelMap[activeDays] || labelMap[30];
            xLabels.innerHTML = labels.map(l => `<span>${l}</span>`).join('');

            // Y label
            document.getElementById('chart-y-label').innerHTML =
                data.yLabel.reverse().map(l => `<span class="text-[9px]">${l}</span>`).join('');
            data.yLabel.reverse(); // restore

            // Subtitle
            document.getElementById('chart-subtitle').textContent = data.subtitle;
        }

        /* ===================================================
           2. TAB SWITCHER
        =================================================== */
        document.querySelectorAll('.chart-tab').forEach(btn => {
            btn.addEventListener('click', () => {
                document.querySelectorAll('.chart-tab').forEach(b => {
                    b.classList.remove('bg-white', 'text-gray-900', 'shadow-sm');
                    b.classList.add('text-gray-500');
                });
                btn.classList.add('bg-white', 'text-gray-900', 'shadow-sm');
                btn.classList.remove('text-gray-500');
                activeTab = btn.dataset.tab;
                renderChart();
            });
        });

        /* ===================================================
           3. DATE RANGE PICKER
        =================================================== */
        const dateBtn = document.getElementById('date-range-btn');
        const dateDropdown = document.getElementById('date-dropdown');

        dateBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            dateDropdown.classList.toggle('open');
        });

        document.addEventListener('click', () => dateDropdown.classList.remove('open'));

        document.querySelectorAll('.date-range-option').forEach(opt => {
            opt.addEventListener('click', () => {
                activeDays = parseInt(opt.dataset.days);
                document.getElementById('date-range-label').textContent = opt.dataset.label;
                // highlight active
                document.querySelectorAll('.date-range-option').forEach(o => o.classList.remove('bg-gray-50'));
                opt.classList.add('bg-gray-50');
                dateDropdown.classList.remove('open');
                renderChart();
            });
        });

        /* ===================================================
           4. GLOBAL SEARCH — filter Recent Activity
        =================================================== */
        document.getElementById('global-search').addEventListener('input', function() {
            const q = this.value.trim().toLowerCase();
            const items = document.querySelectorAll('.activity-item');
            let visible = 0;

            items.forEach(item => {
                const name = item.dataset.name || '';
                const query = item.dataset.query || '';
                const match = name.includes(q) || query.includes(q);
                item.classList.toggle('hidden-by-search', !match);
                if (match) visible++;
            });

            // Show/hide empty state
            const noResult = document.getElementById('no-search-result');
            if (noResult) noResult.classList.toggle('hidden', visible > 0 || q === '');
        });

        /* ===================================================
           5. EXPORT REPORT
        =================================================== */
        document.getElementById('export-btn').addEventListener('click', () => {
            // Kumpulkan data metric dari halaman
            const lines = [
                'Admin Portal — System Report',
                `Range: ${document.getElementById('date-range-label').textContent}`,
                `Chart Mode: ${activeTab}`,
                '---',
                `Total Users: {{ $totalUsers }}`,
                `Shared Notes: {{ $totalNotes }}`,
                `Active Sessions: {{ $activeSessions }}`,
                `System Health: {{ $systemHealth }}%`,
                '---',
                'Recent Search Activity:',
                @if(isset($recent_activities) && $recent_activities -> isNotEmpty())
                @foreach($recent_activities as $activity)
                `{{ addslashes($activity->name) }} searched "{{ addslashes($activity->query) }}" at {{ date('d M Y H:i', strtotime($activity->createdAt)) }}`,
                @endforeach
                @endif
            ];

            const blob = new Blob([lines.join('\n')], {
                type: 'text/plain'
            });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = `report_${activeTab}_${activeDays}days.txt`;
            a.click();
            URL.revokeObjectURL(url);
        });

        /* ===================================================
           INIT
        =================================================== */
        renderChart();
    </script>
</body>

</html>