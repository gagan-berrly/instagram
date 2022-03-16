@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('includes.message')
                <div class="card border-0">
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <b>{{ Auth::user()->name }}</b> conecta con gente!
                        </blockquote>
                    </div>
                </div>
                <br>

                <form class="form-inline mb-4" method="GET" action="{{ route('user.users') }}" id="user-search">
                    <input type="text" id="search" class="form-control mr-sm-2" placeholder="{{ Auth::user()->nick }}">
                    <button class="btn my-2 my-sm-0 btn-search" type="submit"><i class="bi bi-search"></i></button>
                </form>

                @foreach ($users as $user)
                    <div class="card border-0 profile-card-status">
                        @if ($user->id == Auth::user()->id)
                            <div class="card-body its-me">
                            @else
                                <div class="card-body">
                        @endif
                        <div class="user-information">
                            <div class="card-body__left">
                                @if ($user->image)
                                    <div class="container-avatar">
                                        <img src="{{ route('user.avatar', ['filename' => $user->image]) }}" alt="Avatar"
                                            class="avatar">
                                    </div>
                                @else
                                    <div class="container-avatar">
                                        <img src="{{ asset('img/default-user.png') }}" alt="Avatar"
                                            class="avatar">
                                    </div>
                                @endif
                            </div>
                            <div class="card-body__right">
                                <h4 class="card-title"><b>{{ $user->nick }}<b /></h4>
                                @if ($user->nick == Auth::user()->nick)
                                    <p>{{ 'Te unistes ' . \FormatTime::LongTimeFilter($user->created_at) }} </p>
                                @else
                                    <p>{{ 'Se unió ' . \FormatTime::LongTimeFilter($user->created_at) }} </p>
                                @endif
                                <div class="card-body__right--features">
                                    <div>
                                        <p><span>{{ count($user->images) }}</span>Posts</p>
                                    </div>
                                </div>
                                @if ($user->nick == Auth::user()->nick)
                                    <a class="btn btn-primary btn-sm"
                                        href="{{ route('user.profile', ['id' => $user->id]) }}" style="font-size: 14px;">Mi
                                        Perfil</a>
                                @else
                                    <a class="btn btn-primary btn-sm"
                                        href="{{ route('user.profile', ['id' => $user->id]) }}"
                                        style="font-size: 14px;">Ver Perfil</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                @endforeach
                @if(!count($users) <= 0)
                <button class="btn btn-outline-primary btn-block my-2 mb-3 p-2" style="width:200px;margin:auto;" type="submit">Ver +</button>
                @else
                No se ha encontrado ningun resultado
                @endif
        </div>
    </div>
</div>
@endsection
