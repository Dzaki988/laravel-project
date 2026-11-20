<?php

namespace Database\Seeders;

use App\Models\Classroom;
use Illuminate\Database\Seeder;

class ClassroomSeeder extends Seeder
{
    public function run(): void
    {
        $classrooms = [
            ['name' => 'X PPLG 1', 'major' => 'PPLG'],
            ['name' => 'X PPLG 2', 'major' => 'PPLG'],
            ['name' => 'XI PPLG 1', 'major' => 'PPLG'],
            ['name' => 'XI DKV 1', 'major' => 'DKV'],
        ];

        foreach ($classrooms as $classroom) {
            Classroom::firstOrCreate(['name' => $classroom['name']], $classroom);
        }
    }
}
