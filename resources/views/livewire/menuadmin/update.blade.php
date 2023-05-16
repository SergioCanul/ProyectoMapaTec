<div class="w-full max-w-xs mx-auto">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="createDataModalLabel">Actualizar Departamento</h5>
            <button type="button" wire:click="cancel()" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
            </button>
        </div>
        <div class="modal-body">
			<form>
                <div class="form-group">
                    <label for="razonSocial">Nombre departamento</label>
                    <input wire:model="nombreDepartamento" type="text" class="form-control" id="nombreDepartamento" placeholder="nombreDepartamento">@error('nombreDepartamento') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="nombreComercial">Edificio que pertenece</label>
                    <select wire:model="nombreEdificio" id="nombreEdificio" class="form-control">
                        <option value="">Selecciona una opcion</option>
                        @foreach($edificios as $edificio)
                        <option value="{{$edificio -> id}}">
                        {{$edificio -> nombreEdificio}}
                        </option>
                        @endforeach
                    </select>
                    @error('nombreEdificio') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="rfc">Nombre del encargado</label>
                    <input wire:model="encargado" type="text" class="form-control" id="encargado" placeholder="Nombre completo">@error('encargado') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="telefono">Puesto</label>
                    <input wire:model="puestoTrabajo" type="text" class="form-control" id="puestoTrabajo" placeholder="Puesto que ocupa">@error('puestoTrabajo') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="correo">Correo</label>
                    <input wire:model="correo" type="text" class="form-control" id="correo" placeholder="Correo institucional">@error('correo') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary close-btn" wire:click.prevent="cancel()">Cerrar</button>
            <button type="button" wire:click.prevent="update()" class="btn btn-primary close-modal">Guardar</button>
        </div>
    </div>
</div>
