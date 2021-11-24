<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Tributo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
            
            <div class="form-group">
                <label for="ingreso_neto"></label>
                <input wire:model="ingreso_neto" type="text" class="form-control" id="ingreso_neto" placeholder="Ingreso Neto">@error('ingreso_neto') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="dos_salarios_min"></label>
                <input wire:model="dos_salarios_min" type="text" class="form-control" id="dos_salarios_min" placeholder="Dos Salarios Min">@error('dos_salarios_min') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="base_imponible"></label>
                <input wire:model="base_imponible" type="text" class="form-control" id="base_imponible" placeholder="Base Imponible">@error('base_imponible') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="impuesto_rciva"></label>
                <input wire:model="impuesto_rciva" type="text" class="form-control" id="impuesto_rciva" placeholder="Impuesto Rciva">@error('impuesto_rciva') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="trece_dos_sal_min"></label>
                <input wire:model="trece_dos_sal_min" type="text" class="form-control" id="trece_dos_sal_min" placeholder="trece Dos Sal Min">@error('trece_dos_sal_min') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="imp_neto_rciva"></label>
                <input wire:model="imp_neto_rciva" type="text" class="form-control" id="imp_neto_rciva" placeholder="Imp Neto Rciva">@error('imp_neto_rciva') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="formulario_c693"></label>
                <input wire:model="formulario_c693" type="text" class="form-control" id="formulario_c693" placeholder="Formulario C693">@error('formulario_c693') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="saldo_favor_fisco"></label>
                <input wire:model="saldo_favor_fisco" type="text" class="form-control" id="saldo_favor_fisco" placeholder="Saldo Favor Fisco">@error('saldo_favor_fisco') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="saldo_favor_dep"></label>
                <input wire:model="saldo_favor_dep" type="text" class="form-control" id="saldo_favor_dep" placeholder="Saldo Favor Dep">@error('saldo_favor_dep') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="saldo_ant_favor_dep"></label>
                <input wire:model="saldo_ant_favor_dep" type="text" class="form-control" id="saldo_ant_favor_dep" placeholder="Saldo Ant Favor Dep">@error('saldo_ant_favor_dep') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="mant_valor"></label>
                <input wire:model="mant_valor" type="text" class="form-control" id="mant_valor" placeholder="Mant Valor">@error('mant_valor') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="saldo_act"></label>
                <input wire:model="saldo_act" type="text" class="form-control" id="saldo_act" placeholder="Saldo Act">@error('saldo_act') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="saldo_utilizado"></label>
                <input wire:model="saldo_utilizado" type="text" class="form-control" id="saldo_utilizado" placeholder="Saldo Utilizado">@error('saldo_utilizado') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="retencion_rciva"></label>
                <input wire:model="retencion_rciva" type="text" class="form-control" id="retencion_rciva" placeholder="Retencion Rciva">@error('retencion_rciva') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="siete_periodo_ant"></label>
                <input wire:model="siete_periodo_ant" type="text" class="form-control" id="siete_periodo_ant" placeholder="Siete Periodo Ant">@error('siete_periodo_ant') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="formulario_c465"></label>
                <input wire:model="formulario_c465" type="text" class="form-control" id="formulario_c465" placeholder="Formulario C465">@error('formulario_c465') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="saldo_siete"></label>
                <input wire:model="saldo_siete" type="text" class="form-control" id="saldo_siete" placeholder="Saldo Siete">@error('saldo_siete') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="pago_siete"></label>
                <input wire:model="pago_siete" type="text" class="form-control" id="pago_siete" placeholder="Pago Siete">@error('pago_siete') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="impuesto_retenido"></label>
                <input wire:model="impuesto_retenido" type="text" class="form-control" id="impuesto_retenido" placeholder="Impuesto Retenido">@error('impuesto_retenido') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="saldo_dep"></label>
                <input wire:model="saldo_dep" type="text" class="form-control" id="saldo_dep" placeholder="Saldo Dep">@error('saldo_dep') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="saldo_siete_dep"></label>
                <input wire:model="saldo_siete_dep" type="text" class="form-control" id="saldo_siete_dep" placeholder="Saldo Siete Dep">@error('saldo_siete_dep') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="empleado_id"></label>
                <input wire:model="empleado_id" type="text" class="form-control" id="empleado_id" placeholder="Empleado Id">@error('empleado_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="planilla_id"></label>
                <input wire:model="planilla_id" type="text" class="form-control" id="planilla_id" placeholder="Planilla Id">@error('planilla_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="sueldo_id"></label>
                <input wire:model="sueldo_id" type="text" class="form-control" id="sueldo_id" placeholder="Sueldo Id">@error('sueldo_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary" data-dismiss="modal">Save</button>
            </div>
       </div>
    </div>
</div>