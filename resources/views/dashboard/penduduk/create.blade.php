@extends('components.layout')
@section('title', 'Tambah Data Penduduk')
@section('content')
    <div class="grid grid-cols-12 w-full h-screen">
        @include('components.sidebar')

        <div class="col-span-9 bg-slate-orange-200 p-5 space-y-20 bg-slate-200">
            @include('components.header')
            <form class="space-y-5 bg-white rounded-xl" action="{{ route('data-penduduk.store') }}" method="POST">
                @csrf
                <div class="bg-[#4DA8CA] p-5 rounded-xl items-center flex gap-1 rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="18"
                        height="18">
                        <path fill-rule="evenodd"
                            d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z"
                            clip-rule="evenodd" />
                    </svg>
                    <h1 class="text-xl">Tambah Data</h1>
                </div>
                <div class="p-5 space-y-5">
                    <div>
                        <div class="flex gap-2 items-center w-full justify-between">
                            <p>NIK</p>
                            <input name="nik" type="number" class="w-3/4 border border-black py-2 px-4">
                        </div>
                        @error('nik')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <div class="flex gap-2 items-center w-full justify-between">
                            <p>Nama</p>
                            <input name="nama" type="text" class="w-3/4 border border-black py-2 px-4">
                        </div>
                        @error('nama')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <div class="flex gap-2 items-center w-full justify-between">
                            <p>TTL</p>
                            <div class="w-3/4 flex gap-3">
                                <input name="tempat_lahir" type="text" class="w-1/2 border border-black py-2 px-4">
                                <input name="tanggal_lahir" type="date" class="w-1/2 border border-black py-2 px-4">
                            </div>
                        </div>
                        @error('tempat_lahir')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                        @error('tanggal_lahir')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <div class="flex gap-2 items-center w-full justify-between">
                            <p>Jenis Kelamin</p>
                            <select name="jk" class="w-3/4 border border-black py-2 px-4">
                                <option value="l" class="hidden">-Pilih-</option>
                                <option value="l">Laki-Laki</option>
                                <option value="p">Perempuan</option>
                            </select>
                        </div>
                        @error('jk')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <div class="flex gap-2 items-center w-full justify-between">
                            <p>Alamat</p>
                            <input name="alamat" type="text" class="w-3/4 border border-black py-2 px-4">
                        </div>
                        @error('alamat')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <div class="flex gap-2 items-center w-full justify-between">
                            <p>Agama</p>
                            <select name="agama" type="text" class="w-3/4 border border-black py-2 px-4">
                                <option value="" class="hidden">-Pilih-</option>
                                <option value="islam">Islam</option>
                                <option value="kristen">Kristen</option>
                                <option value="katolik">Katolik</option>
                                <option value="hindu">Hindu</option>
                                <option value="buddha">Buddha</option>
                                <option value="khonghucu">Khonghucu</option>
                            </select>
                        </div>
                        @error('agama')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <div class="flex gap-2 items-center w-full justify-between">
                            <p>Status Perkawinan</p>
                            <select name="status_perkawinan" id="status_perkawinan"
                                class="w-3/4 border border-black py-2 px-4">
                                <option value="" class="hidden">-Pilih-</option>
                                <option value="sm">Sudah Menikah</option>
                                <option value="bm">Belum Menikah</option>
                                <option value="janda">Janda</option>
                                <option value="duda">Duda</option>
                            </select>
                        </div>
                        @error('status_perkawinan')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror

                    </div>
                    <div>
                        <div class="flex gap-2 items-center w-full justify-between">
                            <p>Pekerjaan</p>
                            <select name="pekerjaan" type="text" class="w-3/4 border border-black py-2 px-4">
                                <option value="" class="hidden">-Pilih-</option>
                                <option value="pns">PNS</option>
                                <option value="pelajar">Pelajar/Mahasiswa</option>
                                <option value="wirausaha">Wirausaha</option>
                                <option value="wiraswasta">Wiraswasta</option>
                                <option value="karyawan">Karyawan</option>
                                <option value="penganguran">Belum Bekerja</option>
                            </select>
                        </div>
                        @error('pekerjaan')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center gap-5">
                        <button type="submit" class="bg-[#4DA8CA] p-2 rounded-lg">Simpan</button>
                        <button class="bg-black/20 p-2 rounded-lg">Batal</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
