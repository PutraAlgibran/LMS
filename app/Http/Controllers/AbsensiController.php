<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Absensi;
use App\Models\users;
use App\Models\Murid;
use App\Models\Kelas;
use PDF;
use App\Exports\AbsensiExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role !== 'Murid') {
            $absensi = Absensi::all();
            $isAbsen = '';
        } else if (Auth::user()->role == 'Murid') {
            $absensi = Absensi::where('user_id', Auth::user()->id)->get();
            $isAbsen = Absensi::where('user_id', Auth::user()->id)->whereDate('created_at', date('Y-m-d'))->first();
        }

        return view('absensi.index', [
            'absensi' => $absensi,
            'isAbsen' => $isAbsen,
            'kelas' => Kelas::all(),

        ]);
    }

    public function search(Request $request)
    {
        $isAbsen = null;
        if (Auth::user()->role !== 'Murid') {
            if ($request->post('kelas_id') == null) {
                $absensi = Absensi::whereDate('created_at', 'LIKE', $request->post('tanggal'))->get();
            } else if ($request->post('tanggal') == null) {
                $absensi = Absensi::where('kelas_id', 'LIKE', $request->post('kelas_id'))->get();
            } else {
                $absensi = Absensi::where('kelas_id', 'LIKE', $request->post('kelas_id'))
                    ->whereDate('created_at', 'LIKE', $request->post('tanggal'))->get();
            }

            if (count($absensi) == 0) {
                $absensi = Absensi::all();
            }
        } else if (Auth::user()->role == 'Murid') {
            $isAbsen = Absensi::where('user_id', Auth::user()->id)->whereDate('created_at', date('Y-m-d'))->first();
            $absensi = Absensi::whereDate('created_at', 'LIKE', $request->post('tanggal'))->where('user_id', Auth::user()->id)->get();
            if (count($absensi) == 0) {
                $absensi = Absensi::where('user_id', Auth::user()->id)->get();
            }
        }
        return view('absensi.index', [
            'absensi' => $absensi,
            'isAbsen' => $isAbsen,
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'status' => 'required'
        ]);
        $validated['user_id'] = Auth::user()->id;
        $validated['keterangan'] = $request->post('keterangan');
        $validated['kelas_id'] = Murid::where('user_id', Auth::user()->id)->first()->kelas_id;

        Absensi::create($validated);
        try {

            //return redirect()->back()
            return redirect()->back()
                ->with('success', 'Users Created successfully!');
        } catch (\Exception $e) {
            //return redirect()->back()
            return redirect()->back()
                ->with('error', 'Error during the creation!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function show(Absensi $absensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function edit(Absensi $absensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Absensi $absensi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Absensi $absensi)
    {
        //
    }

    public function absensiPDF()
    {
        $absensi = DB::table('absensi')
            ->join('user', 'absensi.user_id', '=', 'user.id')
            ->join('murid', 'murid.user_id', '=', 'user.id')
            ->join('kelas', 'kelas.id', '=', 'murid.kelas_id')
            ->select('absensi.id', 'user.fullname', 'kelas.nama', 'absensi.status', 'absensi.keterangan', 'absensi.created_at')
            ->get();

        $pdf = PDF::loadView('Absensi/absensiPDF', ['absensi' => $absensi]);

        return $pdf->download(date('d/m/y') . '_data_absensi.pdf');
    }

    public function absensiExcel()
    {
        return Excel::download(new AbsensiExport, 'absensi.xlsx');
    }
}
