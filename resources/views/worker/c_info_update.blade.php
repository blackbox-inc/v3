@extends('layouts.app')
@section('content')

<?php 

// function check_url($test_url) {
//     $ch_init = curl_init();
//     curl_setopt($ch_init, CURLOPT_URL, $test_url);
//     curl_setopt($ch_init, CURLOPT_HEADER, 1);
//     curl_setopt($ch_init , CURLOPT_RETURNTRANSFER, 1);
//     $data = curl_exec($ch_init);
//     $headers_result = curl_getinfo($ch_init);
//     curl_close($ch_init);
 
 
//     return $headers_result['http_code'];
// }
 
//     $test_url = "google.com";
//     $check_url_result = check_url($test_url);
//     if ($check_url_result == '200')
//     {
//         echo "This is Working Link.";
//     }
//     else
//     {
//         echo "This is Broken Link.";
//     }


?>

@if(count($basic_info) === 0)

{{header("Refresh:0")}}
@endif

<style>
.nav-pills .nav-link.active, .nav-pills .show > .nav-link {
    color: #fff;
    background-color: #9e9e9e;
    border: 1px solid #3a3b00
}

.bgcolor{
    background-color: #534223;
}


</style>

<div class="card">
    <div class="card-body">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="background-color: #d8d8d8; color:black !mportant; padding: 1em">
            <li class="nav-item">
              <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">USER ID</a>
            </li>

          


            <li class="nav-item">
              <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">BASIC INFORMATION</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">CONTACTS</a>
            </li>
           

            <li class="nav-item">
              <a class="nav-link" id="pills-educ-tab" data-toggle="pill" href="#pills-educ" role="tab" aria-controls="pills-educ" aria-selected="false">EDUCATION</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" id="pills-skills-tab" data-toggle="pill" href="#pills-skills" role="tab" aria-controls="pills-skill" aria-selected="false">SKILL</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" id="pills-documents-tab" data-toggle="pill" href="#pills-documents" role="tab" aria-controls="pills-contact" aria-selected="false">DOCUMENTS</a>
            </li>
            
          </ul>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="card">
                    <div class="card-header " >
                      <div class="float-left"><strong>{{$bucs[0]->fullname}}</strong></div> <button class="btn btn-secondary btn-sm float-right" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">X</button>
                    </div>
                    <div class="card-body collapse show" id="collapseExample">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-header bgcolor">
                                     
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
                                                         <label for="">TRANFERED TO</label>
                                                         <input type="text" class="form-control aofficer" value="{{$bucs[0]->account_officer}}" readonly >
                                                      </div>
                                                     @endif
                                 
                                 
                                                  </div>
                                                 <div class="col-lg-6">
                                                     @if (Auth::user()->type == 0)
                                                     <div class="form-group">
                                                         <label for="">TRANSFERED TO</label>
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
                                
                                       <small style="text-align: center ">DATE MEMBER: {{$bucs[0]->created_at}}</small><br><br>
                                       <button class="btn btn-warning btn-lg  submit_c_info_update">UPDATE</button>
                                    </div>
                                 </div>
                                 
                            </div>
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-header bgcolor">
                                      
                                    </div>
                                    <div class="card-body">
                                      <h5 class="card-title">PHOTO</h5>
                                    <br>
                                      <img class="card-img-top" src="{{asset("uploaded_photo")."/".$basic_info[0]->photo}}" id="image-preview" alt="Card image cap">
                                      <img class="card-img-top" src="https://eomsinc.com/v2/resume_builder/upload/{{$basic_info[0]->photo}}" id="image-preview" alt="Card image cap">
                                        <small>{{$basic_info[0]->photo}}</small>
                                        <hr>
                                        <input type="file" name="file" id="file-input">
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header bgcolor">
                                      
                                    </div>
                                    <div class="card-body">
                                      <h5 class="card-title">SIGNITURE</h5>
                                      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                      <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="card">
                  <div class="card-header bgcolor">
                
                  </div>
                  <div class="card-body">

                    <div class="row">
                      <div class="col-lg-3">
                        <div class="form-group">
                          <label for="">BARCODE</label>
                          <input type="text" name="" id="basic_infos_barcode" class="form-control" value="{{$basic_info[0]->barcode}}" readonly>
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="form-group">
                          <label for="">GENDER</label>
                          <select class="form-control" id="basic_infos_gender">
                            <option selected value="{{$basic_info[0]->gender}}">{{$basic_info[0]->gender}}</option>
                            <option value="MALE">MALE</option>
                            <option value="FEMALE">FEMALE</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="form-group">
                          <label for="">BIRTHDATE</label>
                          <input type="date"  id="basic_infos_dob" class="form-control" value="{{$basic_info[0]->dob}}">
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="form-group">
                          <label for="">PLACE OF BIRTH</label>
                          <input type="text" name="" id="basic_infos_pob" class="form-control" value="{{$basic_info[0]->pob}}">
                        </div>
                      </div>
                    </div>

                   

                    <div class="row">
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="">HEIGHT</label>
                          <input type="text" name="" id="basic_infos_height" class="form-control" value="{{$basic_info[0]->height}}">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="">WEIGHT</label>
                          <input type="text" name="" id="basic_infos_weight" class="form-control" value="{{$basic_info[0]->weight}}">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="">RELIGION</label>
                          <select class="form-control" id="basic_infos_religion">
                            <option selected value="{{$basic_info[0]->religion}}">{{$basic_info[0]->religion}}</option>
                            <option value="ROMAN CATHOLIC">ROMAN CATHOLIC</option>
                            <option value="ISLAM">ISLAM</option>
                            <option value="BORN AGAIN">BORN AGAIN</option>
                            <option value="IGLESIA NI CRISTO">IGLESIA NI CRISTO</option>
                            <option value="JMCIM">JMCIM</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="">BLOOD TYPE</label>
                          <select class="form-control" id="basic_infos_blood_type">
                            <option selected value="{{$basic_info[0]->blood_type}}">{{$basic_info[0]->blood_type}}</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="">MARITAL STATUS</label>
                          <select class="form-control" id="basic_infos_marital_status">
                            <option selected value="{{$basic_info[0]->marital_status}}">{{$basic_info[0]->marital_status}}</option>
                            <option value="SINGLE">SINGLE</option>
                            <option value="MARRIED">MARRIED</option>
                            <option value="SEPERATED">SEPERATED</option>
                            <option value="LIVE IN PARTNER">LIVE IN PARTNER</option>
                            <option value="WIDOWED">WIDOWED</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="">NUMBER OF CHILDREN</label>
                          <input type="number" id="basic_infos_no_of_children" class="form-control" value="{{$basic_info[0]->no_of_children}}">
                        </div>
                      </div>
                    </div>

                    
                    <div class="form-group">
                      <label for="">OBJECTIVES</label>
                      <textarea class="form-control summernote" name="" id="" rows="4">{{$basic_info[0]->objectives}}</textarea>
                    </div>
                    <button class="btn btn-warning btn-lg basic_infos_update_btn">UPDATE</button>
                  </div>
                
                </div>

             
            </div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">




              <div class="card">
                <div class="card-header bgcolor">
                  <button class="btn btn-warning btn-sm float-right" data-toggle="modal" data-target=".contact_modal">ADD CONTACT</button>
                </div>
                <div class="card-body">
                  <h5 class="card-title">CONTACT DETAILS</h5>
                

                  @if(!empty($successMsg))
                    <div class="alert alert-success"> {{ $successMsg }}</div>
                  @endif


                    <table class="table table-sm">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">TYPE</th>
                          <th scope="col">CONTACT_DETAILS</th>
                          <th scope="col">ACTION</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $count = 1?>
                        @foreach($c_contact as $contact)
                        <tr>
                        
                          <th scope="row">{{$count++}}</th>
                          <td scope="row">{{$contact->type}}</td>
                          <td scope="row">{{$contact->contact_details}}</td>
                          <td scope="row">1</td>
                  
                        </tr>
                        @endforeach
                      
                      
                      </tbody>
                    </table>
                </div>
              </div>

              {{-- MODAL ADD CONTACTS --}}
              <div class="modal fade contact_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">ADDING CONTACT...</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                    <form action="/contact" method="POST">
                     
                      @csrf

                      <input type="hidden" name="barcode" value="{{$bucs[0]->barcode}}">

                      <div class="modal-body">

                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">TYPE</label>
                          </div>
                          <select class="custom-select" name="typeContact">
                            <option selected value="CP">MOBILE NO.</option>
                            <option value="FB">FACEBOOK PROFILE</option>
                            <option value="whatsup">WHATSApp</option>
                            <option value="twitter">Twitter</option>
                          </select>
                        </div>



                        <div class="input-group input-group-lg">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-lg">CONTACT DETAILS</span>
                          </div>
                          <input type="text" name="contactDetails" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm">
                        </div>



                      </div>

                  

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">SAVE</button>
                      
                    </div>


                  </form>


                  </div>
                </div>
              </div>
               
              <hr>

              <div class="card">
                <div class="card-header bgcolor">
                  <button class="btn btn-warning btn-sm float-right" data-toggle="modal" data-target=".12312">ADD CONTACT</button>
                </div>
                <div class="card-body">
                  
                  <h5 class="card-title">CONTACT PERSON INCASE OF EMERGENCY</h5>
                  <hr>
                  <table class="table table-sm">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>


            </div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">




              <div class="card">
                <div class="card-header bgcolor">
                  <button class="btn btn-warning btn-sm float-right" data-toggle="modal" data-target=".contact_modal">ADD CONTACT</button>
                </div>
                <div class="card-body">
                  <h5 class="card-title">CONTACT DETAILS</h5>
                

                  @if(!empty($successMsg))
                    <div class="alert alert-success"> {{ $successMsg }}</div>
                  @endif


                    <table class="table table-sm">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">TYPE</th>
                          <th scope="col">CONTACT_DETAILS</th>
                          <th scope="col">ACTION</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $count = 1?>
                        @foreach($c_contact as $contact)
                        <tr>
                        
                          <th scope="row">{{$count++}}</th>
                          <td scope="row">{{$contact->type}}</td>
                          <td scope="row">{{$contact->contact_details}}</td>
                          <td scope="row">1</td>
                  
                        </tr>
                        @endforeach
                      
                      
                      </tbody>
                    </table>
                </div>
              </div>

              {{-- MODAL ADD CONTACTS --}}
              <div class="modal fade contact_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">ADDING CONTACT...</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                    <form action="/contact" method="POST">
                     
                      @csrf

                      <input type="hidden" name="barcode" value="{{$bucs[0]->barcode}}">

                      <div class="modal-body">

                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">TYPE</label>
                          </div>
                          <select class="custom-select" name="typeContact">
                            <option selected value="CP">MOBILE NO.</option>
                            <option value="FB">FACEBOOK PROFILE</option>
                            <option value="whatsup">WHATSApp</option>
                            <option value="twitter">Twitter</option>
                          </select>
                        </div>



                        <div class="input-group input-group-lg">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-lg">CONTACT DETAILS</span>
                          </div>
                          <input type="text" name="contactDetails" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm">
                        </div>



                      </div>

                  

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">SAVE</button>
                      
                    </div>


                  </form>


                  </div>
                </div>
              </div>
               
              <hr>

              <div class="card">
                <div class="card-header bgcolor">
                  <button class="btn btn-warning btn-sm float-right" data-toggle="modal" data-target=".12312">ADD CONTACT</button>
                </div>
                <div class="card-body">
                  
                  <h5 class="card-title">CONTACT PERSON INCASE OF EMERGENCY</h5>
                  <hr>
                  <table class="table table-sm">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>


            </div>




<div class="tab-pane fade" id="pills-documents" role="tabpanel" aria-labelledby="pills-document-tab">

.....

</div>
<div class="tab-pane fade" id="pills-skills" role="tabpanel" aria-labelledby="pills-skill-tab">

skills

</div>
<div class="tab-pane fade" id="pills-educ" role="tabpanel" aria-labelledby="pills-educ-tab">

educ

</div>



















































          </div>
        
    </div>
  </div>


<script>


function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#image-preview').attr('src', e.target.result);
            $('#image-preview').hide();
            $('#image-preview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}


    $("#file-input").change(function() {
      readURL(this);
    var bcode_session = "{{$bucs[0]->barcode}}"


    var file_data = $(this).prop('files')[0];
    var form_data = new FormData();
    form_data.append('file', file_data);


  


    $.ajax({
        url: '/upload-photo', // point to server-side PHP script 
        dataType: 'json', // what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'POST',
        success: function(data) {
            // alert(data)

            var imagemo = data.filename

            console.log(data.filename)

            $.ajax({
                url: '/upload-photo/update',
                type: 'POST',
                data: {
                    'imageimg': imagemo,
                    'bcodeimg': bcode_session,

                },
                success: function(data) {

                    console.log(data)
                }
            });
        }
    });

});


$(document).ready(function(){
    $('a[data-toggle="pill"]').on('shown.bs.tab', function (e) {
      localStorage.setItem('lastTab', $(this).attr('href'));
    });
    var lastTab = localStorage.getItem('lastTab');
    
    if (lastTab) {
      $('[href="' + lastTab + '"]').tab('show');
    }
});


$(document).ready(function() {
  $('.summernote').summernote({
    height: 200,
    focus: true
  });
});

</script>



@endsection 
