<?php

namespace Database\Seeders;

use App\Models\MotivationalQuote;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MotivationalQuotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $quotes = [
            // Motivation
            ['quote' => 'The secret of getting ahead is getting started.', 'author' => 'Mark Twain', 'category' => 'motivation', 'is_active' => true],
            ['quote' => 'It\'s not whether you get knocked down, it\'s whether you get up.', 'author' => 'Vince Lombardi', 'category' => 'motivation', 'is_active' => true],
            ['quote' => 'The will to win, the desire to succeed, the urge to reach your full potential... these are the keys that will unlock the door to personal excellence.', 'author' => 'Confucius', 'category' => 'motivation', 'is_active' => true],
            ['quote' => 'Believe you can and you\'re halfway there.', 'author' => 'Theodore Roosevelt', 'category' => 'motivation', 'is_active' => true],
            ['quote' => 'The only way to do great work is to love what you do.', 'author' => 'Steve Jobs', 'category' => 'motivation', 'is_active' => true],
            ['quote' => 'Success is not final, failure is not fatal: it is the courage to continue that counts.', 'author' => 'Winston Churchill', 'category' => 'motivation', 'is_active' => true],
            ['quote' => 'The future belongs to those who believe in the beauty of their dreams.', 'author' => 'Eleanor Roosevelt', 'category' => 'motivation', 'is_active' => true],
            ['quote' => 'Don\'t watch the clock; do what it does. Keep going.', 'author' => 'Sam Levenson', 'category' => 'motivation', 'is_active' => true],
            ['quote' => 'The harder you work for something, the greater you\'ll feel when you achieve it.', 'author' => 'Unknown', 'category' => 'motivation', 'is_active' => true],
            ['quote' => 'Dream bigger. Do bigger.', 'author' => 'Unknown', 'category' => 'motivation', 'is_active' => true],

            // Comfort
            ['quote' => 'You are not alone. You are seen. I am with you. You are not alone.', 'author' => 'Shonda Rhimes', 'category' => 'comfort', 'is_active' => true],
            ['quote' => 'It\'s okay not to be okay. It\'s okay to ask for help.', 'author' => 'Unknown', 'category' => 'comfort', 'is_active' => true],
            ['quote' => 'Your feelings are valid. Don\'t let anyone tell you otherwise.', 'author' => 'Unknown', 'category' => 'comfort', 'is_active' => true],
            ['quote' => 'Tears are words the heart can\'t express.', 'author' => 'Gerard Way', 'category' => 'comfort', 'is_active' => true],
            ['quote' => 'Give yourself the same care and attention that you give to others and watch yourself bloom.', 'author' => 'Unknown', 'category' => 'comfort', 'is_active' => true],
            ['quote' => 'Sometimes, the most productive thing you can do is relax.', 'author' => 'Mark Black', 'category' => 'comfort', 'is_active' => true],
            ['quote' => 'There is no need to be perfect to inspire others. Let people get inspired by how you deal with your imperfections.', 'author' => 'Unknown', 'category' => 'comfort', 'is_active' => true],
            ['quote' => 'You are enough just as you are.', 'author' => 'Meghan Markle', 'category' => 'comfort', 'is_active' => true],
            ['quote' => 'Let your hopes, not your hurts, shape your future.', 'author' => 'Robert H. Schuller', 'category' => 'comfort', 'is_active' => true],
            ['quote' => 'What you\'re going through is temporary. You will get through this.', 'author' => 'Unknown', 'category' => 'comfort', 'is_active' => true],

            // Encouragement
            ['quote' => 'The comeback is always stronger than the setback.', 'author' => 'Unknown', 'category' => 'encouragement', 'is_active' => true],
            ['quote' => 'Fall seven times, stand up eight.', 'author' => 'Japanese Proverb', 'category' => 'encouragement', 'is_active' => true],
            ['quote' => 'Every day may not be good, but there is some good in every day.', 'author' => 'Alice Morse Earle', 'category' => 'encouragement', 'is_active' => true],
            ['quote' => 'You have within you right now, everything you need to deal with whatever the world can throw at you.', 'author' => 'Brian Tracy', 'category' => 'encouragement', 'is_active' => true],
            ['quote' => 'This is a chapter in your life. Don\'t close the book, just turn the page.', 'author' => 'Unknown', 'category' => 'encouragement', 'is_active' => true],
            ['quote' => 'You\'re allowed to scream, you\'re allowed to cry, but do not give up.', 'author' => 'Unknown', 'category' => 'encouragement', 'is_active' => true],
            ['quote' => 'The struggle you\'re in today is developing the strength you need for tomorrow.', 'author' => 'Robert Tew', 'category' => 'encouragement', 'is_active' => true],
            ['quote' => 'Just because you\'re struggling doesn\'t mean you\'re failing.', 'author' => 'Unknown', 'category' => 'encouragement', 'is_active' => true],
            ['quote' => 'Your journey is your own. Don\'t compare it to others.', 'author' => 'Unknown', 'category' => 'encouragement', 'is_active' => true],
            ['quote' => 'One small positive thought in the morning can change your whole day.', 'author' => 'Dalai Lama', 'category' => 'encouragement', 'is_active' => true],

            // Self-Compassion
            ['quote' => 'Talk to yourself like you would to someone you love.', 'author' => 'Brené Brown', 'category' => 'self-compassion', 'is_active' => true],
            ['quote' => 'You\'ve been criticizing yourself for years and it hasn\'t worked. Try approving of yourself and see what happens.', 'author' => 'Louise Hay', 'category' => 'self-compassion', 'is_active' => true],
            ['quote' => 'Be kind to yourself. You\'re doing the best you can.', 'author' => 'Unknown', 'category' => 'self-compassion', 'is_active' => true],
            ['quote' => 'Self-compassion is simply giving the same kindness to ourselves that we would give to others.', 'author' => 'Christopher Germer', 'category' => 'self-compassion', 'is_active' => true],
            ['quote' => 'You are imperfect, you are wired for struggle, but you are worthy of love and belonging.', 'author' => 'Brené Brown', 'category' => 'self-compassion', 'is_active' => true],
            ['quote' => 'The most powerful relationship you will ever have is the relationship with yourself.', 'author' => 'Diane Von Furstenberg', 'category' => 'self-compassion', 'is_active' => true],
            ['quote' => 'Forgive yourself for what you couldn\'t do today and resolve to be better tomorrow.', 'author' => 'Unknown', 'category' => 'self-compassion', 'is_active' => true],
            ['quote' => 'Your best is going to look different each day.', 'author' => 'Unknown', 'category' => 'self-compassion', 'is_active' => true],
            ['quote' => 'Treat yourself with love and respect, and you will attract people who show you love and respect.', 'author' => 'Rhonda Byrne', 'category' => 'self-compassion', 'is_active' => true],
            ['quote' => 'You are deserving of your own forgiveness.', 'author' => 'Unknown', 'category' => 'self-compassion', 'is_active' => true],

            // Rest
            ['quote' => 'Rest and self-care are so important. When you take time to replenish your spirit, it allows you to serve others from the overflow.', 'author' => 'Eleanor Brownn', 'category' => 'rest', 'is_active' => true],
            ['quote' => 'Almost everything will work again if you unplug it for a few minutes, including you.', 'author' => 'Anne Lamott', 'category' => 'rest', 'is_active' => true],
            ['quote' => 'Taking a break can lead to breakthroughs.', 'author' => 'Russell Eric Dobda', 'category' => 'rest', 'is_active' => true],
            ['quote' => 'Don\'t underestimate the power of resting. It is not idleness. It is a vital part of your well-being.', 'author' => 'Unknown', 'category' => 'rest', 'is_active' => true],
            ['quote' => 'Your body and mind will thank you for the rest.', 'author' => 'Unknown', 'category' => 'rest', 'is_active' => true],
            ['quote' => 'In a world that is constantly moving, find your stillness.', 'author' => 'Unknown', 'category' => 'rest', 'is_active' => true],
            ['quote' => 'It\'s not selfish to love yourself, take care of yourself, and to make your happiness a priority. It\'s necessary.', 'author' => 'Mandy Hale', 'category' => 'rest', 'is_active' => true],
            ['quote' => 'Allow yourself to rest. You are not a machine.', 'author' => 'Unknown', 'category' => 'rest', 'is_active' => true],
            ['quote' => 'Sometimes the most important thing in a whole day is the rest we take between two deep breaths.', 'author' => 'Etty Hillesum', 'category' => 'rest', 'is_active' => true],
            ['quote' => 'A little bit of rest can make a big difference.', 'author' => 'Unknown', 'category' => 'rest', 'is_active' => true],

            // Mental-Health
            ['quote' => 'Your mental health is a priority. Your happiness is essential. Your self-care is a necessity.', 'author' => 'Unknown', 'category' => 'mental-health', 'is_active' => true],
            ['quote' => 'It\'s okay to feel unstable. It\'s okay to disassociate. It\'s okay to hide from the world. It\'s okay to need help. It\'s okay not to be okay. Your mental illness is not a personal failure.', 'author' => 'Unknown', 'category' => 'mental-health', 'is_active' => true],
            ['quote' => 'You don\'t have to be positive all the time. It\'s perfectly okay to feel sad, angry, annoyed, frustrated, scared, or anxious. Having feelings doesn\'t make you a \'negative person.\' It makes you human.', 'author' => 'Lori Deschene', 'category' => 'mental-health', 'is_active' => true],
            ['quote' => 'Mental health…is not a destination, but a process. It\'s about how you drive, not where you\'re going.', 'author' => 'Noam Shpancer', 'category' => 'mental-health', 'is_active' => true],
            ['quote' => 'The bravest thing I ever did was continuing my life when I wanted to die.', 'author' => 'Juliette Lewis', 'category' => 'mental-health', 'is_active' => true],
            ['quote' => 'Your illness does not define you. Your strength and courage does.', 'author' => 'Unknown', 'category' => 'mental-health', 'is_active' => true],
            ['quote' => 'My dark days made me strong. Or maybe I already was strong, and they made me prove it.', 'author' => 'Emery Lord', 'category' => 'mental-health', 'is_active' => true],
            ['quote' => 'Healing is not linear.', 'author' => 'Unknown', 'category' => 'mental-health', 'is_active' => true],
            ['quote' => 'You are not your illness.', 'author' => 'Unknown', 'category' => 'mental-health', 'is_active' => true],
            ['quote' => 'Your mental health journey is valid, even if it doesn\'t look like someone else\'s.', 'author' => 'Unknown', 'category' => 'mental-health', 'is_active' => true],
            // ... (adding many more quotes for each category)
            // Self-Love
            ['quote' => 'To love oneself is the beginning of a lifelong romance.', 'author' => 'Oscar Wilde', 'category' => 'self-love', 'is_active' => true],
            ['quote' => 'You yourself, as much as anybody in the entire universe, deserve your love and affection.', 'author' => 'Buddha', 'category' => 'self-love', 'is_active' => true],
            ['quote' => 'Owning our story and loving ourselves through that process is the bravest thing that we will ever do.', 'author' => 'Brené Brown', 'category' => 'self-love', 'is_active' => true],
            ['quote' => 'Be you, love you. All ways, always.', 'author' => 'Alexandra Elle', 'category' => 'self-love', 'is_active' => true],
            ['quote' => 'How you love yourself is how you teach others to love you.', 'author' => 'Rupi Kaur', 'category' => 'self-love', 'is_active' => true],

            // Hope
            ['quote' => 'Hope is being able to see that there is light despite all of the darkness.', 'author' => 'Desmond Tutu', 'category' => 'hope', 'is_active' => true],
            ['quote' => 'Once you choose hope, anything\'s possible.', 'author' => 'Christopher Reeve', 'category' => 'hope', 'is_active' => true],
            ['quote' => 'The darkest hours are just before the dawn.', 'author' => 'Proverb', 'category' => 'hope', 'is_active' => true],
            ['quote' => 'Even the darkest night will end and the sun will rise.', 'author' => 'Victor Hugo', 'category' => 'hope', 'is_active' => true],
            ['quote' => 'Where there is hope, there is faith. Where there is faith, miracles happen.', 'author' => 'Unknown', 'category' => 'hope', 'is_active' => true],

            // Strength
            ['quote' => 'You have power over your mind - not outside events. Realize this, and you will find strength.', 'author' => 'Marcus Aurelius', 'category' => 'strength', 'is_active' => true],
            ['quote' => 'The world breaks everyone, and afterward, some are strong at the broken places.', 'author' => 'Ernest Hemingway', 'category' => 'strength', 'is_active' => true],
            ['quote' => 'A hero is an ordinary individual who finds the strength to persevere and endure in spite of overwhelming obstacles.', 'author' => 'Christopher Reeve', 'category' => 'strength', 'is_active' => true],
            ['quote' => 'Strength does not come from winning. Your struggles develop your strengths.', 'author' => 'Arnold Schwarzenegger', 'category' => 'strength', 'is_active' => true],
            ['quote' => 'You are stronger than you seem, braver than you believe, and smarter than you think.', 'author' => 'A.A. Milne', 'category' => 'strength', 'is_active' => true],

            // Gratitude
            ['quote' => 'Gratitude is the healthiest of all human emotions. The more you express gratitude for what you have, the more likely you will have even more to express gratitude for.', 'author' => 'Zig Ziglar', 'category' => 'gratitude', 'is_active' => true],
            ['quote' => 'The more you are in a state of gratitude, the more you will attract things to be grateful for.', 'author' => 'Walt Disney', 'category' => 'gratitude', 'is_active' => true],
            ['quote' => 'Gratitude makes sense of our past, brings peace for today, and creates a vision for tomorrow.', 'author' => 'Melody Beattie', 'category' => 'gratitude', 'is_active' => true],
            ['quote' => 'When you are grateful, fear disappears and abundance appears.', 'author' => 'Tony Robbins', 'category' => 'gratitude', 'is_active' => true],
            ['quote' => 'Start each day with a grateful heart.', 'author' => 'Unknown', 'category' => 'gratitude', 'is_active' => true],

            // Calm
            ['quote' => 'Within you, there is a stillness and a sanctuary to which you can retreat at any time and be yourself.', 'author' => 'Hermann Hesse', 'category' => 'calm', 'is_active' => true],
            ['quote' => 'Breathe. Let go. And remind yourself that this very moment is the only one you know you have for sure.', 'author' => 'Oprah Winfrey', 'category' => 'calm', 'is_active' => true],
            ['quote' => 'Calmness is the cradle of power.', 'author' => 'Josiah Gilbert Holland', 'category' => 'calm', 'is_active' => true],
            ['quote' => 'The storm will pass. It can\'t rain forever.', 'author' => 'Unknown', 'category' => 'calm', 'is_active' => true],
            ['quote' => 'Find your inner peace and you will find your outer purpose.', 'author' => 'Unknown', 'category' => 'calm', 'is_active' => true],

            // Mindfulness
            ['quote' => 'The present moment is filled with joy and happiness. If you are attentive, you will see it.', 'author' => 'Thich Nhat Hanh', 'category' => 'mindfulness', 'is_active' => true],
            ['quote' => 'Wherever you are, be all there.', 'author' => 'Jim Elliot', 'category' => 'mindfulness', 'is_active' => true],
            ['quote' => 'The only thing that is ultimately real about your journey is the step that you are taking at this moment. That\'s all there ever is.', 'author' => 'Eckhart Tolle', 'category' => 'mindfulness', 'is_active' => true],
            ['quote' => 'Feelings are just visitors, let them come and go.', 'author' => 'Mooji', 'category' => 'mindfulness', 'is_active' => true],
            ['quote' => 'In a world full of doing, doing, doing, it\'s important to take a moment to just be.', 'author' => 'Unknown', 'category' => 'mindfulness', 'is_active' => true],
        ];

        foreach ($quotes as $quoteData) {
            MotivationalQuote::create($quoteData);
        }
    }
}

