@extends('layouts.doctor')

@section('title', 'Doctor Dashboard')
@section('page-title', 'Doctor Dashboard')

@section('content')
  <div class="mx-auto space-y-8">
    <div class="reveal">
      <h1 class="text-3xl md:text-4xl font-medium tracking-tight text-slate-900 mb-1">
        Doctor <span class="font-serif italic text-emerald-600">Dashboard</span>
      </h1>
      <p class="text-slate-500 font-light">Real-time health monitoring and patient supervision control panel.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 reveal">
      <div class="bg-white border border-slate-100 rounded-sm p-5">
        <div class="text-xs text-slate-400 uppercase tracking-wider font-medium">Total Patients</div>
        <div class="text-3xl font-semibold text-slate-900 mt-2">48</div>
      </div>
      <div class="bg-white border border-slate-100 rounded-sm p-5">
        <div class="text-xs text-slate-400 uppercase tracking-wider font-medium">Active Patients</div>
        <div class="text-3xl font-semibold text-emerald-600 mt-2">32</div>
      </div>
      <div class="bg-white border border-slate-100 rounded-sm p-5">
        <div class="text-xs text-slate-400 uppercase tracking-wider font-medium">High Risk Patients</div>
        <div class="text-3xl font-semibold text-red-500 mt-2">5</div>
      </div>
      <div class="bg-white border border-slate-100 rounded-sm p-5">
        <div class="text-xs text-slate-400 uppercase tracking-wider font-medium">Critical Alerts</div>
        <div class="text-3xl font-semibold text-red-600 mt-2">3</div>
      </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 reveal">
      <div class="bg-white border border-slate-100 rounded-sm p-6">
        <div class="flex items-center justify-between mb-4">
          <h3 class="text-lg font-semibold text-slate-900">Today’s Appointments</h3>
          <span class="text-xs text-emerald-600 font-medium">Updated</span>
        </div>
        <div class="space-y-3">
          <div class="flex items-center justify-between bg-emerald-50 border border-emerald-100 rounded-sm px-4 py-3">
            <div>
              <span class="text-sm text-slate-800 font-medium">John Doe</span>
              <span class="text-xs text-slate-500 block">09:00 AM - Routine Checkup</span>
            </div>
            <span class="text-xs text-emerald-600 font-semibold uppercase">Upcoming</span>
          </div>
          <div class="flex items-center justify-between bg-slate-50 border border-slate-100 rounded-sm px-4 py-3">
            <div>
              <span class="text-sm text-slate-800 font-medium">Sarah Mitchell</span>
              <span class="text-xs text-slate-500 block">10:30 AM - Follow-up Visit</span>
            </div>
            <span class="text-xs text-slate-400 font-semibold uppercase">Completed</span>
          </div>
          <div class="flex items-center justify-between bg-red-50 border border-red-100 rounded-sm px-4 py-3">
            <div>
              <span class="text-sm text-slate-800 font-medium">Ahmed Hassan</span>
              <span class="text-xs text-slate-500 block">11:00 AM - Emergency Review</span>
            </div>
            <span class="text-xs text-red-500 font-semibold uppercase">Missed</span>
          </div>
        </div>
      </div>

      <div class="bg-white border border-slate-100 rounded-sm p-6">
        <div class="flex items-center justify-between mb-4">
          <h3 class="text-lg font-semibold text-slate-900">Critical Alerts</h3>
          <span class="text-xs text-red-500 font-medium">3 Active</span>
        </div>
        <div class="space-y-4">
          <div class="flex items-start justify-between">
            <div>
              <p class="text-sm text-slate-800 font-medium">James Wilson - Missed medication</p>
              <p class="text-xs text-slate-500 mt-1">Morning dose of Metformin not recorded</p>
            </div>
            <span class="text-xs text-slate-400 whitespace-nowrap ml-4">2h ago</span>
          </div>
          <div class="border-t border-slate-50"></div>
          <div class="flex items-start justify-between">
            <div>
              <p class="text-sm text-slate-800 font-medium">Mina Patel - High glucose reading</p>
              <p class="text-xs text-slate-500 mt-1">Blood sugar exceeds safe threshold</p>
            </div>
            <span class="text-xs text-slate-400 whitespace-nowrap ml-4">4h ago</span>
          </div>
          <div class="border-t border-slate-50"></div>
          <div class="flex items-start justify-between">
            <div>
              <p class="text-sm text-slate-800 font-medium">Ahmed Khan - No activity logged</p>
              <p class="text-xs text-slate-500 mt-1">Missed exercise session for 3 days</p>
            </div>
            <span class="text-xs text-slate-400 whitespace-nowrap ml-4">6h ago</span>
          </div>
        </div>
      </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 reveal">
      <div class="bg-white border border-slate-100 rounded-sm p-6">
        <div class="flex items-center justify-between mb-4">
          <h3 class="text-lg font-semibold text-slate-900">Patient Activity Snapshot</h3>
          <span class="text-xs text-slate-400">Today</span>
        </div>
        <div class="grid grid-cols-3 gap-4 mb-4">
          <div class="text-center">
            <div class="text-2xl font-semibold text-slate-900">87%</div>
            <div class="text-xs text-slate-500 mt-1">Medicine Adherence</div>
          </div>
          <div class="text-center">
            <div class="text-2xl font-semibold text-slate-900">72%</div>
            <div class="text-xs text-slate-500 mt-1">Meal Compliance</div>
          </div>
          <div class="text-center">
            <div class="text-2xl font-semibold text-slate-900">65%</div>
            <div class="text-xs text-slate-500 mt-1">Activity Completion</div>
          </div>
        </div>
        <div class="border-t border-slate-100 pt-4 flex justify-between text-sm">
          <div>
            <span class="text-xs text-slate-500 block">Best Performer</span>
            <span class="text-sm text-emerald-600 font-medium">John Doe</span>
          </div>
          <div class="text-right">
            <span class="text-xs text-slate-500 block">Needs Attention</span>
            <span class="text-sm text-red-500 font-medium">Ahmed Hassan</span>
          </div>
        </div>
      </div>

      <div class="bg-white border border-slate-100 rounded-sm p-6">
        <div class="flex items-center justify-between mb-4">
          <h3 class="text-lg font-semibold text-slate-900">Recent Patient Updates</h3>
          <span class="text-xs text-emerald-600 font-medium">Live feed</span>
        </div>
        <div class="space-y-4 text-sm">
          <div class="flex items-start justify-between">
            <div>
              <p class="text-slate-800">John Doe completed all medicines today</p>
            </div>
            <span class="text-xs text-slate-400 whitespace-nowrap ml-4">15 min ago</span>
          </div>
          <div class="border-t border-slate-50"></div>
          <div class="flex items-start justify-between">
            <div>
              <p class="text-slate-800">Sarah Mitchell missed morning dose of Metformin</p>
            </div>
            <span class="text-xs text-slate-400 whitespace-nowrap ml-4">1h ago</span>
          </div>
          <div class="border-t border-slate-50"></div>
          <div class="flex items-start justify-between">
            <div>
              <p class="text-slate-800">Ahmed Hassan uploaded exercise proof image</p>
            </div>
            <span class="text-xs text-slate-400 whitespace-nowrap ml-4">2h ago</span>
          </div>
          <div class="border-t border-slate-50"></div>
          <div class="flex items-start justify-between">
            <div>
              <p class="text-slate-800">Mina Patel completed lunch meal plan</p>
            </div>
            <span class="text-xs text-slate-400 whitespace-nowrap ml-4">3h ago</span>
          </div>
        </div>
      </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 reveal">
      <div class="bg-white border border-slate-100 rounded-sm p-6 lg:col-span-1">
        <h3 class="text-lg font-semibold text-slate-900 mb-4">High Risk Patients</h3>
        <div class="space-y-3">
          <div class="flex items-center justify-between">
            <div>
              <span class="text-sm text-slate-800 font-medium">Ahmed Hassan</span>
              <span class="text-xs text-slate-500 block">Glucose levels elevated</span>
            </div>
            <span class="px-2 py-1 text-xs font-medium bg-red-100 text-red-600 rounded-sm">Critical</span>
          </div>
          <div class="flex items-center justify-between">
            <div>
              <span class="text-sm text-slate-800 font-medium">James Wilson</span>
              <span class="text-xs text-slate-500 block">Missed medications</span>
            </div>
            <span class="px-2 py-1 text-xs font-medium bg-red-100 text-red-600 rounded-sm">High</span>
          </div>
          <div class="flex items-center justify-between">
            <div>
              <span class="text-sm text-slate-800 font-medium">Mina Patel</span>
              <span class="text-xs text-slate-500 block">No activity for 5 days</span>
            </div>
            <span class="px-2 py-1 text-xs font-medium bg-orange-100 text-orange-600 rounded-sm">Medium</span>
          </div>
        </div>
      </div>

      <div class="bg-white border border-slate-100 rounded-sm p-6 lg:col-span-2">
        <h3 class="text-lg font-semibold text-slate-900 mb-4">Quick Actions</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
          <a href="#" class="flex flex-col items-center justify-center bg-slate-50 border border-slate-100 rounded-sm py-4 hover:bg-emerald-50 hover:border-emerald-100 transition-colors">
            <span class="text-xs text-slate-800 font-medium mt-2">View Patients</span>
          </a>
          <a href="#" class="flex flex-col items-center justify-center bg-slate-50 border border-slate-100 rounded-sm py-4 hover:bg-emerald-50 hover:border-emerald-100 transition-colors">
            <span class="text-xs text-slate-800 font-medium mt-2">Add New Patient</span>
          </a>
          <a href="#" class="flex flex-col items-center justify-center bg-slate-50 border border-slate-100 rounded-sm py-4 hover:bg-emerald-50 hover:border-emerald-100 transition-colors">
            <span class="text-xs text-slate-800 font-medium mt-2">View Alerts</span>
          </a>
          <a href="#" class="flex flex-col items-center justify-center bg-slate-50 border border-slate-100 rounded-sm py-4 hover:bg-emerald-50 hover:border-emerald-100 transition-colors">
            <span class="text-xs text-slate-800 font-medium mt-2">Patient Management</span>
          </a>
        </div>
      </div>
    </div>
  </div>
@endsection
