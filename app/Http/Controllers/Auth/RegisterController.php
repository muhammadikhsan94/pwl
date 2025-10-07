<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Str;

class RegisterController extends Controller
{
    public function index()
    {
        if(auth()->check()) {
            return redirect()->route('home');
        }
        return view('auth.register');
    }

    public function store(Request $req)
    {
        $req->validate([
            'nama' => 'required',
            'username' => 'required|unique:pengguna,username',
            'email' => 'required|unique:pengguna,email',
            'password' => 'required|min:8'
        ]);

        //validasi password
        if($req->password !== $req->password_confirmation) {
            return redirect()->back()->with(['error' => 'Password tidak cocok dengan konfirmasi password!']);
        }

        //store
        $uuid = Str::uuid();
        $pengguna = \App\Models\Pengguna::create([
            'id' => $uuid,
            'nama' => $req->nama,
            'username' => $req->username,
            'email' => $req->email,
            'password' => \Hash::make($req->password),
            'aktif' => 0,
            'soft_delete' => 0,
            'created_by' => $uuid
        ]);

        //set role
        $role = \App\Models\RolePengguna::create([
            'id_pengguna' => $pengguna->id,
            'id_role' => 2,
            'last_sync' => now()
        ]);

        if(!$pengguna OR !$role) {
            return redirect()->back()->with(['error' => 'Data tidak ditemukan!']);
        } else {
            return redirect()->route('auth.login')->with(['success' => 'Registrasi berhasil!']);
        }
    }
}
