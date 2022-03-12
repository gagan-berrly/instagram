@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="card mt-3 mb-4 border-0">
                <h3 class="font-weight-bold">Actividad</h3>
                <hr>
            </div>

            @foreach($likes as $like)
            @if($like->user_id != Auth::user()->id)
            <a href="{{ route('image.detail', ['id' =>$like->image->id]) }}">
                <div class="user-notification">
                    <div class="user-notification--target--information">
                        <img src="{{ route('user.avatar', ['filename' =>$like->user->image]) }}" alt="Avatar" class="avatar">
                        <div class="user-notification--message">
                            <p>{{$like->user->nick}} le ha dado <b>me gusta</b> a tu foto <br>
                                <span style="opacity:0.5;">{{ \FormatTime::LongTimeFilter($like->created_at) }}</span>
                            </p>
                        </div>
                    </div>
                    <div class="user-notification--target_image">
                        <img src="{{ route('image.file', ['filename' => $like->image->image_path]) }}" alt=""/>
                    </div>
                </div>
            </a>
            @endif
            @endforeach
            <a href="" class="btn btn-primary">Cargar más</a>
            <hr>
            <!--
            <div class="card mb-5 border-0 ml-5">
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                      Seguimiento
                  </blockquote>
                </div>
            </div>
            --->
        </div>
    </div>
</div>
@endsection
