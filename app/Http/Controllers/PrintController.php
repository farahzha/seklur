<?php

namespace App\Http\Controllers;

use App\Models\KartuKeluarga;
use App\Models\Lahir;
use App\Models\Meninggal;
use App\Models\Pendatang;
use App\Models\Pindah;
use Illuminate\Http\Request;
use App\Models\Penduduk;

class PrintController extends Controller
{
    public function index($type)
    {
        if ($type === 'data-penduduk') {
            $data = Penduduk::all();
            return view('dashboard.penduduk.print', compact('data'));
        } else if($type === 'data-kartu-keluarga') {
            $data = KartuKeluarga::all();
            return view('dashboard.kartu_keluarga.print', compact('data'));
        } elseif ($type === 'data-lahir') {
            $data = Lahir::all();
            return view('dashboard.lahir.print', compact('data'));
        } elseif ($type === 'data-meninggal') {
            $data = Meninggal::all();
            return view( 'dashboard.meninggal.print', compact( 'data' ) );
        } elseif ($type === 'data-pendatang') {
            $data = Pendatang::all();
            return view( 'dashboard.pendatang.print', compact( 'data' ) );
        } elseif ($type === 'data-pindah') {
            $data = Pindah::all();
            return view( 'dashboard.pindah.print', compact( 'data' ) );
        }
    }
}
