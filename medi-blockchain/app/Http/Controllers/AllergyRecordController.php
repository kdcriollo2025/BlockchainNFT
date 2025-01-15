<?php

namespace App\Http\Controllers;

use App\Models\AllergyRecord;
use App\Models\MedicalHistory;
use Illuminate\Http\Request;

class AllergyRecordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $allergyRecords = AllergyRecord::all();
        return view('allergy_records.index', compact('allergyRecords'));
    }

    public function create()
    {
        $medicalHistories = MedicalHistory::all();
        return view('allergy_records.form', compact('medicalHistories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'medical_history_id' => 'required|integer',
            'allergy_type' => 'required|string|max:100',
            'reaction' => 'required|string|max:100',
            'date' => 'required|date',
        ]);

        AllergyRecord::create($request->all());
        return redirect()->route('allergy_records.index')->with('success', 'Allergy Record created successfully.');
    }

    public function show(AllergyRecord $allergyRecord)
    {
        $medicalHistories = MedicalHistory::all();
        return view('allergy_records.form', compact('allergyRecord', 'medicalHistories'));
    }

    public function edit(AllergyRecord $allergyRecord)
    {
        $medicalHistories = MedicalHistory::all();
        return view('allergy_records.form', compact('allergyRecord', 'medicalHistories'));
    }

    public function update(Request $request, AllergyRecord $allergyRecord)
    {
        $request->validate([
            'medical_history_id' => 'required|integer',
            'allergy_type' => 'required|string|max:100',
            'reaction' => 'required|string|max:100',
            'date' => 'required|date',
        ]);

        $allergyRecord->update($request->all());
        return redirect()->route('allergy_records.index')->with('success', 'Allergy Record updated successfully.');
    }

    public function destroy(AllergyRecord $allergyRecord)
    {
        $allergyRecord->delete();
        return redirect()->route('allergy_records.index')->with('success', 'Allergy Record deleted successfully.');
    }
}
