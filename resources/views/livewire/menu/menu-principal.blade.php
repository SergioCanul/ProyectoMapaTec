<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4>
							Derpartamentos TECNM </h4>
						</div>

						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar Departamento">
						</div>
					</div>
				</div>

				<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr>
								<th>Id</th>
								<th>Nombre departamento</th>

								<th>Encargado</th>
								<th>Puesto</th>

								<td>Acciones</td>
							</tr>
						</thead>
						<tbody>
                            @foreach($departamentos as $row)
							<tr>
							    <td>{{ $row->id }}</td>
								<td>{{$row->nombreDepartamento}}</td>
								<td>{{$row->encargado}}</td>
                                <td>{{$row->puestoTrabajo}}</td>
								<td width="90">
								    <button class="btn btn-success" wire:click="showMap({{$row->idedificio_fk}})"></i>Ubicar</button>
                                    <a class="btn btn-warning" href="/oportunidade/$row->id/edit"></i>Ver mas</a>
								</td>
                                @endforeach
						</tbody>
					</table>
					</div>
                    {{ $departamentos->links() }}
				</div>
			</div>
		</div>
	</div>
</div>

