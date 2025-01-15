@extends('adminlte::page')

@section('title', 'Registros de Terapia')

@section('content_header')
    <h1>Registros de Terapia</h1>
@stop

@section('content')
    <form action="{{ !isset($therapyRecord) ? route('therapy_records.store') : route('therapy_records.update', ['therapy_record' => $therapyRecord->id]) }}"
          method="POST">
        @csrf
        @if (isset($therapyRecord))
            @method('PUT')
        @endif

        <div class="row mb-3">
            <div class="col-6">
                <label for="medical_history_id" class="form-label">Paciente (Historia medica)</label>
                <select name="medical_history_id" id="medical_history_id" class="form-control {{ $errors->has('medical_history_id') ? 'is-invalid' : '' }}">
                    <option value="" {{ !isset($therapyRecord) ? 'selected' : '' }} disabled>Seleccione...</option>
                    @foreach($medicalHistories as $medicalHistory)
                        <option value="{{ $medicalHistory->id }}" {{ isset($therapyRecord) && $therapyRecord->medicalHistory->id == $medicalHistory->id ? 'selected' : '' }}>{{ $medicalHistory->patient->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('medical_history_id'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ __($errors->first('medical_history_id')) }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-6">
                <label for="type" class="form-label">Tipo de Terapia</label>
                <input type="text" class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" id="type"
                       name="type" value="{{ isset($therapyRecord) ? $therapyRecord->type : old('type') }}">
                @if ($errors->has('type'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ __($errors->first('type')) }}</strong>
                    </span>
                @endif
            </div>

            <div class="col-6">
                <label for="therstart_date" class="form-label">Fecha de Inicio</label>
                <input type="date" class="form-control {{ $errors->has('start_date') ? 'is-invalid' : '' }}" id="start_date"
                       name="start_date" value="{{ isset($therapyRecord) ? $therapyRecord->start_date : old('start_date') }}">
                @if ($errors->has('start_date'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ __($errors->first('start_date')) }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-6">
                <label for="end_date" class="form-label">Fecha de Finalización</label>
                <input type="date" class="form-control {{ $errors->has('end_date') ? 'is-invalid' : '' }}" id="end_date"
                       name="end_date" value="{{ isset($therapyRecord) ? $therapyRecord->end_date : old('end_date') }}">
                @if ($errors->has('end_date'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ __($errors->first('end_date')) }}</strong>
                    </span>
                @endif
            </div>

            <div class="col-12">
                <label for="detail" class="form-label">Notas de la Terapia</label>
                <input type="text" class="form-control {{ $errors->has('detail') ? 'is-invalid' : '' }}" id="detail"
                       name="detail" value="{{ isset($therapyRecord) ? $therapyRecord->detail : old('detail') }}">
                @if ($errors->has('detail'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ __($errors->first('detail')) }}</strong>
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
