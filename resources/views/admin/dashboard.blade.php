<x-admin.layout>
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-grey-900 dark:text-white">
            {{ $title }}
        </h1>

        <p class="text-white-700 dark:text-gray-400">
            {{ $content }}
        </p>
    </div>

    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-4">
        @foreach ([
            'Kelas' => $counts['classrooms'],
            'Siswa' => $counts['students'],
            'Mata Pelajaran' => $counts['subjects'],
            'Guru' => $counts['teachers'],
        ] as $label => $count)
            <div class="rounded-lg bg-white p-6 shadow dark:bg-gray-800">
                <p class="text-sm text-gray-500 dark:text-gray-400">{{ $label }}</p>
                <p class="mt-2 text-3xl font-bold text-gray-900 dark:text-white">{{ $count }}</p>
            </div>
        @endforeach
    </div>
</x-admin.layout>
