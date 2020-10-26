@extends('layouts.app')

@section('content')
       <div id="app">
           <div class="container">
               <navbar></navbar>
               <div class="row justify-content-center">
                   <div class="col-md-12">
                       <div class="card card-default">
                           <div class="card-header">
                           </div>
                           <div class="card-body">
                               <app-component></app-component>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   <script src="{{asset('js/app.js')}}"></script>

@endsection
