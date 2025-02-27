<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Question</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <script src="https://cdn.tailwindcss.com"></script>
        <style>
            body {
                background: linear-gradient(270deg, #f3e7e9, #e3eeff);
                background-size: 400% 400%;
                animation: gradient 15s ease infinite;
                position: relative;
                overflow: hidden;
            }
            @keyframes gradient {
                0% {
                    background-position: 0% 50%;
                }
                50% {
                    background-position: 100% 50%;
                }
                100% {
                    background-position: 0% 50%;
                }
            }
            .fade-in {
                animation: fadeIn 1s ease-in-out;
            }
            @keyframes fadeIn {
                from {
                    opacity: 0;
                }
                to {
                    opacity: 1;
                }
            }
            .balloon {
                position: absolute;
                bottom: -100px;
                animation: float 10s ease-in-out infinite;
                opacity: 0.7;
            }
            @keyframes float {
                0% {
                    transform: translateY(0);
                }
                50% {
                    transform: translateY(-30px);
                }
                100% {
                    transform: translateY(0);
                }
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
    <body class="antialiased min-h-screen">
        <div class="relative flex items-center justify-center min-h-screen px-4">
            <div class="relative z-10 max-w-md mx-auto px-4 py-8 text-center">
                <h1 class="text-4xl md:text-5xl font-bold text-purple-600 mb-4">
                    Apakah kamu sayang aku?
                </h1>
                <div class="space-y-4 text-purple-700">
                    <p class="text-lg md:text-xl font-bold italic cursor-pointer" id="yes-btn">
                        Iya
                    </p>
                    <p class="text-lg md:text-xl font-bold leading-relaxed" id="no-btn">
                        Tidak
                    </p>
                </div>
                <div class="mt-6 relative z-30">
                    <a href="{{ url('/') }}" class="inline-flex items-center justify-center bg-blue-500 text-white font-bold py-3 px-6 rounded-full shadow-lg hover:bg-blue-600 transition duration-300 transform hover:scale-110 w-full text-center">
                        <i class="fas fa-arrow-left mr-2"></i>  
                        Kembali
                    </a>
                </div>
                <img src="{{ asset('poto1.jpg') }}" class="balloon" style="left: 15%; transform: translateX(-50%); width: 150px; animation-delay: 0s; pointer-events: none;" />
                
                <img src="{{ asset('poto2.jpg') }}" class="balloon" style="left: 55%; transform: translateX(-50%); width: 170px; animation-delay: 1s; pointer-events: none;" />
               
                <img src="{{ asset('poto4.jpg') }}" class="balloon" style="left: 25%; transform: translateX(-50%); width: 160px; animation-delay: 4s; pointer-events: none;" />
            </div>
        </div>
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
        <div id="custom-confirm" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <p class="text-lg md:text-xl font-light">Memang nya iya?</p>
                <button id="yes-custom" class="bg-purple-600 text-white py-2 px-4 rounded mt-5 mr-2">Iyaaa</button>
                <button id="no-custom" class="bg-red-300 text-black py-2 px-4 rounded">Gk</button>
            </div>
        </div>
        <div id="message-popup" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <p class="text-lg md:text-xl font-light">Telepon sayang kamu sekarang dan ngomong ke dia, betapa kamu sayang banget ke dia!</p>
                <button id="close-message-popup" class="bg-purple-600 text-white py-2 px-4 rounded mt-5 mx-auto block">Tutup</button>
            </div>
        </div>
        <div id="no-confirm" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <p class="text-lg md:text-xl font-light">Yang bener sayangg?</p>
                <button id="no-kok" class="bg-red-300 text-black py-2 px-4 rounded mt-5 mr-2">Gk kok</button>
                <button id="sayang-kok" class="bg-purple-600 text-white py-2 px-4 rounded mt-5">Sayang kok</button>
            </div>
        </div>
        
        <script>
            document.getElementById('yes-btn').addEventListener('click', function() {
                document.getElementById('custom-confirm').classList.remove('hidden');
            });

            document.getElementById('yes-custom').addEventListener('click', function() {
                // Menampilkan pop-up baru
                document.getElementById('message-popup').classList.remove('hidden');
            });

            document.getElementById('no-custom').addEventListener('click', function() {
                document.getElementById('no-confirm').classList.remove('hidden');
            });

            document.getElementById('close-message-popup').addEventListener('click', function() {
                window.location.href = '{{ url('/ucapan') }}'; // Arahkan ke halaman ucapan
            });

            document.getElementById('no-btn').addEventListener('click', function() {
                document.getElementById('no-confirm').classList.remove('hidden');
            });

            document.getElementById('no-kok').addEventListener('click', function() {
                window.location.href = '{{ url('/ucapan') }}'; // Arahkan ke halaman ucapan
            });

            document.getElementById('sayang-kok').addEventListener('click', function() {
                window.location.href = '{{ url('/ucapan') }}'; // Arahkan ke halaman ucapan
            });
        </script>
    </body>
</html>
