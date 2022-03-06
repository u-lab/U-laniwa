@extends("layouts.main")
@section("title","ユーザー統計")

@section('header')
@parent
@endsection
@section('content')
<h1 class="text-center my-8 text-3xl ">ユーザー統計</h1>
<div class="mb-20">

    <h2 class="text-center my-12 md:text-2xl text-xl">
        ユーザー数：
        {{$userValue}}
    </h2>
    @include('components.graph.pieChart',[
    'id'=>'userRoleCounter',
    'datum'=>$userRoleCounter,
    'title'=>'ユーザー種別',
    'colors'=>
    [
    '#1BA3C6','#2CB5C0','#30BCAD','#21B087','#33A65C','#57A337','#A2B627','#D5BB21','#F8B620','#F89217','#F06719','#E03426','#F64971','#FC719E','#EB73B3','#CE69BE','#A26DC2','#7873C0','#4F7CBA'
    ],
    ])
    @include('components.graph.pieChart',[
    'id'=>'userGenderCounter',
    'datum'=>$userGenderCounter,
    'title'=>'性別',
    'colors'=>
    [
    '#1BA3C6','#2CB5C0','#30BCAD','#21B087','#33A65C','#57A337','#A2B627','#D5BB21','#F8B620','#F89217','#F06719','#E03426','#F64971','#FC719E','#EB73B3','#CE69BE','#A26DC2','#7873C0','#4F7CBA'
    ],
    ])
    @include('components.graph.pieChart',[
    'id'=>'userGradeCounter',
    'datum'=>$userGradeCounter,
    'title'=>'学年',
    'colors'=>
    [
    '#1BA3C6','#2CB5C0','#30BCAD','#21B087','#33A65C','#57A337','#A2B627','#D5BB21','#F8B620','#F89217','#F06719','#E03426','#F64971','#FC719E','#EB73B3','#CE69BE','#A26DC2','#7873C0','#4F7CBA'
    ],
    ])

    @include('components.graph.pieChart',[
    'id'=>'userFacultyCounter',
    'datum'=>$userFacultyCounter,
    'title'=>'宇大の学部',
    'colors'=>
    [
    '#1BA3C6','#2CB5C0','#30BCAD','#21B087','#33A65C','#57A337','#A2B627','#D5BB21','#F8B620','#F89217','#F06719','#E03426','#F64971','#FC719E','#EB73B3','#CE69BE','#A26DC2','#7873C0','#4F7CBA'
    ],
    ])

    @include('components.graph.pieChart',[
    'id'=>'userMajorCounter',
    'datum'=>$userMajorCounter,
    'title'=>'宇大の学科',
    'colors'=>
    [
    '#1BA3C6','#2CB5C0','#30BCAD','#21B087','#33A65C','#57A337','#A2B627','#D5BB21','#F8B620','#F89217','#F06719','#E03426','#F64971','#FC719E','#EB73B3','#CE69BE','#A26DC2','#7873C0','#4F7CBA'
    ],
    ])

    @include('components.graph.pieChart',[
    'id'=>'userBirthAreaCounter',
    'datum'=>$userBirthAreaCounter,
    'title'=>'出身都道府県',
    'colors'=>
    [
    '#1BA3C6','#2CB5C0','#30BCAD','#21B087','#33A65C','#57A337','#A2B627','#D5BB21','#F8B620','#F89217','#F06719','#E03426','#F64971','#FC719E','#EB73B3','#CE69BE','#A26DC2','#7873C0','#4F7CBA'
    ],
    ])

    @include('components.graph.pieChart',[
    'id'=>'userLiveAreaCounter',
    'datum'=>$userLiveAreaCounter,
    'title'=>'在住都道府県',
    'colors'=>
    [
    '#1BA3C6','#2CB5C0','#30BCAD','#21B087','#33A65C','#57A337','#A2B627','#D5BB21','#F8B620','#F89217','#F06719','#E03426','#F64971','#FC719E','#EB73B3','#CE69BE','#A26DC2','#7873C0','#4F7CBA'
    ],
    ])

</div>
@endsection
