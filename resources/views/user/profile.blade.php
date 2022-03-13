@extends('layouts.app')

@section('content')
    <div class="container-fluid profile-user-main-container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card border-0 profile-card-status">

                    <div class="card-body bg-white">
                        <div class="user-container">

                            <di class="user-information">
                                <div class="card-body__header">
                                    @if ($user->image)
                                        <div class="container-avatar">
                                            <img src="{{ route('user.avatar', ['filename' => $user->image]) }}"
                                                alt="Avatar" class="avatar">
                                        </div>
                                    @else
                                        <div class="container-avatar">
                                            <img src="{{ asset('img/default-user.png') }}" alt="Avatar"
                                                class="avatar">
                                        </div>
                                    @endif
                                </div>
                                <div class="card-body__body">
                                    <div id="card-body__body--header">
                                        <h4 class="card-title">
                                            <b>{{ $user->nick }}</b>
                                            @if ($user->id == Auth::user()->id)
                                                <a id="config-btn-auth" href=" {{ route('config') }} "
                                                    class="btn btn-sm btn-outline-success"><i
                                                        class="bi bi-gear"></i></a>
                                            @endif
                                        </h4>

                                        <!--
                                            <a id="" href=" {{ route('config') }} " class="btn btn-sm btn-outline-dark"><i class="bi bi-person-plus-fill"></i></i></a>
                                            --->
                                    </div>
                                    <div class="card-body__body--footer">
                                        <div class="d-flex">
                                            <p><b><span>{{ $user->images->count() }}</span></b> Posts</p>
                                            <!-- TODO: USER TOTAL-LIKES COUNTER -->
                                        </div>
                                    </div>
                                    <!-- TODO: USER FOLLOWERS-LOGIC -->
                                    <button class="btn bt-primary">Sigueme</button>
                                </div>
                            </div>
                            
                            @if ($user->quote)
                            <div class="card-body__footer">
                                <p>{{ $user->quote }}</p>
                            </div>
                            @endif
                            <hr>
                    </div>
                </div>
            </div>
            <hr>

            <div class="col-md-12">
                <div class="user-post-container">
                    @foreach ($user->images as $image)
                        <a href="{{ route('image.detail', ['id' => $image->id]) }}" class="user-post-container--post">
                            <figure class="user-post-container--image">
                                <img src="{{ route('image.file', ['filename' => $image->image_path]) }}"
                                    class="" alt="" />
                            </figure>
                            <span class="user-post-hover">
                                <p>
                                    <span class="user-post-likes"><i style="font-size:20px;" class="bi bi-heart"></i>
                                        {{ count($image->likes) }} </span>
                                    <span class="user-post-comments"><i style="font-size:20px;"
                                            class="bi bi-chat-square"></i>
                                        {{ count($image->comments) }} </span>
                                </p>
                            </span>
                        </a>
                    @endforeach
                </div>
                <hr>
            </div>

            <hr>
            <footer class="mt-2">
                <div>
                    <a href="https://laravel.com/" target="_blank">
                        <img src="{{ asset('img/laravel.svg') }}" alt="Avatar" class="avatar" width="75px">
                    </a>
                </div>
            </footer>
        </div>
    </div>
    
    </div>
    
@endsection
