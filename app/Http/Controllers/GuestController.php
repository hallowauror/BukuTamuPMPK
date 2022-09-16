<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guest;
use App\Models\Employee;
use RealRashid\SweetAlert\Facades\Alert;

class GuestController extends Controller
{
    public function index ()
    {
        return view('guests.index', [
            'guest' => Guest::with('employee')->orderBy('name')->get(),
            'employees' => Employee::all()
        ]);
    }

    public function store (Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:200',
            'phone' => 'required|string|max:13',
            'agency' => 'required|string|max: 200',
            'need' => 'required|string|max:200',
            'day' => 'required',
            'time' => 'required',
            'employee_id' => 'required|exists:employees,id'
        ]);

        try {
            $guest = Guest::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'agency' => $request->agency,
                'need' => $request->need,
                'day' => $request->day,
                'time' => $request->time,
                'employee_id' => $request->employee_id
            ]);

            Alert::success('Berhasil!', 'Data Tamu Berhasil Ditambahkan!');
            return redirect('/tamu');
        } catch (\Exception $e) {
            Alert::error('Terjadi Kesalahan!', 'Data Tamu Gagal Ditambahkan!');
            return redirect('/tamu');
        }
    }

    public function destroy ($id)
    {
        $guest = Guest::findOrFail($id);
        $guest->delete();

        if($guest){
            Alert::success('Berhasil', 'Data Tamu Berhasil Dihapus!');
            return redirect('/tamu');
        } else {
            Alert::error('Terjadi Kesalahan!', 'Data Gagal Dihapus!');
            return redirect('/tamu');
        }
    }
}
