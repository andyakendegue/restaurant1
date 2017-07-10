@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><H2>Toutes les commandes reçues</H2></div>

                <div class="panel-body">
                  <table class="table">
      <thead>
        <tr>
          <th>
            Id de la commande
          </th>
          <th>
          Restaurant
          </th>
          <th>
            Client
          </th>
          <th>
            Article
          </th>
          <th>
            Montant
          </th>
          <th>
            Statut
          </th>
          <th>
            Date
          </th>

        </tr>
      </thead>
      <tbody>
        @foreach ($commandes as $commande)
     <tr>
            <td>{{ $commande->id }}</td>
            @foreach ($restaurants as $restaurant)
            @if ($restaurant->id == $commande->id_restaurant)
            <td>{{ $restaurant->nom }}</td>
            @endif
            @endforeach
            @foreach ($utilisateurs as $utilisateur)
            @if ($utilisateur->id == $commande->id_client)
            <td>{{ $utilisateur->nom }}</td>
            @endif
            @endforeach
            <td>{{ $commande->article }}</td>
            <td>{{ $commande->montant }}</td>
            <td>{{ $commande->statut }}</td>
            <td>{{ $commande->date }}</td>
            <td><a id="modal-868415" href="#modal-container-868415" role="button" class="btn" data-toggle="modal">Aperçu</a>

              <div class="modal fade" id="modal-container-868415" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title" id="myModalLabel">
                              Aperçu de la commande
                            </h4>
                          </div>
                          <div class="modal-body">

    <div class="col-md-12 column">
<p>
  Restaurant : <strong>            @foreach ($restaurants as $restaurant)
              @if ($restaurant->id == $commande->id_restaurant)
              {{ $restaurant->nom }}
              @endif
              @endforeach</strong>
</p>
<p>
  Client : <strong>@foreach ($utilisateurs as $utilisateur)
  @if ($utilisateur->id == $commande->id_client)
  {{ $utilisateur->nom }}
  @endif
  @endforeach</strong>
</p>
<p>
  Article : <strong>{{$commande->article}}</strong>
</p>
<p>
  Montant : <strong>{{$commande->montant}}</strong>
</p>
<p>
  Statut : <strong>{{$commande->statut}}</strong>
</p>
<p>
  Date : <strong>{{$commande->date}}</strong>
</p>
    </div>
                          </div>
                          <div class="modal-footer">

                          </div>

                        </div>

                      </div>

                    </div>




            </td>
<td><a id="modal-868416" href="#modal-container-868416" role="button" class="btn" data-toggle="modal">Valider</a>
  <div class="modal fade" id="modal-container-868416" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">
                  Valider la la commande
                </h4>
              </div>
              <form method="get" action="/home/commandes/{{ $commande->id }}/edit">
              <div class="modal-body">

<div class="col-md-12 column">

    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
    <input type="hidden" name="auteur" value="{{ Auth::user()->name }}" />
    <input type="hidden" name="statut" value="en cours de livraison" />
    <div class="form-group">
       <label for="question">Délai de Livraison</label>
       <select class="form-control" id="delai" name="delai">
         <option value="30mn">
           30m
         </option>
         <option value="1h">
           1h
         </option>
         <option value="1h30mn">
           1h30m
         </option>
         <option value="2h">
           2h
         </option>
         <option value="2h30mn">
           2h30m
         </option>
       </select>
    </div>


</div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Non</button>
                <button type="submit" class="btn btn-primary">Oui</button>


              </div>
              </form>

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
  								Supprimer la commande
  							</h4>
  						</div>
  						<div class="modal-body">
  							Souhaitez-vous vraiment supprimer cette commande ?
  						</div>
  						<div class="modal-footer">
  							 <button type="button" class="btn btn-default" data-dismiss="modal">Non</button>
                 <a type="button" href='/home/commandes/{{ $commande->id }}' class="btn btn-primary">Oui</a>
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
