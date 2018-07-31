@extends('layout.mainlayout')

@section("body")
    <div class="container">

		<h2>Striped Rows</h2>
		<p>The .table-striped class adds zebra-stripes to a table:</p>            
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Name</th>
					<th>Company</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($employees as $employee)
					<tr>
						<td>{{$employee->name}}</td>

						@if($employee->company->id == 0)
							<td>unemployed</td>
						@else
							<td>{{$employee->company->name}}</td>
						@endif
						<td align="right"> <button type="button" class="btn btn-danger" onclick="location.href = '{{ route('destroyEmployee', $employee->id) }}'">Delete</button>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection