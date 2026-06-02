<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Wajib di-import untuk menghubungkan Query Builder ke Supabase

class AdminController extends Controller
{
    public function overview()
    {
        $admin_name = "Admin User";
        $admin_email = "ADMIN@SYSTEM.COM";

        $totalUsers = DB::table('users')->count();
        $totalNotes = DB::table('notes')->count();
        $activeSessions = DB::table('sessions')->count();

        $totalCache = DB::table('cache')->count();
        $systemHealth = $totalCache > 0 ? 99.98 : 100.00;

        $traffic_data = collect([
            (object) ['day' => 'MAY 01', 'height' => '35%'],
            (object) ['day' => '',       'height' => '45%'],
            (object) ['day' => 'MAY 08', 'height' => '60%'],
            (object) ['day' => '',       'height' => '50%'],
            (object) ['day' => 'MAY 15', 'height' => '75%'],
            (object) ['day' => '',       'height' => '70%'],
            (object) ['day' => 'MAY 22', 'height' => '80%'],
            (object) ['day' => '',       'height' => '65%'],
            (object) ['day' => 'MAY 29', 'height' => '90%'],
        ]);

        $recent_activities = DB::table('search_histories')
            ->join('users', 'search_histories.userId', '=', 'users.id')
            ->select('search_histories.query', 'search_histories.createdAt', 'users.name')
            ->orderBy('search_histories.createdAt', 'desc')
            ->take(3)
            ->get();

        return view('admin.overview', compact(
            'admin_name',
            'admin_email',
            'totalUsers',
            'totalNotes',
            'activeSessions',
            'systemHealth',
            'traffic_data',
            'recent_activities'
        ));
    }


    public function tables()
    {
        $admin_name = "Admin User";
        $admin_email = "ADMIN@SYSTEM.COM";

        $usersPaginator = DB::table('users')->orderBy('createdAt', 'desc')->paginate(10);
        $activeUserIds = DB::table('sessions')->pluck('userId')->toArray();
        $totalUsers = DB::table('users')->count();
        $users = $usersPaginator->map(function ($user) use ($activeUserIds) {
            $words = explode(' ', $user->name);
            $initials = strtoupper(substr($words[0], 0, 1) . (isset($words[1]) ? substr($words[1], 0, 1) : ''));

            return [
                'id' => '#USR-' . $user->id,
                'initials' => $initials,
                'name' => $user->name,
                'email' => $user->email,
                'role' => ($user->id == 1 || str_contains(strtolower($user->email), 'admin')) ? 'ADMIN' : 'USER',
                'status' => in_array($user->id, $activeUserIds) ? 'Active' : 'Inactive',
                'last_login' => isset($user->createdAt) ? date('d M Y', strtotime($user->createdAt)) : 'Unknown'
            ];
        });
        return view('admin.tables', compact('admin_name', 'admin_email', 'users', 'totalUsers', 'usersPaginator'));
    }


    public function logs()
    {
        $admin_name = "System Admin";
        $admin_email = "root@system.local";

        // 1. Mengambil data log aktivitas pencarian menggunakan fitur Paginate bawaan Laravel (5 data per halaman)
        $rawLogsPaginator = DB::table('search_histories')
            ->join('users', 'search_histories.userId', '=', 'users.id')
            ->select(
                'search_histories.id',
                'search_histories.query',
                'search_histories.createdAt',
                'users.name as user_name'
            )
            ->orderBy('search_histories.createdAt', 'desc')
            ->paginate(5);

        $totalEvents = DB::table('search_histories')->count();

        $logs_today = $rawLogsPaginator->map(function ($log) {
            $queryLength = strlen($log->query);

            if ($queryLength > 20) {
                $type = 'critical';
                $title = 'Long query parameters sequence executed';
                $desc = "Pengguna menjalankan pencarian materi yang sangat panjang: <span class='bg-red-50 text-red-700 px-1.5 py-0.5 rounded font-mono text-[11px]'>\"{$log->query}\"</span>. Sistem mengawasi indikasi muatan injeksi karakter berlebih.";
            } elseif ($queryLength < 4) {
                $type = 'warning';
                $title = 'Short search keyword anomaly';
                $desc = "Pencarian terlalu pendek dieksekusi oleh pengguna: <span class='bg-amber-50 text-amber-700 px-1.5 py-0.5 rounded font-mono text-[11px]'>\"{$log->query}\"</span>. Diabaikan oleh optimasi indeks database cache Stacka.";
            } else {
                $type = 'info';
                $title = 'User search query executed successfully';
                $desc = "Mahasiswa mencari modul atau bahan bacaan dengan kata kunci: <span class='bg-[#DEE2E6] px-1.5 py-0.5 rounded font-mono text-[11px] text-gray-800 font-semibold'>\"{$log->query}\"</span>. Data dikembalikan dari bucket Supabase secara instan.";
            }

            return [
                'type' => $type,
                'time' => date('H:i:s', strtotime($log->createdAt)),
                'title' => $title,
                'desc' => $desc,
                'user' => $log->user_name,
                'user_avatar' => 'https://ui-avatars.com/api/?name=' . urlencode($log->user_name) . '&background=1F1F1F&color=fff',
                'action_text' => 'Trace ID #' . $log->id,
                'action_icon' => 'arrow-right'
            ];
        });
        $totalMigrations = DB::table('migrations')->count();

        return view('admin.logs', compact('admin_name', 'admin_email', 'logs_today', 'totalEvents', 'totalMigrations', 'rawLogsPaginator'));
    }

    public function storage()
    {
        $admin_name = "Admin User";
        $admin_email = "ADMIN@SYSTEM.COM";

        $totalNotes = DB::table('notes')->count();
        $totalDownloads = DB::table('downloads')->count();
        $totalBookmarks = DB::table('bookmarks')->count();
        $totalLikes = DB::table('likes')->count();

        $totalFileSizeBytes = DB::table('notes')->sum('fileSize');

        $diskUsageGB = round($totalFileSizeBytes / (1024 * 1024 * 1024), 2);
        if ($diskUsageGB == 0) {
            $diskUsageGB = 0.15;
        } // Fallback angka awal
        $diskPercent = min(round(($diskUsageGB / 0.5) * 100), 100); // Limit gratis 0.5 GB

        $totalRowsInteraction = $totalBookmarks + $totalLikes + DB::table('note_hashtags')->count();
        $databaseSizeMB = round(($totalRowsInteraction * 1.5) / 1024, 2);
        if ($databaseSizeMB == 0) {
            $databaseSizeMB = 1.24;
        }

        $cloudAssetsMB = round($totalFileSizeBytes / (1024 * 1024), 1);
        if ($cloudAssetsMB == 0) {
            $cloudAssetsMB = 15.4;
        }
        $cloudPercent = min(round(($cloudAssetsMB / 500) * 100), 100);

        $recentUploads = DB::table('notes')
            ->orderBy('createdAt', 'desc') // Sesuai nama kolom di ERD kamu
            ->limit(5)
            ->get()
            ->map(function ($note) {
                if ($note->fileSize >= 1048576) {
                    $note->formatted_size = round($note->fileSize / 1048576, 2) . ' MB';
                } else {
                    $note->formatted_size = round($note->fileSize / 1024, 1) . ' KB';
                }
                return $note;
            });

        return view('admin.storage', compact(
            'admin_name',
            'admin_email',
            'totalNotes',
            'totalDownloads',
            'totalBookmarks',
            'totalLikes',
            'diskUsageGB',
            'diskPercent',
            'databaseSizeMB',
            'cloudAssetsMB',
            'cloudPercent',
            'recentUploads'
        ));
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $admin = DB::table('admins')
            ->where('email', $request->username)
            ->first();

        if (!$admin || !password_verify($request->password, $admin->password)) {
            return back()->withErrors(['username' => 'Invalid credentials']);
        }

        session(['admin' => [
            'id' => $admin->id,
            'name' => $admin->name,
            'email' => $admin->email,
        ]]);

        return redirect()->route('admin.overview');
    }

    public function logout()
    {
        session()->forget('admin');
        return redirect('/');
    }
}
