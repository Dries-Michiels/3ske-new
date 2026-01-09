<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        $tags = [
            ['name' => 'Techno', 'slug' => 'techno'],
            ['name' => 'House', 'slug' => 'house'],
            ['name' => 'EDM', 'slug' => 'edm'],
            ['name' => 'Trance', 'slug' => 'trance'],
            ['name' => 'Drum & Bass', 'slug' => 'drum-bass'],
            ['name' => 'Festival', 'slug' => 'festival'],
            ['name' => 'Club Night', 'slug' => 'club-night'],
            ['name' => '18+', 'slug' => '18-plus'],
            ['name' => 'All Ages', 'slug' => 'all-ages'],
        ];

        foreach ($tags as $tag) {
            Tag::create($tag);
        }
    }
}
