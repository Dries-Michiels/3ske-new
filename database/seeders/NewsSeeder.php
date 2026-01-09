<?php

namespace Database\Seeders;

use App\Models\NewsPost;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        NewsPost::create([
            'title' => 'New Residency at Club Voltage Announced',
            'slug' => 'new-residency-club-voltage',
            'content' => "We're excited to announce that 3SKE will have a monthly residency at Club Voltage starting this February! Every first Friday of the month, you can catch an exclusive set featuring the latest techno tracks and unreleased material.\n\nClub Voltage is known for its world-class sound system and intimate atmosphere, making it the perfect venue for these special nights. Expect extended sets, surprise guests, and a true underground experience.\n\nFirst show: February 7th. Mark your calendars!",
            'published_at' => Carbon::now()->subDays(2),
        ]);

        NewsPost::create([
            'title' => 'Summer Festival Season Preview',
            'slug' => 'summer-festival-season-preview',
            'content' => "The festival season is approaching fast, and we've got some exciting announcements coming soon! This summer promises to be the biggest yet with confirmed appearances at several major European festivals.\n\nWe're working on bringing you the best electronic music experience across multiple stages and countries. More details will be revealed in the coming weeks, but trust us - you don't want to miss this.\n\nStay tuned to our social media for the official announcements!",
            'published_at' => Carbon::now()->subDays(7),
        ]);

        NewsPost::create([
            'title' => 'New EP "Midnight Frequencies" Out Now',
            'slug' => 'new-ep-midnight-frequencies',
            'content' => "After months of work in the studio, I'm thrilled to finally share my new EP 'Midnight Frequencies' with you all! This 4-track release explores darker, more experimental sounds while staying true to the driving techno energy you know and love.\n\nThe EP is now available on all major streaming platforms including Spotify, Apple Music, and Beatport. Special thanks to everyone who supported me during the creation process.\n\nListen now and let me know which track is your favorite!",
            'published_at' => Carbon::now()->subDays(14),
        ]);

        NewsPost::create([
            'title' => 'Thanks for an Amazing 2025!',
            'slug' => 'thanks-amazing-2025',
            'content' => "What a year it's been! 2025 was filled with incredible shows, amazing crowds, and unforgettable moments. From intimate club nights to massive festival stages, every single performance was special because of you.\n\nWe played over 50 shows across Europe, released new music, and connected with thousands of music lovers. The energy and support from the community has been absolutely overwhelming.\n\n2026 is already shaping up to be even bigger. Thank you for being part of this journey. See you on the dancefloor!",
            'published_at' => Carbon::create(2026, 1, 2),
        ]);

        NewsPost::create([
            'title' => 'Behind the Decks: Studio Setup Tour',
            'slug' => 'behind-decks-studio-setup',
            'content' => "Ever wondered what gear goes into making those tracks and mixes? I've put together a detailed studio tour video showing my complete production setup, from hardware synths to software plugins.\n\nIn the video, I walk through my creative process, demonstrate some of my favorite techniques, and share tips for aspiring producers. Whether you're just starting out or looking to upgrade your setup, there's something for everyone.\n\nCheck it out on our YouTube channel and don't forget to subscribe for more content like this!",
            'published_at' => Carbon::now()->subDays(21),
        ]);
    }
}
