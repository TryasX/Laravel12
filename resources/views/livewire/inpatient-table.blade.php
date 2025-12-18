<div
    x-data="{ openFilter: false }"
    class="p-6 bg-white rounded-2xl shadow-sm border border-gray-200"
>

    {{-- HEADER --}}
    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between mb-6">

        <h1 class="text-xl font-semibold text-gray-800">
            Pasien Dalam Perawatan
        </h1>

        <div class="relative w-80 group">
            {{-- ICON --}}
            <svg
                class="pointer-events-none absolute left-4 top-1/2 -translate-y-1/2
                    h-4 w-4 text-gray-400 transition-colors
                    group-focus-within:text-gray-500"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
            >
                <circle cx="11" cy="11" r="8" />
                <line x1="21" y1="21" x2="16.65" y2="16.65" />
            </svg>

            {{-- INPUT --}}
            <input
                type="text"
                wire:model.debounce.700ms="search"
                wire:model.live="search"
                placeholder="Cari No MR / Nama Pasien..."
                class="w-full rounded-2xl border border-gray-300
                    bg-white py-2.5 pl-11 pr-10 text-sm
                    focus:border-gray-400 focus:ring-0"
            />


            {{-- SPINNER --}}
            <div
                wire:loading.delay
                wire:target="search"
                class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 text-gray-400"
            >

                <svg class="h-4 w-4 animate-spin" viewBox="0 0 24 24" fill="none">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"/>
                </svg>
            </div>
        </div>


    </div>

    {{-- TABLE --}}
    <div class="overflow-hidden rounded-xl border border-gray-200">
        <table class="min-w-full text-sm text-gray-700">
            <thead class="bg-gray-50 text-xs uppercase text-gray-500">
                <tr>
                    <th class="px-4 py-3 text-left">No MR</th>
                    <th class="px-4 py-3 text-left">Nama Pasien</th>
                    <th class="px-4 py-3 text-left">Ruangan</th>
                    <th class="px-4 py-3 text-left">Dokter</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-100 bg-white">
                @forelse ($patients as $row)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-3 font-medium text-gray-900">
                            {{ $row->NoMR }}
                        </td>
                        <td class="px-4 py-3">
                            {{ $row->NamaPasien }}
                        </td>
                        <td class="px-4 py-3">
                            <span
                                class="inline-flex items-center rounded-lg
                                       bg-blue-50 px-2 py-1 text-xs
                                       font-medium text-blue-600"
                            >
                                {{ $row->Ruang }}
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            {{ $row->NamaDokter }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="py-8 text-center text-gray-400">
                            Data tidak ditemukan
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- PAGINATION --}}
    <div class="mt-4">
        {{ $patients->links() }}
    </div>

</div>
