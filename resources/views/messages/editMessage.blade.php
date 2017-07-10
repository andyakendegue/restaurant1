@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><H2>Répondre au message de l'utilisateur</H2></div>

                <div class="panel-body">

                  <div id="boxalert">
                  <div class="alert alert-success alert-dismissable hidden">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <p></p>
                  </div>
                </div>



<form method="post" class="editRestaurant" enctype="multipart/form-data">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="auteur" value="{{ Auth::user()->name }}">

@foreach ($utilisateurs as $utilisateur)
  <input type="hidden" name="id" value="{{ $utilisateur->id }}">


       <div class="form-group">
          <label for="nom">Nom de l'utilisateur</label><!--<input class="form-control" id="nom" name="nom" type="text" value="{{$utilisateur->nom}}" />-->
       </div>

       <div class="form-group">
          <label for="phone">Email de l'utilisateur</label><!--<input class="form-control" id="email" name="email" type="email" value="{{$utilisateur->email}}"/>-->
       </div>
       <div class="form-group">
          <label for="site_web">Message</label>
          <textarea class="form-control" id="contenu" name="contenu"></textarea>
       </div>

       <button type="submit" class="btn btn-default">Envoyer</button>
     </div>
@endforeach

     </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
