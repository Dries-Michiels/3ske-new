@extends('layouts.public')

@section('content')
<!-- Hero Slideshow -->
<div class="relative w-full h-screen overflow-hidden">
    <!-- Slideshow Images -->
    <div class="slideshow-container absolute inset-0">
        <div class="slide active">
            <img src="{{ asset('images/slideshow/slide1.jpg') }}" alt="DJ 3SKE Performance" class="w-full h-full object-cover">
        </div>
        <div class="slide">
            <img src="{{ asset('images/slideshow/slide2.jpg') }}" alt="DJ 3SKE Performance" class="w-full h-full object-cover">
        </div>
        <div class="slide">
            <img src="{{ asset('images/slideshow/slide3.jpg') }}" alt="DJ 3SKE Performance" class="w-full h-full object-cover">
        </div>
    </div>

    <!-- Overlay for better text readability -->
    <div class="absolute inset-0 bg-black bg-opacity-30"></div>

    <!-- Navigation Dots -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 flex space-x-3 z-10">
        <button class="dot active" onclick="currentSlide(1)"></button>
        <button class="dot" onclick="currentSlide(2)"></button>
        <button class="dot" onclick="currentSlide(3)"></button>
    </div>
</div>

<!-- About Section -->
<div class="bg-neutral-900 py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row items-center gap-12">
            <!-- Profile Image (Left) -->
            <div class="flex-shrink-0">
                <img src="{{ asset('images/about-3ske.jpg') }}" alt="DJ 3SKE" class="w-64 h-64 rounded-full object-cover border-4 border-white shadow-2xl">
            </div>
            
            <!-- About Text (Right) -->
            <div class="flex-1">
                <h2 class="text-4xl font-bold text-white mb-6" style="font-family: 'Gagalin', sans-serif;">About</h2>
                <p class="text-gray-300 text-lg leading-relaxed">
                    Meet <span class="font-bold text-white">3SKE</span>, a 19-year-old DJ from Dendermonde. He has already performed at Flanders Open Rugby and various parties, and his energetic performances and unique musical style attract both experienced clubbers and new listeners. With a mix of house, techno, and EDM, he creates a refreshing sound. He's also working on his own music and dreams of reaching a wide audience. With his youthful energy and dedication to his craft, 3SKE is determined to conquer the world of electronic music. Keep an eye on this DJ from Dendermonde, because he's ready to make people all over the world dance to his infectious beats.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Latest Mix Section -->
<div class="bg-black py-20">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10">
            <h2 class="text-4xl font-bold text-white mb-4" style="font-family: 'Gagalin', sans-serif;">Latest Mix</h2>
            <p class="text-gray-400 text-lg">Check out my newest set</p>
        </div>
        
        <!-- SoundCloud Embed -->
        <div class="max-w-3xl mx-auto">
            <div class="bg-neutral-800 rounded-lg p-6 border border-neutral-700">
                <iframe 
                    width="100%" 
                    height="166" 
                    scrolling="no" 
                    frameborder="no" 
                    allow="autoplay" 
                    src="https://w.soundcloud.com/player/?url=https%3A//soundcloud.com/3ske/3ske-flanders-open-rugby-2023&color=%23262626&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true"
                    class="w-full">
                </iframe>
                <div class="mt-4 text-center">
                    <a href="https://soundcloud.com/3ske" target="_blank" class="inline-flex items-center text-white hover:text-gray-300 font-semibold">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M7 17.939h-1v-8.068c.308-.231.639-.429 1-.566v8.634zm3 0h1v-9.224c-.229.265-.443.548-.621.857l-.379-.184v8.551zm-2 0h1v-8.848c-.508-.079-.623-.05-1-.01v8.858zm-4 0h1v-7.02c-.312.458-.555.971-.692 1.535l-.308-.182v5.667zm-3-5.25c-.606.547-1 1.354-1 2.268 0 .914.394 1.721 1 2.268v-4.536zm18.879-.671c-.204-2.837-2.404-5.079-5.117-5.079-1.022 0-1.964.328-2.762.877v10.123h9.089c1.607 0 2.911-1.393 2.911-3.106 0-1.714-1.304-3.106-2.911-3.106h-.21z"/>
                        </svg>
                        More on SoundCloud
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contact CTA Section -->
<div class="bg-neutral-900 py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-5xl font-bold text-white mb-6" style="font-family: 'Gagalin', sans-serif;">BOOK 3SKE</h2>
        <p class="text-gray-300 text-2xl mb-10 leading-relaxed">
            Ready to bring the energy to your event?
        </p>
        <a href="{{ route('contact') }}" class="inline-block px-10 py-4 bg-white text-black text-lg font-bold rounded-lg hover:bg-gray-200 transition-colors shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-200" style="font-family: 'Gagalin', sans-serif; letter-spacing: 0.05em;">
            CONTACT ME
        </a>
    </div>
</div>

<style>
.slide {
    display: none;
    animation: fadeIn 1s ease-in-out;
}

.slide.active {
    display: block;
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

.dot {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background-color: rgba(255, 255, 255, 0.5);
    border: 2px solid white;
    cursor: pointer;
    transition: all 0.3s ease;
}

.dot.active {
    background-color: white;
    transform: scale(1.2);
}

.dot:hover {
    background-color: rgba(255, 255, 255, 0.8);
}
</style>

<script>
let slideIndex = 0;
let slideTimer;

function showSlides() {
    let slides = document.getElementsByClassName("slide");
    let dots = document.getElementsByClassName("dot");
    
    // Hide all slides
    for (let i = 0; i < slides.length; i++) {
        slides[i].classList.remove("active");
    }
    
    // Remove active from all dots
    for (let i = 0; i < dots.length; i++) {
        dots[i].classList.remove("active");
    }
    
    // Increment index
    slideIndex++;
    if (slideIndex > slides.length) {
        slideIndex = 1;
    }
    
    // Show current slide
    slides[slideIndex - 1].classList.add("active");
    dots[slideIndex - 1].classList.add("active");
    
    // Change slide every 4 seconds
    slideTimer = setTimeout(showSlides, 4000);
}

function currentSlide(n) {
    clearTimeout(slideTimer);
    slideIndex = n - 1;
    showSlides();
}

// Start slideshow
document.addEventListener('DOMContentLoaded', function() {
    showSlides();
});
</script>
@endsection
