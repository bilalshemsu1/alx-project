@extends('layouts.user')

@section('title', 'Meal Plan - VitaTrack')
@section('page-title', 'Meal Plan')

@section('content')
  <div class="mx-auto space-y-6 sm:space-y-8">
    <!-- 1. Page Header Section -->
    <div class="reveal rounded-sm border border-slate-100 bg-white p-5 sm:p-6 shadow-sm">
      <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
          <h1 class="text-2xl font-semibold tracking-tight text-slate-900">Meal Plan</h1>
          <p class="mt-1 text-sm text-slate-500 font-light">Daily nutrition guidance from your doctor</p>
        </div>
        <div>
          <span class="inline-flex items-center gap-1.5 rounded-full border border-emerald-200 bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-800">
            <i class="fa-solid fa-check text-[10px]"></i> Active Meal Plan
          </span>
        </div>
      </div>
    </div>

    <!-- 5. Meal Completion Status (Stats Cards) & 6. Nutrition Summary Grid -->
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6">
      <!-- Stats Cards -->
      <div class="reveal rounded-sm border border-slate-100 bg-white p-5 shadow-sm">
        <div class="text-xs font-semibold uppercase tracking-wider text-slate-400">Completed Today</div>
        <div id="stats-completed" class="mt-2 text-3xl font-semibold text-slate-900">1</div>
        <div class="mt-2 text-xs text-slate-500">Out of 3 scheduled</div>
      </div>

      <div class="reveal rounded-sm border border-slate-100 bg-white p-5 shadow-sm">
        <div class="text-xs font-semibold uppercase tracking-wider text-slate-400">Meals Skipped</div>
        <div id="stats-skipped" class="mt-2 text-3xl font-semibold text-slate-900">0</div>
        <div class="mt-2 text-xs text-slate-500">Tracked skips</div>
      </div>

      <div class="reveal rounded-sm border border-slate-100 bg-white p-5 shadow-sm">
        <div class="text-xs font-semibold uppercase tracking-wider text-slate-400">Weekly Adherence</div>
        <div id="stats-adherence" class="mt-2 text-3xl font-semibold text-emerald-600">92%</div>
        <div class="mt-2 text-xs text-slate-500">7-day tracking rate</div>
      </div>

      <!-- Nutrition Summary -->
      <div class="reveal rounded-sm border border-slate-100 bg-white p-5 shadow-sm">
        <div class="text-xs font-semibold uppercase tracking-wider text-slate-400">Calories (Approx)</div>
        <div class="mt-2 text-3xl font-semibold text-slate-900">1,850 kcal</div>
        <div class="mt-2 text-xs text-slate-500">Daily budget: 2,000 kcal</div>
      </div>

      <div class="reveal rounded-sm border border-slate-100 bg-white p-5 shadow-sm">
        <div class="text-xs font-semibold uppercase tracking-wider text-slate-400">Protein Intake</div>
        <div class="mt-2 text-3xl font-semibold text-slate-900">95 g</div>
        <div class="mt-2 text-xs text-slate-500">Daily target: 110 g</div>
      </div>

      <div class="reveal rounded-sm border border-slate-100 bg-white p-5 shadow-sm">
        <div class="text-xs font-semibold uppercase tracking-wider text-slate-400">Hydration & Overall</div>
        <div class="mt-2 text-xl font-semibold text-slate-900">2.1L / Good</div>
        <div class="mt-2 text-xs text-emerald-600 font-medium">Hydration status normal</div>
      </div>
    </div>

    <!-- Main Section Grid -->
    <div class="grid grid-cols-1 gap-6 xl:grid-cols-3">
      
      <!-- Left 2/3: Today's Plan & Weekly Schedule -->
      <div class="xl:col-span-2 space-y-6 lg:space-y-8">
        
        <!-- 2. TODAY’S MEAL PLAN -->
        <section class="space-y-4">
          <div class="flex items-center justify-between">
            <h2 class="text-lg font-semibold text-slate-900">Today's Meal Plan</h2>
            <span class="text-xs text-slate-400 font-light">Follow guidance timeline</span>
          </div>

          <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
            <!-- Breakfast Card -->
            <div id="card-breakfast" class="reveal rounded-sm border border-slate-100 bg-white p-5 shadow-sm flex flex-col justify-between hover:border-slate-200 transition-colors">
              <div>
                <div class="flex items-start justify-between">
                  <div class="w-8 h-8 rounded-sm bg-emerald-50 border border-emerald-100 flex items-center justify-center">
                    <i class="fa-solid fa-utensils text-emerald-600 text-sm"></i>
                  </div>
                  <span id="badge-breakfast" class="inline-flex items-center gap-1.5 rounded-full border border-emerald-100 bg-emerald-50 px-2.5 py-0.5 text-[10px] font-semibold text-emerald-700">
                    <i class="fa-solid fa-check text-[8px]"></i> Completed
                  </span>
                </div>
                
                <h3 class="mt-4 text-base font-semibold text-slate-900">Breakfast</h3>
                <p class="text-xs text-slate-400 mt-1 flex items-center gap-1.5">
                  <i class="fa-solid fa-clock text-[9px]"></i> 8:00 AM
                </p>
                <div class="mt-4 border-t border-slate-50 pt-4 text-sm font-medium text-slate-800">
                  Oats + tea
                </div>
              </div>
              
              <div id="actions-breakfast" class="mt-5 border-t border-slate-50 pt-4 flex gap-2">
                <span class="text-xs text-slate-400 italic">Logged completed</span>
              </div>
            </div>

            <!-- Lunch Card -->
            <div id="card-lunch" class="reveal rounded-sm border border-slate-100 bg-white p-5 shadow-sm flex flex-col justify-between hover:border-slate-200 transition-colors">
              <div>
                <div class="flex items-start justify-between">
                  <div class="w-8 h-8 rounded-sm bg-slate-50 border border-slate-200 flex items-center justify-center">
                    <i class="fa-solid fa-utensils text-slate-500 text-sm"></i>
                  </div>
                  <span id="badge-lunch" class="inline-flex items-center gap-1.5 rounded-full border border-slate-100 bg-slate-50 px-2.5 py-0.5 text-[10px] font-semibold text-slate-500">
                    <i class="fa-solid fa-clock text-[8px]"></i> Pending
                  </span>
                </div>
                
                <h3 class="mt-4 text-base font-semibold text-slate-900">Lunch</h3>
                <p class="text-xs text-slate-400 mt-1 flex items-center gap-1.5">
                  <i class="fa-solid fa-clock text-[9px]"></i> 1:30 PM
                </p>
                <div class="mt-4 border-t border-slate-50 pt-4 text-sm font-medium text-slate-800">
                  Rice + vegetables + chicken
                </div>
              </div>
              
              <div id="actions-lunch" class="mt-5 border-t border-slate-50 pt-4 flex gap-2">
                <button onclick="logMealStatus('lunch', 'Completed')" class="flex-1 inline-flex items-center justify-center rounded-sm bg-emerald-500 hover:bg-emerald-600 py-1.5 text-white text-xs font-semibold transition-colors">
                  Complete
                </button>
                <button onclick="logMealStatus('lunch', 'Skipped')" class="inline-flex items-center justify-center rounded-sm border border-slate-200 bg-white hover:bg-slate-50 px-2 py-1.5 text-slate-600 text-xs font-semibold transition-colors">
                  Skip
                </button>
              </div>
            </div>

            <!-- Dinner Card -->
            <div id="card-dinner" class="reveal rounded-sm border border-slate-100 bg-white p-5 shadow-sm flex flex-col justify-between hover:border-slate-200 transition-colors">
              <div>
                <div class="flex items-start justify-between">
                  <div class="w-8 h-8 rounded-sm bg-slate-50 border border-slate-200 flex items-center justify-center">
                    <i class="fa-solid fa-utensils text-slate-500 text-sm"></i>
                  </div>
                  <span id="badge-dinner" class="inline-flex items-center gap-1.5 rounded-full border border-slate-100 bg-slate-50 px-2.5 py-0.5 text-[10px] font-semibold text-slate-500">
                    <i class="fa-solid fa-clock text-[8px]"></i> Pending
                  </span>
                </div>
                
                <h3 class="mt-4 text-base font-semibold text-slate-900">Dinner</h3>
                <p class="text-xs text-slate-400 mt-1 flex items-center gap-1.5">
                  <i class="fa-solid fa-clock text-[9px]"></i> 7:30 PM
                </p>
                <div class="mt-4 border-t border-slate-50 pt-4 text-sm font-medium text-slate-800">
                  Soup + bread
                </div>
              </div>
              
              <div id="actions-dinner" class="mt-5 border-t border-slate-50 pt-4 flex gap-2">
                <button onclick="logMealStatus('dinner', 'Completed')" class="flex-1 inline-flex items-center justify-center rounded-sm bg-emerald-500 hover:bg-emerald-600 py-1.5 text-white text-xs font-semibold transition-colors">
                  Complete
                </button>
                <button onclick="logMealStatus('dinner', 'Skipped')" class="inline-flex items-center justify-center rounded-sm border border-slate-200 bg-white hover:bg-slate-50 px-2 py-1.5 text-slate-600 text-xs font-semibold transition-colors">
                  Skip
                </button>
              </div>
            </div>
          </div>
        </section>

        <!-- 3. WEEKLY MEAL SCHEDULE -->
        <section class="reveal bg-white border border-slate-100 rounded-sm p-5 sm:p-6 shadow-sm">
          <div class="flex items-center justify-between gap-3 mb-5">
            <h3 class="text-lg font-semibold text-slate-900 flex items-center gap-2">
              <i class="fa-solid fa-calendar text-emerald-500 text-sm"></i> Weekly Meal Schedule
            </h3>
            <span class="text-xs text-slate-400 font-medium">Diet History</span>
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
                <!-- Today/Monday -->
                <tr class="hover:bg-slate-50/50 transition-colors">
                  <td class="py-4 pr-2 font-semibold text-slate-900 flex items-center gap-1.5">
                    <i class="fa-solid fa-calendar text-slate-400 text-xs"></i> Monday (Today)
                  </td>
                  <td class="py-4 px-2">Oats + tea</td>
                  <td id="table-lunch-desc" class="py-4 px-2">Rice + vegetables + chicken</td>
                  <td id="table-dinner-desc" class="py-4 px-2">Soup + bread</td>
                  <td id="table-status-monday" class="py-4 pl-2 text-right">
                    <span class="inline-flex items-center gap-1 text-slate-500 font-medium text-xs">
                      <i class="fa-solid fa-clock text-[10px]"></i> Pending
                    </span>
                  </td>
                </tr>

                <!-- Tuesday -->
                <tr class="hover:bg-slate-50/50 transition-colors">
                  <td class="py-4 pr-2 font-semibold text-slate-900 flex items-center gap-1.5">
                    <i class="fa-solid fa-calendar text-slate-400 text-xs"></i> Tuesday
                  </td>
                  <td class="py-4 px-2">Eggs + whole wheat toast</td>
                  <td class="py-4 px-2">Pasta + mixed salad</td>
                  <td class="py-4 px-2">Grilled salmon + broccoli</td>
                  <td class="py-4 pl-2 text-right">
                    <span class="inline-flex items-center gap-1 text-slate-400 font-medium text-xs">
                      <i class="fa-solid fa-clock text-[10px]"></i> Pending
                    </span>
                  </td>
                </tr>

                <!-- Wednesday -->
                <tr class="hover:bg-slate-50/50 transition-colors">
                  <td class="py-4 pr-2 font-semibold text-slate-900 flex items-center gap-1.5">
                    <i class="fa-solid fa-calendar text-slate-400 text-xs"></i> Wednesday
                  </td>
                  <td class="py-4 px-2">Avocado toast + juice</td>
                  <td class="py-4 px-2">Quinoa + vegetables + tofu</td>
                  <td class="py-4 px-2">Turkey breast + sweet potato</td>
                  <td class="py-4 pl-2 text-right">
                    <span class="inline-flex items-center gap-1 text-slate-400 font-medium text-xs">
                      <i class="fa-solid fa-clock text-[10px]"></i> Pending
                    </span>
                  </td>
                </tr>

                <!-- Past Day: Sunday -->
                <tr class="hover:bg-slate-50/50 transition-colors bg-slate-50/20">
                  <td class="py-4 pr-2 font-semibold text-slate-500 flex items-center gap-1.5">
                    <i class="fa-solid fa-calendar text-slate-300 text-xs"></i> Sunday
                  </td>
                  <td class="py-4 px-2 text-slate-500">Oats + banana</td>
                  <td class="py-4 px-2 text-slate-500">Baked chicken + rice</td>
                  <td class="py-4 px-2 text-slate-500">Minestrone soup</td>
                  <td class="py-4 pl-2 text-right">
                    <span class="inline-flex items-center gap-1 text-emerald-600 font-semibold text-xs">
                      <i class="fa-solid fa-check text-[10px]"></i> Completed
                    </span>
                  </td>
                </tr>

                <!-- Past Day: Saturday -->
                <tr class="hover:bg-slate-50/50 transition-colors bg-slate-50/20">
                  <td class="py-4 pr-2 font-semibold text-slate-500 flex items-center gap-1.5">
                    <i class="fa-solid fa-calendar text-slate-300 text-xs"></i> Saturday
                  </td>
                  <td class="py-4 px-2 text-slate-500">Yogurt + berries</td>
                  <td class="py-4 px-2 text-slate-500">Tuna salad wrap</td>
                  <td class="py-4 px-2 text-slate-500">Lean beef stew</td>
                  <td class="py-4 pl-2 text-right">
                    <span class="inline-flex items-center gap-1 text-emerald-600 font-semibold text-xs">
                      <i class="fa-solid fa-check text-[10px]"></i> Completed
                    </span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </section>

      </div>

      <!-- Right 1/3: Instructions & Additional info -->
      <div class="space-y-6 lg:space-y-8">
        
        <!-- 4. DOCTOR FOOD INSTRUCTIONS -->
        <section class="reveal bg-white border border-slate-100 rounded-sm p-5 sm:p-6 shadow-sm">
          <div class="flex items-center justify-between gap-3 mb-5">
            <h3 class="text-lg font-semibold text-slate-900 flex items-center gap-2">
              <i class="fa-solid fa-info-circle text-emerald-500 text-sm"></i> Nutrition Instructions
            </h3>
            <span class="text-xs text-slate-400 font-medium">Physician guidelines</span>
          </div>

          <div class="space-y-3 text-sm">
            <div class="flex items-start gap-3 p-3 border border-slate-50 bg-slate-50/30 rounded-sm">
              <span class="text-emerald-500 mt-0.5"><i class="fa-solid fa-info-circle"></i></span>
              <div>
                <div class="font-semibold text-slate-800">Avoid Sugar</div>
                <p class="text-xs text-slate-500 mt-0.5">Eliminate added sugar, sweets, and carbonated soft drinks to help stabilize insulin levels.</p>
              </div>
            </div>

            <div class="flex items-start gap-3 p-3 border border-slate-50 bg-slate-50/30 rounded-sm">
              <span class="text-emerald-500 mt-0.5"><i class="fa-solid fa-info-circle"></i></span>
              <div>
                <div class="font-semibold text-slate-800">Reduce Salt Intake</div>
                <p class="text-xs text-slate-500 mt-0.5">Limit daily sodium intake to under 2,000 mg to assist blood pressure management.</p>
              </div>
            </div>

            <div class="flex items-start gap-3 p-3 border border-slate-50 bg-slate-50/30 rounded-sm">
              <span class="text-emerald-500 mt-0.5"><i class="fa-solid fa-info-circle"></i></span>
              <div>
                <div class="font-semibold text-slate-800">Hydration Target</div>
                <p class="text-xs text-slate-500 mt-0.5">Drink at least 2.0 liters (approx. 8 glasses) of pure water daily.</p>
              </div>
            </div>

            <div class="flex items-start gap-3 p-3 border border-slate-50 bg-slate-50/30 rounded-sm">
              <span class="text-emerald-500 mt-0.5"><i class="fa-solid fa-info-circle"></i></span>
              <div>
                <div class="font-semibold text-slate-800">Vegetable Intake</div>
                <p class="text-xs text-slate-500 mt-0.5">Ensure at least half of the lunch and dinner plates consist of leafy greens or cruciferous vegetables.</p>
              </div>
            </div>
          </div>
        </section>

      </div>

    </div>
  </div>
@endsection

@push('scripts')
  <script>
    // State management simulator for meals
    const mealStates = {
      breakfast: 'Completed',
      lunch: 'Pending',
      dinner: 'Pending'
    };

    function logMealStatus(meal, status) {
      mealStates[meal] = status;

      // 1. Update Card Badge
      const badge = document.getElementById(`badge-${meal}`);
      const card = document.getElementById(`card-${meal}`);
      if (badge && card) {
        if (status === 'Completed') {
          badge.className = 'inline-flex items-center gap-1.5 rounded-full border border-emerald-100 bg-emerald-50 px-2.5 py-0.5 text-[10px] font-semibold text-emerald-700';
          badge.innerHTML = '<i class="fa-solid fa-check text-[8px]"></i> Completed';
        } else if (status === 'Skipped') {
          badge.className = 'inline-flex items-center gap-1.5 rounded-full border border-red-100 bg-red-50 px-2.5 py-0.5 text-[10px] font-semibold text-red-700';
          badge.innerHTML = '<i class="fa-solid fa-xmark text-[8px]"></i> Skipped';
        }
      }

      // 2. Disable Actions
      const actionsDiv = document.getElementById(`actions-${meal}`);
      if (actionsDiv) {
        actionsDiv.innerHTML = `<span class="text-xs text-slate-400 italic">Logged ${status.toLowerCase()}</span>`;
      }

      // 3. Update Statistics
      updateMealStats();

      // 4. Update Weekly Schedule row status for Monday (Today)
      updateWeeklyScheduleStatus();
    }

    function updateMealStats() {
      let completedCount = 0;
      let skippedCount = 0;

      Object.values(mealStates).forEach(val => {
        if (val === 'Completed') completedCount++;
        if (val === 'Skipped') skippedCount++;
      });

      const compEl = document.getElementById('stats-completed');
      const skipEl = document.getElementById('stats-skipped');
      const adhEl = document.getElementById('stats-adherence');

      if (compEl) compEl.innerText = completedCount.toString();
      if (skipEl) skipEl.innerText = skippedCount.toString();

      if (adhEl) {
        // Simple mock calculations based on past compliance
        // Completed: 2 completed yesterday + 2 completed day before + today's completed
        const pastCompleted = 6; 
        const totalMeals = 9 + completedCount + skippedCount;
        const currentAdherence = Math.round(((pastCompleted + completedCount) / totalMeals) * 100);
        adhEl.innerText = `${currentAdherence}%`;

        if (currentAdherence >= 80) {
          adhEl.className = 'mt-2 text-3xl font-semibold text-emerald-600';
        } else {
          adhEl.className = 'mt-2 text-3xl font-semibold text-amber-600';
        }
      }
    }

    function updateWeeklyScheduleStatus() {
      const scheduleStatusCell = document.getElementById('table-status-monday');
      if (!scheduleStatusCell) return;

      let completedCount = 0;
      let pendingCount = 0;
      let skippedCount = 0;

      Object.values(mealStates).forEach(val => {
        if (val === 'Completed') completedCount++;
        if (val === 'Pending') pendingCount++;
        if (val === 'Skipped') skippedCount++;
      });

      if (pendingCount > 0) {
        scheduleStatusCell.innerHTML = `
          <span class="inline-flex items-center gap-1 text-slate-500 font-medium text-xs">
            <i class="fa-solid fa-clock text-[10px]"></i> Pending (${pendingCount} left)
          </span>
        `;
      } else if (skippedCount > 0 && completedCount === 0) {
        scheduleStatusCell.innerHTML = `
          <span class="inline-flex items-center gap-1 text-red-600 font-medium text-xs">
            <i class="fa-solid fa-xmark text-[10px]"></i> Skipped
          </span>
        `;
      } else {
        const skippedText = skippedCount > 0 ? ` (${skippedCount} skipped)` : '';
        scheduleStatusCell.innerHTML = `
          <span class="inline-flex items-center gap-1 text-emerald-600 font-semibold text-xs">
            <i class="fa-solid fa-check text-[10px]"></i> Completed${skippedText}
          </span>
        `;
      }
    }
  </script>
@endpush
