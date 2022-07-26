<?php

namespace App\Http\Controllers;

use App\Models\Murid;
use App\Models\Kelas;
use App\Models\users;
use Illuminate\Http\Request;
use PDF;
use App\Exports\MuridExport;
use Maatwebsite\Excel\Facades\Excel;

class MuridController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $murid = Murid::latest()->paginate(100);

        return view('murid.index', [
            'murid' => $murid,
            'kelas' => Kelas::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = users::where('role', 'Murid')->get();
        $kelas = Kelas::all();

        return view('murid.create', compact('users', 'kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'user_id' => 'required',
            'kelas_id' => 'required',
        ]);

        try {
            Murid::create($validatedData);

            return redirect()->route('murid.index')
                ->with('success', 'Murid created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error during the creation!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelas = Kelas::all();
        $murid = Murid::find($id);
        return view('murid.edit', compact('murid', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Murid $murid, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'kelas_id' => 'required',
        ]);

        try {
            $murid->where('id', $id)->update($validatedData);

            return redirect()->route('murid.index')
                ->with('success', 'Murid updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error during the creation!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Murid $murid, $id)
    {
        $murid->where('id', $id)->delete($id);

        return redirect()->back()
            ->with('success', 'Users deleted successfully');
    }

    public function muridPDF()
    {
        $data = Murid::with(['user', 'kelas'])->get();

        $pdf = PDF::loadView('murid/muridPDF', ['data' => $data]);

        return $pdf->download(date('d/m/y') . '_data_murid.pdf');
    }

    public function muridExcel()
    {
        return Excel::download(new MuridExport, 'murid.xlsx');
    }
}
