<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //untuk menghandle authentication
use Session;

class LoginController extends Controller
{
    public function login()
    {
        //untuk memeriksa apakah user sudah login atau belum
        if (Auth::check()) { 
            //jika sudah maka akan diarahkan ke halaman utama
            return redirect('home');
        } else {
            return view('login');
        }
    }

    public function actionLogin(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($data)) {
            $user = Auth::user();
            
            if ($user->active) {
                return redirect('home');
            } else {
                Auth::logout();
                Session::flash('error', 'Akun Anda belum diverifikasi. Silakan cek email Anda.');
                return redirect('/');
            }
        } else {
            Session::flash('error', 'Email atau password salah');
            return redirect('/');
        }
    }

    public function actionLogout()
    {
        //untuk menghapus session yang aktif
        //setelah logout akan diarahkan kembali ke form login

        Auth::logout();
        return redirect('/');
    }
}
