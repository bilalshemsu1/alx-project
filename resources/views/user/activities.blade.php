@extends('layouts.user')

@section('title', 'Activities - VitaTrack')
@section('page-title', 'Activities')

@section('content')
  <div class="mx-auto space-y-6 sm:space-y-8">
    <!-- 1. Page Header Section -->
    <div class="reveal rounded-sm border border-slate-100 bg-white p-5 sm:p-6 shadow-sm">
      <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
          <h1 class="text-2xl font-semibold tracking-tight text-slate-900">Activities</h1>
          <p class="mt-1 text-sm text-slate-500 font-light">Track your daily health activities and recovery tasks</p>
        </div>
        <div>
          <span class="inline-flex items-center gap-1.5 rounded-full border border-emerald-200 bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-800">
            <i class="fa-solid fa-check text-[10px]"></i> Active Program
          </span>
        </div>
      </div>
    </div>

    <!-- 8. Missed or Unverified Activities Alerts Section -->
    <div id="activities-alerts-box" class="reveal rounded-sm border border-amber-200 bg-amber-50/40 p-4 sm:p-5">
      <div class="flex items-start gap-3">
        <span class="text-amber-600 text-base flex-shrink-0 mt-0.5"><i class="fa-solid fa-triangle-exclamation"></i></span>
        <div class="flex-1 min-w-0">
          <h4 class="text-sm font-semibold text-amber-800">Activity Warnings</h4>
          <div class="mt-3 space-y-3">
            <div id="alert-walk" class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 text-xs text-amber-700">
              <span class="font-medium flex items-center gap-1.5">
                <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                Missing proof upload for the Walk 30 minutes activity scheduled at 9:00 AM.
              </span>
              <button onclick="openProofModal('walk')" class="self-start sm:self-auto inline-flex items-center justify-center rounded-sm bg-amber-600 hover:bg-amber-700 px-3 py-1.5 text-white font-medium transition-colors">
                Provide Proof
              </button>
            </div>
            <div class="h-px bg-amber-100"></div>
            <div class="text-xs text-amber-600 flex items-center gap-1.5">
              <span><i class="fa-solid fa-info-circle"></i></span>
              <span>Exercise validation is pending doctor review for yesterday's light stretching routine.</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- 5. Streaks & 7. Health Impact Summary Grid -->
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6">
      <!-- Activity Streaks -->
      <div class="reveal rounded-sm border border-slate-100 bg-white p-5 shadow-sm">
        <div class="text-xs font-semibold uppercase tracking-wider text-slate-400">Current Streak</div>
        <div class="mt-2 text-3xl font-semibold text-slate-900">12 Days</div>
        <div class="mt-2 text-xs text-slate-500">Consistent completion</div>
      </div>

      <div class="reveal rounded-sm border border-slate-100 bg-white p-5 shadow-sm">
        <div class="text-xs font-semibold uppercase tracking-wider text-slate-400">Best Streak</div>
        <div class="mt-2 text-3xl font-semibold text-slate-900">24 Days</div>
        <div class="mt-2 text-xs text-slate-500">All-time record</div>
      </div>

      <div class="reveal rounded-sm border border-slate-100 bg-white p-5 shadow-sm">
        <div class="text-xs font-semibold uppercase tracking-wider text-slate-400">Weekly Consistency</div>
        <div id="stats-consistency" class="mt-2 text-3xl font-semibold text-emerald-600">85%</div>
        <div class="mt-2 text-xs text-slate-500">Target compliance rate</div>
      </div>

      <!-- Health Impact -->
      <div class="reveal rounded-sm border border-slate-100 bg-white p-5 shadow-sm">
        <div class="text-xs font-semibold uppercase tracking-wider text-slate-400">Activity Level</div>
        <div class="mt-2 text-3xl font-semibold text-slate-900">Good</div>
        <div class="mt-2 text-xs text-emerald-600 font-medium">Within healthy limits</div>
      </div>

      <div class="reveal rounded-sm border border-slate-100 bg-white p-5 shadow-sm">
        <div class="text-xs font-semibold uppercase tracking-wider text-slate-400">Recovery Progress</div>
        <div class="mt-2 text-3xl font-semibold text-slate-900">Improving</div>
        <div class="mt-2 text-xs text-slate-500">Muscle tone normal</div>
      </div>

      <div class="reveal rounded-sm border border-slate-100 bg-white p-5 shadow-sm">
        <div class="text-xs font-semibold uppercase tracking-wider text-slate-400">Health Risk Level</div>
        <div class="mt-2 text-3xl font-semibold text-emerald-600">Low</div>
        <div class="mt-2 text-xs text-slate-500">Based on logs</div>
      </div>
    </div>

    <!-- Main Section Grid -->
    <div class="grid grid-cols-1 gap-6 xl:grid-cols-3">
      
      <!-- Left 2/3 Content: Today's Activities & Weekly logs -->
      <div class="xl:col-span-2 space-y-6 lg:space-y-8">
        
        <!-- 2. TODAY’S ACTIVITIES -->
        <section class="space-y-4">
          <div class="flex items-center justify-between">
            <h2 class="text-lg font-semibold text-slate-900">Today's Activities</h2>
            <span class="text-xs text-slate-400">Required checklist</span>
          </div>

          <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <!-- Card 1: Walk 30 minutes -->
            <div id="card-walk" class="reveal rounded-sm border border-slate-100 bg-white p-5 shadow-sm flex flex-col justify-between hover:border-slate-200 transition-colors">
              <div>
                <div class="flex items-start justify-between gap-2">
                  <div class="w-8 h-8 rounded-sm bg-amber-50 border border-amber-100 flex items-center justify-center">
                    <i class="fa-solid fa-person-walking text-amber-600 text-sm"></i>
                  </div>
                  <span id="badge-walk" class="inline-flex items-center gap-1.5 rounded-full border border-slate-100 bg-slate-50 px-2.5 py-0.5 text-[10px] font-semibold text-slate-500">
                    <i class="fa-solid fa-clock text-[8px]"></i> Pending
                  </span>
                </div>
                <h3 class="mt-4 text-base font-semibold text-slate-900">Walk 30 minutes</h3>
                <p class="text-xs text-slate-400 mt-1">Aerobic stamina & vascular recovery</p>
                
                <div class="mt-4 space-y-2 border-t border-slate-50 pt-4 text-xs">
                  <div class="flex justify-between">
                    <span class="text-slate-400">Duration</span>
                    <span class="font-medium text-slate-700">30 minutes</span>
                  </div>
                  <div class="flex justify-between">
                    <span class="text-slate-400">Assigned Time</span>
                    <span class="font-medium text-slate-700">9:00 AM</span>
                  </div>
                  <div class="flex justify-between">
                    <span class="text-slate-400">Validation Mode</span>
                    <span class="font-semibold text-amber-700">Proof Required</span>
                  </div>
                </div>
              </div>
              
              <div id="actions-walk" class="mt-5 border-t border-slate-50 pt-4 flex gap-2">
                <button onclick="openProofModal('walk')" class="w-full inline-flex items-center justify-center gap-1.5 rounded-sm bg-amber-500 hover:bg-amber-600 py-1.5 text-white text-xs font-semibold transition-colors">
                  <i class="fa-solid fa-camera"></i> I did this exercise
                </button>
              </div>
            </div>

            <!-- Card 2: Drink 2L water -->
            <div id="card-water" class="reveal rounded-sm border border-slate-100 bg-white p-5 shadow-sm flex flex-col justify-between hover:border-slate-200 transition-colors">
              <div>
                <div class="flex items-start justify-between gap-2">
                  <div class="w-8 h-8 rounded-sm bg-emerald-50 border border-emerald-100 flex items-center justify-center">
                    <i class="fa-solid fa-glass-water text-emerald-600 text-sm"></i>
                  </div>
                  <span id="badge-water" class="inline-flex items-center gap-1.5 rounded-full border border-emerald-100 bg-emerald-50 px-2.5 py-0.5 text-[10px] font-semibold text-emerald-700">
                    <i class="fa-solid fa-check text-[8px]"></i> Completed
                  </span>
                </div>
                <h3 class="mt-4 text-base font-semibold text-slate-900">Drink 2L water</h3>
                <p class="text-xs text-slate-400 mt-1">Systemic hydration and electrolyte balance</p>
                
                <div class="mt-4 space-y-2 border-t border-slate-50 pt-4 text-xs">
                  <div class="flex justify-between">
                    <span class="text-slate-400">Target</span>
                    <span class="font-medium text-slate-700">2.0 Liters</span>
                  </div>
                  <div class="flex justify-between">
                    <span class="text-slate-400">Schedule</span>
                    <span class="font-medium text-slate-700">Ongoing (Daily)</span>
                  </div>
                  <div class="flex justify-between">
                    <span class="text-slate-400">Validation Mode</span>
                    <span class="font-medium text-slate-700">Self Tracked</span>
                  </div>
                </div>
              </div>
              <div id="actions-water" class="mt-5 border-t border-slate-50 pt-4 text-xs text-slate-400 italic">
                Logged completed
              </div>
            </div>

            <!-- Card 3: Light stretching -->
            <div id="card-stretch" class="reveal rounded-sm border border-slate-100 bg-white p-5 shadow-sm flex flex-col justify-between hover:border-slate-200 transition-colors">
              <div>
                <div class="flex items-start justify-between gap-2">
                  <div class="w-8 h-8 rounded-sm bg-slate-50 border border-slate-200 flex items-center justify-center">
                    <i class="fa-solid fa-dumbbell text-slate-500 text-sm"></i>
                  </div>
                  <span id="badge-stretch" class="inline-flex items-center gap-1.5 rounded-full border border-slate-100 bg-slate-50 px-2.5 py-0.5 text-[10px] font-semibold text-slate-500">
                    <i class="fa-solid fa-clock text-[8px]"></i> Pending
                  </span>
                </div>
                <h3 class="mt-4 text-base font-semibold text-slate-900">Light stretching</h3>
                <p class="text-xs text-slate-400 mt-1">Joint mobility & muscle decompression</p>
                
                <div class="mt-4 space-y-2 border-t border-slate-50 pt-4 text-xs">
                  <div class="flex justify-between">
                    <span class="text-slate-400">Duration</span>
                    <span class="font-medium text-slate-700">15 minutes</span>
                  </div>
                  <div class="flex justify-between">
                    <span class="text-slate-400">Assigned Time</span>
                    <span class="font-medium text-slate-700">4:00 PM</span>
                  </div>
                  <div class="flex justify-between">
                    <span class="text-slate-400">Validation Mode</span>
                    <span class="font-semibold text-amber-700">Proof Required</span>
                  </div>
                </div>
              </div>
              
              <div id="actions-stretch" class="mt-5 border-t border-slate-50 pt-4 flex gap-2">
                <button onclick="openProofModal('stretch')" class="w-full inline-flex items-center justify-center gap-1.5 rounded-sm bg-amber-500 hover:bg-amber-600 py-1.5 text-white text-xs font-semibold transition-colors">
                  <i class="fa-solid fa-camera"></i> I did this exercise
                </button>
              </div>
            </div>

            <!-- Card 4: Breathing exercises -->
            <div id="card-breathing" class="reveal rounded-sm border border-slate-100 bg-white p-5 shadow-sm flex flex-col justify-between hover:border-slate-200 transition-colors">
              <div>
                <div class="flex items-start justify-between gap-2">
                  <div class="w-8 h-8 rounded-sm bg-slate-50 border border-slate-200 flex items-center justify-center">
                    <i class="fa-solid fa-lungs text-slate-500 text-sm"></i>
                  </div>
                  <span id="badge-breathing" class="inline-flex items-center gap-1.5 rounded-full border border-slate-100 bg-slate-50 px-2.5 py-0.5 text-[10px] font-semibold text-slate-500">
                    <i class="fa-solid fa-clock text-[8px]"></i> Pending
                  </span>
                </div>
                <h3 class="mt-4 text-base font-semibold text-slate-900">Breathing exercises</h3>
                <p class="text-xs text-slate-400 mt-1">Deep lung capacity & stress regulation</p>
                
                <div class="mt-4 space-y-2 border-t border-slate-50 pt-4 text-xs">
                  <div class="flex justify-between">
                    <span class="text-slate-400">Duration</span>
                    <span class="font-medium text-slate-700">10 minutes</span>
                  </div>
                  <div class="flex justify-between">
                    <span class="text-slate-400">Assigned Time</span>
                    <span class="font-medium text-slate-700">8:00 PM</span>
                  </div>
                  <div class="flex justify-between">
                    <span class="text-slate-400">Validation Mode</span>
                    <span class="font-medium text-slate-700">Self Tracked</span>
                  </div>
                </div>
              </div>
              
              <div id="actions-breathing" class="mt-5 border-t border-slate-50 pt-4 flex gap-2">
                <button onclick="logSelfTrackedActivity('breathing', 'Completed')" class="flex-1 inline-flex items-center justify-center rounded-sm bg-emerald-500 hover:bg-emerald-600 py-1.5 text-white text-xs font-semibold transition-colors">
                  Complete
                </button>
                <button onclick="logSelfTrackedActivity('breathing', 'Missed')" class="inline-flex items-center justify-center rounded-sm border border-slate-200 bg-white hover:bg-slate-50 px-2 py-1.5 text-slate-600 text-xs font-semibold transition-colors">
                  Miss
                </button>
              </div>
            </div>
          </div>
        </section>

        <!-- 4. WEEKLY ACTIVITY TRACKER -->
        <section class="reveal bg-white border border-slate-100 rounded-sm p-5 sm:p-6 shadow-sm">
          <div class="flex items-center justify-between gap-3 mb-5">
            <h3 class="text-lg font-semibold text-slate-900 flex items-center gap-2">
              <i class="fa-solid fa-calendar text-emerald-500 text-sm"></i> Weekly Activity Tracker
            </h3>
            <span class="text-xs text-slate-400 font-medium">Compliance History</span>
          </div>

          <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-sm">
              <thead>
                <tr class="border-b border-slate-100 text-slate-400 text-xs font-semibold uppercase tracking-wider">
                  <th class="pb-3 pr-2">Day</th>
                  <th class="pb-3 px-2">Activities Completed</th>
                  <th class="pb-3 px-2">Missed Activities</th>
                  <th class="pb-3 px-2">Proofs Submitted</th>
                  <th class="pb-3 pl-2 text-right">Status</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-slate-50 text-slate-700">
                <!-- Today/Monday -->
                <tr class="hover:bg-slate-50/50 transition-colors">
                  <td class="py-4 pr-2 font-semibold text-slate-900 flex items-center gap-1.5">
                    <i class="fa-solid fa-calendar text-slate-400 text-xs"></i> Monday (Today)
                  </td>
                  <td id="table-completed-today" class="py-4 px-2">1/4 completed</td>
                  <td id="table-missed-today" class="py-4 px-2">0 missed</td>
                  <td id="table-proofs-today" class="py-4 px-2">0 proofs</td>
                  <td id="table-status-today" class="py-4 pl-2 text-right">
                    <span class="inline-flex items-center gap-1 text-slate-500 font-medium text-xs">
                      <i class="fa-solid fa-clock text-[10px]"></i> Average
                    </span>
                  </td>
                </tr>

                <!-- Tuesday (Mocked Past Day) -->
                <tr class="hover:bg-slate-50/50 transition-colors bg-slate-50/20">
                  <td class="py-4 pr-2 font-semibold text-slate-500 flex items-center gap-1.5">
                    <i class="fa-solid fa-calendar text-slate-300 text-xs"></i> Sunday
                  </td>
                  <td class="py-4 px-2 text-slate-500">4/5 completed</td>
                  <td class="py-4 px-2 text-slate-500">1 missed</td>
                  <td class="py-4 px-2 text-slate-500">2 proofs</td>
                  <td class="py-4 pl-2 text-right">
                    <span class="inline-flex items-center gap-1 text-emerald-600 font-semibold text-xs">
                      <i class="fa-solid fa-check text-[10px]"></i> Good
                    </span>
                  </td>
                </tr>

                <!-- Wednesday (Mocked Past Day) -->
                <tr class="hover:bg-slate-50/50 transition-colors bg-slate-50/20">
                  <td class="py-4 pr-2 font-semibold text-slate-500 flex items-center gap-1.5">
                    <i class="fa-solid fa-calendar text-slate-300 text-xs"></i> Saturday
                  </td>
                  <td class="py-4 px-2 text-slate-500">3/5 completed</td>
                  <td class="py-4 px-2 text-slate-500">2 missed</td>
                  <td class="py-4 px-2 text-slate-500">1 proof</td>
                  <td class="py-4 pl-2 text-right">
                    <span class="inline-flex items-center gap-1 text-amber-600 font-semibold text-xs">
                      <i class="fa-solid fa-triangle-exclamation text-[10px]"></i> Average
                    </span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </section>

      </div>

      <!-- Right 1/3 Content: Recovery instructions -->
      <div class="space-y-6 lg:space-y-8">
        
        <!-- 6. DOCTOR ASSIGNED TASKS -->
        <section class="reveal bg-white border border-slate-100 rounded-sm p-5 sm:p-6 shadow-sm">
          <div class="flex items-center justify-between gap-3 mb-5">
            <h3 class="text-lg font-semibold text-slate-900 flex items-center gap-2">
              <i class="fa-solid fa-info-circle text-emerald-500 text-sm"></i> Recovery Instructions
            </h3>
            <span class="text-xs text-slate-400 font-medium">Physician orders</span>
          </div>

          <div class="space-y-3 text-sm">
            <div class="flex items-start gap-3 p-3 border border-slate-50 bg-slate-50/30 rounded-sm">
              <span class="text-emerald-500 mt-0.5"><i class="fa-solid fa-info-circle"></i></span>
              <div>
                <div class="font-semibold text-slate-800">Walk Daily 30 Minutes</div>
                <p class="text-xs text-slate-500 mt-0.5">Maintain steady, low-impact stride. Do not run or sprint.</p>
              </div>
            </div>

            <div class="flex items-start gap-3 p-3 border border-slate-50 bg-slate-50/30 rounded-sm">
              <span class="text-emerald-500 mt-0.5"><i class="fa-solid fa-info-circle"></i></span>
              <div>
                <div class="font-semibold text-slate-800">Avoid Heavy Lifting</div>
                <p class="text-xs text-slate-500 mt-0.5">Do not lift objects heavier than 5 kg (11 lbs) to prevent lumbar strain.</p>
              </div>
            </div>

            <div class="flex items-start gap-3 p-3 border border-slate-50 bg-slate-50/30 rounded-sm">
              <span class="text-emerald-500 mt-0.5"><i class="fa-solid fa-info-circle"></i></span>
              <div>
                <div class="font-semibold text-slate-800">Breathing Exercises Twice Daily</div>
                <p class="text-xs text-slate-500 mt-0.5">Perform 10 cycles of slow inhalation, retention, and exhalation morning and evening.</p>
              </div>
            </div>

            <div class="flex items-start gap-3 p-3 border border-slate-50 bg-slate-50/30 rounded-sm">
              <span class="text-emerald-500 mt-0.5"><i class="fa-solid fa-info-circle"></i></span>
              <div>
                <div class="font-semibold text-slate-800">Maintain Hydration</div>
                <p class="text-xs text-slate-500 mt-0.5">Keep fluid intake level high, focusing on mineralized water during walks.</p>
              </div>
            </div>
          </div>
        </section>

      </div>

    </div>
  </div>

  <!-- 3. EXERCISE PROOF UPLOAD MODAL -->
  <div id="proof-modal" class="fixed inset-0 z-[100] hidden flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-[2px]">
    <div class="bg-white border border-slate-200 rounded-sm shadow-xl w-full max-w-md overflow-hidden relative">
      <!-- Modal Header -->
      <div class="h-14 border-b border-slate-100 flex items-center justify-between px-6">
        <h3 class="font-semibold text-slate-900 flex items-center gap-2">
          <i class="fa-solid fa-camera text-emerald-500 text-sm"></i> Upload Exercise Proof
        </h3>
        <button onclick="closeProofModal()" class="text-slate-400 hover:text-slate-600 focus:outline-none">
          <i class="fa-solid fa-xmark text-sm"></i>
        </button>
      </div>
      
      <!-- Modal Body -->
      <div class="p-6 space-y-4">
        <div class="text-xs text-slate-500">
          Upload or snap a photo of yourself executing the physical activity to satisfy the validation requirement.
        </div>
        
        <!-- Preview Container -->
        <div id="preview-container" class="hidden border border-slate-200 bg-slate-50/50 p-2 rounded-sm text-center">
          <img id="image-preview" src="#" alt="Preview" class="max-h-48 mx-auto rounded-sm object-cover" />
        </div>
        
        <!-- Upload drop zone area -->
        <div id="upload-dropzone" class="border-2 border-dashed border-slate-200 bg-slate-50 hover:bg-slate-100/50 p-6 rounded-sm text-center cursor-pointer transition-colors relative">
          <input type="file" id="proof-file-input" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer" onchange="handleFileSelect(event)" />
          <i class="fa-solid fa-upload text-slate-400 text-2xl mb-2"></i>
          <div class="text-xs font-semibold text-slate-700">Choose file or drag here</div>
          <div class="text-[10px] text-slate-400 mt-1">PNG, JPG up to 5MB</div>
        </div>
        
        <!-- Mobile Camera Capture Trigger Option -->
        <div class="flex items-center gap-2 justify-center py-2 text-xs">
          <button onclick="triggerCameraInput()" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-sm border border-slate-200 bg-white hover:bg-slate-50 text-slate-600 transition-colors">
            <i class="fa-solid fa-camera"></i> Use Mobile Camera
          </button>
          <input type="file" id="camera-file-input" accept="image/*" capture="environment" class="hidden" onchange="handleFileSelect(event)" />
        </div>
      </div>
      
      <!-- Modal Footer -->
      <div class="px-6 py-4 border-t border-slate-100 bg-slate-50/50 flex items-center justify-end gap-2">
        <button onclick="closeProofModal()" class="inline-flex items-center justify-center rounded-sm border border-slate-200 bg-white hover:bg-slate-50 px-4 py-2 text-slate-600 text-xs font-semibold transition-colors">
          Cancel
        </button>
        <button id="btn-submit-proof" onclick="submitExerciseProof()" class="inline-flex items-center justify-center rounded-sm bg-emerald-500 hover:bg-emerald-600 px-4 py-2 text-white text-xs font-semibold transition-colors" disabled>
          Upload Proof
        </button>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    // State management tracking
    const todayActivities = {
      walk: { status: 'Pending', proofRequired: true, proofSubmitted: false },
      water: { status: 'Completed', proofRequired: false },
      stretch: { status: 'Pending', proofRequired: true, proofSubmitted: false },
      breathing: { status: 'Pending', proofRequired: false }
    };

    let activeProofTarget = null;

    // Modal Operations
    function openProofModal(targetId) {
      activeProofTarget = targetId;
      const modal = document.getElementById('proof-modal');
      const previewContainer = document.getElementById('preview-container');
      const dropzone = document.getElementById('upload-dropzone');
      const submitBtn = document.getElementById('btn-submit-proof');
      const fileInput = document.getElementById('proof-file-input');
      const camInput = document.getElementById('camera-file-input');

      // Reset Modal values
      if (fileInput) fileInput.value = '';
      if (camInput) camInput.value = '';
      if (previewContainer) previewContainer.classList.add('hidden');
      if (dropzone) dropzone.classList.remove('hidden');
      if (submitBtn) submitBtn.disabled = true;

      if (modal) modal.classList.remove('hidden');
    }

    function closeProofModal() {
      const modal = document.getElementById('proof-modal');
      if (modal) modal.classList.add('hidden');
    }

    function triggerCameraInput() {
      const camInput = document.getElementById('camera-file-input');
      if (camInput) camInput.click();
    }

    function handleFileSelect(event) {
      const file = event.target.files[0];
      if (!file) return;

      const reader = new FileReader();
      reader.onload = function(e) {
        const previewImg = document.getElementById('image-preview');
        const previewContainer = document.getElementById('preview-container');
        const dropzone = document.getElementById('upload-dropzone');
        const submitBtn = document.getElementById('btn-submit-proof');

        if (previewImg) previewImg.src = e.target.result;
        if (previewContainer) previewContainer.classList.remove('hidden');
        if (dropzone) dropzone.classList.add('hidden');
        if (submitBtn) submitBtn.disabled = false;
      };
      reader.readAsDataURL(file);
    }

    function submitExerciseProof() {
      if (!activeProofTarget) return;

      // Update State
      todayActivities[activeProofTarget].status = 'Completed';
      todayActivities[activeProofTarget].proofSubmitted = true;

      // 1. Update Card UI components
      const badge = document.getElementById(`badge-${activeProofTarget}`);
      const actions = document.getElementById(`actions-${activeProofTarget}`);
      const card = document.getElementById(`card-${activeProofTarget}`);

      if (badge) {
        badge.className = 'inline-flex items-center gap-1.5 rounded-full border border-emerald-100 bg-emerald-50 px-2.5 py-0.5 text-[10px] font-semibold text-emerald-700';
        badge.innerHTML = '<i class="fa-solid fa-check text-[8px]"></i> Completed';
      }
      if (actions) {
        actions.innerHTML = '<span class="text-xs text-slate-400 italic">Proof submitted</span>';
      }

      // 2. Hide Alert if matched
      const alertRow = document.getElementById(`alert-${activeProofTarget}`);
      if (alertRow) {
        alertRow.innerHTML = '<span class="font-medium text-emerald-700 flex items-center gap-1.5"><i class="fa-solid fa-check text-xs"></i> Proof uploaded successfully.</span>';
        setTimeout(() => {
          alertRow.remove();
          const alertsBox = document.getElementById('activities-alerts-box');
          if (alertsBox && !alertsBox.querySelector('.text-amber-700')) {
            alertsBox.style.display = 'none';
          }
        }, 2500);
      }

      // 3. Recalculate stats
      updateActivitiesStats();
      closeProofModal();
    }

    function logSelfTrackedActivity(targetId, status) {
      // Update State
      todayActivities[targetId].status = status;

      // 1. Update Card UI components
      const badge = document.getElementById(`badge-${targetId}`);
      const actions = document.getElementById(`actions-${targetId}`);

      if (badge) {
        if (status === 'Completed') {
          badge.className = 'inline-flex items-center gap-1.5 rounded-full border border-emerald-100 bg-emerald-50 px-2.5 py-0.5 text-[10px] font-semibold text-emerald-700';
          badge.innerHTML = '<i class="fa-solid fa-check text-[8px]"></i> Completed';
        } else if (status === 'Missed') {
          badge.className = 'inline-flex items-center gap-1.5 rounded-full border border-red-100 bg-red-50 px-2.5 py-0.5 text-[10px] font-semibold text-red-700';
          badge.innerHTML = '<i class="fa-solid fa-xmark text-[8px]"></i> Missed';
        }
      }

      if (actions) {
        actions.innerHTML = `<span class="text-xs text-slate-400 italic">Logged ${status.toLowerCase()}</span>`;
      }

      // 2. Recalculate stats
      updateActivitiesStats();
    }

    function updateActivitiesStats() {
      let completedCount = 0;
      let missedCount = 0;
      let proofsCount = 0;

      Object.values(todayActivities).forEach(activity => {
        if (activity.status === 'Completed') completedCount++;
        if (activity.status === 'Missed') missedCount++;
        if (activity.proofSubmitted) proofsCount++;
      });

      // Update table log
      const tableCompleted = document.getElementById('table-completed-today');
      const tableMissed = document.getElementById('table-missed-today');
      const tableProofs = document.getElementById('table-proofs-today');
      const tableStatus = document.getElementById('table-status-today');

      if (tableCompleted) tableCompleted.innerText = `${completedCount}/4 completed`;
      if (tableMissed) tableMissed.innerText = `${missedCount} missed`;
      if (tableProofs) tableProofs.innerText = `${proofsCount} proofs`;

      if (tableStatus) {
        if (completedCount >= 3) {
          tableStatus.innerHTML = '<span class="inline-flex items-center gap-1 text-emerald-600 font-semibold text-xs"><i class="fa-solid fa-check text-[10px]"></i> Good</span>';
        } else if (completedCount === 2) {
          tableStatus.innerHTML = '<span class="inline-flex items-center gap-1 text-amber-600 font-semibold text-xs"><i class="fa-solid fa-triangle-exclamation text-[10px]"></i> Average</span>';
        } else {
          tableStatus.innerHTML = '<span class="inline-flex items-center gap-1 text-red-600 font-semibold text-xs"><i class="fa-solid fa-xmark text-[10px]"></i> Poor</span>';
        }
      }

      // Update consistency rate stats badge
      const consistencyEl = document.getElementById('stats-consistency');
      if (consistencyEl) {
        const score = Math.round((completedCount / 4) * 100);
        consistencyEl.innerText = `${score}%`;
        if (score >= 75) {
          consistencyEl.className = 'mt-2 text-3xl font-semibold text-emerald-600';
        } else if (score >= 50) {
          consistencyEl.className = 'mt-2 text-3xl font-semibold text-amber-600';
        } else {
          consistencyEl.className = 'mt-2 text-3xl font-semibold text-red-600';
        }
      }
    }
  </script>
@endpush
