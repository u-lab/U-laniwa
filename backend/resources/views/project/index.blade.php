@extends("layouts.noLogin")
@section("title","プロジェクト一覧")

@section('header')
@parent
@endsection
@section('content')
<h1 class="text-center my-8 text-3xl kiwi-maru">プロジェクト一覧</h1>
<div class="mx-auto px-4 " style="max-width: 1200px">
    <p>プロジェクト一覧</p>
</div>

<div>
    <h2>所属しているプロジェクト</h2>
    @foreach ($projectsBelonged as $project)
        <div style="padding-bottom: 32px">
            <p>プロジェクト 名: {{ $project['name'] }}</p>
            <p>プロジェクト 説明: {{ $project['description'] }}</p>
            <p>プロジェクト 活動場所: {{ $project['place_of_activity'] }}</p>
            <p>プロジェクト 開始日: {{ $project['start_date']->format('Y年m月d日') }}</p>
            <p>プロジェクト 終了日: {{ $project['end_date']?->format('Y年m月d日') ?? '未設定' }}</p>
            <p>
                <a
                    href={{ route('projectShow', ['project_id' => $project['id']]) }}
                    style="color: #0070f3; text-decoration: none;"
                >このプロジェクトを見る</a>
            </p>
            <p>
                <a
                    href={{ route('projectEdit', ['project_id' => $project['id']]) }}
                    style="color: #0070f3; text-decoration: none;"
                >このプロジェクトを編集する</a>
            </p>
        </div>
    @endforeach

    <h2>未所属しているプロジェクト</h2>
    @foreach ($projectsNotBelonged as $project)
    <div style="padding-bottom: 32px">
        <p>プロジェクト 名: {{ $project['name'] }}</p>
        <p>プロジェクト 説明: {{ $project['description'] }}</p>
        <p>プロジェクト 活動場所: {{ $project['place_of_activity'] }}</p>
        <p>プロジェクト 開始日: {{ $project['start_date']->format('Y年m月d日') }}</p>
        <p>プロジェクト 終了日: {{ $project['end_date']?->format('Y年m月d日') ?? '未設定' }}</p>
        <a
            href={{ route('projectShow', ['project_id' => $project['id']]) }}
            style="color: #0070f3; text-decoration: none;"
        >このプロジェクトを見る</a>
    </div>
    @endforeach
</div>
@endsection
