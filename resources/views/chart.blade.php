@extends('layouts.dashboard')
@section('content')
        <div id="app">
            {!! $chart->container() !!}
        </div>
        <div id="add">
            {!! $charet->container() !!}
        </div>
        <div id="adod">
            {!! $charti->container() !!}
        </div>
         <script src="https://unpkg.com/vue"></script>
        <script>
            // var app = new Vue({
            //     el: '#app',
            // });
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
        <!-- // <script src=https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js charset=utf-8></script> -->
        {!! $chart->script() !!}
        {!! $charet->script() !!}
        {!! $charti->script() !!}
    
@endsection