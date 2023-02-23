@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card ">
                <div class="card-header bgcolor">

                </div>
                <div class="card-body">
                    <h5 class="card-title">DH FORM</h5>
                    <br><br>
                    <label for="" style="font-size: 12px;">Choose Account Officer</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">AO</label>
                        </div>
                        <select class="custom-select" id="dhusers">
                            <option selected>Choose...</option>
                            @foreach ($users as $user)
                                <option value="{{$user->code}}">{{$user->nickname}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row">

                        <div class="col-lg-6">
                            <label for="" style="font-size: 12px;">Last Barcode Generated</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bgcolor" id="basic-addon1"><i class="fas fa-qrcode"
                                            style="color: white; font-size: 1.2em"></i></span>
                                </div>
                                <input type="number" class="form-control lbgInput" name="lbgInput">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            {{-- <label for="" style="font-size: 12px;">Custom Year</label>
                            <div class="input-group mb-3">

                                <div class="input-group-prepend">
                                    <span class="input-group-text bgcolor" id="basic-addon1"><i class="fas fa-qrcode"
                                            style="color: white; font-size: 1.2em"></i></span>
                                </div>
                                <input type="number" class="form-control">
                            </div> --}}
                        </div>

                        <div class="col-lg-6">
                            <label for="" style="font-size: 12px;">Next Number to be generated</label>
                            <div class="input-group mb-3">

                                <div class="input-group-prepend">
                                    <span class="input-group-text bgcolor" id="basic-addon1"><i class="fas fa-qrcode"
                                            style="color: white; font-size: 1.2em"></i></span>
                                </div>
                                <input type="number" class="form-control nntbgInput">
                            </div>

                        </div>
                        <div class="col-lg-6">

                            <label for="" style="font-size: 12px;">Add number to generate</label>
                            <div class="input-group mb-3">

                                <div class="input-group-prepend">
                                    <span class="input-group-text bgcolor" id="basic-addon1"><i class="fas fa-qrcode"
                                            style="color: white; font-size: 1.2em"></i></span>
                                </div>
                                <input type="number" class="form-control antg">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <button class="btn btn-success dhgeneratebtn">GENERATE AND PREVIEW</button>
                    <button class="btn btn-warning">PREVIEW ONLY</button>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card ">
                <div class="card-header bgcolor">

                </div>
                <div class="card-body">
                    <h5 class="card-title">SKILLED FORM</h5>
                    <br><br>
                  
                       
                    <div class="row">

                        <div class="col-lg-6">
                            <label for="" style="font-size: 12px;">Last Barcode Generated</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bgcolor" id="basic-addon1"><i class="fas fa-qrcode"
                                            style="color: white; font-size: 1.2em"></i></span>
                                </div>
                                <input type="text" class="form-control sf_last" value="{{$skilledForm[0]->barcode}}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                           -
                        </div>

                        <div class="col-lg-6">
                            <label for="" style="font-size: 12px;">Next Number to be generated</label>
                            <div class="input-group mb-3">

                                <div class="input-group-prepend">
                                    <span class="input-group-text bgcolor" id="basic-addon1"><i class="fas fa-qrcode"
                                            style="color: white; font-size: 1.2em"></i></span>
                                </div>
                                <input type="text" class="form-control sf_next" value="{{$nextbarcode202}}">
                            </div>

                        </div>
                        <div class="col-lg-6">

                            <label for="" style="font-size: 12px;">Add number to generate</label>
                            <div class="input-group mb-3">

                                <div class="input-group-prepend">
                                    <span class="input-group-text bgcolor" id="basic-addon1"><i class="fas fa-qrcode"
                                            style="color: white; font-size: 1.2em"></i></span>
                                </div>
                                <input type="text" class="form-control sf_add" value="{{$nextbarcode202}}">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <button class="btn btn-success sf_submit">GENERATE AND PREVIEW</button>
                    <button class="btn btn-warning">PREVIEW ONLY</button>
                </div>
            </div>
        </div>
    </div>




    <script>
        $('#dhusers').on('change', function(){

            var code = $(this).val();
        

            $.ajax({
                url: '/dhusers',
                type: 'POST',
                data: {
                    'code': code,
                },
                success: function(data) {
                    console.log(data)

                    $('.lbgInput').val(data.barcode)
                    $('.nntbgInput').val(data.nextbarcode)
                    $('.antg').val(data.nextbarcode);
                   
                }
            });


            
        });


        $('.dhgeneratebtn').on('click', function(){

            var next = $('.nntbgInput').val();
            var add = $('.antg').val();
            var dhusers = $('#dhusers').val();
          
            $.ajax({
                url: '/generatedh',
                type: 'POST',
                data: {
                    'dhusers': dhusers,
                    'next': next,
                    'add': add,
                },
                success: function(data) {
                    console.log(data)     
                }
            });


        });


        

        $('.sf_submit').on('click', function(){

            var sf_next = $('.sf_next').val();
            var sf_add = $('.sf_add').val();

            $.ajax({
                url: '/generateskilled',
                type: 'POST',
                data: {
                    'sf_next': sf_next,
                    'sf_add': sf_add,
                },
                success: function(data) {
                    console.log(data) 
                    location.reload();    
                }
            });

        });
    </script>



@endsection
