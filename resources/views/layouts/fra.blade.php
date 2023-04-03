<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap4.min.css">


    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    
<style>
   .goldencolor {
    background-color: #534223 !important;
    
}

.blackcolor{
    background-color: #141414 !important;
}

.white-text{
    color: white !important;
}

.nav-pills .nav-link.active, .nav-pills .show > .nav-link {
    color: #fff;
    background-color: #9e9e9e;
    border: 1px solid #3a3b00
}

.bgcolor{
    background-color: #534223;
}
</style>



</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        {{-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div> --}}

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light blackcolor">
            <!-- Left navbar links -->
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link white-text " data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars "></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/" class="nav-link white-text">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link white-text">Contact</a>
                </li>
            </ul>

           
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/home" class="brand-link blackcolor">
                <img src="{{ asset('/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">EOMSINC 3</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">
                            {{ Auth::user()->name }} -
                            @if (Auth::user()->type == 0)
                            ADMIN
                            @endif

                            @if (Auth::user()->type == 2)
                            TIEUP
                            @endif

                            @if (Auth::user()->type == 3)
                            INCORPORATOR
                            @endif

                            @if (Auth::user()->type == 4)
                            FRA
                            @endif

                        </a>

                    </div>

                </div>

           




                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        {{-- <li class="nav-item menu-open"> --}}
                        <li class="nav-item menu-is-opening menu-open  ">
                            <a href="#" class="nav-link active  goldencolor">
                                <i class="nav-icon fas fa-tachometer-alt "></i>
                                <p>
                                    DASHBOARD
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview open">
                                <li class="nav-item">
                                    <a href="/home" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>HOME</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/list" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>LIST OF CANDIDATES</p>
                                    </a>
                                </li>    
                            </ul>
                        </li>
                      

                    </ul>

                    <hr>
                    <div class="mt-3">
                        <a class="btn btn-danger btn-block btn-sm" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('') }} <i class="fas fa-sign-out-alt"></i> | <small>LOGOUT</small> 
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>

                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            {{-- <h1 class="m-0">Dashboard</h1> --}}
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            {{-- <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard v1</li>
                            </ol> --}}
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    @yield('content')

                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2018-2023 <a href="https://eomsinc.com/">BLACKBOX SOFTWARE INC</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.0.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
{{-- 
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script> --}}
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>


        <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap4.min.js"></script>

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">


        


</body>

</html>


<script>


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $(document).ready(function () {
        $('#example').DataTable({
            "autoWidth": false
        });
    });


    $('.save_officer').on('click', function(){

        var csrf = document.querySelector('meta[name="csrf-token"]').content;
        var select_officers = $('.select_officers').val();
        var id_c_info = $('.id_c_info').val();
        // alert(csrf)
        // alert(id_c_info)


        $.ajax({
                type:'POST',
                url:"/update/" + id_c_info,
                data:{
                    'id_c_info': id_c_info,
                    'select_officers': select_officers,
                },
                success:function(data){
                
                  console.log(data);
                    location.reload();

                }
              });
    
    });


    $('#example').on('click', '.asnbtn', function(){
        var id = $(this).attr("data-id");
        $('.id_c_info').val(id);

    });



    $('.verify_barcode').on('click', function(){

        var input_barcode = $('.input_barcode').val();

        if(input_barcode == ""){
          
            Swal.fire('PLEASE PUT YOUR BARCODE')
       
        }else{

            $.ajax({
                type:'POST',
                url:"/create",
                data:{
                    'input_barcode': input_barcode,
                    
                },
                success:function(data){
                
                    console.log(data);
                    if(data == 1){
                        Swal.fire(
                        'BARCODE VALIDATED!',
                        'PROCESSING',
                        'success'
                        )

                        $('.shortDetails').show();
                        $('.barcode_verifier').hide();



                    }

                    if(data == 2){
                        Swal.fire('BARCODE ALREADY USED')
                        return
                    }
                    
                    if(data == 3){
                        Swal.fire('BARCODE NOT EXIST')
                        return
                    }
                  

                }
            });

        }

            

    });

$('#category_new').on('change', function(){

    if(this.value == "err"){
        alert("Please choose category")
        return
    }


    if(this.value == 0){
        $('.c_cat1').prop('readonly', true);
        $('.c_cat1').val("DOMETIC HELPER");
    }else{
        $('.c_cat1').val("");
        $('.c_cat1').prop('readonly', false);
    }
    
});


$('.submit_c_info').on('click', function(){

   

    var c_cat1 = $('.c_cat1').val();
   
    var fullname = $('.fullname').val();
    var passport_no = $('.passport_no').val();
    var barcode = $('.input_barcode').val();
    var account_officer = "{{Auth::user()->username}}";
    var email = "";
    var pw = "";
    var status = 1;
    var remarks = "";
    var allowed = "";
    var category = $('#category_new').val();

   

   if(category == "err"){

    
        Swal.fire({
            icon: 'error',
            title: 'Please select category',
            text: 'Something went wrong!',
        })


        return
    
   }

  

    if(fullname ==""){
       

        Swal.fire({
            icon: 'error',
            title: 'FULLNAME IS REQUIRED',
            text: 'Something went wrong!',
        })


        return
    }

    if(passport_no ==""){
       

        Swal.fire({
            icon: 'error',
            title: 'PASSPORT IS REQUIRED',
            text: 'Something went wrong!',
        })

        return
    }

    if(c_cat1 == ""){

        Swal.fire({
            icon: 'error',
            title: 'PLEASE ADD POSITION',
            text: 'Something went wrong!',
        })

        return  
    }

    
    Swal.fire({
            title: 'Do you want to save this information?',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Save',
            denyButtonText: `Don't save`,
        }).then((result) => {
  
            if (result.isConfirmed) {

                $(this).prop('disabled', true);

                $.ajax({
                type:'POST',
                url:"/create/store",
                data:{
                    'barcode': barcode,
                    'fullname': fullname,
                    'passport_no': passport_no,
                    'email': email,
                    'pw': pw,
                    'status': status,
                    'remarks': remarks,
                    'allowed': allowed,
                    'category': category,
                    'account_officer': account_officer,
                    'c_cat1': c_cat1,
                     
                },
                success:function(data){
                
                 console.log(data)
                 Swal.fire(data) 
                 Swal.fire(data, '', 'success')

                 $('.swal2-confirm').on('click', function(){
                    // window.open("/create/edit/"+barcode, '_blank');
                    window.open("/create/edit/"+barcode);
                    location.reload();
                 });

                }
            });
         
            } else if (result.isDenied) {
                Swal.fire('Encoding canceled', '', 'info')
                $(this).prop('disabled', false);
            }
    })




       



});


$('.submit_c_info_update').on('click', function(){

    var updatebarcode  = $('.updatebarcode').val();
    var updateName  = $('.updateName').val();
    var updatePassport  = $('.updatePassport').val();

    var aofficer  = $('.aofficer').val();
    var allowoff  = $('.allowoff').val();
    var categoryUpdate  = $('.categoryUpdate').val();


    //  alert(updatebarcode)
    //  alert(updateName)
    //  alert(updatePassport)

     $.ajax({
                type:'POST',
                url:"/create/update",
                data:{
                    'updatebarcode': updatebarcode,
                    'updateName': updateName,
                    'updatePassport': updatePassport,

                    'aofficer': aofficer,
                    'allowoff': allowoff,
                    'categoryUpdate': categoryUpdate,
                },
                success:function(data){
                



             
                 Swal.fire(data) 


                 $('.swal2-confirm').on('click', function(){
                    location.reload();
                 });

                }
            });

});


$('.skilledUpdate').on('click', function(){
        $('.categoryUpdate').val("SKILLED");
});

$('.dhUpdate').on('click', function(){
        $('.categoryUpdate').val("DH");
});



$('.basic_infos_update_btn').on('click', function(){

var basic_infos_barcode = $("#basic_infos_barcode").val();
var basic_infos_gender = $("#basic_infos_gender").val();
var basic_infos_dob = $("#basic_infos_dob").val();
var basic_infos_pob = $("#basic_infos_pob").val();
var basic_infos_height = $("#basic_infos_height").val();
var basic_infos_weight = $("#basic_infos_weight").val();
var basic_infos_religion = $("#basic_infos_religion").val();
var basic_infos_blood_type = $("#basic_infos_blood_type").val();
var basic_infos_marital_status = $("#basic_infos_marital_status").val();
var basic_infos_no_of_children = $("#basic_infos_no_of_children").val();
var summernote = $(".summernote").summernote('code');

        // alert(basic_infos_barcode)
        // alert(basic_infos_gender)
        // alert(basic_infos_dob)
        // alert(basic_infos_pob)
        // alert(basic_infos_height)
        // alert(basic_infos_weight)
        // alert(basic_infos_religion)
        // alert(basic_infos_blood_type)
        // alert(basic_infos_marital_status)
        // alert(basic_infos_no_of_children)
        // alert(summernote)


            $.ajax({
                type:'POST',
                url:"/create/update-basic-info",
                data:{
                    
                    'basic_infos_barcode': basic_infos_barcode,
                    'basic_infos_gender': basic_infos_gender,
                    'basic_infos_dob': basic_infos_dob,
                    'basic_infos_pob': basic_infos_pob,
                    'basic_infos_height': basic_infos_height,
                    'basic_infos_weight': basic_infos_weight,
                    'basic_infos_religion': basic_infos_religion,
                    'basic_infos_blood_type': basic_infos_blood_type,
                    'basic_infos_marital_status': basic_infos_marital_status,
                    'basic_infos_no_of_children': basic_infos_no_of_children,
                    'summernote': summernote,
                },
                success:function(data){
                



             
                 Swal.fire(data) 


                 $('.swal2-confirm').on('click', function(){
                    location.reload();
                 });

                }
            });


});



$('.contact_____________').on('click', function(){
    var bcode  = $(this).attr('data-bcode')
  
    // alert(bcode)


    $.ajax({
        type:'POST',
        url:"/contact_____________",
        data:{
            
            'bcode': bcode,
            
        },
        success:function(data){


            console.log(data)
            $('.contactappend').html("");
            data.contact.forEach(value => {
                $('.contactappend').append('<li class="list-group-item">CONTACT NUMBER: <span class="datainfo contactinfo">'+value.contact_details+'</span></li>')
            })

           

            nameinfo = $('.nameinfo').text(data.infossss[0].fullname)
            positioninfo = $('.positioninfo').text(data.category[0].cat1)
            imagebox = $('.imagebox').text(data.basic_infos[0].photo)
            // contactinfo = $('.contactinfo').text(data.category[0].cat1)
            
           
           

        }
    });

});





</script>


  


