@extends('layout.mainlayout')

@section("body")
	<div class="container">

			<h5>Create a company</h5>
			<div class="row">
				<div class="col-sm-6">
					<form method="POST" action="/companies">
						{{ csrf_field() }}

						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control" id="inputName" name="name">
						</div>

						<div class="form-group">
							<label>Description</label>
							<textarea type="text" class="form-control" name="description"></textarea>
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