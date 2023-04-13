@extends('layouts.app')

@section('content')


@php
    function getcount($username) {
        return  DB::table('nlineups')->where('fra_username', '=', $username)->count();
    }
@endphp

<table id="example" class="table table-striped table-bordered" style="width:100%; font-size: 13px">
    <thead>
        <tr>
            <th>FRA Name</th>
          
            <th>Connected to </th>
            <th>username</th>
            <th>NOC</th>
          
            <th>Action</th>
        </tr>
    </thead>
    <tbody>


        @forEach($users as $user)
            <tr>
                <td><strong>{{strtoupper($user->name)}}</strong> <small style="color: green; font-weight: 700;">({{strtoupper($user->nickname)}})</small></td>
              
                <td>{{$user->code}}</td>
                <td>{{$user->username}}</td>
                <td>{{getcount($user->username)}}</td>
                <td>
                    <button class="btn btn-info btn-sm">ADD</button>
                    <a href="/listbydate/{{$user->username}}" class="btn btn-warning btn-sm">VIEW</a>
                    <button class="btn btn-danger btn-sm">DELETE</button>
                </td>
            </tr>
        @endforeach
       
</table>





@endsection