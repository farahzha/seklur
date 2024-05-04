<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use App\Models\Pindah;
use App\Http\Requests\StorePindahRequest;
use App\Http\Requests\UpdatePindahRequest;
use Illuminate\Http\Request;

class PindahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pindah::latest()->filter( request( [ 'search' ] ) )->paginate( 10 );
        return view( 'dashboard.pindah.index', compact( 'data' ) );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Penduduk::pluck( 'nama', 'id' );
        return view( 'dashboard.pindah.create', compact( 'data' ) );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate( [
            'nama' => ['required'],
            'tanggal_pindah' => ['required'],
            'alasan' => ['required'],
        ] );

        $data = [
            'penduduk_id' => $request->nama,
            'tanggal_pindah' => $request->tanggal_pindah,
            'alasan' => $request->alasan,
        ];

        Pindah::create( $data );

        return redirect()->route( 'data-pindah.index' )->with( 'success', 'Data berhasil ditambahkan' );
    }

    /**
     * Display the specified resource.
     */
    public function show(Pindah $data_pindah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pindah $data_pindah)
    {
        $data = [ 
            'data_pindah' => $data_pindah,
            'penduduk'    => Penduduk::pluck( 'nama', 'id' ),
        ];
        return view( 'dashboard.pindah.edit', $data );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pindah $data_pindah)
    {
        $request->validate( [
            'nama' => ['required'],
            'tanggal_pindah' => ['required'],
            'alasan' => ['required'],
        ] );

        $data = [
            'penduduk_id' => $request->nama,
            'tanggal_pindah' => $request->tanggal_pindah,
            'alasan' => $request->alasan,
        ];

        $data_pindah->update( $data );

        return redirect()->route( 'data-pindah.index' )->with( 'success', 'Data berhasil diubah' );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pindah $data_pindah)
    {
        $data_pindah->delete();
        return redirect()->route( 'data-pindah.index' )->with( 'success', 'Data berhasil dihapus' );
    }
}
