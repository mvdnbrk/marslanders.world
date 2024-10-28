<?php

namespace Database\Seeders;

use App\Models\Inscription;
use App\Models\InscriptionTrait;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

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
            throw new \Exception('The JSON file does not exist at the specified path: '.$this->json_path);
        }

        $json_content = File::get($this->json_path);
        $data = json_decode($json_content, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception('Invalid JSON format in file: '.$this->json_path);
        }

        if (! is_array($data)) {
            throw new \Exception('The JSON file does not contain an array.');
        }

        return collect($data);
    }

    public function run(): void
    {
        $this->getJsonAsCollection()->each(function ($item) {
            foreach ($item as $key => $data) {
                $rank = $data['rank'];
                $inscriptionId = $data['inscriptionId'];
                $traits = collect($data)->forget(['inscriptionId', 'rank']);

                if (! is_int($rank) || $rank <= 0) {
                    $this->command->warn("Invalid rank for key: {$key}");

                    continue;
                }

                if (! $inscriptionId) {
                    $this->command->warn("Missing inscriptionId for key: {$key}");

                    continue;
                }

                $model = Inscription::create([
                    'inscription_id' => $inscriptionId,
                    'name' => $key,
                    'rank' => $rank,
                    'hash' => Str::of(hash('sha256', $inscriptionId))->lower()->take(8),
                ]);

                $traits->each(function ($item, $key) use ($model) {
                    $model->traits()->save(new InscriptionTrait([
                        'type' => $key,
                        'value' => $item['type'],
                        'rarity' => (float) Str::of($item['rarity'])->before('%')->toString(),
                    ]));
                });
            }
        });
    }
}
