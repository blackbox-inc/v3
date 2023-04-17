@extends('layouts.app')

@section('content')


@php
    function getcount($username) {
        return  DB::table('nlineups')->where('fra_username', '=', $username)->count();
    }
@endphp

<table id="example" class="table table-striped table-bordered" style="width:100%; font-size: 13px">
    <thead>
        <tr>
            <th>FRA Name</th>
            <th>Connected to </th>
            <th>username</th>
            <th>NOC</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>


        @forEach($users as $user)
            <tr>
                <td><strong>{{strtoupper($user->name)}}</strong> <small style="color: green; font-weight: 700;">({{strtoupper($user->nickname)}})</small></td>
              
                <td>{{$user->code}}</td>
                <td>{{$user->username}}</td>
                <td>{{getcount($user->username)}}</td>
                <td>
                    <button class="btn btn-info btn-sm addShoworker" data-fra_name="{{$user->name}}" data-username="{{$user->username}}" data-toggle="modal" data-target="#modalAdd">ADD DH</button>
                    <a href="/listbydate/{{$user->username}}" class="btn btn-warning btn-sm">VIEW</a>
                    <button class="btn btn-danger btn-sm">DELETE</button>
                </td>
            </tr>
        @endforeach
       
</table>




{{-- MODAL --}}


<div class="modal fade" id="modalAdd" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bgcolor">
          <h5 class="modal-title " id="exampleModalLabel">Applicant's Name</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <small class="fra_name">RRR</small>


          <div class="form-group">
            <label for=""></label>
            <select class="form-control selecta2 namelist" multiple="multiple" ></select>

            <hr>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="">FRA USERNAME</label>
                        <input type="text"
                          class="form-control fra_username" name="" id=""  placeholder="" readonly>     
                      </div>
                </div>
                <div class="col-lg-6">
                    
                    <div class="form-group">
                        <label for="">PRA USERNAME</label>
                        <input type="text"
                        class="form-control pra_officer" name="" id=""  placeholder="" readonly>     
                    </div>
                </div>
            </div>
          
          



            <button class="btn btn-secondary btn-sm btn-block mt-3 sbmit_to_lineup">SUBMIT TO LINE UP</button>

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
        </div>
      </div>
    </div>
  </div>



<script>

    $('.namelist').on('change', function(){
        // alert($(this).val())
    });


    $('.sbmit_to_lineup').on('click', function(){

      var fra_name = $('.fra_name').text();
      var fra_username = $('.fra_username').val();
      var pra_officer = $('.pra_officer').val();
       

        var s = $('.namelist').val().toString();
        var match = s.split(',')

        console.log(match)

        for (var a in match)
        {
            var variable = match[a]
            console.log(variable)

            $.ajax({
                type:'POST',
                url:"/addtolineup",
                data:{
                    'barcode': variable,
                    'fra_name': fra_name,
                    'pra_officer': pra_officer,
                    'fra_username': fra_username,
                
                },
                success:function(data){

                   console.log(data)

                   location.reload();

                
            
                }

            });

        }


    });


    $('.addShoworker').on('click', function(){

        var username = '{{ Auth::user()->username }}';
        var franame =  $(this).attr("data-fra_name");
        var frausername = $(this).attr("data-username");

        var fra_name = $('.fra_name').text(franame);
        var fra_username = $('.fra_username').val(frausername);
        var pra_officer = $('.pra_officer').val(username);



        $.ajax({
            type:'POST',
            url:"/getname",
            data:{
                'username': username,
               
            },
            success:function(data){
            
              console.log(data.barcode)
              $(".namelist").html("")
              for(var i = 0; i<=data.listnames.length; i++){
                $(".namelist").append(new Option(data.listnames[i], data.barcode[i]));
              }

             

            }
        });
      
        
        
    });


</script>


@endsection