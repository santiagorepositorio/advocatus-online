<?php

namespace Database\Seeders;

use App\Models\File;
use App\Models\Folder;
use App\Models\Image;
use App\Models\Resource;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FolderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $folders = Folder::factory(10)->create();

        foreach ($folders as $folder) {           
            $files = File::factory(4)->create(['folder_id' => $folder->id]);
            foreach($files as $file){
                Resource::factory(1)->create([
                'resourceable_id' => $file->id,
                'resourceable_type' => 'App\Models\File'
            ]); 
            }
                          
        }
    }
}
