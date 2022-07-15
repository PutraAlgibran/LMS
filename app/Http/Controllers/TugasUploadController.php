<?php

namespace App\Http\Controllers;

use App\Models\TugasUpload;
use App\Models\Materi;
use Illuminate\Http\Request;

class TugasUploadController extends Controller
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
        return view('materidanTugas.detailTugas', compact('TugasUpload'));
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

        $materi = Materi::find($request->post('materi_id'));

        if ($tugas = $request->file('file')) {
            $destinationPath = "assets/materi/$materi->nama/TugasUpload/" . $request->post('nama');
            $profileTugas = date('YmdHis') . "." . $tugas->getClientOriginalExtension();
            $tugas->move($destinationPath, $profileTugas);
            $validatedData['file'] = "$profileTugas";
        }

        try {
            TugasUpload::create($validatedData);

            return redirect()->route('users.index')
                ->with('success', 'Users Created successfully!');
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
        return view('materidanTugas.materiGuru', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TugasUpload $tugasUpload)
    {
        //--------hapus dulu fisik file foto--------
        if (!empty($tugasUpload->file)) {
            unlink('assets/img/avatars/' . $tugasUpload->foto);
        }

        $tugasUpload->delete();

        return redirect()->route('materidanTugas.materiUser')
            ->with('success', 'Users deleted successfully');
    }
}
