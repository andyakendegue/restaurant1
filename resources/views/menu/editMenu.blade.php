@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading"><H2>Modifier le plat</H2><button class="btn btn-primary">Ajouter un plat </button></div>

        <div class="panel-body">

          <div id="boxalert">
            <div class="alert alert-success alert-dismissable hidden">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <p></p>
            </div>
          </div>



          <form method="post" class="editMenu" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="auteur" value="{{ Auth::user()->name }}">
            @foreach ($menus as $menu)


            <div class="form-group">
              <label for="nom">Nom</label><input class="form-control" id="nom" name="nom" type="text" value="{{$menu->nom}}"/>
            </div>
            <div class="selectbox form-group">
              <label for="restaurant">Restaurant</label>
              <select id="restaurant" name="restaurant">
                @foreach ($restaurants as $restaurant)
                <option value="{{$restaurant->id}}">Restaurant {{$restaurant->nom}}</option>
                @endforeach
              </select>


            </div>
            <div class="selectbox form-group">
              <label for="categorie">Catégorie</label>
              <select id="categorie" name="categorie">
                @foreach ($categories as $categorie)
                <option value="{{$categorie->categorie}}">{{$categorie->categorie}}</option>
                @endforeach
              </select>


            </div>
            <div class="form-group">
              <label for="composition">Composition</label><input class="form-control" id="composition" name="composition" type="text"  value="{{$menu->composition}}"/>
            </div>
            <div class="form-group">
              <label for="prix">Prix</label><input class="form-control" id="prix" name="prix" type="text" value="{{$menu->prix}}"/>
            </div>

            <div class="form-group">
              <label for="imgUpload1">Image 1</label><input class="form-control" name="imgUpload1" type="file" accept="image/*"/>
              <input class="form-control" name="imgUploadSave1" type="hidden" value="{{$menu->image1}}"/>
            </div>
            <div class="form-group" style="margin-bottom: 0;">
              <div id="image_preview1" class="col-lg-10 col-lg-offset-2">
                <div class="thumbnail">
                  <img src="{{url('uploads/'.$menu->image1)}}" alt="">
                  <div class="caption">
                    <h4></h4>
                    <p></p>
                    <p><button type="button" class="btn btn-default btn-danger">Annuler</button></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="imgUpload2">Image 2</label><input class="form-control" name="imgUpload2" type="file" accept="image/*"/>
              <input class="form-control" name="imgUploadSave2" type="hidden" value="{{$menu->image2}}"/>
            </div>
            <div class="form-group" style="margin-bottom: 0;">
              <div id="image_preview2" class="col-lg-10 col-lg-offset-2">
                <div class="thumbnail">
                  <img src="{{url('uploads/'.$menu->image2)}}" alt="">
                  <div class="caption">
                    <h4></h4>
                    <p></p>
                    <p><button type="button" class="btn btn-default btn-danger">Annuler</button></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="imgUpload3">Image 3</label><input class="form-control" name="imgUpload3" type="file" accept="image/*"/>
              <input class="form-control" name="imgUploadSave3" type="hidden" value="{{$menu->image3}}"/>
            </div>
            <div class="form-group" style="margin-bottom: 0;">
              <div id="image_preview3" class="col-lg-10 col-lg-offset-2">
                <div class="thumbnail">
                  <img src="{{url('uploads/'.$menu->image3)}}" alt="">
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
            @endforeach

          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
