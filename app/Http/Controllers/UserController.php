<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         return view('user.index',[
            'title' => 'user',
            'users' => User::latest()->get()

        ]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('user.create',[
            'title' => 'Tambah User',
            

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


       $validated = $request->validate([
    'name'     => 'required|string|max:255',
    'email'    => 'required|string|email|max:255|unique:users,email', 
    'password' => 'required|string|min:8',
    'password_confirmation' => 'required|same:password',
    'avatar'   => 'nullable|image|mimes:jpeg,png,jpg|max:1048', 
    'role'     => 'required|in:Superadmin,Admin',
], [
    'name.required'     => 'Nama tidak boleh kosong.',
    'name.max'          => 'Nama maksimal 255 karakter.',   
    'email.required'    => 'Email tidak boleh kosong.',
    'email.email'       => 'Format email tidak valid.',
    'email.unique'      => 'Email sudah terdaftar.',
    'password.required' => 'Password tidak boleh kosong.',
    'password.min'      => 'Password minimal harus 8 karakter.',
    'role.required'     => 'Role harus dipilih.',
    'role.in'           => 'Role yang dipilih tidak valid.',
]);

    try {

    if($request->file('avatar')) {
    $validated['avatar'] = $request->file('avatar')->store('avatar', 'public');
}
        DB::beginTransaction();
        User::create($validated);
        DB::commit(); 
        return to_route('user.index')->withSuccess('Data Berhasil Ditambahkan');
    } catch (\Exception $e) {
        DB::rollBack();
        dd($e->getMessage());
        return to_route('user.create')->withSuccess('Data Berhasil Ditambahkan' . $e->getMessage());
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
