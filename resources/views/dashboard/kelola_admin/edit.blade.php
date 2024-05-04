@extends('components.layout')
@section('title', 'Ubah Data Admin')
@section('content')
    <div class="grid grid-cols-12 w-full h-screen">
        @include('components.sidebar')
        <div class="col-span-9 bg-slate-orange-200 p-5 space-y-20 bg-slate-200">
            @include('components.header')
            <form class="space-y-5 bg-white rounded-xl" action="{{ route('data-admin.update', $data_admin->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="bg-[#4DA8CA] py-2 px-4 rounded-xl items-center flex gap-2 rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
                        <path fill-rule="evenodd"
                            d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z"
                            clip-rule="evenodd" />
                    </svg>
                    <p>Tambah Data</p>
                </div>
                <div class="p-5 space-y-5">
                    <div>
                        <div class="flex gap-2 items-center w-full justify-between">
                            <p>Nama User</p>
                            <input name="nama" type="nama" class="w-3/4 border border-black py-2 px-4" placeholder="nama user" value="{{ $data_admin->name }}">
                        </div>
                        @error('nama')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <div class="flex gap-2 items-center w-full justify-between">
                            <p>Username</p>
                            <input name="username" type="text" class="w-3/4 border border-black py-2 px-4" placeholder="username" value="{{ $data_admin->username }}">
                        </div>
                        @error('username')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <div class="flex gap-2 items-center w-full justify-between">
                            <p>Password</p>
                            <input name="password" type="password" class="w-3/4 border border-black py-2 px-4" placeholder="password">
                        </div>
                        @error('password')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <div class="flex gap-2 items-center w-full justify-between">
                            <p>Kedudukan</p>
                            <select name="kedudukan" class="w-3/4 border border-black py-2 px-4">
                                <option value="{{ $data_admin->roles->id }}" class="hidden">{{ $data_admin->roles->kedudukan }}</option>
                                @foreach ($data_role as $kedudukan)
                                    <option value="{{ $kedudukan->id }}">{{ $kedudukan->kedudukan }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('kedudukan')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex items-center gap-5">
                        <button type="submit" class="bg-[#4DA8CA] p-2 rounded-lg">Simpan</button>
                        <a href="{{ route('data-admin.index') }}" class="bg-black/20 p-2 rounded-lg">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
