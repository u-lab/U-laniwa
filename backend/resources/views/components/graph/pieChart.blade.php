@isset($datum)
<h2 class="text-center mt-4 mb-2">{{$title}}</h2>
<div class="chartWrapper mx-auto" style="padding-top:0px!important">
    <canvas id="{{$id}}" width="400px" height="400px"></canvas>
</div>
<!--進行中のときの動作-->

<script src="{{ mix('js/indexChart.js') }}"></script>
<script>
    id ='{{$id}}';
    labels =  [
        @foreach( $datum as $data=>$value)
            '{{$data}}',
        @endforeach
        ];
    title="{{$title}}";
    data = [
        @foreach( $datum as  $data=>$value)
            {{$value}},
        @endforeach
        ];
    colors=@json($colors);
    drawPieChart(id,labels,title,data,colors);
</script>
@endisset
