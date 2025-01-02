<?php

namespace App\Http\Controllers;

use App\Models\Scholarships;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ScholarshipsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $scholarships = Scholarships::all();

        return view('backend.scholarship.index', compact('scholarships'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'amount' => 'required|numeric',
            'deadline' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Menyimpan gambar jika ada
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $validatedData['image'] = $path;
        }

        Scholarships::create($validatedData);

        return redirect('/scholarships')->with('success', 'Beasiswa berhasil ditambahkan.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $scholarships = Scholarships::findOrFail($id);

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'amount' => 'required',
            'deadline' => 'required|date',  
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $validatedData['image'] = $path;
        }

        $scholarships->update($validatedData);
        return redirect('/scholarships')->with('success', 'Beasiswa berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $scholarship = Scholarships::findOrFail($id);
        if ($scholarship->image) {
            Storage::disk('public')->delete($scholarship->image);
        }

        $scholarship->delete();
        return redirect('/scholarships')->with('success', 'Beasiswa berhasil dihapus.');
    }
}
