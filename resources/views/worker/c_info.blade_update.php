@extends('layouts.app')

@section('content')


<div class="card text-center" style="width: 20rem;">
    <div class="card-header">
        USER ID
    </div>
    <div class="card-body">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">@</span>
            </div>
            <input type="text" class="form-control input_barcode" placeholder="Add Barcode here to verify"
                aria-label="Barcode" aria-describedby="basic-addon1">
        </div>


        <button class="btn btn-secondary btn-lg verify_barcode">VERIFY</button>

    </div>
</div>



<hr>

<div class="card">
    <div class="card-header">
        APPLICANT'S DETAILS
    </div>
    <div class="card-body">


        <div class="form-group">
            <label for="fullname">FULLNAME</label>
            <input type="text" class="form-control fullname">
        </div>

        <div class="form-group">
            <label for="fullname">PASSPORT</label>
            <input type="text" class="form-control passport_no">
        </div>

        <button class="btn btn-outline-secondary btn-sm btn-block submit_c_info">SUBMIT</button>
    </div>
</div>


@endsection