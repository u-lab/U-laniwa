<a href="{{url('/user/'.$user->id)}}" class="flex bg-bg-main rounded-2xl p-6 hover:opacity-80 userFrame"
    style="transition: .2s; width: ">
    <div class="flex items-center w-1/2">
        <img src="{{url('/'.$user->profile_photo_path)}}" alt="" class="object-fit-cover">
    </div>
    <div class="px-4 text-left w-1/2">
        <p class="px-2 mb-1 bg-bg rounded-full inline-block">なまえ</p>
        <p class="text-lg pl-2 mb-2">{{$user->name}}</p>
        <p class="px-2 mb-1 bg-bg rounded-full inline-block">一言コメント</p>
        <p class="text-lg pl-2 mb-2">{{$user->status}}</p>
        @empty(!$user->uu_faculty)
        <p class="px-2 mb-1 bg-bg rounded-full inline-block">学部/学科</p>
        <p class="text-lg pl-2 mb-2">{{$user->uu_faculty}}/{{$user->uu_major}}</p>
        @endempty
    </div>
</a>
