<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StudentController extends Controller
{
    public function index(Request $request): View
    {
        $title = 'Student Data';
        $students = Student::with('classroom')->get();
        $classrooms = Classroom::query()->get();

        return view('admin.student.index', compact(
            'title',
            'students',
            'classrooms'
        ));
    }

    public function create(): View
    {
        return view('admin.student.create', [
            'title' => 'Tambah Siswa',
            'classrooms' => Classroom::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nis' => 'required|string|max:20|unique:students,nis',
            'name' => 'required|string|max:255',
            'classroom_id' => 'required|exists:classrooms,id',
            'address' => 'nullable|string|max:255',
        ], [
            'nis.required' => 'NIS wajib diisi.',
            'nis.unique' => 'NIS sudah digunakan.',
            'name.required' => 'Nama siswa wajib diisi.',
            'classroom_id.required' => 'Kelas wajib dipilih.',
            'classroom_id.exists' => 'Kelas tidak ditemukan.',
            'address.address' => 'Format alamat tidak valid.',
        ]);

        Student::create($validated);

        return redirect()
            ->route('admin.student.index')
            ->with('success', 'Data siswa berhasil ditambahkan.');
    }
}
