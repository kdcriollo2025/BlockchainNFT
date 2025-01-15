<?php

namespace App\Http\Controllers;

use App\Models\MedicalHistory;
use App\Models\Patient;
use Illuminate\Http\Request;

class MedicalHistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $medicalHistories = MedicalHistory::all();
        return view('medical_histories.index', compact('medicalHistories'));
    }

    public function create()
    {
        $patients = Patient::all();
        return view('medical_histories.form', compact('patients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required',
            //'creation_date' => 'required|date',
            'hash' => 'required|string|max:255',
        ]);

        MedicalHistory::create($request->all());
        return redirect()->route('medical_histories.index')->with('success', 'Medical History created successfully.');
    }

    public function show(MedicalHistory $medicalHistory)
    {
        $patients = Patient::all();
        return view('medical_histories.form', compact('medicalHistory', 'patients'));
    }

    public function edit(MedicalHistory $medicalHistory)
    {
        $patients = Patient::all();
        return view('medical_histories.form', compact('medicalHistory', 'patients'));
    }

    public function update(Request $request, MedicalHistory $medicalHistory)
    {
        $request->validate([
            'patient_id' => 'required',
            //'creation_date' => 'required|date',
            'hash' => 'required|string|max:255',
        ]);

        $medicalHistory->update($request->all());
        return redirect()->route('medical_histories.index')->with('success', 'Medical History updated successfully.');
    }

    public function destroy(MedicalHistory $medicalHistory)
    {
        $medicalHistory->delete();
        return redirect()->route('medical_histories.index')->with('success', 'Medical History deleted successfully.');
    }
}
