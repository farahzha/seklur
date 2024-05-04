<thead class="border-b font-medium dark:border-neutral-500">
    <tr>
        <th scope="col" class="border-r px-4 py-2 dark:border-neutral-500">
            No
        </th>
        <th scope="col" class="border-r px-4 py-2 dark:border-neutral-500">
            No KK
        </th>
        <th scope="col" class="border-r px-4 py-2 dark:border-neutral-500">
            Kepala Keluarga
        </th>
        <th scope="col" class="border-r px-4 py-2 dark:border-neutral-500">
            Alamat
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
                {{ $d->no_kk }}
            </td>
            <td class="whitespace-nowrap border-r px-4 py-2 dark:border-neutral-500">
                {{ $d->penduduk->nama }}
            </td>
            <td class="whitespace-nowrap border-r px-4 py-2 dark:border-neutral-500">
                {{ $d->alamat }}
            </td>
        </tr>
    @endforeach
</tbody>
