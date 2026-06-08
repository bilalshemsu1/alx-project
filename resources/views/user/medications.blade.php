@extends('layouts.user')

@section('title', 'My Medicines - ቅድሚያ ለጤናዎ')
@section('page-title', 'My Medicines')

@section('content')
  @php
    /** @var 
      *  $alerts $upcoming $dosesTodayTable etc are provided by controller
      */
  @endphp

  <div class="mx-auto space-y-6 sm:space-y-8">

    <!-- Important: Alerts & Actions Required (TOP) -->
    <div class="reveal rounded-sm border border-rose-200 bg-rose-50/40 p-4 sm:p-5" id="missed-dose-alert">
      <div class="flex items-start gap-3">
        <span class="text-rose-600 text-xs flex-shrink-0 mt-1"><i class="fa-solid fa-triangle-exclamation"></i></span>
        <div class="flex-1 min-w-0">
          <h4 class="text-sm font-semibold text-rose-800">Alerts & Actions Required</h4>

          @if($alerts->count() === 0)
            <div class="mt-3 text-xs text-rose-600 flex items-center gap-1.5">
              <i class="fa-solid fa-circle-check text-emerald-500 text-[10px]"></i>
              No missed doses yet.
            </div>
          @else
            <div class="mt-3 space-y-3">
              @foreach($alerts as $dose)
                @php
                  $pm = $dose->patientMedicine;
                  $med = $pm?->medicine;
                  $scheduled = $dose->scheduled_at ? $dose->scheduled_at->format('g:i A') : '';
                  $lateness = $dose->taken_at ? $dose->taken_at->diffInMinutes($dose->scheduled_at, true) : null;
                @endphp
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 text-xs text-rose-700">
                  <span class="font-medium flex items-center gap-1.5">
                    <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                    {{ $med?->name ?? 'Medicine' }} {{ $pm?->dosage ?? '' }} was missed at {{ $scheduled }}.
                  </span>
                  <span class="self-start sm:self-auto inline-flex items-center justify-center rounded-sm border border-rose-200 bg-rose-100 px-3 py-1 text-rose-700 text-[11px] font-semibold">
                    Missed
                  </span>
                </div>
                <div class="h-px bg-rose-100"></div>
              @endforeach
            </div>
          @endif
        </div>
      </div>
    </div>

    <div class="grid grid-cols-1 gap-6 xl:grid-cols-3">

      <!-- Left 2/3 Content -->
      <div class="xl:col-span-2 space-y-6 lg:space-y-8">

        <!-- My Medicines / Current Medications -->
        <section class="space-y-4">
          <div class="flex items-center justify-between">
            <h2 class="text-lg font-semibold text-slate-900">My Medicines</h2>
            <span class="text-xs text-slate-400">Active courses</span>
          </div>

          @php
            $activeMedicinesCount = $patientMedicines->count();
          @endphp

          <div class="flex flex-wrap gap-2">
            <span class="inline-flex items-center gap-1.5 rounded-full border border-emerald-200 bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700">
              <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> {{ $activeMedicinesCount }} Active Medicines
            </span>
            @php
              $overdueCount = $doses->where('status', 'missed')->count();
            @endphp
            <span class="inline-flex items-center gap-1.5 rounded-full border border-red-200 bg-red-50 px-3 py-1 text-xs font-semibold text-red-700">
              <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span> {{ $overdueCount }} Overdue Dose
            </span>
          </div>

          <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 mt-4">
            @forelse($patientMedicines as $pm)
              @php
                $med = $pm->medicine;
                $badgeTaken = $doses
                  ->where('patient_medicine_id', $pm->id)
                  ->whereIn('status', ['on_time','late'])
                  ->count() > 0;

                $badgeText = $badgeTaken ? 'Taken' : 'Pending';
                $badgeColor = $badgeTaken
                  ? 'text-emerald-700 border-emerald-100 bg-emerald-50/50'
                  : 'text-slate-500 border-slate-100 bg-slate-50';
              @endphp

              <div class="reveal rounded-sm border border-slate-100 bg-white p-5 shadow-sm hover:border-slate-200 transition-colors flex flex-col justify-between">
                <div>
                  <div class="flex items-start justify-between gap-2">
                    <div class="w-8 h-8 rounded-sm bg-emerald-50 border border-emerald-100 flex items-center justify-center">
                      <i class="fa-solid fa-pills text-emerald-600 text-sm"></i>
                    </div>
                    <span class="inline-flex items-center gap-1.5 rounded-full border {{ $badgeColor }} px-2.5 py-0.5 text-[10px] font-semibold">
                      <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> {{ $badgeText }}
                    </span>
                  </div>
                  <h3 class="mt-4 text-base font-semibold text-slate-900">{{ $med?->name ?? 'Medicine' }} {{ $pm->dosage }}</h3>
                  @if(!empty($med?->description))
                    <p class="text-xs text-slate-400 mt-1">{{ $med->description }}</p>
                  @endif

                  <div class="mt-4 space-y-2 border-t border-slate-50 pt-4 text-xs">
                    <div class="flex justify-between">
                      <span class="text-slate-400">Dosage</span>
                      <span class="font-medium text-slate-700">{{ $pm->dosage }}</span>
                    </div>
                    <div class="flex justify-between">
                      <span class="text-slate-400">Timing</span>
                      <span class="font-medium text-slate-700">{{ $pm->time_to_take ? $pm->time_to_take->format('g:i A') : '—' }}</span>
                    </div>
                    <div class="flex justify-between">
                      <span class="text-slate-400">Food Intake</span>
                      <span class="font-medium text-slate-700">{{ $pm->before_after_food ?? '—' }}</span>
                    </div>
                  </div>
                </div>
              </div>

            @empty
              <div class="text-sm text-slate-500">No medicines assigned yet.</div>
            @endforelse
          </div>
        </section>

        <!-- Today’s Medication Schedule -->
        <section class="reveal bg-white border border-slate-100 rounded-sm p-5 sm:p-6 shadow-sm">
          <div class="flex items-center justify-between gap-3 mb-5">
            <h3 class="text-lg font-semibold text-slate-900 flex items-center gap-2">
              <i class="fa-solid fa-list-check text-emerald-500 text-sm"></i> Today’s Medication Schedule
            </h3>
            <span class="text-xs text-slate-400 font-medium">{{ $now->format('M d, Y') }}</span>
          </div>

          <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-sm">
              <thead>
                <tr class="border-b border-slate-100 text-slate-400 text-xs font-semibold uppercase tracking-wider">
                  <th class="pb-3 pr-2">Medicine</th>
                  <th class="pb-3 px-2">Time</th>
                  <th class="pb-3 px-2">Dosage</th>
                  <th class="pb-3 px-2">Food Instruction</th>
                  <th class="pb-3 px-2">Status</th>
                  <th class="pb-3 pl-2 text-right">Action</th>
                </tr>
              </thead>
              <tbody id="schedule-table-body" class="divide-y divide-slate-50">
                @forelse($dosesTodayTable as $dose)
                  @php
                    $pm = $dose->patientMedicine;
                    $med = $pm?->medicine;
                    $scheduled = $dose->scheduled_at->format('g:i A');
                    $status = $dose->status;
                    $takenAtLabel = $dose->taken_at ? $dose->taken_at->format('g:i A') : null;
                  @endphp

                  <tr class="hover:bg-slate-50/50 transition-colors">
                    <td class="py-4 pr-2">
                      <div class="font-semibold text-slate-900">{{ $med?->name ?? 'Medicine' }}</div>
                    </td>
                    <td class="py-4 px-2 text-slate-600">{{ $scheduled }}</td>
                    <td class="py-4 px-2 text-slate-600">{{ $pm?->dosage }}</td>
                    <td class="py-4 px-2">
                      <span class="inline-block px-2 py-0.5 text-xs rounded-sm bg-slate-50 border border-slate-100 text-slate-600 font-medium">
                        {{ $pm?->before_after_food ?? '—' }}
                      </span>
                    </td>
                    <td class="py-4 px-2">
                      @if($status === 'pending')
                        <span class="inline-flex items-center gap-1.5 text-slate-400 font-medium text-xs">
                          <i class="fa-regular fa-clock text-slate-400 text-[10px]"></i> Pending
                        </span>
                      @elseif($status === 'on_time')
                        <span class="inline-flex items-center gap-1.5 text-emerald-600 font-semibold text-xs">
                          <i class="fa-solid fa-circle-check text-emerald-500 text-[10px]"></i> Taken
                        </span>
                      @elseif($status === 'late')
                        <span class="inline-flex items-center gap-1.5 text-red-600 font-semibold text-xs">
                          <i class="fa-solid fa-circle-xmark text-red-500 text-[10px]"></i> Late
                        </span>
                      @else
                        <span class="inline-flex items-center gap-1.5 text-rose-600 font-semibold text-xs">
                          <i class="fa-solid fa-triangle-exclamation text-rose-500 text-[10px]"></i> Missed
                        </span>
                      @endif

                      @if($takenAtLabel)
                        <div class="text-[11px] text-slate-500 mt-1">Logged at {{ $takenAtLabel }}</div>
                      @endif
                    </td>

                    <td class="py-4 pl-2 text-right">
                      @if($status === 'pending' && $dose->scheduled_at->lte($now))
                        <form method="POST" action="{{ route('medications.doses.take', $dose) }}">
                          @csrf
                          <button type="submit" class="inline-flex items-center justify-center rounded-sm bg-emerald-500 hover:bg-emerald-600 px-2.5 py-1 text-white text-xs font-semibold transition-colors">
                            Mark as Taken
                          </button>
                        </form>
                      @elseif($status === 'pending' && $dose->scheduled_at->gt($now))
                        <span class="text-xs text-slate-400 italic">Not time yet</span>
                      @else
                        <span class="text-xs text-slate-400 italic">—</span>
                      @endif
                    </td>
                  </tr>
                @empty
                  <tr><td colspan="6" class="py-6 text-center text-sm text-slate-500">No doses scheduled for today.</td></tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </section>

        <!-- Doctor’s Instructions -->
        <section class="reveal bg-white border border-slate-100 rounded-sm p-5 sm:p-6 shadow-sm">
          <h3 class="text-lg font-semibold text-slate-900 flex items-center gap-2 mb-5">
            <i class="fa-solid fa-user-doctor text-emerald-500 text-sm"></i> Doctor’s Instructions
          </h3>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-xs sm:text-sm">
            @forelse($doctorInstructions as $inst)
              @php
                $pm = $inst->patientMedicine;
                $med = $pm?->medicine;
              @endphp
              <div class="p-4 border border-slate-50 bg-slate-50/50 rounded-sm">
                <div class="font-semibold text-slate-900 flex items-center gap-2">
                  <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                  {{ $med?->name ?? 'Medicine' }} {{ $pm?->dosage }}
                </div>
                @if($inst->note)
                  <p class="text-slate-600 mt-2 italic">“{{ $inst->note }}”</p>
                @else
                  <p class="text-slate-500 mt-2 italic">No instructions.</p>
                @endif
              </div>
            @empty
              <div class="text-sm text-slate-500">No doctor instructions available.</div>
            @endforelse
          </div>
        </section>

        <!-- Compliance History -->
        <section class="reveal bg-white border border-slate-100 rounded-sm p-5 sm:p-6 shadow-sm">
          <div class="flex items-center justify-between gap-3 mb-5">
            <h3 class="text-lg font-semibold text-slate-900 flex items-center gap-2">
              <i class="fa-solid fa-history text-emerald-500 text-sm"></i> Compliance History
            </h3>
            <span class="text-xs text-slate-400 font-medium">Today</span>
          </div>

          <div class="space-y-3">
            <div class="flex items-center justify-between">
              <span class="text-xs font-semibold uppercase tracking-wider text-slate-400">Compliance</span>
              <span class="text-[10px] text-emerald-600 font-semibold bg-emerald-50 border border-emerald-100 px-2 py-0.5 rounded-full">
                {{ $compliancePct }}% Compliance
              </span>
            </div>

            <div class="relative border-l border-slate-100 pl-4 ml-2 space-y-3">
              @forelse($dosesTodayTable as $dose)
                @php
                  $pm = $dose->patientMedicine;
                  $med = $pm?->medicine;
                  $scheduled = $dose->scheduled_at->format('g:i A');
                @endphp
                <div>
                  <div class="absolute -left-[21px] top-1 w-2.5 h-2.5 rounded-full {{ $dose->status === 'late' ? 'bg-red-500' : ($dose->status==='on_time' ? 'bg-emerald-500' : 'bg-slate-300') }} border-2 border-white ring-4 ring-slate-50"></div>
                  <div class="text-xs font-semibold text-slate-900">{{ $med?->name ?? 'Medicine' }} ({{ $scheduled }})</div>
                  <div class="text-xs text-slate-500 mt-0.5">
                    @if($dose->status === 'on_time')
                      <i class="fa-solid fa-circle-check text-emerald-500 text-[10px]"></i> Taken on time
                    @elseif($dose->status === 'late')
                      <i class="fa-solid fa-circle-xmark text-red-500 text-[10px]"></i> Taken late
                    @elseif($dose->status === 'missed')
                      <i class="fa-solid fa-triangle-exclamation text-rose-500 text-[10px]"></i> Missed
                    @else
                      <i class="fa-regular fa-clock text-slate-400 text-[10px]"></i> Pending
                    @endif
                  </div>
                </div>
              @empty
                <div class="text-sm text-slate-500">No dose events yet.</div>
              @endforelse
            </div>
          </div>
        </section>

      </div>

      <!-- Right 1/3 Sidebar Content -->
      <div class="space-y-6 lg:space-y-8">

        <!-- Upcoming Schedulers -->
        <section class="reveal bg-white border border-slate-100 rounded-sm p-5 sm:p-6 shadow-sm">
          <div class="flex items-center justify-between gap-3 mb-5">
            <h3 class="text-lg font-semibold text-slate-900 flex items-center gap-2">
              <i class="fa-regular fa-clock text-emerald-500 text-sm"></i> Upcoming Schedulers
            </h3>
            <span class="text-xs text-slate-400 font-medium">Timeline alert</span>
          </div>

          <div class="space-y-3">
            @php
              $nextDose = $upcoming->first();
            @endphp

            @if($nextDose)
              @php
                $pm = $nextDose->patientMedicine;
                $med = $pm?->medicine;
                $scheduled = $nextDose->scheduled_at->format('g:i A');
              @endphp
              <div class="rounded-sm border border-slate-100 bg-slate-50/50 p-4">
                <div class="flex items-start justify-between">
                  <div>
                    <span class="inline-flex items-center gap-1 rounded-sm bg-slate-100 px-2 py-0.5 text-[9px] font-bold uppercase tracking-wider text-slate-500">Next Dose</span>
                    <h4 class="mt-2 text-sm font-semibold text-slate-900">{{ $med?->name ?? 'Medicine' }} {{ $pm?->dosage }}</h4>
                    <p class="text-xs text-slate-500 mt-0.5">Scheduled for {{ $scheduled }}</p>
                  </div>
                  <div class="text-right">
                    <span class="text-xs font-semibold text-emerald-600" id="countdown-next">
                      @if($nextDoseCountdownSeconds !== null)
                        Calculating...
                      @else
                        —
                      @endif
                    </span>
                  </div>
                </div>
              </div>
            @else
              <div class="text-sm text-slate-500">No upcoming doses.</div>
            @endif

            @if($alerts->count() > 0)
              @php
                $lastMissed = $alerts->first();
                $pm = $lastMissed->patientMedicine;
                $med = $pm?->medicine;
              @endphp
              <div id="side-missed" class="rounded-sm border border-red-100 bg-red-50/30 p-4">
                <div class="flex items-start justify-between">
                  <div>
                    <span class="inline-flex items-center gap-1 rounded-sm bg-red-100 px-2 py-0.5 text-[9px] font-bold uppercase tracking-wider text-red-700">Overdue</span>
                    <h4 class="mt-2 text-sm font-semibold text-slate-900">{{ $med?->name ?? 'Medicine' }} {{ $pm?->dosage }}</h4>
                    <p class="text-xs text-slate-500 mt-0.5">Scheduled for {{ $lastMissed->scheduled_at->format('g:i A') }}</p>
                  </div>
                  <div class="text-right">
                    <span class="text-xs font-bold text-red-600">Missed</span>
                  </div>
                </div>
              </div>
            @endif
          </div>
        </section>

        <!-- Placeholder removed: history is already shown in left column -->

      </div>

    </div>
  </div>
@endsection

@push('scripts')
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const el = document.getElementById('countdown-next');
      if (!el) return;

      // If server computed countdown, render it as static value
      // (full live countdown optional; keep minimal to avoid mismatch)
      const raw = @json($nextDoseCountdownSeconds);
      if (raw === null || raw === undefined) return;

      function render(seconds) {
        const s = Math.max(0, seconds);
        const h = Math.floor(s/3600);
        const m = Math.floor((s%3600)/60);
        const sec = s%60;
        el.textContent = `in ${h}h ${m}m ${sec}s`;
      }

      let seconds = raw;
      render(seconds);
      setInterval(() => {
        seconds -= 1;
        render(seconds);
      }, 1000);
    });
  </script>
@endpush

