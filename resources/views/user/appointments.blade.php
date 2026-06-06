@extends('layouts.user')

@section('title', 'Appointments - ቅድሚያ ለጤናዎ')
@section('page-title', 'Appointments')

@section('content')
<div class="mx-auto space-y-6 sm:space-y-8">

  {{-- PAGE HEADER --}}
  <div class="reveal rounded-sm border border-slate-100 bg-white p-5 sm:p-6 shadow-sm">
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
      <div>
        <h1 class="text-2xl font-semibold tracking-tight text-slate-900">Appointments</h1>
        <p class="mt-1 text-sm text-slate-500 font-light">Track your scheduled visits, reports, and doctor instructions</p>
      </div>
      <div class="flex flex-wrap gap-2">
        <span class="inline-flex items-center gap-1.5 rounded-full border border-emerald-200 bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-800">
          <i class="fa-solid fa-check text-[10px]"></i> Active Care Plan
        </span>
        <span class="inline-flex items-center gap-1.5 rounded-full border border-slate-200 bg-slate-50 px-3 py-1 text-xs font-semibold text-slate-600">
          <i class="fa-solid fa-calendar text-[10px]"></i> 3 Total Visits
        </span>
      </div>
    </div>
  </div>

  {{-- ALERT: Upcoming Appointment --}}
  <div class="reveal rounded-sm border border-emerald-200 bg-emerald-50/40 p-4 sm:p-5">
    <div class="flex items-start gap-3">
      <span class="text-emerald-600 flex-shrink-0 mt-0.5"><i class="fa-solid fa-calendar-check"></i></span>
      <div class="flex-1 min-w-0 space-y-1">
        <h4 class="text-sm font-semibold text-emerald-800">Upcoming Visit — 12 June 2026</h4>
        <p class="text-xs text-emerald-700">Scheduled with <strong>Dr. Ahmed Hassan</strong> at <strong>10:30 AM</strong> — City Health Center, Ward 3. Reminder is set for 11 June at 8:00 AM.</p>
      </div>
      <div class="flex-shrink-0 flex gap-2">
        <button onclick="openRescheduleModal()" class="inline-flex items-center gap-1.5 rounded-sm bg-emerald-500 hover:bg-emerald-600 px-3 py-1.5 text-white text-xs font-semibold transition-colors">
          <i class="fa-solid fa-calendar-pen"></i> Reschedule
        </button>
        <button onclick="openCancelModal()" class="inline-flex items-center gap-1.5 rounded-sm border border-red-200 bg-white hover:bg-red-50 px-3 py-1.5 text-red-600 text-xs font-semibold transition-colors">
          <i class="fa-solid fa-xmark"></i> Cancel
        </button>
      </div>
    </div>
  </div>

  {{-- MAIN GRID --}}
  <div class="grid grid-cols-1 gap-6 xl:grid-cols-3">

    {{-- LEFT: Doctor Card + Visit Reports --}}
    <div class="xl:col-span-2 space-y-6 lg:space-y-8">

      {{-- ASSIGNED DOCTOR CARD --}}
      <section class="reveal bg-white border border-slate-100 rounded-sm p-5 sm:p-6 shadow-sm">
        <div class="flex items-center justify-between gap-3 mb-4">
          <h3 class="text-base font-semibold text-slate-900 flex items-center gap-2">
            <i class="fa-solid fa-user-doctor text-emerald-500 text-sm"></i> Assigned Physician
          </h3>
          <span class="inline-flex items-center gap-1.5 rounded-full border border-emerald-100 bg-emerald-50 px-2.5 py-0.5 text-[10px] font-semibold text-emerald-700">
            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Active
          </span>
        </div>
        <div class="flex flex-col sm:flex-row gap-5 items-start">
          <div class="w-14 h-14 rounded-sm bg-slate-100 border border-slate-200 flex items-center justify-center flex-shrink-0">
            <i class="fa-solid fa-user-doctor text-slate-500 text-xl"></i>
          </div>
          <div class="flex-1 min-w-0">
            <div class="text-lg font-semibold text-slate-900">Dr. Ahmed Hassan</div>
            <div class="text-sm text-slate-500 mt-0.5">Cardiologist &amp; Internal Medicine</div>
            <div class="mt-3 grid grid-cols-1 sm:grid-cols-3 gap-3">
              <div class="flex items-center gap-2 text-xs text-slate-600">
                <i class="fa-solid fa-hospital text-slate-400 w-4 text-center"></i>
                <span>City Health Center</span>
              </div>
              <div class="flex items-center gap-2 text-xs text-slate-600">
                <i class="fa-solid fa-location-dot text-slate-400 w-4 text-center"></i>
                <span>Ward 3, Floor 2</span>
              </div>
              <div class="flex items-center gap-2 text-xs text-slate-600">
                <i class="fa-solid fa-phone text-slate-400 w-4 text-center"></i>
                <span>+1 (555) 820-4430</span>
              </div>
            </div>
          </div>
          <div class="flex-shrink-0 text-right">
            <div class="text-[10px] uppercase tracking-wider text-slate-400 font-semibold mb-1">Next Visit</div>
            <div class="text-sm font-bold text-slate-900">12 Jun 2026</div>
            <div class="text-xs text-slate-500 flex items-center gap-1 justify-end mt-0.5">
              <i class="fa-solid fa-clock text-[9px]"></i> 10:30 AM
            </div>
          </div>
        </div>
      </section>

      {{-- VISIT REPORTS LIST --}}
      <section class="reveal bg-white border border-slate-100 rounded-sm shadow-sm overflow-hidden">
        <div class="px-5 py-4 border-b border-slate-100 flex items-center justify-between">
          <h3 class="text-base font-semibold text-slate-900 flex items-center gap-2">
            <i class="fa-solid fa-file-medical text-emerald-500 text-sm"></i> Visit Reports
          </h3>
          <span class="text-xs text-slate-400 font-medium">3 visits recorded</span>
        </div>

        <div class="divide-y divide-slate-50">

          {{-- Visit 1: Upcoming --}}
          <div class="p-5 hover:bg-slate-50/40 transition-colors">
            <div class="flex flex-col sm:flex-row sm:items-start gap-4">
              {{-- Date badge --}}
              <div class="flex-shrink-0 w-14 text-center">
                <div class="bg-emerald-500 text-white rounded-sm px-2 py-1 leading-none">
                  <div class="text-[10px] font-bold uppercase">Jun</div>
                  <div class="text-xl font-bold leading-tight">12</div>
                  <div class="text-[10px]">2026</div>
                </div>
              </div>
              {{-- Content --}}
              <div class="flex-1 min-w-0">
                <div class="flex flex-wrap items-center gap-2 mb-2">
                  <span class="text-sm font-semibold text-slate-900">Follow-up Cardiology Review</span>
                  <span class="inline-flex items-center gap-1.5 rounded-full border border-emerald-100 bg-emerald-50 px-2 py-0.5 text-[10px] font-semibold text-emerald-700">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Upcoming
                  </span>
                </div>
                <div class="text-xs text-slate-500 flex items-center gap-3 mb-3">
                  <span class="flex items-center gap-1"><i class="fa-solid fa-clock text-[9px]"></i> 10:30 AM</span>
                  <span class="flex items-center gap-1"><i class="fa-solid fa-hospital text-[9px]"></i> City Health Center</span>
                </div>
                <div class="rounded-sm border border-slate-100 bg-slate-50/60 p-3 text-xs text-slate-600 leading-relaxed">
                  <span class="font-semibold text-slate-700">Upcoming visit.</span> ECG results from last session will be reviewed. Echocardiogram scheduled. Bring all current medication packaging.
                </div>
                <div class="mt-3 flex flex-wrap gap-1.5">
                  <span class="inline-flex items-center gap-1.5 rounded-sm bg-slate-50 border border-slate-200 px-2.5 py-1 text-[10px] font-semibold text-slate-500">
                    <i class="fa-solid fa-file-lines text-[9px]"></i> No report yet
                  </span>
                </div>
              </div>
            </div>
          </div>

          {{-- Visit 2: Completed with report --}}
          <div class="p-5 hover:bg-slate-50/40 transition-colors">
            <div class="flex flex-col sm:flex-row sm:items-start gap-4">
              <div class="flex-shrink-0 w-14 text-center">
                <div class="bg-slate-200 text-slate-600 rounded-sm px-2 py-1 leading-none">
                  <div class="text-[10px] font-bold uppercase">Jun</div>
                  <div class="text-xl font-bold leading-tight">01</div>
                  <div class="text-[10px]">2026</div>
                </div>
              </div>
              <div class="flex-1 min-w-0">
                <div class="flex flex-wrap items-center gap-2 mb-2">
                  <span class="text-sm font-semibold text-slate-900">Routine Checkup &amp; Blood Work</span>
                  <span class="inline-flex items-center gap-1.5 rounded-full border border-slate-200 bg-slate-100 px-2 py-0.5 text-[10px] font-semibold text-slate-600">
                    <i class="fa-solid fa-check text-[8px]"></i> Completed
                  </span>
                </div>
                <div class="text-xs text-slate-500 flex items-center gap-3 mb-3">
                  <span class="flex items-center gap-1"><i class="fa-solid fa-clock text-[9px]"></i> 9:00 AM</span>
                  <span class="flex items-center gap-1"><i class="fa-solid fa-hospital text-[9px]"></i> City Health Center</span>
                </div>

                {{-- Diagnosis + Prescription split --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-3">
                  <div>
                    <div class="text-[10px] uppercase tracking-wider text-slate-400 font-semibold mb-1.5">Diagnosis</div>
                    <div class="rounded-sm border border-slate-100 bg-slate-50/60 p-3 text-xs text-slate-700 leading-relaxed">
                      Blood glucose slightly elevated at 118 mg/dL. Blood pressure 130/85 mmHg. No acute conditions detected.
                    </div>
                  </div>
                  <div>
                    <div class="text-[10px] uppercase tracking-wider text-slate-400 font-semibold mb-1.5">Prescription</div>
                    <div class="rounded-sm border border-slate-100 bg-slate-50/60 p-3 text-xs text-slate-700 leading-relaxed">
                      Metformin 500mg — twice daily with meals.<br>Vitamin D3 supplement — once daily with lunch.
                    </div>
                  </div>
                </div>

                {{-- Doctor note --}}
                <div class="rounded-sm border border-emerald-100 bg-emerald-50/30 p-3 text-xs text-slate-700 leading-relaxed mb-3">
                  <span class="font-semibold text-emerald-800">Doctor Note:</span> Follow prescribed meal plan strictly. Continue daily 30-minute walks. Return in 2 weeks for repeat glucose test — fasting blood sample required.
                </div>

                {{-- Lab reports / attachments --}}
                <div class="text-[10px] uppercase tracking-wider text-slate-400 font-semibold mb-2">Lab Reports &amp; Attachments</div>
                <div class="flex flex-wrap gap-2">
                  <button onclick="previewReport('blood-work')" class="inline-flex items-center gap-1.5 rounded-sm border border-slate-200 bg-white hover:bg-slate-50 px-2.5 py-1.5 text-xs font-semibold text-slate-700 transition-colors">
                    <i class="fa-solid fa-flask text-slate-400 text-[10px]"></i> Blood Work Results
                    <span class="text-slate-400">PDF</span>
                  </button>
                  <button onclick="previewReport('bp-chart')" class="inline-flex items-center gap-1.5 rounded-sm border border-slate-200 bg-white hover:bg-slate-50 px-2.5 py-1.5 text-xs font-semibold text-slate-700 transition-colors">
                    <i class="fa-solid fa-heart-pulse text-slate-400 text-[10px]"></i> BP Chart
                    <span class="text-slate-400">PDF</span>
                  </button>
                  <button onclick="previewReport('prescription')" class="inline-flex items-center gap-1.5 rounded-sm border border-emerald-100 bg-emerald-50 hover:bg-emerald-100 px-2.5 py-1.5 text-xs font-semibold text-emerald-700 transition-colors">
                    <i class="fa-solid fa-file-prescription text-[10px]"></i> Prescription Copy
                  </button>
                </div>
              </div>
            </div>
          </div>

          {{-- Visit 3: Older Completed --}}
          <div class="p-5 hover:bg-slate-50/40 transition-colors">
            <div class="flex flex-col sm:flex-row sm:items-start gap-4">
              <div class="flex-shrink-0 w-14 text-center">
                <div class="bg-slate-200 text-slate-600 rounded-sm px-2 py-1 leading-none">
                  <div class="text-[10px] font-bold uppercase">May</div>
                  <div class="text-xl font-bold leading-tight">10</div>
                  <div class="text-[10px]">2026</div>
                </div>
              </div>
              <div class="flex-1 min-w-0">
                <div class="flex flex-wrap items-center gap-2 mb-2">
                  <span class="text-sm font-semibold text-slate-900">Initial Cardiology Consultation</span>
                  <span class="inline-flex items-center gap-1.5 rounded-full border border-slate-200 bg-slate-100 px-2 py-0.5 text-[10px] font-semibold text-slate-600">
                    <i class="fa-solid fa-check text-[8px]"></i> Completed
                  </span>
                </div>
                <div class="text-xs text-slate-500 flex items-center gap-3 mb-3">
                  <span class="flex items-center gap-1"><i class="fa-solid fa-clock text-[9px]"></i> 11:00 AM</span>
                  <span class="flex items-center gap-1"><i class="fa-solid fa-hospital text-[9px]"></i> City Health Center</span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-3">
                  <div>
                    <div class="text-[10px] uppercase tracking-wider text-slate-400 font-semibold mb-1.5">Diagnosis</div>
                    <div class="rounded-sm border border-slate-100 bg-slate-50/60 p-3 text-xs text-slate-700 leading-relaxed">
                      Mild hypertension detected. Resting heart rate elevated at 92 bpm. ECG within acceptable range. Full cardiac panel ordered.
                    </div>
                  </div>
                  <div>
                    <div class="text-[10px] uppercase tracking-wider text-slate-400 font-semibold mb-1.5">Prescription</div>
                    <div class="rounded-sm border border-slate-100 bg-slate-50/60 p-3 text-xs text-slate-700 leading-relaxed">
                      Amlodipine 5mg — once daily after breakfast.<br>Aspirin 75mg — once daily with dinner.
                    </div>
                  </div>
                </div>

                <div class="rounded-sm border border-emerald-100 bg-emerald-50/30 p-3 text-xs text-slate-700 leading-relaxed mb-3">
                  <span class="font-semibold text-emerald-800">Doctor Note:</span> Reduce sodium intake significantly. Avoid strenuous activity. Monitor blood pressure twice daily and log readings. Return in 3 weeks.
                </div>

                <div class="text-[10px] uppercase tracking-wider text-slate-400 font-semibold mb-2">Lab Reports &amp; Attachments</div>
                <div class="flex flex-wrap gap-2">
                  <button onclick="previewReport('ecg')" class="inline-flex items-center gap-1.5 rounded-sm border border-slate-200 bg-white hover:bg-slate-50 px-2.5 py-1.5 text-xs font-semibold text-slate-700 transition-colors">
                    <i class="fa-solid fa-heart-pulse text-slate-400 text-[10px]"></i> ECG Report
                    <span class="text-slate-400">PDF</span>
                  </button>
                  <button onclick="previewReport('cardiac-panel')" class="inline-flex items-center gap-1.5 rounded-sm border border-slate-200 bg-white hover:bg-slate-50 px-2.5 py-1.5 text-xs font-semibold text-slate-700 transition-colors">
                    <i class="fa-solid fa-flask text-slate-400 text-[10px]"></i> Cardiac Panel
                    <span class="text-slate-400">PDF</span>
                  </button>
                  <button onclick="previewReport('prescription-may')" class="inline-flex items-center gap-1.5 rounded-sm border border-emerald-100 bg-emerald-50 hover:bg-emerald-100 px-2.5 py-1.5 text-xs font-semibold text-emerald-700 transition-colors">
                    <i class="fa-solid fa-file-prescription text-[10px]"></i> Prescription Copy
                  </button>
                </div>
              </div>
            </div>
          </div>

        </div>
      </section>

    </div>

    {{-- RIGHT: Timeline + Reminders --}}
    <div class="space-y-6 lg:space-y-8">

      {{-- VISIT TIMELINE --}}
      <section class="reveal bg-white border border-slate-100 rounded-sm p-5 sm:p-6 shadow-sm">
        <div class="flex items-center justify-between gap-3 mb-5">
          <h3 class="text-base font-semibold text-slate-900 flex items-center gap-2">
            <i class="fa-solid fa-calendar text-emerald-500 text-sm"></i> Visit Timeline
          </h3>
          <span class="text-xs text-slate-400 font-medium">Chronological</span>
        </div>

        <div class="relative border-l border-slate-100 pl-5 ml-2 space-y-5">

          <div class="relative">
            <div class="absolute -left-[27px] top-1 w-3 h-3 rounded-full bg-emerald-500 border-2 border-white ring-4 ring-emerald-50"></div>
            <div class="flex items-start justify-between gap-2">
              <div>
                <div class="text-xs font-semibold text-slate-900">Follow-up Review</div>
                <div class="text-[11px] text-slate-500 mt-0.5 flex items-center gap-1">
                  <i class="fa-solid fa-calendar text-[9px]"></i> 12 Jun 2026, 10:30 AM
                </div>
              </div>
              <span class="inline-flex items-center gap-1 rounded-full bg-emerald-50 border border-emerald-100 px-2 py-0.5 text-[9px] font-bold uppercase tracking-wider text-emerald-700 flex-shrink-0">Upcoming</span>
            </div>
          </div>

          <div class="relative">
            <div class="absolute -left-[27px] top-1 w-3 h-3 rounded-full bg-slate-300 border-2 border-white ring-4 ring-slate-100"></div>
            <div class="flex items-start justify-between gap-2">
              <div>
                <div class="text-xs font-semibold text-slate-700">Routine Checkup</div>
                <div class="text-[11px] text-slate-500 mt-0.5 flex items-center gap-1">
                  <i class="fa-solid fa-calendar text-[9px]"></i> 01 Jun 2026, 9:00 AM
                </div>
                <div class="text-[11px] text-slate-400 mt-0.5 flex items-center gap-1">
                  <i class="fa-solid fa-file-lines text-[9px]"></i> 2 reports available
                </div>
              </div>
              <span class="inline-flex items-center gap-1 rounded-full bg-slate-100 border border-slate-200 px-2 py-0.5 text-[9px] font-bold uppercase tracking-wider text-slate-500 flex-shrink-0"><i class="fa-solid fa-check text-[8px]"></i> Done</span>
            </div>
          </div>

          <div class="relative">
            <div class="absolute -left-[27px] top-1 w-3 h-3 rounded-full bg-slate-300 border-2 border-white ring-4 ring-slate-100"></div>
            <div class="flex items-start justify-between gap-2">
              <div>
                <div class="text-xs font-semibold text-slate-700">Initial Consultation</div>
                <div class="text-[11px] text-slate-500 mt-0.5 flex items-center gap-1">
                  <i class="fa-solid fa-calendar text-[9px]"></i> 10 May 2026, 11:00 AM
                </div>
                <div class="text-[11px] text-slate-400 mt-0.5 flex items-center gap-1">
                  <i class="fa-solid fa-file-lines text-[9px]"></i> 2 reports available
                </div>
              </div>
              <span class="inline-flex items-center gap-1 rounded-full bg-slate-100 border border-slate-200 px-2 py-0.5 text-[9px] font-bold uppercase tracking-wider text-slate-500 flex-shrink-0"><i class="fa-solid fa-check text-[8px]"></i> Done</span>
            </div>
          </div>

        </div>
      </section>

      {{-- VISIT SUMMARY STATS --}}
      <section class="reveal bg-white border border-slate-100 rounded-sm p-5 sm:p-6 shadow-sm">
        <div class="flex items-center justify-between gap-3 mb-4">
          <h3 class="text-base font-semibold text-slate-900 flex items-center gap-2">
            <i class="fa-solid fa-chart-bar text-emerald-500 text-sm"></i> Visit Summary
          </h3>
        </div>
        <div class="space-y-3">
          <div class="flex items-center justify-between p-3 rounded-sm bg-slate-50/60 border border-slate-100">
            <div class="flex items-center gap-2">
              <i class="fa-solid fa-calendar-check text-emerald-500 text-xs w-4 text-center"></i>
              <span class="text-xs text-slate-700 font-medium">Total Visits</span>
            </div>
            <span class="text-sm font-bold text-slate-900">3</span>
          </div>
          <div class="flex items-center justify-between p-3 rounded-sm bg-slate-50/60 border border-slate-100">
            <div class="flex items-center gap-2">
              <i class="fa-solid fa-check text-emerald-500 text-xs w-4 text-center"></i>
              <span class="text-xs text-slate-700 font-medium">Completed</span>
            </div>
            <span class="text-sm font-bold text-emerald-700">2</span>
          </div>
          <div class="flex items-center justify-between p-3 rounded-sm bg-slate-50/60 border border-slate-100">
            <div class="flex items-center gap-2">
              <i class="fa-solid fa-clock text-amber-500 text-xs w-4 text-center"></i>
              <span class="text-xs text-slate-700 font-medium">Upcoming</span>
            </div>
            <span class="text-sm font-bold text-amber-700">1</span>
          </div>
          <div class="flex items-center justify-between p-3 rounded-sm bg-slate-50/60 border border-slate-100">
            <div class="flex items-center gap-2">
              <i class="fa-solid fa-file-medical text-slate-400 text-xs w-4 text-center"></i>
              <span class="text-xs text-slate-700 font-medium">Reports Available</span>
            </div>
            <span class="text-sm font-bold text-slate-900">4</span>
          </div>
        </div>
      </section>

      {{-- REMINDERS --}}
      <section class="reveal bg-white border border-slate-100 rounded-sm p-5 sm:p-6 shadow-sm">
        <div class="flex items-center justify-between gap-3 mb-4">
          <h3 class="text-base font-semibold text-slate-900 flex items-center gap-2">
            <i class="fa-regular fa-bell text-emerald-500 text-sm"></i> Reminders
          </h3>
          <span class="text-xs text-slate-400 font-medium">Notifications</span>
        </div>
        <div class="space-y-3">
          <div class="flex items-center justify-between p-3 border border-slate-100 bg-slate-50/30 rounded-sm">
            <div class="flex items-center gap-2.5">
              <i class="fa-solid fa-clock text-emerald-500 text-xs"></i>
              <div>
                <div class="text-xs font-semibold text-slate-800">Next reminder</div>
                <div class="text-[11px] text-slate-500 mt-0.5">11 June 2026, 8:00 AM</div>
              </div>
            </div>
            <span class="inline-flex items-center gap-1.5 text-[10px] font-semibold text-emerald-700 bg-emerald-50 border border-emerald-100 px-2.5 py-0.5 rounded-full">
              <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Enabled
            </span>
          </div>
          <div class="flex items-center justify-between p-3 border border-slate-100 bg-slate-50/30 rounded-sm">
            <div class="flex items-center gap-2.5">
              <i class="fa-regular fa-bell text-slate-400 text-xs"></i>
              <div>
                <div class="text-xs font-semibold text-slate-800">SMS notifications</div>
                <div class="text-[11px] text-slate-500 mt-0.5">24h before visit</div>
              </div>
            </div>
            <button id="toggle-sms" onclick="toggleSMS()" class="relative inline-flex items-center h-5 w-9 rounded-full bg-emerald-500 transition-colors focus:outline-none">
              <span id="toggle-sms-dot" class="translate-x-4 inline-block w-4 h-4 rounded-full bg-white shadow-sm transition-transform"></span>
            </button>
          </div>
          <div class="flex items-center justify-between p-3 border border-slate-100 bg-slate-50/30 rounded-sm">
            <div class="flex items-center gap-2.5">
              <i class="fa-regular fa-envelope text-slate-400 text-xs"></i>
              <div>
                <div class="text-xs font-semibold text-slate-800">Email notifications</div>
                <div class="text-[11px] text-slate-500 mt-0.5">48h before visit</div>
              </div>
            </div>
            <button id="toggle-email" onclick="toggleEmail()" class="relative inline-flex items-center h-5 w-9 rounded-full bg-slate-200 transition-colors focus:outline-none">
              <span id="toggle-email-dot" class="translate-x-0.5 inline-block w-4 h-4 rounded-full bg-white shadow-sm transition-transform"></span>
            </button>
          </div>
        </div>
      </section>

    </div>
  </div>
</div>

{{-- REPORT PREVIEW MODAL --}}
<div id="report-modal" class="fixed inset-0 z-[100] hidden flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-[2px]">
  <div class="bg-white border border-slate-200 rounded-sm shadow-xl w-full max-w-md overflow-hidden">
    <div class="h-14 border-b border-slate-100 flex items-center justify-between px-6">
      <h3 id="report-modal-title" class="font-semibold text-slate-900 flex items-center gap-2 text-sm">
        <i class="fa-solid fa-file-medical text-emerald-500"></i> Report Preview
      </h3>
      <button onclick="closeReportModal()" class="text-slate-400 hover:text-slate-600 focus:outline-none">
        <i class="fa-solid fa-xmark text-sm"></i>
      </button>
    </div>
    <div class="p-6">
      <div class="rounded-sm border border-slate-100 bg-slate-50 p-5 text-center">
        <i class="fa-solid fa-file-pdf text-4xl text-slate-300 mb-3"></i>
        <div id="report-modal-name" class="text-sm font-semibold text-slate-700 mb-1">Report Name</div>
        <div class="text-xs text-slate-400 mb-4">Issued by Dr. Ahmed Hassan — City Health Center</div>
        <div class="text-xs text-slate-500 bg-white border border-slate-200 rounded-sm p-3 text-left leading-relaxed">
          Report is available for download. In the live system, this will render the actual PDF document issued after your visit.
        </div>
      </div>
    </div>
    <div class="px-6 py-4 border-t border-slate-100 bg-slate-50/50 flex gap-2 justify-end">
      <button onclick="closeReportModal()" class="inline-flex items-center justify-center rounded-sm border border-slate-200 bg-white hover:bg-slate-50 px-4 py-2 text-slate-600 text-xs font-semibold transition-colors">Close</button>
      <button class="inline-flex items-center gap-1.5 justify-center rounded-sm bg-emerald-500 hover:bg-emerald-600 px-4 py-2 text-white text-xs font-semibold transition-colors">
        <i class="fa-solid fa-download"></i> Download PDF
      </button>
    </div>
  </div>
</div>

{{-- RESCHEDULE MODAL --}}
<div id="reschedule-modal" class="fixed inset-0 z-[100] hidden flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-[2px]">
  <div class="bg-white border border-slate-200 rounded-sm shadow-xl w-full max-w-sm overflow-hidden">
    <div class="h-14 border-b border-slate-100 flex items-center justify-between px-6">
      <h3 class="font-semibold text-slate-900 flex items-center gap-2 text-sm">
        <i class="fa-solid fa-calendar-pen text-emerald-500"></i> Reschedule Appointment
      </h3>
      <button onclick="closeRescheduleModal()" class="text-slate-400 hover:text-slate-600 focus:outline-none">
        <i class="fa-solid fa-xmark text-sm"></i>
      </button>
    </div>
    <div class="p-6 space-y-4">
      <div class="text-xs text-slate-500">Select a new preferred date and time. Dr. Ahmed's office will confirm within 24 hours.</div>
      <div>
        <label class="block text-xs font-semibold text-slate-700 mb-1.5">Preferred Date</label>
        <input type="date" class="w-full border border-slate-200 rounded-sm px-3 py-2 text-sm text-slate-700 focus:outline-none focus:border-emerald-400 focus:ring-1 focus:ring-emerald-100 transition-colors" />
      </div>
      <div>
        <label class="block text-xs font-semibold text-slate-700 mb-1.5">Preferred Time</label>
        <select class="w-full border border-slate-200 rounded-sm px-3 py-2 text-sm text-slate-700 focus:outline-none focus:border-emerald-400 transition-colors">
          <option>09:00 AM</option>
          <option>10:00 AM</option>
          <option>10:30 AM</option>
          <option>11:00 AM</option>
          <option>02:00 PM</option>
          <option>03:00 PM</option>
        </select>
      </div>
      <div>
        <label class="block text-xs font-semibold text-slate-700 mb-1.5">Reason for Reschedule</label>
        <textarea rows="2" placeholder="e.g. Prior commitment, health concern..." class="w-full border border-slate-200 rounded-sm px-3 py-2 text-sm text-slate-700 focus:outline-none focus:border-emerald-400 resize-none transition-colors"></textarea>
      </div>
    </div>
    <div class="px-6 py-4 border-t border-slate-100 bg-slate-50/50 flex gap-2 justify-end">
      <button onclick="closeRescheduleModal()" class="inline-flex items-center justify-center rounded-sm border border-slate-200 bg-white hover:bg-slate-50 px-4 py-2 text-slate-600 text-xs font-semibold transition-colors">Cancel</button>
      <button onclick="submitReschedule()" class="inline-flex items-center justify-center rounded-sm bg-emerald-500 hover:bg-emerald-600 px-4 py-2 text-white text-xs font-semibold transition-colors">
        <i class="fa-solid fa-check mr-1.5"></i> Request Reschedule
      </button>
    </div>
  </div>
</div>

{{-- CANCEL MODAL --}}
<div id="cancel-modal" class="fixed inset-0 z-[100] hidden flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-[2px]">
  <div class="bg-white border border-slate-200 rounded-sm shadow-xl w-full max-w-sm overflow-hidden">
    <div class="h-14 border-b border-slate-100 flex items-center justify-between px-6">
      <h3 class="font-semibold text-red-700 flex items-center gap-2 text-sm">
        <i class="fa-solid fa-triangle-exclamation text-red-500"></i> Cancel Appointment
      </h3>
      <button onclick="closeCancelModal()" class="text-slate-400 hover:text-slate-600 focus:outline-none">
        <i class="fa-solid fa-xmark text-sm"></i>
      </button>
    </div>
    <div class="p-6 space-y-3">
      <p class="text-sm text-slate-600 leading-relaxed">Are you sure you want to cancel your appointment with <strong>Dr. Ahmed Hassan</strong> on 12 June 2026? Please contact the clinic if you need to rebook.</p>
      <div class="rounded-sm border border-red-100 bg-red-50 p-3 text-xs text-red-700 flex items-center gap-2">
        <i class="fa-solid fa-triangle-exclamation"></i> Cancelling may delay your care plan progress.
      </div>
    </div>
    <div class="px-6 py-4 border-t border-slate-100 bg-slate-50/50 flex gap-2 justify-end">
      <button onclick="closeCancelModal()" class="inline-flex items-center justify-center rounded-sm border border-slate-200 bg-white hover:bg-slate-50 px-4 py-2 text-slate-600 text-xs font-semibold transition-colors">Keep Appointment</button>
      <button onclick="confirmCancel()" class="inline-flex items-center justify-center rounded-sm bg-red-600 hover:bg-red-700 px-4 py-2 text-white text-xs font-semibold transition-colors">
        <i class="fa-solid fa-xmark mr-1.5"></i> Yes, Cancel
      </button>
    </div>
  </div>
</div>

@endsection

@push('scripts')
<script>
  const reportNames = {
    'blood-work':     'Blood Work Results — Jun 2026',
    'bp-chart':       'Blood Pressure Chart — Jun 2026',
    'prescription':   'Prescription Copy — Jun 2026',
    'ecg':            'ECG Report — May 2026',
    'cardiac-panel':  'Cardiac Panel Results — May 2026',
    'prescription-may': 'Prescription Copy — May 2026',
  };

  function previewReport(key) {
    document.getElementById('report-modal-name').innerText = reportNames[key] || 'Medical Report';
    document.getElementById('report-modal').classList.remove('hidden');
  }
  function closeReportModal() {
    document.getElementById('report-modal').classList.add('hidden');
  }

  function openRescheduleModal() {
    document.getElementById('reschedule-modal').classList.remove('hidden');
  }
  function closeRescheduleModal() {
    document.getElementById('reschedule-modal').classList.add('hidden');
  }
  function submitReschedule() {
    closeRescheduleModal();
    alert('Reschedule request submitted. The clinic will confirm within 24 hours.');
  }

  function openCancelModal() {
    document.getElementById('cancel-modal').classList.remove('hidden');
  }
  function closeCancelModal() {
    document.getElementById('cancel-modal').classList.add('hidden');
  }
  function confirmCancel() {
    closeCancelModal();
    alert('Appointment cancelled. Contact the clinic to rebook if needed.');
  }

  let smsEnabled   = true;
  let emailEnabled = false;

  function toggleSMS() {
    smsEnabled = !smsEnabled;
    const btn = document.getElementById('toggle-sms');
    const dot = document.getElementById('toggle-sms-dot');
    btn.className = `relative inline-flex items-center h-5 w-9 rounded-full transition-colors focus:outline-none ${smsEnabled ? 'bg-emerald-500' : 'bg-slate-200'}`;
    dot.className = `inline-block w-4 h-4 rounded-full bg-white shadow-sm transition-transform ${smsEnabled ? 'translate-x-4' : 'translate-x-0.5'}`;
  }

  function toggleEmail() {
    emailEnabled = !emailEnabled;
    const btn = document.getElementById('toggle-email');
    const dot = document.getElementById('toggle-email-dot');
    btn.className = `relative inline-flex items-center h-5 w-9 rounded-full transition-colors focus:outline-none ${emailEnabled ? 'bg-emerald-500' : 'bg-slate-200'}`;
    dot.className = `inline-block w-4 h-4 rounded-full bg-white shadow-sm transition-transform ${emailEnabled ? 'translate-x-4' : 'translate-x-0.5'}`;
  }

  document.addEventListener('click', (e) => {
    ['report-modal', 'reschedule-modal', 'cancel-modal'].forEach(id => {
      const el = document.getElementById(id);
      if (e.target === el) el.classList.add('hidden');
    });
  });
</script>
@endpush
