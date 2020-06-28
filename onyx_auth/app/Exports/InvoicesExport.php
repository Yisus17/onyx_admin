<?php

namespace App\Exports;

use App\Invoice;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;


class InvoicesExport implements FromView, WithEvents, ShouldAutoSize, WithDrawings{

	use Exportable;

	protected $invoice;

	public function __construct($invoice = null){
		$this->invoice = $invoice;
	}

	public function view(): View{
		return view('invoices.excel', [
			'invoice' => $this->invoice
		]);
	}

	public function drawings(){
		$logo = new Drawing();
		$logo->setName('Logo');
		$logo->setPath(public_path('/img/logo_onyx.png'));
		$logo->setHeight(80);
		$logo->setCoordinates('E1');

		return $logo;
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
				$event->sheet->styleCells('A11:C11', $styleArray);
				$event->sheet->styleCells('A12:C12', $styleArray);
				$event->sheet->styleCells('A13:C13', $styleArray);
				$event->sheet->styleCells('A14:I14', $styleArray);

				$event->sheet->styleCells('G11:I11', $styleArray);
				$event->sheet->styleCells('G12:I12', $styleArray);
				$event->sheet->styleCells('G13:I13', $styleArray);
				
			},
		];
	}
}
