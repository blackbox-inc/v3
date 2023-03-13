@extends('layouts.app')

@section('content')
@include('inc.search_menu')

<hr>

<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header bgcolor" style="color:white">
                Search by name:
            </div>
            <div class="card-body">
            
              <p>Our search feature allows you to easily find information about individuals by their name. Whether you're looking for a specific person or just curious about people with a particular name, our search tool provides you with accurate and up-to-date information. With a simple search, you can find individuals' professional experience, skills, and contact details.</p>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header bgcolor" style="color:white">
                Search by position:
            </div>
            <div class="card-body">
            
              <p>If you're looking for individuals based on their position, our search tool is the perfect solution. Whether you're a recruiter looking to fill a specific job role or just curious about people in a particular position, our search feature provides you with accurate and relevant information. Our database includes a wide range of professionals, from executives and managers to entry-level employees, across various industries and sectors.</p>
           
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header bgcolor" style="color:white">
                All list
            </div>
            <div class="card-body">
             
              <p>Our search tool also offers a complete list of individuals in our database. You can browse through our entire list of professionals, explore their profiles, and find the information you need. This feature is perfect for recruiters who want to explore a particular industry or for anyone who wants to learn more about the people in a specific sector. Our database is regularly updated to ensure that the information you receive is accurate and reliable. So, start browsing through our complete list today and discover the information you need with ease!</p>
             
            </div>
          </div>
        
    </div>
</div>











@endsection