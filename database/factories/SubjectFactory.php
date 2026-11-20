<?php

namespace Database\Factories;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Subject>
 */
class SubjectFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->randomElement([
                'Pemrograman Web', 'Pemrograman Berorientasi Objek',
                'Basis Data', 'Desain Multimedia', 'Matematika Terapan',
                'Kecerdasan Buatan', 'Jaringan Komputer', 'Bahasa Inggris Teknis',
                'Keamanan Siber', 'Rekayasa Perangkat Lunak',
            ]),
        ];
    }
}
