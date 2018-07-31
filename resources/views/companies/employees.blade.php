@extends('layout.mainlayout')

@section("body")
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-8">
                <h2>{{ $companyName }}</h2>
            </div>
            
            <div class="col-xs-6 col-md-4">
                <button type="button" class="btn btn-success" onclick="$('.modal').modal('show')" style="float:right;">Hire</button>
            </div>
        </div>          
        
        <p>Lista angajatilor din companie</p>  
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nume</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($companyEmployees as $employee)
                    <tr>
                        <td>{{ $employee->name }}</td>
                        <td align="right">
                            <button type="button" class="btn btn-danger" onclick="location.href = '{{ route('fireEmployee', [ $companyId, $employee->id ]) }}'">Fires</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="hireModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hire</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{route('hireEmployee')}}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden"name="company" value="{{$companyId}}">

                    <div class="modal-body">
                        <div class="form-group">
                            <label>Available employees</label>
                            <select class="form-control" name="employees">
                                @foreach($unemployeds as $unemployed)
                                    <option value="{{$unemployed->id}}">{{$unemployed->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                        @if(!empty($unemployed))
                            <button type="submit" class="btn btn-primary">Confirm</button>
                        @endif
                    </div>                  
                </form>
            </div>
        </div>
    </div>   
@endsection