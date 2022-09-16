<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use RealRashid\SweetAlert\Facades\Alert;

class RoleController extends Controller
{
    public function index()
    {
        return view ('roles.index', [
            'role' => Role::all()->sortBy('name')
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:50'
        ]);
        
        $role = Role::firstOrCreate(['name' => $request->name]);
        
        Alert::success('Berhasil!', 'Data Pegawai Berhasil Ditambahkan!');
        return redirect('/role');
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        
        Alert::success('Berhasil!', 'Data Pegawai Berhasil Ditambahkan!');
        return redirect('/role');
    }
}
