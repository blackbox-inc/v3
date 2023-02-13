@extends('layouts.app')
@section('content')


<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
               UPDATE APPLICANT'S DETAILS 
            </div>
            <div class="card-body">
            
         
          
               <div class="card">
                 <div class="card-body">
                     <div class="form-group">
                         <label for="fullname">USER ID</label>
                         <input type="text" class="form-control updatebarcode" value="{{$bucs[0]->barcode}}" readonly>
                      </div>
                      <div class="row">
                         <div class="col-lg-6">
                            <div class="form-group">
                               <label for="fullname">FULLNAME</label>
                               <input type="text" class="form-control updateName" value="{{$bucs[0]->fullname}}">
                            </div>
                         </div>
                         <div class="col-lg-6">
                            <div class="form-group">
                               <label for="fullname">PASSPORT</label>
                               <input type="text" class="form-control updatePassport" value="{{$bucs[0]->passport_no}}">
                            </div>
                         </div>
                         
                         <div class="col-lg-6">
         
                             @if (Auth::user()->type == 0)
                                 <div class="form-group">
                                   <label for="">ACCOUNT OFFICER</label>
                                   <select class="form-control aofficer" >
                                         <option selected value="{{$bucs[0]->account_officer}}">{{$bucs[0]->account_officer}}</option>
                                     @foreach ($officer as $item)
                                         <option value="{{$item->username}}">{{$item->nickname}}</option>
                                     @endforeach
                                   </select>
                                 </div>
                             @else
                             <div class="form-group">
                                 <label for="fullname">ACCOUNT OFFICER</label>
                                 <input type="text" class="form-control aofficer" value="{{$bucs[0]->account_officer}}" readonly >
                              </div>
                             @endif
         
         
                          </div>
                         <div class="col-lg-6">
                             @if (Auth::user()->type == 0)
                             <div class="form-group">
                                 <label for="">ACCOUNT OFFICER</label>
                                 <select class="form-control allowoff" >
                                       <option selected value="{{$bucs[0]->allowed}}">{{$bucs[0]->allowed}}</option>
                                   @foreach ($officer as $item)
                                       <option value="{{$item->username}}">{{$item->nickname}}</option>
                                   @endforeach
                                 </select>
                               </div>
                             @else
                             <div class="form-group">
                                <label for="fullname">TRANSFERED TO</label>
                                <input type="text" class="form-control allowoff " value="{{$bucs[0]->allowed}}" readonly >
                             </div>
                             @endif
                          </div>
                       
                      
                           
                      </div>


                      <div class="form-group">
                        <label for="fullname">CATEGORY</label>
                        <div class="input-group mb-3">
                            
                            <div class="input-group-prepend" id="button-addon3">
                              <button class="btn btn-outline-secondary skilledUpdate" type="button">SKILLED</button>
                              <button class="btn btn-outline-secondary dhUpdate" type="button">DH</button>
                            </div>
                       

                            @if($bucs[0]->category == 0)
                                <input type="text" class="form-control categoryUpdate" value="DH" readonly>
                            @else
                                <input type="text" class="form-control categoryUpdate" value="SKILLED" readonly>
                            @endif

                           
                          </div>
                    </div>
                 
                 </div>
               </div>
         
              
               <button class="btn btn-warning btn-sm btn-block submit_c_info_update">UPDATE</button>
            </div>
         </div>
         
    </div>
    <div class="col-lg-4">
        photo here
    </div>
</div>




@endsection 