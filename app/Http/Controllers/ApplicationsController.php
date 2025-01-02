<?php

namespace App\Http\Controllers;

use App\Models\Applications;
use App\Models\Documents;
use App\Models\User;
use App\Models\UserProfiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApplicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $applications = Applications::where('user_id', auth()->user()->id)->get();

        return view('backend.application.index', compact('applications'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function register(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'address' => 'required|string|max:255',
            'phone' => 'required|max:15',
            'birthdate' => 'required|date',
            'password' => 'required|string|confirmed',
            'scholarship_id' => 'required|exists:scholarships,id',
            'documents.*' => 'required|file|mimes:pdf|max:2048',
        ]);

        // Menyimpan data pengguna
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'role' => 'user'
        ]);

        // Menyimpan data profil pengguna
        UserProfiles::create([
            'user_id' => $user->id,
            'address' => $validatedData['address'],
            'phone' => $validatedData['phone'],
            'birthdate' => $validatedData['birthdate'],
        ]);

        // Menyimpan pendaftaran beasiswa
        $application = Applications::create([
            'user_id' => $user->id,
            'scholarship_id' => $validatedData['scholarship_id'],
            'status' => 'pending',
        ]);

        // Menyimpan dokumen yang diunggah
        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $file) {
                $path = $file->store('documents', 'public');
                Documents::create([
                    'application_id' => $application->id,
                    'file_path' => $path,
                ]);
            }
        }
        return redirect('/')->with('success', 'Registration and application submitted successfully.');
    }

    public function update(Request $request, $id)
    {
        $application = Applications::findOrFail($id);
        $application->update($request->all());
        return redirect('/applications');
    }
}
