<?php

namespace App\Exports;

use App\Budget;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class BudgetsExport implements FromView{

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
