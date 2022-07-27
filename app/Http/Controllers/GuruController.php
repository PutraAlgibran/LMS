<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\users;
use Illuminate\Http\Request;
use PDF;
use App\Exports\GuruExport;
use Maatwebsite\Excel\Facades\Excel;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guru = Guru::latest()->get();
        return view('guru.index', compact('guru'))
            ->with('i', (request()->input('page', 1) - 1) * 100);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = users::where('role', 'Guru')->get();
        $kelas = Kelas::all();

        return view('guru.create', compact('users', 'kelas'));
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
            'email' => 'required',
            'telpon' => 'required|numeric',
            'user_id' => 'required',
        ]);

        try {
            Guru::create($validatedData);

            return redirect()->back()
                ->with('success', 'Guru created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error during the creation!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function show(Guru $guru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function edit(Guru $guru, $id)
    {
        $guru = Guru::find($id);
        $users = users::where('role', 'Guru')->get();
        // dd($users);
        return view('guru.edit', compact('guru', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guru $guru, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'telpon' => 'numeric',
            'user_id' => 'required',
        ]);

        try {
            $guru->where('id', $id)->update($validatedData);

            return redirect()->back()
                ->with('success', 'Guru Updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error during the creation!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guru $guru, $id)
    {
        $guru->where('id', $id)->delete($id);

        return redirect()->back()
            ->with('success', 'Guru deleted successfully');
    }

    public function guruPDF()
    {
        $data = Guru::all();
        //dd($data);

        $pdf = PDF::loadView('guru/guruPDF', ['data' => $data]);

        return $pdf->download(date('d/m/y') . '_data_guru.pdf');
    }

    public function guruExcel()
    {
        return Excel::download(new GuruExport, 'guru.xlsx');
    }

    public function search(Request $request)
    {
        $srch = Guru::where('nama', 'LIKE', "%" . $request->post('cari') . "%")->get();
        if (count($srch) == 0) {
            $srch = Guru::all();
        }

        return view('guru.index', [
            'guru' => $srch,
        ]);
    }
}
