<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Zoom;

class AuthCont extends Controller
{
    public function login()
    {
        return view('auth.page.login');
    }

    public function register()
    {
        return view('auth.page.register');
    }

    public function auth(Request $request)
    {
        $akun = $request->validate([
            'email' => ['required'],
            'password' => ['required']
        ]);
        if(Auth::attempt($akun)){
            $request->session()->regenerate();
            $role = User::where('email', $request->email)->value('status');
            if($role == 0){
                return redirect()->intended('/');
            } elseif($role == 1){
                return redirect()->intended('/mahasiswa');
            }
            
        }

        return back()->with('gagal','Password atau Email Salah');
    }

    public function create(Request $request)
    {
        $validated =$request->validate([
            'name' => 'required',
            'email' => 'required',
            'status' => 'required',
            'password' => 'required|max:12|min:4',
            'password2' => 'required|max:12|min:4',
        ]);

        if ($request->password == $request->password2){
            $password = Hash::make($request->password);
            $data = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'status' => $request->status,
                'password' => $password
            ]);
            return redirect('/login')->with(['success' => 'Berhasil melakukan pendaftaran']);
        }else{
            return redirect('/login');
        }
       
    }

    public function forgot()
    {
        return view('auth.page.forgot');
    }

    public function change(Request $request)
    {
        $request->validate([
            'email' => ['required'],
            'password' => ['required'],
            'password2' => ['required']
        ]);
        $email = User::where('email',$request->email)->first();
        if($email){
            if($request->password == $request->password2){
                $password = Hash::make($request->password);
                User::where('email', $request->email)->update(['password'=>$password]);
                return redirect('/login')->with(['success' => 'Password Berhasil diubah']);
            }
            else{
                return redirect('/login')->with(['success' => 'Password Berhasil diubah']);
            }
        }
        else{
            return redirect('/login')->with(['success' => 'Password Berhasil diubah']);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function Dashboard()
    {
        $zoomTersedia = Zoom::where('availability', 0)->count();
        $zoom = Zoom::count();
        $requestzoom = Peminjaman::where('status', 0)->count();
        $zoomDipinjam = ($zoom - $zoomTersedia);
        $user = User::count();
        return view('admin.index', [
            'zoomTersedia' => $zoomTersedia,
            'zoomDipinjam' => $zoomDipinjam,
            'user' => $user,
            'requestzoom' => $requestzoom,
        ]);
    }
}
