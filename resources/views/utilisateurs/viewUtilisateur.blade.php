@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><H2>Tous les utilisateurs</H2></div>

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
            Prénom
          </th>


          <th>
            Téléphone
          </th>
          <th>
            Email
          </th>
          <th>
            Sexe
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($utilisateurs as $utilisateur)
     <tr>
            <td>{{ $utilisateur->id }}</td>
            <td>{{ $utilisateur->nom }}</td>
            <td>{{ $utilisateur->prenom }}</td>
            <td>{{ $utilisateur->phone }}</td>
            <td>{{ $utilisateur->email }}</td>
            <td>{{ $utilisateur->sexe }}</td>
            <td><a id="modal-868415" href="#modal-container-868415" role="button" class="btn" data-toggle="modal">Aperçu</a>

              <div class="modal fade" id="modal-container-868415" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title" id="myModalLabel">
                              Aperçu de l'utilisateur
                            </h4>
                          </div>
                          <div class="modal-body">
                            <div class="col-md-12 column">
			<img class="img-responsive" alt="{{$utilisateur->nom}}" src="{{url('uploads/'.$utilisateur->avatar)}}" />
		</div>
    <div class="col-md-12 column">
<p>
  Nom : <strong>{{$utilisateur->nom}}</strong>
</p>
<p>
  Prenom : <strong>{{$utilisateur->prenom}}</strong>
</p>
<p>
  Téléphhone : <strong>{{$utilisateur->phone}}</strong>
</p>
<p>
  Email : <strong>{{$utilisateur->email}}</strong>
</p>
<p>
  Sexe : <strong>{{$utilisateur->sexe}}</strong>
</p>
    </div>
                          </div>
                          <div class="modal-footer">

                          </div>

                        </div>

                      </div>

                    </div>




            </td>

<td><a  id="modal-868413" href="#modal-container-868413" role="button" class="btn" data-toggle="modal">Supprimer</a>

  <div class="modal fade" id="modal-container-868413" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  				<div class="modal-dialog">
  					<div class="modal-content">
  						<div class="modal-header">
  							 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
  							<h4 class="modal-title" id="myModalLabel">
  								Supprimer l'utilisateur
  							</h4>
  						</div>
  						<div class="modal-body">
  							Souhaitez-vous vraiment supprimer cet utilisateur ?
  						</div>
  						<div class="modal-footer">
  							 <button type="button" class="btn btn-default" data-dismiss="modal">Non</button> <a type="button"  href='/home/utilisateurs/delete/{{ $utilisateur->id }}' class="btn btn-primary">Oui</a>
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
