<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    public function run(): void
    {
        $subjects = [
            'Pemrograman Web',
            'Pemrograman Berorientasi Objek',
            'Basis Data',
            'Desain Multimedia',
            'Jaringan Komputer',
        ];

        foreach ($subjects as $name) {
            Subject::firstOrCreate(['name' => $name]);
        }
    }
}
