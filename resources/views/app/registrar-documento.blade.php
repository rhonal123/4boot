@extends('layouts.app')

@section('content')
	@component('../components/section-card')
	<div id="app">
        <div class="container">
            <div class="card-body row">
                <div class="col-md-7">
                <form method="POST"  action="{{ route('home-registrar-documento') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                    <div class="col">
                            <label class="col-form-label" for="requeriment_id">Requerimiento </label>
                            <select id="requeriment_id" class="custom-select" name="requeriment_id">
                                @foreach ($requeriments as $value)
                                    <option value="{{ $value->id }}">
                                        {{ $value->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label class="col-form-label" for="requeriment_id"> Documento PDF </label>
		    	            <input type="file"  class="custom-select" name="file" accept="application/pdf" required>
                        </div>
                    </div>
                    <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                Guardar
                            </button>
                    </div>
                </form>

                @if (count($errors) > 0)
                    <div class="error">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                </div>
                <div class="col-md-5">
                <div class="pt-2">
                    <p> <strong> Estas octando por el puesto </strong> {{ $company->companyType->type}} </p>
                    <p> Los Requisitos son los siguientes </p>
                    <div class="list-group">
                        @foreach($company->companyType->requeriments as $requeriment)
                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <p class="mb-1">{{$requeriment->code}} - {{$requeriment->name}}</p>
                            <small class="text-muted"{{$requeriment->require}}></small>
                        </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                </div>
            </div>
        </div>
	</div>
	@endcomponent
@endsection
