@extends('layouts.app')
@section('content')



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
              <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
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
                                 
                                      
                                       <button class="btn btn-warning btn-sm  submit_c_info_update">UPDATE</button>
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
                                        <small></small>
                                        <hr>
                                        <input type="file" id="file-input">
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
                    <button class="btn btn-warning btn-lg">UPDATE</button>
                  </div>
                
                </div>

             
            </div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis itaque molestias illo harum maiores reprehenderit aspernatur illum dolores mollitia alias nesciunt enim odio, unde iste ipsa voluptatum ipsum, rem quasi. Mollitia repellat aliquid cupiditate illo, nostrum debitis deleniti rem vitae aspernatur quisquam labore necessitatibus consequatur maxime unde omnis reiciendis non, tempore iste nesciunt, hic quaerat corporis? Distinctio, laboriosam ullam praesentium veritatis labore suscipit molestiae dignissimos commodi libero accusamus ea accusantium architecto sunt voluptatibus inventore! Dolor cupiditate omnis repellendus quas suscipit harum commodi nemo laborum quo minus odit, deserunt ipsam, consequatur sequi esse accusamus architecto fugiat totam. Dolor placeat rem laboriosam labore minus optio vel, unde consequatur numquam magnam ad et cupiditate autem. Exercitationem quam, dolores, maxime voluptas magni voluptatum soluta eos enim inventore, atque nobis velit saepe adipisci quidem eaque commodi hic quasi dolore totam! Modi tempora unde enim cupiditate aliquid reprehenderit perspiciatis alias. Aut tempora perspiciatis autem est consequuntur expedita harum ab. Sunt distinctio excepturi commodi architecto ipsam voluptates aliquid officia aut quibusdam ab reprehenderit amet sit eos nihil, fuga et. Asperiores accusamus magni quisquam vel ex reprehenderit. Repellat tempora asperiores cum nihil doloribus quos explicabo hic provident ad deserunt voluptas dolorum iste delectus soluta corrupti possimus sequi ut officiis modi harum sed quae illum, labore quaerat. Perferendis porro, distinctio impedit optio aliquid corrupti asperiores modi incidunt fuga odio dignissimos totam quae. Quod aspernatur vitae quaerat modi, nostrum amet iste distinctio veniam id nisi quasi voluptatum repellat. Natus ab sit nesciunt obcaecati, ipsa, blanditiis enim quod unde odio qui labore quis quae, adipisci possimus eos animi doloremque corporis vitae aperiam illo! Facilis quidem consectetur enim iure aperiam labore? Sit ullam dolore tempora, consectetur maiores officia vel sunt alias distinctio sint odit vitae commodi iste temporibus ipsum qui, mollitia assumenda, impedit velit dolorum asperiores ducimus consequuntur soluta. Consequuntur obcaecati nesciunt repellat non, illo sint fuga eveniet animi veniam. Omnis quasi, pariatur deserunt sunt quam in doloribus quae, voluptates illo adipisci expedita possimus rem fugiat officiis dignissimos quibusdam dicta enim sequi minus sed maiores. Rem repellat quibusdam nesciunt amet atque dolor velit quis molestiae maxime placeat, eius modi doloremque, voluptas reiciendis eaque. Nostrum animi, harum cumque sint consequuntur veniam earum quas quos non, veritatis dolores ipsum perspiciatis fuga facilis possimus natus. Molestiae fugit tempora quos eum id, veniam quia, atque temporibus mollitia quo nesciunt repellat doloribus beatae. Id eligendi laboriosam quas, enim repellat vitae nulla cupiditate. Voluptatem eius veritatis labore aperiam?
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


    // $.ajax({
    //     url: 'upload-img.php', // point to server-side PHP script 
    //     dataType: 'text', // what to expect back from the PHP script, if anything
    //     cache: false,
    //     contentType: false,
    //     processData: false,
    //     data: form_data,
    //     type: 'post',
    //     success: function(data) {
    //         // alert(data)

    //         var imagemo = data

    //         $.ajax({
    //             url: 'processors.php',
    //             type: 'POST',
    //             data: {
    //                 'imageimg': imagemo,
    //                 'bcodeimg': bcode_session,

    //             },
    //             success: function(data) {

    //                 location.reload();
    //             }
    //         });
    //     }
    // });

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
