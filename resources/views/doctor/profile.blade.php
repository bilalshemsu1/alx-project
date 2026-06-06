@extends('layouts.doctor')

@section('title', 'Profile')
@section('page-title', 'Profile')

@section('content')
  <div class="mx-auto space-y-8">
    <div class="reveal">
      <h1 class="text-3xl md:text-4xl font-medium tracking-tight text-slate-900 mb-1">
        Profile <span class="font-serif italic text-emerald-600">Settings</span>
      </h1>
      <p class="text-slate-500 font-light">Manage your account and security settings</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
      <div class="lg:col-span-2 space-y-6 reveal">
        <div class="bg-white border border-slate-100 rounded-sm p-6">
          <div class="flex items-center gap-4 mb-5">
            <div class="w-16 h-16 rounded-sm bg-emerald-50 border border-emerald-100 flex items-center justify-center flex-shrink-0">
              <i class="fa-solid fa-user-doctor text-emerald-600 text-2xl"></i>
            </div>
            <div>
              <h3 class="text-lg font-semibold text-slate-900">Dr. Placeholder</h3>
              <p class="text-xs text-slate-500">General Physician</p>
            </div>
          </div>
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
              <label class="block text-xs font-medium text-slate-700 mb-1.5">Doctor Name</label>
              <input type="text" value="Dr. Placeholder" class="w-full px-3 py-2 rounded-sm border border-slate-200 bg-white text-sm text-slate-900 focus:outline-none focus:border-emerald-300 focus:ring-2 focus:ring-emerald-100">
            </div>
            <div>
              <label class="block text-xs font-medium text-slate-700 mb-1.5">Email</label>
              <input type="email" value="doctor@qadima-alhaya.com" class="w-full px-3 py-2 rounded-sm border border-slate-200 bg-white text-sm text-slate-900 focus:outline-none focus:border-emerald-300 focus:ring-2 focus:ring-emerald-100">
            </div>
            <div>
              <label class="block text-xs font-medium text-slate-700 mb-1.5">Specialization</label>
              <input type="text" value="General Physician" class="w-full px-3 py-2 rounded-sm border border-slate-200 bg-white text-sm text-slate-900 focus:outline-none focus:border-emerald-300 focus:ring-2 focus:ring-emerald-100">
            </div>
            <div>
              <label class="block text-xs font-medium text-slate-700 mb-1.5">Account Status</label>
              <div class="w-full px-3 py-2 rounded-sm border border-emerald-100 bg-emerald-50 text-sm text-emerald-700 font-medium">Active</div>
            </div>
          </div>
        </div>

        <div class="bg-white border border-slate-100 rounded-sm p-6">
          <h3 class="text-lg font-semibold text-slate-900 mb-4 flex items-center gap-2">
            <i class="fa-solid fa-lock text-slate-500 text-sm"></i> Change Password
          </h3>
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
              <label class="block text-xs font-medium text-slate-700 mb-1.5">Current Password</label>
              <input type="password" placeholder="Enter current password" class="w-full px-3 py-2 rounded-sm border border-slate-200 bg-white text-sm text-slate-900 placeholder:text-slate-400 focus:outline-none focus:border-emerald-300 focus:ring-2 focus:ring-emerald-100">
            </div>
            <div>
              <label class="block text-xs font-medium text-slate-700 mb-1.5">New Password</label>
              <input type="password" placeholder="Enter new password" class="w-full px-3 py-2 rounded-sm border border-slate-200 bg-white text-sm text-slate-900 placeholder:text-slate-400 focus:outline-none focus:border-emerald-300 focus:ring-2 focus:ring-emerald-100">
            </div>
            <div>
              <label class="block text-xs font-medium text-slate-700 mb-1.5">Confirm Password</label>
              <input type="password" placeholder="Confirm new password" class="w-full px-3 py-2 rounded-sm border border-slate-200 bg-white text-sm text-slate-900 placeholder:text-slate-400 focus:outline-none focus:border-emerald-300 focus:ring-2 focus:ring-emerald-100">
            </div>
            <div class="flex items-end">
              <button class="inline-flex items-center justify-center gap-2 px-4 py-2 rounded-sm bg-emerald-500 text-white text-sm font-medium hover:bg-emerald-600 transition-colors">
                <i class="fa-solid fa-key text-xs"></i>
                Save Changes
              </button>
            </div>
          </div>
        </div>

        <div class="bg-white border border-slate-100 rounded-sm p-6">
          <h3 class="text-lg font-semibold text-slate-900 mb-4 flex items-center gap-2">
            <i class="fa-solid fa-shield text-slate-500 text-sm"></i> Security Settings
          </h3>
          <div class="space-y-4">
            <div class="flex items-center justify-between rounded-sm border border-slate-100 bg-slate-50 px-4 py-3">
              <div>
                <p class="text-sm font-medium text-slate-900">Two-Factor Authentication</p>
                <p class="text-xs text-slate-500 mt-0.5">Add an extra layer of security to your account</p>
              </div>
              <label class="relative inline-flex items-center cursor-pointer">
                <input type="checkbox" checked class="sr-only peer">
                <div class="w-9 h-5 bg-slate-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-emerald-100 rounded-sm peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-sm after:h-4 after:w-4 after:transition-all peer-checked:bg-emerald-500"></div>
              </label>
            </div>
            <div class="flex items-center justify-between rounded-sm border border-slate-100 bg-slate-50 px-4 py-3">
              <div>
                <p class="text-sm font-medium text-slate-900">Login Session Management</p>
                <p class="text-xs text-slate-500 mt-0.5">Review and manage active login sessions</p>
              </div>
              <button class="inline-flex items-center justify-center gap-2 px-3 py-1.5 rounded-sm bg-white border border-slate-200 text-xs font-medium text-slate-700 hover:bg-emerald-50 hover:border-emerald-200 hover:text-emerald-700 transition-colors">
                <i class="fa-solid fa-list-check text-[10px]"></i> View Sessions
              </button>
            </div>
          </div>
        </div>

        <div class="bg-white border border-slate-100 rounded-sm p-6">
          <h3 class="text-lg font-semibold text-slate-900 mb-4 flex items-center gap-2">
            <i class="fa-solid fa-bell text-slate-500 text-sm"></i> Notification Preferences
          </h3>
          <div class="space-y-3">
            <div class="flex items-center justify-between rounded-sm border border-slate-100 bg-slate-50 px-4 py-3">
              <div>
                <p class="text-sm font-medium text-slate-900">Patient Alerts</p>
                <p class="text-xs text-slate-500 mt-0.5">Updates about patient medication and activity</p>
              </div>
              <label class="relative inline-flex items-center cursor-pointer">
                <input type="checkbox" checked class="sr-only peer">
                <div class="w-9 h-5 bg-slate-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-emerald-100 rounded-sm peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-sm after:h-4 after:w-4 after:transition-all peer-checked:bg-emerald-500"></div>
              </label>
            </div>
            <div class="flex items-center justify-between rounded-sm border border-slate-100 bg-slate-50 px-4 py-3">
              <div>
                <p class="text-sm font-medium text-slate-900">Critical Health Alerts</p>
                <p class="text-xs text-slate-500 mt-0.5">High-risk patient warnings and emergencies</p>
              </div>
              <label class="relative inline-flex items-center cursor-pointer">
                <input type="checkbox" checked class="sr-only peer">
                <div class="w-9 h-5 bg-slate-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-emerald-100 rounded-sm peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-sm after:h-4 after:w-4 after:transition-all peer-checked:bg-emerald-500"></div>
              </label>
            </div>
            <div class="flex items-center justify-between rounded-sm border border-slate-100 bg-slate-50 px-4 py-3">
              <div>
                <p class="text-sm font-medium text-slate-900">Appointment Reminders</p>
                <p class="text-xs text-slate-500 mt-0.5">Reminders for upcoming appointments</p>
              </div>
              <label class="relative inline-flex items-center cursor-pointer">
                <input type="checkbox" class="sr-only peer">
                <div class="w-9 h-5 bg-slate-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-emerald-100 rounded-sm peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-sm after:h-4 after:w-4 after:transition-all peer-checked:bg-emerald-500"></div>
              </label>
            </div>
            <div class="flex items-center justify-between rounded-sm border border-slate-100 bg-slate-50 px-4 py-3">
              <div>
                <p class="text-sm font-medium text-slate-900">System Notifications</p>
                <p class="text-xs text-slate-500 mt-0.5">Platform updates and maintenance alerts</p>
              </div>
              <label class="relative inline-flex items-center cursor-pointer">
                <input type="checkbox" checked class="sr-only peer">
                <div class="w-9 h-5 bg-slate-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-emerald-100 rounded-sm peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-sm after:h-4 after:w-4 after:transition-all peer-checked:bg-emerald-500"></div>
              </label>
            </div>
          </div>
        </div>
      </div>

      <div class="space-y-6 reveal">
        <div class="bg-white border border-slate-100 rounded-sm p-6">
          <h3 class="text-lg font-semibold text-slate-900 mb-4">Account Summary</h3>
          <div class="space-y-4">
            <div>
              <p class="text-xs text-slate-500 uppercase tracking-wider font-medium">Account Health</p>
              <p class="text-sm text-emerald-600 font-semibold mt-1">Secure</p>
            </div>
            <div class="h-px bg-slate-100"></div>
            <div>
              <p class="text-xs text-slate-500 uppercase tracking-wider font-medium">Activity Level</p>
              <p class="text-sm text-slate-900 font-semibold mt-1">Active</p>
            </div>
            <div class="h-px bg-slate-100"></div>
            <div>
              <p class="text-xs text-slate-500 uppercase tracking-wider font-medium">System Engagement</p>
              <p class="text-sm text-slate-900 font-semibold mt-1">High</p>
            </div>
            <div class="h-px bg-slate-100"></div>
            <div>
              <p class="text-xs text-slate-500 uppercase tracking-wider font-medium">Last Login</p>
              <p class="text-sm text-slate-900 font-semibold mt-1">Today, 08:45 AM</p>
              <p class="text-xs text-slate-400 mt-0.5">Chrome / Windows</p>
            </div>
          </div>
        </div>

        <div class="bg-white border border-slate-100 rounded-sm p-6">
          <h3 class="text-lg font-semibold text-slate-900 mb-4">Quick Actions</h3>
          <div class="space-y-3">
            <button class="w-full flex items-center justify-center gap-2 px-4 py-2.5 rounded-sm bg-emerald-500 text-white text-sm font-medium hover:bg-emerald-600 transition-colors">
              <i class="fa-solid fa-floppy-disk text-xs"></i> Save Changes
            </button>
            <button class="w-full flex items-center justify-center gap-2 px-4 py-2.5 rounded-sm border border-slate-200 bg-white text-sm font-medium text-slate-700 hover:bg-red-50 hover:border-red-200 hover:text-red-700 transition-colors">
              <i class="fa-solid fa-right-from-bracket text-xs"></i> Logout
            </button>
            <button class="w-full flex items-center justify-center gap-2 px-4 py-2.5 rounded-sm border border-slate-200 bg-white text-sm font-medium text-slate-700 hover:bg-emerald-50 hover:border-emerald-200 hover:text-emerald-700 transition-colors">
              <i class="fa-solid fa-rotate text-xs"></i> Reset Password
            </button>
            <button class="w-full flex items-center justify-center gap-2 px-4 py-2.5 rounded-sm border border-slate-200 bg-white text-sm font-medium text-slate-700 hover:bg-red-50 hover:border-red-200 hover:text-red-700 transition-colors">
              <i class="fa-solid fa-user-xmark text-xs"></i> Deactivate Account
            </button>
          </div>
        </div>

        <div class="bg-white border border-slate-100 rounded-sm p-6">
          <h3 class="text-lg font-semibold text-slate-900 mb-4">Activity Stats</h3>
          <div class="space-y-3">
            <div class="flex items-center justify-between">
              <span class="text-sm text-slate-600">Patients Managed</span>
              <span class="text-sm font-semibold text-slate-900">48</span>
            </div>
            <div class="h-px bg-slate-100"></div>
            <div class="flex items-center justify-between">
              <span class="text-sm text-slate-600">Alerts Handled</span>
              <span class="text-sm font-semibold text-slate-900">156</span>
            </div>
            <div class="h-px bg-slate-100"></div>
            <div class="flex items-center justify-between">
              <span class="text-sm text-slate-600">Appointments</span>
              <span class="text-sm font-semibold text-slate-900">24 this month</span>
            </div>
            <div class="h-px bg-slate-100"></div>
            <div class="flex items-center justify-between">
              <span class="text-sm text-slate-600">Active Sessions</span>
              <span class="text-sm font-semibold text-slate-900">1</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
