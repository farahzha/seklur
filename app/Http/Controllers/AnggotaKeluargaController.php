<?php

namespace App\Http\Controllers;

use App\Models\AnggotaKeluarga;
use App\Http\Requests\StoreAnggotaKeluargaRequest;
use App\Http\Requests\UpdateAnggotaKeluargaRequest;
use App\Models\KartuKeluarga;
use App\Models\Penduduk;

class AnggotaKeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    //    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAnggotaKeluargaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AnggotaKeluarga $anggotaKeluarga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AnggotaKeluarga $anggotaKeluarga)
    {
        $data = [
            'anggotaKeluarga' => $anggotaKeluarga,
            'penduduk' => Penduduk::pluck('nik', 'nama', 'jk'),
            'kartuKeluarga' => KartuKeluarga::pluck('no_kk', 'kepala_keluarga'),
        ];
        return view( 'dashboard.anggota_kk.anggota', $data );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAnggotaKeluargaRequest $request, AnggotaKeluarga $anggotaKeluarga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AnggotaKeluarga $anggotaKeluarga)
    {
        //
    }
}
