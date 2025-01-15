<?php

namespace App\Http\Controllers;

use App\Models\MedicalHistory;
use App\Models\TherapyRecord;
use Illuminate\Http\Request;

class TherapyRecordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $therapyRecords = TherapyRecord::all();
        return view('therapy_records.index', compact('therapyRecords'));
    }

    public function create()
    {
        $medicalHistories = MedicalHistory::all();
        return view('therapy_records.form', compact('medicalHistories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'medical_history_id' => 'required|integer',
            'type' => 'required|string|max:64',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'detail' => 'required|string|max:200',
        ]);

        TherapyRecord::create($request->all());
        return redirect()->route('therapy_records.index')->with('success', 'Therapy Record created successfully.');
    }

    public function show(TherapyRecord $therapyRecord)
    {
        $medicalHistories = MedicalHistory::all();
        return view('therapy_records.form', compact('therapyRecord', 'medicalHistories'));
    }

    public function edit(TherapyRecord $therapyRecord)
    {
        $medicalHistories = MedicalHistory::all();
        return view('therapy_records.form', compact('therapyRecord', 'medicalHistories'));
    }

    public function update(Request $request, TherapyRecord $therapyRecord)
    {
        $request->validate([
            'medical_history_id' => 'required|integer',
            'type' => 'required|string|max:64',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'detail' => 'required|string|max:200',
        ]);

        $therapyRecord->update($request->all());
        return redirect()->route('therapy_records.index')->with('success', 'Therapy Record updated successfully.');
    }

    public function destroy(TherapyRecord $therapyRecord)
    {
        $therapyRecord->delete();
        return redirect()->route('therapy_records.index')->with('success', 'Therapy Record deleted successfully.');
    }
}
