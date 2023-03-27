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
            <div class="card-body">
                <form action="{{ route('custom_forms.update', $form->id) }}" method="POST">
                    {{ method_field('PUT') }}
                    @csrf
                    {{-- for name field--}}
                    <div class="form-group row text-center mb-3" id="name">
                        <label for="" class="col-sm-2 col-form-lablel">Name</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="name" value="{{ $form->name }}">
                        </div>
                    </div>
                    {{-- for phone number field --}}
                    <div class="form-group row text-center mb-3" id="phone">
                        <label for="" class="col-sm-2 col-form-lablel">Phone Number</label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" name="phone" value="{{ $form->phone }}">
                        </div>
                    </div>
                    {{-- for date of birth field --}}
                    <div class="form-group row text-center mb-3" id="DOB">
                        <label for="" class="col-sm-2 col-form-lablel">Date Of Birth</label>
                        <div class="col-sm-4">
                            <input type="date" class="form-control" name="birth_date" value="{{ $form->birth_date }}">
                        </div>
                    </div>
                    {{-- for gender field --}}
                    <div class="form-group row text-center mb-3" id="gender">
                        <label for="" class="col-sm-2 col-form-lablel">Gender</label>
                        <div class="col-sm-4">
                            <select name="gender" class="form-control" value="{{ $form->gender }}">
                                <option value="">Choose Options</option>
                                <option value="0">Male</option>
                                <option value="1">Female</option>
                                <option value="2">Other</option>
                              </select>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success text-center">Update</button>
                        <a href="{{ route('custom_forms.index') }}"><button type="button" class="btn btn-info text-center">Cancel</button></a>
                    </div>
                </form>
            </div>            
        </div>
    </div>
@endsection