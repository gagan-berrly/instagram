@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card border-0">

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label text-md-right"><i
                                        class="bi bi-person-circle"></i></label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                        value="{{ old('email') }}" placeholder="{{__('login.email')}}" required autofocus>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right"><i
                                        class="bi bi-key-fill"></i></label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                        name="password" placeholder="{{__('login.password')}}" required>
                                </div>

                                <div class="show-password">
                                    <label for="password-show"><i id="visibility-icon"
                                            class="bi bi-eye-fill eye-show"></i></label>
                                    <input type="checkbox" onclick="showPassword()" name="password-show" id="password-show">
                                </div>
                            </div>

                            <!--ERRORS-->
                            <div class="alert-message">
                                <div class="col-sm-12">
                                    @if ($errors->has('email'))
                                        <div class="alert alert-danger mt-2">
                                            <span>
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        </div>
                                    @endif
                                </div>
        
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('login.login') }}
                                    </button>

                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('login.forget_password') }}
                                    </a>
                                </div>
                                <div class="col-md-8 offset-md-4 mt-3">
                                    <a class="btn btn-link" href="{{ route('register') }}">
                                        {{ __('login.user_not_have_account') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
        function showPassword() {
            var passwordInput = document.getElementById("password");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        }
   

    </script>
@endsection
