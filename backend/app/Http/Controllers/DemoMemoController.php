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
        $request->validate([
            'type' => 'required|in:note,image',
            'content' => 'required|string|max:50',
        ]);

        $memo = DemoMemo::create([
            'type' => $request->type,
            'content' => $request->content,
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