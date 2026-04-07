
@extends('frontend.layouts.app')
 @push('url_title')
     Register
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
                    <!-- Register -->
                 </li>
                </ul>
                <h1>
                    <!-- Register -->
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
                <center><div class="card-header"><b>{{ __('Register') }}</b></div></center>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

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
                                <input type="password" id="password"  class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="off">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="password_confirmation" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input type="password" id="password_confirmation"  class="form-control @error('password_confirmation') is-invalid @enderror" 
                                name="password_confirmation" required autocomplete="off">

                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    
                                    <button type="submit" class="btn btn-danger">
                                        {{ __('Register') }}
                                    </button>
                                    <a class="btn btn-link" href="{{ route('home_login_view') }}">
                                            {{ __('Already registered?') }}
                                        </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@push('js')
    <script type="text/javascript">
        @if(session('message'))
            <div class="alert alert-success" role="alert">
                <h4>{{ session('message') }}</h4>
            </div>
        @endif
    </script>
@endpush
