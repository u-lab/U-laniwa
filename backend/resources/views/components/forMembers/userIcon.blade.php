@php
$user=Auth::user();
@endphp
<div class="userIcon mb-8 w-fit">
    <a href="{{url('/user'.'/'.$user->id)}}">
        <img src="{{asset('storage/'.$user->profile_photo_path)}}" alt="" class="w-16 h-16 inline-block rounded-full">
    </a>
</div>
