@extends('layouts.admin')

@section('title', 'Admin Dashboard')
@section('page-title', 'Admin Dashboard')

@section('content')
  <div class="mx-auto space-y-8">
    <div class="reveal">
      <h1 class="text-3xl md:text-4xl font-medium tracking-tight text-slate-900 mb-1">
        Admin <span class="font-serif italic text-emerald-600">Overview</span>
      </h1>
      <p class="text-slate-500 font-light">A placeholder admin workspace that keeps the same visual language as the patient dashboard.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 reveal">
      <div class="bg-white border border-slate-100 rounded-sm p-5 hover:shadow-[0_8px_30px_-12px_rgba(16,185,129,0.1)] transition-all duration-300">
        <div class="text-xs text-slate-400 uppercase tracking-wider font-medium">Active Users</div>
        <div class="text-3xl font-semibold text-slate-900 mt-2">248</div>
        <div class="text-sm text-emerald-600 mt-2">+12 this week</div>
      </div>
      <div class="bg-white border border-slate-100 rounded-sm p-5 hover:shadow-[0_8px_30px_-12px_rgba(16,185,129,0.1)] transition-all duration-300">
        <div class="text-xs text-slate-400 uppercase tracking-wider font-medium">Doctor Assignments</div>
        <div class="text-3xl font-semibold text-slate-900 mt-2">36</div>
        <div class="text-sm text-slate-500 mt-2">Across 9 departments</div>
      </div>
      <div class="bg-white border border-slate-100 rounded-sm p-5 hover:shadow-[0_8px_30px_-12px_rgba(16,185,129,0.1)] transition-all duration-300">
        <div class="text-xs text-slate-400 uppercase tracking-wider font-medium">System Alerts</div>
        <div class="text-3xl font-semibold text-slate-900 mt-2">7</div>
        <div class="text-sm text-red-500 mt-2">2 need attention</div>
      </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 reveal">
      <div class="bg-white border border-slate-100 rounded-sm p-6">
        <div class="flex items-center justify-between mb-4">
          <h3 class="text-lg font-semibold text-slate-900">Pending Reviews</h3>
          <span class="text-xs text-emerald-600 font-medium">Today</span>
        </div>
        <div class="space-y-3">
          <div class="flex items-center justify-between bg-slate-50 border border-slate-100 rounded-sm px-4 py-3">
            <span class="text-sm text-slate-700">New doctor registration</span>
            <span class="text-xs text-emerald-600 font-semibold">Review</span>
          </div>
          <div class="flex items-center justify-between bg-slate-50 border border-slate-100 rounded-sm px-4 py-3">
            <span class="text-sm text-slate-700">Patient relationship request</span>
            <span class="text-xs text-emerald-600 font-semibold">Review</span>
          </div>
          <div class="flex items-center justify-between bg-slate-50 border border-slate-100 rounded-sm px-4 py-3">
            <span class="text-sm text-slate-700">Weekly system summary</span>
            <span class="text-xs text-slate-400 font-semibold">Queued</span>
          </div>
        </div>
      </div>

      <div class="bg-white border border-slate-100 rounded-sm p-6">
        <div class="flex items-center justify-between mb-4">
          <h3 class="text-lg font-semibold text-slate-900">Operations Notes</h3>
          <span class="text-xs text-slate-400">Placeholder</span>
        </div>
        <div class="space-y-4 text-sm text-slate-500 leading-relaxed">
          <p>Use this page to manage hospital users, assign doctors, and monitor alerts.</p>
          <p>The layout follows the same card spacing, fonts, and emerald accent treatment as the patient dashboard.</p>
        </div>
      </div>
    </div>
  </div>
@endsection
