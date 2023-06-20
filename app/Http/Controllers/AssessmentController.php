<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\Criteria;
use App\Models\User;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('view', Assessment::class);

        $month = $request->input('month', ltrim(date('m'), '0'));
        $year = $request->input('year', date('Y'));

        $assessments = Assessment::where('month', $month)
            ->where('year', $year)
            ->get();

        $groupedAssessments = $assessments->groupBy('user_uuid');

        return view('assessments.index', compact('groupedAssessments'));
    }

    public function create()
    {
        $this->authorize('create', Assessment::class);

        $existingUserUuids = Assessment::pluck('user_uuid')->all();
        $employees = User::where('role', 'karyawan')
            ->whereNotIn('uuid', $existingUserUuids)
            ->get();
        $criterias = Criteria::all();

        return view('assessments.create', compact('employees', 'criterias'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_uuid' => 'required',
            'month' => 'required|numeric',
            'year' => 'required|numeric'
        ]);

        $criterias = Criteria::all();

        foreach ($criterias as $criteria) {
            $inputName = str_replace(' ', '_', $criteria->name);

            $validatedData[$inputName] = 'required|numeric';
            $validatedData['criteria_id'] = $criteria->id;
            $validatedData['value'] = $request->input($inputName);

            Assessment::create($validatedData);
        }

        return redirect('assessments')->with('success', 'Penilaian berhasil ditambahkan');
    }

    public function edit($uuid)
    {
        $this->authorize('update', Assessment::class);

        $month = ltrim(date('m'), '0');
        $year = date('Y');

        $assessments = Assessment::where('month', $month)
            ->where('year', $year)
            ->where('user_uuid', $uuid)
            ->get();

        $groupedAssessments = $assessments->groupBy('user_uuid');
        $criterias = Criteria::all();

        return view('assessments.edit', compact('groupedAssessments', 'criterias'));
    }

    public function update(Request $request, $uuid)
    {
        $this->authorize('update', Assessment::class);

        $values = $request->input('values');

        foreach ($values as $assessmentId => $value) {
            $assessment = Assessment::where('id', $assessmentId)
                ->where('user_uuid', $uuid)
                ->first();

            if ($assessment) {
                $assessment->value = $value;
                $assessment->save();
            }
        }

        return redirect('assessments')->with('success', 'Penilaian berhasil diubah');
    }

    public function destroy($uuid)
    {
        $this->authorize('delete', Assessment::class);

        Assessment::where('user_uuid', $uuid)->delete();

        return redirect('assessments')->with('success', 'Penilaian berhasil dihapus');
    }

    public function bestEmployee(Request $request)
    {
        $this->authorize('view', Assessment::class);

        $month = $request->input('month', ltrim(date('m'), '0'));
        $year = $request->input('year', date('Y'));

        $criterias = Criteria::all();

        $resultsWj = [];

        $total = 0;

        foreach ($criterias as $criteria) {
            $total += $criteria->weight;
        }

        foreach ($criterias as $criteria) {
            $weightCorrection = $criteria->weight / $total;
            $resultsWj[] = [
                'category' => $criteria->category,
                'weightCorrection' => $weightCorrection
            ];
        }

        $assessments = Assessment::where('month', $month)
            ->where('year', $year)
            ->get()
            ->groupBy('user_uuid')
            ->map(function ($group, $userUuid) {
                return [
                    'user_uuid' => $userUuid,
                    'values' => $group->pluck('value')->toArray()
                ];
            })
            ->values()
            ->toArray();

        $resultsSi = [];

        foreach ($assessments as $row) {
            $product = 1;
            $values = $row['values'];

            for ($i = 0; $i < count($values) - 1; $i++) {
                $category = $resultsWj[$i]['category'];
                $weightCorrection = $resultsWj[$i]['weightCorrection'];

                $adjustedWeightCorrection = $category === 'Benefit' ? $weightCorrection : -$weightCorrection;

                $product *= pow($values[$i], $adjustedWeightCorrection);
            }

            $lastIndex = count($values) - 1;
            $lastCategory = $resultsWj[$lastIndex]['category'];
            $lastWeightCorrection = $resultsWj[$lastIndex]['weightCorrection'];

            $lastAdjustedWeightCorrection = $lastCategory === 'Benefit' ? $lastWeightCorrection : -$lastWeightCorrection;

            $resultSi = $product * pow($values[$lastIndex], $lastAdjustedWeightCorrection);

            $resultsSi[] = [
                'user_uuid' => $row['user_uuid'],
                'si' => $resultSi
            ];
        }

        $totalSi = 0;

        foreach ($resultsSi as $resultSi) {
            $totalSi += $resultSi['si'];
        }

        $nilaiVi = [];

        foreach ($resultsSi as $resultSi) {
            $vi = $resultSi['si'] / $totalSi;

            $userUuid = $resultSi['user_uuid'];

            $user = User::where('uuid', $userUuid)->first();

            if ($user) {
                $name = $user->name;
            } else {
                $name = "Unknown";
            }

            $resultsVi[] = [
                'user_uuid' => $resultSi['user_uuid'],
                'vi' => $vi,
                'name' => $name
            ];
        }

        return view('assessments.bestEmployee', compact('resultsWj', 'resultsSi', 'resultsVi'));
    }
}
