<?php

namespace Database\Seeders;

use App\Models\FaqCategory;
use App\Models\FaqItem;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        // General category
        $general = FaqCategory::create([
            'name' => 'General',
        ]);

        FaqItem::create([
            'faq_category_id' => $general->id,
            'question' => 'Who is 3SKE?',
            'answer' => '3SKE is a 19-year-old DJ and producer specializing in techno, house, and electronic dance music. Based in Belgium, 3SKE brings high-energy performances to clubs and festivals across Europe.',
        ]);

        FaqItem::create([
            'faq_category_id' => $general->id,
            'question' => 'How can I book 3SKE for an event?',
            'answer' => 'You can book 3SKE by using the contact form on our website or by emailing directly through the contact page. Please include event details, date, location, and budget in your inquiry.',
        ]);

        FaqItem::create([
            'faq_category_id' => $general->id,
            'question' => 'Where can I listen to 3SKE\'s music?',
            'answer' => 'You can find 3SKE\'s music on SoundCloud, Spotify, Apple Music, and Beatport. Check out the latest mixes and releases on the homepage or follow on social media for updates.',
        ]);

        // Events category
        $events = FaqCategory::create([
            'name' => 'Events & Shows',
        ]);

        FaqItem::create([
            'faq_category_id' => $events->id,
            'question' => 'How do I buy tickets for shows?',
            'answer' => 'Tickets are usually available through the event page on our website. Click on the "Get Tickets" button on any upcoming show to be redirected to the ticketing platform. Some events may have tickets available at the door, but we recommend purchasing in advance.',
        ]);

        FaqItem::create([
            'faq_category_id' => $events->id,
            'question' => 'Are the events 18+ only?',
            'answer' => 'Most club events are 18+ or 21+, but festival shows are often all ages. Check the specific event page for age restrictions. Valid ID is required at the door for age verification.',
        ]);

        FaqItem::create([
            'faq_category_id' => $events->id,
            'question' => 'Can I request a song at a show?',
            'answer' => 'While we appreciate your enthusiasm, sets are carefully curated for the specific vibe and venue. Feel free to share your favorite tracks on social media though - it might influence future sets!',
        ]);

        FaqItem::create([
            'faq_category_id' => $events->id,
            'question' => 'What should I expect at a 3SKE show?',
            'answer' => 'Expect high-energy techno and house music, incredible visuals, and an unforgettable atmosphere. Shows typically run 1-3 hours depending on the event. Bring your dancing shoes and get ready for a night to remember!',
        ]);

        // Technical category
        $technical = FaqCategory::create([
            'name' => 'Technical & Production',
        ]);

        FaqItem::create([
            'faq_category_id' => $technical->id,
            'question' => 'What equipment does 3SKE use?',
            'answer' => 'For live performances, 3SKE primarily uses Pioneer CDJs and DJM mixers. In the studio, a combination of hardware synthesizers and software DAWs like Ableton Live are used for production.',
        ]);

        FaqItem::create([
            'faq_category_id' => $technical->id,
            'question' => 'Do you offer production tutorials or lessons?',
            'answer' => 'Currently, production tips and behind-the-scenes content are shared on social media and YouTube. Private lessons or workshops may be available in the future - stay tuned for announcements!',
        ]);

        FaqItem::create([
            'faq_category_id' => $technical->id,
            'question' => 'Can I send my demos to 3SKE?',
            'answer' => 'Demo submissions are currently closed, but this may change in the future. Follow on social media for updates if demo submissions open up again.',
        ]);

        // Account category
        $account = FaqCategory::create([
            'name' => 'Website & Account',
        ]);

        FaqItem::create([
            'faq_category_id' => $account->id,
            'question' => 'Why should I create an account?',
            'answer' => 'Creating an account allows you to favorite upcoming shows, get personalized recommendations, and receive updates about events you\'re interested in. It\'s free and takes less than a minute!',
        ]);

        FaqItem::create([
            'faq_category_id' => $account->id,
            'question' => 'How do I favorite a show?',
            'answer' => 'Once logged in, simply click the heart icon on any event card. Your favorited shows will appear on your profile and in your favorites page for easy access.',
        ]);

        FaqItem::create([
            'faq_category_id' => $account->id,
            'question' => 'Is my personal information safe?',
            'answer' => 'Yes! We take privacy seriously and never share your personal information with third parties. Your data is stored securely and only used to enhance your experience on the website.',
        ]);
    }
}
