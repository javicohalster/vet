@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">
    	<div class="row">
    		<div class="col-md-12">
        		<div class="card">
					<div class="card-header card-header-icon" data-background-color="blue">
						 <i class="material-icons">assignment</i>
					</div>
					<div class="card-content">
						<table id="top-button-add">
							<tr>
								<td><h4 class="card-title"><small>LISTA DE PACIENTES SIGUIENTE CITA</small></h4></td>  
							</tr>
						</table>	
						@component('revisar.list_pacientes_prox')
							@slot('revisar')
							@endslot
						@endcomponent
					</div>
				</div>
       		</div>
		</div>
	</div>
	
</div>


@endsection
