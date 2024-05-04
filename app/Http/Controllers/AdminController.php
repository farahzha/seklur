<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::latest()->filter( request( [ 'search' ] ) )->paginate( 10 );
        return view( 'dashboard.kelola_admin.index', compact( 'data' ) );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Role::all();
        return view( 'dashboard.kelola_admin.create', compact( 'data' ) );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( Request $request )
    {
        $request->validate( [ 
            'nama'      => 'required',
            'username'  => 'required|unique:users',
            'password'  => 'required',
            'kedudukan' => 'required',
        ] );

        $data = [ 
            'name'     => $request->nama,
            'username' => $request->username,
            'password' => $request->password,
            'roles_id' => $request->kedudukan,
        ];

        User::create( $data );

        return redirect()->route( 'data-admin.index' )->with( 'success', 'Data berhasil ditambahkan' );
    }

    /**
     * Display the specified resource.
     */
    public function show( User $data_admin )
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( User $data_admin )
    {
        $data = [ 
            'data_role'  => Role::all(),
            'data_admin' => $data_admin,
        ];
        return view( 'dashboard.kelola_admin.edit', $data );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request, User $data_admin )
    {
        $request->validate([
            'nama'      => ['required'],
            'username'  => ['required'],
            'password'  => ['required'],
            'kedudukan' => ['required'],
        ]);

        $data = [
            'name'     => $request->nama,
            'username' => $request->username,
            'password' => $request->password,
            'roles_id' => $request->kedudukan,
        ];

        $data_admin->update( $data );

        return redirect()->route( 'data-admin.index' )->with( 'success', 'Data berhasil diubah' );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( User $data_admin )
    {
        $data_admin->delete();
        return redirect()->route( 'data-admin.index' )->with( 'success', 'Data berhasil dihapus' );
    }
}
