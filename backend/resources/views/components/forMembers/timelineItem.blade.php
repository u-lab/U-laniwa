<div class="tree-content bg-main-btn rounded-2xl p-4 mb-8 flex justify-between">
    <div>
        <p class="text-sm mb-1">{{$start_date}}〜{{$end_date}}</p>
        <p class="mb-1 font-bold text-lg">{{$title}}</p>
        <a href="{{url('/user'.'/'.$timeline->user->id)}}" class="w-fit h-fit mb-1 flex flex-row items-center">
            <img src="{{asset('storage/'.$timeline->user->profile_photo_path)}}" alt=""
                class="w-6 h-6 inline-block rounded-full">
            <p class="inline-block pl-3">{{$name}}</p>
        </a>
        <p>{{$text}}</p>
    </div>
    <div>
        <p class="md:px-4 px-2 md:py-1 md:text-base text-sm border-2 border-bg inline-block">{{$genre}}</p>
    </div>
</div>
