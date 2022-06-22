<?php

namespace App\Http\Controllers;

use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
            ->with('i', (request()->input('page', 1) - 1) * 100);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
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
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        if ($image = $request->file('foto')) {
            $destinationPath = 'assets/img/avatars/';
            $profileImage = date('YmHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $validatedData['foto'] = "$profileImage";
        }
        users::create($validatedData);

        return redirect()->route('users.index')
            ->with('success', 'Users created successfully.');
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
            'password' => 'required',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        users::create($validatedData);

        return redirect()->route('users.index')
            ->with('success', 'Users updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(users $user)
    {
        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'Users deleted successfully');
    }
}
