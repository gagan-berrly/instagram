@if(Auth::user()->image)
<div class="container-avatar">
    <img src="{{ route('user.avatar', ['filename' =>Auth::user()->image]) }}" alt="Avatar" class="avatar">
</div>
@else
<div class="container-avatar">
    <img src="{{ asset('img/default-user.png') }}" alt="Avatar" class="avatar">
</div>
@endif