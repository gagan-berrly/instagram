@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            

            <div class="card mb-5 border-0">
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                      Hola {{ Auth::user()->name }} , estos son tus ultimos likes que has dado
                  </blockquote>
                </div>
            </div>

            @foreach($likes as $like)
                @include('includes.image', ['image'=>$like->image])
            @endforeach
        </div>
    </div>
</div>
@endsection
