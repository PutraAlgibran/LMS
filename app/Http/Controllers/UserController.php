<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PDF;
use App\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = users::latest()->paginate(100);
        return view('users.index', compact('users'))
            ->with((request()->input('page', 1) - 1) * 100);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create', ['user' => users::all()]);
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
            'fullname' => 'required',
            'role' => 'required',
            'username' => 'required',
            'email' => 'required',
            'telpon' => 'required|numeric',
            'alamat' => 'required',
            'password' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        if ($image = $request->file('foto')) {
            $destinationPath = 'assets/img/avatars/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $validatedData['foto'] = "$profileImage";
        }

        try {
            users::create($validatedData);

            //return redirect()->back()
            return redirect()->route('users.index')
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
     * @param  \App\users  $product
     * @return \Illuminate\Http\Response
     */
    public function show(users $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\users  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(users $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\users  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, users $user)
    {
        $validatedData = $request->validate([
            'fullname' => 'required',
            'role' => 'required',
            'username' => 'required',
            'email' => 'required',
            'telpon' => 'required|numeric',
            'alamat' => 'required',
        ]);

        $password = $request->post('password');
        if ($password !== null) {
            $validatedData['password'] = Hash::make($password);
        }

        //--------proses update data lama & upload file foto baru--------
        $image = $request->file('foto');
        if (!empty($image)) //kondisi akan upload foto baru
        {
            $request->validate([
                'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            if (!empty($user->foto)) { //kondisi ada nama file foto di tabel
                //hapus foto lama
                unlink('assets/img/avatars/' . $user->foto);
            }
            //proses upload foto baru
            $destinationPath = 'assets/img/avatars/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            //print_r($profileImage); die();
            $image->move($destinationPath, $profileImage);
            $validatedData['foto'] = "$profileImage";
        } else //kondisi user hanya update data saja, bukan ganti foto
        {
            $validatedData['foto'] = $user->foto; //nama file foto masih yg lama
        }

        try {
            $user->update($validatedData);
            //return redirect()->back()
            return redirect()->back()
                ->with('success', 'Users updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error during the creation!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(users $user)
    {
        //--------hapus dulu fisik file foto--------
        if (!empty($user->foto)) {
            unlink('assets/img/avatars/' . $user->foto);
        }

        $user->delete();

        return redirect()->back()
            ->with('success', 'Users deleted successfully');
    }

    public function usersPDF()
    {
        $data = users::all();
        //dd($data);

        $pdf = PDF::loadView('users/usersPDF', ['data' => $data]);

        return $pdf->download(date('d/m/y') . '_data_users.pdf');
    }

    public function usersExcel()
    {
        return Excel::download(new UserExport, 'user.xlsx');
    }

    public function search(Request $request)
    {
        if ($request->post('role') == null) {
            $srch = users::where('fullname', 'LIKE', "%" . $request->post('nama') . "%")->get();
        } else if ($request->post('nama') == null) {
            $srch = users::where('role', 'LIKE', $request->post('role'))->get();
        } else {
            $srch = users::where('fullname', 'LIKE', "%" . $request->post('nama') . "%")
                ->where('role', 'LIKE', $request->post('role'))->get();
        }

        if (count($srch) == 0) {
            $srch = users::all();
        }

        return view('users.index', [
            'users' => $srch,
        ]);
    }
}
