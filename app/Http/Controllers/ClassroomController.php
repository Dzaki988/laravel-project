<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClassroomController extends Controller
{
    public function index(): View
    {
        $title = 'Classroom Data';
        $classrooms = Classroom::all();

        return view('admin.classroom.index', compact(
            'title',
            'classrooms'
        ) + ['content' => 'Daftar kelas dan jurusan.']);
    }

    public function create(): View
    {
        return view('admin.classroom.create', [
            'title' => 'Tambah Kelas',
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:classrooms,name',
            'major' => 'required|string|max:255',
        ], [
            'name.required' => 'Nama kelas wajib diisi.',
            'name.unique' => 'Nama kelas sudah ada.',
            'major.required' => 'Jurusan wajib diisi.',
        ]);

        Classroom::create($validated);

        return redirect()
            ->route('admin.classroom.index')
            ->with('success', 'Data kelas berhasil ditambahkan.');
    }
}
