<div class="userIcon mb-8 text-center" style="width: 300px">
    <a href="{{url('/user'.'/'.$userInfo->user_id)}}" class="w-16 h-16 inline-block rounded-full bg-bg-gray">
        {{--<img src="{{url('/'.$user->profile_photo_path)}}" alt="">--}}
        {{$userInfo->last_name}} {{$userInfo->first_name}}
    </a>
</div>
