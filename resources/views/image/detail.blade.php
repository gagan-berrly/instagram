@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 user-post-detail-container">
            @include('includes.message')
                  
                <div class="card user-post post_image_details">
                    <div class="card-header">

                        @if($image->user->image)
                            <div class="container-avatar">
                                <img src="{{ route('user.avatar', ['filename' =>$image->user->image]) }}" alt="Avatar" class="avatar">
                            </div>
                        @endif
                        <div class="user-nick">
                            <a href="{{ route('user.profile', ['id'=>$image->user->id]) }}">{{ $image->user->nick }}</a>

                            @if(Auth::user() && Auth::user()->id == $image->user->id)
                            <div class="user-actions">
                                <a href="{{ route('image.edit', ['id' => $image->id]) }}" class="btn"><i class="bi bi-pencil-fill"></i></a>
                                <a class="btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="bi bi-trash-fill"></i></a>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Cuidado {{ $image->user->nick }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            Vas a proceder a eliminar este post, quieres continuar?
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                                        <a href="{{ route('image.delete', ['id' => $image->id]) }}" class="btn btn-danger">Borrar</a>
                                        </button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="image-container">
                            <img src="{{ route('image.file', ['filename' => $image->image_path]) }}" alt=""/>
                        </div>
                        <div class="card-body__likes">

                            <!--Comprovar si el usuario ha dado like al post---->
                            <?php $user_like = false; ?>
                            @foreach($image->likes as $like)
                                @if($like->user->id == Auth::user()->id )
                                    <?php $user_like = true; ?>
                                @endif
                            @endforeach

                            @if($user_like)
                                <img src="{{asset('img/heart-red.png')}}" data-id="{{$image->id}}" class="btn-dislike" alt="Like">
                            @else 
                                <img src="{{asset('img/heart-black.png')}}" data-id="{{$image->id}}" class="btn-like" alt="Dislike">
                            @endif
                        </div>
                        <div class="card-body__description">
                            <p><b><a href=""><span class="card-body__description--nickname">{{ $image->user->nick }}</span></a></b>{{ $image->description }}</p>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="card-body__comments">
                            <form method="POST" action="{{ route('comment.save') }}">
                                @csrf
                                <input type="hidden" name="image_id" value="{{ $image->id }}">
                                <p>
                                    <input type="text" name="content" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" placeholder="Añade un comentario..." required>

                                    @if($errors->has('content'))
                                        <span class="invalid-feedback" class="alert alert-danger" role="alert">
                                            <strong>{{ $errors->first('content') }}</strong>
                                        </span>
                                    @endif

                                </p>
                                <button type="submit" class="btn btn-sm">Publicar</button>
                                
                            </form>

                            @foreach($image->comments as $comment)
                            <div class="card-body__comments comments-container">
                                    <p>
                                        <b><a href="">
                                            <span class="card-body__description--nickname">{{ $comment->user->nick }}
                                            </span>
                                        </a></b>
                                        {{ $comment->content }}

                                        @if(Auth::check() && ($comment->user_id == Auth::user()->id || $comment->image->user_id == Auth::user()->id ))
                                                <a href="{{ route('comment.delete', ['id'=>$comment->id]) }}"id="comment-delete">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" fill="red"/>
                                                    </svg>
                                                </a>
                                        @endif
                                    </p>
                                    <span id="comment-post-date">{{ \FormatTime::LongTimeFilter($comment->created_at) }}</span>
                             </div>
                            @endforeach

                        </div>
                        
                    </div>  
                </div>

        </div>
    </div>
</div>
@endsection
