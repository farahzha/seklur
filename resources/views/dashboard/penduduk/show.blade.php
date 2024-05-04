@extends('components.layout')
@section('title', 'Lihat Data Penduduk')
@section('content')
    <div class="grid grid-cols-12 w-full h-screen">
        @include('components.sidebar')
        <div class="col-span-9 bg-slate-orange-200 p-5 space-y-20 bg-slate-200">
            @include('components.header')
            <div class="space-y-5 bg-white rounded-xl">
                <div class="bg-[#4DA8CA] p-5 rounded-xl items-center flex gap-2 rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="18" height="18">
                        <path fill-rule="evenodd"
                            d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z"
                            clip-rule="evenodd" />
                    </svg>
                    <h1 class="text-xl">Lihat Data</h1>
                </div>
                <div class="p-5 space-y-5">
                    <div class="grid grid-cols-6">
                        <p class="flex justify-between">NIK <span>:</span></p>
                        <p class="col-span-5 mx-5">{{ $data_penduduk->nik }}</p>
                    </div>
                    <div class="grid grid-cols-6">
                        <p class="flex justify-between">nama <span>:</span></p>
                        <p class="col-span-5 mx-5">{{ $data_penduduk->nama }}</p>
                    </div>
                    <div class="grid grid-cols-6">
                        <p class="flex justify-between">TTL <span>:</span></p>
                        <p class="col-span-5 mx-5">{{ $data_penduduk->tempat_lahir }}, {{ $data_penduduk->tanggal_lahir }}</p>
                    </div>
                    <div class="grid grid-cols-6">
                        <p class="flex justify-between">Jenis Kelamin <span>:</span></p>
                        <p class="col-span-5 mx-5">
                            @if ($data_penduduk->jk == 'l')
                                Laki-Laki
                            @else
                                Perempuan
                            @endif
                        </p>
                    </div>
                    <div class="grid grid-cols-6">
                        <p class="flex justify-between">Alamat <span>:</span></p>
                        <p class="col-span-5 mx-5">{{ $data_penduduk->alamat }}</p>
                    </div>
                    <div class="grid grid-cols-6">
                        <p class="flex justify-between">Agama <span>:</span></p>
                        <p class="col-span-5 mx-5">{{ $data_penduduk->agama }}</p>
                    </div>
                    <div class="grid grid-cols-6">
                        <p class="flex justify-between">Status Perkawinan <span>:</span></p>
                        <p class="col-span-5 mx-5">
                            @if ($data_penduduk->status_perkawinan == 'sm')
                                Sudah Menikah
                            @elseif ($data_penduduk->status_perkawinan == 'janda')
                                Janda
                            @elseif ($data_penduduk->status_perkawinan == 'duda')
                                Duda
                            @else
                                Belum Menikah
                            @endif
                        </p>
                    </div>
                    <div class="grid grid-cols-6">
                        <p class="flex justify-between">Pekerjaan <span>:</span></p>
                        <p class="col-span-5 mx-5">{{ $data_penduduk->pekerjaan }}</p>
                    </div>
                    <div class="bg-black/20 p-2 rounded-lg w-20 text-center">
                        <a class="" href="{{ route('data-penduduk.index') }}">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
