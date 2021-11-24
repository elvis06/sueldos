<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modificar Empresa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group row">
                <div class="col-md-6">
                    <label for="nombre">Nombre</label>
                    <input wire:model="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre">@error('nombre') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-md-6">
                    <label for="propietario">Nombre Propietario</label>
                    <input wire:model="propietario" type="text" class="form-control" id="propietario" placeholder="Propietario">@error('propietario') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4">
                    <label for="nit">NIT</label>
                    <input wire:model="nit" type="text" class="form-control" id="nit" placeholder="NIT">@error('nit') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-md-8">
                    <label for="direccion">Dirección</label>
                    <input wire:model="direccion" type="text" class="form-control" id="direccion" placeholder="Dirección">@error('direccion') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4">
                    <label for="telefono">Teléfono</label>
                    <input wire:model="telefono" type="text" class="form-control" id="telefono" placeholder="Teléfono">@error('telefono') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-md-4">
                    <label for="ciudad">Ciudad</label>
                    <input wire:model="ciudad" type="text" class="form-control" id="ciudad" placeholder="Ciudad">@error('ciudad') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-md-4">
                    <label for="lucro">Fines de Lucro</label>
                    <select class="form-control" wire:model="lucro">
                        <option value="">Seleccione</option>
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>
                    </select>
                    @error('lucro') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4">
                    <label for="representante">Nombre Representante Legal</label>
                    <input wire:model="representante" type="text" class="form-control" id="representante" placeholder="Representante">@error('representante') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-md-4">
                    <label for="ci_representante">CI Representante</label>
                    <input wire:model="ci_representante" type="text" class="form-control" id="ci_representante" placeholder="Ci Representante">@error('ci_representante') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-md-4">
                    <label for="tel_representante">Tel/Cel Representante</label>
                    <input wire:model="tel_representante" type="text" class="form-control" id="tel_representante" placeholder="Tel Representante">@error('tel_representante') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="nro_min_trabajo">Nro. Ministerio de Trabajo</label>
                    <input wire:model="nro_min_trabajo" type="text" class="form-control" id="nro_min_trabajo" placeholder="Nro Min Trabajo">@error('nro_min_trabajo') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-md-6">
                    <label for="nro_caja_salud">Nro. Patronal Caja Salud</label>
                    <input wire:model="nro_caja_salud" type="text" class="form-control" id="nro_caja_salud" placeholder="Nro Caja Salud">@error('nro_caja_salud') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4">
                    <label for="rubro">Actividad</label>
                    <select class="form-control" wire:model="rubro">
                        <option value="">Seleccione</option>
                        <option value="COMERCIAL">COMERCIAL</option>
                        <option value="INDUSTRIAL">INDUSTRIAL</option>
                        <option value="SERVICIOS">SERVICIOS</option>
                        <option value="CONSTRUCCIÓN">CONSTRUCCIÓN</option>
                        <option value="EDUCACIÓN">EDUCACIÓN</option>
                        <option value="OTRO">OTRO</option>
                    </select>
                    @error('rubro') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-md-4">
                    <label for="tipo">Tipo de Empresa</label>
                    <select class="form-control" wire:model="tipo">
                        <option value="">Seleccione</option>
                        <option value="UNIPERSONAL">UNIPERSONAL</option>
                        <option value="S.R.L.">S.R.L.</option>
                        <option value="S.A.">S.A.</option>
                        <option value="S.A.M.">S.A.M.</option>
                        <option value="S.C.">S.C.</option>
                        <option value="S.C.S.">S.C.S.</option>
                        <option value="S.C.A.">S.C.A.</option>
                    </select>
                    @error('tipo') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-md-4">
                    <label for="estado">Estado</label>
                    <select class="form-control" wire:model="estado">
                        <option value="">Seleccione</option>
                        <option value="1">ACTIVO</option>
                        <option value="0">INACTIVO</option>
                    </select>
                    @error('estado') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary" data-dismiss="modal">Guardar</button>
            </div>
       </div>
    </div>
</div>