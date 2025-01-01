<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = Users::all();

        return view('backend.user.index', compact('users'));
    }

    public function store(Request $request)
    {
        Users::create($request->all());
        return redirect('/user')->with('success, Data Berhasil Disimpan');

    }

    public function update(Request $request, $id)
    {
        $user = Users::findOrFail($id);
        $user->update($request->all());
        return redirect('/user')->with('success, Data Berhasil Dirubah');

    }

    public function destroy($id)
    {
        $user = Users::find($id);
        $user->delete();
        return redirect('/user')->with('succes, Data Berhasil Dihapus');

    }
}
