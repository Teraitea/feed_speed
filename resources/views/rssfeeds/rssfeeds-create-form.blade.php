@extends('layouts.app')

@section('title','Ajout de contenu')
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
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name">Nom du site</label>
                    <input id="name" type="text" class="form-control" name="name" required autofocus>
            </div>
            <div class="form-group{{ $errors->has('rss_feed_link') ? ' has-error' : '' }}">
                <label for="rss_feed_link">Lien du flux rss</label>
                    <input id="rss_feed_link" type="text" class="form-control" name="rss_feed_link" required autofocus> 
            </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>

            </div>
        </div>
    </div>
</div>
@endsection
