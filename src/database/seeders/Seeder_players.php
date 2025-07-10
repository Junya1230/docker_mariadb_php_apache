<?php

namespace Database\Seeders;

#use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\players;

class Seeder_players extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filePath = database_path('seeders/CSV/players.csv');
        DB::table('players')->truncate();

        if (($handle = fopen($filePath, 'r')) !== false) {
            $header = fgetcsv($handle);
            while (($row = fgetcsv($handle)) !== false) {
                $data = array_combine($header, $row);
                DB::table('players')->insert([
                    'id'  => $data['id'],
                    'player_name'  => $data['player_name'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            fclose($handle);
        }
    }
}
