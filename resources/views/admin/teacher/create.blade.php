<x-admin.layout>
    <section class="flex min-h-[calc(100vh-7rem)] items-center justify-center p-4">
        <div class="w-full max-w-2xl rounded-xl bg-white p-6 shadow-lg dark:bg-gray-800 sm:p-8">
            <div class="mb-6">
                <p class="mb-1 text-sm font-medium text-blue-600">Tambah data</p>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Teacher</h1>
            </div>
            <form method="POST" action="{{ route('admin.teacher.store') }}">
                @csrf
                @if ($errors->any())
                    <div class="mb-5 rounded-lg border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                        @foreach ($errors->all() as $error)<p>{{ $error }}</p>@endforeach
                    </div>
                @endif
                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                    <div class="sm:col-span-2">
                        <label for="name" class="mb-2 block text-sm font-medium">Nama guru</label>
                        <input id="name" name="name" type="text" value="{{ old('name') }}" required class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5">
                    </div>
                    <div>
                        <label for="niy" class="mb-2 block text-sm font-medium">NIY</label>
                        <input id="niy" name="niy" type="text" value="{{ old('niy') }}" required class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5">
                    </div>
                    <div>
                        <label for="start_date" class="mb-2 block text-sm font-medium">Tanggal mulai</label>
                        <input id="start_date" name="start_date" type="date" value="{{ old('start_date') }}" required class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="subject_id" class="mb-2 block text-sm font-medium">Mata pelajaran</label>
                        <select id="subject_id" name="subject_id" required class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5">
                            <option value="">Pilih mata pelajaran</option>
                            @foreach ($subjects as $subject)
                                <option value="{{ $subject->id }}" @selected(old('subject_id') == $subject->id)>{{ $subject->name }}</option>
                            @endforeach
                        </select>
                        @if ($subjects->isEmpty())
                            <p class="mt-2 text-sm text-gray-500">Semua mata pelajaran sudah memiliki guru.</p>
                        @endif
                    </div>
                </div>
                <div class="mt-6 flex justify-end gap-3">
                    <a href="{{ route('admin.teacher.index') }}" class="rounded-lg border border-gray-300 px-4 py-2.5 text-sm font-medium">Batal</a>
                    <button type="submit" @disabled($subjects->isEmpty()) class="rounded-lg bg-blue-700 px-4 py-2.5 text-sm font-medium text-white disabled:cursor-not-allowed disabled:opacity-50">Simpan</button>
                </div>
            </form>
        </div>
    </section>
</x-admin.layout>
