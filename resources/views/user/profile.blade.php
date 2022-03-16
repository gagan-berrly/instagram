@extends('layouts.app')

@section('content')
<div class="container-fluid profile-user-main-container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 profile-card-status">
                               
                <div class="card-body bg-white">
                    <div class="user-information">
                        <div class="card-body__left">
                            @if($user->image)
                                <div class="container-avatar">
                                    <img src="{{ route('user.avatar', ['filename' =>$user->image]) }}" alt="Avatar" class="avatar">
                                </div>
                            @else
                                <div class="container-avatar">
                                    <img src="{{ asset('img/default-user.png') }}" alt="Avatar" class="avatar">
                                </div>
                            @endif
                        </div>
                        <div class="card-body__right">
                            <div id="header-card">
                                <h4 class="card-title"><b>{{ $user->nick }}<b/></h4>
                                @if($user->id == Auth::user()->id)
                                    <a id="config-btn-auth" href=" {{ route('config') }} " class="btn btn-sm btn-primary"><i class="bi bi-gear"></i></a>
                                @endif
                                <!--
                                <a id="" href=" {{ route('config') }} " class="btn btn-sm btn-outline-dark"><i class="bi bi-person-plus-fill"></i></i></a>
                                --->
                            </div>
                            <div class="card-body__right--features">
                                <div><p><span>{{ $user->images->count()}}</span>Posts</p></div>
                            </div>
                            @if($user->quote)
                                <div class="aa">
                                    <p>{{ $user->quote }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <hr>
          
            <div class="user-post-container">
                @foreach($user->images as $image)
                <a href="{{ route('image.detail', ['id' =>$image->id]) }}" class="user-post-container--post">
                    <figure class="user-post-container--image">
                        <img
                            src="{{ route('image.file', ['filename' => $image->image_path]) }}"
                            class=""
                            alt=""
                        />
                    </figure>
                    <span class="user-post-hover">
                        <p>
                            <span class="user-post-likes"><i style="font-size:20px;" class="bi bi-heart"></i> {{count($image->likes)}} </span>
                            <span class="user-post-comments"><i style="font-size:20px;" class="bi bi-chat-square"></i> {{count($image->comments)}} </span>
                        </p>
                    </span>
                </a>
                @endforeach
            </div>

        </div>
    </div>
</div>
@endsection
 

