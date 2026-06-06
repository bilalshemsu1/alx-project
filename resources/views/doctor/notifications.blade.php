@extends('layouts.doctor')

@section('title', 'Notifications')
@section('page-title', 'Notifications')

@section('content')
  <div class="mx-auto space-y-8">
    <div class="reveal">
      <h1 class="text-3xl md:text-4xl font-medium tracking-tight text-slate-900 mb-1">
        Notifications <span class="font-serif italic text-emerald-600">Center</span>
      </h1>
      <p class="text-slate-500 font-light">Real-time patient alerts and system warnings</p>
    </div>

    <div class="reveal grid grid-cols-1 md:grid-cols-4 gap-6">
      <div class="bg-white border border-slate-100 rounded-sm p-5">
        <div class="text-xs text-slate-400 uppercase tracking-wider font-medium">Active Alerts</div>
        <div class="text-3xl font-semibold text-red-600 mt-2">12</div>
      </div>
      <div class="bg-white border border-slate-100 rounded-sm p-5">
        <div class="text-xs text-slate-400 uppercase tracking-wider font-medium">Critical</div>
        <div class="text-3xl font-semibold text-red-600 mt-2">3</div>
      </div>
      <div class="bg-white border border-slate-100 rounded-sm p-5">
        <div class="text-xs text-slate-400 uppercase tracking-wider font-medium">Medication</div>
        <div class="text-3xl font-semibold text-amber-600 mt-2">5</div>
      </div>
      <div class="bg-white border border-slate-100 rounded-sm p-5">
        <div class="text-xs text-slate-400 uppercase tracking-wider font-medium">Activity</div>
        <div class="text-3xl font-semibold text-slate-900 mt-2">4</div>
      </div>
    </div>

    <div class="reveal bg-white border border-slate-100 rounded-sm p-4 sm:p-5">
      <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
        <div class="flex flex-wrap gap-2">
          <button class="inline-flex items-center gap-2 px-3 py-2 rounded-sm bg-emerald-50 border border-emerald-100 text-xs font-medium text-emerald-700">
            <i class="fa-solid fa-layer-group text-[10px]"></i> All alerts
          </button>
          <button class="inline-flex items-center gap-2 px-3 py-2 rounded-sm bg-white border border-slate-200 text-xs font-medium text-slate-700 hover:bg-slate-50">
            <i class="fa-solid fa-circle-exclamation text-[10px] text-red-500"></i> Critical only
          </button>
          <button class="inline-flex items-center gap-2 px-3 py-2 rounded-sm bg-white border border-slate-200 text-xs font-medium text-slate-700 hover:bg-slate-50">
            <i class="fa-solid fa-pills text-[10px] text-amber-500"></i> Medication alerts
          </button>
          <button class="inline-flex items-center gap-2 px-3 py-2 rounded-sm bg-white border border-slate-200 text-xs font-medium text-slate-700 hover:bg-slate-50">
            <i class="fa-solid fa-person-walking text-[10px] text-slate-500"></i> Activity alerts
          </button>
          <button class="inline-flex items-center gap-2 px-3 py-2 rounded-sm bg-white border border-slate-200 text-xs font-medium text-slate-700 hover:bg-slate-50">
            <i class="fa-regular fa-calendar-check text-[10px] text-slate-500"></i> Appointment alerts
          </button>
          <button class="inline-flex items-center gap-2 px-3 py-2 rounded-sm bg-white border border-slate-200 text-xs font-medium text-slate-700 hover:bg-slate-50">
            <i class="fa-solid fa-gear text-[10px] text-slate-500"></i> System alerts
          </button>
        </div>
        <div class="relative">
          <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-xs text-slate-400"></i>
          <input type="text" placeholder="Search alerts..." class="pl-8 pr-4 py-2 text-sm rounded-sm border border-slate-200 bg-white text-slate-900 placeholder:text-slate-400 focus:outline-none focus:border-emerald-300 focus:ring-2 focus:ring-emerald-100 w-full sm:w-64">
        </div>
      </div>
    </div>

    <div class="space-y-6">
      <div class="reveal bg-white border border-slate-100 rounded-sm p-6">
        <div class="flex items-center justify-between mb-4">
          <h3 class="text-lg font-semibold text-slate-900 flex items-center gap-2">
            <i class="fa-solid fa-triangle-exclamation text-red-500 text-sm"></i> Critical Alerts
          </h3>
          <span class="text-xs text-red-500 font-medium">3 Active</span>
        </div>
        <div class="space-y-3">
          <div class="flex items-start justify-between gap-4 rounded-sm border border-red-100 bg-red-50/60 px-4 py-3">
            <div class="flex items-start gap-3">
              <div class="w-8 h-8 rounded-sm bg-red-100 flex items-center justify-center flex-shrink-0 mt-0.5">
                <i class="fa-solid fa-user text-red-600 text-xs"></i>
              </div>
              <div>
                <p class="text-sm font-medium text-slate-900">John Doe missed 2 doses of Metformin</p>
                <p class="text-xs text-slate-500 mt-1">Patient has not taken morning and evening medication for the past 2 days.</p>
              </div>
            </div>
            <div class="flex flex-col items-end gap-2 flex-shrink-0">
              <span class="px-2 py-1 text-[10px] font-semibold bg-red-100 text-red-700 rounded-sm uppercase">Critical</span>
              <span class="text-[10px] text-slate-400">12 min ago</span>
            </div>
          </div>

          <div class="flex items-start justify-between gap-4 rounded-sm border border-red-100 bg-red-50/60 px-4 py-3">
            <div class="flex items-start gap-3">
              <div class="w-8 h-8 rounded-sm bg-red-100 flex items-center justify-center flex-shrink-0 mt-0.5">
                <i class="fa-solid fa-user text-red-600 text-xs"></i>
              </div>
              <div>
                <p class="text-sm font-medium text-slate-900">Sarah Ali has critically low activity for 3 days</p>
                <p class="text-xs text-slate-500 mt-1">No exercise or walking tasks completed since April 2nd.</p>
              </div>
            </div>
            <div class="flex flex-col items-end gap-2 flex-shrink-0">
              <span class="px-2 py-1 text-[10px] font-semibold bg-red-100 text-red-700 rounded-sm uppercase">Critical</span>
              <span class="text-[10px] text-slate-400">1h ago</span>
            </div>
          </div>

          <div class="flex items-start justify-between gap-4 rounded-sm border border-red-100 bg-red-50/60 px-4 py-3">
            <div class="flex items-start gap-3">
              <div class="w-8 h-8 rounded-sm bg-red-100 flex items-center justify-center flex-shrink-0 mt-0.5">
                <i class="fa-solid fa-user text-red-600 text-xs"></i>
              </div>
              <div>
                <p class="text-sm font-medium text-slate-900">Ahmed Hassan missed hospital appointment</p>
                <p class="text-xs text-slate-500 mt-1">Scheduled cardiology review was not attended. Follow-up required.</p>
              </div>
            </div>
            <div class="flex flex-col items-end gap-2 flex-shrink-0">
              <span class="px-2 py-1 text-[10px] font-semibold bg-red-100 text-red-700 rounded-sm uppercase">Critical</span>
              <span class="text-[10px] text-slate-400">3h ago</span>
            </div>
          </div>
        </div>
      </div>

      <div class="reveal bg-white border border-slate-100 rounded-sm p-6">
        <div class="flex items-center justify-between mb-4">
          <h3 class="text-lg font-semibold text-slate-900 flex items-center gap-2">
            <i class="fa-solid fa-pills text-amber-500 text-sm"></i> Medication Alerts
          </h3>
          <span class="text-xs text-slate-500 font-medium">5 Active</span>
        </div>
        <div class="space-y-3">
          <div class="flex items-start justify-between gap-4 rounded-sm border border-slate-100 bg-slate-50 px-4 py-3">
            <div class="flex items-start gap-3">
              <div class="w-8 h-8 rounded-sm bg-emerald-50 border border-emerald-100 flex items-center justify-center flex-shrink-0 mt-0.5">
                <i class="fa-solid fa-user text-emerald-600 text-xs"></i>
              </div>
              <div>
                <p class="text-sm font-medium text-slate-900">John Doe — Missed Paracetamol 2 times today</p>
                <p class="text-xs text-slate-500 mt-1">Doses scheduled for 10:00 AM and 2:00 PM were not recorded.</p>
              </div>
            </div>
            <div class="flex flex-col items-end gap-2 flex-shrink-0">
              <span class="px-2 py-1 text-[10px] font-semibold bg-amber-100 text-amber-700 rounded-sm uppercase">High</span>
              <span class="text-[10px] text-slate-400">45 min ago</span>
            </div>
          </div>

          <div class="flex items-start justify-between gap-4 rounded-sm border border-slate-100 bg-slate-50 px-4 py-3">
            <div class="flex items-start gap-3">
              <div class="w-8 h-8 rounded-sm bg-emerald-50 border border-emerald-100 flex items-center justify-center flex-shrink-0 mt-0.5">
                <i class="fa-solid fa-user text-emerald-600 text-xs"></i>
              </div>
              <div>
                <p class="text-sm font-medium text-slate-900">Sarah Ali — Late Metformin dose by 3 hours</p>
                <p class="text-xs text-slate-500 mt-1">Dose was scheduled at 8:00 AM but recorded only at 11:15 AM.</p>
              </div>
            </div>
            <div class="flex flex-col items-end gap-2 flex-shrink-0">
              <span class="px-2 py-1 text-[10px] font-semibold bg-amber-100 text-amber-700 rounded-sm uppercase">High</span>
              <span class="text-[10px] text-slate-400">2h ago</span>
            </div>
          </div>

          <div class="flex items-start justify-between gap-4 rounded-sm border border-slate-100 bg-slate-50 px-4 py-3">
            <div class="flex items-start gap-3">
              <div class="w-8 h-8 rounded-sm bg-emerald-50 border border-emerald-100 flex items-center justify-center flex-shrink-0 mt-0.5">
                <i class="fa-solid fa-user text-emerald-600 text-xs"></i>
              </div>
              <div>
                <p class="text-sm font-medium text-slate-900">Ahmed Hassan — Missed daily insulin dose</p>
                <p class="text-xs text-slate-500 mt-1">Evening insulin not recorded. Patient contacted but no response yet.</p>
              </div>
            </div>
            <div class="flex flex-col items-end gap-2 flex-shrink-0">
              <span class="px-2 py-1 text-[10px] font-semibold bg-red-100 text-red-700 rounded-sm uppercase">Critical</span>
              <span class="text-[10px] text-slate-400">4h ago</span>
            </div>
          </div>

          <div class="flex items-start justify-between gap-4 rounded-sm border border-slate-100 bg-slate-50 px-4 py-3">
            <div class="flex items-start gap-3">
              <div class="w-8 h-8 rounded-sm bg-emerald-50 border border-emerald-100 flex items-center justify-center flex-shrink-0 mt-0.5">
                <i class="fa-solid fa-user text-emerald-600 text-xs"></i>
              </div>
              <div>
                <p class="text-sm font-medium text-slate-900">Omar Fayed — Repeated non-compliance for Lisinopril</p>
                <p class="text-xs text-slate-500 mt-1">Missed doses on 4 out of last 7 days.</p>
              </div>
            </div>
            <div class="flex flex-col items-end gap-2 flex-shrink-0">
              <span class="px-2 py-1 text-[10px] font-semibold bg-amber-100 text-amber-700 rounded-sm uppercase">High</span>
              <span class="text-[10px] text-slate-400">6h ago</span>
            </div>
          </div>
        </div>
      </div>

      <div class="reveal grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white border border-slate-100 rounded-sm p-6">
          <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-slate-900 flex items-center gap-2">
              <i class="fa-solid fa-person-walking text-slate-500 text-sm"></i> Activity Alerts
            </h3>
            <span class="text-xs text-slate-500 font-medium">4 Active</span>
          </div>
          <div class="space-y-3">
            <div class="flex items-start justify-between gap-4 rounded-sm border border-slate-100 bg-slate-50 px-4 py-3">
              <div class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-sm bg-emerald-50 border border-emerald-100 flex items-center justify-center flex-shrink-0 mt-0.5">
                  <i class="fa-solid fa-user text-emerald-600 text-xs"></i>
                </div>
                <div>
                  <p class="text-sm font-medium text-slate-900">Ahmed Hassan — No walking activity for 2 days</p>
                  <p class="text-xs text-slate-500 mt-1">Last recorded walk was on April 2nd. Target is 30 min daily.</p>
                </div>
              </div>
              <div class="flex flex-col items-end gap-2 flex-shrink-0">
                <span class="px-2 py-1 text-[10px] font-semibold bg-amber-100 text-amber-700 rounded-sm uppercase">Medium</span>
                <span class="text-[10px] text-slate-400">5h ago</span>
              </div>
            </div>

            <div class="flex items-start justify-between gap-4 rounded-sm border border-slate-100 bg-slate-50 px-4 py-3">
              <div class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-sm bg-emerald-50 border border-emerald-100 flex items-center justify-center flex-shrink-0 mt-0.5">
                  <i class="fa-solid fa-user text-emerald-600 text-xs"></i>
                </div>
                <div>
                  <p class="text-sm font-medium text-slate-900">Sarah Ali — Exercise proof not uploaded</p>
                  <p class="text-xs text-slate-500 mt-1">Morning session completed but no confirmation photo received.</p>
                </div>
              </div>
              <div class="flex flex-col items-end gap-2 flex-shrink-0">
                <span class="px-2 py-1 text-[10px] font-semibold bg-amber-100 text-amber-700 rounded-sm uppercase">Medium</span>
                <span class="text-[10px] text-slate-400">8h ago</span>
              </div>
            </div>

            <div class="flex items-start justify-between gap-4 rounded-sm border border-slate-100 bg-slate-50 px-4 py-3">
              <div class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-sm bg-emerald-50 border border-emerald-100 flex items-center justify-center flex-shrink-0 mt-0.5">
                  <i class="fa-solid fa-user text-emerald-600 text-xs"></i>
                </div>
                <div>
                  <p class="text-sm font-medium text-slate-900">Mina Patel — Missed yoga session</p>
                  <p class="text-xs text-slate-500 mt-1">Scheduled afternoon yoga was not marked as completed.</p>
                </div>
              </div>
              <div class="flex flex-col items-end gap-2 flex-shrink-0">
                <span class="px-2 py-1 text-[10px] font-semibold bg-blue-100 text-blue-700 rounded-sm uppercase">Low</span>
                <span class="text-[10px] text-slate-400">1d ago</span>
              </div>
            </div>
          </div>
        </div>

        <div class="bg-white border border-slate-100 rounded-sm p-6">
          <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-slate-900 flex items-center gap-2">
              <i class="fa-regular fa-calendar-check text-slate-500 text-sm"></i> Appointment Alerts
            </h3>
            <span class="text-xs text-slate-500 font-medium">3 Active</span>
          </div>
          <div class="space-y-3">
            <div class="flex items-start justify-between gap-4 rounded-sm border border-slate-100 bg-slate-50 px-4 py-3">
              <div class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-sm bg-emerald-50 border border-emerald-100 flex items-center justify-center flex-shrink-0 mt-0.5">
                  <i class="fa-solid fa-user text-emerald-600 text-xs"></i>
                </div>
                <div>
                  <p class="text-sm font-medium text-slate-900">John Doe — Missed follow-up appointment</p>
                  <p class="text-xs text-slate-500 mt-1">Scheduled for Apr 10 at 10:30 AM. No show recorded.</p>
                </div>
              </div>
              <div class="flex flex-col items-end gap-2 flex-shrink-0">
                <span class="px-2 py-1 text-[10px] font-semibold bg-red-100 text-red-700 rounded-sm uppercase">Critical</span>
                <span class="text-[10px] text-slate-400">2d ago</span>
              </div>
            </div>

            <div class="flex items-start justify-between gap-4 rounded-sm border border-slate-100 bg-slate-50 px-4 py-3">
              <div class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-sm bg-red-50 border border-red-100 flex items-center justify-center flex-shrink-0 mt-0.5">
                  <i class="fa-solid fa-user text-red-600 text-xs"></i>
                </div>
                <div>
                  <p class="text-sm font-medium text-slate-900">Ahmed Hassan — Appointment tomorrow 10:30 AM</p>
                  <p class="text-xs text-slate-500 mt-1">Cardiology checkup. Patient at high risk. Confirm attendance.</p>
                </div>
              </div>
              <div class="flex flex-col items-end gap-2 flex-shrink-0">
                <span class="px-2 py-1 text-[10px] font-semibold bg-amber-100 text-amber-700 rounded-sm uppercase">High</span>
                <span class="text-[10px] text-slate-400">5h ago</span>
              </div>
            </div>

            <div class="flex items-start justify-between gap-4 rounded-sm border border-slate-100 bg-slate-50 px-4 py-3">
              <div class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-sm bg-emerald-50 border border-emerald-100 flex items-center justify-center flex-shrink-0 mt-0.5">
                  <i class="fa-solid fa-user text-emerald-600 text-xs"></i>
                </div>
                <div>
                  <p class="text-sm font-medium text-slate-900">Layla Noor — Appointment rescheduled</p>
                  <p class="text-xs text-slate-500 mt-1">Follow-up moved from Apr 12 to Apr 14 at 2:00 PM.</p>
                </div>
              </div>
              <div class="flex flex-col items-end gap-2 flex-shrink-0">
                <span class="px-2 py-1 text-[10px] font-semibold bg-blue-100 text-blue-700 rounded-sm uppercase">Low</span>
                <span class="text-[10px] text-slate-400">1d ago</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="reveal bg-white border border-slate-100 rounded-sm p-6">
        <div class="flex items-center justify-between mb-4">
          <h3 class="text-lg font-semibold text-slate-900 flex items-center gap-2">
            <i class="fa-solid fa-gear text-slate-500 text-sm"></i> System Alerts
          </h3>
          <span class="text-xs text-slate-500 font-medium">2 Active</span>
        </div>
        <div class="space-y-3">
          <div class="flex items-start justify-between gap-4 rounded-sm border border-slate-100 bg-slate-50 px-4 py-3">
            <div class="flex items-start gap-3">
              <div class="w-8 h-8 rounded-sm bg-slate-100 flex items-center justify-center flex-shrink-0 mt-0.5">
                <i class="fa-solid fa-database text-slate-600 text-xs"></i>
              </div>
              <div>
                <p class="text-sm font-medium text-slate-900">Tracking engine sync delay detected</p>
                <p class="text-xs text-slate-500 mt-1">Data sync delayed by 15 minutes for 3 patients. Auto-retry in progress.</p>
              </div>
            </div>
            <div class="flex flex-col items-end gap-2 flex-shrink-0">
              <span class="px-2 py-1 text-[10px] font-semibold bg-amber-100 text-amber-700 rounded-sm uppercase">Medium</span>
              <span class="text-[10px] text-slate-400">30 min ago</span>
            </div>
          </div>

          <div class="flex items-start justify-between gap-4 rounded-sm border border-slate-100 bg-slate-50 px-4 py-3">
            <div class="flex items-start gap-3">
              <div class="w-8 h-8 rounded-sm bg-slate-100 flex items-center justify-center flex-shrink-0 mt-0.5">
                <i class="fa-solid fa-robot text-slate-600 text-xs"></i>
              </div>
              <div>
                <p class="text-sm font-medium text-slate-900">AI risk model analysis update available</p>
                <p class="text-xs text-slate-500 mt-1">New model v2.4 improves glucose prediction accuracy by 12%. Queueing update.</p>
              </div>
            </div>
            <div class="flex flex-col items-end gap-2 flex-shrink-0">
              <span class="px-2 py-1 text-[10px] font-semibold bg-blue-100 text-blue-700 rounded-sm uppercase">Low</span>
              <span class="text-[10px] text-slate-400">2h ago</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="reveal grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
      <button class="flex items-center justify-center gap-2 px-4 py-3 rounded-sm border border-slate-200 bg-white text-sm font-medium text-slate-700 hover:bg-emerald-50 hover:border-emerald-200 hover:text-emerald-700 transition-colors">
        <i class="fa-solid fa-check-double text-xs"></i> Mark all as reviewed
      </button>
      <button class="flex items-center justify-center gap-2 px-4 py-3 rounded-sm border border-slate-200 bg-white text-sm font-medium text-slate-700 hover:bg-emerald-50 hover:border-emerald-200 hover:text-emerald-700 transition-colors">
        <i class="fa-solid fa-filter text-xs"></i> Bulk actions
      </button>
      <button class="flex items-center justify-center gap-2 px-4 py-3 rounded-sm border border-slate-200 bg-white text-sm font-medium text-slate-700 hover:bg-emerald-50 hover:border-emerald-200 hover:text-emerald-700 transition-colors">
        <i class="fa-solid fa-download text-xs"></i> Export report
      </button>
      <button class="flex items-center justify-center gap-2 px-4 py-3 rounded-sm border border-slate-200 bg-white text-sm font-medium text-slate-700 hover:bg-emerald-50 hover:border-emerald-200 hover:text-emerald-700 transition-colors">
        <i class="fa-solid fa-rotate text-xs"></i> Refresh alerts
      </button>
    </div>
  </div>
@endsection
