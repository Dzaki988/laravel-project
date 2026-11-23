<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TeacherController extends Controller
{
    public function index(): View
    {
        $title = 'Teachers';
        $teachers = Teacher::with('subject')->get();
        $subjects = Subject::all();

        return view('admin.teacher.index', compact(
            'title',
            'teachers',
            'subjects'
        ));
    }

    public function create(): View
    {
        return view('admin.teacher.create', [
            'title' => 'Tambah Guru',
            'subjects' => Subject::whereDoesntHave('teacher')
                ->orderBy('name')
                ->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'niy' => 'required|numeric|unique:teachers,niy',
            'subject_id' => 'required|exists:subjects,id|unique:teachers,subject_id',
            'start_date' => 'required|date',
        ], [
            'name.required' => 'Nama guru wajib diisi.',
            'niy.required' => 'NIY wajib diisi.',
            'niy.numeric' => 'NIY harus berupa angka.',
            'niy.unique' => 'NIY sudah digunakan.',
            'subject_id.required' => 'Mata pelajaran wajib dipilih.',
            'subject_id.exists' => 'Mata pelajaran tidak ditemukan.',
            'subject_id.unique' => 'Mata pelajaran sudah memiliki guru.',
            'start_date.required' => 'Tanggal mulai mengajar wajib diisi.',
        ]);

        Teacher::create($validated);

        return redirect()
            ->route('admin.teacher.index')
            ->with('success', 'Data guru berhasil ditambahkan.');
    }
}
