

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
      <div class="modal-header">
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


           
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>