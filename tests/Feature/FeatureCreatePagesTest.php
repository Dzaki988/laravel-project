<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('each add button opens its matching form', function (string $indexPath, string $createPath, array $fields) {
    $indexResponse = $this->get($indexPath);

    $indexResponse->assertOk();
    $indexResponse->assertSee($createPath, false);

    $createResponse = $this->get($createPath);

    $createResponse->assertOk();

    foreach ($fields as $field) {
        $createResponse->assertSee('name="'.$field.'"', false);
    }

    $createResponse->assertSee('type="submit"', false);
    $createResponse->assertDontSee('Simpan (Demo)', false);
})->with([
    'student' => ['/admin/student', '/admin/student/create', ['nis', 'name', 'classroom_id', 'address']],
    'classroom' => ['/admin/classroom', '/admin/classroom/create', ['name', 'major']],
    'subject' => ['/admin/subject', '/admin/subject/create', ['name']],
    'teacher' => ['/admin/teacher', '/admin/teacher/create', ['name', 'niy', 'subject_id', 'start_date']],
]);
