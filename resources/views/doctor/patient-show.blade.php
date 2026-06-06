@extends('layouts.doctor')

@section('title', 'Patient Workspace')
@section('page-title', 'Patient Workspace')

@section('content')
  <div class="mx-auto space-y-6">
    <div class="reveal">
      <div class="flex flex-col gap-4 lg:flex-row lg:items-end lg:justify-between">
        <div>
          <h1 class="text-3xl md:text-4xl font-medium tracking-tight text-slate-900 mb-1">
            John <span class="font-serif italic text-emerald-600">Doe</span>
          </h1>
          <p class="text-slate-500 font-light">Age: 45 | Gender: Male | Condition: Type 2 Diabetes</p>
        </div>
        <div class="flex flex-wrap gap-2">
          <span class="px-2.5 py-1 text-xs font-semibold bg-red-100 text-red-700 rounded-sm">High Risk</span>
          <span class="px-2.5 py-1 text-xs font-semibold bg-slate-100 text-slate-700 rounded-sm">Assigned: Dr. Ahmed</span>
        </div>
      </div>
    </div>

    <div class="reveal grid grid-cols-1 md:grid-cols-5 gap-4">
      <div class="bg-white border border-slate-100 rounded-sm p-4">
        <div class="text-xs text-slate-400 uppercase tracking-wider font-medium">Medicine Adherence</div>
        <div class="text-2xl font-semibold text-slate-900 mt-2">72%</div>
      </div>
      <div class="bg-white border border-slate-100 rounded-sm p-4">
        <div class="text-xs text-slate-400 uppercase tracking-wider font-medium">Meal Adherence</div>
        <div class="text-2xl font-semibold text-slate-900 mt-2">80%</div>
      </div>
      <div class="bg-white border border-slate-100 rounded-sm p-4">
        <div class="text-xs text-slate-400 uppercase tracking-wider font-medium">Activity Completion</div>
        <div class="text-2xl font-semibold text-slate-900 mt-2">65%</div>
      </div>
      <div class="bg-white border border-slate-100 rounded-sm p-4">
        <div class="text-xs text-slate-400 uppercase tracking-wider font-medium">Missed Tasks</div>
        <div class="text-2xl font-semibold text-red-500 mt-2">3</div>
      </div>
      <div class="bg-white border border-slate-100 rounded-sm p-4">
        <div class="text-xs text-slate-400 uppercase tracking-wider font-medium">Next Appointment</div>
        <div class="text-2xl font-semibold text-slate-900 mt-2">2 days</div>
      </div>
    </div>

    <div class="reveal flex flex-wrap gap-2 border-b border-slate-100">
      <button onclick="switchTab('overview')" id="tab-overview" class="tab-btn inline-flex items-center gap-2 px-4 py-2.5 text-xs font-medium text-emerald-700 bg-emerald-50 border-b-2 border-emerald-500">
        <i class="fa-solid fa-house text-[10px]"></i> Overview
      </button>
      <button onclick="switchTab('medicines')" id="tab-medicines" class="tab-btn inline-flex items-center gap-2 px-4 py-2.5 text-xs font-medium text-slate-600 hover:text-slate-900">
        <i class="fa-solid fa-pills text-[10px]"></i> Medicines
      </button>
      <button onclick="switchTab('meals')" id="tab-meals" class="tab-btn inline-flex items-center gap-2 px-4 py-2.5 text-xs font-medium text-slate-600 hover:text-slate-900">
        <i class="fa-solid fa-utensils text-[10px]"></i> Meals
      </button>
      <button onclick="switchTab('activities')" id="tab-activities" class="tab-btn inline-flex items-center gap-2 px-4 py-2.5 text-xs font-medium text-slate-600 hover:text-slate-900">
        <i class="fa-solid fa-person-walking text-[10px]"></i> Activities
      </button>
      <button onclick="switchTab('appointments')" id="tab-appointments" class="tab-btn inline-flex items-center gap-2 px-4 py-2.5 text-xs font-medium text-slate-600 hover:text-slate-900">
        <i class="fa-regular fa-calendar-check text-[10px]"></i> Appointments
      </button>
      <button onclick="switchTab('reports')" id="tab-reports" class="tab-btn inline-flex items-center gap-2 px-4 py-2.5 text-xs font-medium text-slate-600 hover:text-slate-900">
        <i class="fa-solid fa-file-medical text-[10px]"></i> Reports
      </button>
      <button onclick="switchTab('personalization')" id="tab-personalization" class="tab-btn inline-flex items-center gap-2 px-4 py-2.5 text-xs font-medium text-slate-600 hover:text-slate-900">
        <i class="fa-solid fa-brain text-[10px]"></i> Personalization
      </button>
    </div>

    <div id="tab-content-overview" class="tab-content space-y-6 reveal">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white border border-slate-100 rounded-sm p-6">
          <h3 class="text-lg font-semibold text-slate-900 mb-4">Health Status Summary</h3>
          <div class="space-y-3">
            <div class="flex items-center justify-between">
              <span class="text-sm text-slate-600">Current Risk Level</span>
              <span class="px-2.5 py-1 text-xs font-semibold bg-red-100 text-red-700 rounded-sm">High</span>
            </div>
            <div class="h-px bg-slate-100"></div>
            <div class="flex items-center justify-between">
              <span class="text-sm text-slate-600">Blood Sugar Trend</span>
              <span class="text-sm text-red-500 font-semibold">Elevated</span>
            </div>
            <div class="h-px bg-slate-100"></div>
            <div class="flex items-center justify-between">
              <span class="text-sm text-slate-600">Medication Adherence</span>
              <span class="text-sm text-slate-900 font-semibold">72%</span>
            </div>
            <div class="h-px bg-slate-100"></div>
            <div class="flex items-center justify-between">
              <span class="text-sm text-slate-600">Activity Completion</span>
              <span class="text-sm text-amber-600 font-semibold">65%</span>
            </div>
          </div>
        </div>

        <div class="bg-white border border-slate-100 rounded-sm p-6">
          <h3 class="text-lg font-semibold text-slate-900 mb-4">Recent Activity Feed</h3>
          <div class="space-y-4 text-sm">
            <div class="flex items-start justify-between">
              <div>
                <p class="text-slate-800 font-medium">Missed morning medication</p>
                <p class="text-xs text-slate-500 mt-0.5">Metformin 850mg not recorded</p>
              </div>
              <span class="text-xs text-slate-400 whitespace-nowrap ml-4">2h ago</span>
            </div>
            <div class="border-t border-slate-50"></div>
            <div class="flex items-start justify-between">
              <div>
                <p class="text-slate-800 font-medium">Completed walking exercise</p>
                <p class="text-xs text-slate-500 mt-0.5">30 min walk recorded</p>
              </div>
              <span class="text-xs text-slate-400 whitespace-nowrap ml-4">4h ago</span>
            </div>
            <div class="border-t border-slate-50"></div>
            <div class="flex items-start justify-between">
              <div>
                <p class="text-slate-800 font-medium">Uploaded exercise proof image</p>
                <p class="text-xs text-slate-500 mt-0.5">Morning session verification</p>
              </div>
              <span class="text-xs text-slate-400 whitespace-nowrap ml-4">6h ago</span>
            </div>
          </div>
        </div>
      </div>

      <div class="bg-white border border-slate-100 rounded-sm p-6">
        <h3 class="text-lg font-semibold text-slate-900 mb-4 flex items-center gap-2">
          <i class="fa-solid fa-robot text-emerald-500 text-sm"></i> AI Health Summary
        </h3>
        <p class="text-sm text-slate-600 leading-relaxed">Patient condition is unstable due to missed medication patterns. Blood sugar readings consistently above target range for the past 5 days. Recommend immediate review of medication schedule and dietary compliance.</p>
      </div>
    </div>

    <div id="tab-content-medicines" class="tab-content space-y-6 hidden">
      <div class="bg-white border border-slate-100 rounded-sm p-6">
        <div class="flex items-center justify-between mb-4">
          <h3 class="text-lg font-semibold text-slate-900">Assigned Medicines</h3>
          <button class="inline-flex items-center justify-center gap-2 px-3 py-2 rounded-sm bg-emerald-500 text-white text-xs font-medium hover:bg-emerald-600 transition-colors">
            <i class="fa-solid fa-plus text-[10px]"></i> Add Medicine
          </button>
        </div>
        <div class="overflow-x-auto">
          <table class="w-full text-left text-sm text-slate-700">
            <thead>
              <tr class="border-b border-slate-100 bg-slate-50/60 text-xs uppercase tracking-wider text-slate-500">
                <th class="px-4 py-3 font-semibold">Medicine</th>
                <th class="px-4 py-3 font-semibold">Dosage</th>
                <th class="px-4 py-3 font-semibold">Schedule</th>
                <th class="px-4 py-3 font-semibold">Status</th>
                <th class="px-4 py-3 font-semibold text-right">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr class="border-b border-slate-50 hover:bg-slate-50/50">
                <td class="px-4 py-3 text-sm font-medium text-slate-900">Metformin 850mg</td>
                <td class="px-4 py-3 text-xs text-slate-600">Morning / Evening</td>
                <td class="px-4 py-3 text-xs text-slate-600">After food</td>
                <td class="px-4 py-3">
                  <span class="px-2 py-1 text-[10px] font-semibold bg-emerald-100 text-emerald-700 rounded-sm uppercase">Active</span>
                </td>
                <td class="px-4 py-3 text-right">
                  <button class="inline-flex items-center gap-1 px-2 py-1 rounded-sm bg-white border border-slate-200 text-[11px] font-medium text-slate-700 hover:bg-emerald-50 hover:border-emerald-200 hover:text-emerald-700 transition-colors">
                    <i class="fa-solid fa-pen text-[9px]"></i> Edit
                  </button>
                </td>
              </tr>
              <tr class="hover:bg-slate-50/50">
                <td class="px-4 py-3 text-sm font-medium text-slate-900">Paracetamol 500mg</td>
                <td class="px-4 py-3 text-xs text-slate-600">2 times daily</td>
                <td class="px-4 py-3 text-xs text-slate-600">After food</td>
                <td class="px-4 py-3">
                  <span class="px-2 py-1 text-[10px] font-semibold bg-emerald-100 text-emerald-700 rounded-sm uppercase">Active</span>
                </td>
                <td class="px-4 py-3 text-right">
                  <button class="inline-flex items-center gap-1 px-2 py-1 rounded-sm bg-white border border-slate-200 text-[11px] font-medium text-slate-700 hover:bg-emerald-50 hover:border-emerald-200 hover:text-emerald-700 transition-colors">
                    <i class="fa-solid fa-pen text-[9px]"></i> Edit
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div id="tab-content-meals" class="tab-content space-y-6 hidden">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-white border border-slate-100 rounded-sm p-5">
          <div class="flex items-center justify-between mb-3">
            <h4 class="text-sm font-semibold text-slate-900">Breakfast</h4>
            <span class="px-2 py-1 text-[10px] font-semibold bg-emerald-100 text-emerald-700 rounded-sm uppercase">Completed</span>
          </div>
          <p class="text-sm text-slate-600">Oats + milk</p>
          <p class="text-xs text-slate-400 mt-1">8:00 AM</p>
        </div>
        <div class="bg-white border border-slate-100 rounded-sm p-5">
          <div class="flex items-center justify-between mb-3">
            <h4 class="text-sm font-semibold text-slate-900">Lunch</h4>
            <span class="px-2 py-1 text-[10px] font-semibold bg-emerald-100 text-emerald-700 rounded-sm uppercase">Completed</span>
          </div>
          <p class="text-sm text-slate-600">Rice + vegetables</p>
          <p class="text-xs text-slate-400 mt-1">12:30 PM</p>
        </div>
        <div class="bg-white border border-slate-100 rounded-sm p-5">
          <div class="flex items-center justify-between mb-3">
            <h4 class="text-sm font-semibold text-slate-900">Dinner</h4>
            <span class="px-2 py-1 text-[10px] font-semibold bg-amber-100 text-amber-700 rounded-sm uppercase">Pending</span>
          </div>
          <p class="text-sm text-slate-600">Soup + bread</p>
          <p class="text-xs text-slate-400 mt-1">7:00 PM</p>
        </div>
      </div>
      <div class="bg-white border border-slate-100 rounded-sm p-6">
        <h3 class="text-lg font-semibold text-slate-900 mb-4">Weekly Diet Overview</h3>
        <div class="space-y-3">
          <div class="flex items-center justify-between rounded-sm border border-slate-100 bg-slate-50 px-4 py-3">
            <span class="text-sm text-slate-800 font-medium">Monday</span>
            <span class="text-xs text-slate-600">Controlled diet</span>
            <span class="px-2 py-1 text-[10px] font-semibold bg-emerald-100 text-emerald-700 rounded-sm uppercase">Completed</span>
          </div>
          <div class="flex items-center justify-between rounded-sm border border-slate-100 bg-slate-50 px-4 py-3">
            <span class="text-sm text-slate-800 font-medium">Tuesday</span>
            <span class="text-xs text-slate-600">Low sugar diet</span>
            <span class="px-2 py-1 text-[10px] font-semibold bg-emerald-100 text-emerald-700 rounded-sm uppercase">Completed</span>
          </div>
          <div class="flex items-center justify-between rounded-sm border border-slate-100 bg-slate-50 px-4 py-3">
            <span class="text-sm text-slate-800 font-medium">Wednesday</span>
            <span class="text-xs text-slate-600">Balanced diet</span>
            <span class="px-2 py-1 text-[10px] font-semibold bg-amber-100 text-amber-700 rounded-sm uppercase">Pending</span>
          </div>
        </div>
      </div>
    </div>

    <div id="tab-content-activities" class="tab-content space-y-6 hidden">
      <div class="bg-white border border-slate-100 rounded-sm p-6">
        <div class="flex items-center justify-between mb-4">
          <h3 class="text-lg font-semibold text-slate-900">Assigned Activities</h3>
          <button class="inline-flex items-center justify-center gap-2 px-3 py-2 rounded-sm bg-emerald-500 text-white text-xs font-medium hover:bg-emerald-600 transition-colors">
            <i class="fa-solid fa-plus text-[10px]"></i> Assign Activity
          </button>
        </div>
        <div class="space-y-3">
          <div class="flex items-center justify-between rounded-sm border border-slate-100 bg-slate-50 px-4 py-3">
            <div class="flex items-center gap-3">
              <div class="w-8 h-8 rounded-sm bg-emerald-50 border border-emerald-100 flex items-center justify-center flex-shrink-0">
                <i class="fa-solid fa-person-walking text-emerald-600 text-xs"></i>
              </div>
              <div>
                <p class="text-sm font-medium text-slate-900">Walk 30 minutes daily</p>
                <p class="text-xs text-slate-500 mt-0.5">Proof image uploaded at 10:30 AM</p>
              </div>
            </div>
            <span class="px-2 py-1 text-[10px] font-semibold bg-emerald-100 text-emerald-700 rounded-sm uppercase">Completed</span>
          </div>
          <div class="flex items-center justify-between rounded-sm border border-slate-100 bg-slate-50 px-4 py-3">
            <div class="flex items-center gap-3">
              <div class="w-8 h-8 rounded-sm bg-emerald-50 border border-emerald-100 flex items-center justify-center flex-shrink-0">
                <i class="fa-solid fa-glass-water text-emerald-600 text-xs"></i>
              </div>
              <div>
                <p class="text-sm font-medium text-slate-900">Drink 2L water daily</p>
                <p class="text-xs text-slate-500 mt-0.5">Tracked via app reminder</p>
              </div>
            </div>
            <span class="px-2 py-1 text-[10px] font-semibold bg-amber-100 text-amber-700 rounded-sm uppercase">Pending</span>
          </div>
          <div class="flex items-center justify-between rounded-sm border border-slate-100 bg-slate-50 px-4 py-3">
            <div class="flex items-center gap-3">
              <div class="w-8 h-8 rounded-sm bg-red-50 border border-red-100 flex items-center justify-center flex-shrink-0">
                <i class="fa-solid fa-dumbbell text-red-600 text-xs"></i>
              </div>
              <div>
                <p class="text-sm font-medium text-slate-900">Light exercise</p>
                <p class="text-xs text-slate-500 mt-0.5">No activity recorded for 2 days</p>
              </div>
            </div>
            <span class="px-2 py-1 text-[10px] font-semibold bg-red-100 text-red-700 rounded-sm uppercase">Missed</span>
          </div>
        </div>
      </div>
    </div>

    <div id="tab-content-appointments" class="tab-content space-y-6 hidden">
      <div class="bg-white border border-slate-100 rounded-sm p-6">
        <div class="flex items-center justify-between mb-4">
          <h3 class="text-lg font-semibold text-slate-900">Appointments</h3>
          <button class="inline-flex items-center justify-center gap-2 px-3 py-2 rounded-sm bg-emerald-500 text-white text-xs font-medium hover:bg-emerald-600 transition-colors">
            <i class="fa-solid fa-plus text-[10px]"></i> New Appointment
          </button>
        </div>
        <div class="space-y-3">
          <div class="flex items-center justify-between rounded-sm border border-emerald-100 bg-emerald-50 px-4 py-3">
            <div>
              <p class="text-sm font-medium text-slate-900">12 June — Checkup</p>
              <p class="text-xs text-slate-500 mt-0.5">Routine diabetes review</p>
            </div>
            <span class="px-2 py-1 text-[10px] font-semibold bg-emerald-100 text-emerald-700 rounded-sm uppercase">Upcoming</span>
          </div>
          <div class="flex items-center justify-between rounded-sm border border-slate-100 bg-slate-50 px-4 py-3">
            <div>
              <p class="text-sm font-medium text-slate-900">01 June — Follow-up</p>
              <p class="text-xs text-slate-500 mt-0.5">Medication adjustment review</p>
            </div>
            <span class="px-2 py-1 text-[10px] font-semibold bg-slate-200 text-slate-700 rounded-sm uppercase">Completed</span>
          </div>
          <div class="flex items-center justify-between rounded-sm border border-red-100 bg-red-50 px-4 py-3">
            <div>
              <p class="text-sm font-medium text-slate-900">20 May — Review</p>
              <p class="text-xs text-slate-500 mt-0.5">Missed without notice</p>
            </div>
            <span class="px-2 py-1 text-[10px] font-semibold bg-red-100 text-red-700 rounded-sm uppercase">Missed</span>
          </div>
        </div>
      </div>
    </div>

    <div id="tab-content-reports" class="tab-content space-y-6 hidden">
      <div class="bg-white border border-slate-100 rounded-sm p-6">
        <div class="flex items-center justify-between mb-4">
          <h3 class="text-lg font-semibold text-slate-900">Medical Reports</h3>
          <button class="inline-flex items-center justify-center gap-2 px-3 py-2 rounded-sm bg-emerald-500 text-white text-xs font-medium hover:bg-emerald-600 transition-colors">
            <i class="fa-solid fa-plus text-[10px]"></i> Add Report
          </button>
        </div>
        <div class="space-y-4">
          <div class="rounded-sm border border-slate-100 bg-slate-50 p-4">
            <div class="text-xs text-slate-400 uppercase tracking-wider font-medium mb-1">Blood Sugar</div>
            <p class="text-sm text-slate-800 font-medium">Blood sugar unstable — readings consistently above 160 mg/dL</p>
            <p class="text-xs text-slate-500 mt-1">Reported on 10 June 2026</p>
          </div>
          <div class="rounded-sm border border-slate-100 bg-slate-50 p-4">
            <div class="text-xs text-slate-400 uppercase tracking-wider font-medium mb-1">Doctor Note</div>
            <p class="text-sm text-slate-800 font-medium">Reduce sugar intake and increase daily walking to 45 minutes.</p>
            <p class="text-xs text-slate-500 mt-1">Added by Dr. Ahmed</p>
          </div>
          <div class="rounded-sm border border-slate-100 bg-slate-50 p-4">
            <div class="text-xs text-slate-400 uppercase tracking-wider font-medium mb-1">Follow-up Plan</div>
            <p class="text-sm text-slate-800 font-medium">Review after 2 weeks with new lab results.</p>
            <p class="text-xs text-slate-500 mt-1">Scheduled for 24 June 2026</p>
          </div>
        </div>
      </div>
    </div>

    <div id="tab-content-personalization" class="tab-content space-y-6 hidden">
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-white border border-slate-100 rounded-sm p-4">
          <div class="text-xs text-slate-400 uppercase tracking-wider font-medium">Blood Sugar</div>
          <div class="text-xl font-semibold text-red-500 mt-2">180 mg/dL</div>
        </div>
        <div class="bg-white border border-slate-100 rounded-sm p-4">
          <div class="text-xs text-slate-400 uppercase tracking-wider font-medium">Sleep</div>
          <div class="text-xl font-semibold text-slate-900 mt-2">5 hours</div>
        </div>
        <div class="bg-white border border-slate-100 rounded-sm p-4">
          <div class="text-xs text-slate-400 uppercase tracking-wider font-medium">Stress Level</div>
          <div class="text-xl font-semibold text-amber-600 mt-2">High</div>
        </div>
        <div class="bg-white border border-slate-100 rounded-sm p-4">
          <div class="text-xs text-slate-400 uppercase tracking-wider font-medium">Lifestyle</div>
          <div class="text-xl font-semibold text-slate-900 mt-2">Sedentary</div>
        </div>
      </div>
      <div class="bg-white border border-slate-100 rounded-sm p-6">
        <div class="flex items-center justify-between mb-4">
          <h3 class="text-lg font-semibold text-slate-900">Patient Health JSON Record</h3>
          <button onclick="toggleJson()" class="inline-flex items-center gap-2 px-3 py-2 rounded-sm border border-slate-200 bg-white text-xs font-medium text-slate-700 hover:bg-emerald-50 hover:border-emerald-200 hover:text-emerald-700 transition-colors">
            <i class="fa-solid fa-code text-[10px]"></i> View JSON
          </button>
        </div>
        <div id="json-preview" class="hidden">
          <pre class="bg-slate-50 border border-slate-200 rounded-sm p-4 text-xs text-slate-700 overflow-x-auto">{
  "blood_sugar": "180 mg/dL",
  "sleep": "5 hours",
  "stress_level": "High",
  "lifestyle": "Sedentary",
  "last_updated": "2026-06-06"
}</pre>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
<script>
  function switchTab(tabName) {
    document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
    document.querySelectorAll('.tab-btn').forEach(btn => {
      btn.classList.remove('text-emerald-700', 'bg-emerald-50', 'border-b-2', 'border-emerald-500');
      btn.classList.add('text-slate-600');
    });
    document.getElementById('tab-content-' + tabName).classList.remove('hidden');
    const activeBtn = document.getElementById('tab-' + tabName);
    activeBtn.classList.remove('text-slate-600');
    activeBtn.classList.add('text-emerald-700', 'bg-emerald-50', 'border-b-2', 'border-emerald-500');
  }
  function toggleJson() {
    document.getElementById('json-preview').classList.toggle('hidden');
  }
</script>
@endsection
