@extends('layouts.app')

@section('content')

  <div class="barcode_verifier">
    <div class="card text-center" style="max-width: 500px; margin: 0 auto;">
        <div class="card-header goldencolor">
      
        </div>
        <div class="card-body">
            <div class="input-group mb-3 " >
                <div class="input-group-prepend">
                  <span class="input-group-text goldencolor" style="color: white;" id="basic-addon1"><i class="fas fa-qrcode"></i></span>
                </div>
                <input type="text" class="form-control input_barcode" placeholder="Add Barcode here to verify" aria-label="Barcode" aria-describedby="basic-addon1">
              </div>
              
              <button class="btn btn-outline-secondary btn-lg btn-block verify_barcode">VERIFY</button>
              
        </div>
      </div>
      <hr>

      <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>USER ID</th>
                <th>NAME</th>
                <th>ACTION</th>
            
            </tr>
        </thead>
        <tbody>


          @foreach ($fdhs as $dhs)
              
            <tr>
                <td>{{$dhs->barcode}}</td>
                <td>{{$dhs->applicant_name}}</td>
                <td>
                  @if($dhs->applicant_name == "_")
                  <button class="btn btn-success add_user_bcode" data-barcode="{{$dhs->barcode}}">+</button>
                  @else
                  <a href="/create/edit/{{$dhs->barcode}}" class="btn btn-secondary btn-sm " target="_blank">VIEW INFO</button></a>
                   
                  @endif
                </td>
             
              
            </tr>

            @endforeach
        
    </table>


  </div>

  <hr>

  



<hr>

<div class="card shortDetails " style="width: 400px; margin: 0 auto; display: none">
    <div class="card-header goldencolor">
     
    </div>
    <div class="card-body">


        <div class="form-group">
            <label for="fullname">FULLNAME</label>
            <input type="text" class="form-control fullname" >
        </div>

    

        <div class="form-group">
            <label for="fullname">PASSPORT</label>
            <input type="text" class="form-control passport_no" >
        </div>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">CATEGORY</label>
          </div>
          <select class="custom-select" id="category_new">
          
            <option value="0" selected>DOMESTIC HELPER</option>
            <option value="1">SKILLED</option>
          </select>
        </div>
   
        <button class="btn btn-outline-secondary btn-sm btn-block submit_c_info">SUBMIT</button>
    </div>
  </div>

  <hr>


  <script>
    $(".add_user_bcode").on('click', function(){
      var barcode123 = $(this).attr('data-barcode');


      $('.input_barcode').val(barcode123);
      $('.verify_barcode').trigger('click');

      
    });


  
    if (event.keyCode === 13) {
          $('.verify_barcode').trigger('click');
    }


  </script>





@endsection