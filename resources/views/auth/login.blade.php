@section('title', 'Login')
@include('theme.head')

<body>
<!-- top-nav bar start-->
<section id="nav-bar" class="nav-bar-main-block nav-bar-main-block-one">
    <div class="container-fluid">
        <div class="row">
            
            <div class="col-lg-4 col-4">
                <div class="nav-bar-btn">
                    <a href="{{ url('/') }}" class="btn btn-secondary" title="Home"><i class="fa fa-chevron-left"></i>{{ __('frontstaticword.Backtohome') }}</a>
                </div>
            </div>
            <div class="col-lg-4 col-4">
                <div class="logo text-center">
                    @php
                        $logo = App\Setting::first();
                    @endphp
                        <a href="{{ url('/') }}"><b><div class="logotext">{{ $logo->project_title }}</div></b></a>
                </div>
            </div>
            <div class="col-lg-4 col-4">
                <div class="Login-btn txt-rgt">
                    <a href="{{ route('register') }}" class="btn btn-primary" title="signup">{{ __('frontstaticword.signup') }}</a>
                </div> 
            </div>            
        </div>
    </div>
</section>

<!-- top-nav bar end-->

<!-- Signup start-->
<section id="signup" class="signup-block-main-block">
    <div class="container">
        <div class="col-md-6 offset-md-3">
            <div class="signup-heading">
                {{ __('frontstaticword.LogIntoYour') }} {{ __('frontstaticword.Account') }}!
            </div>
            <div class="signup-block">

                <div class="signin-link btm-10">
                    <div class="row">
                    </div>

                <form method="POST" class="signup-form" action="{{ route('login') }}">
                    @csrf
                 
                    <div class="form-group">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Enter Your E-Mail"   name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Enter Your Password" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
     

                    <div class="form-group">
                        <button type="submit"  class="btn btn-primary">
                            {{ __('frontstaticword.login') }}
                        </button>
                        <br>
                        <br>

                        <div class="forgot-password text-center btm-20"><a href="{{ 'password/reset' }}" title="sign-up">{{ __('frontstaticword.ForgotPassword') }}</a>
                        </div>
                    </div>
                    <hr>
                    <div class="sign-up text-center">{{ __('frontstaticword.Donothaveanaccount') }}?<a href="{{ route('register') }}" title="sign-up"> {{ __('frontstaticword.signup') }}</a>
                    </div>
                            
                </form>
            </div>
        </div>
    </div>
</section>
<!--  Signup end-->

<!-- jquery -->
@include('theme.scripts')
<!-- end jquery -->
</body>
</html> 






