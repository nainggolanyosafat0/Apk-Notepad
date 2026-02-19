<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Folder;
use App\Models\Note;

class NoteController extends Controller
{
    // 1. TAMPILKAN HALAMAN UTAMA (Empty State)
    public function index()
    {
        // Ambil semua folder milik user
        $folders = Folder::withCount('notes')->where('user_id', 1)->latest()->get();

        // Tidak ada folder aktif
        $activeFolder = null;
        $notes = collect([]); // Kosong

        return view('app', compact('folders', 'notes', 'activeFolder'));
    }

    // 2. SIMPAN FOLDER BARU
    public function storeFolder(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50'
        ]);

        // Buat kode singkatan otomatis
        $words = explode(" ", $request->name);
        $code = "";
        foreach ($words as $w) {
            $code .= strtoupper($w[0]);
        }
        $code = substr($code, 0, 2);

        Folder::create([
            'name' => $request->name,
            'user_id' => 1, // WAJIB karena ada foreign key
        ]);

        return redirect()->back()->with('success', 'Folder berhasil dibuat!');
    }

    // UPDATE FOLDER (Rename)
    public function updateFolder(Request $request, Folder $folder)
    {
        $request->validate([
            'name' => 'required|max:50'
        ]);

        $folder->update(['name' => $request->name]);

        return redirect()->back()->with('success', 'Folder berhasil diubah!');
    }

    // HAPUS FOLDER
    public function destroyFolder(Folder $folder)
    {
        // Notes will be deleted via ON DELETE CASCADE in DB or model events if configured.
        // Assuming DB constraint is set, or we can manually delete:
        $folder->notes()->delete(); 
        $folder->delete();
        
        return redirect()->route('notes.index')->with('success', 'Folder berhasil dihapus!');
    }

    // 3. SIMPAN CATATAN BARU
    public function storeNote(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'folder_id' => 'required|exists:folders,id',
            'content' => 'nullable'
        ]);

        Note::create([
            'title' => $request->title,
            'content' => $request->content,
            'folder_id' => $request->folder_id
        ]);

        return redirect()->back()->with('success', 'Catatan berhasil disimpan!');
    }

    // 3. SIMPAN CATATAN BARU
    // 4. UPDATE CATATAN (Edit)
    public function update(Request $request, Note $note)
    {
        $request->validate([
            'title' => 'required',
            'folder_id' => 'required|exists:folders,id',
            'content' => 'nullable'
        ]);

        $note->update([
            'title' => $request->title,
            'content' => $request->content,
            'folder_id' => $request->folder_id
        ]);

        return redirect()->back()->with('success', 'Catatan berhasil diperbarui!');
    }

    // 5. TAMPILKAN FOLDER (Show)
    public function show(Folder $folder)
    {
        // Ambil folder dan notes milik user (sementara user_id = 1)
        if ($folder->user_id !== 1) {
            abort(403);
        }

        // Ambil semua folder untuk sidebar
        $folders = Folder::withCount('notes')->where('user_id', 1)->latest()->get();
        
        // Ambil notes dalam folder ini
        $notes = $folder->notes()->latest()->get();

        // Active folder is current folder
        $activeFolder = $folder;

        return view('app', compact('folders', 'notes', 'activeFolder'));
    }

    // 5. HAPUS NOTE
    public function destroy(Note $note)
    {
        $note->delete();
        return redirect()->back()->with('success', 'Catatan berhasil dihapus!');
    }
}