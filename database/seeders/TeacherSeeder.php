<?php

namespace Database\Seeders;

use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subject::query()
            ->whereDoesntHave('teacher')
            ->each(function (Subject $subject): void {
                Teacher::factory()->for($subject)->create();
            });
    }
}
