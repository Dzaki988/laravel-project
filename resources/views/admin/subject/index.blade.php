<x-admin.layout>
    <section class="bg-gray-50 p-3 dark:bg-gray-900 sm:p-5">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Subject</h1>
                <p class="text-gray-500 dark:text-gray-400">Daftar mata pelajaran.</p>
            </div>
            <div class="overflow-hidden rounded-lg bg-white shadow-md dark:bg-gray-800">
                <div class="flex justify-end p-4">
                    <a href="{{ route('admin.subject.create') }}" class="rounded-lg bg-blue-700 px-4 py-2 text-sm font-medium text-white hover:bg-blue-800">+ Tambah Subject</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400">
                        <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">No</th>
                                <th scope="col" class="px-4 py-3">Nama mata pelajaran</th>
                                <th scope="col" class="px-4 py-3">Kode mata pelajaran</th>
                                <th scope="col" class="px-4 py-3">Nama guru</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($subjects as $subject)
                                <tr class="border-b">
                                    <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-3 font-medium text-gray-900 dark:text-white">{{ $subject->name }}</td>
                                    <td class="px-4 py-3">{{ $subject->id }}</td>
                                    <td class="px-4 py-3">{{ $subject->teacher?->name ?? 'Belum ditugaskan' }}</td>
                                </tr>
                            @empty
                                <tr><td colspan="4" class="px-4 py-8 text-center">Belum ada data subject.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</x-admin.layout>