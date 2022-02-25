@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('includes.message')
            <div class="card mb-1 border-0">
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        Bienvenido {{ Auth::user()->name }} !  
                  </blockquote>
                </div>
                
              </div>
            @foreach($images as $image)
                @include('includes.image', ['image'=>$image])
            @endforeach
        </div>
    </div>
</div>
@endsection
