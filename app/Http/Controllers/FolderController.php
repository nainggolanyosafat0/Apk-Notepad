<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Folder;

class FolderController extends Controller
{
    public function index()
    {
        $folders = Folder::with('notes')->latest()->get();
        return view('notes.index', compact('folders'));
    }

    public function store(Request $request)
    {
        Folder::create([
            'name' => $request->name,
            'code' => strtoupper(substr($request->name,0,2))
        ]);

        return back();
    }
}

