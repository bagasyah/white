<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ucapan Spesial</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <script src="https://cdn.tailwindcss.com"></script>
        <style>
            .polaroid {
                background: white;
                padding: 1rem;
                padding-bottom: 3rem;
                box-shadow: 0 0.2rem 1.2rem rgba(0,0,0,0.2);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }
            .polaroid:nth-child(even) {
                transform: rotate(2deg);
            }
            .polaroid:nth-child(odd) {
                transform: rotate(-2deg);
            }
            .polaroid:hover {
                transform: scale(1.1) rotate(2deg);
                box-shadow: 0 0.5rem 2rem rgba(0,0,0,0.3);
                z-index: 10;
            }
            .memories {
                position: fixed;
                width: 100%;
                height: 100%;
                overflow: hidden;
                z-index: 0;
            }
            .memory {
                position: absolute;
                width: 200px;
                animation: float 3s ease-in-out infinite;
            }
            @keyframes float {
                0%, 100% {
                    transform: translateY(0);
                }
                50% {
                    transform: translateY(-10px);
                }
            }
            .text-glow {
                text-shadow: 0 0 10px rgba(0, 0, 0, 0.9), 0 0 20px rgba(0, 0, 0, 0.9);
            }
            .text-outline {
                color: white; /* Warna teks untuk hp */
                text-shadow: 
                    -1px -1px 0 black,  
                    1px -1px 0 black,
                    -1px 1px 0 black,
                    1px 1px 0 black; /* Garis tepi hitam untuk hp */
            }
            .text-normal {
                color: black; /* Warna teks untuk laptop */
                font-weight: normal; /* Menghilangkan bold */
            }
        </style>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const audio = document.getElementById('background-audio');
                const playPauseBtn = document.getElementById('play-pause-btn');

                // Memuat status audio
                if (localStorage.getItem('audioPlaying') === 'true') {
                    audio.currentTime = localStorage.getItem('audioCurrentTime') || 0;
                    audio.play();
                    playPauseBtn.innerHTML = '<i class="fas fa-pause"></i>'; // Ubah ikon menjadi pause
                }

                playPauseBtn.addEventListener('click', function() {
                    if (audio.paused) {
                        audio.play();
                        playPauseBtn.innerHTML = '<i class="fas fa-pause"></i>'; // Ubah ikon menjadi pause
                    } else {
                        audio.pause();
                        playPauseBtn.innerHTML = '<i class="fas fa-play"></i>'; // Ubah ikon menjadi play
                    }
                });

                // Event listeners untuk menyimpan status audio
                audio.addEventListener('play', function() {
                    localStorage.setItem('audioPlaying', 'true');
                });

                audio.addEventListener('pause', function() {
                    localStorage.setItem('audioPlaying', 'false');
                });

                audio.addEventListener('timeupdate', function() {
                    localStorage.setItem('audioCurrentTime', audio.currentTime);
                });
            });
        </script>
    </head>
    <body class="antialiased bg-gradient-to-br from-gray-100 to-gray-200 min-h-screen md:bg-gradient-to-br md:from-gray-100 md:to-gray-200">
        <!-- Background Photos -->
        <div class="memories">
            <!-- Ganti URL foto sesuai kebutuhan -->
            <div class="memory polaroid" style="top: 5%; left: 5%;">
                <img src="{{ asset('poto2.jpg') }}" alt="Memory 1" class="w-full h-auto">
            </div>
            <div class="memory polaroid" style="top: 15%; right: 10%;">
                <img src="{{ asset('poto2.jpg') }}" alt="Memory 2" class="w-full h-auto">
            </div>
            <div class="memory polaroid" style="bottom: 10%; left: 15%;">
                <img src="{{ asset('poto3.webp') }}" alt="Memory 3" class="w-full h-auto">
            </div>
            <div class="memory polaroid" style="bottom: 20%; right: 20%;">
                <img src="{{ asset('poto4.jpg') }}" alt="Memory 4" class="w-full h-auto">
            </div>
            <!-- <div class="memory polaroid" style="top: 40%; left: 30%;">
                <img src="{{ asset('poto.jpg') }}" alt="Memory 5" class="w-full h-auto">
            </div> -->
        </div>

        <!-- Main Content -->
        <div class="relative flex items-center justify-center min-h-screen px-4">
            <div class="relative z-10 max-w-md mx-auto px-4 py-8 text-center">
                <h1 class="text-4xl md:text-5xl mb-6 text-outline">
                    Untuk Kamu ❤️
                </h1>
                
                <div class="space-y-4 text-gray-700">
                    <p class="text-lg md:text-xl font-light italic text-outline">
                        "Setiap hari bersamamu adalah hadiah terindah yang pernah kumiliki"
                    </p>
                    
                    <div class="text-lg md:text-xl leading-relaxed max-w-2xl mx-auto">
                        <p class="mb-4 text-outline">
                            Terima kasih telah menjadi bagian terindah dalam hidupku. 
                            Kehadiranmu membuat setiap hariku lebih bermakna dan berwarna.
                        </p>
                        <p class="text-outline">
                            Semoga hari-harimu selalu dipenuhi kebahagiaan, 
                            tawa, dan momen-momen indah yang tak terlupakan.
                        </p>
                    </div>
                    
                    <div class="pt-1">
                        <!-- <p class="text-2xl md:text-3xl md:text-black text-outline">
                            Dengan Penuh Cinta ❤️
                        </p> -->
                        <p class="text-lg md:text-xl mt-0 text-outline">
                            - Dari Aku -
                        </p>
                    </div>
                    <!-- Tombol untuk menuju halaman ucapan -->
                    <div class="mt-3 relative z-30">
                        <a href="{{ url('ucapan') }}" class="inline-flex items-center justify-center bg-blue-500 text-white font-bold py-3 px-6 rounded-full shadow-lg hover:bg-blue-600 transition duration-300 transform hover:scale-110 w-full text-center">
                            <i class="fas fa-heart mr-2"></i> <!-- Ikon Cinta -->
                            Lanjut
                        </a>
                    </div>
                    <!-- Music Player -->
                    <div class="hidden z-20">
                        <audio id="background-audio" controls loop autoplay class="rounded-full bg-white/80 backdrop-blur-sm">
                            <source src="{{ asset('lagu1.mp3') }}" type="audio/mpeg">
                            Browser Anda tidak mendukung pemutaran audio.
                        </audio>
                    </div>
                    <div class="fixed top-4 right-4 z-30">
                        <button id="play-pause-btn" class="bg-purple-600 text-white font-semibold py-2 px-4 rounded-lg shadow hover:bg-purple-700 transition duration-300">
                            <i class="fas fa-play"></i> <!-- Ikon Play -->
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
