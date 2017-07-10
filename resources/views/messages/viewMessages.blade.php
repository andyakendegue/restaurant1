@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><H2>Tous les messages reçus</H2></div>

                <div class="panel-body">
                  <table class="table">
      <thead>
        <tr>
          <th>
            id
          </th>
          <th>
          Email
          </th>
          <th>
            Message
          </th>


          <th>
            Date
          </th>

        </tr>
      </thead>
      <tbody>
        @foreach ($messages as $message)
     <tr>
            <td>{{ $message->id }}</td>
            <td>{{ $message->email_expediteur }}</td>
            <td>{{ $message->message }}</td>
            <td>{{ $message->date }}</td>
            <td><a id="modal-868415" href="#modal-container-868415" role="button" class="btn" data-toggle="modal">Aperçu</a>

              <div class="modal fade" id="modal-container-868415" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title" id="myModalLabel">
                              Aperçu du message
                            </h4>
                          </div>
                          <div class="modal-body">

    <div class="col-md-12 column">
<p>
  Email de l'expéditeur : <strong>{{$message->email_expediteur}}</strong>
</p>
<p>
  Message : <strong>{{$message->message}}</strong>
</p>

    </div>
                          </div>
                          <div class="modal-footer">

                          </div>

                        </div>

                      </div>

                    </div>




            </td>
<td><a role="button" class="btn" href='/home/messages/{{ $message->id_expediteur }}/edit/'>Répondre</a>
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
  							 <button type="button" class="btn btn-default" data-dismiss="modal">Non</button> <a type="button"  href='/home/messages/delete/{{ $message->id }}' class="btn btn-primary">Oui</a>
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
