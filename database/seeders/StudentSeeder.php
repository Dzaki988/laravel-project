<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $students = [
            ['nis' => '25001', 'name' => 'Dimas Pratama', 'classroom' => 'X PPLG 1', 'address' => 'Bandung'],
            ['nis' => '25002', 'name' => 'Nabila Putri', 'classroom' => 'X PPLG 1', 'address' => 'Cimahi'],
            ['nis' => '25003', 'name' => 'Arga Saputra', 'classroom' => 'XI PPLG 1', 'address' => 'Garut'],
            ['nis' => '25004', 'name' => 'Maya Anggraini', 'classroom' => 'XI DKV 1', 'address' => 'Soreang'],
        ];

        foreach ($students as $student) {
            $classroom = Classroom::where('name', $student['classroom'])->firstOrFail();
            Student::updateOrCreate(
                ['nis' => $student['nis']],
                [
                    'name' => $student['name'],
                    'classroom_id' => $classroom->id,
                    'address' => $student['address'],
                ],
            );
        }
    }
}
