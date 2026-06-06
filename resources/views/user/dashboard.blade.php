@extends('layouts.user')

@section('title', 'Patient Dashboard')
@section('page-title', 'Dashboard')

@section('content')
  <div class="mx-auto space-y-6 sm:space-y-8">
    <div class="reveal rounded-sm border border-emerald-100 bg-emerald-50/70 p-5 sm:p-6">
<div class="flex flex-col gap-4 lg:flex-row lg:items-end lg:justify-between">
        <div>
          <div class="mb-2 inline-flex items-center gap-2 rounded-full border border-emerald-200 bg-white px-3 py-1 text-[10px] font-semibold uppercase tracking-[0.2em] text-emerald-700">
            Today status
          </div>
          <h1 class="text-3xl md:text-4xl font-medium tracking-tight text-slate-900">
            Hello, <span class="font-serif italic text-emerald-600">{{ $patient->name ?? 'Patient' }}</span>
          </h1>
          <p class="mt-3 max-w-2xl text-slate-600 font-light leading-relaxed">
            Your dashboard is organized into simple cards so any patient can quickly understand what to do today.
          </p>
        </div>

        <div class="flex flex-wrap gap-2">
          <span class="inline-flex items-center gap-2 rounded-full bg-white px-3 py-2 text-xs font-medium text-slate-700 shadow-sm border border-slate-100">
            <span class="w-2 h-2 rounded-full bg-emerald-500"></span> Stable
          </span>
          <span class="inline-flex items-center gap-2 rounded-full bg-white px-3 py-2 text-xs font-medium text-slate-700 shadow-sm border border-slate-100">
            <span class="w-2 h-2 rounded-full bg-amber-400"></span> 1 medicine due
          </span>
          <span class="inline-flex items-center gap-2 rounded-full bg-white px-3 py-2 text-xs font-medium text-slate-700 shadow-sm border border-slate-100">
            <span class="w-2 h-2 rounded-full bg-red-400"></span> 2 alerts
          </span>
        </div>
      </div>
    </div>

    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">
      <div class="reveal rounded-sm border border-slate-100 bg-white p-5 shadow-sm">
        <div class="text-xs font-semibold uppercase tracking-wider text-slate-400">Tasks done</div>
        <div class="mt-2 text-3xl font-semibold text-slate-900">2</div>
        <div class="mt-2 text-sm text-slate-500">1 missed today</div>
      </div>

      <div class="reveal rounded-sm border border-slate-100 bg-white p-5 shadow-sm">
        <div class="text-xs font-semibold uppercase tracking-wider text-slate-400">Medicines done</div>
        <div class="mt-2 text-3xl font-semibold text-slate-900">1</div>
        <div class="mt-2 text-sm text-slate-500">2 still due</div>
      </div>

      <div class="reveal rounded-sm border border-slate-100 bg-white p-5 shadow-sm">
        <div class="text-xs font-semibold uppercase tracking-wider text-slate-400">Next appointment</div>
        <div class="mt-2 text-xl font-semibold text-slate-900">Tomorrow, 10:30 AM</div>
        <div class="mt-2 text-sm text-emerald-600">Starts in 18 hours</div>
      </div>

      <div class="reveal rounded-sm border border-slate-100 bg-white p-5 shadow-sm">
        <div class="text-xs font-semibold uppercase tracking-wider text-slate-400">Risk status</div>
        <div class="mt-2 text-3xl font-semibold text-slate-900">Low risk</div>
        <div class="mt-2 text-sm text-slate-500">Based on your latest check-in</div>
      </div>
    </div>

    <div class="grid grid-cols-1 gap-6 xl:grid-cols-3">
      <div class="xl:col-span-2 space-y-6 lg:space-y-8">
        <section class="reveal bg-white border border-slate-100 rounded-sm p-5 sm:p-6 shadow-sm">
          <div class="flex items-center justify-between gap-3 mb-5">
            <div>
              <h3 class="text-lg font-semibold text-slate-900 flex items-center gap-2">
                <i class="fa-solid fa-list-check text-emerald-500 text-sm"></i> Today’s task list
              </h3>
              <p class="mt-1 text-sm text-slate-500">Tasks are the main engine of the dashboard.</p>
            </div>
            <span class="text-xs text-slate-400 font-medium">What you must do today</span>
          </div>

          <div class="space-y-3">
            <div class="flex items-center gap-3 rounded-sm border border-slate-100 bg-green-50/50 px-4 py-3">
              <div class="w-5 h-5 rounded-sm flex items-center justify-center flex-shrink-0 bg-green-100 border border-green-200">
                <i class="fa-solid fa-check text-green-600 text-[9px]"></i>
              </div>
              <div class="flex-1 min-w-0">
                <div class="text-sm font-medium text-slate-800">Morning walk</div>
                <div class="text-xs text-slate-400">20 minutes</div>
              </div>
              <span class="text-xs font-medium text-green-600">Done</span>
            </div>

            <div class="flex items-center gap-3 rounded-sm border border-slate-100 bg-green-50/50 px-4 py-3">
              <div class="w-5 h-5 rounded-sm flex items-center justify-center flex-shrink-0 bg-green-100 border border-green-200">
                <i class="fa-solid fa-check text-green-600 text-[9px]"></i>
              </div>
              <div class="flex-1 min-w-0">
                <div class="text-sm font-medium text-slate-800">Blood pressure check</div>
                <div class="text-xs text-slate-400">Before lunch</div>
              </div>
              <span class="text-xs font-medium text-green-600">Done</span>
            </div>

            <div class="flex items-center gap-3 rounded-sm border border-slate-100 px-4 py-3 bg-white">
              <div class="w-5 h-5 rounded-sm flex items-center justify-center flex-shrink-0 bg-slate-50 border border-slate-200"></div>
              <div class="flex-1 min-w-0">
                <div class="text-sm font-medium text-slate-800">Breathing exercises</div>
                <div class="text-xs text-slate-400">3 sessions</div>
              </div>
              <span class="text-xs font-medium text-slate-400">Not done</span>
            </div>

            <div class="flex items-center gap-3 rounded-sm border border-slate-100 px-4 py-3 bg-white">
              <div class="w-5 h-5 rounded-sm flex items-center justify-center flex-shrink-0 bg-slate-50 border border-slate-200"></div>
              <div class="flex-1 min-w-0">
                <div class="text-sm font-medium text-slate-800">Evening walk</div>
                <div class="text-xs text-slate-400">15 minutes</div>
              </div>
              <span class="text-xs font-medium text-slate-400">Not done</span>
            </div>
          </div>
        </section>

        <section class="reveal bg-white border border-slate-100 rounded-sm p-5 sm:p-6 shadow-sm">
          <div class="flex items-center justify-between gap-3 mb-5">
            <h3 class="text-lg font-semibold text-slate-900 flex items-center gap-2">
              <i class="fa-solid fa-pills text-emerald-500 text-sm"></i> Medication schedule
            </h3>
            <span class="text-xs text-slate-400 font-medium">Medicine + time + done / not done</span>
          </div>

          <div class="space-y-3">
            <div class="flex items-center gap-3 rounded-sm border border-slate-100 bg-slate-50 px-4 py-3">
              <div class="w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0 bg-green-50">
                <i class="fa-solid fa-check text-green-600 text-sm"></i>
              </div>
              <div class="flex-1 min-w-0">
                <div class="text-sm font-medium text-slate-800">Metformin 500mg</div>
                <div class="text-xs text-slate-400">8:00 AM — With breakfast</div>
              </div>
              <span class="text-xs font-semibold text-green-600">Done</span>
            </div>

            <div class="flex items-center gap-3 rounded-sm border border-slate-100 px-4 py-3 bg-emerald-50/60">
              <div class="w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0 bg-emerald-100">
                <i class="fa-regular fa-clock text-emerald-600 text-sm"></i>
              </div>
              <div class="flex-1 min-w-0">
                <div class="text-sm font-medium text-slate-800">Lisinopril 10mg</div>
                <div class="text-xs text-emerald-600">2:00 PM — Due in 30 min</div>
              </div>
              <span class="text-xs font-semibold text-emerald-600">Not done</span>
            </div>

            <div class="flex items-center gap-3 rounded-sm border border-slate-100 bg-white px-4 py-3">
              <div class="w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0 bg-slate-100">
                <i class="fa-regular fa-circle text-slate-300 text-sm"></i>
              </div>
              <div class="flex-1 min-w-0">
                <div class="text-sm font-medium text-slate-800">Atorvastatin 20mg</div>
                <div class="text-xs text-slate-400">9:00 PM — Before bed</div>
              </div>
              <span class="text-xs font-semibold text-slate-400">Not done</span>
            </div>
          </div>
        </section>

        <section class="reveal bg-white border border-slate-100 rounded-sm p-5 sm:p-6 shadow-sm">
          <div class="flex items-center justify-between gap-3 mb-5">
            <h3 class="text-lg font-semibold text-slate-900 flex items-center gap-2">
              <i class="fa-solid fa-file-medical text-emerald-500 text-sm"></i> Health insight
            </h3>
            <span class="text-xs text-slate-400 font-medium">Glucose, risk, doctor note</span>
          </div>
          <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="rounded-sm border border-slate-100 bg-slate-50 p-4">
              <div class="text-xs uppercase tracking-wider text-slate-400 font-medium">Glucose</div>
              <div class="mt-2 text-2xl font-semibold text-slate-900">110 mg/dL</div>
            </div>
            <div class="rounded-sm border border-slate-100 bg-slate-50 p-4">
              <div class="text-xs uppercase tracking-wider text-slate-400 font-medium">Risk</div>
              <div class="mt-2 text-2xl font-semibold text-emerald-600">Low risk</div>
            </div>
            <div class="rounded-sm border border-slate-100 bg-slate-50 p-4">
              <div class="text-xs uppercase tracking-wider text-slate-400 font-medium">Doctor note</div>
              <div class="mt-2 text-sm text-slate-600 leading-relaxed">Patient improving. Continue current plan and keep tracking medication adherence.</div>
            </div>
          </div>
        </section>
      </div>

      <div class="space-y-6 lg:space-y-8">
        <section class="reveal bg-white border border-slate-100 rounded-sm p-5 sm:p-6 shadow-sm">
          <div class="flex items-center justify-between gap-3 mb-5">
            <h3 class="text-lg font-semibold text-slate-900 flex items-center gap-2">
              <i class="fa-regular fa-calendar-check text-emerald-500 text-sm"></i> Next appointment
            </h3>
            <span class="text-xs text-slate-400 font-medium">Countdown</span>
          </div>
          <div class="rounded-sm border border-emerald-100 bg-emerald-50/70 p-4">
            <div class="text-sm font-medium text-slate-800">Dr. Mitchell — Cardiology</div>
            <div class="text-xl font-semibold text-slate-900 mt-2">Tomorrow, 10:30 AM</div>
            <div class="text-sm text-emerald-700 mt-1">Starts in 18 hours</div>
          </div>
        </section>

        <section class="reveal bg-white border border-slate-100 rounded-sm p-5 sm:p-6 shadow-sm">
          <div class="flex items-center justify-between gap-3 mb-5">
            <h3 class="text-lg font-semibold text-slate-900 flex items-center gap-2">
              <i class="fa-solid fa-utensils text-emerald-500 text-sm"></i> Meal plan today
            </h3>
            <span class="text-xs text-slate-400 font-medium">Breakfast, lunch, dinner</span>
          </div>

          <div class="space-y-3">
            <div class="rounded-sm border border-slate-100 bg-slate-50 px-4 py-3">
              <div class="flex items-center justify-between gap-2 mb-1">
                <div class="text-sm font-semibold text-slate-800">Breakfast</div>
                <div class="text-xs text-green-600">Done</div>
              </div>
              <div class="text-sm text-slate-600">Oatmeal with berries</div>
              <div class="text-xs text-slate-400 mt-1">8:00 AM</div>
            </div>

            <div class="rounded-sm border border-slate-100 bg-emerald-50/60 px-4 py-3">
              <div class="flex items-center justify-between gap-2 mb-1">
                <div class="text-sm font-semibold text-slate-800">Lunch</div>
                <div class="text-xs text-emerald-600">Upcoming</div>
              </div>
              <div class="text-sm text-slate-600">Grilled chicken salad</div>
              <div class="text-xs text-slate-400 mt-1">12:30 PM</div>
            </div>

            <div class="rounded-sm border border-slate-100 bg-slate-50 px-4 py-3">
              <div class="flex items-center justify-between gap-2 mb-1">
                <div class="text-sm font-semibold text-slate-800">Dinner</div>
                <div class="text-xs text-slate-400">Scheduled</div>
              </div>
              <div class="text-sm text-slate-600">Baked salmon & vegetables</div>
              <div class="text-xs text-slate-400 mt-1">7:00 PM</div>
            </div>
          </div>
        </section>

        <section class="reveal bg-white border border-slate-100 rounded-sm p-5 sm:p-6 shadow-sm">
          <div class="flex items-center justify-between gap-3 mb-5">
            <h3 class="text-lg font-semibold text-slate-900 flex items-center gap-2">
              <i class="fa-solid fa-bell text-emerald-500 text-sm"></i> Notifications / alerts
            </h3>
            <span class="text-xs text-slate-400 font-medium">Important warnings only</span>
          </div>
          <div class="space-y-3">
            <div class="rounded-sm border border-red-100 bg-red-50 px-4 py-3">
              <div class="text-sm font-medium text-red-700">Metformin is overdue. Please take it now.</div>
            </div>
            <div class="rounded-sm border border-slate-100 bg-slate-50 px-4 py-3">
              <div class="text-sm font-medium text-slate-700">Follow-up appointment is scheduled for tomorrow morning.</div>
            </div>
          </div>
        </section>

        <section class="reveal bg-white border border-slate-100 rounded-sm p-5 sm:p-6 shadow-sm">
          <div class="flex items-center justify-between gap-3 mb-5">
            <h3 class="text-lg font-semibold text-slate-900 flex items-center gap-2">
              <i class="fa-solid fa-chart-line text-emerald-500 text-sm"></i> Progress summary
            </h3>
            <span class="text-xs text-slate-400 font-medium">Tasks done / missed</span>
          </div>
          <div class="grid grid-cols-2 gap-3">
            <div class="rounded-sm border border-slate-100 bg-slate-50 p-4 text-center">
              <div class="text-3xl font-semibold text-slate-900">2</div>
              <div class="text-xs text-slate-400 uppercase tracking-wider mt-1">Done</div>
            </div>
            <div class="rounded-sm border border-slate-100 bg-slate-50 p-4 text-center">
              <div class="text-3xl font-semibold text-slate-900">1</div>
              <div class="text-xs text-slate-400 uppercase tracking-wider mt-1">Missed</div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
@endsection
