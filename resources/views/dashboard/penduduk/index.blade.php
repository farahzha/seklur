@extends('components.layout')
@section('title', 'Data Penduduk')
@section('content')
    <div class="grid grid-cols-12 w-full h-screen">
        @include('components.sidebar')
        <div class="col-span-9 bg-slate-orange-200 p-5 space-y-20 bg-slate-200">
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
            <div class="space-y-5 bg-white rounded-xl">
                <div class="bg-[#4DA8CA] p-5 rounded-xl items-center flex gap-1 rounded-xl">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M1.125 16.0312C1.125 16.255 1.21389 16.4696 1.37213 16.6279C1.53036 16.7861 1.74497 16.875 1.96875 16.875H16.0312C16.255 16.875 16.4696 16.7861 16.6279 16.6279C16.7861 16.4696 16.875 16.255 16.875 16.0312V6.75H1.125V16.0312Z"
                            fill="#675F5F" />
                        <path
                            d="M16.875 3.08566C16.8749 2.97528 16.8529 2.86601 16.8103 2.76416C16.7678 2.6623 16.7055 2.56988 16.6271 2.4922C16.5486 2.41452 16.4556 2.35313 16.3534 2.31156C16.2511 2.26999 16.1416 2.24907 16.0312 2.25H14.0653V1.125H12.3778V2.25H5.62219V1.125H3.93469V2.25H1.96875C1.85837 2.24907 1.7489 2.26999 1.64664 2.31156C1.54438 2.35313 1.45135 2.41452 1.37292 2.4922C1.2945 2.56988 1.23221 2.6623 1.18966 2.76416C1.14711 2.86601 1.12514 2.97528 1.125 3.08566V5.0625H16.875V3.08566Z"
                            fill="#675F5F" />
                    </svg>

                    <h1 class="text-xl">Data Penduduk</h1>
                </div>
                <div class="p-5">
                    <a href="{{ route('data-penduduk.create') }}"
                        class="flex gap-1 items-center p-1 bg-[#4DA8CA] w-min rounded-lg whitespace-nowrap">
                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15.4184 1.63342C15.3517 1.56033 15.2709 1.5015 15.1809 1.46048C15.0909 1.41946 14.9935 1.3971 14.8945 1.39474C14.7956 1.39238 14.6973 1.41008 14.6054 1.44676C14.5135 1.48344 14.43 1.53835 14.3599 1.60818L13.752 2.21414L14.7872 3.24676L15.3849 2.65209C15.5209 2.51946 15.6003 2.33937 15.6066 2.1495C15.6128 1.95963 15.5454 1.7747 15.4184 1.63342Z"
                                fill="#675F5F" />
                            <path
                                d="M8.39242 11.1562H7.95182H6.90625H5.84375V10.0938V9.04818V8.60758L6.15586 8.29613L10.7425 3.71875H1.59375V15.4062H13.2812V6.25746L8.70387 10.8441L8.39242 11.1562Z"
                                fill="#675F5F" />
                            <path d="M13.2813 4.75322L14.3701 3.66217L13.3378 2.62988L12.2471 3.71861H13.2813V4.75322Z"
                                fill="#675F5F" />
                            <path d="M6.90625 10.0938H7.95182L13.2812 4.75336V3.71875H12.247L6.90625 9.04818V10.0938Z"
                                fill="#675F5F" />
                        </svg>

                        <p>Tambah Data</p>
                    </a>
                    <form action="{{ route('data-penduduk.index') }}" class="flex justify-end">
                        <div class="flex gap-2">
                            <p>Search:</p>
                            <input type="text" name="search" class="border border-black rounded-sm"
                                value="{{ request('search') }}">
                        </div>
                    </form>
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <table class="min-w-full border text-center text-sm font-light dark:border-neutral-500">
                                        <thead class="border-b font-medium dark:border-neutral-500">
                                            <tr>
                                                <th scope="col" class="border-r px-4 py-2 dark:border-neutral-500">
                                                    No
                                                </th>
                                                <th scope="col" class="border-r px-4 py-2 dark:border-neutral-500">
                                                    NIK
                                                </th>
                                                <th scope="col" class="border-r px-4 py-2 dark:border-neutral-500">
                                                    Nama
                                                </th>
                                                <th scope="col" class="border-r px-4 py-2 dark:border-neutral-500">
                                                    JK
                                                </th>
                                                <th scope="col" class="border-r px-4 py-2 dark:border-neutral-500">
                                                    Alamat
                                                </th>
                                                <th scope="col" class="border-r px-4 py-2 dark:border-neutral-500">
                                                    No KK
                                                </th>
                                                <th scope="col" class="border-r px-4 py-2 dark:border-neutral-500">
                                                    Aksi
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-[#ECECEC]">
                                            @foreach ($data as $d => $item)
                                                <tr class="border-b dark:border-neutral-500">
                                                    <td
                                                        class="whitespace-nowrap border-r px-4 py-2 font-medium dark:border-neutral-500">
                                                        {{ $data->firstItem() + $d }}
                                                    </td>
                                                    <td
                                                        class="whitespace-nowrap border-r px-4 py-2 dark:border-neutral-500">
                                                        {{ $item->nik }}
                                                    </td>
                                                    <td
                                                        class="whitespace-nowrap border-r px-4 py-2 dark:border-neutral-500">
                                                        {{ $item->nama }}
                                                    </td>
                                                    <td
                                                        class="whitespace-nowrap border-r px-4 py-2 dark:border-neutral-500">
                                                        @if ($item->jk == 'l')
                                                            Laki-Laki
                                                        @else
                                                            Perempuan
                                                        @endif
                                                    </td>
                                                    <td
                                                        class="whitespace-nowrap border-r px-4 py-2 dark:border-neutral-500">
                                                        {{ $item->alamat }}
                                                    </td>
                                                    <td
                                                        class="whitespace-nowrap border-r px-4 py-2 dark:border-neutral-500">
                                                        {{ $item->no_kk }}
                                                    </td>
                                                    <td
                                                        class="whitespace-nowrap border-r px-4 py-2 dark:border-neutral-500 flex gap-3 justify-center">
                                                        <a href="{{ route('data-penduduk.show', $item->id) }}"
                                                            class="cursor-pointer">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                                fill="currentColor" class="w-4 h-4">
                                                                <path fill-rule="evenodd"
                                                                    d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z"
                                                                    clip-rule="evenodd" />
                                                            </svg>
                                                        </a>
                                                        <a href={{ route('data-penduduk.edit', $item->id) }}
                                                            class="cursor-pointer">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                                fill="currentColor" class="w-4 h-4">
                                                                <path
                                                                    d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                                                                <path
                                                                    d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                                                            </svg>
                                                        </a>
                                                        <form action="{{ route('data-penduduk.destroy', $item->id) }}"
                                                            method="post" class="cursor-pointer">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"><svg xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                                                    <path fill-rule="evenodd"
                                                                        d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z"
                                                                        clip-rule="evenodd" />
                                                                </svg></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                    <div class="mt-5">
                                        {{ $data->appends(request()->except('page'))->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
