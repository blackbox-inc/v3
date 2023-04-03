@extends('layouts.app')

@section('content')

<table id="example" class="table table-striped table-bordered" style="width:100%; font-size: 13px">
    <thead>
        <tr>
            <th>FRA Name</th>
            <th>Country</th>
            <th>Connected to </th>
            <th>username</th>
            <th>NOC</th>
          
            <th>Action</th>
        </tr>
    </thead>
    <tbody>


        @forEach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->nickname}}</td>
                <td>{{$user->code}}</td>
                <td>{{$user->username}}</td>
                <td>123</td>
                <td>
                    <button class="btn btn-warning btn-sm">VIEW</button>
                </td>
            </tr>
        @endforeach
       
</table>

@endsection