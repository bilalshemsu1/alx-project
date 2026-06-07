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
            <span class="w-2 h-2 rounded-full bg-amber-400"></span> {{ $stats['medicines_due_today'] ?? 0 }} medicine due
          </span>
          <span class="inline-flex items-center gap-2 rounded-full bg-white px-3 py-2 text-xs font-medium text-slate-700 shadow-sm border border-slate-100">
            <span class="w-2 h-2 rounded-full bg-red-400"></span> {{ $stats['alerts_count'] ?? 0 }} alerts
          </span>

        </div>
      </div>
    </div>

    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">
      <div class="reveal rounded-sm border border-slate-100 bg-white p-5 shadow-sm">
        <div class="text-xs font-semibold uppercase tracking-wider text-slate-400">Tasks done</div>
        <div class="mt-2 text-3xl font-semibold text-slate-900">{{ $stats['tasks_done_today'] ?? 0 }}</div>
        <div class="mt-2 text-sm text-slate-500">{{ $stats['tasks_missed_today'] ?? 0 }} missed today</div>
      </div>

      <div class="reveal rounded-sm border border-slate-100 bg-white p-5 shadow-sm">
        <div class="text-xs font-semibold uppercase tracking-wider text-slate-400">Medicines due</div>
        <div class="mt-2 text-3xl font-semibold text-slate-900">{{ $stats['medicines_due_today'] ?? 0 }}</div>
        <div class="mt-2 text-sm text-slate-500">{{ max(0, ($stats['medicines_due_today'] ?? 0) - 0) }} still due</div>
      </div>

      <div class="reveal rounded-sm border border-slate-100 bg-white p-5 shadow-sm">
        <div class="text-xs font-semibold uppercase tracking-wider text-slate-400">Next appointment</div>
        @if($nextAppointment)
          <div class="mt-2 text-xl font-semibold text-slate-900">{{ $nextAppointment->appointment_date->format('M d, H:i') }}</div>
          <div class="mt-2 text-sm text-emerald-600">Starts soon</div>
        @else
          <div class="mt-2 text-xl font-semibold text-slate-900">No upcoming appointment</div>
          <div class="mt-2 text-sm text-slate-500">Check back later</div>
        @endif
      </div>

      <div class="reveal rounded-sm border border-slate-100 bg-white p-5 shadow-sm">
        <div class="text-xs font-semibold uppercase tracking-wider text-slate-400">Risk status</div>
        <div class="mt-2 text-3xl font-semibold text-slate-900">{{ ($stats['tasks_late_today'] ?? 0) > 0 ? 'Elevated risk' : 'Low risk' }}</div>
        <div class="mt-2 text-sm text-slate-500">{{ ($stats['tasks_late_today'] ?? 0) }} late tasks today</div>
      </div>

    </div>

    <div class="">
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
            @forelse(($taskItems ?? []) as $task)
              @php
                $isDone = !empty($task->completed_at);
              @endphp
              <div class="flex items-center gap-3 rounded-sm border border-slate-100 px-4 py-3 {{ $isDone ? 'bg-green-50/50' : 'bg-white' }}">
                <div class="w-5 h-5 rounded-sm flex items-center justify-center flex-shrink-0 {{ $isDone ? 'bg-green-100 border border-green-200' : 'bg-slate-50 border border-slate-200' }}">
                  @if($isDone)
                    <i class="fa-solid fa-check text-green-600 text-[9px]"></i>
                  @else
                    <i class="fa-regular fa-circle text-slate-300 text-[9px]"></i>
                  @endif
                </div>
                <div class="flex-1 min-w-0">
                  <div class="text-sm font-medium text-slate-800">{{ $task->title ?? 'Untitled task' }}</div>
                  <div class="text-xs text-slate-400">{{ $task->due_datetime ?? '—' }}</div>

                </div>
                <span class="text-xs font-medium {{ $isDone ? 'text-green-600' : 'text-slate-400' }}">{{ $isDone ? 'Done' : 'Not done' }}</span>
              </div>
            @empty
              <div class="rounded-sm border border-slate-100 px-4 py-3 bg-white text-sm text-slate-500">
                No tasks for today.
              </div>
            @endforelse
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
            @forelse(($medicineItems ?? []) as $pm)
              @php
                $medName = $pm->medicine->name ?? 'Medication';
                $time = $pm->time_to_take ? $pm->time_to_take->format('H:i') : '';

                $before = $pm->before_after_food ?? '';
                $label = trim(($before ? $before : '') . ($time ? " — " . $time : ''));
              @endphp
              <div class="flex items-center gap-3 rounded-sm border border-slate-100 bg-white px-4 py-3">
                <div class="w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0 bg-slate-100">
                  <i class="fa-regular fa-circle text-slate-300 text-sm"></i>
                </div>
                <div class="flex-1 min-w-0">
                  <div class="text-sm font-medium text-slate-800">{{ $medName }}</div>
                  <div class="text-xs text-slate-400">
                    {{ $pm->time_to_take ? $pm->time_to_take->format('g:i A') : '—' }}

                    @if($pm->before_after_food)
                      — {{ $pm->before_after_food }}
                    @endif
                  </div>
                </div>
                <span class="text-xs font-semibold text-slate-400">Due</span>
              </div>
            @empty
              <div class="rounded-sm border border-slate-100 px-4 py-3 bg-white text-sm text-slate-500">
                No medicines due today.
              </div>
            @endforelse

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
            @php
              $lateCount = $stats['tasks_late_today'] ?? 0;
            @endphp
            <div class="rounded-sm border border-slate-100 bg-slate-50 p-4">
              <div class="text-xs uppercase tracking-wider text-slate-400 font-medium">Glucose</div>
              <div class="mt-2 text-2xl font-semibold text-slate-900">—</div>
            </div>
            <div class="rounded-sm border border-slate-100 bg-slate-50 p-4">
              <div class="text-xs uppercase tracking-wider text-slate-400 font-medium">Risk</div>
              <div class="mt-2 text-2xl font-semibold text-emerald-600">{{ $lateCount > 0 ? 'Elevated risk' : 'Low risk' }}</div>
            </div>
            <div class="rounded-sm border border-slate-100 bg-slate-50 p-4">
              <div class="text-xs uppercase tracking-wider text-slate-400 font-medium">Doctor note</div>
              <div class="mt-2 text-sm text-slate-600 leading-relaxed">{{ $alerts->first()->message ?? 'No doctor note available yet.' }}</div>
            </div>

          </div>
        </section>
      </div>

      <div class="space-y-6 lg:space-y-8">
      </div>
    </div>
  </div>
@endsection
