<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Jenis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $type = $request->input('type', 5);
        $type = in_array($type, [5, 10, 50, 100]) ? $type : 5;

        $documents = Document::query()
            ->when($search, function($query, $search) {
                return $query->where('nama_dokument', 'like', '%' . $search . '%');
            })
            ->paginate($type)
            ->appends($request->except('page'));

        return view('document.index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenis = Jenis::pluck('jenis_surat', 'id');
        return view('document.create', compact('jenis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_dokument' => 'required|string|max:255',
            'jenis_id' => 'required|exists:jenis,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public'); 
            $validated['image'] = $path; 
        }

        Document::create($validated);

        return redirect()->route('document.index')->with('success', 'Berhasil Menambahkan Dokumen Baru');
    }

    /**
     * Display the specified resource.
     */
    public function show(Document $document)
    {
        // Implement logic to display a specific document
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        $jenis = Jenis::all();
        return view('document.edit', compact('document', 'jenis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Document $document)
    {
        $validated = $request->validate([
            'nama_dokument' => 'required|string|max:255',
            'jenis_id' => 'exists:jenis,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($document->image) {
                Storage::delete($document->image); 
            }
            $validated['image'] = $request->file('image')->store('public');
        }

        $document->update([
            'nama_dokument' => $validated['nama_dokument'],
            'jenis_id' => $validated['jenis_id'],
        ]);

        return redirect()->route('document.index')->with('success', 'Berhasil Mengedit Dokumen');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $document = Document::findOrFail($id);
        $document->delete();

        return redirect()->back()->with('success', 'Berhasil Menghapus Dokumen');
    }
}
