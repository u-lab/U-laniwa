<a href="/user/{{$id}}" class="flex bg-bg-main rounded-2xl p-8 hover:opacity-80"
    style="width: calc(50% - 2.5rem); transition: .2s;">
    <div class="flex items-center w-1/2">
        <img src="/{{$path}}" alt="">
    </div>
    <div class="px-4 text-left w-1/2">
        <p class="px-2 mb-1 bg-bg rounded-full inline-block">なまえ</p>
        <p class="text-lg pl-2 mb-2">{{$name}}</p>
        <p class="px-2 mb-1 bg-bg rounded-full inline-block">一言コメント</p>
        <p class="text-lg pl-2 mb-2">{{$status}}</p>
        @empty(!{{$faculty}})
        <p class="px-2 mb-1 bg-bg rounded-full inline-block">学部/学科</p>
        <p class="text-lg pl-2 mb-2">{{$faculty}}/{{$major}}</p>
        @endempty
    </div>
</a>
