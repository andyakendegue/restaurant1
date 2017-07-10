@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><H2>Nouvelle question</H2><button class="btn btn-primary">Ajouter une question </button></div>

                <div class="panel-body">

                  <div id="boxalert">
                  <div class="alert alert-success alert-dismissable hidden">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <p></p>
                  </div>
                </div>



<form method="post" class="addQuestion" enctype="multipart/form-data">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="auteur" value="{{ Auth::user()->name }}">
       <div class="form-group">
          <label for="question">Question</label><input class="form-control" id="question" name="question" type="text" />
       </div>
       <div class="form-group">
          <label for="reponse">Réponse</label><textarea class="form-control" id="reponse" name="reponse" col="40" rows="10" ></textarea>
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
