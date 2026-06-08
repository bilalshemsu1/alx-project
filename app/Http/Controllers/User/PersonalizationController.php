<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Personalization;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PersonalizationController extends Controller
{
    public function index(Request $request)
    {
        $userId = (int) session()->get('auth_user_id');
        if (! $userId) {
            return redirect()->to('/login');
        }

        $patient = User::query()->findOrFail($userId);

        $personalizations = Personalization::query()
            ->where('patient_id', $patient->id)
            ->orderByDesc('updated_at')
            ->get();

        $data = [];
        foreach ($personalizations as $p) {
            if (is_array($p->data)) {
                $data = array_merge($p->data, $data);
            }
        }

        $entryCount = count($data);

        $latestUpdate = $personalizations->first()?->updated_at;

        $nonEmptyValues = collect($data)
            ->filter(fn ($v) => !is_null($v) && $v !== '' && $v !== []);

        $completenessPct = $entryCount > 0 ? (int) round(($nonEmptyValues->count() / $entryCount) * 100) : 0;

        return view('user.personalization', [
            'patient' => $patient,
            'personalizationData' => $data,
            'entryCount' => $entryCount,
            'latestUpdate' => $latestUpdate,
            'completenessPct' => $completenessPct,
        ]);
    }

    public function save(Request $request)
    {
        $userId = (int) session()->get('auth_user_id');
        if (! $userId) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }

        $request->validate([
            'key' => ['required', 'string', 'max:120'],
            'title' => ['nullable', 'string', 'max:190'],
            'value' => ['nullable'],
            'note' => ['nullable', 'string', 'max:2000'],
            'category' => ['nullable', 'string', 'max:120'],
        ]);

        $key = $request->input('key');

        $patient = User::query()->findOrFail($userId);

        $personalization = Personalization::query()
            ->where('patient_id', $patient->id)
            ->orderByDesc('updated_at')
            ->first();

        if (! $personalization) {
            $personalization = new Personalization();
            $personalization->patient_id = $patient->id;
            $personalization->data = [];
        }

        $data = is_array($personalization->data) ? $personalization->data : [];

        $data[$key] = [
            'title' => $request->input('title') ?? $key,
            'value' => $request->input('value'),
            'note' => $request->input('note'),
            'category' => $request->input('category'),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ];

        $personalization->data = $data;
        $personalization->save();

        return response()->json(['ok' => true]);
    }

    public function delete(Request $request, string $key)
    {
        $userId = (int) session()->get('auth_user_id');
        if (! $userId) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }

        $patient = User::query()->findOrFail($userId);

        $personalization = Personalization::query()
            ->where('patient_id', $patient->id)
            ->orderByDesc('updated_at')
            ->first();

        if (! $personalization) {
            return response()->json(['ok' => true]);
        }

        $data = is_array($personalization->data) ? $personalization->data : [];
        unset($data[$key]);

        $personalization->data = $data;
        $personalization->save();

        return response()->json(['ok' => true]);
    }
}
