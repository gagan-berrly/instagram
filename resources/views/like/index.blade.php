@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            
            <div class="card mt-3 mb-4 border-0">
                <h3 class="font-weight-bold">{{__('auth.activity')}}</h3>
                <hr>
            </div>

            @foreach($likes as $like)
            @if($like->user_id != Auth::user()->id)
            <a href="{{ route('image.detail', ['id' =>$like->image->id]) }}">
                <div class="user-notification">
                    <div class="user-notification--target--information">
                        <img src="{{ route('user.avatar', ['filename' =>$like->user->image]) }}" alt="Avatar" class="avatar">
                        <div class="user-notification--message">
                            <p><b>{{$like->user->nick}}</b> {{__('auth.user_like_notify')}}<br>
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
            <div class="col text-center mt-1 mb-1">
                <a href="" class="btn btn-primary">{{__('auth.load_more')}}</a>
            </div>
            <hr>
            

            <!--

            <div class="card mb-4 border-0" style="margin-top:6rem;">
                <h3 class="font-weight-bold"> {{--__('auth.user_comments_notify')--}}</h3>
                <hr>
            </div>
            --->
            
        </div>
    </div>
    <hr>
</div>
@endsection
