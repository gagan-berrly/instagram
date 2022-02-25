@extends('layouts.app')

@section('content')
<div class="container-fluid profile-user-main-container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 profile-card-status">
                               
                <div class="card-body">
                    <div class="user-information">
                        <div class="card-body__left">
                            @if($user->image)
                                <div class="container-avatar">
                                    <img src="{{ route('user.avatar', ['filename' =>$user->image]) }}" alt="Avatar" class="avatar">
                                </div>
                            @endif
                        </div>
                        <div class="card-body__right">
                            <h4 class="card-title"><b>{{ $user->nick }}<b/></h4>
                            @if(Auth::user()->id == $user->id)
                                <img src="{{asset('img/verificado.png')}}" class="verificado" alt="">
                            @endif
                            @if($user->id == Auth::user()->id)
                                <a href=" {{ route('config') }} " class="btn btn-sm btn-secondary"><i class="bi bi-gear"></i></a>
                            @endif
                            <div class="card-body__right--features">
                                <div><p><span>{{ $user->images->count()}}</span>Posts</p></div>
                            </div>
                            @if($user->quote)
                                <p>{{ $user->quote }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            
            <div class="user-post-container">
                @foreach($user->images as $image)
                <div class="user-post-container__image">
                    <a href="{{ route('image.detail', ['id' =>$image->id]) }}">
                        <img
                            src="{{ route('image.file', ['filename' => $image->image_path]) }}"
                            class=""
                            alt=""
                        />
                    </a>
                </div>
                @endforeach
              </div>

        </div>
    </div>
</div>
@endsection
 

