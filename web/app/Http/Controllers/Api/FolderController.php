<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Folder;
use Illuminate\Http\Request;

class FolderController extends Controller
{
    public function index()
    {
        $folders = Folder::withCount('notes')->where('user_id', 1)->latest()->get();
        return response()->json([
            'success' => true,
            'data' => $folders
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50'
        ]);

        $folder = Folder::create([
            'name' => $request->name,
            'user_id' => 1,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Folder berhasil dibuat',
            'data' => $folder
        ], 210);
    }

    public function show(Folder $folder)
    {
        if ($folder->user_id !== 1) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $folder->load('notes');
        return response()->json([
            'success' => true,
            'data' => $folder
        ]);
    }

    public function update(Request $request, Folder $folder)
    {
        if ($folder->user_id !== 1) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $request->validate([
            'name' => 'required|max:50'
        ]);

        $folder->update(['name' => $request->name]);

        return response()->json([
            'success' => true,
            'message' => 'Folder berhasil diubah',
            'data' => $folder
        ]);
    }

    public function destroy(Folder $folder)
    {
        if ($folder->user_id !== 1) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $folder->notes()->delete();
        $folder->delete();

        return response()->json([
            'success' => true,
            'message' => 'Folder berhasil dihapus'
        ]);
    }
}
