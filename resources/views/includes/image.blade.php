<div class="card user-post">
    <div class="card-header bg-white">

        @if($image->user->image)
            <div class="container-avatar">
                <img src="{{ route('user.avatar', ['filename' =>$image->user->image]) }}" alt="Avatar" class="avatar">
            </div>
        @else
        <div class="container-avatar">
            <img src="{{ asset('img/default-user.png') }}" alt="Avatar" class="avatar">
        </div>
        @endif  
        <div class="user-nick">
            <a href="{{ route('user.profile', ['id'=>$image->user->id]) }}">
                {{ $image->user->nick }}
            </a>
        </div>
    </div>

    <div class="card-body">
        <div class="image-container">
            <img src="{{ route('image.file', ['filename' => $image->image_path]) }}" alt=""/>
        </div>
        <div class="card-body__likes">

            <!--Comprovar si el usuario ha dado like    al post---->
            <?php $user_like = false; ?>
            @foreach($image->likes as $like)
                @if($like->user->id == Auth::user()->id )
                    <?php $user_like = true; ?>
                @endif
            @endforeach

            @if($user_like)
                <img src="{{asset('img/heart-red.png')}}" data-id="{{$image->id}}"  class="btn-dislike" alt="Like">
            @else 
                <img src="{{asset('img/heart-black.png')}}"  class="btn-like" alt="Dislike">
            @endif
        </div>
        
        <div class="card-body__description">
            <span class="like-counter" value="{{ count($image->likes) }}"> <b> {{ count($image->likes) }} Me Gustas </b></span>
            <p>
                <b>
                    <a href="#">
                        <span class="card-body__description--nickname">{{ $image->user->nick }}</span>
                    </a>
                </b>
                {{ $image->description }}
            </p>
        </div>
        
        <div>
            <a href="{{ route('image.detail', ['id' =>$image->id]) }}" class="btn btn-sm btn-comments">
                <b>Ver los <span>{{ count($image->comments) }}</span> comentarios </b>
            </a>

            <p class="post-uploated-date"><span>{{ \FormatTime::LongTimeFilter($image->created_at) }}</span></p>
        </div>
    </div>  
</div>