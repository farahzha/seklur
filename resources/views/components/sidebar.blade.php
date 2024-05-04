<div class="col-span-3">
    <div class="flex items-center pl-5 gap-5 bg-[#4DA8CA] py-5">
        <img src="{{ asset('images/logo.png') }}" alt="" height="80" width="80">
        <h1 class="text-2xl">Kelurahan Bantarsoka</h1>
    </div>
    <div class="space-y-10 bg-[#FFFDFD] h-full pt-5">
        <div class="space-y-5">
            <div class="flex items-center w-full gap-5 cursor-pointer px-5">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#675F5F" class="w-8 h-8">
                    <path fill-rule="evenodd"
                        d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z"
                        clip-rule="evenodd" />
                </svg>
                <div class="text-center">
                    <p class="text-lg">{{ auth()->user()->name }}</p>
                    <p class="bg-green-600 text-xs px-2 text-white rounded-2xl">{{ auth()->user()->roles->kedudukan }}
                    </p>
                </div>
            </div>
            <a href="{{ route('dashboard') }}"
                class="flex items-center w-full gap-5 cursor-pointer {{ request()->is('dashboard') ? 'active px-3' : 'px-5' }}">
                <svg width="30" height="30" viewBox="0 0 16 16" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M8.00002 1.5C3.85814 1.5 0.500017 4.89219 0.500017 9.08C0.496095 10.9292 1.16624 12.7164 2.38502 14.1072C2.42189 14.1478 2.45533 14.1884 2.4922 14.2256C2.78752 14.5 2.8772 14.5 3.11158 14.5C3.34595 14.5 3.50002 14.5 3.73439 14.2225C4.75002 13.02 6.31252 12.5 8.00002 12.5C9.68752 12.5 11.2522 13.0222 12.2656 14.2225C12.5 14.5 12.6506 14.5 12.8885 14.5C13.1263 14.5 13.2416 14.5 13.5078 14.2256C13.546 14.1866 13.5781 14.1478 13.615 14.1072C14.8338 12.7164 15.5039 10.9292 15.5 9.08C15.5 4.89219 12.1419 1.5 8.00002 1.5ZM7.50002 3.5H8.50002V5.5H7.50002V3.5ZM4.50002 9.5H2.50002V8.5H4.50002V9.5ZM5.17158 6.87875L3.75752 5.46438L4.46439 4.7575L5.87877 6.17156L5.17158 6.87875ZM8.70627 9.60625C8.64554 9.69041 8.57168 9.76427 8.48752 9.825C8.28433 9.96675 8.03345 10.0226 7.78931 9.98055C7.54517 9.93847 7.32748 9.8018 7.18348 9.6002C7.03949 9.39861 6.98081 9.14836 7.02018 8.90377C7.05954 8.65918 7.19379 8.43998 7.39377 8.29375L10 7L8.70627 9.60625ZM10.1213 6.17156L11.5356 4.7575L12.2425 5.46438L10.8285 6.87875L10.1213 6.17156ZM13.5 9.5H11.5V8.5H13.5V9.5Z"
                        fill="#675F5F" />
                </svg>

                <p class="text-lg">Dashboard</p>
            </a>
            <div id="kelola-data" class="space-y-3 cursor-pointer">
                <div
                    class="flex items-center w-full gap-5 justify-between {{ request()->is(['data-penduduk', 'data-penduduk/*', 'data-kartu-keluarga', 'data-kartu-keluarga/*']) ? 'active px-3 pr-5' : 'px-5' }}">
                    <div class="gap-5 flex relative">
                        <svg width="30" height="30" viewBox="0 0 15 15" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M2.34375 1.28906V13.7109C2.34375 13.8042 2.38079 13.8936 2.44672 13.9595C2.51265 14.0255 2.60207 14.0625 2.69531 14.0625H12.3047C12.3979 14.0625 12.4873 14.0255 12.5533 13.9595C12.6192 13.8936 12.6562 13.8042 12.6562 13.7109V1.28906C12.6562 1.19582 12.6192 1.1064 12.5533 1.04047C12.4873 0.974539 12.3979 0.9375 12.3047 0.9375H2.69531C2.60207 0.9375 2.51265 0.974539 2.44672 1.04047C2.38079 1.1064 2.34375 1.19582 2.34375 1.28906ZM7.96875 8.90625H4.6875V7.96875H7.96875V8.90625ZM10.3125 6.5625H4.6875V5.625H10.3125V6.5625ZM10.3125 4.21875H4.6875V3.28125H10.3125V4.21875Z"
                                fill="#675F5F" />
                        </svg>

                        <p class="text-lg">Kelola Data</p>
                    </div>
                    <svg width="25" height="25" viewBox="0 0 14 14" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M8.80318 2.67945L4.34287 6.50156C4.27101 6.56317 4.21333 6.63959 4.17379 6.72558C4.13424 6.81158 4.11377 6.90511 4.11377 6.99976C4.11377 7.09441 4.13424 7.18794 4.17379 7.27394C4.21333 7.35993 4.27101 7.43636 4.34287 7.49796L8.80318 11.3201C9.22892 11.6848 9.88654 11.3824 9.88654 10.8219V3.17656C9.88654 2.61601 9.22892 2.31359 8.80318 2.67945Z"
                            fill="#675F5F" />
                    </svg>

                </div>
                <div id="kelola-data-modal"
                    class=" pl-6 space-y-4 {{ request()->is(['data-penduduk', 'data-penduduk/*', 'data-kartu-keluarga', 'data-kartu-keluarga/*']) ? '' : 'hidden' }}">
                    <a href="{{ route('data-penduduk.index') }}" class="flex gap-4 items-center">
                        <div
                            class="h-5 w-5 rounded-full {{ request()->is(['data-penduduk', 'data-penduduk/*']) ? 'bg-[#675F5F]' : 'border border-[#675F5F]' }}">
                        </div>
                        <p>Data Penduduk</p>
                    </a>
                    <a href="{{ route('data-kartu-keluarga.index') }}" class="flex gap-4 items-center">
                        <div
                            class="h-5 w-5 rounded-full {{ request()->is(['data-kartu-keluarga', 'data-kartu-keluarga/*']) ? 'bg-[#675F5F]' : 'border border-[#675F5F]' }}">
                        </div>
                        <p>Data Kartu Keluarga</p>
                    </a>
                </div>
            </div>
            <div id="sirkulasi-penduduk" class="space-y-3 cursor-pointer">
                <div
                    class="flex items-center w-full gap-5 cursor-pointer justify-between  {{ request()->is(['data-lahir', 'data-lahir/*', 'data-meninggal', 'data-meninggal/*', 'data-pendatang', 'data-pendatang/*', 'data-pindah', 'data-pindah/*']) ? 'active px-3 pr-5' : 'px-5' }}">
                    <div class="gap-5 flex">
                        <svg width="30" height="30" viewBox="0 0 16 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.5 1L0.5 5H9.53469L12.0416 1H2.5Z" fill="#675F5F" />
                            <path
                                d="M15.4998 4.5L13.2498 1L9.31227 7.22125C8.46218 6.92597 7.53735 6.92597 6.68727 7.22125L5.92258 6H1.36914L4.07727 10.2153C3.96083 10.7958 3.97469 11.3948 4.11784 11.9692C4.26099 12.5437 4.52986 13.0792 4.90505 13.5371C5.28024 13.995 5.7524 14.3639 6.28746 14.6173C6.82252 14.8706 7.40714 15.002 7.99914 15.002C8.59114 15.002 9.17576 14.8706 9.71082 14.6173C10.2459 14.3639 10.718 13.995 11.0932 13.5371C11.4684 13.0792 11.7373 12.5437 11.8804 11.9692C12.0236 11.3948 12.0374 10.7958 11.921 10.2153L15.4998 4.5ZM7.99977 13.1875C7.56712 13.1875 7.14419 13.0592 6.78446 12.8188C6.42472 12.5785 6.14435 12.2368 5.97878 11.8371C5.81321 11.4374 5.76989 10.9976 5.8543 10.5732C5.9387 10.1489 6.14704 9.75913 6.45297 9.4532C6.7589 9.14728 7.14867 8.93894 7.57301 8.85453C7.99734 8.77013 8.43717 8.81345 8.83689 8.97901C9.2366 9.14458 9.57824 9.42496 9.81861 9.78469C10.059 10.1444 10.1873 10.5674 10.1873 11C10.1866 11.58 9.95592 12.136 9.54583 12.5461C9.13574 12.9562 8.57972 13.1868 7.99977 13.1875Z"
                                fill="#675F5F" />
                            <path
                                d="M8 12C8.55228 12 9 11.5523 9 11C9 10.4477 8.55228 10 8 10C7.44772 10 7 10.4477 7 11C7 11.5523 7.44772 12 8 12Z"
                                fill="#675F5F" />
                        </svg>

                        <p class="text-lg">Sirkulasi Penduduk</p>
                    </div>
                    <svg width="25" height="25" viewBox="0 0 14 14" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M8.80318 2.67945L4.34287 6.50156C4.27101 6.56317 4.21333 6.63959 4.17379 6.72558C4.13424 6.81158 4.11377 6.90511 4.11377 6.99976C4.11377 7.09441 4.13424 7.18794 4.17379 7.27394C4.21333 7.35993 4.27101 7.43636 4.34287 7.49796L8.80318 11.3201C9.22892 11.6848 9.88654 11.3824 9.88654 10.8219V3.17656C9.88654 2.61601 9.22892 2.31359 8.80318 2.67945Z"
                            fill="#675F5F" />
                    </svg>
                </div>

                <div id="sirkulasi-penduduk-modal"
                    class="pl-6 space-y-4 {{ request()->is(['data-lahir', 'data-lahir/*', 'data-meninggal', 'data-meninggal/*', 'data-pendatang', 'data-pendatang/*', 'data-pindah', 'data-pindah/*']) ? '' : 'hidden' }}">
                    <a href="{{ route('data-lahir.index') }}" class="flex gap-4 items-center">
                        <div
                            class="h-5 w-5 rounded-full {{ request()->is(['data-lahir', 'data-lahir/*']) ? 'bg-[#675F5F]' : 'border border-[#675F5F]' }}">
                        </div>
                        <p>Data Lahir</p>
                    </a>
                    <a href="{{ route('data-meninggal.index') }}" class="flex gap-4 items-center">
                        <div
                            class="h-5 w-5 rounded-full {{ request()->is(['data-meninggal', 'data-meninggal/*']) ? 'bg-[#675F5F]' : 'border border-[#675F5F]' }}">
                        </div>
                        <p>Data Meninggal</p>
                    </a>
                    <a href="{{ route('data-pendatang.index') }}" class="flex gap-4 items-center">
                        <div
                            class="h-5 w-5 rounded-full {{ request()->is(['data-pendatang', 'data-pendatang/*']) ? 'bg-[#675F5F]' : 'border border-[#675F5F]' }}">
                        </div>
                        <p>Data Pendatang</p>
                    </a>
                    <a href="{{ route('data-pindah.index') }}" class="flex gap-4 items-center">
                        <div
                            class="h-5 w-5 rounded-full {{ request()->is(['data-pindah', 'data-pindah/*']) ? 'bg-[#675F5F]' : 'border border-[#675F5F]' }}">
                        </div>
                        <p>Data Pindah</p>
                    </a>
                </div>
            </div>
            @if (auth()->user()->roles->kedudukan == 'Administrator')
                <a href="{{ route('kelola-laporan') }}"
                    class="flex items-center w-full gap-5 cursor-pointer {{ request()->is('kelola-laporan') ? 'active px-3' : 'px-5' }}">
                    <svg width="30" height="30" viewBox="0 0 15 15" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_1_134)">
                            <path
                                d="M13.7109 3.28125H12.1875V12.1875C12.1875 12.4361 12.2863 12.6746 12.4621 12.8504C12.6379 13.0262 12.8764 13.125 13.125 13.125C13.3736 13.125 13.6121 13.0262 13.7879 12.8504C13.9637 12.6746 14.0625 12.4361 14.0625 12.1875V3.63281C14.0625 3.53957 14.0255 3.45015 13.9595 3.38422C13.8936 3.31829 13.8042 3.28125 13.7109 3.28125Z"
                                fill="#675F5F" />
                            <path
                                d="M12.6313 13.9966C12.2348 13.8878 11.8849 13.6519 11.6354 13.3251C11.3859 12.9983 11.2505 12.5987 11.25 12.1875V1.28906C11.25 1.19582 11.213 1.1064 11.147 1.04047C11.0811 0.974539 10.9917 0.9375 10.8984 0.9375H1.28906C1.19582 0.9375 1.1064 0.974539 1.04047 1.04047C0.974539 1.1064 0.9375 1.19582 0.9375 1.28906V12.4219C0.9375 12.857 1.11035 13.2743 1.41803 13.582C1.7257 13.8896 2.143 14.0625 2.57812 14.0625H12.6226C12.6309 14.0628 12.639 14.06 12.6454 14.0547C12.6517 14.0493 12.6558 14.0418 12.6569 14.0335C12.658 14.0253 12.656 14.0169 12.6513 14.0101C12.6466 14.0033 12.6394 13.9985 12.6313 13.9966ZM2.8125 6.09375V3.28125H5.625V6.09375H2.8125ZM9.375 11.7188H2.8125V10.7812H9.375V11.7188ZM9.375 9.84375H2.8125V8.90625H9.375V9.84375ZM9.375 7.96875H2.8125V7.03125H9.375V7.96875ZM9.375 6.09375H6.5625V5.15625H9.375V6.09375ZM9.375 4.21875H6.5625V3.28125H9.375V4.21875Z"
                                fill="#675F5F" />
                        </g>
                        <defs>
                            <clipPath id="clip0_1_134">
                                <rect width="30" height="30" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                    <p class="text-lg">Kelola Laporan</p>
                </a>
            @endif
        </div>

        <div class="space-y-5">
            @if (auth()->user()->roles->kedudukan == 'Administrator')
                <a href="{{ route('data-admin.index') }}"
                    class="flex items-center w-full gap-5 cursor-pointer {{ request()->is('data-admin') ? 'active px-3' : 'px-5' }}">
                    <svg width="30" height="30" viewBox="0 0 16 16" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M4.75 8C5.99264 8 7 6.99264 7 5.75C7 4.50736 5.99264 3.5 4.75 3.5C3.50736 3.5 2.5 4.50736 2.5 5.75C2.5 6.99264 3.50736 8 4.75 8Z"
                            fill="#675F5F" />
                        <path
                            d="M7.3125 9.25C6.4325 8.80312 5.46125 8.625 4.75 8.625C3.35687 8.625 0.5 9.47938 0.5 11.1875V12.5H5.1875V11.9978C5.1875 11.4041 5.4375 10.8087 5.875 10.3125C6.22406 9.91625 6.71281 9.54844 7.3125 9.25Z"
                            fill="#675F5F" />
                        <path d="M10.625 9C8.99781 9 5.75 10.005 5.75 12V13.5H15.5V12C15.5 10.005 12.2522 9 10.625 9Z"
                            fill="#675F5F" />
                        <path
                            d="M10.625 8C12.1438 8 13.375 6.76878 13.375 5.25C13.375 3.73122 12.1438 2.5 10.625 2.5C9.10622 2.5 7.875 3.73122 7.875 5.25C7.875 6.76878 9.10622 8 10.625 8Z"
                            fill="#675F5F" />
                    </svg>

                    <p class="text-lg">Kelola Admin</p>
                </a>
            @endif
            <button id="tombol" class="flex items-center w-full gap-5 cursor-pointer px-5">
                <svg width="30" height="30" viewBox="0 0 17 17" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M5.3125 7.96875H10.2056L8.08064 5.84375L8.83203 5.09236L12.2397 8.5L8.83203 11.9076L8.08064 11.1562L10.2056 9.03125H5.3125V13.9453C5.3125 14.051 5.35448 14.1523 5.4292 14.2271C5.50392 14.3018 5.60527 14.3438 5.71094 14.3438H15.5391C15.6447 14.3438 15.7461 14.3018 15.8208 14.2271C15.8955 14.1523 15.9375 14.051 15.9375 13.9453V3.05469C15.9375 2.94902 15.8955 2.84767 15.8208 2.77295C15.7461 2.69823 15.6447 2.65625 15.5391 2.65625H5.71094C5.60527 2.65625 5.50392 2.69823 5.4292 2.77295C5.35448 2.84767 5.3125 2.94902 5.3125 3.05469V7.96875Z"
                        fill="#675F5F" />
                    <path d="M5.3125 7.96875H1.0625V9.03125H5.3125V7.96875Z" fill="#675F5F" />
                </svg>

                <p class="text-lg">Logout</p>
            </button>
        </div>
    </div>
</div>
<div id="logout-modal" class="absolute z-10 flex w-full pt-10 items-center justify-center" style="display: none;">
    <div class="bg-white p-5 rounded shadow-md">
        <h1 class="mb-10">Apakah anda yakin akan keluar?</h1>
        <div class="flex gap-2 items-center justify-end">
            <a class="bg-[#4DA8CA] py-1 px-4 text-white" href="{{ route('logout') }}">Ok</a>
            <button id="cancel" class="text-[#4DA8CA]" href="">Cancel</button>
        </div>
    </div>
</div>


@push('scripts')
    <script>
        $(document).ready(function() {
            $("#kelola-data").click(function() {
                $("#kelola-data-modal").toggleClass("hidden");
            });

            $("#sirkulasi-penduduk").click(function() {
                $("#sirkulasi-penduduk-modal").toggleClass("hidden");
            });

            $("#kelola-laporan").click(function() {
                $("#kelola-laporan-modal").toggleClass("hidden");
            });

            $('#tombol').click(function() {
                $('#logout-modal').fadeIn("slow");
            });
            $('#cancel').click(function() {
                $('#logout-modal').fadeOut("slow");
            });
        });
    </script>
@endpush
