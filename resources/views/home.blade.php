@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div class="col-3">
                        <a  href="{{ asset('/storage/user/'.Auth::user()->profile_image) }}" target="_blank">
                                 <img src="{{ asset('/storage/user/'.Auth::user()->profile_image) }}"  class="rounded-circle" alt="gambar"  width="200px" height="200px">
                         </a>
                 </div>
                
                     {{$users->name}}
                
                  
                  

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
