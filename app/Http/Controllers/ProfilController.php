<?php

namespace App\Http\Controllers;

use App\Models\Regulasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function index()
    {
        return view('dashboard/user/index', [
            'active' => '',
            'user' => Auth::User(),

        ]);
    }

    public function change()
    {
        return view('dashboard/user/change', [
            'active' => '',
            'user' => Auth::user(),

        ]);
    }

    public function change_profil(Request $request)
    {
        User::find($request->id)->update([
            'name' => $request->name,
            'email' => $request->email,

        ]);
        return redirect('/profil')->with('success_update', 'Data berhasil diubah!');
    }

    public function check()
    {
        return view('dashboard/user/check', [
            'active' => '',
            'user' => Auth::user(),

        ]);
    }

    public function check_password(Request $request)
    {
        if (!Hash::check($request->password, User::find($request->id)->password)) {
            return redirect('/profil/check')->with('error_check', 'Password Lama Salah!');
        }
        if ($request->password1 != $request->password2) {
            return back()->with('error_confirm_password', 'Password tidak sama!');
        }
        User::find($request->id)->update([
            'password' => Hash::make($request->password1),
        ]);
        return redirect('/profil')->with('success_change_password', 'Password berhasil diubah!');
    }

    // public function change_password()
    // {
    //     return view('dashboard/user/change_password', [
    //         'active' => '',
    //         'user' => Auth::user(),

    //     ]);
    // }

    // public function change_password_post(Request $request)
    // {
    //     if ($request->password1 != $request->password2){
    //         return back()->with('error_confirm_password', 'Password tidak sama!');
    //     }
    //     User::find($request->id)->update([
    //         'password' => Hash::make($request->password1),
    //     ]);
    //     return redirect('/profil')->with('success_change_password', 'Password berhasil diubah!');
    // }
}
