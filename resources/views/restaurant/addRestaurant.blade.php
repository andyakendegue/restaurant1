@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><H2>Nouveau fournisseur</H2><button class="btn btn-primary">Ajouter un fournisseur</button></div>

                <div class="panel-body">

                  <div id="boxalert">
                  <div class="alert alert-success alert-dismissable hidden">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <p></p>
                  </div>
                </div>



<form method="post" class="addRestaurant" enctype="multipart/form-data">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="auteur" value="{{ Auth::user()->name }}">
       <div class="form-group">
          <label for="nom">Nom</label><input class="form-control" id="nom" name="nom" type="text" />
       </div>
       <div class="selectbox form-group">
         <label for="categorie">Catégorie</label>
         <select id="categorie" name="categorie">
           <option value="pizzeria">Pizzeria</option>
           <option value="africain">Restaurant Africain</option>
           <option value="francais">Restaurant français</option>
           <option value="libanais">Restaurant Libanais</option>
           <option value="chinois">Restaurant Chinois</option>
         </select>


       </div>
       <div class="form-group">
          <label for="phone">Phone</label><input class="form-control" id="phone" name="phone" type="text" />
       </div>
       <div class="form-group">
          <label for="phone">Email</label><input class="form-control" id="email" name="email" type="email" />
       </div>
       <div class="form-group">
          <label for="site_web">Site Web</label><input class="form-control" id="site_web" name="site_web" type="text" />
       </div>
       <div class="form-group">
          <label for="imgUpload">Image</label><input class="form-control" name="imgUpload" type="file" accept="image/*"/>

       </div>
       <div class="form-group" style="margin-bottom: 0;">
                                <div id="image_preview" class="col-lg-10 col-lg-offset-2">
                                    <div class="thumbnail hidden">
                                        <img src="http://placehold.it/5" alt="">
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
