<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Guest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class DashboardController extends Controller
{
    public function index() 
    {
        return view('dashboard.index', [
            'employee' => Employee::count(),
            'guest' => Guest::count(),
            'user' => User::count()
        ]);
    }

    public function setting()
    {
        $user = Auth::user();
        return view('setting.index', [
            'user' => $user
        ]);
    }

    public function updateProfile(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|exists:users,email',
            'password' => 'nullable|min:6',
            'konfirmasi_password' => 'nullable|same:password'
        ]);

        try {
            $user = Auth::user();
            $password = !empty($request->password) ? bcrypt($request->password):$user->password;
            
            $user->update([
                'name' => $request->name,
                'password' => $password
        ]);
            
            Alert::success('Berhasil!', 'Data User Berhasil Diubah!');
            return redirect('/setting');
        } catch (\Exception $e) {
            Alert::error('Terjadi Kesalahan!', 'Data Pegawai Gagal Diubah!');
        }
    }
}
