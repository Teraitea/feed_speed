@extends('layouts.app')

@section('title','Actualités')

@section('content')
<div class="container-fluid">

<p>Actualités</p>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>#</th>
            <!-- <th>User ID</th> -->
            <th>Titre de l'article</th>
            <th>Lien de l'article</th>
            {{-- <th>Rss Feed ID</th> --}}
            {{-- <th>Category ID</th> --}}
            <th>Date de publication</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($newsitems as $newsitem)
        <tr>
            <td>{{ $newsitem->id }}</td>
            <!-- <td>{{ $newsitem->user_id }}</td> -->
            <td>{{ $newsitem->title }}</td>
            <td>{{ $newsitem->link }}</td>
            {{-- <td>{{ $newsitem->rss_feed_id }}</td> --}}
            {{-- <td>{{ $newsitem->category_id }}</td> --}}
            <td>{{ \Carbon\Carbon::parse($newsitem->pubdate)->format('d/m/Y h:i:s')}}</td>
        <td>
        <a href="{{ action('NewsitemController@show', $newsitem['id']) }}"><button class="btn btn-default"><i class="fa fa-eye"></i></button></a>
        {{-- <a href="{{ action('NewsitemController@edit', $newsitem['id']) }}"><i class="fa fa-pencil"></i></a> --}}
        <a href="{{ action('NewsitemController@destroy', $newsitem['id']) }}"><button class="btn btn-default"><i class="fa fa-trash"></i></button></a>
        
        </td>
        </tr>
    </tbody>
    @endforeach
    
</table>    



</div>
@endsection