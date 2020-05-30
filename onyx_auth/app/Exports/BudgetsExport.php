<?php

namespace App\Exports;

use App\Budget;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use \Maatwebsite\Excel\Sheet;


class BudgetsExport implements FromView, WithEvents, ShouldAutoSize{

	use Exportable;

	protected $budget;



	public function __construct($budget = null){
		$this->budget = $budget;
	}

	public function view(): View{
		return view('budgets.excel', [
			'budget' => $this->budget
		]);
	}

	public function registerEvents(): array{
		return [
			AfterSheet::class =>function(AfterSheet $event) {
				$styleArray = [
					'borders' => [
						'allBorders' => [
							'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
						]
					]
				];
				$event->sheet->styleCells('A10:E10', $styleArray);
				$event->sheet->styleCells('A11:E11', $styleArray);
				$event->sheet->styleCells('A12:E12', $styleArray);
				$event->sheet->styleCells('A13:L13', $styleArray);

				$event->sheet->styleCells('H10:L10', $styleArray);
				$event->sheet->styleCells('H11:L11', $styleArray);
				$event->sheet->styleCells('H12:L12', $styleArray);
				
			},
		];
	}

	/*public function headings(): array{
		return [
			'Cantidad',
			'Descripcion',
			'P/Unitario',
			'P/Total'
		];
	}

	public function map($budget): array{
		return [
			findValue(getValidityOptions(), $budget->validity),
			$budget->description,
			$budget->address
		];
	}*/

	/*public function collection(){
		return $this->budgets ?: Budget::all();
	}*/
}
