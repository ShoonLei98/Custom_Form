@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            {{-- to choose input fields --}}
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
            
            <div class="card-body">
                <form action="" method="">
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
                            <input type="text" class="form-control" name="birth_date">
                        </div>
                    </div>
                    {{-- for gender field --}}
                    <div class="form-group row text-center mb-3" id="gender" style="display: none;">
                        <label for="" class="col-sm-2 col-form-lablel">Gender</label>
                        <div class="col-sm-4">
                            <select name="gender" class="form-control">
                                <option value="">Choose Options</option>
                                <option value="0">Male</option>
                                <option value="1">Female</option>
                                <option value="2">Other</option>
                              </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center">
                <button type="submit" class="btn btn-success text-center">Submit</button>
                <button type="button" class="btn btn-info text-center">Cancel</button>
            </div>
        </div>
    </div>
@endsection

@section('jScript')

<script>
    $(document).ready(function(){
        $("input[type='checkbox']").on("click", function(){
            if($('#chkName').is(':checked'))
            {
                $("#name").show();
            }
            if($('#chkPhone').is(':checked'))
            {
                $("#phone").show();
            }
            if($('#chkDOB').is(':checked'))
            {
                $("#DOB").show();
            }
            if($('#chkGender').is(':checked'))
            {
                $("#gender").show();
            }
            
        });
    });
</script>
@endsection