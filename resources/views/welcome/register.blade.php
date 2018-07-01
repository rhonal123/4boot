@extends('welcome.app')
<div class="section bg-gradient" >  
	<div class="container">
		<div>
			<div class="card">
			  <div class="card-body">
					<form action="{{ route('register.company') }}" method="post" enctype="multipart/form-data">
					  <input type="hidden" name="_token" value="{{ csrf_token() }}"> 

					  <div class="form-group">
					    <label for="identity">Identidad </label>
					    <input type="text" 
					    	name="identity" 
					    	value="{{ old('identity') }}"
								class="form-control {{ $errors->has('identity') ? ' is-invalid' : '' }}" 
					    	placeholder="RIF">
								@if ($errors->has('identity'))  
						      <div class="invalid-feedback">
						        {{ $errors->first('identity') }}
						      </div>
								@endif
					  </div>

					  <div class="form-group">
					    <label for="name">Nombre </label>
					    <input type="text" 
					    	name="name" 
								value="{{ old('name') }}"
					    	class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" 
					    	placeholder="Nombre de la organización">
								@if ($errors->has('name'))  
						      <div class="invalid-feedback">
						        {{ $errors->first('name') }}
						      </div>
								@endif
					  </div>
 
					  <div class="form-group">
					    <label for="address">Dirección </label>
					    <textarea name="address" 
								class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}" 
					    	id="address">{{ old('address') }}</textarea>
								@if ($errors->has('address'))  
						      <div class="invalid-feedback">
						        {{ $errors->first('address') }}
						      </div>
								@endif
					  </div>

					  <div class="form-group">
					    <label for="phone">Telefono </label>
					    <input type="text"
					    	name="phone" 
								value="{{ old('phone') }}"
								class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="####-#######">
								@if ($errors->has('phone'))  
						      <div class="invalid-feedback">
						        {{ $errors->first('phone') }}
						      </div>
								@endif
					  </div>


					  <div class="form-group">
					    <label for="email">Correo Electronico </label>
					    <input type="text"
					    	name="email" 
								value="{{ old('email') }}"
								class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="email@gmail.com">
								@if ($errors->has('email'))  
						      <div class="invalid-feedback">
						        {{ $errors->first('email') }}
						      </div>
								@endif
					  </div>

					  <div class="form-group">
					    <label for="catalogo_path">Catalogo de servicios </label>
					    <input type="file"
					    	name="catalogo_path" 
								value="{{ old('catalogo_path') }}"
								accept="application/pdf"
								class="form-control {{ $errors->has('catalogo_path') ? ' is-invalid' : '' }}">
								@if ($errors->has('catalogo_path'))  
						      <div class="invalid-feedback">
						        {{ $errors->first('catalogo_path') }}
						      </div>
								@endif      
					  </div>



					  <div class="form-group">
					    <label for="company_type_id">Clasificación </label>
					    <select id="company_type_id" 
					    	name="company_type_id" 
					    	class="form-control {{ $errors->has('company_type_id') ? ' is-invalid' : '' }}">
					    	@foreach($types as $type)
					    		@if(old('company_type_id') == $type->id)
						    		<option value="{{$type->id}}" selected>{{$type->type}}</option>
						    	@else
						    		<option 
						    			value="{{$type->id}}" 
						    			{{ old('company_type_id') == null && $loop->last ? "selected":"" }}>
						    			{{$type->type}}
						    			</option>
					    		@endif 
					    	@endforeach
					    </select>
							@if ($errors->has('company_type_id'))  
					      <div class="invalid-feedback">
					        {{ $errors->first('company_type_id') }}
					      </div>
							@endif
					  </div>
  				  <button type="submit" class="btn btn-primary">Registrar</button>
					</form>
			  </div>
			</div>
		</div>		
	</div>
</div>