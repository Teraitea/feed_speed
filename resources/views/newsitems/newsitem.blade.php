@extends('layouts.app')

@section('title')
  {{$newsitem->title}}
@stop
@section('content')
<div class="container">
  <div class="jumbotron">
    <h1 style="text-decoration: underline;">{{ $newsitem->title }}</h1> 
    </div>
  <div class="pubdate mt-5">Date de publication : {{ $newsitem->pubdate }}</div>
        <div class="description">{!! htmlspecialchars_decode($newsitem->description, ENT_COMPAT | ENT_HTML401) !!}</div>
          
        <button class="btn"><a href="{{ $newsitem->link }}" class="link">Visit website</a></button><br />


  <a href="{{ action('HomeController@index') }}" class="btn btn-success pull-left">Back <i class="fa fa-caret-square-o-left"></i></a>


</div>
@endsection