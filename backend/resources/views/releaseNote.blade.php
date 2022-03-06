@extends("layouts.noLogin")
@section("title","リリースノート")

@section('header')
@parent
@endsection
@section('content')
@include('components.noLogin.pageTitle', ['title'=>'リリースノート'])

<div class="pb-20">
    <div class="tree release">

        @include('components.noLogin.treeContent',[
        'date'=>'2022年3月6日',
        'title'=>'U-laniwaリリース',
        'text'=>'U-labユーザー向けに公開しました。'])
        @include('components.noLogin.treeContent',[
        'date'=>'2022年2月5日',
        'title'=>'U-laniwa開発開始',
        'text'=>'U-laniwaの概要や開発者の募集、技術採用、名称について会議を行いました。'])
        @include('components.noLogin.treeContent',[
        'date'=>'2022年12月29日',
        'title'=>'「U-lab内部向けシステムにかかる意見調査について」募集',
        'text'=>'U-lab内部向けシステムの必要性が高まったことから、U-labユーザー全体に向けてアンケートを取りました。'])
        @include('components.noLogin.treeContent',[
        'date'=>'2021年10月21日',
        'title'=>'U-lab内部向けシステム作成断念',
        'text'=>'運営での話し合いにて、作らない方向で合意となりました。'])
        @include('components.noLogin.treeContent',[
        'date'=>'2021年7月30日',
        'title'=>'U-lab内部向けシステム検討開始',
        'text'=>'小畑が勝手に検討を開始しました。'])


    </div>
</div>

@endsection
