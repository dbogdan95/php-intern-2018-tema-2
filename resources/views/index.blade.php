@extends('layout.mainlayout')

@section("body")
    <div class="container">

        <!-- Page Heading -->
        <h1 class="my-4">Page Heading
            <small>Secondary Text</small>
        </h1>
  
        <div class="row">
            @foreach($companies as $company)
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $company->name }}</h5>
                            <p class="card-text">{{ $company->description }}</p>
                            <br>

                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                             
                              <button type="button" class="btn btn-secondary" onclick="location.href ='{{ route('showEmployees', $company->id) }}'">Vezi angajatii</button>

                              <div class="btn-group" role="group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                  <a class="dropdown-item" href="{{route('destroyCompany', $company->id)}}">Delete</a>
                                  <!--<a class="dropdown-item" href="#">Edit</a>-->
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection