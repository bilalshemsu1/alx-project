@extends('layouts.user')

@section('title', 'Activities')
@section('page-title', 'Activities')

@section('content')
  <div class="mx-auto space-y-6 sm:space-y-8">
    <div class="reveal rounded-sm border border-slate-100 bg-white p-5 sm:p-6 shadow-sm">
      <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
          <h1 class="text-2xl font-semibold tracking-tight text-slate-900">Activities</h1>
          <p class="mt-1 text-sm text-slate-500 font-light">Track your daily health activities</p>
        </div>
        @if($stats['total'] > 0)
          <span class="inline-flex items-center gap-1.5 rounded-full border border-emerald-200 bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-800">
            <i class="fa-solid fa-check text-[10px]"></i> {{ $stats['completed'] }}/{{ $stats['total'] }} completed
          </span>
        @endif
      </div>
    </div>

    @if($needsProofWarning->count() > 0)
    <div class="reveal rounded-sm border border-amber-200 bg-amber-50/40 p-4 sm:p-5">
      <div class="flex items-start gap-3">
        <span class="text-amber-600 text-base flex-shrink-0 mt-0.5"><i class="fa-solid fa-triangle-exclamation"></i></span>
        <div class="flex-1 min-w-0">
          <h4 class="text-sm font-semibold text-amber-800">Activity Warnings</h4>
          <div class="mt-3 space-y-3">
            @foreach($needsProofWarning as $item)
              @php
                $act = $item['activity'];
                $log = $item['log'];
                $timeLabel = $act->scheduled_time ? \Carbon\Carbon::parse($act->scheduled_time)->format('g:i A') : '';
              @endphp
              <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 text-xs text-amber-700">
                <span class="font-medium flex items-center gap-1.5">
                  <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                  Missing proof for {{ $act->title }} {{ $timeLabel ? "scheduled at $timeLabel" : '' }}.
                </span>
                <button onclick="openProofModal({{ $act->id }})" class="self-start sm:self-auto inline-flex items-center justify-center rounded-sm bg-amber-600 hover:bg-amber-700 px-3 py-1.5 text-white font-medium transition-colors">
                  Provide Proof
                </button>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
    @endif

    @if($stats['total'] > 0)
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
      <div class="reveal rounded-sm border border-slate-100 bg-white p-5 shadow-sm">
        <div class="text-xs font-semibold uppercase tracking-wider text-slate-400">Completed Today</div>
        <div class="mt-2 text-3xl font-semibold text-slate-900">{{ $stats['completed'] }}</div>
        <div class="mt-2 text-xs text-slate-500">Out of {{ $stats['total'] }} scheduled</div>
      </div>

      <div class="reveal rounded-sm border border-slate-100 bg-white p-5 shadow-sm">
        <div class="text-xs font-semibold uppercase tracking-wider text-slate-400">Current Streak</div>
        <div class="mt-2 text-3xl font-semibold text-slate-900">{{ $stats['current_streak'] }} {{ $stats['current_streak'] === 1 ? 'Day' : 'Days' }}</div>
        <div class="mt-2 text-xs text-slate-500">Consistent completion</div>
      </div>

      <div class="reveal rounded-sm border border-slate-100 bg-white p-5 shadow-sm">
        <div class="text-xs font-semibold uppercase tracking-wider text-slate-400">Consistency</div>
        <div class="mt-2 text-3xl font-semibold {{ $stats['consistency'] >= 75 ? 'text-emerald-600' : ($stats['consistency'] >= 50 ? 'text-amber-600' : 'text-red-600') }}">{{ $stats['consistency'] }}%</div>
        <div class="mt-2 text-xs text-slate-500">Completion rate today</div>
      </div>
    </div>
    @endif

    @if($todayItems->count() > 0)
    <section class="space-y-4">
      <div class="flex items-center justify-between">
        <h2 class="text-lg font-semibold text-slate-900">Today's Activities</h2>
        <span class="text-xs text-slate-400">{{ $now->format('M d, Y') }}</span>
      </div>

      <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
        @foreach($todayItems as $item)
          @php
            $activity = $item['activity'];
            $log = $item['log'];
            $status = $item['status'];
            $isCompleted = $status === 'completed';
            $isMissed = $status === 'missed';
            $isPending = $status === 'pending';
            $hasProof = $log?->proof_image;
            $typeIcons = [
              'walking' => 'fa-person-walking',
              'water' => 'fa-glass-water',
              'stretching' => 'fa-dumbbell',
              'breathing' => 'fa-lungs',
              'exercise' => 'fa-person-running',
              'meditation' => 'fa-spa',
            ];
            $typeTones = [
              'walking' => 'amber',
              'water' => 'emerald',
              'stretching' => 'blue',
              'breathing' => 'teal',
              'exercise' => 'amber',
              'meditation' => 'purple',
            ];
            $typeLower = strtolower($activity->type);
            $icon = $typeIcons[$typeLower] ?? 'fa-heart-pulse';
            $tone = $typeTones[$typeLower] ?? 'slate';
            $timeDisplay = $activity->scheduled_time ? \Carbon\Carbon::parse($activity->scheduled_time)->format('g:i A') : '';
            $cardId = 'card-' . $activity->id;
            $badgeId = 'badge-' . $activity->id;
            $actionsId = 'actions-' . $activity->id;
          @endphp
          <div id="{{ $cardId }}" class="reveal rounded-sm border border-slate-100 bg-white p-5 shadow-sm flex flex-col justify-between hover:border-slate-200 transition-colors" data-activity-id="{{ $activity->id }}">
            <div>
              <div class="flex items-start justify-between gap-2">
                <div class="w-8 h-8 rounded-sm bg-{{ $tone }}-50 border border-{{ $tone }}-100 flex items-center justify-center">
                  <i class="fa-solid {{ $icon }} text-{{ $tone }}-600 text-sm"></i>
                </div>
                <span id="{{ $badgeId }}" class="inline-flex items-center gap-1.5 rounded-full border {{ $isCompleted ? 'border-emerald-100 bg-emerald-50 text-emerald-700' : ($isMissed ? 'border-red-100 bg-red-50 text-red-700' : 'border-slate-100 bg-slate-50 text-slate-500') }} px-2.5 py-0.5 text-[10px] font-semibold">
                  <i class="fa-solid {{ $isCompleted ? 'fa-check' : ($isMissed ? 'fa-xmark' : 'fa-clock') }} text-[8px]"></i>
                  {{ ucfirst($status) }}
                  @if($hasProof)
                    <i class="fa-solid fa-camera ml-1 text-[8px]"></i>
                  @endif
                </span>
              </div>
              <h3 class="mt-4 text-base font-semibold text-slate-900">{{ $activity->title }}</h3>
              @if($activity->description)
                <p class="text-xs text-slate-400 mt-1">{{ $activity->description }}</p>
              @endif

              <div class="mt-4 space-y-2 border-t border-slate-50 pt-4 text-xs">
                @if($activity->duration_minutes)
                <div class="flex justify-between">
                  <span class="text-slate-400">Duration</span>
                  <span class="font-medium text-slate-700">{{ $activity->duration_minutes }} minutes</span>
                </div>
                @endif
                @if($timeDisplay)
                <div class="flex justify-between">
                  <span class="text-slate-400">Scheduled</span>
                  <span class="font-medium text-slate-700">{{ $timeDisplay }}</span>
                </div>
                @endif
                <div class="flex justify-between">
                  <span class="text-slate-400">Validation</span>
                  <span class="font-medium {{ $activity->proof_required ? 'text-amber-700' : 'text-slate-700' }}">{{ $activity->proof_required ? 'Proof Required' : 'Self Tracked' }}</span>
                </div>
              </div>
            </div>

            <div id="{{ $actionsId }}" class="mt-5 border-t border-slate-50 pt-4 flex gap-2">
              @if($isPending)
                @if($activity->proof_required)
                  <button onclick="openProofModal({{ $activity->id }})" class="w-full inline-flex items-center justify-center gap-1.5 rounded-sm bg-amber-500 hover:bg-amber-600 py-1.5 text-white text-xs font-semibold transition-colors">
                    <i class="fa-solid fa-camera"></i> Upload Proof
                  </button>
                @else
                  <button onclick="logActivity({{ $activity->id }}, 'completed')" class="flex-1 inline-flex items-center justify-center rounded-sm bg-emerald-500 hover:bg-emerald-600 py-1.5 text-white text-xs font-semibold transition-colors">
                    Complete
                  </button>
                  <button onclick="logActivity({{ $activity->id }}, 'missed')" class="inline-flex items-center justify-center rounded-sm border border-slate-200 bg-white hover:bg-slate-50 px-2 py-1.5 text-slate-600 text-xs font-semibold transition-colors">
                    Miss
                  </button>
                @endif
              @else
                <span class="text-xs text-slate-400 italic">Logged {{ $status }}{{ $hasProof ? ' with proof' : '' }}</span>
              @endif
            </div>
          </div>
        @endforeach
      </div>
    </section>
    @else
    <div class="reveal rounded-sm border border-slate-100 bg-white p-8 text-center shadow-sm">
      <div class="h-12 w-12 mx-auto rounded-full bg-emerald-50 border border-emerald-100 flex items-center justify-center">
        <i class="fa-solid fa-person-walking text-emerald-600 text-lg"></i>
      </div>
      <h3 class="mt-3 text-sm font-semibold text-slate-900">No activities assigned yet</h3>
      <p class="mt-1 text-xs text-slate-500">Your doctor hasn't assigned any activities for today</p>
    </div>
    @endif

    @if(count($weekDays) > 0)
    <section class="reveal bg-white border border-slate-100 rounded-sm p-5 sm:p-6 shadow-sm">
      <div class="flex items-center justify-between gap-3 mb-5">
        <h3 class="text-lg font-semibold text-slate-900 flex items-center gap-2">
          <i class="fa-solid fa-calendar text-emerald-500 text-sm"></i> Weekly Tracker
        </h3>
      </div>

      <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse text-sm">
          <thead>
            <tr class="border-b border-slate-100 text-slate-400 text-xs font-semibold uppercase tracking-wider">
              <th class="pb-3 pr-2">Day</th>
              <th class="pb-3 px-2">Completed</th>
              <th class="pb-3 px-2">Missed</th>
              <th class="pb-3 px-2">Proofs</th>
              <th class="pb-3 pl-2 text-right">Status</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-50 text-slate-700">
            @foreach($weekDays as $day)
              @php
                $statusLabels = ['good' => ['text-emerald-600', 'fa-check', 'Good'], 'average' => ['text-amber-600', 'fa-triangle-exclamation', 'Average'], 'poor' => ['text-red-600', 'fa-xmark', 'Poor'], 'pending' => ['text-slate-400', 'fa-clock', 'Pending']];
                $label = $statusLabels[$day['status']] ?? $statusLabels['pending'];
              @endphp
              <tr class="hover:bg-slate-50/50 transition-colors {{ $day['is_today'] ? 'bg-emerald-50/30' : '' }}">
                <td class="py-4 pr-2 font-semibold {{ $day['is_today'] ? 'text-slate-900' : 'text-slate-500' }} flex items-center gap-1.5">
                  <i class="fa-solid fa-calendar text-slate-400 text-xs"></i> {{ $day['day_name'] }}{{ $day['is_today'] ? ' (Today)' : '' }}
                </td>
                <td class="py-4 px-2 {{ $day['is_today'] ? '' : 'text-slate-500' }}">{{ $day['completed'] }}/{{ $day['total'] }}</td>
                <td class="py-4 px-2 {{ $day['is_today'] ? '' : 'text-slate-500' }}">{{ $day['missed'] }}</td>
                <td class="py-4 px-2 {{ $day['is_today'] ? '' : 'text-slate-500' }}">{{ $day['proofs'] }}</td>
                <td class="py-4 pl-2 text-right">
                  <span class="inline-flex items-center gap-1 {{ $label[0] }} font-semibold text-xs">
                    <i class="fa-solid {{ $label[1] }} text-[10px]"></i> {{ $label[2] }}
                  </span>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </section>
    @endif
  </div>

  <div id="proof-modal" class="fixed inset-0 z-[100] hidden flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-[2px]">
    <div class="bg-white border border-slate-200 rounded-sm shadow-xl w-full max-w-md overflow-hidden relative">
      <div class="h-14 border-b border-slate-100 flex items-center justify-between px-6">
        <h3 class="font-semibold text-slate-900 flex items-center gap-2">
          <i class="fa-solid fa-camera text-emerald-500 text-sm"></i> Upload Proof
        </h3>
        <button onclick="closeProofModal()" class="text-slate-400 hover:text-slate-600 focus:outline-none">
          <i class="fa-solid fa-xmark text-sm"></i>
        </button>
      </div>

      <div class="p-6 space-y-4">
        <div id="preview-container" class="hidden border border-slate-200 bg-slate-50/50 p-2 rounded-sm text-center">
          <img id="image-preview" src="#" alt="Preview" class="max-h-48 mx-auto rounded-sm object-cover" />
        </div>

        <div id="upload-dropzone" class="border-2 border-dashed border-slate-200 bg-slate-50 hover:bg-slate-100/50 p-6 rounded-sm text-center cursor-pointer transition-colors relative">
          <input type="file" id="proof-file-input" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer" onchange="handleFileSelect(event)" />
          <i class="fa-solid fa-upload text-slate-400 text-2xl mb-2"></i>
          <div class="text-xs font-semibold text-slate-700">Choose file or drag here</div>
          <div class="text-[10px] text-slate-400 mt-1">PNG, JPG up to 5MB</div>
        </div>
      </div>

      <div class="px-6 py-4 border-t border-slate-100 bg-slate-50/50 flex items-center justify-end gap-2">
        <button onclick="closeProofModal()" class="inline-flex items-center justify-center rounded-sm border border-slate-200 bg-white hover:bg-slate-50 px-4 py-2 text-slate-600 text-xs font-semibold transition-colors">Cancel</button>
        <button id="btn-submit-proof" onclick="submitProof()" class="inline-flex items-center justify-center rounded-sm bg-emerald-500 hover:bg-emerald-600 px-4 py-2 text-white text-xs font-semibold transition-colors" disabled>Upload</button>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    let activeActivityId = null;
    let selectedFile = null;

    function openProofModal(activityId) {
      activeActivityId = activityId;
      selectedFile = null;
      document.getElementById('preview-container').classList.add('hidden');
      document.getElementById('upload-dropzone').classList.remove('hidden');
      document.getElementById('btn-submit-proof').disabled = true;
      document.getElementById('proof-file-input').value = '';
      document.getElementById('proof-modal').classList.remove('hidden');
    }

    function closeProofModal() {
      document.getElementById('proof-modal').classList.add('hidden');
      activeActivityId = null;
      selectedFile = null;
    }

    function handleFileSelect(event) {
      const file = event.target.files[0];
      if (!file) return;
      selectedFile = file;

      const reader = new FileReader();
      reader.onload = function(e) {
        document.getElementById('image-preview').src = e.target.result;
        document.getElementById('preview-container').classList.remove('hidden');
        document.getElementById('upload-dropzone').classList.add('hidden');
        document.getElementById('btn-submit-proof').disabled = false;
      };
      reader.readAsDataURL(file);
    }

    function submitProof() {
      if (!activeActivityId || !selectedFile) return;

      const formData = new FormData();
      formData.append('status', 'completed');
      formData.append('proof_image', selectedFile);

      fetch(`/activities/${activeActivityId}/complete`, {
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '',
          'Accept': 'application/json',
        },
        body: formData,
      }).then(r => r.json()).then(() => {
        location.reload();
      }).catch(() => {
        alert('Failed to upload proof.');
      });
    }

    function logActivity(activityId, status) {
      fetch(`/activities/${activityId}/complete`, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '',
          'Accept': 'application/json',
        },
        body: JSON.stringify({ status: status }),
      }).then(r => r.json()).then(() => {
        location.reload();
      }).catch(() => {
        alert('Failed to update activity.');
      });
    }

    document.addEventListener('click', (e) => {
      const modal = document.getElementById('proof-modal');
      if (e.target === modal) closeProofModal();
    });
  </script>
@endpush
