@extends('layouts.app')

@section('content')
	@component('../components/section-card')
	<div id="app">
		<div class="container">
			<div class="row pt-3">
				<div class="col-3">
					<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						@foreach($documents as $document)
							<a class="nav-link @if ($loop->first) active @endif" id="v-pills-home-tab" 
								data-toggle="pill" 
								href="#{{$document->requeriment->id}}-pills" 
								role="tab" 
								aria-controls="{{$document->requeriment->id}}-pills" 
								aria-selected="false">{{$document->requeriment->name}}</a>
						@endforeach
					</div>
				</div>
				<div class="col-9">
					<div class="tab-content p-0" id="v-pills-tabContent">
					@foreach($documents as $document)
						<div class="tab-pane fade @if ($loop->first) active show @endif" 
						id="{{$document->requeriment->id}}-pills" role="tabpanel" aria-labelledby="{{$document->requeriment->id}}-pills">
						<embed width="100%" height="500px" type="application/pdf" internalinstanceid="5" src="{{ asset(Storage::url($document->file_path)) }}">
						</div>
					@endforeach
					</div>
			  </div>
			</div>
		</div>
	</div>
	@endcomponent
@endsection

