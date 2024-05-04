<?php

namespace App\Http\Controllers;

use App\Models\Meninggal;
use App\Http\Requests\StoreMeninggalRequest;
use App\Http\Requests\UpdateMeninggalRequest;
use App\Models\Penduduk;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MeninggalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Meninggal::latest()->filter( request( [ 'search' ] ) )->paginate( 10 );
        return view( 'dashboard.meninggal.index', compact( 'data' ) );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Penduduk::all();
        return view( 'dashboard.meninggal.create', compact( 'data' ) );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( Request $request )
    {
        // dd($request->all());
        $request->validate( [ 
            'nama'             => [ 'required', 'unique:meninggals,penduduk_id' ],
            'tanggal_kematian' => [ 'required' ],
            'penyebab'         => [ 'required' ],
        ] );

        $data = [ 
            'penduduk_id' => $request->nama,
            'tanggal'     => $request->tanggal_kematian,
            'keterangan'  => $request->penyebab,
        ];

        Meninggal::create( $data );
        return redirect()->route( 'data-meninggal.index' )->with( 'success', 'Data berhasil ditambahkan' );
    }

    /**
     * Display the specified resource.
     */
    public function show( Meninggal $data_meninggal )
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Meninggal $data_meninggal )
    {
        return view( 'dashboard.meninggal.edit', compact( 'data_meninggal' ) );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request, Meninggal $data_meninggal ): RedirectResponse
    {
        $request->validate( [ 
            'penduduk_id'      => [ 'required' ],
            'tanggal_kematian' => [ 'required' ],
            'penyebab'         => [ 'required' ],
        ] );

        $data = [ 
            'penduduk_id' => $request->penduduk_id,
            'tanggal'     => $request->tanggal_kematian,
            'keterangan'  => $request->penyebab,
        ];

        $data_meninggal->update( $data );

        return redirect()->route( 'data-meninggal.index' )->with( 'success', 'Data berhasil diubah' );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Meninggal $data_meninggal ): RedirectResponse
    {
        $data_meninggal->delete();
        return redirect()->route( 'data-meninggal.index' )->with( 'success', 'Data berhasil dihapus' );
    }
}
