@extends('layouts.app')

@section('content')


<div class="card">
    <div class="card-header bgcolor">
    
    </div>
    <div class="card-body">
      <h5 class="card-title">SEARCH POSITION</h5>

        <form action="/position" method="POST">
            @csrf
            <div class="input-group input-group-lg mb-3">
                <input type="text" class="form-control" name="keyword">
                <div class="input-group-append">
                <button class="btn btn-secondary" type="submit">
                    <i class="fas fa-search"></i> | FIND
                </button>
                </div>
            </div>
        </form>
    </div>
  </div>


  <hr>


  <table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>UserID</th>
            <th>FULLNAME</th>
            <th>STATUS</th>
            <th>POSITION</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
        

        @if(isset($findings))

        @foreach ($findings as $find)
        <tr>
            <td>{{$find->barcode}}</td>
            <td>{{$find->fullname}}</td>
            <td>{{$find->status}}</td>
            <td>{{$find->cat1}},{{$find->cat2}}</td>
            <td><a  href="create/edit/{{$find->barcode}}" class="btn btn-secondary btn-sm" target="_blank">VIEW INFO</button></a>
        </tr>
        @endforeach

        @endif

    

      


        
      
    </tbody>
 
</table>


@endsection