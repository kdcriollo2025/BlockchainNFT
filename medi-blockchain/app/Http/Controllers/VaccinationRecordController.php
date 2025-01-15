<?php

namespace App\Http\Controllers;

use App\Models\MedicalHistory;
use App\Models\VaccinationRecord;
use Illuminate\Http\Request;

class VaccinationRecordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $vaccinationRecords = VaccinationRecord::all();
        return view('vaccination_records.index', compact('vaccinationRecords'));
    }

    public function create()
    {
        $medicalHistories = MedicalHistory::all();
        return view('vaccination_records.form', compact('medicalHistories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'medical_history_id' => 'required|integer',
            'name' => 'required|string|max:36',
            'date' => 'required|date',
            'dose' => 'required|integer',
        ]);

        VaccinationRecord::create($request->all());
        return redirect()->route('vaccination_records.index')->with('success', 'Vaccination Record created successfully.');
    }

    public function show(VaccinationRecord $vaccinationRecord)
    {
        $medicalHistories = MedicalHistory::all();
        return view('vaccination_records.form', compact('vaccinationRecord', 'medicalHistories'));
    }

    public function edit(VaccinationRecord $vaccinationRecord)
    {
        $medicalHistories = MedicalHistory::all();
        return view('vaccination_records.form', compact('vaccinationRecord', 'medicalHistories'));
    }

    public function update(Request $request, VaccinationRecord $vaccinationRecord)
    {
        $request->validate([
            'medical_history_id' => 'required|integer',
            'name' => 'required|string|max:36',
            'date' => 'required|date',
            'dose' => 'required|integer',
        ]);

        $vaccinationRecord->update($request->all());
        return redirect()->route('vaccination_records.index')->with('success', 'Vaccination Record updated successfully.');
    }

    public function destroy(VaccinationRecord $vaccinationRecord)
    {
        $vaccinationRecord->delete();
        return redirect()->route('vaccination_records.index')->with('success', 'Vaccination Record deleted successfully.');
    }
}
