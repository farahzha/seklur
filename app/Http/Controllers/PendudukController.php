<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PendudukController extends Controller
{
    public function index()
    {
        $data = Penduduk::latest()->filter( request( [ 'search' ] ) )->paginate( 10 );
        return view('dashboard.penduduk.index', compact('data'));
    }

    public function create(): View
    {
        return view('dashboard.penduduk.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nik' => 'required|unique:penduduks,nik',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
            'status_perkawinan' => 'required',
            'pekerjaan' => 'required',
        ]);

        Penduduk::create($request->all());

        return redirect()->route('data-penduduk.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function show(Penduduk $data_penduduk): View
    {
        return view('dashboard.penduduk.show', compact('data_penduduk'));
    }
    public function edit(Penduduk $data_penduduk): View
    {
        return view('dashboard.penduduk.edit', compact('data_penduduk'));
    }

    public function update(Request $request, Penduduk $data_penduduk): RedirectResponse
    {
        $request->validate([
            'nik' => 'required|unique:penduduks,nik,' . $data_penduduk->nik . ',nik',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
            'status_perkawinan' => 'required',
            'pekerjaan' => 'required',
        ]);

        $data_penduduk->update($request->all());

        return redirect()->route('data-penduduk.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy(Penduduk $data_penduduk): RedirectResponse
    {
        $data_penduduk->delete();
        return redirect()->route('data-penduduk.index')->with('success', 'Data berhasil dihapus');
    }
}
