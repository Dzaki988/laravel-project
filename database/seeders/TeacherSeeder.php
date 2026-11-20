<?php

namespace Database\Seeders;

use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    public function run(): void
    {
        $teachers = [
            ['name' => 'Ahmad Fauzi', 'niy' => 198001001, 'subject' => 'Pemrograman Web', 'start_date' => '2020-07-13'],
            ['name' => 'Siti Nurhaliza', 'niy' => 198402102, 'subject' => 'Basis Data', 'start_date' => '2019-01-14'],
            ['name' => 'Rina Maharani', 'niy' => 199103203, 'subject' => 'Desain Multimedia', 'start_date' => '2021-08-02'],
        ];

        foreach ($teachers as $teacher) {
            $subject = Subject::where('name', $teacher['subject'])->firstOrFail();
            Teacher::updateOrCreate(
                ['niy' => $teacher['niy']],
                [
                    'name' => $teacher['name'],
                    'subject_id' => $subject->id,
                    'start_date' => $teacher['start_date'],
                ],
            );
        }
    }
}
