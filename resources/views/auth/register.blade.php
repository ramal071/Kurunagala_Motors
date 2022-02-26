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
                       
                        <a href="{{ url('/') }}"
                            ><b
                                ><div class="logotext">
                                    {{ $logo->project_title }}
                                </div></b
                            ></a
                        >
                    
                    </div>
                </div>
                <div class="col-lg-4 col-4">
                    <div class="Login-btn txt-rgt">
                        <a
                            href="{{ route('login') }}"
                            class="btn btn-secondary"
                            title="login"
                            >{{ __("frontstaticword.Login") }}</a
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
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" id="email" placeholder="Email">
                        @if($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    @if($gsetting->mobile_enable == 1)
                    <div class="form-group">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <input type="text" class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" value="{{ old('mobile') }}" id="mobile" placeholder="Mobile">
                        @if($errors->has('mobile'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('mobile') }}</strong>
                            </span>
                        @endif
                    </div>
                    @endif
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



                    
                    {{-- @if($gsetting->captcha_enable == 1)


                    <div class="{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">

                        <div class="text-center">

                            {!! app('captcha')->display() !!}
                            @if ($errors->has('g-recaptcha-response'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                </span>
                            @endif
                        </div>
                    <br>
                    <br>
                    @endif
                    
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="term" id="term" required>

                            <label class="form-check-label" for="term">
                                <div class="signin-link text-center btm-20">
                                    <b>{{ __('I agree to ') }}<a href="{{url('terms_condition')}}" title="Policy">{{ __('frontstaticword.Terms&Condition') }} </a>, <a href="{{url('privacy_policy')}}" title="Policy">{{ __('frontstaticword.PrivacyPolicy') }}.</a></b>
                                </div>
                            </label>

                           
                        </div>
                    </div> --}}
                    

                    
                    <button type="submit" title="Sign Up" class="btn btn-primary btm-20">{{ __('frontstaticword.Signup') }}</button> 

                   
                    <hr>
                    <div class="sign-up text-center">{{ __('frontstaticword.Alreadyhaveanaccount') }}?<a href="{{ route('login') }}" title="sign-up"> {{ __('frontstaticword.Login') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

</body>