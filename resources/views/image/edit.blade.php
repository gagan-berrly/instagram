@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            
            <div class="card border-0">
                <div class="card-header border-0">Edicion del post</div>
                <div class="card-body">
                    <form method="post" action="{{route('post.update')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="image_id" value="{{$image->id}}"/>
                        <div class="form-group row">
                            <div class="col-md-12">

                                @if($image->user->image)
                                <div class="image-container">
                                    <img src="{{ route('image.file', ['filename' => $image->image_path]) }}" alt=""/>
                                </div>
                                @endif
                                
                                @if($errors->has('image_path'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image_path') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <textarea id="description" name="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" style="resize:none; border:2px solid #CCE3F6;"  rows="4" required>{{ $image->description }}</textarea>
                                
                                @if($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <input type="submit" class="btn btn-primary" value="Guardar Canvios">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <hr>
</div>
@endsection
 