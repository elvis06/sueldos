<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modificar Empleado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
            <div class="form-group row">
                <div class="col-md-4">
                    <label for="nombre">Nombres</label>
                    <input wire:model="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre">@error('nombre') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-md-4">
                    <label  for="apellido_pat">Apellido Paterno</label>
                    <input wire:model="apellido_pat" type="text" class="form-control" id="apellido_pat" placeholder="Apellido Paterno">@error('apellido_pat') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-md-4">
                    <label for="apellido_mat">Apellido Materno</label>
                    <input wire:model="apellido_mat" type="text" class="form-control" id="apellido_mat" placeholder="Apellido Materno">@error('apellido_mat') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="form-group row">
            <div class="col-md-4">
                    <label for="apellido_casada">Apellido Casada</label>
                    <input wire:model="apellido_casada" type="text" class="form-control" id="apellido_casada" placeholder="Apellido Materno">@error('apellido_casada') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-md-4">
                    <label for="nacionalidad">Nacionalidad</label>
                    <input wire:model="nacionalidad" type="text" class="form-control" id="nacionalidad" placeholder="Nacionalidad">@error('nacionalidad') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-md-4">
                    <label for="fecha_nac">Fecha Nacimiento</label>
                    <input wire:model="fecha_nac" type="date" class="form-control" id="fecha_nac" placeholder="Fecha Nacimiento">@error('fecha_nac') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4">
                    <label for="tipo_doc">Tipo Documento</label>
                    <select class="form-control" wire:model="tipo_doc">
                        <option value="">Seleccione</option>
                        <option value="CI">CI</option>
                        <option value="LIB">LIB</option>
                        <option value="CEX">CEX</option>
                    </select>
                    @error('tipo_doc') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-md-4">
                    <label for="num_doc">Número de Documento</label>
                    <input wire:model="num_doc" type="text" class="form-control" id="num_doc" placeholder="Ej. 4125361">@error('num_doc') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-md-4">
                    <label for="ext_ci">Lugar Exp. Documento</label>
                    <select class="form-control" wire:model="ext_ci">
                        <option value="">Seleccione</option>
                        <option value="TARIJA">TARIJA</option>
                        <option value="SANTA CRUZ">SANTA CRUZ</option>
                        <option value="POTOSI">POTOSI</option>
                        <option value="PANDO">PANDO</option>
                        <option value="ORURO">ORURO</option>
                        <option value="LA PAZ">LA PAZ</option>
                        <option value="COCHABAMBA">COCHABAMBA</option>
                        <option value="CHUQUISACA">CHUQUISACA</option>
                        <option value="BENI">BENI</option>
                        <option value="EXTRANJERO">EXTRANJERO</option>
                    </select>
                    @error('ext_ci') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4">
                    <label for="sexo">Sexo</label>
                    <select class="form-control" wire:model="sexo">
                        <option value="">Seleccione</option>
                        <option value="MASCULINO">MASCULINO</option>
                        <option value="FEMENINO">FEMENINO</option>
                    </select>
                    @error('sexo') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-md-4">
                    <label for="direccion">Dirección Domicilio</label>
                    <input wire:model="direccion" type="text" class="form-control" id="direccion" placeholder="Dirección">@error('direccion') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-md-4">
                    <label for="telefono">Teléfono/Celular</label>
                    <input wire:model="telefono" type="text" class="form-control" id="telefono" placeholder="Teléfono">@error('telefono') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="form-group row">
            <div class="col-md-4">
                    <label for="fecha_ingreso">Fecha de Ingreso</label>
                    <input wire:model="fecha_ingreso" type="date" class="form-control" id="fecha_ingreso" placeholder="Fecha Ingreso">@error('fecha_ingreso') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-md-4">
                    <label for="cargo">Cargo</label>
                    <input wire:model="cargo" type="text" class="form-control" id="cargo" placeholder="Cargo">@error('cargo') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-md-4">
                    <label for="tipo_actividad">Tipo de Actividad</label>
                    <select class="form-control" wire:model="tipo_actividad">
                        <option value="">Seleccione</option>
                        <option value="EMPLEADO">EMPLEADO</option>
                        <option value="OBRERO">OBRERO</option>
                    </select>
                    @error('tipo_actividad') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4">
                    <label for="haber_basico">Haber Básico</label>
                    <input wire:model="haber_basico" type="text" class="form-control" id="haber_basico" placeholder="Haber Basico">@error('haber_basico') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-md-4">
                    <label for="banco">Banco Dep. Sueldo</label>
                    <input wire:model="banco" type="text" class="form-control" id="banco" placeholder="Banco">@error('banco') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-md-4">
                    <label for="nro_cuenta">Nº de cuenta de Banco</label>
                    <input wire:model="nro_cuenta" type="text" class="form-control" id="nro_cuenta" placeholder="Nro Cuenta">@error('nro_cuenta') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4">
                    <label for="entidad_afp">Entidad AFP</label>
                    <select class="form-control" wire:model="entidad_afp">
                        <option value="">Seleccione</option>
                        <option value="BBVA PREVISIÓN AFP S.A.">BBVA PREVISIÓN AFP S.A.</option>
                        <option value="FUTURO DE BOLIVIA S.A.">FUTURO DE BOLIVIA S.A.</option>
                    </select>
                    @error('entidad_afp') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-md-4">
                    <label for="cua">Nº CUA</label>
                    <input wire:model="cua" type="text" class="form-control" id="cua" placeholder="Cua">@error('cua') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-md-4">
                    <label for="cod_rciva">Cod. Dependiente RC-IVA</label>
                    <input wire:model="cod_rciva" type="text" class="form-control" id="cod_rciva" placeholder="Código RC-IVA">@error('cod_rciva') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="form-group row">
                
                <div class="col-md-4">
                    <label for="novedad">Novedades</label>
                    <select class="form-control" wire:model="novedad">
                        <option value="">Seleccione</option>
                        <option value="I">INCORPORACIÓN</option>
                        <option value="V">VIGENTE</option>
                        <option value="D">DESVINCULADO</option>
                    </select>
                    @error('novedad') <span class="error text-danger">{{ $message }}</span> @enderror
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