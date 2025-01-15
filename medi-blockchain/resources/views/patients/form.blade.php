@extends('adminlte::page')

@section('title', 'Pacientes')

@section('content_header')
    <h1>Pacientes</h1>
@stop

@section('content')
    <form action="{{ isset($patient) ? route('patients.update', ['patient' => $patient->id]) : route('patients.store') }}"
          method="POST">
        @csrf
        @if (isset($patient))
            @method('PUT')
        @endif

        <div class="row mb-3">
            <div class="col-4">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name"
                       name="name" value="{{ isset($patient) ? $patient->name : old('name') }}">
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ __($errors->first('name')) }}</strong>
                    </span>
                @endif
            </div>

            <div class="col-4">
                <label for="birth_date" class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control {{ $errors->has('birth_date') ? 'is-invalid' : '' }}" id="birth_date"
                       name="birth_date" value="{{ isset($patient) ? $patient->birth_date : old('birth_date') }}">
                @if ($errors->has('birth_date'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ __($errors->first('birth_date')) }}</strong>
                    </span>
                @endif
            </div>

            <div class="col-4">
                <label for="gender" class="form-label">Género</label>
                <input type="text" class="form-control {{ $errors->has('gender') ? 'is-invalid' : '' }}" id="gender"
                       name="gender" value="{{ isset($patient) ? $patient->gender : old('gender') }}">
                @if ($errors->has('gender'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ __($errors->first('gender')) }}</strong>
                    </span>
                @endif
            </div>

            <div class="col-4">
                <label for="address" class="form-label">Dirección</label>
                <input type="text" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" id="address"
                       name="address" value="{{ isset($patient) ? $patient->address : old('address') }}">
                @if ($errors->has('address'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ __($errors->first('address')) }}</strong>
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
