@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('includes.message')
            <div class="card mb-5">
                <div class="card-header">
                    Featured
                </div>
                <div class="card-body">
                    <h5 class="card-title">Bienvenido {{ Auth::user()->name }} !  </h5>
                  <p class="card-text">Descubre nuevas personas</p>
                  <a href="{{route('user.users')}}" class="btn btn-primary">Descubrir personas</a>
                </div>
            </div>          

            @foreach($images as $image)
                @include('includes.image', ['image'=>$image])
            @endforeach
        </div>
    </div>
</div>


@endsection
