@extends('theme.master')
@section('title', 'Profile')
@section('content')

@include('admin.message')

<section id="blog-home" class="blog-home-main-block">
    <div class="container">
        <h1 class="blog-home-heading text-white text-center">{{ strtoupper(__('frontstaticword.userprofile')) }}</h1>
    </div>
</section>


<section id="profile-item" class="profile-item-block">
    <div class="container">
        <form action="{{ route('user.profile_update') }}" method="POST" enctype="multipart/form-data">
        	{{ csrf_field() }}
            {{ method_field('PUT') }}

            <div class="row">
                <div class="col-xl-9 col-lg-8">

	                <div class="profile-info-block">
	                    <div class="profile-heading">{{ __('frontstaticword.personalinfo') }}</div>
	                    <div class="row">
	                        <div class="col-lg-6">
	                            <div class="form-group">
	                                <label for="name">{{ __('frontstaticword.fname') }}</label>
	                                <input type="text" id="name" name="fname" class="form-control" value="{{ Auth::user()->fname }}" >
	                            </div>
	                            <div class="form-group">
	                                <label for="email">{{ __('frontstaticword.email') }}</label>
	                                <input type="email" id="email" name="email" class="form-control"  value="{{  Auth::user()->email }}" >
	                            </div>
	                           
	                        </div>
	                        <div class="col-lg-6">
	                            <div class="form-group">
	                                <label for="Username">{{ __('frontstaticword.lname') }}</label>
	                                <input type="text" id="lname" name="lname" class="form-control"  value="{{  Auth::user()->lname }}" >
	                            </div>
	                            <div class="form-group">
	                                <label for="contact">{{ __('frontstaticword.contact') }}</label>
	                                <input type="text" name="contact" id="contact" value="{{  Auth::user()->contact }}" class="form-control">
	                            </div>                         
	                            
	                        </div>

                            <div class="col-lg-6">
	                            <div class="form-group">
	                                <label for="idno">{{ __('frontstaticword.idno') }}</label>
	                                <input type="text" id="idno" name="idno" class="form-control"  value="{{  Auth::user()->idno }}" >
	                            </div>
	                        </div>

							<div class="col-lg-6">
	                            <div class="form-group">
	                                <label for="idno">{{ __('frontstaticword.lastupdate') }}</label>
	                                <input class="form-control"  value="{{  Auth::user()->updated_at }}">
	                            </div>
	                        </div>
	                    </div>

                        <div class="col-lg-6">
                            <button type="submit" class="btn btn-primary" title="upload items">{{ __('frontstaticword.updateprofile') }}</button>
                        </div>
            </div>

    </div>
</section>


  
  @endsection
  