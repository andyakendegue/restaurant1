@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><H2>Tous les fournisseurs</H2></div>

                <div class="panel-body">
                  <table class="table">
      <thead>
        <tr>
          <th>
            id
          </th>
          <th>
          Nom
          </th>
          <th>
            Catégorie
          </th>


          <th>
            Téléphone
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($restaurants as $restaurant)
     <tr>
            <td>{{ $restaurant->id }}</td>
            <td>{{ $restaurant->nom }}</td>
            <td>{{ $restaurant->categorie }}</td>
            <td>{{ $restaurant->phone }}</td>
            <td><a id="modal-868415" href="#modal-container-868415" role="button" class="btn" data-toggle="modal">Aperçu</a>

              <div class="modal fade" id="modal-container-868415" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title" id="myModalLabel">
                              Aperçu du restaurant
                            </h4>
                          </div>
                          <div class="modal-body">
                            <div class="col-md-12 column">
			<img class="img-responsive" alt="{{$restaurant->nom}}" src="{{url('uploads/'.$restaurant->image)}}" />
		</div>
    <div class="col-md-12 column">
<p>
  Nom : <strong>{{$restaurant->nom}}</strong>
</p>
<p>
  Catégorie : <strong>{{$restaurant->categorie}}</strong>
</p>
<p>
  Phone : <strong>{{$restaurant->phone}}</strong>
</p>
<p>
  Email : <strong>{{$restaurant->email}}</strong>
</p>
<p>
  Site Web : <strong>{{$restaurant->site_web}}</strong>
</p>
<p>
  Localisation :
</p>
    </div>
                          </div>
                          <div class="modal-footer">

                          </div>

                        </div>

                      </div>

                    </div>




            </td>
<td><a role="button" class="btn" href='/home/restaurant/edit/{{ $restaurant->id }}'>Editer</a>
</td>
<td><a  id="modal-868413" href="#modal-container-868413" role="button" class="btn" data-toggle="modal">Supprimer</a>

  <div class="modal fade" id="modal-container-868413" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  				<div class="modal-dialog">
  					<div class="modal-content">
  						<div class="modal-header">
  							 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
  							<h4 class="modal-title" id="myModalLabel">
  								Supprimer le restaurant
  							</h4>
  						</div>
  						<div class="modal-body">
  							Souhaitez-vous vraiment supprimer ce restaurant ?
  						</div>
  						<div class="modal-footer">
  							 <button type="button" class="btn btn-default" data-dismiss="modal">Non</button> <a type="button"  href='/home/restaurant/delete/{{ $restaurant->id }}' class="btn btn-primary">Oui</a>
  						</div>
  					</div>

  				</div>

  			</div>


</td> </tr>
@endforeach
      </tbody>
    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
