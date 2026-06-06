<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ቅድሚያ ለጤናዎ — Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,opsz,wght@0,6..72,200..800;1,6..72,200..800&family=Geist:wght@100..900&display=swap" rel="stylesheet">
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            sans: ['Geist', 'sans-serif'],
            serif: ['Newsreader', 'serif'],
          }
        }
      }
    }
  </script>
  <style>
    ::selection {
      background: rgba(16,185,129,0.2);
      color: #064e3b;
    }
    body { font-family: 'Geist', sans-serif; background: #ffffff; color: #0f172a; }

    /* Grid background */
    .grid-bg-light {
      background-image: linear-gradient(to right, #e2e8f0 1px, transparent 1px),
                        linear-gradient(to bottom, #e2e8f0 1px, transparent 1px);
      background-size: 40px 40px;
      mask-image: radial-gradient(circle at center, black, transparent 80%);
      -webkit-mask-image: radial-gradient(circle at center, black, transparent 80%);
      opacity: 0.5;
    }

    /* Toast notification */
    @keyframes toast-in {
      from { transform: translateY(20px); opacity: 0; }
      to { transform: translateY(0); opacity: 1; }
    }
    @keyframes toast-out {
      from { transform: translateY(0); opacity: 1; }
      to { transform: translateY(20px); opacity: 0; }
    }
    .toast-enter { animation: toast-in 0.4s ease forwards; }
    .toast-exit { animation: toast-out 0.4s ease forwards; }

    /* Fade in animation */
    @keyframes fade-in-up {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .fade-in-anim { animation: fade-in-up 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
    .fade-in-delay-1 { animation-delay: 0.1s; opacity: 0; }
    .fade-in-delay-2 { animation-delay: 0.2s; opacity: 0; }
    .fade-in-delay-3 { animation-delay: 0.3s; opacity: 0; }
  </style>
</head>
<body class="antialiased min-h-screen overflow-x-hidden flex flex-col lg:flex-row">

  <!-- Toast Container -->
  <div id="toast-container" class="fixed bottom-6 right-6 z-[100] flex flex-col gap-3"></div>

  <!-- ========== LEFT PANEL - BRANDING ========== -->
  <div class="hidden lg:flex w-full lg:w-1/2 min-h-screen bg-emerald-600 relative overflow-hidden flex-col justify-between p-12">
    <!-- Background Decorations -->
    <div class="absolute top-1/4 left-1/4 w-[600px] h-[600px] bg-emerald-500/50 rounded-full blur-[100px] pointer-events-none"></div>
    <div class="absolute bottom-1/4 right-1/4 w-[400px] h-[400px] bg-teal-400/30 rounded-full blur-[80px] pointer-events-none"></div>
    <div class="absolute inset-0 grid-bg-light pointer-events-none opacity-20"></div>

    <!-- Top Logo -->
    <div class="relative z-10">
      <a href="#" class="flex items-center gap-2.5">
        <div class="w-10 h-10 rounded-sm bg-white/20 backdrop-blur-sm flex items-center justify-center border border-white/10">
          <i class="fa-solid fa-heart-pulse text-xl text-white"></i>
        </div>
        <span class="text-white font-semibold text-2xl tracking-tight">ቅድሚያ ለጤናዎ</span>
      </a>
    </div>

    <!-- Center Content -->
    <div class="relative z-10 space-y-8">
      <h2 class="text-5xl font-medium leading-tight tracking-tight text-white fade-in-anim">
        Your health journey,<br><span class="font-serif italic text-emerald-200">simplified.</span>
      </h2>
      <p class="text-emerald-100/80 text-lg font-light leading-relaxed max-w-md fade-in-anim fade-in-delay-1">
        Monitor medications, follow meal plans, and stay connected with your care team — all in one place.
      </p>
      
      <!-- Testimonial / Stats -->
      <div class="bg-white/10 backdrop-blur-md border border-white/10 rounded-sm p-6 max-w-md fade-in-anim fade-in-delay-2">
        <div class="flex items-center gap-3 mb-3">
          <div class="flex -space-x-2">
            <div class="w-8 h-8 bg-emerald-300 rounded-full border-2 border-emerald-600 flex items-center justify-center text-xs font-bold text-emerald-800">JW</div>
            <div class="w-8 h-8 bg-teal-300 rounded-full border-2 border-emerald-600 flex items-center justify-center text-xs font-bold text-teal-800">SM</div>
            <div class="w-8 h-8 bg-green-300 rounded-full border-2 border-emerald-600 flex items-center justify-center text-xs font-bold text-green-800">AK</div>
          </div>
          <div class="text-xs text-emerald-100 font-medium">2,100+ patients on track</div>
        </div>
        <div class="flex items-center gap-1 mb-1">
          <i class="fa-solid fa-star text-yellow-300 text-xs"></i>
          <i class="fa-solid fa-star text-yellow-300 text-xs"></i>
          <i class="fa-solid fa-star text-yellow-300 text-xs"></i>
          <i class="fa-solid fa-star text-yellow-300 text-xs"></i>
          <i class="fa-solid fa-star text-yellow-300 text-xs"></i>
        </div>
        <p class="text-sm text-emerald-100/80 font-light leading-relaxed">"VitaTrack helped me reduce my missed medications by 90%. I feel more in control of my recovery."</p>
        <div class="text-xs text-emerald-200 font-medium mt-2">— James Wilson, Cardiac Patient</div>
      </div>
    </div>

    <!-- Bottom -->
    <div class="relative z-10 text-xs text-emerald-200/50">
      © 2025 VitaTrack Health Systems. All rights reserved.
    </div>
  </div>

  <!-- ========== RIGHT PANEL - LOGIN FORM ========== -->
  <div class="w-full lg:w-1/2 min-h-screen flex flex-col justify-center items-center px-6 sm:px-12 py-12 bg-white relative overflow-y-auto">
    <!-- Background decoration -->
    <div class="absolute top-0 right-0 w-[400px] h-[400px] bg-emerald-50/50 rounded-full blur-[100px] pointer-events-none"></div>
    
    <div class="w-full max-w-md relative z-10">
      
      <!-- Mobile Logo -->
      <div class="lg:hidden flex items-center gap-2.5 mb-12">
        <div class="w-9 h-9 rounded-sm bg-emerald-500 flex items-center justify-center">
          <i class="fa-solid fa-heart-pulse text-base text-white"></i>
        </div>
        <span class="text-slate-900 font-semibold text-xl tracking-tight">ቅድሚያ ለጤናዎ</span>
      </div>

      <!-- Header -->
      <div class="mb-10">
        <h1 class="text-3xl sm:text-4xl font-medium tracking-tight text-slate-900 mb-3 fade-in-anim">
          Welcome back
        </h1>
        <p class="text-slate-500 font-light text-base fade-in-anim fade-in-delay-1">
          Sign in to access your health dashboard and stay on track.
        </p>
      </div>

      <!-- Login Form -->
      <form id="login-form" onsubmit="handleLoginSubmit(event)" class="space-y-5 fade-in-anim fade-in-delay-2">
        <!-- Email -->
        <div>
          <label class="text-xs font-medium text-slate-500 uppercase tracking-wider mb-2 block">Email Address</label>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
              <i class="fa-regular fa-envelope text-slate-300"></i>
            </div>
            <input type="email" id="email" placeholder="james@vitatrack.health" required class="w-full bg-white border border-slate-200 focus:border-emerald-300 focus:ring-2 focus:ring-emerald-100 rounded-sm pl-11 pr-4 py-3 text-sm text-slate-900 placeholder-slate-300 outline-none transition-all duration-300">
          </div>
        </div>

        <!-- Password -->
        <div>
          <label class="text-xs font-medium text-slate-500 uppercase tracking-wider mb-2 block">Password</label>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
              <i class="fa-solid fa-lock text-slate-300 text-sm"></i>
            </div>
            <input type="password" id="password" placeholder="Enter your password" required class="w-full bg-white border border-slate-200 focus:border-emerald-300 focus:ring-2 focus:ring-emerald-100 rounded-sm pl-11 pr-12 py-3 text-sm text-slate-900 placeholder-slate-300 outline-none transition-all duration-300">
            <button type="button" onclick="togglePasswordVisibility()" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-slate-600 transition-colors">
              <i class="fa-regular fa-eye" id="eye-icon"></i>
            </button>
          </div>
        </div>

        <!-- Remember & Forgot -->
        <div class="flex items-center justify-between">
          <label class="flex items-center gap-2 cursor-pointer group">
            <input type="checkbox" class="w-4 h-4 rounded-sm border-slate-300 text-emerald-500 focus:ring-emerald-200 transition-all">
            <span class="text-sm text-slate-500 group-hover:text-slate-700 transition-colors">Remember me</span>
          </label>
          <a href="#" class="text-sm font-medium text-emerald-600 hover:text-emerald-700 transition-colors hover:underline">
            Forgot password?
          </a>
        </div>

        <!-- Submit Button -->
        <button type="submit" id="submit-btn" class="w-full bg-emerald-500 hover:bg-emerald-600 text-white font-bold text-sm py-4 rounded-sm transition-all duration-300 hover:scale-[1.02] hover:shadow-[0_0_40px_-10px_rgba(16,185,129,0.5)] flex items-center justify-center gap-2">
          Sign In
          <i class="fa-solid fa-arrow-right text-xs"></i>
        </button>
      </form>

    </div>
  </div>

  <!-- ========== JAVASCRIPT ========== -->
  <script>
    // ---- Toast Notification System ----
    function showToast(message, type = 'info') {
      const container = document.getElementById('toast-container');
      const toast = document.createElement('div');
      
      const iconMap = {
        'info': 'fa-solid fa-circle-info',
        'success': 'fa-solid fa-circle-check',
        'error': 'fa-solid fa-circle-exclamation'
      };
      const colorMap = {
        'info': 'text-emerald-500',
        'success': 'text-green-500',
        'error': 'text-red-500'
      };

      toast.className = 'toast-enter flex items-center gap-3 bg-white border border-slate-200 rounded-sm px-5 py-4 shadow-xl max-w-sm';
      toast.innerHTML = `
        <i class="${iconMap[type]} ${colorMap[type]}"></i>
        <span class="text-sm text-slate-700">${message}</span>
      `;
      
      container.appendChild(toast);

      setTimeout(() => {
        toast.classList.remove('toast-enter');
        toast.classList.add('toast-exit');
        setTimeout(() => toast.remove(), 400);
      }, 4000);
    }

    // ---- Password Visibility Toggle ----
    function togglePasswordVisibility() {
      const passwordInput = document.getElementById('password');
      const eyeIcon = document.getElementById('eye-icon');
      
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeIcon.classList.remove('fa-regular', 'fa-eye');
        eyeIcon.classList.add('fa-regular', 'fa-eye-slash');
      } else {
        passwordInput.type = 'password';
        eyeIcon.classList.remove('fa-regular', 'fa-eye-slash');
        eyeIcon.classList.add('fa-regular', 'fa-eye');
      }
    }
  </script>
</body>
</html>