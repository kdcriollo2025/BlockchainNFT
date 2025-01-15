@extends('adminlte::page')

@section('title', 'Registros de Vacunación')

@section('content_header')
    <h1>Registros de Vacunación</h1>
@stop

@section('content')
    <form action="{{ !isset($vaccinationRecord) ? route('vaccination_records.store') : route('vaccination_records.update', ['vaccination_record' => $vaccinationRecord->id]) }}"
          method="POST">
        @csrf
        @if (isset($vaccinationRecord))
            @method('PUT')
        @endif

        <div class="row mb-3">
            <div class="col-4">
                <label for="medical_history_id" class="form-label">Paciente (Historia medica)</label>
                <select name="medical_history_id" id="medical_history_id" class="form-control {{ $errors->has('medical_history_id') ? 'is-invalid' : '' }}">
                    <option value="" {{ !isset($vaccinationRecord) ? 'selected' : '' }} disabled>Seleccione...</option>
                    @foreach($medicalHistories as $medicalHistory)
                        <option value="{{ $medicalHistory->id }}" {{ isset($vaccinationRecord) && $vaccinationRecord->medicalHistory->id == $medicalHistory->id ? 'selected' : '' }}>{{ $medicalHistory->patient->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('medical_history_id'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ __($errors->first('medical_history_id')) }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-4">
                <label for="name" class="form-label">Vacuna</label>
                <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name"
                       name="name" value="{{ isset($vaccinationRecord) ? $vaccinationRecord->name : old('name') }}">
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ __($errors->first('name')) }}</strong>
                    </span>
                @endif
            </div>

            <div class="col-4">
                <label for="date" class="form-label">Fecha de Vacunación</label>
                <input type="date" class="form-control {{ $errors->has('date') ? 'is-invalid' : '' }}" id="date"
                       name="date" value="{{ isset($vaccinationRecord) ? $vaccinationRecord->date : old('date') }}">
                @if ($errors->has('date'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ __($errors->first('date')) }}</strong>
                    </span>
                @endif
            </div>

            <div class="col-12">
                <label for="dose" class="form-label">Dosis</label>
                <input type="number" class="form-control {{ $errors->has('dose') ? 'is-invalid' : '' }}" id="dose"
                       name="dose" value="{{ isset($vaccinationRecord) ? $vaccinationRecord->dose : old('dose') }}">
                @if ($errors->has('dose'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ __($errors->first('dose')) }}</strong>
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
