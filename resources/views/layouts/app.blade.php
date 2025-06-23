<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Memento') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
        }

        #bg-wrapper {
            position: fixed;
            inset: 0;
            z-index: 0;
            overflow: hidden;
        }

        .bg-image {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: opacity 0.8s ease-in-out;
            opacity: 0;
            z-index: 0;
        }

        .bg-image.active {
            opacity: 1;
            z-index: 1;
        }

        #bg-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 2;
        }

        .app-container {
            position: relative;
            z-index: 10;
            min-height: 100vh;
        }
    </style>
</head>
<body class="text-white">

    <div id="bg-wrapper">
        <img id="bg1" class="bg-image active" src="{{ asset('images/background.png') }}" alt="Background A">
        <img id="bg2" class="bg-image" src="" alt="Background B">
        <div id="bg-overlay"></div>
    </div>

    <div class="app-container">
        <x-sidebar />
        <main class="lg:pl-[21rem] p-8">
            {{ $slot }}
        </main>
    </div>

    <x-mobile-bottom-nav />
    
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        window.addEventListener('load', function () {
            const sliderElement = document.querySelector('.featured-slider');
            const bg1 = document.getElementById('bg1');
            const bg2 = document.getElementById('bg2');

            if (sliderElement && bg1 && bg2) {
                try {
                    const swiper = new Swiper(sliderElement, {
                        loop: true,
                        autoplay: {
                            delay: 4000,
                            disableOnInteraction: false,
                        },
                        effect: 'fade',
                        fadeEffect: {
                            crossFade: true
                        },
                    });

                    function changeBackground() {
                        const activeSlide = swiper.slides[swiper.activeIndex];
                        if (!activeSlide) return;

                        const newUrl = activeSlide.getAttribute('data-background');
                        if (!newUrl) return;

                        const isBg1Active = bg1.classList.contains('active');
                        const current = isBg1Active ? bg1 : bg2;
                        const next = isBg1Active ? bg2 : bg1;

                        const temp = new Image();
                        temp.src = newUrl;

                        temp.onload = () => {
                            next.src = newUrl;
                            next.classList.add('active');
                            current.classList.remove('active');
                        };
                    }

                    changeBackground();
                    swiper.on('slideChange', changeBackground);
                } catch (error) {
                    console.error('Error saat inisialisasi Swiper:', error);
                }
            }
        });
    </script>
</body>
</html>
