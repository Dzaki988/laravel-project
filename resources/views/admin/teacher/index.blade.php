<x-admin.layout>
    <section class="bg-gray-50 p-3 dark:bg-gray-900 sm:p-5">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Teacher</h1>
                <p class="text-gray-500 dark:text-gray-400">Daftar guru.</p>
            </div>
            <div class="overflow-hidden rounded-lg bg-white shadow-md dark:bg-gray-800">
                <div class="flex justify-end p-4">
                    <a href="{{ route('admin.teacher.create') }}" class="rounded-lg bg-blue-700 px-4 py-2 text-sm font-medium text-white hover:bg-blue-800">+ Tambah Teacher</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400">
                        <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">No</th>
                                <th scope="col" class="px-4 py-3">Nama guru</th>
                                <th scope="col" class="px-4 py-3">NIP</th>
                                <th scope="col" class="px-4 py-3">Mata pelajaran</th>
                                <th scope="col" class="px-4 py-3">Mulai mengajar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($teachers as $teacher)
                                <tr class="border-b">
                                    <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-3 font-medium text-gray-900 dark:text-white">{{ $teacher->name }}</td>
                                    <td class="px-4 py-3">{{ $teacher->niy }}</td>
                                    <td class="px-4 py-3">{{ $teacher->subject?->name ?? '-' }}</td>
                                    <td class="px-4 py-3">{{ $teacher->start_date?->format('d/m/Y') }}</td>
                                </tr>
                            @empty
                                <tr><td colspan="5" class="px-4 py-8 text-center">Belum ada data teacher.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</x-admin.layout>