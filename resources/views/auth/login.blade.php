

@extends('frontend.layouts.app')
 @push('url_title')
     Login
 @endpush

    <br><br><br><br><br><br>
     <div class="inner_banner inner_banner_mb inner_banner_about">
         <div class=" about_banner">
             <div class="container">
                 <div class="inner_banner_title">
                     <ul>
                         <li>
                             <!-- <a href="{{ route('frontend.home') }}">Home</a> - -->
                         </li>
                         <li>
                             <!-- Login -->
                         </li>
                     </ul>
                     <h1>
                     <!-- Login -->
                 </h1>
                 </div>
             </div>
         </div>
     </div>

    
    <div class="container" style="margin-top:70px;">
         @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if ($message = Session::get('success'))
            <div class="alert alert-success my-2">
              <p>{{ $message }}</p>
            </div>
        @endif
        
        <div class="row justify-content-left">
            <div class="col-md-8">
                <div class="card">
                    <center><div class="card-header"><b>{{ __('Login') }}</b></div></center>

                    <div class="card-body">
                        <form method="POST" action="{{ route('home_login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-danger">
                                        {{ __('Login') }}
                                    </button>
                                    
                                    <a class="btn btn-link" href="{{ route('register') }}">
                                        {{ __('Are you new ? Click here to Register') }}
                                    </a>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                        
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> 







