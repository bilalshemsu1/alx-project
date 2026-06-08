@extends('layouts.user')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
  <div class="mx-auto space-y-6 sm:space-y-8">
    <div class="reveal rounded-sm border border-emerald-100 bg-emerald-50/70 p-5 sm:p-6">
      <div class="flex flex-col gap-4 lg:flex-row lg:items-end lg:justify-between">
        <div>
          <h1 class="text-3xl md:text-4xl font-medium tracking-tight text-slate-900">
            Hello, <span class="font-serif italic text-emerald-600">{{ $patient->name ?? 'Patient' }}</span>
          </h1>
          <p class="mt-3 max-w-2xl text-slate-600 font-light leading-relaxed">
            Here is your overview for today.
          </p>
        </div>

        <div class="flex flex-wrap gap-2">
          <span class="inline-flex items-center gap-2 rounded-full bg-white px-3 py-2 text-xs font-medium text-slate-700 shadow-sm border border-slate-100">
            <span class="w-2 h-2 rounded-full bg-amber-400"></span> {{ $stats['medicines_due_today'] ?? 0 }} medicine due
          </span>
          @if($stats['alerts_count'] > 0)
            <span class="inline-flex items-center gap-2 rounded-full bg-white px-3 py-2 text-xs font-medium text-slate-700 shadow-sm border border-slate-100">
              <span class="w-2 h-2 rounded-full bg-red-400"></span> {{ $stats['alerts_count'] }} alerts
            </span>
          @endif
        </div>
      </div>
    </div>

    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-3">
      <div class="reveal rounded-sm border border-slate-100 bg-white p-5 shadow-sm">
        <div class="text-xs font-semibold uppercase tracking-wider text-slate-400">Tasks done</div>
        <div class="mt-2 text-3xl font-semibold text-slate-900">{{ $stats['tasks_done_today'] ?? 0 }}</div>
        <div class="mt-2 text-sm text-slate-500">{{ $stats['tasks_missed_today'] ?? 0 }} missed today</div>
      </div>

      <div class="reveal rounded-sm border border-slate-100 bg-white p-5 shadow-sm">
        <div class="text-xs font-semibold uppercase tracking-wider text-slate-400">Medicines due</div>
        <div class="mt-2 text-3xl font-semibold text-slate-900">{{ $stats['medicines_due_today'] ?? 0 }}</div>
      </div>

      <div class="reveal rounded-sm border border-slate-100 bg-white p-5 shadow-sm">
        <div class="text-xs font-semibold uppercase tracking-wider text-slate-400">Next appointment</div>
        @if($nextAppointment)
          <div class="mt-2 text-xl font-semibold text-slate-900">{{ $nextAppointment->appointment_date->format('M d, H:i') }}</div>
          <div class="mt-2 text-sm text-emerald-600">With {{ $nextAppointment->doctor->name ?? 'Doctor' }}</div>
        @else
          <div class="mt-2 text-xl font-semibold text-slate-900">No upcoming appointment</div>
        @endif
      </div>
    </div>

    @if($taskItems->count() > 0)
    <section class="reveal bg-white border border-slate-100 rounded-sm p-5 sm:p-6 shadow-sm">
      <div class="flex items-center justify-between gap-3 mb-5">
        <h3 class="text-lg font-semibold text-slate-900 flex items-center gap-2">
          <i class="fa-solid fa-list-check text-emerald-500 text-sm"></i> Today's tasks
        </h3>
      </div>

      <div class="space-y-3">
        @foreach($taskItems as $task)
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
              <div class="text-xs text-slate-400">{{ $task->due_datetime->format('g:i A') ?? '' }}</div>
            </div>
            <span class="text-xs font-medium {{ $isDone ? 'text-green-600' : 'text-slate-400' }}">{{ $isDone ? 'Done' : 'Pending' }}</span>
          </div>
        @endforeach
      </div>
    </section>
    @endif

    @if($medicineItems->count() > 0)
    <section class="reveal bg-white border border-slate-100 rounded-sm p-5 sm:p-6 shadow-sm">
      <div class="flex items-center justify-between gap-3 mb-5">
        <h3 class="text-lg font-semibold text-slate-900 flex items-center gap-2">
          <i class="fa-solid fa-pills text-emerald-500 text-sm"></i> Medication schedule
        </h3>
      </div>

      <div class="space-y-3">
        @foreach($medicineItems as $pm)
          @php
            $medName = $pm->medicine->name ?? 'Medication';
          @endphp
          <div class="flex items-center gap-3 rounded-sm border border-slate-100 bg-white px-4 py-3">
            <div class="w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0 bg-slate-100">
              <i class="fa-regular fa-circle text-slate-300 text-sm"></i>
            </div>
            <div class="flex-1 min-w-0">
              <div class="text-sm font-medium text-slate-800">{{ $medName }}</div>
              <div class="text-xs text-slate-400">
                {{ $pm->time_to_take ? $pm->time_to_take->format('g:i A') : '' }}
                @if($pm->before_after_food)
                  — {{ $pm->before_after_food }}
                @endif
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </section>
    @endif

    @if($mealPlanItems->count() > 0)
    <section class="reveal bg-white border border-slate-100 rounded-sm p-5 sm:p-6 shadow-sm">
      <div class="flex items-center justify-between gap-3 mb-5">
        <h3 class="text-lg font-semibold text-slate-900 flex items-center gap-2">
          <i class="fa-solid fa-utensils text-emerald-500 text-sm"></i> Today's meals
        </h3>
      </div>

      <div class="space-y-3">
        @foreach($mealPlanItems as $meal)
          @php
            $timeDisplay = str_contains($meal->meal_time, ':') ? \Carbon\Carbon::parse($meal->meal_time)->format('g:i A') : $meal->meal_time;
            $isCompleted = ($meal->status ?? 'pending') === 'completed';
          @endphp
          <div class="flex items-center gap-3 rounded-sm border border-slate-100 px-4 py-3 {{ $isCompleted ? 'bg-green-50/50' : 'bg-white' }}">
            <div class="w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0 {{ $isCompleted ? 'bg-emerald-50' : 'bg-slate-100' }}">
              <i class="fa-solid fa-utensils {{ $isCompleted ? 'text-emerald-600' : 'text-slate-300' }} text-sm"></i>
            </div>
            <div class="flex-1 min-w-0">
              <div class="text-sm font-medium text-slate-800">{{ $meal->description }}</div>
              <div class="text-xs text-slate-400">{{ $timeDisplay }}</div>
            </div>
            <span class="text-xs font-medium {{ $isCompleted ? 'text-green-600' : 'text-slate-400' }}">{{ $isCompleted ? 'Completed' : 'Pending' }}</span>
          </div>
        @endforeach
      </div>
    </section>
    @endif

    @if($alerts->count() > 0)
    <section class="reveal bg-white border border-slate-100 rounded-sm p-5 sm:p-6 shadow-sm">
      <div class="flex items-center justify-between gap-3 mb-5">
        <h3 class="text-lg font-semibold text-slate-900 flex items-center gap-2">
          <i class="fa-solid fa-bell text-emerald-500 text-sm"></i> Alerts
        </h3>
      </div>

      <div class="space-y-3">
        @foreach($alerts as $alert)
          <div class="rounded-sm border border-slate-100 px-4 py-3 bg-slate-50/50">
            <div class="text-sm text-slate-700">{{ $alert->message }}</div>
          </div>
        @endforeach
      </div>
    </section>
    @endif
  </div>
@endsection
