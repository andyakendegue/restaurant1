@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><H2>Toutes les réponses aux questions fréquentes</H2></div>

                <div class="panel-body">
                  <table class="table">
      <thead>
        <tr>
          <th>
            Question id
          </th>
          <th>
          Question
          </th>
          <th>
            Réponse
          </th>


          <th>
            Date d'ajout
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($faqs as $faq)
     <tr>
            <td>{{ $faq->id }}</td>
            <td>{{ $faq->question }}</td>
            <td>{{ $faq->reponse }}</td>
            <td>{{ $faq->date }}</td>
<td><a role="button" class="btn" href='/home/faq/edit/{{ $faq->id }}'>Editer</a>
</td>
<td><a  id="modal-868413" href="#modal-container-868413" role="button" class="btn" data-toggle="modal">Supprimer</a>

  <div class="modal fade" id="modal-container-868413" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  				<div class="modal-dialog">
  					<div class="modal-content">
  						<div class="modal-header">
  							 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
  							<h4 class="modal-title" id="myModalLabel">
  								Supprimer la question
  							</h4>
  						</div>
  						<div class="modal-body">
  							Souhaitez-vous vraiment supprimer cette question ?
  						</div>
  						<div class="modal-footer">
  							 <button type="button" class="btn btn-default" data-dismiss="modal">Non</button> <a type="button"  href='/home/faq/delete/{{ $faq->id }}' class="btn btn-primary">Oui</a>
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
