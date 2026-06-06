@extends('layouts.doctor')

@section('title', 'Patient Management')
@section('page-title', 'Patient Management')

@section('content')
  <div class="mx-auto space-y-6">
    <div class="reveal">
      <h1 class="text-3xl md:text-4xl font-medium tracking-tight text-slate-900 mb-1">
        Patient <span class="font-serif italic text-emerald-600">Management</span>
      </h1>
      <p class="text-slate-500 font-light">Monitor and manage all registered patients</p>
    </div>

    <div class="reveal rounded-sm border border-slate-100 bg-white p-5">
      <div class="flex flex-col gap-4 lg:flex-row lg:items-end lg:justify-between">
        <div class="text-xs text-slate-400 uppercase tracking-wider font-medium">Total Patients: <span class="text-slate-900 font-semibold text-sm">48</span></div>
      </div>
    </div>

    <div class="reveal rounded-sm border border-slate-100 bg-white p-4 sm:p-5">
      <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
          <div class="relative">
            <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-xs text-slate-400"></i>
            <input type="text" placeholder="Search patient (name / ID)" class="pl-8 pr-4 py-2 text-sm rounded-sm border border-slate-200 bg-white text-slate-900 placeholder:text-slate-400 focus:outline-none focus:border-emerald-300 focus:ring-2 focus:ring-emerald-100 w-64">
          </div>
          <div class="flex gap-2">
            <select class="px-3 py-2 text-sm rounded-sm border border-slate-200 bg-white text-slate-700 focus:outline-none focus:border-emerald-300">
              <option>All Status</option>
              <option>Stable</option>
              <option>At Risk</option>
              <option>Critical</option>
            </select>
            <select class="px-3 py-2 text-sm rounded-sm border border-slate-200 bg-white text-slate-700 focus:outline-none focus:border-emerald-300">
              <option>All Adherence</option>
              <option>High adherence</option>
              <option>Medium</option>
              <option>Low</option>
            </select>
          </div>
        </div>
        <button class="inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-sm bg-emerald-500 text-white text-sm font-medium hover:bg-emerald-600 transition-colors">
          <i class="fa-solid fa-plus text-xs"></i>
          Add New Patient
        </button>
      </div>
    </div>

    <div class="reveal rounded-sm border border-slate-100 bg-white shadow-sm overflow-hidden">
      <div class="overflow-x-auto">
        <table class="w-full text-left text-sm text-slate-700">
          <thead>
            <tr class="border-b border-slate-100 bg-slate-50/60 text-xs uppercase tracking-wider text-slate-500">
              <th class="px-5 py-3.5 font-semibold">Patient Name</th>
              <th class="px-5 py-3.5 font-semibold">Age</th>
              <th class="px-5 py-3.5 font-semibold">Risk Level</th>
              <th class="px-5 py-3.5 font-semibold">Condition Status</th>
              <th class="px-5 py-3.5 font-semibold">Medicine Adherence</th>
              <th class="px-5 py-3.5 font-semibold">Activity Level</th>
              <th class="px-5 py-3.5 font-semibold">Last Visit</th>
              <th class="px-5 py-3.5 font-semibold text-right">Action</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-100">
            <tr class="hover:bg-slate-50/50 transition-colors">
              <td class="px-5 py-4">
                <div class="flex items-center gap-3">
                  <div class="w-8 h-8 rounded-sm bg-emerald-50 border border-emerald-100 flex items-center justify-center flex-shrink-0">
                    <i class="fa-solid fa-user text-emerald-600 text-xs"></i>
                  </div>
                  <div>
                    <div class="text-sm font-medium text-slate-900">John Doe</div>
                  </div>
                </div>
              </td>
              <td class="px-5 py-4 text-xs text-slate-500">45</td>
              <td class="px-5 py-4">
                <span class="inline-flex items-center rounded-sm bg-red-100 px-2.5 py-1 text-xs font-semibold text-red-700">High</span>
              </td>
              <td class="px-5 py-4 text-xs text-slate-600">Diabetes</td>
              <td class="px-5 py-4">
                <div class="flex items-center gap-2.5">
                  <div class="flex-1 h-1.5 bg-slate-100 rounded-full overflow-hidden max-w-[60px]">
                    <div class="h-full bg-emerald-500 rounded-full" style="width: 72%"></div>
                  </div>
                  <span class="text-xs font-medium text-slate-700">72%</span>
                </div>
              </td>
              <td class="px-5 py-4">
                <div class="flex items-center gap-2.5">
                  <div class="flex-1 h-1.5 bg-slate-100 rounded-full overflow-hidden max-w-[60px]">
                    <div class="h-full bg-slate-400 rounded-full" style="width: 45%"></div>
                  </div>
                  <span class="text-xs font-medium text-slate-700">45%</span>
                </div>
              </td>
              <td class="px-5 py-4 text-xs text-slate-500">2026-04-12</td>
              <td class="px-5 py-4 text-right">
                <a href="{{ url('/doctor/patients/1') }}" class="inline-flex items-center justify-center gap-1.5 px-3 py-1.5 rounded-sm bg-slate-50 border border-slate-200 text-xs font-medium text-slate-700 hover:bg-emerald-50 hover:border-emerald-200 hover:text-emerald-700 transition-colors">
                  <i class="fa-solid fa-eye text-[10px]"></i> View Profile
                </a>
              </td>
            </tr>

            <tr class="hover:bg-slate-50/50 transition-colors">
              <td class="px-5 py-4">
                <div class="flex items-center gap-3">
                  <div class="w-8 h-8 rounded-sm bg-emerald-50 border border-emerald-100 flex items-center justify-center flex-shrink-0">
                    <i class="fa-solid fa-user text-emerald-600 text-xs"></i>
                  </div>
                  <div>
                    <div class="text-sm font-medium text-slate-900">Sarah Ali</div>
                  </div>
                </div>
              </td>
              <td class="px-5 py-4 text-xs text-slate-500">32</td>
              <td class="px-5 py-4">
                <span class="inline-flex items-center rounded-sm bg-emerald-100 px-2.5 py-1 text-xs font-semibold text-emerald-700">Stable</span>
              </td>
              <td class="px-5 py-4 text-xs text-slate-600">Healthy recovery</td>
              <td class="px-5 py-4">
                <div class="flex items-center gap-2.5">
                  <div class="flex-1 h-1.5 bg-slate-100 rounded-full overflow-hidden max-w-[60px]">
                    <div class="h-full bg-emerald-500 rounded-full" style="width: 90%"></div>
                  </div>
                  <span class="text-xs font-medium text-slate-700">90%</span>
                </div>
              </td>
              <td class="px-5 py-4">
                <div class="flex items-center gap-2.5">
                  <div class="flex-1 h-1.5 bg-slate-100 rounded-full overflow-hidden max-w-[60px]">
                    <div class="h-full bg-emerald-500 rounded-full" style="width: 78%"></div>
                  </div>
                  <span class="text-xs font-medium text-slate-700">78%</span>
                </div>
              </td>
              <td class="px-5 py-4 text-xs text-slate-500">2026-04-08</td>
              <td class="px-5 py-4 text-right">
                <a href="{{ url('/doctor/patients/1') }}" class="inline-flex items-center justify-center gap-1.5 px-3 py-1.5 rounded-sm bg-slate-50 border border-slate-200 text-xs font-medium text-slate-700 hover:bg-emerald-50 hover:border-emerald-200 hover:text-emerald-700 transition-colors">
                  <i class="fa-solid fa-eye text-[10px]"></i> View Profile
                </a>
              </td>
            </tr>

            <tr class="hover:bg-slate-50/50 transition-colors">
              <td class="px-5 py-4">
                <div class="flex items-center gap-3">
                  <div class="w-8 h-8 rounded-sm bg-red-50 border border-red-100 flex items-center justify-center flex-shrink-0">
                    <i class="fa-solid fa-user text-red-600 text-xs"></i>
                  </div>
                  <div>
                    <div class="text-sm font-medium text-slate-900">Ahmed Hassan</div>
                  </div>
                </div>
              </td>
              <td class="px-5 py-4 text-xs text-slate-500">60</td>
              <td class="px-5 py-4">
                <span class="inline-flex items-center rounded-sm bg-red-100 px-2.5 py-1 text-xs font-semibold text-red-700">Critical</span>
              </td>
              <td class="px-5 py-4 text-xs text-slate-600">Heart condition</td>
              <td class="px-5 py-4">
                <div class="flex items-center gap-2.5">
                  <div class="flex-1 h-1.5 bg-slate-100 rounded-full overflow-hidden max-w-[60px]">
                    <div class="h-full bg-red-500 rounded-full" style="width: 55%"></div>
                  </div>
                  <span class="text-xs font-medium text-slate-700">55%</span>
                </div>
              </td>
              <td class="px-5 py-4">
                <div class="flex items-center gap-2.5">
                  <div class="flex-1 h-1.5 bg-slate-100 rounded-full overflow-hidden max-w-[60px]">
                    <div class="h-full bg-red-500 rounded-full" style="width: 30%"></div>
                  </div>
                  <span class="text-xs font-medium text-slate-700">30%</span>
                </div>
              </td>
              <td class="px-5 py-4 text-xs text-slate-500">2026-03-29</td>
              <td class="px-5 py-4 text-right">
                <a href="{{ url('/doctor/patients/1') }}" class="inline-flex items-center justify-center gap-1.5 px-3 py-1.5 rounded-sm bg-slate-50 border border-slate-200 text-xs font-medium text-slate-700 hover:bg-emerald-50 hover:border-emerald-200 hover:text-emerald-700 transition-colors">
                  <i class="fa-solid fa-eye text-[10px]"></i> View Profile
                </a>
              </td>
            </tr>

            <tr class="hover:bg-slate-50/50 transition-colors">
              <td class="px-5 py-4">
                <div class="flex items-center gap-3">
                  <div class="w-8 h-8 rounded-sm bg-emerald-50 border border-emerald-100 flex items-center justify-center flex-shrink-0">
                    <i class="fa-solid fa-user text-emerald-600 text-xs"></i>
                  </div>
                  <div>
                    <div class="text-sm font-medium text-slate-900">Mina Patel</div>
                  </div>
                </div>
              </td>
              <td class="px-5 py-4 text-xs text-slate-500">48</td>
              <td class="px-5 py-4">
                <span class="inline-flex items-center rounded-sm bg-amber-100 px-2.5 py-1 text-xs font-semibold text-amber-700">At Risk</span>
              </td>
              <td class="px-5 py-4 text-xs text-slate-600">Hypertension</td>
              <td class="px-5 py-4">
                <div class="flex items-center gap-2.5">
                  <div class="flex-1 h-1.5 bg-slate-100 rounded-full overflow-hidden max-w-[60px]">
                    <div class="h-full bg-amber-500 rounded-full" style="width: 68%"></div>
                  </div>
                  <span class="text-xs font-medium text-slate-700">68%</span>
                </div>
              </td>
              <td class="px-5 py-4">
                <div class="flex items-center gap-2.5">
                  <div class="flex-1 h-1.5 bg-slate-100 rounded-full overflow-hidden max-w-[60px]">
                    <div class="h-full bg-amber-500 rounded-full" style="width: 52%"></div>
                  </div>
                  <span class="text-xs font-medium text-slate-700">52%</span>
                </div>
              </td>
              <td class="px-5 py-4 text-xs text-slate-500">2026-04-05</td>
              <td class="px-5 py-4 text-right">
                <a href="{{ url('/doctor/patients/1') }}" class="inline-flex items-center justify-center gap-1.5 px-3 py-1.5 rounded-sm bg-slate-50 border border-slate-200 text-xs font-medium text-slate-700 hover:bg-emerald-50 hover:border-emerald-200 hover:text-emerald-700 transition-colors">
                  <i class="fa-solid fa-eye text-[10px]"></i> View Profile
                </a>
              </td>
            </tr>

            <tr class="hover:bg-slate-50/50 transition-colors">
              <td class="px-5 py-4">
                <div class="flex items-center gap-3">
                  <div class="w-8 h-8 rounded-sm bg-emerald-50 border border-emerald-100 flex items-center justify-center flex-shrink-0">
                    <i class="fa-solid fa-user text-emerald-600 text-xs"></i>
                  </div>
                  <div>
                    <div class="text-sm font-medium text-slate-900">James Wilson</div>
                  </div>
                </div>
              </td>
              <td class="px-5 py-4 text-xs text-slate-500">55</td>
              <td class="px-5 py-4">
                <span class="inline-flex items-center rounded-sm bg-emerald-100 px-2.5 py-1 text-xs font-semibold text-emerald-700">Stable</span>
              </td>
              <td class="px-5 py-4 text-xs text-slate-600">Cholesterol management</td>
              <td class="px-5 py-4">
                <div class="flex items-center gap-2.5">
                  <div class="flex-1 h-1.5 bg-slate-100 rounded-full overflow-hidden max-w-[60px]">
                    <div class="h-full bg-emerald-500 rounded-full" style="width: 88%"></div>
                  </div>
                  <span class="text-xs font-medium text-slate-700">88%</span>
                </div>
              </td>
              <td class="px-5 py-4">
                <div class="flex items-center gap-2.5">
                  <div class="flex-1 h-1.5 bg-slate-100 rounded-full overflow-hidden max-w-[60px]">
                    <div class="h-full bg-emerald-500 rounded-full" style="width: 82%"></div>
                  </div>
                  <span class="text-xs font-medium text-slate-700">82%</span>
                </div>
              </td>
              <td class="px-5 py-4 text-xs text-slate-500">2026-04-14</td>
              <td class="px-5 py-4 text-right">
                <a href="{{ url('/doctor/patients/1') }}" class="inline-flex items-center justify-center gap-1.5 px-3 py-1.5 rounded-sm bg-slate-50 border border-slate-200 text-xs font-medium text-slate-700 hover:bg-emerald-50 hover:border-emerald-200 hover:text-emerald-700 transition-colors">
                  <i class="fa-solid fa-eye text-[10px]"></i> View Profile
                </a>
              </td>
            </tr>

            <tr class="hover:bg-slate-50/50 transition-colors">
              <td class="px-5 py-4">
                <div class="flex items-center gap-3">
                  <div class="w-8 h-8 rounded-sm bg-emerald-50 border border-emerald-100 flex items-center justify-center flex-shrink-0">
                    <i class="fa-solid fa-user text-emerald-600 text-xs"></i>
                  </div>
                  <div>
                    <div class="text-sm font-medium text-slate-900">Layla Noor</div>
                  </div>
                </div>
              </td>
              <td class="px-5 py-4 text-xs text-slate-500">29</td>
              <td class="px-5 py-4">
                <span class="inline-flex items-center rounded-sm bg-emerald-100 px-2.5 py-1 text-xs font-semibold text-emerald-700">Stable</span>
              </td>
              <td class="px-5 py-4 text-xs text-slate-600">Post-surgery recovery</td>
              <td class="px-5 py-4">
                <div class="flex items-center gap-2.5">
                  <div class="flex-1 h-1.5 bg-slate-100 rounded-full overflow-hidden max-w-[60px]">
                    <div class="h-full bg-emerald-500 rounded-full" style="width: 95%"></div>
                  </div>
                  <span class="text-xs font-medium text-slate-700">95%</span>
                </div>
              </td>
              <td class="px-5 py-4">
                <div class="flex items-center gap-2.5">
                  <div class="flex-1 h-1.5 bg-slate-100 rounded-full overflow-hidden max-w-[60px]">
                    <div class="h-full bg-emerald-500 rounded-full" style="width: 70%"></div>
                  </div>
                  <span class="text-xs font-medium text-slate-700">70%</span>
                </div>
              </td>
              <td class="px-5 py-4 text-xs text-slate-500">2026-04-10</td>
              <td class="px-5 py-4 text-right">
                <a href="{{ url('/doctor/patients/1') }}" class="inline-flex items-center justify-center gap-1.5 px-3 py-1.5 rounded-sm bg-slate-50 border border-slate-200 text-xs font-medium text-slate-700 hover:bg-emerald-50 hover:border-emerald-200 hover:text-emerald-700 transition-colors">
                  <i class="fa-solid fa-eye text-[10px]"></i> View Profile
                </a>
              </td>
            </tr>

            <tr class="hover:bg-slate-50/50 transition-colors">
              <td class="px-5 py-4">
                <div class="flex items-center gap-3">
                  <div class="w-8 h-8 rounded-sm bg-red-50 border border-red-100 flex items-center justify-center flex-shrink-0">
                    <i class="fa-solid fa-user text-red-600 text-xs"></i>
                  </div>
                  <div>
                    <div class="text-sm font-medium text-slate-900">Omar Fayed</div>
                  </div>
                </div>
              </td>
              <td class="px-5 py-4 text-xs text-slate-500">67</td>
              <td class="px-5 py-4">
                <span class="inline-flex items-center rounded-sm bg-red-100 px-2.5 py-1 text-xs font-semibold text-red-700">Critical</span>
              </td>
              <td class="px-5 py-4 text-xs text-slate-600">Diabetes type 2</td>
              <td class="px-5 py-4">
                <div class="flex items-center gap-2.5">
                  <div class="flex-1 h-1.5 bg-slate-100 rounded-full overflow-hidden max-w-[60px]">
                    <div class="h-full bg-red-500 rounded-full" style="width: 48%"></div>
                  </div>
                  <span class="text-xs font-medium text-slate-700">48%</span>
                </div>
              </td>
              <td class="px-5 py-4">
                <div class="flex items-center gap-2.5">
                  <div class="flex-1 h-1.5 bg-slate-100 rounded-full overflow-hidden max-w-[60px]">
                    <div class="h-full bg-slate-400 rounded-full" style="width: 22%"></div>
                  </div>
                  <span class="text-xs font-medium text-slate-700">22%</span>
                </div>
              </td>
              <td class="px-5 py-4 text-xs text-slate-500">2026-03-15</td>
              <td class="px-5 py-4 text-right">
                <a href="{{ url('/doctor/patients/1') }}" class="inline-flex items-center justify-center gap-1.5 px-3 py-1.5 rounded-sm bg-slate-50 border border-slate-200 text-xs font-medium text-slate-700 hover:bg-emerald-50 hover:border-emerald-200 hover:text-emerald-700 transition-colors">
                  <i class="fa-solid fa-eye text-[10px]"></i> View Profile
                </a>
              </td>
            </tr>

            <tr class="hover:bg-slate-50/50 transition-colors">
              <td class="px-5 py-4">
                <div class="flex items-center gap-3">
                  <div class="w-8 h-8 rounded-sm bg-emerald-50 border border-emerald-100 flex items-center justify-center flex-shrink-0">
                    <i class="fa-solid fa-user text-emerald-600 text-xs"></i>
                  </div>
                  <div>
                    <div class="text-sm font-medium text-slate-900">Nadia Kareem</div>
                  </div>
                </div>
              </td>
              <td class="px-5 py-4 text-xs text-slate-500">41</td>
              <td class="px-5 py-4">
                <span class="inline-flex items-center rounded-sm bg-amber-100 px-2.5 py-1 text-xs font-semibold text-amber-700">At Risk</span>
              </td>
              <td class="px-5 py-4 text-xs text-slate-600">Arrhythmia monitoring</td>
              <td class="px-5 py-4">
                <div class="flex items-center gap-2.5">
                  <div class="flex-1 h-1.5 bg-slate-100 rounded-full overflow-hidden max-w-[60px]">
                    <div class="h-full bg-amber-500 rounded-full" style="width: 61%"></div>
                  </div>
                  <span class="text-xs font-medium text-slate-700">61%</span>
                </div>
              </td>
              <td class="px-5 py-4">
                <div class="flex items-center gap-2.5">
                  <div class="flex-1 h-1.5 bg-slate-100 rounded-full overflow-hidden max-w-[60px]">
                    <div class="h-full bg-amber-500 rounded-full" style="width: 55%"></div>
                  </div>
                  <span class="text-xs font-medium text-slate-700">55%</span>
                </div>
              </td>
              <td class="px-5 py-4 text-xs text-slate-500">2026-04-01</td>
              <td class="px-5 py-4 text-right">
                <a href="{{ url('/doctor/patients/1') }}" class="inline-flex items-center justify-center gap-1.5 px-3 py-1.5 rounded-sm bg-slate-50 border border-slate-200 text-xs font-medium text-slate-700 hover:bg-emerald-50 hover:border-emerald-200 hover:text-emerald-700 transition-colors">
                  <i class="fa-solid fa-eye text-[10px]"></i> View Profile
                </a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="flex items-center justify-between gap-4 px-5 py-4 border-t border-slate-100 bg-slate-50/50">
        <p class="text-xs text-slate-500">Showing <span class="font-medium text-slate-700">6</span> of <span class="font-medium text-slate-700">48</span> patients</p>
        <div class="flex items-center gap-1.5">
          <button class="px-2.5 py-1.5 rounded-sm border border-slate-200 bg-white text-xs font-medium text-slate-600 hover:bg-slate-50 disabled:opacity-50" disabled>
            <i class="fa-solid fa-chevron-left text-[10px]"></i>
          </button>
          <button class="px-2.5 py-1.5 rounded-sm bg-emerald-500 text-xs font-medium text-white">1</button>
          <button class="px-2.5 py-1.5 rounded-sm border border-slate-200 bg-white text-xs font-medium text-slate-600 hover:bg-slate-50">2</button>
          <button class="px-2.5 py-1.5 rounded-sm border border-slate-200 bg-white text-xs font-medium text-slate-600 hover:bg-slate-50">3</button>
          <button class="px-2.5 py-1.5 rounded-sm border border-slate-200 bg-white text-xs font-medium text-slate-600 hover:bg-slate-50">4</button>
          <button class="px-2.5 py-1.5 rounded-sm border border-slate-200 bg-white text-xs font-medium text-slate-600 hover:bg-slate-50">
            <i class="fa-solid fa-chevron-right text-[10px]"></i>
          </button>
        </div>
      </div>
    </div>

  </div>
@endsection
