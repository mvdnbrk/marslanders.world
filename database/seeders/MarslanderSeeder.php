<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class MarslanderSeeder extends Seeder
{
    protected string $json_path;

    public function __construct(string $file_name = 'marslanders.json')
    {
        $this->json_path = database_path($file_name);
    }

    public function getJsonAsCollection(): Collection
    {
        if (! File::exists($this->json_path)) {
            throw new \Exception("The JSON file does not exist at the specified path: ".$this->json_path);
        }

        $json_content = File::get($this->json_path);
        $data = json_decode($json_content, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception("Invalid JSON format in file: ".$this->json_path);
        }

        if (! is_array($data)) {
            throw new \Exception("The JSON file does not contain an array.");
        }

        return collect($data);
    }

    public function run(): void
    {
        $this->getJsonAsCollection()->each(function ($item) {
            foreach ($item as $key => $data) {
                $id = (int) Str::of($key)->after('#')->__toString();
                $rank = $data['rank'];

                if (!is_int($id) || $id <= 0) {
                    $this->command->warn("Invalid ID for key: {$key}");
                    continue;
                }

                if (!is_int($rank) || $rank <= 0) {
                    $this->command->warn("Invalid rank for key: {$key}");
                    continue;
                }

                if (! isset($data['inscriptionId'])) {
                    $this->command->warn("Missing inscriptionId for key: {$key}");
                    continue;
                }

                DB::table('marslanders')->insert([
                    'id' => $id,
                    'inscription_id' => $data['inscriptionId'],
                    'rank' => $rank,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        });
    }
}
