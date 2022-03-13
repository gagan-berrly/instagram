@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">

                @include('includes.message')
                <div class="card">
                    <div style="display:flex; align-items:center; justify-content:center; padding:10px;">
                        <i class="bi bi-translate"></i>@include('includes.translate')
                    </div>
                    <div class="card-header">{{__('auth.config_account')}}</div>
                    
                    <div class="card-body">
                        <form method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data"
                        aria-label="Configuracion de mi cuenta">
                        @csrf
                        
                        <div class="form-group d-flexrow mb-1 text-right">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{__('auth.save')}}
                                </button>
                            </div>
                        </div>
                        
                            <div id ="preview-container">
                            <img id="output" style="display:block; padding:10px; margin-left:auto; margin-right:auto; margin-top:30px; margin-bottom:30px; width:200px; border-radius:50%;"/>
                            </div>
                            

                            <div class="form-group row">
                                <label for="nick" class="col-md-4 col-form-label text-md-right">{{ __('upload.image') }}</label>
                                <div class="col-md-6">

                                    <label for="image_path" class="btn btn-outline-dark btn-lg btn-block" ><i style="font-size:25px; font-style: normal;" id="upload-btn"class="bi bi-cloud-arrow-up-fill"></i></label>
                                    
                                    <input id="image_path" type="file"
                                        class="form-control{{ $errors->has('image_path') ? ' is-invalid' : '' }}"
                                        name="image_path" style="visibility:hidden; position:absolute;" onchange="loadFile(event)">


                                    @if ($errors->has('image_path'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('image_path') }}</strong>
                                        </span>
                                    @endif
                                    
                                </div>
                                
                            </div>


                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('register.name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                        value="{{ Auth::user()->name }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="surname"
                                    class="col-md-4 col-form-label text-md-right">{{ __('register.surname') }}</label>

                                <div class="col-md-6">
                                    <input id="surname" type="text"
                                        class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}"
                                        name="surname" value="{{ Auth::user()->surname }}" required autofocus>

                                    @if ($errors->has('surname'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('surname') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nick" class="col-md-4 col-form-label text-md-right">{{ __('register.nick') }}</label>

                                <div class="col-md-6">
                                    <input id="nick" type="text"
                                        class="form-control{{ $errors->has('nick') ? ' is-invalid' : '' }}" name="nick"
                                        value="{{ Auth::user()->nick }}" required autofocus>

                                    @if ($errors->has('nick'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nick') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            
                            <div class="form-group row">
                                <label for="quote"
                                    class="col-md-4 col-form-label text-md-right">{{ __('auth.bio') }}</label>

                                <div class="col-md-6">
                                    <input id="quote" type="text"
                                        class="form-control{{ $errors->has('quote') ? ' is-invalid' : '' }}" name="quote"
                                        value="{{ Auth::user()->quote }}" required autofocus>

                                    @if ($errors->has('quote'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('quote') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Correo electrónico') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                        value="{{ Auth::user()->email }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>

    <script type="text/javascript">
        var loadFile = function(event) {
            var output = document.getElementById('output');
            var preview_container = document.getElementById('preview-container');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.style.height = '200px';
            preview_container.style.backgroundColor = '#E2E2E2';
            output.onload = function() {
                output.style.removeProperty('height');
                URL.revokeObjectURL(output.src) // free memory
            }

        };
    </script>
@endsection
