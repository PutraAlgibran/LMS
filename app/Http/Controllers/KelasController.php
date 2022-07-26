<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Materi;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\MateriKelas;
use App\Models\users;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::latest()->paginate(100);
        return view('kelas.index', compact('kelas'))
            ->with('i', (request()->input('page', 1) - 1) * 100);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Kelas $kelas)
    {
        return view('kelas.create', compact('kelas'));
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
        ]);

        try {
            Kelas::create($validatedData);

            return redirect()->back()
                ->with('success', 'Kelas created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error during the creation!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show(Kelas $kelas)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelas $kelas, $id)
    {
        $kelas = Kelas::find($id);
        return view('kelas.edit', compact('kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelas $kelas, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
        ]);

        try {
            $kelas->where('id', $id)->update($validatedData);

            return redirect()->back()
                ->with('success', 'Kelas created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error during the creation!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelas $kelas)
    {
        //
    }

    public function kelas(Request $request)
    {
        // if ($request->session()->get('role') == 'Guru') {
        //     $guru_id = Guru::where('user_id', $request->session()->get('id'));
        //     $materi = DB::table('materi_kelas')->where('guru_id', $guru_id)->get();
        //     dd($materi);
        // }
        $materi = Materi::all();
        $kelas = Kelas::all();
        // $kelas = Kelas::find(1)->materi;
        // dd($materi->kelas);
        // foreach ($materi as $key => $m) {
        //     foreach ($materi->mat as $k => $kelas) {
        //         echo $kelas->guru[$k]->nama . "<br>";
        //     }
        //     echo $m->kelas[$key]->guru[0]->nama;
        // }
        // die;
        return view('materidanTugas.materiGuru', compact('materi', 'kelas'));
    }

    public function materiUser(Request $request)
    {
        // if ($request->session()->get('role') == 'Guru') {
        //     $guru_id = Guru::where('user_id', $request->session()->get('id'));
        //     $materi = DB::table('materi_kelas')->where('guru_id', $guru_id)->get();
        //     dd($materi);
        // }
        $materi = Materi::get();
        // $kelas = Kelas::find(1)->materi;
        // dd($materi->kelas);
        // foreach ($materi as $key => $m) {
        //     foreach ($materi->mat as $k => $kelas) {
        //         echo $kelas->guru[$k]->nama . "<br>";
        //     }
        //     echo $m->kelas[$key]->guru[0]->nama;
        // }
        // die;
        return view('materidanTugas.materiUser', compact('materi'));
    }

    public function homeKelas(Request $request)
    {
        $materi = Materi::with('kelas')->get();
        $firstIndex = 0;
        $calculate = 0;
        foreach ($materi as $key => $m) {
            if ($m->kelas[0]->id == session()->get('kelas_id')) {
                $firstIndex = $key;
                break;
            }
        }
        if (Auth::user()->role == "Murid") {
            $absen = Absensi::where('user_id', Auth::user()->id)->whereBetween('created_at', ['2022-07-01', '2022-12-31'])->get();
            $calculate = ceil(count($absen) / 126 * 100);
        }
        return view('landingpage.home', compact('materi', 'firstIndex', 'calculate'));
    }
}
