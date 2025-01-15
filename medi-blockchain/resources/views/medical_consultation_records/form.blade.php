@extends('adminlte::page')

@section('title', 'Consultas Médicas')

@section('content_header')
    <h1>Consultas Médicas</h1>
@stop

@section('content')
    <form action="{{ !isset($medicalConsultationRecord) ? route('medical_consultation_records.store') : route('medical_consultation_records.update', ['medical_consultation_record' => $medicalConsultationRecord->id]) }}"
          method="POST">
        @csrf
        @if (isset($medicalConsultationRecord))
            @method('PUT')
        @endif

        <div class="row mb-3">
            <div class="col-6">
                <label for="medical_history_id" class="form-label">Paciente (Historia medica)</label>
                <select name="medical_history_id" id="medical_history_id" class="form-control {{ $errors->has('medical_history_id') ? 'is-invalid' : '' }}">
                    <option value="" {{ !isset($medicalConsultationRecord) ? 'selected' : '' }} disabled>Seleccione...</option>
                    @foreach($medicalHistories as $medicalHistory)
                        <option value="{{ $medicalHistory->id }}" {{ isset($medicalConsultationRecord) && $medicalConsultationRecord->medicalHistory->id == $medicalHistory->id ? 'selected' : '' }}>{{ $medicalHistory->patient->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('medical_history_id'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ __($errors->first('medical_history_id')) }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-6">
                <label for="consultation_date" class="form-label">Fecha de Consulta</label>
                <input type="date" class="form-control {{ $errors->has('consultation_date') ? 'is-invalid' : '' }}" id="consultation_date"
                       name="consultation_date" value="{{ isset($medicalConsultationRecord) ? $medicalConsultationRecord->consultation_date : old('consultation_date') }}">
                @if ($errors->has('consultation_date'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ __($errors->first('consultation_date')) }}</strong>
                    </span>
                @endif
            </div>

            <div class="col-6">
                <label for="reported_symptoms" class="form-label">Síntomas Reportados</label>
                <input type="text" class="form-control {{ $errors->has('reported_symptoms') ? 'is-invalid' : '' }}" id="reported_symptoms"
                       name="reported_symptoms" value="{{ isset($medicalConsultationRecord) ? $medicalConsultationRecord->reported_symptoms : old('reported_symptoms') }}">
                @if ($errors->has('reported_symptoms'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ __($errors->first('reported_symptoms')) }}</strong>
                    </span>
                @endif
            </div>

            <div class="col-6">
                <label for="diagnosis" class="form-label">Diagnóstico</label>
                <input type="text" class="form-control {{ $errors->has('diagnosis') ? 'is-invalid' : '' }}" id="diagnosis"
                       name="diagnosis" value="{{ isset($medicalConsultationRecord) ? $medicalConsultationRecord->diagnosis : old('diagnosis') }}">
                @if ($errors->has('diagnosis'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ __($errors->first('diagnosis')) }}</strong>
                    </span>
                @endif
            </div>

            <div class="col-12">
                <label for="treatment" class="form-label">Tratamiento</label>
                <input type="text" class="form-control {{ $errors->has('treatment') ? 'is-invalid' : '' }}" id="treatment"
                       name="treatment" value="{{ isset($medicalConsultationRecord) ? $medicalConsultationRecord->treatment : old('treatment') }}">
                @if ($errors->has('treatment'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ __($errors->first('treatment')) }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="row p-3">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
