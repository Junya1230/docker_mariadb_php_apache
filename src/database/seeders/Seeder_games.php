<?php

namespace Database\Seeders;

#use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\games;

class Seeder_games extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // CSVファイルのパス
        $filePath = database_path('seeders/CSV/games.csv');
        DB::table('games')->truncate();

        DB::transaction(function () use ($filePath) {
            // CSVファイルを開く
            if (($handle = fopen($filePath, 'r')) !== false) {
                $header = fgetcsv($handle); // ヘッダー行を取得

                while (($row = fgetcsv($handle)) !== false) {
                    $data = array_combine($header, $row);

                    // データベースに挿入
                    DB::table('games')->insert([
                        'id'  => $data['id'],
                        'play_date'  => $data['play_date'],
                        'score_rate' => $data['score_rate'],
                        'chip_rate'   => $data['chip_rate'],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }

                fclose($handle); // ファイルを閉じる
            }
        });
    }
}
