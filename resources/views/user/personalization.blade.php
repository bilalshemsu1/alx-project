@extends('layouts.user')

@section('title', 'Personalization - ቅድሚያ ለጤናዎ')
@section('page-title', 'Personalization')

@section('content')
  <div class="space-y-6 sm:space-y-8">
    <div class="reveal rounded-sm border border-slate-100 bg-white p-5 sm:p-6 shadow-sm">
      <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
        <div>
          <div class="mb-2 inline-flex items-center gap-2 rounded-full border border-emerald-200 bg-emerald-50 px-3 py-1 text-[10px] font-semibold uppercase tracking-[0.18em] text-emerald-700">
            <i class="fa-solid fa-database text-[10px]"></i> Dynamic patient data
          </div>
          <h1 class="text-2xl font-semibold tracking-tight text-slate-900">Personalization</h1>
          <p class="mt-1 text-sm text-slate-500 font-light">Manage dynamic health and lifestyle data</p>
        </div>

        <button onclick="openEntryModal()" class="inline-flex items-center justify-center gap-2 rounded-sm bg-emerald-500 px-4 py-2.5 text-xs font-semibold text-white transition-colors hover:bg-emerald-600">
          <i class="fa-solid fa-plus text-[11px]"></i> Add New Entry
        </button>
      </div>
    </div>

    <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
      <div class="reveal rounded-sm border border-slate-100 bg-white p-5 shadow-sm">
        <div class="flex items-center justify-between gap-3">
          <div class="text-xs font-semibold uppercase tracking-wider text-slate-400">Total entries stored</div>
          <div class="h-8 w-8 rounded-sm border border-emerald-100 bg-emerald-50 flex items-center justify-center">
            <i class="fa-solid fa-database text-emerald-600 text-xs"></i>
          </div>
        </div>
        <div id="entry-count" class="mt-2 text-3xl font-semibold text-slate-900">5</div>
        <div class="mt-2 text-sm text-slate-500">Flexible JSON records</div>
      </div>

      <div class="reveal rounded-sm border border-slate-100 bg-white p-5 shadow-sm">
        <div class="flex items-center justify-between gap-3">
          <div class="text-xs font-semibold uppercase tracking-wider text-slate-400">Latest update time</div>
          <div class="h-8 w-8 rounded-sm border border-emerald-100 bg-emerald-50 flex items-center justify-center">
            <i class="fa-solid fa-chart-line text-emerald-600 text-xs"></i>
          </div>
        </div>
        <div id="latest-update" class="mt-2 text-xl font-semibold text-slate-900">06 Jun 2026, 9:15 AM</div>
        <div class="mt-2 text-sm text-emerald-600">Updated from patient notes</div>
      </div>

      <div class="reveal rounded-sm border border-slate-100 bg-white p-5 shadow-sm">
        <div class="flex items-center justify-between gap-3">
          <div class="text-xs font-semibold uppercase tracking-wider text-slate-400">Data completeness</div>
          <div class="h-8 w-8 rounded-sm border border-emerald-100 bg-emerald-50 flex items-center justify-center">
            <i class="fa-solid fa-heart text-emerald-600 text-xs"></i>
          </div>
        </div>
        <div class="mt-2 flex items-end gap-2">
          <span class="text-3xl font-semibold text-emerald-600">82%</span>
          <span class="pb-1 text-xs font-medium text-slate-400">care context filled</span>
        </div>
        <div class="mt-3 h-2 overflow-hidden rounded-sm bg-slate-100">
          <div class="h-full w-[82%] rounded-sm bg-emerald-500"></div>
        </div>
      </div>
    </div>

    <div class="grid grid-cols-1 gap-6 xl:grid-cols-3">
      <div class="xl:col-span-2 space-y-6 lg:space-y-8">
        <section class="reveal bg-white border border-slate-100 rounded-sm p-5 sm:p-6 shadow-sm">
          <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between mb-5">
            <div>
              <h3 class="text-lg font-semibold text-slate-900 flex items-center gap-2">
                <i class="fa-solid fa-notes-medical text-emerald-500 text-sm"></i> Personal Data List
              </h3>
              <p class="mt-1 text-xs text-slate-400">JSON-based records stored as flexible patient context</p>
            </div>
            <span class="self-start sm:self-auto inline-flex items-center gap-1.5 rounded-full border border-slate-200 bg-slate-50 px-3 py-1 text-xs font-semibold text-slate-600">
              <i class="fa-solid fa-database text-[10px]"></i> Stored data
            </span>
          </div>

          <div id="personal-data-list" class="space-y-3">
            <div id="entry-blood-sugar" class="personal-entry flex flex-col gap-4 rounded-sm border border-slate-100 bg-slate-50/40 px-4 py-4 transition-all hover:border-slate-200 sm:flex-row sm:items-center sm:justify-between" data-json-key="blood_sugar">
              <div class="flex min-w-0 items-start gap-3">
                <div class="mt-0.5 h-9 w-9 flex-shrink-0 rounded-sm border border-emerald-100 bg-emerald-50 flex items-center justify-center">
                  <i class="fa-solid fa-notes-medical text-emerald-600 text-sm"></i>
                </div>
                <div class="min-w-0">
                  <div class="flex flex-wrap items-center gap-2">
                    <h4 class="text-sm font-semibold text-slate-900">Blood sugar level</h4>
                    <span class="rounded-full border border-emerald-100 bg-emerald-50 px-2.5 py-0.5 text-[10px] font-semibold text-emerald-700">Health</span>
                  </div>
                  <div class="mt-1 text-sm text-slate-700">120 mg/dL</div>
                  <div class="mt-1 text-xs text-slate-400">Recorded 06 Jun 2026, 9:15 AM</div>
                </div>
              </div>
              <div class="flex flex-shrink-0 items-center gap-2">
                <button onclick="showEntryDetails('blood_sugar')" class="inline-flex h-9 w-9 items-center justify-center rounded-sm border border-slate-200 bg-white text-slate-500 transition-colors hover:bg-slate-50 hover:text-slate-700" aria-label="View blood sugar details" title="View details">
                  <i class="fa-solid fa-eye text-xs"></i>
                </button>
                <button onclick="deleteEntry('entry-blood-sugar', 'blood_sugar')" class="inline-flex h-9 w-9 items-center justify-center rounded-sm border border-red-100 bg-white text-red-500 transition-colors hover:bg-red-50" aria-label="Delete blood sugar entry" title="Delete entry">
                  <i class="fa-solid fa-trash text-xs"></i>
                </button>
              </div>
            </div>

            <div id="entry-financial-status" class="personal-entry flex flex-col gap-4 rounded-sm border border-slate-100 bg-white px-4 py-4 transition-all hover:border-slate-200 sm:flex-row sm:items-center sm:justify-between" data-json-key="financial_status">
              <div class="flex min-w-0 items-start gap-3">
                <div class="mt-0.5 h-9 w-9 flex-shrink-0 rounded-sm border border-slate-200 bg-slate-50 flex items-center justify-center">
                  <i class="fa-solid fa-database text-slate-500 text-sm"></i>
                </div>
                <div class="min-w-0">
                  <div class="flex flex-wrap items-center gap-2">
                    <h4 class="text-sm font-semibold text-slate-900">Financial status</h4>
                    <span class="rounded-full border border-slate-200 bg-slate-50 px-2.5 py-0.5 text-[10px] font-semibold text-slate-600">Financial</span>
                  </div>
                  <div class="mt-1 text-sm text-slate-700">Stable</div>
                  <div class="mt-1 text-xs text-slate-400">Recorded 05 Jun 2026, 4:40 PM</div>
                </div>
              </div>
              <div class="flex flex-shrink-0 items-center gap-2">
                <button onclick="showEntryDetails('financial_status')" class="inline-flex h-9 w-9 items-center justify-center rounded-sm border border-slate-200 bg-white text-slate-500 transition-colors hover:bg-slate-50 hover:text-slate-700" aria-label="View financial status details" title="View details">
                  <i class="fa-solid fa-eye text-xs"></i>
                </button>
                <button onclick="deleteEntry('entry-financial-status', 'financial_status')" class="inline-flex h-9 w-9 items-center justify-center rounded-sm border border-red-100 bg-white text-red-500 transition-colors hover:bg-red-50" aria-label="Delete financial status entry" title="Delete entry">
                  <i class="fa-solid fa-trash text-xs"></i>
                </button>
              </div>
            </div>

            <div id="entry-living-condition" class="personal-entry flex flex-col gap-4 rounded-sm border border-slate-100 bg-white px-4 py-4 transition-all hover:border-slate-200 sm:flex-row sm:items-center sm:justify-between" data-json-key="living_condition">
              <div class="flex min-w-0 items-start gap-3">
                <div class="mt-0.5 h-9 w-9 flex-shrink-0 rounded-sm border border-emerald-100 bg-emerald-50 flex items-center justify-center">
                  <i class="fa-solid fa-heart text-emerald-600 text-sm"></i>
                </div>
                <div class="min-w-0">
                  <div class="flex flex-wrap items-center gap-2">
                    <h4 class="text-sm font-semibold text-slate-900">Living condition</h4>
                    <span class="rounded-full border border-emerald-100 bg-emerald-50 px-2.5 py-0.5 text-[10px] font-semibold text-emerald-700">Lifestyle</span>
                  </div>
                  <div class="mt-1 text-sm text-slate-700">Urban</div>
                  <div class="mt-1 text-xs text-slate-400">Recorded 04 Jun 2026, 1:25 PM</div>
                </div>
              </div>
              <div class="flex flex-shrink-0 items-center gap-2">
                <button onclick="showEntryDetails('living_condition')" class="inline-flex h-9 w-9 items-center justify-center rounded-sm border border-slate-200 bg-white text-slate-500 transition-colors hover:bg-slate-50 hover:text-slate-700" aria-label="View living condition details" title="View details">
                  <i class="fa-solid fa-eye text-xs"></i>
                </button>
                <button onclick="deleteEntry('entry-living-condition', 'living_condition')" class="inline-flex h-9 w-9 items-center justify-center rounded-sm border border-red-100 bg-white text-red-500 transition-colors hover:bg-red-50" aria-label="Delete living condition entry" title="Delete entry">
                  <i class="fa-solid fa-trash text-xs"></i>
                </button>
              </div>
            </div>

            <div id="entry-sleep-pattern" class="personal-entry flex flex-col gap-4 rounded-sm border border-slate-100 bg-white px-4 py-4 transition-all hover:border-slate-200 sm:flex-row sm:items-center sm:justify-between" data-json-key="sleep">
              <div class="flex min-w-0 items-start gap-3">
                <div class="mt-0.5 h-9 w-9 flex-shrink-0 rounded-sm border border-amber-100 bg-amber-50 flex items-center justify-center">
                  <i class="fa-solid fa-brain text-amber-600 text-sm"></i>
                </div>
                <div class="min-w-0">
                  <div class="flex flex-wrap items-center gap-2">
                    <h4 class="text-sm font-semibold text-slate-900">Sleep pattern</h4>
                    <span class="rounded-full border border-amber-100 bg-amber-50 px-2.5 py-0.5 text-[10px] font-semibold text-amber-700">Lifestyle</span>
                  </div>
                  <div class="mt-1 text-sm text-slate-700">Irregular</div>
                  <div class="mt-1 text-xs text-slate-400">Recorded 03 Jun 2026, 10:30 PM</div>
                </div>
              </div>
              <div class="flex flex-shrink-0 items-center gap-2">
                <button onclick="showEntryDetails('sleep')" class="inline-flex h-9 w-9 items-center justify-center rounded-sm border border-slate-200 bg-white text-slate-500 transition-colors hover:bg-slate-50 hover:text-slate-700" aria-label="View sleep pattern details" title="View details">
                  <i class="fa-solid fa-eye text-xs"></i>
                </button>
                <button onclick="deleteEntry('entry-sleep-pattern', 'sleep')" class="inline-flex h-9 w-9 items-center justify-center rounded-sm border border-red-100 bg-white text-red-500 transition-colors hover:bg-red-50" aria-label="Delete sleep pattern entry" title="Delete entry">
                  <i class="fa-solid fa-trash text-xs"></i>
                </button>
              </div>
            </div>

            <div id="entry-stress-level" class="personal-entry flex flex-col gap-4 rounded-sm border border-slate-100 bg-white px-4 py-4 transition-all hover:border-slate-200 sm:flex-row sm:items-center sm:justify-between" data-json-key="stress">
              <div class="flex min-w-0 items-start gap-3">
                <div class="mt-0.5 h-9 w-9 flex-shrink-0 rounded-sm border border-amber-100 bg-amber-50 flex items-center justify-center">
                  <i class="fa-solid fa-brain text-amber-600 text-sm"></i>
                </div>
                <div class="min-w-0">
                  <div class="flex flex-wrap items-center gap-2">
                    <h4 class="text-sm font-semibold text-slate-900">Stress level</h4>
                    <span class="rounded-full border border-amber-100 bg-amber-50 px-2.5 py-0.5 text-[10px] font-semibold text-amber-700">Lifestyle</span>
                  </div>
                  <div class="mt-1 text-sm text-slate-700">Medium</div>
                  <div class="mt-1 text-xs text-slate-400">Recorded 03 Jun 2026, 6:10 PM</div>
                </div>
              </div>
              <div class="flex flex-shrink-0 items-center gap-2">
                <button onclick="showEntryDetails('stress')" class="inline-flex h-9 w-9 items-center justify-center rounded-sm border border-slate-200 bg-white text-slate-500 transition-colors hover:bg-slate-50 hover:text-slate-700" aria-label="View stress level details" title="View details">
                  <i class="fa-solid fa-eye text-xs"></i>
                </button>
                <button onclick="deleteEntry('entry-stress-level', 'stress')" class="inline-flex h-9 w-9 items-center justify-center rounded-sm border border-red-100 bg-white text-red-500 transition-colors hover:bg-red-50" aria-label="Delete stress level entry" title="Delete entry">
                  <i class="fa-solid fa-trash text-xs"></i>
                </button>
              </div>
            </div>
          </div>
        </section>

        <section id="entry-detail-panel" class="reveal hidden bg-white border border-slate-100 rounded-sm p-5 sm:p-6 shadow-sm">
          <div class="flex items-start justify-between gap-4">
            <div>
              <h3 class="text-lg font-semibold text-slate-900 flex items-center gap-2">
                <i id="detail-icon" class="fa-solid fa-database text-emerald-500 text-sm"></i>
                <span id="detail-title">Stored data detail</span>
              </h3>
              <p id="detail-timestamp" class="mt-1 text-xs text-slate-400">Recorded 06 Jun 2026, 9:15 AM</p>
            </div>
            <button onclick="closeEntryDetails()" class="rounded-sm border border-slate-200 bg-white px-3 py-1.5 text-xs font-semibold text-slate-600 transition-colors hover:bg-slate-50">Close</button>
          </div>
          <div class="mt-5 grid grid-cols-1 gap-4 md:grid-cols-3">
            <div class="rounded-sm border border-slate-100 bg-slate-50 p-4">
              <div class="text-xs font-semibold uppercase tracking-wider text-slate-400">Value</div>
              <div id="detail-value" class="mt-2 text-xl font-semibold text-slate-900">120 mg/dL</div>
            </div>
            <div class="rounded-sm border border-slate-100 bg-slate-50 p-4">
              <div class="text-xs font-semibold uppercase tracking-wider text-slate-400">Category</div>
              <div id="detail-category" class="mt-2 text-xl font-semibold text-slate-900">Health</div>
            </div>
            <div class="rounded-sm border border-slate-100 bg-slate-50 p-4">
              <div class="text-xs font-semibold uppercase tracking-wider text-slate-400">Storage key</div>
              <div id="detail-key" class="mt-2 text-sm font-semibold text-emerald-600">blood_sugar</div>
            </div>
          </div>
          <div class="mt-4 rounded-sm border border-slate-100 bg-slate-50/50 p-4">
            <div class="text-xs font-semibold uppercase tracking-wider text-slate-400">Note</div>
            <p id="detail-note" class="mt-2 text-sm leading-relaxed text-slate-600">Fasting reading after morning medication. Keep monitoring before breakfast for the next week.</p>
          </div>
        </section>
      </div>

      <div class="space-y-6 lg:space-y-8">
        <section class="reveal bg-white border border-slate-100 rounded-sm p-5 sm:p-6 shadow-sm">
          <div class="flex items-center justify-between gap-3 mb-5">
            <h3 class="text-lg font-semibold text-slate-900 flex items-center gap-2">
              <i class="fa-solid fa-database text-emerald-500 text-sm"></i> Dynamic JSON Preview
            </h3>
            <span class="rounded-full border border-slate-200 bg-slate-50 px-2.5 py-0.5 text-[10px] font-semibold text-slate-500">Read-only</span>
          </div>

          <pre id="json-preview" class="overflow-x-auto rounded-sm border border-slate-100 bg-slate-950 p-4 text-xs leading-relaxed text-emerald-100">{
  "blood_sugar": 120,
  "sleep": "6h",
  "stress": "medium",
  "financial_status": "stable",
  "living_condition": "urban"
}</pre>
        </section>

        <section class="reveal bg-white border border-slate-100 rounded-sm p-5 sm:p-6 shadow-sm">
          <div class="flex items-center justify-between gap-3 mb-5">
            <h3 class="text-lg font-semibold text-slate-900 flex items-center gap-2">
              <i class="fa-solid fa-chart-line text-emerald-500 text-sm"></i> Insights
            </h3>
            <span class="text-xs text-slate-400 font-medium">Pattern checks</span>
          </div>

          <div class="space-y-3">
            <div class="rounded-sm border border-amber-100 bg-amber-50/40 p-4">
              <div class="flex items-start gap-3">
                <i class="fa-solid fa-brain mt-0.5 text-amber-600 text-sm"></i>
                <div>
                  <div class="text-sm font-semibold text-slate-900">Your stress level is increasing</div>
                  <p class="mt-1 text-xs leading-relaxed text-slate-500">Recent lifestyle notes show medium stress for three consecutive check-ins.</p>
                </div>
              </div>
            </div>

            <div class="rounded-sm border border-slate-100 bg-slate-50/50 p-4">
              <div class="flex items-start gap-3">
                <i class="fa-solid fa-heart mt-0.5 text-emerald-600 text-sm"></i>
                <div>
                  <div class="text-sm font-semibold text-slate-900">Sleep pattern unstable</div>
                  <p class="mt-1 text-xs leading-relaxed text-slate-500">Logged sleep varies between five and seven hours this week.</p>
                </div>
              </div>
            </div>

            <div class="rounded-sm border border-emerald-100 bg-emerald-50/50 p-4">
              <div class="flex items-start gap-3">
                <i class="fa-solid fa-chart-line mt-0.5 text-emerald-600 text-sm"></i>
                <div>
                  <div class="text-sm font-semibold text-slate-900">Blood sugar improving</div>
                  <p class="mt-1 text-xs leading-relaxed text-slate-500">Latest value is lower than the previous reading of 132 mg/dL.</p>
                </div>
              </div>
            </div>
          </div>
        </section>

        <section class="reveal bg-white border border-slate-100 rounded-sm p-5 sm:p-6 shadow-sm">
          <div class="flex items-center justify-between gap-3 mb-5">
            <h3 class="text-lg font-semibold text-slate-900 flex items-center gap-2">
              <i class="fa-solid fa-notes-medical text-emerald-500 text-sm"></i> Stored Categories
            </h3>
            <span class="text-xs text-slate-400 font-medium">Expandable fields</span>
          </div>

          <div class="grid grid-cols-2 gap-3">
            <div class="rounded-sm border border-emerald-100 bg-emerald-50 p-4">
              <i class="fa-solid fa-notes-medical text-emerald-600 text-sm"></i>
              <div class="mt-3 text-sm font-semibold text-slate-900">Health</div>
              <div class="mt-1 text-xs text-emerald-700">1 record</div>
            </div>
            <div class="rounded-sm border border-amber-100 bg-amber-50 p-4">
              <i class="fa-solid fa-brain text-amber-600 text-sm"></i>
              <div class="mt-3 text-sm font-semibold text-slate-900">Lifestyle</div>
              <div class="mt-1 text-xs text-amber-700">3 records</div>
            </div>
            <div class="rounded-sm border border-slate-200 bg-slate-50 p-4">
              <i class="fa-solid fa-database text-slate-500 text-sm"></i>
              <div class="mt-3 text-sm font-semibold text-slate-900">Financial</div>
              <div class="mt-1 text-xs text-slate-500">1 record</div>
            </div>
            <div class="rounded-sm border border-slate-200 bg-white p-4">
              <i class="fa-solid fa-heart text-slate-500 text-sm"></i>
              <div class="mt-3 text-sm font-semibold text-slate-900">Other</div>
              <div class="mt-1 text-xs text-slate-500">0 records</div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>

  <div id="entry-modal" class="fixed inset-0 z-[100] hidden items-center justify-center bg-slate-900/60 p-4 backdrop-blur-[2px]">
    <div class="w-full sm:w-[560px] overflow-hidden rounded-sm border border-slate-200 bg-white shadow-xl">
      <div class="flex h-14 items-center justify-between border-b border-slate-100 px-6">
        <h3 class="flex items-center gap-2 text-sm font-semibold text-slate-900">
          <i class="fa-solid fa-database text-emerald-500"></i> Add New Entry
        </h3>
        <button onclick="closeEntryModal()" class="rounded-sm border border-slate-200 bg-white px-3 py-1.5 text-xs font-semibold text-slate-600 transition-colors hover:bg-slate-50">Close</button>
      </div>

      <div class="space-y-4 p-6">
        <div>
          <label for="entry-title-input" class="mb-1.5 block text-xs font-semibold text-slate-700">Title</label>
          <input id="entry-title-input" type="text" value="Evening blood pressure note" class="w-full rounded-sm border border-slate-200 px-3 py-2 text-sm text-slate-700 transition-colors focus:border-emerald-400 focus:outline-none focus:ring-1 focus:ring-emerald-100">
        </div>

        <div>
          <label for="entry-note-input" class="mb-1.5 block text-xs font-semibold text-slate-700">Description / note</label>
          <textarea id="entry-note-input" rows="4" class="w-full resize-none rounded-sm border border-slate-200 px-3 py-2 text-sm text-slate-700 transition-colors focus:border-emerald-400 focus:outline-none focus:ring-1 focus:ring-emerald-100">Patient reports mild fatigue after dinner. Blood pressure checked at home and stayed within normal range.</textarea>
        </div>

        <div>
          <label for="entry-category-input" class="mb-1.5 block text-xs font-semibold text-slate-700">Category</label>
          <select id="entry-category-input" class="w-full rounded-sm border border-slate-200 px-3 py-2 text-sm text-slate-700 transition-colors focus:border-emerald-400 focus:outline-none focus:ring-1 focus:ring-emerald-100">
            <option value="health">health</option>
            <option value="lifestyle">lifestyle</option>
            <option value="financial">financial</option>
            <option value="other">other</option>
          </select>
        </div>
      </div>

      <div class="flex items-center justify-end gap-2 border-t border-slate-100 bg-slate-50/50 px-6 py-4">
        <button onclick="closeEntryModal()" class="inline-flex items-center justify-center rounded-sm border border-slate-200 bg-white px-4 py-2 text-xs font-semibold text-slate-600 transition-colors hover:bg-slate-50">Cancel</button>
        <button onclick="saveSampleEntry()" class="inline-flex items-center justify-center gap-2 rounded-sm bg-emerald-500 px-4 py-2 text-xs font-semibold text-white transition-colors hover:bg-emerald-600">
          <i class="fa-solid fa-plus text-[11px]"></i> Save Entry
        </button>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    const personalizationEntries = {
      blood_sugar: {
        title: 'Blood sugar level',
        value: '120 mg/dL',
        category: 'Health',
        timestamp: 'Recorded 06 Jun 2026, 9:15 AM',
        key: 'blood_sugar',
        icon: 'fa-notes-medical',
        note: 'Fasting reading after morning medication. Keep monitoring before breakfast for the next week.'
      },
      financial_status: {
        title: 'Financial status',
        value: 'Stable',
        category: 'Financial',
        timestamp: 'Recorded 05 Jun 2026, 4:40 PM',
        key: 'financial_status',
        icon: 'fa-database',
        note: 'Patient reports stable income and no current difficulty purchasing prescribed medication.'
      },
      living_condition: {
        title: 'Living condition',
        value: 'Urban',
        category: 'Lifestyle',
        timestamp: 'Recorded 04 Jun 2026, 1:25 PM',
        key: 'living_condition',
        icon: 'fa-heart',
        note: 'Patient lives in an apartment with nearby pharmacy access and regular public transportation.'
      },
      sleep: {
        title: 'Sleep pattern',
        value: 'Irregular',
        category: 'Lifestyle',
        timestamp: 'Recorded 03 Jun 2026, 10:30 PM',
        key: 'sleep',
        icon: 'fa-brain',
        note: 'Sleep duration varies from five to seven hours. Patient wakes during the night twice on average.'
      },
      stress: {
        title: 'Stress level',
        value: 'Medium',
        category: 'Lifestyle',
        timestamp: 'Recorded 03 Jun 2026, 6:10 PM',
        key: 'stress',
        icon: 'fa-brain',
        note: 'Workload and family responsibilities are increasing stress during evening hours.'
      }
    };

    function openEntryModal() {
      const modal = document.getElementById('entry-modal');
      if (modal) {
        modal.classList.remove('hidden');
        modal.classList.add('flex');
      }
    }

    function closeEntryModal() {
      const modal = document.getElementById('entry-modal');
      if (modal) {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
      }
    }

    function showEntryDetails(key) {
      const data = personalizationEntries[key];
      const panel = document.getElementById('entry-detail-panel');
      if (!data || !panel) return;

      document.getElementById('detail-title').innerText = data.title;
      document.getElementById('detail-value').innerText = data.value;
      document.getElementById('detail-category').innerText = data.category;
      document.getElementById('detail-timestamp').innerText = data.timestamp;
      document.getElementById('detail-key').innerText = data.key;
      document.getElementById('detail-note').innerText = data.note;

      const icon = document.getElementById('detail-icon');
      if (icon) {
        icon.className = `fa-solid ${data.icon} text-emerald-500 text-sm`;
      }

      panel.classList.remove('hidden');
      panel.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }

    function closeEntryDetails() {
      const panel = document.getElementById('entry-detail-panel');
      if (panel) panel.classList.add('hidden');
    }

    function deleteEntry(entryId, jsonKey) {
      const entry = document.getElementById(entryId);
      if (!entry) return;

      entry.classList.add('opacity-0');
      setTimeout(() => {
        entry.remove();
        delete personalizationEntries[jsonKey];
        updateEntryCount();
        updateJsonPreview();
      }, 180);
    }

    function saveSampleEntry() {
      const list = document.getElementById('personal-data-list');
      const titleInput = document.getElementById('entry-title-input');
      const noteInput = document.getElementById('entry-note-input');
      const categoryInput = document.getElementById('entry-category-input');
      if (!list || !titleInput || !noteInput || !categoryInput) return;

      const title = titleInput.value.trim() || 'Custom health note';
      const category = categoryInput.value;
      const key = title.toLowerCase().replace(/[^a-z0-9]+/g, '_').replace(/^_|_$/g, '') || 'custom_note';
      const entryId = `entry-${key}`;
      const displayCategory = category.charAt(0).toUpperCase() + category.slice(1);

      personalizationEntries[key] = {
        title,
        value: 'Custom note',
        category: displayCategory,
        timestamp: 'Recorded 06 Jun 2026, 9:45 AM',
        key,
        icon: category === 'health' ? 'fa-notes-medical' : category === 'lifestyle' ? 'fa-brain' : category === 'financial' ? 'fa-database' : 'fa-heart',
        note: noteInput.value.trim() || 'No additional note added.'
      };

      const iconClass = personalizationEntries[key].icon;
      const tone = category === 'health' ? 'emerald' : category === 'lifestyle' ? 'amber' : 'slate';
      const entryHtml = `
        <div id="${entryId}" class="personal-entry flex flex-col gap-4 rounded-sm border border-slate-100 bg-white px-4 py-4 transition-all hover:border-slate-200 sm:flex-row sm:items-center sm:justify-between" data-json-key="${key}">
          <div class="flex min-w-0 items-start gap-3">
            <div class="mt-0.5 h-9 w-9 flex-shrink-0 rounded-sm border border-${tone}-100 bg-${tone}-50 flex items-center justify-center">
              <i class="fa-solid ${iconClass} text-${tone}-600 text-sm"></i>
            </div>
            <div class="min-w-0">
              <div class="flex flex-wrap items-center gap-2">
                <h4 class="text-sm font-semibold text-slate-900">${title}</h4>
                <span class="rounded-full border border-${tone}-100 bg-${tone}-50 px-2.5 py-0.5 text-[10px] font-semibold text-${tone}-700">${displayCategory}</span>
              </div>
              <div class="mt-1 text-sm text-slate-700">Custom note</div>
              <div class="mt-1 text-xs text-slate-400">Recorded 06 Jun 2026, 9:45 AM</div>
            </div>
          </div>
          <div class="flex flex-shrink-0 items-center gap-2">
            <button onclick="showEntryDetails('${key}')" class="inline-flex h-9 w-9 items-center justify-center rounded-sm border border-slate-200 bg-white text-slate-500 transition-colors hover:bg-slate-50 hover:text-slate-700" aria-label="View ${title} details" title="View details">
              <i class="fa-solid fa-eye text-xs"></i>
            </button>
            <button onclick="deleteEntry('${entryId}', '${key}')" class="inline-flex h-9 w-9 items-center justify-center rounded-sm border border-red-100 bg-white text-red-500 transition-colors hover:bg-red-50" aria-label="Delete ${title} entry" title="Delete entry">
              <i class="fa-solid fa-trash text-xs"></i>
            </button>
          </div>
        </div>
      `;

      list.insertAdjacentHTML('afterbegin', entryHtml);
      document.getElementById('latest-update').innerText = '06 Jun 2026, 9:45 AM';
      updateEntryCount();
      updateJsonPreview();
      closeEntryModal();
    }

    function updateEntryCount() {
      const count = document.querySelectorAll('.personal-entry').length;
      const countEl = document.getElementById('entry-count');
      if (countEl) countEl.innerText = count.toString();
    }

    function updateJsonPreview() {
      const preview = document.getElementById('json-preview');
      if (!preview) return;

      const stored = {};
      Object.values(personalizationEntries).forEach((entry) => {
        stored[entry.key] = entry.value === '120 mg/dL' ? 120 : entry.value.toLowerCase();
      });

      preview.innerText = JSON.stringify(stored, null, 2);
    }

    document.addEventListener('click', (event) => {
      const modal = document.getElementById('entry-modal');
      if (event.target === modal) closeEntryModal();
    });
  </script>
@endpush
