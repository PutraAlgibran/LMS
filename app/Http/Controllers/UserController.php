<?php

namespace App\Http\Controllers;

use App\Models\users;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = users::latest()->paginate(5);

        return view('users.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
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
        $request->validate([
            'fullname' => 'required',
            'role' => 'required',
            'username' => 'required',
            'email' => 'required',
            'telpon' => 'required',
            'alamat' => 'required',
            'password' => 'required',
        ]);

        users::create($request->all());

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
        $request->validate([
            'fullname' => 'required',
            'role' => 'required',
            'username' => 'required',
            'email' => 'required',
            'telpon' => 'required',
            'alamat' => 'required',
            'password' => 'required',
        ]);

        $user->update($request->all());

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
