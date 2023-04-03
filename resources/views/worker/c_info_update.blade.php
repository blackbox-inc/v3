@extends('layouts.app') @section('content') <?php

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
?> @if (count($basic_info) === 0) {{ header('Refresh:0') }} @endif <style>
    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        color: #fff;
        background-color: #9e9e9e;
        border: 1px solid #3a3b00
    }

    .bgcolor {
        background-color: #534223;
        color: white;
    }

    [data-toggle=collapse] i:before {
        content: "\f068";
    }

    [data-toggle=collapse].collapsed i:before {
        content: "\f067";
    }

    #accordion .card-header {
        margin-bottom: 8px;
    }

    #accordion .accordion-title {
        position: relative;
        display: block;
        padding: 8px 0 8px 50px;
        background: #213744;
        border-radius: 8px;
        overflow: hidden;
        text-decoration: none;
        color: #fff;
        font-size: 16px;
        font-weight: 700;
        width: 100%;
        text-align: left;
        transition: all 0.4s ease-in-out;
    }

    #accordion .accordion-title i {
        position: absolute;
        width: 40px;
        height: 100%;
        left: 0;
        top: 0;
        color: #fff;
        background: radial-gradient(rgba(33, 55, 68, 0.8), #213744);
        text-align: center;
        border-right: 1px solid transparent;
    }

    #accordion .accordion-title:hover {
        padding-left: 60px;
        background: #213744;
        color: #fff;
    }

    #accordion .accordion-title:hover i {
        border-right: 1px solid #fff;
    }

    #accordion .accordion-body {
        padding: 5px 55px;
    }

    #accordion .accordion-body ul {
        list-style: none;
        margin-left: 0;
        padding-left: 0;
    }

    #accordion .accordion-body li {
        padding-left: 1.2rem;
        text-indent: -1.2rem;
    }

    #accordion .accordion-body li:before {
        content: "\f10a";
        padding-right: 5px;
        font-family: "Flaticon";
        font-size: 16px;
        font-style: normal;
        color: #213744;
    }
</style>
<div class="card">
    <div class="card-body">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="background-color: #d8d8d8; color:black !mportant; padding: 1em">
            {{-- USER ID --}}
            <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">USER ID</a>
            </li>
            {{-- BASIC INFORMATION --}}
            <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">BASIC INFORMATION</a>
            </li>
            {{-- CONTACTS --}}
            <li class="nav-item">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">CONTACTS</a>
            </li>
            {{-- WORK EXPERIENCE --}}
            <li class="nav-item">
                <a class="nav-link" id="pills-exp-tab" data-toggle="pill" href="#pills-exp" role="tab" aria-controls="pills-exp" aria-selected="false">W EXPERIENCE</a>
            </li>
            {{-- EDUCATION --}}
            <li class="nav-item">
                <a class="nav-link" id="pills-educ-tab" data-toggle="pill" href="#pills-educ" role="tab" aria-controls="pills-educ" aria-selected="false">EDUCATION</a>
            </li>
            {{-- SKILL --}}
            <li class="nav-item">
                <a class="nav-link" id="pills-skills-tab" data-toggle="pill" href="#pills-skills" role="tab" aria-controls="pills-skill" aria-selected="false">SKILL</a>
            </li>
            {{-- DOCUMENTS --}}
            <li class="nav-item">
                <a class="nav-link" id="pills-documents-tab" data-toggle="pill" href="#pills-documents" role="tab" aria-controls="pills-contact" aria-selected="false">DOCUMENTS</a>
            </li>
        </ul>
        {{-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////// --}}
        {{-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////// --}}
        {{-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////// --}}
        {{-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////// --}}
        <div class="tab-content" id="pills-tabContent">
            {{-- USER ID TAB --}}
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="card">
                    <div class="card-header ">
                        <div class="float-left">
                            <strong>{{ $bucs[0]->fullname }}</strong>
                        </div>
                        <button class="btn btn-secondary btn-sm float-right" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">X</button>
                    </div>
                    <div class="card-body collapse show" id="collapseExample">

                        
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-header bgcolor"></div>
                                    <div class="card-body">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="fullname">USER ID</label>
                                                    <input type="text" class="form-control updatebarcode" value="{{ $bucs[0]->barcode }}" readonly>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="fullname">FULLNAME</label>
                                                            <input type="text" class="form-control updateName" value="{{ $bucs[0]->fullname }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="fullname">PASSPORT</label>
                                                            <input type="text" class="form-control updatePassport" value="{{ $bucs[0]->passport_no }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6"> @if (Auth::user()->type == 0) <div class="form-group">
                                                            <label for="">ACCOUNT OFFICER</label>
                                                            <select class="form-control aofficer">
                                                                <option selected value="{{ $bucs[0]->account_officer }}">
                                                                    {{ $bucs[0]->account_officer }}
                                                                </option> @foreach ($officer as $item) <option value="{{ $item->username }}">
                                                                    {{ $item->nickname }}
                                                                </option> @endforeach
                                                            </select>
                                                        </div> @else <div class="form-group">
                                                            <label for="">TRANFERED TO</label>
                                                            <input type="text" class="form-control aofficer" value="{{ $bucs[0]->account_officer }}" readonly>
                                                        </div> @endif </div>
                                                    <div class="col-lg-6"> @if (Auth::user()->type == 0) <div class="form-group">
                                                            <label for="">TRANSFERED TO</label>
                                                            <select class="form-control allowoff">
                                                                <option selected value="{{ $bucs[0]->allowed }}">
                                                                    {{ $bucs[0]->allowed }}
                                                                </option> @foreach ($officer as $item) <option value="{{ $item->username }}">
                                                                    {{ $item->nickname }}
                                                                </option> @endforeach
                                                            </select>
                                                        </div> @else <div class="form-group">
                                                            <label for="fullname">TRANSFERED TO</label>
                                                            <input type="text" class="form-control allowoff " value="{{ $bucs[0]->allowed }}" readonly>
                                                        </div> @endif </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="fullname">CATEGORY</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend" id="button-addon3">
                                                            <button class="btn btn-outline-secondary skilledUpdate" type="button">SKILLED</button>
                                                            <button class="btn btn-outline-secondary dhUpdate" type="button">DH</button>
                                                        </div> @if ($bucs[0]->category == 0) <input type="text" class="form-control categoryUpdate" value="DH" readonly> @else <input type="text" class="form-control categoryUpdate" value="SKILLED" readonly> @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <small style="text-align: center ">DATE MEMBER: {{ $bucs[0]->created_at }}</small>
                                        <br>
                                        <br>
                                        <button class="btn btn-warning btn-lg  submit_c_info_update">UPDATE</button>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header bgcolor"></div>
                                    <div class="card-body">
                                        <div class="card-tiqtle">POSITION APPLIED</div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">1</span>
                                            </div>
                                            <input type="text" class="form-control cat1" value="{{$c_categories[0]->cat1}}">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">2</span>
                                            </div>
                                            <input type="text" class="form-control cat2" value="{{$c_categories[0]->cat2}}">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">3</span>
                                            </div>
                                            <input type="text" class="form-control cat3" value="{{$c_categories[0]->cat3}}">
                                        </div>
                                        <button class="btn btn-warning btn-sm pos_update btn-block" data-id="{{$c_categories[0]->id}}">Update</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                             
                                <div class="card">
                                    <div class="card-header bgcolor"></div>
                                    <div class="card-body">
                                        <h5 class="card-title">PHOTO</h5>
                                        <br>
                                        <img class="card-img-top" src="{{ asset('uploaded_photo') . '/' . $basic_info[0]->photo }}" id="image-preview" alt="Card image cap">
                                        <img class="card-img-top" src="https://eomsinc.com/v2/resume_builder/upload/{{ $basic_info[0]->photo }}" id="image-preview" alt="Card image cap">
                                        <small>{{ $basic_info[0]->photo }}</small>
                                        <hr>
                                        <input type="file" name="file" id="file-input">
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header bgcolor"></div>
                                    <div class="card-body">
                                        <h5 class="card-title">SIGNITURE</h5>
                                       <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ad/Wonho-Signature.svg/638px-Wonho-Signature.svg.png" alt="" style="width: 100%">
                                    
                                    </div>
                                </div>



                                <div class="card">
                                    <div class="card-header bgcolor">
                                      
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="">MONITORING STATUS</label>
                                            <select class="form-control montorstat" name="" id="">
                                                @if(count($getmonstats))
                                              <option value="{{$getmonstats[0]->status}}" selected>{{($getmonstats[0]->status == 1) ? 'ON' : 'OFF'}}</option>
                                              @endif
                                              <option value="0">OFF</option>
                                              <option value="1" >ON</option>
                                            
                                            </select>
                                          </div>
                                    </div>
                                  </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- BASIC INFORMATION TAB --}}
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="card">
                    <div class="card-header bgcolor"></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">BARCODE</label>
                                    <input type="text" name="" id="basic_infos_barcode" class="form-control" value="{{ $basic_info[0]->barcode }}" readonly>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">GENDER</label>
                                    <select class="form-control" id="basic_infos_gender">
                                        <option selected value="{{ $basic_info[0]->gender }}">
                                            {{ $basic_info[0]->gender }}
                                        </option>
                                        <option value="MALE">MALE</option>
                                        <option value="FEMALE">FEMALE</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">BIRTHDATE</label>
                                    <input type="date" id="basic_infos_dob" class="form-control" value="{{ $basic_info[0]->dob }}">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">PLACE OF BIRTH</label>
                                    <input type="text" name="" id="basic_infos_pob" class="form-control" value="{{ $basic_info[0]->pob }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">HEIGHT</label>
                                    <input type="text" name="" id="basic_infos_height" class="form-control" value="{{ $basic_info[0]->height }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">WEIGHT</label>
                                    <input type="text" name="" id="basic_infos_weight" class="form-control" value="{{ $basic_info[0]->weight }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">RELIGION</label>
                                    <select class="form-control" id="basic_infos_religion">
                                        <option selected value="{{ $basic_info[0]->religion }}">
                                            {{ $basic_info[0]->religion }}
                                        </option>
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
                                        <option selected value="{{ $basic_info[0]->blood_type }}">
                                            {{ $basic_info[0]->blood_type }}
                                        </option>
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
                                        <option selected value="{{ $basic_info[0]->marital_status }}">
                                            {{ $basic_info[0]->marital_status }}
                                        </option>
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
                                    <input type="number" id="basic_infos_no_of_children" class="form-control" value="{{ $basic_info[0]->no_of_children }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">OBJECTIVES</label>
                            <textarea class="form-control summernote" name="" id="" rows="4">{{ $basic_info[0]->objectives }}</textarea>
                        </div>
                        <button class="btn btn-warning btn-lg basic_infos_update_btn">UPDATE</button>
                    </div>
                </div>
            </div>
            {{-- CONTACTS TAB --}}
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                {{-- CONTACT DETAILS --}}
                <div class="card">
                    <div class="card-header bgcolor">
                        <button class="btn btn-warning btn-sm float-right" data-toggle="modal" data-target=".contact_modal">ADD CONTACT</button>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">CONTACT DETAILS</h5> @if (!empty($successMsg)) <div class="alert alert-success"> {{ $successMsg }}</div> @endif <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">TYPE</th>
                                    <th scope="col">CONTACT_DETAILS</th>
                                    <th scope="col">ACTION</th>
                                </tr>
                            </thead>
                            <tbody> <?php $count = 1; ?> @foreach ($c_contact as $contact) <tr>
                                    <th scope="row">{{ $count++ }}</th>
                                    <td scope="row">{{ $contact->type }}</td>
                                    <td scope="row">{{ $contact->contact_details }}</td>
                                    <td>
                                        <button class="btn btn-danger delete_contact" data-id="{{ $contact->id }}">
                                            <i class="fas fa-trash"></i> | DELETE </button>
                                    </td>
                                </tr> @endforeach </tbody>
                        </table>
                    </div>
                </div>
                {{-- CONTACT PERSON --}}
                <div class="card">
                    <div class="card-header bgcolor">
                        <button class="btn btn-warning btn-sm float-right" data-toggle="modal" data-target="#contactPerson">ADD CONTACT</button>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">CONTACT PERSON INCASE OF EMERGENCY</h5>
                        <hr>
                        <table class="table table-sm" style="font-size: 0.8em">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">CONTACT PERSON</th>
                                    <th scope="col">RELATIONSHIP</th>
                                    <th scope="col">CONTACT NUMBER</th>
                                    <th scope="col">CONTACT ADDRESS</th>
                                    <th scope="col">EMAIL</th>
                                    <th scope="col">ACTION</th>
                                </tr>
                            </thead>
                            <tbody> <?php $counter = 1; ?> @foreach ($contactPerson as $cperson) <tr>
                                    <th scope="row">{{ $counter++ }}</th>
                                    <td>{{ $cperson->contact_name }}</td>
                                    <td>{{ $cperson->relationship }}</td>
                                    <td>{{ $cperson->contact_number }}</td>
                                    <td>{{ $cperson->contract_address }}</td>
                                    <td>{{ $cperson->email }}</td>
                                    <td>
                                        <button class="btn btn-danger delete_cperson" data-id="{{ $cperson->id }}">
                                            <i class="fas fa-trash"></i> | DELETE </button>
                                    </td>
                                </tr> @endforeach </tbody>
                        </table>
                    </div>
                </div>
                {{-- MODAL CONTACT PERSON --}}
                {{-- MODAL CONTACT PERSON --}}
                {{-- MODAL CONTACT PERSON --}}
                <div class="modal fade" id="contactPerson" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">ADDING CONTACT PERSON...</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="/contact-person" method="POST"> @csrf <br>
                                    <input type="hidden" name="barcode" value="{{ $basic_info[0]->barcode }}">
                                    <div class="form-group">
                                        <label for="">CONTACT PERSON</label>
                                        <input type="text" class="form-control " name="contact_name" id="contact_name" aria-describedby="helpId" placeholder="" required>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="">RELATIONSHIP</label>
                                                <input type="text" class="form-control " name="relationship" id="relationship" aria-describedby="helpId" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="">CONTACT NUMBER</label>
                                                <input type="text" class="form-control " name="contact_number" id="contact_number" aria-describedby="helpId" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="">CONTACT ADDRESS</label>
                                                <input type="text" class="form-control " name="contract_address" id="contract_address" aria-describedby="helpId" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="">EMAIL</label>
                                                <input type="text" class="form-control " name="email" id="email" aria-describedby="helpId" placeholder="" required>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- MODAL ADD CONTACTS --}}
                {{-- MODAL ADD CONTACTS --}}
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
                            <form action="/contact" method="POST"> @csrf <input type="hidden" name="barcode" value="{{ $bucs[0]->barcode }}">
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
                            <hr>
                        </div>
                        {{-- --}}
                        {{-- --}}
                        {{-- --}}
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <div class="card">
                                <div class="card-header bgcolor">
                                    <button class="btn btn-warning btn-sm float-right" data-toggle="modal" data-target=".contact_modal">ADD CONTACT</button>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">CONTACT DETAILS</h5> @if (!empty($successMsg)) <div class="alert alert-success"> {{ $successMsg }}</div> @endif <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">TYPE</th>
                                                <th scope="col">CONTACT_DETAILS</th>
                                                <th scope="col">ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody> <?php $count = 1; ?> @foreach ($c_contact as $contact) <tr>
                                                <th scope="row">{{ $count++ }}</th>
                                                <td scope="row">{{ $contact->type }}</td>
                                                <td scope="row">{{ $contact->contact_details }}</td>
                                                <td scope="row">1</td>
                                            </tr> @endforeach </tbody>
                                    </table>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div> {{-- END OF MODAL CONTACTS  --}}
            </div>
            {{-- EXPERIENCE TAB --}}
            <div class="tab-pane fade" id="pills-exp" role="tabpanel" aria-labelledby="pills-exp-tab">
                <div class="card">
                    <div class="card-header bgcolor">
                    </div>
                    <div class="card-body">
                        <div class="card">
                            <button class="btn btn-success btn-sm m-3" data-toggle="modal" data-target=".modaladdexp"> ADD NEW EXPERIENCE </button>
                            <div class="card-body">
                                <div id="accordion"> @if(count($c_exp)) @foreach($c_exp as $exp) <div class="card">
                                        <div class="card-header " id="headingOne">
                                            <h5 class="mb-0">
                                                <div class="row">
                                                    <div class="col-lg-10">
                                                        <button class="btn btn-outline-secondary btn-sm btn-block mb-1" data-toggle="collapse" data-target="#collapse{{$exp->id}}" aria-expanded="true" aria-controls="collapseOne">
                                                            {{$exp->ccompany}} | {{$exp->cposition}} | {{$exp->ccountry}} | {{$exp->cdate}}
                                                        </button>
                                                    </div>
                                                    <div class="col-lg-1">
                                                        <button class="btn btn-outline-warning btn-sm float-right btn-block edit__click" data-id="{{$exp->id}}" data-toggle="modal" data-target=".modaleditexp">EDIT</button>
                                                    </div>
                                                    <div class="col-lg-1">
                                                        <button class="btn btn-danger btn-sm delete__exp" data-id="{{$exp->id}}"><i class="fas fa-trash-alt"></i></button>
                                                    </div>
                                                </div>
                                            </h5>
                                        </div>
                                        <div id="collapse{{$exp->id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                            <div class="card-body"> <?php echo $exp->sdesc?> </div>
                                        </div>
                                    </div> @endforeach @else NO EXP @endif </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- MODAL ADD EXP --}}
                <div class="modal fade modaladdexp" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog  modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Adding New Job Experience</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">POSITION</span>
                                            </div>
                                            <input type="text" class="form-control cposition">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">INCLUSIVE DATE</span>
                                            </div>
                                            <input type="text" class="form-control cdate">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">COMPANY NAME</span>
                                            </div>
                                            <input type="text" class="form-control ccompany">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">COUNTRY</span>
                                            </div>
                                            <input type="text" class="form-control ccountry">
                                        </div>
                                    </div>
                                </div>
                                <textarea class="form-control summernote3" name="" id="" rows="3"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary saveexp">SUBMIT</button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- MODAL EDIT EXP --}}
                <div class="modal fade modaleditexp" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Experience</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="" class="epxID">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">POSITION</span>
                                            </div>
                                            <input type="text" class="form-control ucposition">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">INCLUSIVE DATE</span>
                                            </div>
                                            <input type="text" class="form-control ucdate">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">COMPANY NAME</span>
                                            </div>
                                            <input type="text" class="form-control uccompany">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">COUNTRY</span>
                                            </div>
                                            <input type="text" class="form-control uccountry">
                                        </div>
                                    </div>
                                </div>
                                <textarea class="form-control summernote4" rows="3"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary update__exp">UPDATE</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- DOCUMENT TAB --}}
            <div class="tab-pane fade" id="pills-documents" role="tabpanel" aria-labelledby="pills-document-tab">
                <!-- Modal -->
                <div class="modal fade modal_document_upload" id="" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Uploading Documents</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body"> 

                                <div class="form-group">
                                  <label for="">BARCODE</label>
                                  <input type="text" class="form-control barcode_files" readonly>  
                                </div>

                                <div class="form-group">
                                  <label for="">CATEGORY</label>
                                  <input type="text" class="form-control category_files" readonly>  
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlFile1">UPLOAD FILE</label>
                                    <input type="file" id="filetoup" class="form-control-file file_uploads" accept="application/pdf" />
                                </div>


                            </div>
                            <div class="modal-footer">
                               
                                <button type="button" class="btn btn-warning btn-block submit_uploaded_file_doc">SAVE</button>
                            </div>
                        </div>
                    </div>
                </div> 
              
                
                <div class="row">
                    <div class="col-lg-8">

                        <div class="card">
                            <div class="card-header bgcolor">
                              <small>AVAILABLE DOCUMENTS</small>
                            </div>
                            <div class="card-body">
                                <div class="contai1ner">
                                    <div id="accordion" class="py-5">
        
                                    
        
                                     
                                      @if(count($documents))
        
                                          @foreach($documents as $category) 
                                          
                                            <div class="card border-0 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                                                <div class="card-header p-0 border-0" id="heading-{{$category->id}}">
                                                    <button class="btn btn-link accordion-title border-0 collapsed" data-toggle="collapse" data-target="#collapse-{{$category->id}}" aria-expanded="false" aria-controls="#collapse-{{$category->id}}">
                                                        <i class="fas fa-minus text-center d-flex align-items-center justify-content-center h-100"></i>{{$category->category}} </button>
                                                </div>
                                                <div id="collapse-{{$category->id}}" class="collapse" aria-labelledby="heading-{{$category->id}}" data-parent="#accordion">
                                                    <div class="card-body accordion-body">
        
                                                      <div class="row">
                                                        <div class="col text-center">
                                                            <button class="btn btn-warning btn-sm mb-1 uploader" data-name="{{$category->category}}" data-toggle="modal" data-target=".modal_document_upload">RE-UPLOAD</button>
                                                            <button class="btn btn-danger btn-sm mb-1">DELETE</button>
                                                        </div>
                                                    </div>
        
                                                        <iframe id="fred" style="border:1px solid #666CCC" title="PDF in an i-Frame" src="https://file-examples.com/storage/fef1706276640fa2f99a5a4/2017/10/file-sample_150kB.pdf#zoom=50%" frameborder="1" scrolling="auto" height="400" width="100%"></iframe>
                                                    </div>
                                                </div>
                                            </div>
        
                                          @endforeach 
        
                                      @else
        
                                      NO DOCUMENT ATTACHED
        
        
                                      @endif
          
                                       
        
        
        
                                      
                                    </div>
                                </div>
                            </div>
                          </div>

                       
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header bgcolor">
                                <small>MISSING DOCUMENTS</small>
                            </div>
                            <div class="card-body">
                                <div class="card">
                                    <ul class="list-group list-group-flush">
                                     
                                      @foreach($missingdocs as $missing)

                                        <li class="list-group-item "><strong>{{$missing}}</strong> 
                                            <a href="#" class="float-right uploader btn btn-warning btn-sm" data-toggle="modal" data-target=".modal_document_upload" data-name="{{$missing}}"><i class="fas fa-upload"></i>
                                            </a>
                                        </li>
                                     

                                      @endforeach
                                
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- SKILL TAB --}}
            <div class="tab-pane fade" id="pills-skills" role="tabpanel" aria-labelledby="pills-skill-tab"> @if($bucs[0]->category == 0) <div class="card">
                    <div class="card-header bgcolor"></div>
                    <section>
                        <div class="card border-warning m-3">
                            <input type="hidden" class="skillId" value="EOMS21DHC00001">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <section>
                                            <div class="card  mb-3">
                                                <div class="card-header text-center">
                                                    <h5>HOUSEHOLD WORK EXPERIENCE(S)</h5>
                                                </div>
                                                <div class="card-body text-dark">
                                                    <div class="row">
                                                        <div class=" col-md-4">
                                                            <div class="form-group">
                                                                <div class="form-check">
                                                                    <input class="form-check-input washing" type="checkbox" id="u_c_washing" {{$c_skill[0]->washing == 1 ? 'checked' : ''}}>
                                                                    <label class="form-check-label" for="u_c_washing">
                                                                        <h6>WASHING</h6>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class=" col-md-4">
                                                            <div class="form-group">
                                                                <div class="form-check">
                                                                    <input class="form-check-input sewing" type="checkbox" id="u_c_sewing" {{$c_skill[0]->sewing == 1 ? 'checked' : ''}}>
                                                                    <label class="form-check-label" for="u_c_sewing">
                                                                        <h6>SEWING</h6>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class=" col-md-4">
                                                            <div class="form-group">
                                                                <div class="form-check">
                                                                    <input class="form-check-input cleaning" type="checkbox" id="u_c_cleaning" {{$c_skill[0]->cleaning == 1 ? 'checked' : ''}}>
                                                                    <label class="form-check-label" for="u_c_cleaning">
                                                                        <h6>CLEANING</h6>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class=" col-md-4">
                                                            <div class="form-group">
                                                                <div class="form-check">
                                                                    <input class="form-check-input cooking" type="checkbox" id="u_c_cooking" {{$c_skill[0]->cooking == 1 ? 'checked' : ''}}>
                                                                    <label class="form-check-label" for="u_c_cooking">
                                                                        <h6>COOKING</h6>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class=" col-md-4">
                                                            <div class="form-group">
                                                                <div class="form-check">
                                                                    <input class="form-check-input ironing" type="checkbox" id="u_c_ironing" {{$c_skill[0]->ironing == 1 ? 'checked' : ''}}>
                                                                    <label class="form-check-label " for="u_c_ironing">
                                                                        <h6>IRONING</h6>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class=" col-md-4">
                                                            <div class="form-group">
                                                                <div class="form-check">
                                                                    <input class="form-check-input babycare" type="checkbox" id="u_c_babycare" {{$c_skill[0]->baby_care == 1 ? 'checked' : ''}}>
                                                                    <label class="form-check-label" for="u_c_babycare">
                                                                        <h6>BABYCARE</h6>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                    <div class="col-lg-6">
                                        <section>
                                            <div class="card">
                                                <div class="card-header text-center">
                                                    <h5>LANGUAGE YOU CAN SPEAK OR WRITE</h5>
                                                </div>
                                                <div class="card-body">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <!-- <tr><th scope="col">#</th><th colspan="3" scope="col"></th></tr> -->
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">English</th>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="English_flexRadioDefault" id="u_English_flexRadioDefault1" {{$c_skill[0]->english == 1 ? 'checked' : ''}}>
                                                                        <label class="form-check-label" for="u_English_flexRadioDefault1"> Fluent </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="English_flexRadioDefault" id="u_English_flexRadioDefault2" {{$c_skill[0]->english == 2 ? 'checked' : ''}}>
                                                                        <label class="form-check-label" for="u_English_flexRadioDefault2"> Fair </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="English_flexRadioDefault" id="u_English_flexRadioDefault3" {{$c_skill[0]->english == 3 ? 'checked' : ''}}>
                                                                        <label class="form-check-label" for="u_English_flexRadioDefault3"> Poor </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Arabic</th>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="arabic_flexRadioDefault" id="u_arabic_flexRadioDefault1" {{$c_skill[0]->arabic == 1 ? 'checked' : ''}}>
                                                                        <label class="form-check-label" for="u_arabic_flexRadioDefault1"> Fluent </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="arabic_flexRadioDefault" id="u_arabic_flexRadioDefault2" {{$c_skill[0]->arabic == 2 ? 'checked' : ''}}>
                                                                        <label class="form-check-label" for="u_arabic_flexRadioDefault2"> Fair </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="arabic_flexRadioDefault" id="u_arabic_flexRadioDefault3" {{$c_skill[0]->arabic == 3 ? 'checked' : ''}}>
                                                                        <label class="form-check-label" for="u_arabic_flexRadioDefault3"> Poor </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Mandarin</th>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="mandarin_flexRadioDefault" id="u_mandarin_flexRadioDefault1" {{$c_skill[0]->mandarin == 1 ? 'checked' : ''}}>
                                                                        <label class="form-check-label" for="u_mandarin_flexRadioDefault1"> Fluent </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="mandarin_flexRadioDefault" id="u_mandarin_flexRadioDefault2" {{$c_skill[0]->mandarin == 2 ? 'checked' : ''}}>
                                                                        <label class="form-check-label" for="u_mandarin_flexRadioDefault2"> Fair </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="mandarin_flexRadioDefault" id="u_mandarin_flexRadioDefault3" {{$c_skill[0]->mandarin == 3 ? 'checked' : ''}}>
                                                                        <label class="form-check-label" for="u_mandarin_flexRadioDefault3"> Poor </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                                <button class="btn btn-warning btn-block btn-lg update_skills">UPDATE</button>
                            </div>
                        </div>
                    </section>
                </div> @else <div class="card">
                    <div class="card-header bgcolor"> SKILL </div>
                    <div class="card-body">
                        <textarea class="form-control summernote2" name="" id="" rows="4">
                        {{$c_skill[0]->sdesc}}
                        </textarea>
                    </div>
                    <button class="btn btn-warning m-1 update____skills ">UPDATE</button>
                </div> @endif </div>
            {{-- EDUCATION BACK GROUND FORM TAB --}}
            <div class="tab-pane fade" id="pills-educ" role="tabpanel" aria-labelledby="pills-educ-tab">
                <div class="card">
                    <div class="card-header bgcolor">
                        <a class="btn btn-warning" data-toggle="modal" data-target="#educModal">ADD NEW</a>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>SCHOOL</th>
                                    <th>DEGREE</th>
                                    <th>SY</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody> @foreach($geteducation as $geteduc) <tr>
                                    <td scope="row">{{$geteduc->school}}</td>
                                    <td>{{$geteduc->degree}}</td>
                                    <td>{{$geteduc->school_year}}</td>
                                    <td>
                                        <button class="btn btn-danger btn-sm delete_educ" data-id="{{$geteduc->id}}">
                                            <i class="fas fa-trash"></i> | DELETE </button>
                                    </td>
                                </tr> @endforeach </tbody>
                        </table>
                    </div>
                    <div class="card-footer text-muted"> INFORMATION </div>
                </div>
                {{-- EDUCATION BACK GROUND FORM MODAL --}}
                <div class="modal fade" id="educModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Adding Education</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <form action="/create_educ" method="POST"> @csrf <input type="hidden" name="barcode" value="{{ $bucs[0]->barcode }}">
                                        <div class="form-group">
                                            <label for="">SCHOOL NAME</label>
                                            <input type="text" class="form-control" name="school" id="school" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">COURSE/DEGREE</label>
                                            <input type="text" class="form-control" name="degree" id="degree" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">SCHOOL YEAR</label>
                                            <input type="text" class="form-control" name="school_year" id="school_year" required>
                                        </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                            </form>
                        </div>
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
                var bcode_session = "{{ $bucs[0]->barcode }}"
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
            $(document).ready(function() {
                $('a[data-toggle="pill"]').on('shown.bs.tab', function(e) {
                    localStorage.setItem('lastTab', $(this).attr('href'));
                });
                var lastTab = localStorage.getItem('lastTab');
                if (lastTab) {
                    $('[href="' + lastTab + '"]').tab('show');
                    if (lastTab == "#pills-documents") {
                        $('[data-widget="pushmenu"]').PushMenu("collapse");
                    } else {
                        $('[data-widget="pushmenu"]').PushMenu("expand");
                    }
                }
            });
            $(document).ready(function() {
                $('.summernote').summernote({
                    height: 200,
                    focus: true
                });
                $('.summernote2').summernote({
                    height: 200,
                    focus: true
                });
                $('.summernote3').summernote({
                    height: 200,
                    focus: true
                });
                $('.summernote4').summernote({
                    height: 200,
                    focus: true
                });
            });
            $('.delete_contact').on('click', function() {
                var id_contact = $(this).attr("data-id");
                // alert(id_contact)
                $.ajax({
                    url: '/delete_contact/' + id_contact,
                    type: 'POST',
                    data: {
                        'id_contact': id_contact,
                    },
                    success: function(data) {
                        console.log(data)
                        alert(data)
                        location.reload()
                    }
                });
            });
            $('.delete_cperson').on('click', function() {
                var id_cperson = $(this).attr("data-id");
                // alert(id_cperson)
                $.ajax({
                    url: '/delete_contact_person/' + id_cperson,
                    type: 'POST',
                    data: {
                        'id_cperson': id_cperson,
                    },
                    success: function(data) {
                        console.log(data)
                        alert(data)
                        location.reload()
                    }
                });
            });
            $('.delete_contact').on('click', function() {
                var contactDetails = $(this).attr("data-id");
                $.ajax({
                    url: '/delete_contact_details/' + contactDetails,
                    type: 'POST',
                    data: {
                        'contactDetails': contactDetails,
                    },
                    success: function(data) {
                        console.log(data)
                        alert(data)
                        location.reload()
                    }
                });
            });
            $('.delete_educ').on('click', function() {
                var educID = $(this).attr("data-id");
                $.ajax({
                    url: '/create_educ/delete/' + educID,
                    type: 'POST',
                    data: {
                        'educID': educID,
                    },
                    success: function(data) {
                        console.log(data)
                        alert(data)
                        location.reload()
                    }
                });
            });
            $('.pos_update').on('click', function() {
                var id = $(this).attr('data-id');
                var cat1 = $('.cat1').val();
                var cat2 = $('.cat2').val();
                var cat3 = $('.cat3').val();
                $.ajax({
                    url: '/category/update',
                    type: 'POST',
                    data: {
                        'id': id,
                        'cat1': cat1,
                        'cat2': cat2,
                        'cat3': cat3,
                    },
                    success: function(data) {
                        console.log(data)
                        alert(data)
                        location.reload()
                    }
                });
            });
            //   $('.update_skills').on('click', function(){
            //     var skillId =1;
            //     $.ajax({
            //       url: '/skillsupdate',
            //       type: 'POST',
            //       data: {
            //         'skillId' : skillId,
            //         // 'isCheck_washing' : isCheck_washing,
            //         // 'isCheck_sewing' : isCheck_sewing,
            //         // 'isCheck_cleaning' : isCheck_cleaning,
            //         // 'isCheck_cooking' : isCheck_cooking,
            //         // 'isCheck_ironing' : isCheck_ironing,
            //         // 'isCheck_babycare' : isCheck_babycare,
            //         // 'english' : english,
            //         // 'arabic' : arabic,
            //         // 'mandarin' : mandarin, 
            //       },
            //       success: function(data) {
            //         console.log(data)
            //       }
            //     });
            //   });
            $('.update_skills').on('click', function() {
                var skillId = "{{ $bucs[0]->barcode }}";
                var isCheck_washing
                if ($('#u_c_washing').is(':checked')) {
                    isCheck_washing = "1";
                } else {
                    isCheck_washing = "0";
                }
                var isCheck_sewing
                if ($('#u_c_sewing').is(':checked')) {
                    isCheck_sewing = "1";
                } else {
                    isCheck_sewing = "0";
                }
                var isCheck_cleaning
                if ($('#u_c_cleaning').is(':checked')) {
                    isCheck_cleaning = "1";
                } else {
                    isCheck_cleaning = "0";
                }
                var isCheck_cooking
                if ($('#u_c_cooking').is(':checked')) {
                    isCheck_cooking = "1";
                } else {
                    isCheck_cooking = "0";
                }
                var isCheck_ironing
                if ($('#u_c_ironing').is(':checked')) {
                    isCheck_ironing = "1";
                } else {
                    isCheck_ironing = "0";
                }
                var isCheck_babycare
                if ($('#u_c_babycare').is(':checked')) {
                    isCheck_babycare = "1";
                } else {
                    isCheck_babycare = "0";
                }
                var english;
                var arabic;
                var mandarin;
                if ($('#u_English_flexRadioDefault1').is(':checked')) {
                    english = 1;
                } else if ($('#u_English_flexRadioDefault2').is(':checked')) {
                    english = 2;
                } else if ($('#u_English_flexRadioDefault3').is(':checked')) {
                    english = 3;
                } else {
                    english = 0;
                }
                if ($('#u_arabic_flexRadioDefault1').is(':checked')) {
                    arabic = 1;
                } else if ($('#u_arabic_flexRadioDefault2').is(':checked')) {
                    arabic = 2;
                } else if ($('#u_arabic_flexRadioDefault3').is(':checked')) {
                    arabic = 3;
                } else {
                    arabic = 0;
                }
                if ($('#u_mandarin_flexRadioDefault1').is(':checked')) {
                    mandarin = 1;
                } else if ($('#u_mandarin_flexRadioDefault2').is(':checked')) {
                    mandarin = 2;
                } else if ($('#u_mandarin_flexRadioDefault3').is(':checked')) {
                    mandarin = 3;
                } else {
                    mandarin = 0
                }
                // alert(isCheck_washing);
                // alert(isCheck_sewing);
                // alert(isCheck_cleaning);
                // alert(isCheck_cooking);
                // alert(isCheck_ironing);
                // alert(isCheck_babycare);
                // alert(english);
                // alert(arabic);
                // alert(mandarin);
                $.ajax({
                    url: '/skillsupdate',
                    type: 'POST',
                    data: {
                        'skillId': skillId,
                        'isCheck_washing': isCheck_washing,
                        'isCheck_sewing': isCheck_sewing,
                        'isCheck_cleaning': isCheck_cleaning,
                        'isCheck_cooking': isCheck_cooking,
                        'isCheck_ironing': isCheck_ironing,
                        'isCheck_babycare': isCheck_babycare,
                        'english': english,
                        'arabic': arabic,
                        'mandarin': mandarin,
                    },
                    success: function(data) {
                        console.log(data)
                        alert(data)
                        location.reload();
                    }
                });
            });
            $('.update____skills').on('click', function() {
                var barcode = "{{ $bucs[0]->barcode }}";
                var textareaValu1e = $('.summernote2').summernote('code');
                // alert(barcode)
                // alert(textareaValu1e)
                $.ajax({
                    url: '/skilled-update',
                    type: 'POST',
                    data: {
                        'barcode': barcode,
                        'textareaValu1e': textareaValu1e,
                    },
                    success: function(data) {
                        console.log(data)
                        alert(data)
                        location.reload();
                    }
                });
            });
            $('.saveexp').on('click', function() {
                var barcode = "{{ $bucs[0]->barcode }}";
                var cposition = $('.cposition').val();
                var ccompany = $('.ccompany').val();
                var cdate = $('.cdate').val();
                var textdecs = $('.summernote3').summernote('code');
                var ccountry = $('.ccountry').val();
                if (cposition == "") {
                    alert("POSITION IS REQUIRED")
                    $('.cposition').focus();
                    return
                }
                if (ccompany == "") {
                    alert("COMPANY NAME IS REQUIRED  ")
                    $('.ccompany').focus();
                    return
                }
                if (cdate == "") {
                    alert("INCLUSIVE DATE IS REQUIRED  ")
                    $('.cdate').focus();
                    return
                }
                if (ccountry == "") {
                    alert("COUNTRY IS REQUIRED  ")
                    $('.ccountry').focus();
                    return
                }
                //  alert(cposition)
                //  alert(ccompany)
                //  alert(cdate)
                //  alert(textdecs)
                //  alert(ccountry)
                $.ajax({
                    url: '/experience',
                    type: 'POST',
                    data: {
                        'barcode': barcode,
                        'cposition': cposition,
                        'ccompany': ccompany,
                        'cdate': cdate,
                        'textdecs': textdecs,
                        'ccountry': ccountry,
                    },
                    success: function(data) {
                        console.log(data)
                        alert(data)
                        location.reload()
                    }
                });
            });
            $('.edit__click').on('click', function() {
                var id = $(this).attr('data-id');
                $.ajax({
                    url: '/pullexp',
                    type: 'POST',
                    data: {
                        'id': id,
                    },
                    success: function(data) {
                        console.log(data)
                        $('.epxID').val(data.id);
                        $('.ucposition').val(data.cposition);
                        $('.ucdate').val(data.cdate);
                        $('.uccompany').val(data.ccompany);
                        $('.uccountry').val(data.ccountry);
                        $(".summernote4").summernote("code", data.sdesc);
                    }
                });
            });
            $('.update__exp').on('click', function() {
                var epxID = $('.epxID').val();
                var ucposition = $('.ucposition').val();
                var ucdate = $('.ucdate').val();
                var uccompany = $('.uccompany').val();
                var uccountry = $('.uccountry').val();
                var summernote4 = $(".summernote4").summernote("code");
                // alert(epxID)
                // alert(ucposition)
                // alert(ucdate)
                // alert(uccompany)
                // alert(uccountry)
                // alert(summernote4)
                $.ajax({
                    url: '/pullupdate',
                    type: 'POST',
                    data: {
                        'epxID': epxID,
                        'ucposition': ucposition,
                        'ucdate': ucdate,
                        'uccompany': uccompany,
                        'uccountry': uccountry,
                        'summernote4': summernote4,
                    },
                    success: function(data) {
                        console.log(data)
                        alert(data)
                        location.reload();
                    }
                });
            });
            $('.delete__exp').on('click', function() {
                var id = $(this).attr('data-id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/pulldelete',
                            type: 'POST',
                            data: {
                                'id': id,
                            },
                            success: function(data) {
                                console.log(data)
                                // alert(data)
                                // location.reload();
                                Swal.fire('Deleted!', 'Your file has been deleted.', data)
                                $('.swal2-confirm').on('click', function() {
                                    location.reload();
                                });
                            }
                        });
                    }
                })
            });
            $('#pills-documents-tab').on('click', function() {
                $('[data-widget="pushmenu"]').PushMenu("collapse");
                // var lastTab = localStorage.getItem('lastTab');
            });
            $(".collapse [data-toggle=collapse]:last").click()


            $('.uploader').on('click', function(){
                var barcode = "{{ $bucs[0]->barcode }}";
                var name = $(this).attr('data-name');

                 $('.barcode_files').val(barcode);
                 $('.category_files').val(name);

            });



            $('.submit_uploaded_file_doc').on('click', function(){

                if ($('#filetoup').get(0).files.length === 0) {


                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'No files selected.',
                  
                    })
                    
                    console.log("No files selected.");

                    return
                }else{



                    Swal.fire({
                        title: 'Do you want to upload this files',
                        showDenyButton: true,
                        showCancelButton: true,
                        confirmButtonText: 'Save',
                        denyButtonText: `Don't save`,
                    }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {

                            var category_files  = $('.category_files').val();
                            var barcode = "{{ $bucs[0]->barcode }}";
                            var file_data = $('#filetoup').prop('files')[0];
                            var form_data = new FormData();
                            form_data.append('files', file_data);

                            // console.log(file_data)

                            $.ajax({
                                url: '/upload-file', // point to server-side PHP script 
                                dataType: 'json', // what to expect back from the PHP script, if anything
                                cache: false,
                                contentType: false,
                                processData: false,
                                data: form_data,
                                type: 'POST',
                                success: function(data) {
                                    // alert(data)
                                    var oldfilename = data.oldfilename
                                    var newfilename = data.filename
                                
                                
                                    console.log(data)
                                    $.ajax({
                                        url: '/uploadfile/update',
                                        type: 'POST',
                                        data: {
                                            'oldfilename': oldfilename,
                                            'newfilename': newfilename,
                                            'barcode': barcode,
                                            'category_files': category_files,
                                        },
                                        success: function(data) {
                                            console.log(data)
                                           
                                            Swal.fire('Saved!', '', 'success')

                                            $('.swal2-confirm').on('click', function(){
                                                location.reload();
                                            });


                                        }
                                    });
                                }
                            });

                        } else if (result.isDenied) {
                            Swal.fire('Upload Reverted', '', 'info')
                        }
                    })
                }

            });



            $('.montorstat').on('change', function(){
                var barcode = "{{ $bucs[0]->barcode }}";
                var status = $(this).val();
               

               $.ajax({
                    url: '/monstat',
                    type: 'POST',
                    data: {
                        'barcode': barcode,
                        'status': status,
                    },
                    success: function(data) {

                        console.log("status monitor is "+data)
                       alert("status monitor changed")
                    }
                });


            });



        </script> @endsection