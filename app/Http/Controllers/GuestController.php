<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guest;
use App\Models\Employee;
use Barryvdh\DomPDF\Facade\Pdf;
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
            'phone' => 'required|string|min:11|max:13',
            'agency' => 'required|string|max: 200',
            'need' => 'required|string|max:200',
            'day' => 'required',
            'time' => 'required',
            'employee_id' => 'required|exists:employees,id'
        ]);

        // dd($request->all());

        try {
              Guest::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'agency' => $request->agency,
                'need' => $request->need,
                'day' => $request->day,
                'time' => $request->time,
                'employee_id' => $request->employee_id
            ]);

            return redirect('/tamu-pmpk/terimakasih');
        } catch (\Exception $e) {
            return redirect('/tamu-pmpk');
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

    public function tamu()
    {
        return view('guests.tamu', [
            'employees' => Employee::all()
        ]);
    }

    public function terimakasih()
    {
        return view('guests.terimakasih');
    }

    public function exportPdf(Guest $guest)
    {
        $guests = Guest::all();

        $pdf = Pdf::loadView('guests.pdf', compact('guests'));

        return $pdf->stream();
    }
}
