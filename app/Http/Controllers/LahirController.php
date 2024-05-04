<?php

namespace App\Http\Controllers;

use App\Models\KartuKeluarga;
use App\Models\Lahir;
use App\Http\Requests\StoreLahirRequest;
use App\Http\Requests\UpdateLahirRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LahirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Lahir::latest()->filter( request( [ 'search' ] ) )->paginate( 10 );
        return view( 'dashboard.lahir.index', compact( 'data' ) );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = KartuKeluarga::with('penduduk')->get();
        return view( 'dashboard.lahir.create', compact('data') );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( Request $request ): RedirectResponse
    {
        $request->validate( [ 
            'kartu_keluarga_id' => [ 'required' ],
            'nama'              => [ 'required' ],
            'tanggal_lahir'     => [ 'required' ],
            'jenis_kelamin'     => [ 'required' ],
        ] );

        $data = [
            'kartu_keluarga_id' => $request->kartu_keluarga_id,
            'nama'              => $request->nama,
            'tanggal_lahir'     => $request->tanggal_lahir,
            'jenis_kelamin'     => $request->jenis_kelamin,
        ];

        Lahir::create( $data );
        return redirect()->route( 'data-lahir.index' )->with( 'success', 'Data berhasil ditambahkan' );
    }

    /**
     * Display the specified resource.
     */
    public function show( Lahir $data_lahir )
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Lahir $data_lahir )
    {
        $data = [
            'data_lahir' => $data_lahir,
            'kartu_keluarga' => KartuKeluarga::with('penduduk')->get(),
        ];
        return view( 'dashboard.lahir.edit', $data );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request, Lahir $data_lahir )
    {
        $request->validate( [ 
            'kartu_keluarga_id' => [ 'required' ],
            'nama'              => [ 'required' ],
            'tanggal_lahir'     => [ 'required' ],
            'jenis_kelamin'     => [ 'required' ],
        ] );

        $data = [
            'kartu_keluarga_id' => $request->kartu_keluarga_id,
            'nama'              => $request->nama,
            'tanggal_lahir'     => $request->tanggal_lahir,
            'jenis_kelamin'     => $request->jenis_kelamin,
        ];

        $data_lahir->update( $data );

        return redirect()->route( 'data-lahir.index' )->with( 'success', 'Data berhasil diubah' );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Lahir $data_lahir )
    {
        $data_lahir->delete();
        return redirect()->route( 'data-lahir.index' )->with( 'success', 'Data berhasil dihapus' );
    }
}
