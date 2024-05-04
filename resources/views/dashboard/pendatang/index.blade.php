@extends('components.layout')
@section('title', 'Kelola Data')
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

                    <h1 class="text-xl">Data Pendatang</h1>
                </div>
                <div class="p-5">
                    <a href="{{ route('data-pendatang.create') }}"
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

                    <form action="{{ route('data-pendatang.index') }}" class="flex justify-end">
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
                                    <table
                                        class="min-w-full border border-[#858383] text-center text-sm font-light dark:border-neutral-500">
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
                                                    Jenis Kelamin
                                                </th>
                                                <th scope="col" class="border-r px-4 py-2 dark:border-neutral-500">
                                                    Tanggal
                                                </th>
                                                <th scope="col" class="border-r px-4 py-2 dark:border-neutral-500">
                                                    Pelapor
                                                </th>
                                                <th scope="col" class="border-r px-4 py-2 dark:border-neutral-500">
                                                    Aksi
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-[#ECECEC]">
                                            @foreach ($data as $d)
                                                <tr class="border-b dark:border-neutral-500">
                                                    <td
                                                        class="whitespace-nowrap border-r px-4 py-2 font-medium dark:border-neutral-500">
                                                        {{ $loop->iteration + $data->firstItem() - 1 }}
                                                    </td>
                                                    <td
                                                        class="whitespace-nowrap border-r px-4 py-2 dark:border-neutral-500">
                                                        {{ $d->nik }}
                                                    </td>
                                                    <td
                                                        class="whitespace-nowrap border-r px-4 py-2 dark:border-neutral-500">
                                                        {{ $d->nama }}
                                                    </td>
                                                    <td
                                                        class="whitespace-nowrap border-r px-4 py-2 dark:border-neutral-500">
                                                        @if ($d->jk == 'l')
                                                            Laki-Laki
                                                        @else
                                                            Perempuan
                                                        @endif
                                                    </td>
                                                    <td
                                                        class="whitespace-nowrap border-r px-4 py-2 dark:border-neutral-500">
                                                        {{ $d->tanggal_datang }}
                                                    </td>
                                                    <td
                                                        class="whitespace-nowrap border-r px-4 py-2 dark:border-neutral-500">
                                                        {{ $d->penduduk->nama }}
                                                    </td>
                                                    <td
                                                        class="whitespace-nowrap border-r px-4 py-2 dark:border-neutral-500 flex gap-3">
                                                        <a href="{{ route('data-pendatang.edit', $d->id) }}"
                                                            class="cursor-pointer">
                                                            <svg class="w-6 h-6" viewBox="0 0 17 17" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M15.4184 1.63342C15.3517 1.56033 15.2709 1.5015 15.1809 1.46048C15.0909 1.41946 14.9935 1.3971 14.8945 1.39474C14.7956 1.39238 14.6973 1.41008 14.6054 1.44676C14.5135 1.48344 14.43 1.53835 14.3599 1.60818L13.752 2.21414L14.7872 3.24676L15.3849 2.65209C15.5209 2.51946 15.6003 2.33937 15.6066 2.1495C15.6128 1.95963 15.5454 1.7747 15.4184 1.63342Z"
                                                                    fill="#675F5F" />
                                                                <path
                                                                    d="M8.39242 11.1562H7.95182H6.90625H5.84375V10.0938V9.04818V8.60758L6.15586 8.29613L10.7425 3.71875H1.59375V15.4062H13.2812V6.25746L8.70387 10.8441L8.39242 11.1562Z"
                                                                    fill="#675F5F" />
                                                                <path
                                                                    d="M13.2813 4.75322L14.3701 3.66217L13.3378 2.62988L12.2471 3.71861H13.2813V4.75322Z"
                                                                    fill="#675F5F" />
                                                                <path
                                                                    d="M6.90625 10.0938H7.95182L13.2812 4.75336V3.71875H12.247L6.90625 9.04818V10.0938Z"
                                                                    fill="#675F5F" />
                                                            </svg>
                                                        </a>
                                                        <form action="{{ route('data-pendatang.destroy', $d->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"><svg xmlns="http://www.w3.org/2000/svg"
                                                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor" class="w-6 h-6">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                                </svg></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{ $data->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
