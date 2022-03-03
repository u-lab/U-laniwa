@php
$user=Auth::user();
@endphp
<div class="userIcon mb-8 text-center" style="width: 300px">
    <a href="{{url('/user'.'/'.$user->id)}}">
        <img src="{{url('/'.$user->profile_photo_path)}}" alt="" class="w-16 h-16 inline-block rounded-full">
    </a>
</div>
