@extends('layouts.user')

@section('title', 'Meal Plan')
@section('page-title', 'Meal Plan')

@section('content')
  <div class="mx-auto space-y-6 sm:space-y-8">
    <div class="reveal rounded-sm border border-slate-100 bg-white p-5 sm:p-6 shadow-sm">
      <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
          <h1 class="text-2xl font-semibold tracking-tight text-slate-900">Meal Plan</h1>
          <p class="mt-1 text-sm text-slate-500 font-light">Your meals for today</p>
        </div>
        @if($todayMeals->count() > 0)
          <span class="inline-flex items-center gap-1.5 rounded-full border border-emerald-200 bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-800">
            <i class="fa-solid fa-check text-[10px]"></i> {{ $todayMeals->count() }} meals planned
          </span>
        @endif
      </div>
    </div>

    @if($stats['total'] > 0)
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
      <div class="reveal rounded-sm border border-slate-100 bg-white p-5 shadow-sm">
        <div class="text-xs font-semibold uppercase tracking-wider text-slate-400">Completed</div>
        <div class="mt-2 text-3xl font-semibold text-slate-900">{{ $stats['completed'] }}</div>
        <div class="mt-2 text-xs text-slate-500">Out of {{ $stats['total'] }} today</div>
      </div>

      <div class="reveal rounded-sm border border-slate-100 bg-white p-5 shadow-sm">
        <div class="text-xs font-semibold uppercase tracking-wider text-slate-400">Skipped</div>
        <div class="mt-2 text-3xl font-semibold text-slate-900">{{ $stats['skipped'] }}</div>
        <div class="mt-2 text-xs text-slate-500">Meals skipped</div>
      </div>

      <div class="reveal rounded-sm border border-slate-100 bg-white p-5 shadow-sm">
        <div class="text-xs font-semibold uppercase tracking-wider text-slate-400">Adherence</div>
        <div class="mt-2 text-3xl font-semibold text-emerald-600">{{ $stats['adherence'] }}%</div>
        <div class="mt-2 text-xs text-slate-500">Completion rate</div>
      </div>
    </div>
    @endif

    @if($todayMeals->count() > 0)
    <section class="space-y-4">
      <div class="flex items-center justify-between">
        <h2 class="text-lg font-semibold text-slate-900">Today's Meals</h2>
        <span class="text-xs text-slate-400 font-light">{{ $now->format('M d, Y') }}</span>
      </div>

      <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
        @foreach($todayMeals as $meal)
          @php
            $status = $meal->status ?? 'pending';
            $isCompleted = $status === 'completed';
            $isSkipped = $status === 'skipped';
            $isPending = $status === 'pending';
            $mealTime = $meal->meal_time;
            if (str_contains($mealTime, ':')) {
              $parsedTime = \Carbon\Carbon::parse($mealTime);
              $timeDisplay = $parsedTime->format('g:i A');
            } else {
              $timeDisplay = $mealTime;
            }
          @endphp
          <div class="reveal rounded-sm border border-slate-100 bg-white p-5 shadow-sm flex flex-col justify-between hover:border-slate-200 transition-colors">
            <div>
              <div class="flex items-start justify-between">
                <div class="w-8 h-8 rounded-sm {{ $isCompleted ? 'bg-emerald-50 border border-emerald-100' : ($isSkipped ? 'bg-red-50 border border-red-100' : 'bg-slate-50 border border-slate-200') }} flex items-center justify-center">
                  <i class="fa-solid fa-utensils {{ $isCompleted ? 'text-emerald-600' : ($isSkipped ? 'text-red-600' : 'text-slate-500') }} text-sm"></i>
                </div>
                @if($isCompleted)
                  <span class="inline-flex items-center gap-1.5 rounded-full border border-emerald-100 bg-emerald-50 px-2.5 py-0.5 text-[10px] font-semibold text-emerald-700">
                    <i class="fa-solid fa-check text-[8px]"></i> Completed
                  </span>
                @elseif($isSkipped)
                  <span class="inline-flex items-center gap-1.5 rounded-full border border-red-100 bg-red-50 px-2.5 py-0.5 text-[10px] font-semibold text-red-700">
                    <i class="fa-solid fa-xmark text-[8px]"></i> Skipped
                  </span>
                @else
                  <span class="inline-flex items-center gap-1.5 rounded-full border border-slate-100 bg-slate-50 px-2.5 py-0.5 text-[10px] font-semibold text-slate-500">
                    <i class="fa-solid fa-clock text-[8px]"></i> Pending
                  </span>
                @endif
              </div>

              <h3 class="mt-4 text-base font-semibold text-slate-900">{{ ucfirst(explode(' ', $mealTime)[0] ?? 'Meal') }}</h3>
              <p class="text-xs text-slate-400 mt-1 flex items-center gap-1.5">
                <i class="fa-solid fa-clock text-[9px]"></i> {{ $timeDisplay }}
              </p>
              <div class="mt-4 border-t border-slate-50 pt-4 text-sm font-medium text-slate-800">
                {{ $meal->description }}
              </div>
            </div>

            <div class="mt-5 border-t border-slate-50 pt-4 flex gap-2">
              @if($isPending)
                <button onclick="logMealStatus({{ $meal->id }}, 'completed')" class="flex-1 inline-flex items-center justify-center rounded-sm bg-emerald-500 hover:bg-emerald-600 py-1.5 text-white text-xs font-semibold transition-colors">
                  Complete
                </button>
                <button onclick="logMealStatus({{ $meal->id }}, 'skipped')" class="inline-flex items-center justify-center rounded-sm border border-slate-200 bg-white hover:bg-slate-50 px-2 py-1.5 text-slate-600 text-xs font-semibold transition-colors">
                  Skip
                </button>
              @else
                <span class="text-xs text-slate-400 italic">Logged {{ $status }}</span>
              @endif
            </div>
          </div>
        @endforeach
      </div>
    </section>
    @else
    <div class="reveal rounded-sm border border-slate-100 bg-white p-8 text-center shadow-sm">
      <div class="h-12 w-12 mx-auto rounded-full bg-emerald-50 border border-emerald-100 flex items-center justify-center">
        <i class="fa-solid fa-utensils text-emerald-600 text-lg"></i>
      </div>
      <h3 class="mt-3 text-sm font-semibold text-slate-900">No meals planned for today</h3>
      <p class="mt-1 text-xs text-slate-500">Your doctor hasn't assigned a meal plan yet</p>
    </div>
    @endif

    @if($weekMeals->count() > 0)
    <section class="reveal bg-white border border-slate-100 rounded-sm p-5 sm:p-6 shadow-sm">
      <div class="flex items-center justify-between gap-3 mb-5">
        <h3 class="text-lg font-semibold text-slate-900 flex items-center gap-2">
          <i class="fa-solid fa-calendar text-emerald-500 text-sm"></i> Weekly Schedule
        </h3>
      </div>

      <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse text-sm">
          <thead>
            <tr class="border-b border-slate-100 text-slate-400 text-xs font-semibold uppercase tracking-wider">
              <th class="pb-3 pr-2">Day</th>
              <th class="pb-3 px-2">Breakfast</th>
              <th class="pb-3 px-2">Lunch</th>
              <th class="pb-3 px-2">Dinner</th>
              <th class="pb-3 pl-2 text-right">Status</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-50 text-slate-700">
            @foreach($weekMeals as $day => $meals)
              @php
                $isToday = (strtolower($day) === $todayDayName || $day === $today);
                $completedCount = $meals->where('status', 'completed')->count();
                $totalCount = $meals->count();
                $dayComplete = $totalCount > 0 && $completedCount === $totalCount;
                $dayHasMeals = $totalCount > 0;
              @endphp
              <tr class="hover:bg-slate-50/50 transition-colors {{ $isToday ? 'bg-emerald-50/30' : '' }}">
                <td class="py-4 pr-2 font-semibold text-slate-900 flex items-center gap-1.5">
                  <i class="fa-solid fa-calendar text-slate-400 text-xs"></i> {{ ucfirst($day) }}{{ $isToday ? ' (Today)' : '' }}
                </td>
                @php
                  $breakfast = $meals->firstWhere('meal_time', 'like', '%08:%') ?? $meals->firstWhere('meal_time', 'like', '%7:%') ?? $meals->where('meal_time', 'like', '%am%')->first() ?? null;
                  $lunch = $meals->firstWhere('meal_time', 'like', '%12:%') ?? $meals->firstWhere('meal_time', 'like', '%13:%') ?? $meals->firstWhere('meal_time', 'like', '%1:%') ?? $meals->where('meal_time', 'like', '%pm%')->first() ?? null;
                  $dinner = $meals->firstWhere('meal_time', 'like', '%18:%') ?? $meals->firstWhere('meal_time', 'like', '%19:%') ?? $meals->where('meal_time', 'like', '%7:%')->last() ?? null;
                @endphp
                <td class="py-4 px-2">{{ $breakfast ? $breakfast->description : '—' }}</td>
                <td class="py-4 px-2">{{ $lunch ? $lunch->description : '—' }}</td>
                <td class="py-4 px-2">{{ $dinner ? $dinner->description : '—' }}</td>
                <td class="py-4 pl-2 text-right">
                  @if($dayComplete)
                    <span class="inline-flex items-center gap-1 text-emerald-600 font-semibold text-xs">
                      <i class="fa-solid fa-check text-[10px]"></i> Completed
                    </span>
                  @elseif($isToday)
                    <span class="inline-flex items-center gap-1 text-slate-500 font-medium text-xs">
                      <i class="fa-solid fa-clock text-[10px]"></i> In progress
                    </span>
                  @else
                    <span class="inline-flex items-center gap-1 text-slate-400 font-medium text-xs">
                      <i class="fa-solid fa-clock text-[10px]"></i> Pending
                    </span>
                  @endif
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </section>
    @endif
  </div>
@endsection

@push('scripts')
  <script>
    function logMealStatus(mealId, status) {
      fetch(`/meal-plan/${mealId}/take`, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '',
          'Accept': 'application/json',
        },
        body: JSON.stringify({ status: status }),
      }).then(response => response.json()).then(() => {
        location.reload();
      }).catch(() => {
        alert('Failed to update meal status.');
      });
    }
  </script>
@endpush
