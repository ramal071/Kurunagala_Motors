@section('title', 'Sign Up') 
@include('theme.head') 
@include('admin.message')


<body>
    <section id="nav-bar" class="nav-bar-main-block nav-bar-main-block-one">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-4">
                    <div class="nav-bar-btn">
                        <a
                            href="{{ url('/') }}"
                            class="btn btn-secondary"
                            title="Home"
                            ><i class="fa fa-chevron-left"></i
                            >{{ __("frontstaticword.Backtohome") }}</a
                        >
                    </div>
                </div>
                <div class="col-lg-4 col-4">
                    <div class="logo text-center">
                        @php $logo = App\Setting::first(); @endphp
                       
                        <a href="{{ url('/') }}"><b
                                ><div class="logotext">
                                    {{ $logo->project_title }}
                                </div></b
                            ></a>                   
                    </div>
                </div>
                <div class="col-lg-4 col-4">
                    <div class="Login-btn txt-rgt">
                        <a
                            href="{{ route('login') }}"
                            class="btn btn-secondary"
                            title="login"
                            >{{ __("frontstaticword.login") }}</a
                        >
                    </div>
                </div>
            </div>
        </div>
    </section>

<section id="signup" class="signup-block-main-block mt-0">
    <div class="container">
        <div class="col-lg-6 col-md-6 offset-md-3">
            <div class="signup-block">
                
                <form class="signup-form" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <input type="text" class="form-control{{ $errors->has('fname') ? ' is-invalid' : '' }}" name="fname" value="{{ old('fname') }}" id="fname" placeholder="First Name">
                        @if ($errors->has('fname'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('fname') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <input type="text" class="form-control{{ $errors->has('lname') ? ' is-invalid' : '' }}" name="lname" value="{{ old('lname') }}" id="lname" placeholder="Last Name">
                        @if($errors->has('lname'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('lname') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <input type="number" class="form-control{{ $errors->has('idno') ? ' is-invalid' : '' }}" name="idno" value="{{ old('idno') }}" id="idno" placeholder="ID Number">
                        @if($errors->has('idno'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('idno') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" id="email" placeholder="Email">
                        @if($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
            
                    <div class="form-group">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <input type="tel" pattern="[0-9]{10}" class="form-control{{ $errors->has('contact') ? ' is-invalid' : '' }}" name="contact" value="{{ old('contact') }}" id="contact" placeholder="contact">
                        @if($errors->has('contact'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('contact') }}</strong>
                            </span>
                        @endif
                    </div>
                    
                    <div class="form-group">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                        <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="password" placeholder="Password">
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
               

                    
                    <button type="submit" title="Sign Up" class="btn btn-primary btm-20">{{ __('frontstaticword.signup') }}</button> 

                   
                    <hr>
                    <div class="sign-up text-center">{{ __('frontstaticword.Alreadyhaveanaccount') }}?<a href="{{ route('login') }}" title="sign-up"> {{ __('frontstaticword.login') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

</body>