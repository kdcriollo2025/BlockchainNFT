@extends('adminlte::page')

@section('title', 'Registros de Cirugía')

@section('content_header')
    <h1>Registros de Cirugía</h1>
@stop

@section('content')
    <form action="{{ !isset($surgeryRecord) ? route('surgery_records.store') : route('surgery_records.update', ['surgery_record' => $surgeryRecord->id]) }}"
          method="POST">
        @csrf
        @if (isset($surgeryRecord))
            @method('PUT')
        @endif

        <div class="row mb-3">
            <div class="col-4">
                <label for="medical_history_id" class="form-label">Paciente (Historia medica)</label>
                <select name="medical_history_id" id="medical_history_id" class="form-control {{ $errors->has('medical_history_id') ? 'is-invalid' : '' }}">
                    <option value="" {{ !isset($surgeryRecord) ? 'selected' : '' }} disabled>Seleccione...</option>
                    @foreach($medicalHistories as $medicalHistory)
                        <option value="{{ $medicalHistory->id }}" {{ isset($surgeryRecord) && $surgeryRecord->medicalHistory->id == $medicalHistory->id ? 'selected' : '' }}>{{ $medicalHistory->patient->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('medical_history_id'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ __($errors->first('medical_history_id')) }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-4">
                <label for="type" class="form-label">Tipo de Cirugía</label>
                <input type="text" class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" id="type"
                       name="type" value="{{ isset($surgeryRecord) ? $surgeryRecord->type : old('type') }}">
                @if ($errors->has('type'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ __($errors->first('type')) }}</strong>
                    </span>
                @endif
            </div>

            <div class="col-4">
                <label for="date" class="form-label">Fecha de Cirugía</label>
                <input type="date" class="form-control {{ $errors->has('date') ? 'is-invalid' : '' }}" id="date"
                       name="date" value="{{ isset($surgeryRecord) ? $surgeryRecord->date : old('date') }}">
                @if ($errors->has('date'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ __($errors->first('date')) }}</strong>
                    </span>
                @endif
            </div>

            <div class="col-12">
                <label for="details" class="form-label">Detalles de la Cirugía</label>
                <input type="text" class="form-control {{ $errors->has('details') ? 'is-invalid' : '' }}" id="details"
                       name="details" value="{{ isset($surgeryRecord) ? $surgeryRecord->details : old('details') }}">
                @if ($errors->has('details'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ __($errors->first('details')) }}</strong>
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
