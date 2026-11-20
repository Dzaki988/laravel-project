<x-admin.layout>
    <section class="flex min-h-[calc(100vh-7rem)] items-center justify-center p-4">
        <div class="w-full max-w-2xl rounded-xl bg-white p-6 shadow-lg dark:bg-gray-800 sm:p-8">
            <div class="mb-6 flex items-start justify-between gap-4">
                <div>
                    <p class="mb-1 text-sm font-medium text-blue-600 dark:text-blue-400">Tambah data</p>
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Student</h1>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Tambahkan data siswa baru.</p>
                </div>
                <a href="{{ route('admin.student.index') }}" class="rounded-lg p-2 text-gray-500 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700" aria-label="Kembali ke daftar student">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>

            <form method="POST" action="{{ route('admin.student.store') }}">
                @csrf
                @if ($errors->any())
                    <div class="mb-5 rounded-lg border border-red-200 bg-red-50 p-4 text-sm text-red-700 dark:border-red-800 dark:bg-red-900/20 dark:text-red-300">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                <div>
                    <label for="nis" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">NIS</label>
                    <input id="nis" name="nis" type="text" value="{{ old('nis') }}" required class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white" placeholder="Masukkan NIS">
                </div>
                <div>
                    <label for="name" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                    <input id="name" name="name" type="text" value="{{ old('name') }}" required class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white" placeholder="Masukkan nama siswa">
                </div>
                <div class="sm:col-span-2">
                    <label for="classroom_id" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Classroom</label>
                    <select id="classroom_id" name="classroom_id" required class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                        <option value="">Pilih classroom</option>
                        @forelse ($classrooms as $classroom)
                            <option value="{{ $classroom->id }}" @selected(old('classroom_id') == $classroom->id)>{{ $classroom->name }}</option>
                        @empty
                            <option value="" disabled>Belum ada data classroom</option>
                        @endforelse
                    </select>
                </div>
                <div class="sm:col-span-2">
                    <label for="address" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                    <textarea id="address" name="address" rows="3" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white" placeholder="Masukkan alamat">{{ old('address') }}</textarea>
                </div>
            </div>

            <div class="mt-6 flex justify-end gap-3">
                <a href="{{ route('admin.student.index') }}" class="rounded-lg border border-gray-300 px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-700">Batal</a>
                <button type="submit" class="rounded-lg bg-blue-700 px-4 py-2.5 text-sm font-medium text-white hover:bg-blue-800">Simpan</button>
            </div>
            </form>
        </div>
    </section>
</x-admin.layout>
