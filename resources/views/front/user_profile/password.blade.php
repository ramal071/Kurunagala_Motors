@extends('theme.master')
@section('title', 'Password Update')
@section('content')

@include('admin.message')

<section id="blog-home" class="blog-home-main-block">
    <div class="container">
        <h1 class="blog-home-heading text-white text-center">{{ strtoupper(__('frontstaticword.passwordupdate')) }}</h1>
    </div>
</section>

<section id="profile-item" class="profile-item-block">
    <div class="container">
        <form action="{{ route('user.password_update') }}" method="POST" enctype="multipart/form-data">
        	{{ csrf_field() }}
            {{-- {{ method_field('PUT') }} --}}

            <div class="row">
                <div class="col-xl-9 col-lg-8">

	                <div class="profile-info-block">
	                    <div class="profile-heading">{{ __('frontstaticword.user') }} {{ __('frontstaticword.password') }}
                        </div>

                        <div class="form-group">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                            <input type="password" class="form-control{{ $errors->has('current-password') ? ' is-invalid' : '' }}" name="current-password" id="current-password" placeholder="current-password">
                            @if ($errors->has('current-password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('current-password') }}</strong>
                                </span>
                            @endif
                        </div>
	                
            
                        <div class="form-group">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                            <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="password" placeholder="New Password">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
    
                        <div class="form-group">
                            <i class="fa fa-lock" aria-hidden="true"></i> 
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                        </div>

                        <br>
                        <div class="col-lg-6">
                            <button type="submit" class="btn btn-primary" title="upload items">{{ __('frontstaticword.passwordupdate') }}</button>
                        </div>
                        <br>
               
                            <div class="form-group">
                                <label for="idno">{{ __('frontstaticword.lastupdate') }}</label>
                                <input class="form-control"  value="{{  Auth::user()->updated_at }}">
                            </div>
                


                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

@endsection