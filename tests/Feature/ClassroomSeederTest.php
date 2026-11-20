<?php

use App\Models\Classroom;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Database\Seeders\ClassroomSeeder;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('the classroom seeder creates ten unique classrooms', function () {
    $this->seed(ClassroomSeeder::class);

    expect(Classroom::count())->toBe(10);
    expect(Classroom::pluck('name')->unique()->count())->toBe(10);
});

test('the database seeder creates all dummy records', function () {
    $this->seed(DatabaseSeeder::class);

    expect(Classroom::count())->toBe(10)
        ->and(Student::count())->toBe(10)
        ->and(Subject::count())->toBe(10)
        ->and(Teacher::count())->toBe(10);
});
