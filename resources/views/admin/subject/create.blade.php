<x-admin.layout>
    <section class="flex min-h-[calc(100vh-7rem)] items-center justify-center p-4">
        <div class="w-full max-w-xl rounded-xl bg-white p-6 shadow-lg dark:bg-gray-800 sm:p-8">
            <div class="mb-6">
                <p class="mb-1 text-sm font-medium text-blue-600">Tambah data</p>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Subject</h1>
            </div>
            <form method="POST" action="{{ route('admin.subject.store') }}">
                @csrf
                @if ($errors->any())
                    <div class="mb-5 rounded-lg border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                        @foreach ($errors->all() as $error)<p>{{ $error }}</p>@endforeach
                    </div>
                @endif
                <label for="name" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Nama mata pelajaran</label>
                <input id="name" name="name" type="text" value="{{ old('name') }}" required class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5">
                <div class="mt-6 flex justify-end gap-3">
                    <a href="{{ route('admin.subject.index') }}" class="rounded-lg border border-gray-300 px-4 py-2.5 text-sm font-medium">Batal</a>
                    <button type="submit" class="rounded-lg bg-blue-700 px-4 py-2.5 text-sm font-medium text-white">Simpan</button>
                </div>
            </form>
        </div>
    </section>
</x-admin.layout>
