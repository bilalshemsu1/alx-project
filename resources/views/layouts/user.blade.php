<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'ቅድሚያ ለጤናዎ')</title>
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
    body { font-family: 'Geist', sans-serif; background: #f8fafc; color: #0f172a; }
    ::-webkit-scrollbar { width: 6px; height: 6px; }
    ::-webkit-scrollbar-track { background: transparent; }
    ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 3px; }
    ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    @keyframes grow-up { from { height: 0; } }
    .animate-grow { animation: grow-up 1s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
    @keyframes reveal-up {
      from { opacity: 0; transform: translateY(20px); filter: blur(5px); }
      to { opacity: 1; transform: translateY(0); filter: blur(0); }
    }
    .reveal { opacity: 0; transform: translateY(20px); filter: blur(5px); transition: all 0.8s cubic-bezier(0.16, 1, 0.3, 1); }
    .reveal.visible { opacity: 1; transform: translateY(0); filter: blur(0); }
  </style>
  @stack('styles')
</head>
<body class="antialiased min-h-screen overflow-x-hidden">
  <div id="sidebar-overlay" class="fixed inset-0 z-40 hidden bg-slate-900/40 backdrop-blur-[2px] lg:hidden" onclick="toggleSidebar(false)"></div>

  <aside id="sidebar" class="fixed inset-y-0 left-0 z-50 flex h-screen w-64 flex-col border-r border-slate-100 bg-white transform -translate-x-full transition-transform duration-300 ease-out lg:translate-x-0 lg:shadow-none">
    <div class="h-16 flex items-center px-6 border-b border-slate-100 flex-shrink-0">
      <a href="{{ url('/dashboard') }}" class="flex items-center gap-2.5">
        <div class="w-8 h-8 rounded-sm bg-emerald-500 flex items-center justify-center">
          <i class="fa-solid fa-heart-pulse text-sm text-white"></i>
        </div>
        <span class="text-slate-900 font-semibold text-lg tracking-tight">ቅድሚያ ለጤናዎ</span>
      </a>
    </div>

    <div class="p-4 border-b border-slate-100 relative">
      <button onclick="toggleProfileMenu()" class="w-full flex items-center gap-3 group focus:outline-none">
        <div class="w-10 h-10 bg-emerald-50 border border-emerald-100 rounded-sm flex items-center justify-center transition-all group-hover:bg-emerald-100">
          <i class="fa-solid fa-user text-emerald-600 text-sm"></i>
        </div>
        <div class="text-left flex-1">
          <div class="text-sm font-semibold text-slate-900">James Wilson</div>
          <div class="text-xs text-slate-400">Patient ID: #VIT-4029</div>
        </div>
        <i class="fa-solid fa-chevron-down text-[10px] text-slate-400 transition-transform duration-300" id="profile-chevron"></i>
      </button>

      <div id="profile-dropdown" class="hidden absolute top-full left-4 right-4 mt-2 bg-white border border-slate-200 rounded-sm shadow-lg z-[60] py-2">
        <a href="#" class="flex items-center gap-3 px-4 py-2.5 text-sm text-slate-700 hover:bg-emerald-50 hover:text-emerald-700 transition-colors">
          <i class="fa-regular fa-user w-4 text-center text-slate-400"></i> Profile
        </a>
        <a href="{{ url('/personalization') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm text-slate-700 hover:bg-emerald-50 hover:text-emerald-700 transition-colors">
          <i class="fa-solid fa-sliders w-4 text-center text-slate-400"></i> Personalisation
        </a>
        <div class="h-px bg-slate-100 my-1"></div>
        <a href="#" class="flex items-center gap-3 px-4 py-2.5 text-sm text-red-500 hover:bg-red-50 transition-colors">
          <i class="fa-solid fa-right-from-bracket w-4 text-center"></i> Logout
        </a>
      </div>
    </div>

    <nav class="flex-1 p-4 space-y-1 overflow-y-auto">
      <a href="{{ url('/dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 {{ request()->is('dashboard') ? 'bg-emerald-50 text-emerald-700 font-medium' : 'text-slate-600 hover:bg-slate-50' }} rounded-sm text-sm transition-colors">
        <i class="fa-solid fa-house w-5 text-center {{ request()->is('dashboard') ? 'text-emerald-700' : 'text-slate-400' }}"></i> Dashboard
      </a>
      <a href="{{ url('/medications') }}" class="flex items-center gap-3 px-3 py-2.5 {{ request()->is('medications') ? 'bg-emerald-50 text-emerald-700 font-medium' : 'text-slate-600 hover:bg-slate-50' }} rounded-sm text-sm transition-colors">
        <i class="fa-solid fa-pills w-5 text-center {{ request()->is('medications') ? 'text-emerald-700' : 'text-slate-400' }}"></i> Medications
      </a>
      <a href="{{ url('/meal-plan') }}" class="flex items-center gap-3 px-3 py-2.5 {{ request()->is('meal-plan') ? 'bg-emerald-50 text-emerald-700 font-medium' : 'text-slate-600 hover:bg-slate-50' }} rounded-sm text-sm transition-colors">
        <i class="fa-solid fa-utensils w-5 text-center {{ request()->is('meal-plan') ? 'text-emerald-700' : 'text-slate-400' }}"></i> Meal Plan
      </a>
      <a href="{{ url('/activities') }}" class="flex items-center gap-3 px-3 py-2.5 {{ request()->is('activities') ? 'bg-emerald-50 text-emerald-700 font-medium' : 'text-slate-600 hover:bg-slate-50' }} rounded-sm text-sm transition-colors">
        <i class="fa-solid fa-person-running w-5 text-center {{ request()->is('activities') ? 'text-emerald-700' : 'text-slate-400' }}"></i> Activities
      </a>
      <a href="{{ url('/appointments') }}" class="flex items-center gap-3 px-3 py-2.5 {{ request()->is('appointments') ? 'bg-emerald-50 text-emerald-700 font-medium' : 'text-slate-600 hover:bg-slate-50' }} rounded-sm text-sm transition-colors">
        <i class="fa-regular fa-calendar-check w-5 text-center {{ request()->is('appointments') ? 'text-emerald-700' : 'text-slate-400' }}"></i> Appointments
      </a>
      <a href="#" class="flex items-center gap-3 px-3 py-2.5 text-slate-600 hover:bg-slate-50 rounded-sm text-sm transition-colors">
        <i class="fa-solid fa-chart-line w-5 text-center text-slate-400"></i> Progress
      </a>
    </nav>

    <div class="p-4 border-t border-slate-100 flex-shrink-0">
      <div class="bg-emerald-50 border border-emerald-100 rounded-sm p-4 text-center">
        <i class="fa-solid fa-headset text-emerald-600 text-lg mb-2"></i>
        <div class="text-xs font-semibold text-emerald-800 mb-1">Need Help?</div>
        <div class="text-[10px] text-emerald-600 mb-3">Contact your care team</div>
        <button class="w-full bg-emerald-500 hover:bg-emerald-600 text-white text-xs font-semibold py-2 rounded-sm transition-colors">Message Doctor</button>
      </div>
    </div>
  </aside>

  <div class="flex min-h-screen flex-1 flex-col lg:pl-64">
    <header class="sticky top-0 z-40 flex h-16 flex-shrink-0 items-center justify-between border-b border-slate-100 bg-white px-4 sm:px-6 lg:px-8">
      <div class="flex items-center gap-4">
        <button type="button" class="text-slate-700 hover:text-slate-900 lg:hidden" onclick="toggleSidebar(true)">
          <i class="fa-solid fa-bars text-xl"></i>
        </button>
        <div>
          <h2 class="text-lg font-semibold text-slate-900">@yield('page-title', 'Dashboard')</h2>
        </div>
      </div>

      <div class="flex items-center gap-5">
        <div class="hidden md:flex items-center gap-2 text-sm text-slate-500">
          <i class="fa-regular fa-calendar text-slate-400"></i>
          <span>Oct 24, 2025</span>
        </div>

        <div class="relative">
          <button onclick="toggleNotifications()" class="w-9 h-9 bg-slate-50 hover:bg-slate-100 border border-slate-100 rounded-sm flex items-center justify-center transition-colors focus:outline-none">
            <i class="fa-regular fa-bell text-slate-600"></i>
            <span class="absolute -top-1 -right-1 w-4 h-4 bg-red-500 text-white text-[8px] font-bold rounded-full flex items-center justify-center border-2 border-white">3</span>
          </button>

          <div id="notification-dropdown" class="hidden absolute top-full right-0 mt-3 w-80 bg-white border border-slate-200 rounded-sm shadow-xl z-[60] overflow-hidden">
            <div class="px-4 py-3 border-b border-slate-100 flex items-center justify-between">
              <span class="text-sm font-semibold text-slate-900">Notifications</span>
              <span class="text-xs text-emerald-600 font-medium cursor-pointer hover:underline">Mark all as read</span>
            </div>
            <div class="max-h-72 overflow-y-auto">
              <div class="flex gap-3 p-4 bg-emerald-50/50 border-b border-slate-100 hover:bg-slate-50 transition-colors cursor-pointer">
                <div class="w-8 h-8 bg-red-100 rounded-sm flex items-center justify-center flex-shrink-0 mt-0.5">
                  <i class="fa-solid fa-triangle-exclamation text-red-500 text-xs"></i>
                </div>
                <div class="flex-1">
                  <div class="text-xs font-semibold text-slate-900">Missed Medication Alert</div>
                  <div class="text-[11px] text-slate-500 mt-0.5">You missed your 8:00 AM Metformin dose.</div>
                  <div class="text-[10px] text-slate-400 mt-1">15 mins ago</div>
                </div>
                <div class="w-2 h-2 bg-emerald-500 rounded-full mt-1.5 flex-shrink-0"></div>
              </div>
              <div class="flex gap-3 p-4 bg-emerald-50/50 border-b border-slate-100 hover:bg-slate-50 transition-colors cursor-pointer">
                <div class="w-8 h-8 bg-blue-100 rounded-sm flex items-center justify-center flex-shrink-0 mt-0.5">
                  <i class="fa-regular fa-calendar text-blue-500 text-xs"></i>
                </div>
                <div class="flex-1">
                  <div class="text-xs font-semibold text-slate-900">Upcoming Appointment</div>
                  <div class="text-[11px] text-slate-500 mt-0.5">Dr. Mitchell - Cardiology, Tomorrow 10:30 AM</div>
                  <div class="text-[10px] text-slate-400 mt-1">2 hours ago</div>
                </div>
                <div class="w-2 h-2 bg-emerald-500 rounded-full mt-1.5 flex-shrink-0"></div>
              </div>
              <div class="flex gap-3 p-4 hover:bg-slate-50 transition-colors cursor-pointer">
                <div class="w-8 h-8 bg-green-100 rounded-sm flex items-center justify-center flex-shrink-0 mt-0.5">
                  <i class="fa-solid fa-check text-green-600 text-xs"></i>
                </div>
                <div class="flex-1">
                  <div class="text-xs font-medium text-slate-700">Activity Completed</div>
                  <div class="text-[11px] text-slate-400 mt-0.5">Morning walk successfully logged.</div>
                  <div class="text-[10px] text-slate-300 mt-1">Yesterday</div>
                </div>
              </div>
            </div>
            <div class="px-4 py-3 border-t border-slate-100 text-center bg-slate-50/50">
              <a href="#" class="text-xs font-semibold text-emerald-600 hover:text-emerald-700 transition-colors">View All Notifications</a>
            </div>
          </div>
        </div>

        <div class="flex items-center gap-3 border-l border-slate-100 pl-5">
          <div class="hidden sm:block text-right">
            <div class="text-sm font-medium text-slate-900">James Wilson</div>
            <div class="text-[10px] text-emerald-600 font-medium flex items-center justify-end gap-1">
              <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full"></span> Active Plan
            </div>
          </div>
          <div class="w-9 h-9 bg-emerald-500 rounded-sm flex items-center justify-center text-white font-bold text-sm">JW</div>
        </div>
      </div>
    </header>

    <main class="flex-1 overflow-y-auto p-4 sm:p-6 lg:p-8">
      @yield('content')
    </main>
  </div>

  <script>
    const revealObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
        }
      });
    }, {
      threshold: 0.1,
      rootMargin: '0px 0px -30px 0px',
      root: document.querySelector('main')
    });

    document.querySelectorAll('.reveal').forEach(el => {
      revealObserver.observe(el);
    });

    document.addEventListener('click', (e) => {
      const profileBtn = document.querySelector('[onclick="toggleProfileMenu()"]');
      const profileDropdown = document.getElementById('profile-dropdown');
      if (profileBtn && profileDropdown && !profileBtn.contains(e.target) && !profileDropdown.contains(e.target)) {
        profileDropdown.classList.add('hidden');
        const chevron = document.getElementById('profile-chevron');
        if (chevron) {
          chevron.style.transform = 'rotate(0deg)';
        }
      }

      const notifBtn = document.querySelector('[onclick="toggleNotifications()"]');
      const notifDropdown = document.getElementById('notification-dropdown');
      if (notifBtn && notifDropdown && !notifBtn.contains(e.target) && !notifDropdown.contains(e.target)) {
        notifDropdown.classList.add('hidden');
      }
    });

    function toggleSidebar(forceOpen = null) {
      const sidebar = document.getElementById('sidebar');
      const overlay = document.getElementById('sidebar-overlay');
      if (!sidebar || !overlay) return;

      const shouldOpen = forceOpen === null ? sidebar.classList.contains('-translate-x-full') : forceOpen;
      sidebar.classList.toggle('-translate-x-full', !shouldOpen);
      overlay.classList.toggle('hidden', !shouldOpen);
      document.body.classList.toggle('overflow-hidden', shouldOpen);
    }

    function toggleProfileMenu() {
      const dropdown = document.getElementById('profile-dropdown');
      const chevron = document.getElementById('profile-chevron');
      if (!dropdown || !chevron) return;
      dropdown.classList.toggle('hidden');
      chevron.style.transform = dropdown.classList.contains('hidden') ? 'rotate(0deg)' : 'rotate(180deg)';
    }

    function toggleNotifications() {
      const dropdown = document.getElementById('notification-dropdown');
      if (!dropdown) return;
      dropdown.classList.toggle('hidden');
    }

    function toggleTask(el) {
      const checkbox = el.querySelector('div');
      const text = el.querySelector('span');
      const isChecked = checkbox && checkbox.querySelector('i');

      if (!checkbox || !text) return;

      if (isChecked) {
        checkbox.innerHTML = '';
        checkbox.classList.remove('bg-green-50', 'border-green-200');
        checkbox.classList.add('bg-white', 'border-slate-200');
        text.classList.remove('text-slate-400', 'line-through');
        text.classList.add('text-slate-700');
      } else {
        checkbox.innerHTML = '<i class="fa-solid fa-check text-green-600 text-[9px]"></i>';
        checkbox.classList.add('bg-green-50', 'border-green-200');
        checkbox.classList.remove('bg-white', 'border-slate-200');
        text.classList.add('text-slate-400', 'line-through');
        text.classList.remove('text-slate-700');
      }
    }

    window.addEventListener('resize', () => {
      if (window.innerWidth >= 1024) {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebar-overlay');
        if (sidebar && overlay) {
          sidebar.classList.remove('-translate-x-full');
          overlay.classList.add('hidden');
          document.body.classList.remove('overflow-hidden');
        }
      }
    });
  </script>

  @stack('scripts')
</body>
</html>