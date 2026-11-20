<x-admin.layout>
    <section class="flex min-h-[calc(100vh-7rem)] items-center justify-center p-4">
        <div class="w-full max-w-xl rounded-xl bg-white p-6 shadow-lg dark:bg-gray-800 sm:p-8">
            <div class="mb-6 flex items-start justify-between gap-4">
                <div>
                    <p class="mb-1 text-sm font-medium text-blue-600 dark:text-blue-400">Tambah data</p>
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Classroom</h1>
                </div>
                <a href="{{ route('admin.classroom.index') }}" class="rounded-lg p-2 text-gray-500 hover:bg-gray-100" aria-label="Kembali">&times;</a>
            </div>
            <form method="POST" action="{{ route('admin.classroom.store') }}">
                @csrf
                @if ($errors->any())
                    <div class="mb-5 rounded-lg border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                        @foreach ($errors->all() as $error)<p>{{ $error }}</p>@endforeach
                    </div>
                @endif
                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                    <div>
                        <label for="name" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Nama kelas</label>
                        <input id="name" name="name" type="text" value="{{ old('name') }}" required class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5">
                    </div>
                    <div>
                        <label for="major" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Jurusan</label>
                        <input id="major" name="major" type="text" value="{{ old('major') }}" required class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5">
                    </div>
                </div>
                <div class="mt-6 flex justify-end gap-3">
                    <a href="{{ route('admin.classroom.index') }}" class="rounded-lg border border-gray-300 px-4 py-2.5 text-sm font-medium">Batal</a>
                    <button type="submit" class="rounded-lg bg-blue-700 px-4 py-2.5 text-sm font-medium text-white">Simpan</button>
                </div>
            </form>
        </div>
    </section>
</x-admin.layout>
