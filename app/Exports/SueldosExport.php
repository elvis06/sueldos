<?php

namespace App\Exports;

use App\Models\Sueldo;
use Maatwebsite\Excel\Concerns\FromCollection;      //Para trabajar con colecciones y obtener la data
use Maatwebsite\Excel\Concerns\WithHeadings;        //Para definir los titulos de encabezado
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;   //Para interactuar co el libro
use Maatwebsite\Excel\Concerns\WithCustomStartCell;  //Para definir la celda donde inicia el reporte
use Maatwebsite\Excel\Concerns\WithTitle;           //Para colocar nombre a las hojas del libro
use Maatwebsite\Excel\Concerns\WithStyles;          //Para dar formato a las celdas
//use Maatwebsite\Excel\Concerns\WithColumnWidths;

class SueldosExport implements FromCollection, WithHeadings, WithCustomStartCell, WithTitle, WithStyles
{
    protected $id;
    function __construct($id){
        $this->id = $id;
    }
    public function collection()
    {
        $datos = Sueldo::join('empleados as e','e.id','sueldos.empleado_id')->join('planillas as p','p.id','sueldos.planilla_id')
        ->select('e.nombre','e.apellido_pat','e.apellido_mat','e.fecha_ingreso','e.haber_basico','sueldos.antiguedad'
        ,'sueldos.dias_habiles','sueldos.dias_trab','sueldos.haber_ganado','sueldos.porcentaje_ant','sueldos.bono_antiguedad'
        ,'sueldos.dias_dom','sueldos.dominicales','sueldos.horas_extra','sueldos.importe_hrs_extra','sueldos.horas_noc'
        ,'sueldos.importe_hrs_noc','sueldos.horas_dom_fer','sueldos.importe_dom_fer','sueldos.subsidio_frontera','sueldos.otro_ingreso'
        ,'sueldos.total_ganado','sueldos.cuenta_prev','sueldos.riesgo_comun','sueldos.comision_afp','sueldos.aporte_solidario'
        ,'sueldos.ap_nac_solidario','sueldos.rc_iva','sueldos.anticipos','sueldos.descuentos','sueldos.total_desc','sueldos.liq_pagable')
        ->where('planilla_id',$this->id)->get();
        return $datos;
    }
    public function headings() : array
    {
        return ['Nombres','Apellido Paterno','Apellido Materno','Fecha Ingreso','Haber Básico','Antig.','Días Habiles','Días Trab.',
        'Haber Ganado','% Antig.','Bono Antiguedad','Días Dom.','Dominicales','Horas Extra','Importe Hrs Extra','Horas Noc'
        ,'Importe Hrs Noc','Horas Dom Fer','Importe Dom Fer','Subsidio Frontera','Otro Ingreso','Total Ganado','Cuenta Prev',
        'Riesgo Común','Comision AFP','Aporte Solidario','Ap. Nac. Solidario','RC-IVA','Anticipos','Descuentos','Total Desc.','Liq. Pagable'];
    }
    public function startCell(): string
    {
        return 'A2';
    }
   public function styles(Worksheet $sheet)
    {
        return [
            2 => ['font' =>  ['bold' => true]]
        ];
        
    }
    /*public function columnWidths(): array
    {
        return [
            'A' => 8,
            'B' => 10,
            'C' => 10,
            'D' => 10,
            'E' => 10,
            'F' => 10,
            'G' => 10,
            'H' => 10,
            'I' => 10,
            'K' => 10,
            'K' => 10,
            'L' => 10,
        ];
    }*/
    public function title(): string
    {
        return 'Planilla Tributaria';
    }
}