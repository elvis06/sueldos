<?php

namespace App\Exports;

use App\Models\Tributo;
use Maatwebsite\Excel\Concerns\FromCollection;      //Para trabajar con colecciones y obtener la data
use Maatwebsite\Excel\Concerns\WithHeadings;        //Para definir los titulos de encabezado
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;   //Para interactuar co el libro
use Maatwebsite\Excel\Concerns\WithCustomStartCell;  //Para definir la celda donde inicia el reporte
use Maatwebsite\Excel\Concerns\WithTitle;           //Para colocar nombre a las hojas del libro
use Maatwebsite\Excel\Concerns\WithStyles;          //Para dar formato a las celdas
//use Maatwebsite\Excel\Concerns\WithColumnWidths;

class TributosExport implements FromCollection, WithHeadings, WithCustomStartCell, WithTitle, WithStyles
{
    protected $id;
    function __construct($id){
        $this->id = $id;
    }
    public function collection()
    {
        $datos = Tributo::join('empleados as e','e.id','tributos.empleado_id')->join('planillas as p','p.id','tributos.planilla_id')
        ->select('p.gestion','p.mes','e.cod_rciva','e.nombre','e.apellido_pat','e.apellido_mat','e.num_doc','e.tipo_doc','e.novedad'
        ,'tributos.ingreso_neto','tributos.dos_salarios_min','tributos.base_imponible','tributos.impuesto_rciva','tributos.trece_dos_sal_min'
        ,'tributos.imp_neto_rciva','tributos.formulario_c693','tributos.saldo_favor_fisco','tributos.saldo_favor_dep','tributos.saldo_ant_favor_dep','tributos.mant_valor','tributos.saldo_act','tributos.saldo_utilizado'
        ,'tributos.retencion_rciva','tributos.siete_periodo_ant','tributos.formulario_c465','tributos.saldo_siete','tributos.pago_siete','tributos.impuesto_retenido','tributos.saldo_dep','tributos.saldo_siete_dep')
        ->where('planilla_id',$this->id)->get();
        return $datos;
    }
    public function headings() : array
    {
        return ['Año','Periodo','Cod. Dependiente RC-IVA','Nombres','1er Apellido','2do Apellido','Num. Doc','Tipo Doc','Novedades','Ingreso Neto','Dos Salarios Min',
        'Base Imponible','Impuesto RC-IVA','13 Dos Sal Min','Imp Neto Rciva','Formulario C693','Saldo Favor Fisco',
        'Saldo Favor Dep','Saldo Ant Favor Dep','Mant Valor','Saldo Act','Saldo Utilizado','Retencion Rciva','Siete Periodo Ant','Formulario C465',
        'Saldo Siete','Pago Siete','Impuesto Retenido','Saldo Dep','Saldo Siete Dep'];
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
