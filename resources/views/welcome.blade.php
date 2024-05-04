@extends('components.layout')
@section('title', 'Login')
@section('content')
    <div class="flex items-center justify-center h-screen w-full">
        @if (session('success'))
            <div class="absolute bg-white w-96 h-96 shadow-lg rounded z-10">
                <div class="flex flex-col items-center gap-28">
                    <div class="flex flex-col items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="#019A01" class="w-44 h-44">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h1 class="text-3xl font-semibold">Login Berhasil</h1>
                    </div>
                    <div class="text-center">
                        <a href="{{ route('dashboard') }}"><button class="text-white bg-[#152A75] w-24 h-10 rounded">OK</button></a>
                    </div>
                </div>
            </div>
        @elseif (session('failed'))
            <div id="cancel-modal" class="absolute bg-white w-96 h-96 shadow-lg rounded z-10">
                <div class="flex flex-col items-center gap-28">
                    <div class="flex flex-col items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="#FE0000" class="w-44 h-44">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h1 class="text-3xl font-semibold">{{ session('failed') }}</h1>
                    </div>
                    <div class="text-center">
                        <button id="cancel" class="text-white bg-[#152A75] w-24 h-10 rounded">OK</button>
                    </div>
                </div>
            </div>
        @endif
        <div class="h-fit w-1/5 rounded-xl bg-white p-10 space-y-5 shadow-lg">
            <div class="flex justify-center">
                <img src="{{ asset('images/logo.png') }}" alt="" class="h-40 w-40">
            </div>
            <div class="text-center">
                <h1 class="text-xl font-semibold">Sistem Data Kependudukan</h1>
                <p>Kelurahan Bantarsoka</p>
            </div>
            <form class="flex flex-col w-full space-y-3" action="{{ route('login.authenticate') }}" method="post">
                @csrf
                <div class="relative w-100 h-100">
                    <div class="absolute right-0 p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="#675F5F" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="none" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                        </svg>
                    </div>
                    <input type="text" class="border-[0.5px] border-black w-full py-2 px-3 pr-10" name="username"
                        id="username" placeholder="Username" value="{{ old('username') }}">
                    @error('username')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="relative w-100 h-100">
                    <div class="absolute right-0 p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="#675F5F" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="none" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                        </svg>
                    </div>
                    <input type="password" class="border-[0.5px] border-black w-full py-2 px-3 pr-10" name="password"
                        id="password" placeholder="Password">
                    @error('username')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" id="tombol"
                    class="w-full py-2 border-[0.5px] border-black bg-[#4DA8CA] text-center">Login</button>
            </form>
        </div>
    </div>
    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#cancel').click(function() {
                    $('#cancel-modal').hide();
                })
            })
        </script>
    @endpush
@endsection
