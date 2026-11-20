<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $title = 'Dashboard';
        $content = 'Selamat datang di dashboard admin';

        return view('admin.dashboard', [
            'title' => $title,
            'content' => $content,
            'counts' => [
                'classrooms' => Classroom::count(),
                'students' => Student::count(),
                'subjects' => Subject::count(),
                'teachers' => Teacher::count(),
            ],
        ]);
    }
}
