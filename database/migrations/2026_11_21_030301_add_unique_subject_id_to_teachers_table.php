<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('teachers', function (Blueprint $table) {
            $table->dropForeign(['subject_id']);
            $table->foreignId('subject_id')->nullable()->change();
        });

        $duplicateAssignments = DB::table('teachers')
            ->select('subject_id')
            ->selectRaw('MIN(id) as retained_teacher_id')
            ->groupBy('subject_id')
            ->havingRaw('COUNT(*) > 1')
            ->get();

        foreach ($duplicateAssignments as $duplicateAssignment) {
            DB::table('teachers')
                ->where('subject_id', $duplicateAssignment->subject_id)
                ->where('id', '!=', $duplicateAssignment->retained_teacher_id)
                ->update(['subject_id' => null]);
        }

        Schema::table('teachers', function (Blueprint $table) {
            $table->foreign('subject_id')
                ->references('id')
                ->on('subjects')
                ->cascadeOnDelete();
            $table->unique('subject_id');
        });
    }

    public function down(): void
    {
        // Keep the column nullable because duplicate legacy assignments were detached in up().
        Schema::table('teachers', function (Blueprint $table) {
            $table->dropUnique(['subject_id']);
        });
    }
};
