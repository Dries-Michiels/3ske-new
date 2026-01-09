<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        // Upcoming Events
        $event1 = Event::create([
            'title' => 'Techno Nights: Winter Edition',
            'slug' => 'techno-nights-winter-edition',
            'description' => 'Join us for an unforgettable night of techno beats! Featuring 3SKE and special guests. State-of-the-art sound system and visuals.',
            'location' => 'Club Voltage, Brussels',
            'starts_at' => Carbon::now()->addDays(14)->setTime(22, 0),
            'ends_at' => Carbon::now()->addDays(15)->setTime(6, 0),
            'ticket_url' => 'https://example.com/tickets/techno-nights',
        ]);
        $event1->tags()->attach(Tag::whereIn('slug', ['techno', 'club-night', '18-plus'])->pluck('id'));

        $event2 = Event::create([
            'title' => 'Summer Festival Warmup',
            'slug' => 'summer-festival-warmup',
            'description' => 'Get ready for festival season with 3SKE! A special warmup set featuring the biggest summer hits and exclusive previews.',
            'location' => 'Festival Grounds, Antwerp',
            'starts_at' => Carbon::now()->addDays(30)->setTime(14, 0),
            'ends_at' => Carbon::now()->addDays(30)->setTime(23, 0),
            'ticket_url' => 'https://example.com/tickets/summer-warmup',
        ]);
        $event2->tags()->attach(Tag::whereIn('slug', ['house', 'edm', 'festival', 'all-ages'])->pluck('id'));

        $event3 = Event::create([
            'title' => 'Underground House Session',
            'slug' => 'underground-house-session',
            'description' => 'Deep house vibes in an intimate setting. Limited capacity for the real house music lovers.',
            'location' => 'The Basement, Ghent',
            'starts_at' => Carbon::now()->addDays(21)->setTime(23, 0),
            'ends_at' => Carbon::now()->addDays(22)->setTime(5, 0),
        ]);
        $event3->tags()->attach(Tag::whereIn('slug', ['house', 'club-night', '18-plus'])->pluck('id'));

        $event4 = Event::create([
            'title' => 'Trance Paradise',
            'slug' => 'trance-paradise',
            'description' => 'A night dedicated to trance music. Uplifting melodies and euphoric beats all night long.',
            'location' => 'Dreamland Club, Leuven',
            'starts_at' => Carbon::now()->addDays(45)->setTime(21, 0),
            'ends_at' => Carbon::now()->addDays(46)->setTime(4, 0),
            'ticket_url' => 'https://example.com/tickets/trance-paradise',
        ]);
        $event4->tags()->attach(Tag::whereIn('slug', ['trance', 'club-night', '18-plus'])->pluck('id'));

        // Past Events
        $pastEvent1 = Event::create([
            'title' => 'New Year\'s Eve Countdown',
            'slug' => 'new-years-eve-countdown',
            'description' => 'We brought in 2026 with style! Thanks to everyone who joined us for this epic celebration.',
            'location' => 'Main Square, Brussels',
            'starts_at' => Carbon::create(2025, 12, 31, 22, 0),
            'ends_at' => Carbon::create(2026, 1, 1, 2, 0),
        ]);
        $pastEvent1->tags()->attach(Tag::whereIn('slug', ['edm', 'festival', 'all-ages'])->pluck('id'));

        $pastEvent2 = Event::create([
            'title' => 'Christmas Special',
            'slug' => 'christmas-special-2025',
            'description' => 'A festive night of electronic music to celebrate the holidays.',
            'location' => 'Winter Wonderland, Antwerp',
            'starts_at' => Carbon::create(2025, 12, 24, 20, 0),
            'ends_at' => Carbon::create(2025, 12, 25, 2, 0),
        ]);
        $pastEvent2->tags()->attach(Tag::whereIn('slug', ['house', 'edm', 'all-ages'])->pluck('id'));

        $pastEvent3 = Event::create([
            'title' => 'Warehouse Rave',
            'slug' => 'warehouse-rave-november',
            'description' => 'Underground vibes in a secret warehouse location. Raw techno and industrial sounds.',
            'location' => 'Secret Location, Brussels',
            'starts_at' => Carbon::create(2025, 11, 15, 23, 0),
            'ends_at' => Carbon::create(2025, 11, 16, 8, 0),
        ]);
        $pastEvent3->tags()->attach(Tag::whereIn('slug', ['techno', 'club-night', '18-plus'])->pluck('id'));
    }
}
