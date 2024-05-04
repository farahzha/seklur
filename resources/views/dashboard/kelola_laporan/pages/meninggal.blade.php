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
            Tanggal
        </th>
        <th scope="col" class="border-r px-4 py-2 dark:border-neutral-500">
            Sebab
        </th>
    </tr>
</thead>
<tbody class="bg-[#ECECEC]">
    @foreach ($data as $d)
        <tr class="border-b dark:border-neutral-500">
            <td class="whitespace-nowrap border-r px-4 py-2 font-medium dark:border-neutral-500">
                {{ $loop->iteration }}
            </td>
            <td class="whitespace-nowrap border-r px-4 py-2 dark:border-neutral-500">
                {{ $d->penduduk->nik }}
            </td>
            <td class="whitespace-nowrap border-r px-4 py-2 dark:border-neutral-500">
                {{ $d->penduduk->nama }}
            </td>
            <td class="whitespace-nowrap border-r px-4 py-2 dark:border-neutral-500">
                {{ $d->tanggal }}
            </td>
            <td class="whitespace-nowrap border-r px-4 py-2 dark:border-neutral-500">
                {{ $d->keterangan }}
            </td>
        </tr>
    @endforeach
</tbody>
