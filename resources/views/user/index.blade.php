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
                <input type="text" id="search" class="form-control mr-sm-2" placeholder="Gagan">
                <button class="btn btn-outline-success my-2 my-sm-0 btn-search" type="submit">Buscar</button>
              </form>

            @foreach($users as $user)
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
                                <p>{{'Se unió ' .\FormatTime::LongTimeFilter($user->created_at) }} </p>
                            <div class="card-body__right--features">
                                <div><p><span>{{ count($user->images)}}</span>Posts</p></div>
                            </div>
                            <a class="btn btn-primary btn-sm" href="{{route('user.profile', ['id' => $user->id])}}" style="font-size: 14px;">Ver Perfil</a>
                            <a class="btn btn-primary btn-sm" href=""                                               style="font-size: 14px;">Follow<!--<i class="bi bi-plus";></i>---></a>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            @endforeach
        </div>
    </div>
</div>
@endsection




