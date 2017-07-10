@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><H2>Modifier l'utilisateur</H2></div>

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


  <input type="hidden" name="id" value="{{ $utilisateur->id }}">


       <div class="form-group">
          <label for="nom">Nom</label><input class="form-control" id="nom" name="nom" type="text" value="{{$utilisateur->nom}}" />
       </div>
       <div class="form-group">
          <label for="nom">Prénom</label><input class="form-control" id="prenom" name="prenom" type="text" value="{{$utilisateur->prenom}}" />
       </div>

       <div class="form-group">
          <label for="phone">Phone</label><input class="form-control" id="phone" name="phone" type="text" value="{{$utilisateur->phone}}"/>
       </div>
       <div class="form-group">
          <label for="phone">Email</label><input class="form-control" id="email" name="email" type="email" value="{{$utilisateur->email}}"/>
       </div>
       <div class="form-group">
          <label for="site_web">Site Web</label><input class="form-control" id="site_web" name="site_web" type="text" value="{{$restaurant->site_web}}"/>
       </div>
       <div class="form-group">
          <label for="imgUpload">Image</label><input class="form-control" name="imgUpload" type="file" accept="image/*" value="{{$restaurant->image}}"/>
          <input class="form-control" name="imgUploadSave" type="hidden" value="{{$restaurant->image}}"/>

       </div>
       <div class="form-group" style="margin-bottom: 0;">
                                <div id="image_preview" class="col-lg-10 col-lg-offset-2">
                                    <div class="thumbnail">
                                        <img src="{{url('uploads/'.$restaurant->image)}}" alt="">
                                        <div class="caption">
                                            <h4></h4>
                                            <p></p>
                                            <p><button type="button" class="btn btn-default btn-danger">Annuler</button></p>
                                        </div>
                                    </div>
                                </div>
                            </div>


       <div class="form-group">
       <button type="submit" class="btn btn-default">Enregistrer</button>
     </div>


     </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
