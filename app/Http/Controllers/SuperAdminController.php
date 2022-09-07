<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Admin;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = DB::table('users')->latest()->get();
        return view('dashboard.admin.index', [
            'users' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.create', [
            'admins' => Admin::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = array(
            'required' => 'Kolom tidak boleh kosong',
            'unique' => 'Data sudah digunakan',
            'email' => 'Format bukan email'
        );
        $validated = $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'password' => 'required',
            'email' => 'required|email|unique:users,email',
            'is_admin' => 'required'
        ], $messages);
        $validated['password'] = Hash::make($request->password);
        User::create($validated);
        return redirect('/dashboard/admin')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        $post = Post::with(['category', 'author'])->where('user_id', '=', $admin->id)->get();
        return view('dashboard.admin.show', compact('admin', 'post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        $admin = DB::table('users')->where('id', '=', $admin->id)->first();
        return view('dashboard.admin.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        $user = User::findOrFail($admin->id);
        $validated = $request->validate([
            'password' => '',
            'email' => 'required',
            'name' => 'required',
            'is_admin' => 'required'
        ]);
        if ($request->email == $user->email) {
            $validated['email'] = $user->email;
        }
        if ($request->password == NULL) {
            $validated['password'] = $user->password;
        } else {
            $validated['password'] = Hash::make($request->password);
        }
        $user->update($validated);
        return redirect('/dashboard/admin')->with('sucUpdate', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        Admin::destroy($admin->id);
        return redirect('/dashboard/admin')
            ->with('success', 'Category deleted successfully');
    }
}
