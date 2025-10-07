<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use DataTables;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pengguna.index');
    }

    public function data()
    {
        $data = Pengguna::listUser();

        return \DataTables::of($data)->addIndexColumn()->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengguna $pengguna)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pengguna = Pengguna::getUser($id);
        $roles = \App\Models\Role::where('aktif', 1)->get();

        return view('pengguna.edit', compact('pengguna', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:pengguna,username,' . $id,
            'email' => 'required|email|max:255|unique:pengguna,email,' . $id,
            'aktif' => 'required|in:0,1',
            'id_role' => 'required|exists:role,id',
        ]);

        $pengguna = Pengguna::findOrFail($id);
        $pengguna->nama = $request->nama;
        $pengguna->username = $request->username;
        $pengguna->email = $request->email;
        $pengguna->aktif = $request->aktif;
        $pengguna->updated_by = auth()->id();

        if ($request->filled('password')) {
            $request->validate([
                'password' => 'min:6|confirmed',
            ]);
            $pengguna->password = bcrypt($request->password);
        }

        $pengguna->save();

        // Update role
        \DB::table('role_pengguna')
            ->where('id_pengguna', $id)
            ->update(['id_role' => $request->id_role]);

        return redirect()->route('pengguna.index')->with('success', 'Data pengguna berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengguna $pengguna)
    {
        //
    }
}
