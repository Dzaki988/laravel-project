<?php

use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('subject list displays its assigned teacher', function () {
    $subject = Subject::factory()->create(['name' => 'Matematika']);
    Teacher::factory()->for($subject)->create(['name' => 'Ibu Sari']);

    $response = $this->get(route('admin.subject.index'));

    $response->assertOk();
    $response->assertSee('Matematika');
    $response->assertSee('Ibu Sari');
});

test('teacher creation rejects a subject that already has a teacher', function () {
    $subject = Subject::factory()->create();
    Teacher::factory()->for($subject)->create();

    $response = $this->post(route('admin.teacher.store'), [
        'name' => 'Guru Kedua',
        'niy' => '2098765432',
        'subject_id' => $subject->id,
        'start_date' => '2026-01-01',
    ]);

    $response->assertSessionHasErrors([
        'subject_id' => 'Mata pelajaran sudah memiliki guru.',
    ]);
    $this->assertDatabaseCount('teachers', 1);
});

test('teacher can be assigned to a subject without a teacher', function () {
    $subject = Subject::factory()->create();

    $response = $this->post(route('admin.teacher.store'), [
        'name' => 'Pak Budi',
        'niy' => '2098765432',
        'subject_id' => $subject->id,
        'start_date' => '2026-01-01',
    ]);

    $response->assertRedirect(route('admin.teacher.index'));
    $this->assertDatabaseHas('teachers', [
        'name' => 'Pak Budi',
        'subject_id' => $subject->id,
    ]);
});

test('teacher creation form lists only subjects without a teacher', function () {
    $assignedSubject = Subject::factory()->create(['name' => 'Matematika']);
    $availableSubject = Subject::factory()->create(['name' => 'Fisika']);
    Teacher::factory()->for($assignedSubject)->create();

    $response = $this->get(route('admin.teacher.create'));

    $response->assertOk();
    $response->assertSee('value="'.$availableSubject->id.'"', false);
    $response->assertDontSee('value="'.$assignedSubject->id.'"', false);
});

test('database rejects multiple teachers assigned to one subject', function () {
    $subject = Subject::factory()->create();
    Teacher::factory()->for($subject)->create();

    expect(fn () => Teacher::factory()->for($subject)->create())
        ->toThrow(QueryException::class);
});
