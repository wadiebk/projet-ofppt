<?php

namespace Database\Seeders;

use App\Models\StageFile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class StageFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $files = Storage::disk('public')->allFiles('stageFiles');

        $stageFiles = [];

        foreach ($files as $file) {
            $stageFiles[] = [
                'title' => basename($file), // Get the filename from the full path
                'path' => 'stageFiles/' . basename($file), // Assuming you want to store the relative path
                'extension' => pathinfo($file, PATHINFO_EXTENSION), // Get the file extension
                'size' => Storage::disk('public')->size($file), // Get the file size
            ];
        }

        foreach ($stageFiles as $stageFile) {
            StageFile::create($stageFile);
        }
    }
}
