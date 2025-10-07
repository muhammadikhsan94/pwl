<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengguna;
use App\Models\Role;
use App\Models\RolePengguna;
use Hash;
use Auth;
use Session;
use Alert;

class LoginController extends Controller
{
    public function index()
    {
        if(auth()->check()) {
            return redirect()->route('home');
        }
        return view('auth.login');
    }

    public function authenticate(Request $req)
    {
        $req->validate(
            [
                'username' => 'required',
                'password' => 'required|min:8'
            ]
        );
        Session::flush();

        // select * from pengguna where username = $req->username LIMIT 1
        $pengguna = Pengguna::where('username', $req->username)->first();
        if(!$pengguna) {
            return redirect()->back()->with(['error' => 'Data tidak ditemukan!']);
        } else {
            if($pengguna->aktif!=1) {
                return redirect()->back()->with(['warning' => 'Data pengguna belum divalidasi!']);
            }
            if(Hash::check($req->password, $pengguna->password)) {
                Auth::loginUsingId($pengguna->id);
                return redirect()->route('home');
            }
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect()->route('auth.login');
    }
}
