<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM Giriş</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .animate-gradient {
            background-size: 400%;
            -webkit-animation: gradient 15s ease infinite;
            animation: gradient 15s ease infinite;
        }
        
        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .eye-container {
            position: relative;
            width: 120px;
            height: 120px;
            margin: 0 auto;
        }

        .eye {
            width: 120px;
            height: 120px;
            background: white;
            border-radius: 50%;
            position: relative;
            border: 2px solid #4f46e5;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .eye:hover {
            transform: scale(1.1);
        }

        .pupil {
            width: 40px;
            height: 40px;
            background: #4f46e5;
            border-radius: 50%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            transition: all 0.1s ease;
        }

        .eye-shine {
            width: 15px;
            height: 15px;
            background: white;
            border-radius: 50%;
            position: absolute;
            top: 25%;
            left: 25%;
        }

        .eye-blink {
            animation: blink 4s infinite;
        }

        @keyframes blink {
            0% { transform: scaleY(1); }
            95% { transform: scaleY(1); }
            97% { transform: scaleY(0.1); }
            99% { transform: scaleY(1); }
            100% { transform: scaleY(1); }
        }

        .bg-circles::before {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            top: -50px;
            right: -100px;
            animation: float 6s ease-in-out infinite;
        }

        .bg-circles::after {
            content: '';
            position: absolute;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            bottom: -50px;
            left: -50px;
            animation: float 8s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(10deg); }
        }
    </style>
</head>
<body class="bg-gradient-to-br from-indigo-600 via-blue-500 to-purple-500 animate-gradient min-h-screen flex flex-col items-center justify-center p-4 relative overflow-hidden bg-circles">
    <div class="absolute inset-0 bg-black opacity-10"></div>
    
    <div class="bg-white/95 backdrop-blur-sm rounded-2xl shadow-2xl w-full max-w-md p-8 relative z-10">
        <!-- Göz Logosu -->
        <div class="mb-8">
            <div class="eye-container">
                <div class="eye eye-blink">
                    <div class="pupil">
                        <div class="eye-shine"></div>
                    </div>
                </div>
            </div>
            <h1 class="text-2xl font-bold text-center text-gray-800 mt-6 mb-2">CRM Sistemine Hoş Geldiniz</h1>
            <p class="text-center text-gray-600">Lütfen hesabınıza giriş yapın</p>
        </div>

        <form action="{{ route('login.post') }}" method="POST" class="space-y-6">
            @csrf
            <!-- Email Alanı -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">E-posta Adresi</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-envelope text-gray-400"></i>
                    </div>
                    <input type="email" id="email" name="email" required 
                           class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600"
                           value="{{ old('email') }}" placeholder="ornek@email.com">
                </div>
                @error('email')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Şifre Alanı -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Şifre</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-lock text-gray-400"></i>
                    </div>
                    <input type="password" id="password" name="password" required 
                           class="block w-full pl-10 pr-10 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600">
                    <button type="button" onclick="togglePassword()"
                            class="absolute inset-y-0 right-0 pr-3 flex items-center">
                        <i id="passwordToggleIcon" class="fas fa-eye-slash text-gray-400 hover:text-gray-600"></i>
                    </button>
                </div>
                @error('password')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Beni Hatırla -->
            <div class="flex items-center">
                <input type="checkbox" id="remember" name="remember" 
                       class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                <label for="remember" class="ml-2 block text-sm text-gray-700">
                    Beni Hatırla
                </label>
            </div>

            <!-- Giriş Butonu -->
            <button type="submit" 
                    class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
                <i class="fas fa-sign-in-alt mr-2"></i>
                Giriş Yap
            </button>
        </form>

        <!-- Alt Bilgi -->
        <div class="mt-6 text-center text-sm text-gray-600">
            <p>Teknik destek için: <a href="mailto:support@example.com" class="text-indigo-600 hover:text-indigo-800">support@example.com</a></p>
        </div>
    </div>

    <!-- Footer -->
    <div class="mt-8 text-center text-white/80 text-sm">
        <p>Developed by <a href="https://github.com/cagri" target="_blank" rel="noopener noreferrer" 
            class="font-medium hover:text-white transition-colors duration-200">Çağrı Açıkgöz</a></p>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const passwordToggleIcon = document.getElementById('passwordToggleIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordToggleIcon.classList.remove('fa-eye-slash');
                passwordToggleIcon.classList.add('fa-eye');
            } else {
                passwordInput.type = 'password';
                passwordToggleIcon.classList.remove('fa-eye');
                passwordToggleIcon.classList.add('fa-eye-slash');
            }
        }

        window.onload = function() {
            const eye = document.querySelector('.eye');
            const pupil = document.querySelector('.pupil');
            const eyeArea = eye.getBoundingClientRect();
            const pupilRange = 15;

            document.addEventListener('mousemove', (e) => {
                const mouseX = e.clientX;
                const mouseY = e.clientY;
                
                const eyeCenterX = eyeArea.left + eyeArea.width / 2;
                const eyeCenterY = eyeArea.top + eyeArea.height / 2;
                
                const angle = Math.atan2(mouseY - eyeCenterY, mouseX - eyeCenterX);
                
                const pupilX = Math.cos(angle) * pupilRange;
                const pupilY = Math.sin(angle) * pupilRange;
                
                pupil.style.transform = `translate(calc(-50% + ${pupilX}px), calc(-50% + ${pupilY}px))`;
            });
        }
    </script>
</body>
</html> 