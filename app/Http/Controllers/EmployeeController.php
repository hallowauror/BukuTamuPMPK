<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;    
use App\Models\Employee;
use RealRashid\SweetAlert\Facades\Alert;

class EmployeeController extends Controller
{
    public function index ()
    {
        return view('employees.index', [
            'employee' => Employee::all()->sortBy('name'),
        ]);
    }
        
    public function store (Request $request)
    {
        $this->validate($request, [
            'nip' => 'required|string|max:20',
            'name' => 'required|string|max:200',
            'position' => 'required|string|max:200'
        ]);

        try {
            $employee = Employee::create([
                'nip' => $request->nip,
                'name' => $request->name,
                'position' => $request->position
            ]);

            Alert::success('Berhasil!', 'Data Pegawai Berhasil Ditambahkan!');
            return redirect('/pegawai');
        } catch (\Exception $e) {
            Alert::error('Terjadi Kesalahan!', 'Data Pegawai Gagal Ditambahkan!');
            return redirect('/pegawai');
        }

    }

    public function update (Request $request, $id)
    {
        $this->validate($request, [
            'nip' => 'required|string|max:20',
            'name' => 'required|string|max:200',
            'position' => 'required|string|max:200'
        ]);

        try {
            
            $employee = Employee::find($id);

            $employee->update([
                'nip' => $request->nip,
                'name' => $request->name,
                'position' => $request->position
            ]);

            Alert::success('Berhasil!', 'Data Pegawai Berhasil Diubah!');
            return redirect('/pegawai');
        } catch (\Exception $e) {
            Alert::error('Terjadi Kesalahan!', 'Data Pegawai Gagal Diubah!');
        }
    }

    public function destroy ($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        if($employee){
            Alert::success('Berhasil', 'Data Pegawai Berhasil Dihapus!');
            return redirect('/pegawai');
        } else {
            Alert::error('Terjadi Kesalahan!', 'Data Gagal Dihapus!');
            return redirect('/pegawai');
        }
    }
    
}
