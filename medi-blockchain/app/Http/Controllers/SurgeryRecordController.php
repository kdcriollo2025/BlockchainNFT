<?php

namespace App\Http\Controllers;

use App\Models\MedicalHistory;
use App\Models\SurgeryRecord;
use Illuminate\Http\Request;

class SurgeryRecordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $surgeryRecords = SurgeryRecord::all();
        return view('surgery_records.index', compact('surgeryRecords'));
    }

    public function create()
    {
        $medicalHistories = MedicalHistory::all();
        return view('surgery_records.form', compact('medicalHistories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'medical_history_id' => 'required|integer',
            'type' => 'required|string|max:64',
            'date' => 'required|date',
            'details' => 'required|string|max:152',
        ]);

        SurgeryRecord::create($request->all());
        return redirect()->route('surgery_records.index')->with('success', 'Surgery Record created successfully.');
    }

    public function show(SurgeryRecord $surgeryRecord)
    {
        $medicalHistories = MedicalHistory::all();
        return view('surgery_records.form', compact('surgeryRecord', 'medicalHistories'));
    }

    public function edit(SurgeryRecord $surgeryRecord)
    {
        $medicalHistories = MedicalHistory::all();
        return view('surgery_records.form', compact('surgeryRecord', 'medicalHistories'));
    }

    public function update(Request $request, SurgeryRecord $surgeryRecord)
    {
        $request->validate([
            'medical_history_id' => 'required|integer',
            'type' => 'required|string|max:64',
            'date' => 'required|date',
            'details' => 'required|string|max:152',
        ]);

        $surgeryRecord->update($request->all());
        return redirect()->route('surgery_records.index')->with('success', 'Surgery Record updated successfully.');
    }

    public function destroy(SurgeryRecord $surgeryRecord)
    {
        $surgeryRecord->delete();
        return redirect()->route('surgery_records.index')->with('success', 'Surgery Record deleted successfully.');
    }
}
