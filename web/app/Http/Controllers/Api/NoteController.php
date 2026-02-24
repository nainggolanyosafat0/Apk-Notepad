<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index(Request $request)
    {
        $folder_id = $request->query('folder_id');
        
        $query = Note::latest();
        
        if ($folder_id) {
            $query->where('folder_id', $folder_id);
        }

        $notes = $query->get();

        return response()->json([
            'success' => true,
            'data' => $notes
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'folder_id' => 'required|exists:folders,id',
            'content' => 'nullable'
        ]);

        $note = Note::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Catatan berhasil dibuat',
            'data' => $note
        ], 210);
    }

    public function show(Note $note)
    {
        return response()->json([
            'success' => true,
            'data' => $note
        ]);
    }

    public function update(Request $request, Note $note)
    {
        $request->validate([
            'title' => 'required',
            'folder_id' => 'required|exists:folders,id',
            'content' => 'nullable'
        ]);

        $note->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Catatan berhasil diperbarui',
            'data' => $note
        ]);
    }

    public function destroy(Note $note)
    {
        $note->delete();

        return response()->json([
            'success' => true,
            'message' => 'Catatan berhasil dihapus'
        ]);
    }
}
