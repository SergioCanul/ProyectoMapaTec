<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4>
							Clientes </h4>
						</div>

						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar Departamento">
						</div>

						<button wire:click="create()" class=" btn btn-info">
						  Agregar nuevo departamento
						</button>
					</div>
				</div>

				<div class="card-body">
                    @if($updateMode)
                        @include('livewire.menuadmin.update')
                    @else
                        @if($createMode)
                            @include('livewire.menuadmin.create')
                        @endif
                    @endif
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
								<td width="300">
								    <a class="btn btn-success" href="{{route('menuadmin.show', $row->id)}}"></i>Ver</button>
                                    <a class="btn btn-warning" wire:click="edit({{$row->id}})"></i>Editar</a>
                                    <a class="btn btn-danger" onclick="confirm('Confirma eliminar departamento: {{ucwords(strtolower($row->nombreDepartamento))}}?')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"> Eliminar </a>
								</td>
                                @endforeach
						</tbody>
					</table>
					{{ $departamentos->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
