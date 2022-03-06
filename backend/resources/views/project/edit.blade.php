@php
use Illuminate\Support\Carbon;
@endphp

@extends("layouts.noLogin")
@section("title","プロジェクト編集")

@section('header')
@parent
@endsection
@section('content')
<h1 class="text-center my-8 text-3xl kiwi-maru">プロジェクト編集</h1>
<div class="mx-auto px-4 " style="max-width: 1200px">
    <p>プロジェクト編集</p>
</div>

<div>
    <h2>プロジェクト</h2>
    <div style="padding-bottom: 32px">
        <p>プロジェクト 名: {{ $project['name'] }}</p>
        <p>プロジェクト 説明: {{ $project['description'] }}</p>
        <p>プロジェクト 活動場所: {{ $project['place_of_activity'] }}</p>
        <p>プロジェクト 開始日: {{ $project['start_date']->format('Y年m月d日') }}</p>
        <p>プロジェクト 終了日: {{ $project['end_date']?->format('Y年m月d日') ?? '未設定' }}</p>
    </div>

    <a
        href={{ route('projectIndex') }}
        style="color: #0070f3; text-decoration: none;"
    >プロジェクト一覧</a>
</div>
@endsection
