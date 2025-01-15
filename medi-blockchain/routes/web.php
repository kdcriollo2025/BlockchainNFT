<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MedicalHistoryController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AllergyRecordController;
use App\Http\Controllers\SurgeryRecordController;
use App\Http\Controllers\MedicalConsultationRecordController;
use App\Http\Controllers\TherapyRecordController;
use App\Http\Controllers\VaccinationRecordController;

Route::get('/', function () {
    return redirect()->to('/home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('medical_histories', MedicalHistoryController::class);
Route::resource('patients', PatientController::class);
Route::resource('allergy_records', AllergyRecordController::class);
Route::resource('surgery_records', SurgeryRecordController::class);
Route::resource('medical_consultation_records', MedicalConsultationRecordController::class);
Route::resource('therapy_records', TherapyRecordController::class);
Route::resource('vaccination_records', VaccinationRecordController::class);
