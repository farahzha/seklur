@extends('components.layout')
@section('title', 'Anggota KK')
@section('content')
    <div class="grid grid-cols-12 w-full h-screen">
        @include('components.sidebar')
        <div class="col-span-9 p-5 space-y-20">
            @include('components.header')
            @if (session('success'))
                <div class="absolute top-0 bg-green-300 text-green-700 rounded p-3">
                    <h1> {{ session('success') }} </h1>
                </div>
            @elseif(session('error'))
                <div class="absolute top-0 bg-red-300 text-red-700 rounded p-3">
                    <h1> {{ session('error') }} </h1>
                </div>
            @endif
            <div class="bg-white space-y-5 shadow-md">
                <div class="space-y-5 rounded-xl">
                    <div class="bg-[#4DA8CA] p-5 rounded-xl items-center flex gap-2 rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="#675F5F" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="#675F5F" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                        </svg>
                        <h1 class="text-xl">Anggota KK</h1>
                    </div>
                    <form action="{{ route('data-kartu-keluarga.tambah-anggota') }}" method="post" class="p-5 space-y-5">
                        @csrf
                        <div>
                            <div class="flex gap-2 items-center w-full justify-between">
                                <p>No KK | Kpl Keluarga</p>
                                <input type="hidden" name="kartu_keluarga_id" value="{{ $data_kartu_keluarga->id }}">
                                <input type="text" class="w-3/4 border border-black py-2 px-4"
                                    value="{{ $data_kartu_keluarga->no_kk . ' | ' . $data_kartu_keluarga->penduduk->nama }}"
                                    disabled>
                            </div>
                            @error('kartu_keluarga_id')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <div class="flex gap-2 items-center w-full justify-between">
                                <p>Alamat</p>
                                <input type="text" class="w-3/4 border border-black py-2 px-4"
                                    value="{{ $data_kartu_keluarga->alamat }}" disabled>
                            </div>
                            @error('alamat')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <div class="flex gap-2 items-center w-full">
                                <p class="flex-auto">Anggota</p>
                                <select name="anggotaKeluarga" id="" class="w-1/3 border border-black py-2 px-4">
                                    <option value="" class="hidden">-Pilih Penduduk-</option>
                                    @foreach ($penduduk as $id => $nama)
                                        <option value="{{ $id }}">{{ $nama }}</option>
                                    @endforeach
                                </select>
                                @error('anggotaKeluarga')
                                    <p class="text-red-500">{{ $message }}</p>
                                @enderror
                                <select name="status" id="" class="w-1/3 border border-black py-2 px-4">
                                    <option value="" class="hidden">-Pilih Hub.Keluarga-</option>
                                    @if ($data_kartu_keluarga->nik == $data_kartu_keluarga->nik)
                                        <option value="Kepala Keluarga" class="hidden">Kepala Keluarga</option>
                                    @else
                                        <option value="Kepala Keluarga">Kepala Keluarga</option>
                                    @endif
                                    <option value="Suami">Suami</option>
                                    <option value="Istri">Istri</option>
                                    <option value="Anak">Anak</option>
                                    <option value="Menantu">Menantu</option>
                                    <option value="Cucu">Cucu</option>
                                    <option value="Orang Tua">Orang Tua</option>
                                    <option value="Mertua">Mertua</option>
                                    <option value="Famili Lain">Famili Lain</option>
                                    <option value="Pembantu">Pembantu</option>
                                    <option value="Lainnya">lainnya</option>
                                </select>
                                <button class="py-2 px-5 bg-green-600 text-white" type="submit">Tambah</button>
                                @error('status')
                                    <p class="text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </form>
                    <div class="p-5">
                        <table class="min-w-full text-center">
                            <thead class="border border-black">
                                <tr>
                                    <th class="border border-black">NIK</th>
                                    <th class="border border-black">Nama</th>
                                    <th class="border border-black">JK</th>
                                    <th class="border border-black">Hub Keluarga</th>
                                    <th class="border border-black">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-[#ECECEC] border border-black">
                                @foreach ($anggota_keluarga as $ak) 
                                    <tr>
                                        <td class="border border-black">{{ $ak->penduduk->nik }}</td>
                                        <td class="border border-black">{{ $ak->penduduk->nama }}</td>
                                        <td class="border border-black">
                                            @if ($ak->penduduk->jk == 'l')
                                                Laki-Laki
                                            @else
                                                Perempuan
                                            @endif
                                        </td>
                                        <td class="border border-black">{{ $ak->status }}</td>
                                        <td class="p-2 border border-black">
                                            <form action="{{ route('anggota-keluarga.destroy', $ak->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"><svg xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                        stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="p-5">
                        <a href="{{ route('data-kartu-keluarga.index') }}"
                            class="bg-[#4DA8CA] p-2"><button>Kembali</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
