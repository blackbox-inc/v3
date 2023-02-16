@extends('layouts.app')

@section('content')



<h1>LIST OF CANDIDATES</h1>
<hr>


<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>BARCODE</th>
            <th>FULLNAME</th>
            <th>STATUS</th>
            <th>ACCOUNT OFFICER</th>
            <th>TRANSFERED TO</th>
            <th>CATEGORY</th>
            <th>ACTION</th>
       
        </tr>
    </thead>
    <tbody>
        @foreach($c_info as $cnfo) 
        <tr>  
            <td>{{$cnfo->barcode}}</td>
            <td style="font-size: 13px">{{strtoupper($cnfo->fullname)}}</td>
            <td>

             <?php 
            if($cnfo->status == 1){
                echo  '<span class="badge badge-secondary p-1 btn-block">POOLING</span>';
            }elseif($cnfo->status == 2){
                echo  '<span class="badge badge-secondary p-1 btn-block">LINED UP</span>';
            }elseif($cnfo->status == 3){
                echo  '<span class="badge badge-secondary p-1 btn-block">SELECTED</span>';
            }elseif($cnfo->status == 4){
                echo  '<span class="badge badge-secondary p-1 btn-block">REJECTED</span>';
            }elseif($cnfo->status == 5){
                echo  '<span class="badge badge-secondary p-1 btn-block">DEPLOYED</span>';
            }elseif($cnfo->status == 6){
               echo  '<span class="badge badge-secondary p-1 btn-block">WITHDRAW APPLICATION</span>';
            }elseif($cnfo->status == 7){
                echo  '<span class="badge badge-secondary p-1 btn-block">NOT AVAILABLE</span>';
            }      
                
            ?>
             
            </td>
            <td>

                @if (Auth::user()->type == 0)

                    @if($cnfo->account_officer =="")
                        <button class="btn btn-outline-secondary btn-block btn-sm asnbtn" data-toggle="modal" data-id="{{$cnfo->id}}" data-target=".assign_officer">ASSIGN</button>
                    @else
                        <span class="badge badge-success p-1 btn-block asnbtn" data-toggle="modal" data-id="{{$cnfo->id}}" data-target=".assign_officer" >{{strtoupper($cnfo->account_officer)}}</span>
                    @endif

                @else
                    @if($cnfo->account_officer =="")
                        <button class="btn btn-outline-secondary btn-block btn-sm ">ASSIGN</button>
                    @else
                        <span class="badge badge-success p-1 btn-block ">{{strtoupper($cnfo->account_officer)}}</span>
                    @endif
                @endif


             


                
            </td>
            <td>
                @if (Auth::user()->type == 0)

                    @if($cnfo->allowed =="")
                        <button class="btn btn-outline-secondary btn-block btn-sm">ADD</button>
                    @else
                        <span class="badge badge-secondary p-1  btn-block">{{strtoupper($cnfo->allowed)}}</span> 
                    @endif

                @else

                    @if($cnfo->allowed =="")
                        <span class="badge badge-secondary btn-block">---</span>
                    @else
                        {{$cnfo->allowed}}
                    @endif


                @endif


               
            </td>
            <td>
                <?php 
                if($cnfo->category == 0){
                    echo "HSW";
                }else{
                    echo "SKILLED";
                }    
                    
                ?>

                
            </td>
            <td><a href="create/edit/{{$cnfo->barcode}}" class="btn btn-secondary btn-sm " target="_blank">VIEW INFO</button></a>
        </tr>

        @endforeach
      
    </tbody>
   
</table>



{{-- ASSIGN OFFICER --}}
<div class="modal fade assign_officer"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">ASSIGN OFFICER</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">


            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        {{-- <label for="ID">ID</label> --}}
                        <input type="hidden" class="form-control id_c_info" readonly >
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">SELECT OFFICER</label>
                        <select class="form-control select_officers" >
                         
                            @foreach($officer as $ofcer) 
        
        
                            <?php 
                            $str = $ofcer->code;
                            $res =  str_replace("-","",$str)
                            
                            ?>
        
        
                                <option value="eomsinc{{strtolower($res)}}">{{$ofcer->nickname}}</option>
                            @endforeach
                            
                        </select>
                    </div>
        
        
                </div>
              </div>


          

           
           
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-outline-dark save_officer">Save changes</button>
        </div>
      </div>
    </div>
  </div>
 


@endsection