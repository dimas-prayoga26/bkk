<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $user = User::query();
      if ($request->ajax()) {
        if ($request->role_id) $user->where('role_id', $request->role_id);
        return DataTables::of($user)->addIndexColumn()
                        //  ->editColumn('role.name', fn($data) => strtoupper($data->role->name))
                         ->addColumn('aksi', fn($data) => view('pages.user.aksi', ['data' => $data]))
                         ->make(true);
      }
      return view('pages.user.index',[
        'user' => $user,
        // 'role' => Role::select('id','name')->get(),
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.user.create',[
          'role' => Role::get(),
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
      $request->validate([
        'name' => 'required',
        'email' => 'required|unique:users,email',
        'role_id' => 'required|exists:roles,id',
        'password' => 'required',
      ]);

      User::create($request->all());
      return redirect(route('user.index'))->withSuccess('Data User berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
      return view('pages.user.show',[
        'user' => $user,
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
      return view('pages.user.edit',[
        'role' => Role::get(),
        'user' => $user,
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
      $request->validate([
        'name' => 'required',
        'email' => 'required|unique:users,email,'. $user->id,
        'role_id' => 'required|exists:roles,id',
        'password' => 'nullable',
      ]);

      filled($request->password)
            ? $user->update($request->all())
            : $user->update($request->except('password'));

      return redirect(route('user.index'))->withSuccess('Data User berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
      $user->delete();
      return response()->json(['success' => 'Data berhasil dihapus!']);
    }
}
