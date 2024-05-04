<thead class="border-b font-medium dark:border-neutral-500">
    <tr>
        <th scope="col" class="border-r px-4 py-2 dark:border-neutral-500">
            No
        </th>
        <th scope="col" class="border-r px-4 py-2 dark:border-neutral-500">
            Nama
        </th>
        <th scope="col" class="border-r px-4 py-2 dark:border-neutral-500">
            Tgl Lahir
        </th>
        <th scope="col" class="border-r px-4 py-2 dark:border-neutral-500">
            Jenis Kelamin
        </th>
        <th scope="col" class="border-r px-4 py-2 dark:border-neutral-500">
            Keluarga
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
                {{ $d->nama }}
            </td>
            <td class="whitespace-nowrap border-r px-4 py-2 dark:border-neutral-500">
                {{ $d->tanggal_lahir }}
            </td>
            <td class="whitespace-nowrap border-r px-4 py-2 dark:border-neutral-500">
                @if ($d->jenis_kelamin == 'l')
                    Laki-Laki
                @else
                    Perempuan
                @endif
            </td>
            <td class="whitespace-nowrap border-r px-4 py-2 dark:border-neutral-500">
                {{ $d->kartuKeluarga->penduduk->nama }}
            </td>
        </tr>
    @endforeach
</tbody>
