@extends('layouts.user')

@section('title', 'My Health Profile')
@section('page-title', 'My Health Profile')

@section('content')
  @php
    $data = is_array($personalizationData ?? null) ? $personalizationData : [];

    $categoryIcons = [
      'health' => 'fa-notes-medical',
      'lifestyle' => 'fa-heart',
      'symptoms' => 'fa-thermometer-half',
      'medication' => 'fa-pills',
    ];
    $categoryTones = [
      'health' => 'emerald',
      'lifestyle' => 'amber',
      'symptoms' => 'rose',
      'medication' => 'blue',
    ];
  @endphp

  <div class="space-y-6 sm:space-y-8">
    <div class="reveal rounded-sm border border-slate-100 bg-white p-5 sm:p-6 shadow-sm">
      <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
        <div>
          <h1 class="text-2xl font-semibold tracking-tight text-slate-900">My Health Profile</h1>
          <p class="mt-1 text-sm text-slate-500 font-light">Track your health, lifestyle, and symptoms</p>
        </div>
        <button onclick="openEntryModal()" class="inline-flex items-center justify-center gap-2 rounded-sm bg-emerald-500 px-4 py-2.5 text-xs font-semibold text-white transition-colors hover:bg-emerald-600">
          <i class="fa-solid fa-plus text-[11px]"></i> Add Entry
        </button>
      </div>
    </div>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 xl:grid-cols-3">
      @forelse($data as $key => $entry)
        @php
          $title = $entry['title'] ?? $key;
          $value = $entry['value'] ?? '—';
          $category = $entry['category'] ?? 'Other';
          $note = $entry['note'] ?? '';
          $updatedAt = $entry['updated_at'] ?? '—';
          $categoryLower = strtolower($category);
          $icon = $categoryIcons[$categoryLower] ?? 'fa-heart';
          $tone = $categoryTones[$categoryLower] ?? 'slate';
          $entryId = 'entry-' . str_replace(['_', ' '], '-', $key);
        @endphp
        <div id="{{ $entryId }}" class="personal-entry reveal rounded-sm border border-slate-100 bg-white p-5 shadow-sm hover:border-slate-200 transition-all" data-json-key="{{ $key }}">
          <div class="flex items-start gap-3">
            <div class="h-9 w-9 flex-shrink-0 rounded-sm border border-{{ $tone }}-100 bg-{{ $tone }}-50 flex items-center justify-center">
              <i class="fa-solid {{ $icon }} text-{{ $tone }}-600 text-sm"></i>
            </div>
            <div class="flex-1 min-w-0">
              <div class="flex items-center gap-2">
                <h4 class="text-sm font-semibold text-slate-900">{{ $title }}</h4>
                <span class="rounded-full border border-{{ $tone }}-100 bg-{{ $tone }}-50 px-2 py-0.5 text-[9px] font-semibold text-{{ $tone }}-700">{{ $category }}</span>
              </div>
              <div class="mt-1 text-lg font-semibold text-slate-800">{{ $value }}</div>
              @if($note)
                <div class="mt-1 text-xs text-slate-400 line-clamp-2">{{ $note }}</div>
              @endif
              <div class="mt-2 text-[11px] text-slate-400">Updated {{ $updatedAt }}</div>
            </div>
          </div>
          <div class="flex items-center justify-end gap-2 mt-4 pt-3 border-t border-slate-50">
            <button onclick="showEntryDetails('{{ $key }}')" class="inline-flex items-center gap-1.5 rounded-sm border border-slate-200 bg-white px-3 py-1.5 text-xs font-medium text-slate-600 transition-colors hover:bg-slate-50">
              <i class="fa-solid fa-eye text-[10px]"></i> View
            </button>
            <button onclick="deleteEntry('{{ $entryId }}', '{{ $key }}')" class="inline-flex items-center gap-1.5 rounded-sm border border-red-100 bg-white px-3 py-1.5 text-xs font-medium text-red-500 transition-colors hover:bg-red-50">
              <i class="fa-solid fa-trash text-[10px]"></i> Delete
            </button>
          </div>
        </div>
      @empty
        <div class="col-span-full rounded-sm border border-slate-100 bg-white p-8 text-center shadow-sm">
          <div class="h-12 w-12 mx-auto rounded-full bg-emerald-50 border border-emerald-100 flex items-center justify-center">
            <i class="fa-solid fa-plus text-emerald-600 text-lg"></i>
          </div>
          <h3 class="mt-3 text-sm font-semibold text-slate-900">No entries yet</h3>
          <p class="mt-1 text-xs text-slate-500">Start tracking your health by adding your first entry</p>
          <button onclick="openEntryModal()" class="mt-4 inline-flex items-center gap-2 rounded-sm bg-emerald-500 px-4 py-2 text-xs font-semibold text-white transition-colors hover:bg-emerald-600">
            <i class="fa-solid fa-plus text-[11px]"></i> Add First Entry
          </button>
        </div>
      @endforelse
    </div>

    <section id="entry-detail-panel" class="reveal hidden bg-white border border-slate-100 rounded-sm p-5 sm:p-6 shadow-sm">
      <div class="flex items-start justify-between gap-4">
        <div>
          <h3 class="text-lg font-semibold text-slate-900 flex items-center gap-2">
            <i id="detail-icon" class="fa-solid fa-notes-medical text-emerald-500 text-sm"></i>
            <span id="detail-title"></span>
          </h3>
          <p id="detail-timestamp" class="mt-1 text-xs text-slate-400"></p>
        </div>
        <button onclick="closeEntryDetails()" class="rounded-sm border border-slate-200 bg-white px-3 py-1.5 text-xs font-semibold text-slate-600 transition-colors hover:bg-slate-50">Close</button>
      </div>
      <div class="mt-5 grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div class="rounded-sm border border-slate-100 bg-slate-50 p-4">
          <div class="text-xs font-semibold uppercase tracking-wider text-slate-400">Value</div>
          <div id="detail-value" class="mt-2 text-lg font-semibold text-slate-900"></div>
        </div>
        <div class="rounded-sm border border-slate-100 bg-slate-50 p-4">
          <div class="text-xs font-semibold uppercase tracking-wider text-slate-400">Category</div>
          <div id="detail-category" class="mt-2 text-lg font-semibold text-slate-900"></div>
        </div>
        <div class="rounded-sm border border-slate-100 bg-slate-50 p-4">
          <div class="text-xs font-semibold uppercase tracking-wider text-slate-400">Last updated</div>
          <div id="detail-updated" class="mt-2 text-sm font-medium text-slate-700"></div>
        </div>
      </div>
      <div class="mt-4 rounded-sm border border-slate-100 bg-slate-50/50 p-4">
        <div class="text-xs font-semibold uppercase tracking-wider text-slate-400">Note</div>
        <p id="detail-note" class="mt-2 text-sm leading-relaxed text-slate-600"></p>
      </div>
    </section>
  </div>

  <div id="entry-modal" class="fixed inset-0 z-[100] hidden items-center justify-center bg-slate-900/60 p-4 backdrop-blur-[2px]">
    <div class="w-full sm:w-[480px] overflow-hidden rounded-sm border border-slate-200 bg-white shadow-xl">
      <div class="flex h-14 items-center justify-between border-b border-slate-100 px-6">
        <h3 class="text-sm font-semibold text-slate-900">Add New Entry</h3>
        <button onclick="closeEntryModal()" class="rounded-sm border border-slate-200 bg-white px-3 py-1.5 text-xs font-semibold text-slate-600 transition-colors hover:bg-slate-50">Close</button>
      </div>

      <form id="entry-form" class="space-y-4 p-6">
        <div>
          <label for="entry-title-input" class="mb-1.5 block text-xs font-semibold text-slate-700">What would you like to track?</label>
          <input id="entry-title-input" type="text" placeholder="e.g., Blood pressure, Sleep quality" required class="w-full rounded-sm border border-slate-200 px-3 py-2 text-sm text-slate-700 transition-colors focus:border-emerald-400 focus:outline-none focus:ring-1 focus:ring-emerald-100">
        </div>

        <div>
          <label for="entry-value-input" class="mb-1.5 block text-xs font-semibold text-slate-700">Value</label>
          <input id="entry-value-input" type="text" placeholder="e.g., 120/80 mmHg" class="w-full rounded-sm border border-slate-200 px-3 py-2 text-sm text-slate-700 transition-colors focus:border-emerald-400 focus:outline-none focus:ring-1 focus:ring-emerald-100">
        </div>

        <div>
          <label for="entry-note-input" class="mb-1.5 block text-xs font-semibold text-slate-700">How are you feeling?</label>
          <textarea id="entry-note-input" rows="3" placeholder="Any additional notes..." class="w-full resize-none rounded-sm border border-slate-200 px-3 py-2 text-sm text-slate-700 transition-colors focus:border-emerald-400 focus:outline-none focus:ring-1 focus:ring-emerald-100"></textarea>
        </div>

        <div>
          <label for="entry-category-input" class="mb-1.5 block text-xs font-semibold text-slate-700">Category</label>
          <select id="entry-category-input" class="w-full rounded-sm border border-slate-200 px-3 py-2 text-sm text-slate-700 transition-colors focus:border-emerald-400 focus:outline-none focus:ring-1 focus:ring-emerald-100">
            <option value="health">Health</option>
            <option value="lifestyle">Lifestyle</option>
            <option value="symptoms">Symptoms</option>
            <option value="medication">Medication</option>
          </select>
        </div>
      </form>

      <div class="flex items-center justify-end gap-2 border-t border-slate-100 bg-slate-50/50 px-6 py-4">
        <button onclick="closeEntryModal()" class="inline-flex items-center justify-center rounded-sm border border-slate-200 bg-white px-4 py-2 text-xs font-semibold text-slate-600 transition-colors hover:bg-slate-50">Cancel</button>
        <button onclick="saveEntry()" class="inline-flex items-center justify-center gap-2 rounded-sm bg-emerald-500 px-4 py-2 text-xs font-semibold text-white transition-colors hover:bg-emerald-600">
          <i class="fa-solid fa-plus text-[11px]"></i> Save
        </button>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    const personalizationEntries = @json($personalizationData ?? []);

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
      document.getElementById('entry-form').reset();
    }

    function showEntryDetails(key) {
      const data = personalizationEntries[key];
      const panel = document.getElementById('entry-detail-panel');
      if (!data || !panel) return;

      document.getElementById('detail-title').innerText = data.title || key;
      document.getElementById('detail-value').innerText = data.value ?? '—';
      document.getElementById('detail-category').innerText = data.category || 'Other';
      document.getElementById('detail-timestamp').innerText = data.updated_at ? 'Updated ' + data.updated_at : '';
      document.getElementById('detail-updated').innerText = data.updated_at || '—';
      document.getElementById('detail-note').innerText = data.note || 'No notes.';

      const categoryIcons = { health: 'fa-notes-medical', lifestyle: 'fa-heart', symptoms: 'fa-thermometer-half', medication: 'fa-pills' };
      const icon = document.getElementById('detail-icon');
      if (icon) {
        const cat = (data.category || 'other').toLowerCase();
        icon.className = `fa-solid ${categoryIcons[cat] || 'fa-heart'} text-emerald-500 text-sm`;
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

      fetch(`/personalization/delete/${encodeURIComponent(jsonKey)}`, {
        method: 'DELETE',
        headers: {
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '',
          'Accept': 'application/json',
        },
      }).then(response => response.json()).then(() => {
        entry.classList.add('opacity-0');
        setTimeout(() => {
          entry.remove();
          delete personalizationEntries[jsonKey];
        }, 180);
      }).catch(() => {
        alert('Failed to delete entry.');
      });
    }

    function saveEntry() {
      const titleInput = document.getElementById('entry-title-input');
      const valueInput = document.getElementById('entry-value-input');
      const noteInput = document.getElementById('entry-note-input');
      const categoryInput = document.getElementById('entry-category-input');
      if (!titleInput || !valueInput || !noteInput || !categoryInput) return;

      const title = titleInput.value.trim();
      const value = valueInput.value.trim();
      const note = noteInput.value.trim();
      const category = categoryInput.value;

      if (!title) {
        alert('Title is required.');
        return;
      }

      const key = title.toLowerCase().replace(/[^a-z0-9]+/g, '_').replace(/^_|_$/g, '') || 'custom_note';

      fetch('/personalization/save', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '',
          'Accept': 'application/json',
        },
        body: JSON.stringify({
          key: key,
          title: title,
          value: value || null,
          note: note || null,
          category: category,
        }),
      }).then(response => response.json()).then(() => {
        location.reload();
      }).catch(() => {
        alert('Failed to save entry.');
      });
    }

    document.addEventListener('click', (event) => {
      const modal = document.getElementById('entry-modal');
      if (event.target === modal) closeEntryModal();
    });
  </script>
@endpush
