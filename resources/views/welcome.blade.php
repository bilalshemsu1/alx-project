<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ቅድሚያ ለጤናዎ</title>
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
    html { scroll-behavior: smooth; }
    body { font-family: 'Geist', sans-serif; background: #ffffff; color: #0f172a; }

    /* Scroll Reveal */
    .reveal {
      opacity: 0;
      transform: translateY(30px);
      filter: blur(8px);
      transition: all 1s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .reveal.visible {
      opacity: 1;
      transform: translateY(0);
      filter: blur(0);
    }
    .reveal-delay-1 { transition-delay: 100ms; }
    .reveal-delay-2 { transition-delay: 200ms; }
    .reveal-delay-3 { transition-delay: 300ms; }
    .reveal-delay-4 { transition-delay: 400ms; }

    /* Text reveal animation */
    @keyframes text-slide-up {
      from {
        clip-path: polygon(0 0, 100% 0, 100% 0, 0 0);
        transform: translateY(100%);
      }
      to {
        clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
        transform: translateY(0);
      }
    }
    .text-reveal-anim {
      animation: text-slide-up 1.2s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }
    .text-reveal-wrap { overflow: hidden; }

    /* Grid background */
    .grid-bg-light {
      background-image: linear-gradient(to right, #e2e8f0 1px, transparent 1px),
                        linear-gradient(to bottom, #e2e8f0 1px, transparent 1px);
      background-size: 40px 40px;
      mask-image: radial-gradient(circle at center, black, transparent 80%);
      -webkit-mask-image: radial-gradient(circle at center, black, transparent 80%);
      opacity: 0.4;
    }

    /* Marquee */
    @keyframes scroll-marquee {
      from { transform: translateX(0); }
      to { transform: translateX(-50%); }
    }
    .marquee-track {
      animation: scroll-marquee 40s linear infinite;
    }
    .marquee-mask {
      mask-image: linear-gradient(to right, transparent, black 20%, black 80%, transparent);
      -webkit-mask-image: linear-gradient(to right, transparent, black 20%, black 80%, transparent);
    }

    /* Pulse ring */
    @keyframes pulse-ring {
      0% { transform: scale(1); opacity: 0.6; }
      100% { transform: scale(1.8); opacity: 0; }
    }
    .pulse-ring::before {
      content: '';
      position: absolute;
      inset: -4px;
      border-radius: 50%;
      border: 2px solid #10b981;
      animation: pulse-ring 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }

    /* Nav active link */
    .nav-link { position: relative; }
    .nav-link::after {
      content: '';
      position: absolute;
      bottom: -4px;
      left: 50%;
      width: 0;
      height: 2px;
      background: #10b981;
      transition: all 0.3s ease;
      transform: translateX(-50%);
    }
    .nav-link:hover::after { width: 100%; }

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

    /* Progress bar fill */
    @keyframes fill-bar {
      from { width: 0; }
    }
    .fill-anim { animation: fill-bar 1.5s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
  </style>
</head>
<body class="antialiased">

  <!-- Toast Container -->
  <div id="toast-container" class="fixed bottom-6 right-6 z-[100] flex flex-col gap-3"></div>

  <!-- ========== NAVIGATION ========== -->
  <nav class="fixed top-0 left-0 right-0 z-50 px-6 py-5 transition-all duration-300">
    <div class="max-w-6xl mx-auto flex items-center justify-between">
      <!-- Logo -->
      <a href="#home" class="flex items-center gap-2.5 group">
        <div class="w-8 h-8 rounded-sm bg-emerald-500 flex items-center justify-center transition-all duration-300 group-hover:scale-110">
          <i class="fa-solid fa-heart-pulse text-sm text-white"></i>
        </div>
        <span class="text-slate-900 font-semibold text-lg tracking-tight">ቅድሚያ ለጤናዎ</span>
      </a>

      <!-- Nav Links (Desktop) -->
      <div class="hidden md:flex items-center gap-8">
        <a href="#home" class="nav-link text-sm font-medium text-slate-500 hover:text-slate-900 transition-colors duration-300">Home</a>
        <a href="#features" class="nav-link text-sm font-medium text-slate-500 hover:text-slate-900 transition-colors duration-300">Features</a>
        <a href="#about" class="nav-link text-sm font-medium text-slate-500 hover:text-slate-900 transition-colors duration-300">About</a>
        <a href="#contact" class="nav-link text-sm font-medium text-slate-500 hover:text-slate-900 transition-colors duration-300">Contact</a>
      </div>

      <!-- CTA Button -->
      <div class="flex items-center gap-4">
        <a href="#features" class="hidden sm:inline-flex items-center gap-2 text-sm font-medium text-emerald-600 hover:text-emerald-700 transition-colors duration-300">
          See How It Works
          <i class="fa-solid fa-arrow-right text-xs"></i>
        </a>
        <button onclick="showToast('Welcome! Demo mode is active.')" class="bg-emerald-500 hover:bg-emerald-600 text-white text-sm font-semibold px-5 py-2.5 rounded-sm transition-all duration-300 hover:scale-105 hover:shadow-[0_0_30px_-8px_rgba(16,185,129,0.5)]">
          Get Started
        </button>
        <!-- Mobile menu toggle -->
        <button id="mobile-menu-btn" class="md:hidden text-slate-700" onclick="toggleMobileMenu()">
          <i class="fa-solid fa-bars text-xl"></i>
        </button>
      </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden mt-4 bg-white/95 backdrop-blur-xl border border-slate-200 rounded-sm p-6 shadow-xl">
      <div class="flex flex-col gap-4">
        <a href="#home" onclick="toggleMobileMenu()" class="text-sm font-medium text-slate-500 hover:text-slate-900 transition-colors">Home</a>
        <a href="#features" onclick="toggleMobileMenu()" class="text-sm font-medium text-slate-500 hover:text-slate-900 transition-colors">Features</a>
        <a href="#about" onclick="toggleMobileMenu()" class="text-sm font-medium text-slate-500 hover:text-slate-900 transition-colors">About</a>
        <a href="#contact" onclick="toggleMobileMenu()" class="text-sm font-medium text-slate-500 hover:text-slate-900 transition-colors">Contact</a>
      </div>
    </div>
  </nav>

  <!-- ========== HERO SECTION ========== -->
  <section id="home" class="relative min-h-screen flex flex-col items-center justify-center px-4 overflow-hidden">
    <!-- Background decorations -->
    <div class="absolute top-1/4 left-1/4 w-[800px] h-[800px] bg-emerald-100/50 rounded-full blur-[120px] pointer-events-none"></div>
    <div class="absolute bottom-1/4 right-1/4 w-[600px] h-[600px] bg-teal-100/40 rounded-full blur-[100px] pointer-events-none"></div>
    <div class="absolute inset-0 grid-bg-light pointer-events-none"></div>

    <div class="relative z-10 text-center max-w-4xl mx-auto">
      <!-- Badge -->
      <div class="text-reveal-wrap mb-8">
        <div class="text-reveal-anim inline-flex items-center gap-2 bg-emerald-50 border border-emerald-200 px-4 py-2 rounded-sm text-emerald-700 text-xs font-semibold uppercase tracking-widest">
          <span class="relative w-2 h-2 bg-emerald-500 rounded-full pulse-ring"></span>
          Post-Visit Health Monitoring
        </div>
      </div>

      <!-- Headline -->
      <div class="text-reveal-wrap mb-4">
        <h1 class="text-reveal-anim text-6xl md:text-8xl lg:text-9xl font-medium leading-[0.9] tracking-tight text-slate-900">
          Stay on
        </h1>
      </div>
      <div class="text-reveal-wrap mb-6">
        <h1 class="text-reveal-anim text-6xl md:text-8xl lg:text-9xl font-medium leading-[0.9] tracking-tight text-slate-900" style="animation-delay:0.15s">
          <span class="font-serif italic text-emerald-600">Track</span>
        </h1>
      </div>

      <!-- Subheading -->
      <div class="text-reveal-wrap mb-10">
        <p class="text-reveal-anim text-lg md:text-xl font-light text-slate-500 leading-relaxed max-w-2xl mx-auto" style="animation-delay:0.3s">
          ቅድሚያ ለጤናዎ helps doctors monitor patients after hospital visits with smart reminders, meal guidance, medication tracking, and real-time activity monitoring.
        </p>
      </div>

      <!-- CTA Buttons -->
      <div class="flex flex-col sm:flex-row items-center justify-center gap-4" style="animation: text-slide-up 1.2s cubic-bezier(0.16,1,0.3,1) 0.5s both">
        <button onclick="showToast('Demo mode activated! Explore the features below.')" class="group bg-emerald-500 hover:bg-emerald-600 text-white font-bold text-lg px-10 py-5 rounded-sm transition-all duration-300 hover:scale-105 hover:shadow-[0_0_40px_-10px_rgba(16,185,129,0.5)] flex items-center gap-3">
          Get Started
          <i class="fa-solid fa-arrow-right transition-transform duration-300 group-hover:translate-x-1"></i>
        </button>
        <a href="#how-it-works" class="group flex items-center gap-2 text-slate-500 hover:text-slate-900 font-medium text-sm transition-colors duration-300 px-6 py-4">
          <i class="fa-regular fa-circle-play text-lg text-emerald-500"></i>
          See How It Works
        </a>
      </div>
    </div>

    <!-- Scroll indicator -->
    <div class="absolute bottom-10 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 text-slate-400 text-xs" style="animation: text-slide-up 1.2s cubic-bezier(0.16,1,0.3,1) 0.8s both">
      <span>Scroll to explore</span>
      <i class="fa-solid fa-arrow-down animate-bounce text-xs"></i>
    </div>
  </section>

  <!-- ========== MARQUEE ========== -->
  <div class="py-12 border-y border-slate-100 marquee-mask overflow-hidden bg-slate-50/50">
    <div class="marquee-track flex items-center gap-12 whitespace-nowrap" style="width: max-content;">
      <span class="text-slate-400 text-sm font-medium uppercase tracking-widest flex items-center gap-3"><i class="fa-solid fa-heart-pulse text-emerald-400 text-xs"></i>Appointment Reminders</span>
      <span class="text-slate-300">◆</span>
      <span class="text-slate-400 text-sm font-medium uppercase tracking-widest flex items-center gap-3"><i class="fa-solid fa-utensils text-emerald-400 text-xs"></i>Meal Guidance</span>
      <span class="text-slate-300">◆</span>
      <span class="text-slate-400 text-sm font-medium uppercase tracking-widest flex items-center gap-3"><i class="fa-solid fa-pills text-emerald-400 text-xs"></i>Medication Tracking</span>
      <span class="text-slate-300">◆</span>
      <span class="text-slate-400 text-sm font-medium uppercase tracking-widest flex items-center gap-3"><i class="fa-solid fa-person-running text-emerald-400 text-xs"></i>Activity Monitoring</span>
      <span class="text-slate-300">◆</span>
      <span class="text-slate-400 text-sm font-medium uppercase tracking-widest flex items-center gap-3"><i class="fa-solid fa-shield-halved text-emerald-400 text-xs"></i>Doctor Oversight</span>
      <span class="text-slate-300">◆</span>
      <span class="text-slate-400 text-sm font-medium uppercase tracking-widest flex items-center gap-3"><i class="fa-solid fa-chart-line text-emerald-400 text-xs"></i>Health Analytics</span>
      <span class="text-slate-300">◆</span>
      <!-- Duplicate -->
      <span class="text-slate-400 text-sm font-medium uppercase tracking-widest flex items-center gap-3"><i class="fa-solid fa-heart-pulse text-emerald-400 text-xs"></i>Appointment Reminders</span>
      <span class="text-slate-300">◆</span>
      <span class="text-slate-400 text-sm font-medium uppercase tracking-widest flex items-center gap-3"><i class="fa-solid fa-utensils text-emerald-400 text-xs"></i>Meal Guidance</span>
      <span class="text-slate-300">◆</span>
      <span class="text-slate-400 text-sm font-medium uppercase tracking-widest flex items-center gap-3"><i class="fa-solid fa-pills text-emerald-400 text-xs"></i>Medication Tracking</span>
      <span class="text-slate-300">◆</span>
      <span class="text-slate-400 text-sm font-medium uppercase tracking-widest flex items-center gap-3"><i class="fa-solid fa-person-running text-emerald-400 text-xs"></i>Activity Monitoring</span>
      <span class="text-slate-300">◆</span>
      <span class="text-slate-400 text-sm font-medium uppercase tracking-widest flex items-center gap-3"><i class="fa-solid fa-shield-halved text-emerald-400 text-xs"></i>Doctor Oversight</span>
      <span class="text-slate-300">◆</span>
      <span class="text-slate-400 text-sm font-medium uppercase tracking-widest flex items-center gap-3"><i class="fa-solid fa-chart-line text-emerald-400 text-xs"></i>Health Analytics</span>
      <span class="text-slate-300">◆</span>
    </div>
  </div>

  <!-- ========== FEATURES SECTION ========== -->
  <section id="features" class="py-32 px-4 bg-white">
    <div class="max-w-6xl mx-auto">
      <!-- Section Header -->
      <div class="text-center mb-20 reveal">
        <span class="text-xs font-semibold uppercase tracking-widest text-emerald-600 mb-4 block">Core Features</span>
        <h2 class="text-4xl md:text-6xl font-medium tracking-tight mb-6 text-slate-900">
          Everything you need to<br><span class="font-serif italic text-emerald-600">stay healthy</span>
        </h2>
        <p class="text-slate-500 font-light text-lg max-w-2xl mx-auto leading-relaxed">
          ቅድሚያ ለጤናዎ provides a comprehensive suite of tools that guide patients through their recovery and keep doctors informed every step of the way.
        </p>
      </div>

      <!-- Features Grid -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Feature 1 -->
        <div class="reveal reveal-delay-1 group bg-white border border-slate-100 hover:border-emerald-200 rounded-sm p-8 transition-all duration-500 hover:shadow-[0_8px_30px_-12px_rgba(16,185,129,0.1)] relative overflow-hidden">
          <div class="absolute top-0 right-0 w-40 h-40 bg-emerald-50 rounded-full blur-[60px] opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
          <div class="relative z-10">
            <div class="w-12 h-12 bg-emerald-50 group-hover:bg-emerald-100 border border-emerald-100 rounded-sm flex items-center justify-center mb-6 transition-all duration-300 group-hover:scale-110">
              <i class="fa-regular fa-calendar-check text-emerald-600 text-xl"></i>
            </div>
            <h3 class="text-xl font-semibold mb-3 text-slate-900">Appointment Reminders</h3>
            <p class="text-slate-500 font-light leading-relaxed mb-6">Never miss a follow-up visit. Patients receive timely notifications about upcoming hospital appointments with all the details they need.</p>
            <!-- Mini UI Preview -->
            <div class="bg-slate-50 border border-slate-100 rounded-sm p-4">
              <div class="flex items-center gap-3 mb-3">
                <div class="w-8 h-8 bg-emerald-50 rounded-sm flex items-center justify-center">
                  <i class="fa-regular fa-bell text-emerald-600 text-xs"></i>
                </div>
                <div>
                  <div class="text-xs font-medium text-slate-800">Upcoming Appointment</div>
                  <div class="text-[10px] text-slate-400">Dr. Sarah Mitchell — Cardiology</div>
                </div>
                <div class="ml-auto text-[10px] text-emerald-600 font-semibold">Tomorrow, 10:30 AM</div>
              </div>
              <div class="h-px bg-slate-100 mb-3"></div>
              <div class="flex items-center gap-2">
                <div class="flex-1 bg-white border border-slate-100 rounded-sm px-3 py-2 text-[10px] text-slate-400">City General Hospital, Room 4B</div>
                <div class="bg-emerald-500 text-white text-[10px] font-semibold px-3 py-2 rounded-sm cursor-pointer hover:bg-emerald-600 transition-colors">Confirm</div>
              </div>
            </div>
          </div>
        </div>

        <!-- Feature 2 -->
        <div class="reveal reveal-delay-2 group bg-white border border-slate-100 hover:border-emerald-200 rounded-sm p-8 transition-all duration-500 hover:shadow-[0_8px_30px_-12px_rgba(16,185,129,0.1)] relative overflow-hidden">
          <div class="absolute top-0 right-0 w-40 h-40 bg-emerald-50 rounded-full blur-[60px] opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
          <div class="relative z-10">
            <div class="w-12 h-12 bg-emerald-50 group-hover:bg-emerald-100 border border-emerald-100 rounded-sm flex items-center justify-center mb-6 transition-all duration-300 group-hover:scale-110">
              <i class="fa-solid fa-utensils text-emerald-600 text-xl"></i>
            </div>
            <h3 class="text-xl font-semibold mb-3 text-slate-900">Meal Guidance</h3>
            <p class="text-slate-500 font-light leading-relaxed mb-6">Personalized meal plans based on medical conditions. The system suggests what to eat, portion sizes, and tracks nutritional intake.</p>
            <!-- Mini UI Preview -->
            <div class="bg-slate-50 border border-slate-100 rounded-sm p-4">
              <div class="text-xs font-medium mb-3 text-slate-800">Today's Meal Plan</div>
              <div class="space-y-2">
                <div class="flex items-center justify-between bg-white border border-slate-100 rounded-sm px-3 py-2">
                  <div class="flex items-center gap-2">
                    <i class="fa-solid fa-mug-hot text-emerald-500 text-[10px]"></i>
                    <span class="text-[11px] text-slate-700">Oatmeal + Berries</span>
                  </div>
                  <span class="text-[10px] text-green-600 font-medium flex items-center gap-1"><i class="fa-solid fa-check text-[8px]"></i> Logged</span>
                </div>
                <div class="flex items-center justify-between bg-white border border-slate-100 rounded-sm px-3 py-2">
                  <div class="flex items-center gap-2">
                    <i class="fa-solid fa-sun text-orange-400 text-[10px]"></i>
                    <span class="text-[11px] text-slate-700">Grilled Chicken Salad</span>
                  </div>
                  <span class="text-[10px] text-emerald-600 font-medium">12:30 PM</span>
                </div>
                <div class="flex items-center justify-between bg-white border border-slate-100 rounded-sm px-3 py-2">
                  <div class="flex items-center gap-2">
                    <i class="fa-solid fa-moon text-indigo-400 text-[10px]"></i>
                    <span class="text-[11px] text-slate-700">Salmon + Vegetables</span>
                  </div>
                  <span class="text-[10px] text-slate-400 font-medium">7:00 PM</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Feature 3 -->
        <div class="reveal reveal-delay-3 group bg-white border border-slate-100 hover:border-emerald-200 rounded-sm p-8 transition-all duration-500 hover:shadow-[0_8px_30px_-12px_rgba(16,185,129,0.1)] relative overflow-hidden">
          <div class="absolute top-0 right-0 w-40 h-40 bg-emerald-50 rounded-full blur-[60px] opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
          <div class="relative z-10">
            <div class="w-12 h-12 bg-emerald-50 group-hover:bg-emerald-100 border border-emerald-100 rounded-sm flex items-center justify-center mb-6 transition-all duration-300 group-hover:scale-110">
              <i class="fa-solid fa-pills text-emerald-600 text-xl"></i>
            </div>
            <h3 class="text-xl font-semibold mb-3 text-slate-900">Medication Reminders</h3>
            <p class="text-slate-500 font-light leading-relaxed mb-6">Timely pill reminders with dosage information. Track adherence and let doctors know if medications are being taken as prescribed.</p>
            <!-- Mini UI Preview -->
            <div class="bg-slate-50 border border-slate-100 rounded-sm p-4">
              <div class="text-xs font-medium mb-3 text-slate-800">Medication Schedule</div>
              <div class="space-y-2">
                <div class="flex items-center gap-3 bg-white border border-slate-100 rounded-sm px-3 py-2.5">
                  <div class="w-6 h-6 bg-green-50 rounded-full flex items-center justify-center flex-shrink-0">
                    <i class="fa-solid fa-check text-green-600 text-[9px]"></i>
                  </div>
                  <div class="flex-1 min-w-0">
                    <div class="text-[11px] font-medium text-slate-800">Metformin 500mg</div>
                    <div class="text-[10px] text-slate-400">8:00 AM — With breakfast</div>
                  </div>
                </div>
                <div class="flex items-center gap-3 bg-emerald-50 border border-emerald-100 rounded-sm px-3 py-2.5">
                  <div class="w-6 h-6 bg-emerald-100 rounded-full flex items-center justify-center flex-shrink-0">
                    <i class="fa-regular fa-clock text-emerald-600 text-[9px]"></i>
                  </div>
                  <div class="flex-1 min-w-0">
                    <div class="text-[11px] font-medium text-slate-800">Lisinopril 10mg</div>
                    <div class="text-[10px] text-emerald-600">Due in 30 min — 2:00 PM</div>
                  </div>
                </div>
                <div class="flex items-center gap-3 bg-white border border-slate-100 rounded-sm px-3 py-2.5">
                  <div class="w-6 h-6 bg-slate-100 rounded-full flex items-center justify-center flex-shrink-0">
                    <i class="fa-regular fa-circle text-slate-300 text-[9px]"></i>
                  </div>
                  <div class="flex-1 min-w-0">
                    <div class="text-[11px] font-medium text-slate-800">Atorvastatin 20mg</div>
                    <div class="text-[10px] text-slate-400">9:00 PM — Before bed</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Feature 4 -->
        <div class="reveal reveal-delay-4 group bg-white border border-slate-100 hover:border-emerald-200 rounded-sm p-8 transition-all duration-500 hover:shadow-[0_8px_30px_-12px_rgba(16,185,129,0.1)] relative overflow-hidden">
          <div class="absolute top-0 right-0 w-40 h-40 bg-emerald-50 rounded-full blur-[60px] opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
          <div class="relative z-10">
            <div class="w-12 h-12 bg-emerald-50 group-hover:bg-emerald-100 border border-emerald-100 rounded-sm flex items-center justify-center mb-6 transition-all duration-300 group-hover:scale-110">
              <i class="fa-solid fa-person-running text-emerald-600 text-xl"></i>
            </div>
            <h3 class="text-xl font-semibold mb-3 text-slate-900">Activity & Task Tracking</h3>
            <p class="text-slate-500 font-light leading-relaxed mb-6">Monitor daily activities and prescribed exercises. The system checks if patients are following their recovery plan and flags issues early.</p>
            <!-- Mini UI Preview -->
            <div class="bg-slate-50 border border-slate-100 rounded-sm p-4">
              <div class="flex items-center justify-between mb-3">
                <div class="text-xs font-medium text-slate-800">Today's Tasks</div>
                <div class="text-[10px] text-emerald-600 font-semibold">3/5 Done</div>
              </div>
              <div class="space-y-2">
                <div class="flex items-center gap-2">
                  <div class="w-4 h-4 bg-green-50 rounded-sm flex items-center justify-center"><i class="fa-solid fa-check text-green-600 text-[7px]"></i></div>
                  <span class="text-[11px] text-slate-400 line-through">Morning walk — 20 min</span>
                </div>
                <div class="flex items-center gap-2">
                  <div class="w-4 h-4 bg-green-50 rounded-sm flex items-center justify-center"><i class="fa-solid fa-check text-green-600 text-[7px]"></i></div>
                  <span class="text-[11px] text-slate-400 line-through">Blood pressure check</span>
                </div>
                <div class="flex items-center gap-2">
                  <div class="w-4 h-4 bg-green-50 rounded-sm flex items-center justify-center"><i class="fa-solid fa-check text-green-600 text-[7px]"></i></div>
                  <span class="text-[11px] text-slate-400 line-through">Breathing exercises</span>
                </div>
                <div class="flex items-center gap-2">
                  <div class="w-4 h-4 bg-slate-100 rounded-sm flex items-center justify-center"></div>
                  <span class="text-[11px] text-slate-700">Afternoon stretching</span>
                </div>
                <div class="flex items-center gap-2">
                  <div class="w-4 h-4 bg-slate-100 rounded-sm flex items-center justify-center"></div>
                  <span class="text-[11px] text-slate-700">Evening walk — 15 min</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Health Monitoring Overview -->
      <div class="reveal mt-6 group bg-white border border-slate-100 hover:border-emerald-200 rounded-sm p-8 transition-all duration-500 hover:shadow-[0_8px_30px_-12px_rgba(16,185,129,0.1)] relative overflow-hidden">
        <div class="absolute top-0 right-0 w-60 h-60 bg-emerald-50 rounded-full blur-[80px] opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
        <div class="relative z-10 flex flex-col md:flex-row gap-8">
          <div class="md:w-1/3">
            <div class="w-12 h-12 bg-emerald-50 group-hover:bg-emerald-100 border border-emerald-100 rounded-sm flex items-center justify-center mb-6 transition-all duration-300 group-hover:scale-110">
              <i class="fa-solid fa-chart-line text-emerald-600 text-xl"></i>
            </div>
            <h3 class="text-xl font-semibold mb-3 text-slate-900">Health Monitoring Overview</h3>
            <p class="text-slate-500 font-light leading-relaxed">A comprehensive summary of patient progress. Doctors can see adherence rates, health trends, and areas needing attention at a glance.</p>
          </div>
          <div class="md:w-2/3 bg-slate-50 border border-slate-100 rounded-sm p-5">
            <div class="flex items-center justify-between mb-5">
              <div class="text-sm font-medium text-slate-800">Patient Progress — Week 3</div>
              <div class="flex items-center gap-2">
                <span class="text-[10px] text-slate-400">Last updated: Today, 1:45 PM</span>
              </div>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-5">
              <div class="bg-white border border-slate-100 rounded-sm p-3 text-center">
                <div class="text-2xl font-semibold text-emerald-600">87%</div>
                <div class="text-[10px] text-slate-400 mt-1">Medication Adherence</div>
              </div>
              <div class="bg-white border border-slate-100 rounded-sm p-3 text-center">
                <div class="text-2xl font-semibold text-green-600">92%</div>
                <div class="text-[10px] text-slate-400 mt-1">Task Completion</div>
              </div>
              <div class="bg-white border border-slate-100 rounded-sm p-3 text-center">
                <div class="text-2xl font-semibold text-teal-600">78%</div>
                <div class="text-[10px] text-slate-400 mt-1">Meal Compliance</div>
              </div>
              <div class="bg-white border border-slate-100 rounded-sm p-3 text-center">
                <div class="text-2xl font-semibold text-slate-800">3/4</div>
                <div class="text-[10px] text-slate-400 mt-1">Appointments Kept</div>
              </div>
            </div>
            <!-- Progress bars -->
            <div class="space-y-3">
              <div>
                <div class="flex justify-between text-[11px] mb-1"><span class="text-slate-500">Medication</span><span class="text-emerald-600">87%</span></div>
                <div class="h-1.5 bg-slate-200 rounded-full"><div class="h-full bg-emerald-500 rounded-full fill-anim" style="width:87%"></div></div>
              </div>
              <div>
                <div class="flex justify-between text-[11px] mb-1"><span class="text-slate-500">Activity</span><span class="text-green-600">92%</span></div>
                <div class="h-1.5 bg-slate-200 rounded-full"><div class="h-full bg-green-500 rounded-full fill-anim" style="width:92%"></div></div>
              </div>
              <div>
                <div class="flex justify-between text-[11px] mb-1"><span class="text-slate-500">Diet</span><span class="text-teal-600">78%</span></div>
                <div class="h-1.5 bg-slate-200 rounded-full"><div class="h-full bg-teal-500 rounded-full fill-anim" style="width:78%"></div></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========== HOW IT WORKS ========== -->
  <section id="how-it-works" class="py-32 px-4 relative bg-slate-50">
    <div class="absolute inset-0 grid-bg-light pointer-events-none"></div>
    <div class="max-w-4xl mx-auto relative z-10">
      <!-- Section Header -->
      <div class="text-center mb-20 reveal">
        <span class="text-xs font-semibold uppercase tracking-widest text-emerald-600 mb-4 block">How It Works</span>
        <h2 class="text-4xl md:text-6xl font-medium tracking-tight mb-6 text-slate-900">
          Simple. Effective.<br><span class="font-serif italic text-emerald-600">Life-saving.</span>
        </h2>
        <p class="text-slate-500 font-light text-lg max-w-xl mx-auto leading-relaxed">
          Three straightforward steps that connect doctors and patients for better post-visit outcomes.
        </p>
      </div>

      <!-- Steps -->
      <div class="relative">
        <!-- Vertical line -->
        <div class="absolute left-8 md:left-1/2 top-0 bottom-0 w-px bg-gradient-to-b from-emerald-300 via-emerald-100 to-transparent hidden md:block"></div>

        <!-- Step 1 -->
        <div class="reveal reveal-delay-1 flex flex-col md:flex-row items-center gap-8 md:gap-16 mb-16 md:mb-24">
          <div class="md:w-1/2 md:text-right order-2 md:order-1">
            <h3 class="text-2xl font-semibold mb-3 text-slate-900">Doctor Registers Patient</h3>
            <p class="text-slate-500 font-light leading-relaxed">During a hospital visit, the doctor creates a patient profile, sets up medication schedules, dietary requirements, and activity plans tailored to the diagnosis.</p>
          </div>
          <div class="relative order-1 md:order-2 flex-shrink-0">
            <div class="w-16 h-16 bg-emerald-500 rounded-sm flex items-center justify-center text-white font-bold text-xl shadow-[0_0_30px_-5px_rgba(16,185,129,0.4)]">1</div>
          </div>
          <div class="md:w-1/2 order-3">
            <div class="bg-white border border-slate-100 rounded-sm p-4 inline-flex items-center gap-3 shadow-sm">
              <div class="w-10 h-10 bg-emerald-50 rounded-sm flex items-center justify-center">
                <i class="fa-solid fa-user-plus text-emerald-600"></i>
              </div>
              <div>
                <div class="text-sm font-medium text-slate-800">Patient Registered</div>
                <div class="text-xs text-slate-400">Plan assigned: Cardiac Recovery</div>
              </div>
            </div>
          </div>
        </div>

        <!-- Step 2 -->
        <div class="reveal reveal-delay-2 flex flex-col md:flex-row items-center gap-8 md:gap-16 mb-16 md:mb-24">
          <div class="md:w-1/2 md:text-right order-2 md:order-1">
            <div class="bg-white border border-slate-100 rounded-sm p-4 inline-flex items-center gap-3 shadow-sm">
              <div class="w-10 h-10 bg-green-50 rounded-sm flex items-center justify-center">
                <i class="fa-solid fa-mobile-screen-button text-green-600"></i>
              </div>
              <div>
                <div class="text-sm font-medium text-slate-800">Guidance Active</div>
                <div class="text-xs text-slate-400">Reminders: 4 pending today</div>
              </div>
            </div>
          </div>
          <div class="relative order-1 md:order-2 flex-shrink-0">
            <div class="w-16 h-16 bg-emerald-400 rounded-sm flex items-center justify-center text-white font-bold text-xl">2</div>
          </div>
          <div class="md:w-1/2 order-3">
            <h3 class="text-2xl font-semibold mb-3 text-slate-900">Patient Receives Guidance</h3>
            <p class="text-slate-500 font-light leading-relaxed">The patient gets clear, actionable reminders on their phone — when to take medication, what to eat, and which activities to complete. No confusion, no missed steps.</p>
          </div>
        </div>

        <!-- Step 3 -->
        <div class="reveal reveal-delay-3 flex flex-col md:flex-row items-center gap-8 md:gap-16">
          <div class="md:w-1/2 md:text-right order-2 md:order-1">
            <h3 class="text-2xl font-semibold mb-3 text-slate-900">System Tracks Progress</h3>
            <p class="text-slate-500 font-light leading-relaxed">Every completed task, taken medication, and followed meal is logged. Doctors see real-time progress dashboards and get alerted when patients fall off track.</p>
          </div>
          <div class="relative order-1 md:order-2 flex-shrink-0">
            <div class="w-16 h-16 bg-emerald-300 rounded-sm flex items-center justify-center text-white font-bold text-xl">3</div>
          </div>
          <div class="md:w-1/2 order-3">
            <div class="bg-white border border-slate-100 rounded-sm p-4 inline-flex items-center gap-3 shadow-sm">
              <div class="w-10 h-10 bg-teal-50 rounded-sm flex items-center justify-center">
                <i class="fa-solid fa-desktop text-teal-600"></i>
              </div>
              <div>
                <div class="text-sm font-medium text-slate-800">Doctor Dashboard</div>
                <div class="text-xs text-slate-400">Adherence rate: 87% <i class="fa-solid fa-arrow-up text-green-600 text-[9px]"></i></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========== PREVIEW SECTION ========== -->
  <section id="preview" class="py-32 px-4 relative bg-white">
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[600px] bg-emerald-50/50 rounded-full blur-[120px] pointer-events-none"></div>
    <div class="max-w-6xl mx-auto relative z-10">
      <!-- Section Header -->
      <div class="text-center mb-16 reveal">
        <span class="text-xs font-semibold uppercase tracking-widest text-emerald-600 mb-4 block">UI Preview</span>
        <h2 class="text-4xl md:text-6xl font-medium tracking-tight mb-6 text-slate-900">
          See it in <span class="font-serif italic text-emerald-600">action</span>
        </h2>
        <p class="text-slate-500 font-light text-lg max-w-xl mx-auto leading-relaxed">
          A glimpse at the patient experience — clean, intuitive, and designed for clarity.
        </p>
      </div>

      <!-- Mock App Preview -->
      <div class="reveal">
        <div class="bg-white border border-slate-200 rounded-sm overflow-hidden shadow-[0_20px_60px_-15px_rgba(0,0,0,0.08)]">
          <!-- Mock top bar -->
          <div class="bg-slate-50 border-b border-slate-100 px-6 py-3 flex items-center gap-3">
            <div class="flex gap-2">
              <div class="w-3 h-3 rounded-full bg-red-400/60"></div>
              <div class="w-3 h-3 rounded-full bg-yellow-400/60"></div>
              <div class="w-3 h-3 rounded-full bg-green-400/60"></div>
            </div>
            <div class="flex-1 flex justify-center">
              <div class="bg-white border border-slate-200 rounded-sm px-4 py-1 text-[11px] text-slate-400 flex items-center gap-2">
                <i class="fa-solid fa-lock text-[8px] text-green-500"></i>
ቅድሚያ ለጤናዎ.health/dashboard
              </div>
            </div>
          </div>

          <!-- Mock dashboard content -->
          <div class="p-6 md:p-8 bg-slate-50/30">
            <div class="flex items-center justify-between mb-6">
              <div>
                <div class="text-sm text-slate-400">Good morning,</div>
                <div class="text-xl font-semibold text-slate-900">James Wilson</div>
              </div>
              <div class="flex items-center gap-3">
                <div class="w-8 h-8 bg-emerald-50 rounded-sm flex items-center justify-center relative cursor-pointer hover:bg-emerald-100 transition-colors">
                  <i class="fa-regular fa-bell text-emerald-600 text-sm"></i>
                  <div class="absolute -top-1 -right-1 w-3 h-3 bg-emerald-500 rounded-full text-[7px] text-white font-bold flex items-center justify-center">2</div>
                </div>
                <div class="w-8 h-8 bg-slate-100 rounded-sm flex items-center justify-center">
                  <i class="fa-regular fa-user text-slate-400 text-sm"></i>
                </div>
              </div>
            </div>

            <!-- Quick stats row -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
              <div class="bg-white border border-slate-100 rounded-sm p-4">
                <div class="flex items-center gap-2 mb-2">
                  <i class="fa-solid fa-pills text-emerald-500 text-xs"></i>
                  <span class="text-[10px] text-slate-400 uppercase tracking-wider">Meds Today</span>
                </div>
                <div class="text-2xl font-semibold text-slate-900">2<span class="text-slate-300 text-sm">/3</span></div>
              </div>
              <div class="bg-white border border-slate-100 rounded-sm p-4">
                <div class="flex items-center gap-2 mb-2">
                  <i class="fa-solid fa-fire-flame-curved text-orange-500 text-xs"></i>
                  <span class="text-[10px] text-slate-400 uppercase tracking-wider">Calories</span>
                </div>
                <div class="text-2xl font-semibold text-slate-900">1,420</div>
              </div>
              <div class="bg-white border border-slate-100 rounded-sm p-4">
                <div class="flex items-center gap-2 mb-2">
                  <i class="fa-solid fa-shoe-prints text-green-500 text-xs"></i>
                  <span class="text-[10px] text-slate-400 uppercase tracking-wider">Steps</span>
                </div>
                <div class="text-2xl font-semibold text-slate-900">6,840</div>
              </div>
              <div class="bg-white border border-slate-100 rounded-sm p-4">
                <div class="flex items-center gap-2 mb-2">
                  <i class="fa-solid fa-heart-pulse text-red-400 text-xs"></i>
                  <span class="text-[10px] text-slate-400 uppercase tracking-wider">Heart Rate</span>
                </div>
                <div class="text-2xl font-semibold text-slate-900">72 <span class="text-sm text-slate-300">bpm</span></div>
              </div>
            </div>

            <!-- Two column -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <!-- Upcoming -->
              <div class="bg-white border border-slate-100 rounded-sm p-5">
                <div class="text-sm font-medium mb-4 text-slate-800">Upcoming</div>
                <div class="space-y-3">
                  <div class="flex items-center gap-3 bg-emerald-50 border border-emerald-100 rounded-sm p-3">
                    <div class="w-8 h-8 bg-emerald-100 rounded-sm flex items-center justify-center flex-shrink-0">
                      <i class="fa-solid fa-pills text-emerald-600 text-xs"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                      <div class="text-xs font-medium text-slate-800">Lisinopril 10mg</div>
                      <div class="text-[10px] text-emerald-600">Due in 30 minutes</div>
                    </div>
                    <div class="bg-emerald-500 text-white text-[10px] font-bold px-2 py-1 rounded-sm flex-shrink-0 cursor-pointer hover:bg-emerald-600 transition-colors">Take Now</div>
                  </div>
                  <div class="flex items-center gap-3 bg-white border border-slate-100 rounded-sm p-3">
                    <div class="w-8 h-8 bg-blue-50 rounded-sm flex items-center justify-center flex-shrink-0">
                      <i class="fa-regular fa-calendar text-blue-500 text-xs"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                      <div class="text-xs font-medium text-slate-800">Dr. Mitchell — Follow-up</div>
                      <div class="text-[10px] text-slate-400">Tomorrow, 10:30 AM</div>
                    </div>
                  </div>
                  <div class="flex items-center gap-3 bg-white border border-slate-100 rounded-sm p-3">
                    <div class="w-8 h-8 bg-green-50 rounded-sm flex items-center justify-center flex-shrink-0">
                      <i class="fa-solid fa-utensils text-green-500 text-xs"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                      <div class="text-xs font-medium text-slate-800">Lunch: Grilled Chicken Salad</div>
                      <div class="text-[10px] text-slate-400">12:30 PM — 450 cal</div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Weekly chart mock -->
              <div class="bg-white border border-slate-100 rounded-sm p-5">
                <div class="flex items-center justify-between mb-4">
                  <div class="text-sm font-medium text-slate-800">Weekly Adherence</div>
                  <div class="text-[10px] text-slate-400">This week</div>
                </div>
                <div class="flex items-end gap-3 h-32">
                  <div class="flex-1 flex flex-col items-center gap-1">
                    <div class="w-full bg-emerald-200 rounded-sm" style="height:85%"></div>
                    <span class="text-[9px] text-slate-400">Mon</span>
                  </div>
                  <div class="flex-1 flex flex-col items-center gap-1">
                    <div class="w-full bg-emerald-300 rounded-sm" style="height:92%"></div>
                    <span class="text-[9px] text-slate-400">Tue</span>
                  </div>
                  <div class="flex-1 flex flex-col items-center gap-1">
                    <div class="w-full bg-emerald-200 rounded-sm" style="height:70%"></div>
                    <span class="text-[9px] text-slate-400">Wed</span>
                  </div>
                  <div class="flex-1 flex flex-col items-center gap-1">
                    <div class="w-full bg-emerald-300 rounded-sm" style="height:88%"></div>
                    <span class="text-[9px] text-slate-400">Thu</span>
                  </div>
                  <div class="flex-1 flex flex-col items-center gap-1">
                    <div class="w-full bg-emerald-500 rounded-sm" style="height:95%"></div>
                    <span class="text-[9px] text-slate-400">Fri</span>
                  </div>
                  <div class="flex-1 flex flex-col items-center gap-1">
                    <div class="w-full bg-emerald-100 rounded-sm" style="height:60%"></div>
                    <span class="text-[9px] text-slate-400">Sat</span>
                  </div>
                  <div class="flex-1 flex flex-col items-center gap-1">
                    <div class="w-full bg-emerald-50 border border-emerald-100 rounded-sm" style="height:40%"></div>
                    <span class="text-[9px] text-emerald-600 font-medium">Sun</span>
                  </div>
                </div>
                <div class="mt-4 pt-3 border-t border-slate-50 flex items-center justify-between">
                  <span class="text-[10px] text-slate-400">Average: 87%</span>
                  <span class="text-[10px] text-green-600 font-medium flex items-center gap-1"><i class="fa-solid fa-arrow-up text-[8px]"></i> 5% from last week</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========== ABOUT SECTION ========== -->
  <section id="about" class="py-32 px-4 relative bg-slate-50">
    <div class="max-w-6xl mx-auto">
      <div class="flex flex-col md:flex-row gap-16 items-center">
        <!-- Left: Image -->
        <div class="md:w-1/2 reveal">
          <div class="relative group">
            <div class="absolute -inset-4 bg-emerald-100/50 rounded-sm blur-xl group-hover:bg-emerald-100/80 transition-all duration-700"></div>
            <img src="https://picsum.photos/seed/ቅድሚያ-ለጤናዎ-doctor/600/500.jpg" alt="Doctor consulting patient" class="relative w-full rounded-sm border border-slate-200 grayscale group-hover:grayscale-0 transition-all duration-700">
          </div>
        </div>

        <!-- Right: Content -->
        <div class="md:w-1/2 reveal reveal-delay-2">
          <span class="text-xs font-semibold uppercase tracking-widest text-emerald-600 mb-4 block">About ቅድሚያ ለጤናዎ</span>
          <h2 class="text-3xl md:text-5xl font-medium tracking-tight mb-6 text-slate-900">
            Bridging the gap<br>between <span class="font-serif italic text-emerald-600">visits</span>
          </h2>
          <div class="space-y-4 text-slate-500 font-light leading-relaxed">
            <p>After a hospital visit, patients often struggle to follow through on medical instructions. Missed medications, poor diet choices, and skipped follow-ups lead to readmissions and worsening conditions.</p>
            <p>ቅድሚያ ለጤናዎ was built to solve this. By giving doctors a way to set up structured recovery plans and patients a simple interface to follow them, we create a continuous care loop that reduces readmissions and improves outcomes.</p>
            <p>Our system is designed for real clinical environments — simple enough for elderly patients, powerful enough for busy doctors.</p>
          </div>

          <!-- Stats -->
          <div class="grid grid-cols-3 gap-6 mt-10 pt-8 border-t border-slate-200">
            <div>
              <div class="text-3xl font-medium text-emerald-600">43%</div>
              <div class="text-xs text-slate-400 mt-1">Reduction in readmissions</div>
            </div>
            <div>
              <div class="text-3xl font-medium text-emerald-600">2.1k</div>
              <div class="text-xs text-slate-400 mt-1">Patients monitored</div>
            </div>
            <div>
              <div class="text-3xl font-medium text-emerald-600">94%</div>
              <div class="text-xs text-slate-400 mt-1">Doctor satisfaction rate</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========== CONTACT SECTION ========== -->
  <section id="contact" class="py-32 px-4 relative bg-white">
    <div class="absolute inset-0 grid-bg-light pointer-events-none"></div>
    <div class="max-w-6xl mx-auto relative z-10">
      <!-- Section Header -->
      <div class="text-center mb-16 reveal">
        <span class="text-xs font-semibold uppercase tracking-widest text-emerald-600 mb-4 block">Get In Touch</span>
        <h2 class="text-4xl md:text-6xl font-medium tracking-tight mb-6 text-slate-900">
          Let's <span class="font-serif italic text-emerald-600">connect</span>
        </h2>
        <p class="text-slate-500 font-light text-lg max-w-xl mx-auto leading-relaxed">
          Interested in implementing ቅድሚያ ለጤናዎ at your hospital? Have questions? We'd love to hear from you.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
        <!-- Contact Form -->
        <div class="reveal reveal-delay-1">
          <form id="contact-form" class="space-y-5" onsubmit="handleContactSubmit(event)">
            <div>
              <label class="text-xs font-medium text-slate-500 uppercase tracking-wider mb-2 block">Full Name</label>
              <input type="text" placeholder="Dr. Sarah Mitchell" required class="w-full bg-white border border-slate-200 focus:border-emerald-300 focus:ring-2 focus:ring-emerald-100 rounded-sm px-4 py-3 text-sm text-slate-900 placeholder-slate-300 outline-none transition-all duration-300">
            </div>
            <div>
              <label class="text-xs font-medium text-slate-500 uppercase tracking-wider mb-2 block">Email</label>
              <input type="email" placeholder="sarah@hospital.com" required class="w-full bg-white border border-slate-200 focus:border-emerald-300 focus:ring-2 focus:ring-emerald-100 rounded-sm px-4 py-3 text-sm text-slate-900 placeholder-slate-300 outline-none transition-all duration-300">
            </div>
            <div>
              <label class="text-xs font-medium text-slate-500 uppercase tracking-wider mb-2 block">Organization</label>
              <input type="text" placeholder="City General Hospital" class="w-full bg-white border border-slate-200 focus:border-emerald-300 focus:ring-2 focus:ring-emerald-100 rounded-sm px-4 py-3 text-sm text-slate-900 placeholder-slate-300 outline-none transition-all duration-300">
            </div>
            <div>
              <label class="text-xs font-medium text-slate-500 uppercase tracking-wider mb-2 block">Message</label>
              <textarea rows="4" placeholder="Tell us about your needs..." required class="w-full bg-white border border-slate-200 focus:border-emerald-300 focus:ring-2 focus:ring-emerald-100 rounded-sm px-4 py-3 text-sm text-slate-900 placeholder-slate-300 outline-none transition-all duration-300 resize-none"></textarea>
            </div>
            <button type="submit" class="w-full bg-emerald-500 hover:bg-emerald-600 text-white font-bold text-sm py-4 rounded-sm transition-all duration-300 hover:scale-[1.02] hover:shadow-[0_0_40px_-10px_rgba(16,185,129,0.5)] flex items-center justify-center gap-2">
              Send Message
              <i class="fa-solid fa-paper-plane text-xs"></i>
            </button>
          </form>
        </div>

        <!-- Right column -->
        <div class="reveal reveal-delay-2 space-y-8">
          <!-- Contact Info Cards -->
          <div class="space-y-4">
            <div class="group flex items-center gap-4 bg-white border border-slate-100 hover:border-emerald-200 rounded-sm p-5 transition-all duration-300 shadow-sm">
              <div class="w-10 h-10 bg-emerald-50 group-hover:bg-emerald-100 border border-emerald-100 rounded-sm flex items-center justify-center transition-all duration-300">
                <i class="fa-regular fa-envelope text-emerald-600"></i>
              </div>
              <div>
                <div class="text-sm font-medium text-slate-800">Email</div>
                <div class="text-sm text-slate-400">hello@ቅድሚያ-ለጤናዎ.health</div>
              </div>
            </div>
            <div class="group flex items-center gap-4 bg-white border border-slate-100 hover:border-emerald-200 rounded-sm p-5 transition-all duration-300 shadow-sm">
              <div class="w-10 h-10 bg-emerald-50 group-hover:bg-emerald-100 border border-emerald-100 rounded-sm flex items-center justify-center transition-all duration-300">
                <i class="fa-solid fa-phone text-emerald-600 text-sm"></i>
              </div>
              <div>
                <div class="text-sm font-medium text-slate-800">Phone</div>
                <div class="text-sm text-slate-400">+1 (555) 234-5678</div>
              </div>
            </div>
            <div class="group flex items-center gap-4 bg-white border border-slate-100 hover:border-emerald-200 rounded-sm p-5 transition-all duration-300 shadow-sm">
              <div class="w-10 h-10 bg-emerald-50 group-hover:bg-emerald-100 border border-emerald-100 rounded-sm flex items-center justify-center transition-all duration-300">
                <i class="fa-solid fa-location-dot text-emerald-600"></i>
              </div>
              <div>
                <div class="text-sm font-medium text-slate-800">Office</div>
                <div class="text-sm text-slate-400">350 Medical Drive, San Francisco, CA</div>
              </div>
            </div>
          </div>

          <!-- Map Placeholder -->
          <div class="relative rounded-sm overflow-hidden border border-slate-200 h-48">
            <img src="https://picsum.photos/seed/ቅድሚያ-ለጤናዎ-map/600/250.jpg" alt="Map location" class="w-full h-full object-cover opacity-60">
            <div class="absolute inset-0 flex items-center justify-center bg-slate-100/30 backdrop-blur-[1px]">
              <div class="bg-white/90 backdrop-blur-xl border border-slate-200 rounded-sm px-6 py-4 flex items-center gap-3 shadow-lg">
                <div class="w-3 h-3 bg-emerald-500 rounded-full relative pulse-ring"></div>
                <div>
                  <div class="text-sm font-medium text-slate-800">ቅድሚያ ለጤናዎ HQ</div>
                  <div class="text-[10px] text-slate-400">350 Medical Drive, SF</div>
                </div>
              </div>
            </div>
          </div>

          <!-- Social Links -->
          <div class="flex items-center gap-3">
            <a href="#" class="w-10 h-10 bg-white border border-slate-100 hover:border-emerald-200 rounded-sm flex items-center justify-center text-slate-400 hover:text-emerald-600 transition-all duration-300 shadow-sm">
              <i class="fa-brands fa-x-twitter"></i>
            </a>
            <a href="#" class="w-10 h-10 bg-white border border-slate-100 hover:border-emerald-200 rounded-sm flex items-center justify-center text-slate-400 hover:text-emerald-600 transition-all duration-300 shadow-sm">
              <i class="fa-brands fa-linkedin-in"></i>
            </a>
            <a href="#" class="w-10 h-10 bg-white border border-slate-100 hover:border-emerald-200 rounded-sm flex items-center justify-center text-slate-400 hover:text-emerald-600 transition-all duration-300 shadow-sm">
              <i class="fa-brands fa-github"></i>
            </a>
            <a href="#" class="w-10 h-10 bg-white border border-slate-100 hover:border-emerald-200 rounded-sm flex items-center justify-center text-slate-400 hover:text-emerald-600 transition-all duration-300 shadow-sm">
              <i class="fa-brands fa-instagram"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========== FOOTER ========== -->
  <footer class="border-t border-slate-100 py-12 px-4 bg-white">
    <div class="max-w-6xl mx-auto">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-10 mb-12">
        <!-- Brand -->
        <div class="md:col-span-1">
          <div class="flex items-center gap-2.5 mb-4">
            <div class="w-7 h-7 rounded-sm bg-emerald-500 flex items-center justify-center">
              <i class="fa-solid fa-heart-pulse text-white text-xs"></i>
            </div>
            <span class="text-slate-900 font-semibold tracking-tight">ቅድሚያ ለጤናዎ</span>
          </div>
          <p class="text-sm text-slate-400 leading-relaxed">Bridging the gap between hospital visits and healthy recoveries.</p>
        </div>

        <!-- Product -->
        <div>
          <div class="text-xs font-semibold uppercase tracking-widest text-slate-400 mb-4">Product</div>
          <div class="space-y-2.5">
            <a href="#features" class="block text-sm text-slate-400 hover:text-emerald-600 transition-colors duration-300">Features</a>
            <a href="#how-it-works" class="block text-sm text-slate-400 hover:text-emerald-600 transition-colors duration-300">How It Works</a>
            <a href="#preview" class="block text-sm text-slate-400 hover:text-emerald-600 transition-colors duration-300">Preview</a>
            <a href="#" class="block text-sm text-slate-400 hover:text-emerald-600 transition-colors duration-300">Pricing</a>
          </div>
        </div>

        <!-- Company -->
        <div>
          <div class="text-xs font-semibold uppercase tracking-widest text-slate-400 mb-4">Company</div>
          <div class="space-y-2.5">
            <a href="#about" class="block text-sm text-slate-400 hover:text-emerald-600 transition-colors duration-300">About</a>
            <a href="#" class="block text-sm text-slate-400 hover:text-emerald-600 transition-colors duration-300">Careers</a>
            <a href="#" class="block text-sm text-slate-400 hover:text-emerald-600 transition-colors duration-300">Blog</a>
            <a href="#contact" class="block text-sm text-slate-400 hover:text-emerald-600 transition-colors duration-300">Contact</a>
          </div>
        </div>

        <!-- Legal -->
        <div>
          <div class="text-xs font-semibold uppercase tracking-widest text-slate-400 mb-4">Legal</div>
          <div class="space-y-2.5">
            <a href="#" class="block text-sm text-slate-400 hover:text-emerald-600 transition-colors duration-300">Privacy Policy</a>
            <a href="#" class="block text-sm text-slate-400 hover:text-emerald-600 transition-colors duration-300">Terms of Service</a>
            <a href="#" class="block text-sm text-slate-400 hover:text-emerald-600 transition-colors duration-300">HIPAA Compliance</a>
            <a href="#" class="block text-sm text-slate-400 hover:text-emerald-600 transition-colors duration-300">Security</a>
          </div>
        </div>
      </div>

      <!-- Bottom bar -->
      <div class="pt-8 border-t border-slate-100 flex flex-col md:flex-row items-center justify-between gap-4">
        <div class="text-xs text-slate-300">© 2025 ቅድሚያ ለጤናዎ. All rights reserved. Built for Hackathon MVP.</div>
        <div class="flex items-center gap-4">
          <a href="#" class="text-slate-300 hover:text-emerald-500 transition-colors duration-300">
            <i class="fa-brands fa-x-twitter"></i>
          </a>
          <a href="#" class="text-slate-300 hover:text-emerald-500 transition-colors duration-300">
            <i class="fa-brands fa-linkedin-in"></i>
          </a>
          <a href="#" class="text-slate-300 hover:text-emerald-500 transition-colors duration-300">
            <i class="fa-brands fa-github"></i>
          </a>
        </div>
      </div>
    </div>
  </footer>

  <!-- ========== JAVASCRIPT ========== -->
  <script>
    // ---- Scroll Reveal ----
    const revealObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
        }
      });
    }, {
      threshold: 0.1,
      rootMargin: '0px 0px -50px 0px'
    });

    document.querySelectorAll('.reveal').forEach(el => {
      revealObserver.observe(el);
    });

    // ---- Mobile Menu Toggle ----
    function toggleMobileMenu() {
      const menu = document.getElementById('mobile-menu');
      menu.classList.toggle('hidden');
    }

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
      }, 3500);
    }

    // ---- Contact Form Handler ----
    function handleContactSubmit(event) {
      event.preventDefault();
      const form = event.target;
      const submitBtn = form.querySelector('button[type="submit"]');
      
      const originalText = submitBtn.innerHTML;
      submitBtn.innerHTML = `
        <i class="fa-solid fa-spinner fa-spin text-xs"></i>
        Sending...
      `;
      submitBtn.disabled = true;

      setTimeout(() => {
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
        form.reset();
        showToast('Message sent successfully! We\'ll be in touch.', 'success');
      }, 1500);
    }

    // ---- Nav background on scroll ----
    const nav = document.querySelector('nav');

    window.addEventListener('scroll', () => {
      const scrollY = window.scrollY;
      
      if (scrollY > 100) {
        nav.style.background = 'rgba(255,255,255,0.9)';
        nav.style.backdropFilter = 'blur(12px)';
        nav.style.borderBottom = '1px solid #f1f5f9';
        nav.style.boxShadow = '0 1px 3px rgba(0,0,0,0.05)';
      } else {
        nav.style.background = 'transparent';
        nav.style.backdropFilter = 'none';
        nav.style.borderBottom = '1px solid transparent';
        nav.style.boxShadow = 'none';
      }
    });

    // ---- Animate progress bars when visible ----
    const barObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const bars = entry.target.querySelectorAll('.fill-anim');
          bars.forEach(bar => {
            const width = bar.style.width;
            bar.style.width = '0';
            requestAnimationFrame(() => {
              requestAnimationFrame(() => {
                bar.style.width = width;
              });
            });
          });
          barObserver.unobserve(entry.target);
        }
      });
    }, { threshold: 0.3 });

    document.querySelectorAll('.fill-anim').forEach(el => {
      barObserver.observe(el.closest('.reveal') || el.parentElement);
    });
  </script>
</body>
</html>