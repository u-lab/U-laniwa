<a href="{{url('/project/' . $project->project_id)}}"
    class="bg-bg-sub text-center rounded-2xl p-6 hover:opacity-80 userFrame" style="transition: .2s; width: 500px">
    <img src="{{asset('storage/'. $project->thumbnail)}}" alt="" class="rounded mb-8">
    <h3 class="ml-4 text-xl font-bold mb-2">{{$project->title}}</h3>
    <p class="mb-2">{{$project->subtitle}}</p>
    <p class="text-sm mb-4">{{$project->start_date}} 〜 {{$project->end_date}}</p>
</a>