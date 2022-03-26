@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">


                @if (count($likes) !== 0)
                    <div class="card mt-3 mb-4 border-0">
                        <h3 class="font-weight-bold activity-text">Actividad</h3>
                        <hr>
                    </div>
                    @foreach ($likes as $like)
                        @if ($like->user_id != Auth::user()->id)
                            <a href="{{ route('image.detail', ['id' => $like->image->id]) }}">
                                <div class="user-notification">
                                    <div class="user-notification--target--information">
                                        @if ($like->user->image)
                                            <div class="container-avatar">
                                                <img src="{{ route('user.avatar', ['filename' => $image->user->image]) }}"
                                                    alt="Avatar" class="avatar">
                                            </div>
                                        @else
                                            <div class="container-avatar">
                                                <img src="{{ asset('img/default-user.png') }}" alt="Avatar"
                                                    class="avatar">
                                            </div>
                                        @endif
                                        <div class="user-notification--message">
                                            <p><b>{{ $like->user->nick }}</b> le ha dado me gusta a tu foto <br>
                                                <span
                                                    style="opacity:0.5;">{{ \FormatTime::LongTimeFilter($like->created_at) }}</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="user-notification--target_image">
                                        <img src="{{ route('image.file', ['filename' => $like->image->image_path]) }}"
                                            alt="" />
                                    </div>
                                </div>
                            </a>
                        @endif
                    @endforeach
                    <!--<a href="" class="btn btn-primary">Cargar más</a>-->
                    <hr>
                @else
                    <div class="container mt-4">
                        <p class="text-center py-2">No notifications yet<br><span>Stau tuned!Notifications about your
                                activity will show up here</span></p>
                        <div><img class="d-block m-auto" src="{{ asset('img/flaticon/silent.png') }}" alt="" width="150">
                        </div>
                    </div>
                @endif
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
