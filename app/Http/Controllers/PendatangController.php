<?php

namespace App\Http\Controllers;

use App\Models\Pendatang;
use App\Http\Requests\StorePendatangRequest;
use App\Http\Requests\UpdatePendatangRequest;
use App\Models\Penduduk;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PendatangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pendatang::latest()->filter( request( [ 'search' ] ) )->paginate( 10 );
        return view( 'dashboard.pendatang.index', compact( 'data' ) );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Penduduk::pluck('nama', 'id');
        return view( 'dashboard.pendatang.create', compact('data') );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate( [
            'nik' => ['required', 'unique:pendatangs,nik' ],
            'nama' => ['required'],
            'jk' => ['required'],
            'tanggal_datang' => ['required'],
            'pelapor' => ['required'],
        ] );

        $data = [
            'nik' => $request->nik,
            'nama' => $request->nama,
            'jk' => $request->jk,
            'tanggal_datang' => $request->tanggal_datang,
            'penduduk_id' => $request->pelapor,
        ];

        Pendatang::create( $data );

        return redirect()->route( 'data-pendatang.index' )->with( 'success', 'Data berhasil ditambahkan' );
    }

    /**
     * Display the specified resource.
     */
    public function show(Pendatang $data_pendatang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pendatang $data_pendatang)
    {
        $data = [ 
            'data_pendatang' => $data_pendatang,
            'data_penduduk'  => Penduduk::pluck( 'nama', 'id' ),
        ];
        return view( 'dashboard.pendatang.edit', $data );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pendatang $data_pendatang)
    {
        $request->validate( [
            'nik' => ['required'],
            'nama' => ['required'],
            'jk' => ['required'],
            'tanggal_datang' => ['required'],
            'pelapor' => ['required'],
        ] );

        $data = [
            'nik' => $request->nik,
            'nama' => $request->nama,
            'jk' => $request->jk,
            'tanggal_datang' => $request->tanggal_datang,
            'penduduk_id' => $request->pelapor,
        ];

        $data_pendatang->update( $data );

        return redirect()->route( 'data-pendatang.index' )->with( 'success', 'Data berhasil diubah' );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pendatang $data_pendatang): RedirectResponse
    {
        $data_pendatang->delete();
        return redirect()->route( 'data-pendatang.index' )->with( 'success', 'Data berhasil dihapus' );
    }
}
