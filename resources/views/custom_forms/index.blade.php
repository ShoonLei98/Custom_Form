@extends('layouts.app')

@section('content')
    <div class="container">
        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif
        <div class="card">
            {{--start to choose input fields --}}
            <div class="card-header">
                <h3 for="" class="">Fields on the form</h3>
                <div class="row">
                    <div class="col mt-2 mr-3">
                        <span>
                            <input type="checkbox" name="" id="chkName">
                        </span>
                        <label for="">Name</label>
                    </div>
                    <div class="col mt-2 mr-3">
                        <span>
                            <input type="checkbox" name="" id="chkPhone">
                        </span>
                        <label for="">Phone Number</label>
                    </div>
                    <div class="col mt-2 mr-3">
                        <span>
                            <input type="checkbox" name="" id="chkDOB">
                        </span>
                        <label for="">Date Of Birth</label>
                    </div>
                    <div class="col mt-2 mr-3">
                        <span>
                            <input type="checkbox" name="" id="chkGender">
                        </span>
                        <label for="">Gender</label>
                    </div>
                </div>                
            </div>
            {{--end to choose input fields --}}
            <div class="card-body">
                <form action="{{ route('custom_forms.store') }}" method="POST">
                    @csrf
                    {{-- for name field--}}
                    <div class="form-group row text-center mb-3" id="name" style="display: none;">
                        <label for="" class="col-sm-2 col-form-lablel">Name</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="name">
                        </div>
                    </div>
                    {{-- for phone number field --}}
                    <div class="form-group row text-center mb-3" id="phone" style="display: none;">
                        <label for="" class="col-sm-2 col-form-lablel">Phone Number</label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" name="phone">
                        </div>
                    </div>
                    {{-- for date of birth field --}}
                    <div class="form-group row text-center mb-3" id="DOB" style="display: none;">
                        <label for="" class="col-sm-2 col-form-lablel">Date Of Birth</label>
                        <div class="col-sm-4">
                            <input type="date" class="form-control" name="birth_date">
                        </div>
                    </div>
                    {{-- for gender field --}}
                    <div class="form-group row text-center mb-3" id="gender" style="display: none;">
                        <label for="" class="col-sm-2 col-form-lablel">Gender</label>
                        <div class="col-sm-4">
                            <select name="gender" class="form-control">
                                <option value="">Choose Options</option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                                <option value="3">Other</option>
                              </select>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success text-center">Submit</button>
                        <a href="{{ route('custom_forms.index') }}"><button type="button" class="btn btn-info text-center">Cancel</button></a>
                    </div>
                </form>
            </div>            
        </div>

        {{-- show custom form data --}}
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap text-center">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Date Of Birth</th>
                  <th>Gender</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($forms as $form)
                    <tr>
                        <td>{{ $form->id }}</td>
                        <td>{{ $form->name }}</td>
                        <td>{{ $form->phone }}</td>
                        <td>{{ $form->birth_date }}</td>
                        <td>
                            @if ($form->gender == 1)
                               Male
                            @elseif ($form->gender == 2)
                               Female
                            @elseif ($form->gender == 3)
                                Other
                            @else
                                -
                            @endif
                        </td>
                        <td>
                        <a href="{{ route('custom_forms.edit', $form->id) }}">
                            <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button>
                        </a>
                        <form action="{{ route('custom_forms.destroy', $form->id) }}" method="POST">
                            @csrf                        
                            @method('DELETE')
                        
                            <button type="submit" class="btn btn-danger btn-block"><i class="fas fa-trash-alt"></i></button>
                        </form>
                        {{-- <a href="{{ route('custom_forms.destroy', $form->id) }}">
                            <button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button>
                        </a> --}}
                        </td>
                    </tr>
                  @endforeach

              </tbody>
            </table>
          </div>
    </div>
@endsection

{{--start javaScript --}}
@section('jScript')

<script>
    $(document).ready(function(){
        $("input[type='checkbox']").on("click", function(){
            if($('#chkName').is(':checked'))
            {
                $("#name").show();
            }
            else
            {
                $("#name").hide();
            }
            if($('#chkPhone').is(':checked'))
            {
                $("#phone").show();
            }
            else
            {
                $("#phone").hide();
            }
            if($('#chkDOB').is(':checked'))
            {
                $("#DOB").show();
            }
            else
            {
                $("#DOB").hide();
            }
            if($('#chkGender').is(':checked'))
            {
                $("#gender").show();
            }
            else
            {
                $("#gender").hide();
            }            
        });
    });
</script>
@endsection
{{--end javaScript --}}