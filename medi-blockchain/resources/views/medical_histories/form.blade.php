@extends('adminlte::page')

@section('title', 'Historial Médico')

@section('content_header')
    <h1>Historial Médico</h1>
@stop

@section('content')
    <form action="{{ !isset($medicalHistory) ? route('medical_histories.store') : route('medical_histories.update', ['medical_history' => $medicalHistory->id]) }}"
          method="POST">
        @csrf
        @if (isset($medicalHistory))
            @method('PUT')
        @endif

        <div class="row mb-3">
            <div class="col-6">
                <label for="patient_id" class="form-label">Paciente</label>
                <select name="patient_id" id="patient_id" class="form-control {{ $errors->has('patient_id') ? 'is-invalid' : '' }}">
                    <option value="" {{ !isset($medicalHistory) ? 'selected' : '' }} disabled>Seleccione...</option>
                    @foreach($patients as $patient)
                        <option value="{{ $patient->id }}" {{ isset($medicalHistory) && $medicalHistory->patient_id == $patient->patient_id ? 'selected' : '' }}>{{ $patient->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('patient_id'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ __($errors->first('patient_id')) }}</strong>
                    </span>
                @endif
            </div>

            <div class="col-6">
                <label for="creation_date" class="form-label">Fecha de Creación</label>
                <input type="date" class="form-control {{ $errors->has('creation_date') ? 'is-invalid' : '' }}" id="creation_date"
                       name="creation_date" value="{{ isset($medicalHistory) ? $medicalHistory->creation_date : old('creation_date') }}">
                @if ($errors->has('creation_date'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ __($errors->first('creation_date')) }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12">
                <label for="hash" class="form-label">Hash</label>
                <input type="text" class="form-control {{ $errors->has('hash') ? 'is-invalid' : '' }}" id="hash"
                       name="hash" value="{{ isset($medicalHistory) ? $medicalHistory->hash : old('hash') }}">
                @if ($errors->has('hash'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ __($errors->first('hash')) }}</strong>
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
