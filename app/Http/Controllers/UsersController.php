<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return view('backend.user.index', compact('users'));
    }

    public function store(Request $request)
    {
        User::create($request->all());
        return redirect('/users')->with('success, Data Berhasil Disimpan');
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect('/users');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/users')->with('succes, Data Berhasil Dihapus');
    }
}
