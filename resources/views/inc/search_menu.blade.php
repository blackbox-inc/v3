

<?php 
function set_active($routeName, $className = 'active-menus') {
    if (Route::currentRouteName() == $routeName || Route::current()->uri() == $routeName) {
        return $className;
    }

    return '';
}


?>


<style>


  .active-menus{
    background: #343A40;
    color: white;
    font-weight: 700;
  }


  .datainfo{
    font-weight: 700;
  
  }


</style>



<div class="nav-scroller bg-white box-shadow">
    <nav class="nav nav-underline">
     
      <a class="nav-link" {{ set_active('position') }} href="/list">ALL LIST | </a>
      <a class="nav-link  {{ set_active('position') }} " href="/position">SEARCH BY POSITION |</a>
      <a class="nav-link {{ set_active('fullname') }} " href="/fullname">SEARCH BY FULLNAME |</a>
     
    </nav>
  </div>




  <!-- Modal -->
<div class="modal fade contact_me"  data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header  btn-secondary">
        <h5 class="modal-title" id="staticBackdropLabel">CONTACTS</h5>
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="card">

            <div class="row">
              <div class="col-sm-6">
                <div class="card m-3">
                  <div class="card-body">
                    <div class="imagebox">IMAGE HERE</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <ul class="list-group list-group-flush m-2">
                  <li class="list-group-item">NAME: <span class="datainfo nameinfo">333333</span></li>
                  <li class="list-group-item">POSITION: <span class="datainfo positioninfo">123123123</span></li>
                  <div class="list-group list-group-flush contactappend">
                    <li class="list-group-item">CONTACT NUMBER: <span class="datainfo contactinfo">123123123</span></li>
                  </div>
                </ul>
              </div>
            </div>

            <button class="btn btn-outline-secondary  m-3" data-toggle="modal" data-target=".modalfra" >CREATE LINE-UP</button>
           
          </div>


          <div class="card">
            <div class="card-header bgcolor" style="color: white">
              LINED UP HISTORY
            </div>
            <div class="card-body">

              <table id="examasdasple" class="table table-striped table-bordered" style="width:100%;">
                <thead>
                  <tr>
                      <th>BARCODE</th>
                      <th>FRA_NAME</th>
                      <th>APP_STATUS</th>
                      <th>created_at</th>
                    
                  </tr>
              </thead>
                <tbody>
                  <tr>
                      <td>Tiger Nixon</td>
                      <td>System Architect</td>
                      <td>Edinburgh</td>
                     
                      <td>2011-04-25</td>
                     
                  </tr>
                 
                
                
              </tbody>
              
          </table>


             
            </div>
          </div>


       
         


      </div>
      <div class="modal-footer">


  
       
      </div>
    </div>
  </div>
</div>






              @if(isset($getFra))

               {{-- MODAL FOR SELECTING FRA --}}
                    {{-- MODAL FOR LINEUP --}}
                    <div class="modal fade modalfra" id="" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header bgcolor">
                            <h5 class="modal-title" id="exampleModalLabel" style="color:white">SELECT FRA / CLIENT</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">


                          

                            <p class="barcode_"></p>

                              <div class="row">
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label for="">CHOOSE FRA/CLIENT</label>
                                    <select class="selecta2 fra_name" name="fra_name" >
                                      <option value="">Please select FRA</option>
                                      @foreach($getFra as $fra)
                                      <option value="{{$fra->username}}">{{$fra->name}}</option>
                                    
                                      @endforeach
                                    </select>
                                  </div>
                                </div>
                                <div class="col-lg-6">
                                  <label for="">SELECT POSITION</label>
                             
                              <select class="selecta2 position" name="position">
                                <option value="">Please select position</option>
                                @foreach($joblist as $jl)
                                  <option value="{{$jl->cat1}}">{{$jl->cat1}}</option> 
                                @endforeach
                              </select>
                                </div>
                              </div>
                              

                              


                              <div class="row">
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label for="">FRA USERNAME</label>
                                    <input type="text" class="form-control fra_username" name="fra_username" readonly>
                                  </div>
                                </div>
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label for="">ACCOUNT OFFICER</label>
                                    <input type="text" class="form-control account_officer" value="{{Auth::user()->username}}" name="account_officer" readonly>
                                  </div>
                                </div>
                              </div>


                              
  

                             
  

                              




                          </div>
                          <div class="modal-footer">



                            


                          
                            <button type="button" class="btn btn-secondary submit__lineup">Submit lineup</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  {{-- MODAL FOR LINEUP END--}}
               

           
              

              @endif
  