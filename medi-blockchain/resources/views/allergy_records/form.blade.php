@extends('adminlte::page')

@section('title', 'Registros de Alergia')

@section('content_header')
    <h1>Registros de Alergia</h1>
@stop

@section('content')
    <form action="{{ !isset($allergyRecord) ? route('allergy_records.store') : route('allergy_records.update', ['allergy_record' => $allergyRecord->id]) }}"
          method="POST">
        @csrf
        @if (isset($allergyRecord))
            @method('PUT')
        @endif

        <div class="row mb-3">
            <div class="col-6">
                <label for="medical_history_id" class="form-label">Paciente (Historia medica)</label>
                <select name="medical_history_id" id="medical_history_id" class="form-control {{ $errors->has('medical_history_id') ? 'is-invalid' : '' }}">
                    <option value="" {{ !isset($allergyRecord) ? 'selected' : '' }} disabled>Seleccione...</option>
                    @foreach($medicalHistories as $medicalHistory)
                        <option value="{{ $medicalHistory->id }}" {{ isset($allergyRecord) && $allergyRecord->medicalHistory->id == $medicalHistory->id ? 'selected' : '' }}>{{ $medicalHistory->patient->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('medical_history_id'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ __($errors->first('medical_history_id')) }}</strong>
                    </span>
                @endif
            </div>

            <div class="col-6">
                <label for="allergy_type" class="form-label">Alergia</label>
                <input type="text" class="form-control {{ $errors->has('allergy_type') ? 'is-invalid' : '' }}" id="allergy_type"
                       name="allergy_type" value="{{ isset($allergyRecord) ? $allergyRecord->allergy_type : old('allergy_type') }}">
                @if ($errors->has('allergy_type'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ __($errors->first('allergy_type')) }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-6">
                <label for="date" class="form-label">Fecha de Diagnóstico</label>
                <input type="date" class="form-control {{ $errors->has('date') ? 'is-invalid' : '' }}" id="date"
                       name="date" value="{{ isset($allergyRecord) ? $allergyRecord->date : old('date') }}">
                @if ($errors->has('date'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ __($errors->first('date')) }}</strong>
                    </span>
                @endif
            </div>

            <div class="col-6">
                <label for="reaction" class="form-label">Severidad</label>
                <input type="text" class="form-control {{ $errors->has('reaction') ? 'is-invalid' : '' }}" id="reaction"
                       name="reaction" value="{{ isset($allergyRecord) ? $allergyRecord->reaction : old('reaction') }}">
                @if ($errors->has('reaction'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ __($errors->first('reaction')) }}</strong>
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
