<?php

namespace App\Http\Controllers;

use App\Models\MedicalConsultationRecord;
use App\Models\MedicalHistory;
use Illuminate\Http\Request;

class MedicalConsultationRecordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $medicalConsultationRecords = MedicalConsultationRecord::all();
        return view('medical_consultation_records.index', compact('medicalConsultationRecords'));
    }

    public function create()
    {
        $medicalHistories = MedicalHistory::all();
        return view('medical_consultation_records.form', compact('medicalHistories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'medical_history_id' => 'required|integer',
            'consultation_date' => 'required|date',
            'reported_symptoms' => 'required|string|max:300',
            'diagnosis' => 'required|string|max:300',
            'treatment' => 'required|string|max:300',
        ]);

        MedicalConsultationRecord::create($request->all());
        return redirect()->route('medical_consultation_records.index')->with('success', 'Medical Consultation Record created successfully.');
    }

    public function show(MedicalConsultationRecord $medicalConsultationRecord)
    {
        $medicalHistories = MedicalHistory::all();
        return view('medical_consultation_records.form', compact('medicalConsultationRecord', 'medicalHistories'));
    }

    public function edit(MedicalConsultationRecord $medicalConsultationRecord)
    {
        $medicalHistories = MedicalHistory::all();
        return view('medical_consultation_records.form', compact('medicalConsultationRecord', 'medicalHistories'));
    }

    public function update(Request $request, MedicalConsultationRecord $medicalConsultationRecord)
    {
        $request->validate([
            'medical_history_id' => 'required|integer',
            'consultation_date' => 'required|date',
            'reported_symptoms' => 'required|string|max:300',
            'diagnosis' => 'required|string|max:300',
            'treatment' => 'required|string|max:300',
        ]);

        $medicalConsultationRecord->update($request->all());
        return redirect()->route('medical_consultation_records.index')->with('success', 'Medical Consultation Record updated successfully.');
    }

    public function destroy(MedicalConsultationRecord $medicalConsultationRecord)
    {
        $medicalConsultationRecord->delete();
        return redirect()->route('medical_consultation_records.index')->with('success', 'Medical Consultation Record deleted successfully.');
    }
}
