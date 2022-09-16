<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index', [
            'users' => User::with('roles')->orderBy('name')->get(),
            'roles' => Role::all()
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required|string|exists:roles,name'
        ]);

        try {
            $user = User::firstOrCreate([
                'email' => $request->email
            ], [
                'name' => $request->name,
                'password' => bcrypt($request->password),
                'status' => true
            ]);

            $user->assignRole($request->role);

            Alert::success('Berhasil!', 'Data User Berhasil Ditambahkan!');
            return redirect('/user');
        } catch (\Exception $e) {
            Alert::error('Terjadi Kesalahan!', 'Data User Gagal Ditambahkan!');
            return redirect('/user');
        }
        
    }

    public function update (Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'email' => 'required|email|exists:users,email',
            'password' => 'nullable|min:6',
        ]);

        try {
            
            $user = User::findOrFail($id);
            $password = !empty($request->password) ? bcrypt($request->password):$user->password;
            $user->update([
                'name' => $request->name,
                'password' => $password
        ]);
            
            Alert::success('Berhasil!', 'Data User Berhasil Diubah!');
            return redirect('/user');
        } catch (\Exception $e) {
            Alert::error('Terjadi Kesalahan!', 'Data Pegawai Gagal Diubah!');
        }
    }

    public function destroy ($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        if($user){
            Alert::success('Berhasil', 'Data User Berhasil Dihapus!');
            return redirect('/user');
        } else {
            Alert::error('Terjadi Kesalahan!', 'Data Gagal Dihapus!');
            return redirect('/user');
        }
    }
}
