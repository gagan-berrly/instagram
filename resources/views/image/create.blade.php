@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            
            <div class="card">
                <div class="card-header">{{__('upload.upload_post')}}</div>
                <div class="card-body">
                    <form method="post" action="{{ route('post.save') }}" enctype="multipart/form-data">
                        @csrf
                        <div id ="preview-container">
                            <img id="select_image" style="display:block; padding:10px; margin-left:auto; margin-right:auto; margin-top:30px; margin-bottom:30px; width:300px;"/>
                            </div>
                        <div class="form-group row">
                            <label for="image_path" class="col-md-3 col-form-label text-md-right">{{__('upload.image')}}</label>
                            <div class="col-md-7">
                                
                                <label for="image_path" class="btn btn-outline-primary btn-lg btn-block" ><i style="font-size:25px; font-style: normal;" id="upload-btn"class="bi bi-cloud-arrow-up-fill"></i></label>
                                <input id="image_path" type="file" name="image_path" class="form-control{{ $errors->has('image_path') ? ' is-invalid' : '' }}" style="visibility:hidden; position:absolute;" onchange="loadFile(event)" required/>
                                
                                @if($errors->has('image_path'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image_path') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-3 col-form-label text-md-right">{{__('upload.description')}}</label>
                            <div class="col-md-7">
                                <textarea id="description" name="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" style="resize:none;" required></textarea>
                                
                                @if($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-3">
                                <input type="submit" class="btn btn-primary" value="{{__('upload.upload_post')}}">
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
        var select_image = document.getElementById('select_image');
        var preview_container = document.getElementById('preview-container');
        select_image.src = URL.createObjectURL(event.target.files[0]);
        select_image.style.height = '200px';
        select_image.onload = function() {
            select_image.style.removeProperty('height');
            URL.revokeObjectURL(select_image.src) // free memory
        }

    };
</script>
@endsection
 