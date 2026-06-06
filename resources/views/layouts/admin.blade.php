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
    ::selection { background: rgba(16,185,129,0.2); color: #064e3b; }
    html { scroll-behavior: smooth; }
    body { font-family: 'Geist', sans-serif; background: #f8fafc; color: #0f172a; }
    ::-webkit-scrollbar { width: 6px; height: 6px; }
    ::-webkit-scrollbar-track { background: transparent; }
    ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 3px; }
    ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    .reveal { opacity: 0; transform: translateY(20px); filter: blur(5px); transition: all 0.8s cubic-bezier(0.16, 1, 0.3, 1); }
    .reveal.visible { opacity: 1; transform: translateY(0); filter: blur(0); }
  </style>
  @stack('styles')
</head>
<body class="antialiased min-h-screen overflow-x-hidden">
  <div id="sidebar-overlay" class="fixed inset-0 z-40 hidden bg-slate-900/40 backdrop-blur-[2px] lg:hidden" onclick="toggleSidebar(false)"></div>

  <aside id="sidebar" class="fixed inset-y-0 left-0 z-50 flex h-screen w-72 flex-col border-r border-slate-100 bg-white transform -translate-x-full transition-transform duration-300 ease-out lg:translate-x-0 lg:shadow-none">
    <div class="h-16 flex items-center px-6 border-b border-slate-100 flex-shrink-0">
      <a href="#" class="flex items-center gap-2.5">
        <div class="w-8 h-8 rounded-sm bg-slate-900 flex items-center justify-center">
          <i class="fa-solid fa-shield-halved text-sm text-white"></i>
        </div>
        <span class="text-slate-900 font-semibold text-lg tracking-tight">ቅድሚያ ለጤናዎ</span>
      </a>
    </div>

    <div class="p-4 border-b border-slate-100">
      <div class="flex items-center gap-3">
        <div class="w-10 h-10 bg-slate-100 border border-slate-200 rounded-sm flex items-center justify-center">
          <i class="fa-solid fa-user-gear text-slate-600 text-sm"></i>
        </div>
        <div class="text-left flex-1">
          <div class="text-sm font-semibold text-slate-900">Admin User</div>
          <div class="text-xs text-slate-400">System oversight</div>
        </div>
      </div>

      <div class="relative mt-4">
        <button type="button" onclick="toggleAdminSidebarProfile()" class="w-full flex items-center justify-between gap-3 rounded-sm border border-slate-100 bg-slate-50 px-3 py-2.5 text-left transition-colors hover:bg-slate-100">
          <div class="flex items-center gap-3 min-w-0">
            <div class="w-8 h-8 rounded-sm bg-slate-900 flex items-center justify-center flex-shrink-0">
              <i class="fa-solid fa-gear text-white text-[11px]"></i>
            </div>
            <div class="min-w-0">
              <div class="text-sm font-semibold text-slate-900 truncate">Account</div>
              <div class="text-[10px] text-slate-400 truncate">Settings & security</div>
            </div>
          </div>
          <i class="fa-solid fa-chevron-down text-[10px] text-slate-400 transition-transform duration-300" id="admin-sidebar-profile-chevron"></i>
        </button>

        <div id="admin-sidebar-profile-dropdown" class="hidden absolute left-0 right-0 top-full mt-2 overflow-hidden rounded-sm border border-slate-200 bg-white shadow-lg z-[60]">
          <a href="#" class="flex items-center gap-3 px-4 py-2.5 text-sm text-slate-700 hover:bg-slate-50 transition-colors">
            <i class="fa-regular fa-user w-4 text-center text-slate-400"></i> Account Settings
          </a>
          <a href="#" class="flex items-center gap-3 px-4 py-2.5 text-sm text-slate-700 hover:bg-slate-50 transition-colors">
            <i class="fa-solid fa-shield-halved w-4 text-center text-slate-400"></i> Security
          </a>
          <div class="h-px bg-slate-100"></div>
          <a href="#" class="flex items-center gap-3 px-4 py-2.5 text-sm text-red-500 hover:bg-red-50 transition-colors">
            <i class="fa-solid fa-right-from-bracket w-4 text-center"></i> Logout
          </a>
        </div>
      </div>
    </div>

    <nav class="flex-1 p-4 space-y-1 overflow-y-auto">
      <a href="#" class="flex items-center gap-3 px-3 py-2.5 bg-slate-900 text-white font-medium rounded-sm text-sm transition-colors">
        <i class="fa-solid fa-gauge-high w-5 text-center"></i> Overview
      </a>
      <a href="#" class="flex items-center gap-3 px-3 py-2.5 text-slate-600 hover:bg-slate-50 rounded-sm text-sm transition-colors">
        <i class="fa-solid fa-users w-5 text-center text-slate-400"></i> Users
      </a>
      <a href="#" class="flex items-center gap-3 px-3 py-2.5 text-slate-600 hover:bg-slate-50 rounded-sm text-sm transition-colors">
        <i class="fa-solid fa-user-doctor w-5 text-center text-slate-400"></i> Doctors
      </a>
      <a href="#" class="flex items-center gap-3 px-3 py-2.5 text-slate-600 hover:bg-slate-50 rounded-sm text-sm transition-colors">
        <i class="fa-solid fa-bed-pulse w-5 text-center text-slate-400"></i> Patients
      </a>
      <a href="#" class="flex items-center gap-3 px-3 py-2.5 text-slate-600 hover:bg-slate-50 rounded-sm text-sm transition-colors">
        <i class="fa-regular fa-calendar-check w-5 text-center text-slate-400"></i> Appointments
      </a>
      <a href="#" class="flex items-center gap-3 px-3 py-2.5 text-slate-600 hover:bg-slate-50 rounded-sm text-sm transition-colors">
        <i class="fa-solid fa-chart-line w-5 text-center text-slate-400"></i> Reports
      </a>
      <a href="#" class="flex items-center gap-3 px-3 py-2.5 text-slate-600 hover:bg-slate-50 rounded-sm text-sm transition-colors">
        <i class="fa-solid fa-bell w-5 text-center text-slate-400"></i> Alerts
      </a>
    </nav>

    <div class="p-4 border-t border-slate-100 flex-shrink-0">
      <div class="bg-slate-50 border border-slate-100 rounded-sm p-4 text-center">
        <i class="fa-solid fa-gear text-slate-600 text-lg mb-2"></i>
        <div class="text-xs font-semibold text-slate-800 mb-1">Admin Tools</div>
        <div class="text-[10px] text-slate-500 mb-3">Placeholder layout for now</div>
        <button class="w-full bg-slate-900 hover:bg-slate-800 text-white text-xs font-semibold py-2 rounded-sm transition-colors">Open Panel</button>
      </div>
    </div>
  </aside>

  <div class="flex min-h-screen flex-1 flex-col lg:pl-72">
    <header class="sticky top-0 z-40 flex h-16 flex-shrink-0 items-center justify-between border-b border-slate-100 bg-white px-4 sm:px-6 lg:px-8">
      <div class="flex items-center gap-4">
        <button type="button" class="text-slate-700 hover:text-slate-900 lg:hidden" onclick="toggleSidebar(true)">
          <i class="fa-solid fa-bars text-xl"></i>
        </button>
        <div>
          <h2 class="text-lg font-semibold text-slate-900">@yield('page-title', 'Admin Dashboard')</h2>
        </div>
      </div>
      <div class="relative">
        <button type="button" onclick="toggleAdminTopProfile()" class="flex items-center gap-3 rounded-sm border border-slate-100 bg-slate-50 px-3 py-2 transition-colors hover:bg-slate-100">
          <div class="hidden sm:block text-right">
            <div class="text-sm font-medium text-slate-900">Admin User</div>
            <div class="text-[10px] text-slate-400">System oversight</div>
          </div>
          <div class="w-9 h-9 bg-slate-900 rounded-sm flex items-center justify-center text-white font-bold text-sm">AU</div>
          <i class="fa-solid fa-chevron-down text-[10px] text-slate-400 hidden sm:block" id="admin-top-profile-chevron"></i>
        </button>

        <div id="admin-top-profile-dropdown" class="hidden absolute right-0 top-full mt-3 w-56 overflow-hidden rounded-sm border border-slate-200 bg-white shadow-xl z-[60]">
          <a href="#" class="flex items-center gap-3 px-4 py-2.5 text-sm text-slate-700 hover:bg-slate-50 transition-colors">
            <i class="fa-regular fa-user w-4 text-center text-slate-400"></i> Account Settings
          </a>
          <a href="#" class="flex items-center gap-3 px-4 py-2.5 text-sm text-slate-700 hover:bg-slate-50 transition-colors">
            <i class="fa-regular fa-bell w-4 text-center text-slate-400"></i> Notifications
          </a>
          <div class="h-px bg-slate-100"></div>
          <a href="#" class="flex items-center gap-3 px-4 py-2.5 text-sm text-red-500 hover:bg-red-50 transition-colors">
            <i class="fa-solid fa-right-from-bracket w-4 text-center"></i> Logout
          </a>
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
    }, { threshold: 0.1, rootMargin: '0px 0px -30px 0px', root: document.querySelector('main') });

    document.querySelectorAll('.reveal').forEach(el => revealObserver.observe(el));

    function toggleSidebar(forceOpen = null) {
      const sidebar = document.getElementById('sidebar');
      const overlay = document.getElementById('sidebar-overlay');
      if (!sidebar || !overlay) return;

      const shouldOpen = forceOpen === null ? sidebar.classList.contains('-translate-x-full') : forceOpen;
      sidebar.classList.toggle('-translate-x-full', !shouldOpen);
      overlay.classList.toggle('hidden', !shouldOpen);
      document.body.classList.toggle('overflow-hidden', shouldOpen);
    }

    function toggleAdminSidebarProfile() {
      const dropdown = document.getElementById('admin-sidebar-profile-dropdown');
      const chevron = document.getElementById('admin-sidebar-profile-chevron');
      if (!dropdown || !chevron) return;
      dropdown.classList.toggle('hidden');
      chevron.style.transform = dropdown.classList.contains('hidden') ? 'rotate(0deg)' : 'rotate(180deg)';
    }

    function toggleAdminTopProfile() {
      const dropdown = document.getElementById('admin-top-profile-dropdown');
      const chevron = document.getElementById('admin-top-profile-chevron');
      if (!dropdown || !chevron) return;
      dropdown.classList.toggle('hidden');
      chevron.style.transform = dropdown.classList.contains('hidden') ? 'rotate(0deg)' : 'rotate(180deg)';
    }

    document.addEventListener('click', (e) => {
      const sidebarButton = document.querySelector('[onclick="toggleAdminSidebarProfile()"]');
      const sidebarDropdown = document.getElementById('admin-sidebar-profile-dropdown');
      if (sidebarButton && sidebarDropdown && !sidebarButton.contains(e.target) && !sidebarDropdown.contains(e.target)) {
        sidebarDropdown.classList.add('hidden');
        const chevron = document.getElementById('admin-sidebar-profile-chevron');
        if (chevron) chevron.style.transform = 'rotate(0deg)';
      }

      const topButton = document.querySelector('[onclick="toggleAdminTopProfile()"]');
      const topDropdown = document.getElementById('admin-top-profile-dropdown');
      if (topButton && topDropdown && !topButton.contains(e.target) && !topDropdown.contains(e.target)) {
        topDropdown.classList.add('hidden');
        const chevron = document.getElementById('admin-top-profile-chevron');
        if (chevron) chevron.style.transform = 'rotate(0deg)';
      }
    });

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
