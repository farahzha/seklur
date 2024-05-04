@extends('components.layout')
@section('title', 'Kelola Laporan')
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

                    <h1 class="text-xl">Kelola Laporan</h1>
                </div>
                <div class="p-5">
                    <button id="print"
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

                        <p>Print</p>
                    </button>

                    <form action="/kelola-laporan/" class="flex justify-end">
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
                                    <div class="flex flex-col gap-5">
                                        <div class="flex items-center justify-between">
                                            <label for="desa" class="w-28">Desa</label>
                                            <label for="desa" class="w-auto">:</label>
                                            <input type="text" name="desa" id="desa" value="Bantarsoka"
                                                class="w-11/12 p-2 mx-2 border border-black" disabled>
                                        </div>
                                        <div class="flex items-center justify-between">
                                            <label for="kecamatan" class="w-28">Kecamatan</label>
                                            <label for="kecamatan" class="w-auto">:</label>
                                            <input type="text" name="kecamatan" id="kecamatan" value="Bantarsoka"
                                                class="w-11/12 p-2 mx-2 border border-black" disabled>
                                        </div>
                                        <div class="grid grid-cols-3 items-center gap-10">
                                            <div class="flex w-full items-center">
                                                <label for="tahun" class="w-28">Rentang Tanggal Awal</label>
                                                <label for="tahun" class="w-auto">:</label>
                                                <input onchange="tampilkanLaporan()" type="date" id="first-date"
                                                    class="flex-grow p-2 mx-2 border border-black">
                                            </div>
                                            <div class="flex w-full items-center">
                                                <label for="tahun" class="w-28">Rentang Tanggal Akhir</label>
                                                <label for="tahun" class="w-auto">:</label>
                                                <input onchange="tampilkanLaporan()" type="date" id="last-date"
                                                    class="flex-grow p-2 mx-2 border border-black">
                                            </div>
                                            <div class="flex w-full items-center justify-between">
                                                <label for="keterangan" class="">Keterangan</label>
                                                <label for="keterangan" class="w-auto">:</label>
                                                <select name="keterangan" id="keterangan"
                                                    class="w-8/12 p-2 mx-2 border border-black"
                                                    onchange="tampilkanLaporan()">
                                                    <option value="" class="hidden">Pilih Keterangan</option>
                                                    <option value="data-penduduk">Data Penduduk</option>
                                                    <option value="data-kartu-keluarga">Data Kartu Keluarga</option>
                                                    <option value="data-lahir">Data Lahir</option>
                                                    <option value="data-meninggal">Data Meninggal</option>
                                                    <option value="data-pendatang">Data Pendatang</option>
                                                    <option value="data-pindah">Data Pindah</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <table id="tabelLaporan"
                                        class="min-w-full border border-[#858383] text-center text-sm font-light dark:border-neutral-500 mt-10">
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#keterangan').on('change', function() {
                    var jenis = $(this).val();
                    $.ajax({
                        type: 'GET',
                        url: '/kelola-laporan/' + jenis,
                        success: function(data) {
                            // Ganti isi tabel dengan data yang diterima dari server
                            $('#tabelLaporan').html(data);
                        }
                    });
                });

                $('#print').on('click', function() {
                    // Ambil nilai jenis dari elemen dengan id 'keterangan'
                    var jenis = $('#keterangan').val();

                    // Buka jendela baru untuk mencetak
                    let printWindow = window.open('/print/' + jenis, '_blank');

                    // Setelah jendela baru dimuat, mulai mencetak
                    printWindow.onload = function() {
                        printWindow.print();
                    };
                });
            });

            function tampilkanLaporan() {
                var firstDate = $('#first-date').val();
                var lastDate = $('#last-date').val();
                var keterangan = $('#keterangan').val();

                $.ajax({
                    type: 'GET',
                    url: '/kelola-laporan/' + firstDate + '/' + lastDate + '/' + keterangan,
                    success: function(data) {
                        $('#tabelLaporan').html(data);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }

            // function tampilkanLaporan() {
            //     var tahun = $('#tahun').val();
            //     var bulan = $('#bulan').val();
            //     var keterangan = $('#keterangan').val();

            //     $.ajax({
            //         type: 'GET',
            //         url: '/kelola-laporan/' + tahun + '/' + bulan + '/' + keterangan,
            //         success: function(data) {
            //             $('#tabelLaporan').html(data);
            //         },
            //         error: function(error) {
            //             console.log(error);
            //         }
            //     });
            // }
        </script>
    @endpush
@endsection
