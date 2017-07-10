@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><H2>Tous les plats</H2></div>

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
          Restaurant
          </th>
          <th>
            Catégorie
          </th>


          <th>
            Composition
          </th>
          <th>
            Prix
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($menus as $menu)
     <tr>
            <td>{{ $menu->id }}</td>
            <td>{{ $menu->nom }}</td>
            <td>{{ $menu->nom_restaurant }}</td>
            <td>{{ $menu->categorie }}</td>
            <td>{{ $menu->composition }}</td>
            <td>{{ $menu->prix }}</td>
            <td><a id="modal-868415" href="#modal-container-868415" role="button" class="btn" data-toggle="modal">Aperçu</a>

              <div class="modal fade" id="modal-container-868415" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title" id="myModalLabel">
                              Aperçu du plat
                            </h4>
                          </div>
                          <div class="modal-body">
                            <div class="col-md-12 column">
			<img class="img-responsive" alt="{{$menu->nom}}" src="{{url('uploads/'.$menu->image)}}" />
		</div>
    <div class="col-md-12 column">
<p>
  Nom : <strong>{{ $menu->nom }}</strong>
</p>
<p>
  Restaurant : <strong>{{ $menu->nom_restaurant }}</strong>
</p>
<p>
  Categorie : <strong>{{ $menu->categorie }}</strong>
</p>
<p>
  Composition : <strong>{{ $menu->composition }}</strong>
</p>
<p>
  Prix : <strong>{{ $menu->prix }}</strong>
</p>

    </div>
                          </div>
                          <div class="modal-footer">

                          </div>

                        </div>

                      </div>

                    </div>




            </td>
<td><a role="button" class="btn" href='/home/menu/edit/{{ $menu->id }}'>Editer</a>
</td>
<td><a  id="modal-868413" href="#modal-container-868413" role="button" class="btn" data-toggle="modal">Supprimer</a>

  <div class="modal fade" id="modal-container-868413" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  				<div class="modal-dialog">
  					<div class="modal-content">
  						<div class="modal-header">
  							 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
  							<h4 class="modal-title" id="myModalLabel">
  								Supprimer le plat
  							</h4>
  						</div>
  						<div class="modal-body">
  							Souhaitez-vous vraiment supprimer ce plat ?
  						</div>
  						<div class="modal-footer">
  							 <button type="button" class="btn btn-default" data-dismiss="modal">Non</button> <a type="button"  href='/home/menu/delete/{{ $menu->id }}' class="btn btn-primary">Oui</a>
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
