<?php

namespace App\Http\Controllers;

use App\Models\AnggotaKeluarga;
use App\Models\KartuKeluarga;
use App\Http\Requests\StoreKartuKeluargaRequest;
use App\Http\Requests\UpdateKartuKeluargaRequest;
use App\Models\Penduduk;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class KartuKeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $data = KartuKeluarga::latest()->filter( request( [ 'search' ] ) )->paginate( 10 );
        return view( 'dashboard.kartu_keluarga.index', compact( 'data' ) );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $penduduk = Penduduk::all();
        return view( 'dashboard.kartu_keluarga.create', compact( 'penduduk' ) );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( Request $request ): RedirectResponse
    {
        $request->validate( [ 
            'no_kk'           => [ 'required', 'unique:kartu_keluargas,no_kk' ],
            'kepala_keluarga' => [ 'required' ],
            'alamat'          => [ 'required' ],
            'kecamatan'       => [ 'required' ],
            'kabupaten'       => [ 'required' ],
            'provinsi'        => [ 'required' ],
        ] );

        $data = [ 
            'no_kk'     => $request->no_kk,
            'nik'       => $request->kepala_keluarga,
            'alamat'    => $request->alamat,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten,
            'provinsi'  => $request->provinsi,
        ];

        KartuKeluarga::create( $data );

        return redirect()->route( 'data-kartu-keluarga.index' )->with( 'success', 'Data berhasil ditambahkan' );
    }

    /**
     * Display the specified resource.
     */
    public function show( KartuKeluarga $data_kartu_keluarga )
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( KartuKeluarga $data_kartu_keluarga ): View
    {
        $data = [ 
            'data_kartu_keluarga' => $data_kartu_keluarga,
            'penduduk'            => Penduduk::pluck( 'nama', 'nik' ),
        ];
        return view( 'dashboard.kartu_keluarga.edit', $data );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request, KartuKeluarga $data_kartu_keluarga ): RedirectResponse
    {
        $request->validate( [ 
            'no_kk'           => [ 'required', 'unique:kartu_keluargas,no_kk,' . $data_kartu_keluarga->no_kk . ',no_kk' ],
            'kepala_keluarga' => [ 'required' ],
            'alamat'          => [ 'required' ],
            'kecamatan'       => [ 'required' ],
            'kabupaten'       => [ 'required' ],
            'provinsi'        => [ 'required' ],
        ] );

        $data = [ 
            'no_kk'           => $request->no_kk,
            'kepala_keluarga' => $request->kepala_keluarga,
            'alamat'          => $request->alamat,
            'kecamatan'       => $request->kecamatan,
            'kabupaten'       => $request->kabupaten,
            'provinsi'        => $request->provinsi,
        ];

        $data_kartu_keluarga->update( $data );

        return redirect()->route( 'data-kartu-keluarga.index' )->with( 'success', 'Data berhasil diubah' );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( KartuKeluarga $data_kartu_keluarga )
    {
        $data_kartu_keluarga->delete();
        return redirect()->route( 'data-kartu-keluarga.index' )->with( 'success', 'Data berhasil dihapus' );
    }

    // Anggota Keluarga

    public function anggotaKeluarga( KartuKeluarga $data_kartu_keluarga )
    {
        $anggotaKeluarga = $data_kartu_keluarga->anggotaKeluarga;
        $data = [ 
            'data_kartu_keluarga' => $data_kartu_keluarga,
            'penduduk'            => Penduduk::pluck( 'nama', 'id' ),
            'anggota_keluarga'    => $anggotaKeluarga,
        ];
        return view( 'dashboard.anggota_kk.anggota', $data );
    }

    public function tambahAnggota( Request $request )
    {
        $request->validate( [ 
            'kartu_keluarga_id' => [ 'required' ],
            'anggotaKeluarga'   => [ 'required' ],
            'status'            => [ 'required' ],
        ] );

        $data = [ 
            'kartu_keluarga_id' => $request->kartu_keluarga_id,
            'penduduk_id'            => $request->anggotaKeluarga,
            'status'            => $request->status,
        ];

        AnggotaKeluarga::create( $data );

        return redirect()->route( 'data-kartu-keluarga.anggota-kk', $request->kartu_keluarga_id )->with( 'success', 'Data berhasil ditambahkan' );
    }

    public function destroyAnggota(AnggotaKeluarga $anggota_keluarga) {
        $anggota_keluarga->delete();
        return redirect()->route( 'data-kartu-keluarga.index' )->with( 'success', 'Data berhasil dihapus' );
    }
}
