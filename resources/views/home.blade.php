@extends('layouts.app')

@section('content')


<div class="row">
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">TOTAL CANDIDATES</span>
                <span id="count1" class="info-box-number">
                    {{$countrs}}

                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">LINE UP</span>
                <span id="count2" class="info-box-number"><?php echo $result_l_candidates = 1; ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">DEPLOYED</span>
                <span id="count3" class="info-box-number"><?php echo $result_d_candidates = 1; ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">EMERGENCIES</span>
                <span class="info-box-number" style="color: red; font-size: 40px"> <?php echo $result_candidates = 1; ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->





{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}

                    @if (Auth::user()->type == 0)
                    <h1>ADMIN</h1>
                    @endif


                    {{Auth::user()->code}}


                </div>
            </div>
        </div>
    </div>
</div> --}}


<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
              Top 100 new applicants
            </div>
            <div class="card-body" style=" overflow: scroll; height: 350px;">
                <div class="card">

                   
                       
                   

                  
                       
                    <ul class="list-group list-group-flush">
                    
                        <?php $counter = 1?>
                        @foreach($last10Records as $l10)
                            <li class="list-group-item" style="padding: 5px">{{$counter++}}. {{strtoupper($l10->fullname)}} <small><i>({{$l10->barcode}})</i></small> <a href="/create/edit/{{$l10->barcode}}" class="btn btn-warning btn-sm float-right" target="_blank"><i class="far fa-eye"></i></a></li>
                        @endforeach
                  
                    </ul>

   

                   
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
             Applicants on monitoring
            </div>
            <div class="card-body" style=" overflow: scroll; height: 350px;">
                <div class="card">
                    <ul class="list-group list-group-flush">
                        <?php $counter = 1?>
                        @foreach($monitor_result as $monresult)
                            <li class="list-group-item" style="padding: 5px">{{$counter++}}. {{strtoupper($monresult->fullname)}} <small><i>(by {{$monresult->account_officer}})</i></small> <a href="/create/edit/{{$monresult->barcode}}" class="btn btn-warning btn-sm float-right" target="_blank"><i class="far fa-eye"></i></a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
          </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
              Updated worker Location
            </div>
            <div class="card-body">
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
    </div>
</div>




@if (Auth::user()->type == 0)
        <script>
            var old_count = {{$countmembers}};

            setInterval(function(){    
                $.ajax({
                    type : "POST",
                    url : "/home",
                    success : function(data){
                        console.log(data)
                        if (data.countrs > old_count) {
                           
                            console.log('new record ');
                            old_count = data;

                            var lastrecord = data.lastRecord;


                            toastr.options = {
                                "closeButton": false,
                                "debug": false,
                                "newestOnTop": false,
                                "progressBar": true,
                                "positionClass": "toast-top-right",
                                "preventDuplicates": false,
                                "onclick": null,
                                "showDuration": "300",
                                "hideDuration": "1000",
                                "timeOut": "20000",
                                "extendedTimeOut": "1000",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                            }

                            toastr.success('New record by '+lastrecord.account_officer +' created with a userid of '+lastrecord.barcode +'', "'"+lastrecord.fullname+"'")
                            
                        }else{
                            console.log("SAME COUNT")
                        }
                    }
                });
            },5000);
        </script>
@endif


@endsection