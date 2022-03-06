<a href="{{url('/user/'.$user->id)}}" class="flex bg-bg-main rounded-2xl p-6 hover:opacity-80 userFrame useritem"
    style="transition: .2s;">
    <div class="flex items-center w-1/2">
        <img src="{{asset('storage/'.$user->profile_photo_path)}}" alt="" class="object-fit-cover">
    </div>
    <div class="px-4 text-left w-1/2">
        <p class="text-sm xl:text-base px-2 mb-1 bg-bg rounded-full inline-block">なまえ</p>
        <h3 class="xl:text-lg pl-2 mb-2">{{$user->last_name}} {{$user->first_name}} ({{$user->name}})</h3>
        @empty($user->status)
        @else
        <p class="text-sm xl:text-base px-2 mb-1 bg-bg rounded-full inline-block">ひとことコメント</p>
        <p class="xl:text-lg pl-2 mb-2">{{$user->status}}</p>
        @endempty
        @if($grade == '社会人' || $grade == 'その他' )
        <p class="text-sm xl:text-base px-2 mb-1 bg-bg rounded-full inline-block">所属</p>
        @else
        <p class="text-sm xl:text-base px-2 mb-1 bg-bg rounded-full inline-block">学部/学科</p>
        @endif
        <p class="xl:text-lg pl-2 mb-2">{{$user->profession}}</p>
    </div>
</a>