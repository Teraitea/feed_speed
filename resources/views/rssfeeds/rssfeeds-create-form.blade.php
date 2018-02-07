@extends('layouts.app')

@section('content')
<div class="container">
<br/> 
<div class="row">
    <div class="col-md-12 col-md-offset-2">
        <div class="">
            <div class="jumbotron">
                <h2>Ajouter un flux</h2>
            </div>
            <form class="form-horizontal" method="POST" action="{{ url('/home/rssfeeds') }}">
            {{ csrf_field() }}
            <label for="name">Nom du site</label>
                <input id="name" type="text" class="form-control" name="name" required autofocus>
            <label for="name">Lien du flux rss</label>
                <input id="rss_feed_link" type="text" class="form-control" name="rss_feed_link" required autofocus> 

                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>

            </div>
        </div>
    </div>
</div>
@endsection
