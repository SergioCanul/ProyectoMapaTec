
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4>Mapa de la escuela</h4>
						</div>
                        <a class="btn btn-info" wire:click="$emit('refreshComponent')" href=""></i>Mapa completo</a>

						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
					</div>
				</div>

				<div class="card-body">
                    <img src="{{asset('img/'.$img->nombrearchivo)}}" alt="Mapa de la escuela">
                </div>
			</div>
		</div>
	</div>
</div>

