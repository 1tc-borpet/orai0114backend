<?php

namespace Database\Seeders;

use App\Models\Challenge;
use Illuminate\Database\Seeder;

class ChallengeSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'title' => 'Angular alapok 7 nap alatt',
                'category' => 'CODE',
                'difficulty' => 'EASY',
                'reward_points' => 50,
                'start_date' => now()->toDateString(),
                'end_date' => now()->addDays(7)->toDateString(),
                'is_active' => true,
                'description' => 'Ismerkedés az Angular alapjaival: komponensek, modulok, routing.',
            ],
            [
                'title' => '30 napos algoritmus kihívás',
                'category' => 'CODE',
                'difficulty' => 'HARD',
                'reward_points' => 300,
                'start_date' => now()->toDateString(),
                'end_date' => now()->addDays(30)->toDateString(),
                'is_active' => true,
                'description' => 'Napi egy algoritmus feladat, részletes megoldásokkal.',
            ],
            [
                'title' => 'HTML & CSS alapok',
                'category' => 'DESIGN',
                'difficulty' => 'EASY',
                'reward_points' => 60,
                'start_date' => now()->subDays(10)->toDateString(),
                'end_date' => now()->subDays(3)->toDateString(),
                'is_active' => false,
                'description' => 'Gyors bevezető a weboldal felépítésébe és stílusába.',
            ],
            [
                'title' => 'Adatvizualizáció Pythonban',
                'category' => 'DATA',
                'difficulty' => 'MEDIUM',
                'reward_points' => 150,
                'start_date' => now()->addDays(1)->toDateString(),
                'end_date' => now()->addDays(15)->toDateString(),
                'is_active' => true,
                'description' => 'Matplotlib és Seaborn alapok, gyakorlati példákkal.',
            ],
            [
                'title' => 'Kommunikációs készségek',
                'category' => 'SOFT',
                'difficulty' => 'MEDIUM',
                'reward_points' => 100,
                'start_date' => now()->subDays(5)->toDateString(),
                'end_date' => now()->addDays(2)->toDateString(),
                'is_active' => true,
                'description' => 'Gyakorlatok és tippek jobb kommunikációhoz.',
            ],
            [
                'title' => 'Design thinking mini-projekt',
                'category' => 'DESIGN',
                'difficulty' => 'MEDIUM',
                'reward_points' => 120,
                'start_date' => now()->toDateString(),
                'end_date' => now()->addDays(10)->toDateString(),
                'is_active' => true,
                'description' => 'Problémafeltárás, ötletelés és prototípus készítés.',
            ],
        ];

        foreach ($items as $it) {
            Challenge::create($it);
        }
    }
}
