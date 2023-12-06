<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Banner;
use App\Models\Image;
use Storage;
use File;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $files = File::files(public_path('assets/pictures/banners'));

        foreach ($files as $file) {

            Storage::put(Banner::PATH . '/' . $file->getFilename(), File::get($file));

            $path = Banner::PATH . '/' . $file->getFilename();

            Banner::factory()->create([
                'image_id' => Image::factory()->create([
                    'path' => $path
                ])
            ]);
        }

    }
}
