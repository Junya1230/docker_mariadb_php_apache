<?php

namespace Database\Seeders;

#use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\scores;

class Seeder_scores extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filePath = database_path('seeders/CSV/scores.csv');
        DB::table('scores')->truncate();

        if (($handle = fopen($filePath, 'r')) !== false) {
            $header = fgetcsv($handle);
            while (($row = fgetcsv($handle)) !== false) {
                $data = array_combine($header, $row);
                DB::table('scores')->insert([
                    'game_id'       => $data['game_id'],
                    'player_id'    => $data['player_id'],
                    'score'    => $data['score'],
                    'chip'    => $data['chip'],
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ]);
            }
            fclose($handle);
        }
    }
}
