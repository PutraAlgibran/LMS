<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\Guru;
use App\Models\Murid;
use App\Models\Kelas;
use App\Models\MateriKelas;
use App\Models\Pertemuan;
use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materi = Materi::latest()->paginate(100);
        return view('materidanTugas.detailMateri', compact('materi'))
            ->with('i', (request()->input('page', 1) - 1) * 100);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('materidanTugas.tambahMateri', compact('materi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'nama' => 'required',
    //         'kelas_id' => 'required',
    //         'keterangan' => 'required',
    //         'materiUpload' => 'file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx|max:20000',
    //         'guru_id' => 'required',
    //     ]);
    //     $validatedData['guru_id'] = $request->post('guru_id');
    //     $validatedData['kelas_id'] = $request->post('kelas_id');

    //     if ($materi = $request->file('materiUpload')) {
    //         $destinationPath = 'assets/materi';
    //         $profileMateri = date('YmdHis') . "." . $materi->getClientOriginalExtension();
    //         $materi->move($destinationPath, $profileMateri);
    //         $validatedData['file'] = "$profileMateri";
    //     }

    //     try {
    //         Materi::create($validatedData);

    //         return redirect()->back()
    //             ->with('success', 'Users Created successfully!');
    //     } catch (\Exception $e) {
    //         return redirect()->back()
    //             ->with('error', 'Error during the creation!');
    //     }
    // }

    public function storeMapel(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'keterangan' => 'required',
        ]);

        $validatedDataKelas = $request->validate([
            'kelas_id' => 'required',
        ]);

        try {
            $materi = Materi::create($validatedData);
            $validatedDataKelas['materi_id'] = $materi->id;
            $validatedDataKelas['guru_id'] = Guru::where('user_id', Auth::user()->id)->first()->id;

            MateriKelas::create($validatedDataKelas);

            return redirect()->back()
                ->with('success', 'Materi Created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error during the creation!');
        }
    }

    public function storePertemuan(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'keterangan' => 'required',
            'file' => 'file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx|max:20000'
        ]);
        $validatedData['materi_id'] = $id;

        if ($materi = $request->file('file')) {
            $destinationPath = 'assets/materi/' . Materi::find($id)->nama;
            $profileMateri = date('YmdHis') . "." . $materi->getClientOriginalExtension();
            $materi->move($destinationPath, $profileMateri);
            $validatedData['file'] = "$profileMateri";
        }
        try {
            Pertemuan::create($validatedData);

            return redirect()->back()
                ->with('success', 'Pertemuan Created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error during the creation!');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $materi = Materi::find($id);
        if (Auth::user()->role != "Guru") {
            $guru_id = '';
            $kelas_id = Murid::where('user_id', Auth::user()->id)->get()[0]->kelas_id;
        } else {
            $guru_id = Guru::where('user_id', Auth::user()->id)->get()[0]->id;
        }
        // dd(Guru::where('user_id', Auth::user()->id)->get()[0]->id);
        return view('materidanTugas.detailMateri', [
            'materi_id' => $id,
            'guru_id' => $guru_id,
            'materi' => $materi,
            'kelas' => Kelas::all(),
            'pertemuan' => Pertemuan::where('materi_id', $id)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function editPertemuan(Materi $materi, $m_id, $p_id)
    {
        $materi = Materi::find($m_id);
        $pertemuan = Pertemuan::find($p_id);
        // $users = Murid::where('id', $id)->get();
        // dd($users);
        return view('materidanTugas.editPertemuan', compact('materi', 'pertemuan'));
    }

    public function editMapel($id)
    {
        $materi = Materi::where('id', $id)->first();
        $materiKelas = MateriKelas::where('materi_id', $id)->first();
        $users = Murid::where('id', $id)->get();
        $kelas = Kelas::all();
        // dd($users);
        return view('materidanTugas.editMateri', compact('materi', 'materiKelas', 'users', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function updatePertemuan(Request $request, Pertemuan $pertemuan, $m_id, $p_id)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'keterangan' => 'required',
        ]);

        $image = $request->file('file');
        if (!empty($image)) //kondisi akan upload file baru
        {
            $request->validate([
                'file' => 'file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx|max:20000',
            ]);
            $old_file = Pertemuan::find($p_id)->file;
            if (!empty($old_file)) { //kondisi ada nama file di tabel
                //hapus file lama
                unlink('assets/materi/' . Materi::find($m_id)->nama . '/' . $old_file);
            }
            //proses upload file baru
            $destinationPath = 'assets/materi/' . Materi::find($m_id)->nama;
            $profilePertemuan = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profilePertemuan);
            $validatedData['file'] = "$profilePertemuan";
        }

        try {
            $pertemuan->where('id', $p_id)->update($validatedData);
            return redirect()->back()
                ->with('success', 'Pertemuan updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error during the creation!');
        }
    }

    public function updateMapel(Request $request, Materi $materi, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'keterangan' => 'required',
        ]);

        $validatedDataKelas = $request->validate([
            'kelas_id' => 'required',
        ]);

        try {
            $materi = Materi::where('id', $id)->update($validatedData);
            MateriKelas::where('materi_id', $id)->update($validatedDataKelas);

            return redirect()->back()
                ->with('success', 'Materi updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error during the creation!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function destroyMapel(Materi $materi, $id)
    {
        $materi->where('id', $id)->delete($id);

        return redirect()->back()
            ->with('success', 'Materi deleted successfully');
    }

    public function destroyPertemuan(Pertemuan $pertemuan, $m_id, $p_id)
    {
        $file = Pertemuan::find($p_id)->file;
        //--------hapus dulu fisik file foto--------
        if (!empty($file)) {
            unlink('assets/materi/' . Materi::find($m_id)->nama . '/' .  $file);
        }

        $pertemuan->where('id', $p_id)->delete($p_id);

        return redirect()->back()
            ->with('success', 'Pertemuan deleted successfully');
    }
}
