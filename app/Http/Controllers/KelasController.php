<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\Guru;
use App\Models\Kelas;
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
        //
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
        $validatedData = $request->validate([
            'nama' => 'required',
            'kelas' => 'required',
            'file' => 'file|mimes:pdf,doc,jpeg,png,jpg,gif,svg|max:20000',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelas $kelas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelas $kelas)
    {
        //
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
}
