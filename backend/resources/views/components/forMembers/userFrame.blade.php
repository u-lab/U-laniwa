<a href="{{url('/user/'.$user->id)}}" class="flex bg-bg-main rounded-2xl p-6 hover:opacity-80 userFrame"
    style="transition: .2s; width: 500px">
    <div class="flex items-center w-1/2">
        <img src="{{url('/'.$user->profile_photo_path)}}" alt="" class="object-fit-cover">
    </div>
    <div class="px-4 text-left w-1/2">
        <p class="text-sm xl:text-base px-2 mb-1 bg-bg rounded-full inline-block">なまえ</p>
        <p class="xl:text-lg pl-2 mb-2">{{$user->last_name}} {{$user->first_name}} ({{$user->name}})</p>
        <p class="text-sm xl:text-base px-2 mb-1 bg-bg rounded-full inline-block">一言コメント</p>
        <p class="xl:text-lg pl-2 mb-2">{{$user->status}}</p>
        @empty(!$user->uu_faculty)
        <p class="text-sm xl:text-base px-2 mb-1 bg-bg rounded-full inline-block">学部/学科</p>
        <p class="xl:text-lg pl-2 mb-2">{{$user->uu_faculty}}/{{$user->uu_major}}</p>
        @endempty
    </div>
</a>
