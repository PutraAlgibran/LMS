<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Murid;
use App\Models\users;
use App\Models\Materi;
use App\Models\Pertemuan;
use App\Models\TugasUpload;
use FontLib\Table\Type\post;

class TugasController extends Controller
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
        return view('materidanTugas.tambahTugas', compact('tugas'));
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
            'pertemuan_id' => 'required',
            'jam_mulai' => 'required',
            'jam_berakhir' => 'required',
            'keterangan' => 'required',
            'file' => 'file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx|max:20000',
            'materi_id' => 'required',
            'guru_id' => 'required',
        ]);
        $validatedData['materi_id'] = $request->post('materi_id');
        $validatedData['guru_id'] = $request->post('guru_id');
        $validatedData['pertemuan_id'] = $request->post('pertemuan_id');

        $materi = Materi::find($request->post('materi_id'));

        if ($tugas = $request->file('tugasUpload')) {
            $destinationPath = "assets/materi/$materi->nama/" . $request->post('nama');
            $profileTugas = date('YmdHis') . "." . $tugas->getClientOriginalExtension();
            $tugas->move($destinationPath, $profileTugas);
            $validatedData['file'] = "$profileTugas";
        }

        try {
            Tugas::create($validatedData);

            return redirect()->back()
                ->with('success', 'Task Created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Task Created Failed!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($materi_id, $pertemuan_id)
    {
        // $pertemuan = Pertemuan::find($pertemuan_id);
        $materi = Materi::find($materi_id);
        $tugas = Tugas::where('materi_id', $materi_id)->where('pertemuan_id', $pertemuan_id)->first();
        // dd($tugas);
        if (Auth::user()->role != "Guru") {
            $guru_id = '';
            $daftarTugas = '';
            if ($tugas !== null) {
                $tugasUpload = TugasUpload::where('tugas_id', $tugas->id)->where('user_id', Auth::user()->id)->first();
            } else {
                $tugasUpload = null;
            }
        } else {
            $guru_id = Guru::where('user_id', Auth::user()->id)->get()[0]->id;
            $tugasUpload = '';
            if ($tugas !== null) {
                $daftarTugas = TugasUpload::with('user')->where('tugas_id', $tugas->id)->get();
            } else {
                $daftarTugas = '';
            }
        }
        // dd(Tugas::where('materi_id', $materi_id)->where('pertemuan_id', $pertemuan_id)->first());
        return view('materidanTugas.detailTugas', [
            'tugas' => Tugas::where('materi_id', $materi_id)->where('pertemuan_id', $pertemuan_id)->first(),
            'materi_id' => $materi_id,
            'pertemuan' => Pertemuan::where('materi_id', $materi->id)->get(),
            'guru_id' => $guru_id,
            'materi' => $materi,
            'kelas' => Kelas::all(),
            'tugasUpload' => $tugasUpload,
            'daftarTugas' => $daftarTugas
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('materidanTugas.editTugas', compact('tugas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'kelas_id' => 'required',
            'jam_mulai' => 'required',
            'jam_berakhir' => 'required',
            'keterangan' => 'required',
            'tugasUpload' => 'file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx|max:20000',
            'materi_id' => 'required',
            'guru_id' => 'required',
        ]);
        $validatedData['materi_id'] = $request->post('materi_id');
        $validatedData['guru_id'] = $request->post('guru_id');
        $validatedData['kelas_id'] = $request->post('kelas_id');

        if ($tugas = $request->file('tugasUpload')) {
            $destinationPath = 'assets/tugas';
            $profileTugas = date('YmdHis') . "." . $tugas->getClientOriginalExtension();
            $tugas->move($destinationPath, $profileTugas);
            $validatedData['file'] = "$profileTugas";
        }
        try {
            Tugas::update($validatedData);

            return redirect()->route('materidanTugas.detailTugas')
                ->with('success', 'Task Updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Task Updated Failed!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }

    public function upload(Request $request, $id)
    {
        $validatedData['user_id'] = Auth::user()->id;
        $validatedData['tugas_id'] = $id;

        $materi = Materi::find($request->post('materi_id'));
        $data_tugas = Tugas::find($id);

        if ($tugas = $request->file('tugasUpload')) {
            $destinationPath = "assets/materi/$materi->nama/$data_tugas->nama/TugasUpload";
            $profileTugas = date('YmdHis') . "." . $tugas->getClientOriginalExtension();
            $tugas->move($destinationPath, $profileTugas);
            $validatedData['file'] = "$profileTugas";
        }

        try {
            TugasUpload::create($validatedData);

            return redirect()->back()
                ->with('success', 'Task Created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Task Created Failed!');
        }
    }
}
