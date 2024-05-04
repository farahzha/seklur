@extends('components.layout')
@section('title', 'Dashboard')
@section('content')
    <div class="grid grid-cols-12 w-full h-screen">
        @include('components.sidebar')
        <div class="col-span-9 p-5 space-y-20">
            @include('components.header')
            <div class="grid grid-cols-4 gap-5">
                <div class="text-center space-y-2 shadow-lg rounded-xl py-3 bg-white">
                    <div>
                        <h1 class="text-4xl jomolhari-text">{{ $penduduk }}</h1>
                        <p>Penduduk</p>
                    </div>
                    <div class="flex gap-2 justify-center text-xs items-center">
                        <a href="{{ route('data-penduduk.index') }}" class="flex items-center gap-1">
                            Selengkapnya
                            <svg width="16" height="16" viewBox="0 0 9 9" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="align-middle">
                                <path
                                    d="M9 4.5C9 2.01483 6.98517 0 4.5 0C2.01483 0 0 2.01483 0 4.5C0 6.98517 2.01483 9 4.5 9C6.98517 9 9 6.98517 9 4.5ZM4.15385 6.23272L5.52938 4.84615H2.29327V4.15385H5.52938L4.15385 2.76728L4.64517 2.27964L6.84822 4.5L4.64495 6.72036L4.15385 6.23272Z"
                                    fill="#675F5F" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="text-center space-y-2 shadow-lg rounded-xl py-3 bg-white">
                    <div>
                        <h1 class="text-4xl jomolhari-text">{{ $kartu_keluarga }}</h1>
                        <p>Kartu Keluarga</p>
                    </div>
                    <div class="flex gap-2 justify-center text-xs items-center">
                        <a href="{{ route('data-kartu-keluarga.index') }}" class="flex items-center gap-1">
                            Selengkapnya
                            <svg width="16" height="16" viewBox="0 0 9 9" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="align-middle">
                                <path
                                    d="M9 4.5C9 2.01483 6.98517 0 4.5 0C2.01483 0 0 2.01483 0 4.5C0 6.98517 2.01483 9 4.5 9C6.98517 9 9 6.98517 9 4.5ZM4.15385 6.23272L5.52938 4.84615H2.29327V4.15385H5.52938L4.15385 2.76728L4.64517 2.27964L6.84822 4.5L4.64495 6.72036L4.15385 6.23272Z"
                                    fill="#675F5F" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="text-center space-y-2 shadow-lg rounded-xl py-3 bg-white">
                    <div>
                        <h1 class="text-4xl jomolhari-text">{{ $laki_laki }}</h1>
                        <p>Laki-Laki</p>
                    </div>
                </div>
                <div class="text-center space-y-2 shadow-lg rounded-xl py-3 bg-white">
                    <div>
                        <h1 class="text-4xl jomolhari-text">{{ $perempuan }}</h1>
                        <p>Perempuan</p>
                    </div>
                </div>
                <div class="text-center space-y-2 shadow-lg rounded-xl py-3 bg-white">
                    <div>
                        <h1 class="text-4xl jomolhari-text">{{ $lahir }}</h1>
                        <p>Lahir</p>
                    </div>
                    <div class="flex gap-2 justify-center text-xs items-center">
                        <a href="{{ route('data-lahir.index') }}" class="flex items-center gap-1">
                            Selengkapnya
                            <svg width="16" height="16" viewBox="0 0 9 9" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="align-middle">
                                <path
                                    d="M9 4.5C9 2.01483 6.98517 0 4.5 0C2.01483 0 0 2.01483 0 4.5C0 6.98517 2.01483 9 4.5 9C6.98517 9 9 6.98517 9 4.5ZM4.15385 6.23272L5.52938 4.84615H2.29327V4.15385H5.52938L4.15385 2.76728L4.64517 2.27964L6.84822 4.5L4.64495 6.72036L4.15385 6.23272Z"
                                    fill="#675F5F" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="text-center space-y-2 shadow-lg rounded-xl py-3 bg-white">
                    <div>
                        <h1 class="text-4xl jomolhari-text">{{ $meninggal }}</h1>
                        <p>Meninggal</p>
                    </div>
                    <div class="flex gap-2 justify-center text-xs items-center">
                        <a href="{{ route('data-meninggal.index') }}" class="flex items-center gap-1">
                            Selengkapnya
                            <svg width="16" height="16" viewBox="0 0 9 9" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="align-middle">
                                <path
                                    d="M9 4.5C9 2.01483 6.98517 0 4.5 0C2.01483 0 0 2.01483 0 4.5C0 6.98517 2.01483 9 4.5 9C6.98517 9 9 6.98517 9 4.5ZM4.15385 6.23272L5.52938 4.84615H2.29327V4.15385H5.52938L4.15385 2.76728L4.64517 2.27964L6.84822 4.5L4.64495 6.72036L4.15385 6.23272Z"
                                    fill="#675F5F" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="text-center space-y-2 shadow-lg rounded-xl py-3 bg-white">
                    <div>
                        <h1 class="text-4xl jomolhari-text">{{ $pendatang }}</h1>
                        <p>Pendatang</p>
                    </div>
                    <div class="flex gap-2 justify-center text-xs items-center">
                        <a href="{{ route('data-pendatang.index') }}" class="flex items-center gap-1">
                            Selengkapnya
                            <svg width="16" height="16" viewBox="0 0 9 9" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="align-middle">
                                <path
                                    d="M9 4.5C9 2.01483 6.98517 0 4.5 0C2.01483 0 0 2.01483 0 4.5C0 6.98517 2.01483 9 4.5 9C6.98517 9 9 6.98517 9 4.5ZM4.15385 6.23272L5.52938 4.84615H2.29327V4.15385H5.52938L4.15385 2.76728L4.64517 2.27964L6.84822 4.5L4.64495 6.72036L4.15385 6.23272Z"
                                    fill="#675F5F" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="text-center space-y-2 shadow-lg rounded-xl py-3 bg-white">
                    <div>
                        <h1 class="text-4xl jomolhari-text">{{ $pindah }}</h1>
                        <p>Pindah</p>
                    </div>
                    <div class="flex gap-2 justify-center text-xs items-center">
                        <a href="{{ route('data-pindah.index') }}" class="flex items-center gap-1">
                            Selengkapnya
                            <svg width="16" height="16" viewBox="0 0 9 9" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="align-middle">
                                <path
                                    d="M9 4.5C9 2.01483 6.98517 0 4.5 0C2.01483 0 0 2.01483 0 4.5C0 6.98517 2.01483 9 4.5 9C6.98517 9 9 6.98517 9 4.5ZM4.15385 6.23272L5.52938 4.84615H2.29327V4.15385H5.52938L4.15385 2.76728L4.64517 2.27964L6.84822 4.5L4.64495 6.72036L4.15385 6.23272Z"
                                    fill="#675F5F" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
