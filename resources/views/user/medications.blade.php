@extends('layouts.user')

@section('title', 'My Medicines - ቅድሚያ ለጤናዎ')
@section('page-title', 'My Medicines')

@section('content')
  <div class="mx-auto space-y-6 sm:space-y-8">
    <!-- 1. Page Header Section -->
    <div class="reveal rounded-sm border border-slate-100 bg-white p-5 sm:p-6 shadow-sm">
      <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
          <h1 class="text-2xl font-semibold tracking-tight text-slate-900">My Medicines</h1>
          <p class="mt-1 text-sm text-slate-500 font-light">Track your daily medication schedule and view physician notes.</p>
        </div>
        <div class="flex flex-wrap gap-2">
          <span class="inline-flex items-center gap-1.5 rounded-full border border-emerald-200 bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700">
            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> 4 Active Medicines
          </span>
          <span id="badge-overdue" class="inline-flex items-center gap-1.5 rounded-full border border-red-200 bg-red-50 px-3 py-1 text-xs font-semibold text-red-700">
            <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span> 1 Overdue Dose
          </span>
        </div>
      </div>
    </div>

    <!-- 6. Missed Dose Alerts Block -->
    <div id="missed-dose-alert" class="reveal rounded-sm border border-rose-200 bg-rose-50/40 p-4 sm:p-5">
      <div class="flex items-start gap-3">
        <span class="text-rose-600 text-xs flex-shrink-0 mt-1"><i class="fa-solid fa-triangle-exclamation"></i></span>
        <div class="flex-1 min-w-0">
          <h4 class="text-sm font-semibold text-rose-800">Alerts & Actions Required</h4>
          <div class="mt-3 space-y-3">
            <div id="alert-amox" class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 text-xs text-rose-700">
              <span class="font-medium flex items-center gap-1.5">
                <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                Amoxicillin 250mg was missed at 2:00 PM today.
              </span>
              <button onclick="logMedicineTaken('Amoxicillin 250mg', 'Afternoon', '2:00 PM')" class="self-start sm:self-auto inline-flex items-center justify-center rounded-sm bg-rose-600 hover:bg-rose-700 px-3 py-1.5 text-white font-medium transition-colors">
                Log as Taken Now
              </button>
            </div>
            <div class="h-px bg-rose-100"></div>
            <div class="text-xs text-rose-600 flex items-center gap-1.5">
              <span class="text-rose-600 text-xs"><i class="fa-solid fa-circle-info"></i></span>
              <span>Paracetamol 500mg was taken late by 1 hour (Scheduled 8:00 AM, logged at 9:00 AM).</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="grid grid-cols-1 gap-6 xl:grid-cols-3">
      <!-- Left 2/3 Content -->
      <div class="xl:col-span-2 space-y-6 lg:space-y-8">
        
        <!-- 2. Current Medicines List Section -->
        <section class="space-y-4">
          <div class="flex items-center justify-between">
            <h2 class="text-lg font-semibold text-slate-900">Current Medications</h2>
            <span class="text-xs text-slate-400">Prescribed courses</span>
          </div>

          <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <!-- Card 1: Paracetamol -->
            <div class="reveal rounded-sm border border-slate-100 bg-white p-5 shadow-sm hover:border-slate-200 transition-colors flex flex-col justify-between">
              <div>
                <div class="flex items-start justify-between gap-2">
                  <div class="w-8 h-8 rounded-sm bg-emerald-50 border border-emerald-100 flex items-center justify-center">
                    <i class="fa-solid fa-pills text-emerald-600 text-sm"></i>
                  </div>
                  <span class="inline-flex items-center gap-1.5 rounded-full border border-emerald-100 bg-emerald-50/50 px-2.5 py-0.5 text-[10px] font-semibold text-emerald-700">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Taken
                  </span>
                </div>
                <h3 class="mt-4 text-base font-semibold text-slate-900">Paracetamol 500mg</h3>
                <p class="text-xs text-slate-400 mt-1">General pain relief & fever control</p>
                
                <div class="mt-4 space-y-2 border-t border-slate-50 pt-4 text-xs">
                  <div class="flex justify-between">
                    <span class="text-slate-400">Dosage</span>
                    <span class="font-medium text-slate-700">1 tablet</span>
                  </div>
                  <div class="flex justify-between">
                    <span class="text-slate-400">Timing</span>
                    <span class="font-medium text-slate-700">Morning / Night (8:00 AM)</span>
                  </div>
                  <div class="flex justify-between">
                    <span class="text-slate-400">Food Intake</span>
                    <span class="font-medium text-slate-700">After food</span>
                  </div>
                </div>
              </div>
              <div class="mt-5 border-t border-slate-50 pt-4 flex items-center justify-between text-[11px] text-slate-400">
                <span>Oct 01 — Oct 10</span>
                <span class="text-emerald-600 font-semibold uppercase tracking-wider text-[9px]">4 days left</span>
              </div>
            </div>

            <!-- Card 2: Amoxicillin -->
            <div id="card-amox" class="reveal rounded-sm border border-slate-100 bg-white p-5 shadow-sm hover:border-slate-200 transition-colors flex flex-col justify-between">
              <div>
                <div class="flex items-start justify-between gap-2">
                  <div class="w-8 h-8 rounded-sm bg-red-50 border border-red-100 flex items-center justify-center">
                    <i class="fa-solid fa-capsules text-red-600 text-sm"></i>
                  </div>
                  <span id="badge-amox" class="inline-flex items-center gap-1.5 rounded-full border border-red-100 bg-red-50/50 px-2.5 py-0.5 text-[10px] font-semibold text-red-700">
                    <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span> Not taken
                  </span>
                </div>
                <h3 class="mt-4 text-base font-semibold text-slate-900">Amoxicillin 250mg</h3>
                <p class="text-xs text-slate-400 mt-1">Antibiotic course</p>
                
                <div class="mt-4 space-y-2 border-t border-slate-50 pt-4 text-xs">
                  <div class="flex justify-between">
                    <span class="text-slate-400">Dosage</span>
                    <span class="font-medium text-slate-700">1 capsule</span>
                  </div>
                  <div class="flex justify-between">
                    <span class="text-slate-400">Timing</span>
                    <span class="font-medium text-slate-700">Afternoon (2:00 PM)</span>
                  </div>
                  <div class="flex justify-between">
                    <span class="text-slate-400">Food Intake</span>
                    <span class="font-medium text-slate-700">Before food</span>
                  </div>
                </div>
              </div>
              <div class="mt-5 border-t border-slate-50 pt-4 flex items-center justify-between text-[11px] text-slate-400">
                <span>Jun 01 — Jun 08</span>
                <span class="text-red-600 font-semibold uppercase tracking-wider text-[9px]">2 days left</span>
              </div>
            </div>

            <!-- Card 3: Vitamin D3 -->
            <div id="card-vitd3" class="reveal rounded-sm border border-slate-100 bg-white p-5 shadow-sm hover:border-slate-200 transition-colors flex flex-col justify-between">
              <div>
                <div class="flex items-start justify-between gap-2">
                  <div class="w-8 h-8 rounded-sm bg-amber-50 border border-amber-100 flex items-center justify-center">
                    <i class="fa-solid fa-tablets text-amber-600 text-sm"></i>
                  </div>
                  <span id="badge-vitd3" class="inline-flex items-center gap-1.5 rounded-full border border-slate-100 bg-slate-50 px-2.5 py-0.5 text-[10px] font-semibold text-slate-500">
                    <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Pending
                  </span>
                </div>
                <h3 class="mt-4 text-base font-semibold text-slate-900">Vitamin D3</h3>
                <p class="text-xs text-slate-400 mt-1">Daily dietary supplement</p>
                
                <div class="mt-4 space-y-2 border-t border-slate-50 pt-4 text-xs">
                  <div class="flex justify-between">
                    <span class="text-slate-400">Dosage</span>
                    <span class="font-medium text-slate-700">1 tablet</span>
                  </div>
                  <div class="flex justify-between">
                    <span class="text-slate-400">Timing</span>
                    <span class="font-medium text-slate-700">Evening (7:00 PM)</span>
                  </div>
                  <div class="flex justify-between">
                    <span class="text-slate-400">Food Intake</span>
                    <span class="font-medium text-slate-700">After food</span>
                  </div>
                </div>
              </div>
              <div class="mt-5 border-t border-slate-50 pt-4 flex items-center justify-between text-[11px] text-slate-400">
                <span>Ongoing</span>
                <span class="text-slate-500 font-semibold uppercase tracking-wider text-[9px]">Routine</span>
              </div>
            </div>

            <!-- Card 4: Metformin -->
            <div class="reveal rounded-sm border border-slate-100 bg-white p-5 shadow-sm hover:border-slate-200 transition-colors flex flex-col justify-between">
              <div>
                <div class="flex items-start justify-between gap-2">
                  <div class="w-8 h-8 rounded-sm bg-emerald-50 border border-emerald-100 flex items-center justify-center">
                    <i class="fa-solid fa-prescription-bottle text-emerald-600 text-sm"></i>
                  </div>
                  <span class="inline-flex items-center gap-1.5 rounded-full border border-slate-100 bg-slate-50 px-2.5 py-0.5 text-[10px] font-semibold text-slate-500">
                    <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Pending
                  </span>
                </div>
                <h3 class="mt-4 text-base font-semibold text-slate-900">Metformin 850mg</h3>
                <p class="text-xs text-slate-400 mt-1">Blood sugar control</p>
                
                <div class="mt-4 space-y-2 border-t border-slate-50 pt-4 text-xs">
                  <div class="flex justify-between">
                    <span class="text-slate-400">Dosage</span>
                    <span class="font-medium text-slate-700">1 tablet</span>
                  </div>
                  <div class="flex justify-between">
                    <span class="text-slate-400">Timing</span>
                    <span class="font-medium text-slate-700">Night (9:00 PM)</span>
                  </div>
                  <div class="flex justify-between">
                    <span class="text-slate-400">Food Intake</span>
                    <span class="font-medium text-slate-700">During/After food</span>
                  </div>
                </div>
              </div>
              <div class="mt-5 border-t border-slate-50 pt-4 flex items-center justify-between text-[11px] text-slate-400">
                <span>Ongoing</span>
                <span class="text-slate-500 font-semibold uppercase tracking-wider text-[9px]">Routine</span>
              </div>
            </div>
          </div>
        </section>

        <!-- 3. Today's Medication Schedule Section -->
        <section class="reveal bg-white border border-slate-100 rounded-sm p-5 sm:p-6 shadow-sm">
          <div class="flex items-center justify-between gap-3 mb-5">
            <h3 class="text-lg font-semibold text-slate-900 flex items-center gap-2">
              <i class="fa-solid fa-list-check text-emerald-500 text-sm"></i> Today's Medication Schedule
            </h3>
            <span class="text-xs text-slate-400 font-medium">Daily Tracker</span>
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
                <!-- Paracetamol -->
                <tr class="hover:bg-slate-50/50 transition-colors">
                  <td class="py-4 pr-2">
                    <div class="font-semibold text-slate-900">Paracetamol 500mg</div>
                  </td>
                  <td class="py-4 px-2 text-slate-600">8:00 AM</td>
                  <td class="py-4 px-2 text-slate-600">1 tablet</td>
                  <td class="py-4 px-2">
                    <span class="inline-block px-2 py-0.5 text-xs rounded-sm bg-emerald-50 border border-emerald-100 text-emerald-700 font-medium">After food</span>
                  </td>
                  <td class="py-4 px-2">
                    <span class="inline-flex items-center gap-1.5 text-emerald-600 font-semibold text-xs">
                      <i class="fa-solid fa-circle-check text-emerald-500 text-[10px]"></i> Taken
                    </span>
                  </td>
                  <td class="py-4 pl-2 text-right">
                    <span class="text-xs text-slate-400 italic">Logged 9:00 AM</span>
                  </td>
                </tr>

                <!-- Amoxicillin -->
                <tr id="row-amox" class="hover:bg-slate-50/50 transition-colors">
                  <td class="py-4 pr-2">
                    <div class="font-semibold text-slate-900">Amoxicillin 250mg</div>
                  </td>
                  <td class="py-4 px-2 text-slate-600">2:00 PM</td>
                  <td class="py-4 px-2 text-slate-600">1 capsule</td>
                  <td class="py-4 px-2">
                    <span class="inline-block px-2 py-0.5 text-xs rounded-sm bg-slate-50 border border-slate-200 text-slate-600 font-medium">Before food</span>
                  </td>
                  <td id="status-cell-amox" class="py-4 px-2">
                    <span class="inline-flex items-center gap-1.5 text-red-600 font-semibold text-xs">
                      <i class="fa-solid fa-circle-xmark text-red-500 text-[10px]"></i> Not taken
                    </span>
                  </td>
                  <td id="action-cell-amox" class="py-4 pl-2 text-right">
                    <button onclick="logMedicineTaken('Amoxicillin 250mg', 'Afternoon', '2:00 PM')" class="inline-flex items-center justify-center rounded-sm bg-emerald-500 hover:bg-emerald-600 px-2.5 py-1 text-white text-xs font-semibold transition-colors">
                      Mark as Taken
                    </button>
                  </td>
                </tr>

                <!-- Vitamin D3 -->
                <tr id="row-vitd3" class="hover:bg-slate-50/50 transition-colors">
                  <td class="py-4 pr-2">
                    <div class="font-semibold text-slate-900">Vitamin D3</div>
                  </td>
                  <td class="py-4 px-2 text-slate-600">7:00 PM</td>
                  <td class="py-4 px-2 text-slate-600">1 tablet</td>
                  <td class="py-4 px-2">
                    <span class="inline-block px-2 py-0.5 text-xs rounded-sm bg-emerald-50 border border-emerald-100 text-emerald-700 font-medium">After food</span>
                  </td>
                  <td id="status-cell-vitd3" class="py-4 px-2">
                    <span class="inline-flex items-center gap-1.5 text-slate-400 font-medium text-xs">
                      <i class="fa-regular fa-clock text-slate-400 text-[10px]"></i> Pending
                    </span>
                  </td>
                  <td id="action-cell-vitd3" class="py-4 pl-2 text-right">
                    <button onclick="logMedicineTaken('Vitamin D3', 'Evening', '7:00 PM')" class="inline-flex items-center justify-center rounded-sm bg-slate-900 hover:bg-slate-800 px-2.5 py-1 text-white text-xs font-semibold transition-colors">
                      Log Intake
                    </button>
                  </td>
                </tr>

                <!-- Metformin -->
                <tr class="hover:bg-slate-50/50 transition-colors">
                  <td class="py-4 pr-2">
                    <div class="font-semibold text-slate-900">Metformin 850mg</div>
                  </td>
                  <td class="py-4 px-2 text-slate-600">9:00 PM</td>
                  <td class="py-4 px-2 text-slate-600">1 tablet</td>
                  <td class="py-4 px-2">
                    <span class="inline-block px-2 py-0.5 text-xs rounded-sm bg-emerald-50 border border-emerald-100 text-emerald-700 font-medium">After food</span>
                  </td>
                  <td class="py-4 px-2">
                    <span class="inline-flex items-center gap-1.5 text-slate-400 font-medium text-xs">
                      <i class="fa-regular fa-clock text-slate-400 text-[10px]"></i> Pending
                    </span>
                  </td>
                  <td class="py-4 pl-2 text-right">
                    <button class="inline-flex items-center justify-center rounded-sm bg-slate-900 hover:bg-slate-800 px-2.5 py-1 text-white text-xs font-semibold transition-colors">
                      Log Intake
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </section>

        <!-- 5. Doctor Instructions Section -->
        <section class="reveal bg-white border border-slate-100 rounded-sm p-5 sm:p-6 shadow-sm">
          <h3 class="text-lg font-semibold text-slate-900 flex items-center gap-2 mb-5">
            <i class="fa-solid fa-user-doctor text-emerald-500 text-sm"></i> Doctor's Instructions
          </h3>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-xs sm:text-sm">
            <div class="p-4 border border-slate-50 bg-slate-50/50 rounded-sm">
              <div class="font-semibold text-slate-900 flex items-center gap-2">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Paracetamol 500mg
              </div>
              <p class="text-slate-600 mt-2 italic">“Take after food with water. Do not exceed 4 tablets in 24 hours.”</p>
            </div>
            <div class="p-4 border border-slate-50 bg-slate-50/50 rounded-sm">
              <div class="font-semibold text-slate-900 flex items-center gap-2">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Amoxicillin 250mg
              </div>
              <p class="text-slate-600 mt-2 italic">“Complete full antibiotic course even if symptoms disappear.”</p>
            </div>
            <div class="p-4 border border-slate-50 bg-slate-50/50 rounded-sm">
              <div class="font-semibold text-slate-900 flex items-center gap-2">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Vitamin D3
              </div>
              <p class="text-slate-600 mt-2 italic">“Take in evening with meal containing healthy fats for best absorption.”</p>
            </div>
            <div class="p-4 border border-slate-50 bg-slate-50/50 rounded-sm">
              <div class="font-semibold text-slate-900 flex items-center gap-2">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Metformin 850mg
              </div>
              <p class="text-slate-600 mt-2 italic">“Avoid excessive sugar intake immediately after taking this dose.”</p>
            </div>
          </div>
        </section>

      </div>

      <!-- Right 1/3 Sidebar Content -->
      <div class="space-y-6 lg:space-y-8">
        
        <!-- 4. Next Dose Section -->
        <section class="reveal bg-white border border-slate-100 rounded-sm p-5 sm:p-6 shadow-sm">
          <div class="flex items-center justify-between gap-3 mb-5">
            <h3 class="text-lg font-semibold text-slate-900 flex items-center gap-2">
              <i class="fa-regular fa-clock text-emerald-500 text-sm"></i> Upcoming Schedulers
            </h3>
            <span class="text-xs text-slate-400 font-medium">Timeline alert</span>
          </div>

          <div class="space-y-3">
            <!-- Overdue Item -->
            <div id="side-amox" class="rounded-sm border border-red-100 bg-red-50/30 p-4">
              <div class="flex items-start justify-between">
                <div>
                  <span class="inline-flex items-center gap-1 rounded-sm bg-red-100 px-2 py-0.5 text-[9px] font-bold uppercase tracking-wider text-red-700">
                    Overdue
                  </span>
                  <h4 class="mt-2 text-sm font-semibold text-slate-900">Amoxicillin 250mg</h4>
                  <p class="text-xs text-slate-500 mt-0.5">Scheduled for 2:00 PM</p>
                </div>
                <div class="text-right">
                  <span class="text-xs font-bold text-red-600">30m late</span>
                </div>
              </div>
            </div>

            <!-- Paracetamol Next -->
            <div class="rounded-sm border border-slate-100 bg-slate-50/50 p-4">
              <div class="flex items-start justify-between">
                <div>
                  <span class="inline-flex items-center gap-1 rounded-sm bg-slate-100 px-2 py-0.5 text-[9px] font-bold uppercase tracking-wider text-slate-500">
                    Next Dose
                  </span>
                  <h4 class="mt-2 text-sm font-semibold text-slate-900">Paracetamol 500mg</h4>
                  <p class="text-xs text-slate-500 mt-0.5">Scheduled for 8:00 PM</p>
                </div>
                <div class="text-right">
                  <span id="countdown-para" class="text-xs font-semibold text-emerald-600">Calculating...</span>
                </div>
              </div>
            </div>

            <!-- Metformin Next -->
            <div class="rounded-sm border border-slate-100 bg-slate-50/50 p-4">
              <div class="flex items-start justify-between">
                <div>
                  <span class="inline-flex items-center gap-1 rounded-sm bg-slate-100 px-2 py-0.5 text-[9px] font-bold uppercase tracking-wider text-slate-500">
                    Night Dose
                  </span>
                  <h4 class="mt-2 text-sm font-semibold text-slate-900">Metformin 850mg</h4>
                  <p class="text-xs text-slate-500 mt-0.5">Scheduled for 9:00 PM</p>
                </div>
                <div class="text-right">
                  <span class="text-xs font-medium text-slate-400">9:00 PM today</span>
                </div>
              </div>
            </div>
          </div>
        </section>

        <!-- 7. Medicine History (Timeline) -->
        <section class="reveal bg-white border border-slate-100 rounded-sm p-5 sm:p-6 shadow-sm">
          <div class="flex items-center justify-between gap-3 mb-5">
            <h3 class="text-lg font-semibold text-slate-900 flex items-center gap-2">
              <i class="fa-solid fa-history text-emerald-500 text-sm"></i> Compliance History
            </h3>
            <span class="text-xs text-slate-400 font-medium">Last 48 hours</span>
          </div>

          <div class="space-y-6">
            <!-- Today's timeline -->
            <div>
              <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-semibold uppercase tracking-wider text-slate-400">Today</span>
                <span id="compliance-pct" class="text-[10px] text-emerald-600 font-semibold bg-emerald-50 border border-emerald-100 px-2 py-0.5 rounded-full">33% Compliance</span>
              </div>
              <div class="relative border-l border-slate-100 pl-4 ml-2 space-y-4">
                <div class="relative">
                  <div class="absolute -left-[21px] top-1 w-2.5 h-2.5 rounded-full bg-emerald-500 border-2 border-white ring-4 ring-emerald-50"></div>
                  <div class="text-xs font-semibold text-slate-900">Morning (8:00 AM)</div>
                  <div class="text-xs text-slate-500 mt-0.5">Paracetamol 500mg — <span class="text-emerald-600 font-semibold"><i class="fa-solid fa-circle-check text-emerald-500 text-[10px]"></i> Taken</span></div>
                </div>
                <div class="relative">
                  <div id="timeline-indicator-amox" class="absolute -left-[21px] top-1 w-2.5 h-2.5 rounded-full bg-red-500 border-2 border-white ring-4 ring-red-50"></div>
                  <div class="text-xs font-semibold text-slate-900">Afternoon (2:00 PM)</div>
                  <div id="timeline-text-amox" class="text-xs text-slate-500 mt-0.5">Amoxicillin 250mg — <span class="text-red-600 font-semibold"><i class="fa-solid fa-circle-xmark text-red-500 text-[10px]"></i> Not taken</span></div>
                </div>
                <div class="relative">
                  <div id="timeline-indicator-vitd3" class="absolute -left-[21px] top-1 w-2.5 h-2.5 rounded-full bg-slate-300 border-2 border-white ring-4 ring-slate-100"></div>
                  <div class="text-xs font-semibold text-slate-900">Evening (7:00 PM)</div>
                  <div id="timeline-text-vitd3" class="text-xs text-slate-500 mt-0.5">Vitamin D3 — <span class="text-slate-500 font-semibold"><i class="fa-regular fa-clock text-slate-400 text-[10px]"></i> Pending</span></div>
                </div>
              </div>
            </div>

            <!-- Yesterday's timeline -->
            <div class="pt-2 border-t border-slate-50">
              <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-semibold uppercase tracking-wider text-slate-400">Yesterday</span>
                <span class="text-[10px] text-emerald-600 font-semibold bg-emerald-50 border border-emerald-100 px-2 py-0.5 rounded-full">100% Completed</span>
              </div>
              <div class="relative border-l border-slate-100 pl-4 ml-2">
                <div class="relative">
                  <div class="absolute -left-[21px] top-1 w-2.5 h-2.5 rounded-full bg-emerald-500 border-2 border-white ring-4 ring-emerald-50"></div>
                  <div class="text-xs font-semibold text-slate-900">All Medications Completed</div>
                  <div class="text-xs text-slate-500 mt-0.5">Logged 100% compliance for all 4 active medications.</div>
                </div>
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
    // Live countdown calculation for next dose
    function startNextDoseCountdown() {
      const countdownEl = document.getElementById('countdown-para');
      if (!countdownEl) return;

      function updateTimer() {
        const now = new Date();
        const target = new Date();
        target.setHours(20, 0, 0, 0); // 8:00 PM today

        // If 8:00 PM has already passed, schedule for tomorrow
        if (now > target) {
          target.setDate(target.getDate() + 1);
        }

        const diffMs = target - now;
        const diffHrs = Math.floor(diffMs / (1000 * 60 * 60));
        const diffMins = Math.floor((diffMs % (1000 * 60 * 60)) / (1000 * 60));
        const diffSecs = Math.floor((diffMs % (1000 * 60)) / 1000);

        countdownEl.innerText = `in ${diffHrs}h ${diffMins}m ${diffSecs}s`;
      }

      updateTimer();
      setInterval(updateTimer, 1000);
    }

    // Client-side simulation of logging medicine
    function logMedicineTaken(name, shift, timeSlot) {
      // 1. Update Table Row and cell status
      if (name === 'Amoxicillin 250mg') {
        const statusCell = document.getElementById('status-cell-amox');
        const actionCell = document.getElementById('action-cell-amox');
        const cardBadge = document.getElementById('badge-amox');
        const sideAmox = document.getElementById('side-amox');
        const timelineIndicator = document.getElementById('timeline-indicator-amox');
        const timelineText = document.getElementById('timeline-text-amox');

        if (statusCell) {
          statusCell.innerHTML = '<span class="inline-flex items-center gap-1.5 text-emerald-600 font-semibold text-xs"><i class="fa-solid fa-circle-check text-emerald-500 text-[10px]"></i> Taken</span>';
        }
        if (actionCell) {
          actionCell.innerHTML = `<span class="text-xs text-slate-400 italic">Logged at ${new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })}</span>`;
        }
        if (cardBadge) {
          cardBadge.className = 'inline-flex items-center gap-1.5 rounded-full border border-emerald-100 bg-emerald-50/50 px-2.5 py-0.5 text-[10px] font-semibold text-emerald-700';
          cardBadge.innerHTML = '<span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Taken';
        }
        if (sideAmox) {
          sideAmox.className = 'rounded-sm border border-slate-100 bg-slate-50/50 p-4 transition-all opacity-60';
          const badge = sideAmox.querySelector('span');
          if (badge) {
            badge.className = 'inline-flex items-center gap-1 rounded-sm bg-slate-100 px-2 py-0.5 text-[9px] font-bold uppercase tracking-wider text-slate-500';
            badge.innerText = 'Completed';
          }
          const timeText = sideAmox.querySelector('.text-red-600');
          if (timeText) {
            timeText.className = 'text-xs font-semibold text-slate-400';
            timeText.innerText = 'Logged late';
          }
        }
        if (timelineIndicator) {
          timelineIndicator.className = 'absolute -left-[21px] top-1 w-2.5 h-2.5 rounded-full bg-emerald-500 border-2 border-white ring-4 ring-emerald-50';
        }
        if (timelineText) {
          timelineText.innerHTML = 'Amoxicillin 250mg — <span class="text-emerald-600 font-semibold"><i class="fa-solid fa-circle-check text-emerald-500 text-[10px]"></i> Taken</span>';
        }

        // Hide Amoxicillin item from missed alerts
        const alertRow = document.getElementById('alert-amox');
        if (alertRow) {
          alertRow.innerHTML = '<span class="font-medium text-emerald-700 flex items-center gap-1.5"><i class="fa-solid fa-circle-check text-emerald-500 text-xs"></i> Amoxicillin logged successfully.</span>';
          setTimeout(() => {
            alertRow.remove();
            // Check if there are other alerts remaining, if not hide the main alert box
            const missedDoseBlock = document.getElementById('missed-dose-alert');
            if (missedDoseBlock && !missedDoseBlock.querySelector('.text-rose-700')) {
              missedDoseBlock.style.display = 'none';
            }
          }, 3000);
        }

        // Update active overdue badge at the top
        const overdueBadge = document.getElementById('badge-overdue');
        if (overdueBadge) {
          overdueBadge.className = 'inline-flex items-center gap-1.5 rounded-full border border-slate-200 bg-slate-50 px-3 py-1 text-xs font-semibold text-slate-600';
          overdueBadge.innerHTML = '<span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> 0 Overdue Doses';
        }

        // Recalculate Compliance
        updateCompliancePercentage(2); // 2 taken of 3 due

      } else if (name === 'Vitamin D3') {
        const statusCell = document.getElementById('status-cell-vitd3');
        const actionCell = document.getElementById('action-cell-vitd3');
        const cardBadge = document.getElementById('badge-vitd3');
        const timelineIndicator = document.getElementById('timeline-indicator-vitd3');
        const timelineText = document.getElementById('timeline-text-vitd3');

        if (statusCell) {
          statusCell.innerHTML = '<span class="inline-flex items-center gap-1.5 text-emerald-600 font-semibold text-xs"><i class="fa-solid fa-circle-check text-emerald-500 text-[10px]"></i> Taken</span>';
        }
        if (actionCell) {
          actionCell.innerHTML = `<span class="text-xs text-slate-400 italic">Logged at ${new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })}</span>`;
        }
        if (cardBadge) {
          cardBadge.className = 'inline-flex items-center gap-1.5 rounded-full border border-emerald-100 bg-emerald-50/50 px-2.5 py-0.5 text-[10px] font-semibold text-emerald-700';
          cardBadge.innerHTML = '<span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Taken';
        }
        if (timelineIndicator) {
          timelineIndicator.className = 'absolute -left-[21px] top-1 w-2.5 h-2.5 rounded-full bg-emerald-500 border-2 border-white ring-4 ring-emerald-50';
        }
        if (timelineText) {
          timelineText.innerHTML = 'Vitamin D3 — <span class="text-emerald-600 font-semibold"><i class="fa-solid fa-circle-check text-emerald-500 text-[10px]"></i> Taken</span>';
        }

        // Recalculate Compliance
        updateCompliancePercentage(3); // 3 taken of 3 due
      }
    }

    function updateCompliancePercentage(completedCount) {
      const complianceEl = document.getElementById('compliance-pct');
      if (complianceEl) {
        if (completedCount === 2) {
          complianceEl.innerText = '66% Compliance';
          complianceEl.className = 'text-[10px] text-amber-600 font-semibold bg-amber-50 border border-amber-100 px-2 py-0.5 rounded-full';
        } else if (completedCount === 3) {
          complianceEl.innerText = '100% Completed';
          complianceEl.className = 'text-[10px] text-emerald-600 font-semibold bg-emerald-50 border border-emerald-100 px-2 py-0.5 rounded-full';
        }
      }
    }

    document.addEventListener('DOMContentLoaded', () => {
      startNextDoseCountdown();
    });
  </script>
@endpush
