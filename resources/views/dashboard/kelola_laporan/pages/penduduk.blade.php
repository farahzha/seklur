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
            dibuat pada
        </th>
    </tr>
</thead>
<tbody class="bg-[#ECECEC]">
    @foreach ($data as $d => $item)
        <tr class="border-b dark:border-neutral-500">
            <td class="whitespace-nowrap border-r px-4 py-2 font-medium dark:border-neutral-500">
                {{ $loop->iteration }}
            </td>
            <td class="whitespace-nowrap border-r px-4 py-2 dark:border-neutral-500">
                {{ $item->nik }}
            </td>
            <td class="whitespace-nowrap border-r px-4 py-2 dark:border-neutral-500">
                {{ $item->nama }}
            </td>
            <td class="whitespace-nowrap border-r px-4 py-2 dark:border-neutral-500">
                @if ($item->jk == 'l')
                    Laki-Laki
                @else
                    Perempuan
                @endif
            </td>
            <td class="whitespace-nowrap border-r px-4 py-2 dark:border-neutral-500">
                {{ $item->alamat }}
            </td>
            <td class="whitespace-nowrap border-r px-4 py-2 dark:border-neutral-500">
                @if ($item->anggotaKeluarga)
                    {{ $item->anggotaKeluarga->kartuKeluarga->no_kk }}
                @else
                    Tidak ada kartu keluarga
                @endif
            </td>
            <td class="whitespace-nowrap border-r px-4 py-2 dark:border-neutral-500">
                {{ $item->created_at->format('d-m-Y') }}
            </td>
        </tr>
        @endforeach
</tbody>
