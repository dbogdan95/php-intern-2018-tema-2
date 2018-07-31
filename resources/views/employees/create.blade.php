@extends('layout.mainlayout')

@section("body")
	<div class="container">

		<h5>Create an employee</h5>
		<div class="row">
			<div class="col-sm-6">
				<form method="POST" action="/employees">
					{{ csrf_field() }}

					<div class="form-group">
						<label>Name</label>
						<input type="text" class="form-control" id="inputName" name="name">
					</div>
					<div class="form-group">
						<select class="custom-select" name="company_id">
							
							<option value="0">Not employeed</option>
							
							@foreach($companies as $company)
								<option value="{{$company->id}}">{{$company->name}}</option>
							@endforeach
						</select>
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>

					@if(count($errors))
						<hr>
						<div class="form-group">
							@foreach($errors->all() as $error)
								<div class="alert alert-danger">{{$error}}</div>
							@endforeach
						</div>	
					@endif	
					
				</form>				
			</div>
		</div>
	</div>
		
@endsection