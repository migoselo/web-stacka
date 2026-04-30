<?php

namespace App\Http\Controllers;

use App\Models\DemoMemo;
use Illuminate\Http\Request;

class DemoMemoController extends Controller
{
    // memo yang belum expire
    public function index()
    {
        $memos = DemoMemo::where('expires_at', '>', now())
            ->orderBy('created_at', 'desc')
            ->get();
        return response()->json($memos);
    }

    // buat memo baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|in:note,image',
            'content' => 'required|string|max:50',
            'anonymous_user_id' => 'required|uuid',
        ]);

        $count = DemoMemo::where(
            'anonymous_user_id',
            $validated['anonymous_user_id']
        )
            ->where('expires_at', '>', now())
            ->count();

        if ($count >= 5) {
            return response()->json([
                'message' => 'Maximum 5 notes allowed per user'
            ], 429);
        }

        $memo = DemoMemo::create([
            'type' => $validated['type'],
            'content' => $validated['content'],
            'anonymous_user_id' => $validated['anonymous_user_id'],
            'expires_at' => now()->addDay(),
        ]);

        return response()->json($memo, 201);
    }

    // delete memo
    public function destroy(string $id)
    {
        $memo = DemoMemo::findOrFail($id);
        $memo->delete();
        return response()->json(['message' => 'Memo deleted']);
    }
}
