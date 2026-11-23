<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SubjectController extends Controller
{
    public function index(): View
    {
        $title = 'Subject';
        $subjects = Subject::with('teacher')->get();

        return view('admin.subject.index', compact(
            'title',
            'subjects'
        ));
    }

    public function create(): View
    {
        return view('admin.subject.create', [
            'title' => 'Tambah Mata Pelajaran',
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:subjects,name',
        ], [
            'name.required' => 'Nama mata pelajaran wajib diisi.',
            'name.unique' => 'Mata pelajaran sudah ada.',
        ]);

        Subject::create($validated);

        return redirect()
            ->route('admin.subject.index')
            ->with('success', 'Data mata pelajaran berhasil ditambahkan.');
    }
}
